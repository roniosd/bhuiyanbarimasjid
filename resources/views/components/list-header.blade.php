@props(['title', 'url' => null, 'export' => null])
<div class="flex flex-col sm:flex-row sm:items-center justify-between px-6 border-b py-2 border-gray-200">

    <div class="flex w-full justify-between items-center">
        <x-page-title>{{ $title }}</x-page-title>


        <div class="flex gap-4">
            <x-button.link-button :url2="url()->previous()">
                <i class="bi bi-arrow-left"></i>
                Back
            </x-button.link-button>
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
