@extends('auth.layouts.app')

@section('title', translation('Verify Account'))

@section('content')
    <form id="verify-form" class="auth-form" action="{{ route('auth.verify') }}" method="POST">
        @csrf

        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            {{ translation('Verify Account') }}
        </h1>

        @if (isset($email))
            <div class="verify-msg">
                {{ translation('We have sent a verification code to your email') }} :
                <strong>{{ $email }}</strong>
            </div>
        @endif
        <input type="hidden" name="email" value="{{ $email }}">

        <label class="mb-4">
            <span>{{ translation('OTP') }}</span>
            <input type="text" name="otp" value="{{ old('email') }}" maxlength="6" inputmode="numeric" pattern="\d{6}"
                placeholder="123456" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);" required />
            @error('otp')
                <span class="validate-msg invalid">{{ translation($message) }}</span>
            @enderror
        </label>

        <button type="submit" class="submit">
            {{ translation('Verify OTP') }}
        </button>

        <hr class="my-8" />

        <p class="mt-4">
            <a href="{{ route('auth.get.login') }}">
                {{ translation('Login') }}
            </a>
        </p>

        <p class="mt-1">
            <a href="{{ route('auth.get.register') }}">
                {{ translation('Create account') }}
            </a>
        </p>
    </form>
@endsection
