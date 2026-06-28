<nav class="h-16 fixed top-0 w-full z-50 ">

    <!-- Top Gradient Bar -->
    <div class="flex items-center justify-between h-full px-4 lg-px-6  bg-white shadow-2xl">
        <!-- Left -->
        <div class="flex items-center gap-6">

            <div class="">
                <x-application-logo class="size-3 text-white" />
            </div>

            <!-- Mobile Menu -->
            <div
                class="text-black text-xl hover:bg-white/10 w-10 h-10 rounded-lg transition flex items-center justify-center mx-2">
                <i class="bi bi-list text-3xl z-1000 cursor-pointer" id="hamburger"></i>
            </div>

            <!-- Links -->
            <div class="hidden md:flex items-center gap-6 text-sm text-black/90">

                <a href="https://bhuiyanbarimasjid.bd" target="_blank" class="text-black transition font-medium">
                    Main Site
                </a>

                <a href="{{ route('gallery.all') }}" target="_blank" class="font-medium text-black transition">
                    Site Gallery
                </a>

            </div>

        </div>

        <!-- Right User -->
        <div class="flex items-center">

            <x-dropdown align="right" width="56">

                <x-slot name="trigger">

                    <div class="flex items-center gap-3 hover:bg-white/10 px-3 py-2 rounded-xl transition">

                        <!-- Avatar -->
                        <img class="w-9 h-9 rounded-full object-cover border-2 border-white/30"
                            src="{{ Auth::guard('admin')->user()->photo ?? asset('/public/storage/default/profile.png') }}"
                            alt="Profile">

                        <!-- Info -->
                        <div class="hidden lg:block text-left leading-tight">

                            <div class="text-sm font-semibold text-black">
                                {{ Auth::guard('admin')->user()->full_name ?? '' }}
                            </div>

                            <div class="text-[11px] text-black/80 max-w-45 truncate">
                                {{ Auth::guard('admin')->user()->email }}
                            </div>

                        </div>

                    </div>

                </x-slot>

                <!-- Dropdown -->
                <x-slot name="content">

                    <div class="w-72 overflow-hidden">

                        <!-- TOP HEADER -->
                        <div class="bg-linear-to-r from-emerald-500 via-green-500 to-lime-500 px-5 py-2">

                            <div class="flex items-center gap-3">

                                <!-- Avatar -->
                                <img class="w-12 h-12 rounded-full border-2 border-white/40 object-cover"
                                    src="{{ Auth::guard('admin')->user()->photo ?? asset('/public/storage/default/profile.png') }}"
                                    alt="Profile">

                                <!-- User -->
                                <div>

                                    <h3 class="text-sm font-semibold text-black">
                                        {{ Auth::guard('admin')->user()?->full_name }}
                                    </h3>

                                    <p class="text-xs text-black/80 max-w-45 truncate">
                                        {{ Auth::guard('admin')->user()?->email }}
                                    </p>

                                </div>

                            </div>

                        </div>

                        <!-- MENU -->
                        <div class="p-2 bg-white">

                            <!-- Profile -->
                            {{-- <x-dropdown-link :href="route('profile.edit')"
                                class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-700 hover:bg-emerald-50 transition duration-200">

                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100">

                                    <i class="bi bi-person text-emerald-600"></i>

                                </div>

                                <div>

                                    <div class="text-sm font-medium">
                                        Profile
                                    </div>

                                    <div class="text-xs text-slate-400">
                                        Manage your account
                                    </div>

                                </div>

                            </x-dropdown-link> --}}

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="mt-1 flex items-center gap-3 rounded-xl px-4 py-3 text-slate-700 hover:bg-red-50 transition duration-200">

                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100">

                                        <i class="bi bi-box-arrow-right text-red-500"></i>

                                    </div>

                                    <div>

                                        <div class="text-sm font-medium">
                                            Logout
                                        </div>

                                        <div class="text-xs text-slate-400">
                                            Securely sign out
                                        </div>

                                    </div>

                                </x-dropdown-link>

                            </form>

                        </div>

                    </div>

                </x-slot>

            </x-dropdown>

        </div>

    </div>
</nav>
