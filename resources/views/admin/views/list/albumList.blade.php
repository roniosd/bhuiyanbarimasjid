<x-app-layout title="Album List">
    <x-list-header title="Album List" url="album.create" />
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
        <x-album-card :albums="$albums" />
    </div>
</x-app-layout>
