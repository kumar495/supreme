@include('header')

<!DOCTYPE html>
<html lang="en">

    @php
    $testimonials = \App\Models\Testimonial::all();
   @endphp
   @php
    $employees = \App\Models\Employee::all();
   @endphp
   @php
    $blogs = \App\Models\Blog::all();
   @endphp
   
   <br>
<br>

 <!-- Carousel Start -->
 <div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @if($testimonials)
                @foreach($testimonials as $testimonial)
                    <div class="carousel-item @if($loop->first) active @endif" style="background-color: white;">
                        <!-- Apply CSS filter to make the image white -->
                        <img class="w-100 testimonial-image"  src="{{ asset( $testimonial->image) }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                                <h1 class="display-3 text-white mb-md-4">Let's Discover The World Together</h1>
                                <a href="{{ route('allpackage') }}" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- Handle case when $testimonials is empty --}}
            @endif
        </div>
    </div>
</div>

    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn " style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div>
</div>

<!-- CSS to make the testimonial images white -->


</style>

    <!-- Carousel End -->


    <!-- Booking Start -->
    @include('booking')

    <!-- Booking End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset( $testimonial->image) }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h6>
                        <h1 class="mb-3">We Provide Best Tour Packages In Your Budget</h1>
                        <p> "Discover unforgettable journeys with our tailored tour packages, meticulously crafted to match your desires while staying within your budget. Experience the world without breaking the bank!"</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="" alt="">
                            </div>
                        </div>
                        
                        <a href="{{ route('allpackage') }}" class="btn btn-primary mt-1">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Competitive Pricing</h5>
                            <p class="m-0">"Competitive Pricing" ensures rates in travel and tourism remain attractive compared to rival offerings.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">"Superior Services" ensures unparalleled quality in travel and tourism compared to competitors' offerings.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Worldwide Coverage</h5>
                            <p class="m-0">"Global Coverage" guarantees comprehensive reach in travel and tourism services across international.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Destination Start -->
 
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>Explore Top Destination</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                    <img src="{{ asset('images/nepal1.jpg') }}" alt="Payment Logo 1" class="responsive-image">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Nepal</h5>
                            <span>Top Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                    <img src="{{ asset('images/india.jpg') }}" alt="Payment Logo 1" class="responsive-image">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">India</h5>
                            <span>Top Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                    <img src="{{ asset('images/china.jpg') }}" alt="Payment Logo 1" class="responsive-image">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">China</h5>
                            <span>Top Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                    <img src="{{ asset('images/bhutan.jpg') }}" alt="Payment Logo 1" class="responsive-image">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Bhutan</h5>
                            <span>Top Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                    <img src="{{ asset('images/multi.jpg') }}" alt="Payment Logo 1" class="responsive-image">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Multi Country Tours</h5>
                            <span>Top Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-6.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white"></h5>
                            <span>Top Cities</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <style>
 
  .responsive-image {
        max-width: 100%;
        height: auto;
    }
</style>

    <!-- Destination Start -->


    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h6>
                <h1>Tours & Travel Services</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">Travel Guide</h5>
                        <p class="m-0">A Travel Guide provides essential information and tips for travelers, offering insights on destinations, attractions, accommodations, dining options, and local customs to enhance the travel experience.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">Ticket Booking</h5>
                        <p class="m-0"> Ticket Booking facilitates the seamless reservation of tickets for various modes of transportation, events, or activities, ensuring convenient access and hassle-free travel arrangements.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Hotel Booking</h5>
                        <p class="m-0">Hotel Booking streamlines the process of reserving accommodations, allowing travelers to secure their desired rooms and amenities at their chosen destinations, ensuring a comfortable.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Packages Start -->
        
    @include('Package.package')

    <!-- Packages End -->


    <!-- Registration Start -->
   
    <!-- Registration End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
    <div class="text-center mb-3 pb-3">
    @if($employees && count($employees) > 0)

        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Guides</h6>
        <h1>Our Travel Guides</h1>
    </div>
    @endif

    <div class="row">
        @if($employees)
            @foreach($employees as $employee)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <!-- Assuming the 'image' attribute contains the path to the employee image -->
                            <img class="img-fluid w-100 team-img-size" src="{{ asset($employee->image) }}" alt="{{ $employee->name }}" style="width: 250px; height: 250px;">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <!-- Displaying employee name and designation dynamically -->
                            <h5 class="text-truncate">{{ $employee->name }}</h5>
                            <p class="m-0">{{ $employee->position }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

    </div>
    <!-- Team End -->


    @include('testimonialclient')
    <div style="height: 100px;"></div>



    <!-- Blog Start -->
   <!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Blogs</h6>
            <h1>Latest From Our Blog</h1>

        </div>
        <div class="row pb-3">
            @if($blogs)
                @foreach($blogs as $index => $blog)
                    @if($index < 3)
                        <div class="col-lg-4 col-md-6 mb-4 pb-2">
                            <div class="blog-item" style="height: 100%;">
                                <div class="position-relative" style="height: 200px; overflow: hidden;">
                                    <img class="img-fluid w-100" src="{{ asset($blog->image) }}" alt="">
                                    <div class="blog-date">
                                        <!-- Your date content goes here -->
                                    </div>
                                </div>
                                <div class="bg-white p-4" style="height: calc(100% - 200px);"> <!-- Subtracting image height from total container height -->
                                    <div class="d-flex mb-2">
                                        <a class="text-primary text-uppercase text-decoration-none" href="#">{{ $blog->title}}</a>
                                        <span class="text-primary px-2">|</span>
                                    </div>
                                    <p class="mb-0">{{ $blog->hightlight }}</p>
                                    <div class="learn-more">
                                        <a href="#" class="text-primary btn btn-link p-0 learn-more-btn" data-blog-id="{{ $blog->id }}">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
<div class="text-center">
    <a href="{{ route('allblog') }}" class="btn btn-primary">View All Blogs</a>
</div>


    <!-- Blog End -->


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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function () {
        $('.learn-more-btn').click(function (e) {
            e.preventDefault();

            var blogId = $(this).data('blog-id');

            // Redirect to the details page
            window.location.href = '/blog/' + blogId + '/details';
        });
    });
</script>



