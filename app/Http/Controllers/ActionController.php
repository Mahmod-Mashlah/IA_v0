<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Action;
use Illuminate\Http\Request;
use App\Http\Requests\StoreActionRequest;
use App\Http\Requests\UpdateActionRequest;

class ActionController extends Controller
{
    public function file_checks_in_report(Request $request)
    {
        $file = File::find($request->file_id);
        $file_Actions = Action::all()->where('file_id',$request->file_id);
        return view('files.show-file-actions', compact(['file_Actions','file']));
    }
}
