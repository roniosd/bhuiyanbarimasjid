@props(['class' => ''])

<div {{ $attributes->merge(['class' => trim("bg-white shadow-md rounded-xl overflow-hidden {$class}")]) }}>
    {{ $slot }}
</div>
