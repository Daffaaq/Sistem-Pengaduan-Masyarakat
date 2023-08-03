@extends('masyarakat.layouts.master')
@section('container')
    <style>
        .modal-backdrop.show {
            opacity: .8;
            /* Adjust this value to change the opacity */
            backdrop-filter: blur(1000px);
            /* Adjust this value to change the amount of blur */
        }

        /* Hide the icon for rows without images */
        tr.no-image .fas {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <div class="row justify-content-end">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <!-- Content -->
                </div>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('user.complaints.create') }}"> Ajukan Complaints</a>
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
                {{-- <form action="{{ route('superadmin.complaints.index') }}" method="GET">
                    <div class="form-group">
                        <label for="department">Pilih Departemen:</label>
                        <select name="department" id="department" class="form-control">
                            <option value="">Semua Departemen</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ request('department') == $department->id ? 'selected' : '' }}>{{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form> --}}
                <br>
                <table class="table table-bordered" style="background-color: #78C1F3">
                    <tr>
                        <th width="auto">No</th>
                        <th width="auto">Title</th>
                        <th width="auto">Date</th>
                        <th width="auto">Description</th>
                        <th width="auto">Status</th>
                        <th width="auto">Nama Departemen</th>
                        <th width="auto">Action1</th>
                        <th width="auto">Action2</th>
                    </tr>
                    @foreach ($complaints as $cp)
                        @php
                            $hasImage = $cp->images && $cp->images->image_path;
                        @endphp
                        <tr @if (!$hasImage) class="no-image" @endif>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cp->title }}</td>
                            <td>{{ $cp->complaint_date }}</td>
                            <td>{{ $cp->description }}</td>
                            <td>{{ $cp->status }}</td>
                            <td>{{ $cp->department->name }}</td>
                            <td>
                                <button type="button" class="btn btn-primary view-details" data-id="{{ $cp->id }}"
                                    data-has-image="{{ $cp->images ? 'true' : 'false' }}">
                                    View Details
                                    @if ($cp->images)
                                        <i class="fas fa-exclamation-circle"></i>
                                    @endif
                                </button>
                            </td>
                            <td>
                                <button
                                    onclick="window.open('{{ route('user.complaints.show', ['id' => $cp->id]) }}', '_blank')"
                                    class="btn btn-primary">View Details</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade animate__animated animate__zoomIn" id="complaintModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Complaint Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title"></h5><br>
                            <p class="description"></p>
                            <p class="department"></p>
                            <p class="status"></p>
                            <p class="complaint-date"></p>
                        </div>
                    </div>
                    <div id="map-detail" style="height: 400px;"></div>
                    <div class="row mt-3">
                        <div class="col-md-6 offset-md-3">
                            <div class="card" style="width: 18rem; overflow: hidden;">
                                <div class="card-img-wrapper"
                                    style="height: 15rem; width: 100%; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                    <img src="" class="card-img-top" alt="Complaint Image"
                                        style="object-fit: contain; max-width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        $(document).ready(function() {
            $('.view-details').click(function() {
                // existing code...
            });

            $('#complaintModal').on('hide.bs.modal', function() {
                var modal = $(this);
                modal.removeClass('animate__zoomIn');
                modal.addClass('animate__zoomOut');
            });

            $('#complaintModal').on('hidden.bs.modal', function() {
                var modal = $(this);
                modal.removeClass('animate__zoomOut');
                modal.addClass('animate__zoomIn');
            });

            // Hide the icon for rows without images
            $('.table tbody tr.no-image .fas').hide();
        });
    </script>
    <script>
        var detailMap;

        $(document).ready(function() {
            $('.view-details').click(function() {
                var button = $(this);
                var id = $(this).data('id');

                $.get('/user/user/complaints/' + id + '/details', function(data) {
                    $('#complaintModal .modal-body .card-title').html('Title: ' + data.title);
                    $('#complaintModal .modal-body .description').html('Description: ' + data
                        .description);
                    $('#complaintModal .modal-body .department').html('Department: ' + data
                        .department.name);
                    $('#complaintModal .modal-body .status').html('Status: ' + data.status);
                    $('#complaintModal .modal-body .complaint-date').html('Complaint Date: ' + data
                        .complaint_date);

                    if (detailMap) {
                        // If the map already exists, just update its properties.
                        detailMap.setView([data.latitude, data.longitude], 13);

                        // Clear the existing markers and add a new one at the new location.
                        detailMap.eachLayer(function(layer) {
                            detailMap.removeLayer(layer);
                        });
                    } else {
                        // If the map does not exist, create a new one.
                        detailMap = L.map('map-detail').setView([data.latitude, data.longitude],
                            13);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                        }).addTo(detailMap);
                    }

                    L.marker([data.latitude, data.longitude]).addTo(detailMap);

                    if (data.images && data.images.image_path) {
                        $('#complaintModal .modal-body .card-img-top').attr('src', '/storage/' +
                            data.images.image_path);
                        button.find('.fas').show();
                    } else {
                        $('#complaintModal .modal-body .card-img-top').attr('src', '');
                        button.find('.fas').hide();
                    }

                    $('#complaintModal').modal('show');
                });
            });

            $('#complaintModal').on('shown.bs.modal', function() {
                if (detailMap) {
                    setTimeout(function() {
                        detailMap.invalidateSize();
                    }, 0);
                }
            });
            $('#complaintModal').on('hidden.bs.modal', function() {
                if (detailMap) {
                    detailMap.remove();
                    detailMap = null; // Reset the detailMap variable
                }
            });
        });
    </script>
@endsection
