@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>

                    <div class="card-body">
                        <!-- ... (Tampilkan pesan error jika ada) ... -->

                        <form method="POST" action="{{ route('email.change') }}">

                            @csrf

                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                            <div class="form-group">
                                <label for="new_email">Email Baru:</label>
                                <input type="email" id="new_email" name="new_email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ubah Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
