@extends('admin.layouts.app')

@section('title', translation('Team'))

@section('content')
    <div class="categories-container container">

        <div class="top-bar">

            <div class="title">
                <h1>
                    {{ translation('Team') }}
                </h1>
            </div>

            <div class="actions">

                <button type="button" class="btn" @click="openModal('add-team-modal')" tabindex="1">
                    <span>{{ translation('Add New') }}</span>
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="10" width="8.75"
                        viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                </button>

            </div>

        </div>

        <div class="table-wrapper">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>{{ translation('Name') }}</th>
                            <th>{{ translation('Email') }}</th>
                            <th>{{ translation('Phone') }}</th>
                            <th>{{ translation('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($admins->count() > 0)
                            @foreach ($admins as $admin)
                                <tr>
                                    <td class="text-sm">
                                        {{ $admin->name }} {{ $admin->last_name }}
                                    </td>
                                    <td class="text-sm">
                                        {{ $admin->email }}
                                    </td>
                                    <td class="text-sm">
                                        {{ $admin->phone ?? '-' }}
                                    </td>
                                    <td class="actions">
                                        <div class="flex justify-center items-center space-x-4 text-sm">

                                            <!-- زر تعديل -->
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none"
                                                aria-label="Edit"
                                                @click="openModal('edit-team-modal-{{ $admin->id }}')">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>

                                            <!-- زر حذف -->
                                            <form action="{{ route('admin.team.destroy', $admin->id) }}" method="POST"
                                                onsubmit="return confirm('{{ translation('Are you sure you want to delete this admin?') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- روابط التصفح -->
                            <tr>
                                <td colspan="4">
                                    {{ $admins->links() }}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="4">
                                    {{ translation('No data found.') }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection

@section('modal')
    <!-- Add Category Modal -->
    <div id="add-team-modal" class="modal">
        <!-- Modal -->
        <div class="modal-content" role="dialog">
            <!-- Header -->
            <header>
                <h2>{{ translation('Add Team Member') }}</h2>
                <button @click="closeModal('add-team-modal')">
                    ✕
                </button>
            </header>

            <!-- Form -->
            <form action="{{ route('admin.team.register') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label class="name-label">
                    <span>{{ translation('Avatar Image') }}</span>
                    <input type="file" id="basicImage" name="avatar" @change="handleBasicImage($event)"
                        class="w-full upload-image-input" hidden required />
                    <button type="button" class="upload-image-btn" @click="triggerFile('basicImage')">
                        {{ translation('Upload Image') }}
                    </button>
                    <img v-if="basicImagePreview" :src="basicImagePreview"
                        class="w-32 h-32 object-cover rounded cursor-pointer" @click="triggerFile('basicImage')"
                        alt="Basic Image" />
                    @error('avatar')
                        <span validate-msg invalid>{{ $message }}</span>
                    @enderror
                </label>

                <label class="name-label">
                    <span>{{ translation('Name') }}</span>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="@error('name') invalid @enderror" placeholder="{{ translation('Your Name') }}" required />
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

                <label class="email-label">
                    <span>{{ translation('Email') }}</span>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="@error('email') invalid @enderror" placeholder="email@example.com" required />
                    @error('email')
                        <span class="validate-msg invalid">{{ translation($message) }}</span>
                    @enderror
                </label>

                <label class="phone-label">
                    <span>{{ translation('Phone') }}</span>
                    <input type="tel" name="phone" value="{{ old('phone') }}"
                        class="phoneField @error('phone') invalid @enderror" placeholder="+XXXXXXXX" />
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

                <!-- Footer -->
                <button type="submit" class="submit">
                    {{ translation('Add') }}
                </button>

            </form>
        </div>
    </div>
    @foreach ($admins as $admin)
        <!-- Edit Team Member Modal -->
        <div id="edit-team-modal-{{ $admin->id }}" class="modal">
            <div class="modal-content" role="dialog">
                <!-- Header -->
                <header>
                    <h2>{{ translation('Edit Team Member') }}</h2>
                    <button @click="closeModal('edit-team-modal-{{ $admin->id }}')">
                        ✕
                    </button>
                </header>

                <!-- Form -->
                <form action="{{ route('admin.team.update', $admin->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- صورة أساسية -->
                    <label class="mt-4">
                        <span>{{ translation('Basic Image') }}</span>

                        <!-- حقل رفع الصورة -->
                        <input type="file" id="basicImage{{ $admin->id }}" name="avatar"
                            @change="handleBasicImage($event)" class="w-full upload-image-input" hidden />

                        <!-- زر رفع الصورة -->
                        <button type="button" class="upload-image-btn"
                            @click="triggerFile('basicImage{{ $admin->id }}')">
                            {{ translation('Upload Image') }}
                        </button>

                        <!-- عرض الصورة الجديدة عند الاختيار -->
                        <img v-if="basicImagePreview" :src="basicImagePreview"
                            class="w-32 h-32 object-cover rounded border mt-2 cursor-pointer"
                            @click="triggerFile('basicImage{{ $admin->id }}')" alt="New Basic Image" />

                        <!-- عرض الصورة القديمة فقط إن لم يتم رفع صورة جديدة -->
                        <img v-else src="{{ asset('storage/' . $admin->avatar) }}"
                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'"
                            class="w-32 h-32 object-cover rounded border mt-2 cursor-pointer"
                            @click="triggerFile('basicImage{{ $admin->id }}')" alt="Current Basic Image" />

                        <!-- رسالة الخطأ -->
                        @error('avatar')
                            <span validate-msg invalid>{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="name-label">
                        <span>{{ translation('Name') }}</span>
                        <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                            class="@error('name') invalid @enderror" placeholder="{{ translation('Your Name') }}"
                            required />
                        @error('name')
                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                        @enderror
                    </label>

                    <label class="email-label">
                        <span>{{ translation('Last Name') }}</span>
                        <input type="text" name="last_name" value="{{ old('last_name', $admin->last_name) }}"
                            class="@error('last_name') invalid @enderror"
                            placeholder="{{ translation('Your Last Name') }}" required />
                        @error('last_name')
                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                        @enderror
                    </label>

                    <label class="email-label">
                        <span>{{ translation('Email') }}</span>
                        <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                            class="@error('email') invalid @enderror" placeholder="email@example.com" required />
                        @error('email')
                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                        @enderror
                    </label>

                    <label class="phone-label">
                        <span>{{ translation('Phone') }}</span>
                        <input type="tel" name="phone" value="{{ old('phone', $admin->phone) }}"
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
        </div>
    @endforeach
@endsection
