<x-app-layout title="Media List">
    <x-list-header :title="$album->album_name" />
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
        <x-media-card :medias="$album->media" :details="false" />
    </div>
</x-app-layout>
