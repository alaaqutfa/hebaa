@extends('web.layouts.app')

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
                                    <p class="post-author">{{ $project->user->name . " ". $project->user->last_name }}</p>
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
