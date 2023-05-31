  <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ url('public/assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{Request::path() ==  'admin/dashboard' ? 'active' : ''}}" href="{{url('/admin/dashboard')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link {{Request::path() ==  'admin/users' ? 'active' : ''}}" href="{{url('/admin/users')}}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Registred Users</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{Request::path() ==  'admin/uncompleteusers' ? 'active' : ''}}" href="{{url('/admin/uncompleteusers')}}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Uncomplete Register Users</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{Request::path() ==  'admin/cards' ? 'active' : ''}}" href="{{url('/admin/cards')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Cards</span>
              </a>
            </li>

             <li class="nav-item">
              <a class="nav-link {{Request::path() ==  'admin/orders' ? 'active' : ''}}" href="{{url('/admin/orders')}}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Orders</span>
              </a>
            </li>


          </ul>

        </div>
      </div>
    </div>
  </nav>