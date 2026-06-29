<x-form.add-form title="Edit Fund" url="fund" button="Update Fund" :id="$fund->id">
    <x-form.form-input label="Enter Title" name="title" id="Title" :value="$fund->title"
        placeholder="Enter Title" required />

    <x-form.form-input label="Enter Slug" name="slug" id="unique_url" :value="$fund->slug"
        placeholder="Enter slug" required />

    <x-form.form-input divClass="col-span-2" label="Donation Unit" name="donation_unit" type="number"
        :value="$fund->donation_unit" placeholder="Donation Unit" />

    <x-form.form-input divClass="col-span-2" label="Donation Inforamation" name="donation_info"
        :value="$fund->donation_info" placeholder="Donation info" />

    <x-form.form-textarea label="Description" name="description" id="editor" rows="10">
        {{ $fund->description }}
    </x-form.form-textarea>

    <x-slot name="sitecontent">
        <x-form.form-select label="Show Payment Method" name="show_payment_method" :value="$fund->show_payment_method" :options="[
            '' => 'Choose one',
            '1' => 'Yes',
            '0' => 'No',
        ]" />

        <x-form.form-select label="Show Membership" name="show_membership" :value="$fund->show_membership" :options="[
            '' => 'Choose one',
            '1' => 'Yes',
            '0' => 'No',
        ]" />

        <x-form.form-select label="Status" name="status" :value="$fund->status" :options="[
            '' => 'Choose one',
            'active' => 'Active',
            'inactive' => 'Inactive',
        ]" required />

        <x-imginputshow name="featured_photo" title="Fund Image" size="512 X 512px" :img="$fund->featured_photo" />
    </x-slot>
</x-form.add-form>
