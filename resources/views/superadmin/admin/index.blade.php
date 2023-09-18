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
            <form action="{{ route('superadmin.admin.index') }}" method="GET" id="searchForm">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Cari admin...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('superadmin.admin.create') }}"> Input admin</a>
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
                <table class="table table-bordered" style="background-color: #78C1F3">
                    <tr>
                        <th>No</th>
                        <th>nama</th>
                        <th>email</th>
                        <th>nama Departements</th>
                        <th width="auto">Action</th>
                    </tr>
                    @foreach ($admins as $key => $admin)
                        <tr>
                            <td>{{ $admins->firstItem() + $key }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->department->name }}</td>
                            <td class="d-flex justify-content-evenly">
                                {{-- <a href="/dashboard_superadmin/users/{{ $dpt->id }}" class="badge bg-success"><i
                                        class="bi bi-eye-fill" style="font-size: 18px;"></i></a> --}}
                                <form action="{{ route('superadmin.admin.edit', $admin->id) }}" method="GET"
                                    class="d-inline" target="_blank">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">
                                        <i class="bi bi-pencil-square" style="font-size: 18px;"></i> Edit
                                    </button>
                                </form>
                                <form action="{{ route('superadmin.admin.destroy', $admin->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="pagination-links">
                    {{ $admins->appends(request()->except(['page', '_token']))->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input[name="search"]').on('input', function () {
                clearTimeout(this.timer);
                this.timer = setTimeout(function () {
                    $('#searchForm').submit();
                }, 1000); // Ubah angka ini sesuai dengan preferensi Anda
            });
        });
    </script>
    @if (session('no-result'))
        <script>
            alert('{{ session('no-result') }}');
        </script>
    @endif
    {{-- <script>
        // Tangkap elemen input pencarian
        const searchInput = document.querySelector('input[name="search"]');

        // Tambahkan event listener untuk input
        searchInput.addEventListener('input', function() {
            // Set timeout untuk menunda pengiriman permintaan pencarian
            clearTimeout(this.timer);

            // Mulai hitung ulang setelah pengguna selesai mengetik
            this.timer = setTimeout(() => {
                document.getElementById('searchForm').submit(); // Kirim formulir pencarian
            }, 1000); // Ubah angka ini sesuai dengan preferensi Anda
        });
    </script> --}}
@endsection
