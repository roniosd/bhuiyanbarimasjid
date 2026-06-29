@props(['images' => []])

@forelse ($images as $image)
    <div class="bg-white rounded shadow hover:shadow-md transition duration-300 overflow-hidden">
        <img src="{{ $image['url'] }}" alt="Image" class="w-full h-48 object-cover">

        <div class="p-3 text-sm text-gray-600 space-y-1">
            <p>
                <span class="font-semibold">Size:</span>
                {{ number_format($image['size'] / 1024, 1) }} KB
            </p>
            <p>
                <span class="font-semibold">Dimensions:</span>
                {{ $image['width'] }} x {{ $image['height'] }}
            </p>
        </div>
    </div>
@empty
    <div class="col-span-full">
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded text-center">
            No images found in this folder.
        </div>
    </div>
@endforelse
