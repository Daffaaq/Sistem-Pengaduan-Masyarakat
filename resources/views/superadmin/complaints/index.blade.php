@extends('superadmin.layouts.master')
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
            margin-left: 1000px;
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
                    <div class="form-group">
                        <label for="department">Pilih Departemen:</label>
                        <select name="department" id="department" class="form-control">
                            <option value="">Semua Departemen</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ request('department') == $department->id ? 'selected' : '' }}>{{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
                <br>
                <div class="buttons">
                    <div class="col-lg-6 text-right">
                        <a href="{{ route('superadmin.complaints.cetak_pdf', ['departmentId' => request('department')]) }}"
                            class="custom-button" target="_blank">Cetak PDF</a>
                    </div>
                </div>
                <div class="pagination-container">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="background-color: #78C1F3">
                            <tr>
                                <th width="auto">No</th>
                                <th width="auto">Title</th>
                                <th width="auto">Date</th>
                                <th width="auto">Description</th>
                                <th width="auto">Status</th>
                                <th width="auto">Nama Departemen</th>
                            </tr>
                            @foreach ($complaints as $cp)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cp->title }}</td>
                                    <td>{{ $cp->complaint_date }}</td>
                                    <td>{{ $cp->description }}</td>
                                    <td>{{ $cp->status }}</td>
                                    <td>{{ $cp->department->name }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="pagination-links">
                        {{ $complaints->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
