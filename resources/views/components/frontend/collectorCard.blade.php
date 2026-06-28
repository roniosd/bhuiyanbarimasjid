@props(['collector'])

<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
    <div
        class="card border-0 shadow-sm h-100 w-100"
        style="border-radius:16px; min-height:220px;"
    >
        <div class="card-body text-center py-4">

            <img
                src="{{ asset('/public/storage/' . ($collector->photo ? 'collector/' . $collector->photo : 'default/profile.png')) }}"
                alt="{{ $collector->name }}"
                class="rounded-circle mb-3"
                style="width:90px;height:90px;object-fit:cover;"
            >

            <h5 class="fw-semibold mb-1">
                {{ $collector->name }}
            </h5>

           <p
    class="text-muted small mb-0"
    style="text-align:center; display:block; width:100%;"
>
        {{ substr($collector->mobile_number, 0, 3) . '****' . substr($collector->mobile_number, -4) }}
</p>

        </div>
    </div>
</div>