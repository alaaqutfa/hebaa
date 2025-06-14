@php
    $hero_project_1 = $heroProjects['hero_project_1'];
    $hero_project_2 = $heroProjects['hero_project_2'];
    $hero_project_3 = $heroProjects['hero_project_3'];
    $hero_project_4 = $heroProjects['hero_project_4'];
    $hero_project_5 = $heroProjects['hero_project_5'];
@endphp

@extends('admin.layouts.app')

@section('title', translation('Home'))

@section('content')
    <!-- Blog Hero Section -->
    <section id="blog-hero" class="blog-hero section bg-transparent">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="title">
              <h1>{{ translation('Home') }}</h1>
            </div>

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
                                                <a href="#" class="category">{{ $category->name }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="#" class="category">{{ $hero_project_1->categories[0]->name }}</a>
                            @endif
                        </div>
                        <h2 class="post-title line-clamp">
                            <a href="blog-details.html"
                                title="{{ $hero_project_1->title ?? translation('Project Name') }}">{{ $hero_project_1->title ?? translation('Project Name') }}</a>
                        </h2>
                    </div>
                    <button type="button" class="edit-hero-btn" @click="openModal('hero_project_1')">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                    </button>
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
                                                <a href="#" class="category">{{ $category->name }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="#" class="category">{{ $hero_project_2->categories[0]->name }}</a>
                            @endif
                        </div>
                        <h3 class="post-title line-clamp">
                            <a href="blog-details.html"
                                title="{{ $hero_project_2->title ?? translation('Project Name') }}">
                                {{ $hero_project_2->title ?? translation('Project Name') }}
                            </a>
                        </h3>
                    </div>
                    <button type="button" class="edit-hero-btn" @click="openModal('hero_project_2')">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                    </button>
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
                                                <a href="#" class="category">{{ $category->name }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="#" class="category">{{ $hero_project_3->categories[0]->name }}</a>
                            @endif
                        </div>
                        <h3 class="post-title line-clamp">
                            <a href="blog-details.html"
                                title="{{ $hero_project_3->title ?? translation('Project Name') }}">
                                {{ $hero_project_3->title ?? translation('Project Name') }}
                            </a>
                        </h3>
                    </div>
                    <button type="button" class="edit-hero-btn" @click="openModal('hero_project_3')">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                    </button>
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
                                                <a href="#" class="category">{{ $category->name }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="#" class="category">{{ $hero_project_4->categories[0]->name }}</a>
                            @endif
                        </div>
                        <h3 class="post-title line-clamp">
                            <a href="blog-details.html"
                                title="{{ $hero_project_4->title ?? translation('Project Name') }}">
                                {{ $hero_project_4->title ?? translation('Project Name') }}
                            </a>
                        </h3>
                    </div>
                    <button type="button" class="edit-hero-btn" @click="openModal('hero_project_4')">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                    </button>
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
                                    <div class="swiper-wrapper">
                                        @foreach ($hero_project_5->categories as $category)
                                            <div class="swiper-slide">
                                                <a href="#" class="category">{{ $category->name }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="#" class="category">{{ $hero_project_5->categories[0]->name }}</a>
                            @endif
                        </div>
                        <h3 class="post-title line-clamp">
                            <a href="blog-details.html"
                                title="{{ $hero_project_5->title ?? translation('Project Name') }}">
                                {{ $hero_project_5->title ?? translation('Project Name') }}
                            </a>
                        </h3>
                    </div>
                    <button type="button" class="edit-hero-btn" @click="openModal('hero_project_5')">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                    </button>
                </article><!-- End Blog Item -->

            </div>

        </div>

    </section>
    <!-- /Blog Hero Section -->
@endsection

@section('modal')
    <!-- Edit Hero Modals -->
    <div id="hero_project_1" class="modal">
        <!-- Modal -->
        <div class="modal-content" role="dialog">
            <!-- Header -->
            <header>
                <h2>{{ translation('Edit Hero Project') }}</h2>
                <button @click="closeModal('hero_project_1')">
                    ✕
                </button>
            </header>

            <!-- Form -->
            <form action="{{ route('admin.editSetting') }}" method="POST">
                @csrf
                <input type="hidden" name="key" value="hero_project_1" />
                <label>
                    <span>{{ translation('Select Project') }}</span>
                    <select name="value">
                        @foreach (getArticle() as $project)
                            <option value="{{ $project->id }}" @if ($project->id == $hero_project_1->id) selected @endif>
                                {{ translation($project->title) }}</option>
                        @endforeach
                    </select>
                    @error('value')
                        <span class="validate-msg invalid">{{ translation($message) }}</span>
                    @enderror
                </label>

                <!-- Footer -->
                <button type="submit" class="submit">
                    {{ translation('Edit') }}
                </button>

            </form>
        </div>
    </div>
    <div id="hero_project_2" class="modal">
        <!-- Modal -->
        <div class="modal-content" role="dialog">
            <!-- Header -->
            <header>
                <h2>{{ translation('Edit Hero Project') }}</h2>
                <button @click="closeModal('hero_project_2')">
                    ✕
                </button>
            </header>

            <!-- Form -->
            <form action="{{ route('admin.editSetting') }}" method="POST">
                @csrf
                <input type="hidden" name="key" value="hero_project_2" />
                <label>
                    <span>{{ translation('Select Project') }}</span>
                    <select name="value">
                        @foreach (getArticle() as $project)
                            <option value="{{ $project->id }}" @if ($project->id == $hero_project_2->id) selected @endif>
                                {{ translation($project->title) }}</option>
                        @endforeach
                    </select>
                    @error('value')
                        <span class="validate-msg invalid">{{ translation($message) }}</span>
                    @enderror
                </label>

                <!-- Footer -->
                <button type="submit" class="submit">
                    {{ translation('Edit') }}
                </button>

            </form>
        </div>
    </div>
    <div id="hero_project_3" class="modal">
        <!-- Modal -->
        <div class="modal-content" role="dialog">
            <!-- Header -->
            <header>
                <h2>{{ translation('Edit Hero Project') }}</h2>
                <button @click="closeModal('hero_project_3')">
                    ✕
                </button>
            </header>

            <!-- Form -->
            <form action="{{ route('admin.editSetting') }}" method="POST">
                @csrf
                <input type="hidden" name="key" value="hero_project_3" />
                <label>
                    <span>{{ translation('Select Project') }}</span>
                    <select name="value">
                        @foreach (getArticle() as $project)
                            <option value="{{ $project->id }}" @if ($project->id == $hero_project_3->id) selected @endif>
                                {{ translation($project->title) }}</option>
                        @endforeach
                    </select>
                    @error('value')
                        <span class="validate-msg invalid">{{ translation($message) }}</span>
                    @enderror
                </label>

                <!-- Footer -->
                <button type="submit" class="submit">
                    {{ translation('Edit') }}
                </button>

            </form>
        </div>
    </div>
    <div id="hero_project_4" class="modal">
        <!-- Modal -->
        <div class="modal-content" role="dialog">
            <!-- Header -->
            <header>
                <h2>{{ translation('Edit Hero Project') }}</h2>
                <button @click="closeModal('hero_project_4')">
                    ✕
                </button>
            </header>

            <!-- Form -->
            <form action="{{ route('admin.editSetting') }}" method="POST">
                @csrf
                <input type="hidden" name="key" value="hero_project_4" />
                <label>
                    <span>{{ translation('Select Project') }}</span>
                    <select name="value">
                        @foreach (getArticle() as $project)
                            <option value="{{ $project->id }}" @if ($project->id == $hero_project_4->id) selected @endif>
                                {{ translation($project->title) }}</option>
                        @endforeach
                    </select>
                    @error('value')
                        <span class="validate-msg invalid">{{ translation($message) }}</span>
                    @enderror
                </label>

                <!-- Footer -->
                <button type="submit" class="submit">
                    {{ translation('Edit') }}
                </button>

            </form>
        </div>
    </div>
    <div id="hero_project_5" class="modal">
        <!-- Modal -->
        <div class="modal-content" role="dialog">
            <!-- Header -->
            <header>
                <h2>{{ translation('Edit Hero Project') }}</h2>
                <button @click="closeModal('hero_project_5')">
                    ✕
                </button>
            </header>

            <!-- Form -->
            <form action="{{ route('admin.editSetting') }}" method="POST">
                @csrf
                <input type="hidden" name="key" value="hero_project_5" />
                <label>
                    <span>{{ translation('Select Project') }}</span>
                    <select name="value">
                        @foreach (getArticle() as $project)
                            <option value="{{ $project->id }}" @if ($project->id == $hero_project_5->id) selected @endif>
                                {{ translation($project->title) }}</option>
                        @endforeach
                    </select>
                    @error('value')
                        <span class="validate-msg invalid">{{ translation($message) }}</span>
                    @enderror
                </label>

                <!-- Footer -->
                <button type="submit" class="submit">
                    {{ translation('Edit') }}
                </button>

            </form>
        </div>
    </div>
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
                    "640": {
                    "slidesPerView": 2
                    },
                    "768": {
                    "slidesPerView": 3
                    },
                    "1024": {
                    "slidesPerView": 5
                    }
                }
            }
    </script>
@endpush
