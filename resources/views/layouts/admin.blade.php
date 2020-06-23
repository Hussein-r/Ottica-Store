<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ottica Admin</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

      <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
      
          <!-- Sidebar -->
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
              <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-glasses"></i>
              </div>
              <div class="sidebar-brand-text mx-3">Ottica Store</div>
            </a>
      
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
      
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>
      {{--
            <!-- Divider -->
            <hr class="sidebar-divider">
      
            <!-- Heading -->
            <div class="sidebar-heading">
              Interface
            </div>
      
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Components</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Custom Components:</h6>
                  <a class="collapse-item" href="buttons.html">Buttons</a>
                  <a class="collapse-item" href="cards.html">Cards</a>
                </div>
              </div>
            </li>
      
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Utilities</span>
              </a>
              <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Custom Utilities:</h6>
                  <a class="collapse-item" href="utilities-color.html">Colors</a>
                  <a class="collapse-item" href="utilities-border.html">Borders</a>
                  <a class="collapse-item" href="utilities-animation.html">Animations</a>
                  <a class="collapse-item" href="utilities-other.html">Other</a>
                </div>
              </div>
            </li>
      --}}
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Users -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapsePages">
                  <i class="fas fa-fw fa-users"></i>
                  <span>Users</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('user.index')}}">All Users</a>
                    <a class="collapse-item" href="{{url('/mail')}}">Send E-mail to All</a>
  
                  </div>
                </div>
            </li>
            <!-- Glasses ---------------- -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
              Glass Products
            </div>
      
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGlasses" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-glasses"></i>
                <span>Glasses</span>
              </a>
              <div id="collapseGlasses" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Glasses</h6>
                  <a class="collapse-item" href="{{route('glass.create')}}">Add New</a>
                  <a class="collapse-item" href="{{url('admin/sunglasses')}}">Sun Glasses</a>
                  <a class="collapse-item" href="{{url('admin/eyeglasses')}}">Eye Glasses</a>
                  <a class="collapse-item" href="{{route('glass.index')}}">All Glasses</a>
                </div>
              </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGlassSet" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Glasses Settings</span>
              </a>
              <!-- Brands -------------------------- -->
              <div id="collapseGlassSet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Brands</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Glasses Brands</h6>
                        <a class="dropdown-item" href="{{route('brand.create')}}">Add New </a>
                        <a class="dropdown-item" href="{{route('brand.index')}}">All Brands</a>
                      </div>
                    </div>
                  </div>

              <!-- Colors -------------------------- -->

                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Colors</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Lenses Colors</h6>
                        <a class="dropdown-item" href="{{route('color.create')}}">Add New color </a>
                        <a class="dropdown-item" href="{{route('color.index')}}">All Colors</a>
                      </div>
                    </div>
                  </div>

              <!-- Face shape -------------------------- -->

                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Face Shape</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Face Shape</h6>
                        <a class="dropdown-item" href="{{route('brand.create')}}">Add New </a>
                        <a class="dropdown-item" href="{{route('brand.index')}}">All Shapes</a>
                      </div>
                    </div>
                  </div>
              <!-- Frame shape -------------------------- -->
                  
                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Frame Shape</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Glasses Frames</h6>
                        <a class="dropdown-item" href="{{route('brand.create')}}">Add New </a>
                        <a class="dropdown-item" href="{{route('brand.index')}}">All Shapes</a>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Fit Size -------------------------- -->
                  
                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Fit</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Fit Size</h6>
                        <a class="dropdown-item" href="{{route('brand.create')}}">Add New </a>
                        <a class="dropdown-item" href="{{route('brand.index')}}">All Fits</a>
                      </div>
                    </div>
                  </div>
                  <!-- Frame shape -------------------------- -->
                  
                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Material</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Material</h6>
                        <a class="dropdown-item" href="{{route('brand.create')}}">Add New </a>
                        <a class="dropdown-item" href="{{route('brand.index')}}">All Materias</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>

            <!-- Contact Lenses ------------------------------------------- -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
              Lenses Products
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLenses" aria-expanded="true" aria-controls="collapsePages">
                  <i class="fas fa-fw fa-eye"></i>
                  <span>Lenses</span>
                </a>
                <div id="collapseLenses" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Lenses</h6>
                    <a class="collapse-item" href="{{route('lenses.create')}}">Add New</a>
                    <a class="collapse-item" href="{{route('lenses.index')}}">All Lenses</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLenseSet" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Lenses Settings</span>
              </a>
              <!-- Brands -------------------------- -->
              <div id="collapseLenseSet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Brands</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Lenses Brands</h6>
                        <a class="dropdown-item" href="{{route('lenseBrand.create')}}">Add New </a>
                        <a class="dropdown-item" href="{{route('lenseBrand.index')}}">All Brands</a>
                      </div>
                    </div>
                  </div>

              <!-- Colors -------------------------- -->

                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Colors</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Glasses Colors</h6>
                        <a class="dropdown-item" href="{{route('color.create')}}">Add New </a>
                        <a class="dropdown-item" href="{{route('color.index')}}">All Colors</a>
                      </div>
                    </div>
                  </div>

              <!-- Face shape -------------------------- -->

                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Face Shape</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Face Shape</h6>
                        <a class="dropdown-item" href="{{route('brand.create')}}">Add New </a>
                        <a class="dropdown-item" href="{{route('brand.index')}}">All Shapes</a>
                      </div>
                    </div>
                  </div>
              <!-- Frame shape -------------------------- -->
                  
                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Frame Shape</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Glasses Frames</h6>
                        <a class="dropdown-item" href="{{route('brand.create')}}">Add New </a>
                        <a class="dropdown-item" href="{{route('brand.index')}}">All Shapes</a>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Fit Size -------------------------- -->
                  
                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Fit</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Fit Size</h6>
                        <a class="dropdown-item" href="{{route('brand.create')}}">Add New </a>
                        <a class="dropdown-item" href="{{route('brand.index')}}">All Fits</a>
                      </div>
                    </div>
                  </div>
                  <!-- Frame shape -------------------------- -->
                  
                  <div class="collapse-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="width: 120px">Material</button>
                      <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                        <h6 class="dropdown-header">Material</h6>
                        <a class="dropdown-item" href="{{route('brand.create')}}">Add New </a>
                        <a class="dropdown-item" href="{{route('brand.index')}}">All Materias</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Nav Item - Orders -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true" aria-controls="collapsePages">
                  <i class="fas fa-fw fa-clipboard-list"></i>
                  <span>Orders</span>
                </a>
                <div id="collapseOrders" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('orderslist.index')}}">All Orders</a>
                    <a class="collapse-item" href="{{url('orders/inactive')}}">Inactive</a>
                    <a class="collapse-item" href="{{url('orders/processing')}}">Processing</a>
                    <a class="collapse-item" href="{{url('orders/done')}}">Done</a>
  
                  </div>
                </div>
            </li>
            <!-- Nav Item - Offers -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOffers" aria-expanded="true" aria-controls="collapsePages">
                  <i class="fas fa-fw fa-clipboard-list"></i>
                  <span>Offers</span>
                </a>
                <div id="collapseOffers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('specialoffers.create')}}">Add New</a>
                    <a class="collapse-item" href="{{route('specialoffers.index')}}">All Offers</a>                    
  
                  </div>
                </div>
            </li>
            {{-- <hr class="sidebar-divider"> --}}
            <!-- Nav Item - Charts -->
            {{-- <li class="nav-item">
              <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
            </li> --}}
      
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
      
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
      
          </ul>
          <!-- End of Sidebar -->
      
          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">
      
            <!-- Main Content -->
            <div id="content">
      
              <!-- Topbar -->
              <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
                </button>
      
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
      
                  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                  <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                      <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                              <i class="fas fa-search fa-sm"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </li>
      
     
      
                  <!-- Nav Item - User Information -->
                  <!-- Authentication Links -->
                  @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle mr-2 d-none d-lg-inline text-gray-600" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{route('user.show',Auth::user())}}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                              {{ __('profile') }}
                          </a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                              {{ __('Logout') }}
                          </a>


                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
                </ul>
      
              </nav>
              <!-- End of Topbar -->
              <main class="py-4">
                <div id="content-wrapper" class="d-flex flex-column">
                <div class="container-fluid">
                @yield('content')
                </div>
                </div>
            </main>
      
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <p>
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="icon-heart" aria-hidden="true"></i> by <a href="{{url('/')}}" target="_blank" class="text-primary">Ottica Store</a>
                        </p>                
                    </div>
              </div>
            </footer>
            <!-- End of Footer -->
      
          </div>
          <!-- End of Content Wrapper -->
      
        </div>
        <!-- End of Page Wrapper -->
      
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>
    

        <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/js/demo/chart-area-demo.js"></script>
  <script src="/js/demo/chart-pie-demo.js"></script>
    </body>
</html>