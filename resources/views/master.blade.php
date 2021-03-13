<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/')}}" class="nav-link">Home</a>
      </li>
    </ul>

  </nav>


  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="{{asset('asset/dist/img/AdminLTELogo.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>


    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('asset/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="{{route('project.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> {{trans('text.project.title')}} </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{route('task.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> {{trans('text.task.title')}} </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  @yield('content')

  <footer class="main-footer">
    <strong>Powered by <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('asset/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('asset/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('asset/dist/js/adminlte.js')}}"></script>

@yield('scripts')
</body>
</html>
