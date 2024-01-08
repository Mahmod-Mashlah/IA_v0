<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 5 Groups factory
        for ($i=1; $i <= 5 ; $i++) {
            $j = ($i *2)+3;
            Group::factory()->create([

                'admin_id'=> $j,
                'name'=> 'Group'."$i",

            ]);
           }
    }
}
