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
                </form>
                <br>
                <table class="table table-bordered" style="background-color: grey">
                    <tr>
                        <th width="auto">No</th>
                        <th width="auto">Title</th>
                        <th width="auto">Date</th>
                        <th width="auto">Description</th>
                        <th width="auto">Status</th>
                    </tr>
                    @foreach ($complaints as $cp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cp->title }}</td>
                            <td>{{ $cp->complaint_date }}</td>
                            <td>{{ $cp->description }}</td>
                            <td>{{ $cp->status }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
