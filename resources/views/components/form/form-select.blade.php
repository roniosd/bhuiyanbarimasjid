@props(['label', 'id' => '', 'value' => '', 'name', 'options' => [], 'required' => false])

<div class="col-span-1">
    <label class="block text-sm font-medium mb-1">
        {{ $label }}
        @if ($required)
            <sup class="text-red-500">*</sup>
        @endif
    </label>
    <select name="{{ $name }}" id="{{ $id }}"
        class="form-input placeholder-yellow-300  w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 border py-3 px-4 mt-1 ">
        @foreach ($options as $key => $val)
            <option value="{{ $key }}" {{ old($name, $value) == $key ? 'selected' : '' }}>{{ $val }}
            </option>
        @endforeach
    </select>
</div>
