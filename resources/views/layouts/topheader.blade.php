@include('layouts.filecss')


<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

   
</body>

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
  <li class="nav-item dropdown">
    @php
        $notifications = collect(); 
        $users = \App\Models\User::all(); 

        foreach ($users as $user) {
            $userNotifications = $user->notifications;
            $notifications = $notifications->merge($userNotifications); 
        }
    @endphp

    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <div id="notifications">
        <span class="badge badge-danger navbar-badge" id="notification-badge">
    {{ $notifications->whereNull('read_at')->count() }}
</span>
        </div>
    </a>

    <div id="notificationDropdown" class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <style>
       .read-notification {
    color: black; 
    background-color: #f0f0f0; 
}

.unread-notification {
    color: black; 
    background-color: grey; 
}

    </style>
    <ul>
    <li><a href ="{{ route('markasRead') }}"> Marks All as Read </a></li>
        @foreach ($notifications->take(10) as $notification)
            <span class="dropdown-item dropdown-header 
                  @if ($notification->read_at === null) unread-notification 
  
                  @else read-notification 
                  @endif">Booking is Created </span>
        @endforeach
        @if ($notifications->count() > 10)
            <li><a href="" class="dropdown-item">See All Notifications</a></li>
        @endif
    </ul>
    <div id="notificationList"></div>
</div>   

  </nav>
 