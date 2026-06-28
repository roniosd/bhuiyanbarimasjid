@props(['title'])

<div {{ $attributes->merge(['class' => 'space-y-4']) }}>
    <h2 class="border-b pb-2 text-2xl font-semibold text-gray-800">{{ $title }}</h2>

    {{ $slot }}
</div>
