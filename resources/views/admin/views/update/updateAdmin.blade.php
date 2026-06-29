<x-form.add-form title="Update Admin" url="adminmanage" button="Update Admin" :id="$admin->id">
    <x-form.form-input label="Name" name="full_name" :value="$admin->full_name" placeholder="Enter your full name" />

    <x-form.form-input label="Username" name="username" :value="$admin->username" placeholder="Enter your username" />

    <x-form.form-input label="Email" name="email" type="email" :value="$admin->email"
        placeholder="Enter your email" required />

    <x-form.form-input label="Mobile Number" name="phone" :value="$admin->phone"
        placeholder="Enter your mobile Number" />

    <x-form.form-select label="Status" name="status" :value="$admin->status" :options="[
        '' => 'Choose status',
        'active' => 'Active',
        'inactive' => 'Inactive',
    ]" />

    <x-form.form-select label="Role" name="role" :value="$admin->role_id" :options="$permissions->pluck('role_name', 'id')->prepend('Choose one', '')" />

    <x-slot name="sitecontent">
        <x-imginputshow name="photo" title="Profile Image" size="150 X 150px" :img="$admin->photo" />
    </x-slot>
</x-form.add-form>
