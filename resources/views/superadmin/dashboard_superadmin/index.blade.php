@extends('superadmin.layouts.master')

@section('container')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalComplaints }}</h3>

                                <p>Total Pengaduan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $pendingComplaints }}</h3>

                                <p>Complaint Pending</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-information"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $inProgressComplaints }}</h3>

                                <p>Complaint In Progress</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-navigate"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $resolvedComplaints }}</h3>

                                <p>Complaint Resolved</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-checkmark"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalLikes + $totalDislikes }}</h3>

                                <p>Total Polling</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalLikes }}</h3>

                                <p>Total Like</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-heart"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $totalDislikes }}</h3>

                                <p>Total Dislike</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-sad"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        {{-- <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $resolvedComplaints }}</h3>

                                <p>Complaint Resolved</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>

                        </div> --}}
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Charts
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#sales-chart" data-toggle="tab">Pengaduan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="#revenue-chart" data-toggle="tab">Polling</a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane" id="revenue-chart"
                                        style="position: relative; height: 300px;">
                                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                    <div class="chart tab-pane active" id="sales-chart"
                                        style="position: relative; height: 300px;">
                                        <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- solid sales graph -->
                        <div class="card bg-gradient-info">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-th mr-1"></i>
                                    Charts
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            {{-- <div class="card-body">
                                <canvas class="chart" id="line-chart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div> --}}
                            <!-- /.card-body -->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    {{-- <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true"
                                            value="{{ $totalComplaints }}" data-width="60" data-height="60"
                                            data-fgColor="#39CCCC">

                                        <div class="text-white">Total Pengaduan</div>
                                    </div> --}}
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true"
                                            value="{{ $pendingComplaints }}" data-width="100" data-height="100"
                                            data-fgColor="#39CCCC">

                                        <div class="text-white">Pengaduan Pending</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true"
                                            value="{{ $inProgressComplaints }}" data-width="100" data-height="100"
                                            data-fgColor="#39CCCC">

                                        <div class="text-white">Pengaduan In Progress</div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true"
                                            value="{{ $resolvedComplaints }}" data-width="100" data-height="100"
                                            data-fgColor="#39CCCC">

                                        <div class="text-white">Pengaduan Resolved</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    {{-- <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true"
                                            value="{{ $totalComplaints }}" data-width="60" data-height="60"
                                            data-fgColor="#39CCCC">

                                        <div class="text-white">Total Pengaduan</div>
                                    </div> --}}
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true"
                                            value="{{ $totalLikes }}" data-width="100" data-height="100"
                                            data-fgColor="#39CCCC">

                                        <div class="text-white">Pengaduan Pending</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        {{-- <input type="text" class="knob" data-readonly="true"
                                            value="{{ $totalDislikes }}" data-width="100" data-height="100"
                                            data-fgColor="#39CCCC">

                                        <div class="text-white">Pengaduan In Progress</div> --}}
                                    </div>
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true"
                                            value="{{ $totalDislikes }}" data-width="100" data-height="100"
                                            data-fgColor="#39CCCC">

                                        <div class="text-white">Pengaduan In Progress</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        var totalComplaints = {!! json_encode($totalComplaints) !!};
        var pendingComplaints = {!! json_encode($pendingComplaints) !!};
        var inProgressComplaints = {!! json_encode($inProgressComplaints) !!};
        var resolvedComplaints = {!! json_encode($resolvedComplaints) !!};
        var totalLikes = {!! json_encode($totalLikes) !!};
        var totalDislikes = {!! json_encode($totalDislikes) !!};
        var totalpolls = {!! json_encode($totalLikes + $totalDislikes) !!};
    </script>
@endsection
