@props(['title', 'icon', 'id'])

<li class="menu-item" title="{{ $title }}">
    <div @click="openItem = openItem === '{{ $id }}' ? null : '{{ $id }}'"
        class="w-full flex items-center gap-2 px-3 py-2 rounded-lg cursor-pointer text-left focus:outline-none focus:ring-0 focus:shadow-none focus:border-none bg-[#2e9b7a]  
               text-white hover:bg-[#27886d]"
        :class="{ 'bg-[#2e9b7a] text-[#155DFC] border-l-[3px] border-[#ffd055] font-semibold': openItem === '{{ $id }}' }">
        <i class="bi {{ $icon }}" style="padding-right: 10px; margin-right: 20px;"></i>
        <span class="flex-1 whitespace-nowrap ">{{ $title }}</span>
        <i class="bi bi-chevron-down transition-transform duration-200"
            :class="{ 'rotate-180': openItem === '{{ $id }}' }"></i>
    </div>

    <ul x-show="openItem === '{{ $id }}'" x-transition class="pl-6 mt-1 space-y-1" style="display: none;">
        {{ $slot }}
    </ul>
</li>
