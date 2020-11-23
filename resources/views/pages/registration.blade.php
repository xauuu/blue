<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> -->
    <!-- ===============================================================================================	 -->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-res100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('login/images/img-01.png') }}" alt="IMG">
                </div>

                <form method="post" action="{{ URL::to('check-registration') }}" class="login100-form validate-form">
                    {{ csrf_field() }}
                    <span class="login100-form-title">
                        ĐĂNG KÍ
                    </span>
                    @if (session('error'))
                        <div style="color: red">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="wrap-input100">
                        <input class="input1001" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        {{-- <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span> --}}
                    </div>
                    <div class="wrap-input100">
                        <input class="input1001" type="text" name="name" placeholder="Tên người dùng">
                        <span class="focus-input100"></span>
                        {{-- <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span> --}}
                    </div>
                    <div class="wrap-input100">
                        <input id="pass" class="input1001" type="password" name="pass" placeholder="Mật khẩu">
                        <span class="focus-input100"></span>
                        {{-- <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span> --}}
                    </div>
                    <div class="wrap-input100">
                        <input class="input1001" type="password" name="re-password" placeholder="Nhập lại mật khẩu">
                        <span class="focus-input100"></span>
                        {{-- <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span> --}}
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Đăng kí
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{ URL::to('/login-customer') }}">
                            Đăng nhập
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ asset('login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })

    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/js/jquery-validate.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.validate-form').validate({
                rules: {
                    email: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    pass: {
                        required: true,
                        minlength: 5
                    },
                    "re-password": {
                        equalTo: "#pass"
                    }
                },
                messages: {
                    email: {
                        required: "Bạn chưa nhập email",
                    },
                    name: {
                        required: "Bạn chưa nhập tên",
                    },
                    pass: {
                        required: "Bạn chưa nhập mật khẩu",
                        minlength: "Mật khẩu ít nhất 5 kí tự"
                    },
                    "re-password": {
                        equalTo: "Mật khẩu nhập lại không khớp với mật khẩu"
                    }
                }
            });
        });

    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/js/main.js') }}"></script>

</body>

</html>
