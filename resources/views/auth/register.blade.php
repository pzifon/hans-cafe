<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="max-width: 450px;">
        <a href="/" style="margin-left: auto; margin-right: auto;">
            <img src="{{ asset('storage/img/logo.png') }}" class="mx-auto" alt=""
                style="max-width: 200px; max-height:200px; margin: auto;" >
        </a>
        <div class="card" style="padding-left: 20px; padding-right: 20px;">
            <div class="card-body">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <label for="name" class="form-label">Full Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" :value="old('name')" required />
                    </div>

                    <!-- Contact number -->
                    <label for="contact" class="form-label">Contact</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="contact" name="contact" :value="old('contact')"
                            pattern="^(01)[0-9]{8,9}$" placeholder="eg. 01XXXXXXXX" required />
                    </div>

                    <!-- Email Address -->
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="email" name="email" :value="old('email')"
                            required />
                    </div>

                    <!-- Password -->
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                            autocomplete="new-password" required />
                    </div>

                    <!--Confirm Password -->
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" autocomplete="new-password" required />
                    </div>

                    <!-- Default Role -->
                    <input id="role" type="hidden" name="role" value="customer" />

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <button class="btn btn-success" style="float: right;">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>