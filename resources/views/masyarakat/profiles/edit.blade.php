@extends('masyarakat.layouts_baru.index')
@section('container')
    <style>
        /* Tambahkan gaya untuk pop-up di sini */
        .popup {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            z-index: 9999;
        }
    </style>
    <div class="container">
        <div id="dashboard-success-popup" class="popup" style="display: none;">
            Profil berhasil diperbarui.
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profil</div>

                    <div class="card-body">
                        <form id="profile-update-form" method="POST"
                            action="{{ route('user.profiles.update', ['id' => $user->id]) }}"
                            onsubmit="event.preventDefault(); handleProfileUpdate();">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Alamat Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email', $user->email) }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section> <!-- Pastikan penutup section ada di sini -->

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
    <script>
        // Fungsi untuk menampilkan SweetAlert
        function showSweetAlert(title, text, icon) {
            Swal.fire({
                title: title,
                text: text,
                icon: icon,
            });
        }

        function showDashboardSuccessPopup() {
            const popup = document.getElementById('dashboard-success-popup');
            popup.style.display = 'block';

            // Sembunyikan pop-up setelah beberapa detik (misalnya, 3 detik)
            setTimeout(() => {
                popup.style.display = 'none';
            }, 3000); // 3000 milidetik = 3 detik
        }
        // Fungsi untuk menangani permintaan HTTP dengan menggunakan Fetch API
        function handleProfileUpdate() {
            const form = document.getElementById('profile-update-form');
            const formData = new FormData(form);

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json()) // Parse respons sebagai JSON
                .then(data => {
                    if (data.success) {
                        // Tampilkan SweetAlert dengan pesan sukses
                        showSweetAlert('Hore!', 'Profil berhasil diperbarui.', 'success');
                        // Redirect to the dashboard after a short delay
                        setTimeout(() => {
                            window.location.href = '{{ route('user.dashboard') }}';
                        }, 2000); // 2000 milidetik = 2 detik
                    } else {
                        // Tampilkan SweetAlert dengan pesan error jika ada kesalahan
                        showSweetAlert('Oops!', 'Terjadi kesalahan saat memperbarui profil.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
@endsection
