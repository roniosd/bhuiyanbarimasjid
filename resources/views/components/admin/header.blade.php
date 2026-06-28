<header>
    <div class="container-fluid">
        <div class="row">
            <div
                class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-4 col-9 d-flex align-items-center justify-content-between">
                <i class="fa fa-bars" id="hamburger" style="margin-right: 10px"></i>
                <a class="logo">
                    <img width="159" height="43" class="img-fluid"
                        src="{{ asset('/public/storage/logos/' . $setting->logo) }}" alt="header" />

                </a>
            </div>
            <div class="col-xxl-6 col-xl-7 col-lg-6 header-middle-top">
                <div class="header-middle">
                    <form action="" class="search-bar">
                        <div class="form-group">
                            <input type="text" placeholder="Search Settings">
                            <button class="btn">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9.52167" cy="9.65552" r="5.48622"
                                        transform="rotate(-45 9.52167 9.65552)" stroke="#060610"
                                        stroke-width="1.33444" />
                                    <path d="M13.541 13.5239L16.606 16.4231" stroke="#060610" stroke-width="1.33444"
                                        stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    <ul class="menu">
                        <li><a target="_blank" href="{{ url('https://bhuiyanbarimasjid.bd') }}">Main Site</a></li>
                        <li><a href="{{ route('gallery.all') }}"
                                class="{{ request()->is('gallery.all') ? 'active' : '' }}"> Gallery Images
                            </a></li>
                        <li>
                            <a href="{{ route('doners') }}" class="{{ request()->is('doners') ? 'active' : '' }}">
                                Doner list
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('feedbacks') }}" class="{{ request()->is('feedbacks') ? 'active' : '' }}">
                                Feedback List
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xxl-4 col-xl-3 col-lg-3 col-md-8 col-sm-8 col-3">
                <div class="profile-thumb">
                    <a href="#" class="notification">
                        <svg width="24" height="28" viewBox="0 0 24 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24 20.6667H22.3747L21.3333 16.5027V11.3334C21.3307 9.09089 20.5208 6.92434 19.0518 5.23006C17.5827 3.53577 15.5528 2.42704 13.3333 2.10669V0.666687H10.6667V2.10669C8.4472 2.42704 6.41727 3.53577 4.94824 5.23006C3.47921 6.92434 2.66929 9.09089 2.66667 11.3334V16.5027L1.62533 20.6667H0V23.3334H6.856C7.14703 24.4768 7.81074 25.4907 8.74229 26.2148C9.67383 26.939 10.8201 27.3321 12 27.3321C13.1799 27.3321 14.3262 26.939 15.2577 26.2148C16.1893 25.4907 16.853 24.4768 17.144 23.3334H24V20.6667ZM5.29333 16.9907L5.33333 11.3334C5.33333 9.56524 6.03571 7.86955 7.28595 6.61931C8.5362 5.36907 10.2319 4.66669 12 4.66669C13.7681 4.66669 15.4638 5.36907 16.714 6.61931C17.9643 7.86955 18.6667 9.56524 18.6667 11.3334V16.6667L19.6373 20.6667H4.37467L5.29333 16.9907ZM12 24.6667C11.534 24.6653 11.0765 24.5414 10.6735 24.3073C10.2706 24.0733 9.93619 23.7374 9.704 23.3334H14.296C14.0638 23.7374 13.7294 24.0733 13.3265 24.3073C12.9235 24.5414 12.466 24.6653 12 24.6667Z"
                                fill="#B5B5B8" />
                        </svg>
                        <span>6</span>
                    </a>
                    @auth('admin')
                        @if (Auth::check())
                            <div class="mini-profile">
                                <img src="{{ asset('public/storage/' . (Auth::user()->photo ? 'profile/' . Auth::user()->photo : 'default/profile.png')) }}"
                                    alt="profile img">
                                <div class="mini-profile-info">
                                    <h3>{{ Auth::user()->full_name }}</h3>
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        @endif
                    @endauth


                    <div class="mini-dropdown menu-item">
                        <svg id="dropdown" width="18" height="11" viewBox="0 0 18 11" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.99997 10.414L0.292969 1.70703L1.70697 0.29303L8.99997 7.58603L16.293 0.29303L17.707 1.70703L8.99997 10.414Z"
                                fill="black" />
                        </svg>
                        <ul class="submenu mt-3 d-none shadow list-unstyled">
                            <li class="mb-2">
                                <a href="{{ route('siteSetting') }}"
                                    class="d-flex align-items-center text-decoration-none text-dark">
                                    <svg width="14" height="14" viewBox="0 0 24 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="me-2">
                                        <path fill="#B5B5B8"
                                            d="M18.06 0a.22.22 0 0 0-.25.22l-.12 1.02a5.93 5.93 0 0 0-1.34.75l-.94-.41a.23.23 0 0 0-.32.1l-.94 1.62a.23.23 0 0 0 .07.33l.81.6a5.2 5.2 0 0 0 0 1.52l-.81.6a.23.23 0 0 0-.07.33l.94 1.62a.23.23 0 0 0 .32.1l.94-.4a5.93 5.93 0 0 0 1.34.75l.12 1.02a.22.22 0 0 0 .25.22h1.87a.22.22 0 0 0 .25-.22l.12-1.02a5.93 5.93 0 0 0 1.34-.75l.94.4a.23.23 0 0 0 .32-.1l.94-1.62a.23.23 0 0 0-.07-.33l-.81-.6a5.2 5.2 0 0 0 0-1.52l.81-.6a.23.23 0 0 0 .07-.33l-.94-1.62a.23.23 0 0 0-.32-.1l-.94.41a5.93 5.93 0 0 0-1.34-.75l-.12-1.02a.22.22 0 0 0-.25-.22h-1.87ZM19 3a2 2 0 1 1 0 4 2 2 0 0 1 0-4ZM4 4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2H0v2h24v-2h-4a2 2 0 0 0 2-2v-4.68a6.77 6.77 0 0 1-1 .6V16H4V6h8.08A5.8 5.8 0 0 1 12 5c0-.34.03-.67.08-1H4Z" />
                                    </svg>
                                    Site Setting
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    class="d-flex align-items-center text-decoration-none text-dark">
                                    <svg width="14" height="14" viewBox="0 0 18 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="me-2">
                                        <path
                                            d="M2 0C0.895 0 0 0.895 0 2V18C0 19.105 0.895 20 2 20H10C11.105 20 12 19.105 12 18V13H10V18H2V2H10V7H12V2C12 0.895 11.105 0 10 0H2ZM14 6V9H5V11H14V14L18 10L14 6Z"
                                            fill="#B5B5B8" />
                                    </svg>
                                    Logout
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </div>

    @if (session('success'))
        <div id="success-alert" class="alert alert-success text-center mt-3">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div id="error-alert" class="alert alert-danger text-center mt-3">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div id="validated-alert" class="alert alert-danger text-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</header>
