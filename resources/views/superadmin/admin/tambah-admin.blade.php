<!DOCTYPE html>
<html>

<head>
    <title>Tambah User</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/createadm.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5 d-flex justify-content-center">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-lg-6 shadow p-4 bg-light" id="form-all">
            <h2 class="h3 text-center mb-4">Tambah User</h2>
            <form action="{{ route('superadmin.admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="department_id" class="form-label">Departemen</label>
                    <select class="form-control @error('department_id') is-invalid @enderror" id="department_id"
                        name="department_id" required>
                        <option value="">Pilih Departemen</option>
                        @foreach ($departements as $departemen)
                            <option value="{{ $departemen->id }}">{{ $departemen->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role" class="form-label">Role User</label>
                    <input type="text" class="form-control" id="role" name="role" value="admin" disabled>
                    <small class="form-text text-muted">The role will be set as "admin" by default.</small>
                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('superadmin.admin.index') }}" class="btn btn-outline-secondary mt-3">Kembali</a>
                    <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
