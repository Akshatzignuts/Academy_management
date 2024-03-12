<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Course</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <!--navbar-->
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="course-card">
                    <div class="course-body">
                        <a href="{{url('/dashboard')}}">
                            <i class="bi bi-arrow-left-square-fill"></i>
                        </a>
                        <h2 class="course-title">Course Detail</h2>
                        <div class="course-details">
                            @foreach ($courses as $course)

                            @endforeach
                            <p><strong>Course Name:- </strong>{{$course->course_name}}</p>
                            <p><strong>Description:- </strong>{{$course->description}}</p>
                            <p><strong>Course price:- </strong>{{$course->course_price}}</p>
                            <p><strong>Course Time:- </strong>{{$course->course_time}}</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional if you need JavaScript functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<style>
    body {
        background-color: #f8f9fa;
    }

    .course-card {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .course-card:hover {
        transform: translateY(-5px);
    }

    .course-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .course-body {
        padding: 20px;
    }

    .course-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .course-details {
        margin-top: 10px;
        color: #666;
    }

    .btn-enroll {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-enroll:hover {
        background-color: #0056b3;
    }

    .bi {
        margin: 10px;
        font-size: 24px;
        color: black;
    }




</style>
