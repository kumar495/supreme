@include('layouts.travel')

 <!-- Footer Start -->

 <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">

    <h5 class="text-white text-uppercase mb-6" style="letter-spacing: 5px;">Contact Us</h5>
   
        <div class="row pt-5">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-5">
                        <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">USA </h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>15 Winter St, Reading, MA, 01867,USA</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+18573179276</p>
                        <p><i class="fa fa-envelope mr-2"></i>prajitgiri1221@gmail.com</p>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5">
                        <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Nepal</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>Krishna Mandir, Lalitpur 44705</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+9779823477992</p>
                        <p><i class="fa fa-envelope mr-2"></i>Info@supremehimalayas.com</p>
                    </div>
                 
                    
                    <div class="col-lg-3 col-md-6 mb-5">
                        <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Our Services</h5>
                        <div class="d-flex flex-column justify-content-start">

                            <a class="text-white-50 mb-2" href="{{ route('about') }}"><i class="fa fa-angle-right mr-2"></i>About</a>
                        
                            <a class="text-white-50 mb-2" href="{{ route('allpackage') }}"><i class="fa fa-angle-right mr-2"></i>Trip</a>
                                                        <a class="text-white-50 mb-2" href="{{ route('ourteam') }}"><i class="fa fa-angle-right mr-2"></i>Our Team</a>

                                                        <a class="text-white-50 mb-2" href="{{ route('allblog') }}"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 d-flex justify-content-end">
                <div class="payment-logos">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">We Accept</h5>
                <img src="{{ asset('images/master.png') }}" alt="Payment Logo 1" class="responsive-payment">
                <img src="{{ asset('images/vis.png') }}" alt="Payment Logo 1" class="responsive-payment">

            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">Domain</a>. All Rights Reserved.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Developed by <a href="sabaikosoftware.com.np">Sabaiko Software</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <style>

.responsive-payment {
        max-width: 40%;
        height: auto;
    }

</style>
