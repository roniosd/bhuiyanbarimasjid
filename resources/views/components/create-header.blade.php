@props(['title' => '', 'url' => null])
<div class="flex items-center justify-between pb-4 mb-6">
    <div class="flex items-center gap-3">
        <x-page-title>{{ $title }}</x-page-title>

    </div>
    <p class="text-sm text-gray-500">
        Fields marked with <span class=" text-red-500">*</span> are required
    </p>
    <div class="flex gap-3">
        <a href="{{ url()->previous() }}">
            <button type="button"
                class="inline-flex items-center gap-2 rounded-lg border border-green-600 bg-gradient-to-r from-green-700 via-green-600 to-emerald-500 px-5 py-3 text-sm font-medium text-white shadow-md transition-all duration-300 hover:from-green-800 hover:via-green-700 hover:to-emerald-600 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                <i class="bi bi-arrow-left"></i>
                Back
            </button>
        </a>

        @if ($url)
            <x-button.link-button :url="$url">
                <i class="bi bi-eye-fill"></i>
                View All
            </x-button.link-button>
        @endif
    </div>


</div>
