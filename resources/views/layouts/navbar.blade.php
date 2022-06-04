<nav class="navbar navbar-expand-sm navbar-dark bg-dark text-white sticky-top" style="width:100%;height:100%;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Hans Cafe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
        <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                @if (Route::has('login'))
                @auth
                @if (Auth::user()->hasRole('employee'))
                @if (App\Http\Controllers\ClockInController::check())
                <li class="nav-item">
                    <a class="btn btn-light me-md-2" aria-current="page" href="{{ url('/clockOut') }}">Clock Out</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="btn btn-light me-md-2" aria-current="page" href="{{ url('/clockIn')}}">Clock In</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="btn btn-success me-md-2" aria-current="page" href="{{ url('/order') }}">Order</a>
                </li>
                @elseif (Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="btn btn-success me-md-2" aria-current="page" href="{{ url('/order') }}">Order</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="btn btn-success me-md-2" aria-current="page" href="{{ url('/cart') }}">Cart</a>
                </li>
                @endif
                @if (Auth::user()->hasRole('customer'))
                <li class="nav-item">
                    <div class="btn-group btn-outline-success dropdown me-md-2">
                        <a class="btn btn-success" aria-current="page" href="{{ url('/dashboard') }}">Account</a>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split"
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
                </li>
                @elseif (Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <div class="btn-group btn-outline-success dropdown me-md-2">
                        <a class="btn btn-success" aria-current="page" href="{{ url('/dashboard') }}">Account</a>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split"
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
                </li>
                @else
                <li class="nav-item">
                    <a class="btn btn-success me-md-2" aria-current="page" href="{{ url('/dashboard') }}">Account</a>
                </li>
                @endif
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="btn btn-success" onclick="event.preventDefault();this.closest('form').submit();"
                            :href="route('logout')" style="cursor: pointer;">Log out</a>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="btn btn-success me-md-2" aria-current="page" href="{{ route('login') }}">Log In</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="btn btn-success" aria-current="page" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>