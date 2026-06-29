<x-form.add-form title="Add Page" url="page" button="Add Page">
    <x-form.form-input divClass="col-span-2" label="Enter Page Title" name="title" id="Title"
        placeholder="Enter post title" />

    <x-form.form-input label="Enter Slug" name="slug" id="unique_url" placeholder="Enter slug" />

    <x-form.form-textarea label="Description" name="description" id="editor" rows="10">
        {{ old('description') }}
    </x-form.form-textarea>

    <x-form.form-textarea label="Enter Excerpt" name="excerpt" rows="3">
        {{ old('excerpt') }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-form.form-input label="Enter Widget" name="widget" placeholder="Enter attachment" />

        <x-form.form-select label="Enter your Template" name="template" id="template" :options="collect($templates)->mapWithKeys(fn ($template) => [$template => $template])->prepend('Choose Template', '')" />

        <div id="memberTypeWrapper" style="display: none;">
            <x-form.form-select label="Member Type" name="member_type" :options="[
                'general' => 'General',
                'premium' => 'Premium',
                'vip' => 'VIP',
                'social' => 'Social',
            ]" />
        </div>

        <x-form.form-select label="Select Status" name="status" :options="[
            '' => 'Select one',
            'published' => 'Published',
            'unpublished' => 'Unpublished',
        ]" />

        <x-imginputshow name="photo" title="Add Page Image" size="1320 X 535px" />
    </x-slot>
</x-form.add-form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const template = document.getElementById('template');
        const memberTypeWrapper = document.getElementById('memberTypeWrapper');

        function toggleMemberType() {
            memberTypeWrapper.style.display = template.value === 'member' ? 'block' : 'none';
        }

        toggleMemberType();
        template.addEventListener('change', toggleMemberType);
    });
</script>
