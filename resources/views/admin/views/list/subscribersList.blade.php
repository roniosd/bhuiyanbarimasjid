<x-app-layout title="Subscribers List">
    <div class="content-area">
        <div class="row">
            <div class="">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Subscribers List: Total({{ $subscribers->count() }})</h1>
                            </div>

                        </div>
                        <div class=" mt-4">
                            <div class="table-responsive">
                                @if ($subscribers->count())
                                    <table id="adminTable"
                                        class="table align-middle table-hover text-left table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subscribers as $index => $subscriber)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $subscriber->name }}</td>
                                                    <td>{{ $subscriber->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="p-4 text-center text-muted">
                                        <i class="bi bi-info-circle me-1"></i> No subscribers found.
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
