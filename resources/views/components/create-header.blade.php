@props(['title' => '', 'url' => null])
<div class="flex items-center justify-between pb-4 mb-6">
    <div class="flex items-center gap-3">
        <x-page-title>{{ $title }}</x-page-title>

    </div>
    <p class="text-sm text-gray-500">
        Fields marked with <span class=" text-red-500">*</span> are required
    </p>
    <div class="flex gap-3">
        <x-button.link-button :url2="url()->previous()">
            <i class="bi bi-arrow-left"></i>
            Back
        </x-button.link-button>


        @if ($url)
            <x-button.link-button :url="$url">
                <i class="bi bi-eye-fill"></i>
                View All
            </x-button.link-button>
        @endif
    </div>


</div>
