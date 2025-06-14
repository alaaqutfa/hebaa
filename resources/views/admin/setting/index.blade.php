@extends('admin.layouts.app')

@section('title', translation('Settings'))

@section('content')
    <div class="container mb-6">

        <div class="title">
            <h1>{{ translation('Settings') }}</h1>
        </div>

        <hr />

        <div class="title">
            <h1>{{ translation('Site Informations') }}</h1>
        </div>

        <div class="table-wrapper">
            <div class="table-container">
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2">
                                {{ translation('Basic Informations') }}
                            </td>
                        </tr>
                        <tr>
                            <td>{{ translation('Site Title') }}</td>
                            <td class="actions">
                                <form action="{{ route('admin.editSetting') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="key" value="site_title" />
                                    <label>
                                        <div class="iconed-input">
                                            <input type="text" name="value"
                                                value="{{ translation(getSetting('site_title')) }}" required />
                                            <button type="submit" class="icon">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('value')
                                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                                        @enderror
                                    </label>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ translation('Address 1') }}</td>
                            <td class="actions">
                                <form action="{{ route('admin.editSetting') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="key" value="address_1" />
                                    <label>
                                        <div class="iconed-input">
                                            <input type="text" name="value"
                                                value="{{ translation(getSetting('address_1')) }}" required />
                                            <button type="submit" class="icon">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('value')
                                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                                        @enderror
                                    </label>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ translation('Address 2') }}</td>
                            <td class="actions">
                                <form action="{{ route('admin.editSetting') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="key" value="address_2" />
                                    <label>
                                        <div class="iconed-input">
                                            <input type="text" name="value"
                                                value="{{ translation(getSetting('address_2')) }}" required />
                                            <button type="submit" class="icon">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('value')
                                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                                        @enderror
                                    </label>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ translation('Site Email') }}</td>
                            <td class="actions">
                                <form action="{{ route('admin.editSetting') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="key" value="email" />
                                    <label>
                                        <div class="iconed-input">
                                            <input type="text" name="value" value="{{ getSetting('email') }}"
                                                required />
                                            <button type="submit" class="icon">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('value')
                                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                                        @enderror
                                    </label>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ translation('Site Phone') }}</td>
                            <td class="actions">
                                <form action="{{ route('admin.editSetting') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="key" value="phone" />
                                    <label>
                                        <div class="iconed-input">
                                            <input type="text" name="value" value="{{ getSetting('phone') }}"
                                                required />
                                            <button type="submit" class="icon">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('value')
                                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                                        @enderror
                                    </label>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">{{ translation('Social Links') }}</td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="28" width="28"
                                        fill="currentColor" viewBox="0 0 512 512">
                                        <path
                                            d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                                    </svg>
                                </center>
                            </td>
                            <td class="actions">
                                <form action="{{ route('admin.editSetting') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="key" value="facebook" />
                                    <label>
                                        <div class="iconed-input">
                                            <input type="text" name="value" value="{{ getSetting('facebook') }}"
                                                required />
                                            <button type="submit" class="icon">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('value')
                                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                                        @enderror
                                    </label>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="28" width="28"
                                        fill="currentColor" viewBox="0 0 512 512">
                                        <path
                                            d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                    </svg>
                                </center>
                            </td>
                            <td class="actions">
                                <form action="{{ route('admin.editSetting') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="key" value="twitter" />
                                    <label>
                                        <div class="iconed-input">
                                            <input type="text" name="value" value="{{ getSetting('twitter') }}"
                                                required />
                                            <button type="submit" class="icon">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('value')
                                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                                        @enderror
                                    </label>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="28" width="24"
                                        fill="currentColor" viewBox="0 0 448 512">
                                        <path
                                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                    </svg>
                                </center>
                            </td>
                            <td class="actions">
                                <form action="{{ route('admin.editSetting') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="key" value="instagram" />
                                    <label>
                                        <div class="iconed-input">
                                            <input type="text" name="value" value="{{ getSetting('instagram') }}"
                                                required />
                                            <button type="submit" class="icon">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('value')
                                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                                        @enderror
                                    </label>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="28" width="32"
                                        fill="currentColor" viewBox="0 0 576 512">
                                        <path
                                            d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                                    </svg>
                                </center>
                            </td>
                            <td class="actions">
                                <form action="{{ route('admin.editSetting') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="key" value="youtube" />
                                    <label>
                                        <div class="iconed-input">
                                            <input type="text" name="value" value="{{ getSetting('youtube') }}"
                                                required />
                                            <button type="submit" class="icon">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('value')
                                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                                        @enderror
                                    </label>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="28" width="24"
                                        fill="currentColor" viewBox="0 0 448 512">
                                        <path
                                            d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                                    </svg>
                                </center>
                            </td>
                            <td class="actions">
                                <form action="{{ route('admin.editSetting') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="key" value="tiktok" />
                                    <label>
                                        <div class="iconed-input">
                                            <input type="text" name="value" value="{{ getSetting('tiktok') }}"
                                                required />
                                            <button type="submit" class="icon">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        @error('value')
                                            <span class="validate-msg invalid">{{ translation($message) }}</span>
                                        @enderror
                                    </label>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <hr class="mt-6" />

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
                        @if (count(getAdminLanguage()) > 0)
                            @foreach (getAdminLanguage() as $lang)
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
                                    <td>
                                        <form action="{{ route('admin.languages.toggle-active', $lang->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="active-btn {{ $lang->is_active ? 'active' : '' }}">
                                                {{ $lang->is_active ? translation('active') : translation('inactive') }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="actions">
                                        <div class="flex justify-center items-center space-x-4 text-sm">
                                            <a href="{{ route('admin.translations.edit', $lang->code) }}"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Translate">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    fill="currentColor" viewBox="0 0 640 512">
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

        <hr class="mt-6" />

        <div class="top-bar">

            <div class="title">
                <h1>{{ translation('Currencies') }}</h1>
            </div>

            <div class="actions">

                <button type="button" class="btn" @click="openModal('add-currency-modal')" tabindex="1">
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
                            <th>{{ translation('Code') }}</th>
                            <th>{{ translation('Name') }}</th>
                            <th>{{ translation('Symbol') }}</th>
                            <th>{{ translation('Rate') }}</th>
                            <th>{{ translation('Status') }}</th>
                            <th>{{ translation('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count(getCurrency()) > 0)
                            @foreach (getCurrency() as $currency)
                                <tr>
                                    <td>{{ $currency->code }}</td>
                                    <td>{{ translation($currency->name) }}</td>
                                    <td>{{ $currency->symbol }}</td>
                                    <td>
                                        <form action="{{ route('admin.change.currency.rate', $currency->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <label>
                                                <div class="iconed-input">
                                                    <input type="text" name="rate" value="{{ $currency->rate }}"
                                                        @if ($currency->code == 'USD') disabled @endif required />
                                                    <button type="submit" class="icon"
                                                        @if ($currency->code == 'USD') disabled @endif>
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                @error('rate')
                                                    <span class="validate-msg invalid">{{ translation($message) }}</span>
                                                @enderror
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.currency.toggle-active', $currency->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="active-btn {{ $currency->is_active ? 'active' : '' }}">
                                                {{ $currency->is_active ? translation('active') : translation('inactive') }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="actions">
                                        <div class="flex justify-center items-center space-x-4 text-sm">
                                            <form action="{{ route('admin.currency.destroy', $currency->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" @if ($currency->code == 'USD') disabled @endif
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
    @foreach (getAdminLanguage() as $lang)
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
