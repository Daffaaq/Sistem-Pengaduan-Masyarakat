<!DOCTYPE html>
<html>

<head>
    <title>Edit Departemen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <link href="/css/createdept.css" rel="stylesheet">
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
        <div class="col-lg-5 shadow p-5 bg-light" id="form-all">
            <h2 class="h3 text-center mb-4">Edit Departemen</h2>
            <form action="{{ route('superadmin.departement.update', $departement->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Departemen</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ $departement->name }}" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Email field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ $departement->email }}" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Link Website field -->
                <div class="mb-3">
                    <label for="link_website" class="form-label">Link Website</label>
                    <input type="url" class="form-control @error('link_website') is-invalid @enderror"
                        id="link_website" name="link_website" value="{{ $departement->link_website }}" required>
                    @error('link_website')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Tugas field -->
                <div class="mb-3">
                    <label for="tugas" class="form-label">Tugas</label>
                    <textarea class="form-control @error('tugas') is-invalid @enderror" id="tugas" name="tugas" rows="3"
                        required>{{ $departement->tugas }}</textarea>
                    @error('tugas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitude (Optional)</label>
                    <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude"
                        name="latitude" value="{{ $departement->latitude }}" oninput="setMarkerPosition()">
                    @error('latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude (Optional)</label>
                    <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude"
                        name="longitude" value="{{ $departement->longitude }}" oninput="setMarkerPosition()">
                    @error('longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div id="map" style="height: 400px;"></div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('superadmin.departement.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
</body>

</html>
