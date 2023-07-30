<!-- resources/views/masyarakat/complaints/show-complaint.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Complaint Details
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $complaint->title }}</h5>
                        <p class="card-text">{{ $complaint->description }}</p>
                        <p class="card-text">Department: {{ $complaint->department->name }}</p>
                        <p class="card-text">Status: {{ ucfirst($complaint->status) }}</p>
                        <p class="card-text">Complaint Date: {{ $complaint->complaint_date }}</p>
                        @if ($complaint->images)
                            <img src="{{ Storage::url($complaint->images->image_path) }}" alt="Complaint Image"
                                class="img-fluid mt-3">
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('user.complaints.index') }}" class="btn btn-secondary">Back to Complaints</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
