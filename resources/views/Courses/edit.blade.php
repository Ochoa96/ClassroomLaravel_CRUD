<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Classroom Online</title>
        <style>
            body {
                margin: auto;
                padding: 50px;
                font-family: Roboto;
                background-color: #dfe6fd;
            }
            p {
                color: red;
            }
            label {
                margin-top: 8px;
                margin-bottom: 8px;
                margin-left: 10px;
            }
            input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #d1d6fa;
                border-radius: 25px;
                box-sizing: border-box;
                width: 100%;
            }
            input[type=text]::placeholder {
                font-family: Roboto;
                font-size: 12px;
                font-style: italic;
                font-weight: 300;
            }
            input[type=submit] {
                background-color: #ffffff;
                color: #0f41ec;
                padding: 12px 20px;
                margin: 8px 0;
                border: 1px solid #0f41ec;
                border-radius: 25px;
                cursor: pointer;
                width: 50%;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
                font-family: Roboto;
            }
            input[type=submit]:hover {
                background-color: #0f41ec;
                color: #ffffff;
            }
            .container {
                border-radius: 5px;
                background-color: #ffffff;
                padding: 20px;
                width: 30%;
                box-shadow: 0px 0px 10px #00000029;
                margin-inline: auto;
            }
            a {
                font-size: 14px;
            }
            a:hover {
                color: #fe1f3a;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align: center; color: #4c4c4c;">Edit a <span style="color: #96a2f3">course</span></h1>
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="{{ route('courses.index') }}">Go Back to List</a>
        </div> 
        <div class="container">
            <form action="{{route('courses.update', $course->id)}}" method="POST" style="display: grid;">
                @csrf
                {{method_field('PUT')}}
                <label>Course name:</label>
                <input type="text" name="name" placeholder="Course name" value="{{ old('name', $course->name) }}">
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <label>Course level:</label>
                <input type="text" name="level" placeholder="Course level" value="{{ old('level', $course->level) }}">
                @error('level')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <label>Class hours:</label>
                <input type="text" name="class_hours" placeholder="Class hours" value="{{ old('class_hours', $course->class_hours) }}">
                <label for="teacher_id">Select the assigned teacher:</label>
                <select id="teacher_id" name="teacher_id">
                    @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}" {{ old('teacher_id', $course->teacher_id) == $teacher->id ? 'selected' : '' }}> {{ $teacher->full_name }}</option>
                    @endforeach
                </select>
                @error('teacher_id')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <select id="student_ids" name="student_ids[]" multiple>
                    @foreach($students as $student)
                        @php $value = 0; @endphp
                        @foreach($course_student as $course_student_value)
                            @if(old('student_ids.0', $student->id) == $course_student_value->student_id)
                                @php $value = 1; @endphp
                            @endif
                        @endforeach
                        @if($value == 1)
                            <option value="{{$student->id}}" selected> {{ $student->full_name }}</option>
                        @else
                            <option value="{{$student->id}}"> {{ $student->full_name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('student_ids')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="submit" value="Save">
            </form>
        </div>
    </body>
</html>