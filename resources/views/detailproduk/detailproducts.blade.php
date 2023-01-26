<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portfolio Details - BizLand Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets2/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets2/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets2/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets2/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets2/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets2/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets2/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets2/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets2/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizLand - v3.10.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">admin@agrofarm.id</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>0352 359 1094</span></i>
                <i class="bi bi-building d-flex align-items-center ms-4"><span>Jl. KH Ahmad Dahlan No.53 Ponorogo</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="/">{{$data->namaperusahaan}}</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Home</a></li>
                    <li><a class="nav-link scrollto" href="/">About</a></li>
                    <li><a class="nav-link scrollto" href="/">Products</a></li>
                    <li><a class="nav-link scrollto" href="/">Team</a></li>
                    <li class="dropdown"><a href="#counts"><span>Branch Company</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/PTMultiNiagaAbadi">PT Multi Niaga Abadi</a></li>
                            <li><a href="/PTTalentaTigaMuda">PT Talenta Tiga Muda</a></li>
                            <li><a href="/PTAgriPrimeInternational">PT Agri Prime International</a></li>
                            <li><a href="/PTAgrochem">PT Agrochem</a></li>
                            <li><a href="/PTSAP">PT SAP</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="/">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main" data-aos="fade-up">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Products Details</h2>
                </div>

            </div>
        </section><!-- Breadcrumbs Section -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <div class="swiper-slide">
                                    <img src="{{asset('storage/'.$data->photo)}}" alt="">
                                </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>{{$data->namaproducts}}</h3>
                            <ul>
                                <li><strong>Jenis Products</strong>: {{$data->jenisproducts}}</li>
                                <li><strong>Manfaat</strong>: ASU Company</li>
                                <li><strong>Tanggal Terbit</strong>: {{$data->tanggalterbit}}</li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>Deskripsi Products {{$data->namaproducts}} </h2>
                            <p>
                                {{$data->deskripsi}}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>PT Agrofarm Nusa Raya<span>.</span></h3>
                        <p>
                            Jl. Kh Ahmad Dahlan No. 53<br>
                            Nologaten Ponorogo<br>
                            Jawa Timur - Indonesia <br><br>
                            <strong>Phone:</strong> 0352 359 1094<br>
                            <strong>Email:</strong> admin@agrofarm.id<br>
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
                        <p>For A Better Comunication Between Us</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright © 2023 <strong><span> PT Agrofarm Nusa Raya.</span></strong>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets2/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('assets2/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets2/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets2/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets2/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets2/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{asset('assets2/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets2/js/main.js')}}"></script>

</body>

</html>