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
            'list_id'       => 1,
            'code'          => 'GENERAL',
            'name'          => 'General',
            'icon_or_image' => '',
        ]);
        DB::table('list_children')->insert([
            'list_id'       => 1,
            'code'          => 'CARDIOLOGY',
            'name'          => 'Cardiology',
            'icon_or_image' => '',
        ]);
        DB::table('list_children')->insert([
            'list_id'       => 1,
            'code'          => 'RESPIRATIONS',
            'name'          => 'Respirations',
            'icon_or_image' => '',
        ]);
        DB::table('list_children')->insert([
            'list_id'       => 1,
            'code'          => 'DERMATOLOGY',
            'name'          => 'Dermatology',
            'icon_or_image' => '',
        ]);
        DB::table('list_children')->insert([
            'list_id'       => 1,
            'code'          => 'GYNECOLOGY',
            'name'          => 'Gynecology',
            'icon_or_image' => '',
        ]);
        DB::table('list_children')->insert([
            'list_id'       => 1,
            'code'          => 'DENTAL',
            'name'          => 'Dental',
            'icon_or_image' => '',
        ]);
    }
}
