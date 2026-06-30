<x-app-layout title="Image Gallery">
    <div class="space-y-8 p-6">

        {{-- Folders --}}
        <div>
            <h2 class="mb-4 text-xl font-semibold">📁 Select Folder</h2>

            <div class="flex flex-wrap gap-2">
                @foreach ($directories as $folder)
                    <a href="{{ route('gallery.all', ['folder' => $folder]) }}">
                        <button
                            class="rounded-lg text-white border border-green-700 bg-green-700 hover:bg-green-900  px-4 py-2 text-sm transition
                        {{ $folder === $selectedFolder ? 'bg-green-900 ' : 'bg-gray-100 hover:bg-gray-200' }}">

                            {{ ucfirst($folder) }}
                        </button>

                    </a>
                @endforeach
            </div>
        </div>

        {{-- Gallery --}}
        <div>
            <h2 class="mb-5 text-xl font-semibold">
                🖼️ {{ ucfirst($selectedFolder) }}
            </h2>

            <div class="grid grid-cols-2 gap-5 md:grid-cols-3 xl:grid-cols-4">

                @forelse ($images as $image)
                    <div class="group overflow-hidden rounded-xl border bg-white shadow-sm">

                        <div class="relative aspect-4/3 bg-gray-100">

                            <img src="{{ $image['url'] }}" alt="" class="h-full w-full object-contain p-3">

                            <div class="absolute right-2 top-2 flex gap-2 opacity-0 transition group-hover:opacity-100">

                                {{-- Copy URL --}}


                                {{-- Delete --}}
                                <x-button.action-button id="{{ $image['path'] }}" delete="gallery.delete"
                                    copy="{{ $image['url'] }}" />

                            </div>
                        </div>

                        <div class="space-y-1 p-3 text-sm text-gray-600 flex justify-between">
                            <p>{{ number_format($image['size'] / 1024, 1) }} KB</p>
                            <p>{{ $image['width'] }} × {{ $image['height'] }}</p>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full rounded-lg border border-dashed p-10 text-center text-gray-500">
                        No images found.
                    </div>
                @endforelse

            </div>
        </div>

    </div>


</x-app-layout>
