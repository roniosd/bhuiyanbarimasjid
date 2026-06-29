<x-form.add-form title="Site Settings" action="update" button="Update Settings">
    <x-form.form-input label="Site Name" name="title" :value="$setting->title" placeholder="Islami Nobo Jagoron"
        required />

    <x-form.form-input label="Tagline" name="tagline" :value="$setting->tagline" placeholder="Enter your tagline"
        required />

    <x-form.form-input label="Telephone" name="tnt" :value="$setting->tnt"
        placeholder="Enter your telephone Number" />

    <x-form.form-input label="Mobile Number" name="phone" :value="$setting->phone"
        placeholder="Enter your mobile Number" />

    <x-form.form-input label="Slider" name="slider" :value="$setting->slider" placeholder="Homepage Slider" />

    <x-form.form-input label="Email Address" name="email" :value="$setting->email"
        placeholder="islaminobojagoron@gmail.com" />

    <x-form.form-input divClass="col-span-2" label="Address" name="address" :value="$setting->address"
        placeholder="Enter your Address" />

    <x-form.form-textarea label="Site Description" name="description" rows="5">
        {{ $setting->description }}
    </x-form.form-textarea>

    <x-form.form-input label="Copyright" name="copyright" :value="$setting->copyright"
        placeholder="Jagoron © 2025 All Right Reserved" />

    <x-form.form-input label="Terms" name="terms" :value="$setting->terms"
        placeholder="www.jagoron.org/terms.html" />

    <x-slot name="sitecontent">
        <x-form.form-select label="Header" name="header" :value="$setting->header" :options="[
            'single' => 'Single Header',
            'double' => 'Double Header',
        ]" />

        <x-imginputshow name="favicon" title="Site Favicon" size="150 X 150px" :img="$setting->favicon" />

        <x-imginputshow name="logo" title="Site Logo" size="1000 X 500px" :img="$setting->logo" />

        <x-imginputshow name="mlogo" title="Mardasha Logo" size="1000 X 500px" :img="$setting->mlogo" />

        <x-imginputshow name="flogo" title="Footer Logo" size="1000 X 500px" :img="$setting->flogo" />
    </x-slot>
</x-form.add-form>
