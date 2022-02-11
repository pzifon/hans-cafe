<style>
    body {
        font-family: 'Nunito', sans-serif;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover:not(.active) {
        background-color: #111;
    }

    .active {
        background-color: #04AA6D;
    }
</style>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100" style="position:fixed;width:100%">
            <ul>
                <li><a href="/">Hans Cafe</a></li>
                <li><a href="/menu">Menu</a></li>
                <li><a href="/booking">Booking</a></li>
                @if (Route::has('login'))
                @auth
                    <li style="float:right">
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                            <a class="active" onclick="event.preventDefault();this.closest('form').submit();":href="route('logout')"
                            class="text-sm text-gray-700 dark:text-gray-500 underline">Log out</a>
                        </form>
                    </li>
                    <li style="float:right"><a class="active" href="{{ url('/loyalty') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Account</a></li>
                @else
                    <li style="float:right"><a class="active" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>
                @if (Route::has('register'))
                    <li style="float:right"><a class="active" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                @endif
                @endauth
                @endif
            </ul>
            <!-- <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot> -->
</nav>
