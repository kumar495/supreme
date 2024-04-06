@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
@endif


<div class="bg-white mb-3" style="padding: 30px;">
    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Leave a comment</h4>
    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" class="form-control" id="website" name="website">
        </div>

        <div class="form-group">
            <label for="description">Message *</label>
            <textarea id="description" cols="30" rows="5" class="form-control" name="description"></textarea>
        </div>
        <div class="form-group" style="display: none;">
    <label for="name">Blog </label>
    <input type="hidden" class="form-control" id="blog_id" name="blog_id">
</div>

        <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
    </form>
</div>

<style>

.close-btn {
    float: right;
    font-size: 20px;
    cursor: pointer;
}


</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var url = window.location.href;

        var segments = url.split('/');
        var blogId = segments[segments.length - 2]; 
        document.getElementById('blog_id').value = blogId;
    });
</script>


