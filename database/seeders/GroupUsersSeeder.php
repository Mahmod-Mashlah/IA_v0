<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // 5 Groups factory
         for ($i=1; $i<=User::all()->count() ; $i++) {

            GroupUser::factory()->create([

                'user_id'=> $i,
                'group_id'=> rand(Group::all()->min('id'),Group::all()->max('id')),

            ]);

           }

        // $users = User::all();
        // foreach ($users as $user) {

        //     $user->Groups()->attach($user->id);
        // }
        }
}
