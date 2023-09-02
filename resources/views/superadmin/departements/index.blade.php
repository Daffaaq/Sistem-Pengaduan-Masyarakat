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
                @foreach ($departements as $dpt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
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
        </div>
    </div>
@endsection
