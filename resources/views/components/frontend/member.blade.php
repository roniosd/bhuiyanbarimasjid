<x-FornAppLayout>
    <section class="top_header text-center py-3">
        <p>{{ $pageDetails->title }}</p>
    </section>

    <section style="background: #E5F9ED;" class="py-5">
        <div class="container">
            <div class="row">

                @forelse ($members as $member)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">

                            <div class="text-center p-4">
                                <img src="{{ $member->photo ?? asset('/public/storage/default/profile.png') }}"
                                    alt="{{ $member->full_name }}" class="rounded-circle border"
                                    style="width:120px;height:120px;object-fit:cover;">

                                <h5 class="mt-3 fw-bold mb-1">
                                    {{ $member->full_name }}
                                </h5>

                                <span class="badge bg-success">
                                    {{ $member->member_type }}
                                </span>
                            </div>

                            <div class="card-body pt-0">
                                <table class="table table-borderless table-sm mb-0">
                                    <tr>
                                        <td><strong>পেশা</strong></td>
                                        <td>{{ $member->occupation ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>শিক্ষা</strong></td>
                                        <td>{{ $member->education ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>কর্মস্থল</strong></td>
                                        <td>{{ $member->workspace ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>মোবাইল</strong></td>
                                        <td>
                                            {{ substr($member->mobile, 0, 3) . '****' . substr($member->mobile, -4) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>ইমেইল</strong></td>
                                        <td>{{ $member->email ?? '-' }}</td>
                                    </tr>
                                </table>

                                @if ($member->note)
                                    <div class="mt-3 p-2 rounded" style="background:#f8f9fa;">
                                        <small>{{ $member->note }}</small>
                                    </div>
                                @endif
                            </div>

                            <div class="card-footer bg-white border-0 text-center">
                                <small class="text-muted">
                                    সদস্যের ধরন: {{ $member->member_type }}
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <h4>কোন সদস্য পাওয়া যায়নি</h4>
                    </div>
                @endforelse

            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $members->onEachSide(1)->links('pagination') }}
            </div>
        </div>
    </section>
</x-FornAppLayout>
