<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('public_admin/default/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public_admin/default/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public_admin/default/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public_admin/default/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public_admin/default/plugins/iCheck/square/blue.css')}}">
    <link rel="stylesheet" href="{{ asset('public_admin/default/dist/css/spx.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <!--[if IE]>
    <style>
        .login-box-body{
            border: 1px solid #ddd;
        }
    </style>
    <![endif]-->
    <style>
        .login-page {
            background: #fff;
        }

        .logo-login {
            text-align: center;
        }

        .login-box-msg {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }

        .login-box-body {
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
        }

        .login-logo {
            /*margin-top: 50px;*/
            background: #f9b638;
            margin-bottom: 0;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
        }

        .login-box {
            padding-top: 50px;
        }

        .btn-login {
            background: #f9b638;
            color: #fff;
        }

        .btn-login:hover {
            background: #f1ba54;
            color: #fff;
        }
    </style>
</head>

<body class="hold-transition login-page">
    @if(Auth::user())
    <script>
        window.location.href = '/';
    </script>
    @endif
    <div class="login-box">
        <div class="login-logo">
            <a href="/" style="text-transform: uppercase;font-size: 30px;color:#fff;"><b>Đăng nhập</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <form action="{{ url('/login') }}" method="post">
                <div class="form-group has-feedback">
                    <input style="padding-left: 10px;" type="text" name="email" class="form-control" placeholder="Username or Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input style="padding-left: 10px;" type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="chk_remmember"> <span>Remember Me</span>
                            </label>
                        </div>
                    </div>

                    <a href="/"> <button type="button" class="btn btn-secondary"><span style="color: red;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
                                </svg> Quay Lại</span></button></a>
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-block btn-flat text-center btn-login">Sign In</button>
                    </div>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <!-- /.col -->
                </div>
            </form>
            <p class="text-danger login-box-msg">Vui lòng đăng nhập để tiếp tục!
                <?php //Hiển thị thông báo thành công
                ?>
                @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            @endif
            <?php //Hiển thị thông báo lỗi
            ?>
            @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            @endif
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="{{ asset('public_admin/default/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('public_admin/default/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('public_admin/default/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{ asset('public_admin/default/dist/js/spx.js')}}?v=1"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>

<div class="login-and-register-form modal">
    <div class="main-overlay"></div>
    <div class="main-register-holder">
        <div class="main-register fl-wrap">
            <div class="close-reg"><i class="fa fa-times"></i></div>
            <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
            <div class="soc-log fl-wrap">
                <p>Login</p>
                <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
            </div>
            <div class="log-separator fl-wrap"><span>Or</span></div>
            <div id="tabs-container">
                <ul class="tabs-menu">
                    <li class="current"><a href="#tab-1">Login</a></li>
                    <li><a href="#tab-2">Register</a></li>
                </ul>
                <div class="tab">
                    <div id="tab-1" class="tab-contents">
                        <div class="custom-form">
                            <form method="post" name="registerform">
                                <label>Email * </label>
                                <input name="email" type="text" onClick="this.select()" value="">
                                <label>Password * </label>
                                <input name="password" type="password" onClick="this.select()" value="">
                                <button type="submit" class="log-submit-btn"><span></span></button>
                                <div class="clearfix"></div>
                            </form>
                            <div class="lost_password">
                                <a href="#">Lost Your Password?</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div id="tab-2" class="tab-contents">
                            <div class="custom-form">
                                <form method="post" name="registerform" class="main-register-form" id="main-register-form2">
                                    <label>First Name * </label>
                                    <input name="name" type="text" onClick="this.select()" value="">
                                    <label>Second Name *</label>
                                    <input name="name2" type="text" onClick="this.select()" value="">
                                    <label>Email Address *</label>
                                    <input name="email" type="text" onClick="this.select()" value="">
                                    <label>Password *</label>
                                    <input name="password" type="password" onClick="this.select()" value="">
                                    <button type="submit" class="log-submit-btn"><span>Register</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>