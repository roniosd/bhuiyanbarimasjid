<x-form.add-form title="Add Permission" url="permission" button="Add Permission" class="col-span-4">
    <x-form.form-input label="Enter Role Name" name="role_name" placeholder="Enter Title" />

    <div class="col-span-1">
        <label class="block mb-1 font-medium text-sm text-gray-700">Select Permission</label>
        <select name="methods[]" class="form-input placeholder-yellow-300 px-4 w-full py-3" id="multiselect"
            multiple="multiple">
            @foreach ($modules as $module)
                <option class="text-capitalize" value="{{ $module }}">
                    {{ str_replace(['.', 'index', 'destroy'], [' ', 'list', 'delete'], $module) }}
                </option>
            @endforeach
        </select>
    </div>

    <x-form.form-select label="Status" name="status" :options="[
        '' => 'Choose one',
        'published' => 'Published',
        'unpublished' => 'Unpublished',
    ]" required />

    <x-slot name="listItems">
        <div class="container">
            <div class="card border-0">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Role Name</th>
                                    <th>Method</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td class="px-4 py-2">{{ $permission->role_name }}</td>
                                        <td class="px-4 py-2 text-justify">
                                            @foreach (explode(',', $permission->methods) as $index => $method)
                                                <span class="text-black">{{ $index + 1 }}.</span>
                                                {{ ucwords(str_replace(['.', '_', '"', '[', ']'], ' ', $method)) }},
                                            @endforeach
                                        </td>
                                        <x-admin.action-button id="{{ $permission->id }}" edit="permission.edit"
                                            delete="permission.destroy" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-form.add-form>

<script>
    $(document).ready(function() {
        $("#multiselect").multiselect();
    });
</script>
