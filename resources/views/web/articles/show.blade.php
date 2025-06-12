@extends('web.layouts.app')

@section('title', translation($project->title))

@section('content')

    <div class="container mx-auto">

        <div class="project-content">

            <div class="project-content-side">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container" data-aos="fade-up">

                        <article class="article">

                            <div class="hero-img" data-aos="zoom-in">
                                <img src="{{ asset('storage/' . $project->image) }}"
                                    onerror="this.src='{{ asset('assets/img/placeholder-rect.jpg') }}'"
                                    alt="Featured blog image" class="img-fluid" loading="lazy">
                                <div class="meta-overlay">
                                    <div class="meta-categories">
                                        @if (count($project->categories) > 1)
                                            <div class="init-swiper categories-slider" data-name="categories-swiper-config">
                                                <div class="swiper-wrapper">
                                                    @foreach ($project->categories as $category)
                                                        <div class="swiper-slide">
                                                            <a href="{{ route('category.show', $category->slug) }}"
                                                                class="category">{{ translation($category->name) }}</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <a href="{{ route('category.show', $project->categories[0]->slug) }}"
                                                class="category">{{ translation($project->categories[0]->name) }}
                                            </a>
                                        @endif
                                        {{-- <span class="divider">•</span>
                                        <span class="reading-time"><i class="bi bi-clock"></i> 6 min read</span> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                                <div class="content-header">
                                    <h1 class="title">
                                        {{ translation($project->title) }}
                                    </h1>

                                    <div class="author-info">
                                        {{-- <div class="author-details">
                                            <img src="assets/img/person/person-f-8.webp" alt="Author" class="author-img">
                                            <div class="info">
                                                <h4>Michael Chen</h4>
                                                <span class="role">Senior Web Developer</span>
                                            </div>
                                        </div> --}}
                                        <div class="post-meta">
                                            <span class="date flex justify-center items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21"
                                                    fill="currentColor" viewBox="0 0 448 512">
                                                    <path
                                                        d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l352 0 0 256c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256z" />
                                                </svg>
                                                {{ $project->date }}
                                            </span>
                                            {{-- <span class="divider">•</span>
                                            <span class="comments"><i class="bi bi-chat-text"></i> 18 Comments</span> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="content">
                                    <p>
                                        {!! contentTranslation($project->id, $project->content) !!}
                                    </p>
                                </div>

                                <div class="meta-bottom">
                                    <div class="tags-section">
                                        <h4>{{ translation('Related Topics') }}</h4>
                                        <div class="tags">
                                            @foreach ($project->categories as $category)
                                                <a href="{{ route('category.show', $category->slug) }}"
                                                    class="tag">#{{ translation($category->name) }}</a>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="share-section">
                                        <h4>{{ translation('Share Project') }}</h4>
                                        <div class="social-links">
                                            <a href="{{ getSetting('facebook') }}" class="facebook">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                                    fill="currentColor" viewBox="0 0 512 512">
                                                    <path
                                                        d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                                                </svg>
                                            </a>
                                            <a href="{{ getSetting('twitter') }}" class="twitter">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                                    fill="currentColor" viewBox="0 0 512 512">
                                                    <path
                                                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                                </svg>
                                            </a>
                                            <a href="{{ getSetting('instagram') }}" class="instagram">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="20"
                                                    fill="currentColor" viewBox="0 0 448 512">
                                                    <path
                                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                                </svg>
                                            </a>
                                            <a href="{{ getSetting('youtube') }}" class="youtube">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="28"
                                                    fill="currentColor" viewBox="0 0 576 512">
                                                    <path
                                                        d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                                                </svg>
                                            </a>
                                            <a href="{{ getSetting('tiktok') }}" class="tiktok">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="20"
                                                    fill="currentColor" viewBox="0 0 448 512">
                                                    <path
                                                        d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->

                {{-- <!-- Blog Author Section -->
                <section id="blog-author" class="blog-author section">

                    <div class="container" data-aos="fade-up">
                        <div class="author-box">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-md-4 text-center">
                                    <img src="assets/img/person/person-f-12.webp" class="author-img rounded-circle"
                                        alt="" loading="lazy">

                                    <div class="author-social-links mt-3">
                                        <a href="https://twitter.com/#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                                        <a href="https://linkedin.com/#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                        <a href="https://github.com/#" class="github"><i class="bi bi-github"></i></a>
                                        <a href="https://facebook.com/#" class="facebook"><i class="bi bi-facebook"></i></a>
                                        <a href="https://instagram.com/#" class="instagram"><i
                                                class="bi bi-instagram"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-8">
                                    <div class="author-content">
                                        <h3 class="author-name">Sarah Anderson</h3>
                                        <span class="author-title">Senior Tech Writer &amp; Developer Advocate</span>

                                        <div class="author-bio mt-3">
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium. Passionate about creating content that bridges the gap
                                            between developers and end-users.
                                        </div>

                                        <div class="author-website mt-3">
                                            <a href="#" class="website-link">
                                                <i class="bi bi-globe"></i>
                                                <span>sarahanderson.dev</span>
                                            </a>
                                            <a href="#" class="more-posts">
                                                Read More from Sarah <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section><!-- /Blog Author Section --> --}}

                {{-- <!-- Blog Comments Section -->
                <section id="blog-comments" class="blog-comments section">

                    <div class="container" data-aos="fade-up" data-aos-delay="100">

                        <div class="blog-comments-3">
                            <div class="section-header">
                                <h3>Discussion <span class="comment-count">(8)</span></h3>
                            </div>

                            <div class="comments-wrapper">
                                <!-- Comment 1 -->
                                <article class="comment-card">
                                    <div class="comment-header">
                                        <div class="user-info">
                                            <img src="assets/img/person/person-f-9.webp" alt="User avatar"
                                                loading="lazy">
                                            <div class="meta">
                                                <h4 class="name">Sarah Williams</h4>
                                                <span class="date"><i class="bi bi-calendar3"></i> February 13,
                                                    2025</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                            rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen
                                            aliquam, risus at semper.</p>
                                    </div>
                                    <div class="comment-actions">
                                        <button class="action-btn like-btn">
                                            <i class="bi bi-hand-thumbs-up"></i>
                                            <span>12</span>
                                        </button>
                                        <button class="action-btn reply-btn">
                                            <i class="bi bi-reply"></i>
                                            <span>Reply</span>
                                        </button>
                                    </div>
                                </article>

                                <!-- Comment 2 with replies -->
                                <article class="comment-card">
                                    <div class="comment-header">
                                        <div class="user-info">
                                            <img src="assets/img/person/person-m-9.webp" alt="User avatar"
                                                loading="lazy">
                                            <div class="meta">
                                                <h4 class="name">James Cooper</h4>
                                                <span class="date"><i class="bi bi-calendar3"></i> February 13,
                                                    2025</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Quisque ut nisi. Donec mi odio, faucibus at, scelerisque quis, convallis in,
                                            nisi. Suspendisse non nisl sit amet velit hendrerit rutrum. Ut leo. Ut a nisl id
                                            ante tempus hendrerit.</p>
                                    </div>
                                    <div class="comment-actions">
                                        <button class="action-btn like-btn">
                                            <i class="bi bi-hand-thumbs-up"></i>
                                            <span>8</span>
                                        </button>
                                        <button class="action-btn reply-btn">
                                            <i class="bi bi-reply"></i>
                                            <span>Reply</span>
                                        </button>
                                    </div>

                                    <!-- Reply Thread -->
                                    <div class="reply-thread">
                                        <!-- Reply 1 -->
                                        <article class="comment-card reply">
                                            <div class="comment-header">
                                                <div class="user-info">
                                                    <img src="assets/img/person/person-f-9.webp" alt="User avatar"
                                                        loading="lazy">
                                                    <div class="meta">
                                                        <h4 class="name">Emily Parker</h4>
                                                        <span class="date"><i class="bi bi-calendar3"></i> February 13,
                                                            2025</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                <p>Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum
                                                    primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                                            </div>
                                            <div class="comment-actions">
                                                <button class="action-btn like-btn">
                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                    <span>5</span>
                                                </button>
                                                <button class="action-btn reply-btn">
                                                    <i class="bi bi-reply"></i>
                                                    <span>Reply</span>
                                                </button>
                                            </div>
                                        </article>

                                        <!-- Reply 2 -->
                                        <article class="comment-card reply">
                                            <div class="comment-header">
                                                <div class="user-info">
                                                    <img src="assets/img/person/person-f-7.webp" alt="User avatar"
                                                        loading="lazy">
                                                    <div class="meta">
                                                        <h4 class="name">Daniel Brown</h4>
                                                        <span class="date"><i class="bi bi-calendar3"></i> February 13,
                                                            2025</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                <p>Nam commodo suscipit quam. Vestibulum ullamcorper mauris at ligula. Fusce
                                                    fermentum odio nec arcu.</p>
                                            </div>
                                            <div class="comment-actions">
                                                <button class="action-btn like-btn">
                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                    <span>3</span>
                                                </button>
                                                <button class="action-btn reply-btn">
                                                    <i class="bi bi-reply"></i>
                                                    <span>Reply</span>
                                                </button>
                                            </div>
                                        </article>
                                    </div>
                                </article>

                                <!-- Comment 3 -->
                                <article class="comment-card">
                                    <div class="comment-header">
                                        <div class="user-info">
                                            <img src="assets/img/person/person-m-6.webp" alt="User avatar"
                                                loading="lazy">
                                            <div class="meta">
                                                <h4 class="name">Rachel Adams</h4>
                                                <span class="date"><i class="bi bi-calendar3"></i> February 13,
                                                    2025</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo
                                            ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                    </div>
                                    <div class="comment-actions">
                                        <button class="action-btn like-btn">
                                            <i class="bi bi-hand-thumbs-up"></i>
                                            <span>6</span>
                                        </button>
                                        <button class="action-btn reply-btn">
                                            <i class="bi bi-reply"></i>
                                            <span>Reply</span>
                                        </button>
                                    </div>
                                </article>
                            </div>
                        </div>

                    </div>

                </section><!-- /Blog Comments Section --> --}}

                <!-- Blog Comment Form Section -->
                <section id="blog-comment-form" class="blog-comment-form section">

                    <div class="container mx-auto" data-aos="fade-up" data-aos-delay="100">

                        <form method="post" role="form">

                            <div class="section-header">
                                <h3>{{ translation('Share Your Thoughts') }}</h3>
                                <p>
                                    {{ translation('Your email address will not be published. Required fields are marked *') }}
                                </p>
                            </div>

                            <div class="grid grid-cols-1 gap-4">
                                <div class="flex flex-col">
                                    <label for="name" class="mb-1 font-medium">{{ translation('Full Name') }} *</label>
                                    <input type="text" name="name" id="name" required
                                        placeholder="{{ translation('Enter your full name') }}"
                                        class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <div class="flex flex-col">
                                    <label for="email" class="mb-1 font-medium">{{ translation('Email Address') }}
                                        *</label>
                                    <input type="email" name="email" id="email" required
                                        placeholder="{{ translation('Enter your email address') }}"
                                        class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <div class="col-span-1 flex flex-col">
                                    <label for="comment" class="mb-1 font-medium">{{ translation('Your Comment') }}
                                        *</label>
                                    <textarea name="comment" id="comment" rows="5" required
                                        placeholder="{{ translation('Write your thoughts here...') }}"
                                        class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                </div>

                                <div class="col-span-1 text-center">
                                    <button type="submit" class="btn-submit">
                                        {{ translation('send') }}
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
                        <form action="">
                            <input type="search" class="w-full focus:border-none focus:outline-none focus:ring-0" />
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

                            <h3 class="widget-title">{{ translation('Recent Projects') }}</h3>
                            @foreach ($recent as $r)
                                @foreach ($r['articles'] as $project)
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
                                            <time datetime="{{ $project->date }}">
                                                {{ $project->date }}
                                            </time>
                                        </div>
                                    </div><!-- End recent post item-->
                                @endforeach
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
