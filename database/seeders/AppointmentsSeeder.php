<?php

namespace Database\Seeders;

use App\Models\Appointments;
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
        Appointments::create([
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

        // Create 10 appointments
        for (
            $i = 0;
            $i < 10;
            $i++
        ) {
            // Get a random date and time
            $randomDate = $dates[array_rand($dates)];
            $randomTime = $times[array_rand($times)];

            // Create the appointment
            Appointments::create([
                'date_meet' => $randomDate,
                'time_meet' => $randomTime,
            ]);
        }
    }
}
