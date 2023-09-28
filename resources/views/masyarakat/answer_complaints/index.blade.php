@extends('masyarakat.layouts_baru.index')

@section('container')
    <style>
        /* Remove arrow icons from Bootstrap pagination */
        .pagination .page-item {
            border-radius: 0 !important;
        }

        .pagination .page-link {
            padding: 0.5rem 0.75rem !important;
        }

        .pagination .page-item .page-link:hover,
        .pagination .page-item.active .page-link {
            background-color: greenyellow !important;
            border-color: #78C1F3 !important;
        }

        .buttons {
            margin-left: 1070px;
        }

        /* Custom styles for pagination container */
        .pagination-container {
            position: relative;
        }

        .pagination-links {
            position: relative;
            margin-left: 850px;
            bottom: 0;
            right: 0;
        }

        /* Button style */
        .custom-button {
            display: inline-block;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            border: 1px solid #78C1F3;
            border-radius: 0.25rem;
            background-color: greenyellow;
            color: #fff;
            cursor: pointer;
        }

        .custom-button:hover {
            background-color: #38a169;
            border-color: #38a169;
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-center">
                <h2>List Jawaban Pengaduan</h2>
                <table class="table table-bordered" style="background-color: #F3E99F">
                    <tr>
                        <th width="auto">No</th>
                        <th width="auto">Title</th>
                        <th width="auto">Complaint Time</th>
                        <th width="auto">Complaint Date</th>
                        <th width="auto">Description</th>
                        <th width="auto">Status</th>
                        <th width="auto">Department</th>
                        <th width="auto">Answer Date</th>
                        <th width="auto">Answer Time</th>
                        <th width="auto">Action1</th>
                    </tr>
                    @forelse ($complaints as $key => $complaint)
                        <tr>
                            <td>{{ ($complaints->currentPage() - 1) * $complaints->perPage() + $key + 1 }}</td>
                            <td>{{ $complaint->title }}</td>
                            <td>{{ $complaint->time }}</td>
                            <td>{{ $complaint->complaint_date }}</td>
                            <td>{{ $complaint->description }}</td>
                            <td>{{ $complaint->status }}</td>
                            <td>{{ $complaint->department->name }}</td>
                            <td>{{ $complaint->answerComplaint[0]->answer_complaint_date }}</td>
                            <td>{{ $complaint->answerComplaint[0]->time }}</td>
                            <td>
                                <button type="button" class="btn btn-primary view-answer" data-toggle="modal"
                                    data-target="#answerModal{{ $complaint->id }}">
                                    View Answer
                                </button>
                            </td>
                        </tr>
                        <!-- Modal untuk Jawaban -->
                        <div class="modal fade" id="answerModal{{ $complaint->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="answerModalLabel{{ $complaint->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="answerModalLabel{{ $complaint->id }}">Jawaban Pengaduan
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Tampilkan jawaban pengaduan di sini -->
                                        <div style="text-align: justify; margin: 20px;">
                                            {{ $complaint->answerComplaint[0]->answer }}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Mohon maaf, pengaduan Anda belum dijawab.</td>
                        </tr>
                    @endforelse
                </table>
                <div class="pagination-links">
                    {{ $complaints->appends(request()->except(['page', '_token']))->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
