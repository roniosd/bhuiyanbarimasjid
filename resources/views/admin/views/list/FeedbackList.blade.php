<x-app-layout title="User Feedback">
    <div class="content-area">
        <div class="row">
            <div class="">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header">
                            <div class="heading">
                                <h1>User Feedback</h1>
                            </div>
                        </div>

                        <div class="">
                            <div class="card shadow-sm border-0">
                                <div class="card-body p-0">
                                    @if ($feedbacks->count())
                                        <div class="table-responsive">
                                            <table id="adminTable"
                                                class="table align-middle table-hover text-left table-striped">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Subject</th>
                                                        <th>Message</th>
                                                        <th>Received</th>
                                                        <th>Reply</th>
                                                        <th style="width: 150px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($feedbacks as $index => $feedback)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $feedback->name }}</td>
                                                            <td>{{ $feedback->email }}</td>
                                                            <td>{{ $feedback->subject ?? 'N/A' }}</td>
                                                            <td>{{ $feedback->shortText($feedback->message, 80) }}</td>
                                                            <td>
                                                                {{ $feedback->created_at ? $feedback->created_at->format('d M Y, h:i A') : 'N/A' }}
                                                            </td>
                                                            <td>
                                                                @if ($feedback->replied_at)
                                                                    <span class="badge bg-success">Replied</span>
                                                                    <div class="small text-muted">
                                                                        {{ $feedback->replied_at->format('d M Y') }}
                                                                    </div>
                                                                @else
                                                                    <span
                                                                        class="badge bg-warning text-dark">Pending</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-center gap-2">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-light text-primary"
                                                                        title="View Feedback" data-bs-toggle="modal"
                                                                        data-bs-target="#feedbackViewModal{{ $feedback->id }}">
                                                                        See
                                                                    </button>

                                                                    <button type="button"
                                                                        class="btn btn-sm btn-light text-success"
                                                                        title="Reply Feedback" data-bs-toggle="modal"
                                                                        data-bs-target="#feedbackReplyModal{{ $feedback->id }}">
                                                                        Reply
                                                                    </button>

                                                                    <form
                                                                        action="{{ route('feedback', $feedback->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Are you sure you want to delete this feedback?');">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-light text-danger"
                                                                            title="Delete Feedback">
                                                                            <svg width="16" height="20"
                                                                                viewBox="0 0 16 20" fill="none">
                                                                                <path
                                                                                    d="M6 0L5 1H0V3H1V18C1 19.0931 1.90694 20 3 20H13C14.0931 20 15 19.0931 15 18V3H16V1H14H11L10 0H6ZM3 3H13V18H3V3ZM5.70703 6.29297L4.29297 7.70703L6.58594 10L4.29297 12.293L5.70703 13.707L8 11.4141L10.293 13.707L11.707 12.293L9.41406 10L11.707 7.70703L10.293 6.29297L8 8.58594L5.70703 6.29297Z"
                                                                                    fill="red" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>

                                                            <!-- View Modal -->
                                                            <div class="modal fade"
                                                                id="feedbackViewModal{{ $feedback->id }}"
                                                                tabindex="-1"
                                                                aria-labelledby="feedbackViewModalLabel{{ $feedback->id }}"
                                                                aria-hidden="true">

                                                                <div
                                                                    class="modal-dialog modal-dialog-centered modal-lg">
                                                                    <div class="modal-content">

                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="feedbackViewModalLabel{{ $feedback->id }}">
                                                                                Feedback from {{ $feedback->name }}
                                                                            </h5>

                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"></button>
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
                                                                                <p class="mt-2">
                                                                                    {{ $feedback->message }}</p>
                                                                            </div>

                                                                            @if ($feedback->reply)
                                                                                <hr>
                                                                                <div>
                                                                                    <strong>Your Reply:</strong>
                                                                                    <p class="mt-2">
                                                                                        {{ $feedback->reply }}</p>
                                                                                </div>
                                                                            @endif

                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">
                                                                                Close
                                                                            </button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Reply Modal -->
                                                           <div class="modal fade" id="feedbackReplyModal{{ $feedback->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <form action="{{ route('feedback.reply', $feedback->id) }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">
                        Reply to {{ $feedback->name }}
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">To</label>

                        <input
                            type="email"
                            class="form-control"
                            value="{{ $feedback->email }}"
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Reply Message</label>

                        <textarea
                            class="form-control"
                            name="reply"
                            rows="6"
                            required>{{ old('reply', $feedback->reply) }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button class="btn btn-success">
                        Send Reply
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
