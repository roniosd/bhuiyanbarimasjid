<x-app-layout title="Committee Member List">
    <x-admin-table title="Committee Member List" url="committee.create" :columns="['Photo', 'Name', 'Designation', 'Email', 'Mobile', 'Membership Fee', 'Status', 'Actions']" :row-keys="['photo', 'name', 'designation', 'email', 'mobile_number', 'membership_fee', 'status', 'actions']"
        :data="$committees" :links="[
            'edit' => 'committee.edit',
            'delete' => 'committee.destroy',
        ]" />
</x-app-layout>
