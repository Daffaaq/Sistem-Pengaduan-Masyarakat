@extends('superadmin.layouts.master')
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
            <div class="text-center">
                <table class="table table-bordered" style="background-color: grey">
                    <tr>
                        <th>No</th>
                        <th>nama Departement</th>
                        <th width="auto">Action</th>
                    </tr>
                    @foreach ($departements as $dpt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dpt->name }}</td>
                            <td>{{ $dpt->email }}</td>
                            <td class="d-flex justify-content-evenly">
                                {{-- <a href="/dashboard_superadmin/users/{{ $dpt->id }}" class="badge bg-success"><i
                                        class="bi bi-eye-fill" style="font-size: 18px;"></i></a>
                                <a href="{{ route('users.edit', $dpt->id) }}" class="badge bg-warning"><i
                                        class="bi bi-pencil-square" style="font-size: 18px;"></i></a> --}}
                                <form action="{{ route('superadmin.departement.destroy', $dpt->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                </form>
                                {{-- <!-- <a href="barang/{{ $dpt->id }}" class="badge bg-warning"><i class="bi bi-pencil-square" style="font-size: 18px;"></i></a> --> --}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
