@props([
    'title',
    'backUrl',
    'editUrl',
    'image' => null,
    'imageAlt' => 'Photo',
    'gap' => 'gap-4',
])

<div class="bg-[#216659] px-6 py-5 text-white">
    <div class="flex flex-col {{ $gap }} md:flex-row md:items-center md:justify-between">
        <div class="{{ $image ? 'flex items-center gap-4' : '' }}">
            @if ($image)
                <img src="{{ $image }}" alt="{{ $imageAlt }}" class="h-24 w-24 rounded-lg object-cover border-4 border-white/30">
            @endif

            <div>
                <h1 class="text-2xl font-bold">{{ $title }}</h1>
                <div class="mt-2 flex flex-wrap items-center gap-2 text-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <a href="{{ $backUrl }}"
                class="inline-flex items-center gap-2 rounded-lg bg-white/15 px-4 py-2 text-lg font-medium text-white hover:bg-white/25">
                <i class="bi bi-arrow-left"></i>
                Back
            </a>
            <a href="{{ $editUrl }}"
                class="inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2 text-lg font-medium text-[#216659] hover:bg-gray-100">
                <i class="bi bi-pencil-square"></i>
                Edit
            </a>
        </div>
    </div>
</div>
