<x-FornAppLayout :$pageDetails>
    <section class="top_header text-center">
        <p>{{$pageDetails->title ?? 'অনুষ্ঠানসমূহ'}}</p>
    </section>
    <section style="background: #E5F9ED;" class="activity_section ocation-section ocation-section-2 py-5">
        <div class="container">
            
            <div style="gap: 30px" class="row row-1 m-auto">
                @forelse ($events as $event)
                    <x-frontend.event-card :$event />
                @empty
                    <h1>There are no Ocation Cards.. </h1>
                @endforelse

            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center mt-5">
            {{$events->onEachSide(1)->links('pagination')}}
        </div>
    </section>
</x-FornAppLayout>