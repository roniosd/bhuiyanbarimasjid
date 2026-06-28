@props(['url' => null])

<div class="flex justify-end mb-4">
    <a href="{{ route($url) }}">
        <button type="button"
            class="inline-flex items-center gap-2 rounded-lg border border-[#22587a] bg-[#22587a] px-5 py-3 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-green-800 hover:border-green-800 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 cursor-pointer">
            {{ $slot }}
        </button>
    </a>
</div>
