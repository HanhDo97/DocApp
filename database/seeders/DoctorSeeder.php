<?php

namespace Database\Seeders;

use App\Models\Doctors;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::take(10)->orderBy('created_at', 'desc')->get();

        foreach ($users as $user) {
            $user->image = 'images/doctors/doctor_' . fake()->numberBetween(1, 9) . '.jpg';
            $user->save();

            DB::table('doctors')->insert([
            'user_id'    => $user->id,
            'name'       => $user->name . ' Doctor',
            'cate_code'  => $this->getRandomCategory(fake()->numberBetween(1, 6)),
            'about'      => fake()->realText(100),
            'created_at' => now(),
            ]);
        }

        $doctors = Doctors::take(5)->get();

        foreach ($doctors as $key => $doctor) {
            $doctor->rank = $key + 1;
            $doctor->save();
        }
    }

    public function getRandomCategory($cateId): string
    {
        switch($cateId){
            case 1:
                return 'GENERAL';
            case 2:
                return 'CARDIOLOGY';
            case 3:
                return 'RESPIRATIONS';
            case 4:
                return 'DERMATOLOGY';
            case 5:
                return 'GYNECOLOGY';
            case 6:
                return 'DENTAL';
        }
        return '';
    }
}
