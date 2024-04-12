@include('layouts.travel')
@php
    $destinations = \App\Models\Destination::all();
    $activities = \App\Models\Activity::all();
    $trips = \App\Models\Trip::all();


   @endphp
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supreme Himalayas Adventure</title>
    <!-- Bootstrap CSS -->
    <!-- FontAwesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for spacing */
        .superNav .align-items-center .centerOnMobile a {
            margin-right: 20px;
            color:#1a7b89;
        }
        .navbar-expand-lg {
        background-color: #1a7b89; /* Set background color here */
    }
        .fab {
            font-size: 20px;
        }
        .details {
            margin-right: 20px;
        }
        .text-muted a {
            color: #25D366 !important;
        }
        .navbar-nav {
        
            font-weight: bold;
    }
    .navbar-nav .nav-link {
    color: white !important;
}
#dropdown-menu{
        background-color: #1a7b89; /* Set background color here */
    }
    .dropdown-menu .dropdown-item:hover {
        color: black !important; /* Change "your_desired_color" to the color you want */
        background-color: transparent !important; /* Optionally, you can set background-color to transparent */
    }

    </style>
</head>
<body>
    <div class="superNav border-bottom py-2 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 centerOnMobile">
                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.facebook.com/supremehimalayas"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://www.instagram.com/supremehimalayas/"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-12 col-md-6 text-end">
                    <span class="details"><i class="fas fa-envelope"></i><a href="info@supremehimalayas.com" style="color: #25D366;">info@supremehimalayas.com</a></span>
                    <span class="details"><i class="fab fa-whatsapp" style="color: #25D366;"></i><a href="https://wa.me/+9779823477992" style="color: #25D366;">+9779823477992 (Whatsapp)</a></span>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg  sticky-top navbar-light p-3 shadow-sm">
        <div class="container">
            <img src="{{ asset('images/supreme.png') }}" alt="Supreme Himalayas Logo" class="logo" style="width: 100px;">
            <a class="navbar-brand" href="#" style="color: white;"><i class="fa-solid fa-shop me-2"></i><strong>Supreme Himalayas Adventure</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item">
                    <a class="nav-link text-uppercase active" aria-current="page" href="{{ route('welcome') }}"><b>Home</b></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-uppercase" data-toggle="dropdown"><b>Destinations</b></a>
                        <div class="dropdown-menu border-0 rounded-0 m-0" style="background-color: #1a7b89;" >
                            @forelse ($destinations as $destination)
                                <a class="dropdown-item text-uppercase" href="{{ route('gettripByDestination', ['destinationId' => $destination->id]) }}" style="color: white;" >{{ $destination->name }}</a>
                            @empty
                                <span class="dropdown-item disabled">No destinations available</span>
                            @endforelse
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-uppercase" data-toggle="dropdown"><b>Activities</b></a>
                        <div class="dropdown-menu border-0 rounded-0 m-0" style="background-color: #1a7b89;"  >
                            @forelse($activities as $activity)
                                <a class="dropdown-item text-uppercase" href="{{ route('gettripByActivity', ['activityId' => $activity->id]) }}"  style="color: white;">{{ $activity->name }}</a>
                            @empty
                                <span class="dropdown-item disabled">No activities available</span>
                            @endforelse
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-uppercase" data-toggle="dropdown"><b>About US</b></a>
                        <div class="dropdown-menu border-0 rounded-0 m-0" style="background-color: #1a7b89;" > 
                        <a class="dropdown-item text-uppercase" href="{{ route('ourteam') }}" style="color: white; ">Our Team</a>   
                        <a class="dropdown-item text-uppercase" href="{{ route('about') }}" style="color: white; ">About Supreme Himalayas </a>

                            
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ route('contact') }}"><b>Contact</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>


<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>


    <style>
      	a {
      font-size:14px;
      font-weight:700
    }
    .superNav {
      font-size:13px;
    }
    .form-control {
      outline:none !important;
      box-shadow: none !important;
    }
   
    
    </style>