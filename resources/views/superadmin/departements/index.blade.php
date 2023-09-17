@extends('superadmin.layouts.master')

@section('styles')
    <style>
        .table td:nth-child(5) {
            max-width: 300px;
            /* Atur lebar maksimal sesuai kebutuhan */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

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
            position: right;
            margin-top: 20px;
            /* Give some space above the pagination links */
        }
    </style>
@endsection

@section('container')
    <div class="row justify-content-end">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <!-- Content -->
                </div>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('superadmin.departement.create') }}"> Input Departemen</a>
                <form action="{{ route('superadmin.departement.import') }}" method="POST" enctype="multipart/form-data"
                    class="d-inline">
                    @csrf
                    <label for="file" class="btn btn-primary" style="margin-left: 10px;">
                        <input type="file" id="file" name="file" style="display:none;">
                        Import Excel
                    </label>
                    <button type="submit">Submit</button> <!-- Add a submit button -->
                </form>
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

            <table class="table table-bordered" style="background-color: #78C1F3">
                <tr>
                    <th>No</th>
                    <th width="auto">nama Departement</th>
                    <th width="auto">email</th>
                    <th width="auto">Link Website</th>
                    <th width="auto">Tugas</th>
                    <th width="auto">Longitude</th>
                    <th width="auto">Latitude</th>
                    <th width="auto">Action</th>
                </tr>
                @foreach ($departements as $key => $dpt)
                    <tr>
                        <td>{{ $departements->firstItem() + $key }}</td>
                        <td>{{ $dpt->name }}</td>
                        <td>{{ $dpt->email }}</td>
                        <td>{{ $dpt->link_website }}</td>
                        <td>
                            @php
                                $tasks = json_decode($dpt->tugas, true);
                            @endphp
                            <ol style="padding-left: 0; list-style-position: inside;">
                                @foreach ($tasks as $task)
                                    <li>{{ $task }}</li>
                                @endforeach
                            </ol>
                        </td>
                        <td>{{ $dpt->longitude }}</td>
                        <td>{{ $dpt->latitude }}</td>
                        <td class="d-flex justify-content-evenly">
                            <form action="{{ route('superadmin.departement.edit', $dpt->id) }}" method="GET"
                                class="d-inline" target="_blank">
                                @csrf
                                <button type="submit" class="btn btn-warning">
                                    <i class="bi bi-pencil-square" style="font-size: 18px;"></i> Edit
                                </button>
                            </form>
                            <form action="{{ route('superadmin.departement.destroy', $dpt->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {{-- {{ $departements->links() }} --}}
            <!-- Pagination Links -->
            <div class="pagination-links">
                {{ $departements->appends(request()->except(['page', '_token']))->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
