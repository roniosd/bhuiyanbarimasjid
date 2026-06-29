<x-form.add-form title="Create Admin" url="adminmanage" button="Create Admin">
    <x-form.form-input label="Name" name="full_name" placeholder="Enter your full name" />

    <x-form.form-input label="Username" name="username" placeholder="Enter your username" />

    <x-form.form-input label="Email" name="email" type="email" placeholder="Enter your email" required />

    <x-form.form-input label="Mobile Number" name="phone" placeholder="Enter your mobile Number" />

    <x-form.form-input label="Password" name="password" type="password" placeholder="Enter your password" required />

    <x-form.form-input label="Confirm Password" name="confirm_password" type="password" placeholder="Confirm password" />

    <x-form.form-select label="Status" name="status" :options="[
        '' => 'Choose status',
        'active' => 'Active',
        'inactive' => 'Inactive',
    ]" />

    <x-form.form-select label="Role" name="role" :options="$permissions->pluck('role_name', 'id')->prepend('Choose one', '')" />

    <x-slot name="sitecontent">
        <x-imginputshow name="photo" title="Profile Image" size="150 X 150px" />
    </x-slot>
</x-form.add-form>
