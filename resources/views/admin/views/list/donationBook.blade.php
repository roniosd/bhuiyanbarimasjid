<x-app-layout title="Donation Book List">
    <x-admin-table title="Donation Book List" url="donationBook.create" :columns="['Book No', 'Date', 'Collector', 'Pages', 'Actions']"
        :row-keys="['book_number', 'date', 'collector.name', 'total_pages', 'actions']" :data="$donationBook" :links="[
            'show' => 'donationBook.show',
            'edit' => 'donationBook.edit',
            'delete' => 'donationBook.destroy',
        ]" />
</x-app-layout>
