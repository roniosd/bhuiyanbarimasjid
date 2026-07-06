<x-form.add-form title="Add Transaction" url="transaction" button="Add Transaction">
    <x-form.form-input label="Date" name="date" type="date" required />

    <x-form.form-select label="Type" name="type" :options="[
        '' => 'Choose one',
        'dr' => 'Dr. (আয়)',
        'cr' => 'Cr. (ব্যয়)',
    ]" required />

    <div class="col-span-1">
        <label class="block text-sm font-medium mb-1">
            Head
            <sup class="text-red-500">*</sup>
        </label>
        <select name="head_id" id="head_id"
            class="form-input placeholder-yellow-300  w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 border py-3 px-4 mt-1 ">
            <option value="">Choose one</option>
            @foreach ($heads as $head)
                <option value="{{ $head->id }}" data-type="{{ $head->type }}" @selected(old('head_id') == $head->id)>
                    {{ $head->head }}
                </option>
            @endforeach
        </select>
    </div>

    <x-form.form-input label="Amount" name="amount" type="number" placeholder="Enter Amount" required />

    <x-form.form-input divClass="md:col-span-2" label="Description" name="description" placeholder="Enter Description" />
</x-form.add-form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const type = document.querySelector('[name="type"]');
        const heads = document.querySelectorAll('#head_id option');

        const filterHeads = () => heads.forEach(head => {
            head.hidden = head.value && head.dataset.type !== type.value;
            if (head.selected && head.hidden) head.selected = false;
        });

        type.addEventListener('change', filterHeads);
        filterHeads();
    });
</script>
