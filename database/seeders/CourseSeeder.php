<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new Course();
        $course->name = 'Database';
        $course->level = 'Basic';
        $course->class_hours = '30 hours';
        $course->teacher_id = '1';
        $course->save();

        $course = new Course();
        $course->name = 'Compilation';
        $course->level = 'Expert';
        $course->class_hours = '60 hours';
        $course->teacher_id = '2';
        $course->save();

        $course->students()->attach(1);
        $course->students()->attach(2);
    }
}
