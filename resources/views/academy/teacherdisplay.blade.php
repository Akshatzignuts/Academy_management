<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <h1>Teacher Details </h1>
        <a href="{{url('/dashboard')}}" class="btn btn-primary">Back
        </a>
    </div>
    <table>
        <tr>
            <th>Teacher Name</th>
            <th>Address</th>
            <th>Mobile no.</th>
        </tr>
        @if($teacher->isNotEmpty())
        @foreach ($teacher as $teachers)
        <tr>
            <td>{{$teachers->teacher_name}}</td>
            <td>{{$teachers->mobile_no}}</td>
            <td>{{$teachers->address}}</td>
        </tr>
        @endforeach
        @else
        <h2>No Teacher added yet</h2>
        @endif
    </table>
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

    h2 {
        margin-left: 40%;
    }

    th {
        background-color: #239625;
        color: white;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    h1 {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn {
        margin-left: 20px;
    }

</style>
