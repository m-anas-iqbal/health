<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <link href="{{ asset('public/assets/img/logo/logo.png') }}" rel="icon">
    <title>Fame Health</title>
  
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    @yield('css')
</head>



<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="{{ route('hospital.check') }}" method="post">
                                        @if (Session::get('fail'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('fail') }}
                                            </div>
                                        @endif
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Hospital Phone</strong></label>
                                            <input type="text" class="form-control" name="hospital_phone" placeholder="+923336598845" value="{{ old('hospital_phone') }}">
                                        <span class="text-danger">@error('hospital_phone'){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
                                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                          
                                            <div class="form-group">
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Login in</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="#">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('public/assets/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/dlabnav-init.js') }}"></script>

</body>
</html>