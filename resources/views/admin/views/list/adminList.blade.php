<x-app-layout title="Admin List">
    <x-admin-table title="Admin List" url="adminmanage.create" :columns="['Photo', 'Name', 'Email', 'Phone', 'Role', 'Actions']"
        :row-keys="['photo', 'full_name', 'email', 'phone', 'role.role_name', 'actions']" :data="$admins" :links="[
            'edit' => 'adminmanage.edit',
            'delete' => 'adminmanage.destroy',
        ]" />
</x-app-layout>
