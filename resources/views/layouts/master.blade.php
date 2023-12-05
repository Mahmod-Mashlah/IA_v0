<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

@include('web.layouts.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    {{-- <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> --}}
    <img class="animation__shake img-thumbnail brand-image img-circle "
    src="{{ asset('assets/img/culture-center-logo.jpg') }}" alt="AdminLTELogo" width='150px' height= '100px' style="opacity: .8"  border-radius= '0.50rem'>


</div>

@include('web.layouts.main-headerbar')

@include('web.layouts.main-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('son2')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('./', []) }}">@yield('root')</a></li>
              <li class="breadcrumb-item active">@yield('son1')</li>
              <li class="breadcrumb-item active">@yield('son2')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @yield('content')

  </div>



  @include('web.layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('web.layouts.footer-scripts')
@include('sweetalert::alert')
</body>
</html>
