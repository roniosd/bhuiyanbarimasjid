<x-app-layout title="User Feedback">
    <x-list-header title="User Feedback" />

    <div class="bg-white shadow-md rounded-xl mt-4">
        @if ($feedbacks->count())
            <div class="overflow-x-scroll mt-7 relative">
                <table id="adminTable" data-datatable
                    class="min-w-full table-auto text-sm text-gray-800 text-left border-collapse overflow-x-scroll">
                    <thead style="background-color: #216659;" class="text-xs uppercase text-white">
                        <tr>
                            <th class="py-1 px-4">#</th>
                            <th class="py-1 px-4">Name</th>
                            <th class="py-1 px-4">Email</th>
                            <th class="py-1 px-4">Subject</th>
                            <th class="py-1 px-4">Message</th>
                            <th class="py-1 px-4">Received</th>
                            <th class="py-1 px-4">Reply</th>
                            <th class="py-1 px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($feedbacks as $index => $feedback)
                            <tr class="odd:bg-gray-50 hover:bg-[#f1f8f6] transition">
                                <td class="py-1 px-4">{{ $index + 1 }}</td>
                                <td class="py-1 px-4">{{ $feedback->name }}</td>
                                <td class="py-1 px-4">{{ $feedback->email }}</td>
                                <td class="py-1 px-4">{{ $feedback->subject ?? 'N/A' }}</td>
                                <td class="py-1 px-4">{{ $feedback->shortText($feedback->message, 80) }}</td>
                                <td class="py-1 px-4">
                                    {{ $feedback->created_at ? $feedback->created_at->format('d M Y, h:i A') : 'N/A' }}
                                </td>
                                <td class="py-1 px-4">
                                    @if ($feedback->replied_at)
                                        <span class="text-green-600 font-medium">Replied</span>
                                        <div class="text-xs text-gray-500">
                                            {{ $feedback->replied_at->format('d M Y') }}
                                        </div>
                                    @else
                                        <span class="text-yellow-600 font-medium">Pending</span>
                                    @endif
                                </td>
                                <td class="py-1 px-4">
                                    <div class="flex items-center gap-4">
                                        <button type="button" class="text-blue-600 hover:text-blue-800"
                                            title="View Feedback" data-bs-toggle="modal"
                                            data-bs-target="#feedbackViewModal{{ $feedback->id }}">
                                            <i class="bi bi-eye text-lg"></i>
                                        </button>

                                        <button type="button" class="text-green-600 hover:text-green-800"
                                            title="Reply Feedback" data-bs-toggle="modal"
                                            data-bs-target="#feedbackReplyModal{{ $feedback->id }}">
                                            <i class="bi bi-reply text-lg"></i>
                                        </button>

                                        <form action="{{ route('feedback', $feedback->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this feedback?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800"
                                                title="Delete Feedback">
                                                <i class="bi bi-trash3 text-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-4 text-center text-muted">
                <i class="bi bi-info-circle me-1"></i> No feedback found.
            </div>
        @endif
    </div>

    @foreach ($feedbacks as $feedback)
        <div class="modal fade" id="feedbackViewModal{{ $feedback->id }}" tabindex="-1"
            aria-labelledby="feedbackViewModalLabel{{ $feedback->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="feedbackViewModalLabel{{ $feedback->id }}">
                            Feedback from {{ $feedback->name }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <strong>Email:</strong><br>
                            {{ $feedback->email }}
                        </div>

                        <div class="mb-3">
                            <strong>Subject:</strong><br>
                            {{ $feedback->subject ?: 'N/A' }}
                        </div>

                        <div class="mb-3">
                            <strong>Received:</strong><br>
                            {{ optional($feedback->created_at)->format('d M Y, h:i A') }}
                        </div>

                        <div>
                            <strong>Message:</strong>
                            <p class="mt-2">{{ $feedback->message }}</p>
                        </div>

                        @if ($feedback->reply)
                            <hr>
                            <div>
                                <strong>Your Reply:</strong>
                                <p class="mt-2">{{ $feedback->reply }}</p>
                            </div>
                        @endif
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="feedbackReplyModal{{ $feedback->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('feedback.reply', $feedback->id) }}" method="POST">
                        @csrf

                        <div class="modal-header">
                            <h5 class="modal-title">Reply to {{ $feedback->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">To</label>
                                <input type="email" class="form-control" value="{{ $feedback->email }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Reply Message</label>
                                <textarea class="form-control" name="reply" rows="6" required>{{ old('reply', $feedback->reply) }}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-success">Send Reply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
