<x-app-layout title="Update Homepage Setting">
    <div class="content-area">
        <form action="homepageUpdate" method="POST" enctype="multipart/form-data" class="row theme-form">
            @csrf
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">

                                <h1>Update Homepage Setting</h1>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Title</label>
                                        <input value="{{ $homepageSetting->title }}" type="text" name="title"
                                            class="form-control" placeholder="Enter title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Button Label</label>
                                        <input value="{{ $homepageSetting->btn_label }}" type="text" name="btn_label"
                                            class="form-control" placeholder="Enter button label">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Button Link</label>
                                        <input value="{{ $homepageSetting->btn_link }}" type="url"
                                            class="form-control" name="btn_link" placeholder="Enter a position">
                                    </div>
                                </div>

                                <div class="form-group custom-form-group">
                                    <label for="">Short Description <sup>*</sup></label>
                                    <textarea rows="2" style="line-height: 20px" type="text" class="form-control" name="short_descreption"
                                        placeholder="Write a short description">{{ $homepageSetting->short_descreption }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <div class="form-group custom-form-group p-4 border rounded shadow-sm bg-white">
                                        <label class="form-label fw-bold fs-5 mb-3">
                                            Select Sections to Show on Home Page
                                        </label>
                                        @php
                                            $allSections = [
                                                'আমাদের সম্পর্কে',
                                                'অনুদান তহবিল',
                                                'কার্যক্রম সমূহ',
                                                'অনুষ্ঠানসমূহ',
                                                'ব্যানার',
                                                'গ্যালারী',
                                                'সর্বশেষ খবর',
                                            ];

                                            $selected = json_decode($homepageSetting->sections, true) ?? [];
                                        @endphp
                                        @dd($selected)

                                        <div class="row">
                                            @foreach ($allSections as $section)
                                                <div class="col-md-2 mb-2">
                                                    <div class="form-check form-switch d-flex align-items-center">

                                                        <input type="hidden" name="sections[{{ $section }}]"
                                                            value="">

                                                        <input class="form-check-input me-2" type="checkbox"
                                                            id="section_{{ Str::slug($section) }}"
                                                            name="sections[{{ $section }}]"
                                                            value="{{ $section }}"
                                                            {{ isset($selected[$section]) ? 'checked' : '' }}>

                                                        <label class="form-check-label fw-bold mt-3"
                                                            for="section_{{ Str::slug($section) }}">
                                                            {{ $section }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4" style="padding-left: 0px">
                <div class="sidebar-widgets">
                    <div class="custom-card" style="padding:0;background: none;box-shadow: none;">
                        <div class="custom-card-body">
                            <div class="form-group custom-form-group">
                                <label for="">Select Status<sup>*</sup></label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Choose one</option>
                                    <option {{ $homepageSetting->status == 'published' ? 'selected' : '' }}
                                        value="published">Published</option>
                                    <option {{ $homepageSetting->status == 'unpublished' ? 'selected' : '' }}
                                        value="unpublished">Unpublished</option>
                                </select>
                            </div>

                            <x-admin.upload-image name='photo' title='Homepage Image' size='512 X 512px'
                                :img="'homepage/' . $homepageSetting->photo" />

                            <button type="submit" class="btn theme-btn">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Update Setting
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
