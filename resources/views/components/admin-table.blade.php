@props([
    'title',
    'url' => null,
    'columns',
    'data',
    'rowKeys',
    'links' => [],
    'limit' => 100,
    'isDatatable' => true,
    'showHeader' => true,
])

<div class="bg-white shadow-md border border-slate-300 rounded-xl">
    @if ($showHeader)
        <x-list-header :title="$title" :url="$url" />
    @endif

    {{-- Table --}}
    <div class="overflow-x-scroll mt-7 relative">
        <table id={{ $isDatatable ? 'adminTable' : '' }} data-datatable
            class="min-w-full table-auto text-sm text-gray-800 text-left border-collapse overflow-x-scroll">
            <thead style="background-color: #216659;" class="text-xs uppercase text-white">
                <tr>
                    @foreach ($columns as $column)
                        <th class="py-1 px-4">{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($data as $row)
                    <tr class="odd:bg-gray-50 hover:bg-[#f1f8f6] transition">
                        @foreach ($rowKeys as $key)
                            @php

                                $accessKey = str_replace('->', '.', $key);
                                $value = data_get($row, $accessKey);
                            @endphp

                            <td class="py-1 px-4 text-justify group">
                                @if (
                                    $accessKey === 'image' ||
                                        $accessKey === 'icon' ||
                                        $accessKey === 'photo' ||
                                        $accessKey === 'featured_photo' ||
                                        $accessKey === 'photo_url')
                                    <div class=" ">
                                        <img src="{{ $value ?? asset('public/storage/default/default.jpg') }}"
                                            alt="Photo" class="w-12 h-12 object-cover rounded">

                                        <div class="absolute left-40 top-0 pb-5 z-50 hidden group-hover:block w-fit">

                                            <div class="bg-white p-2 rounded-xl shadow-2xl border w-fit">
                                                <img src="{{ $value ?? asset('public/storage/default/default.jpg') }}"
                                                    alt="Preview" class="w-55 h-auto object-cover rounded-lg">
                                            </div>

                                        </div>
                                    </div>
                                @elseif($accessKey === 'booking_status')
                                    @php
                                        $status = $row->status;
                                        $colors = match ($status) {
                                            'confirmed' => 'text-green-700 bg-green-50 border-green-200',
                                            'pending' => 'text-yellow-700 bg-yellow-50 border-yellow-200',
                                            'cancelled' => 'text-red-700 bg-red-50 border-red-200',
                                            default => 'text-blue-700 bg-blue-50 border-blue-200',
                                        };
                                    @endphp

                                    <form action="{{ route('booking.status', $row->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()"
                                            class="rounded-md border px-3 py-1 text-sm font-medium capitalize {{ $colors }}">
                                            <option value="pending" @selected($status === 'pending')>Pending</option>
                                            <option value="confirmed" @selected($status === 'confirmed')>Confirmed</option>
                                            <option value="cancelled" @selected($status === 'cancelled')>Cancelled</option>
                                        </select>
                                    </form>
                                @elseif($accessKey === 'status')
                                    @php
                                        $colors = match ($value) {
                                            'published', 'approved', 'active', 'completed' => 'text-green-600',
                                            'pending', 'processing' => 'text-yellow-600',
                                            'draft' => 'text-gray-600',
                                            'cancelled', 'rejected', 'failed' => 'text-red-600',
                                            default => 'text-blue-600',
                                        };
                                    @endphp

                                    <span class="capitalize font-medium {{ $colors }}">
                                        {{ $value ?? '-' }}
                                    </span>
                                @elseif($accessKey === 'actions')
                                    <x-button.action-button id="{{ $row->id }}" edit="{{ $links['edit'] ?? '' }}"
                                        delete="{{ $links['delete'] ?? '' }}" show="{{ $links['show'] ?? '' }}" />
                                @elseif ($key === 'task')
                                    {!! $value !!}
                                @else
                                    {{ Str::limit($value ?? '-', $limit) }}
                                @endif
                            </td>
                        @endforeach

                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) }}" class="py-6 text-gray-500 text-center">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
