<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>CABINET Medical</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">

  <style>
    .page-hero{
      background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(114,164,148,1) 100%);
    }
    header{
      background-color: black;
    }
    .hero-section {
    text-align: center;
}

.subhead {
    font-size: 24px;
}

.display-4 {
    font-size: 48px;
    font-weight: bold;
    margin-bottom: 20px;
}

.btn-primary {
    background-color: #28a745;
    border-color: #28a745;
}

.col-md-6 {
    padding: 0 15px; 
}

.img-fluid {
    max-width: 100%;
    max-height: 550px;
    height: auto;
    display: block;
    margin: 0 auto;
}

.page-section {
    padding: 100px 0; 
}

.custom-img-1 {
    text-align: center; 
} 
/* Heading Styles */
div.h1 {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    line-height: 1.2;
    margin-bottom: 20px;
}

h2 {
    font-size: 24px;
    font-weight: bold;
    color: #555;
    line-height: 1.3;
    margin-bottom: 15px;
}

h3 {
    font-size: 20px;
    font-weight: bold;
    color: #777;
    line-height: 1.4;
    margin-bottom: 10px;
}

/* Paragraph Styles */
p {
    font-size: 16px;
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
}

  </style>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +212 073 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="www.facebook.com"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-success">CABINET<span class="text-white">-Medical</a>

        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/home')}}">Home</a>
            </li>
            
    

<li class="nav-item active">
    <a class="nav-link text-white" href="{{ route('about') }}">About Us</a>
</li>

<li class="nav-item">
    <a class="nav-link text-white" href="http://localhost/hos/hospital/public/html/blog.html">News</a>
</li>
<li class="nav-item">
    <a class="nav-link text-white" href="http://localhost/hos/hospital/public/html/contact.html">Contact</a>
</li>


                @if (Route::has('login'))

                @auth

                <li class="nav-item">
    <a class="nav-link" style="background-color:blue; color:white;" href="{{url('myappointment')}}">My Appointment</a>
                  </li>

                <x-app-layout>
                    <x-slot name="header">

                    </x-slot>


                </x-app-layout>

                @else



            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login </a>
            </li>

            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{route('register')}}"> Register</a>
              </li>

              @endauth

              @endif

          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  @if (session()->has('message'))

  <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">
          Cut
      </button>

      {{session()->get('message')}}
  </div>

  @endif

  <div class="page-hero">
    <div class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-md-6 wow zoomIn">
                    <span class="subhead">Live Happier</span>
                    <h1 class="display-4">Live Healthier</h1>
                    <a href="{{route('login')}}" class="btn btn-primary">Let's Consult</a>
                </div>
                
                <div class="col-md-5 wow fadeInRight" data-wow-delay="300ms">
                    <img src="../assets/img/doc.png" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>



   <!-- .page-section -->

   <div class="page-section pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="400ms">
                <div class="img-place custom-img-1">
                    <img src="../assets/img/doctor.png" alt="" class="img-fluid">
                </div>
            </div>
            
            <div class="col-lg-6 py-3 wow fadeInUp">
                <h1 class="text-success">Welcome to Your Health Center</h1>
                <p class=" mb-4">our dedicated team of healthcare professionals is committed to providing exceptional and compassionate care tailored to your needs. Whether you're visiting for a routine check-up, specialized treatment, or urgent care, we prioritize your health and comfort. Explore our services and facilities, and feel free to reach out with any questions or to schedule an appointment. Thank you for choosing [Clinic Name]; we look forward to serving you and your family with the highest standard of care</p>
                <a href="about.html" class="btn btn-primary">Learn More</a>
            </div>
        </div>
    </div>
</div>

<!-- doctor part cut out -->
@include('user.doctor')



  <!-- appointment part -->
  @include('user.appointment')
  <!-- .page-section -->
  <!-- banner part delete korbo -->
 <!-- .banner-home -->

  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">admin@gmail.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      
    </div>
  </footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>

</body>
</html>
