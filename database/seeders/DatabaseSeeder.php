<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([

            'name' => 'a',
            'email' => 'a@gmail.com',
            'password' => Hash::make('password'),

        ]);

        // 100 users factory
        for ($i=1; $i <= 100 ; $i++) {
            User::factory()->create([
                'name' => 'a'."$i",
                'email' => 'a'."$i".'@gmail.com',
                'password' => Hash::make('password'),

            ]);
           }

        // 100 users factory
        for ($i=1; $i <= 8 ; $i++) {
            $j = ($i *2)+3;
            Group::factory()->create([

                'admin_id'=> 'a'."$j",
                'name'=> 'Group'."$i",

            ]);
           }
    }
}
