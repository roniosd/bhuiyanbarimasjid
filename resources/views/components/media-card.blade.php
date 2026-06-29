  @props(['medias' => [], 'setcover' => true, 'details' => true])
  @forelse ($medias as $media)
      <div class="bg-white rounded shadow hover:shadow-md transition duration-300 max-w-90">
          <div class="relative">
              <img src="{{ $media->media ?? $media->image ?? asset('public/storage/default/default.jpg') }}" alt="Media Image"
                  class="w-full h-48 object-cover rounded-t">

              <div class="absolute top-2 right-2 flex gap-2">
                  <form action="{{ route('media.destroy', $media->id) }}" method="POST"
                      onsubmit="return confirm('You want to delete this Media?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" title="Delete" class="bg-white p-2 rounded hover:bg-red-100 text-red-600">
                          <i class="bi bi-trash"></i>
                      </button>
                  </form>

                  <a href="{{ route('media.edit', $media->id) }}" title="Edit"
                      class="bg-white p-2 rounded hover:bg-gray-100">
                      <i class="bi bi-pencil"></i>
                  </a>

                  @if ($setcover)
                      <a href="{{ $media->media == $media->album->cover ? '#' : route('setCover', $media->id) }}"
                          title="{{ $media->media == $media->album->cover ? 'Cover set' : 'Add Cover for ' }}{{ $media->album->album_name }}"
                          class="bg-white p-2 rounded hover:bg-gray-100">
                          <i class="bi bi-{{ $media->media == $media->album->cover ? 'check-circle-fill text-danger' : 'image' }}"></i>
                      </a>
                  @endif
              </div>
          </div>
          @if ($details)
              <div class="p-4 space-y-1">
                  <p class="truncate">
                      <span class="font-semibold">Title:</span> {{ $media->title }}
                  </p>
                  <p class="truncate">
                      <span class="font-semibold">Album:</span>
                      <a href="{{ route('album.show', $media->album->id) }}" class="text-blue-600 hover:underline">
                          {{ $media->album->album_name }}
                      </a>
                  </p>
              </div>
          @endif
      </div>
  @empty
      <div class="col-span-full">
          <div class="bg-yellow-100 text-yellow-800 p-4 rounded text-center">
              No Images found.
          </div>
      </div>
  @endforelse
