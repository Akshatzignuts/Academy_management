<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                    <li class="nav-item">
                        <a href="{{ route('academy.course')}}" class="nav-link">Add Course</a>
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
    <!--edit form to edit student details-->
    <div class="container">
        <a href="{{url('student/display/' )}}" class="btn btn-primary">Back</a>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="mb-4">Edit Student Detail</h2>
                <form action="{{url('student/edited/' . $contact->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="user_type" name="user_type" value="{{$contact->user_type}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$contact->name}}" placeholder="Enter your Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter course Address" required>{{$contact->address}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="mobile_no" class="form-label">Mobile No.</label>
                        <input type="text" class="form-control" id="mobile_no" value="{{$contact->mobile_no}}" pattern="[0-9]+" name="mobile_no" placeholder="Enter your Mobile no." required>
                    </div>
                    <div class="mb-3">
                        <div>
                            <label>Courses </label>
                        </div>
                        <!--To fetch the coourse name in form-->
                        @foreach ($course as $courses)
                        <input type="checkbox" value="{{$courses->id}}" id="course" name="courses[]" {{ $contact->courses->contains($courses->id) ? 'checked' : '' }}>
                        <label for="course">{{$courses->course_name}}</label>
                        @endforeach
                    </div>
                    <!--To fetch the teacher name in form-->
                    <div>
                        <label>Teachers </label>
                    </div>
                    <div>
                        <select name="teacher_id" required>
                            <option value="">Select message</option>
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{$teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>

            </div>
        </div>
    </div>
    @if($errors->any())
    <div id="alert-danger" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <script>
        setTimeout(function() {
            document.getElementById('alert-danger').style.display = 'none';
        }, 1000);

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
<!-- css for styling -->
<style>
    .btn-dark {
        margin-left: 100%;

        /* Change the value as needed */
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

    .container {
        width: 900px;
        height: 800px;
        border: 2px solid gray;
        border-radius: 12px;
        margin-top: 8px;
        background-image: url('https://img.freepik.com/free-photo/open-book-wooden-table_1204-363.jpg?w=826&t=st=1710153227~exp=1710153827~hmac=b3f4613386372785aa354848007dae549d448fe2b7ed47a879de8f6e6360ef9a');



    }

    .btn {
        margin-top: 20px;
    }

    h2 {
        margin-top: 30px;
    }

    .bi {
        margin: 10px;
        font-size: 24px;
        color: black;
    }

</style>
