<x-app-layout title="Edit Member">
    <div class="content-area">
        <form action="{{ route('member.update', $member->id) }}" method="POST" enctype="multipart/form-data"
            class="row theme-form">
            @csrf
            @method('PUT')

            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card">
                        <div class="custom-card-header">
                            <div class="heading">
                                <h1>Edit Member</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{ route('member.index') }}">See All</a>
                            </div>
                        </div>

                        <div class="custom-card-body">
                            <h5 class="mb-3">Personal Information</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Full Name <sup>*</sup></label>
                                        <input type="text" name="full_name" class="form-control" required
                                            value="{{ old('full_name', $member->full_name) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Date of Birth <sup>*</sup></label>
                                        <input type="date" name="dob" class="form-control" required
                                            value="{{ old('dob', $member->dob) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Father's Name <sup>*</sup></label>
                                        <input type="text" name="father" class="form-control" required
                                            value="{{ old('father', $member->father) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Mother's Name <sup>*</sup></label>
                                        <input type="text" name="mother" class="form-control" required
                                            value="{{ old('mother', $member->mother) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Mobile <sup>*</sup></label>
                                        <input type="text" name="mobile" class="form-control" required
                                            value="{{ old('mobile', $member->mobile) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $member->email) }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group custom-form-group">
                                        <label>Occupation</label>
                                        <input type="text" name="occupation" class="form-control"
                                            value="{{ old('occupation', $member->occupation) }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group custom-form-group">
                                        <label>Workspace</label>
                                        <input type="text" name="workspace" class="form-control"
                                            value="{{ old('workspace', $member->workspace) }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group custom-form-group">
                                        <label>Education</label>
                                        <input type="text" name="education" class="form-control"
                                            value="{{ old('education', $member->education) }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group custom-form-group">
                                        <label>Note</label>
                                        <textarea name="note" class="form-control" rows="3">{{ old('note', $member->note) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5 class="mb-3">Permanent Address</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Village <sup>*</sup></label>
                                        <input type="text" name="village" class="form-control" required
                                            value="{{ old('village', optional($member->permanentAddress)->village) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Post <sup>*</sup></label>
                                        <input type="text" name="post" class="form-control" required
                                            value="{{ old('post', optional($member->permanentAddress)->post) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Subdistrict <sup>*</sup></label>
                                        <input type="text" name="subdistrict" class="form-control" required
                                            value="{{ old('subdistrict', optional($member->permanentAddress)->subdistrict) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>District <sup>*</sup></label>
                                        <input type="text" name="district" class="form-control" required
                                            value="{{ old('district', optional($member->permanentAddress)->district) }}">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5 class="mb-3">Present Address</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Village</label>
                                        <input type="text" name="preVillage" class="form-control"
                                            value="{{ old('preVillage', optional($member->presentAddress)->village) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Post</label>
                                        <input type="text" name="prePost" class="form-control"
                                            value="{{ old('prePost', optional($member->presentAddress)->post) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>Subdistrict</label>
                                        <input type="text" name="preSubdistrict" class="form-control"
                                            value="{{ old('preSubdistrict', optional($member->presentAddress)->subdistrict) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label>District</label>
                                        <input type="text" name="preDistrict" class="form-control"
                                            value="{{ old('preDistrict', optional($member->presentAddress)->district) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-lg-4">
                <div class="sidebar-widgets">
                    <x-admin.upload-image name="photo" title="Member Photo" size="Maximum 2 MB"
                        :img="$member->photo ? 'member/' . $member->photo : 'default/category.png'" />

                    <div class="form-group custom-form-group">
                        <label>Member Type <sup>*</sup></label>
                        <select name="member_type" class="form-control" required>
                            @foreach (['general', 'premium', 'vip', 'social'] as $type)
                                <option value="{{ $type }}"
                                    {{ old('member_type', $member->member_type) === $type ? 'selected' : '' }}>
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group custom-form-group">
                        <label>Status <sup>*</sup></label>
                        <select name="status" class="form-control" required>
                            <option value="active" {{ old('status', $member->status) === 'active' ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="inactive"
                                {{ old('status', $member->status) === 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn theme-btn">
                        <i class="bi bi-pencil-square me-3"></i>
                        Update Member
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
