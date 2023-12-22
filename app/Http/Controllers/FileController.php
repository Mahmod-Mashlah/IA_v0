<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $files = File::all();

        return view('files.index', compact(['files']));

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


    public function destroy(File $file)
    {
        Storage::delete($file->path);
        $file->delete();

        return redirect()->route('files.index');
    }

}
