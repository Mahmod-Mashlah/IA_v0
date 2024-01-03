@extends('layouts.master')

@section('title')
    Files || Add New File
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
    <!-- Others Bootstrap -->
    <link rel="stylesheet" href=" {{ asset('assets/css/main.css') }}">
@endsection

@section('root')
    Dashboard
@endsection

@section('son1')
    Files
@endsection

@section('son2')
    Add New File
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col d-flex justify-content-center">


                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add a New File in <b class="text-yellow">{{ $group->name }}</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form method="POST" action="{{ url('/files/add') }}" enctype="multipart/form-data">
                                @csrf
                                @method('Post')
                                <div class="card-body">

                                    <div class="form-file">


                                        {{-- <label for="group_id">Group ID</label>

                                        <input id="group_id" class="form-control bg- light" type="text" name="group_id"
                                            required /> --}}

                                            <input type="hidden" id="group_id" name="group_id"
                                            value="{{ $group->id }}">

                                        <label for="file">file</label>
                                        <input id="file" class="form-control bg- light" type="file" name="file"
                                            required />

                                    </div>
                                                                      </div>
                                    <!-- /.card-body -->
                                    <br>
                                    <div class="card-footer">
                                        <button type="submit"
                                            class="btn btn-primary col d-flex justify-content-center">Create</button>


                                    </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>



                    <!-- /.row -->
                </div><!-- /.container-fluid -->
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


    <script>
        // Assuming you have a submit button with ID "submit-btn"
        $('#submit-btn').click(function(e) {
            e.preventDefault();

            var selectedOptions = $('input[name="options[]"]:checked').map(function() {
                return $(this).val();
            }).get();

            console.log(selectedOptions);

            // You can perform further actions with the selected options here.
        });
    </script>
@endsection
