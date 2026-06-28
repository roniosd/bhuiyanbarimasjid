<x-app-layout title="Add Donation Book">
    <div class="content-area">

        <div class="row">
            <form action="{{ route('donationBook.store') }}" method="POST" enctype="multipart/form-data"
                class=" col-xxl-6 col-xl-6 col-lg-6">
                @csrf
                <div class="content-inner">
                    <div class="custom-card">
                        <div class="custom-card-header">
                            <div class="heading">

                                <h1>Add Donation Book</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{ route('donationBook.create') }}">See All</a>
                            </div>
                        </div>

                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-4">

                                    <div class="form-group custom-form-group">
                                        <label for="">Book number</label>
                                        <input type="text" name="book_number" class="form-control"
                                            placeholder="Enter Book No" value="{{ old('book_number') }}">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group custom-form-group">
                                        <label for="">Collector</label>
                                        <select required name="collector_id" class="form-control">
                                            <option value="">Choose a collector</option>
                                            @foreach ($collector as $col)
                                                <option value="{{ $col->id }}"
                                                    {{ old('collector') == $col->id ? 'selected' : '' }}>
                                                    {{ ucfirst($col->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group custom-form-group">
                                        <label for="">Total Pages</label>
                                        <input type="text" name="total_pages" class="form-control"
                                            placeholder="Enter total pages" value="{{ old('total_pages') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group custom-form-group">
                                        <label for="">Date</label>
                                        <input type="date" name="date" class="form-control"
                                            value="{{ old('date') }}">
                                    </div>
                                </div>
                                <div class="form-group custom-form-group">
                                    <label for="">Note</label>
                                    <textarea rows="4" class="form-control" name="note" id=""></textarea>
                                </div>

                                <div class=""> <button type="submit" class="btn theme-btn ms-2">
                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.42754 19.0284C14.5865 19.0284 18.7686 14.8462 18.7686 9.68724C18.7686 4.52829 14.5865 0.34613 9.42754 0.34613C4.26858 0.34613 0.0864258 4.52829 0.0864258 9.68724C0.0864258 14.8462 4.26858 19.0284 9.42754 19.0284ZM8.64483 12.812L13.8724 7.58449L12.74 6.45217L8.07868 11.1135L5.99029 9.02507L4.85796 10.1574L7.51251 12.812L8.07867 13.3782L8.64483 12.812Z"
                                                fill="white" />
                                        </svg>
                                        Add DonationBook
                                    </button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="sidebar-widgets mt-4 p-1">
                    <div class="container p-0">
                        <div class="table-responsive">
                            <table id="adminTable" class="table align-middle table-hover text-left table-striped">
                                <thead class="">
                                    <tr>
                                        <th>Book No</th>
                                        <th>Date</th>
                                        <th>Collector</th>
                                        <th>Pages</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donationBook as $book)
                                        <tr>
                                            <td>{{ $book->book_number }}</td>
                                            <td>{{ $book->date }}</td>
                                            <td>{{ $book?->collector?->name ?? "" }}</td>
                                            <td>{{ $book->total_pages }}</td>
                                            <td>
                                                <div class="d-flex   gap-4">
                                                    <a title="Edit"
                                                        href="{{ route('donationBook.show', $book->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-plus-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                        </svg>
                                                    </a>
                                                    <a title="Edit"
                                                        href="{{ route('donationBook.edit', $book->id) }}">
                                                        <svg width="20" height="22" viewBox="0 0 20 22"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2 0C0.897 0 0 0.897 0 2V18C0 19.103 0.897 20 2 20H8.07227L10.0723 18H2V2H9V7H14V14.0723L16 12.0723V6L10 0H2ZM8 9V12H11C11 10.343 9.641 9.031 8 9ZM7 10C5.343 10 4 11.343 4 13C4 14.657 5.343 16 7 16C8.657 16 9.969 14.641 10 13H7V10ZM18.207 13C18.0792 13 17.951 13.049 17.8535 13.1465L16.8535 14.1465L18.8535 16.1465L19.8535 15.1465C20.0485 14.9515 20.0485 14.6345 19.8535 14.4395L18.5605 13.1465C18.4625 13.049 18.3349 13 18.207 13ZM16.1465 14.8535L11 20V22H13L18.1465 16.8535L16.1465 14.8535Z"
                                                                fill="green" />
                                                        </svg>
                                                    </a>
                                                    <form title="Delete"
                                                        action="{{ route('donationBook.destroy', $book->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this donation book?');">
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
</x-app-layout>
