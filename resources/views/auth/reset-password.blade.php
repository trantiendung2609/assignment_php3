{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center
          min-vh-100">
            <div class="col-12 col-md-8 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5>Reset Password?</h5>
                        </div>
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" :value="__('Email')" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    :value="old('email', $request - > email)" required autofocus autocomplete="username"
                                    placeholder="Enter Your Email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" :value="__('Password')" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required
                                    autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmation Password</label>
                                <input type="password" id="password_confirmation" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
