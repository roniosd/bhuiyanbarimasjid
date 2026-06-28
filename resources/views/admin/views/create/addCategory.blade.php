<x-app-layout title="Add Catagory">
    <div class="content-area">

        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="row theme-form">
            @csrf
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card ">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Add Category</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{ route('category.index') }}">See All</a>
                            </div>
                        </div>

                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Category Name <sup>*</sup></label>
                                        <input type="text" name="name" id="Title" class="form-control"
                                            placeholder="Enter category name" value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Slug <sup>*</sup></label>
                                        <input type="text" id="unique_url" class="form-control text-lowercase"
                                            name="slug" placeholder="Enter category slug"
                                            value="{{ old('slug') }}">
                                    </div>
                                </div>



                                {{-- <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Is Parent <sup>*</sup></label>
                                        <select name="is_parent" id="" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="parent" {{ old('is_parent') == 'parent' ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="child" {{ old('is_parent') == 'child' ? 'selected' : '' }}>
                                                No
                                            </option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group custom-form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control lh-lg" name="description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-lg-4">
                <div class="sidebar-widgets">
                    <div class="custom-card" style="padding:0;background: none;box-shadow: none;">
                        <div class="custom-card-body">

                            <div class="col-lg-12">
                                <div class="form-group custom-form-group">
                                    <label for="">Type <sup>*</sup></label>
                                    <select name="type" id="" class="form-control">
                                        <option value="">Choose Category Type</option>
                                        <option value="post" {{ old('type') == 'post' ? 'selected' : '' }}>
                                            Post
                                        </option>

                                        <option value="event" {{ old('type') == 'event' ? 'selected' : '' }}>
                                            Event
                                        </option>
                                        <option value="graphics" {{ old('type') == 'graphics' ? 'selected' : '' }}>
                                            Graphics</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group custom-form-group">
                                <label for="">Select Status <sup>*</sup></label>
                                <select name="status" id="" class="form-control">
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="unpublished" {{ old('status') == 'unpublished' ? 'selected' : '' }}>
                                        Unpublished</option>
                                </select>
                            </div> 

                            <x-admin.upload-image name='photo' title='Category Photo' size='150 X 150px' />

                            <button type="submit" class="btn theme-btn ms-2">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Add Category
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
