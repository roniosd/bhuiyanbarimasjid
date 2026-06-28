@props(['href', 'title', 'icon'])

<li class="menu-item">
    <a href="{{ $href }}"
        class="flex items-center gap-2 px-3 py-2 text-sm text-white hover:bg-[#27886d] hover:text-black  rounded-lg cursor-pointer text-left focus:outline-none focus:ring-0 focus:shadow-none focus:border-none bg-[#2e9b7a]  
               text-white hover:bg-[#27886d]">
        <i class="text-white bi {{ $icon }} fs-5"></i>
        <span>{{ $title }}</span>
    </a>
</li>
