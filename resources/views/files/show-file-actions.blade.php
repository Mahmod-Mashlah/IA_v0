@extends('layouts.master')

@section('title')
    Actions For {{ $file->name }}
@endsection {{-- or @stop --}}

@section('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href=" {{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href=" {{ asset('assets/css/adminlte.min.css') }}">
@endsection

@section('root')
    Dashboard
@endsection

@section('son1')
    Files
@endsection

@section('son2')
    Actions For <b class="text-yellow">{{ $file->name }} </b>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{-- <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Buttons</h1>
                    </div>
                </div> --}}
                    <div class="card">
                        <div class="card-header header-text-center bg-blue">
                            <h1 class="card-title text-white">All Actions For File : <b
                                    class="text-yellow">{{ $file->name }} </b>
                            </h1>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                            <br>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 1%"><b>#</b></th>
                                        <th class='text-center' style="width: 5%">User Id </th>
                                        <th class='text-center' style="width: 5%">User Name </th>
                                        <th class='text-center' style="width: 7%">Action</th>
                                        <th class='text-center' style="width: 10%">created At </th>

                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>

                                        @foreach ($file_Actions as $action)
                                    <tr>

                                        <td>
                                            <b> {{ $action->id }} </b>
                                        </td>

                                        <td class='text-center' style="font-size: 18px;">
                                            <b> {{ $action->user_id }} </b>
                                        </td>

                                        <td class='text-center' style="font-size: 23px;"><span
                                                class="badge text-black disabled color-palette">
                                                {{ $action->User->name }}</span>
                                        </td>

                                        <td class='text-center' style="font-size: 23px;"><span
                                                class="badge text-black disabled color-palette">{{ $action->action }}</span>
                                        </td>
                                        <td class='text-center' style="font-size: 23px;"><span
                                                class="badge text-dark  disabled color-palette ">
                                                {{ Carbon\Carbon::parse($action->created_at)->format('j/n/Y ,g:i a') }}
                                                </span></td>

                                    </tr>
                                    @endforeach

                                    </tr>{{-- delete tr to show other javascript options --}}

                                </tbody>

                                <tfoot>

                                </tfoot>
                            </table>
                            <br>


                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


@section('javascript')
    <!-- jQuery -->
    <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('assets/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('assets/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    @endsection
