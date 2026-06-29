<x-app-layout title="Page List">
    <x-admin-table title="Page List" url="page.create" :columns="['Title', 'Published Date', 'Status', 'Actions']"
        :row-keys="['title', 'published_at', 'status', 'actions']" :data="$pages" :links="[
            'edit' => 'page.edit',
            'delete' => 'page.destroy',
        ]" />
</x-app-layout>
