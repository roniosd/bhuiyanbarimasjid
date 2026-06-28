<x-app-layout title="Member List">
    <div class="content-area">
        <div class="row">
            <div class="">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Doner List: Total: {{ $donars->count() }}</h1>
                            </div>

                        </div>
                        <div class=" mt-4">
                            <div class="table-responsive">
                                @if ($donars->count())
                                    <div class="table-responsive">
                                        <table id="adminTable"
                                            class="table align-middle table-hover text-left table-striped">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Donar</th>
                                                    <th scope="col">Contact</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Transaction Time</th>
                                                    <th scope="col">Timezone</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($donars as $index => $donar)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $donar->donar }}</td>
                                                        <td>{{ $donar->contact }}</td>
                                                        <td><strong
                                                                class="text-success">${{ number_format($donar->amount, 2) }}</strong>
                                                        </td>
                                                        <td>{{ $donar->getDate($donar->transaction_time, 'd M Y') }}
                                                        </td>
                                                        <td>{{ $donar->timezone }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="p-4 text-center text-muted">
                                        <i class="bi bi-info-circle me-1"></i> No donar records found.
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
