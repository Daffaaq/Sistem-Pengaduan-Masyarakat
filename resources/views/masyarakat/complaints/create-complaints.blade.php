@extends('masyarakat.layouts_baru.index')
@section('container')
    <style>
        .complaint-info {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        .question-mark:hover {
            color: blue;
        }

        .question-mark {
            cursor: pointer;
            color: red;
            font-weight: bold;
            font-size: 20px;
            margin-left: 5px;
        }
    </style>
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
            <h2 class="h3 text-center mb-4">Create Complaint</h2>
            <div class="mb-3" style="text-align: center;">
                <label for="complaint_info" class="form-label" style="font-weight: bold;"">Cara Menyampaikan Pengaduan yang
                    Baik dan Benar <span id="showModal" class="question-mark">?</span></label>
                <div id="complaint_info" class="complaint-info">
                </div>
            </div>


            <!-- Modal Cara Menyampaikan Pengaduan yang Baik dan Benar -->
            <div class="modal fade" id="caraPengaduanModal" tabindex="-1" role="dialog"
                aria-labelledby="caraPengaduanModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="caraPengaduanModalLabel">Cara Menyampaikan Pengaduan yang Baik dan
                                Benar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Isi modal -->
                            <p>Berikut adalah beberapa tips untuk menyampaikan pengaduan yang baik dan benar:</p>
                            <ul>
                                <li>Tuliskan judul pengaduan yang jelas dan singkat.</li>
                                <li>Deskripsikan masalah dengan detail yang memadai.</li>
                                <li>Sertakan bukti atau gambar jika diperlukan.</li>
                                <li>Pilih dinas yang sesuai untuk pengaduan Anda.</li>
                                <li>Periksa kembali informasi sebelum mengirim pengaduan.</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <form id="complaint-create-form" action="{{ route('user.complaints.store') }}" method="POST"
                enctype="multipart/form-data" onsubmit="event.preventDefault(); handleComplaintCreate();">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Complaint Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" required autofocus>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Complaint Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="5" required></textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var descriptionTextarea = document.getElementById('description');
                        var jamSekarang = new Date().getHours();
                        var salam = "";

                        if (jamSekarang >= 0 && jamSekarang < 12) {
                            salam = "Selamat Pagi";
                        } else if (jamSekarang >= 12 && jamSekarang < 18) {
                            salam = "Selamat Siang";
                        } else {
                            salam = "Selamat Malam";
                        }

                        var format = "Assalamualaikum Wr. Wb\n" + salam + "\n\n\n\nTerimakasih Wasalamuaalikum Wr. Wb";
                        descriptionTextarea.value = format;
                    });
                </script>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                        name="image" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="department_id" class="form-label">Department</label>
                    <select class="form-control @error('department_id') is-invalid @enderror" id="department_id"
                        name="department_id" required>
                        <option value="" disabled selected>Select Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitude (Optional)</label>
                    <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude"
                        name="latitude" value="{{ old('latitude') }}" oninput="setMarkerPosition()">
                    @error('latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude (Optional)</label>
                    <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude"
                        name="longitude" value="{{ old('longitude') }}" oninput="setMarkerPosition()">
                    @error('longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('user.complaints.index') }}" class="btn btn-outline-secondary mt-3">Back</a>
                    <button type="submit" class="btn btn-primary mt-3">Create</button>
                </div>
                <div class="mb-3">
                    <label for="imagePreview" class="form-label">Image Preview:</label>
                    <img id="imagePreview" src="#" alt="your image"
                        style="max-width: 100%; max-height: 300px; display: none;" />
                </div>
                <div id="map" style="height: 400px;"></div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add any additional scripts you want to include here -->
    <script>
        // Fungsi untuk menampilkan SweetAlert
        function showSweetAlert(title, text, icon) {
            Swal.fire({
                title: title,
                text: text,
                icon: icon,
            });
        }

        // Fungsi untuk menangani permintaan HTTP dengan menggunakan Fetch API
        function handleComplaintCreate() {
            const form = document.getElementById(
                'complaint-create-form'); // Mendapatkan elemen form dengan ID 'complaint-create-form'
            const formData = new FormData(form); // Membuat objek FormData dari form

            fetch(form.action, {
                    method: 'POST', // Menggunakan metode HTTP POST untuk mengirim data
                    body: formData, // Mengirim data formulir menggunakan objek FormData
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'
                        ) // Mengirim token CSRF yang diperlukan untuk melindungi aplikasi dari serangan CSRF
                    }
                })
                .then(response => response.json()) // Menguraikan respons HTTP sebagai JSON
                .then(data => {
                    if (data.success) {
                        // Tampilkan SweetAlert dengan pesan sukses jika permintaan berhasil
                        showSweetAlert('Hore!', 'Pengaduan Berhasil Dibuat', 'success');
                        // Redirect ke dashboard setelah penundaan singkat (2 detik)
                        setTimeout(() => {
                            window.location.href = '{{ route('user.complaints.index') }}';
                        }, 2000); // 2000 milidetik = 2 detik
                    } else {
                        // Tampilkan SweetAlert dengan pesan kesalahan jika ada kesalahan dalam permintaan
                        showSweetAlert('Oops!', 'Terjadi kesalahan saat Mengajukan Pengaduan.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen tanda tanya (?) dan modal
            var showModal = document.getElementById('showModal');
            var modal = document.getElementById('caraPengaduanModal');

            // Tambahkan event click ke tanda tanya (?)
            showModal.addEventListener('click', function() {
                // Tampilkan modal saat tanda tanya (?) diklik
                $(modal).modal('show');
            });
        });
    </script>
    <script>
        var defaultLatitude = -7.609531; // Latitude default
        var defaultLongitude = 112.828478; // Longitude default
        var map = L.map('map').setView([defaultLatitude, defaultLongitude], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var marker = L.marker([defaultLatitude, defaultLongitude], {
            draggable: true
        }).addTo(map);

        // Tangani perubahan posisi marker
        marker.on('dragend', function(event) {
            var marker = event.target;
            var position = marker.getLatLng();
            // Update nilai latitude dan longitude pada input
            document.getElementById('latitude').value = position.lat;
            document.getElementById('longitude').value = position.lng;
        });

        // Fungsi untuk menyesuaikan posisi marker berdasarkan nilai latitude dan longitude dari inputan
        function setMarkerPosition() {
            var latitude = parseFloat(document.getElementById('latitude').value);
            var longitude = parseFloat(document.getElementById('longitude').value);
            if (!isNaN(latitude) && !isNaN(longitude)) {
                marker.setLatLng([latitude, longitude]);
                map.panTo([latitude, longitude]);
            }
        }

        // Panggil fungsi setMarkerPosition saat halaman dimuat
        setMarkerPosition();
    </script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk membaca URL gambar yang dipilih oleh pengguna
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        // Mengatur atribut 'src' dari elemen dengan ID 'imagePreview' ke URL gambar yang dipilih
                        $('#imagePreview').attr('src', e.target.result);
                        // Mengubah tampilan elemen dengan ID 'imagePreview' menjadi terlihat ('display: block')
                        $('#imagePreview').css('display', 'block');
                    }

                    // Membaca data URL dari gambar yang dipilih
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Menambahkan event listener pada elemen dengan ID 'image' untuk memantau perubahan dalam input berkas
            $("#image").change(function() {
                // Memanggil fungsi readURL() ketika pengguna memilih gambar
                readURL(this);
            });
        });
    </script>
@endsection
