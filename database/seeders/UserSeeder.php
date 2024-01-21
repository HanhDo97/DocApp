<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'       => 'root',
            'email'      => 'root@app',
            'password'   => Hash::make('password'),
            'privilege_id'  => 1,
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name'       => 'users',
            'email'      => 'users@app',
            'password'   => Hash::make('password'),
            'created_at' => now(),
        ]);
    }
}
