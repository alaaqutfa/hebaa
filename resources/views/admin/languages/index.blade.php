@extends('admin.layouts.app')

@section('title', translation('Languages'))

@dd($languages)

@section('content')
    <div class="container">

        <div class="top-bar">

            <div class="title">
                <h1>{{ translation('Languages') }}</h1>
            </div>

            <div class="actions">

                <button type="button" class="btn" @click="openModal('add-lang-modal')" tabindex="1">
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
                            <th>{{ translation('Code') }}</th>
                            <th>{{ translation('Direction') }}</th>
                            <th>{{ translation('Active') }}</th>
                            <th>{{ translation('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count(getLanguage()) > 0)
                            @foreach (getLanguage() as $lang)
                                <tr>
                                    <td>{{ $lang->name }}</td>
                                    <td>{{ $lang->code }}</td>
                                    <td>
                                        @if ($lang->direction == 'ltr')
                                            {{ translation('From left to right') }}
                                        @else
                                            {{ translation('From right to left') }}
                                        @endif
                                    </td>
                                    <td>{{ $lang->is_active }}</td>
                                    <td class="actions">
                                        <div class="flex justify-center items-center space-x-4 text-sm">
                                            <a href="{{ route('admin.translations.edit', $lang->code) }}"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Translate">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 640 512">
                                                    <path
                                                        d="M0 128C0 92.7 28.7 64 64 64l192 0 48 0 16 0 256 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64l-256 0-16 0-48 0L64 448c-35.3 0-64-28.7-64-64L0 128zm320 0l0 256 256 0 0-256-256 0zM178.3 175.9c-3.2-7.2-10.4-11.9-18.3-11.9s-15.1 4.7-18.3 11.9l-64 144c-4.5 10.1 .1 21.9 10.2 26.4s21.9-.1 26.4-10.2l8.9-20.1 73.6 0 8.9 20.1c4.5 10.1 16.3 14.6 26.4 10.2s14.6-16.3 10.2-26.4l-64-144zM160 233.2L179 276l-38 0 19-42.8zM448 164c11 0 20 9 20 20l0 4 44 0 16 0c11 0 20 9 20 20s-9 20-20 20l-2 0-1.6 4.5c-8.9 24.4-22.4 46.6-39.6 65.4c.9 .6 1.8 1.1 2.7 1.6l18.9 11.3c9.5 5.7 12.5 18 6.9 27.4s-18 12.5-27.4 6.9l-18.9-11.3c-4.5-2.7-8.8-5.5-13.1-8.5c-10.6 7.5-21.9 14-34 19.4l-3.6 1.6c-10.1 4.5-21.9-.1-26.4-10.2s.1-21.9 10.2-26.4l3.6-1.6c6.4-2.9 12.6-6.1 18.5-9.8l-12.2-12.2c-7.8-7.8-7.8-20.5 0-28.3s20.5-7.8 28.3 0l14.6 14.6 .5 .5c12.4-13.1 22.5-28.3 29.8-45L448 228l-72 0c-11 0-20-9-20-20s9-20 20-20l52 0 0-4c0-11 9-20 20-20z" />
                                                </svg>
                                            </a>
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Edit"
                                                @click="openModal('edit-lang-modal-{{ $lang->id }}')">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <form action="{{ route('admin.languages.destroy', $lang->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
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
                        @else
                            <tr>
                                <td colspan="5">
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
    <!-- Add Language Modal -->
    <div id="add-lang-modal" class="modal">
        <!-- Modal -->
        <div class="modal-content" role="dialog">
            <!-- Header -->
            <header>
                <h2>{{ translation('Add Language') }}</h2>
                <button @click="closeModal('add-lang-modal')">
                    ✕
                </button>
            </header>

            <!-- Form -->
            <form action="{{ route('admin.languages.store') }}" method="POST">
                @csrf
                <label>
                    <span>{{ translation('Language name') }}</span>
                    <input name="name" value="{{ old('name') }}"
                        placeholder="{{ translation('Enter language name') }}" required />
                    @error('name')
                        <span class="validate-msg invalid">{{ translation($message) }}</span>
                    @enderror
                </label>
                <label class="mt-6">
                    <span>{{ translation('Language code') }}</span>
                    <input name="code" value="{{ old('code') }}"
                        placeholder="{{ translation('Enter language code') }}" required />
                    @error('code')
                        <span class="validate-msg invalid">{{ translation($message) }}</span>
                    @enderror
                </label>
                <label class="mt-6">
                    <span>{{ translation('Language direction') }}</span>
                    <select name="direction" required>
                        <option value="ltr" {{ old('direction') === 'ltr' ? 'selected' : '' }}>
                            {{ translation('Left to Right') }}</option>
                        <option value="rtl" {{ old('direction') === 'rtl' ? 'selected' : '' }}>
                            {{ translation('Right to Left') }}</option>
                    </select>
                    @error('direction')
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
    @foreach (getLanguage() as $lang)
        <!-- Edit Language Modal -->
        <div id="edit-lang-modal-{{ $lang->id }}" class="modal">
            <!-- Modal -->
            <div class="modal-content" role="dialog">
                <!-- Header -->
                <header>
                    <h2>{{ translation('Edit Language') }}</h2>
                    <button @click="closeModal('edit-lang-modal-{{ $lang->id }}')">
                        ✕
                    </button>
                </header>

                <!-- Form -->
                <form action="{{ route('admin.languages.update', $lang->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $lang->id }}" />

                    <label>
                        <span>{{ translation('Language Name') }}</span>
                        <input name="name" value="{{ $lang->name }}"
                            placeholder="{{ translation('Enter language name') }}" required />
                        @error('name')
                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                        @enderror
                    </label>

                    <label class="mt-6">
                        <span>{{ translation('Language Code') }}</span>
                        <input name="code" value="{{ $lang->code }}"
                            placeholder="{{ translation('Enter language code') }}" required />
                        @error('code')
                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                        @enderror
                    </label>

                    <label class="mt-6">
                        <span>{{ translation('Language Direction') }}</span>
                        <select name="direction" required>
                            <option value="ltr" {{ old('direction') === 'ltr' ? 'selected' : '' }}>
                                {{ translation('Left to Right') }}</option>
                            <option value="rtl" {{ old('direction') === 'rtl' ? 'selected' : '' }}>
                                {{ translation('Right to Left') }}</option>
                        </select>
                        @error('direction')
                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                        @enderror
                    </label>

                    <button type="submit" class="submit">
                        {{ translation('Save') }}
                    </button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
