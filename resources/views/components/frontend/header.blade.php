@props(['menus'])
<header style="position: sticky; top: 0; z-index: 1030; background: white;" class="shadow-sm">
    <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center py-3 gap-0 gap-lg-5">
        <div>
            <a href="{{ route('homePage') }}" class="logo_container">
                <img class="img-fluid" src="{{ asset('/public/storage/logos/' . $setting->logo) }}" alt="header"
                    style="max-height: 80px;" />
            </a>
        </div>

        <div class="pt-md-4 pt-0">
            <div class="header_bnts d-flex flex-wrap justify-content-center gap-2">
                <a style="background: #22587A" href="{{ route('member') }}" class="btn btn-1 btn-sm">
                    <i style=" font-weight: 900;font-size: 18px" class="bi bi-person-fill-add me-2"></i>
                    <span>সদস্য নিবন্ধন</span>
                </a>

            </div>
        </div>
    </div>

    <nav id="navbar" class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex align-items-center justify-content-center gap-5"
                id="navbarNav">

                <ul class="navbar-nav">

                    @forelse ($menus->sortBy('position') as $menu)

                        @php
                            $link = '#';
                            $hasSubmenu = $menu->submenu->count() > 0;
                            $dropdown = $hasSubmenu ? 'dropdown-toggle' : '';
                            $isActive = '';

                            if (!$hasSubmenu && $menu->place == 'header') {
                                $link =
                                    $menu->route_type === 'page'
                                        ? route('page.show', $menu->page->slug ?? '')
                                        : url($menu->route);

                                $currentUrl = rtrim(url()->current(), '/');
                                $menuUrl = rtrim($link, '/');

                                $isActive = $currentUrl === $menuUrl ? 'active' : '';
                            } elseif ($hasSubmenu) {
                                $currentUrl = rtrim(url()->current(), '/');

                                foreach ($menu->submenu as $submenu) {
                                    $subLink = route('page.show', $submenu->page->slug ?? '');

                                    if ($currentUrl === rtrim($subLink, '/')) {
                                        $isActive = 'active';
                                        break;
                                    }
                                }
                            }
                        @endphp

                        @if ($menu->menu_type === 'menu' && $menu->place == 'header')
                            <li class="nav-item dropdown">

                                <a class="nav-link px-2 px-md-3 {{ $dropdown }} {{ $isActive }}"
                                    href="{{ $hasSubmenu ? '#' : $link }}"
                                    @if ($hasSubmenu) data-bs-toggle="dropdown"
                                    aria-expanded="false" @endif>

                                    {{ $menu->name }}
                                </a>

                                @if ($hasSubmenu)
                                    <ul class="dropdown-menu">

                                        @forelse ($menu->submenu->sortBy('position') as $submenu)
                                            @php
                                                $subLink = route('page.show', $submenu->page->slug ?? '');

                                                $isSubActive =
                                                    rtrim(url()->current(), '/') === rtrim($subLink, '/')
                                                        ? 'active'
                                                        : '';
                                            @endphp

                                            <li>
                                                <a class="dropdown-item px-3 py-2 {{ $isSubActive }}"
                                                    href="{{ $subLink }}">
                                                    {{ $submenu->name }}
                                                </a>
                                            </li>

                                        @empty
                                        @endforelse

                                    </ul>
                                @endif

                            </li>
                        @endif

                    @empty
                    @endforelse

                </ul>

            </div>

        </div>
    </nav>

    @if (session('success'))
        <div id="success-alert" class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div id="error-alert" class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div id="validated-alert" class="alert alert-danger text-center">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</header>
