@extends('web.layouts.app')

@section('title', translation('Profile'))

@section('content')

    <div class="container mx-auto mb-6">
        <!-- Page Title -->
        <div class="page-title">
            <div class="title-wrapper">
                <h1>{{ translation('Profile') }}</h1>
            </div>
        </div><!-- End Page Title -->
        <!-- Form -->
        <form action="{{ route('update.profile', $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- صورة أساسية -->
            <label class="mt-4">
                <span>{{ translation('Basic Image') }}</span>

                <!-- حقل رفع الصورة -->
                <input type="file" id="basicImage{{ $client->id }}" name="avatar" @change="handleBasicImage($event)"
                    class="w-full upload-image-input" hidden />

                <!-- زر رفع الصورة -->
                <button type="button" class="upload-image-btn" @click="triggerFile('basicImage{{ $client->id }}')">
                    {{ translation('Upload Image') }}
                </button>

                <!-- عرض الصورة الجديدة عند الاختيار -->
                <img v-if="basicImagePreview" :src="basicImagePreview"
                    class="w-32 h-32 object-cover rounded border mt-2 cursor-pointer"
                    @click="triggerFile('basicImage{{ $client->id }}')" alt="New Basic Image" />

                <!-- عرض الصورة القديمة فقط إن لم يتم رفع صورة جديدة -->
                <img v-else src="{{ asset('storage/' . $client->avatar) }}"
                    onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'"
                    class="w-32 h-32 object-cover rounded border mt-2 cursor-pointer"
                    @click="triggerFile('basicImage{{ $client->id }}')" alt="Current Basic Image" />

                <!-- رسالة الخطأ -->
                @error('avatar')
                    <span validate-msg invalid>{{ $message }}</span>
                @enderror
            </label>

            <label class="name-label mt-4">
                <span>{{ translation('Name') }}</span>
                <input type="text" name="name" value="{{ old('name', $client->name) }}"
                    class="@error('name') invalid @enderror" placeholder="{{ translation('Your Name') }}" required />
                @error('name')
                    <span class="validate-msg invalid">{{ translation($message) }}</span>
                @enderror
            </label>

            <label class="email-label mt-4">
                <span>{{ translation('Last Name') }}</span>
                <input type="text" name="last_name" value="{{ old('last_name', $client->last_name) }}"
                    class="@error('last_name') invalid @enderror" placeholder="{{ translation('Your Last Name') }}"
                    required />
                @error('last_name')
                    <span class="validate-msg invalid">{{ translation($message) }}</span>
                @enderror
            </label>

            <label class="email-label mt-4">
                <span>{{ translation('Email') }}</span>
                <input type="email" name="email" value="{{ old('email', $client->email) }}"
                    class="@error('email') invalid @enderror" placeholder="email@example.com" required />
                @error('email')
                    <span class="validate-msg invalid">{{ translation($message) }}</span>
                @enderror
            </label>

            <label class="phone-label mt-4">
                <span>{{ translation('Phone') }}</span>
                <input type="tel" name="phone" value="{{ old('phone', $client->phone) }}"
                    class="phoneField @error('phone') invalid @enderror" placeholder="+XXXXXXXX" />
                @error('phone')
                    <span class="validate-msg invalid">{{ translation($message) }}</span>
                @enderror
            </label>

            <label class="password-label mt-4">
                <span>{{ translation('Password (leave blank to keep current)') }}</span>
                <input type="password" name="password" class="@error('password') invalid @enderror"
                    placeholder="***************" />
                @error('password')
                    <span class="validate-msg invalid">{{ translation($message) }}</span>
                @enderror
            </label>

            <label class="password_confirmation-label mt-4">
                <span>{{ translation('Confirm Password') }}</span>
                <input type="password" name="password_confirmation"
                    class="@error('password_confirmation') invalid @enderror" placeholder="***************" />
                @error('password_confirmation')
                    <span class="validate-msg invalid">{{ translation($message) }}</span>
                @enderror
            </label>

            <!-- Footer -->
            <button type="submit" class="submit mt-4">
                {{ translation('Save Changes') }}
            </button>
        </form>

    </div>
@endsection
