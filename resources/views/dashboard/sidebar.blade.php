<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{ asset('admincss/img/avatar-13.png')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">{{ Auth::user()->name }}</h1>
            <p style="text-transform:uppercase;">{{ Auth::user()->role->name }}</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            @if(Auth::user()->role->name == 'user')
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="/dashboard"> <i class="fa fa-home"></i>Dashboard</a></li>
                <li class="{{ request()->is('user.schedules') ? 'active' : '' }}"><a href="{{ route('user.schedules') }}"><i class="fa fa-calendar"></i>My Schedules</a></li>
                <li class="{{ request()->is('users.payments.user') ? 'active' : '' }}">
                  <a href="{{ route('users.payments.user', Auth::user()->id) }}">
                    <i class=" fa fa-credit-card"></i>My Payments</a>
                  </li>

            @else
              <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                  <a href="/dashboard">
                      <i class="fa fa-home"></i>Dashboard
                  </a>
              </li>
              <li class="{{ request()->is('driver.schedules') ? 'active' : '' }}">
                  <a href="{{ route('driver.schedules') }}">
                      <i class="fa fa-calendar"></i>All Schedules
                  </a>
              </li>
            @endif
        </ul>
      </nav>

