<x-app-layout title="Doner List">
    <x-admin-table :title="'Doner List: Total: ' . $donars->count()" :columns="['Name', 'Contact', 'Amount', 'Transaction Time', 'Timezone']"
        :row-keys="['donar', 'contact', 'amount', 'transaction_time', 'timezone']" :data="$donars" />
</x-app-layout>
