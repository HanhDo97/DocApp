<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PrivilegeSeeder::class,
            DoctorSeeder::class,
            ListTypeSeeder::class,
            ListChildSeeder::class,
            AppointmentsSeeder::class,
            AppointmentUserSeeder::class
        ]);
    }
}
