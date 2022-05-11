<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ mix('/css/vendor.min.css') }}" />
    <link rel="icon" href="{{ asset('/resources/crmcrlogo.png') }}">


</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>My</b>Project</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                {{ Form::open(['url' => route('app.authenticate')]) }}
                <div class="input-group mb-3">
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'type' => 'email']) }}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                </div>
                @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                
                <div class="input-group mb-3">
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                </div>
                @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group mb-3">
                    {{ Form::submit('Sign In', ['class' => 'btn btn-primary btn-block']) }}
                </div>

            </div>
            {{ Form::close() }}

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <script src="{{ mix('/js/app.js') }}"></script>

</body>

</html>
