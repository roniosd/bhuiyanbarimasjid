<x-app-layout title="Dashboard">
    <div class="">
        <div class=" py-4">

            {{-- Overview Cards --}}
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-white bg-success shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Donations</h5>
                            <p class="card-text fs-4">৳ 120,450</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-primary shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Upcoming Events</h5>
                            <p class="card-text fs-4">5</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-info shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Active Volunteers</h5>
                            <p class="card-text fs-4">42</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Pending Tasks</h5>
                            <p class="card-text fs-4">8</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Calendar & Chart Row --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light fw-bold">Upcoming Events</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Friday Sermon
                                    <span class="badge bg-secondary">Apr 18</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Ramadan Iftar Program
                                    <span class="badge bg-secondary">Apr 22</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Quran Class Launch
                                    <span class="badge bg-secondary">Apr 25</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light fw-bold">Donation Trend</div>
                        <div class="card-body">
                            <canvas id="donationChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Announcements & Donations --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light fw-bold">Latest Announcements</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>New Volunteer Drive Started</strong>
                                    <br>
                                    <small class="text-muted">2 days ago</small>
                                </li>
                                <li class="list-group-item">
                                    <strong>Monthly Report Published</strong>
                                    <br>
                                    <small class="text-muted">1 week ago</small>
                                </li>
                                <li class="list-group-item">
                                    <strong>Ramadan Program Schedule Announced</strong>
                                    <br>
                                    <small class="text-muted">3 days ago</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light fw-bold">Recent Donations</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Md. Karim</span>
                                    <span class="fw-bold">৳ 5,000</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Ayesha Sultana</span>
                                    <span class="fw-bold">৳ 2,000</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Anonymous</span>
                                    <span class="fw-bold">৳ 10,000</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
