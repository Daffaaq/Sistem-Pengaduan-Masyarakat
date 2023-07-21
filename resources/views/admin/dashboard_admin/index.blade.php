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
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Complaints</h5>
                                <p class="card-text">{{ $totalComplaints }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <h5 class="card-title">Pending Complaints</h5>
                                <p class="card-text">{{ $pendingComplaints }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-warning text-dark">
                            <div class="card-body">
                                <h5 class="card-title">In Progress Complaints</h5>
                                <p class="card-text">{{ $inProgressComplaints }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Resolved Complaints</h5>
                                <p class="card-text">{{ $resolvedComplaints }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5 class="card-title">Answered Complaints</h5>
                <p class="card-text">{{ $answeredComplaints }}</p>
            </div>
        </div>
    </div>
</div> --}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    Complaints Chart (Bar Chart)
                                </div>
                                <div class="card-body">
                                    <canvas id="complaintsBarChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    Complaints Chart (Pie Chart)
                                </div>
                                <div class="card-body">
                                    <canvas id="complaintsPieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
        <script>
            // Chart data
            var totalComplaints = {{ $totalComplaints }};
            var pendingComplaints = {{ $pendingComplaints }};
            var inProgressComplaints = {{ $inProgressComplaints }};
            var resolvedComplaints = {{ $resolvedComplaints }};

            // Bar Chart
            var complaintsBarChart = document.getElementById('complaintsBarChart').getContext('2d');
            var barChart = new Chart(complaintsBarChart, {
                type: 'bar',
                data: {
                    labels: ['Total', 'Pending', 'In Progress', 'Resolved'],
                    datasets: [{
                        label: 'Complaints',
                        data: [totalComplaints, pendingComplaints, inProgressComplaints, resolvedComplaints],
                        backgroundColor: ['rgba(0, 123, 255, 0.8)', 'rgba(255, 0, 0, 0.8)',
                            'rgba(255, 193, 7, 0.8)', 'rgba(40, 167, 69, 0.8)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Pie Chart
            var complaintsPieChart = document.getElementById('complaintsPieChart').getContext('2d');
            var pieChart = new Chart(complaintsPieChart, {
                type: 'pie',
                data: {
                    labels: ['Pending', 'In Progress', 'Resolved'],
                    datasets: [{
                        label: 'Complaints',
                        data: [pendingComplaints, inProgressComplaints, resolvedComplaints],
                        backgroundColor: ['rgba(255, 0, 0, 0.8)',
                            'rgba(255, 193, 7, 0.8)', 'rgba(40, 167, 69, 0.8)'
                        ]
                    }]
                },
                options: {
                    responsive: true
                }
            });
        </script>
    @endsection
