  <x-app-layout title="Activity List">
      <x-admin-table title="Activity List" :columns="['Sl', 'Task', 'Date']" :row-keys="['id', 'task', 'created']" :data="$activity_logs" />

  </x-app-layout>
