<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta name="description" content="The leading source for mining and solid mineral news in Nigeria. Discover valuable insights, news, and resources about Nigeria mining. Connect with industry experts and enthusiasts. Post and find classified ads for mining equipment, services, and opportunities. Your gateway to the thriving world of mining in Nigeria.">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name='copyright' content='Copyright © 2024 Nigerian Mining. All rights reserved.'>
    <meta name="keywords" content="Nigeria mining, mining industry, mining news, mining equipment, classified ads, mining services, minerals, resources, mining opportunities, exploration, mining community, geological insights, mineral extraction, Nigerian mines, drilling equipment, excavation tools, mining machinery">

    <meta property="og:title" content="Nigeria Mining Login">
    <meta property="og:description" content="Explore the rich landscape of Nigeria's mining industry and connect with experts. Post and discover ads for mining equipment, services, and opportunities. Your comprehensive platform for everything related to mining in Nigeria.">
    <meta property="og:url" content="{{ route('seller.items') }}">
    <meta property="og:site_name" content="Nigerian Mining Login" />
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('user/images/logo.png') }}">
    <meta property="og:image:width" content="734" />
    <meta property="og:image:height" content="418" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Nigeria Mining About Us">
    <meta name="twitter:description" content="Explore the rich landscape of Nigeria's mining industry and connect with experts. Post and discover ads for mining equipment, services, and opportunities. Your comprehensive platform for everything related to mining in Nigeria.">
    <meta name="twitter:image" content="{{ asset('user/images/logo.png') }}">

    <link rel="canonical" href="https://nigerianmining.com">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('user/images/nm-favicon.png')}}" sizes="32x32" width="64" height="64">
    <!-- Stylesheets -->
    <!-- <link rel="stylesheet" href="{{asset('user/css/main.css')}}"> -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jquery-bar-rating/fontawesome-stars-o.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jquery-bar-rating/fontawesome-stars.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/3df60fe6e2.js" crossorigin="anonymous"></script>

    {{-- Ad Performance Page --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    @yield('style')
    <style>
    .post-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.share-container {
    text-align: right;
}
    </style>
</head>

<body>
    <div class="bg-light">
        <div class="container-scroller">
            <nav class="navbar col-lg-12 col-12 p-1 fixed-top d-flex flex-row w-100" style="z-index: 20;">
                <div class="text-center navbar-menu-wrapper d-flex align-items-center justify-content-end w-100">
                  <div class="container col-md-10">
                  <a class="navbar-brand brand-logo" href="{{route('marketplace')}}"><img src="{{ asset('images/logo.svg') }}" alt="logo"/></a>
                  <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a> -->
                <!-- </div>
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end"> -->
                  <button class="navbar-toggler navbar-toggler align-self-center ml-4" type="button" data-toggle="minimize">
                    <span class="fa fa-bars"></span>
                  </button>
                  <style>
                    .navbar-nav .fa{
                      font-size: 20px;
                    }
                  </style>
                  <ul class="navbar-nav navbar-nav-right">
                      <li class="nav-item dropdown d-lg-flex d-none">
                        <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="{{route('seller.items.create')}}">
                            <i class="fa fa-regular fa-square-plus mx-0"></i>
                          </a>
                      </li>
                    {{-- <li class="nav-item dropdown d-flex">
                      <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="fa fa-bookmark-o mx-0"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                              <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                          </div>
                          <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                              The meeting is cancelled
                            </p>
                          </div>
                        </a>
                        <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                              <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                          </div>
                          <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                              New product launch
                            </p>
                          </div>
                        </a>
                        <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                              <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                          </div>
                          <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                              Upcoming board meeting
                            </p>
                          </div>
                        </a>
                      </div>
                    </li> --}}
                    <li class="nav-item dropdown mr-4 d-lg-flex d-none">
                      <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="{{ route('personal.info') }}">
                        <i class="fa fa-user-circle-o"></i>
                      </a>
                    </li>
                    <li class="nav-item dropdown mr-4 d-lg-flex d-none">
                      <a class="btn btn-dark font-weight-bold" href="{{route('seller.items.create')}}">
                        List New Item
                      </a>
                    </li>
                    <li class="nav-item dropdown d-flex mr-4 ">
                      <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="fa fa-gear"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
                        <a class="dropdown-item preview-item" href="{{ route('personal.info') }}">
                            <i class="icon-head"></i> Profile
                        </a>
                        {{-- <a class="dropdown-item preview-item" href="{{ route('ads') }}">
                            <i class="icon-head"></i> Create Ad
                        </a> --}}
                        <a class="dropdown-item preview-item" href="{{ route('subscribe') }}">
                            <i class="icon-head"></i> Subcription
                        </a>
                        <a class="dropdown-item preview-item" href="{{ route('payments') }}">
                            <i class="icon-head"></i> Payment History
                        </a>
                        <a class="dropdown-item preview-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-inbox"></i> Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                      </div>
                    </li>
                  </ul>
                  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="fa fa-bars"></span>
                  </button>
                </div>
                </div>
            </nav>
            <style>
                @media (min-width:992px) {
                    #sidebars{
                        width: 80rem;
                    }
                }
            </style>

            <div class="container page-body-wrapper mt-4" id="sidebars" style="max-width: 70rem;">
                <!-- partial:partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <div class="user-profile">
                        <div class="user-image">
                        <img src="{{ asset('images/faces/user-vector.png') }}">
                        </div>
                        <div class="user-name">
                            {{auth()->user()->name}} {{auth()->user()->company}}
                        </div>
                        <!-- <div class="user-designation">
                        61364478250
                        </div> -->
                    </div>
                    <ul class="nav">
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('seller.items') }}">
                            <i class="fa fa-window-maximize menu-icon"></i>
                            <span class="menu-title">Current Adverts</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('performance') }}">
                            <i class="fa fa-chart-column menu-icon"></i>
                            <span class="menu-title">Ad Performance</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-magnifying-glass-chart menu-icon"></i>
                            <span class="menu-title">User Insights</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('personal.info') }}">
                            <i class="fa fa-gear menu-icon"></i>
                            <span class="menu-title">Settings</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('seller.faq') }}">
                            <i class="fa fa-clipboard-question menu-icon"></i>
                            <span class="menu-title">FAQ</span>
                        </a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-arrow-right-from-bracket menu-icon"></i>
                            <span class="menu-title">Log out</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                        </li>
                    </ul>
                </nav>

                @yield('content')


            </div>
        </div>
    </div>


    @yield('scripts')
    <!-- base:js -->
    <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
</body>

</html>
