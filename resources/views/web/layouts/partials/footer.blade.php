<footer id="footer" class="footer">

    <div class="container mx-auto footer-top">
        <div class="flex">
            <div class="w-4/12 md:w-1/2 footer-about">
                <a href="{{ route('home') }}" class="logo flex items-center">
                    <img src="{{ asset('assets/img/logo.png') }}"
                        onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'" alt="Hebaa-logo" />
                </a>
                <div class="footer-contact pt-3">
                    <p>{{ translation(getSetting('address_1')) }}</p>
                    <p>{{ translation(getSetting('address_2')) }}</p>
                    <p class="mt-3"><strong>{{ translation('Phone:') }}</strong>
                        <span>{{ getSetting('phone') }}</span>
                    </p>
                    <p><strong>{{ translation('Email:') }}</strong> <span>{{ getSetting('email') }}</span></p>
                </div>
                <div class="social-links flex mt-4">
                    <a href="{{ getSetting('facebook') }}" class="facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" fill="currentColor"
                            viewBox="0 0 512 512">
                            <path
                                d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                        </svg>
                    </a>
                    <a href="{{ getSetting('twitter') }}" class="twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" fill="currentColor"
                            viewBox="0 0 512 512">
                            <path
                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                        </svg>
                    </a>
                    <a href="{{ getSetting('instagram') }}" class="instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="20" fill="currentColor"
                            viewBox="0 0 448 512">
                            <path
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                        </svg>
                    </a>
                    <a href="{{ getSetting('youtube') }}" class="youtube">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="28" fill="currentColor"
                            viewBox="0 0 576 512">
                            <path
                                d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                        </svg>
                    </a>
                    <a href="{{ getSetting('tiktok') }}" class="tiktok">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="20" fill="currentColor"
                            viewBox="0 0 448 512">
                            <path
                                d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="w-auto footer-links hidden">
                <h4>{{ translation('Useful Links') }}</h4>
                <ul>
                    <li>
                        <a href="$">
                            Privacy & Policy
                        </a>
                    </li>
                </ul>
            </div>

            <div class="w-auto footer-links">
                <h4>{{ translation('Categories') }}</h4>
                <ul>
                    <li>|</li>
                    @foreach (getCategory() as $category)
                        <li>
                            <a href="{{ route('category.show', $category->slug) }}">
                                {{ translation($category->name) }}
                            </a>
                        </li>
                        <li>|</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

    <div class="container mx-auto copyright text-center mt-4">
        <p>
            © <span>{{ translation('Copyright') }}</span>
            <strong class="px-1 sitename">
                2025
                {{ translation('Hebaa Org') }}
            </strong>
            <span>
                {{ translation('All Rights Reserved') }}
            </span>
        </p>
    </div>

</footer>
