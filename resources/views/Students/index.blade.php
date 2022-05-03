<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Classroom Online</title>
        <style>
            body {
                margin: auto;
                padding: 0 50px 0 50px;
                font-family:Roboto;
                background-color: #ffffff;
            }
            p {
                color: red;
            }
            tr {
                text-align: center;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th {
                height: 70px;
                background-color: #565ffc;
                color: #ffffff;
                font-family: Roboto;
                border: hidden;
            }
            td {
                height: 30px;
                border: 1px solid #565ffc;
            }
            .button {
                background-color: #0f41ec;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
            }            
            .top, .bottom-container{
                text-align: center;
                margin-bottom: 5%;
            }
            #new-student, #home-student{
                font-size: 14px;
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
                margin-top:10%;
                text-align: center;
                font-family: Roboto;
                text-decoration: none;
                width: 20%;
            }
            #new-student:hover, #home-student:hover{
                background-color: #0f41ec;
                color: #ffffff;
            }
            a:hover {
                color:#fe1f3a;
            }

        </style>
    </head>
    <body>
        <div class="top">
            <img src="{{url('/images/student_back.jpg')}}">
            <h1 style="color: #4c4c4c;">Students <span style="color: #96a2f3">List</span></h1>
        </div>
        <table>
            <tr>
                <th style="border-radius: 15px 0px 0px 0px;">Full name</th>
                <th>Age</th>
                <th>Phone number</th>
                <th>Address</th>
                <th style="border-radius: 0px 15px 0px 0px;">Actions</th>
            </tr>
            @foreach($students as $student)    
                <tr>
                    <td>{{$student->full_name}}</td>
                    <td>{{$student->age}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->address}}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                        <a href="{{ route('students.show', $student->id) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="bottom-container">
            <div style="display: flex;">
                <a id="home-student" href="/">Home</a>
                <a id="new-student" href="{{ route('students.create') }}">New Student</a>
            </div>
        </div>
    </body>
    <script>
        function deleteStudent(value){
            action = confirm(value) ? true: event.preventDefault()
        }
    </script>
</html>