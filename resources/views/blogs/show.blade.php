<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        <h2>Blogs Details</h2>
        @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
        <div class="mb-2">
            <a href="{{ route('blog.create') }}" class="btn btn-success">Add Blogs</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($blogs as $key => $blog)
    <tr>
    <td>{{ $blog->id }}</td>

        <td>{{ $blog->title }}</td>

        <td><img src="{{ asset($blog->image) }}" alt="Testimonial Image" style="max-width: 200px; max-height: 200px;"></td>
        <td>
            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
<div class="footer">
        @include('layouts.adminfooter')
    </div>
