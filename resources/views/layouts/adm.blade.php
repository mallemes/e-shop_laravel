<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('userViews/css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{asset('userViews/css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('userViews/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('userViews/images/fevicon.png')}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('userViews/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('userViews/css/owl.carousel.min.css')}}">
    <link rel="stylesoeet" href="{{asset('userViews/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper" >

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"  id="accordionSidebar" >

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('items.index')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Users index page</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
               aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>User management</span>
            </a>
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    @canany(['viewAny'], App\Models\User::class)
                    <a class="collapse-item active" href="{{route('company.index')}}">User list</a>
                    <a class="collapse-item" href="{{route('company.list.personals')}}">Personals</a>
                        <a class="collapse-item" href="{{route('company.ordered.items')}}">User Buys</a>
                    @endcan
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        @canany(['create'], App\Models\Category::class)
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Item management</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
{{--                    <a class="collapse-item" href="utilities-color.html">Categories</a>--}}
                    <a class="collapse-item" href="{{route('items.indexes')}}">All items</a>
                    <a class="collapse-item" href="{{route('company.manager.addcatpage')}}"> change Categories</a>
                    <a class="collapse-item" href="{{route('items.create')}}">create item</a>
                </div>
            </div>
        </li>
        @endcan

        <!-- Divider -->


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="login.html">Login</a>
                    <a class="collapse-item" href="register.html">Register</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="404.html">404 Page</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>

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

                <!-- Topbar Search -->
{{--                <form  action="{{route('items.search')}}" method="get"--}}
{{--                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">--}}
{{--                    @csrf--}}
{{--                    <div class="input-group">--}}
{{--                        <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..."--}}
{{--                               aria-label="Search" aria-describedby="basic-addon2">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <button class="btn btn-primary" type="submit">--}}
{{--                                <i class="fas fa-search fa-sm"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--               --}}

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i > Lang</i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                languages
                            </h6>


                            @foreach(config('app.langs') as $ln => $lang)
                                <a href="{{route('switch.lang', $ln)}}" class="dropdown-item">
                                    <img src="{{ asset('vendor/blade-flags/country-ru.svg') }}" class="mr-2" alt="flag" width="5%" >
                                    {{$lang}}
                                </a>
                            @endforeach
                        </div>
                    </li>

{{--                    <!-- Nav Item - Messages -->--}}
{{--                    <li class="nav-item dropdown no-arrow mx-1">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-envelope fa-fw"></i>--}}
{{--                            <!-- Counter - Messages -->--}}
{{--                            <span class="badge badge-danger badge-counter">7</span>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Messages -->--}}
{{--                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"--}}
{{--                             aria-labelledby="messagesDropdown">--}}
{{--                            <h6 class="dropdown-header">--}}
{{--                                Message Center--}}
{{--                            </h6>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="dropdown-list-image mr-3">--}}
{{--                                    <img class="rounded-circle" src="img/undraw_profile_1.svg"--}}
{{--                                         alt="...">--}}
{{--                                    <div class="status-indicator bg-success"></div>--}}
{{--                                </div>--}}
{{--                                <div class="font-weight-bold">--}}
{{--                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a--}}
{{--                                        problem I've been having.</div>--}}
{{--                                    <div class="small text-gray-500">Emily Fowler · 58m</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="dropdown-list-image mr-3">--}}
{{--                                    <img class="rounded-circle" src="img/undraw_profile_2.svg"--}}
{{--                                         alt="...">--}}
{{--                                    <div class="status-indicator"></div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="text-truncate">I have the photos that you ordered last month, how--}}
{{--                                        would you like them sent to you?</div>--}}
{{--                                    <div class="small text-gray-500">Jae Chun · 1d</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="dropdown-list-image mr-3">--}}
{{--                                    <img class="rounded-circle" src="img/undraw_profile_3.svg"--}}
{{--                                         alt="...">--}}
{{--                                    <div class="status-indicator bg-warning"></div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="text-truncate">Last month's report looks great, I am very happy with--}}
{{--                                        the progress so far, keep up the good work!</div>--}}
{{--                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="dropdown-list-image mr-3">--}}
{{--                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"--}}
{{--                                         alt="...">--}}
{{--                                    <div class="status-indicator bg-success"></div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone--}}
{{--                                        told me that people say this to all dogs, even if they aren't good...</div>--}}
{{--                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                            <img class="img-profile rounded-circle"
                                 src="data:image/jpeg;base64,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">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
</body>

</html>
