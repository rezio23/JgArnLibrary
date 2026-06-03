@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div class="login-wrapper">
    <div class="login-card">
        <div class="login-brand">
            <i class="bi bi-book-half"></i>
            <h3>JgArn Library</h3>
            <p>Create your account</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="form-label">Name</label>
                <div class="input-icon-wrap">
                    <i class="bi bi-person"></i>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Your name" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-icon-wrap">
                    <i class="bi bi-envelope"></i>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="input-icon-wrap">
                    <i class="bi bi-lock"></i>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Min. 6 characters" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-icon-wrap">
                    <i class="bi bi-lock"></i>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat your password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-login">Register</button>
        </form>

        <div class="hint-text">
            Already have an account? <a href="{{ route('login') }}" style="color: #ffffff; text-decoration: underline;">Sign in</a>
        </div>
    </div>
</div>
@endsection
