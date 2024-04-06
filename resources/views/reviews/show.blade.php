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
        <div class="row">
            <!-- Any content you want to add within the row -->
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
            <a href="{{ route('review.create') }}" class="btn btn-success">Add Review</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Content</th>
                    <th>Trip Name</th>
                    <th> Name</th>
                    <th>Rating</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                
                @forelse ($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->content }}</td>

                        <td>{{ $tripNames[$review->trip_id] ?? 'Unknown Trip' }}</td>
                        <td>{{ $review->name }}</td>
                        <td>{{ $review->rating }}</td>

                        <td>
                            <a href="{{ route('review.edit', $review->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('review.destroy', $review->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No activities found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</body>
</html>
<div class="footer">
        @include('layouts.adminfooter')
    </div>
