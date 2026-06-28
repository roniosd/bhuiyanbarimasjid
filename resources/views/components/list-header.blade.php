@props(['title', 'url' => null, 'export' => null])
<div class="flex flex-col sm:flex-row sm:items-center justify-between px-6 border-b py-2 border-gray-200">

    <div class="flex w-full justify-between items-center">
        <x-page-title>{{ $title }}</x-page-title>


        <div class="flex gap-4">
            <a href="{{ url()->previous() }}">
                <button type="button"
                    class="inline-flex items-center gap-2 rounded-lg border border-[#22587a] bg-[#22587a] px-5 py-3 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-green-800 hover:border-green-800 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </button>
            </a>
            @if ($url)
                <!-- Create Button -->
                <x-button.link-button url="{{ $url }}">
                    <i class="bi bi-plus-circle"></i>
                    Add
                </x-button.link-button>
            @endif

            @if ($export)
                <x-button.link-button url="{{ $export }}">
                    <i class="bi bi-file-earmark-excel-fill me-2"></i>
                    Download Excel
                </x-button.link-button>
                <!-- Create Button -->
            @endif
        </div>
    </div>
</div>
