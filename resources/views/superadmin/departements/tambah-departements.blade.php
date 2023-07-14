<div class="container mt-5 mb-5 d-flex justify-content-center">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-lg-5 shadow p-5 bg-light" id="form-all">
        <h2 class="h3 text-center mb-4">Tambah Departemen</h2>
        <form action="{{ route('superadmin.departement.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Departemen</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" required autofocus>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('superadmin.departement.index') }}" class="btn btn-info mt-3">Kembali</a>
                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
            </div>
        </form>
    </div>
</div>
