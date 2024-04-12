@include('header')


<head>
    <meta charset="UTF-8">
    <title>Add Client Review</title>
       <style>
    /* Container styles */
    .container-booking {
        max-width: 1200px; /* Adjust this value to your desired width */
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Form styles */
    form {
        margin-top: 20px;
        background-color: #fff; /* Set form background color to white */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    label {
        font-weight: bold;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    .rating-container {
        margin-bottom: 15px;
    }

    .star {
        cursor: pointer;
        font-size: 24px;
        color: #e3e3e3;
        transition: color 0.3s;
    }

    .star.checked {
        color: #ffcc00;
    }

    .btn-primary {
        padding: 10px 20px;
        background-color: #007bff;
        border: none;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid transparent;
        border-radius: 5px;
    }
 
    </style>
</head>

<body>

    <div class="container-booking">
        <div class="row">
        <div class="center">
</div>
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Booking</h2>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


        <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><strong>Trip:</strong></label>
                        <input type="text" name="trip" class="form-control" placeholder="Trip Name" value="{{ $tripName }}" readonly>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="trip_id" value="{{ $trip_id }}">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="short"><strong>Name :</strong></label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address"><strong>Address:</strong></label>
                        <input type="text" name="address" class="form-control" placeholder="Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email"><strong>Email:</strong></label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email"><strong>Phone:</strong></label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email"><strong>No of Travellers:</strong></label>
                        <input type="number" name="no_of_people" class="form-control" placeholder="No of Travellers">
                        @error('no_of_people')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email"><strong>Date:</strong></label>
                        <input type="date" name="date" class="form-control" placeholder="Date">
                        @error('date')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </div>
            </div>
        </form>
    </div>
    
</body>

</html>
@php
    $blogs = \App\Models\Blog::all();
   @endphp
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
@include('footer')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var url = window.location.href;

        var segments = url.split('/');
        var blogId = segments[segments.length - 2]; 
        document.getElementById('blog_id').value = blogId;
    });
</script>