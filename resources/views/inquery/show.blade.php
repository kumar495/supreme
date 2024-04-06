<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
div class="header">
        @include('layouts.topheader')
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        @include('layouts.sidebar')
    </div>

<div class="container mt-1" style="max-width: 800px;">
        <h2>Inquery  Details</h2>
        
        <table class="table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($doubts as $key => $doubt)
    <tr>
    <td>{{ $doubt->id }}</td>

        <td>{{ $doubt->name }}</td>
        <td>{{ $doubt->email }}</td>
        <td>{{ $doubt->phone }}</td>
        <td>{{ $doubt->description }}</td>

        <td>
            <form action="{{ route('doubts.destroy', $doubt->id) }}" method="POST" style="display: inline;">
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
