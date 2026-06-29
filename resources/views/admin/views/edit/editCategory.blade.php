<x-form.add-form title="Edit Category" url="category" button="Update Category" :id="$category->id">
    <x-form.form-input label="Category Name" name="name" id="Title" :value="$category->name"
        placeholder="Enter category name" required />

    <x-form.form-input label="Slug" name="slug" id="unique_url" class="text-lowercase"
        :value="$category->slug" placeholder="Enter category slug" required />

    <x-form.form-textarea label="Description" name="description">
        {{ $category->description }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-form.form-select label="Type" name="type" :value="$category->type" :options="[
            '' => 'Choose Category Type',
            'post' => 'Post',
            'event' => 'Event',
            'graphics' => 'Graphics',
        ]" required />

        <x-form.form-select label="Select Status" name="status" :value="$category->status" :options="[
            'published' => 'Published',
            'unpublished' => 'Unpublished',
        ]" required />

        <x-imginputshow name="photo" title="Category Photo" size="150 X 150px" :img="$category->photo" />
    </x-slot>
</x-form.add-form>
