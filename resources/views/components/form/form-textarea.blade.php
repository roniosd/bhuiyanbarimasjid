@props(['label', 'name', 'id' => '', 'value' => '', 'rows' => 5, 'required' => false])

<div class="col-span-full">
    <label class="block text-sm font-medium mb-1">
        {{ $label }}
        @if ($required)
            <sup class="text-red-500">*</sup>
        @endif
    </label>
    <textarea name="{{ $name }}" id="{{ $id }}" rows="{{ $rows }}" class="w-full form-input rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 border">{{ old($name) ?? $slot }}</textarea>
</div>
