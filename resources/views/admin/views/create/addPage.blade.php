<x-app-layout title="Add Page">
    <div class="content-area">
        <form action="{{ route('page.store') }}" method="POST" enctype="multipart/form-data" class="row theme-form">
            @csrf
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">

                                <h1>Add Page</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Page Title</label>
                                        <input id="Title" type="text" name="title" class="form-control"
                                            placeholder=" Enter post title">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Slug</label>
                                        <input type="text" name="slug" id="unique_url" class="form-control"
                                            placeholder="Enter slug">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group custom-form-group">
                                <textarea placeholder="Page descriptions" name="description" id="editor"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group custom-form-group">
                                    <label for="">Enter Excerpt</label>
                                    <textarea rows="3" name="excerpt" class="form-control lh-lg" placeholder="Enter excerpt"></textarea>
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
                            <div>
                                <div class="form-group custom-form-group">
                                    <label for="">Enter Widget</label>
                                    <input type="text" name="widget" class="form-control"
                                        placeholder="Enter attachment">
                                </div>
                            </div>

                            <div>
                                <div class="form-group custom-form-group">
                                    <label>Enter your Template</label>
                                    <select name="template" id="template" class="form-control">
                                        <option value="">Choose Template</option>
                                        @foreach ($templates as $template)
                                            <option value="{{ $template }}"
                                                {{ old('template', 'default') == $template ? 'selected' : '' }}
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
                                    <select name="member_type" class="form-control">
                                        <option value="general">General</option>
                                        <option value="premium">Premium</option>
                                        <option value="vip">VIP</option>
                                        <option value="social">Social</option>
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

                                    toggleMemberType();
                                    template.addEventListener('change', toggleMemberType);
                                });
                            </script>

                            <div class="form-group custom-form-group">
                                <label for="">Select Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Select one</option>
                                    <option value="published">Published</option>
                                    <option value="unpublished">Unpublished</option>
                                </select>
                            </div>


                            <x-admin.upload-image name='photo' title='Add Page Image' size='1320 X 535px' />
                            <button type="submit" class="btn theme-btn">
                                Add Page
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
