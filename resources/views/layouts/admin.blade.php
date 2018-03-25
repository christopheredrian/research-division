<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/images/partgov.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Research Division</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="/css/animate.css">
    <!-- X-editable -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        form button {
            display: inline;
        }

        #flashMessage {
            margin-top: 10px !important;
        }

        .img-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;

            object-fit: cover;
            object-position: center right;
        }
    </style>
<?php

function skin($user)
{
    if ($user->hasRole('admin') || $user->hasRole('superadmin')) {
        return 'skin-black';
    } elseif ($user->hasRole('rr')) {
        return 'skin-blue';
    } elseif ($user->hasRole('me')) {
        return 'skin-red';
    } else {
        return 'skin-white';

    }
}

?>
@yield('styles')


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition {{ skin(Auth::user()) }} sidebar-mini fixed">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="/admin" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>R</b>DBC</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Research</b>Division</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            @if(Auth::user()->image)
                                <img src="{{ session('profile_image_link') }}" class="user-image" alt="User Image">
                            @else
                                <img src="/uploads/default.jpg" class="user-image" alt="User Image">
                            @endif
                            <span class="hidden-xs"> {{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">

                                @if(\Illuminate\Support\Facades\Auth::user()->image)
                                    <img src="{{ session('profile_image_link') }}" class="img-circle"
                                         alt="User Image">
                                @else
                                    <img src="/uploads/default.jpg" class="img-circle" alt="User Image">
                                @endif

                                <p>
                                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                    <small>{{ \Illuminate\Support\Facades\Auth::user()->email }}</small>
                                    <small>Member
                                        since: {{ \Illuminate\Support\Facades\Auth::user()->created_at  }}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">

                                    <a href="/admin/profile/edit" class="btn btn-default btn-flat">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="#" class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign out</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left">
                    @if(\Illuminate\Support\Facades\Auth::user()->image)
                        <img src="{{ session('profile_image_link') }}" class="img-circle" alt="User Image"
                             style="width: 50px; height: 50px;">
                    @else
                        <img src="/uploads/default.jpg" class="img-circle" alt="User Image"
                             style="width: 50px; height: 50px;">
                    @endif

                    <span class="hidden-xs"> {{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                    {{-- Make this a png file later depending on the role of the user --}}
                </div>
                <div class="pull-left info">
                    <p>{{ \Illuminate\Support\Facades\Auth::user()->name }}
                    </p>
                    <a href="#"><i
                                class="fa fa-circle text-success"></i> {{ \Illuminate\Support\Facades\Auth::user()->email }}
                    </a>
                </div>
            </div>
            <!-- search form -->
            <form action="/admin/search" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
        <i class="fa fa-search"></i>
        </button>
        </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            @if(Auth::user()->hasRole('superadmin'))
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MANAGEMENT</li>
                    <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
                        <a href="/admin/users">
                            <i class="fa fa-users"></i>
                            <span>Users</span>
                        </a>

                    </li>

                    <li class="{{ Request::is('admin/configurations*') ? 'active' : '' }}">
                        <a href="/admin/configurations">
                            <i class="fa fa-gears"></i>
                            <span>Configuration</span>
                        </a>

                    </li>
                </ul>
            @endif
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>

                <li class="{{ Request::is('admin') ? 'active' : '' }}">
                    <a href="/admin">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>


                </li>
                <?php
                $new_message_count = \App\Message::where('created_at', '>=', \Carbon\Carbon::today()->addDay(-5))->count()
                ?>
                @php()

                @endphp
                <li class="{{ Request::is('admin/messages*') ? 'active' : '' }}">
                    <a href="/admin/messages">
                        <i class="fa fa-envelope-o"></i>
                        <span>Messages</span>
                        <span class="pull-right-container">
                         <span class="label label-primary pull-right">{{ $new_message_count }}</span>
                    </span>
                    </a>

                </li>

                {{--<li class="treeview menu-open">--}}
                {{--<a href="#">--}}
                {{--<i class="fa fa-envelope-o"></i> <span>Mail</span>--}}
                {{--<span class="pull-right-container">--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</li>--}}

                {{--R R--}}
                @if(Auth::user()->hasRole('rr') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                    <li class="@if(isset($ordinance))
                    @if($ordinance->is_monitoring === 0)
                            active
                        @endif
                    @elseif(isset($resolution))
                    @if($resolution->is_monitoring === 0)
                            active
                    @endif
                    @elseif((Request::is('admin/ordinances/*/edit') or Request::is('admin/resolutions/*/edit')))
                            active
                        @elseif(isset($type))
                    @if(($type === 'RR')
                    and (Request::is('admin/ordinances*') or Request::is('admin/resolutions*')))
                            active
                        @endif
                    @elseif(request()->type === 'RR')
                            active
                        @endif treeview menu">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Research & Records</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="">
                            <li class="@if(Request::is('admin/ordinances/create*') and request()->type === 'RR')
                                    active
                                @elseif(isset($type))
                            @if($type === 'RR' and Request::is('admin/ordinances'))
                                    active
                                @endif
                            @endif">
                                <a href="/admin/ordinances">
                                    <i class="fa fa-circle-o"></i>
                                    <span>Ordinances</span>
                                </a>
                            </li>
                            <li class="@if(isset($resolution))
                            @if($resolution->is_monitoring === 0)
                                    active
                                @endif
                            @elseif(Request::is('admin/resolutions/create*') and request()->type === 'RR')
                                    active
                                @elseif(isset($type))
                            @if($type === 'RR' and Request::is('admin/resolutions'))
                                    active
                                @endif
                            @endif">
                                <a href="/admin/resolutions">
                                    <i class="fa fa-circle-o"></i> <span>Resolutions</span>
                                    <span class="pull-right-container">
                            </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- ME --}}
                @if(Auth::user()->hasRole('me') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))

                    <li class="@if(isset($ordinance))
                    @if($ordinance->is_monitoring === 1)
                            active
                    @endif
                    @elseif(isset($resolution))
                    @if($resolution->is_monitoring === 1)
                            active
                    @endif
                    @elseif(((Request::is('admin/forms/ordinances*') and request()->type === 'ME')
                        or (Request::is('admin/forms/resolutions*') and request()->type === 'ME'))
                        or (Request::is('admin/forms/ordinances*') or Request::is('admin/forms/resolutions*'))
                        or request()->type === 'ME')
                            active
                    @endif treeview menu">
                        <a href="#">
                            <i class="fa fa-bar-chart"></i>
                            <span>Monitoring & Evaluation</span>
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu" style="">
                            <li class="
                            @if(isset($ordinance))
                                @if($ordinance->is_monitoring === 1 && $ordinance->is_monitored === 0 or Request::is('admin/forms/ordinances*') or (Request::is('admin/ordinances/create*') and request()->type === 'ME'))
                                    active
                                @endif
                            {{--@elseif(Request::is('admin/forms/ordinances*') or (Request::is('admin/ordinances/create*') and request()->type === 'ME'))--}}
                                    {{--active--}}
                            @endif
                                    ">
                                <a href="/admin/forms/ordinances"><i class="fa fa-circle-o"></i>
                                    <span>Ordinances being Monitored</span>
                                </a>
                            </li>

                            <li class="
                            @if(isset($resolution))
                                @if($resolution->is_monitoring === 1 && $resolution->is_monitored === 0 or Request::is('admin/forms/resolutions*') or (Request::is('admin/resolutions/create*') and request()->type === 'ME'))
                                    active
                                @endif
                            {{--@elseif(Request::is('admin/forms/resolutions*') or (Request::is('admin/resolutions/create*') and request()->type === 'ME'))--}}
                                    {{--active--}}
                            @endif
                                    ">
                                <a href="/admin/forms/resolutions"><i class="fa fa-circle-o"></i>
                                    <span>Resolutions being Monitored</span>
                                </a>
                            </li>

                            <li class="
                            @if(isset($ordinance))
                                @if($ordinance->is_monitoring === 1 && $ordinance->is_monitored === 1)
                                    active
                                @endif
                            @elseif(Request::is('admin/forms/ordinances*') or (Request::is('admin/ordinances/create*') and request()->type === 'ME'))
                                    active
                            @endif
                                    ">
                                <a href="/admin/forms/ordinances?status=monitored"><i class="fa fa-circle-o"></i>
                                    <span>Monitored Ordinances</span>
                                </a>
                            </li>

                            <li class="
                            @if(isset($resolution))
                                @if($resolution->is_monitoring === 1 && $resolution->is_monitored === 1)
                                    active
                                @endif
                            @elseif(Request::is('admin/forms/resolutions*') or (Request::is('admin/resolutions/create*') and request()->type === 'ME'))
                                    active
                            @endif
                                    ">
                                <a href="/admin/forms/resolutions?status=monitored"><i class="fa fa-circle-o"></i>
                                    <span>Monitored Resolutions</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif
                @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                    <li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">
                        <a href="/admin/pages">
                            <i class="fa fa-file-code-o"></i>
                            <span>Pages</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                @endif

                <li class="{{ Request::is('reports') ? 'active' : '' }}">
                    <a href="/reports">
                        <i class="fa fa-th-list"></i>
                        <span>Reports</span>
                        <span class="pull-right-container">
                             </span>
                    </a>
                </li>

                @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                    <li class="{{ Request::is('admin/logs*') ? 'active' : '' }}">
                        <a href="/admin/logs">
                            <i class="fa fa-wrench"></i>
                            <span>Logs</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                @endif


                {{--<li class="{{ Request::is('admin/change*') ? 'active' : '' }}">--}}
                {{--<a href="/admin/change-password">--}}
                {{--<i class="fa fa-wrench"></i>--}}
                {{--<span class="{{ Request::is('admin/forms/change*') ? 'text-danger' : '' }} ">Account</span>--}}
                {{--<span class="pull-right-container">--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</li>--}}
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content" style="margin: 0 5%">
            <!-- Info boxes -->
            @if(Session::has('flash_message'))
                <div id="flashMessage" class="alert {{Session::get('alert-class', 'alert-success')}}"
                     style="margin-top: 8vh;">
                    {!! Session::get('flash_message') !!}
                </div>
            @endif
            <div class="row">
                @yield('content')
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.1
        </div>
        <strong>Copyright &copy; 2017 Research Division, Baguio City.</strong> All
        rights
        reserved.
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="/bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<script src="/bower_components/ckeditor/ckeditor.js"></script>
<script src="/js/parsley.min.js"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')

    })


</script>

{{-- Custom Scripts per page--}}
@yield('scripts')

</body>
</html>
