<x-form.add-form title="Add Donation Book" url="donationBook" button="Add DonationBook" class="col-span-4">
    <x-form.form-input label="Book number" name="book_number" placeholder="Enter Book No" />

    <x-form.form-select label="Collector" name="collector_id" :options="$collector->pluck('name', 'id')->prepend('Choose a collector', '')" required />

    <x-form.form-input label="Total Pages" name="total_pages" placeholder="Enter total pages" />

    <x-form.form-input label="Date" name="date" type="date" />

    <x-form.form-select label="Type" name="type" :options="[
        'open' => 'Open Book',
        'token20' => 'Token 20 Book',
        'token50' => 'Token 50 Book',
        'token100' => 'Token 100 Book',
    ]" />

    <x-form.form-textarea label="Note" name="note" rows="4">
        {{ old('note') }}
    </x-form.form-textarea>

    <x-slot name="listItems">
        <div class="container p-0">
            <div class="table-responsive">
                <table id="adminTable" class="table align-middle table-hover text-left table-striped">
                    <thead>
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
                                <td>{{ $book?->date }}</td>
                                <td>{{ $book?->collector?->name }}</td>
                                <td>{{ $book->total_pages }}</td>
                                <x-admin.action-button id="{{ $book->id }}" show="donationBook.show"
                                    edit="donationBook.edit" delete="donationBook.destroy" />
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-form.add-form>
