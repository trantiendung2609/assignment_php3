<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ URL::asset('resources/css/font-face.css') }}" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ URL::asset('layout/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('layout/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('layout/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('layout/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('layout/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('layout/css/owl.theme.default.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ URL::asset('layout/css/aos.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('layout/css/style.css') }}">

</head>

<body>
    <div class="site-wrap ">
        <div class="site-section">
            <div class="container">
                <section class="vh-100">
                    <div class="container-fluid h-custom">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-md-9 col-lg-6 col-xl-5">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                                    class="img-fluid" alt="Sample image">
                            </div>
                            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div
                                        class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                        <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                                        <button type="button" style="border-radius:20px;"
                                            class="btn btn-primary btn-floating mx-1">
                                            <i class="icon icon-facebook"></i>
                                        </button>

                                        <button type="button" style="border-radius:20px;"
                                            class="btn btn-primary btn-floating mx-1">
                                            <i class="icon icon-google"></i>
                                        </button>

                                        <button type="button" style="border-radius:20px;"
                                            class="btn btn-primary btn-floating mx-1">
                                            <i class="icon icon-github"></i>
                                        </button>
                                    </div>

                                    <div class="divider d-flex align-items-center my-4">
                                        <p class="text-center fw-bold mx-3 mb-0">Or</p>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <x-input-label for="email" class="form-label" :value="__('Email')" />
                                        <x-text-input id="email" class="form-control form-control-lg"
                                            placeholder="Enter a valid email address" type="email" name="email"
                                            :value="old('email')" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <!-- Password input -->
                                    <div class="form-outline mb-3">
                                        <label :value="__('Password')"class="form-label"
                                            for="form3Example4">Password</label>
                                        <input name="password" type="password" id="form3Example4"
                                            class="form-control form-control-lg" placeholder="Enter password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Checkbox -->
                                        <div class="form-check mb-0">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3" />
                                            <label class="form-check-label" for="form2Example3">
                                                {{ __('Remember me') }}
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                    href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="text-center text-lg-start mt-4 pt-2">

                                        <x-primary-button class="btn btn-primary btn-lg"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                            {{ __('Log in') }}
                                        </x-primary-button>

                                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                                href="/register" class="link-danger">Register</a></p>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


    </div>

    <script src="{{ URL::asset('layout/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('layout/js/jquery-ui.js') }}"></script>
    <script src="{{ URL::asset('layout/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('layout/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('layout/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('layout/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('layout/js/aos.js') }}"></script>

    <script src="{{ URL::asset('layout/js/main.js') }}"></script>

</body>

</html>
