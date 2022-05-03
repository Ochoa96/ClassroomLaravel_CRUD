<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Classroom Online</title>
        <style>
            body {
                margin: auto;
                padding: 50px;
                background-color: #dfe6fd;
                font-family: Roboto;
            }
            p {
                color: red;
            }
            .container{
                border-radius: 5px;
                background-color: #ffffff;
                padding: 20px;
                width: 30%;
                box-shadow: 0px 0px 10px #00000029;
                margin-inline: auto;
                display: grid;
            }
            input[type=submit]{
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
                text-decoration: none;
                margin-top: 10px;
            }
            input[type=submit]:hover{
                background-color: #0f41ec;
                color: #ffffff;
            }
            #edit-courses{
                background-color: #ffffff;
                color: #0f41ec;
                padding: 12px 20px;
                margin: 8px 0;
                border: 1px solid #0f41ec;
                border-radius: 25px;
                cursor: pointer;
                width: 40%;
                text-align: center;
                font-family: Roboto;
                font-size: 14px;
                text-decoration: none;
                margin-top: 50px;
            }
            #edit-courses:hover{
                background-color: #0f41ec;
                color: #ffffff;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align: center; color: #4c4c4c;">Show a <span style="color: #96a2f3">course</span></h1>
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="{{ route('courses.index') }}">Go Back to List</a>
        </div>
        <div class="container">
            <label><span style="font-weight: bold; color: #96a2f3">Course name: </span>{{ $course->name}}</label>
            <label><span style="font-weight: bold; color: #96a2f3">Course level: </span>{{ $course->level}}</label>
            <label><span style="font-weight: bold; color: #96a2f3">Class hours: </span>{{ $course->class_hours}}</label>
            <label><span style="font-weight: bold; color: #96a2f3">Assigned teacher: </span></label>
            <ul>
                @if($course->teacher)
                    <li>{{ $course->teacher->full_name }}</li>
                @endif
            </ul>
            <label><span style="font-weight: bold; color: #96a2f3">Students: </span></label>
            <ul>
                @foreach($course_student as $student)
                    <li>{{ $student->full_name }}</li>
                @endforeach
            </ul>
            @if($errors->any())
                <p class="error-message">{{$errors->first('message')}}</p>
            @endif
            <a id="edit-courses" href="{{ route('courses.edit', $course->id) }}">Edit</a>
            <form action="{{ route('courses.destroy', $course->id) }}" method ="POST" >
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" value="Remove" onclick="return DeleteRegister('Remove Course')">
            </form>
        </div>
    </body>
    <script>
        function DeleteRegister(value){
            action = confirm(value) ? true: event.preventDefault()
        }
    </script>
</html>