<x-app-layout title="Committee List">
    <div class="content-area">
        <div class="row">
            <div class="">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Committee List</h1>
                            </div>

                            <div class="d-flex gap-4">
                                <a class="btn btn-success" href="{{ route('committee.create') }}">+</a>
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
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Membership_fee</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($committees as $committee)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('/public/storage/' . ($committee->photo ? 'committee/' . $committee->photo : 'default/profile.png')) }}"
                                                            alt="Profile" width="50" height="50">
                                                    </td>
                                                    <td>{{ $committee->name }}</td>
                                                    <td>{{ $committee->designation }}</td>
                                                    <td>{{ $committee->email }}</td>
                                                    <td>{{ $committee->mobile_number }}
                                                    </td>
                                                    <td>{{ $committee->membership_fee }}</td>
                                                    <td class="text-success fw-bold text-capitalize">
                                                        {{ $committee->status }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-4">
                                                            <a title="Edit"
                                                                href="{{ route('committee.edit', $committee->id) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                                </svg>
                                                            </a>
                                                            <form title="Delete"
                                                                action="{{ route('committee.destroy', $committee->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this committee?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="delete-btn border-0" type="submit">
                                                                    <svg width="16" height="20"
                                                                        viewBox="0 0 16 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M6 0L5 1H0V3H1V18C1 19.0931 1.90694 20 3 20H13C14.0931 20 15 19.0931 15 18V3H16V1H14H11L10 0H6ZM3 3H13V18H3V3ZM5.70703 6.29297L4.29297 7.70703L6.58594 10L4.29297 12.293L5.70703 13.707L8 11.4141L10.293 13.707L11.707 12.293L9.41406 10L11.707 7.70703L10.293 6.29297L8 8.58594L5.70703 6.29297Z"
                                                                            fill="red" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
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
