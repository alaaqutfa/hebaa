@extends('auth.layouts.app')

@section('title', translation('Reset Password'))

@section('content')

    <form id="reset-form" class="auth-form" action="{{ route('auth.reset') }}" method="POST">
        @csrf

        <h1>
            {{ translation('Reset Password') }}
        </h1>

        <input type="hidden" name="email" value="{{ $email }}">

        <label>
            <span>{{ translation('New Password') }}</span>
            <input type="text" name="password" value="{{ old('password') }}" placeholder="***************" required />
            @error('password')
                <span class="validate-msg invalid">{{ translation($message) }}</span>
            @enderror
        </label>

        <label class="mt-4">
            <span>
                {{ translation('Confirm password') }}
            </span>
            <input type="text" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="***************" required />
            @error('password_confirmation')
                <span class="validate-msg invalid">{{ translation($message) }}</span>
            @enderror
        </label>

        <button type="submit" class="submit">
            {{ translation('Reset Password') }}
        </button>

        <hr class="my-8" />

    </form>
@endsection
