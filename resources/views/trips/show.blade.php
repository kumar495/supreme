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
        <h2>Trips Details</h2>
  
        @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
        <div class="mb-2">
            <a href="{{ route('trip.create') }}" class="btn btn-success">Add Trip</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Trip Name</th>
                    <th>Actual Price</th>
                    <th>Discount Price</th>
                    <th>Trip Day</th>
                    <th>Level</th>
                    <th>Destination Name</th>
                    <th>Activity Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($trips as $key => $trip)
    <tr>
        <td>{{ $trip->name }}</td>
        <td>${{ $trip->actual_price }}</td>
        <td>${{ $trip->discount_price }}</td>
        <td>{{ $trip->trip_day }}</td>
        <td>{{ $trip->level }}</td>
        <td>{{ isset($destination_name[$key]) ? $destination_name[$key] : '' }}</td>
        <td>{{ isset($activity_name[$key]) ? $activity_name[$key] : '' }}</td>
    


                        <td>
                            <a href="{{ route('trip.edit', $trip->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('trip.destroy', $trip->id) }}" method="POST" style="display: inline;">
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
