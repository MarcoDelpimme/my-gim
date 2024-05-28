<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Booking;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $courses = Course::all();


        foreach ($users as $user) {
            foreach ($courses as $course) {
                Booking::create([
                    'user_id' => $user->id,
                    'course_id' => $course->id,
                    'status' => 'pending',
                ]);
            }
        }
    }
}
