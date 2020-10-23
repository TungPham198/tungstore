<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin Tùng Shop</title>
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <script language="JavaScript" type="text/javascript">
        function checkdel(){
            return confirm('Bnạ chắc chắn muốn xoá chứ ?');
        }
    </script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{asset('admin/dashboard')}}">Admin Tùng Shop</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa"></i>{{Auth::user()->email}}
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{asset('admin/doimk/'.Auth::user()->id)}}">Đổi mật khẩu</a></li>
                        <li class="divider"></li>
                        <li><a href="{{asset('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{asset('admin/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Trang chủ Admin</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Danh mục<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{asset('admin/danhmuc/danhsach')}}">Danh sách danh mục</a>
                                </li>
                                <li>
                                    <a href="{{asset('admin/danhmuc/them')}}">Thêm danh mục</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Sản Phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{asset('admin/sanpham/danhsach')}}">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{asset('admin/sanpham/them')}}">Thêm sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        @if(Auth::user()->level==1)
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Người dùng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{asset('admin/nguoidung/danhsach')}}">Danh sách người dùng</a>
                                </li>
                                <li>
                                    <a href="{{asset('admin/nguoidung/them')}}">Thêm người dùng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Banner<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{asset('admin/banner/danhsach')}}">Danh sách Banner</a>
                                </li>
                                <li>
                                    <a href="{{asset('admin/banner/them')}}">Thêm Banner</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{asset('admin/donhang/danhsach')}}"><i class="fa fa-users fa-fw"></i> Danh sách đơn hàng<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    @yield('script')
</body>

</html>
