<x-form.add-form title="Edit Event" url="event" button="Update Event" :id="$event->id">
    <x-form.form-input label="Enter Title" name="title" id="Title" :value="$event->title"
        placeholder="Enter Title" required />

    <x-form.form-input label="Enter Slug" name="slug" id="unique_url" :value="$event->slug"
        placeholder="Enter slug" required />

    <x-form.form-input label="Tagline or Slogan" name="slogan" :value="$event->slogan"
        placeholder="Tagline or slogan" />

    <x-form.form-input label="Location or Venue(in Bangla)" name="venue" :value="$event->venue"
        placeholder="Location or Venue name" required />

    <x-form.form-input label="Latitude" name="latitude" :value="$event->latitude"
        placeholder="Latitude on Google map" />

    <x-form.form-input label="Longitude" name="longitude" :value="$event->longitude"
        placeholder="Longitude on Google map" />

    <x-form.form-input label="Map Zoom Factor" name="zoom" :value="$event->zoom"
        placeholder="Google map zoom factor" />

    <x-form.form-input label="Map Height" name="height" :value="$event->height"
        placeholder="Google map height" />

    <x-form.form-input label="Map Width" name="width" :value="$event->width"
        placeholder="Google map width" />

    <x-form.form-input label="City" name="city" :value="$event->city" placeholder="City" />

    <x-form.form-input label="Email" name="email" type="email" :value="$event->email" placeholder="Email" />

    <x-form.form-textarea label="Short Description" name="short_description" rows="2">
        {{ $event->short_description }}
    </x-form.form-textarea>

    <x-form.form-textarea label="Description" name="description" id="editor" rows="10">
        {{ $event->description }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-form.form-input label="Start Date" name="start_date" id="start_date" type="date"
            :value="$event->start_date" required />

        <x-form.form-input label="End Date" name="end_date" id="end_date" type="date"
            :value="$event->end_date" required />

        <x-form.form-select label="Sliders" name="slider" :value="$event->slider" :options="[
            '0' => 'Choose one',
            '1' => 'Home Page Slider',
        ]" />

        <x-form.form-select label="Registration Link" name="registration" :value="$event->registration" :options="[
            '' => 'Choose one',
            'open' => 'Registration Open',
            'close' => 'Registration Close',
        ]" required />

        <x-form.form-select label="Status" name="status" :value="$event->status" :options="[
            '' => 'Choose one',
            'published' => 'Published',
            'unpublished' => 'Unpublished',
        ]" required />

        <x-imginputshow name="photo" title="Event Image" size="512 X 512px" :img="$event->photo" />
    </x-slot>
</x-form.add-form>
