@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>

                    <div class="card-body">
                        <!-- ... (Tampilkan pesan error jika ada) ... -->

                        <form action="{{ route('password.handleReset') }}" method="post">
                            @csrf

                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="form-group">
                                <label for="password">Password Baru:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ubah Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
