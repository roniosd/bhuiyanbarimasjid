@props(['title' => ''])
<x-base-layout :$title>
    <x-admin.sidebar />
    <x-admin.header />
    <main class="content-area">
        {{ $slot }}
    </main>
</x-base-layout>
