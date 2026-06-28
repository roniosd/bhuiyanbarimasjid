<div class="overflow-x-auto">
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    <table id="adminTable3" data-datatable class="min-w-full table-auto text-sm text-gray-700 text-left">
        <thead class="bg-gray-50 text-xs uppercase text-gray-500">
            <tr>
                <th class="py-3 px-4">Proof</th>
                <th class="py-3 px-4">RID</th>
                <th class="py-3 px-4">Description</th>
                <th class="py-3 px-4">Amount</th>
                <th class="py-3 px-4">Method</th>
                <th class="py-3 px-4">Show</th>
                <th class="py-3 px-4">Delete</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($payments as $payment)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-4">
                        <div x-data="{ open: false }">
                            <button @click="open = true" type="button">
                                <img src="{{ $payment->image ?? asset('public/storage/default/default.jpg') }}" alt="Proof"
                                    class="w-12 h-12 object-cover rounded  hover:scale-105 transition duration-200">
                            </button>

                            <!-- Image Modal -->
                            <div x-show="open" x-transition.opacity
                                class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center text-left"
                                style="display: none;">
                                <div @click.away="open = false"
                                    class="bg-white p-6 rounded-2xl w-full max-w-xl shadow-xl relative mx-4 sm:mx-6">
                                    <button @click="open = false"
                                        class="absolute top-3 right-4 text-gray-500 hover:text-red-500 text-7xl font-bold">
                                        X
                                    </button>
                                    <div class="h-50">
                                        <img src="{{ $payment->image ?? asset('public/storage/default/default.jpg') }}"
                                            alt="Proof Image" class="w-full h-auto object-cover rounded shadow-md border" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="py-3 px-4">{{ $payment->rid }}</td>
                    <td class="py-3 px-4 w-40">{{ $payment->description }}</td>
                    <td class="py-3 px-4">{{ number_format($payment->amount, 2) }}</td>
                    <td class="py-3 px-4 uppercase">{{ $payment->method }}</td>

                    <td class="py-3 px-4">
                        <div x-data="{ open: false }">
                            <button @click="open = true" type="button"
                                class="bg-white py-2 px-3 rounded hover:bg-blue-100 text-green-400">
                                <i class="bi bi-eye text-lg"></i>
                            </button>

                            <!-- Details Modal -->
                            <div x-show="open" x-transition.opacity
                                class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center text-left"
                                style="display: none;">
                                <div @click.away="open = false"
                                    class="bg-white p-6 rounded-2xl w-full max-w-2xl shadow-xl relative mx-4 sm:mx-6 overflow-auto max-h-[90vh] scrollbar-hide">

                                    <button @click="open = false"
                                        class="absolute top-3 right-4 text-gray-500 hover:text-red-500 text-3xl font-bold">
                                        X
                                    </button>

                                    <h3 class="text-3xl font-semibold mb-4 border-b pb-2">Transaction Details</h3>

                                    <div class="space-y-3 text-lg text-gray-700">
                                        <div class="h-50">
                                            <img src="{{ $payment->image ?? asset('public/storage/default/default.jpg') }}"
                                                alt="Proof Image"
                                                class="w-full h-auto object-cover rounded-md border mb-4" />
                                        </div>

                                        <p><strong>Registration No:</strong> {{ $payment->rid }}</p>
                                        <p><strong>Purpose:</strong> {{ $payment->purpose ?? '-' }}</p>
                                        <p><strong>Amount:</strong> {{ number_format($payment->amount, 2) }}</p>
                                        <p><strong>Method:</strong> {{ strtoupper($payment->method) }}</p>
                                        <p>
                                            <strong>Status:</strong>
                                            <span
                                                class="{{ $payment->status === 'approved' ? 'text-green-600' : 'text-red-600' }}">
                                                {{ ucfirst($payment->status ?? 'Pending') }}
                                            </span>
                                        </p>
                                        <p x-data="{ expanded: false }" class="whitespace-pre-line">
                                            <strong>Description:</strong>
                                            <span x-show="!expanded">{{ Str::limit($payment->description, 100) }}</span>
                                            <span x-show="expanded">{{ $payment->description }}</span>
                                            @if (strlen($payment->description) > 100)
                                                <button @click="expanded = !expanded"
                                                    class="text-blue-600 ml-1 text-sm font-medium cursor-pointer">
                                                    <span x-show="!expanded">See more</span>
                                                    <span x-show="expanded">See less</span>
                                                </button>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    <x-action-button id="{{ $payment->id }}" delete="payment.destroy" />
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="py-6 text-gray-500 text-center">
                        No payment records found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>