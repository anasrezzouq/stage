<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CABINET Medical</title>
    <link rel="stylesheet" href="../assets/css/maicons.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="../assets/css/theme.css">
    <style>
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
            <li class="nav-item">
              <a class="nav-link text-white" href="{{url('/home')}}">Home</a>
            </li>
            
    

<li class="nav-item active">
    <a class="nav-link text-white" href="{{ route('about') }}">About Us</a>
</li>
<li class="nav-item">
    <a class="nav-link text-white" href="http://localhost/hos/hospital/public/html/doctors.html">Doctors</a>
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

    <div class="container" style="padding: 70px;">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Cancel Appointment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appoint as $appoints)
                <tr>
                    <td>{{$appoints->doctor}}</td>
                    <td>{{$appoints->date}}</td>
                    <td>{{$appoints->message}}</td>
                    <td>{{$appoints->status}}</td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')" href="{{url('cancel_appoint',$appoints->id)}}">Cancel</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="../assets/vendor/wow/wow.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>
</html>
