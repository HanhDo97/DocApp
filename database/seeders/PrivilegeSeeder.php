<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('privileges')->insert([
            'name'   => 'Quyền truy cập cao nhất',
            'code'   => 'ROOT',
            'created_at' => now(),
        ]);
        DB::table('privileges')->insert([
            'name'   => 'Quyền truy cập cao',
            'code'   => 'ADMIN',
            'created_at' => now(),
        ]);
        DB::table('privileges')->insert([
            'name'   => 'Quyền truy cập trung bình',
            'code'   => 'USER',
            'created_at' => now(),
        ]);
        DB::table('privileges')->insert([
            'name'   => 'Quyền truy cập thấp',
            'code'   => 'GUEST',
            'created_at' => now(),
        ]);
    }
}
