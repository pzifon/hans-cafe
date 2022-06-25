<nav class="navbar navbar-expand-sm navbar-dark bg-dark text-white sticky-top" style="width:100%;height:100%;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Hans Cafe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/menu">Menu</a>
                </li>
                @if (Route::has('login'))
                @auth
                @if (Auth::user()->hasRole('employee') || Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/reservation') }}">Reservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/inventory">Inventory</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/booking">Booking</a>
                </li>
                @endif
                @else
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/booking">Booking</a>
                </li>
                @endif
                @else
                @endauth
            </ul>
        </div>

        <div class="row ms-auto me-0">
            @if (Route::has('login'))
            @auth
            @if (Auth::user()->hasRole('employee'))
            @if (App\Http\Controllers\ClockInController::check())
            <div class="col-auto nav-item p-0 pe-2">
                <a class="btn btn-light btn-sm" aria-current="page" href="{{ url('/clockOut') }}">Clock Out</a>
            </div>
            @else
            <div class="col-auto nav-item p-0 pe-2">
                <a class="btn btn-light btn-sm" aria-current="page" href="{{ url('/clockIn')}}">Clock In</a>
            </div>
            @endif
            <div class="col-auto nav-item p-0 pe-2">
                <a class="btn btn-success btn-sm " aria-current="page" href="{{ url('/order') }}">Order</a>
            </div>
            @elseif (Auth::user()->hasRole('admin'))
            <div class="col nav-item p-0 pe-2">
                <a class="btn btn-success btn-sm " aria-current="page" href="{{ url('/order') }}">Order</a>
            </div>
            @else
            <div class="col p-0 pe-2">
                <a class="btn btn-success btn-sm " aria-current="page" href="{{ url('/cart') }}">Cart</a>
            </div>
            @endif
            @if (Auth::user()->hasRole('customer'))
            <div class="col p-0">
                <div class="btn-group btn-outline-success dropdown me-md-2">
                    <a class="btn btn-success btn-sm" aria-current="page" href="{{ url('/dashboard') }}">Account</a>
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false" aria-current="page"><span
                            class="visually-hidden">Toggle Dropdown</span></button>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-sm">
                        <li>
                            <a class="dropdown-item text-center" href="{{ url('/purchases') }}">Purchase History</a>
                        </li>
                        <a class="dropdown-item text-center" href="{{ url('/reward') }}">Rewards</a>
                        <li>
                        </li>
                    </ul>
                </div>
            </div>
            @elseif (Auth::user()->hasRole('admin'))
            <div class="col nav-item p-0 pe-2">
                <div class="btn-group btn-outline-success dropdown">
                    <a class="btn btn-success btn-sm " aria-current="page" href="{{ url('/dashboard') }}">Account</a>
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false" aria-current="page"><span
                            class="visually-hidden">Toggle Dropdown</span></button>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-sm">
                        <li>
                            <a class="dropdown-item text-center" href="{{ url('/revenue') }}">Revenue Analysis</a>
                        </li>
                        <a class="dropdown-item text-center" href="{{ url('/payroll') }}">Employee Payroll</a>
                        <li>
                        </li>
                    </ul>
                </div>
            </div>
            @else
            <div class="col-auto p-0 pe-2">
                <a class="btn btn-success btn-sm" aria-current="page" href="{{ url('/dashboard') }}">Account</a>
            </div>
            @endif
            <div class="col-auto p-0 pe-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="btn btn-success btn-sm" onclick="event.preventDefault();this.closest('form').submit();"
                        :href="route('logout')" style="cursor: pointer;">LogOut</a>
                </form>
            </div>
            @else
            <div class="col p-0">
                <a class="btn btn-success btn-sm me-md-2" aria-current="page" href="{{ route('login') }}">Log In</a>
            </div>
            @if (Route::has('register'))
            <div class="col p-0">
                <a class="btn btn-success btn-sm" aria-current="page" href="{{ route('register') }}">Register</a>
            </div>
            @endif
            @endauth
            @endif
        </div>

    </div>
</nav>