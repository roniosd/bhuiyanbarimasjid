<x-form.add-form title="Edit COA" url="coa" button="Update COA" :id="$coa->id">
    <x-form.form-select label="Type" name="type" :value="$coa->type" :options="[
        '' => 'Choose one',
        'dr' => 'Dr.',
        'cr' => 'Cr.',
    ]" required />

    <x-form.form-input label="Head" name="head" :value="$coa->head" placeholder="Enter Head" required />


    <x-form.form-select label="Status" name="status" :value="$coa->status" :options="[
        '' => 'Choose one',
        'active' => 'Active',
        'inactive' => 'Inactive',
    ]" required />

    <div x-data="{ isChild: '' }" class="grid grid-cols-2 gap-5 col-span-2">
        <x-form.form-select :value="$coa->is_child" label="Is Child" xmodel="isChild" name="is_child" :options="['' => 'Choose one', 'yes' => 'Yes', 'no' => 'No']"
            required />

        <div x-show="isChild === 'yes'" x-transition>
            <x-form.form-select label="Parent Head" :value="$coa->parent_head" name="parent_head" :options="['' => 'Choose one'] + $parents->pluck('head', 'id')->toArray()" />
        </div>

    </div>


</x-form.add-form>
