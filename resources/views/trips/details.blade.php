@include('layouts.travel')

<!DOCTYPE html>
<html lang="en">

<head>
    @include('header')

    <!-- Topbar End -->


    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Trip Detail</h3>

                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Trip Detail</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    @include('booking')
    <div id="fixedTab" class="fixed-tab">
    <a href="#" class="btn btn-primary btn-custom">Details of Trip</a>
</div>


    <center>
    <h3>@php
        $latestReview = \App\Models\Review::where('trip_id', $trip->id)->latest()->first();
    @endphp

    @if($latestReview)

        <div class="rating-container">This Trip Reviews (
            <span class="star @if($latestReview->rating >= 1) rated" style="color: #ffa534" @endif onclick="rate(1)">★</span>
            <span class="star @if($latestReview->rating >= 2) rated" style="color: #ffa534" @endif onclick="rate(2)">★</span>
            <span class="star @if($latestReview->rating >= 3) rated" style="color: #ffa534" @endif onclick="rate(3)">★</span>
            <span class="star @if($latestReview->rating >= 4) rated" style="color: #ffa534" @endif onclick="rate(4)">★</span>
            <span class="star @if($latestReview->rating == 5) rated" style="color: #ffa534" @endif onclick="rate(5)">★</span>
        )</div>
    @endif
</h3>
    <h2>{{ $trip->name }}-{{ $trip->trip_day }} Days

  

    </h2>
</center>


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-n1">{{ $trip->created_at->format('Y') }}</h6>
                                    <small class="text-white text-uppercase">{{ $trip->created_at->format('m') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <a class="text-primary text-uppercase text-decoration-none" href=""></a>
                                <span class="text-primary px-2">|</span>
                                <a class="text-primary text-uppercase text-decoration-none" href="">Tours & Travel</a>
                            </div>
                            <h2 class="mb-3">{{ $trip->title }}</h2>
                            <img class="img-fluid w-100 float-left mr-4 mb-2" src="{{ asset($trip->image) }}" alt="" style="width: 500px; height: 500px;">
                            <h6 id="overview"><b>Highlights</b></h6>
                        <p>{!! $trip->highlights !!}</p> 
                            <h6 id="overview"><b>Overview</b></h6>
                        <p>{!! $trip->overview !!}</p> 
                        <h6 id="brief_itinerary"><b>Brief Itinerary</b></h6>
                        <p>{!! $trip->brief_itinerary !!}</p>
                        <h6 id="details_itinerary"><b>Details Itinerary</b></h6>
                        <p>{!! $trip->details_itinerary  !!}</p>
                        <h6 id="trip_includes"><b>Trip Include</b></h6>
                        <p>{!! $trip->trip_includes  !!}</p>
                        <h6 id="trip_excludes"><b>Trip Exclude</b></h6>
                        <p>{!! $trip->trip_excludes  !!}</p>                        </div>
                    </div>
                    <div>
                    <div style="text-align: center;">
    <a href="{{ route('bookings.create', ['trip_id' => $trip->id]) }}" class="btn btn-primary btn-custom">Book This Trip</a>
</div>



</div>
<br> <!-- Or use multiple <br> tags for larger spacing -->
<div id="popup">
  <h5><b>Overview</b></h5>
</div>
<div id="popup1">
  <h5><b>Brief Itinerary</b></h5>
</div>
<div id="popup2">
  <h5><b>Details Itinerary</b></h5>
</div>
<div id="popup3">
  <h5><b>Trip Includes</b></h5>
</div>
<div id="popup4">
  <h5><b>Trip Excludes</b></h5>
</div>
<div style="height: 20px;"></div> 
<h1><b>Latest Trip Reviews</b></h1>

@php
$reviews = \App\Models\Review::where('trip_id', $trip->id)->get();
@endphp

@if($reviews)
@foreach($reviews as $review)
<div class="bg-white mb-3" style="padding: 50px; position: relative;">
<img src="{{ asset($review->image) }}" alt="Review Photo" style="position: absolute; top: 5px; right: 5px; width: 100px; height: 100px; border-radius: 5px; object-fit: cover;">
    <div style="margin-right: 120px;"> <!-- Adjust margin-right to make space for the photo -->
    <div class="form-group">
            <div class="rating-container">
            <span class="star @if($review->rating >= 1) rated" style="color: #ffa534" @endif onclick="rate(1)">★</span>
<span class="star @if($review->rating >= 2) rated" style="color: #ffa534" @endif onclick="rate(2)">★</span>
<span class="star @if($review->rating >= 3) rated" style="color: #ffa534" @endif onclick="rate(3)">★</span>
<span class="star @if($review->rating >= 4) rated" style="color: #ffa534" @endif onclick="rate(4)">★</span>
<span class="star @if($review->rating == 5) rated" style="color: #ffa534" @endif onclick="rate(5)">★</span>

            </div>
            <input type="hidden" name="rating" id="selected-rating" value="{{ $review->rating }}">
            @error('rating')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    <h5 class="mb-3">{{ $review->title }}</h5>

        <div class="d-flex mb-1">
            <a class="text-primary text-uppercase text-decoration-none" href="#">{{ $review->name }}</a> <!-- Assuming there's a 'user' relationship to get user's name -->
        </div>
        <div> <!-- Address -->
            <span class="text-primary">{{ $review->address }}</span> <!-- Assuming address is a field in the review -->
        </div>
        <div class="beautiful-container"> <!-- Container for description -->
            <p>{!! $review->content !!}</p>
        </div>
   
        </div>
</div>
@endforeach
@endif
<style>
    .beautiful-container {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    background-color: #f9f9f9;
    margin-top: 20px; /* Adjust as needed */
}
.fixed-tab {
    position: fixed;
    bottom: 400px;
    width:100px;
    right: 20px;
    display: none; /* Hide the tab by default */
    z-index: 1;
}

.fixed-tab .btn {
    padding: 10px 20px;
}

</style>

                <a href="{{ route('review.create', ['trip_id' => $trip->id]) }}" class="btn btn-primary btn-custom">Review This Trip</a>

                
                    <!-- Blog Detail End -->
                </div>
               

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    @php
                    $clients = \App\Models\Client::latest()->take(1)->get();
                    @endphp
                    <center>
                    <h5>Review From Client</h5>
</center>

                    <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                        @if($clients)
                        @foreach($clients as $client)
                        <img src="{{ asset($client->image) }}" class="img-fluid mx-auto mb-3" style="width: 100px;">
                        <h3 class="text-primary mb-3">{{ $client->name }}</h3>
                        <p>{{ $client->short }}</p>
                        <div class="d-flex justify-content-center">
                            <a class="text-primary px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-primary px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-primary px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-primary px-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-primary px-2" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif

                    <!-- Search Form -->
                    <div class="mb-5">
                        <div class="bg-white" style="padding: 30px;">
                            <div class="input-group">
                                <input type="text" class="form-control p-4" placeholder="Keyword">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary text-white btn-custom"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category List -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Destinations</h4>
                        <div class="bg-white" style="padding: 30px;">
                            <ul class="list-inline m-0">
                                @php
                                $destinations = \App\Models\Destination::all();
                                @endphp
                                @foreach($destinations as $destination)
                                <li class="mb-3 d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i>{{ $destination->name }}</a>
                                    <span class="badge badge-primary badge-pill">{{ $destination->count }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Why Supreme Himalayas ?</h4>
                        <div class="bg-white" style="padding: 30px;">
                            <ul class="list-inline m-0">
                                
                            <ul class="list-unstyled">
    <li class="mb-3"><a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i> <strong>Expertise and Diverse Itineraries</strong></a></li>
    <li class="mb-3"><a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i> <strong>Tailor-Made and Accessible</strong></a></li>
    <li class="mb-3"><a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i> <strong>Top-Notch Service</strong></a></li>
    <li class="mb-3"><a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i> <strong>Safety: Our Number One Priority</strong></a></li>
    <li class="mb-3"><a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i> <strong>Certified Guides and Porters</strong></a></li>
    <li class="mb-3"><a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i> <strong>Best Price Guarantee</strong></a></li>
    <li class="mb-3"><a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i> <strong>Lifetime Deposit</strong></a></li>
    <li class="mb-3"><a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i> <strong>Responsible Tourism Practices</strong></a></li>
    <li class="mb-3"><a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i> <strong>24/7 Customer Care</strong></a></li>
    <li class="mb-3"><a class="btn btn-primary btn-custom"  href="{{ route('why') }}">Learn More</a></li>

</ul>

                        </div>
                    </div>

                    <!-- Tag Cloud -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h4>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="" class="btn btn-light m-1">Travel</a>
                            <a href="" class="btn btn-light m-1">Trips</a>
                            <a href="" class="btn btn-light m-1">Destinations</a>
                            <a href="" class="btn btn-light m-1">Activities</a>
                            <a href="" class="btn btn-light m-1">Blogs</a>
                            <a href="" class="btn btn-light m-1">Reviews</a>
                        </div>
                    </div>
                    <div class="contact-details mb-5">
    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Want To Connect ?</h4>
    <div class="bg-white p-4">
    <ul class="list-unstyled m-0">
    <li class="mb-3 d-flex justify-content-between align-items-center">
        <img src="{{ asset('images/pradeep.png') }}" alt="" class="responsive-image">
        <div>
            <p class="text-dark mb-1"><strong>Mr. Pradeep Giri (Nepal)</strong></p>
            <a href="https://api.whatsapp.com/send?phone=9823477992" class="text-primary mr-3" target="_blank" title="WhatsApp">
                <i class="fab fa-whatsapp" aria-hidden="true"></i>
            </a>
            <span class="text-primary">+9779823477992</span>
        </div>
    </li>
</ul>
<ul class="list-unstyled m-0">
    <li class="mb-3 d-flex justify-content-between align-items-center">
        <img src="{{ asset('images/prajit.jpg') }}" alt="" class="responsive-image">
        <div>
            <p class="text-dark mb-1"><strong>Mr. Prajit Giri (USA)</strong></p>
            <a href="https://api.whatsapp.com/send?phone=18573179276" class="text-primary mr-3" target="_blank" title="WhatsApp">
                <i class="fab fa-whatsapp" aria-hidden="true"></i>
            </a>
            <span class="text-primary">+1 8573179276</span>
        </div>
    </li>
</ul>

        <!-- Add more contact details or information here if needed -->
    </div>
</div>

                    @include('inquery.create');

                </div>
            </div>
        </div>
    </div>
 

    @include('footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<script>
  function showPopup() {
    var overviewSection = document.getElementById('overview');
    var popup = document.getElementById('popup');
 
    var rect = overviewSection.getBoundingClientRect();
    if (rect.top <= window.innerHeight && rect.bottom >= 0) {
      popup.style.display = 'block';
    } else {
      popup.style.display = 'none';
    }
    var overviewSection = document.getElementById('brief_itinerary');
    var popup = document.getElementById('popup1');
    var rect = overviewSection.getBoundingClientRect();
    if (rect.top <= window.innerHeight && rect.bottom >= 0) {
      popup.style.display = 'block';
    } else {
      popup.style.display = 'none';
    }
    var overviewSection = document.getElementById('details_itinerary');
    var popup = document.getElementById('popup2');
    var rect = overviewSection.getBoundingClientRect();
    if (rect.top <= window.innerHeight && rect.bottom >= 0) {
      popup.style.display = 'block';
    } else {
      popup.style.display = 'none';
    }
    var overviewSection = document.getElementById('trip_includes');
    var popup = document.getElementById('popup3');
    var rect = overviewSection.getBoundingClientRect();
    if (rect.top <= window.innerHeight && rect.bottom >= 0) {
      popup.style.display = 'block';
    } else {
      popup.style.display = 'none';
    }
    var overviewSection = document.getElementById('trip_excludes');
    var popup = document.getElementById('popup4');
    var rect = overviewSection.getBoundingClientRect();
    if (rect.top <= window.innerHeight && rect.bottom >= 0) {
      popup.style.display = 'block';
    } else {
      popup.style.display = 'none';
    }
  }

  // Attach scroll event listener
  window.addEventListener('scroll', showPopup);
</script>

<style>
 
 .responsive-image {
       max-width: 30%;
       height: auto;
   }
   #popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 5%;
    transform: translate(-50%, -50%);
    background-color: #1a7b89;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 9999;
}

  #popup1 {
    display: none;
    position: fixed;
    top: 50%;
    left: 5%;
    transform: translate(-50%, -50%);
    background-color: #1a7b89;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 9999;
  }
  #popup2 {
    display: none;
    position: fixed;
    top: 50%;
    left: 5%;
    transform: translate(-50%, -50%);
    background-color: #1a7b89;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 9999;
  }
  #popup3 {
    display: none;
    position: fixed;
    top: 50%;
    left: 5%;
    transform: translate(-50%, -50%);
    background-color: #1a7b89;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 9999;
  }
  #popup4 {
    display: none;
    position: fixed;
    top: 50%;
    left: 5%;
    transform: translate(-50%, -50%);
    background-color: #1a7b89;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 9999;
  }
  #popup h5,
  #popup1 h5,
#popup2 h5,
#popup3 h5,
#popup4 h5 {
    color: white; /* Set heading color to white */
}
.btn-custom {
        background-color: #1a7b89 !important;
    }
    .h8 {
        color: black;
    }
    .text-black
    {
        color: black;
    }
    .text-custom-color {
        color: #c57b24;
    }
</style>


