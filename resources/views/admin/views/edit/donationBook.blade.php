<x-form.add-form title="Update Donation Book" url="donationBook" button="Update DonationBook" :id="$donationBook->id">
    <x-form.form-input label="Book number" name="book_number" :value="$donationBook->book_number"
        placeholder="Enter Book No" />

    <x-form.form-select label="Collector" name="collector_id" :value="$donationBook->collector_id" :options="$collector->pluck('name', 'id')->prepend('Choose a collector', '')" required />

    <x-form.form-input label="Total Pages" name="total_pages" :value="$donationBook->total_pages"
        placeholder="Enter total pages" />

    <x-form.form-input label="Date" name="date" type="date" :value="$donationBook->date" />

    <x-form.form-select label="Type" name="type" :value="$donationBook->type" :options="[
        'open' => 'Open Book',
        'token20' => 'Token 20 Book',
        'token50' => 'Token 50 Book',
        'token100' => 'Token 100 Book',
    ]" />

    <x-form.form-textarea label="Note" name="note" rows="4">
        {{ $donationBook->note }}
    </x-form.form-textarea>
</x-form.add-form>
