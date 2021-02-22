<html>
<head>
    <title>اطلاعات اولیه | صندوق قرض الحسه امام حسین (ع)</title>
    <link rel="stylesheet" href="{{asset("css_js/bootstrap.min.css")}}">
    <script src="{{asset("css_js/jquery.min.js")}}"></script>
    <script src="{{asset("css_js/bootstrap.bundle.min.js")}}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background-color: #fefefe;
            font-family: "B Nazanin";
            font-size: 20px;
        }
        .diva{
            background-color: #fafafa;
            padding: 2vw;
            width: 50vw;
            margin: 50px 25vw 0 25vw;
            direction: rtl;
        }
        label{
            direction: rtl;
        }
        button{
            width: 46vw;
        }
    </style>
</head>
<body><center>
        <div class="diva">
            <form method="post" action="{{asset("/initialdata")}}">
                <h1>انتقال از دفتر</h1>
                <hr>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام و نام خانوادگی :</label>
                    <input type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی" maxlength="30" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">شماره موبایل :</label>
                    <input type="numer" name="phone" class="form-control" placeholder="شماره موبایل" maxlength="11" minlength="11" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">رمزعبور :</label>
                    <input type="text" name="password" class="form-control" placeholder="رمزعبور" maxlength="30" minlength="8" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">شماره حساب :</label>
                    <input type="numer" name="account_id" class="form-control" placeholder="شماره حساب" maxlength="4" minlength="4" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">پس انداز :</label>
                    <input type="numer" name="value" class="form-control" placeholder="پس انداز" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">مانده وام :</label>
                    <input type="numer" name="loanleft" class="form-control" placeholder="مانده وام" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">مجموع وام دریافتی :</label>
                    <input type="numer" name="loansum" class="form-control" placeholder="مجموع وام دریافتی" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">قسط ماهیانه :</label>
                    <input type="numer" name="instalment" class="form-control" placeholder="قسط ماهیانه" required>
                </div>
                @csrf<br>
                <button type="submit" class="btn btn-primary">ثبت</button>
            </form>
        </div>
</body>
</html>