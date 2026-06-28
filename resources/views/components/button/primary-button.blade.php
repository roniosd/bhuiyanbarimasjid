<button
    {{ $attributes->merge([
        'type' => 'submit',
        'id' => '',
        'class' => 'inline-flex items-center gap-2 rounded-lg border border-green-700 bg-green-700 px-4 py-3 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-green-800 hover:border-green-800 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed'
    ]) }}
>
    {{ $slot }}
</button>