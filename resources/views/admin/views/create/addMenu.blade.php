<x-app-layout title="Add Menu">
    <div class="content-area">
        <form action="{{ route('menu.store') }}" method="POST" class="row theme-form">
            @csrf
            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="content-inner">
                    <div class="custom-card ">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Add Menu</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{ route('menu.index') }}">See All</a>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Menu Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter menu name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Route Type</label>
                                        <select name="route_type" id="route_type" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="page" {{ old('route_type') == 'page' ? 'selected' : '' }}>
                                                Page</option>
                                            <option value="url" {{ old('route_type') == 'url' ? 'selected' : '' }}>
                                                URL
                                            </option>
                                            <option value="category"
                                                {{ old('route_type') == 'category' ? 'selected' : '' }}> Category
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Route</label>

                                        <input id="default_box" class="form-control" type="text"
                                            placeholder="Route..." readonly>

                                        <input name="url_input" type="url" id="url_input" class="form-control"
                                            placeholder="Enter URL" value="{{ old('route') }}">

                                        <select name="page_select" class="form-control" id="page_select">
                                            <option value="">Choose one</option>
                                            @forelse ($pages as $page)
                                                <option value="{{ $page->id }}"
                                                    {{ old('route') == $page->id ? 'selected' : '' }}>
                                                    {{ $page->title }}
                                                </option>
                                            @empty
                                                <option>No Pages</option>
                                            @endforelse
                                        </select>

                                        <select name="category_type" id="category_type" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="menu" {{ old('route') == 'menu' ? 'selected' : '' }}>
                                                Menu
                                            </option>
                                            <option value="submenu" {{ old('route') == 'submenu' ? 'selected' : '' }}>
                                                Submenu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Menu Type</label>
                                        <select name="menu_type" class="form-control" id="menu_type">
                                            <option value="">Choose one</option>
                                            <option value="menu" {{ old('menu_type') == 'menu' ? 'selected' : '' }}>
                                                Menu
                                            </option>
                                            <option value="submenu"
                                                {{ old('menu_type', isset($menu) ? 'submenu' : '') == 'submenu' ? 'selected' : '' }}>
                                                Submenu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Place</label>
                                        <select name="place" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="header" {{ old('place') == 'header' ? 'selected' : '' }}>
                                                Header
                                            </option>
                                            <option value="footer" {{ old('place') == 'footer' ? 'selected' : '' }}>
                                                Footer</option>
                                            <option value="sitebar" {{ old('place') == 'footer' ? 'selected' : '' }}>
                                                Sitebar</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive"
                                                {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Parent Menu</label>
                                        <select name="parent" class="form-control" id="parent_menu"
                                            {{ old('status') != 'active' ? 'disabled' : '' }}>
                                            <option value="">Choose Parent</option>
                                            @forelse ($allMenus as $menus)
                                                @if ($menus->menu_type == 'menu')
                                                    <option value="{{ $menus->id }}"
                                                        {{ old('parent', isset($menu) ? $menu->id : 0) == $menus->id ? 'selected' : '' }}>
                                                        {{ $menus->name }}
                                                    </option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Position</label>
                                        <input type="number" name="position" class="form-control"
                                            placeholder="Enter a position" value="{{ old('position') }}">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn theme-btn">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Add Menu
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </form>

        <div class="container">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="table-responsive mb-5">
                        <h5 class="mb-3">Main Menus</h5>
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Menu Name</th>
                                    <th>Route/Page Id/URL</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($allMenus as $menu)
                                    @if ($menu->menu_type == 'menu')
                                        <tr>
                                            <td>{{ $menu->name }}</td>
                                            <td>{{ $menu->route }}</td>
                                            <td>{{ $menu->menu_type }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-3">
                                                    <a href="{{ route('menu.edit', $menu->id) }}" title="Edit">
                                                        <svg width="20" height="22" viewBox="0 0 20 22"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2 0C0.897 0 0 0.897 0 2V18C0 19.103 0.897 20 2 20H8.07227L10.0723 18H2V2H9V7H14V14.0723L16 12.0723V6L10 0H2ZM8 9V12H11C11 10.343 9.641 9.031 8 9ZM7 10C5.343 10 4 11.343 4 13C4 14.657 5.343 16 7 16C8.657 16 9.969 14.641 10 13H7V10ZM18.207 13C18.0792 13 17.951 13.049 17.8535 13.1465L16.8535 14.1465L18.8535 16.1465L19.8535 15.1465C20.0485 14.9515 20.0485 14.6345 19.8535 14.4395L18.5605 13.1465C18.4625 13.049 18.3349 13 18.207 13ZM16.1465 14.8535L11 20V22H13L18.1465 16.8535L16.1465 14.8535Z"
                                                                fill="green" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('menu.destroy', $menu->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this menu?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="border-0 bg-transparent" title="Delete">
                                                            <svg width="16" height="20" viewBox="0 0 16 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6 0L5 1H0V3H1V18C1 19.0931 1.90694 20 3 20H13C14.0931 20 15 19.0931 15 18V3H16V1H14H11L10 0H6ZM3 3H13V18H3V3ZM5.70703 6.29297L4.29297 7.70703L6.58594 10L4.29297 12.293L5.70703 13.707L8 11.4141L10.293 13.707L11.707 12.293L9.41406 10L11.707 7.70703L10.293 6.29297L8 8.58594L5.70703 6.29297Z"
                                                                    fill="red" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="4">No menus found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="submenu-section">
                        <h5 class="mb-3">Submenus</h5>
                        @forelse ($allMenus as $menu)
                            @if ($menu->menu_type == 'menu' && $menu->submenu->count())
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between">
                                        <p class="fw-bold">Add item to: {{ $menu->name }}</p>
                                        <p>
                                            <a href="{{ route('menu.show', $menu->id) }}" class="btn theme-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22"
                                                    fill="white" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zM8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0z" />
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5V7.5H11.5a.5.5 0 0 1 0 1H8.5V11.5a.5.5 0 0 1-1 0V8.5H4.5a.5.5 0 0 1 0-1H7.5V4.5A.5.5 0 0 1 8 4z" />
                                                </svg>
                                                Add
                                            </a>
                                        </p>
                                    </div>
                                    <table class="table table-hover align-middle text-center">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Menu Name</th>
                                                <th>Route/Page Id/URL</th>
                                                <th>Type</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($menu->submenu as $submenu)
                                                <tr>
                                                    <td>{{ $submenu->name }}</td>
                                                    <td>{{ $submenu->route }}</td>
                                                    <td>{{ $submenu->menu_type }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-3">
                                                            <a href="{{ route('menu.edit', $submenu->id) }}"
                                                                title="Edit">
                                                                <svg width="20" height="22"
                                                                    viewBox="0 0 20 22" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M2 0C0.897 0 0 0.897 0 2V18C0 19.103 0.897 20 2 20H8.07227L10.0723 18H2V2H9V7H14V14.0723L16 12.0723V6L10 0H2ZM8 9V12H11C11 10.343 9.641 9.031 8 9ZM7 10C5.343 10 4 11.343 4 13C4 14.657 5.343 16 7 16C8.657 16 9.969 14.641 10 13H7V10ZM18.207 13C18.0792 13 17.951 13.049 17.8535 13.1465L16.8535 14.1465L18.8535 16.1465L19.8535 15.1465C20.0485 14.9515 20.0485 14.6345 19.8535 14.4395L18.5605 13.1465C18.4625 13.049 18.3349 13 18.207 13ZM16.1465 14.8535L11 20V22H13L18.1465 16.8535L16.1465 14.8535Z"
                                                                        fill="green" />
                                                                </svg>
                                                            </a>
                                                            <form action="{{ route('menu.destroy', $submenu->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this submenu?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="border-0 bg-transparent"
                                                                    title="Delete">
                                                                    <svg width="16" height="20"
                                                                        viewBox="0 0 16 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M6 0L5 1H0V3H1V18C1 19.0931 1.90694 20 3 20H13C14.0931 20 15 19.0931 15 18V3H16V1H14H11L10 0H6ZM3 3H13V18H3V3ZM5.70703 6.29297L4.29297 7.70703L6.58594 10L4.29297 12.293L5.70703 13.707L8 11.4141L10.293 13.707L11.707 12.293L9.41406 10L11.707 7.70703L10.293 6.29297L8 8.58594L5.70703 6.29297Z"
                                                                            fill="red" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        @empty
                            <p>No submenus found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
