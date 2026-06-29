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
        <x-admin-table showHeader="{{ false }}" isDatatable="{{ false }}" :columns="['Role Name', 'Methods', 'Actions']"
            :row-keys="['role_name', 'methods', 'actions']" :links="[
                'edit' => 'permission.edit',
                'delete' => 'permission.destroy',
            ]" :data="$permissions" />
    </x-slot>
</x-form.add-form>

<script>
    $(document).ready(function() {
        $("#multiselect").multiselect();
    });
</script>
