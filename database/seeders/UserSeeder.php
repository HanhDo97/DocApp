<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
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
            'name'         => 'root',
            'email'        => 'root@app',
            'password'     => Hash::make('password'),
            'privilege_id' => 1,
            'image'        => 'storage/user/images/qUuOIY3dURnAbRlUSESQ3aaBGOizlEs0PVVzdd3i.jpg',
            'created_at'   => now(),
        ]);

        $file      = UploadedFile::fake()->image('avatar.png');
        $imagePath = $file->store('public/user/images');

        // remove 'public/' because when storage link will access app/public in storage folder
        $imagePath = str_replace('public/', '', $imagePath);

        DB::table('users')->insert([
            'name'       => 'users',
            'email'      => 'users@app',
            'password'   => Hash::make('password'),
            'image'      => 'storage/' . $imagePath,
            'created_at' => now(),
        ]);

        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'name'       => fake()->name(),
                'email'      => fake()->unique()->safeEmail(),
                'password'   => Hash::make('password'),
                'image'      => 'storage/' . $imagePath,
                'created_at' => now(),
            ]);
        }
    }
}
