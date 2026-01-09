@extends('layouts.app')

@section('content')

<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-5">

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">

                <!-- Title -->
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary">Welcome Back 👋</h3>
                    <p class="text-muted">Login to your account</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Enter your email"
                               required autofocus>

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Enter your password"
                               required>

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="remember"
                                   id="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-decoration-none">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg">
                            🔐 Login
                        </button>
                    </div>
                </form>

                <!-- Register -->
                <div class="text-center mt-4">
                    <p class="mb-0">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="fw-semibold">
                            Register
                        </a>
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
