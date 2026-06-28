<x-app-layout title="Add Activity">
    <div class="content-area">
        <form action="{{ route('allactivity.store') }}" method="POST" enctype="multipart/form-data" class="row theme-form">
            @csrf
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card">
                        <div class="custom-card-header ">

                            <div class="heading">
                                <h1>Add Activity</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{ route('allactivity.index') }}">See All</a>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Activity Title<sup>*</sup></label>
                                        <input type="text" id="Title" name="title" class="form-control"
                                            placeholder="Enter Title" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Slug <sup>*</sup></label>
                                        <input type="text" name="slug" id="unique_url" class="form-control"
                                            placeholder="Enter slug" value="{{ old('slug') }}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Short Description</label>
                                        <textarea class="form-control lh-lg" style="resize: none;" placeholder="Write a short descriptions"
                                            name="short_description" rows="2">{{ old('short_description') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group custom-form-group">
                                <textarea placeholder="Event descriptions" name="description" id="editor">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4" style="padding-left: 0">
                <div class="sidebar-widgets">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <div class="form-group custom-form-group">
                                <label for="">Status <sup>*</sup></label>
                                <select name="status" class="form-control">
                                    <option value="">Choose one</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="unpublished" {{ old('status') == 'unpublished' ? 'selected' : '' }}>
                                        Unpublished</option>
                                </select>
                            </div>

                            <x-admin.upload-image name='photo' title='Event Image' size='512 X 512px' />
                            <button type="submit" class="btn theme-btn">Add Activity</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>
