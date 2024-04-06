<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Reviews</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
        .star {
            cursor: pointer;
        }

        .star.rated {
            color: gold; 
        }
    </style>
<body>
<div class="header">
        @include('layouts.topheader')
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        @include('layouts.sidebar')
    </div>

<div class="container mt-1" style="max-width: 800px;">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit Reviews</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('review.update', $reviews->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Review Title:</strong>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $reviews->title) }}" placeholder="Review Title">
                        @error('title')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Trip Name:</strong>
                        <input type="text" name="trip_id" class="form-control" value="{{ $trip_name }}" placeholder="Trip" readonly>
                        @error('trip_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content:</strong>
                        <textarea name="content" class="form-control" placeholder="Content">{{ old('content', $reviews->content) }}</textarea>
                        @error('content')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $reviews->name) }}" placeholder="Name">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $reviews->email) }}" placeholder="Email">
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Address:</strong>
                        <textarea name="address" class="form-control" placeholder="Address">{{ old('address', $reviews->address) }}</textarea>
                        @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <img src="{{ asset($reviews->image) }}" alt="Current Image" class="mt-2" style="max-width: 100%;">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label for="rating"><strong>Rating:</strong></label>
            <div class="rating-container">
                <span class="star @if($reviews->rating >= 1) rated @endif" onclick="rate(1)">★</span>
                <span class="star @if($reviews->rating >= 2) rated @endif" onclick="rate(2)">★</span>
                <span class="star @if($reviews->rating >= 3) rated @endif" onclick="rate(3)">★</span>
                <span class="star @if($reviews->rating >= 4) rated @endif" onclick="rate(4)">★</span>
                <span class="star @if($reviews->rating == 5) rated @endif" onclick="rate(5)">★</span>
            </div>
            <input type="hidden" name="rating" id="selected-rating" value="{{ $reviews->rating }}">
            @error('rating')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

            </div>
            <button type="submit" class="btn btn-primary ml-3">Update</button>
        </form>
    </div>

    <script>
        function rate(rating) {
            document.getElementById('selected-rating').value = rating;
            let stars = document.getElementsByClassName('star');
            for (let i = 0; i < stars.length; i++) {
                if (i < rating) {
                    stars[i].classList.add('rated');
                } else {
                    stars[i].classList.remove('rated');
                }
            }
        }
    </script>

</body>

</html>
<div class="footer">
        @include('layouts.adminfooter')
    </div>
