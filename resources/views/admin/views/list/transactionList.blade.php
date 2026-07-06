<x-app-layout title="Transaction List">
    <div class="bg-white shadow-md border border-slate-300 rounded-xl">
        <x-list-header title="Transaction List" url="transaction.create" />

        <div class="overflow-x-scroll mt-7 relative">
            <table id="adminTable" data-datatable
                class="min-w-full table-auto text-sm text-gray-800 text-left border-collapse overflow-x-scroll">
                <thead style="background-color: #216659;" class="text-xs uppercase text-white">
                    <tr>
                        <th class="py-1 px-4">Date</th>
                        <th class="py-1 px-4">Description</th>
                        <th class="py-1 px-4">Dr. (আয়)</th>
                        <th class="py-1 px-4">Cr. (ব্যায়)</th>
                        <th class="py-1 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($transactions as $transaction)
                        <tr class="odd:bg-gray-50 hover:bg-[#f1f8f6] transition">
                            <td class="py-1 px-4">{{ $transaction->date }}</td>
                            <td class="py-1 px-4">
                                <div class="font-medium">{{ $transaction->head->head ?? '-' }}</div>
                                <div class="text-xs text-gray-500">{{ $transaction->description ?? '-' }}</div>
                            </td>
                            <td class="py-1 px-4 text-green-700 font-medium">
                                {{ $transaction->type === 'dr' ? number_format($transaction->amount, 2) : '-' }}
                            </td>
                            <td class="py-1 px-4 text-red-700 font-medium">
                                {{ $transaction->type === 'cr' ? number_format($transaction->amount, 2) : '-' }}
                            </td>
                            <td class="py-1 px-4">
                                <x-button.action-button id="{{ $transaction->id }}" edit="transaction.edit"
                                    delete="transaction.destroy" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-gray-500 text-center">No data found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $transactions->onEachSide(1)->links('pagination') }}
</x-app-layout>
