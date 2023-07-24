@extends('masyarakat.layouts.master')

@section('container')
<div class="row justify-content-end">
    <div class="col-lg-10">
        <div class="text-center">
            <h2>List of Complaints and Answers</h2>
            <table class="table table-bordered" style="background-color: #78C1F3">
                <tr>
                    <th width="auto">No</th>
                    <th width="auto">Title</th>
                    <th width="auto">Date</th>
                    <th width="auto">Description</th>
                    <th width="auto">Status</th>
                    <th width="auto">Department</th>
                    <th width="auto">Answer</th>
                    <th width="auto">Answer Date</th>
                </tr>
                @foreach ($complaints as $complaint)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $complaint->title }}</td>
        <td>{{ $complaint->complaint_date }}</td>
        <td>{{ $complaint->description }}</td>
        <td>{{ $complaint->status }}</td>
        <td>{{ $complaint->department->name }}</td>
        <td>{{ $complaint->answerComplaint->isNotEmpty() ? $complaint->answerComplaint[0]->answer : '-' }}</td>
        <td>{{ $complaint->answerComplaint->isNotEmpty() ? $complaint->answerComplaint[0]->answer_complaint_date : '-' }}</td>
    </tr>
@endforeach

            </table>
        </div>
    </div>
</div>
@endsection
