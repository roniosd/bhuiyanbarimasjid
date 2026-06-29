<x-form.add-form title="Add Category" url="category" button="Add Category">
    <x-form.form-input label="Category Name" name="name" id="Title" placeholder="Enter category name" required />

    <x-form.form-input label="Slug" name="slug" id="unique_url" class="text-lowercase"
        placeholder="Enter category slug" required />

    <x-form.form-textarea label="Description" name="description">
        {{ old('description') }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-form.form-select label="Type" name="type" :options="[
            '' => 'Choose Category Type',
            'post' => 'Post',
            'event' => 'Event',
            'graphics' => 'Graphics',
        ]" required />

        <x-form.form-select label="Select Status" name="status" :options="[
            'published' => 'Published',
            'unpublished' => 'Unpublished',
        ]" required />

        <x-imginputshow name="photo" title="Category Photo" size="150 X 150px" />
    </x-slot>
</x-form.add-form>
