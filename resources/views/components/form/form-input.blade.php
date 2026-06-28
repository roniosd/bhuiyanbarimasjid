@props([
    'label',
    'name',
    'value' => '',
    'placeholder' => null,
    'required' => false,
    'type' => 'text',
    'divClass' => '',
    'id' => '',
    'class' => '',
    'data_table' => null,
    'readonly' => false,
])

<div class="{{ $divClass }}">
    <label class="block text-sm font-medium mb-1">
        {{ $label }}
        @if ($required)
            <sup class="text-red-500">*</sup>
        @endif
    </label>
    <small class="slug-status text-sm text-gray-600 line-clamp-1"></small>


    <input  
 data-table="{{ $data_table ?? '' }}" @readonly($readonly) id="{{ $id }}" type="{{ $type }}"
        name="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder ?? 'Enter ' . ucfirst($label) }}"
        class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 border py-3 px-4 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 {{ $class }}">


</div>
