<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

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
                    <h2>Edit Testimonial</h2>
                </div>
            </div>
        </div>

        <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" placeholder="Name">
                        @error('name')
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
                        <img src="{{ asset($testimonial->image) }}" alt="Current Image" class="mt-2" style="max-width: 100%;">
                    </div>
                </div>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-primary ml-3">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
<div class="footer">
        @include('layouts.adminfooter')
    </div>
