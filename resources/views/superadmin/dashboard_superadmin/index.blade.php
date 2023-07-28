@extends('superadmin.layouts.master')

@section('container')
    <style>
        /* Center the card headers */
        .card-header {
            text-align: center;
        }

        /* Add some spacing between the cards and the row */
        .row {
            margin-bottom: 20px;
        }

        /* Adjust the width of the charts to fit the columns */
        canvas {
            width: 100% !important;
            height: auto !important;
        }
    </style>

    <div class="row justify-content-end">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <!-- Content -->
                    {{-- <h1>Selamat Datang {{ $departmentName }}</h1> --}}
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
                    <!-- Total Complaints -->
                    <div class="col-sm-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Complaints</h5>
                                <p class="card-text">{{ $totalComplaints }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Pending Complaints -->
                    <div class="col-sm-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <h5 class="card-title">Pending Complaints</h5>
                                <p class="card-text">{{ $pendingComplaints }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- In Progress Complaints -->
                    <div class="col-sm-3">
                        <div class="card bg-warning text-dark">
                            <div class="card-body">
                                <h5 class="card-title">In Progress Complaints</h5>
                                <p class="card-text">{{ $inProgressComplaints }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Resolved Complaints -->
                    <div class="col-sm-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Resolved Complaints</h5>
                                <p class="card-text">{{ $resolvedComplaints }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Total Likes -->
                    <div class="col-sm-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Like</h5>
                                <p class="card-text">{{ $totalLikes }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Total Dislikes -->
                    <div class="col-sm-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Dislike</h5>
                                <p class="card-text">{{ $totalDislikes }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        {{-- <div class="card bg-warning text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Total Likes & Dislikes</h5>
                                <p class="card-text">{{ $totalLikes + $totalDislikes }}</p>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Total Likes & Dislikes -->
                    <div class="col-sm-3">
                        <div class="card bg-success text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Total Likes & Dislikes</h5>
                                <p class="card-text">{{ $totalLikes + $totalDislikes }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Empty Placeholder -->
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header text-center">
                                Poling Chart (Pie Chart)
                            </div>
                            <div class="card-body">
                                <canvas id="complaintsPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header text-center">
                                Poling Chart (Pie Chart)
                            </div>
                            <div class="card-body">
                                <canvas id="pollingPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
    <script>
        // Function to generate random color
        function getRandomColor() {
            // Menghasilkan nilai acak dalam format RGB
            const r = Math.floor(Math.random() * 256);
            const g = Math.floor(Math.random() * 256);
            const b = Math.floor(Math.random() * 256);
            return `rgba(${r}, ${g}, ${b}, 1)`; // Gunakan nilai alpha 0.5 untuk transparansi
        }

        // Function to convert hex to RGB
        function hexToRgb(hex) {
            var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            return result ? 'rgba(' + parseInt(result[1], 16) + ',' + parseInt(result[2], 16) + ',' + parseInt(result[3],
                16) + ',1)' : null;
        }
        // Chart data
        var totalComplaints = {{ $totalComplaints }};
        var pendingComplaints = {{ $pendingComplaints }};
        var inProgressComplaints = {{ $inProgressComplaints }};
        var resolvedComplaints = {{ $resolvedComplaints }};
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
    <script>
        // Chart data
        var totalLikes = {{ $totalLikes }};
        var totalDislikes = {{ $totalDislikes }};
        // Pie Chart
        var pollingPieChart = document.getElementById('pollingPieChart').getContext('2d');
        var pieChart = new Chart(pollingPieChart, {
            type: 'pie',
            data: {
                labels: ['Likes', 'Dislikes'],
                datasets: [{
                    label: 'Likes & Dislikes',
                    data: [totalLikes, totalDislikes],
                    backgroundColor: [getRandomColor(), getRandomColor()],
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endsection
