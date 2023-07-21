@extends('superadmin.layouts.master')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="h3 text-center">Complaint Details</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <p>{{ $complaint->title }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="complaint-date" class="form-label">Date</label>
                        <p>{{ $complaint->complaint_date }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <p>{{ $complaint->description }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <p>{{ ucfirst($complaint->status) }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <p>{{ $complaint->department->name }}</p>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('superadmin.complaints.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                    <div id="map" style="width: 600px; height: 400px;"></div>
                    <script>
                        const map = L.map('map').setView([-7.606438219308771, 112.83038532845767], 13);
                        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
