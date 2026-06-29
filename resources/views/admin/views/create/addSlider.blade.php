<x-form.add-form title="Add Slider" url="slider" button="Add Slider">
    <x-form.form-input label="Title" name="title" placeholder="Enter title" />

    <x-form.form-input label="Position" name="position" type="number" placeholder="Enter a position" required />

    <x-form.form-input label="Button Label" name="btn_label" placeholder="Enter button label" />

    <x-form.form-input label="Button Link" name="btn_link" type="url" placeholder="Enter button URL" />

    <x-form.form-select label="Category" name="category" :options="$categoris->pluck('name', 'id')->prepend('Choose a Category', '')" required />

    <x-form.form-select label="Select Status" name="status" :options="[
        '' => 'Choose one',
        'published' => 'Published',
        'unpublished' => 'Unpublished',
    ]" required />

    <x-form.form-textarea label="Description" name="description" id="editor" rows="4">
        {{ old('description') }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-imginputshow name="photo" title="Slider Image" size="2020 X 650px" />
    </x-slot>
</x-form.add-form>
