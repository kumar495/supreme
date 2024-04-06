<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Page Title</title>
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
                    <h2>Add Trip</h2>
                </div>
            </div>
        </div>



        <form action="{{ route('trip.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Destination:</strong>
            <select class="form-control" id="destination" name="destination_id">
                <option value="">Select Destination</option>
                @foreach ($destinations as $destination)
                    <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                @endforeach
            </select>
            @error('destination_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Activity:</strong>
            <select class="form-control" id="activity" name="activity_id">
                <option value="">Select Activity</option>
                @foreach ($activities as $activity)
                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                @endforeach
            </select>
            @error('activity_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Highlights:</strong>
                        <textarea name="highlights"  id="highlights" class="form-control" placeholder="Highlights"></textarea>
                        @error('highlights')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <strong>Actual Price:</strong>
                        <input type="number" name="actual_price" class="form-control" placeholder="Actual Price">
                        @error('actual_price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <strong>Discount Price:</strong>
                        <input type="number" name="discount_price" class="form-control" placeholder="Discount Price">
                        @error('discount_price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Trip Day:</strong>
                        <input type="number" name="trip_day" class="form-control" placeholder="Trip Day">
                        @error('trip_day')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Level:</strong>
                        <input type="text" name="level" class="form-control" placeholder="Level">
                        @error('level')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Arrival Time:</strong>
            <input type="time" name="arrive" class="form-control" placeholder="HH:MM AM/PM">
            @error('arrive')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Departure Time:</strong>
            <input type="time" name="departure" class="form-control" placeholder="HH:MM AM/PM">
            @error('departure')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


            <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            <textarea name="description" id="description" placeholder="Description"></textarea>
            @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" name="image" id="image" required class="form-control">
                        @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
</div>


            <div class="row">
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>


   
</body>

</html>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'), {
            ckfinder: {
                uploadUrl: '{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}'
            }
        })
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#highlights'), {
            ckfinder: {
                uploadUrl: '{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}'
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
<div class="footer">
        @include('layouts.sidebar')
    </div>
