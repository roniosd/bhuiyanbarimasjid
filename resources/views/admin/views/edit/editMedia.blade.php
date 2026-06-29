<x-form.add-form title="Update Media" url="media" button="Update Media" :id="$media->id">
    <x-form.form-input label="Title" name="title" :value="$media->title" placeholder="Enter title" />

    <x-form.form-input label="Alt" name="alt" :value="$media->alt" placeholder="Enter alt" />

    <x-form.form-select label="Status" name="status" :value="$media->status" :options="[
        '' => 'Choose one',
        'active' => 'Active',
        'inactive' => 'Inactive',
    ]" />

    <x-form.form-select label="Album" name="album_id" :value="$media->album_id" :options="$albums->pluck('album_name', 'id')->prepend('Choose one', '')" />

    <x-form.form-textarea label="Description" name="description" id="editor">
        {{ $media->description }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-imginputshow name="media" title="Media Image" size="512 X 512px" :img="$media->media" />
    </x-slot>
</x-form.add-form>
