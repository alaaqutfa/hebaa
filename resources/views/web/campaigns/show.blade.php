@php
    $title = translation($campaign->title);
    $description = Str::limit(strip_tags(contentTranslation($campaign->id, defaultValue: $campaign->description)), 150);
    $image = asset('storage/' . $campaign->image) ?? asset('assets/img/logo.png');
    $url = url()->current();
    $shareTitle = translation($campaign->title);
    $shareUrl = urlencode(url()->current());
    $shareText = urlencode($shareTitle . ' - ' . url()->current());
@endphp

@push('meta')
    {{-- ✅ SEO Basics --}}
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="keywords"
        content="تبرع, حملة تبرع, دعم إنساني, العمل الخيري, صدقة, تبرع مالي, تبرع إلكتروني, مساعدة المحتاجين, دعم الفقراء, إغاثة, كفالة أيتام, علاج مرضى, زكاة, زكاة المال, كفالة أسر, دعم التعليم, حملة خيرية, بناء مسجد, سقيا الماء, بناء مدرسة, تبرعات العراق, منصة تبرع, مؤسسة خيرية, مشروع خيري, دعم عاجل, تبرع الآن, أهل الخير, مساعدة اللاجئين, التبرعات الخيرية, مشاريع خيرية" />
    <meta name="author" content="{{ translation(getSetting('site_title')) }}">

    {{-- ✅ Open Graph (Facebook, LinkedIn, WhatsApp, etc.) --}}
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:image" content="{{ $image }}" />
    <meta property="og:url" content="{{ $url }}" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="{{ translation(getSetting('site_title')) }}" />

    {{-- ✅ Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $image }}">
    <meta name="twitter:url" content="{{ $url }}">
@endpush

@extends('web.layouts.app')

@section('title', translation($campaign->title))

@section('content')
    <div class="container mx-auto">

        <div class="project-content">

            <div class="project-content-side">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container" data-aos="fade-up">

                        <article class="article">

                            <div class="hero-img" data-aos="zoom-in">
                                <img src="{{ asset('storage/' . $campaign->image) }}" id="campaign-basic-image"
                                    onerror="this.src='{{ asset('assets/img/placeholder-rect.jpg') }}'"
                                    alt="Featured blog image" class="img-fluid" loading="lazy">
                            </div>

                            <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                                <div class="content-header">
                                    <h1 class="title">
                                        {{ $campaign->title }}
                                    </h1>

                                    <div class="author-info">
                                        <div class="amount">
                                            <span
                                                class="text-sm text-gray-800 font-medium">{{ translation('Target Amount') }}
                                                :</span>
                                            <span class="text-base text-gray-800 font-bold">
                                                {{ format_currency($campaign->target_amount) }} /
                                                {{ format_currency($campaign->single_amount) }}
                                            </span>
                                        </div>
                                        <div class="post-meta flex justify-start items-center gap-2">
                                            <span class="date flex justify-center items-center gap-2">
                                                <div class="flex items-center gap-2">
                                                    <span
                                                        class="text-xs">{{ \Carbon\Carbon::parse($campaign->start_date)->format('Y-m-d') }}</span>
                                                    <svg fill="currentColor" class="w-5 h-5"
                                                        style="transform: rotate(90deg);" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 320 512">
                                                        <path
                                                            d="M182.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L128 109.3l0 293.5L86.6 361.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0l96-96c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 402.7l0-293.5 41.4 41.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-96-96z" />
                                                    </svg>
                                                    <span
                                                        class="text-xs">{{ \Carbon\Carbon::parse($campaign->end_date)->format('Y-m-d') }}</span>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="content">
                                    <p>
                                        {!! $campaign->description !!}
                                    </p>
                                </div>

                                <div class="meta-bottom">

                                    <div class="share-section">
                                        <h4>{{ translation('Share Campaign') }}</h4>

                                        <div class="social-links">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
                                                target="_blank" rel="noopener noreferrer" class="facebook">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                                    fill="currentColor" viewBox="0 0 512 512">
                                                    <path
                                                        d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                                                </svg>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?text={{ $shareText }}"
                                                target="_blank" rel="noopener noreferrer" class="twitter">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                                    fill="currentColor" viewBox="0 0 512 512">
                                                    <path
                                                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                                </svg>
                                            </a>
                                            <a href="https://api.whatsapp.com/send?text={{ $shareText }}"
                                                target="_blank" rel="noopener noreferrer" class="whatsapp">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="22.75"
                                                    fill="currentColor" viewBox="0 0 448 512">
                                                    <path
                                                        d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                                                </svg>
                                            </a>
                                            <a href="https://t.me/share/url?url={{ $shareUrl }}&text={{ $shareTitle }}"
                                                target="_blank" rel="noopener noreferrer" class="telegram">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="23.5625"
                                                    fill="currentColor" viewBox="0 0 496 512">
                                                    <path
                                                        d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z" />
                                                </svg>
                                            </a>
                                            <a href="viber://forward?text={{ urlencode($shareTitle . ' - ' . $url) }}"
                                                target="_blank" rel="noopener noreferrer" class="viber">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    height="20" width="20" viewBox="0 0 512 512">
                                                    <path
                                                        d="M444 49.9C431.3 38.2 379.9 .9 265.3 .4c0 0-135.1-8.1-200.9 52.3C27.8 89.3 14.9 143 13.5 209.5c-1.4 66.5-3.1 191.1 117 224.9h.1l-.1 51.6s-.8 20.9 13 25.1c16.6 5.2 26.4-10.7 42.3-27.8 8.7-9.4 20.7-23.2 29.8-33.7 82.2 6.9 145.3-8.9 152.5-11.2 16.6-5.4 110.5-17.4 125.7-142 15.8-128.6-7.6-209.8-49.8-246.5zM457.9 287c-12.9 104-89 110.6-103 115.1-6 1.9-61.5 15.7-131.2 11.2 0 0-52 62.7-68.2 79-5.3 5.3-11.1 4.8-11-5.7 0-6.9 .4-85.7 .4-85.7-.1 0-.1 0 0 0-101.8-28.2-95.8-134.3-94.7-189.8 1.1-55.5 11.6-101 42.6-131.6 55.7-50.5 170.4-43 170.4-43 96.9 .4 143.3 29.6 154.1 39.4 35.7 30.6 53.9 103.8 40.6 211.1zm-139-80.8c.4 8.6-12.5 9.2-12.9 .6-1.1-22-11.4-32.7-32.6-33.9-8.6-.5-7.8-13.4 .7-12.9 27.9 1.5 43.4 17.5 44.8 46.2zm20.3 11.3c1-42.4-25.5-75.6-75.8-79.3-8.5-.6-7.6-13.5 .9-12.9 58 4.2 88.9 44.1 87.8 92.5-.1 8.6-13.1 8.2-12.9-.3zm47 13.4c.1 8.6-12.9 8.7-12.9 .1-.6-81.5-54.9-125.9-120.8-126.4-8.5-.1-8.5-12.9 0-12.9 73.7 .5 133 51.4 133.7 139.2zM374.9 329v.2c-10.8 19-31 40-51.8 33.3l-.2-.3c-21.1-5.9-70.8-31.5-102.2-56.5-16.2-12.8-31-27.9-42.4-42.4-10.3-12.9-20.7-28.2-30.8-46.6-21.3-38.5-26-55.7-26-55.7-6.7-20.8 14.2-41 33.3-51.8h.2c9.2-4.8 18-3.2 23.9 3.9 0 0 12.4 14.8 17.7 22.1 5 6.8 11.7 17.7 15.2 23.8 6.1 10.9 2.3 22-3.7 26.6l-12 9.6c-6.1 4.9-5.3 14-5.3 14s17.8 67.3 84.3 84.3c0 0 9.1 .8 14-5.3l9.6-12c4.6-6 15.7-9.8 26.6-3.7 14.7 8.3 33.4 21.2 45.8 32.9 7 5.7 8.6 14.4 3.8 23.6z" />
                                                </svg>
                                            </a>
                                            <a href="javascript:void(0)"
                                                onclick="navigator.clipboard.writeText('{{ $url }}'); alert({{ translation('The campaign link has been copied!') }})"
                                                class="copy">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25"
                                                    fill="currentColor" viewBox="0 0 448 512">
                                                    <path
                                                        d="M208 0L332.1 0c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9L448 336c0 26.5-21.5 48-48 48l-192 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48zM48 128l80 0 0 64-64 0 0 256 192 0 0-32 64 0 0 48c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 176c0-26.5 21.5-48 48-48z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->

                @isset($donation)
                    <!-- Blog Comments Section -->
                    <section id="blog-comments" class="blog-comments section">

                        <div class="container" data-aos="fade-up" data-aos-delay="100">

                            <div class="blog-comments-3">
                                <div class="section-header">
                                    <h3>
                                        {{ translation('Comments') }}
                                        <span class="comment-count">
                                            ({{ $donation->total() }})
                                        </span>
                                    </h3>
                                </div>

                                <div class="comments-wrapper">
                                    @foreach ($donation as $comment)
                                        <!-- Comment -->
                                        <article class="comment-card"
                                            @if (Auth::check() && Auth::user()->id === $comment->user->id) style="background:#f0f0f0;" @endif>
                                            <div class="comment-header">
                                                <div class="user-info">
                                                    @if (Auth::check())
                                                        <img src="{{ asset('storage/' . $comment->user->avatar) }}"
                                                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'"
                                                            alt="User avatar" loading="lazy">
                                                    @else
                                                        <img src="{{ asset('assets/img/placeholder.jpg') }}"
                                                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'"
                                                            alt="User avatar" loading="lazy">
                                                    @endif
                                                    <div class="meta">
                                                        <h4 class="name">
                                                            {{ $comment->user->name . ' ' . $comment->user->last_name }}
                                                        </h4>
                                                        <span class="date">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                                width="21" fill="currentColor" viewBox="0 0 448 512">
                                                                <path
                                                                    d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l352 0 0 256c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256z" />
                                                            </svg>
                                                            {{ Carbon\Carbon::parse($comment->created_at)->format('Y-m-d') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                @if (Auth::check() && Auth::user()->id === $comment->user->id)
                                                    <form action="{{ route('comments.update', $comment->id) }}"
                                                        method="POST" id="comment_update_{{ $comment->id }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <textarea name="comment" id="edit_comment"
                                                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $comment->message }}</textarea>
                                                    </form>
                                                    <div class="comment-actions">
                                                        <button class="action-btn like-btn"
                                                            onclick="document.getElementById('comment_update_{{ $comment->id }}').submit()">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                        <form action="{{ route('comments.destroy', $comment->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="action-btn reply-btn"
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
                                                @else
                                                    <p>
                                                        {{ $comment->message }}
                                                    </p>
                                                @endif
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                                <div class="w-full mt-6">
                                    {{ $donation->links() }}
                                </div>
                            </div>

                        </div>

                    </section><!-- /Blog Comments Section -->
                @endisset

                <!-- Blog Comment Form Section -->
                <section id="blog-comment-form" class="blog-comment-form section">

                    <div class="container mx-auto" data-aos="fade-up" data-aos-delay="100">

                        <form action="{{ route('comments.store') }}" method="post" role="form">
                            @csrf
                            <div class="section-header">
                                <h3>{{ translation('Donate Now') }}</h3>
                                <p>
                                    {{ translation("You don't have to be rich to make a difference; your donation means a lot.") }}
                                </p>
                            </div>

                            <div class="grid grid-cols-1 gap-4">
                                <input type="hidden" name="campaign_id" value="{{ $campaign->id }}" />
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                <input type="hidden" name="name"
                                    value="{{ Auth::user()->name . ' ' . Auth::user()->last_name }}" required />

                                <div class="flex flex-col">
                                    <label for="amount" class="mb-1 font-medium">
                                        {{ translation('Donation Amount') }} *
                                    </label>
                                    <input type="number" name="amount" id="amount"
                                        value="{{ $campaign->single_amount }}" min="{{ $campaign->single_amount }}"
                                        placeholder="{{ translation('Enter the amount of donation you wish to donate') }}"
                                        class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        readonly required />
                                </div>
                                @if ($campaign->allow_full_donation)
                                    <div class="flex justify-start items-center gap-2 mt-2">
                                        <input type="checkbox" name="change_amount" id="change_amount_checkbox" />
                                        <label for="change_amount_checkbox" class="font-medium">
                                            {{ translation('Change the donation amount') }}
                                        </label>
                                    </div>
                                @endif
                                <div class="col-span-1 flex flex-col">
                                    <label for="comment" class="mb-1 font-medium">
                                        {{ translation('Your Comment') }}
                                    </label>
                                    <textarea name="comment" id="comment" rows="5"
                                        placeholder="{{ translation('Write your thoughts here...') }}"
                                        class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                </div>

                                <div class="col-span-1 text-center">
                                    <button type="submit" class="btn-submit">
                                        {{ translation('Donation') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </section><!-- /Blog Comment Form Section -->

            </div>

            <div class="project-content-sidebar sidebar">

                <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

                    <!-- Search Widget -->
                    <div class="search-widget widget-item">

                        <h3 class="widget-title">{{ translation('Search') }}</h3>
                        <form action="{{ route('search') }}" method="GET">
                            @csrf
                            <input type="search" name="q" placeholder="{{ translation('Search...') }}"
                                class="w-full focus:border-none focus:outline-none focus:ring-0" />
                            <button type="submit" title="{{ translation('Search') }}">
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </form>

                    </div><!--/Search Widget -->

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">

                        <h3 class="widget-title">{{ translation('Categories') }}</h3>
                        <ul class="mt-3">
                            @foreach (getCategory() as $category)
                                <li>
                                    <a href="{{ route('category.show', $category->slug) }}">
                                        {{ translation($category->name) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div><!--/Categories Widget -->

                    <!-- Recent Posts Widget -->
                    @if (count($recent) > 0)
                        <div class="recent-posts-widget widget-item">

                            <h3 class="widget-title">{{ translation('Recent Campaigns') }}</h3>
                            @foreach ($recent as $campaign)
                                <div class="post-item">
                                    <img src="{{ asset('storage/' . $campaign->image) }}"
                                        onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt=""
                                        class="flex-shrink-0">
                                    <div class="px-3">
                                        <h4>
                                            <a href="{{ route('campaign.show', $campaign->id) }}">
                                                {{ Str::limit($campaign->title, 25) }}
                                            </a>
                                        </h4>
                                        <div class="w-full flex justify-between items-center gap-2 text-gray-400">
                                            <time
                                                datetime="{{ \Carbon\Carbon::parse($campaign->start_date)->format('d-m-Y') }}">
                                                {{ \Carbon\Carbon::parse($campaign->start_date)->format('d-m-Y') }}
                                            </time>
                                            <svg fill="currentColor" class="w-5 h-5" style="transform: rotate(90deg);"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                                <path
                                                    d="M182.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L128 109.3l0 293.5L86.6 361.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0l96-96c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 402.7l0-293.5 41.4 41.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-96-96z" />
                                            </svg>
                                            <time
                                                datetime="{{ \Carbon\Carbon::parse($campaign->end_date)->format('d-m-Y') }}">
                                                {{ \Carbon\Carbon::parse($campaign->end_date)->format('d-m-Y') }}
                                            </time>
                                        </div>
                                    </div>
                                </div><!-- End recent post item-->
                            @endforeach

                        </div><!--/Recent Posts Widget -->
                    @endif

                    <!-- Recent Posts Widget -->
                    @if (count($recentArticles) > 0)
                        <div class="recent-posts-widget widget-item">

                            <h3 class="widget-title">{{ translation('Recent Projects') }}</h3>
                            @foreach ($recentArticles as $project)
                                <div class="post-item">
                                    <img src="{{ asset('storage/' . $project->image) }}"
                                        onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt=""
                                        class="flex-shrink-0">
                                    <div class="px-3">
                                        <h4>
                                            <a href="{{ route('project.show', $project->slug) }}">
                                                {{ Str::limit(translation($project->title), 25) }}
                                            </a>
                                        </h4>
                                        <time datetime="{{ \Carbon\Carbon::parse($project->date)->format('d-m-Y') }}">
                                            {{ \Carbon\Carbon::parse($project->date)->format('d-m-Y') }}
                                        </time>
                                    </div>
                                </div><!-- End recent post item-->
                            @endforeach

                        </div><!--/Recent Posts Widget -->
                    @endif

                    {{-- <!-- Tags Widget -->
                    <div class="tags-widget widget-item">

                        <h3 class="widget-title">Tags</h3>
                        <ul>
                            <li><a href="#">App</a></li>
                            <li><a href="#">IT</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Mac</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Office</a></li>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Studio</a></li>
                            <li><a href="#">Smart</a></li>
                            <li><a href="#">Tips</a></li>
                            <li><a href="#">Marketing</a></li>
                        </ul>

                    </div><!--/Tags Widget --> --}}

                </div>

            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('change_amount_checkbox');
            const amountInput = document.getElementById('amount');
            if (checkbox && amountInput) {
                checkbox.addEventListener('change', function() {
                    amountInput.readOnly = !this.checked;
                });
            }
        });
    </script>
@endpush
