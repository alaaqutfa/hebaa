<header id="header" class="admin">
    <div class="container">
        <!-- Mobile hamburger -->
        <button class="hamburger" @click="toggleSideMenu" aria-label="Menu">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <!-- Search input -->
        <div class="search-input">
            <div>
                <div class="icon">
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" placeholder="{{ translation('Search for projects') }}" aria-label="Search" />
            </div>
        </div>
        <ul class="header-list">
            <!-- Theme toggler -->
            <li class="theme-toggler">
                <button class="" @click="toggleTheme" aria-label="Toggle color mode">
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
            </li>
            <li class="languages">
                <select onchange="location.href=this.value">
                    @foreach (getLanguage() as $lang)
                        <option value="{{ route('languages.switch', $lang->code) }}"
                            @if (app()->getLocale() === $lang->code) selected @endif>
                            {{ $lang->name }}
                        </option>
                    @endforeach
                </select>
              </li>
            <!-- Notifications menu -->
            <li class="notifications-menu">
                <button @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu"
                    aria-label="Notifications" aria-haspopup="true">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                        </path>
                    </svg>
                    <!-- Notification badge -->
                    <span aria-hidden="true" class="badge"></span>
                </button>
                <template v-if="isNotificationsMenuOpen">
                    <transition name="fade">
                        <ul v-if="isNotificationsMenuOpen" @click.self="closeNotificationsMenu"
                            @keydown.esc="closeNotificationsMenu" class="notifications-menu-list">
                            <li>
                                <a class="" href="#">
                                    <span>Messages</span>
                                    <span>
                                        13
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Sales</span>
                                    <span class="">
                                        2
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </transition>
                </template>
            </li>
            <!-- Profile menu -->
            <li class="profile-menu">
                <button @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                    aria-haspopup="true">
                    <img src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                        alt="hebaa-user-profile" aria-hidden="true" />
                </button>
                <template v-if="isProfileMenuOpen">
                    <transition name="fade">
                        <ul v-if="isProfileMenuOpen" @click.self="closeProfileMenu" @keydown.esc="closeProfileMenu"
                            class="profile-menu-list" aria-label="submenu">
                            <li>
                                <a href="#">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>{{ translation('Profile') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>{{ translation('Settings') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.logout') }}">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                    <span>{{ translation('Log out') }}</span>
                                </a>
                            </li>
                        </ul>
                    </transition>
                </template>
            </li>
        </ul>
    </div>
</header>
