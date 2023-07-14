@include('superadmin.layouts.master')
@section('container')
    <div class="container mt-3">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow my-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary fs-3"><strong>List Data Admin</strong></h6>
                <div class="d-flex">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-white"
                                href="{{ route('users.create') }}">Tambah Admin</a></button>
                        {{-- <button type="button" class="btn btn-primary"><a class="text-decoration-none text-white" href="/dashboard/cetak-barang">Cetak Data Wisata</a></button> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>email</th>
                            <th>Departement</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- @dd($wisata); --}}
                        {{-- @foreach ($users as $b)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $b->name }}</td>
                                <td>{{ $b->email }}</td> --}}
                                {{-- <td> <img src="{{asset('storage/' .$b->gambar)}}" class="mx-auto d-block" style="max-width: 100%;" alt="foto-produk"></td> --}}

                                <td class="d-flex justify-content-evenly">
                                    <a href="/dashboard_superadmin/users/{{ $b->id }}" class="badge bg-success"><i
                                            class="bi bi-eye-fill" style="font-size: 18px;"></i></a>
                                    <a href="{{ route('users.edit', $b->id) }}" class="badge bg-warning"><i
                                            class="bi bi-pencil-square" style="font-size: 18px;"></i></a>
                                    <form action="/dashboard_superadmin/users/{{ $b->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('beneran mau hapus?')"><i class="bi bi-trash"
                                                style="font-size: 18px;"></i></button>
                                    </form>

                                    <!-- <a href="barang/{{ $b->id }}" class="badge bg-warning"><i class="bi bi-pencil-square" style="font-size: 18px;"></i></a> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
