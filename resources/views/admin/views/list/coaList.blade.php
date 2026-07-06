<x-app-layout title="COA List">
    <x-admin-table title="COA List" url="coa.create" :columns="['Type', 'Head', 'Is Child', 'Parent Head', 'Status', 'Actions']" :row-keys="['type', 'head', 'is_child', 'parent->head', 'status', 'actions']" :data="$coas"
        :links="[
            'edit' => 'coa.edit',
            'delete' => 'coa.destroy',
        ]" />


</x-app-layout>
