@extends('admin.layouts.master')
@section('container')
    <div class="row justify-content-end">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <!-- Content -->
                    <h1>Selamat Datang {{ $departmentName }}</h1>
                </div>
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
                {{-- nantinya isinya chart --}}
            </div>
        </div>
    </div>
@endsection
