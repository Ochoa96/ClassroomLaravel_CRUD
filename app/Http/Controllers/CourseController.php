<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = DB::table('courses')
            ->select('courses.id', 'courses.name', 'courses.level', 'courses.class_hours','teachers.full_name as teacher')
            ->leftJoin('teachers', 'teachers.id', '=', 'courses.teacher_id')
            ->get();
        $aux = 0;
        foreach ($courses as $course) {
            $courses[$aux]->students = DB::table('course_student')
                                        ->select( 'students.full_name as student')
                                        ->leftJoin('students', 'students.id', '=', 'course_student.student_id')
                                        ->where('course_student.course_id', '=', $course->id)
                                        ->get();
            $aux++;
        }
        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $students = Student::all();
        return view('courses.create', ['teachers' => $teachers, 'students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:75',
            'level' => 'required|max:35',
            'teacher_id' => 'required',
            'student_ids' => 'required|array',
        ]);
        $course = new Course($request->all());
        $course->save();
        foreach ($request->student_ids as $student_id){
            $course->students()->attach($student_id);
        }
        return redirect()->action([CourseController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$course = Course::with(['teacher'])->where('course.id', '=', $id)->first();
        //$course_student = DB::table('course_student')->select('students.full_name')->join('students', 'students.id', '=','course_student.students_id')->where('course_id', '=', $id)->get();
        //return view('courses.show', ['course' => $course, 'course_student' => $course_student]);

        $course = Course::with(['teachers'])->where('courses.id', '=', $id)->first();
        $course_student = DB::table('course_student')->select('students.full_name')->join('students', 'students.id', '=','course_student.student_id')->where('course_id', '=', $id)->get();
        return view('courses.show', ['course' => $course, 'course_student' => $course_student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::all();
        $students = Student::all();
        $course = Course::findOrFail($id);
        $course_student = DB::table('course_student')->where('course_id', '=', $id)->get();
        return view('courses.edit', ['course' => $course, 'course_student' => $course_student, 'teachers' => $teachers, 'students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:75',
            'level' => 'required|max:35',
            'teacher_id' => 'required',
            'student_ids' => 'required|array',
        ]);
        $course = Course::findOrFail($id);
        $course->name = $request->name;
        $course->level = $request->level;
        $course->class_hours = $request->class_hours;
        $course->teacher_id = $request->teacher_id;
        $course->save();
        $course->students()->detach();
        foreach ($request->student_ids as $student_ids){
            $course->students()->attach($student_ids);
        }
        return redirect()->action([CourseController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->students()->detach();
        $course->delete();
        return redirect()->action([CourseController::class, 'index']);
    }
}
