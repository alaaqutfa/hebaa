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
                                        <h4>Share Article</h4>
                                        <div class="social-links">
                                            <a href="#" class="twitter">
                                                <i class="bi bi-twitter-x"></i>
                                            </a>
                                            <a href="#" class="facebook">
                                                <i class="bi bi-facebook"></i>
                                            </a>
                                            <a href="#" class="linkedin">
                                                <i class="bi bi-linkedin"></i>
                                            </a>
                                            <a href="#" class="copy-link" title="Copy Link">
                                                <i class="bi bi-link-45deg"></i>
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

                    <div class="container" data-aos="fade-up" data-aos-delay="100">

                        <form method="post" role="form">

                            <div class="section-header">
                                <h3>Share Your Thoughts</h3>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div>

                            <div class="row gy-3">
                                <div class="col-md-6 form-group">
                                    <label for="name">Full Name *</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter your full name" required="">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="email">Email Address *</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter your email address" required="">
                                </div>

                                <div class="col-12 form-group">
                                    <label for="website">Website</label>
                                    <input type="url" name="website" class="form-control" id="website"
                                        placeholder="Your website (optional)">
                                </div>

                                <div class="col-12 form-group">
                                    <label for="comment">Your Comment *</label>
                                    <textarea class="form-control" name="comment" id="comment" rows="5" placeholder="Write your thoughts here..."
                                        required=""></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn-submit">Post Comment</button>
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

                        <h3 class="widget-title">Search</h3>
                        <form action="">
                            <input type="search">
                            <button type="submit" title="Search">
                                <i class="bi bi-search"></i>
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
