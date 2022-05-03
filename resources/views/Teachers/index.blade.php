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
            #new-teacher, #home-teacher{
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
            #new-teacher:hover, #home-teacher:hover{
                background-color: #0f41ec;
                color: #ffffff;
            }
            a:hover {
                color:#fe1f3a;
            }
            .top, .bottom-container{
                text-align: center;
                margin-bottom: 5%;
            }
        </style>
    </head>
    <body>
        <div class="top">
            <img src="{{url('/images/teacher_back.jpg')}}">
            <h1 style="color: #4c4c4c;">Teachers <span style="color: #96a2f3">List</span></h1>
        </div>
        <table>
            <tr>
                <th style="border-radius: 15px 0px 0px 0px;">Full name</th>
                <th>Profession</th>
                <th>Degree</th>
                <th>Phone number</th>
                <th style="border-radius: 0px 15px 0px 0px;">Actions</th>
            </tr>
            @foreach($teachers as $teacher)    
                <tr>
                    <td>{{$teacher->full_name}}</td>
                    <td>{{$teacher->profession}}</td>
                    <td>{{$teacher->degree}}</td>
                    <td>{{$teacher->phone}}</td>
                    <td>
                        <a href="{{ route('teachers.edit', $teacher->id) }}">Edit</a>
                        <a href="{{ route('teachers.show', $teacher->id) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="bottom-container">
            <div style="display: flex;">
                <a id="home-teacher" href="/">Home</a>
                <a id="new-teacher" href="{{ route('teachers.create') }}">New Teacher</a>
            </div>
        </div>
    </body>
    <script>
        function deleteTeacher(value){
            action = confirm(value) ? true: event.preventDefault()
        }
    </script>
</html>