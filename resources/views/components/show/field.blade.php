@props([
    'label',
    'boxed' => false,
    'valueClass' => 'font-medium',
])

<div {{ $attributes->merge(['class' => $boxed ? 'rounded-lg bg-gray-50 p-3' : '']) }}>
    <p class="text-xl text-gray-500">{{ $label }}</p>
    <p class="text-lg {{ $valueClass }} text-gray-800">{{ $slot }}</p>
</div>
