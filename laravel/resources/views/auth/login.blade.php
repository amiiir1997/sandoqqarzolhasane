
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<style type="text/css">
    body {
        font-family: 'Varela Round', sans-serif;
        background-image: url({{asset('images/blue_background.jpg')}});
        background-repeat:no-repeat;
        background-size:cover;
    }
    .modal-login {
        color: #636363;
        width: 350px;
    }
    .modal-login .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }
    .modal-login .modal-header {
        border-bottom: none;
        position: relative;
        justify-content: center;
    }
    .modal-login h4 {
        text-align: center;
        font-size: 26px;
    }
    .modal-login  .form-group {
        position: relative;
    }
    .modal-login i {
        position: absolute;
        left: 13px;
        top: 11px;
        font-size: 18px;
    }
    .modal-login .form-control {
        padding-left: 40px;
    }
    .modal-login .form-control:focus {
        border-color: #00ce81;
    }
    .modal-login .form-control, .modal-login .btn {
        min-height: 40px;
        border-radius: 3px;
    }
    .modal-login .hint-text {
        text-align: center;
        padding-top: 10px;
    }
    .modal-login .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }
    .modal-login .btn {
        background: #00ce81;
        border: none;
        line-height: normal;
    }
    .modal-login .btn:hover, .modal-login .btn:focus {
        background: #00bf78;
    }
    .modal-login .modal-footer {
        background: #ecf0f1;
        border-color: #dee4e7;
        text-align: center;
        margin: 0 -20px -20px;
        border-radius: 5px;
        font-size: 13px;
        justify-content: center;
    }
    .modal-login .modal-footer a {
        color: #999;
    }
    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
    .title{

    }
</style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>


    <!-- Favicons -->

    <!-- Google Fonts -->

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->

    <!-- Main Stylesheet File -->
    <link href="{{asset('welcome/style.css')}}" rel="stylesheet">

    <!-- =======================================================
      Theme Name: BizPage
      Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>

<body>

<section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active">
                    <div class="carousel-background"><img src={{asset('welcome/1.jpg')}} alt="" style="height:100vh ; width:100vw" ></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>صندوق قرض الحسنه امام حسین</h2>
                            <p>
                                کیست که خدارا وام نیکو دهد و خداوند ده برابر بر او بیفزاید.
                                <br>
                                صندوق قرض الحسنه امام حسین (ع) فعالیت خود را از سال 1370 با هدف دست گیری و یاری همراهان با کمک آشنایان شروع کرد و تا کنون به نیابت از اعضا هزاران گره توسط این صندوق باز شده است .
                            </p>
                            <a href="#myModallogin" class="btn-get-started scrollto"  data-toggle="modal"><b>وارد شوید</b></a>
                            <div style="border:20px; border-bottom-color:#fff" >
                                <a href="#featured-services" class="btn-get-started scrollto" style="background-color:transparent; color:#fff ;"><b>فعال سازی</b></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section><!-- #intro -->

<main id="main">


    <!--==========================
      Facts Section
    ============================-->
    <section id="facts"  class="wow fadeIn">
        <div class="container">

            <header class="section-header">
                <h3>دست آورد ها</h3>
                <p>
                    فعالیت های صندوق از سال 1395 که اطلاعات به صورت الکترونیک ثبت شده است به صورت زیر بوده است
                </p>
            </header>

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">100</span>
                    <p>عضو</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">500000</span>
                    <p>مجموع پس انداز</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">62000</span>
                    <p>میلون وام پرداخت شده</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">18</span>
                    <p>میلیون کمک به خیریه</p>
                </div>

            </div>


        </div>
    </section><!-- #facts -->

</main>


<!-- JavaScript Libraries -->
<script src={{asset('welcome/jquery.min.js')}}></script>
<script src={{asset('welcome/waypoints.min.js')}}></script>
<script src={{asset('welcome/counterup.min.js')}}></script>

<!-- Template Main Javascript File -->
<script src="{{asset('welcome/main.js')}}"></script>

</body>
</html>

<!-- Modal HTML -->

<div id="myModallogin" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">وارد شوید</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <input  id="email" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus type="text" class="form-control" placeholder="نام کاربری" required="required">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input id="password" autocomplete="current-password" name="password" type="password" class="form-control" placeholder="رمز عبور" required="required">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
								<strong>نام کاربری یا رمزعبور وارد شده صحیح نمی باشد</strong>
							</span>
                    @enderror
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    مرا به خواطر بسپار
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block btn-lg" value="ورود">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <a href="#myModalpassword" data-toggle="modal">رمز عبور خود را فراموش کرده اید؟</a>
            </div>
        </div>
    </div>
</div>

<div id="myModalpassword" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">بازیابی رمز عبور</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form  method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <input  id="email" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus type="text" class="form-control" placeholder="نام کاربری" required="required">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
								<strong>نام کاربری وارد شده صحیح نمی باشد</strong>
							</span>
                    @enderror
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block btn-lg" value="ارسال رمز">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif
</body>