<x-FornAppLayout>
    <section class="top_header text-center">
        <p>গ্যালারী</p>
    </section>
    <section style="background: #e5f9ed" class="img_gallary-section py-5">

        <div class="container">
            <div class="grid-container-all">
                <div class="grid-containers">
                    @forelse ($albums->take(6) as $album)
                        <a href="{{route('photoGallary', $album->slug)}}"
                            class="click_img position-relative overflow-hidden mt-lg-5 text-decoration-none text-black fw-sm">
                            <img style="border-radius: 8px" src="{{asset('/public/storage/' . ($album->cover ? 'media/' . $album->cover : 'default/category.png'))}}"
                                alt="{{$album->album_name}}" class="gallery-img" />
                            <h5 class="mt-2 text-truncate text-capitalize">{{$album->album_name}}</h5>
                            <div class="hover_effect position-absolute">
                                <h3>{{$album->album_name}}</h3>
                            </div>
                        </a>
                    @empty
                        <h1>There are no Albums.. </h1>
                    @endforelse

                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center mt-5">
            {{$albums->onEachSide(1)->links('pagination')}}
        </div>
    </section>
</x-FornAppLayout>