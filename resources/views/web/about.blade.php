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

@section('title', translation('About us'))

@section('content')

    <!-- Page Title -->
    <div class="page-title">
        <div class="title-wrapper">
            <h1>{{ translation('About us') }}</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container mx-auto flex flex-col gap-10" data-aos="fade-up" data-aos-delay="100">

            <div class="flex justify-between gap-4">
                <div class="w-full">
                    <h2 class="about-title">{{ translation(getSetting('site_title')) }}</h2>
                    <p class="about-description">
                        {!! contentTranslation(
                            'about',
                            'Heba Foundation for Sustainable Development
                                                                  Heba is a non-governmental organization established in Iraq in 2015 to respond to the needs of those
                                                                  affected by disasters and wars in Iraq, as well as to support the poor and underprivileged.

                                                                  The foundation operates in the development, humanitarian, and relief sectors—starting from planning
                                                                  to execution—in areas that require intervention, in coordination with its local and international
                                                                  partners.

                                                                  The organization has a team with over 15 years of accumulated experience. Its workforce includes
                                                                  more than 25 staff members comprising administrative, engineering, and medical teams, in addition to
                                                                  volunteer teams during project implementation phases.

                                                                  Heba also provides administrative and field solutions to its partners that align with the realities
                                                                  of the targeted communities, ensuring a response that meets international standards with a local
                                                                  perspective.

                                                                  Our foundation aspires to establish genuine and effective partnerships with international and local
                                                                  donors in planning and implementing humanitarian, developmental, and relief programs—serving
                                                                  humanity with a neutral and humanitarian vision.',
                        ) !!}
                    </p>
                </div>
                <div class="w-full flex justify-center items-center">
                    <img src="{{ asset('assets/img/logo.png') }}" style="max-width: 375px;" class="w-full object-contain"
                        alt="logo" />
                </div>
            </div>

            <div class="w-full" data-aos="zoom-in" data-aos-delay="200">
                <div class="video-box w-full flex justify-center items-center">
                    <iframe id="youtube-video" width="560" height="315"
                        src="https://www.youtube.com/embed/Y3Tp-iEEJUQ?si=b5GZtXsGuyEOppqc" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->
@endsection

@push('scripts')
    <script>
        function resizeIframe() {
            console.log('resized');

            const iframe = document.getElementById('youtube-video');
            const screenWidth = window.innerWidth;
            const maxWidth = 800; // الحد الأقصى للعرض لو أردت
            const width = Math.min(screenWidth * 0.9); // 90% من عرض الشاشة أو maxWidth
            const height = (width * 9) / 16; // نسبة 16:9

            iframe.style.width = width + 'px';
            iframe.style.height = height + 'px';
        }

        // استدعاء الدالة عند التحميل وتغيير حجم الشاشة
        window.addEventListener('load', resizeIframe);
        window.addEventListener('resize', resizeIframe);
    </script>
@endpush
