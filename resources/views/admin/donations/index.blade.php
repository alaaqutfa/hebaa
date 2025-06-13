@extends('admin.layouts.app')

@section('title', translation('Donation Campaigns'))



@section('content')
    <div class="container">
        <div class="top-bar">
            <div class="title">
                <h1>{{ translation('Donation Campaigns') }}</h1>
            </div>
            <div class="actions">
                <button type="button" class="btn" @click="openModal('add-donationCampaigns-modal')">
                    <span>{{ translation('Add New') }}</span>
                </button>
            </div>
        </div>

        <div class="table-wrapper">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>{{ translation('Title') }}</th>
                            <th style="min-width: 200px;">{{ translation('Description') }}</th>
                            <th>{{ translation('Image') }}</th>
                            <th>{{ translation('Target') }}</th>
                            <th>{{ translation('The allowed amount for each donor') }}</th>
                            <th>{{ translation('The amount that has been collected') }}</th>
                            <th>{{ translation('Full donation is allowed.') }}</th>
                            <th>{{ translation('Start Date') }}</th>
                            <th>{{ translation('End Date') }}</th>
                            <th>{{ translation('Status') }}</th>
                            <th>{{ translation('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($donationCampaigns as $campaign)
                            <tr>
                                <td>
                                    {{-- {{ translation($campaign->title) }} --}}
                                    {{ $campaign->title }}
                                </td>
                                <td>
                                    {{-- {!! contentTranslation('campaign_' . $campaign->id, $campaign->description) !!} --}}
                                    {!! $campaign->description !!}
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset('storage/' . $campaign->image) }}"
                                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'"
                                            class="w-20 min-w-20 h-20 object-cover rounded border"
                                            alt="{{ $campaign->title }}" />
                                    </div>
                                </td>
                                <td class="textNowrap">{{ format_currency($campaign->target_amount) }}</td>
                                <td class="textNowrap">{{ format_currency($campaign->single_amount) }}</td>
                                <td class="textNowrap">{{ format_currency(getDonationPaidAmount($campaign)) }}</td>
                                <td class="textNowrap">
                                    {{ $campaign->allow_full_donation == 1 ? translation('yes') : translation('no') }}</td>
                                <td class="textNowrap">{{ $campaign->start_date }}</td>
                                <td class="textNowrap">{{ $campaign->end_date }}</td>
                                <td class="textNowrap">
                                    @if (is_campaign_expired($campaign))
                                        <span class="expired-btn">
                                            {{ translation('Expired') }}
                                        </span>
                                    @elseif (is_campaign_collected($campaign))
                                        <span class="active-btn active">
                                            {{ translation('Collected') }}
                                        </span>
                                    @else
                                        <form action="{{ route('admin.donation-campaigns.toggle-active', $campaign->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="active-btn {{ $campaign->status == 'active' ? 'active' : '' }}">
                                                {{ $campaign->status == 'active' ? translation('active') : translation('inactive') }}
                                            </button>
                                        </form>
                                    @endif
                                </td>
                                <td class="actions">
                                    <div class="flex justify-center items-center gap-2">
                                        <button @click="openModal('edit-donationCampaigns-modal-{{ $campaign->id }}')">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                        <form class="w-5 h-5"
                                            action="{{ route('admin.donation-campaigns.destroy', $campaign->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
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
                        @empty
                            <tr>
                                <td colspan="11">{{ translation('No data found.') }}</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="11">{{ $donationCampaigns->links() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <hr class="my-6">


        <div class="title">
            <h1>{{ translation('Donations') }}</h1>
        </div>

        <div class="table-wrapper">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>{{ translation('ID') }}</th>
                            <th>{{ translation('Date') }}</th>
                            <th>{{ translation('Donation Campaign') }}</th>
                            <th>{{ translation('The donor') }}</th>
                            <th>{{ translation('The amount') }}</th>
                            <th>{{ translation('Payment Method') }}</th>
                            <th>{{ translation('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            @php
                                $donation = $transaction->donation;
                                $user = $donation->user;
                                $campaign = $donation->campaign;
                            @endphp
                            <tr>
                                <td class="textNowrap">
                                    {{ $transaction->reference_id }}
                                </td>
                                <td class="textNowrap">
                                    {{ $transaction->created_at }}
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
                                    {{ format_currency($donation->amount) }}
                                </td>
                                <td class="textNowrap">
                                    {{ $donation->payment_method }}
                                </td>
                                <td class="textNowrap">
                                    <span class="active-btn {{ $donation->status == 'paid' ? 'active' : '' }}">
                                        {{ translation($donation->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">{{ translation('No data found.') }}</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="7">{{ $transactions->links() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('modal')
    <!-- Add Campaign Modal -->
    <div id="add-donationCampaigns-modal" class="modal">
        <div class="modal-content">
            <header>
                <h2>{{ translation('Add Campaign') }}</h2>
                <button @click="closeModal('add-donationCampaigns-modal')">✕</button>
            </header>

            <form action="{{ route('admin.donation-campaigns.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>
                    <span>{{ translation('Title') }}</span>
                    <input name="title" value="{{ old('title') }}" required />
                </label>
                <label>
                    <span>{{ translation('Description') }}</span>
                    <div class="editor-wrapper">
                        <textarea name="description" id="editor" style="min-height: 200px;">{{ old('description') }}</textarea>
                    </div>
                </label>
                <label>
                    <span>{{ translation('Image') }}</span>
                    <input type="file" name="image" accept="image/*" />
                </label>
                <label>
                    <span>{{ translation('Target Amount') }}</span>
                    <input name="target_amount" type="number" step="0.01" required />
                </label>
                <label>
                    <span>{{ translation('Single Donation Amount (optional)') }}</span>
                    <input name="single_amount" type="number" step="0.01" />
                </label>
                <label>
                    <span>{{ translation('Allow Full Donation') }}</span>
                    <select name="allow_full_donation">
                        <option value="0">{{ translation('No') }}</option>
                        <option value="1">{{ translation('Yes') }}</option>
                    </select>
                </label>
                <label>
                    <span>{{ translation('Status') }}</span>
                    <select name="status">
                        <option value="active">{{ translation('Active') }}</option>
                        <option value="inactive">{{ translation('Inactive') }}</option>
                    </select>
                </label>
                <label>
                    <span>{{ translation('Start Date') }}</span>
                    <input type="datetime-local" name="start_date" />
                </label>
                <label>
                    <span>{{ translation('End Date') }}</span>
                    <input type="datetime-local" name="end_date" />
                </label>
                <!-- Footer -->
                <button type="submit" class="submit">
                    {{ translation('Add') }}
                </button>
            </form>
        </div>
    </div>
    @forelse ($donationCampaigns as $campaign)
        <div id="edit-donationCampaigns-modal-{{ $campaign->id }}" class="modal">
            <div class="modal-content">
                <header>
                    <h2>{{ translation('Edit Campaign') }}</h2>
                    <button @click="closeModal('edit-donationCampaigns-modal-{{ $campaign->id }}')">✕</button>
                </header>

                <form action="{{ route('admin.donation-campaigns.update', $campaign->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label>
                        <span>{{ translation('Title') }}</span>
                        <input name="title" value="{{ old('title', $campaign->title) }}" required />
                    </label>
                    <label>
                        <span>{{ translation('Description') }}</span>
                        <div class="editor-wrapper">
                            <textarea name="description" id="editor-{{ $campaign->id }}" style="min-height: 200px;">{{ old('description', $campaign->description) }}</textarea>
                        </div>
                    </label>
                    <label>
                        <span>{{ translation('Image') }}</span>
                        <input type="file" name="image" accept="image/*" />
                    </label>
                    <label>
                        <span>{{ translation('Target Amount') }}</span>
                        <input name="target_amount" type="number" step="0.01"
                            value="{{ old('target_amount', $campaign->target_amount) }}" required />
                    </label>
                    <label>
                        <span>{{ translation('Single Donation Amount (optional)') }}</span>
                        <input name="single_amount" type="number" step="0.01"
                            value="{{ old('single_amount', $campaign->single_amount) }}" />
                    </label>
                    <label>
                        <span>{{ translation('Allow Full Donation') }}</span>
                        <select name="allow_full_donation">
                            <option value="0" {{ $campaign->allow_full_donation ? '' : 'selected' }}>
                                {{ translation('No') }}</option>
                            <option value="1" {{ $campaign->allow_full_donation ? 'selected' : '' }}>
                                {{ translation('Yes') }}</option>
                        </select>
                    </label>
                    <label>
                        <span>{{ translation('Status') }}</span>
                        <select name="status">
                            <option value="active" {{ $campaign->status == 'active' ? 'selected' : '' }}>
                                {{ translation('Active') }}</option>
                            <option value="inactive" {{ $campaign->status == 'inactive' ? 'selected' : '' }}>
                                {{ translation('Inactive') }}</option>
                        </select>
                    </label>
                    <label>
                        <span>{{ translation('Start Date') }}</span>
                        <input type="datetime-local" name="start_date"
                            value="{{ old('start_date', optional($campaign->start_date)->format('Y-m-d\TH:i')) }}" />
                    </label>
                    <label>
                        <span>{{ translation('End Date') }}</span>
                        <input type="datetime-local" name="end_date"
                            value="{{ old('end_date', optional($campaign->end_date)->format('Y-m-d\TH:i')) }}" />
                    </label>
                    <button type="submit" class="submit">
                        {{ translation('Save') }}
                    </button>
                </form>
            </div>
        </div>
    @empty
    @endforelse
@endsection

@push('scripts')
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {})
            .catch(error => {
                console.error(error);
            });
        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('#editor').value = CKEDITOR.instances.editor.getData();
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('textarea[id^="editor-"]').forEach((textarea) => {
                ClassicEditor
                    .create(textarea)
                    .then(editor => {
                        textarea.ckeditorInstance = editor;
                    })
                    .catch(error => {
                        console.error('CKEditor init error:', error);
                    });
            });

            document.querySelectorAll('form').forEach((form) => {
                form.addEventListener('submit', function() {
                    form.querySelectorAll('textarea[id^="editor-"]').forEach(textarea => {
                        if (textarea.ckeditorInstance) {
                            textarea.value = textarea.ckeditorInstance.getData();
                        }
                    });
                });
            });
        });
    </script>
@endpush
