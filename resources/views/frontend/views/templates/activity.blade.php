<x-FornAppLayout :$pageDetails>
    <section class="top_header text-center">
        <p>{{$pageDetails->title}}</p>
    </section>

    <section style="background: #E5F9ED;" class="activity_section activity_section-2 py-5">
        <div class="container py-3">
           
            <div class="row gap-3 m-auto">
                @forelse ($activities as $activity)
                    <x-frontend.activity-card :$activity/>
                @empty
                    <h1>There are no Acivity Cards.. </h1>
                @endforelse
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center mt-5">
            {{$activities->onEachSide(1)->links('pagination')}}
        </div>
    </section>
</x-FornAppLayout>