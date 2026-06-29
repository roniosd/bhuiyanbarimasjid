<x-form.add-form title="Update Session Year" url="session" button="Update Session" :id="$session->id">
    <x-form.form-input label="Session Name" name="session_name" :value="$session->session_name"
        placeholder="Enter Session Name" />

    <x-form.form-input label="Duration" name="duration" :value="$session->duration" placeholder="Enter duration" />

    <x-form.form-select label="Select Status" name="status" :value="$session->status" :options="[
        'published' => 'Published',
        'unpublished' => 'Unpublished',
    ]" required />
</x-form.add-form>
