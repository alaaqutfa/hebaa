@php
    $title = translation(getSetting('site_title'));
    $description = Str::limit(strip_tags(contentTranslation('about', '')), 150);
    $image = asset('assets/img/logo.png');
    $url = url()->current();
@endphp

@extends('web.layouts.app')

@push('meta')
    {{-- ✅ SEO Basics --}}
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="keywords"
        content="منظمة غير حكومية, العمل الإنساني, التنمية المستدامة, الإغاثة, الفقر, النزوح, تمكين المرأة, دعم التعليم, الرعاية الصحية, حقوق الإنسان, العراق, الشراكات الدولية, حملات إغاثة, المجتمع المدني, المساعدات الطارئة, بناء القدرات, التنمية المجتمعية, الاستجابة للأزمات, اللاجئين, مشاريع إنسانية">
    <meta name="author" content="{{ $title }}">

    {{-- ✅ Open Graph (Facebook, LinkedIn, WhatsApp, etc.) --}}
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:image" content="{{ $image }}" />
    <meta property="og:url" content="{{ $url }}" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="{{ $title }}" />

    {{-- ✅ Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $image }}">
    <meta name="twitter:url" content="{{ $url }}">
@endpush

@section('title', translation('Search Results'))

@section('content')

    <!-- Page Title -->
    <div class="page-title">
        <div class="title-wrapper">
            <h1>{{ translation('Search Results') }}</h1>
            <p>{{ translation('Search results for') . ' "' . $query . '" ' }} </p>
        </div>
    </div><!-- End Page Title -->

    <!-- Search Results Posts Section -->
    <section id="search-results-posts" class="search-results-posts section">

        <div class="container mx-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="projects-container">
                @foreach ($results as $project)
                    <div class="project-item">
                        <article>

                            <div class="post-img">
                                <img src="{{ asset('storage/' . $project->image) }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">
                                <a href="{{ route('project.show', $project->slug) }}" class="line-clamp">
                                    {{ translation($project->title) }}
                                </a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="assets/img/person/person-f-12.webp" alt=""
                                    class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">{{ $project->user->name . ' ' . $project->user->last_name }}</p>
                                    <p class="post-date">
                                        <time datetime="{{ $project->date }}">{{ $project->date }}</time>
                                    </p>
                                </div>
                            </div>

                        </article>
                    </div><!-- End post list item -->
                    {{ $results->links() }}
                @endforeach

            </div>
        </div>

    </section><!-- /Search Results Posts Section -->

@endsection
