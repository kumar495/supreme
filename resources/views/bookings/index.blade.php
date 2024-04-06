<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }
</style>
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
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>No of Traveller</th>
                <th>Booking Date</th>
                <th>Phone</th>
                <th>Trip Name</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)
                @if (is_array($notification['data']))
                    @foreach ($notification['data'] as $data)
                        @if (is_array($data))
                            @php
                                $trip = \App\Models\Trip::find($data['trip_id']);
                            @endphp
                            @if ($trip)
                                <tr>
                                    <td>{{ $data['name'] ?? '' }}</td>
                                    <td>{{ $data['address'] ?? '' }}</td>
                                    <td>{{ $data['email'] ?? '' }}</td>
                                    <td>{{ $data['no_of_people'] ?? '' }}</td>
                                    <td>{{ $data['date'] ?? '' }}</td>
                                    <td>{{ $data['phone'] ?? '' }}</td>
                                    <td>{{ $trip->name }}</td> 
                                </tr>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<div class="footer">
    @include('layouts.adminfooter')
</div>

</body>
</html>
