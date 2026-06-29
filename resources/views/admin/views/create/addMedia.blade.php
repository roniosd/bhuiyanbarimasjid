@php
    $album_id = isset($album_id) ? $album_id : 0;
@endphp

<x-form.add-form title="Add Media" url="media" button="Add Media">
    <x-form.form-input label="Title" name="title" placeholder="Enter title" />

    <x-form.form-input label="Alt" name="alt" placeholder="Enter alt" />

    <x-form.form-select label="Status" name="status" :options="[
        '' => 'Choose one',
        'active' => 'Active',
        'inactive' => 'Inactive',
    ]" />

    <x-form.form-select label="Album" name="album_id" :value="$album_id" :options="$albums->pluck('album_name', 'id')->prepend('Choose one', '')" />

    <x-form.form-textarea label="Description" name="description" id="editor">
        {{ old('description') }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-imginputshow name="media" title="Add Docuement" size="512 X 512px" />
    </x-slot>
</x-form.add-form>
