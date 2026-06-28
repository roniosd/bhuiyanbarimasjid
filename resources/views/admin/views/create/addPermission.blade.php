<x-app-layout title="Add Parmition">
    <div class="content-area pb-0">
        <form action="{{ route('permission.store') }}" method="POST" enctype="multipart/form-data" class="row theme-form">
            @csrf
            <div>
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">
                                <h1>Add Permission</h1>
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
                                        <input type="text" name="role_name" class="form-control"
                                            placeholder="Enter Title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Select Permission</label>
                                        <select name="methods[]" class="form-control" id="multiselect"
                                            multiple="multiple">
                                            @foreach ($modules as $module)
                                                <option class="text-capitalize" value="{{ $module }}">
                                                    {{ str_replace(['.', 'index', 'destroy'], [' ', 'list', 'delete'], $module) }}

                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Status<sup>*</sup></label>
                                        <select name="status" class="form-control">
                                            <option value="">Choose one</option>
                                            <option value="published">Published</option>
                                            <option value="unpublished">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn theme-btn">
                                <i class="bi bi-plus-circle-dotted me-3"></i>
                                Add Permission
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="container">
            <div class="card border-0">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Role Name</th>
                                    <th>Method</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td class="px-4 py-2">{{ $permission->role_name }}</td>
                                        <td class="px-4 py-2 text-justify">
                                            @foreach (explode(',', $permission->methods) as $index => $method)
                                                <span class="text-black">{{ $index + 1 }}.</span>
                                                {{ ucwords(str_replace(['.', '_', '"', '[', ']'], ' ', $method)) }},
                                            @endforeach
                                        </td>
                                        <x-admin.action-button id="{{ $permission->id }}" edit="permission.edit"
                                            delete="permission.destroy" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        $("#multiselect").multiselect();
    });
</script>
