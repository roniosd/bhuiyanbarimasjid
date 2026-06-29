<x-form.add-form title="Add Event" url="event" button="Add Event">
    <x-form.form-input label="Enter Title" name="title" id="Title" placeholder="Enter Title" required />

    <x-form.form-input label="Enter Slug" name="slug" id="unique_url" placeholder="Enter slug" required />

    <x-form.form-input label="Tagline or Slogan" name="slogan" placeholder="Tagline or slogan" />

    <x-form.form-input label="Location or Venue(in Bangla)" name="venue" placeholder="Location or Venue name" required />

    <x-form.form-input label="Latitude" name="latitude" placeholder="Latitude on Google map" />

    <x-form.form-input label="Longitude" name="longitude" placeholder="Longitude on Google map" />

    <x-form.form-input label="Map Zoom Factor" name="zoom" placeholder="Google map zoom factor" />

    <x-form.form-input label="Map Height" name="height" placeholder="Google map height" />

    <x-form.form-input label="Map Width" name="width" placeholder="Google map width" />

    <x-form.form-input label="City" name="city" placeholder="City" />

    <x-form.form-input label="Email" name="email" type="email" placeholder="Email" />

    <x-form.form-textarea label="Short Description" name="short_description" rows="2">
        {{ old('short_description') }}
    </x-form.form-textarea>

    <x-form.form-textarea label="Description" name="description" id="editor" rows="10">
        {{ old('description') }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-form.form-input label="Start Date" name="start_date" id="start_date" type="date" required />

        <x-form.form-input label="End Date" name="end_date" id="end_date" type="date" required />

        <x-form.form-select label="Sliders" name="slider" :options="[
            '0' => 'Choose one',
            '1' => 'Home Page Slider',
        ]" />

        <x-form.form-select label="Registration Link" name="registration" :options="[
            '' => 'Choose one',
            'open' => 'Registration Open',
            'close' => 'Registration Close',
        ]" required />

        <x-form.form-select label="Status" name="status" :options="[
            '' => 'Choose one',
            'published' => 'Published',
            'unpublished' => 'Unpublished',
        ]" required />

        <x-imginputshow name="photo" title="Event Image" size="512 X 512px" />
    </x-slot>
</x-form.add-form>
