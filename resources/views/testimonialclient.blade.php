@php
    $clients = \App\Models\Client::all();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <style>
        .img-area img {
            width: 150px; /* Set the width of the image */
            height: 200px; 
            overflow: hidden;/* Maintain aspect ratio */
        }
    </style>
</head>
<body>
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="text-center mb-3 pb-3">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h6>
                        <h1>What Say Our Clients</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="team-slider owl-carousel">
                            @foreach($clients as $client)
                                <div class="single-box text-center">
                                    <div class="img-area"><img alt="" class="img-fluid move-animation" src="{{ $client->image }}"></div>
                                    <div class="info-area">
                                        <h4>{{ $client->name }}</h4>
                                        <p>{{ $client->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $('.team-slider').owlCarousel({
            loop: true,
            nav: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 450,
            margin: 20,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                991: {
                    items: 3
                },
                1200: {
                    items: 3
                },
                1920: {
                    items: 3
                }
            }
        });
    </script>
</body>
</html>
