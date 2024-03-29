@include('superadmin.layouts.header')

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('AdminLTE') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
        width="60">
</div>

@include('superadmin.layouts.navbar')

@include('superadmin.layouts.sidebar')
{{-- @include('superadmin.layouts.content') --}}

@yield('container')

@include('superadmin.layouts.footer')
