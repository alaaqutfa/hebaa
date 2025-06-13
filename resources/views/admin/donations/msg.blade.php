@extends('admin.layouts.app')

@section('title', translation('Messages'))

@section('content')
    <div class="container">

        <div class="title">
            {{ translation('Messages') }}
        </div>

        <div class="table-wrapper">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>{{ translation('Date') }}</th>
                            <th>{{ translation('Donation Campaign') }}</th>
                            <th>{{ translation('The donor') }}</th>
                            <th>{{ translation('Messages') }}</th>
                            <th>{{ translation('The amount') }}</th>
                            <th>{{ translation('Status') }}</th>
                            <th>{{ translation('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($msgs as $msg)
                            @php
                                $user = $msg->user;
                                $campaign = $msg->campaign;
                            @endphp
                            <tr>
                                <td class="textNowrap">
                                    {{ $msg->created_at }}
                                </td>
                                <td class="max-w-[200px]">
                                    {{ $campaign->title }}
                                </td>
                                <td class="textNowrap">
                                    <div class="flex justify-center items-center text-sm gap-2">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{ asset('storage/' . $user->image) }}" alt=""
                                                onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'"
                                                loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div class="flex justify-start items-start flex-col">
                                            <p class="font-semibold">{{ $user->name }} {{ $user->last_name }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $user->email }}
                                            </p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $user->phone }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="textNowrap">
                                    {{ $msg->message }}
                                </td>
                                <td class="textNowrap">
                                    {{ format_currency($msg->amount) }}
                                </td>
                                <td class="textNowrap">
                                    <span class="active-btn {{ $msg->status == 'paid' ? 'active' : '' }}">
                                        {{ translation($msg->status) }}
                                    </span>
                                </td>
                                <td>
                                  <div class="flex justify-center items-center gap-2">
                                    <a href="mailto:{{ $user->email }}">
                                    <svg fill="currentColor" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                  </a>
                                  <a href="mailto:{{ $user->phone }}">
                                    <svg fill="currentColor" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                                  </a>
                                  </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">{{ translation('No data found.') }}</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="7">{{ $msgs->links() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
