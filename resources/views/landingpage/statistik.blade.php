<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaduan ke Dinas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        nav {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            height: 64px;
            text-align: center;
        }

        a.nav-link {
            color: black
        }
        
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
        }

        nav a:hover {
            background-color: #0056b3;
            border-radius: 5px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .card-content {
            margin-top: 20px;
        }

        .card-content h3 {
            margin-bottom: 10px;
        }

        .card-content p {
            color: #666;
        }

        .cta-button {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .cta-button a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .cta-button a:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 30px 0;
            text-align: center;
            width: 100%;
        }

        .footer-content {
            margin-bottom: 20px;
        }

        .footer-content img {
            max-height: 200px;
            margin-bottom: 20px;
        }

        .footer-social {
            display: flex;
            justify-content: center;
        }

        .footer-social a {
            display: inline-block;
            margin: 0 10px;
            color: #fff;
            font-size: 20px;
        }

        .widget {
            margin-bottom: 30px;
        }

        .widget-title {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .widget ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .widget ul li {
            margin-bottom: 10px;
        }

        .map-container {
            position: relative;
            width: 100%;
            height: 200px;
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container d-flex align-items-center">
            <!-- Added 'd-flex' and 'align-items-center' -->
            <a class="navbar-brand" href="#">
                <img src="#" alt="" height="30" class="mr-2" />
                <span>SIPMA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tentang') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('statistik') }}">Statistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Pengaduan</h5>
                        <p class="card-text">{{ $totalComplaints }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengaduan Pending</h5>
                        <p class="card-text">{{ $pendingComplaints }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengaduan Progress</h5>
                        <p class="card-text">{{ $inProgressComplaints }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengaduan Resolved</h5>
                        <p class="card-text">{{ $resolvedComplaints }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Diagram Batang -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Diagram Batang</h5>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- Diagram Lingkaran -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Diagram Lingkaran</h5>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer" class="inverted">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="widget">
                            <div class="widget-title">
                                <img src="http://bkd.pasuruankab.go.id/source/2/index.png" alt="logo"
                                    style="max-height: 200px">
                            </div>

                            <div id="histats_counter"></div>
                            <div class="footer-social">
                                <a href="https://www.facebook.com/dikbudmalangkota/?locale=ms_MY"
                                    class="btn btn-facebook" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://www.instagram.com/dikbudmalangkota/" class="btn btn-instagram"
                                    target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="widget">
                            <div class="widget-title">Kantor</div>
                            <ul class="list" style="text-align: left;">
                                <li><a href="#">9RRJ+233, Komplek perkantoran, Karangpanas, Raci, Kec. Bangil,
                                        Pasuruan,
                                        Jawa Timur 67153</a></li>
                                <li><a href="tel:(0343)-429064"><abbr title="Phone">P : (0341)-551333</a></li>
                                <li><a href="https://www.instagram.com/pemkabpasuruan/"><abbr title="instagram">IG :
                                            pemkabpasuruan</a></li>
                                <li><a href="mailto:diskominfo@pasuruankab.go.id">diskominfo@pasuruankab.go.id</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="widget">
                            <div class="widget-title">Map</div>
                            <div class="map-container">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15805.633305161173!2d112.613599!3d-7.956686!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827beffc2665%3A0x9dd38763e9a56b77!2sDinas%20Pendidikan%20dan%20Kebudayaan%20Kota%20Malang!5e0!3m2!1sid!2sid!4v1685023640898!5m2!1sid!2sid"
                                    width="100%" height="100%" style="border: 0;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-center mb-0">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN PASURUAN
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function generateRandomColor() {
            // Menghasilkan nilai acak dalam format RGB
            const r = Math.floor(Math.random() * 256);
            const g = Math.floor(Math.random() * 256);
            const b = Math.floor(Math.random() * 256);
            return `rgba(${r}, ${g}, ${b}, 1)`; // Gunakan nilai alpha 0.5 untuk transparansi
        }
        document.addEventListener("DOMContentLoaded", function() {
            // Data untuk diagram batang
            var data = {
                labels: ["Total Complaints", "Pending", "In Progress", "Resolved"],
                datasets: [{
                    label: "Jumlah Pengaduan",
                    data: [{{ $totalComplaints }}, {{ $pendingComplaints }},
                        {{ $inProgressComplaints }}, {{ $resolvedComplaints }}
                    ],
                    backgroundColor: [
                        generateRandomColor(), // Warna acak untuk bar pertama
                        generateRandomColor(), // Warna acak untuk bar kedua
                        generateRandomColor(), // Warna acak untuk bar ketiga
                        generateRandomColor(), // Warna acak untuk bar keempat
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                    ],
                    borderWidth: 1,
                }],
            };

            // Data untuk diagram lingkaran
            var pieChartData = {
                labels: ["Total Complaints", "Pending", "In Progress", "Resolved"],
                datasets: [{
                    data: [{{ $totalComplaints }}, {{ $pendingComplaints }},
                        {{ $inProgressComplaints }}, {{ $resolvedComplaints }}
                    ],
                    backgroundColor: [
                        generateRandomColor(), // Warna acak untuk bagian pertama
                        generateRandomColor(), // Warna acak untuk bagian kedua
                        generateRandomColor(), // Warna acak untuk bagian ketiga
                        generateRandomColor(), // Warna acak untuk bagian keempat
                    ],
                }],
            };

            // Opsi untuk diagram batang
            var options = {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            };

            // Opsi untuk diagram batang horizontal
            var horizontalBarOptions = {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true,
                    },
                },
            };

            // Inisialisasi dan membuat diagram batang
            var ctx = document.getElementById("barChart").getContext("2d");
            var barChart = new Chart(ctx, {
                type: "bar",
                data: data,
                options: options,
            });


            // Inisialisasi dan membuat diagram lingkaran
            var ctxPie = document.getElementById("pieChart").getContext("2d");
            var pieChart = new Chart(ctxPie, {
                type: "pie",
                data: pieChartData,
                options: options,
            });

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
