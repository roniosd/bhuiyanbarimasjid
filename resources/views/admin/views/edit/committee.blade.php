<x-form.add-form title="Update Committee" url="committee" button="Update Committee" :id="$committee->id">
    <x-form.form-select label="Session" name="session_id" :value="$committee->session_id" :options="$sessions->pluck('session_name', 'id')->prepend('Choose a Session', '')" required />

    <x-form.form-input label="Name" name="name" :value="$committee->name" placeholder="Enter Name" />

    <x-form.form-input label="Designation" name="designation" :value="$committee->designation" placeholder="Enter designation" />

    <x-form.form-input label="Mobile number" name="mobile_number" :value="$committee->mobile_number" placeholder="Enter mobile number" />

    <x-form.form-input label="Email" name="email" :value="$committee->email" placeholder="Enter email" />

    <x-form.form-input label="Membership fee" name="membership_fee" :value="$committee->membership_fee"
        placeholder="Enter membership fee" />
    <x-form.form-select label="Committee Type" name="type" :options="[
        'advisory_committee' => 'Advisory committee',
        'executive_committee' => 'Executive committee',
    ]" :value="$committee->type" />

    <x-slot name="sitecontent">
        <x-imginputshow name="photo" title="Member Image" size="2020 X 650px" :img="$committee->photo" />

        <x-form.form-select label="Select Status" name="status" :value="$committee->status" :options="[
            'published' => 'Published',
            'unpublished' => 'Unpublished',
        ]" required />
    </x-slot>
</x-form.add-form>
