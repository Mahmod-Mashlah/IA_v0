
@extends('web.layouts.master')

@section('title')
    Plans || Update Plan
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
    Plans
@endsection

@section('son2')
    Update Plan
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
                                <h3 class="card-title">Update a Plan</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('web/plans', []) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleSelectBorder">Select Plan Number To Update :
                                        </label>
                                        <sub>( {{ 3 }}-{{ 100 }} ) </sub>
                                        <select class="selectpicker col-md-12" placeholder="2 to 60">
                                            @for ($i = 2; $i <= 100; $i++)
                                                <option>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="form-group">

                                        <label for="startDate">Start Date</label>
                                        <input id="startDate" class="form-control" type="date" />
                                    </div>


                                    <div class="form-group cs-form">
                                        <label for="exampleInputEmail1"> The Center opens at : </label>
                                        <input type="time" class="form-control" />
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">The Center close at :</label>
                                        <input type="time" class="form-control" />
                                    </div>
                                    <div class="row d-flex">
                                        <div class="col">
                                            <hr color="blue">
                                        </div>
                                        <div class="col">
                                            <hr color="blue">
                                        </div>

                                    </div>
                                    {{-- Activities --}}
                                    <h4 type="text" class=" btn-warning col d-flex justify-content-center"
                                        data-toggle="modal" data-target="#modal-primary">
                                        Activities
                                    </h4>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Minimum Activities Count :</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="">
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="exampleInputFile">Minimum Activities Available types</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Maximum Activities Count :</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="">
                                    </div>
                                    <div class="row d-flex">
                                        <div class="col">
                                            <hr color="blue">
                                        </div>
                                        <div class="col">
                                            <hr color="blue">
                                        </div>
                                    </div>
                                    {{-- Lectures --}}
                                    <h4 type="text" class=" btn-warning col d-flex justify-content-center"
                                        data-toggle="modal" data-target="#modal-primary">
                                        Lectures
                                    </h4>

                                    <div class="form-group">
                                        <label for="exampleSelectBorder">Minimum Lectures Count :
                                        </label>
                                        <sub>( 3-100 ) </sub>
                                        <select class="selectpicker col-md-12" placeholder="2 to 60">
                                            @for ($i = 3; $i <= 100; $i++)
                                                <option>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Minimum Lectures Available types :</label>
                                        {{-- <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder=""> --}}

                                            <div class="row">
                                                <div class="form-check col-md">
                                                    <input class="form-check-input" type="radio" name="options[]" id="option1" value="option1">
                                                    <label class="form-check-label" for="option1">Option 1 </label>
                                                </div>
                                                <div class="form-check col-md">
                                                    <input class="form-check-input" type="radio" name="options[]" id="option2" value="option2">
                                                    <label class="form-check-label" for="option2">Option 2 </label>
                                                </div>
                                                <div class="form-check col-md">
                                                    <input class="form-check-input" type="radio" name="options[]" id="option3" value="option3">
                                                    <label class="form-check-label" for="option3">Option 3 </label>
                                                </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Maximum Lectures Count :</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="">
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col">
                                            <hr color="blue">
                                        </div>
                                        <div class="col">
                                            <hr color="blue">
                                        </div>

                                    </div>
                                    {{-- Plays --}}
                                    <h4 type="text" class=" btn-warning col d-flex justify-content-center"
                                        data-toggle="modal" data-target="#modal-primary">
                                        Plays
                                    </h4>


                                    <div class="form-group">
                                        <label for="exampleSelectBorder">Minimum Plays Count :</label>
                                        <sub>( 1-60 ) </sub>
                                        <select class="selectpicker col-md-12" placeholder="2 to 60">
                                            @for ($i = 1; $i <= 60; $i++)
                                                <option>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Minimum Plays Available types :</label>
                                        {{-- <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder=""> --}}
                                            <div class="row">
                                            <div class="form-check col-md">
                                                <input class="form-check-input" type="radio" name="options[]" id="option1" value="option1">
                                                <label class="form-check-label" for="option1">Option 1 </label>
                                            </div>
                                            <div class="form-check col-md">
                                                <input class="form-check-input" type="radio" name="options[]" id="option2" value="option2">
                                                <label class="form-check-label" for="option2">Option 2 </label>
                                            </div>
                                            <div class="form-check col-md">
                                                <input class="form-check-input" type="radio" name="options[]" id="option3" value="option3">
                                                <label class="form-check-label" for="option3">Option 3 </label>
                                            </div>
                                     </div>
                                     </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Maximum Plays Count :</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit"
                                        class="btn btn-primary col d-flex justify-content-center">Update</button>
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
    <!-- Page specific script -->
    {{-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
</script> --}}
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
