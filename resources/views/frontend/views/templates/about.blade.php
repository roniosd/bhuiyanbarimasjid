<x-FornAppLayout :$pageDetails>
    <section class="top_header text-center">
        <p>{{$pageDetails->title}}</p>
    </section>

    <section class="about_box_section py-5" style="background: #E5F9ED;">
        <div class="container">
            <div class="row">
                <div class="col col-sm-12 col-md-12 col-lg-3 col-12 d-flex mb-sm-5">
                    <div class="links d-flex flex-column">
                        <span class="about">পরিচিতি</span>
                        <div class="aboutLink {{$pageDetails->title === 'আমাদের সম্পর্কে' ? 'active' : ''}}"><a
                                href="{{ route('page.show', 'আমাদের-সম্পর্কে') }}">হোম</a></div>
                        @forelse ($menus->sortBy('position') as $menu)
                            @if ($menu->menu_type === 'submenu' && $menu->place == 'sitebar')
                                <div class="aboutLink {{$menu->page->title === $pageDetails->title ? 'active' : ''}}"><a
                                        href="{{ route('page.show', $menu->page->slug) }}">{{$menu->name}}</a></div>
                            @endif
                        @empty
                            <h1>No dota Found</h1>
                        @endforelse
                    </div>
                </div>
                <div class="card col-lg-9 col-md-12 col-sm-12 col-12 overflow-hidden border-0">
                    <img style="height: 304px;"
                        src="{{ asset('/public/storage/' . ($pageDetails->photo ? 'page/' . $pageDetails->photo : 'default/category.png')) }}"
                        alt="" />
                    <p style="font-size: 25px"><b>{{$pageDetails->title}}</b></p>
                    <p>
                        {!!$pageDetails->description!!}
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-FornAppLayout>