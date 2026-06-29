@props([
    'id' => '',
    'url' => null,
    'url2' => '',
    'class' => 'col-span-3',
    'mainClass' => 'grid-cols-4',
    'title' => '',
    'seeall' => true,
    'button' => null,
    'action' => null,
])
@php
    if ($action) {
        $action = $action;
    } elseif ($url2) {
        $action = route($url2);
    } elseif ($id === '' && $url) {
        $action = route($url . '.store');
    } else {
        $action = route($url . '.update', $id);
    }
@endphp
<x-app-layout :title="$title">
    <div>
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data"
            class="grid {{ $mainClass }} gap-5">
            @csrf
            @if ($id)
                @method('PUT')
            @endif
            <!-- Left Side: Form Fields -->
            <div class="{{ $class }}">
                <div class="bg-white shadow-md rounded-2xl px-5 pt-3 pb-5 border border-slate-300">
                    <x-create-header :title="$title" :url="$url && $seeall ? $url . '.index' : null" />


                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{ $slot }}
                    </div>
                    @empty($sitecontent)
                        <div class="flex justify-between mt-5">
                            <x-button.primary-button>
                                <i class="bi bi-plus-square-dotted"></i>
                                {{ $button ?? ($id || $url2 ? 'Update' : 'Create') }}
                            </x-button.primary-button>
                        </div>
                    @endempty
                </div>
            </div>

            <!-- Right Side: Profile Image & Status/Role -->
            @isset($sitecontent)
                <div class="col-span-1">
                    <div class="bg-white shadow-md rounded-2xl p-3 flex flex-col gap-4 border border-slate-300">
                        {{ $sitecontent }}

                        <div class="flex justify-center items-center mt-2">
                            <x-button.primary-button>
                                <i class="bi bi-plus-square-dotted"></i>
                                {{ $button ?? ($id || $url2 ? 'Update' : 'Create') }}
                            </x-button.primary-button>
                        </div>
                    </div>

                </div>
            @endisset

        </form>

        @isset($listItems)
            <div class="mt-5">{{ $listItems }}</div>
        @endisset
    </div>
</x-app-layout>
