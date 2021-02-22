<link rel="stylesheet" href="{{asset("css_js/bootstrap.min.css")}}">
<script src="{{asset("css_js/jquery.min.js")}}"></script>
<script src="{{asset("css_js/bootstrap.bundle.min.js")}}"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset("css_js/adminuser.css")}}">
</head>
<body dir="rtl"><center>
    @if(session('success'))
        <script>
            alert({!! json_encode(session('success'))!!});
        </script>
    @endif
     <script>
        function addCommas(nStr)
        {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" dir="ltr">
        <div class="icon"></div>
        <span class="navbar-brand title">صندوق قرض الحسنه امام حسین (ع)</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto right" dir="rtl">
                <li class="nav-item active ">
                    <a class="nav-link" style="color: #28a745 ;font-weight: 300 ; font-size: 20px" href="{{asset("/home")}}"><i class="fa fa-book" aria-hidden="true"></i> دفترکل<span class="sr-only">(current)</span></a>
                <li class="nav-item">
                    <a class="nav-link" href="#search" style="color: #eee ;font-size: 17px" data-toggle="modal"><i class="fa fa-user-o" aria-hidden="true"></i> جست و جو</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: #eee ;font-size: 17px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-calculator" aria-hidden="true"></i> حسابداری
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#pasmodal" data-toggle="modal" style="font-size: 17px"><i class="fa fa-arrow-up" aria-hidden="true"></i> ثبت پس انداز و قسط</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#vammodal" data-toggle="modal" style="font-size: 17px"><i class="fa fa-arrow-down" aria-hidden="true"></i> ثبت وام</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sendmassage" style="color: #eee ;font-size: 17px" data-toggle="modal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> ارسال پیام</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#changepasswordmodal" style="color: #eee ;font-size: 17px" data-toggle="modal"><i class="fa fa-lock" aria-hidden="true"></i> تغییر رمزعبور</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #eee ;font-size: 17px" onclick="soon()"><i class="fa fa-mobile-phone" aria-hidden="true"></i> ارسال پیامک</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#closeaccountmodal" style="color: #eee ;font-size: 17px" data-toggle="modal"><i class="fa fa-times" aria-hidden="true"></i> بستن حساب</a>
                </li>
            </ul>
        </div>
    </nav>
    <div style="height:100px"></div>
    <header class="section-header">
        <h3>اطلاعات حساب</h3>
    </header>
    <table class="table table1">
        <thead>
        <tr>
            <th scope="col"><i class="fa fa-id-card" aria-hidden="true"></i> شماره حساب</th>
            <th scope="col"><i class="fa fa-user" aria-hidden="true"></i> نام صاحب حساب</th>
            <th scope="col"><i class="fa fa-database" aria-hidden="true"></i> مانده پس انداز</th>
            <th scope="col"><i class="fa fa-database" aria-hidden="true"></i> مانده وام</th>
            <th scope="col"><i class="fa fa-calculator" aria-hidden="true"></i> مجموع وام دریافتی</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$data['account_id']}}</th>
            <td>{{$data['name']}}</td>
            <td>
                <script>
                                document.write(addCommas({{$data['value']}}));
                </script>
            </td>
            <td>
                <script>
                                document.write(addCommas({{$data['loanleft']}}));
                </script>
            </td>
            <td>
                <script>
                                document.write(addCommas({{$data['loansum']}}));
                </script>
            </td>

        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <br><br><br>
    <div class="aaa">
        <header class="section-header">
            <h3>دفترچه وام</h3>
        </header>
        <table class="table table-striped table2">
            <thead>
            <tr>
                <th scope="col"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> ردیف</th>
                <th scope="col"><i class="fa fa-calendar" aria-hidden="true"></i> تاریخ</th>
                <th scope="col"><i class="fa fa-circle" aria-hidden="true"></i> مبلغ</th>
                <th scope="col"><i class="fa fa-exclamation" aria-hidden="true"></i> تشخیص</th>
                <th scope="col"><i class="fa fa-database" aria-hidden="true"></i> مانده</th>
                <th scope="col"><i class="fa fa-remove" aria-hidden="true"></i> حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data['loandata'] as $loan)
                <tr id="l{{$loop->iteration}}" hidden>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$loan['date']}}</td>
                    <td>
                        <script>
                                document.write(addCommas({{$loan['value']}}));
                        </script>
                    </td>
                    <td>{{$loan['pos']}}</td>
                    <td>
                        <script>
                                document.write(addCommas({{$loan['balance']}}));
                        </script>
                    </td>
                    <td><img src={{asset('images/delete.png')}} class="delete" onclick="deletepayment({{$loan["peyment_id"]}})"> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <center id="loannum">
        </center>
    </div>
    <div class="aaa">
        <header class="section-header">
            <h3>دفترچه حساب</h3>
        </header>
        <table class="table table-striped table2">
            <thead>
            <tr>
                <th scope="col"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> ردیف</th>
                <th scope="col"><i class="fa fa-calendar" aria-hidden="true"></i> تاریخ</th>
                <th scope="col"><i class="fa fa-circle" aria-hidden="true"></i> مبلغ</th>
                <th scope="col"><i class="fa fa-exclamation" aria-hidden="true"></i> تشخیص</th>
                <th scope="col"><i class="fa fa-database" aria-hidden="true"></i> مانده</th>
                <th scope="col"><i class="fa fa-remove" aria-hidden="true"></i> حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data['savingdata'] as $saving)
                <tr id="s{{$loop->iteration}}" hidden>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$saving['date']}}</td>
                    <td>
                        <script>
                                document.write(addCommas({{$saving['value']}}));
                        </script>
                    </td>
                    <td>{{$saving['pos']}}</td>
                    <td>
                        <script>
                                document.write(addCommas({{$saving['balance']}}));
                        </script>
                    </td>
                    <td><img src={{asset('images/delete.png')}} class="delete" onclick="deletepayment({{$saving["peyment_id"]}})"> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <center id="savingnum">
        </center>
    </div>
        <div id="search" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">جست و جو</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <i class="fa fa-tag"></i>
                            <input  id="usersearchnumber" name="number"  value="{{ old('number') }}" autocomplete="off"  autofocus type="text" class="form-control" placeholder="شماره حساب" required="required" onkeyup="getuserlistnum()">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input  id="usersearchname" name="name"  value="{{ old('name') }}" autocomplete="off"  autofocus type="text" class="form-control" placeholder="نام" required="required" onkeyup="getuserlistname()">
                        </div>
                        <span id="userlist" style="color:red"></span>
                        <div class="form-group">
                            <a id="adminuserlink"> <button id="submitsearch" class="btn btn-primary btn-block btn-lg" disabled>تایید</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <div id="closeaccountmodal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">بستن حساب</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="{{asset('closeaccount')}}">
                        @csrf
                        <span style="color:red">با بستن حساب اطلاعات حساب موجودی حساب به طور خودکار از حساب دفتر کل کم میشود.<br>اطلاعات حساب نیز به طور کلی از پایگاه داده پاک خواهند شد و دیگر قابل بازگشت نخواهد بود.</ذق></span>
                        <div class="form-group">
                            <input  id="closeaccountcheck" autofocus type="checkbox" class="form-check-input" required="required">
                            <label class="form-check-label" for="closeaccountcheck">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;میخواهم حساب را ببندم !</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="submitsearch" class="btn btn-primary btn-block btn-lg" value="تایید">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="sendmassage" class="modal fade">
        <div class="modal-dialog modal-login modal-wide">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>ارسال پیام</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form  method="Post" href="#" ONSUBMIT="sendmassageaction()">
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input  id="massagereceiverid"  required autofocus type="text" class="form-control" value="{{$data['user_id']}}" required="required" hidden>
                            <input  id="massagereceivername"  required autofocus type="text" class="form-control" value="{{$data['name']}}" required="required" disabled>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-check"></i>
                            <input  id="massagetitle"  required autofocus type="text" class="form-control" placeholder="عنوان پیام" required="required" maxlength="25">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-pencil"></i>
                            <textarea  id="massagemain" required autofocus class="form-control" placeholder="متن پیام" required="required" style="height :200px " maxlength="200"></textarea>
                        </div>
                        <span class="invalid-feedback" role="alert">
								<strong></strong>
							</span>
                        <div class="form-group">
                            <input type="submit" class="btnoff btn-primary btn-block btn-lg" value="ارسال !">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="pasmodal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ثبت پس انداز و قسط</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="{{asset('newpayment')}}">
                        @csrf
                        <input type="hidden" value="{{$data["account_id"]}}" name="account_id">
                        <div class="form-group">
                            <i class="fa fa-arrow-up"></i>
                            <input  id="pasandaz" name="pasandaz" autocomplete="off"  autofocus type="text" class="form-control" placeholder="پس انداز" onkeyup="numberfixer(this.id)" required>
                        </div>
                        <div class="form-group">
                            <input  id="pasandazneg" name="pasandazneg" autofocus type="checkbox" class="form-check-input" value="1">
                            <label class="form-check-label" for="closeaccountcheck">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;برداشت از پس انداز</label>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-arrow-up"></i>
                            <input  id="qest" name="qest" autocomplete="off"  autofocus type="text" class="form-control" placeholder="قسط" onkeyup="numberfixer(this.id)" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="submitpas" class="btn btn-primary btn-block btn-lg" value="تایید">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="vammodal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ثبت وام</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="{{asset('newloan')}}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" value="{{$data["account_id"]}}" name="account_id">
                            <i class="fa fa-arrow-down"></i>
                            <input  id="vam" name="vam" autocomplete="off"  autofocus type="text" class="form-control" placeholder="وام" onkeyup="numberfixer(this.id)">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="submitvam" class="btn btn-primary btn-block btn-lg" value="تایید">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div id="deletepaymentmodal" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content bg-danger" style="background-color: blue ; padding: 0px;">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">حذف</div>
                        <div class="card-body">
                            <p class="card-text">آیا مطمعن به حذف تراکنش انتخابی هستید؟</p>
                        </div>
                        <form method="post" action={{asset("deletepayment")}}>
                            @csrf
                            <input type="hidden" id="payment_id" name="payment_id">
                            <input type="hidden" name="page_id" value={{$data['account_id']}}>
                            <input type="submit" class="btn btn-daner text-white" value="بله!" enable>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div id="changepasswordmodal" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">تغییر رمزعبور</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{asset('/changepassword')}}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$data['user_id']}}">
                            <input type="hidden" name="account_id" value="{{$data['account_id']}}">
                        <div class="form-group">
                            <i class="fa fa-lock"></i>
                            <input  id="passwordinput" name="password"  autocomplete="off"  autofocus type="password" class="form-control" placeholder="رمزعبور جدید" required="required" onkeyup="checkpassword()" maxlength="30" minlength="8">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-unlock"></i>
                            <input  id="repasswordinput" name="repassword" autocomplete="off"  autofocus type="password" class="form-control" placeholder="تکرار رمزعبور" required="required" onkeyup="checkpassword()" maxlength="30" maxlength="8">
                        </div>
                        <span id="passwordspan" style="color:red"></span>
                        <div class="form-group">
                            <button type="submit" id="submitpassword" class="btn btn-primary btn-block btn-lg">تایید</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</center></body>
</html>



<script>
    var loandata = {!! json_encode($data['loandata']) !!} ;
    var savingdata = {!! json_encode($data['savingdata']) !!} ;
    loannum=loandata.length;
    savingnum=savingdata.length;
    showsaving(1);
    showloan(1);
    function getuserlistnum(){
        document.getElementById('submitsearch').disabled=true;
        if (document.getElementById('usersearchnumber').value.length<2 || document.getElementById('usersearchnumber').value.length>4) {
            document.getElementById("userlist").innerHTML = "";
            return;
        }
        else{
            $.post('{{asset("/checkidsearch")}}',
                {
                    name: document.getElementById('usersearchnumber').value,
                },
                function (data, status) {
                    document.getElementById("userlist").innerHTML = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        var a = data[i]['account_id'] + "/',/'" + data[i]['name'];
                        document.getElementById("userlist").innerHTML += '<span onclick="fullsearch(\'' + data[i]['account_id'] + ',' + data[i]['name'] + '\')">' + data[i]['account_id'] + "   " + data[i]['name'] + '</span> <hr style="margin-top: 2px">';
                    }
                });
        }
    }
    function getuserlistname(){
        document.getElementById('submitsearch').disabled=true;
        if (document.getElementById('usersearchname').value.length<4) {
            document.getElementById("userlist").innerHTML = "";
            return;
        }
        else{
            $.post('{{asset("/checkusername")}}',
                {
                    name: document.getElementById('usersearchname').value,
                },
                function (data, status) {
                    document.getElementById("userlist").innerHTML='';
                    var i;
                    for(i=0; i< data.length ; i++) {
                        var a = data[i]['account_id']+"/',/'"+data[i]['name'];
                        document.getElementById("userlist").innerHTML += '<span onclick="fullsearch(\''+data[i]['account_id']+','+data[i]['name']+'\')">' + data[i]['account_id'] + "   " + data[i]['name'] + '</span> <hr style="margin-top: 2px">';
                    }
                });
        }
    }
    function showsaving(i){
        var n;
        for(n=1;n<=savingnum;n++)
            document.getElementById('s'+n).hidden = true;
        for(n=0;n<6 && ((i*6+n)-5) <= savingnum ;n++) {
            document.getElementById('s' +((i*6+n)-5)).hidden = false;
        }
        makesavingbuttton(i);
    }
    function makesavingbuttton(input) {
        text='';
        for(i=0;i < (savingnum / 6) ; i++){
            text +='<input type="button" value="'+(i+1)+'" class="btn btn-light" id="saving'+(i+1)+'" onclick="showsaving(this.value)">';
        }
        document.getElementById('savingnum').innerHTML=text;
        document.getElementById('saving'+input).className +='btn btn-success';
    }
    function showloan(i){
        var n;
        for(n=1;n<=loannum;n++)
            document.getElementById('l'+n).hidden = true;
        for(n=0;n<6 && ((i*6+n)-5) <= loannum ;n++) {
            document.getElementById('l' +((i*6+n)-5)).hidden = false;
        }
        makeloanbuttton(i);
    }
    function makeloanbuttton(input) {
        text='';
        for(i=0;i < (loannum / 6) ; i++){
            text +='<input type="button" value="'+(i+1)+'" class="btn btn-light" id="loan'+(i+1)+'" onclick="showloan(this.value)">';
        }
        document.getElementById('loannum').innerHTML=text;
        document.getElementById('loan'+input).className +='btn btn-success';
    }
    function fullsearch(a){
        document.getElementById('usersearchnumber').value=a.substring(0,4);
        document.getElementById('usersearchname').value=a.substring(5);
        document.getElementById('submitsearch').disabled=false;
        document.getElementById('adminuserlink').href="{{asset('/adminuser/')}}/"+a.substring(0,4);
    }
    function numberfixer(name){
        text =document.getElementById(name).value;
        var text2 = '';
        var i;
        for (i = 0; i < text.length; i++) {
            if (text[i] >= '0' && text[i] <= '9')
                text2 += text[i]
        }
        document.getElementById(name).value = text2;
    }
    function soon() {
        alert('این امکان در حال حاضر فعال نیست.');
    }
    function deletepayment(a){
        $('#deletepaymentmodal').modal('show');
        document.getElementById('payment_id').value=a;
    }
    function checkpassword() {
        if(document.getElementById('passwordinput').value==document.getElementById('repasswordinput').value)   {
            document.getElementById('submitpassword').disable=false;
            document.getElementById('passwordspan').innerHTML='';
        }
        else{
            document.getElementById('submitpassword').disable=true;
            document.getElementById('passwordspan').innerHTML='دو قسمت رمز عبور برابر نیست !';
        }
    }

</script>
