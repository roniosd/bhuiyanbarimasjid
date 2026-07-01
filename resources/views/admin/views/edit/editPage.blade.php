<x-form.add-form title="Update Page" url="page" button="Update Page" :id="$page->id">
    <x-form.form-input divClass="col-span-2" label="Enter Page Title" name="title" id="Title" :value="$page->title"
        placeholder="Enter post title" />

    <x-form.form-input label="Enter Slug" name="slug" id="unique_url" :value="$page->slug" placeholder="Enter slug" />

    <x-form.form-textarea label="Description" name="description" id="editor" rows="10">
        {{ $page->description }}
    </x-form.form-textarea>

    <x-form.form-textarea label="Enter Excerpt" name="excerpt" rows="3">
        {{ $page->excerpt }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-form.form-input label="Enter Widget" name="widget" :value="$page->widget" placeholder="Enter attachment" />

        <x-form.form-select label="Enter your Template" name="template" id="template" :value="$page->template"
            :options="collect($templates)
                ->mapWithKeys(fn($template) => [$template => $template])
                ->prepend('Choose Template', '')" />


        <div id="memberTypeWrapper" style="display: none;">
            <x-form.form-select label="Content Type" name="type" :options="[
                '' => 'Select Content Type',
                'general' => 'General',
                'premium' => 'Premium',
                'vip' => 'VIP',
                'social' => 'Social',
                'advisory_committee' => 'Advisory committee',
                'executive_committee' => 'Executive committee',
            ]" :value="$page->type" />
        </div>

        <x-form.form-select label="Select Status" name="status" :value="$page->status" :options="[
            '' => 'Select one',
            'published' => 'Published',
            'unpublished' => 'Unpublished',
        ]" />

        <x-imginputshow name="photo" title="Add Page Image" size="1320 X 535px" :img="$page->photo" />
    </x-slot>
</x-form.add-form>
