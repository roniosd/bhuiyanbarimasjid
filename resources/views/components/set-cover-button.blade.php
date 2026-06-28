@props(['albumImage', 'currentImage', 'id'])

@php
    $isCurrent = basename($albumImage) === basename($currentImage);
@endphp

<form action="{{ route('album.setcover', $id) }}" method="POST" class="mt-2">
    @csrf
    <input type="hidden" name="image" value="{{ $currentImage }}">
    <button type="submit" @disabled($isCurrent) class="{{ $isCurrent ? 'opacity-50 cursor-not-allowed' : '' }}">
        <i
            class="bi {{ $isCurrent ? 'bi-check-circle-fill text-red-500' : 'bi-image text-green-500' }} 
            bg-white p-2 rounded hover:bg-gray-100">
        </i>
    </button>
</form>
