<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
 <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('students')}}" class="nav-link">Students</a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ route('teacherdisplay')}}" class="nav-link">Teachers</a>
                    </li>
                </ul>
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
        </div>
    </nav>
    <div>
        <div class="container">
            <div class="row">
                <a href="{{url('/dashboard')}}">
                    <i class="bi bi-arrow-left-square-fill"></i>
                </a>
                <div class="col-md-6 offset-md-3">
                    <h2 class="mb-4">Edit Course</h2>
                    <form action="{{url('course/edit/' . $course->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="course_name" class="form-label">Course Name</label>
                            <input type="text" class="form-control" id="course_name" name="course_name" value="{{$course->course_name}}" placeholder="Enter course name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter course description" required>{{$course->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Course Price</label>
                            <input type="text" class="form-control" placeholder="please enter only numeic value" value="{{$course->course_price}}" id="course_price" name="course_price" pattern="[0-9]+" required>

                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Course Time</label>
                            <input type="text" class="form-control" id="time" name="course_time" placeholder="Enter course time in months" value="{{$course->course_time}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Course</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

</body>

</html>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
</body>

</html>

<style>
    .container {
        width: 900px;
        height: 800px;
        border: 2px solid gray;
        border-radius: 12px;
        margin-top: 8px;
        background-image: url('https://img.freepik.com/free-photo/open-book-wooden-table_1204-363.jpg?w=826&t=st=1710153227~exp=1710153827~hmac=b3f4613386372785aa354848007dae549d448fe2b7ed47a879de8f6e6360ef9a');

    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    textarea {
        border-radius: 12px;
        /* Adjust the radius as needed */
        padding: 8px;
        /* Add some padding for better appearance */
        border: 1px solid #ccc;
        /* Add a border for visual distinction */
    }

    .bi {
        margin: 10px;
        font-size: 24px;
        color: black;
    }

</style>
