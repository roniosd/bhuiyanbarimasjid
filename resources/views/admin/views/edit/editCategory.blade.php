<x-app-layout title="Edit Catagory">
    <div class="content-area">
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data"
            class="row theme-form">
            @method('PUT')
            @csrf
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">

                                <h1>Update Category</h1>
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
                                        <label for="">Category Name</label>
                                        <input type="text" value="{{ old('name', $category->name) }}" name="name"
                                            id="Title" class="form-control" placeholder="Enter category name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Slug</label>
                                        <input id="unique_url" type="text" value="{{ old('slug', $category->slug) }}"
                                            class="form-control text-lowercase" name="slug"
                                            placeholder="Enter category slug">
                                    </div>
                                </div>

                                {{-- <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Is Parent</label>
                                        <select name="is_parent" id="" class="form-control">
                                            <option value="">Choose one</option>
                                            <option
                                                {{ old('is_parent', $category->is_parent) == 'parent' ? 'selected' : '' }}
                                                value="parent">Yes</option>
                                            <option
                                                {{ old('is_parent', $category->is_parent) == 'child' ? 'selected' : '' }}
                                                value="child">No</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group custom-form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control lh-lg" name="description">{{ $category->description }}</textarea>
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
                                    <label for="">Type</label>
                                    <select name="type" id="" class="form-control">
                                        <option value="">Choose Category Type</option>
                                        @foreach (['post', 'event', 'graphics'] as $type)
                                            <option {{ old('type', $category->type) == $type ? 'selected' : '' }}
                                                class="text-capitalize" value="{{ $type }}">
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group custom-form-group">
                                <label for="">Select Status</label>
                                <select name="status" id="" class="form-control">
                                    <option {{ old('status', $category->status) == 'published' ? 'selected' : '' }}
                                        value="published">Published</option>
                                    <option {{ old('status', $category->status) == 'unpublished' ? 'selected' : '' }}
                                        value="unpublished">Unpublished</option>
                                </select>
                            </div>

                            <x-admin.upload-image name='photo' title='Category Image' size='512 X 512px'
                                :img="'category/' . $category->photo" />
                            <button type="submit" class="btn theme-btn">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Update Category
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
