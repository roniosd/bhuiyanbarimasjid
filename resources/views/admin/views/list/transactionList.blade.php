<x-app-layout title="Transaction List">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <x-admin-table title="Transaction List(আয়)" url="transaction.create" :columns="['Date', 'Amount', 'Head', 'Actions']" :row-keys="['date', 'amount', 'head->head', 'actions']"
            :data="$transactions->where('type', 'dr')" :links="[
                'edit' => 'transaction.edit',
                'delete' => 'transaction.destroy',
            ]" />
        <x-admin-table title="Transaction List(ব্যয়)" url="transaction.create" :columns="['Date', 'Amount', 'Head', 'Actions']" :row-keys="['date', 'amount', 'head->head', 'actions']"
            :data="$transactions->where('type', 'cr')" :links="[
                'edit' => 'transaction.edit',
                'delete' => 'transaction.destroy',
            ]" />

    </div>

</x-app-layout>
