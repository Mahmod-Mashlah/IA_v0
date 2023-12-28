<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreGroupRequest;
use RealRashid\SweetAlert\Facades\Alert;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all()/*->where('group_id',Auth::user()->id)*/;

        return view('groups.index', compact([
            'groups',
        ]));
    }
    public function create()
    {
        $groups = Group::all();

        return view('groups.add', compact([
            'groups',
        ]));
    }

    public function store(StoreGroupRequest $request)
    {

        $group = new Group();

        $validatedData = $request->validate([

            'name'           => 'required', 'string',
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
        return redirect()->route('groups', compact(['group', 'validatedData']))->with('success', 'A new Group has created successfully!');
    }

    public function edit_permissions($id)
    {

        $group = Group::findOrFail($id);

        $group_Users = $group->Users;


        return view('groups/edit-permissions', compact([
            'group', 'group_Users',
        ]));
    }

    public function assign_user_to_group(Request $request)
    {

        $user_id = $request->user_id;
        $group_id = $request->group_id;

        $Requested_data = GroupUser::where('user_id', $user_id)
            ->where('group_id', $group_id);

        if ($Requested_data->exists()) {

            return redirect()->back()->with('error_User_Is_Exist', 'Error . The user is already in this group!');
        }
        else {

            GroupUser::factory()->create([

                'user_id' => $user_id,
                'group_id' => $group_id,

            ]);

            return redirect()->back()->with('success', 'A new User created successfully!');
        }
    }
    public function remove_user_from_group(Request $request)
    {

        $userId = $request->user_id;
        $groupId = $request->group_id;

        // $userId = $request->input('user_id');
        // $groupId = $request->input('group_id');

        $groupUser = GroupUser::where('user_id', $userId)
            ->where('group_id', $groupId)
            ->first();

        if ($groupUser) {
            $groupUser->delete();
        }

        return redirect()->back()->with('deleted', 'A new User has been deleted !');
    }
}
