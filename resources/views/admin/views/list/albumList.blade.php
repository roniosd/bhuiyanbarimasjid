<x-app-layout title="Album List">
    <div class="content-area">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Album List</h1>
                            </div>

                            <div class="d-flex gap-4">

                                <a class="btn btn-success" href="{{ route('album.create') }}">+</a>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                @forelse ($albums as $album)
                                    <div class="col-xxl-3 col-xl-4 col-lg-4 mb-4">
                                        <div class="card h-100 shadow-sm">
                                            <div class="position-relative">
                                                <img src="{{ asset('/public/storage/' . ($album->cover ? 'media/' . $album->cover : 'default/category.png')) }}"
                                                    class="card-img-top" alt="Album Image"
                                                    style="height: 200px; object-fit: cover;">
                                                <div class="position-absolute top-0 end-0 p-2 d-flex gap-2">
                                                    <form action="{{ route('album.update', $album->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('You want to delete this albums?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-light text-danger"
                                                            title="Delete"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                    <a href="{{ route('media.create') }}?id={{ $album->id }}"
                                                        class="btn btn-sm btn-light" title="Add Media"><i
                                                            class="bi bi-plus"></i></a>
                                                    <a href="{{ route('album.edit', $album->id) }}"
                                                        class="btn btn-sm btn-light text-success" title="Edit Album"><i
                                                            class="bi bi-pencil"></i></a>
                                                    <a href="{{ route('album.show', $album->id) }}"
                                                        class="btn btn-sm btn-light" title="View"><i
                                                            class="bi bi-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-0 text-truncate"
                                                    title="{{ $album->album_name }}">
                                                    <span> {{ $album->album_name }}</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <div class="alert alert-warning text-center">
                                            No albums found.
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
