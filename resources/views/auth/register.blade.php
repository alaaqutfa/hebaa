@extends('auth.layouts.app')

@section('title', translation('Register'))

@section('content')
    <form id="register-form" class="auth-form" action="{{ route('auth.register') }}" method="POST">
        @csrf

        <h1>
            {{ translation('Create account') }}
        </h1>

        <div class="multi-label">

            <label class="name-label">
                <span>{{ translation('Name') }}</span>
                <input type="text" name="name" value="{{ old('name') }}" class="@error('name') invalid @enderror"
                    placeholder="{{ translation('Your Name') }}" required />
                @error('name')
                    <span class="validate-msg invalid">{{ translation($message) }}</span>
                @enderror
            </label>

            <label class="email-label">
                <span>{{ translation('Last Name') }}</span>
                <input type="text" name="last_name" value="{{ old('last_name') }}"
                    class="@error('last_name') invalid @enderror" placeholder="{{ translation('Your Last Name') }}"
                    required />
                @error('last_name')
                    <span class="validate-msg invalid">{{ translation($message) }}</span>
                @enderror
            </label>

        </div>

        <label class="email-label">
            <span>{{ translation('Email') }}</span>
            <input type="email" name="email" value="{{ old('email') }}" class="@error('email') invalid @enderror"
                placeholder="email@example.com" required />
            @error('email')
                <span class="validate-msg invalid">{{ translation($message) }}</span>
            @enderror
        </label>

        <label class="phone-label">
            <span>{{ translation('Phone') }}</span>
            <input type="tel" name="phone" value="{{ old('phone') }}"
                class="phoneField @error('phone') invalid @enderror" placeholder="+XXXXXXXX" required />
            @error('phone')
                <span class="validate-msg invalid">{{ translation($message) }}</span>
            @enderror
        </label>

        <label class="password-label mt-4">
            <span>{{ translation('Password') }}</span>
            <input type="text" name="password" value="{{ old('password') }}"
                class="@error('password') invalid @enderror" placeholder="***************" required />
            @error('password')
                <span class="validate-msg invalid">{{ translation($message) }}</span>
            @enderror
        </label>

        <label class="w-full password_confirmation-label mt-4">
            <span>
                {{ translation('Confirm password') }}
            </span>
            <input type="text" name="password_confirmation" value="{{ old('password_confirmation') }}"
                class="@error('password_confirmation') invalid @enderror" placeholder="***************" required />
            @error('password_confirmation')
                <span class="validate-msg invalid">{{ translation($message) }}</span>
            @enderror
        </label>

        <div class="mt-6 w-full flex justify-start items-start flex-col gap-1">
            <label>
                <input type="checkbox" name="privacy" required />
                <span class="ml-2">
                    {{ translation('I agree to the') }}
                    <a href="{{ route('privacy-policy') }}" class="underline">{{ translation('privacy policy') }}</a>
                </span>
            </label>
            @error('privacy')
                <span class="validate-msg invalid">{{ translation($message) }}</span>
            @enderror
        </div>

        <button type="submit" class="submit" onclick="this.disabled=true; this.form.submit();">
            {{ translation('Create account') }}
        </button>

        <hr class="my-8" />

        <p class="mt-4">
            <a href="{{ route('auth.get.login') }}">
                {{ translation('Already have an account? Login') }}
            </a>
        </p>
    </form>
@endsection
