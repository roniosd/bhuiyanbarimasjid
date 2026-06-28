<x-form.add-form :title="'Add Post'" :url="'post'">

    {{-- Main Content --}}
    <x-form.form-input divClass="col-span-2" label="Post Title" name="title" id="Title" placeholder="Post title"
        required />

    <x-form.form-input label="Unique URL / Short Slug" name="slug" id="unique_url" class="slug-check" data_table="posts"
        readonly>
        <small class="slug-status text-sm text-gray-600"></small>
    </x-form.form-input>


    <x-form.form-textarea label="Excerpt" name="excerpt" rows="3" placeholder="Enter excerpt">
        {{ old('excerpt') }}
    </x-form.form-textarea>

    <x-form.form-textarea label="Description" name="description" id="editor" rows="10">
        {{ old('description') }}
    </x-form.form-textarea>

    {{-- Sidebar --}}
    <x-slot name="sitecontent">
        <x-form.form-select label="Author" name="author" :options="$admins->pluck('full_name', 'id')->prepend('Choose Author', '')" required />

        <x-form.form-select label="Category" name="category_id" :options="$categories->pluck('name', 'id')->prepend('Choose Category', '')" required />

        <x-form.form-select label="Type" name="type" id="postTypeSelect" :options="['post' => 'Post', 'event' => 'Event']" />


        <x-form.form-select label="Status" name="status" :options="[
            'published' => 'Published',
            'unpublished' => 'Unpublished',
        ]" required />


        <x-imginputshow title="Post Image" size="1320 x 535px" name="image" />


    </x-slot>

</x-form.add-form>
