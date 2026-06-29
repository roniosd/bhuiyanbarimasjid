<x-app-layout title="Student List">
    <x-list-header title="Student List" url="student.create" />
    <x-admin.members-table :members="$student" editRoute="student.edit" deleteRoute="student.destroy"
        showRoute="download.student" />
</x-app-layout>
