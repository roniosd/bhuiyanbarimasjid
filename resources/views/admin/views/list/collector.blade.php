<x-app-layout title="Collector List">
    <x-admin-table title="Collector List" url="collector.create" :columns="['Photo', 'Name', 'Mobile', 'NID', 'Appointed By', 'Actions']" :row-keys="['photo', 'name', 'mobile_number', 'nid', 'appointed_by', 'actions']" :data="$collectors"
        :links="[
            'edit' => 'collector.edit',
            'delete' => 'collector.destroy',
        ]" limit="100" />
</x-app-layout>
