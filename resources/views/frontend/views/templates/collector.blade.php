<x-FornAppLayout>
    <section class="top_header text-center">
        <p>অনুদান আদায়কারী</p>
    </section>

    <section style="background: #E5F9ED;" class="donation-section py-5">
        <div class="container">

            <div class="row g-5">
                @forelse ($collectors as $collector)
                    <x-frontend.collectorCard :collector="$collector" />
                @empty
                    <div class="col-12 text-center">
                        <h5 class="text-muted">কোনো অনুদান আদায়কারী পাওয়া যায়নি</h5>
                    </div>
                @endforelse
            </div>

            @if ($collectors->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $collectors->onEachSide(1)->links('pagination') }}
                </div>
            @endif

        </div>
    </section>
</x-FornAppLayout>