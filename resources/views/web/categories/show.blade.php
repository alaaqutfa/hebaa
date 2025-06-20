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

@section('title', translation($category->name))

@section('content')
    {{-- $category $projects --}}
    <!-- Page Title -->
    <div class="page-title relative">
        <div class="title-wrapper">
            <h1>{{ translation($category->name) }}</h1>
        </div>
    </div><!-- End Page Title -->

    <div class="container mx-auto">
        <div class="category-row">

            <div class="category-row-side">

                <!-- Category Postst Section -->
                <section id="category-postst" class="category-postst section">

                    <div class="container" data-aos="fade-up" data-aos-delay="100">
                        <div class="projects-container">

                            @foreach ($projects as $project)
                                <div class="project-item">
                                    <article>

                                        <div class="post-img">
                                            <img src="{{ asset('storage/' . $project->image) }}" alt=""
                                                class="img-fluid">
                                        </div>

                                        <p class="post-category">{{ translation($category->name) }}</p>

                                        <h2 class="title">
                                            <a href="{{ route('project.show', $project->slug) }}"
                                                class="line-clamp">{{ translation($project->title) }}</a>
                                        </h2>

                                        <div class="d-flex align-items-center">
                                            <img src="assets/img/person/person-f-12.webp" alt=""
                                                class="img-fluid post-author-img flex-shrink-0">
                                            <div class="post-meta">
                                                {{-- <p class="post-author">Maria Doe</p> --}}
                                                <p class="post-date">
                                                    <time datetime="{{ $project->date }}">{{ $project->date }}</time>
                                                </p>
                                            </div>
                                        </div>

                                    </article>
                                </div><!-- End post list item -->
                            @endforeach

                        </div>
                        <div class="w-full mt-6">
                            {{ $projects->links() }}
                        </div>
                    </div>

                </section><!-- /Category Postst Section -->

            </div>

            <div class="category-row-sidebar sidebar">

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

                    {{-- <!-- Recent Posts Widget -->
                    <div class="recent-posts-widget widget-item">

                        <h3 class="widget-title">Recent Posts</h3>

                        <div class="post-item">
                            <img src="assets/img/blog/blog-post-square-1.webp" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-post-square-2.webp" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-post-square-3.webp" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-post-square-4.webp" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-post-square-5.webp" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                    </div><!--/Recent Posts Widget --> --}}

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
