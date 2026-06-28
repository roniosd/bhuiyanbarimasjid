<x-FornAppLayout>
    <section class="top_header text-center">
        <p>{{$pageDetails->title}} Default</p>
    </section>

    <section class="about_box_section py-5" style="background: #E5F9ED;">
        <div class="container">
            <div class="row">
                <div class="card col-lg-9 col-md-12 col-sm-12 col-12 overflow-hidden border-0">
                    <p>{{$pageDetails->excerpt}}</p>
                    <p>
                        {!!$pageDetails->description!!}
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-FornAppLayout>