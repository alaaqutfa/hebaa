@extends('admin.layouts.app')

@section('title', translation('Dashboard'))

@section('content')

    <div class="container">
        <div class="title">
            <h1>
                {{ translation('Dashboard') }}
            </h1>
        </div>

        <!-- Cards -->
        <div class="dashboard-cards">
            <!-- Card -->
            <div class="card">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        {{ translation('Total clients') }}
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ count($users) }}
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="card">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        {{ translation('Donations balance') }}
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ format_currency($totalAmount) }}
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="card">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        {{ translation('Donations') }}
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ count($donations) }}
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="card">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        {{ translation('Messages') }}
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $messagesCount }}
                    </p>
                </div>
            </div>
        </div>

        <!-- New Table -->
        <div class="table-wrapper">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>{{ translation('Client') }}</th>
                            <th>{{ translation('Email') }}</th>
                            <th>{{ translation('Phone') }}</th>
                            <th>{{ translation('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td>
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
                                            <div>
                                                <p class="font-semibold">{{ $user->name }} {{ $user->last_name }}</p>
                                                {{-- <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    10x Developer
                                                </p> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->phone }}
                                    </td>
                                    <td>
                                        6/10/2020
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">{{ $users->links() }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="4"></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Charts -->
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ translation('Donation Statistics') }}
        </h2>

        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    {{ translation('Campaigns Status') }}
                </h4>
                <canvas id="campaignStatusChart" height="250"></canvas>
            </div>

            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    {{ translation('Donations This Month') }}
                </h4>
                <canvas id="donationChart" height="250"></canvas>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // رسم بياني دائري للحملات
            const campaignStatusChart = new Chart(document.getElementById('campaignStatusChart'), {
                type: 'pie',
                data: {
                    labels: ['{{ translation('Active') }}', '{{ translation('Inactive') }}',
                        '{{ translation('Completed') }}'
                    ],
                    datasets: [{
                        label: '{{ translation('Campaigns Status') }}',
                        data: [
                            {{ $campaignsStats['active'] }},
                            {{ $campaignsStats['inactive'] }},
                            {{ $campaignsStats['completed'] }}
                        ],
                        backgroundColor: ['#4299e1', '#f6ad55', '#48bb78'],
                    }]
                }
            });

            // رسم بياني خطي للتبرعات اليومية
            const donationChart = new Chart(document.getElementById('donationChart'), {
                type: 'line',
                data: {
                    labels: {!! json_encode($donationChartLabels) !!},
                    datasets: [{
                        label: '{{ translation('Daily Donations') }}',
                        data: {!! json_encode($donationChartData) !!},
                        borderColor: '#48bb78',
                        backgroundColor: 'rgba(72, 187, 120, 0.2)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endpush
