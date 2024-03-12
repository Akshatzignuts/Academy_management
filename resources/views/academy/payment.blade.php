<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{route('addpayment')}}">
                    @csrf
                    <div class="form-group">
                        <label for="payment_mode">Payment Mode</label>
                        <div class="custom-select-wrapper">
                            <select name="payment_mode" id="payment_mode" class="custom-select" required>
                                <option value="" selected disabled>Select Payment Mode</option>
                                <option value="upi">UPI</option>
                                <option value="cheque">Cheque</option>
                                <option value="cash">Cash</option>
                                <option value="card">Card</option>
                            </select>
                            <span class="custom-select-arrow"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<style>
    /* Custom CSS for dropdown */
    .custom-select-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .custom-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 100%;
        padding: 8px 32px 8px 12px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        cursor: pointer;
        background-color: #fff;
        font-size: 16px;
        color: #495057;
    }

    .custom-select-arrow {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .custom-select-arrow::before {
        content: '';
        display: block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 6px 5px 0 5px;
        border-color: #666 transparent transparent transparent;
    }

</style>
