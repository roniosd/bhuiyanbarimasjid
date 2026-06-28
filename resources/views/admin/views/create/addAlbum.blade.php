<x-app-layout title="Add Album">
    <div class="content-area">
        <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data" class="row theme-form">
            @csrf
            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="content-inner">
                    <div class="custom-card ">
                        <div class="custom-card-header ">

                            <div class="heading">
                                <h1>Add Album</h1>
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
                                        <label for="">Album Name <sup>*</sup></label>
                                        <input id="Title" type="text" name="album_name" class="form-control"
                                            placeholder="Enter album name" value="{{ old('album_name') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Slug <sup>*</sup></label>
                                        <input type="text" name="slug" id="unique_url" class="form-control"
                                            placeholder="Enter slug" value="{{ old('slug') }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Image Quality <sup>*</sup></label>
                                        <select name="image_quality" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="HD" {{ old('image_quality') == 'HD' ? 'selected' : '' }}>
                                                HD
                                            </option>
                                            <option value="normal"
                                                {{ old('image_quality') == 'normal' ? 'selected' : '' }}>Normal
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Status <sup>*</sup></label>
                                        <select name="status" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="published"
                                                {{ old('status') == 'published' ? 'selected' : '' }}>Published
                                            </option>
                                            <option value="unpublished"
                                                {{ old('status') == 'unpublished' ? 'selected' : '' }}>Unpublished
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn theme-btn">
                                <!-- SVG icon unchanged -->
                                Add Album
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>
