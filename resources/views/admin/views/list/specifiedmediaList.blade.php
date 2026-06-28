<x-app-layout title="Media List">
    <div class="content-area">
        <div class="row">
            <div class="">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>{{ $album->album_name }}</h1>
                            </div>

                        </div>
                        <div class="container">
                            <div class="row">
                                @forelse ($album->media as $media)
                                    <div class="col-xxl-3 col-xl-4 col-lg-4 mb-4">
                                        <div class="card h-100 shadow-sm">
                                            <div class="position-relative">
                                                <img src="{{ asset('/public/storage/' . ($media->media ? 'media/' . $media->media : 'default/category.png')) }}"
                                                    class="card-img-top" alt="Album Image"
                                                    style="height: 200px; object-fit: cover;">
                                                <div class="position-absolute top-0 end-0 p-2 d-flex gap-2">
                                                    <form action="{{ route('media.destroy', $media->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('You want to delete this Media?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-light text-danger"
                                                            title="Delete">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>

                                                    <a href="{{ route('media.edit', $media->id) }}"
                                                        class="btn btn-sm btn-light" title="Edit"><i
                                                            class="bi bi-pencil"></i></a>

                                                    <a data-toggle="tooltip"
                                                        href="{{ $media->media == $album->cover ? '#' : route('setCover', $media->id) }}"
                                                        title="{{ $media->media == $album->cover ? 'Cover set' : 'Add as Cover' }}"
                                                        class="btn btn-sm btn-light text-info"><i
                                                            class="bi bi-{{ $media->media == $album->cover ? 'check-circle-fill text-danger' : 'image' }}"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-0 text-truncate" title="{{ $media->title }}">
                                                    <span> {{ $media->title }}</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <div class="alert alert-warning text-center">
                                            No Media found for This Album.
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
