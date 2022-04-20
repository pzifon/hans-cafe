<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="max-width: 450px;">
        <a href="/" style="margin-left: auto; margin-right: auto;">
            <img src="{{ asset('storage/img/logo.png') }}" class="mx-auto" alt=""
                style="max-width: 200px; max-height:200px; margin: auto;">
        </a>
        <div class="card" style="padding-left: 20px; padding-right: 20px;">
            <div class="card-body">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" name="email" :value="old('email')" required
                            autofocus />
                    </div>

                    <!-- Password -->
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password" :value="old('email')"
                            required autofocus />
                    </div>

                    <!-- Remember Me -->
                    <div class="input-group mb-3">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="">
                        @if (Route::has('password.request'))
                        <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                        </a> -->
                        @endif
                        <a class="underline" href="{{ route('register') }}">
                            {{ __("Don't have an account yet?") }}
                        </a>

                        <button class="btn btn-success" style="float: right;    ">
                            {{ __('Log in') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>