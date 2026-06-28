<x-app-layout title="Add Activity">
    <div class="content-area py-4">
        <div class="row align-items-center justify-content-center">
            <div class="">
                <div class="sidebar-widgets">
                    <div class="sidebar-widgets-inner">
                        <div class="custom-card" style="padding:0; background: none; box-shadow: none;">
                            <div class="custom-card-header">
                                <div class="heading d-flex align-items-center gap-2">
                                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 0C0.897 0 0 0.897 0 2V18C0 19.103 0.897 20 2 20H8.03906C8.12806 19.357 8.41191 18.76 8.87891 18.293L9.17188 18H2V2H9V7H14V10.3496C14.627 10.1266 15.298 9.99805 16 9.99805V6L10 0H2ZM16 12C13.791 12 12 13.791 12 16C12 16.586 12.1324 17.1396 12.3594 17.6406L10.293 19.707C9.90197 20.098 9.90197 20.7311 10.293 21.1211L10.8789 21.707C11.2689 22.098 11.902 22.098 12.293 21.707L14.3594 19.6406C14.8604 19.8676 15.414 20 16 20C18.209 20 20 18.209 20 16C20 15.414 19.8676 14.8604 19.6406 14.3594L17 17L15 15L17.6406 12.3594C17.1396 12.1324 16.586 12 16 12Z"
                                            fill="#FEC601" />
                                    </svg>
                                    <h1 class="mb-0">Activity Log</h1>
                                </div>
                            </div>

                            <div class="container my-4">
                                <div class="card shadow-sm border-0">
                                    <div class="table-responsive">
                                        <table id="adminTable" class="table table-striped table-bordered mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width: 5%;">#</th>
                                                    <th>Task</th>
                                                    <th style="width: 25%;">Date & Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($activity_logs as $index => $activity_log)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{!! $activity_log->task !!}</td>
                                                        <td>{{ \Carbon\Carbon::parse($activity_log->created)->format('H:i, d M Y') }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center text-muted">No Data Available</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
