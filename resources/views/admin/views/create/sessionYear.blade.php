<x-form.add-form title="Add Session Year" url="session" button="Add Session" class="col-span-4">
    <x-form.form-input label="Session Name" name="session_name" placeholder="Enter Session Name" />

    <x-form.form-input label="Duration" name="duration" placeholder="Enter duration" />

    <x-form.form-select label="Select Status" name="status" :options="[
        'published' => 'Published',
        'unpublished' => 'Unpublished',
    ]" required />

    <x-slot name="listItems">
        <div class="container">
            <div class="table-responsive">
                <table id="adminTable" class="table align-middle table-hover text-left table-striped">
                    <thead>
                        <tr>
                            <th>Session Name</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sessions as $ses)
                            <tr>
                                <td>{{ $ses->session_name }}</td>
                                <td>{{ $ses->duration }}</td>
                                <td>{{ $ses->status }}</td>
                                <x-admin.action-button id="{{ $ses->id }}" edit="session.edit"
                                    delete="session.destroy" />
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-form.add-form>
