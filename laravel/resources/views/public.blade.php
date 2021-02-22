<html><head>
    <title>صندوق قرض الحسنه امام حسین (ع)</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset("css_js/bootstrap.min.css")}}">
    <script src="{{asset("css_js/jquery.min.js")}}"></script>
    <script src="{{asset("css_js/bootstrap.bundle.min.js")}}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css_js/public.css')}}">


</head>
<body>
<section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active">
                    <div class="carousel-background"><img src={{asset('welcome/1.jpg')}} alt="" style="height:100vh ; width:100vw" ></div>
                    <div class="carousel-container">
                        <div class="carousel-content" dir="rtl">
                            <h2> صندوق قرض الحسنه امام حسین (ع)</h2>
                            <p>
                                کیست که خدارا وام نیکو دهد و خداوند ده برابر بر او بیفزاید.
                                <br>
                                صندوق قرض الحسنه امام حسین (ع) فعالیت خود را از سال 1376 با هدف دست گیری و یاری همراهان، با کمک آشنایان شروع کرد و تا کنون به نیابت از اعضا هزاران گره توسط این صندوق باز شده است.
                            </p>
                            <a href="#loginmodal" data-toggle="modal" class="btn-get-started scrollto"><b>وارد شوید</b></a>
                            <div style="border:20px; border-bottom-color:#fff" >
                                <a class="btn-get-started scrollto" style="background-color:transparent; color:#fff"><b>{{ $data['text']}}</b></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<section id="facts"  class="wow fadeIn">
        <div class="container">

            <header class="section-header">
                <h3>دست آورد ها</h3>
                <p>
                    فعالیت های صندوق از سال 1395 که اطلاعات به صورت الکترونیک ثبت شده است به صورت زیر بوده است
                </p>
            </header>

            <div class="row counters" dir="rtl">


                <div class="col-lg-4 col-12 text-center">
                    <span id="member">{{ $data['count'] }}</span>
                    <p>عضو</p>
                </div>

                <div class="col-lg-4 col-12 text-center">
                    <span id="loan">{{ $data['loan'] }}</span>
                    <p>میلیون ریال وام پرداخت شده</p>
                </div>

                <div class="col-lg-4 col-12 text-center">
                    <span id="charity">{{ $data['charity']/1000000 }}</span>
                    <p>میلیون ریال کمک به خیریه</p>
                </div>

            </div>


        </div>
    </section>
<div id="loginmodal" class="modal">
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
                        <input  id="email" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus type="text" class="form-control" placeholder="نام کاربری" required="required" maxlength="15">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input id="password" autocomplete="current-password" name="password" type="password" class="form-control" placeholder="رمز عبور" required="required" maxlength="30">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-7">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    مرا به خاطر بسپار
                                </label>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <span class="alert">نام کاربری یا رمز عبور نادرست است .</span>
                    @endif
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block btn-lg" value="ورود">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <a onclick="forgetpassword()">رمز عبور خود را فراموش کرده اید؟</a>
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
<script>
    var count = {!! json_encode($data['count']) !!};
    var loan = {!! json_encode($data['loan']) !!};
    var charity = {!! json_encode($data['charity']) !!};
    @if ($errors->any())
    $("#loginmodal").modal("show");
    @endif
</script>
<script src="{{asset("css_js/public.js")}}">

</script>
</body>
</html>