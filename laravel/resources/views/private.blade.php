<html>
    <head>
        <title>صفحه اصلی | صندوق قرض الحسه امام حسین (ع)</title>
        <link rel="stylesheet" href="{{asset("css_js/bootstrap.min.css")}}">
        <script src="{{asset("css_js/jquery.min.js")}}"></script>
        <script src="{{asset("css_js/bootstrap.bundle.min.js")}}"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset("css_js/private.css")}}">
    </head>
    <body dir="rtl"><center>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" dir="ltr">
            <div class="icon"></div>
            <span class="navbar-brand title">صندوق قرض الحسنه امام حسین (ع)</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto right" dir="rtl">
                    <li class="nav-item active ">
                        <a class="nav-link" style="color: #28a745 ;font-weight: 300 ; font-size: 20px"><i class="fa fa-id-card-o" aria-hidden="true"></i> {{$data['name']}}<span class="sr-only">(current)</span></a>
                    <li class="nav-item">
                        <a class="nav-link"  style="color: #eee ;font-size: 17px" href="#changepasswordmodal" data-toggle="modal"><i class="fa fa-lock" aria-hidden="true"></i> تغییر رمزعبور</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: #eee ;font-size: 17px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-comments-o" aria-hidden="true"></i> پیام ها <span class="badge badge-success badge-pill" id="unreadcount"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#inbox" data-toggle="modal" style="font-size: 17px" onclick="readinbox()"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> صندوق دریافت <span class="badge badge-success badge-pill" id = "unreadcount1"></span></a>
                            <a class="dropdown-item" href="#outbox" data-toggle="modal" style="font-size: 17px"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> صندوق ارسال</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#sendmassage" data-toggle="modal" style="font-size: 17px"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ارسال پیام</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset('/logout1')}}" style="color: #eee ;font-size: 17px"><i class="fa fa-sign-out" aria-hidden="true"></i> خروج</a>
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
                    <th scope="col"><i class="fa fa-database" aria-hidden="true"></i> مانده پس انداز</th>
                    <th scope="col"><i class="fa fa-database" aria-hidden="true"></i> مانده وام</th>
                    <th scope="col"><i class="fa fa-calculator" aria-hidden="true"></i> مجموع وام دریافتی</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$data['account_id']}}</th>
                    <td>{{$data['value']}}</td>
                    <td>{{$data['loanleft']}}</td>
                    <td>{{$data['loansum']}}</td>

                </tr>
                <tr>
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
                    </tr>
                </thead>
                <tbody>
                    <tr id="js0"></tr>
                    <tr id="js1"></tr>
                    <tr id="js2"></tr>
                    <tr id="js3"></tr>
                    <tr id="js4"></tr>
                    <tr id="js5"></tr>
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
                    </tr>
                </thead>
                <tbody>
                    <tr id="jss0"></tr>
                    <tr id="jss1"></tr>
                    <tr id="jss2"></tr>
                    <tr id="jss3"></tr>
                    <tr id="jss4"></tr>
                    <tr id="jss5"></tr>
                </tbody>
            </table>
            <center id="savingnum">
            </center>
        </div>
        <div id="sendmassage" class="modal fade">
            <div class="modal-dialog modal-login modal-wide">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>ارسال پیام</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  method="GET" action="." href="." ONSUBMIT="sendmassageaction()">
                            <div class="form-group">
                                <i class="fa fa-check"></i>
                                <input  id="massagetitle" name="email"  required autocomplete="email" autofocus type="text" class="form-control" placeholder="عنوان پیام" required="required">
                            </div>
                            <div class="form-group">
                                <i class="fa fa-pencil"></i>
                                <textarea  id="massagemain" name="name"  required autocomplete="name" autofocus class="form-control" placeholder="متن پیام" required="required" style="height :200px "></textarea>
                            </div>
                            <span class="invalid-feedback" role="alert">
								<strong></strong>
							</span>
                            <div class="form-group">
                                <input type="submit" class="btn-primary btn-block btn-lg" value="ارسال !">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div id="inbox" class="modal fade">
            <div class="modal-dialog modal-login modal-wide">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>صندوق دریافت</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="card massagebox">
                        <div class="card-body">
                            @foreach ($data['inbox'] as $m)
                                <div >
                                    <span class="rightmassage massageheader @if($m['read']==0) massagenotread @endif" >{{ $m['title'] }}</span>
                                    <span class="rightmassage" style="width: 100%;"> {{ $m['main'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="outbox" class="modal fade">
            <div class="modal-dialog modal-login modal-wide">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>صندوق ارسال</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="card massagebox">
                        <div class="card-body">
                            @foreach ($data['outbox'] as $m)
                                <div >
                                    <span class="rightmassage massageheader @if($m['read']==0) massagenotread @endif" >{{ $m['title'] }}</span>
                                    <span class="rightmassage" style="width: 100%;"> {{ $m['main'] }}</span>
                                </div>
                            @endforeach
                        </div>
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
                            <div class="form-group">
                                <i class="fa fa-lock"></i>
                                <input  id="oldpasswordinput" name="oldpassword"  autocomplete="off"  autofocus type="password" class="form-control" placeholder="رمزعبور قبلی" required="required" maxlength="30" minlength="8">
                            </div>
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
@if(session('error'))
    <script>
        $('#changepasswordmodal').modal('show');
        document.getElementById('passwordspan').innerText={!! json_encode(session('error'))!!}
        document.getElementById('submitpassword').disabled=true;
    </script>
@endif
@if(session('success'))
    <script>
        alert({!! json_encode(session('success'))!!});
    </script>
@endif


<script>
    var loandata = {!! json_encode($data['loandata']) !!} ;
    var savingdata = {!! json_encode($data['savingdata']) !!} ;
    var inbox = {!! json_encode($data['inbox']) !!};
    loannum=loandata.length;
    savingnum=savingdata.length;
    makeloanbuttton(1);
    changeloanlist(1);
    makesavingbuttton(1);
    changesavinglist(1);
    unreadcount();

    function changeloanlist(input) {
        var i=0;
        var text = '';
        for(i=0;i<6;i++) {
            document.getElementById('js'+i).innerHTML = text;
        }
        i=0;
        var n=(input-1)*6;
        while (i<loannum-n && i < 6){
            var text3;
            if(loandata[n+i]['pos']){
                text3='بد' ;
            }
            else{
                text3='بس' ;
            }
            text =
                '<tr>'+
                '<th scope="row">'+(n+i+1)+'</th>\n' +
                '<td>'+loandata[n+i]['date']+'</td>\n' +
                "<td>"+loandata[n+i]['value']+"</td>\n" +
                '<td>'+text3+'</td>\n' +
                "<td>"+loandata[n+i]['balance']+"</td>\n" +
                '</tr>';
            var text2 = 'js' +i;
            document.getElementById(text2).innerHTML=text;
            i+=1;
        }
        makeloanbuttton(input);
    }
    function makeloanbuttton(input) {
        text='';
        for(i=0;i < (loannum / 6) ; i++){
            text +='<input type="button" value="'+(i+1)+'" class="btn btn-light" id="loan'+(i+1)+'" onclick="changeloanlist(this.value)">';
        }
        if (loannum == 0){
             text ='<input type="button" value="'+(1)+'" class="btn btn-light" id="loan'+(1)+'" onclick="changeloanlist(0)">';
        }
        document.getElementById('loannum').innerHTML=text;
        document.getElementById('loan'+input).className +='btn btn-success';
    }
    function changesavinglist(input) {
        var i=0;
        var text = '';
        for(i=0;i<6;i++) {
            document.getElementById('jss'+i).innerHTML = text;
        }
        i=0;
        var n=(input-1)*6;
        while (i<savingnum-n && i < 6){
            var text3;
            if(savingdata[n+i]['pos']){
                text3='بد' ;
            }
            else{
                text3='بس' ;
            }
            text =
                '<tr>'+
                '<th scope="row">'+(n+i+1)+'</th>\n' +
                '<td>'+savingdata[n+i]['date']+'</td>\n' +
                "<td>"+savingdata[n+i]['value']+"</td>\n" +
                '<td>'+text3+'</td>\n' +
                "<td>"+savingdata[n+i]['balance']+"</td>\n" +
                '</tr>';
            var text2 = 'jss' +i;
            document.getElementById(text2).innerHTML=text;
            i+=1;
        }
        makesavingbuttton(input);
    }
    function makesavingbuttton(input) {
        text='';
        for(i=0;i < (savingnum / 6) ; i++){
            text +='<input type="button" value="'+(i+1)+'" class="btn btn-light" id="saving'+(i+1)+'" onclick="changesavinglist(this.value)">';
        }
        document.getElementById('savingnum').innerHTML=text;
        document.getElementById('saving'+input).className +='btn btn-success';
    }

    function unreadcount(){
        var unreadmassages=0;
        var i;
        for(i=0 ; i < inbox.length ; i++){
            if(inbox[i]['read']==0)
                unreadmassages++;

        }
        if(unreadmassages != 0) {
            document.getElementById('unreadcount').innerText = unreadmassages;
            document.getElementById('unreadcount1').innerText = unreadmassages;
        }
    }

    function readinbox(){
        document.getElementById('unreadcount').innerText = '';
        document.getElementById('unreadcount1').innerText = '';
        $.post("readmassages", {},
            function (data, status) {
                return 0;
            });
    }

    function soon(){
        alert('این امکان در حال حاضر فعال نیست.');
    }
    function sendmassageaction(){

            $.post("insertmassage",
                {
                    main: document.getElementById('massagemain').value,
                    title: document.getElementById('massagetitle').value,
                    user_id: {!! json_encode($data['user_id']) !!}
                },
                function (data, status) {
                    alert('پیام با موفقیت فرستاده شد.');
                    return 0;
                });
    }
    function checkpassword() {
        if(document.getElementById('passwordinput').value==document.getElementById('repasswordinput').value)   {
            document.getElementById('submitpassword').disabled=false;
            document.getElementById('passwordspan').innerHTML='';
        }
        else{
            document.getElementById('submitpassword').disabled=true;
            document.getElementById('passwordspan').innerHTML='دو قسمت رمز عبور برابر نیست !';
        }
    }

</script>
