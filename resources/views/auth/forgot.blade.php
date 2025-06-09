@extends('auth.layouts.app')

@section('title', translation('Forgot'))

@section('content')
    <form id="forgot-form" class="auth-form" action="{{ route('auth.forgot') }}" method="POST">
        @csrf

        <h1>
            {{ translation('Forgot password') }}
        </h1>

        <label>
            <span>{{ translation('Email') }}</span>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="email@example.com" required />
            @error('email')
                <span class="validate-msg invalid">{{ translation($message) }}</span>
            @enderror
        </label>

        <button type="submit" class="submit">
            {{ translation('Recover password') }}
        </button>

        <hr class="my-8" />

        <p class="mt-1">
            <a href="{{ route('auth.get.login') }}">
                {{ translation('Remember your password? Login') }}
            </a>
        </p>

    </form>
@endsection
