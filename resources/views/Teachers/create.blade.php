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
        <h1 style="text-align: center; color: #4c4c4c;">Create new <span style="color: #96a2f3">Teacher</span></h1>
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="{{ route('teachers.index') }}">Go Back to List</a>
        </div>       
        <div class="container">
            <form action="{{ route('teachers.store') }}" method="POST" style="display: grid;">
                @csrf
                <label>Full name:</label>
                <input type="text" name="full_name" placeholder="Your full name" value="{{ old('full_name') }}">
                @error('full_name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <label>Profession:</label>
                <input type="text" name="profession" placeholder="Your profession" value="{{ old('profession') }}">
                @error('profession')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <label>Degree:</label>
                <input type="text" name="degree" placeholder="Your degree" value="{{ old('degree') }}">
                <label>Phone number:</label>
                <input type="text" name="phone" placeholder="Your phone number" value="{{ old('phone') }}">
                <input type="submit" value="Save">
            </form>
        </div>
    </body>
</html>