

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
    <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Inquiry Form</h4>
    <form action="{{ route('doubts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="website">Phone Number</label>
            <input type="number" class="form-control" id="number" name="phone" required>
        </div>

        <div class="form-group">
            <label for="description">Message *</label>
            <textarea id="description" cols="30" rows="5" class="form-control" name="description" required></textarea >
        </div>
        <div class="form-group mb-0">
            <input type="submit" value="Leave an Inquiry" class="btn btn-primary font-weight-semi-bold py-2 px-3">
        </div>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var url = window.location.href;

        var segments = url.split('/');
        var blogId = segments[segments.length - 2]; 
        document.getElementById('blog_id').value = blogId;
    });
</script>