<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                        <a class="nav-link" href="{{ route('academy.courses') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('students')}}" class="nav-link">All Students</a>
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
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="mb-4">Student Data</h2>
                <form action="{{route('addstudent')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        @foreach ($course as $courses)
                        <input type="checkbox" value="{{ $courses->id }}" id="checkbox" name="courses[]">
                        <label for="checkbox">{{$courses->course_name}}</label>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"
                            placeholder="Enter course Address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="mobile_no" class="form-label">Mobile No.</label>
                        <input type="text" class="form-control" id="mobile_no" pattern="[0-9]+" name="mobile_no"
                            placeholder="Enter your Mobile no.">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
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
</style>