<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>
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
                        <a class="nav-link" aria-current="page" href="{{ url('/dashboard') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('students')}}" class="nav-link"> Students</a>
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
    <div class="container">

        <a href="{{url('/dashboard')}}">
            <i class="bi bi-arrow-left-square-fill"></i>
        </a>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="mb-4">Student Detail</h2>

                @if(count($course)===0 )
                <h1>Please add a course to add student</h1>
                @else
                <form action="{{route('addstudent')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter course Address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="mobile_no" class="form-label">Mobile No.</label>
                        <input type="text" class="form-control" id="mobile_no" pattern="[0-9]+" name="mobile_no" placeholder="Enter your Mobile no.">
                    </div>
                    <div class="mb-3">
                        <div>
                            <label>Courses </label>
                        </div>

                        @foreach ($course as $courses)
                        <input type="checkbox" value="{{$courses->id}}" id="course" name="courses[]">
                        <label for="course">{{$courses->course_name}}</label>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="payment_mode">Payment Mode</label>
                        <select name="payment_mode" id="payment_mode" class="custom-select" required>
                            <option value="" selected disabled>Select Payment Mode</option>
                            <option value="upi">UPI</option>
                            <option value="cheque">Cheque</option>
                            <option value="cash">Cash</option>
                            <option value="card">Card</option>
                        </select>
                        <span class="custom-select-arrow"></span>
                    </div>
                    <div>
                        <label>Teachers </label>
                    </div>
                    <div>
                        @foreach($teachers as $teacher)
                        <div>
                            <input type="radio" name="teacher_id" value="{{ $teacher->id }}">
                            {{$teacher->teacher_name}}
                        </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
<style>
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
