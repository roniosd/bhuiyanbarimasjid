<x-app-layout title="Site Setting">
    <div class="content-area">
        <form action="update" method="POST" enctype="multipart/form-data" class="row theme-form">
            @csrf
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M20.1456 22.6459C19.3223 20.335 21.2 17.9807 23.6264 18.2696L23.8575 18.3129C24.2475 18.3707 24.6374 18.154 24.7674 17.7785C25.1574 16.7241 25.4029 15.5976 25.4896 14.4277C25.5185 14.0377 25.2585 13.6911 24.8974 13.5611L24.7097 13.5033C22.3987 12.7089 21.7344 9.77695 23.4675 8.0582L23.5542 7.97154C23.8431 7.69712 23.9008 7.24938 23.6986 6.91719C23.092 5.9206 22.3554 5.02512 21.5177 4.24519C21.2288 3.97077 20.81 3.95632 20.4778 4.15853L20.42 4.20186C18.3546 5.51619 15.6393 4.20186 15.3793 1.77539V1.76095C15.336 1.37098 15.0471 1.05323 14.6572 0.995459C14.1083 0.923243 13.5595 0.879913 12.9817 0.879913C12.3607 0.879913 11.7685 0.923243 11.1763 0.995459C10.8008 1.05323 10.512 1.37098 10.4686 1.76095C10.2086 4.18742 7.47887 5.50175 5.42793 4.18742C5.09574 3.98521 4.66244 4.0141 4.38802 4.27407C3.55031 5.06845 2.8137 5.97838 2.20709 6.9894C2.00488 7.3216 2.0771 7.7549 2.35152 8.02932L2.36596 8.04376C4.09915 9.74806 3.43476 12.6945 1.12384 13.4889L1.05163 13.5177C0.676104 13.6477 0.430569 13.9944 0.459455 14.3843C0.546115 15.5542 0.79165 16.6808 1.18162 17.7496C1.31161 18.1107 1.70157 18.3273 2.0771 18.284L2.20709 18.2696C4.63355 17.9807 6.51117 20.3494 5.68791 22.6459L5.61569 22.8336C5.4857 23.1947 5.61569 23.6136 5.93344 23.8302C6.87225 24.4657 7.89772 24.9857 8.99541 25.3468C9.37094 25.4623 9.78979 25.3034 9.99199 24.9712L10.122 24.769C11.4074 22.6892 14.4261 22.6892 15.7115 24.769L15.856 25.0001C16.0582 25.3323 16.4626 25.4912 16.8381 25.3756C17.9358 25.0146 18.9757 24.5091 19.9145 23.888C20.2323 23.6713 20.3622 23.2525 20.2323 22.8914L20.1456 22.6459ZM18.1578 13.229C18.1578 16.0717 15.8533 18.3762 13.0106 18.3762C10.1679 18.3762 7.8634 16.0717 7.8634 13.229C7.8634 10.3863 10.1679 8.0818 13.0106 8.0818C15.8533 8.0818 18.1578 10.3863 18.1578 13.229Z"
                                        fill="#FFCC04" />
                                </svg>
                                <h1>Site Settings</h1>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Site Name <sup>*</sup></label>
                                        <input type="text" name="title" value="{{ $setting->title }}"
                                            class="form-control" placeholder="Islami Nobo Jagoron">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Tagline <sup>*</sup></label>
                                        <input type="text" name="tagline" value="{{ $setting->tagline }}"
                                            class="form-control" placeholder="Enter your tagline">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Telephone </label>
                                        <input type="text" name="tnt" value="{{ $setting->tnt }}"
                                            class="form-control" placeholder="Enter your telephone Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Mobile Number </label>
                                        <input type="text" name="phone" value="{{ $setting->phone }}"
                                            class="form-control" placeholder="Enter your mobile Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Slider</label>
                                        <input type="text" name="slider" value="{{ $setting->slider }}"
                                            class="form-control" placeholder="Homepage Slider">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Email Address</label>
                                        <input type="text" name="email" value="{{ $setting->email }}"
                                            class="form-control" placeholder="islaminobojagoron@gmail.com">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Address</label>
                                        <input type="text" name="address" value="{{ $setting->address }}"
                                            class="form-control" placeholder="Enter your Address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Site Description</label>
                                        <textarea name="description" style="line-height: 40px;resize: none" placeholder="Enter your site description"
                                            rows="5" class="form-control">{{ $setting->description }}</textarea>
                                        @error('description')
                                            <div class="alert-danger text-center">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Copyright</label>
                                        <input type="text" name="copyright" value="{{ $setting->copyright }}"
                                            class="form-control" placeholder="Jagoron © 2025 All Right Reserved">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Terms</label>
                                        <input type="text" name="terms" value="{{ $setting->terms }}"
                                            class="form-control" placeholder="www.jagoron.org/terms.html">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn theme-btn">
                        <i class="bi bi-plus-circle-dotted me-3"></i>
                        Update Settings
                    </button>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4">
                <div class="sidebar-widgets">
                    <div class="">
                        <div class="form-group custom-form-group">
                            <label for="">Header</label>
                            <select name="header" id="" class="form-control">
                                <option {{ $setting->header === 'single' ? 'selected' : '' }} value="single">
                                    Single
                                    Header</option>
                                <option {{ $setting->header === 'double' ? 'selected' : '' }} value="double">
                                    Double
                                    Header</option>

                            </select>
                        </div>
                    </div>
                    <div class="sidebar-widgets-inner">
                        <x-admin.upload-image name='favicon' title='Site Favicon' size='150 X 150px'
                            :img="'logos/' . $setting->favicon" />
                        <x-admin.upload-image name='logo' title='Site Logo' size='1000 X 500px'
                            :img="'logos/' . $setting->logo" />

                        <x-admin.upload-image name='mlogo' title='Mardasha Logo' size='1000 X 500px'
                            :img="'logos/' . $setting->mlogo" />

                        <x-admin.upload-image name='flogo' title='Footer Logo' size='1000 X 500px'
                            :img="'logos/' . $setting->flogo" />


                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
