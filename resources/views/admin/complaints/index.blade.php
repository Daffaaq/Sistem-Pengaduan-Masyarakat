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
                        <th width="auto">Action</th>
                    </tr>
                    @php
                        $resolvedComplaints = [];
                    @endphp
                    @foreach ($complaints as $cp)
                        @if ($cp->status == 'resolved')
                            @php
                                $resolvedComplaints[] = $cp;
                                continue;
                            @endphp
                        @endif
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cp->title }}</td>
                            <td>{{ $cp->complaint_date }}</td>
                            <td>{{ $cp->description }}</td>
                            <td>
                                @if ($cp->status != 'resolved')
                                    <form action="{{ route('admin.complaints.status.update', ['complaint' => $cp->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="pending" {{ $cp->status == 'pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="in progress"
                                                    {{ $cp->status == 'in progress' ? 'selected' : '' }}>In Progress
                                                </option>
                                            </select>
                                        </div>
                                    </form>
                                @else
                                    Resolved
                                @endif
                            </td>
                            <td>
                                @if ($cp->status != 'resolved')
                                    <a href="{{ route('admin.complaints.answer.create', ['complaint' => $cp->id]) }}"
                                        class="btn btn-primary">Tambah Jawaban</a>
                                @else
                                    <button class="btn btn-primary" disabled>Tambah Jawaban</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($resolvedComplaints as $cp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cp->title }}</td>
                            <td>{{ $cp->complaint_date }}</td>
                            <td>{{ $cp->description }}</td>
                            <td>Resolved</td>
                            <td>
                                <button class="btn btn-primary" disabled>Tambah Jawaban</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
