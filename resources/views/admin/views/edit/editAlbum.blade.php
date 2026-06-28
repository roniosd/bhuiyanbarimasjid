<x-app-layout title="Update Album">
    <div class="content-area">
        <form action="{{ route('album.update', $album->id) }}" method="POST" enctype="multipart/form-data"
            class="row theme-form">
            @csrf
            @method('PUT')
            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">

                                <h1>Add Category</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{ route('album.index') }}">See All</a>

                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Album Name</label>
                                        <input id="Title" type="text"
                                            value="{{ old('album_name', $album->album_name) }}" name="album_name"
                                            class="form-control" placeholder="Enter album name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Slug</label>
                                        <input type="text" value="{{ old('slug', $album->slug) }}" name="slug"
                                            id="unique_url" class="form-control" placeholder="Enter slug">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Image Quality</label>
                                        <select name="image_quality" id="" class="form-control">
                                            <option value="">Choose one</option>
                                            <option {{ $album->image_quality == 'HD' ? 'selected' : '' }}
                                                value="HD">HD
                                            </option>
                                            <option {{ $album->image_quality == 'normal' ? 'selected' : '' }}
                                                value="normal">Normal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="">Choose one</option>
                                            <option {{ $album->status == 'published' ? 'selected' : '' }}
                                                value="published">
                                                Published</option>
                                            <option {{ $album->status == 'unpublished' ? 'selected' : '' }}
                                                value="unpublished">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn theme-btn">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Update Album
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</x-app-layout>
