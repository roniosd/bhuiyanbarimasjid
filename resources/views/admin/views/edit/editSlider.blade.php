<x-app-layout title="Update Slider">
    <div class="content-area">
        <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data"
            class="row theme-form">
            @csrf
            @method('PUT')
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">

                                <h1>Add Slider</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $slider->title }}" placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Position <sup>*</sup></label>
                                        <input type="text" class="form-control" name="position"
                                            value="{{ $slider->position }}" placeholder="Enter a position">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Button Label</label>
                                        <input type="text" name="btn_label" class="form-control"
                                            value="{{ $slider->btn_label }}" placeholder="Enter button label">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Button Link</label>
                                        <input type="text" class="form-control" name="btn_link"
                                            value="{{ $slider->btn_link }}" placeholder="Enter a position">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Category<sup>*</sup></label>
                                        <select name="category" id="" class="form-control">
                                            <option value="">Choose a Category</option>

                                            @foreach ($categoris as $category)
                                                <option class="text-capitalize"
                                                    {{ $slider->category == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Select Status<sup>*</sup></label>
                                        <select name="status" id="" class="form-control">
                                            <option value="">Choose one</option>
                                            <option {{ $slider->status == 'published' ? 'selected' : '' }}
                                                value="published">Published</option>
                                            <option {{ $slider->status == 'unpublished' ? 'selected' : '' }}
                                                value="unpublished">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group custom-form-group">
                                <label for="">Description</label>
                                <textarea placeholder="Description" name="description" id="editor">{{ $slider->description }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4" style="padding-right: 0;padding-left: 0;">
                <div class="sidebar-widgets">
                    <div class="custom-card" style="padding:0;background: none;box-shadow: none;">
                        <div class="custom-card-body">
                            <x-admin.upload-image name='photo' title='Slider Image' size='512 X 512px'
                                :img="'slider/' . $slider->photo" />
                            <button type="submit" class="btn theme-btn">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Update Slider
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
