<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new Student();
        $student->full_name = 'Omar Ochoa';
        $student->age = 25;
        $student->phone = '7865356691';
        $student->address = 'Coral Spring';
        $student->save();

        $student = new Student();
        $student->full_name = 'Javier Reyes';
        $student->age = 31;
        $student->phone = '7865437794';
        $student->address = 'Coral Spring';
        $student->save();
    }
}
