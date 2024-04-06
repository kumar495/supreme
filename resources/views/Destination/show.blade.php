<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $metaDescription }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>
<body>
    <!-- Header -->
    <div class="header">
        @include('layouts.topheader')
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        @include('layouts.sidebar')
    </div>

    <!-- Main Content -->
   

    <div class="container mt-1" style="max-width: 800px;">
            <div class="row">
            </div>

            @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

            <div class="mb-2">
                <a href="{{ route('destinations.create') }}" class="btn btn-success">Add Destination</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Activity Name</th>
                        <th>Description</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($destinations as $destination)
                        <tr>
                            <td>{{ $destination->id }}</td>
                            <td>{{ $destination->name }}</td>
                            <td>{{ $destination->description }}</td>
                            <td>
                                <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No activities found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<div class="footer">
        @include('layouts.adminfooter')
    </div>