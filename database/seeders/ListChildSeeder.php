<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('list_children')->insert([
            'list_id' => 1,
            'code'    => 'GENERAL',
            'name'    => 'General',
        ]);
        DB::table('list_children')->insert([
            'list_id' => 1,
            'code'    => 'CARDIOLOGY',
            'name'    => 'Cardiology',
        ]);
        DB::table('list_children')->insert([
            'list_id' => 1,
            'code'    => 'RESPIRATIONS',
            'name'    => 'Respirations',
        ]);
        DB::table('list_children')->insert([
            'list_id' => 1,
            'code'    => 'DERMATOLOGY',
            'name'    => 'Dermatology',
        ]);
        DB::table('list_children')->insert([
            'list_id' => 1,
            'code'    => 'GYNECOLOGY',
            'name'    => 'Gynecology',
        ]);
        DB::table('list_children')->insert([
            'list_id' => 1,
            'code'    => 'DENTAL',
            'name'    => 'Dental',
        ]);
    }
}
