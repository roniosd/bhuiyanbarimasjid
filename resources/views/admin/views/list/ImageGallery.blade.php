<x-app-layout title="ImageGallery List">
    <x-list-header title="ImageGallery List" />

    <div class="bg-white shadow-md rounded-xl mt-4 p-4">
        <h2 class="font-semibold mb-3">Select a Folder</h2>

        <div class="flex flex-wrap gap-2">
            @foreach ($directories as $folder)
                <a href="{{ route('gallery.all', ['folder' => $folder]) }}"
                    class="px-4 py-2 rounded border text-sm font-medium {{ $folder == $selectedFolder ? 'bg-[#216659] text-white border-[#216659]' : 'border-[#216659] text-[#216659]' }}">
                    {{ ucfirst($folder) }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="mt-5">
        <h2 class="font-semibold mb-4">
            Images in: <span class="text-[#216659]">{{ $selectedFolder }}</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4">
            <x-image-gallery-card :images="$images" />
        </div>
    </div>
</x-app-layout>
