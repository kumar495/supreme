
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
                <h3 class="display-4 text-white text-uppercase">Blog Detail</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Blog Detail</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    @include('booking')

   


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
                                <h6 class="font-weight-bold mb-n1">{{ $blog->created_at->format('Y') }}</h6>
                                    <small class="text-white text-uppercase">{{ $blog->created_at->format('m') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <a class="text-primary text-uppercase text-decoration-none" href=""></a>
                                <span class="text-primary px-2">|</span>
                                <a class="text-primary text-uppercase text-decoration-none" href="">Tours & Travel</a>
                            </div>
                            <h2 class="mb-3">{{ $blog->title }}</h2>
                            <p>                    <p class="card-text">{{ $blog->hightlight }}</p>
                        </p>
                            
                            <img class="img-fluid w-100 float-left mr-4 mb-2" src="{{ asset($blog->image) }}" alt="">
                            <p>{!! $blog->description !!}</p>
                            
                        
                        </div>
                    </div>
                    <!-- Blog Detail End -->
                    @php
                    $comments = \App\Models\Comment::where('blog_id', $blog->id)->get();
                @endphp
                @if($comments)
                @foreach($comments as $comment)
                <!-- Comment List Start -->
                <div class="bg-white" style="padding: 30px; margin-bottom: 30px;">
                        <div class="media mb-4">
                            <img src="{{ asset('images/aboutus.jpg') }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><a href="">{{ $comment->name }}</a> <small><i>{{ $comment->created_at->format('Y-m') }}</i></small></h6>
                                <p>{{ $comment->description }}</p>
                            </div>
                        </div>
                        <div class="media">
                           
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <!-- Comment Form Start -->
          
                    @include('comments.create');
         
                    <!-- Comment Form End -->
                </div>
                
    
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    @php
        $clients = \App\Models\Client::latest()->take(1)->get();
    @endphp
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
                                    <span class="input-group-text bg-primary border-primary text-white"><i
                                            class="fa fa-search"></i></span>
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
    <li class="mb-3"><a class="btn btn-primary" href="{{ route('why') }}">Learn More</a></li>

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
<style>
 
 .responsive-image {
       max-width: 30%;
       height: auto;
   }
</style>
