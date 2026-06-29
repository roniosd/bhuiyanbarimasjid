<x-app-layout title="Slider List">
    <x-admin-table title="Slider List" url="slider.create" :columns="['Photo', 'Title', 'Position', 'Description', 'Status', 'Actions']"
        :row-keys="['photo', 'title', 'position', 'description', 'status', 'actions']" :data="$sliders" :links="[
            'edit' => 'slider.edit',
            'delete' => 'slider.destroy',
        ]" />
</x-app-layout>
