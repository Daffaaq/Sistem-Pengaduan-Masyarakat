<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIPMA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha
  * Updated: Jul 05 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">SIPMA</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    {{-- <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li> --}}
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link   scrollto" href="#statistik">Statistik</a></li>
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    {{-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> --}}
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Pelayanan Masyarakat Lebih Baik, SIPMA Siap Melayani!</h1>
                    <h2>Ajukan Pengaduanmu</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{ route('register') }}" class="btn-get-started">Get Started</a>
                        {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img text-center" data-aos="zoom-in" data-aos-delay="400">
                    <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    {{-- <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                    </div> --}}

                </div>

            </div>
        </section><!-- End Cliens Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About Us</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p style="text-align: justify;">
                            sistem pelayanan masyarakat yang berkomitmen untuk memberikan layanan terbaik kepada seluruh
                            warga negara. Dengan semangat pelayanan yang unggul, kami bertekad untuk meningkatkan
                            kualitas hidup masyarakat melalui aksesibilitas, efisiensi, dan kepedulian.
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Pelayanan Unggul: Memberikan layanan dengan
                                profesionalisme, integritas, dan rasa tanggung jawab tinggi.</li>
                            <li><i class="ri-check-double-line"></i> Inovasi: Mengadopsi teknologi dan metode terbaru
                                untuk terus meningkatkan kualitas dan efisiensi layanan.</li>
                            <li><i class="ri-check-double-line"></i> Kolaborasi: Bekerja sama dengan berbagai pihak
                                untuk mencapai tujuan bersama dan mendukung kemajuan masyarakat.</li>
                            <li><i class="ri-check-double-line"></i>Kolaborasi: Bekerja sama dengan berbagai pihak untuk
                                mencapai tujuan bersama dan mendukung kemajuan masyarakat.</li>
                            <li><i class="ri-check-double-line"></i>Transparansi: Menjaga keterbukaan dalam proses
                                pelayanan dan pengambilan keputusan.</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p style="text-align: justify;">
                            Kami percaya bahwa pelayanan masyarakat yang berkualitas adalah kunci untuk membangun
                            masyarakat yang lebih maju dan sejahtera. Setiap langkah kecil yang kami ambil untuk
                            memberikan layanan yang lebih baik merupakan kontribusi nyata bagi kemajuan masyarakat
                            secara keseluruhan.Kami berkomitmen untuk berkelanjutan dalam usaha kami. Dengan menjaga
                            lingkungan yang sehat dan berkelanjutan, kami berusaha memberikan dampak positif bagi
                            masyarakat dan lingkungan di sekitar kami. Kami selalu terbuka untuk mendengar masukan,
                            kritik, dan saran dari masyarakat. Komunikasi yang jujur dan terbuka merupakan dasar bagi
                            hubungan yang kuat antara kami dan masyarakat yang kami layani. Perubahan yang kami ciptakan
                            hari ini adalah
                            investasi bagi masa depan yang lebih baik. Kami bangga menjadi bagian dari perubahan positif
                            dalam kehidupan masyarakat dan berkomitmen
                            untuk terus berusaha meningkatkan kualitas layanan kami. Bersama-sama, mari bangun
                            masyarakat yang lebih baik dan sejahtera untuk generasi mendatang. Terima kasih atas
                            dukungan dan kepercayaan Anda. Bersama-sama, mari kita bahu-membahu membangun pelayanan
                            masyarakat yang lebih baik dan memberdayakan seluruh masyarakat untuk mencapai kesejahteraan
                            dan kemajuan bersama.
                        </p>
                        {{-- <a href="#" class="btn-learn-more">Learn More</a> --}}
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h3>Tujuan <strong>Sistem Pengaduan Masyarakat (SIPMA)</strong></h3>
                            <p style="text-align: justify;">
                                untuk memfasilitasi dan meningkatkan partisipasi masyarakat dalam menyampaikan pengaduan
                                terkait berbagai masalah, pelayanan publik, atau isu sosial kepada pihak berwenang atau
                                instansi yang berwenang untuk menanganinya
                            </p>
                        </div>

                        <div class="accordion-list">
                            <ul>
                                <li>
                                    <a data-bs-toggle="collapse" class="collapse"
                                        data-bs-target="#accordion-list-1"><span>01</span> Meningkatkan Transparansi <i
                                            class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show"
                                        data-bs-parent=".accordion-list">
                                        <p style="text-align: justify;">
                                            SIPMA bertujuan untuk menciptakan transparansi dalam proses penanganan
                                            pengaduan. Dengan adanya sistem yang terbuka, informasi mengenai status dan
                                            penyelesaian pengaduan dapat diakses oleh masyarakat secara mudah dan jelas.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                                        class="collapsed"><span>02</span> Memperkuat Akuntabilitas
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p style="text-align: justify;">
                                            Tujuan lain dari SIPMA adalah meningkatkan akuntabilitas lembaga pemerintah
                                            dan institusi publik. Dengan adanya mekanisme pengaduan yang efektif, pihak
                                            berwenang harus merespons laporan masyarakat dan bertanggung jawab atas
                                            penanganan masalah yang dihadapi oleh warga.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                                        class="collapsed"><span>03</span> Memberdayakan Masyarakat
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p style="text-align: justify;">
                                            SIPMA bertujuan untuk memberdayakan masyarakat dalam menyampaikan keluhan
                                            dan permasalahan yang mereka alami. Dengan adanya sistem ini, masyarakat
                                            merasa didengar dan memiliki sarana untuk berpartisipasi aktif dalam proses
                                            perbaikan dan pengawasan pelayanan publik.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4"
                                        class="collapsed"><span>04</span> Meningkatkan Kualitas Pelayanan Publik
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                                        <p style="text-align: justify;">
                                            Melalui SIPMA, lembaga pemerintah dan institusi publik dapat mendapatkan
                                            umpan balik dari masyarakat secara langsung. Informasi ini menjadi bahan
                                            evaluasi dan perbaikan untuk meningkatkan kualitas layanan yang diberikan
                                            kepada masyarakat.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-5"
                                        class="collapsed"><span>05</span> Mendukung Pemantauan dan Evaluasi
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-5" class="collapse" data-bs-parent=".accordion-list">
                                        <p style="text-align: justify;">
                                            Dengan mencatat pengaduan dan respon yang diberikan, SIPMA memberikan basis
                                            data yang berharga untuk pemantauan dan evaluasi kinerja pelayanan publik.
                                            Hal ini membantu mengidentifikasi pola permasalahan, kebutuhan prioritas,
                                            dan mencari solusi yang lebih baik.
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in"
                        data-aos-delay="150">&nbsp;</div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Skills Section ======= -->
        <section id="skills" class="skills">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
                        <img src="assets/img/skills.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>

                        <div class="skills-content">

                            <div class="progress">
                                <span class="skill">HTML <i class="val">100%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">CSS <i class="val">90%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">JavaScript <i class="val">75%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">Photoshop <i class="val">55%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="55"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End Skills Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pelayanan</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-cast"></i></div>
                            <h4><a href="">Aksesibilitas Online</a></h4>
                            <p style="text-align: justify;">Pelayanan SIPMA memberikan kemudahan akses bagi masyarakat
                                untuk mengakses layanan
                                publik secara online dari perangkat mereka, seperti komputer atau ponsel pintar, kapan
                                saja dan di mana saja.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4><a>Integrasi Layanan</a></h4>
                            <p style="text-align: justify;">Pelayanan SIPMA mengintegrasikan berbagai layanan publik
                                dalam satu platform,
                                memungkinkan masyarakat untuk mengakses berbagai layanan dari instansi yang berbeda
                                secara terpadu. Dengan demikian, masyarakat tidak perlu berurusan dengan beberapa
                                platform atau mengulang proses yang sama saat menggunakan layanan yang berbeda.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-rss"></i></div>
                            <h4><a>Pemantauan Status Permohonan</a></h4>
                            <p style="text-align: justify;">Masyarakat dapat memantau status permohonan atau proses
                                pelayanan mereka secara real-time melalui platform online, sehingga mereka mengetahui
                                perkembangan prosesnya dengan mudah dan transparan.kami berharap dapat memberikan
                                layanan yang lebih baik dan memperkuat
                                hubungan yang saling menguntungkan antara pihak berwenang dan masyarakat.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-key"></i></div>
                            <h4><a>Keamanan Data</a></h4>
                            <p style="text-align: justify;">Pelayanan SIPMA dirancang dengan sistem keamanan yang kuat
                                untuk melindungi data pribadi
                                dan informasi sensitif masyarakat dari akses yang tidak sah.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>Voice your complaints</h3>
                        <p style="text-align: justify;"> Your complaints are essential to us. If you have any concerns
                            or issues to address, our department is here to listen and take appropriate action. Please
                            don't hesitate to voice your feedback, as it helps us improve our services and ensure your
                            satisfaction. Thank you for giving us the opportunity to better serve you.</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="{{ route('login') }}">Voice your complaints</a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Portfolio Section ======= -->
        {{-- <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Portfolio</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up"
                    data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Card 2</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 2</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Card 1</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Card 3</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section --> --}}

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Team</h2>
                    <p style="text-align: justify;">Team Sistem Pengaduan Masyarakat kami adalah sebuah tim lintas
                        dinas yang bertanggung jawab atas
                        pengelolaan dan pengembangan Sistem Pengaduan Masyarakat. Tim ini dibentuk dengan tujuan untuk
                        memberikan platform yang efisien dan responsif bagi masyarakat dalam menyampaikan pengaduan,
                        keluhan, atau masukan terkait layanan publik dan isu-isu komunitas.

                        Anggota dalam tim berasal dari berbagai departemen atau dinas yang memiliki keterkaitan dengan
                        isu-isu yang sering dihadapi oleh masyarakat. Kami memiliki perwakilan dari berbagai bidang,
                        seperti IT, hukum, layanan publik, dan hubungan masyarakat. Kehadiran anggota dari berbagai
                        dinas memungkinkan kami untuk merancang solusi yang holistik dan berorientasi pada kebutuhan
                        masyarakat.

                        Sebagai tim kolaboratif, kami menjunjung tinggi transparansi, kecepatan, dan akurasi dalam
                        menangani setiap pengaduan yang masuk. Kami terus berupaya meningkatkan layanan dan efisiensi
                        dalam menangani pengaduan agar setiap masukan masyarakat dapat direspon dengan tepat waktu dan
                        diberikan tindakan yang sesuai.

                        Selain itu, kami bekerja sama dengan berbagai instansi dan mitra eksternal untuk menyediakan
                        saluran pengaduan yang lebih luas dan aksesibel bagi masyarakat. Kami berkomitmen untuk
                        memastikan bahwa setiap pengaduan diperlakukan secara adil, amanah, dan kerahasiaannya terjaga.

                        Sebagai garda terdepan dalam menghadapi isu-isu masyarakat, kami menganggap tanggung jawab kami
                        sebagai kesempatan untuk melayani dan membantu memajukan kehidupan masyarakat. Kami siap untuk
                        menghadapi perubahan dan tantangan dalam menerapkan teknologi terbaru dan inovasi dalam Sistem
                        Pengaduan Masyarakat demi memberikan pelayanan yang lebih baik dan bermanfaat bagi seluruh
                        komunitas yang kami layani.</p>
                </div>

                <div class="row">

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="member-carousel">
                                @foreach ($departements as $departement)
                                    <div class="member">
                                        <div class="image-box">
                                            <img src="assets/img/Lambang_Kabupaten_Pasuruan.png" class="img-fluid"
                                                alt="{{ $departement->name }}">
                                            <div class="member-info">
                                                <h6 style="color: #fff" , align="center">{{ $departement->name }}</h6>
                                                {{-- <span>{{ $departement->description }}</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="carousel-buttons">
                                <button class="carousel-button prev">&#10094;</button>
                                <button class="carousel-button next">&#10095;</button>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Pricing Section ======= -->
        {{-- <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pricing</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="box">
                            <h3>Free Plan</h3>
                            <h4><sup>$</sup>0<span>per month</span></h4>
                            <ul>
                                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                                <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span>
                                </li>
                                <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis
                                        hendrerit</span></li>
                            </ul>
                            <a href="#" class="buy-btn">Get Started</a>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box featured">
                            <h3>Business Plan</h3>
                            <h4><sup>$</sup>29<span>per month</span></h4>
                            <ul>
                                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                                <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                                <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
                            </ul>
                            <a href="#" class="buy-btn">Get Started</a>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="box">
                            <h3>Developer Plan</h3>
                            <h4><sup>$</sup>49<span>per month</span></h4>
                            <ul>
                                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                                <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                                <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
                            </ul>
                            <a href="#" class="buy-btn">Get Started</a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Pricing Section --> --}}

        <!-- ======= Services Section ======= -->
        <section id="statistik" class="services section-bg" style="background-color: #37517E;">
            <div class="container" data-aos="fade-up">

                <div class="section-title" style="color: #fff;">
                    <h2 style="color: #fff;">Statistik</h2>
                    <p>Statistik Sistem Pengaduan Masyarakat adalah kumpulan data yang mencatat laporan pengaduan dari
                        masyarakat terkait masalah pelayanan publik dan berbagai isu sosial. Angka-angka ini
                        mencerminkan partisipasi masyarakat dalam menyampaikan keluhan serta respons pihak dinas terkait
                        dalam menangani laporan tersebut.</p>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="text-center">
                                <div class="icon"><i class="bx bx-envelope"></i></div>
                            </div>
                            <h4 style="font-size:25px", align="center"><a>Complaints
                                    Pending</a></h4>
                            <p style="font-size:40px", align="center">{{ $pendingComplaints }}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="text-center">
                                <div class="icon"><i class="bx bx-time"></i></div>
                            </div>
                            <h4 style="font-size:25px", align="center"><a>Complaints In
                                    Progress</a></h4>
                            <p style="font-size:40px", align="center">{{ $inProgressComplaints }}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <div class="text-center">
                                <div class="icon"><i class="bx bx-task"></i></div>
                            </div>
                            <h4 style="font-size:25px", align="center"><a>Complaints
                                    Resolved</a></h4>
                            <p style="font-size:40px", align="center">{{ $resolvedComplaints }}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box">
                            <div class="text-center">
                                <div class="icon"><i class="bx bx-file"></i></div>
                            </div>
                            {{-- <div class="icon"><i class="bx bxl-dribbble"></i></div> --}}
                            <h4 style="font-size:25px", align="center"><a>Jumlah Laporan Sekarang</a>
                            </h4>
                            <p style="font-size:40px", align="center">{{ $totalComplaints }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        {{-- <section class="block block-counter" id="statistik"
            style="color: red; padding: 40px 0; background-color: #f3f5fa;">
            <div class="container" style="max-width: 800px; margin: 0 auto;">
                <div class="section-title">
                    <h2>Jumlah Laporan Sekarang</h2>
                    <div class="container">
                        <div class="row-flex flex-tablet text-center">
                            <div class="post post-counter" style="margin-left: auto; margin-right: auto;">
                                <div class="counter-count">
                                    <h1 style="font-size: 100px; text-align: center;">{{ $totalComplaints }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container"
                style="max-width: 800px; margin: 0 auto; display: flex; justify-content: space-between;">
                <div class="section-title">
                    <h2>Jumlah Complaints Pending</h2>
                    <div class="container">
                        <div class="row-flex flex-tablet text-center">
                            <div class="post post-counter" style="margin-left: auto; margin-right: auto;">
                                <div class="counter-count">
                                    <h1 style="font-size: 100px; text-align: center;">{{ $pendingComplaints }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-title">
                    <h2>Jumlah Complaints In Progress</h2>
                    <div class="container">
                        <div class="row-flex flex-tablet text-center">
                            <div class="post post-counter" style="margin-left: auto; margin-right: auto;">
                                <div class="counter-count">
                                    <h1 style="font-size: 100px; text-align: center;">{{ $inProgressComplaints }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-title">
                    <h2>Jumlah Complaints Resolved</h2>
                    <div class="container">
                        <div class="row-flex flex-tablet text-center">
                            <div class="post post-counter" style="margin-left: auto; margin-right: auto;">
                                <div class="counter-count">
                                    <h1 style="font-size: 100px; text-align: center;">{{ $resolvedComplaints }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section> --}}



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>Komplek Perkantoran Pemerintah Kabupaten Pasuruan JL.Raya Raci KM - 9 Bangil,
                                    Pasuruan</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>diskominfo@pasuruankab.go.id</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>(0343) 429064</p>
                            </div>

                            {{-- <div id="map" style="width: 100%; height: 290px;"></div>
                            <script>
                                // Initialize the map
                                var map = L.map('map').setView([-7.609531, 112.828478], 15);

                                // Add the tile layer (you can use any other tile layer as well)
                                L.tileLayer("https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
                                    maxZoom: 100,
                                    subdomains: ["mt0", "mt1", "mt2", "mt3"],
                                }).addTo(map);

                                // Create a separate layer group for the markers
                                var markerLayer = L.layerGroup().addTo(map);

                                // Add a marker for each departement to the markerLayer
                                @foreach ($departements as $departement)
                                    @if ($departement->latitude && $departement->longitude && $departement->name)
                                        var marker = L.marker([{{ $departement->latitude }}, {{ $departement->longitude }}])
                                            .addTo(markerLayer)
                                            .bindPopup("{{ $departement->name }}");
                                    @endif
                                @endforeach
                            </script> --}}



                            {{-- <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7909.355553928362!2d112.82271425691395!3d-7.609998628479007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7c562865d17b5%3A0x45cd669378aa9e84!2sDinas%20Komunikasi%20dan%20Informatika%20Kabupaten%20Pasuruan!5e0!3m2!1sid!2sid!4v1690172591982!5m2!1sid!2sid"
                                frameborder="0" style="border:0; width: 100%; height: 290px;"
                                allowfullscreen></iframe> --}}
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <div class="php-email-form">
                            <div class="row">
                                <div id="map" style="width: 100%; height: 290px;"></div>
                                <script>
                                    var map = L.map('map', {
                                        center: [-7.609531, 112.828478],
                                        zoom: 15,
                                        attributionControl: false // Tambahkan opsi ini
                                    });

                                    var streets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                                        maxZoom: 100,
                                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                                        attribution: false
                                    });

                                    var satellite = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                                        maxZoom: 100,
                                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                                        attribution: false
                                    });

                                    map.addLayer(streets); // Let's set the street view as default

                                    // Create a separate layer group for the markers
                                    var markerLayer = L.layerGroup().addTo(map);

                                    // Assuming $departements is an array of departement data
                                    @foreach ($departements as $departement)
                                        @if ($departement->latitude && $departement->longitude && $departement->name)
                                            var marker = L.marker([{{ $departement->latitude }}, {{ $departement->longitude }}])
                                                .addTo(markerLayer)
                                                .bindPopup("{{ $departement->name }}");
                                        @endif
                                    @endforeach

                                    // Adding the control to switch between street view and satellite view
                                    var baseLayers = {
                                        "Streets": streets,
                                        "Satellite": satellite
                                    };

                                    // Create a toggle button inside the map
                                    var toggleButton = L.Control.extend({
                                        options: {
                                            position: 'bottomleft'
                                        },

                                        onAdd: function(map) {
                                            var container = L.DomUtil.create('div', 'leaflet-bar leaflet-control leaflet-control-custom');
                                            container.style.backgroundColor = 'white';
                                            container.style.padding = '5px 10px';
                                            container.style.borderRadius = '5px';
                                            container.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.2)';
                                            container.innerHTML = 'Toggle View';

                                            container.onclick = function() {
                                                if (map.hasLayer(satellite)) {
                                                    map.removeLayer(satellite);
                                                    streets.addTo(map);
                                                } else {
                                                    map.removeLayer(streets);
                                                    satellite.addTo(map);
                                                }
                                            }

                                            return container;
                                        }
                                    });

                                    map.addControl(new toggleButton());
                                </script>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Join Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Arsha</h3>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                            <a href="https://www.twitter.com/pemkabpasuruan_" class="twitter"><i
                                    class="bx bxl-twitter"></i></a>
                            <a href="https://www.facebook.com/pasuruankab.go.id/" class="facebook"><i
                                    class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/pemkabpasuruan/" class="instagram"><i
                                    class="bx bxl-instagram"></i></a>
                            <a href="https://www.youtube.com/@ILOVEPASTV" class="google-plus"><i
                                    class="bx bxl-youtube"></i></a>
                            {{-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>PKL 2023</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Tombol "like" -->
    <!-- Tombol "like" -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @foreach ($polls as $poll)
        <div class="poll" style="position: fixed; bottom: 10px;">
            <div class="" style="display: flex; margin-right: 50px;">
                <div class="pr-0">
                    <a href="{{ route('poll.like', ['id' => $poll->id]) }}" class="btn btn-primary btn-like"
                        data-poll-id="{{ $poll->id }}">
                        <div style="text-align: center;">
                            <i class="bi bi-hand-thumbs-up-fill" style="color:#FFFFFFFF; font-size: 24px;"></i>
                        </div>
                    </a>
                </div>
                <div class="pr-0">
                    <a href="{{ route('poll.dislike', ['id' => $poll->id]) }}" class="btn btn-danger btn-dislike"
                        data-poll-id="{{ $poll->id }}">
                        <div style="text-align: center;">
                            <i class="bi bi-hand-thumbs-down-fill" style="color:#FFFFFFFF; font-size: 24px;"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endforeach


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Fungsi untuk melakukan aksi like atau dislike menggunakan teknik Ajax
        function doAction(action, pollId) {
            // Lakukan request ke backend untuk melakukan aksi like atau dislike
            $.ajax({
                url: `/poll/${action}/${pollId}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(data) {
                    // Tampilkan pesan sukses dari backend
                    alert(data.message);

                    // Perbarui jumlah like dan dislike di tampilan
                    $('#likesCount' + pollId).text(data.likes);
                    $('#dislikesCount' + pollId).text(data.dislikes);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Tangkap klik tombol "like"
        $('.btn-like').on('click', function(event) {
            event.preventDefault();
            var pollId = $(this).data('poll-id');
            doAction('like', pollId);
        });

        // Tangkap klik tombol "dislike"
        $('.btn-dislike').on('click', function(event) {
            event.preventDefault();
            var pollId = $(this).data('poll-id');
            doAction('dislike', pollId);
        });
    </script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
