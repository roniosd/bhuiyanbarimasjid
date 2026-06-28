@props(['name', 'title' => '', 'size' => '', 'img' => null])

<div class="mb-4 dropzone-container" data-name="{{ $name }}">
    @if($title)
        <label class="block text-base font-medium text-gray-700 mt-2 mb-1">
            {{ $title }}
            @if($size)
                <span class="text-xs text-gray-500"> ({{ $size }})</span>
            @endif
        </label>
    @endif

    <div id="dropzone-{{ $name }}" 
         class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer hover:bg-slate-300 bg-slate-100 transition">
        <div id="upload-interface-{{ $name }}" class="{{ $img ? 'hidden' : 'py-13' }}">
            <i class="bi bi-upload text-5xl text-gray-500 mb-2"></i>
            <p class="text-lg font-semibold text-gray-600">Drag & drop or click to upload</p>
        </div>
        <img id="{{ $name }}-preview" src="{{ $img ?? '' }}" 
             class="{{ !$img ? 'hidden' : '' }} max-h-40 mx-auto mt-2 rounded">
    </div>

    <input type="file" name="{{ $name }}" id="{{ $name }}" class="hidden" accept="image/*">
</div>