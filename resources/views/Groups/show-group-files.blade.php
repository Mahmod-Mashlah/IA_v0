@extends('layouts.master')

@section('title')
    {{ $group->name }} Files
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
    Files Index
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
                            <h1 class="card-title text-white">all Files in <b class="text-yellow">{{ $group->name }} </b>
                            </h1>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- Add File Form -->
                            <form action="{{ route('files.add') }}" method="Get">
                                @csrf
                                @method('Get')
                                <button type="submit" class="btn btn-success col-md-12"> Add File </button>
                                <input type="hidden" id="group_id" name="group_id" value="{{ $group->id }}">

                            </form>
                            <!-- /. Add File Form -->
                            <br>

                            {{-- multi check in Form  --}}

                            <form id="multiCheckInForm" action="{{ route('multi-check-in') }}" method="Post">
                                @csrf
                                @method('Post')

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 1%"><b>#</b></th>
                                        <th class='text-center' style="width: 10%">Name </th>
                                        {{-- <th style="width: 10%">Edit Employee </th> --}}
                                        <th class='text-center' style="width: 7%">Status</th>
                                        <th class='text-center' style="width: 5%">User Id </th>
                                        <th class='text-center' style="width: 10%">Download</th>
                                        <th class='text-center' style="width: 10%">Check-in / Check-out</th>

                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>

                                        @foreach ($files as $file)
                                    <tr>

                                        <td> <input type="checkbox"  name="fileIds[]" value="{{ $file->id }}" />
                                            <b> {{ $file->id }} </b>
                                        </td>

                                        <td class='text-center' style="font-size: 23px;"><span
                                                class="badge text-black disabled color-palette">{{ $file->name }}</span>
                                        </td>
                                        <td class='text-center' style="font-size: 23px;"><span
                                                class="badge text-dark  disabled color-palette ">
                                                {{ $file->status }}</span></td>

                                        <td class='text-center' style="font-size: 23px;"><span
                                                class="badge text-black disabled color-palette">{{ $file->user_id }}</span>
                                        </td>


                                        <td class='text-center' style="font-size: 23px;"><span
                                                class="badge text-black disabled color-palette">
                                                {{-- <form id="downloadForm" action="{{ url('downloadfile') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="file_id" value="{{ $file->id }}">
                                                    <button type="submit" onclick="submitDownloadForm()" class="btn btn-info">download</button>
                                                </form> --}}
                                                <a href="{{ route('download', $file) }}" class="btn btn-info">download</a>
                                            </span>
                                        </td>
                                        <td class='text-center' style="font-size: 23px;">
                                            <span class="badge text-black disabled color-palette">
                                                @if ($file->status == 'free')
                                                    <form id="checkInForm" action="{{ url('check-in') }}" method="POST">

                                                        @csrf
                                                        <input type="hidden" name="file_id" value="{{ $file->id }}">
                                                        <button type="submit" onclick="submitCheckInForm()" class="btn btn-warning">check-in</button>

                                                    </form>
                                                @else
                                                    <p class=" text-danger text-center ">reserved</p>
                                                @endif
                                            </span>
                                        </td>

                                    </tr>
                                    @endforeach

                                    </tr>{{-- delete tr to show other javascript options --}}

                                </tbody>

                                <tfoot>

                                </tfoot>
                            </table>
                            <br>

                                <button type="submit" class="btn btn-primary col-md-12 " onclick="submitMultiCheckInForm()"> Check in selected Files </button>

                            </form>
                            {{-- end of multi check in Form  --}}

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

    {{-- Nested Forms Solve Proplem --}}
    <script>
        function submitMultiCheckInForm() {
    const multiCheckInForm = document.getElementById('multiCheckInForm');
    const downloadForm = document.getElementById('downloadForm');
    const checkInForm = document.getElementById('checkInForm');

    // check if inner forms are valid
    if (downloadForm.checkValidity() && checkInForm.checkValidity()) {
        // if inner forms are valid, submit the outer form
        multiCheckInForm.submit();
    } else {
        // if inner forms are not valid, show error messages
        downloadForm.reportValidity();
        checkInForm.reportValidity();
    }
}

function submitDownloadForm() {
    const downloadForm = document.getElementById('downloadForm');

    // check if inner form is valid
    if (downloadForm.checkValidity()) {
        // if inner form is valid, submit it (or perform other actions as required)
        downloadForm.submit();
    } else {
        // if inner form is not valid, show error messages
        downloadForm.reportValidity();
    }
}

function submitCheckInForm() {
    const checkInForm = document.getElementById('checkInForm');

    // check if inner form is valid
    if (checkInForm.checkValidity()) {
        // if inner form is valid, submit it (or perform other actions as required)
        checkInForm.submit();
    } else {
        // if inner form is not valid, show error messages
        checkInForm.reportValidity();
    }
}
    </script>

@endsection
