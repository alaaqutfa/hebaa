  <header id="header" class="web header">
      <div class="container mx-auto">

          <div class="top-row">
              <a href="index.html" class="logo">
                  <img src="{{ asset('assets/img/logo.png') }}" alt="شعار حباء" />
              </a>

              <div class="mobile-side">
                  <!-- Mobile hamburger -->
                  <button type="button" class="hamburger" aria-label="Menu" onclick="mobileNavToogle()">
                      <svg class="list-icon w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd"
                              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                              clip-rule="evenodd"></path>
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" class="x-icon w-6 h-6" aria-hidden="true"
                          fill="currentColor" viewBox="0 0 384 512">
                          <path
                              d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                      </svg>
                  </button>

                  @if (Auth::check())
                      @php($user = Auth::user())
                      <div class="header-profile">
                          <button @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                              aria-haspopup="true">
                              <img src="{{ asset('storage/' . $user->avatar) }}"
                                  onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'"
                                  alt="hebaa-user-profile" aria-hidden="true" />
                          </button>
                          <template v-if="isProfileMenuOpen">
                              <transition name="fade">
                                  <ul v-if="isProfileMenuOpen" @click.self="closeProfileMenu"
                                      @keydown.esc="closeProfileMenu" class="header-profile-list" aria-label="submenu">
                                      @if (Auth::user()->is_admin)
                                          <li>
                                              <a href="{{ route('admin.dashboard') }}">
                                                  <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                      stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      viewBox="0 0 24 24" stroke="currentColor">
                                                      <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                                      <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                                  </svg>
                                                  <span>{{ translation('Dashboard') }}</span>
                                              </a>
                                          </li>
                                      @endif
                                      <li>
                                          <a href="#">
                                              <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                                  stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                                  stroke-linejoin="round">
                                                  <path
                                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                              </svg>
                                              <span>{{ translation('Profile') }}</span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="{{ route('auth.logout') }}">
                                              <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                                  stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                                  stroke-linejoin="round">
                                                  <path
                                                      d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                              </svg>
                                              <span>{{ translation('Log out') }}</span>
                                          </a>
                                      </li>
                                  </ul>
                              </transition>
                          </template>
                      </div>
                  @endif
              </div>

              <div class="web-nav">
                  <div class="social-links hidden justify-center items-center">
                      <a href="{{ getSetting('facebook') }}" class="facebook">
                          <svg xmlns="http://www.w3.org/2000/svg" height="28" width="28" fill="currentColor"
                              viewBox="0 0 512 512">
                              <path
                                  d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                          </svg>
                      </a>
                      <a href="{{ getSetting('twitter') }}" class="twitter">
                          <svg xmlns="http://www.w3.org/2000/svg" height="28" width="28" fill="currentColor"
                              viewBox="0 0 512 512">
                              <path
                                  d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                          </svg>
                      </a>
                      <a href="{{ getSetting('instagram') }}" class="instagram">
                          <svg xmlns="http://www.w3.org/2000/svg" height="28" width="24" fill="currentColor"
                              viewBox="0 0 448 512">
                              <path
                                  d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                          </svg>
                      </a>
                      <a href="{{ getSetting('youtube') }}" class="youtube">
                          <svg xmlns="http://www.w3.org/2000/svg" height="28" width="32" fill="currentColor"
                              viewBox="0 0 576 512">
                              <path
                                  d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                          </svg>
                      </a>
                      <a href="{{ getSetting('tiktok') }}" class="tiktok">
                          <svg xmlns="http://www.w3.org/2000/svg" height="28" width="24" fill="currentColor"
                              viewBox="0 0 448 512">
                              <path
                                  d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                          </svg>
                      </a>
                  </div>

                  <div class="languages">
                      <select onchange="location.href=this.value">
                          @foreach (getLanguage() as $lang)
                              <option value="{{ route('languages.switch', $lang->code) }}"
                                  @if (app()->getLocale() === $lang->code) selected @endif>
                                  {{ $lang->name }}
                              </option>
                          @endforeach
                      </select>
                      <button class="hidden" @click="toggleTheme" aria-label="Toggle color mode">
                          <template v-if="!dark">
                              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                              </svg>
                          </template>
                          <template v-if="dark">
                              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd"
                                      d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                      clip-rule="evenodd"></path>
                              </svg>
                          </template>
                      </button>
                  </div>

                  <form class="search-form ms-4" action="{{ route('search') }}" method="GET">
                      <label>
                          <input type="text" name="q" placeholder="{{ translation('Search...') }}"
                              class="form-control" value="{{ request('q') }}">
                          <button type="submit" class="btn">
                              <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                  fill="currentColor" viewBox="0 0 512 512">
                                  <path
                                      d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                              </svg>
                          </button>
                      </label>
                  </form>

                  @if (!Auth::check())
                      <div class="header-auth">

                          <a href="{{ route('auth.get.register') }}"
                              class="register-btn">{{ translation('Register') }}</a>

                          <a href="{{ route('auth.get.login') }}" class="login-btn">{{ translation('Log in') }}</a>

                      </div>
                  @else
                      @php($user = Auth::user())
                      <div class="header-profile">
                          <button @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                              aria-haspopup="true">
                              <img src="{{ asset('storage/' . $user->avatar) }}"
                                  onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'"
                                  alt="hebaa-user-profile" aria-hidden="true" />
                          </button>
                          <template v-if="isProfileMenuOpen">
                              <transition name="fade">
                                  <ul v-if="isProfileMenuOpen" @click.self="closeProfileMenu"
                                      @keydown.esc="closeProfileMenu" class="header-profile-list"
                                      aria-label="submenu">
                                      @if (Auth::user()->is_admin)
                                          <li>
                                              <a href="{{ route('admin.dashboard') }}">
                                                  <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                      stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      viewBox="0 0 24 24" stroke="currentColor">
                                                      <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                                      <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                                  </svg>
                                                  <span>{{ translation('Dashboard') }}</span>
                                              </a>
                                          </li>
                                      @endif
                                      <li>
                                          <a
                                              href="@if (Auth::user()->is_admin) {{ route('admin.profile') }} @else {{ route('profile') }} @endif">
                                              <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                                  stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                                  stroke-linejoin="round">
                                                  <path
                                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                              </svg>
                                              <span>{{ translation('Profile') }}</span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="{{ route('auth.logout') }}">
                                              <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                                  stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                                  stroke-linejoin="round">
                                                  <path
                                                      d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                              </svg>
                                              <span>{{ translation('Log out') }}</span>
                                          </a>
                                      </li>
                                  </ul>
                              </transition>
                          </template>
                      </div>
                  @endif
              </div>
          </div>

      </div>

      <div class="nav-wrap">
          <div class="container flex justify-center items-center gap-4 relative">
              <nav id="navmenu" class="navmenu">
                  <ul>
                      @if (!Auth::check())
                          <li class="auth">
                              <div class="header-auth">

                                  <a href="{{ route('auth.get.register') }}"
                                      class="register-btn">{{ translation('Register') }}</a>

                                  <a href="{{ route('auth.get.login') }}"
                                      class="login-btn">{{ translation('Log in') }}</a>

                              </div>
                          </li>
                      @endif
                      <li>
                          <a href="{{ route('home') }}">
                              {{ translation('Home') }}
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('about') }}">
                              {{ translation('About us') }}
                          </a>
                      </li>
                      @foreach (getCategory() as $category)
                          <li>
                              <a href="{{ route('category.show', $category->slug) }}">
                                  {{ translation($category->name) }}
                              </a>
                          </li>
                      @endforeach
                      <li class="social">
                          <div class="social-links flex justify-center items-center gap-2">
                              <a href="{{ getSetting('facebook') }}" class="facebook">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="28" width="28"
                                      fill="currentColor" viewBox="0 0 512 512">
                                      <path
                                          d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                                  </svg>
                              </a>
                              <a href="{{ getSetting('twitter') }}" class="twitter">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="28" width="28"
                                      fill="currentColor" viewBox="0 0 512 512">
                                      <path
                                          d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                  </svg>
                              </a>
                              <a href="{{ getSetting('instagram') }}" class="instagram">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="28" width="24"
                                      fill="currentColor" viewBox="0 0 448 512">
                                      <path
                                          d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                  </svg>
                              </a>
                              <a href="{{ getSetting('youtube') }}" class="youtube">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="28" width="32"
                                      fill="currentColor" viewBox="0 0 576 512">
                                      <path
                                          d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                                  </svg>
                              </a>
                              <a href="{{ getSetting('tiktok') }}" class="tiktok">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="28" width="24"
                                      fill="currentColor" viewBox="0 0 448 512">
                                      <path
                                          d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                                  </svg>
                              </a>
                          </div>
                      </li>
                  </ul>
              </nav>
          </div>
      </div>

  </header>
