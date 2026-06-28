<x-app-layout title="Add Slider">
    <div class="content-area text-gray-900 text-base"> {{-- Darker text for readability --}}
        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data" class="row theme-form">
            @csrf

            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card ">
                        <div class="custom-card-header ">

                            <div class="heading flex items-center gap-2">

                                <h1 class="text-xl font-semibold">Add Slider</h1>
                            </div>
                            <div class="header-rigth">
                                <p class="text-sm">Fields marked with * must be filled</p>
                            </div>
                        </div>

                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{ old('title') }}"
                                            class="form-control" placeholder="Enter title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Position <sup>*</sup></label>
                                        <input required type="number" min="1" max="255" name="position"
                                            value="{{ old('position') }}" class="form-control"
                                            placeholder="Enter a position">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Button Label</label>
                                        <input type="text" name="btn_label" value="{{ old('btn_label') }}"
                                            class="form-control" placeholder="Enter button label">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Button Link</label>
                                        <input type="url" name="btn_link" value="{{ old('btn_link') }}"
                                            class="form-control" placeholder="Enter button URL">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Category<sup>*</sup></label>
                                        <select required name="category" class="form-control">
                                            <option value="">Choose a Category</option>
                                            @foreach ($categoris as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category') == $category->id ? 'selected' : '' }}>
                                                    {{ ucfirst($category->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Select Status<sup>*</sup></label>
                                        <select required name="status" class="form-control">
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

                            <div class="form-group custom-form-group">
                                <label>Description</label>
                                <textarea name="description" id="editor" class="form-control" rows="4" placeholder="Description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-lg-4" style="padding-left: 0px">
                <div class="sidebar-widgets">
                    <div class="custom-card" style="padding:0;background: none;box-shadow: none;">
                        <div class="custom-card-body">
                            <x-admin.upload-image name="photo" title="Slider Image" size="2020 X 650px" />
                            <button type="submit" class="btn theme-btn mt-4">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Add Slider
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
