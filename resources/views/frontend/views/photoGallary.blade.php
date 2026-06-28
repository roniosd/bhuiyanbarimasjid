<x-FornAppLayout>
    <section class="top_header text-center">
        <p>{{$photos->album_name}}</p>
    </section>
    <section style="background: #e5f9ed" class="img_gallary-section py-5">

        <div class="container py-5">
            <div class="row g-3 justify-content-center">
                @forelse ($photos->media as $photo)
                    <div class="col-md-4 col-sm-6">
                        <a href="{{ asset('/public/storage/' . ($photo->media ? "media/" . $photo->media : 'default/category.png')) }}"
                            data-lightbox="example-set">
                            <img src="{{ asset('/public/storage/' . ($photo->media ? "media/" . $photo->media : 'default/category.png')) }}"
                                class="gallery-thumb" alt="{{$photo->alt}}">
                        </a>
                    </div>
                @empty
                    <h1>There are no photos.. </h1>
                @endforelse

            </div>
        </div>
    </section>
</x-FornAppLayout>

<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'fadeDuration': 300,
        'imageFadeDuration': 300
    });
</script>