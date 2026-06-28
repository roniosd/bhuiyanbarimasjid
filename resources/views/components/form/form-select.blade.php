@props(['label', 'id' => '', 'value' => '', 'name', 'options' => [], 'required' => false])

<div class="col-span-1">
    <label class="block mb-1 font-medium text-sm text-gray-700">
        {{ $label }}
        @if ($required)
            <sup class="text-red-500">*</sup>
        @endif
    </label>
    <select name="{{ $name }}" id="{{ $id }}" class="form-input placeholder-yellow-300 px-4 w-full py-3">
        @foreach ($options as $key => $val)
            <option value="{{ $key }}" {{ old($name, $value) == $key ? 'selected' : '' }}>{{ $val }}
            </option>
        @endforeach
    </select>
</div>
