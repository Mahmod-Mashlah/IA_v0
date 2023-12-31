  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('./', []) }}" class="brand-link">
          {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
          <img src="{{ asset('assets/img/culture-center-logo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">SOURCE SAFE</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->


          <!-- SidebarSearch Form -->
          {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

          <!-- Sidebar Menu -->
          <nav class="mt-3">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item menu-open">
                      <a href="#" target="_blank" class="nav-link active">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Groups & Files
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ url('./groups', []) }}" class="nav-link ">
                                  <i class="far fa fa-th-large  nav-icon"></i>
                                  <p>Show All Groups </p>
                              </a>
                          </li>
                          @if (auth()->user()->id == 1)
                              <li class="nav-item">
                                  <a href="{{ url('./files', []) }}" class="nav-link ">
                                      <i class="far fa fa-file nav-icon"></i>
                                      <p>Show All Files</p>
                                  </a>
                              </li>
                          @endif
                          <li class="nav-item">
                              <a href="{{ url('checked-in-files', []) }}" class="nav-link ">
                                  <i class="far fa fa-bullseye nav-icon"></i>
                                  <p>Files Checked in </p>
                              </a>
                          </li>
                          {{--
               <li class="nav-item menu-open">
                <a href="#"  class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Files
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{ url('./files', []) }}" class="nav-link ">
                      <i class="far fa fa-indent nav-icon"></i>
                      <p>Show All Files</p>
                      </a>
                  </li>

                  --}}


                          {{-- <li class="nav-item">
                    <a href="{{ url('/groups/update', []) }}" class="nav-link">
                      <i class="far fa fa-edit nav-icon" aria-hidden="true"></i>
                      <p>Update a Group</p>
                    </a>
                  </li> --}}

                      </ul>
                  </li>


              </ul>
              </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
