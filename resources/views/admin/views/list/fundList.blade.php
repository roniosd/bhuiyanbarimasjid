<x-app-layout title="Fund List">
    <x-admin-table title="Fund List" url="fund.create" :columns="['Photo', 'Title', 'Unit', 'Status', 'Actions']"
        :row-keys="['featured_photo', 'title', 'donation_unit', 'status', 'actions']" :data="$funds" :links="[
            'edit' => 'fund.edit',
            'delete' => 'fund.destroy',
        ]" />

    {{ $funds->onEachSide(1)->links('pagination') }}
</x-app-layout>
