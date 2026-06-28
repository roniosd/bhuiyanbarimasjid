<x-app-layout title="Add Committee">
    <div class="content-area">


        <form action="{{ route('committee.update', $committee->id) }}" method="POST" enctype="multipart/form-data"
            class="row ">
            @csrf
            @method('PUT')
            <div class="content-inner col-xxl-9 col-xl-8 col-lg-8">
                <div class="custom-card">
                    <div class="custom-card-header">
                        <div class="heading">

                            <h1>Edit committee</h1>
                        </div>
                        <div class="header-rigth">
                            <p>Fields marked with * must be filled</p>
                        </div>
                        <div class="seeAll">
                            <a href="{{ route('committee.index') }}">See All</a>
                        </div>
                    </div>

                    <div class="custom-card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group custom-form-group">
                                    <label>Session<sup>*</sup></label>
                                    <select required name="session_id" class="form-control">
                                        <option value="">Choose a Session</option>
                                        @foreach ($sessions as $ses)
                                            <option value="{{ $ses->id }}"
                                                {{ old('session_id', $committee->session_id) == $ses->id ? 'selected' : '' }}>
                                                {{ ucfirst($ses->session_name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group custom-form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                        value="{{ old('name', $committee->name) }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group custom-form-group">
                                    <label for="">Designation</label>
                                    <input type="text" name="designation" class="form-control"
                                        placeholder="Enter designation"
                                        value="{{ old('designation', $committee->designation) }}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group custom-form-group">
                                    <label for="">Mobile number</label>
                                    <input type="text" name="mobile_number" class="form-control"
                                        placeholder="Enter mobile number"
                                        value="{{ old('mobile_number', $committee->mobile_number) }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group custom-form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter email"
                                        value="{{ old('email', $committee->email) }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group custom-form-group">
                                    <label for="">Membership fee</label>
                                    <input type="text" name="membership_fee" class="form-control"
                                        placeholder="Enter membership fee"
                                        value="{{ old('membership_fee', $committee->membership_fee) }}">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4">
                <div class="sidebar-widgets">
                    <x-admin.upload-image name="photo" title="Committee Image" size="2020 X 650px"
                        :img="'committee/' . $committee->photo" />

                    <div class="form-group custom-form-group">
                        <label for="">Select Status <sup>*</sup></label>
                        <select name="status" id="" class="form-control">
                            <option value="published"
                                {{ old('status', $committee->status) == 'published' ? 'selected' : '' }}>
                                Published</option>
                            <option value="unpublished"
                                {{ old('status', $committee->status) == 'unpublished' ? 'selected' : '' }}>
                                Unpublished</option>
                        </select>
                    </div>
                    <button type="submit" class="btn theme-btn ms-2">
                        <i class="bi bi-plus-circle-dotted me-3"></i>
                        Update Committee
                    </button>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>
