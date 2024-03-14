<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ListTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('list_types')->insert([
            'code'       => 'CATEGORY',
            'name'       => 'Category',
            'created_at' => now(),
        ]);

        DB::table('list_types')->insert([
            'code'       => 'QUYEN_TRUY_CAP',
            'name'       => 'Quyền truy cập',
            'created_at' => now(),
        ]);
    }
}
