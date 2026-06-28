<x-app-layout title="Add Session Year">
    <div class="content-area">

        <form action="{{ route('session.update', $session->id) }}" method="POST" enctype="multipart/form-data"
            class="row theme-form">
            @csrf
            @method('PUT')
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Update session</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{ route('session.index') }}">See All</a>
                            </div>
                        </div>

                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group custom-form-group">
                                        <label for="">Session Name</label>
                                        <input type="text" name="session_name" class="form-control"
                                            placeholder="Enter Session Name"
                                            value="{{ old('session_name', $session->session_name) }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group custom-form-group">
                                        <label for="">Session Name</label>
                                        <input type="text" name="duration" class="form-control"
                                            placeholder="Enter duration"
                                            value="{{ old('duration', $session->duration) }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group custom-form-group">
                                        <label for="">Select Status <sup>*</sup></label>
                                        <select name="status" id="" class="form-control">
                                            <option value="published"
                                                {{ old('status', $session->status) == 'published' ? 'selected' : '' }}>
                                                Published</option>
                                            <option value="unpublished"
                                                {{ old('status', $session->status) == 'unpublished' ? 'selected' : '' }}>
                                                Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=""> <button type="submit" class="btn theme-btn ms-2">
                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.42754 19.0284C14.5865 19.0284 18.7686 14.8462 18.7686 9.68724C18.7686 4.52829 14.5865 0.34613 9.42754 0.34613C4.26858 0.34613 0.0864258 4.52829 0.0864258 9.68724C0.0864258 14.8462 4.26858 19.0284 9.42754 19.0284ZM8.64483 12.812L13.8724 7.58449L12.74 6.45217L8.07868 11.1135L5.99029 9.02507L4.85796 10.1574L7.51251 12.812L8.07867 13.3782L8.64483 12.812Z"
                                                fill="white" />
                                        </svg>
                                        Update Session
                                    </button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

</x-app-layout>
