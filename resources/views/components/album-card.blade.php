@props(['albums' => []])

@forelse ($albums as $album)
    <div class="bg-white rounded shadow hover:shadow-md transition duration-300 max-w-90">
        <div class="relative">
            <img src="{{ $album->cover ?? asset('/public/storage/default/category.png') }}" class="w-full h-48 object-cover rounded-t"
                alt="Album Image">

            <div class="absolute top-2 right-2 flex gap-2">
                <form action="{{ route('album.destroy', $album->id) }}" method="POST"
                    onsubmit="return confirm('You want to delete this albums?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-white p-2 rounded hover:bg-red-100 text-red-600" title="Delete">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>

                <a href="{{ route('media.create') }}?id={{ $album->id }}" class="bg-white p-2 rounded hover:bg-gray-100"
                    title="Add Media">
                    <i class="bi bi-plus"></i>
                </a>

                <a href="{{ route('album.edit', $album->id) }}" class="bg-white p-2 rounded hover:bg-gray-100 text-success"
                    title="Edit Album">
                    <i class="bi bi-pencil"></i>
                </a>

                <a href="{{ route('album.show', $album->id) }}" class="bg-white p-2 rounded hover:bg-gray-100"
                    title="View">
                    <i class="bi bi-eye"></i>
                </a>
            </div>
        </div>

        <div class="p-4">
            <h5 class="mb-0 truncate" title="{{ $album->album_name }}">
                {{ $album->album_name }}
            </h5>
        </div>
    </div>
@empty
    <div class="col-span-full">
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded text-center">
            No albums found.
        </div>
    </div>
@endforelse
