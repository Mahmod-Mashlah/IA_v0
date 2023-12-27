@extends('layouts.master')

@section('title')
    Groups || Index
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
    Groups
@endsection

@section('son2')
    Groups
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
                </div>  --}}
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h1 class="card-title  text-white">These are all Groups in this App
                            </h1>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 1%"><b>#</b></th>
                                        <th class='text-center'style="width: 10%">Name </th>
                                        {{-- <th style="width: 10%" >Edit Employee </th> --}}
                                        <th class='text-center'style="width: 10%">Admin Id</th>
                                        <th class='text-center'style="width: 10%">Go To Files</th>
                                        @if (auth()->user()->id == 1)
                                        <th class='text-center'style="width: 10%">Users Permissions</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>

                                        @foreach ($groups as $group)
                                    <tr>
                                        <td> <b> {{ $group->id }} </b></td>

                                        <td class='text-center' style="font-size: 23px;"><span
                                                class="badge text-black disabled color-palette">{{ $group->name }}</span>
                                        </td>
                                        <td class='text-center' style="font-size: 23px;"><span
                                                class="badge text-dark  disabled color-palette ">
                                                {{-- <a href={{ url( $group->email , []) }} target="_plank"></a> --}}
                                                {{ $group->admin_id }}</span></td>
                                        <td class='text-center' style="font-size: 23px;">
                                            <span class="badge bg-white disabled color-palette">



                                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                                    @csrf

                                                    <!-- /.card-body -->

                                                    <a href="/files" class="btn btn-primary" type="button">View Files</a>
                                            </span>

                                            </form>
                                        </td>

                                        @if (auth()->user()->id == 1)

                                        <td class='text-center' style="font-size: 23px;">
                                            <span class="badge bg-white disabled color-palette">

                                                    <a href="{{ url('groups/edit-permissions', [$group->id]) }}" class="btn btn-warning" type="button">edit</a>
                                            </span>


                                        </td>

                                        @endif

                                    </tr>
                                    @endforeach


                                    {{-- ******************************************************************************** --}}
                                    {{-- <form method="POST" action="{{ route('group.role.update', $group->id) }}">
                            @csrf
                            @method('POST') --}}

                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="/groups/add" class="btn btn-success" type="button">Add Group</a>
                                        </span>

                                    </form>

                                    {{-- ******************************************************************************** --}}

                                    </tr>


                                </tbody>
                                {{-- <tbody>
                        @foreach ($groups as $group)
                        <tr>
                            <td>{{ $group->name }}</td>
                            <td>{{ $group->email }}</td>
                            <!-- Add more table cells with group data if needed -->
                        </tr>
                        @endforeach
                    </tbody> --}}
                                <tfoot>

                                </tfoot>
                            </table>
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
    </script>
@endsection
