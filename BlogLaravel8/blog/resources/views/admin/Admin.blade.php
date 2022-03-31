<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}}">
    <link href="{{{asset('admin/vendor/fonts/circular-std/style.css')}}}" rel="stylesheet">
    <link rel="stylesheet" href="{{{asset('admin/libs/css/style.css')}}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <title>Admin</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="{{route('admin.create')}}">Trang Quản Trị Admin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy
                                                            Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is
                                                        now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is
                                                        watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica
                                                            Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/github.png" alt=""> <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dribbble.png" alt=""> <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dropbox.png" alt=""> <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/bitbucket.png" alt=""> <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/mail_chimp.png" alt=""><span>Mail chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/slack.png" alt=""> <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="#">More</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('admin/images/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">
                                        {{ Auth::user()->name }}

                                    </h5>
                                    <!-- <span class="status"></span><span class="ml-2">Available</span> -->
                                </div>
                                <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="fas fa-user mr-2"></i>Thông Tin</a>
                                <!-- <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a> -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <div class="nav-item">

                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button"><i class="fas fa-power-off mr-2"></i>Đăng
                                            Xuất</a>
                                    </div>
                                </form>


                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->

        <!-----nav trái------------------->

        <!-- left sidebar -->
        <!-- ============================================================== -->

        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <!-- <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-1" aria-controls="submenu-1"><i
                                        class="fa fa-fw fa-user-circle"></i>Dashboard <span
                                        class="badge badge-success">6</span></a> -->
                                <div id="submenu-1" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">E-Commerce</a>
                                            <div id="submenu-1-2" class="collapse submenu">
                                                <ul class="nav flex-column">
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Danh
                                    Mục</a>
                                <div id="submenu-4" class="collapse submenu">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('category.create')}}">Thêm Danh Mục Bài
                                                Viết</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('category.index')}}">Danh Sách Danh Mục
                                                Bài
                                                Viết</a>
                                        </li>


                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Bài Viết</a>
                                <div id="submenu-5" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('posts.create')}}">Thêm Bài Viết</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('posts.index')}}">Danh Sách Bài Viết</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-divider">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <div class="nav-item">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">

                                            Đăng Xuất
                                        </a>
                                    </div>
                                </form>
                            </li>

                        </ul>
                    </div>
                </nav>



            </div>
        </div>
        <div c lass=" container">
            @yield('content')
        </div>
    </div>

    <script src="{{asset('admin/vendor/jquery/jquery-3.3.1.min.js')}}"></script>

    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

    <script src="{{asset('admin/vendor/slimscroll/jquery.slimscroll.js')}}"></script>

    <script src="{{asset('admin/libs/js/main-js.js')}}"></script>
    <script src="{{asset('admin/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>

    <script src="{{asset('admin/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>

    <script src="{{asset('admin/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{asset('admin/vendor/charts/morris-bundle/morris.js')}}"></script>

    <script src="{{asset('admin/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{asset('admin/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{asset('admin/vendor/charts/c3charts/C3chartjs.js')}}"></script>

    <script src="{{{asset('admin/libs/js/dashboard-ecommerce.js')}}}"></script>
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor_desc');
        CKEDITOR.replace('ckeditor_short');
    </script>
</body>

</html>
