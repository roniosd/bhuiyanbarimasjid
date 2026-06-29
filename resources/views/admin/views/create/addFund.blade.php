<x-form.add-form title="Add Fund" url="fund" button="Add Fund">
    <x-form.form-input label="Enter Title" name="title" id="Title" placeholder="Enter Title" required />

    <x-form.form-input label="Enter Slug" name="slug" id="unique_url" placeholder="Enter slug" required />

    <x-form.form-input divClass="col-span-2" label="Donation Unit" name="donation_unit" type="number"
        placeholder="Donation Unit" />

    <x-form.form-input divClass="col-span-2" label="Donation Inforamation" name="donation_info"
        placeholder="Donation info" />

    <x-form.form-textarea label="Description" name="description" id="editor" rows="10">
        {{ old('description') }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-form.form-select label="Show Payment Method" name="show_payment_method" :options="[
            '' => 'Choose one',
            '1' => 'Yes',
            '0' => 'No',
        ]" />

        <x-form.form-select label="Show Membership" name="show_membership" :options="[
            '' => 'Choose one',
            '1' => 'Yes',
            '0' => 'No',
        ]" />

        <x-form.form-select label="Status" name="status" :options="[
            '' => 'Choose one',
            'active' => 'Active',
            'inactive' => 'Inactive',
        ]" required />

        <x-imginputshow name="featured_photo" title="Fund Image" size="512 X 512px" />
    </x-slot>
</x-form.add-form>
