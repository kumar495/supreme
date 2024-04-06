<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
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
                    <h2>Add Activity</h2>
                </div>
                
            </div>
        </div>
        
        <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <strong>Destination:</strong>
            <select name="destination_id" class="form-control">
                <option value="">-- Select Destination --</option>
                @foreach ($destinations as $destination)
                    <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                @endforeach
            </select>
            @error('destination_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder=" Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <input type="textarea" name="description" class="form-control" placeholder="Description">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
<div class="sidebar">
        @include('layouts.adminfooter')
    </div>