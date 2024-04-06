@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review</title>
    <style>
        /* Container styles */
        .container {
            max-width: 800px;
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

        input[type="text"],
        input[type="email"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
    <div class="container">

        <div class="pull-left mb-2">
            <h2>Add Review</h2>
             
        @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
        </div>
            <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title"><strong>Review Title:</strong></label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                    @error('title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" style="display: none;">
                    <label for="trip_id" >Trip ID:</label>
                    <input type="hidden" class="form-control" id="trip_id" name="trip_id">
                </div>

                <div class="form-group">
                    <label for="content"><strong>Content:</strong></label>
                    <textarea name="content" class="form-control" placeholder="Content"></textarea>
                    @error('content')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                    @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address"><strong>Address:</strong></label>
                    <input type="text" name="address" class="form-control" placeholder="Address">
                    @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Upload Image:</label>
                    <input type="file" name="image" id="image" required class="form-control">
                    @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rating"><strong>Rating:</strong></label>
                    <div class="rating-container">
                        <span class="star" onclick="rate(1)">★</span>
                        <span class="star" onclick="rate(2)">★</span>
                        <span class="star" onclick="rate(3)">★</span>
                        <span class="star" onclick="rate(4)">★</span>
                        <span class="star" onclick="rate(5)">★</span>
                    </div>
                    <input type="hidden" name="rating" id="selected-rating" value="5">
                    @error('rating')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function rate(value) {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('selected-rating');

            stars.forEach((star, index) => {
                if (index < value) {
                    star.classList.add('checked');
                } else {
                    star.classList.remove('checked');
                }
            });

            ratingInput.value = value;
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var url = new URL(window.location.href);
            var tripId = url.searchParams.get("trip_id");
            document.getElementById('trip_id').value = tripId;
        });
    </script>
</body>
</html>
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
@include('footer')

