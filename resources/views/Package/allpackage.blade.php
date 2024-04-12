
@php
    $trips = \App\Models\Trip::all();
@endphp
@include('header')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;">
        <p><strong style="font-weight: bold;">{{ $message }}</strong></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<div class="container pt-5 pb-3" id="tripPackagesContainer">

<div class="container pt-5 pb-3">

    <div class="text-center mb-3 pb-3">

        <h1 class="text-primary text-uppercase" style="letter-spacing: 5px;">Perfect Tour Packages</h1>

        <h6>Perfect Tour Packages</h6>

    </div>

    @include('booking')

    @if($trips->count() > 0)
        <div class="d-flex flex-wrap">
            @foreach($trips as $trip)
                @php
                    $destination_name = $trip->destination ? $trip->destination->name : "Destination not found";
                    $activity_name = $trip->activity ? $trip->activity->name : "Activity not found";
                @endphp

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2 h-100">
                        <img class="img-fluid" src="{{ $trip->image }}" alt="" width="1100" height="600" style="height: 250px;">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0">
                                    <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                    {{ $destination_name }}
                                </small>
                                <small class="m-0">
                                    <i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $trip->trip_day }}
                                </small>
                                <small class="m-0">
                                    <i class="fa fa-user text-primary mr-2"></i>2 Person
                                </small>
                            </div>
                            <a class="h8 text-decoration-none" href="#">
                                {!! Illuminate\Support\Str::words($trip->name, 15, '...') !!}
                                </a>
                                <div class="mt-3 text-custom-color">
    <h6 class="text-primary mb-2">Activities</h6>
    <p>{{ $activity_name }}</p>
</div>

                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="m-0">
                                        <i class="fa fa-star text-primary mr-2"></i>5 <small></small>
                                    </h6>
                                    <h6 class="m-0">${{ ($trip->actual_price) - ($trip->discount_price )}}</h6>
                                    <a href="{{ route('trip.details', ['id' => $trip->id]) }}" class="btn btn-primary btn-custom">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<div class="text-center mt-5">
        <button id="prevPageBtn" class="btn btn-primary mr-3 btn-custom" disabled>&lt; Prev</button>
        <button id="nextPageBtn" class="btn btn-primary btn-custom">Next &gt;</button>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var url = window.location.href;

        var segments = url.split('/');
        var blogId = segments[segments.length - 2]; 
        document.getElementById('blog_id').value = blogId;
    });
</script>

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var tripPackages = document.querySelectorAll('.package-item');
        var itemsPerPage = 6; 
        var currentPage = 1;
        var totalPages = Math.ceil(tripPackages.length / itemsPerPage);
        
        showPage(currentPage);
        
        document.getElementById('nextPageBtn').addEventListener('click', function() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });
        
        document.getElementById('prevPageBtn').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });
        
        function showPage(page) {
            var startIndex = (page - 1) * itemsPerPage;
            var endIndex = startIndex + itemsPerPage;
            
            tripPackages.forEach(function(tripPackage, index) {
                if (index >= startIndex && index < endIndex) {
                    tripPackage.style.display = 'block';
                } else {
                    tripPackage.style.display = 'none';
                }
            });
            
            updatePaginationButtons();
        }
        
        function updatePaginationButtons() {
            if (currentPage == 1) {
                document.getElementById('prevPageBtn').disabled = true;
            } else {
                document.getElementById('prevPageBtn').disabled = false;
            }
            
            if (currentPage == totalPages) {
                document.getElementById('nextPageBtn').disabled = true;
            } else {
                document.getElementById('nextPageBtn').disabled = false;
            }
        }
    });
</script>

<style>
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