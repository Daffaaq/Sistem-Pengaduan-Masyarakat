@extends('admin.layouts.master')
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
    <div class="row justify-content-end">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <!-- Content -->
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
                <form action="{{ route('superadmin.complaints.index') }}" method="GET">
                </form>
                <br>
                <table class="table table-bordered" style="background-color: grey">
                    <tr>
                        <th width="auto">No</th>
                        <th width="auto">Title</th>
                        <th width="auto">Time</th>
                        <th width="auto">Date</th>
                        <th width="auto">Description</th>
                        <th width="auto">Status</th>
                        <th width="auto">Action</th>
                    </tr>
                    @php
                        $resolvedComplaints = [];
                    @endphp
                    @foreach ($complaints as $cp)
                        @if ($cp->status == 'resolved')
                            @php
                                $resolvedComplaints[] = $cp;
                                continue;
                            @endphp
                        @endif
                        @php
                            $hasImage = $cp->images && $cp->images->image_path;
                        @endphp
                        <tr @if (!$hasImage) class="no-image" @endif>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cp->title }}</td>
                            <td>{{ $cp->time }}</td>
                            <td>{{ $cp->complaint_date }}</td>
                            <td>{{ $cp->description }}</td>
                            <td>
                                @if ($cp->status != 'resolved')
                                    <form action="{{ route('admin.complaints.status.update', ['complaint' => $cp->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="pending" {{ $cp->status == 'pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="in progress"
                                                    {{ $cp->status == 'in progress' ? 'selected' : '' }}>In Progress
                                                </option>
                                            </select>
                                        </div>
                                    </form>
                                @else
                                    Resolved
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-info btn-detail btn-sm" data-id="{{ $cp->id }}"
                                    data-has-image="{{ $cp->images ? 'true' : 'false' }}">Detail @if ($cp->images)
                                        <i class="fas fa-exclamation-circle"></i>
                                    @endif </button>
                                @if ($cp->status != 'resolved')
                                    <a href="{{ route('admin.complaints.answer.create', ['complaint' => $cp->id]) }}"
                                        class="btn btn-primary btn-sm">Tambah Jawaban</a>
                                @else
                                    <button class="btn btn-primary btn-sm" disabled>Tambah Jawaban</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($resolvedComplaints as $cp)
                        @php
                            $hasImage = $cp->images && $cp->images->image_path;
                        @endphp
                        <tr @if (!$hasImage) class="no-image" @endif>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cp->title }}</td>
                            <td>{{ $cp->time }}</td>
                            <td>{{ $cp->complaint_date }}</td>
                            <td>{{ $cp->description }}</td>
                            <td>Resolved</td>
                            <td>
                                <button class="btn btn-info btn-detail btn-sm"
                                    data-id="{{ $cp->id }}"data-has-image="{{ $cp->images ? 'true' : 'false' }}">Detail
                                    @if ($cp->images)
                                        <i class="fas fa-exclamation-circle"></i>
                                    @endif
                                </button>
                                <button class="btn btn-primary btn-sm" disabled>Tambah Jawaban</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
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
                            <p class="status"></p>
                            <p class="complaint-date"></p>
                        </div>
                    </div>
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
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        // Function to close the modal
        function closeModal() {
            var modal = document.getElementById('complaintModal');
            modal.classList.remove('animate__zoomIn');
            modal.classList.add('animate__zoomOut');
            setTimeout(function() {
                modal.classList.remove('animate__zoomOut');
                modal.classList.add('animate__zoomIn');
                $('#complaintModal').modal('hide');
            }, 100); // Adjust the delay time as needed (300ms in this example)
        }

        // Handle the view details button click
        document.querySelectorAll('.btn-detail').forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        document.querySelector('#complaintModal .modal-body .card-title').textContent =
                            'Title: ' + data.complaint.title;
                        document.querySelector('#complaintModal .modal-body .description').textContent =
                            'Description: ' + data.complaint.description;
                        document.querySelector('#complaintModal .modal-body .status').textContent =
                            'Status: ' + data.complaint.status;
                        document.querySelector('#complaintModal .modal-body .complaint-date')
                            .textContent = 'Complaint Date: ' + data.complaint.complaint_date;
                        if (data.images) {
                            $('#complaintModal .modal-body .card-img-top').attr('src', '/storage/' +
                                data.images.image_path);
                        } else {
                            $('#complaintModal .modal-body .card-img-top').attr('src', '');
                        }
                        $('#complaintModal').modal('show');
                    }
                };
                xhr.open('GET', '/admin/dashboard_admin/complaints/' + id + '/detail', true);
                xhr.send();
                // If the button has an image, remove the exclamation icon after it's clicked
                if (this.getAttribute('data-has-image') === 'true') {
                    this.querySelector('i').remove();

                    // Show the exclamation icon again after 5 seconds
                    setTimeout(function() {
                        button.insertAdjacentHTML('beforeend',
                            '<i class="fas fa-exclamation-circle"></i>');
                    }, 5000);
                }
            });
        });
    </script>
@endsection
