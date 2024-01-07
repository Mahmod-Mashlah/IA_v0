<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\File;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index()
    {
        $files = File::all();
        return view('files.index', compact(['files']));
    }

    public function create(Request $request)
    {
        $files = File::all();
        $group = Group::find($request->group_id);
        return view('files.add', compact([
            'files', 'group',
        ]));
    }


    public function upload_file(Request $request)
    {
        // dd(1);
        $file_extension = $request->file->getClientOriginalName();
        $filename = $file_extension;

        $request->file->move('filles', $filename);

        File::create([
            'name' => $filename,
            'status' => 'free',
            'group_id' => $request->group_id,
            'file' => 'public/filles/' . $filename,
            'user_id' => auth()->user()->id,
        ]);

        $files = File::all()->where('group_id', $request->group_id);
        $group = Group::find($request->group_id);



        return redirect()->back();
        // return view('groups.show-group-files', compact(['files', 'group']));
    }
    public function downloadfile(Request $request)
    {
        $file = File::where('id', $request->file_id)->sharedLock()->first();
        if ($file) {
            $file_name = $file->name;
            $path = public_path('filles/' . $file_name);
            return response()->download($path);
        }
    }

    public function check_in(Request $request)
    {
        $file = File::where('id', $request->file_id)->sharedLock()->first();
        if ($file && $file->status == 'free') {
            $file_name = $file->name;
            $file->status = 'reserved';
            $file->save();

            Action::factory()->create([

                'user_id' => auth()->user()->id,
                'file_id' => $file->id,
                'action' => 'check-in',

            ]);

            $path = public_path('filles/' . $file_name);

            return response()->download($path);
            // $file->status = 'reserved' ;
            // return redirect()->route('files', compact(['file']))->with('check-in-success ', 'The File is Checked in Successfully');

        }
        else {
            echo"<br>
            <h1 style='font-size: 40px;color: red ;text-align: center;vertical-align: middle;'
            >Unlucky 😅</h1>
            <br>
            <h1 style='font-size: 35px;text-align: center;'>
            This File has been checked-in recently by another User !</h1>";
    }
    }

    public function multi_check_in(Request $request)
    {

        $fileIds = $request->fileIds;
        $files = File::findMany($fileIds);


        // dd($fileIds);
        foreach ($files as $file) {
            //Logic
            if ($file && $file->status == 'free') {
                $file_name = $file->name;
                $file->status = 'reserved';
                $file->save();

                Action::factory()->create([

                    'user_id' => auth()->user()->id,
                    'file_id' => $file->id,
                    'action' => 'check-in',

                ]);
            }
            else {
               return "<br>
               <h1 style='font-size: 40px;color: red ;text-align: center;vertical-align: middle;'
               >Error 😅</h1>
               <br>
               <h1 style='font-size: 35px;text-align: center;'>
               This File : <br>".$file->name."<br> is reserved by another User !</h1>";
            }

        }
        return "<br>
               <h1 style='font-size: 35px;text-align: center;'>
               All Files reserved";
        // dd($files);
    }
    public function checked_in_files()
    {
        $files = Action::all()->where('action', 'check-in')
            ->where('user_id', auth()->user()->id);
        return view('files.checked-in-files', compact(['files']));
    }

    public function check_out_form(Request $request)
    {
        $file = File::find($request->file_id);

        return view('files.check-out-form', compact([
            'file'
        ]));
    }

    public function check_out(Request $request)
    {

        $oldFile = File::find($request->file_id);

        $file_extension = $request->file->getClientOriginalName();
        $filename = $file_extension;

        $request->file->move('filles', $filename);

        $oldFile->update([
            'name' => $filename,
            'status' => 'free',
            'file' => 'public/filles/' . $filename,
            'user_id' => auth()->user()->id,
        ]);

        Action::factory()->create([

            'user_id' => auth()->user()->id,
            'file_id' => $oldFile->id,
            'action' => 'check-out',

        ]);


        $files = File::all()->where('group_id', $oldFile->group_id);
        $group = Group::find($oldFile->group_id);

        return view('groups.show-group-files', compact(['files', 'group']));
    }

    public function destroy(File $file)
    {
        Storage::delete($file->path);
        $file->delete();

        return redirect()->route('files.index');
    }
}
