<x-app-layout title="Media List">
    <div class="content-area">
        <div class="row">
            <div class="">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Media List</h1>
                            </div>
                            <div class="d-flex gap-4">

                                <a class="btn btn-success" href="{{ route('media.create') }}">+</a>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                @forelse ($medias as $media)
                                    <div class="col-xxl-3 col-xl-4 col-lg-4 mb-4">
                                        <div class="card h-100 shadow-sm">
                                            <div class="position-relative">
                                                <img src="{{ $media->media ?? asset('/public/storage/default/category.png') }}"
                                                    class="card-img-top" alt="Album Image"
                                                    style="height: 200px; object-fit: cover;">
                                                <div class="position-absolute top-0 end-0 p-2 d-flex gap-2">

                                                    <form action="{{ route('media.update', $media->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('You want to delete this Media?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-light text-danger"
                                                            title="Delete"><i class="bi bi-trash"></i></button>
                                                    </form>

                                                    <a href="{{ route('media.edit', $media->id) }}"
                                                        class="btn btn-sm btn-light" title="Edit"><i
                                                            class="bi bi-pencil"></i></a>

                                                    <a data-toggle="tooltip"
                                                        href="{{ $media->media == $media->album->cover ? '#' : route('setCover', $media->id) }}"
                                                        title="{{ $media->media == $media->album->cover ? 'Set for ' : 'Add Cover for ' }}{{ $media->album->album_name }}"
                                                        class="btn btn-sm btn-light text-info"><i
                                                            class="bi bi-{{ $media->media == $media->album->cover ? 'check-circle-fill text-danger' : 'image' }}"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-0 text-truncate">
                                                    <span class="fw-bold">Title :</span>
                                                    <span>{{ $media->title }}</span>
                                                </h5>
                                                <h5 class="card-title mb-0 text-truncate">
                                                    <span class="fw-bold">Album Name :</span>
                                                    <a href="{{ route('album.show', $media->album->id) }}">
                                                        {{ $media->album->album_name }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <div class="alert alert-warning text-center">
                                            No Media found.
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
