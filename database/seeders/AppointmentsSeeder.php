<?php

namespace Database\Seeders;

use App\Models\Appointments;
use App\Models\Doctors;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user    = User::select('id')->where('name', 'users')->first();
        $doctors = Doctors::select('id')->get()->toArray();
        Appointments::create([
            'user_id'   => $user->id,
            'doctor_id' => $doctors[array_rand($doctors)]['id'],
            'date_meet' => date('Y-m-d'),
            'time_meet' => '08:00 AM',
        ]);

        // Generate 10 days near by current day
        $currentDate = Carbon::now();

        // Create an array to store the generated dates
        $dates = [];

        // Generate 10 dates near the current date
        for ($i = -5; $i <= 5; $i++) {
            $dates[] = $currentDate->copy()->addDays($i)->toDateString();
        }

        $times = [
            '08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM'
        ];

        // Get all users who not a doctor
        $users = User::select('users.id', 'users.name')->leftJoin('doctors', 'users.id', 'doctors.user_id')
            ->whereNull('doctors.user_id')->get();

        // Create 10 appointments
        foreach ($users as $user) {
            // Get a random date and time
            $randomDate = $dates[array_rand($dates)];
            $randomTime = $times[array_rand($times)];

            // Create the appointment
            Appointments::create([
                'user_id'   => $user->id,
                'doctor_id' => $doctors[array_rand($doctors)]['id'],
                'date_meet' => $randomDate,
                'time_meet' => $randomTime,
            ]);
        }
    }
}
