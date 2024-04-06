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
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
        <h2>Employees Details</h2>
        <div class="mb-2">
            <a href="{{ route('employee.create') }}" class="btn btn-success">Add Employee</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($employees as $key => $employee)
    <tr>
    <td>{{ $employee->id }}</td>

        <td>{{ $employee->name }}</td>
        <td>{{ $employee->address }}</td>
        <td>{{ $employee->position }}</td>

        <td><img src="{{ asset($employee->image) }}" alt="Testimonial Image" style="max-width: 200px; max-height: 200px;"></td>
        <td>
            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display: inline;">
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
