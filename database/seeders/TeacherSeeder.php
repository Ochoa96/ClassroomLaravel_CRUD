<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new Teacher();
        $teacher->full_name = 'Pedro Lopez';
        $teacher->profession = 'Biology';
        $teacher->degree = 'Master';
        $teacher->phone = '1234567890';
        $teacher->save();

        $teacher = new Teacher();
        $teacher->full_name = 'Angel Suarez';
        $teacher->profession = 'Economy';
        $teacher->degree = 'Bachelor';
        $teacher->phone = '1234567891';
        $teacher->save();
    }
}
