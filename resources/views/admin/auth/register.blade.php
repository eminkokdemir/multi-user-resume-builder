@extends("admin.layout.auth")

@section("title","register")

@section("content")
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Resume</b>Builder</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                @include("admin.partials.alert_validation")
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ route("auth.register") }}" data-method="post" class="form-ajax">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="user_name" placeholder="user_name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{ route("auth.login") }}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div>
    </div>
@endsection

@section("script")
@endsection

@section("style")
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset("adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
@endsection
