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
            'admin_id'     => 'required','integer',

        ]);

        // Create the group
        $group = Group::create([

            'name'           => $validatedData['name'],
            'admin_id'     => $validatedData['admin_id'],

        ]);

        $group->save();
        // Redirect or return a response
        Alert::success('Done !', 'a new group has been created Successfully');

        // return redirect()->route('groups')->with('success', 'A new Group has created successfully!');
        return redirect()->route('groups',compact(['group','validatedData']))->with('success', 'A new Group has created successfully!');
    }
    public function edit(Group $group)
    {
        $group = Group::find($group->id);
        $lectures = TypeLecture::all();
        $plays = TypePlay::all();
        return view('groups.update', compact('group','lectures','plays'));
    }

    public function updateTest(UpdateGroupRequest $request, $id)
    {
        $group = Group::findOrFail($id) ;

        // $validated = $request->validate([
        //     'date'           => 'required | date | after_or_equal:2024-01-01', // or ['required'],['date'],
        //     'start_time'     => 'required | time',
        //     'end_time'       => 'required | time',
        //     'min_lectures'   => 'required | min:3',
        //     'max_lectures'   => 'required | max:100',
        //     'min_activities' => 'required | min:2',
        //     'max_activities' => 'required | max:150',
        //     'min_plays'      => 'required | min:1',
        //     'max_plays'      => 'required | max:60',
        //     // Relations :
        //     'lectures'       => 'array',
        //     'plays'          => 'array',
        // ]);
        //dd($validated);
        // $group->update($validated);
        // or :
            // $group->update([
            //     'name' => $request->input('name'),  //.... and so on
            // ]);

        $group->save();
        if ($group->save()) {
            Alert::success('Done !', 'a new group has been updated Successfully');
        }
        return redirect()->route('groups')->with('success', 'Group has been updated successfully!');
    }

    public function update(UpdateGroupRequest $request, Group $group)
{
    $group->type_lectures()->sync($request->input('lectures'));
    $group->type_plays()->sync($request->input('plays'));
    $group->update($request->all());

    $group->save();

    Alert::success('Updated Done !', 'The Group has been updated Successfully');
    return redirect()->route('groups')->with('success', 'Group has updated successfully.');
}

}
