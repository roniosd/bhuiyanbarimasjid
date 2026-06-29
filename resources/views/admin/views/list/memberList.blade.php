<x-app-layout title="Member List">
    <x-list-header title="Member List" url="member.create" />
    <x-admin.members-table :members="$members" editRoute="member.edit" deleteRoute="member.destroy"
        showRoute="download.member" />
</x-app-layout>
