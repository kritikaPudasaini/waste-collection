<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('admincss/img/avatar-12.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5" style="color:white;">{{ Auth::user()->name }}</h1>
            <p style="text-transform:uppercase; font-weight:bold;">{{ Auth::user()->role->name }}</p>
        </div>
    </div>
    <!-- Sidebar Navigation Menus-->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a href="admin/dashboard"> <i class="fa fa-home"></i>Dashboard</a></li>
        <li class="{{ request()->is('view_user') ? 'active' : '' }}"><a href="{{ url('view_user') }}"> <i class="fa fa-users"></i>Users</a></li>
        <li class="{{ request()->is('view_schedule') ? 'active' : '' }}"><a href="{{ url('view_schedule') }}"> <i class="fa fa-calendar"></i>Schedule</a></li>
        <li class="{{ request()->is('view_role') ? 'active' : '' }}"><a href="{{ url('view_role') }}"> <i class="fa fa-tasks"></i>Role</a></li>
        <li class="{{ request()->is('view_area') ? 'active' : '' }}"><a href="{{ url('view_area') }}"> <i class="fa fa-map-marker"></i>Area</a></li>
        <li class="{{ request()->is('showcomments') ? 'active' : '' }}"><a href="{{ url('showcomments') }}"> <i class="fa fa-comments-o"></i>Feedback</a></li>
        <li class="{{ request()->is('payments*') ? 'active' : '' }}">
            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Payment</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li class="{{ request()->is('payments') ? 'active' : '' }}"><a href="{{ route('payments.index') }}">View Payments</a></li>
                <li class="{{ request()->is('payments/create') ? 'active' : '' }}"><a href="{{ route('payments.create') }}">Add Payment</a></li>
                <li class="{{ request()->is('users/' . Auth::user()->id . '/payments/admin') ? 'active' : '' }}"><a href="{{ route('users.payments.admin', Auth::user()->id) }}">My Payments</a></li>
            </ul>
        </li>
    </ul>
</nav>
