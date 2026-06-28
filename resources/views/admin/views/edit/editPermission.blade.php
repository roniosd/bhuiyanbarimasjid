<x-app-layout title="Update Parmition">
    <div class="content-area pb-0">

        <form action="{{ route('permission.update', $permission->id) }}" method="POST" enctype="multipart/form-data"
            class="row theme-form">
            @csrf
            @method('PUT')
            <div>
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">
                                <h1>Update Parmition</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{ route('permission.create') }}">See All</a>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Role Name</label>
                                        <input type="text" value="{{ $permission->role_name }}" name="role_name"
                                            class="form-control" placeholder="Enter Title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Select Permission</label>
                                        <select name="methods[]" class="form-control multi-select" id="multiselect"
                                            multiple="multiple">
                                            @foreach ($modules as $module)
                                                <option
                                                    {{ in_array($module, json_decode($permission->methods, true)) ? 'selected' : '' }}
                                                    value="{{ $module }}">
                                                    {{ str_replace(['.', 'index', 'destroy'], [' ', 'list', 'delete'], $module) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <label class="form-label select-label">Example label</label>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Status<sup>*</sup></label>
                                        <select name="status" class="form-control">
                                            <option value="">Choose one</option>
                                            <option {{ $permission->status == 'published' ? 'selected' : '' }}
                                                value="published">Published</option>
                                            <option {{ $permission->status == 'unpublished' ? 'selected' : '' }}
                                                value="unpublished">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn theme-btn">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Update Permission
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>


<script>
    $(document).ready(function() {
        $("#multiselect").multiselect();

    });
</script>
