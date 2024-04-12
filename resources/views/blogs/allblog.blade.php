@include('header')

@include('layouts.travel')
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Blog</h6>
            <h1>Latest From Our Blog</h1>
        </div>
        <div class="row pb-3">
            @if($blogs)
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="blog-item" style="height: 100%;">
                            <div class="position-relative" style="height: 200px; overflow: hidden;">
                                <img class="img-fluid w-100" src="{{ asset($blog->image) }}" alt="">
                                <div class="blog-date">
                                    <!-- Your date content goes here -->
                                </div>
                            </div>
                            <div class="bg-white p-4" style="height: calc(100% - 200px);">
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
                @endforeach
            @endif
        </div>
    </div>
    <div class="text-center mt-5">
        <button id="prevPageBtn" class="btn btn-primary mr-3 btn-custom" disabled>&lt; Prev</button>
        <button id="nextPageBtn" class="btn btn-primary btn-custom">Next &gt;</button>
    </div>
</div>
</div>
@include('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('.learn-more-btn').click(function (e) {
            e.preventDefault();

            var blogId = $(this).data('blog-id');

            window.location.href = '/blog/' + blogId + '/details';
        });
    });
</script>
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