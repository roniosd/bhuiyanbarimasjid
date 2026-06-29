<x-form.add-form title="Update Homepage Setting" action="homepageUpdate" button="Update Setting">
    <x-form.form-input divClass="col-span-2" label="Title" name="title" :value="$homepageSetting->title"
        placeholder="Enter title" />

    <x-form.form-input label="Button Label" name="btn_label" :value="$homepageSetting->btn_label"
        placeholder="Enter button label" />

    <x-form.form-input label="Button Link" name="btn_link" type="url" :value="$homepageSetting->btn_link"
        placeholder="Enter a position" />

    <x-form.form-textarea label="Short Description" name="short_descreption" rows="2" required>
        {{ $homepageSetting->short_descreption }}
    </x-form.form-textarea>

    <div class="col-span-full">
        @php
            $allSections = [
                'à¦†à¦®à¦¾à¦¦à§‡à¦° à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡',
                'à¦…à¦¨à§à¦¦à¦¾à¦¨ à¦¤à¦¹à¦¬à¦¿à¦²',
                'à¦•à¦¾à¦°à§à¦¯à¦•à§à¦°à¦® à¦¸à¦®à§‚à¦¹',
                'à¦…à¦¨à§à¦·à§à¦ à¦¾à¦¨à¦¸à¦®à§‚à¦¹',
                'à¦¬à§à¦¯à¦¾à¦¨à¦¾à¦°',
                'à¦—à§à¦¯à¦¾à¦²à¦¾à¦°à§€',
                'à¦¸à¦°à§à¦¬à¦¶à§‡à¦· à¦–à¦¬à¦°',
            ];

            $selected = json_decode($homepageSetting->sections, true) ?? [];
        @endphp

        <label class="block text-sm font-medium mb-3">Select Sections to Show on Home Page</label>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            @foreach ($allSections as $section)
                <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                    <input type="hidden" name="sections[{{ $section }}]" value="">
                    <input type="checkbox" name="sections[{{ $section }}]" value="{{ $section }}"
                        {{ isset($selected[$section]) ? 'checked' : '' }}>
                    <span>{{ $section }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <x-slot name="sitecontent">
        <x-form.form-select label="Select Status" name="status" :value="$homepageSetting->status" :options="[
            '' => 'Choose one',
            'published' => 'Published',
            'unpublished' => 'Unpublished',
        ]" required />

        <x-imginputshow name="photo" title="Homepage Image" size="512 X 512px" :img="$homepageSetting->photo" />
    </x-slot>
</x-form.add-form>
