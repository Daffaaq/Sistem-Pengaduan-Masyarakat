@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center">
    <h3 class="mb-3">Email Anda adalah: {{ $email }}</h3>
    <button onclick="window.location='{{ route('login') }}'" class="btn btn-primary">Kembali ke Halaman Login</button>
</div>
@endsection
