<x-app-layout title="Subscribers List">
    <x-admin-table :title="'Subscribers List: Total(' . $subscribers->count() . ')'" :columns="['#', 'Name', 'Email']"
        :row-keys="['id', 'name', 'email']" :data="$subscribers" />
</x-app-layout>
