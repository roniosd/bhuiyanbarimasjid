<x-form.add-form title="Update Permission" url="permission" button="Update Permission" :id="$permission->id" class="col-span-4">
    <x-form.form-input label="Enter Role Name" name="role_name" :value="$permission->role_name"
        placeholder="Enter Title" />

    <div class="col-span-1">
        <label class="block mb-1 font-medium text-sm text-gray-700">Select Permission</label>
        @php
            $selectedMethods = collect(explode(',', $permission->methods))->map(fn ($method) => trim($method, ' "[]'))->toArray();
        @endphp
        <select name="methods[]" class="form-input placeholder-yellow-300 px-4 w-full py-3" id="multiselect"
            multiple="multiple">
            @foreach ($modules as $module)
                <option class="text-capitalize" value="{{ $module }}" @selected(in_array($module, $selectedMethods))>
                    {{ str_replace(['.', 'index', 'destroy'], [' ', 'list', 'delete'], $module) }}
                </option>
            @endforeach
        </select>
    </div>

    <x-form.form-select label="Status" name="status" :value="$permission->status" :options="[
        '' => 'Choose one',
        'published' => 'Published',
        'unpublished' => 'Unpublished',
    ]" required />
</x-form.add-form>

<script>
    $(document).ready(function() {
        $("#multiselect").multiselect();
    });
</script>
