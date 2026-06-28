<x-app-layout title="Update Page">
    <div class="content-area">
        <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data"
            class="row theme-form">
            @csrf
            @method('PUT')
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">

                                <h1>Update Page</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Page Title</label>
                                        <input id="Title" type="text" name="title" class="form-control"
                                            value="{{ $page->title }}" placeholder=" Enter post title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Slug</label>
                                        <input type="text" name="slug" value="{{ $page->slug }}" id="unique_url"
                                            class="form-control" placeholder="Enter slug">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Widget</label>
                                        <input type="text" name="widget" class="form-control"
                                            value="{{ $page->widget }}" placeholder="Enter attachment">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Excerpt</label>
                                        <input type="text" name="excerpt" value="{{ $page->excerpt }}"
                                            class="form-control" placeholder="Enter excerpt">
                                    </div>
                                </div>


                                <div>
                                    <div class="form-group custom-form-group">
                                        <label>Enter your Template</label>
                                        <select name="template" id="template" class="form-control">
                                            <option value="">Choose Template</option>
                                            @foreach ($templates as $template)
                                                <option value="{{ $template }}"
                                                    {{ old('template', $page->template ?? 'default') == $template ? 'selected' : '' }}
                                                    class="text-capitalize">
                                                    {{ $template }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div id="memberTypeWrapper" style="display: none;">
                                    <div class="form-group custom-form-group">
                                        <label>Member Type</label>
                                        @php
                                            $memberTypes = ['general', 'premium', 'vip', 'social'];
                                        @endphp

                                        <select name="member_type" class="form-control">
                                            @foreach ($memberTypes as $type)
                                                <option value="{{ $type }}"
                                                    {{ old('member_type', $page->member_type ?? 'general') == $type ? 'selected' : '' }}>
                                                    {{ ucfirst($type) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const template = document.getElementById('template');
                                        const memberTypeWrapper = document.getElementById('memberTypeWrapper');

                                        function toggleMemberType() {
                                            memberTypeWrapper.style.display =
                                                template.value === 'member' ? 'block' : 'none';
                                        }

                                        toggleMemberType(); // page load
                                        template.addEventListener('change', toggleMemberType);
                                    });
                                </script>



                            </div>
                            <div class="form-group custom-form-group">
                                <textarea placeholder="Page descriptions" name="description" id="editor">{{ $page->description }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4">
                <div class="sidebar-widgets">
                    <div class="custom-card" style="padding:0;background: none;box-shadow: none;">
                        <div class="custom-card-body">
                            <div class="form-group custom-form-group">
                                <label for="">Select Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Select one</option>
                                    <option {{ $page->status == 'published' ? 'selected' : '' }} value="published">
                                        Published
                                    </option>
                                    <option {{ $page->status == 'published' ? 'unpublished' : '' }}
                                        value="unpublished">
                                        Unpublished</option>
                                </select>
                            </div>

                            <x-admin.upload-image name='photo' title='Page Image' size='512 X 512px'
                                :img="'page/' . $page->photo" />
                            <button type="submit" class="btn theme-btn">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Update Page
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
