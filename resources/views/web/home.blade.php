@php
    $hero_project_1 = $heroProjects['hero_project_1'];
    $hero_project_2 = $heroProjects['hero_project_2'];
    $hero_project_3 = $heroProjects['hero_project_3'];
    $hero_project_4 = $heroProjects['hero_project_4'];
    $hero_project_5 = $heroProjects['hero_project_5'];
@endphp

@extends('web.layouts.app')

@section('title', translation('Home'))

@section('content')
    <!-- Blog Hero Section -->
    <section id="blog-hero" class="blog-hero section bg-transparent">

        <div class="container mx-auto" data-aos="fade-up" data-aos-delay="100">

            <div class="blog-grid">
                <!-- Featured Post (Large) -->
                <article class="blog-item featured" data-aos="fade-up">
                    @if ($hero_project_1->image)
                        <img src="{{ asset('storage/' . $hero_project_1->image) }}"
                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hiwar Project"
                            class="img-fluid" />
                    @else
                        <img src="{{ asset('assets/img/placeholder.jpg') }}"
                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hiwar Project"
                            class="img-fluid" />
                    @endif
                    <div class="blog-content">
                        <div class="post-meta flex-column">
                            <span class="date">{{ $hero_project_1->date }}</span>
                            @if (count($hero_project_1->categories) > 1)
                                <div class="init-swiper categories-slider" data-name="categories-swiper-config">
                                    <div class="swiper-wrapper">
                                        @foreach ($hero_project_1->categories as $category)
                                            <div class="swiper-slide">
                                                <a href="{{ route('category.show', $category->slug) }}"
                                                    class="category">{{ translation($category->name) }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('category.show', $hero_project_1->categories[0]->slug) }}"
                                    class="category">{{ translation($hero_project_1->categories[0]->name) }}
                                </a>
                            @endif
                        </div>
                        <h2 class="post-title line-clamp">
                            <a href="{{ route('project.show', $hero_project_1->slug) }}"
                                title="{{ $hero_project_1->title ?? translation('Project Name') }}">{{ $hero_project_1->title ?? translation('Project Name') }}</a>
                        </h2>
                    </div>
                </article><!-- End Featured Post -->

                <!-- Regular Posts -->
                <article class="blog-item" data-aos="fade-up" data-aos-delay="100">
                    @if ($hero_project_2->image)
                        <img src="{{ asset('storage/' . $hero_project_2->image) }}"
                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hiwar Project"
                            class="img-fluid" />
                    @else
                        <img src="{{ asset('assets/img/placeholder.jpg') }}"
                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hiwar Project"
                            class="img-fluid" />
                    @endif
                    <div class="blog-content">
                        <div class="post-meta">
                            <span class="date">{{ $hero_project_2->date }}</span>
                            @if (count($hero_project_2->categories) > 1)
                                <div class="init-swiper categories-slider" data-name="categories-swiper-config">
                                    <div class="swiper-wrapper">
                                        @foreach ($hero_project_2->categories as $category)
                                            <div class="swiper-slide">
                                                <a href="{{ route('category.show', $category->slug) }}"
                                                    class="category">{{ translation($category->name) }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('category.show', $hero_project_2->categories[0]->slug) }}"
                                    class="category">{{ translation($hero_project_2->categories[0]->name) }}
                                </a>
                            @endif
                        </div>
                        <h3 class="post-title line-clamp">
                            <a href="{{ route('project.show', $hero_project_2->slug) }}"
                                title="{{ $hero_project_2->title ?? translation('Project Name') }}">
                                {{ $hero_project_2->title ?? translation('Project Name') }}
                            </a>
                        </h3>
                    </div>
                </article><!-- End Blog Item -->

                <article class="blog-item" data-aos="fade-up" data-aos-delay="200">
                    @if ($hero_project_3->image)
                        <img src="{{ asset('storage/' . $hero_project_3->image) }}"
                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hiwar Project"
                            class="img-fluid" />
                    @else
                        <img src="{{ asset('assets/img/placeholder.jpg') }}"
                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hiwar Project"
                            class="img-fluid" />
                    @endif
                    <div class="blog-content">
                        <div class="post-meta">
                            <span class="date">{{ $hero_project_3->date }}</span>
                            @if (count($hero_project_3->categories) > 1)
                                <div class="init-swiper categories-slider" data-name="categories-swiper-config">
                                    <div class="swiper-wrapper">
                                        @foreach ($hero_project_3->categories as $category)
                                            <div class="swiper-slide">
                                                <a href="{{ route('category.show', $category->slug) }}"
                                                    class="category">{{ translation($category->name) }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('category.show', $hero_project_3->categories[0]->slug) }}"
                                    class="category">{{ translation($hero_project_3->categories[0]->name) }}
                                </a>
                            @endif
                        </div>
                        <h3 class="post-title line-clamp">
                            <a href="{{ route('project.show', $hero_project_3->slug) }}"
                                title="{{ $hero_project_3->title ?? translation('Project Name') }}">
                                {{ $hero_project_3->title ?? translation('Project Name') }}
                            </a>
                        </h3>
                    </div>
                </article><!-- End Blog Item -->

                <article class="blog-item" data-aos="fade-up" data-aos-delay="300">
                    @if ($hero_project_4->image)
                        <img src="{{ asset('storage/' . $hero_project_4->image) }}"
                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hiwar Project"
                            class="img-fluid" />
                    @else
                        <img src="{{ asset('assets/img/placeholder.jpg') }}"
                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hiwar Project"
                            class="img-fluid" />
                    @endif
                    <div class="blog-content">
                        <div class="post-meta">
                            <span class="date">{{ $hero_project_4->date }}</span>
                            @if (count($hero_project_4->categories) > 1)
                                <div class="init-swiper categories-slider" data-name="categories-swiper-config">
                                    <div class="swiper-wrapper">
                                        @foreach ($hero_project_4->categories as $category)
                                            <div class="swiper-slide">
                                                <a href="{{ route('category.show', $category->slug) }}"
                                                    class="category">{{ translation($category->name) }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('category.show', $hero_project_4->categories[0]->slug) }}"
                                    class="category">{{ translation($hero_project_4->categories[0]->name) }}
                                </a>
                            @endif
                        </div>
                        <h3 class="post-title line-clamp">
                            <a href="{{ route('project.show', $hero_project_4->slug) }}"
                                title="{{ $hero_project_4->title ?? translation('Project Name') }}">
                                {{ $hero_project_4->title ?? translation('Project Name') }}
                            </a>
                        </h3>
                    </div>
                </article><!-- End Blog Item -->

                <article class="blog-item" data-aos="fade-up" data-aos-delay="400">
                    @if ($hero_project_5->image)
                        <img src="{{ asset('storage/' . $hero_project_5->image) }}"
                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hiwar Project"
                            class="img-fluid" />
                    @else
                        <img src="{{ asset('assets/img/placeholder.jpg') }}"
                            onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hiwar Project"
                            class="img-fluid" />
                    @endif
                    <div class="blog-content">
                        <div class="post-meta">
                            <span class="date">{{ $hero_project_5->date }}</span>
                            @if (count($hero_project_5->categories) > 1)
                                <div class="init-swiper categories-slider" data-name="categories-swiper-config">
                                    <div class="swiper-wrapper max-w-full">
                                        @foreach ($hero_project_5->categories as $category)
                                            <div class="swiper-slide">
                                                <a href="{{ route('category.show', $category->slug) }}"
                                                    class="category">{{ translation($category->name) }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('category.show', $hero_project_5->categories[0]->slug) }}"
                                    class="category">{{ translation($hero_project_5->categories[0]->name) }}
                                </a>
                            @endif
                        </div>
                        <h3 class="post-title line-clamp">
                            <a href="{{ route('project.show', $hero_project_5->slug) }}"
                                title="{{ $hero_project_5->title ?? translation('Project Name') }}">
                                {{ $hero_project_5->title ?? translation('Project Name') }}
                            </a>
                        </h3>
                    </div>
                </article><!-- End Blog Item -->

            </div>

        </div>

    </section>
    <!-- /Blog Hero Section -->

    <!-- Featured Posts Section -->
    <section id="featured-posts" class="featured-posts section">

        <!-- Section Title -->
        <div class="container mx-auto section-title" data-aos="fade-up">
            <h2>{{ translation('Featured Projects') }}</h2>
            <div>
                <span>
                    {{ translation('Check Our') }}
                </span>
                <span class="description-title">
                    {{ translation('Featured Projects') }}
                </span>
            </div>
        </div><!-- End Section Title -->

        <div class="container mx-auto" data-aos="fade-up" data-aos-delay="100">

            <div class="blog-posts-slider swiper init-swiper" data-name="featured-swiper-config">

                <div class="swiper-wrapper">
                    @foreach ($featured as $project)
                        <div class="swiper-slide">
                            <div class="blog-post-item">
                                <img src="{{ asset('storage/' . $project->image) }}"
                                    onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hiwar Project" />
                                <div class="blog-post-content">
                                    <div class="post-meta">
                                        {{-- <span class="flex justify-center items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                                fill="currentColor" viewBox="0 0 512 512">
                                                <path
                                                    d="M406.5 399.6C387.4 352.9 341.5 320 288 320l-64 0c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3l64 0c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z" />
                                            </svg>
                                            abdulrahman
                                        </span> --}}
                                        <span class="flex justify-center items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21"
                                                fill="currentColor" viewBox="0 0 448 512">
                                                <path
                                                    d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l352 0 0 256c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256z" />
                                            </svg>
                                            {{ $project->date }}
                                        </span>
                                    </div>
                                    <h2>
                                        <a href="{{ route('project.show', $project->slug) }}" class="line-clamp">
                                            {{ translation($project->title) }}
                                        </a>
                                    </h2>
                                    <p>
                                        {!! contentTranslation($project->id, $project->content) !!}
                                    </p>
                                    <a href="{{ route('project.show', $project->slug) }}" class="read-more">
                                        {{ translation('Read More') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="15"
                                            fill="currentColor" viewBox="0 0 320 512">
                                            <path
                                                d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div><!-- End slide item -->
                    @endforeach
                </div>

            </div>

        </div>

    </section><!-- /Featured Posts Section -->
@endsection

@push('scripts')
    <script type="application/json" class="categories-swiper-config">
        {
          "slidesPerView": "auto",
          "loop": true,
          "speed": 800,
          "autoplay": {
            "delay": 2000
          },
          "spaceBetween": 10,
          "freeMode": true,
          "breakpoints": {
            "640": { "slidesPerView": 2 },
            "768": { "slidesPerView": 3 },
            "1024": { "slidesPerView": 5 }
          }
        }
    </script>
    <script type="application/json" class="featured-swiper-config">
        {
            "loop": true,
            "speed": 800,
            "autoplay": {
                "delay": 5000
            },
            "slidesPerView": 3,
            "spaceBetween": 30,
            "breakpoints": {
                "320": {
                "slidesPerView": 1,
                "spaceBetween": 20
                },
                "768": {
                "slidesPerView": 2,
                "spaceBetween": 20
                },
                "1200": {
                "slidesPerView": 3,
                "spaceBetween": 30
                }
            }
        }
    </script>
@endpush
