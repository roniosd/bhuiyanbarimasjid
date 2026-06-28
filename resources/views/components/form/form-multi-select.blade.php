@props(['label', 'filed' => 'name', 'value' => '', 'name', 'options' => [], 'required' => false])

<div>
    <label class="block mb-1 font-medium text-sm text-gray-700">
        {{ $label }}
        @if ($required)
            <sup class="text-red-500">*</sup>
        @endif
    </label>


    <div x-data="{ expanded: false }" :class="expanded ? 'max-h-60' : 'max-h-12'"
        class="flex flex-col gap-2 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 py-3 px-4 border overflow-y-auto transition-all duration-300">

        <div @click="expanded = !expanded" class="cursor-pointer text-gray-700 mb-3">
            {{ $label }}
        </div>

        @foreach ($options as $option)
            <label class="inline-flex items-center gap-2 text-sm text-gray-700 capitalize">
                <input type="checkbox" name="{{ $name }}[]" value="{{ $option->id }}"
                    class="text-blue-600 rounded permission-checkbox"
                    {{ in_array((string) $option->id, ['1', '2', '4'], true) ? 'checked' : '' }}>
                <span>{{ $option->$filed }}</span>

            </label>
        @endforeach

    </div>
</div>
