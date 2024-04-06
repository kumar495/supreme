<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Client Review</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit Review of Client</h2>
                </div>
            </div>
        </div>

        <form action="{{ route('client.update', $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $client->name) }}" placeholder="Name">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Heightlight:</strong>
                        <input type="text" name="short" class="form-control" value="{{ old('short', $client->short) }}" placeholder="Address">
                        @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Position:</strong>
                        <input type="text" name="position" class="form-control" value="{{ old('position', $client->position) }}" placeholder="Position">
                        @error('position')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <input type="text" name="description" class="form-control" value="{{ old('description', $client->description) }}" placeholder="Position">
                        @error('position')
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
                        <img src="{{ asset($client->image) }}" alt="Current Image" class="mt-2" style="max-width: 100%;">
                    </div>
                </div>

            <div class="row">
                <button type="submit" class="btn btn-primary ml-3">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
