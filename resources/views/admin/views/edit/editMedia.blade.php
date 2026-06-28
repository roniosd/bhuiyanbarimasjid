<x-app-layout title="Update Media">
    <div class="content-area">
        <form action="{{ route('media.update', $media->id) }}" method="POST" enctype="multipart/form-data"
            class="row theme-form">
            @csrf
            @method('PUT')
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">

                                <h1>Update Media</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{ route('media.index') }}">See All</a>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" value="{{ old('title', $media->title) }}"
                                            class="form-control" placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Alt</label>
                                        <input value="{{ old('alt', $media->alt) }}" type="text" class="form-control"
                                            name="alt" placeholder="Enter alt">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="">Choose one</option>
                                            <option {{ $media->status == 'active' ? 'selected' : '' }} value="active">
                                                Active
                                            </option>
                                            <option {{ $media->status == 'inactive' ? 'selected' : '' }}
                                                value="inactive">
                                                Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Album</label>
                                        <select name="album_id" id="" class="form-control">
                                            <option value="">Choose one</option>
                                            @foreach ($albums as $album)
                                                <option {{ $media->album_id == $album->id ? 'selected' : '' }}
                                                    value="{{ $album->id }}">{{ $album->album_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group custom-form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="editor">{{ $media->description }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4">
                <div class="sidebar-widgets">
                    <div class="custom-card" style="padding:0;background: none;box-shadow: none;">
                        <div class="custom-card-body">

                            <x-admin.upload-image name='media' title='Media Image' size='512 X 512px'
                                :img="'media/' . $media->media" />
                            <button type="submit" class="btn theme-btn ms-2">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Add Media
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
