<x-form.add-form title="Update Album" url="album" button="Update Album" :id="$album->id" class="col-span-4">
    <x-form.form-input divClass="col-span-2" label="Album Name" name="album_name" id="Title"
        :value="$album->album_name" placeholder="Enter album name" required />

    <x-form.form-input label="Enter Slug" name="slug" id="unique_url" :value="$album->slug"
        placeholder="Enter slug" required />

    <x-form.form-select label="Image Quality" name="image_quality" :value="$album->image_quality" :options="[
        '' => 'Choose one',
        'HD' => 'HD',
        'normal' => 'Normal',
    ]" required />

    <x-form.form-select label="Status" name="status" :value="$album->status" :options="[
        '' => 'Choose one',
        'published' => 'Published',
        'unpublished' => 'Unpublished',
    ]" required />
</x-form.add-form>
