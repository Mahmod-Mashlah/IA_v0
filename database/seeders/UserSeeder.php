<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([

            'name' => 'a',
            'email' => 'a@gmail.com',
            'password' => Hash::make('password'),

        ]);

        // 25 users factory
        for ($i=1; $i <= 25 ; $i++) {
            User::factory()->create([
                'name' => 'a'."$i",
                'email' => 'a'."$i".'@gmail.com',
                'password' => Hash::make('password'),

            ]);
           }
    }
}
