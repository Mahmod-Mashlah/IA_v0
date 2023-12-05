<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\StoreGroupRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact([
            'groups',
        ]));
    }
    public function create()
    {
        $groups = Group::all();

        return view('groups.add' ,compact([
            'groups',
        ]));
    }

    public function store(StoreGroupRequest $request)
    {

        $group = new Group();

        $validatedData = $request->validate([

            'name'           => 'required','string',
        ]);

        // Create the group
        $group = Group::create([

            'name'           => $validatedData['name'],
            'admin_id'     => auth()->user()->id,

        ]);

        $group->save();
        // Redirect or return a response
        Alert::success('Done !', 'a new group has been created Successfully');

        // return redirect()->route('groups')->with('success', 'A new Group has created successfully!');
        return redirect()->route('groups',compact(['group','validatedData']))->with('success', 'A new Group has created successfully!');
    }
}
