<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Client Review</title>
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
                    <h2>Edit Comment</h2>
                </div>
            </div>
        </div>

        <form action="{{ route('comments.update', $comment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $comment->name) }}" placeholder="Name">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="email" class="form-control" value="{{ old('email', $comment->email) }}" placeholder="Address">
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Website:</strong>
                        <input type="text" name="website" class="form-control" value="{{ old('website', $comment->website) }}" placeholder="Position">
                        @error('website')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Message:</strong>
                        <input type="text" name="description" class="form-control" value="{{ old('description', $comment->description) }}" placeholder="Position">
                        @error('description')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
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
