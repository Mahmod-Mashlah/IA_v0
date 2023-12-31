<?php

namespace App\Http\Controllers;

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
        return view('files.add',compact([
            'files','group',
        ]));
    }


    public function upload_file(Request $request) {

        $file_extension = $request->file->getClientOriginalName() ;
        $filename = $file_extension ;

        $request->file->move('filles',$filename);

        File::create([
            'name' => $filename ,
            'status' => 'free',
            'group_id' => $request->group_id ,
            'file' => 'any path' ,
            'user_id' => auth()->user()->id,
        ]);

        $files = File::all()->where('group_id',$request->group_id);
        $group = Group::find($request->group_id);

        return view('groups.show-group-files', compact(['files','group']));

    }
    public function downloadfile(Request $request)
    {
        $file = File::where('id',$request->file_id)->sharedLock()->first();
                if($file)
                {$file_name=$file->name;
                $path=public_path('filles/'.$file_name);
            return response()->download($path);

                }
    }
    public function check_in(Request $request)
    {
        $file = File::where('id',$request->file_id)->sharedLock()->first();
                if($file && $file->status == 'free')
                {   $file_name=$file->name;
                    $file->status = 'reserved';
                    $file->save();

                $path=public_path('filles/'.$file_name);
        // dd($file) ;

         return response()->download($path);
        // $file->status = 'reserved' ;
             // return redirect()->route('files', compact(['file']))->with('check-in-success ', 'The File is Checked in Successfully');

    }
    }


    public function destroy(File $file)
    {
        Storage::delete($file->path);
        $file->delete();

        return redirect()->route('files.index');
    }

}
