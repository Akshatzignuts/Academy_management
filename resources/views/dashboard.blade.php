<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Academy Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/dashboard') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('students')}}" class="nav-link">Students</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacherdisplay')}}" class="nav-link">Teachers</a>
                    </li>
                </ul>
            </div>
            <div class="nav-item">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                    </li>
                    <li>
                        {{-- Authentication --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="text-center ">
        <h1 class="heading">Academy Management </h1>
    </div>
    <div class="container">
        <div class="box">
            <div>
                <label class="label"></label>
            </div>
            <div>
                <label class="label"></label>
            </div>
            <a href="{{ route('academy.course')}}" class="btn btn-dark">Add Courses</a>
        </div>
        <div class="box">
            <div>
                <label class="label"></label>
            </div>
            <div>
                <label class="label"></label>
            </div>
            <a href="{{ route('student')}}" class="btn btn-dark">Add student</a>
        </div>
        <div class="box">
            <div>
                <label class="label"></label>
            </div>
            <div>
                <label class="label"></label>
            </div>
            <a href="{{ route('teacher')}}" class="btn btn-dark">Add Teacher</a>
        </div>
    </div>

    </div>
    </div>
    <table>
        @if ($course->isNotEmpty())
        <tr>
            <th>Course Name</th>
            <th>Description</th>
            <th>Course Time</th>
            <th>Course Price</th>
            <th style="text-align: center;" colspan="4">Action</th>
        </tr>
        <!-- Display courses -->
        @foreach ($course as $courses)
        <tr>
            <td>{{$courses->course_name}}</td>
            <td> {!! strip_tags(Str::substr($courses->description, 0,
                80 )) !!}</td>
            <td>{{$courses->course_time}}</td>
            <td>{{$courses->course_price}}</td>
            <td><a href="{{url('course/edit/' . $courses->id)}} "><i class="bi bi-pencil-square"></i></a>
            <td><a href="{{url('/course/view/')}} "><i class="bi bi-eye-fill"></i></a>
            <td>
                <form action="{{url('/dashboard' . $courses->id)}}" method="">
                    @csrf
                    <a href="{{url( '/course/delete/' . $courses->id)}}" onclick="return confirm('Are you sure you want to delete this course?')"><i class="bi bi-trash"></i></a>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <h2>No Course Available</h2>
        @endif
    </table>
    @if(session('message'))
    <div id="success-message" class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <script>
        // Hide success message after 5 seconds
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 1000); // 5000 milliseconds = 5 seconds

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
<style>
    .text-center {
        display: flex;
        align-items: center;
        justify-content: center;
        color: black;
    }

    .sidebar {
        background-color: #000;
        color: #fff;
        height: 100vh;
    }

    .sidebar a {
        color: #fff;
    }

    h2 {
        margin: 150px;
        margin-left: 600px
    }

    .sidebar a:hover {
        color: #fff;
        text-decoration: none;
    }

    .container {
        display: flex;
        justify-content: center flex-wrap: wrap;
        gap: 20px;
        margin-top: 9ch;

        /* Adjust the gap between boxes */
    }

    /* CSS for individual boxes */
    .box {
        width: 400px;
        /* Set the width of each box */
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    /* CSS for button */
    .btn {
        display: block;
        width: 100%;
        margin-bottom: 10px;
        /* Adjust the spacing between button and labels */
    }

    /* CSS for labels */
    .label {
        font-weight: bold;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    table {
        width: 95%;
        border-collapse: collapse;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 3px 10px 10px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #239625;
        color: white;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .modal-dialog {
        max-width: 70%;
        /* Adjust the maximum width of the modal dialog */
    }

    .modal-content {
        width: 100%;
        /* Ensure the modal content takes up the entire width */
    }

    .modal-body {
        word-wrap: break-word;
        /* Allow long words to break and wrap */
    }

    .btn-primary {
        width: 10%;
        margin-left: 2%;
    }

    .bi {
        margin: 10px;
        font-size: 24px;
        color: black;
    }


    .heading {
        font-family: 'Poppins', sans-serif;
        font-size: 48px;
        font-weight: 700;
        color: #333;
        position: relative;
        display: inline-block;
        padding: 20px 30px;

        background-clip: text;
        -webkit-background-clip: text;

        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

</style>
