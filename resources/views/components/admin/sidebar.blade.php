<div class="sidebar relative top-16  group hover:bg-[#14532D] left-0"
    style="border-right: 1px solid #22587a; background-color: #22587a; color: #fff;">
    @php
        $openItem = collect([
            'post.*' => 'post',
            'slider.*' => 'slider',
            'session.*' => 'session',
            'committee.*' => 'committee',
            'collector.*' => 'collector',
            'event.*' => 'event',
            'donationBook.*' => 'donationBook',
            'allactivity.*' => 'allactivity',
            'member.*' => 'member',
            'student.*' => 'student',
            'category.*' => 'category',
            'media.*' => 'media',
            'album.*' => 'album',
            'fund.*' => 'fund',
            'page.*' => 'page',
            'siteSetting' => 'setting',
            'homepageSetting' => 'setting',
            'menu.*' => 'setting',
            'socialSetting' => 'setting',
            'orgContact' => 'setting',
            'adminmanage.*' => 'admin',
            'permission.*' => 'admin',
        ])->first(function ($id, $pattern) {
            return request()->routeIs($pattern);
        });
    @endphp

    <ul x-data="{ openItem: '{{ $openItem }}' }" class="space-y-1">
        {{-- Dashboard --}}

        <x-sidebar.link href="{{ route('dashboard') }}" title="Dashboard" icon="bi-house-check-fill" />

        {{-- Post --}}
        <x-sidebar.dropdown id="post" title="Post / News" icon="bi-clock-history">
            <x-sidebar.link href="{{ route('post.create') }}" title="Add Post / News" icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('post.index') }}" title="Post / News List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Slider --}}
        <x-sidebar.dropdown id="slider" title="Slider" icon="bi-sliders">
            <x-sidebar.link href="{{ route('slider.create') }}" title="Add Slider" icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('slider.index') }}" title="Slider List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Session --}}
        <x-sidebar.dropdown id="session" title="Session" icon="bi-graph-up-arrow">
            <x-sidebar.link href="{{ route('session.create') }}" title="Add Session" icon="bi-file-earmark-plus" />
        </x-sidebar.dropdown>

        {{-- Committee --}}
        <x-sidebar.dropdown id="committee" title="Committee" icon="bi-people">
            <x-sidebar.link href="{{ route('committee.create') }}" title="Add Committee" icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('committee.index') }}" title="Committee List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Collector --}}
        <x-sidebar.dropdown id="collector" title="Collector" icon="bi-folder">
            <x-sidebar.link href="{{ route('collector.create') }}" title="Add Collector" icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('collector.index') }}" title="Collector List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Event --}}
        <x-sidebar.dropdown id="event" title="Events" icon="bi-calendar-event">
            <x-sidebar.link href="{{ route('event.create') }}" title="Add Event" icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('event.index') }}" title="Event List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Donation Book --}}
        <x-sidebar.dropdown id="donationBook" title="Donation Book" icon="bi-book">
            <x-sidebar.link href="{{ route('donationBook.create') }}" title="Add Book" icon="bi-file-earmark-plus" />
        </x-sidebar.dropdown>

        {{-- Activity --}}
        <x-sidebar.dropdown id="allactivity" title="Activity" icon="bi-graph-up-arrow">
            <x-sidebar.link href="{{ route('allactivity.create') }}" title="Add Activity"
                icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('allactivity.index') }}" title="Activity List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Member --}}
        <x-sidebar.dropdown id="member" title="Member" icon="bi-person">
            <x-sidebar.link href="{{ route('member.index') }}" title="Member List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Student --}}
        <x-sidebar.dropdown id="student" title="Student" icon="bi-person">
            <x-sidebar.link href="{{ route('student.index') }}" title="Student List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Category --}}
        <x-sidebar.dropdown id="category" title="Category" icon="bi-folder">
            <x-sidebar.link href="{{ route('category.create') }}" title="Add Category" icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('category.index') }}" title="Category List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Media --}}
        <x-sidebar.dropdown id="media" title="Media" icon="bi-file-earmark-image">
            <x-sidebar.link href="{{ route('media.create') }}" title="Add Media" icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('media.index') }}" title="Media List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Album --}}
        <x-sidebar.dropdown id="album" title="Album" icon="bi-images">
            <x-sidebar.link href="{{ route('album.create') }}" title="Add Album" icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('album.index') }}" title="Album List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Gallery --}}
        <x-sidebar.link href="{{ route('gallery.all') }}" title="Gallery" icon="bi-image" />

        {{-- Fund --}}
        <x-sidebar.dropdown id="fund" title="Donation" icon="bi-currency-dollar">
            <x-sidebar.link href="{{ route('fund.create') }}" title="Create Donation" icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('fund.index') }}" title="Donation List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Page --}}
        <x-sidebar.dropdown id="page" title="Page" icon="bi-file-earmark">
            <x-sidebar.link href="{{ route('page.create') }}" title="Add Page" icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('page.index') }}" title="Page List" icon="bi-journal-text" />
        </x-sidebar.dropdown>

        {{-- Settings --}}
        <x-sidebar.dropdown id="setting" title="Settings" icon="bi-gear">
            <x-sidebar.link href="{{ route('siteSetting') }}" title="Site Setting" icon="bi-tools" />
            <x-sidebar.link href="{{ route('homepageSetting') }}" title="Homepage Setting" icon="bi-house-door" />
            <x-sidebar.link href="{{ route('menu.create') }}" title="Menu Setting" icon="bi-list" />
            <x-sidebar.link href="{{ route('socialSetting') }}" title="Social Links" icon="bi-share" />
            <x-sidebar.link href="{{ route('orgContact') }}" title="Contact" icon="bi-telephone" />
        </x-sidebar.dropdown>

        {{-- Admin --}}
        <x-sidebar.dropdown id="admin" title="Admin" icon="bi-person-gear">
            <x-sidebar.link href="{{ route('adminmanage.create') }}" title="Add Admin"
                icon="bi-file-earmark-plus" />
            <x-sidebar.link href="{{ route('adminmanage.index') }}" title="Admin List" icon="bi-journal-text" />
            <x-sidebar.link href="{{ route('permission.create') }}" title="Add Permission" icon="bi-shield-plus" />
        </x-sidebar.dropdown>

        {{-- Activity Log --}}
        <x-sidebar.link href="{{ route('activitylog') }}" title="Activity Log" icon="bi-clipboard-data" />

        {{-- Subscribers --}}
        <x-sidebar.link href="{{ route('subscribers') }}" title="Subscribers" icon="bi-person-lines-fill" />

        {{-- Donors --}}
        <x-sidebar.link href="{{ route('doners') }}" title="Donors" icon="bi-hand-thumbs-up" />

        {{-- Feedback --}}
        <x-sidebar.link href="{{ route('feedbacks') }}" title="Feedback" icon="bi-chat-left-dots" />

        {{-- Logout --}}
        <x-sidebar.link href="{{ route('logout') }}" title="Logout" icon="bi-box-arrow-right" />
    </ul>
</div>
