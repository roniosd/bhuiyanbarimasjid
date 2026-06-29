<x-app-layout title="Media List">
    <x-list-header title="Media List" url="media.create" />
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
        <x-media-card :medias="$medias" />
    </div>
</x-app-layout>
