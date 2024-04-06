@include('layouts.filecss')


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <img src="{{ asset('images/supreme.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Supreme Himalayas</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Admin</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('testimonial.index') }}" class="nav-link">
                            <i class="fas fa-image"></i>
                            <p>
                                Testimonial Image
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('destinations.index') }}" class="nav-link">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>
                                Destinations
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('activities.index') }}" class="nav-link">
                            <i class="fas fa-running"></i>
                            <p>
                                Activities
                                <span class="right badge badge-info"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('trip.index') }}" class="nav-link">
                            <i class="fas fa-plane"></i>
                            <p>
                                Trips
                                <span class="right badge badge-info"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('bookings.index') }}" class="nav-link">
                            <i class="fas fa-ticket-alt"></i>
                            <p>
                                Booking Details
                                <span class="right badge badge-info"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog.index') }}" class="nav-link">
                            <i class="fas fa-blog"></i>
                            <p>
                                Blog Management
                                <span class="right badge badge-info"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.index') }}" class="nav-link">
                        <i class="fa fa-hiking"></i>
                                                    <p>
                                 Guide Management
                                <span class="right badge badge-info"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('review.index') }}" class="nav-link">
                        <i class="fa-solid fa-comments"></i>                                                    <p>
                                 Review Management
                                <span class="right badge badge-info"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('doubts.index') }}" class="nav-link">
                        <i class="fa fa-question"></i>                                                    <p>
                                 Inquery Show
                                <span class="right badge badge-info"></span>
                            </p>
                        </a>
                    </li>
                    
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var sidebarItems = document.querySelectorAll('.nav-item');
        sidebarItems.forEach(function(item) {
            item.addEventListener('click', function() {
                // Remove 'active' class from all sidebar items
                sidebarItems.forEach(function(item) {
                    item.classList.remove('active');
                });
                // Add 'active' class to the clicked item
                this.classList.add('active');
            });
        });
    });
</script>

