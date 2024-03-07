<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('academy.courses') }}">Courses</a>
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
    <table>
        <tr>
            <th>Student Name</th>
            <th>Address</th>
            <th>Mobile no.</th>
            <th>Course name</th>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </table>
</body>

</html>