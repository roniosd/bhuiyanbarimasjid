<x-form.add-form title="Update Menu" url="menu" button="Update Menu" :id="$menu->id" class="col-span-4">
    <x-form.form-input label="Menu Name" name="name" :value="$menu->name" placeholder="Enter menu name" />

    <x-form.form-select label="Route Type" name="route_type" id="route_type" :value="$menu->route_type" :options="[
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
            value="{{ old('route', $menu->route) }}">

        <select name="page_select" class="form-input placeholder-yellow-300 px-4 w-full py-3" id="page_select">
            <option value="">Choose one</option>
            @forelse ($pages as $page)
                <option value="{{ $page->id }}" {{ old('route', $menu->route) == $page->id ? 'selected' : '' }}>
                    {{ $page->title }}
                </option>
            @empty
                <option>No Pages</option>
            @endforelse
        </select>

        <select name="category_type" id="category_type" class="form-input placeholder-yellow-300 px-4 w-full py-3">
            <option value="">Choose one</option>
            <option value="menu" {{ old('route', $menu->route) == 'menu' ? 'selected' : '' }}>Menu</option>
            <option value="submenu" {{ old('route', $menu->route) == 'submenu' ? 'selected' : '' }}>Submenu</option>
        </select>
    </div>

    <x-form.form-select label="Menu Type" name="menu_type" id="menu_type" :value="$menu->menu_type" :options="[
        '' => 'Choose one',
        'menu' => 'Menu',
        'submenu' => 'Submenu',
    ]" />

    <x-form.form-select label="Place" name="place" :value="$menu->place" :options="[
        '' => 'Choose one',
        'header' => 'Header',
        'footer' => 'Footer',
        'sitebar' => 'Sitebar',
    ]" />

    <x-form.form-select label="Status" name="status" :value="$menu->status" :options="[
        '' => 'Choose one',
        'active' => 'Active',
        'inactive' => 'Inactive',
    ]" />

    <x-form.form-select label="Parent Menu" name="parent" id="parent_menu" :value="optional($menu->parentMenu)->id" :options="$allMenus->where('menu_type', 'menu')->pluck('name', 'id')->prepend('Choose Parent', '')" />

    <x-form.form-input label="Position" name="position" type="number" :value="$menu->position"
        placeholder="Enter a position" />
</x-form.add-form>
