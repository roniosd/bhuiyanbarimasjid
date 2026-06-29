<x-app-layout title="Dashboard">
    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
            <p class="text-sm text-gray-500">Quick overview of website activity.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-sm text-gray-500">Total Donation</p>
                <h2 class="text-2xl font-semibold text-gray-800">BDT {{ number_format($totalDonation, 2) }}</h2>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-sm text-gray-500">Members</p>
                <h2 class="text-2xl font-semibold text-gray-800">{{ number_format($totalMembers) }}</h2>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-sm text-gray-500">Students</p>
                <h2 class="text-2xl font-semibold text-gray-800">{{ number_format($totalStudents) }}</h2>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <p class="text-sm text-gray-500">Pending Feedback</p>
                <h2 class="text-2xl font-semibold text-gray-800">{{ number_format($pendingFeedback) }}</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-semibold text-gray-800 mb-3">Recent Donations</h3>
                <div class="space-y-3">
                    @forelse ($recentDonations as $donation)
                        <div class="flex justify-between gap-3 border-b pb-2 last:border-0 last:pb-0">
                            <div>
                                <p class="font-medium text-gray-700">{{ $donation->donar ?? 'Anonymous' }}</p>
                                <p class="text-xs text-gray-500">{{ $donation->fund->title ?? 'General' }}</p>
                            </div>
                            <p class="font-semibold text-gray-800">BDT {{ number_format($donation->amount, 2) }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No donations found.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-semibold text-gray-800 mb-3">Upcoming Events</h3>
                <div class="space-y-3">
                    @forelse ($upcomingEvents as $event)
                        <div class="border-b pb-2 last:border-0 last:pb-0">
                            <p class="font-medium text-gray-700">{{ $event->title }}</p>
                            <p class="text-xs text-gray-500">
                                {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
                            </p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No upcoming events.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-semibold text-gray-800 mb-3">Latest Posts</h3>
                <div class="space-y-3">
                    @forelse ($latestPosts as $post)
                        <div class="border-b pb-2 last:border-0 last:pb-0">
                            <p class="font-medium text-gray-700">{{ $post->title }}</p>
                            <p class="text-xs text-gray-500">{{ optional($post->created_at)->format('d M Y') }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No posts found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
