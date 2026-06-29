<x-form.add-form title="Add Activity" url="allactivity" button="Add Activity">
    <x-form.form-input divClass="col-span-2" label="Activity Title" name="title" id="Title"
        placeholder="Enter Title" required />

    <x-form.form-input label="Enter Slug" name="slug" id="unique_url" placeholder="Enter slug" required />

    <x-form.form-textarea label="Short Description" name="short_description" rows="2">
        {{ old('short_description') }}
    </x-form.form-textarea>

    <x-form.form-textarea label="Description" name="description" id="editor" rows="10">
        {{ old('description') }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-form.form-select label="Status" name="status" :options="[
            '' => 'Choose one',
            'published' => 'Published',
            'unpublished' => 'Unpublished',
        ]" required />

        <x-imginputshow name="photo" title="Event Image" size="512 X 512px" />
    </x-slot>
</x-form.add-form>
