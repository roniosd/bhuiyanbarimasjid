<x-FornAppLayout>
    <section class="top_header text-center">
        <p>সংবাদ</p>
    </section>
    <section style="background: #E5F9ED;" class="news_section news_section-2 py-5">
       
        <div class="container mt-2">
            <div class="row g-4">
                @forelse ($news as $data)
                    <x-frontend.news-card :$data />
                @empty
                    <h1>There are no News Cards.. </h1>
                @endforelse
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center mt-5">
            {{$news->onEachSide(1)->links('pagination')}}
        </div>
    </section>
</x-FornAppLayout>