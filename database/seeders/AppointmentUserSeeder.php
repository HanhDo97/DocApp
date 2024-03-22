<?php

namespace Database\Seeders;

use App\Models\Appointments;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::select('id')->where('name', 'users')->first();
        $appointment = Appointments::select('id')->where('date_meet', now())->first();
        \DB::table('appointment_user')->insert([
            'appointment_id' => $appointment->id,
            'user_id'        => $user->id,
            'created_at'     => now(),
        ]);

        // Get all users who not a doctor
        $users = User::select('users.id', 'users.name')->leftJoin('doctors', 'users.id', 'doctors.user_id')
            ->whereNull('doctors.user_id')->get();
        $countAppointment = Appointments::count();

        foreach ($users as $user) {
            \DB::table('appointment_user')->insert([
                'appointment_id' => rand(1, $countAppointment),
                'user_id'        => $user->id,
                'created_at'     => now(),
            ]);
        }
    }
}
