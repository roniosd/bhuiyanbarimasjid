<x-app-layout title="Event List">
    <x-admin-table title="Event List" url="event.create" :columns="['Photo', 'Title', 'Description', 'Start Date', 'End Date', 'Status', 'Actions']"
        :row-keys="['photo', 'title', 'description', 'start_date', 'end_date', 'status', 'actions']" :data="$events" :links="[
            'edit' => 'event.edit',
            'delete' => 'event.destroy',
        ]" />
</x-app-layout>
