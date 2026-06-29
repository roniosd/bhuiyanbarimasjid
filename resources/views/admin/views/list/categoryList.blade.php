<x-app-layout title="Category List">
    <x-admin-table title="Category List" url="category.create" :columns="['Photo', 'Name', 'Slug', 'Type', 'Description', 'Count', 'Status', 'Actions']"
        :row-keys="['photo', 'name', 'slug', 'type', 'description', 'count', 'status', 'actions']" :data="$categoris" :links="[
            'edit' => 'category.edit',
            'delete' => 'category.destroy',
        ]" />
</x-app-layout>
