<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFileRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateFileRequest;
use RealRashid\SweetAlert\Facades\Alert;

class FileController extends Controller
{

    public function index()
    {
        $files = File::all();
        return view('files.index', compact(['files']));
    }

    public function create()
    {
        $files = File::all();
        return view('files.add',compact([
            'files',
        ]));
    }

    // public function store(StoreFileRequest $request)
    // {
    //     $originalFileName = $request->file->getClientOriginalName();
    //     $extension = $request->file->getClientOriginalExtension();
    //     $newFileName = $originalFileName . '.' . $extension;

    //     $request->file->storeAs('public/files', $newFileName);


    //     $file = new File();

    //     $validatedData = $request->validate([

    //         // 'name'           => 'required',
    //         // 'status'           => 'required',
    //         // 'user_id'           => 'required',
    //         // 'group_id'           => 'required',

    //         'file' => 'required|file|max:2048',


    //     ]);

    //     $file = File::create([

    //         'name'           => $newFileName,
    //         'status'           => 'free',
    //         'user_id'           => auth()->user()->id,
    //         'group_id'           => 1,
    //         'file'           => $validatedData['file'],

    //     ]);

    //     $file->save();

    //     Alert::success('Done !', 'a new File has been created Successfully');

    //     return redirect()->route('files',compact(['file','validatedData']))->with('success', 'A new File has created successfully!');



    //     // ______________________________________________________________________________
    //     // ______________________________________________________________________________
    //     // $request->validate([
    //     //     'file' => 'required|file|max:2048',
    //     // ]);

    //     // $originalFileName = $request->file->getClientOriginalName();
    //     // $extension = $request->file->getClientOriginalExtension();
    //     // $newFileName = $originalFileName . '.' . $extension;


    //     // $request->file->storeAs('public/files', $newFileName);

    //     // $file = new File;
    //     // $file->name = $originalFileName;
    //     // $file->path = 'storage/files/' . $newFileName;
    //     // $file->user_id = auth()->user()->id;
    //     // $file->group_id = 1; // Replace with the correct group_id
    //     // $file->status = 'active';
    //     // $file->save();

    //     // return redirect()->route('files.index');
    // }

    public function store(StoreFileRequest $request)
{
    if ($request->hasFile('file')) {
        $file = $request->file('file');

        $originalFileName = $request->file->getClientOriginalName();
        $extension = $request->file->getClientOriginalExtension();
        $newFileName = $originalFileName . '.' . $extension;

        // $path = $file->storeAs('storage/files', $newFileName, 'local');
        $request->file->move('assets/files', $originalFileName);

        $fileDetails = new File([
            'name' => $originalFileName,
            'file' => $file,
            'status' => 'free',
            'user_id' => auth()->user()->id,
            'group_id' => '1',//$request->input('group_id'),
        ]);

        $fileDetails->save();

        return redirect()->route('files')->with('success', 'File has been uploaded successfully');
    }

    return redirect()->route('files')->with('error', 'No file selected');
}


    public function download()
    {



        // $file = public_path('files/project1.docx');
        // return response()->download($file);


        // $file = File::findOrFail($id);

        // return Storage::download('assets/files/'.$file->file, $file->name);

        // return response()->download(public_path('assets/files/'.$file));
        // return Storage::download('assets/files/'.$id);

    }


    public function destroy(File $file)
    {
        Storage::delete($file->path);
        $file->delete();

        return redirect()->route('files.index');
    }

}
