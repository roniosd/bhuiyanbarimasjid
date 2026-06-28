<x-app-layout title="Update Menu">
    <div class="content-area">

        <form action="{{ route('menu.update', $menu->id) }}" method="POST" class="row theme-form">
            @csrf
            @method('PUT')

            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="content-inner">
                    <div class="custom-card ">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Update Menu</h1>
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
                                            placeholder="Enter menu name" value="{{ old('name', $menu->name) }}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Route Type</label>
                                        <select name="route_type" id="route_type" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="page"
                                                {{ old('route_type', $menu->route_type) == 'page' ? 'selected' : '' }}>
                                                Page</option>
                                            <option value="url"
                                                {{ old('route_type', $menu->route_type) == 'url' ? 'selected' : '' }}>
                                                URL
                                            </option>
                                            <option value="category"
                                                {{ old('route_type', $menu->route_type) == 'category' ? 'selected' : '' }}>
                                                Category</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Route</label>

                                        <input id="default_box" class="form-control" type="text"
                                            placeholder="Route..." readonly>

                                        <input name="url_input" type="url" id="url_input" class="form-control"
                                            placeholder="Enter URL" value="{{ old('route', $menu->route) }}">

                                        <select name="page_select" class="form-control" id="page_select">
                                            <option value="">Choose one</option>
                                            @forelse ($pages as $page)
                                                <option value="{{ $page->id }}"
                                                    {{ old('route', $menu->route) == $page->id ? 'selected' : '' }}>
                                                    {{ $page->title }}
                                                </option>
                                            @empty
                                                <option>No Pages</option>
                                            @endforelse
                                        </select>

                                        <select name="category_type" id="category_type" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="menu"
                                                {{ old('route', $menu->route) == 'menu' ? 'selected' : '' }}>Menu
                                            </option>
                                            <option value="submenu"
                                                {{ old('route', $menu->route) == 'submenu' ? 'selected' : '' }}>
                                                Submenu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Menu Type</label>
                                        <select name="menu_type" class="form-control" id="menu_type">
                                            <option value="">Choose one</option>
                                            <option value="menu"
                                                {{ old('menu_type', $menu->menu_type) == 'menu' ? 'selected' : '' }}>
                                                Menu
                                            </option>
                                            <option value="submenu"
                                                {{ old('menu_type', $menu->menu_type) == 'submenu' ? 'selected' : '' }}>
                                                Submenu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Place</label>
                                        <select name="place" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="header"
                                                {{ old('place', $menu->place) == 'header' ? 'selected' : '' }}>
                                                Header
                                            </option>
                                            <option value="footer"
                                                {{ old('place', $menu->place) == 'footer' ? 'selected' : '' }}>
                                                Footer</option>
                                            <option value="sitebar"
                                                {{ old('place', $menu->place) == 'sitebar' ? 'selected' : '' }}>
                                                Sitebar</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group custom-form-group">
                                        <label for="">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="active"
                                                {{ old('status', $menu->status) == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive"
                                                {{ old('status', $menu->status) == 'inactive' ? 'selected' : '' }}>
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
                                                        {{ old('parent', isset($menu->parentMenu) ? $menu->parentMenu->id : 0) == $menus->id ? 'selected' : '' }}>
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
                                            placeholder="Enter a position"
                                            value="{{ old('position', $menu->position) }}">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn theme-btn">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Update Menu
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </form>
    </div>
</x-app-layout>
