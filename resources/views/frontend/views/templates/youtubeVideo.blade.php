<x-FornAppLayout>
    <section class="top_header text-center">
        <p>{{ $pageDetails->title ?? 'Youtube Videos' }}</p>
    </section>
    <section class="about_box_section py-5" style="background: #E5F9ED;">
        <div class="container">

            <div class="row">
                @forelse ($videos as $video)
                    <div class="col-md-4 mb-4">
                        <div style="background: #fff;" class="shadow-sm border-0">
                            <div class="video-thumb-wrapper position-relative" style="cursor: pointer;"
                                data-video-id="{{ $video['videoId'] }}">
                                <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}"
                                    class="card-img-top rounded-top">
                                <div class="play-button position-absolute top-50 start-50 translate-middle"
                                    style="font-size: 3rem; color: white; text-shadow: 0 0 10px black;">
                                    ▶
                                </div>
                            </div>
                            <div class="pt-2 pb-1">
                                <p
                                    style="margin-left:10px; font-size: 18px; line-height: 20px; font-weight: 600; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $video['title'] }}
                                </p>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">No videos found.</div>
                    </div>
                @endforelse
            </div>
        </div>



    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.video-thumb-wrapper').forEach(function (wrapper) {
                wrapper.addEventListener('click', function () {
                    const videoId = this.getAttribute('data-video-id');
                    const iframe = document.createElement('iframe');

                    iframe.setAttribute('src',
                        `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`);
                    iframe.setAttribute('allowfullscreen', '');
                    iframe.setAttribute('allow',
                        'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'
                    );
                    iframe.setAttribute('frameborder', '0');
                    iframe.classList.add('w-100', 'rounded-top');
                    iframe.style.height = '225px';
                    this.innerHTML = '';
                    this.appendChild(iframe);
                });
            });
        });
    </script>

</x-FornAppLayout>