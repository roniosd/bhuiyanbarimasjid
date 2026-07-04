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

</x-form.add-form>
