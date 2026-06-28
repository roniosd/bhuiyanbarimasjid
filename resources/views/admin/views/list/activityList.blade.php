<x-app-layout title="Activities List">
    <div class="content-area">
        <div class="row">
            <div class="">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Activities List</h1>
                            </div>

                            <div class="d-flex gap-4">
                                <a class="btn btn-success" href="{{ route('allactivity.create') }}">+</a>
                            </div>
                        </div>
                        <div class=" mt-4">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table id="adminTable"
                                        class="table align-middle table-hover text-left table-striped">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activitys as $actitvity)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('/public/storage/' . ($actitvity->photo ? 'activity/' . $actitvity->photo : 'default/profile.png')) }}"
                                                            alt="Profile" width="50" height="50">
                                                    </td>
                                                    <td>{{ $actitvity->title }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($actitvity->description, 50) }}
                                                    </td>
                                                    <td class="text-success fw-bold text-capitalize">
                                                        {{ $actitvity->status }}
                                                    </td>
                                                    <x-admin.action-button id='{{ $actitvity->id }}'
                                                        edit="allactivity.edit" delete="allactivity.destroy" />
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
