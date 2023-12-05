<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login || Source Safe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <!--===============================================================================================-->
    {{-- background image  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/image.css') }}">
    <!--===============================================================================================-->
    {{-- Front Form   --}}
    <link rel="stylesheet" href="{{ asset('assets/css/to-center.css') }}">
    <!--===============================================================================================-->
    {{-- Radius image   --}}
    <link rel="stylesheet" href="{{ asset('assets/css/radius.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--===============================================================================================-->

</head>

<body>

    <div class="limiter ">

        <div class="container ">

            <div class="wrap-login100 bg-dark to-center img-circle  " >
                <form class="login100-form validate-form " method="POST" action="{{ route('login') }}" >

                    @csrf

                    <span class="login100-form-logo ">

                        <img src="{{ asset('assets/img/culture-center-logo.png') }}" alt="AdminLTE Logo"
                            class=" brand-image img-circle" style="opacity: .99"
                            {{-- class="img-thumbnail brand-image img-circle elevation-3 radius " style="opacity: .8" --}}
                            width='150px' height='150px' border-radius='0.50rem'>

                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Source Safe
                    </span>

                    @error('loginFailedMessage')

                    <button type="button" class="btn text-warning col-15 toastrDefaultError" width="100px" hight="100px">
                        Invalid Email Or Password !!!!
                      </button>

                    @enderror



                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100 @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="Email"  required >

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input mt-4" data-validate="Enter password">
                        <input class="input100 @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Password" required>

                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                    </div>




                    <div class="container-login100-form-btn row mb-0 form-group">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="login100-form-btn  col-md-2 ">
                                {{ __('Login') }}
                            </button>

                        </div>
                    </div>

                </form>

            </div>

        </div>

        {{-- <div id="dropDownSelect1"></div> --}}
        <!--===============================================================================================-->
        <script type="text/javascript" src="{{ URL::asset('assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="{{ URL::asset('assets/vendor/animsition/js/animsition.min.js') }}"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="{{ URL::asset('assets/vendor/bootstrap/js/popper.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="{{ URL::asset('assets/vendor/select2/select2.min.js') }}"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="{{ URL::asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="{{ URL::asset('assets/vendor/countdowntime/countdowntime.js') }}"></script>
        <!--===============================================================================================-->
        <script src=""></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/main.js') }}"></script>
        {{-- Background image 👇👇 --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>

</html>
