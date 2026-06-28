<x-app-layout title="Update Donation Book">
    <div class="content-area row  ">


        <form action="{{ route('donationBook.update', $donationBook->id) }}" method="POST" enctype="multipart/form-data"
            class=" col-xxl-6 col-xl-6 col-lg-6">
            @csrf
            @method('PUT')
            <div class="content-inner">
                <div class="custom-card">
                    <div class="custom-card-header">
                        <div class="heading">

                            <h1>Update Donation Book</h1>
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
                                    <label for="">Book number : </label>
                                    <input type="text" name="book_number" class="form-control"
                                        value="{{ old('book_number', $donationBook->book_number) }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group custom-form-group">
                                    <label for="">Collector</label>
                                    <select required name="collector_id" class="form-control">
                                        <option value="">Choose a collector</option>
                                        @foreach ($collector as $col)
                                            <option value="{{ $col->id }}"
                                                {{ old('collector_id', $donationBook->collector_id) == $col->id ? 'selected' : '' }}>
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
                                        placeholder="Enter total pages"
                                        value="{{ old('total_pages', $donationBook->total_pages) }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group custom-form-group">
                                    <label for="">Date</label>
                                    <input type="date" name="date" class="form-control"
                                        value="{{ old('date', $donationBook->date) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group custom-form-group">
                                    <label> Type</label>
                                    <select name="type" class="form-control">
                                        @foreach (['open', 'token20', 'token50', 'token100'] as $type)
                                            <option value="{{ $type }}"
                                                {{ old('type', $donationBook->type) == $type ? 'selected' : '' }}>
                                               {{ ucfirst(str_replace('token', 'Token ', $type)) }} Book
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group custom-form-group">
                                <label for="">Note</label>
                                <textarea rows="4" class="form-control" name="note" id="">{{ $donationBook->note }}</textarea>
                            </div>

                            <div class=""> <button type="submit" class="btn theme-btn ms-2">
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.42754 19.0284C14.5865 19.0284 18.7686 14.8462 18.7686 9.68724C18.7686 4.52829 14.5865 0.34613 9.42754 0.34613C4.26858 0.34613 0.0864258 4.52829 0.0864258 9.68724C0.0864258 14.8462 4.26858 19.0284 9.42754 19.0284ZM8.64483 12.812L13.8724 7.58449L12.74 6.45217L8.07868 11.1135L5.99029 9.02507L4.85796 10.1574L7.51251 12.812L8.07867 13.3782L8.64483 12.812Z"
                                            fill="white" />
                                    </svg>
                                    Update Donation Book
                                </button></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>
