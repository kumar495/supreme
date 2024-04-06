<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container mt-2">
        <h2>Client Details</h2>
        <div class="mb-2">
            <a href="{{ route('client.create') }}" class="btn btn-success">Add Client Review</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>HightLight</th>
                    <th>Position</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($clients as $key => $client)
    <tr>
    <td>{{ $client->id }}</td>

        <td>{{ $client->name }}</td>
        <td>{{ $client->sort }}</td>
        <td>{{ $client->position }}</td>

        <td><img src="{{ asset($client->image) }}" alt="Testimonial Image" style="max-width: 200px; max-height: 200px;"></td>
        <td>
            <a href="{{ route('client.edit', $client->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('client.destroy', $client->id) }}" method="POST" style="display: inline;">
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
