<x-form.add-form title="Add COA" url="coa" button="Add COA">
    <x-form.form-select label="Type" name="type" :options="[
        '' => 'Choose one',
        'dr' => 'Dr. (আয়)',
        'cr' => 'Cr. (ব্যয়)',
    ]" required />

    <x-form.form-input label="Head" name="head" placeholder="Enter Head" required />


    <x-form.form-select label="Status" name="status" :options="[
        '' => 'Choose one',
        'active' => 'Active',
        'inactive' => 'Inactive',
    ]" required />

    <div x-data="{ isChild: '' }" class="grid grid-cols-2  gap-5 col-span-2">
        <x-form.form-select label="Is Child" xmodel="isChild" name="is_child" :options="['' => 'Choose one', 'yes' => 'Yes', 'no' => 'No']" required />

        <div x-show="isChild === 'yes'" x-transition>
            <x-form.form-select label="Parent Head" name="parent_head" :options="['' => 'Choose one'] + $parents->pluck('head', 'id')->toArray()" />
        </div>

    </div>

</x-form.add-form>
