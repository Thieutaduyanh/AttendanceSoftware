<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href=" {{ asset('//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box
        }

        body {
            width: 100%;
            height: 100vh;
            background-image:  url( {{asset('/image/school3.png') }});
            background-size: cover;
            background-position: center;
            font-family: 'Poppins', sans-serif;
        }


        .wrapper {
            max-width: 500px;
            border-radius: 10px;
            margin: 50px auto;
            padding: 30px 40px;
            box-shadow: 20px 20px 80px rgb(206, 206, 206)
        }

        .h2 {
            font-family: 'Kaushan Script', cursive;
            font-size: 3.5rem;
            font-weight: bold;
            color: #400485;
            font-style: italic
        }

        .h4 {
            font-family: 'Poppins', sans-serif
        }

        .input-field {
            border-radius: 5px;
            padding: 5px;
            display: flex;
            align-items: center;
            cursor: pointer;
            border: 1px solid #400485;
            color: #400485
        }

        .input-field:hover {
            color: #7b4ca0;
            border: 1px solid #7b4ca0
        }

        input {
            border: none;
            outline: none;
            box-shadow: none;
            width: 100%;
            padding: 0px 2px;
            font-family: 'Poppins', sans-serif
        }

        .fa-eye-slash.btn {
            border: none;
            outline: none;
            box-shadow: none
        }

        a {
            text-decoration: none;
            color: #400485;
            font-weight: 700
        }

        a:hover {
            text-decoration: none;
            color: #7b4ca0
        }

        .option {
            position: relative;
            padding-left: 30px;
            cursor: pointer
        }

        .option label.text-muted {
            display: block;
            cursor: pointer
        }

        .option input {
            display: none
        }

        .checkmark {
            position: absolute;
            top: 3px;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 50%;
            cursor: pointer
        }

        .option input:checked~.checkmark:after {
            display: block
        }

        .option .checkmark:after {
            content: "";
            width: 13px;
            height: 13px;
            display: block;
            background: #400485;
            position: absolute;
            top: 48%;
            left: 53%;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 300ms ease-in-out 0s
        }

        .option input[type="radio"]:checked~.checkmark {
            background: #fff;
            transition: 300ms ease-in-out 0s;
            border: 1px solid #400485
        }

        .option input[type="radio"]:checked~.checkmark:after {
            transform: translate(-50%, -50%) scale(1)
        }

        .btn.btn-block {
            border-radius: 20px;
            background-color: #400485;
            color: #fff
        }

        .btn.btn-block:hover {
            background-color: #55268be0
        }

        @media(max-width: 575px) {
            .wrapper {
                margin: 10px
            }
        }

        @media(max-width:424px) {
            .wrapper {
                padding: 30px 10px;
                margin: 5px
            }

            .option {
                position: relative;
                padding-left: 22px
            }

            .option label.text-muted {
                font-size: 0.95rem
            }

            .checkmark {
                position: absolute;
                top: 2px
            }

            .option .checkmark:after {
                top: 50%
            }

            #forgot {
                font-size: 0.95rem
            }
        }
    </style>
</head>
<body>
    <div id="login">
        <div class="wrapper bg-white">
            <form id="login-form" method="post" class="form" action="{{ route('admin.login') }}">
                @csrf
                <div class="h2 text-center">Phần Mềm Điểm Danh BKACAD</div>
                <div class="h4 text-muted text-center pt-2">Đăng nhập để sử dụng phần mềm</div>
                <div class="form-group py-2">
                    <div class="input-field"> <span class="far fa-user p-2"></span> <input type="email" name="email" id="email" placeholder="Username or Email Address"  ></div>
                </div>
                <div class="form-group py-1 pb-2">
                    <div class="input-field"> <span class="fas fa-lock p-2"></span> <input type="password" name="password" id="password" placeholder="Enter your Password" > <button class="btn bg-white text-muted"> <span class="far fa-eye-slash"></span> </button> </div>
                </div>
                <div class=" form-group d-flex align-items-start">
                    <div class="remember"> <label class="option text-muted"> Nhớ tài khoản <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                </div>
                <button type="submit" class="btn btn-block text-center my-3">Đăng Nhập</button>
            </form>

        </div>
    </div>

</body>
<script src=" {{ asset('//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js') }}"></script>
<script src=" {{ asset('//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>

</html>
