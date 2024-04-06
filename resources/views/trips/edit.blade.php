<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body> 
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
                    <h2>Edit Trip</h2>
                </div>
            </div>
        </div>


        <form action="{{ route('trip.update', $trips->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $trips->name) }}" placeholder="Name">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Highlights:</strong>
                        <textarea name="highlights" class="form-control" placeholder="Highlights">{{ old('highlights', $trips->highlights) }}</textarea>
                        @error('highlights')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Activity:</strong>
                        <input type="text" name="activity_id" class="form-control" value="{{ $activity_name }}" placeholder="Activity" readonly>
                        @error('activity_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Destination:</strong>
                        <input type="text" name="destination_id" class="form-control" value="{{ $destination_name }}" placeholder="Destination" readonly>
                        @error('destination_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <strong>Actual Price:</strong>
                        <input type="number" name="actual_price" class="form-control" value="{{ old('actual_price', $trips->actual_price) }}" placeholder="Actual Price">
                        @error('actual_price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <strong>Discount Price:</strong>
                        <input type="number" name="discount_price" class="form-control" value="{{ old('discount_price', $trips->discount_price) }}" placeholder="Discount Price">
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
                        <input type="number" name="trip_day" class="form-control" value="{{ old('trip_day', $trips->trip_day) }}" placeholder="Trip Day">
                        @error('trip_day')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Level:</strong>
                        <input type="text" name="level" class="form-control" value="{{ old('level', $trips->level) }}" placeholder="Level">
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
            <input type="time" name="arrive" class="form-control" value="{{ old('arrive', $trips->arrive) }}" placeholder="HH:MM AM/PM">
            @error('arrive')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Departure Time:</strong>
            <input type="time" name="departure" class="form-control"  value="{{ old('departure', $trips->departure) }}"  placeholder="HH:MM AM/PM">
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
                        <textarea name="description" id="description" placeholder="Description">{{ old('description', $trips->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <img src="{{ asset( $trips->image) }}" alt="Current Image" class="mt-2" style="max-width: 100%;">
                    </div>
                </div>

            <div class="row">
                <button type="submit" class="btn btn-primary ml-3">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
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
</script>


