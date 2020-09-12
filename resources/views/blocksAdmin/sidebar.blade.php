<aside class="main-sidebar sidebar-primary elevation-4" style="background-color: white;">
    <!-- Sidebar -->
    <div class="sidebar">
    
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="{{ asset('images/User/' . $data->file) }}" class="img-circle elevation-2" alt="Admin Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->email}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          {{-- ///////////////////////////////////////////////// --}}
          <li class="nav-header">ADMIN</li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
    
              <li class="nav-item">
                <a href="{{ route('admin.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Admin</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.adminlist')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin list</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- ///////////////////////////////////////////////// --}}
          <li class="nav-header">USER</li>         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">            
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('user.userlist') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Table</p>
                </a>
              </li>              
            </ul>
          </li>  
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('user.profile') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Page</p>
                </a>
              </li>              
            </ul>
          </li>               --}}
          {{-- //////////////////////////////////////////////////////// --}}
          <li class="nav-header">GAME</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('game.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Game</p>
                </a>
              </li>
             
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('game.createcategory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Game Category</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('game.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Game Table</p>
                </a>
              </li>
           
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>