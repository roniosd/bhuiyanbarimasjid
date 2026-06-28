<x-app-layout title="Page List">
    <div class="content-area">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Page List</h1>
                            </div>

                            <div class="d-flex gap-4">
                                <a class="btn btn-success" href="{{ route('page.create') }}">+</a>
                            </div>
                        </div>

                        <div class="container mt-4">
                            <div class="table-responsive">
                                <table id="adminTable" class="table align-middle table-hover text-left table-striped">
                                    <thead class="">
                                        <tr>
                                            <th>Title</th>
                                            <th>Published Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pages as $page)
                                            <tr>
                                                <td>{{ $page->title }}</td>
                                                <td>{{ \Carbon\Carbon::parse($page->published_at)->format('d F Y') }}
                                                </td>
                                                <td class="text-capitalize text-success">{{ $page->status }}</td>
                                                <td class="d-flex justify-content-center gap-4">
                                                    <a title="Edit" class=""
                                                        href="{{ route('page.edit', $page->id) }}">
                                                        <svg width="20" height="22" viewBox="0 0 20 22"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2 0C0.897 0 0 0.897 0 2V18C0 19.103 0.897 20 2 20H8.07227L10.0723 18H2V2H9V7H14V14.0723L16 12.0723V6L10 0H2ZM8 9V12H11C11 10.343 9.641 9.031 8 9ZM7 10C5.343 10 4 11.343 4 13C4 14.657 5.343 16 7 16C8.657 16 9.969 14.641 10 13H7V10ZM18.207 13C18.0792 13 17.951 13.049 17.8535 13.1465L16.8535 14.1465L18.8535 16.1465L19.8535 15.1465C20.0485 14.9515 20.0485 14.6345 19.8535 14.4395L18.5605 13.1465C18.4625 13.049 18.3349 13 18.207 13ZM16.1465 14.8535L11 20V22H13L18.1465 16.8535L16.1465 14.8535Z"
                                                                fill="green" />
                                                        </svg>
                                                    </a>
                                                    <form title="Delete"
                                                        class="{{ Route::has('page.destroy') ? '' : 'd-none' }}"
                                                        action="{{ Route::has('page.destroy') ? route('page.destroy', $page->id) : '#' }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this page?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="delete-btn border-0">
                                                            <svg width="16" height="20" viewBox="0 0 16 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6 0L5 1H0V3H1V18C1 19.0931 1.90694 20 3 20H13C14.0931 20 15 19.0931 15 18V3H16V1H14H11L10 0H6ZM3 3H13V18H3V3ZM5.70703 6.29297L4.29297 7.70703L6.58594 10L4.29297 12.293L5.70703 13.707L8 11.4141L10.293 13.707L11.707 12.293L9.41406 10L11.707 7.70703L10.293 6.29297L8 8.58594L5.70703 6.29297Z"
                                                                    fill="red" />
                                                            </svg>
                                                        </button>
                                                    </form>
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
</x-app-layout>
