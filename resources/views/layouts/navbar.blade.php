<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white sticky-top" style="width:100%">
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
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/booking">Booking</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link active" onclick="event.preventDefault();this.closest('form').submit();"
                            :href="route('logout')" class="text-sm text-gray-700 dark:text-gray-500 underline"
                            style="cursor: pointer;">Log out</a>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/cart') }}">Cart</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Log In</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>