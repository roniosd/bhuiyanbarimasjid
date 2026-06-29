<x-form.add-form title="Add Menu" url="menu" button="Add Menu" class="col-span-4">
    <x-form.form-input label="Menu Name" name="name" placeholder="Enter menu name" />

    <x-form.form-select label="Route Type" name="route_type" id="route_type" :options="[
        '' => 'Choose one',
        'page' => 'Page',
        'url' => 'URL',
        'category' => 'Category',
    ]" />

    <div>
        <label class="block mb-1 font-medium text-sm text-gray-700">Route</label>

        <input id="default_box" class="form-input placeholder-yellow-300 px-4 w-full py-3" type="text"
            placeholder="Route..." readonly>

        <input name="url_input" type="url" id="url_input"
            class="form-input placeholder-yellow-300 px-4 w-full py-3" placeholder="Enter URL"
            value="{{ old('route') }}">

        <select name="page_select" class="form-input placeholder-yellow-300 px-4 w-full py-3" id="page_select">
            <option value="">Choose one</option>
            @forelse ($pages as $page)
                <option value="{{ $page->id }}" {{ old('route') == $page->id ? 'selected' : '' }}>
                    {{ $page->title }}
                </option>
            @empty
                <option>No Pages</option>
            @endforelse
        </select>

        <select name="category_type" id="category_type" class="form-input placeholder-yellow-300 px-4 w-full py-3">
            <option value="">Choose one</option>
            <option value="menu" {{ old('route') == 'menu' ? 'selected' : '' }}>Menu</option>
            <option value="submenu" {{ old('route') == 'submenu' ? 'selected' : '' }}>Submenu</option>
        </select>
    </div>

    <x-form.form-select label="Menu Type" name="menu_type" id="menu_type" :options="[
        '' => 'Choose one',
        'menu' => 'Menu',
        'submenu' => 'Submenu',
    ]" />

    <x-form.form-select label="Place" name="place" :options="[
        '' => 'Choose one',
        'header' => 'Header',
        'footer' => 'Footer',
        'sitebar' => 'Sitebar',
    ]" />

    <x-form.form-select label="Status" name="status" :options="[
        '' => 'Choose one',
        'active' => 'Active',
        'inactive' => 'Inactive',
    ]" />

    <x-form.form-select label="Parent Menu" name="parent" id="parent_menu" :options="$allMenus->where('menu_type', 'menu')->pluck('name', 'id')->prepend('Choose Parent', '')" />

    <x-form.form-input label="Position" name="position" type="number" placeholder="Enter a position" />

    <x-slot name="listItems">
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
                                            <x-admin.action-button id="{{ $menu->id }}" edit="menu.edit"
                                                delete="menu.destroy" />
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
                                                <i class="bi bi-plus-circle"></i>
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
                                                    <x-admin.action-button id="{{ $submenu->id }}" edit="menu.edit"
                                                        delete="menu.destroy" />
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
    </x-slot>
</x-form.add-form>
