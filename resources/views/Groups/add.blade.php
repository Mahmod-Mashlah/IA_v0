@extends('web.layouts.master')

@section('title')
    Plans || Add New Plan
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
    Plans
@endsection

@section('son2')
    Add New Plan
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
                                <h3 class="card-title">Add a New Plan</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form method="Post" action="/web/plans/add">
                                @csrf
                                @method('Post')
                                <div class="card-body">

                                    <div class="form-group">

                                        {{-- // <label for="email">Email:</label>
                                    // <input type="email" name="email" id="email" required><br> --}}
                                        {{-- {{ $errors }} --}}
                                        <label for="date">Start Date :</label>
                                        <input id="date" class="form-control bg- light" type="date" name="date"
                                            required />
                                            {{-- Validation message --}}
                                            @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>


                                    <div class="form-group cs-form">
                                        <label for="start_time"> The Center opens at :</label>
                                        <input type="time" id="start_time" name="start_time" value="{{ old('start_time', '08:00') }}"
                                            class="form-control bg- light" required />

                                    </div>



                                    <div class="form-group">
                                        <label for="end_time">The Center close at :</label>
                                        <input type="time" id="end_time" name="end_time" class="form-control bg- light" value="{{ old('start_time', '16:00') }}"
                                            required />
                                    </div>
                                    {{-- <div class="row d-flex">
                                    <div class="col">
                                        <hr color="  black">
                                    </div>
                                    <div class="col">
                                        <hr color="  black">
                                    </div>

                                </div> --}}

                                    {{-- Lectures --}}
                                    <h4 type="text" class=" btn-warning col d-flex justify-content-center"
                                        data-toggle="modal" data-target="#modal-primary">
                                        Lectures
                                    </h4> <br>

                                    <div class="form-group">
                                        <label for="min_lectures">Minimum Lectures Count : <sub>( 3 - 100 ) </sub>
                                        </label>
                                        <br>

                                        <select class="selectpicker col-md-12 bg- light" placeholder="2 to 60"
                                            id="min_lectures" name="min_lectures">
                                            @for ($i = 3; $i <= 100; $i++)
                                                <option value="{{ $i }}" {{ $i == 3 ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    {{-- ____________________________________________________________________ --}}

                                    <div class="form-group">
                                        <label for="lectures">Minimum Lectures Available types : <sub> ( select at least one type ) </sub> </label>
                                        <br>

                                        @foreach ($lectures->sortBy('type') as $lecture)
                                            <input type="checkbox" name="lectures[]" value="{{ $lecture->id }}">
                                            {{ $lecture->type }}
                                            <br>
                                        @endforeach
                                        {{-- ____________________________________________________________________ --}}
                                        <br>
                                        <div class="row col-md">
                                            {{-- <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="lectures[]"
                                                id="cultural" value="cultural">
                                            <label class="form-check-label" for="cultural"> cultural </label>
                                        </div>
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="lectures[]"
                                                id="educational" value="educational">
                                            <label class="form-check-label" for="educational"> educational </label>
                                        </div>
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="lectures[]"
                                                id="religious" value="religious">
                                            <label class="form-check-label" for="religious"> religious </label>
                                        </div>
                                    </div>
                                    <div class="row col-md">
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="lectures[]"
                                                id="social" value="social">
                                            <label class="form-check-label" for="social"> social </label>
                                        </div>
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="lectures[]"
                                                id="economic" value="economic">
                                            <label class="form-check-label" for="economic"> economic </label>
                                        </div>
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="lectures[]"
                                                id="scientific" value="scientific">
                                            <label class="form-check-label" for="scientific"> scientific </label>
                                        </div>
                                    </div>
                                    <div class="row col-md">
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="lectures[]"
                                                id="philosophical" value="philosophical">
                                            <label class="form-check-label" for="philosophical"> philosophical </label>
                                        </div>
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="lectures[]"
                                                id="technical" value="technical">
                                            <label class="form-check-label" for="technical"> technical </label>
                                        </div>
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="lectures[]"
                                                id="historical" value="historical">
                                            <label class="form-check-label" for="historical"> historical </label>
                                        </div>
                                    </div>
                                    <div class="row col-md">
                                        <div class="form-check col-md">
                                            <input class="form-check-input " type="checkbox" name="lectures[]"
                                                id="political" value="political">
                                            <label class="form-check-label " for="political"> political </label>
                                        </div>

                                    </div> --}}
                                        </div>

                                        {{-- Lectures Types --}}
                                        {{-- <select class="selectpicker col-md-12 bg- light" placeholder="2 to 60"
                                    id="max_lectures" name="max_lectures">
                                    @for ($i = 3; $i <= 100; $i++) <option>{{ $i }}</option>
                                        @endfor
                                </select> --}}
                                        {{-- <div class="multiselect col-md-12">
                                    <div class="selectBox" onclick="showCheckboxes()">
                                        <select>
                                            <option>Select an option</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /> First checkbox</label>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </div>
                                </div> --}}


                                        {{-- End Lectures Types --}}

                                        {{--
                                <div class="row">
                                    <div class="form-check col-md">
                                        <input class="form-check-input bg- light" type="checkbox" name="options[]"
                                            id="option1" value="option1">
                                        <label class="form-check-label" for="option1">Option 1 </label>
                                    </div>
                                    <div class="form-check col-md">
                                        <input class="form-check-input bg- light" type="checkbox" name="options[]"
                                            id="option2" value="option2">
                                        <label class="form-check-label" for="option2">Option 2 </label>
                                    </div>
                                    <div class="form-check col-md">
                                        <input class="form-check-input bg- light" type="checkbox" name="options[]"
                                            id="option3" value="option3">
                                        <label class="form-check-label" for="option3">Option 3 </label>
                                    </div>
                                </div> --}}

                                        <div class="form-group">
                                            <label for="max_lectures">Maximum Lectures Count : <sub>( 3 - 100 ) </sub>
                                            </label>
                                            <br>

                                            <select class="selectpicker col-md-12 bg-light" placeholder="2 to 60"
                                                id="max_lectures" name="max_lectures" >
                                                @for ($i = 3; $i <= 100; $i++)
                                                    <option value="{{ $i }}" {{ $i == 100 ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>

                                        </div>

                                        {{-- <div class="row d-flex">
                                    <div class="col">
                                        <hr color="  orange">
                                    </div>
                                    <div class="col">
                                        <hr color="  gray">
                                    </div>
                                    <div class="col">
                                        <hr color="  orange">
                                    </div>

                                </div> --}}
                                        {{-- End Lectures --}}

                                        {{-- Activities --}}
                                        <br>
                                        <h4 type="text" class=" btn-warning col d-flex justify-content-center"
                                            data-toggle="modal" data-target="#modal-primary">
                                            Activities
                                        </h4>
                                        <br>
                                        <div class="form-group">
                                            <label for="min_activities">Minimum Activities Count : <sub>( 2 - 150 ) </sub>

                                            </label>
                                            <br>

                                            <select class="selectpicker col-md-12 bg- light" placeholder="2 to 60"
                                                id="min_activities" name="min_activities">
                                                @for ($i = 2; $i <= 150; $i++)
                                                    <option id="min_activities" name="min_activities"
                                                    value="{{ $i }}" {{ $i == 2 ? 'selected' : '' }}>{{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>

                                        {{-- <div class="form-group">
                                    <label for="exampleInputFile">Minimum Activities Available types</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder=" ">
                                </div> --}}
                                        <div class="form-group">
                                            <label for="max_activities">Maximum Activities Count : <sub>( 2 - 150 ) </sub>

                                            </label>
                                            <br>

                                            <select class="selectpicker col-md-12 bg- light" placeholder="2 to 60"
                                                id="max_activities" name="max_activities">
                                                @for ($i = 2; $i <= 150; $i++)
                                                    <option value="{{ $i }}" {{ $i == 150 ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        {{-- <div class="row d-flex">
                                    <div class="col">
                                        <hr color="  black">
                                    </div>
                                    <div class="col">
                                        <hr color="  black">
                                    </div>
                                </div> --}}

                                        {{-- Plays --}}
                                        <br>
                                        <h4 type="text" class=" btn-warning col d-flex justify-content-center"
                                            data-toggle="modal" data-target="#modal-primary">
                                            Plays
                                        </h4><br>


                                        <div class="form-group">
                                            <label for="min_plays">Minimum Plays Count : <sub>( 1 - 60 ) </sub>
                                            </label>
                                            <br>
                                            <select class="selectpicker col-md-12 bg- light" placeholder="2 to 60"
                                                id="min_plays" name="min_plays">
                                                @for ($i = 1; $i <= 30; $i++)
                                                    <option value="{{ $i }}" {{ $i == 2 ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            {{-- ____________________________________________________________________ --}}
                                            <label for="plays">Minimum Plays Available types : <sub> ( select at least one type ) </sub> </label>

                                            <br>
                                            @foreach ($plays->sortBy('type') as $play)
                                                <input type="checkbox" name="plays[]" value="{{ $play->id }}">
                                                {{ $play->type }}
                                                <br>
                                            @endforeach
                                            {{-- ____________________________________________________________________ --}}
                                            {{-- <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder=" "> --}}

                                            {{-- <div class="row col-md">
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="plays[]"
                                                id="Pantomime" value="Pantomime">
                                            <label class="form-check-label" for="Pantomime">Pantomime </label>
                                        </div>
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="plays[]" id="Fantasy"
                                                value="Fantasy">
                                            <label class="form-check-label" for="Fantasy">Fantasy </label>
                                        </div>
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="plays[]" id="Musical"
                                                value="Musical">
                                            <label class="form-check-label" for="Musical">Musical </label>
                                        </div>
                                    </div>
                                    <div class="row col-md">
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="plays[]" id="Epic"
                                                value="Epic">
                                            <label class="form-check-label" for="Epic">Epic </label>
                                        </div>
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="plays[]" id="Drama"
                                                value="Drama">
                                            <label class="form-check-label" for="Drama">Drama </label>
                                        </div>
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="plays[]" id="Social"
                                                value="Social">
                                            <label class="form-check-label" for="Social">Social </label>
                                        </div>
                                    </div>
                                    <div class="row col-md">
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" name="plays[]" id="Satire"
                                                value="Satire">
                                            <label class="form-check-label" for="Satire">Satire </label>
                                        </div>
                                        <div class="form-check col-md-8">
                                            <input class="form-check-input" type="checkbox" name="plays[]" id="Modern"
                                                value="Modern">
                                            <label class="form-check-label" for="Modern">Modern </label>
                                        </div>

                                    </div> --}}
                                            <br>
                                        </div>

                                        <div class="form-group">
                                            <label for="max_plays">Maximum Plays Count : <sub>( 1 - 60 ) </sub>
                                            </label>
                                            <br>
                                            <select class="selectpicker col-md-12 bg- light" placeholder="60"
                                                default='60' id="max_plays" name="max_plays">
                                                @for ($i = 1; $i <= 60; $i++)
                                                    <option value="{{ $i }}" {{ $i == 60 ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
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
      " light": true,
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
