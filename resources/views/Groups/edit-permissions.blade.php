@extends('layouts.master')

@section('title')
    Groups || Add New Group
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
    Groups
@endsection

@section('son2')
    Edit Permissions
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <br>
        <div class="container-fluid">
            <div class="row">

                <div class="col d-flex justify-content-center">


                    <div class="col-md-10">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <div class="card-header d-flex justify-content-center">
                                <h1 class="card-title ">Edit Users For the Group :
                                    <b class="text-yellow">{{ $group->name }} </b>
                                </h1>
                                {{-- <div class="card-tools">


                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>

                            </div> --}}
                            </div>
                            <!-- /.card-header -->
                            <br>

                            <form method="Post" action="/assign-user-to-group">
                                @csrf
                                @method('Post')
                                <div class="card-body">
                                    <div style="display: flex; justify-content: center; align-items: center; ">
                                        @if (session('success'))
                                            <div class="text-border-yellow alert text-warning  text-center col-md-8">
                                                <h5>{{ session('success') }} </h5>
                                            </div>
                                        @endif
                                        @if (session('deleted'))
                                            <div class="text-border-red alert  text-danger text-center col-md-8">
                                                <h5> {{ session('deleted') }}
                                                </h5>
                                            </div>
                                        @endif
                                        @if (session('error_User_Is_Exist'))
                                            <div class="text-border-red alert  text-danger text-center col-md-8">
                                                <h5> {{ session('error_User_Is_Exist') }}
                                                </h5>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group ">
                                        <label for="user_id"
                                            style="display: flex; justify-content: center; align-items: center; ">Add new
                                            user to this group :</label>
                                        <br>
                                        <div style="display: flex; justify-content: center; align-items: center; ">
                                            <input id="user_id"
                                                class="form-control bg- light justify-content-center col-md-10"
                                                type="text" name="user_id" placeholder="Enter a user id" required
                                                style="text-align: center;" />
                                        </div>
                                        <input type="hidden" id="group_id" name="group_id" value="{{ $group->id }}">

                                    </div>

                                    <div style="display: flex; justify-content: center; align-items: center; ">
                                        <button type="submit"
                                            class="btn btn-warning col d-flex justify-content-center col-md-2 text-center">Add
                                            User</button>
                                    </div>
                                    <br>
                                    <div class="col ">
                                        <hr color="gray">
                                    </div>


                                    {{-- <button type="submit"
                                    class="btn btn-success col d-flex justify-content-center col-md-2 text-center">Add
                                    User</button> --}}

                                    <br>
                                    <br>

                            </form>


                            <!-- Users table -->


                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class='text-center' style="width: 5%"><b>User Id</b></th>
                                        <th class='text-center' style="width: 10%"> Name </th>
                                        <th class='text-center' style="width: 10%"> Added at </th>
                                        <th class='text-center' style="width: 10%">Remove from the group</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($group_Users as $user)
                                        <tr>
                                            <td>
                                                <h5 class="text-center"> {{ $user->id }} </h5>
                                            </td>
                                            <td>
                                                <h5 class="text-center"> {{ $user->name }} </h5>
                                            </td>
                                            <td>
                                                <h5 class="text-center">  {{ Carbon\Carbon::parse($user->created_at)->format('j/n/Y ,g:i a') }} </h5>
                                            </td>
                                            <td class="text-center">
                                                <form action="/remove-user-from-group" method="Post">
                                                    @csrf
                                                    @method('Post')
                                                    <button type="submit" class="btn btn-danger">remove</button>
                                                    <input type="hidden" id="group_id" name="group_id"
                                                        value="{{ $group->id }}">
                                                    <input type="hidden" id="user_id" name="user_id"
                                                        value="{{ $user->id }}">

                                                </form>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr> There's no users yet in this group </tr>
                                    @endforelse

                                </tbody>

                                <tfoot>

                                </tfoot>
                            </table>
                            <!-- ./Users table -->

                        </div>
                        <!-- /.card-body -->
                        {{-- <div class="card-footer"> --}}
                        {{-- <button type="submit"
                                    class="btn btn-success col d-flex justify-content-center col-md-2">Add User</button>
                                --}}
                        {{-- </div> --}}



                        <br>

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
