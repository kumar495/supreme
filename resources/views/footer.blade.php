@include('layouts.travel')

 <!-- Footer Start -->

 <div class="container-fluid text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px; background-color: #1a7b89;">

    <h5 class="text-white text-uppercase mb-6" style="letter-spacing: 5px;"><b>Contact Us</b></h5>
   
        <div class="row pt-5">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-5">
                        <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;"><b>USA </b></h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>15 Winter St, Reading, MA, 01867,USA</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+18573179276</p>
                        <p><i class="fa fa-envelope mr-2"></i>prajitgiri1221@gmail.com</p>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5">
                        <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;"><b>Nepal</b></h5>
                        <p><i class=" text-white fa fa-map-marker-alt mr-2"></i>Krishna Mandir, Lalitpur 44705</p>
                        <p><i class=" text-white fa fa-phone-alt mr-2"></i>+9779823477992</p>
                        <p><i class=" text-white fa fa-envelope mr-2"></i>Info@supremehimalayas.com</p>
                    </div>
                 
                    
                    <div class="col-lg-3 col-md-6 mb-5">
                        <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;"><b>Our Services</b></h5>
                        <div class="d-flex flex-column justify-content-start">

                            <a class="text-white-50 mb-2" href="{{ route('about') }}"><i class="fa fa-angle-right mr-2"></i><b>About</b></a>
                        
                            <a class="text-white-50 mb-2" href="{{ route('allpackage') }}"><i class="fa fa-angle-right mr-2"></i>Trip</a>
                                                        <a class="text-white-50 mb-2" href="{{ route('ourteam') }}"><i class="fa fa-angle-right mr-2"></i>Our Team</a>

                                                        <a class="text-white-50 mb-2" href="{{ route('allblog') }}"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 d-flex justify-content-end">
                <div class="payment-logos">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;"><b>We Accept</b></h5>
                <img src="{{ asset('images/master.png') }}" alt="Payment Logo 1" class="responsive-payment">
                <img src="{{ asset('images/vis.png') }}" alt="Payment Logo 1" class="responsive-payment">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="border-top border-white-50 py-2">
                <p class="m-0 text-center text-black-50">Copyright &copy; <a href="#">Domain</a>. All Rights Reserved.</p>
            </div>
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
