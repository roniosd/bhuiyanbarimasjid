<x-app-layout title="Activities List">
    <x-admin-table title="Activities List" url="allactivity.create" :columns="['Photo', 'Title', 'Description', 'Status', 'Actions']"
        :row-keys="['photo', 'title', 'description', 'status', 'actions']" :data="$activitys" :links="[
            'edit' => 'allactivity.edit',
            'delete' => 'allactivity.destroy',
        ]" />
</x-app-layout>
