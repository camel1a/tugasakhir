<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Makah Wedding Service</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../images/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- g tau kenapa bisa gt -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">


  <!-- Template Main CSS File -->
  <link href="../assets/css/landing.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Lumia - v4.2.0
  * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <!-- <h1><a href="index.html">Makkah Wedding Services </a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html"><img src="images/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">Profile</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Pricelist</a></li>
          <li><a href="#testimonials">Testimoni</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="/register">Registrasi</a></li>
          <li><a href="/login">Login</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex align-items-center">
        <a href="https://www.facebook.com/makah.inuykhalimah" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/makahwedding/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://api.whatsapp.com/send?phone=6287727682000&text=Halo%20Admin%20Saya%20Mau%20tanya%20Makah%20wedding%20service" class="linkedin"><i class="fa fa-whatsapp"></i></a>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @foreach($background as $background)
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="background: url('{{URL::to('/')}}/foto/{{$background->foto}}') center center;">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Welcome to <span>Makah Wedding service</span></h1>
      <!-- <h2>Wediing Package All in One</h2> -->
      <h2>{{$background->judul}}</h2>
      <a href="#about" class="btn-get-started scrollto">Mulai</a>
    </div>
  </section>
  @endforeach<!-- End Hero -->

  <main id="main">

    <!-- ======= What We Do Section ======= -->
    <section id="what-we-do" class="testimonials section-bg ">
      <div class="container">

        <div class="section-title">
          <h2>Kami Menyediakan</h2>
          <p>Wedding Package All in One Since 2012</p>
        </div>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
          @foreach($dokumentasi as $dokumentasi)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{URL::to('/')}}/foto/{{$dokumentasi->foto}}" class="testimonial-img" alt="">
                <h3>{{$dokumentasi->judul}}</h3>
              </div>
            </div><!-- End testimonial item -->
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
          <div class="text-center">
            <a href="https://www.instagram.com/makahwedding/"><button type="button" style="background-color:#EAAA3D; text-decoration: none; color: #FFF;"  data-toggle="modal" class="btn btn-light">Lihat Dokumentasi Lebih Banyak</button></a>
          </div>

        </div>
      </div>
    </section><!-- End What We Do Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        @foreach($tentang_kami as $tentang_kami)
        <div class="row">
          <div class="col-lg-6">
            <img src="{{URL::to('/')}}/foto/{{$tentang_kami->foto}}" class="img-fluid " alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h3>Tentang Kami</h3>
           <p>
            {{$tentang_kami->deskripsi}}
            </p>
            
          </div>
        </div>
        @endforeach
      </div>
    </section><!-- End About Section -->

    <!-- ======= Skills Section ======= -->
    
    <!-- End Skills Section -->

    <!-- ======= Counts Section ======= -->
    <!-- End Counts Section -->
      <!-- ======= Services Section ======= -->
      <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        
        <div class="row">
        @foreach($services as $services)
          <div class="col-md-6">
            <div class="icon-box">
            <i class="bi bi-card-checklist"></i>
              <h4><a href="" >{{$services->judul}}</a></h4>
              <p>{{$services->deskripsi}}</p>
            </div>
          </div>
          @endforeach
        </div>

        

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio ">
      <div class="container">

        <div class="section-title">
          <h2>Pricelist</h2>
        </div>

        

        <div class="row portfolio-container">
          @foreach($paket as $paket)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{URL::to('/')}}/foto/{{$paket->foto}}" class="img-fluid" alt="">
                <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox" title="Preview"><i class="bx bx-plus"></i></a>
                <!-- <a href="portfolio-details.html" class="link-details" title="More Details"><i class="bx bx-link"></i></a> -->
              </figure>

              <div class="portfolio-info">
                <h4><a href="portfolio-details.html">{{$paket->jenis}}</a></h4>
                <p>{{$paket->deskripsi}}</p>
                <p><?PHP echo "Rp. " . number_format($paket->harga, 0, ".", "."); ?></p>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg ">
      <div class="container">
        <div class="section-title">
          <h2>Testimoni</h2>
        </div>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
          @foreach($testimoni as $testimoni)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{URL::to('/')}}/foto/{{$testimoni->foto}}" class="testimonial-img3" alt="">
                <h3>{{$testimoni->konsumen->nama}}</h3>
              </div>
            </div><!-- End testimonial item -->
            @endforeach

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= qna Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Pertanyaan Yang Sering Ditanyakan</h2>
        </div>

        <div class="row">
        @foreach($qna as $qna)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <h4>{{$qna->pertanyaan}}</h4>
              <p>
              {{$qna->jawaban}}
              </p>
              
            </div>
          </div>
          @endforeach

        </div>

          <div class="text-center">
            <a href="https://api.whatsapp.com/send?phone=6287727682000&text=Halo%20Admin%20Saya%20Mau%20tanya%20Makah%20wedding%20service"><button type="button" style="background-color:#EAAA3D; text-decoration: none; color: #FFF;"  data-toggle="modal" class="btn btn-light">Ajukan Pertanyaan Lain</button></a>
          </div>

      </div>
    </section><!-- End qna Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Team</h2>
        </div>
        <div class="row">

        @foreach($pegawai as $pegawai)
        @if($pegawai->id_pegawai != 1)
          <div class="col-lg-4 col-md-6  align-items-stretch">
            <div class="member">
            <img src="{{URL::to('/')}}/foto/{{$pegawai->foto}}" alt="">
              <h4>{{$pegawai->nama}}</h4>
              <span>{{$pegawai->jobdesk}}</span>
              
            </div>
          </div>
       
         @endif
        @endforeach
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row mt-5 justify-content-center">

          <div class="col-lg-11">
            @foreach($contact as $contact)
            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <a href="https://www.google.co.id/maps/place/Galeri+Makah+Wedding+Service/@-6.4285225,108.3867849,16z/data=!4m9!1m2!2m1!1sGaleri+Makah+Wedding+Service!3m5!1s0x2e6ec06ecabbfc35:0xeab5ba809b225564!8m2!3d-6.422626!4d108.396387!15sChxHYWxlcmkgTWFrYWggV2VkZGluZyBTZXJ2aWNlkgEPd2VkZGluZ19wbGFubmVy?hl=en"><i class="bi bi-geo-alt"></i></a>
                  <h4>Location:</h4>
                  <p>{{$contact->alamat}}</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                <a href="https://www.google.com/search?q=gmail&oq=gmail+&aqs=chrome..69i57j69i59l2j69i61l2j69i60.81828j0j7&sourceid=chrome&ie=UTF-8"><i class="bi bi-envelope"></i></a>
                  <h4>Email:</h4>
                  <p>{{$contact->email}}<br></p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                <a href="https://api.whatsapp.com/send?phone=6287727682000&text=Halo%20Admin%20Saya%20Mau%20tanya%20Makah%20wedding%20service" ><i class="bi bi-phone"></i></a>
                  <h4>Call:</h4>
                  <p>{{$contact->no_hp}}<br></p>
                </div>
              </div>
            </div>
            @endforeach
          </div>

        </div>

        <div class="row mt-5 justify-content-center">

          <div class="col-lg-11">

          <div class="info-wrap">
              <div class="row">
                <div class="col-lg-7 info">
                  <i class="bi bi-clock"></i>
                  <h4>Jam Operasional Galeri</h4>
                    <p>Senin - Minggu<br>Pkl 09.00-16.30</p>
                </div>

                <div class="col-lg-5 info">
                  <i class="bi bi-clock"></i>
                  <h4>Layanan Chatting</h4>
                        <p>Senin - Minggu<br>00.00-24.00</p>
                </div>

              </div>
            </div>

          </div>

        </div>

        

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Makah</h3>
            <h3>Wediing</h3>
            <h3>Service</h3>
            
          </div>


          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Make Up</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Wedding Organizer</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Dekorasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Make Up Class</a></li>
            </ul>
          </div>
          
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Cara Pemesanan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Registrasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Login</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Memilih Paket yang tersedia</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Memilih Tanggal</a></li>
            </ul>
          </div>

          
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Makah Wedding Service</span></strong>.
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/lumia-bootstrap-business-template/ -->
        </div>
      </div>

      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://www.facebook.com/makah.inuykhalimah" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/makahwedding/" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https://api.whatsapp.com/send?phone=6287727682000&text=Halo%20Admin%20Saya%20Mau%20tanya%20Makah%20wedding%20service" class="wahtsapp"><i class="fa fa-whatsapp"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/landing.js"></script>

</body>

</html>