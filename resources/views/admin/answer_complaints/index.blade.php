@extends('admin.layouts.master')
@section('container')
    <div class="row justify-content-end">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <!-- Content -->
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-error">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="text-center">
                <form action="{{ route('superadmin.complaints.index') }}" method="GET">
                    <!-- Add any necessary form elements here -->
                </form>
                <br>
                <table class="table table-bordered" style="background-color: #78C1F3">
                    <tr>
                        <th width="auto">No</th>
                        <th width="auto">Title</th>
                        <th width="auto">Date</th>
                        <th width="auto">Description</th>
                        <th width="auto">Status</th>
                        <th width="auto">answer</th>
                    </tr>
                    @foreach ($answers as $answer)
                        @if ($answer->complaint->status === 'resolved')
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $answer->complaint->title }}</td>
                                <td>{{ $answer->complaint->complaint_date }}</td>
                                <td>{{ $answer->complaint->description }}</td>
                                <td>
                                    Resolved
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td></td>
                                <td>{{ $answer->answer_complaint_date }}</td>
                                {{-- <td>{{ $answer->answer }}</td> --}}
                                <td></td>
                                <td></td>
                                <td>{{ $answer->answer }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
