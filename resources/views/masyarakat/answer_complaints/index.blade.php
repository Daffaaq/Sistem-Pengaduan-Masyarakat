@extends('masyarakat.layouts_baru.index')

@section('container')
    {{-- <div class="row justify-content-end"> --}}
    <div class="col-lg-10">
        <div class="text-center">
            <h2>List of Complaints and Answers</h2>
            <table class="table table-bordered" style="background-color: #F3E99F">
                <tr>
                    <th width="auto">No</th>
                    <th width="auto">Title</th>
                    <th width="auto">Complaint Time</th>
                    <th width="auto">Complaint Date</th>
                    <th width="auto">Description</th>
                    <th width="auto">Status</th>
                    <th width="auto">Department</th>
                    <th width="auto">Answer</th>
                    <th width="auto">Answer Date</th>
                    <th width="auto">Answer Time</th>
                </tr>
                @foreach ($complaints as $complaint)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $complaint->title }}</td>
                        <td>{{ $complaint->time }}</td>
                        <td>{{ $complaint->complaint_date }}</td>
                        <td>{{ $complaint->description }}</td>
                        <td>{{ $complaint->status }}</td>
                        <td>{{ $complaint->department->name }}</td>
                        <td>{{ $complaint->answerComplaint->isNotEmpty() ? $complaint->answerComplaint[0]->answer : '-' }}
                        </td>
                        <td>{{ $complaint->answerComplaint->isNotEmpty() ? $complaint->answerComplaint[0]->answer_complaint_date : '-' }}
                        </td>
                        <td>{{ $complaint->answerComplaint->isNotEmpty() ? $complaint->answerComplaint[0]->time : '-' }}
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
    </div>
@endsection
