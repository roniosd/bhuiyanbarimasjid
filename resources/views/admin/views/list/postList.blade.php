<x-app-layout title="Post List">
    <x-admin-table title="Post List" url="post.create" :columns="['Image', 'Title', 'Published Date', 'Status', 'Actions']" :row-keys="['photo', 'title', 'created_at', 'status', 'actions']" :data="$posts"
        :links="['edit' => 'post.edit', 'delete' => 'post.destroy']" limit='100' />
</x-app-layout>
