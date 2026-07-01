<x-FornAppLayout>
    <section class="top_header text-center">
        <p>{{ $pageDetails->title }}</p>
    </section>

    <section class="py-5" style="background: #E5F9ED;">
        <div class="container">
            <div class="table-responsive bg-white shadow-sm rounded overflow-hidden">
                <table class="table table-bordered table-hover align-middle mb-0 text-center">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">ক্রম</th>
                            <th scope="col">পদবি</th>
                            <th scope="col">নাম</th>
                            <th scope="col">মোবাইল নাম্বার</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($committees as $committee)
                            <tr>
                                <td>{{ str_replace(range(0, 9), ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'], $loop->iteration) }}
                                </td>
                                <td>{{ $committee->designation ?? '-' }}</td>
                                <td>{{ $committee->name ?? '-' }}</td>
                                <td> {{ substr($committee->mobile_number, 0, 3) . '****' . substr($committee->mobile_number, -2) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-muted">কোনো কমিটি পাওয়া যায়নি</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-FornAppLayout>
