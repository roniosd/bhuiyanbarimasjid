<x-FornAppLayout>
    <section class="top_header text-center">
        <p>অনুদান তহবিল</p>
    </section>
    <section style="background: #E5F9ED;" class="donation-section py-5">
        <div class="container">
            <div class="row gap-3 m-auto">
                @forelse ($funds as $fund)
                    <x-frontend.fundCard :$fund />
                @empty
                    <h1>There are no Funds </h1>
                @endforelse
                <h1 class="mt-5"></h1>
            </div>
           <div class="d-flex align-items-center justify-content-center">
             {{$funds->onEachSide(1)->links('pagination')}}
           </div>
        </div>
    </section>
</x-FornAppLayout>