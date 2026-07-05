<x-app-layout title="Donation Book List">


    <x-admin-table title="Donation Book List" url="donationBook.create" :columns="['Book No', 'Date', 'Collector', 'Pages', 'Actions']" :row-keys="['book_number', 'date', 'collector.name', 'total_pages', 'actions']"
        :data="$donationBook" :links="[
            'show' => 'donationBook.show',
            'edit' => 'donationBook.edit',
            'delete' => 'donationBook.destroy',
        ]">
        <x-slot name="filter">
            <form method="GET" action="{{ route('donationBook.index') }}" class="mb-4 flex items-center gap-3">
                <select name="type" class="rounded-md border-gray-300 text-sm" onchange="this.form.submit()">
                    <option value="">All Books</option>
                    <option value="open" @selected(request('type') === 'open')>Open Book</option>
                    <option value="token" @selected(request('type') === 'token')>Token Book</option>
                </select>
            </form>
        </x-slot>
    </x-admin-table>
</x-app-layout>
