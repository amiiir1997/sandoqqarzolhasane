<html>
<head>
    <title>مدیریت | صندوق قرض الحسه امام حسین (ع)</title>
    <link rel="stylesheet" href="{{asset("css_js/bootstrap.min.css")}}">
    <script src="{{asset("css_js/jquery.min.js")}}"></script>
    <script src="{{asset("css_js/bootstrap.bundle.min.js")}}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset("css_js/admin.css")}}">
    </head>
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
                        <a class="nav-link" style="color: #28a745 ;font-weight: 300 ; font-size: 20px"><i class="fa fa-book" aria-hidden="true"></i> دفترکل<span class="sr-only">(current)</span></a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: #eee ;font-size: 17px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-o" aria-hidden="true"></i> کاربر
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#newuser" data-toggle="modal" style="font-size: 17px"><i class="fa fa-user-plus" aria-hidden="true"></i> کاربر جدید </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#search" data-toggle="modal" style="font-size: 17px"><i class="fa fa-search" aria-hidden="true"></i> جست و جو</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: #eee ;font-size: 17px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-comments-o" aria-hidden="true"></i> پیام ها<span class="badge badge-success badge-pill" id="unreadcount"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#inbox" data-toggle="modal" style="font-size: 17px" onclick="readinbox()"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> صندوق دریافت <span class="badge badge-success badge-pill" id = "unreadcount1"></span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#outbox" data-toggle="modal" style="font-size: 17px"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> صندوق ارسال</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#termmodal" style="color: #eee ;font-size: 17px" data-toggle="modal"><i class="fa fa-bookmark" aria-hidden="true"></i> دوره جدید</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#expencemodal" style="color: #eee ;font-size: 17px" data-toggle="modal"><i class="fa fa-usd" aria-hidden="true"></i> هزینه و درآمد</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset('loanlist')}}" style="color: #eee ;font-size: 17px"><i class="fa fa-hashtag" aria-hidden="true"></i> صف وام</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dailymassagemodal" style="color: #eee ;font-size: 17px" data-toggle="modal"><i class="fa fa-align-justify" aria-hidden="true"></i> پیام عمومی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="soon()" style="color: #eee ;font-size: 17px"><i class="fa fa-mobile" aria-hidden="true"></i> پنل پیامک</a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link" style="color: #28a745 ;font-weight: 300 ; font-size: 20px"><i class="fa fa-money" aria-hidden="true"></i> موجودی حساب:
                            <script>
                                document.write(addCommas({{$data['cash']}}));
                            </script>
                            <span class="sr-only">(current)</span></a>
                    <li class="nav-item dropdown">
                    <li class="nav-item dropdown">
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset('/logout1')}}" style="color: #eee ;font-size: 17px"><i class="fa fa-sign-out" aria-hidden="true"></i> خروج</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="aaa">
            <div class="section-header">
                <h3>صندوق هزینه</h3>
            </div>
            <table class="table table-striped table2">
                <thead>
                    <tr>
                        <th scope="col"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> دوره</th>
                        <th scope="col"><i class="fa fa-university" aria-hidden="true"></i> سود بانک</th>
                        <th scope="col"><i class="fa fa-plus-square" aria-hidden="true"></i> کارمزد</th>
                        <th scope="col"><i class="fa fa-minus-square" aria-hidden="true"></i> هزینه</th>
                        <th scope="col"><i class="fa fa-gift" aria-hidden="true"></i> خیریه</th>
                        <th scope="col" ><i class="fa fa-database" aria-hidden="true"></i> مانده</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($data['term'] as $term)
                        <tr>
                            <td>{{$term['name']}}</td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['sood']}}));
                                </script>
                            </td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['karmozd']}}));
                                </script>
                            </td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['hazine']}}));
                                </script>
                            </td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['kheirie']}}));
                                </script>
                            </td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['mandehazine']}}));
                                </script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="aaa">
            <div class="section-header">
                <h3>صندوق وام</h3>
            </div>
            <table class="table table-striped table2">
                <thead>
                <tr>
                    <th scope="col"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> دوره</th>
                    <th scope="col"><i class="fa fa-plus-square" aria-hidden="true"></i> اقساط دریافتی</th>
                    <th scope="col"><i class="fa fa-minus-square" aria-hidden="true"></i> وام پرداختی</th>
                    <th scope="col"><i class="fa fa-database" aria-hidden="true"></i> مانده وام</th>
                    <th scope="col" ><i class="fa fa-tree" aria-hidden="true"></i> مجموع وام پرداختی</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data['term'] as $term)
                        <tr>
                            <td>{{$term['name']}}</td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['qest']}}));
                                </script>
                            </td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['vam']}}));
                                </script>
                            </td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['mandevam']}}));
                                </script>
                            </td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['majmoevam']}}));
                                </script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="aaa">
            <div class="section-header">
                <h3>صندوق پس انداز</h3>
            </div>
            <table class="table table-striped table2">
                <thead>
                <tr>
                    <th scope="col"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> دوره</th>
                    <th scope="col"><i class="fa fa-plus-square" aria-hidden="true"></i> بدهکار</th>
                    <th scope="col"><i class="fa fa-minus-square" aria-hidden="true"></i> بستانکار</th>
                    <th scope="col"><i class="fa fa-database" aria-hidden="true"></i> مانده</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data['term'] as $term)
                        <tr>
                            <td>{{$term['name']}}</td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['pasdaryafti']}}));
                                </script>
                            </td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['paspardakhti']}}));
                                </script>
                            </td>
                            <td>
                                <script>
                                    document.write(addCommas({{$term['pasmande']}}));
                                </script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <div class="aaa">
            <div class="section-header">
                <h3>آرشیو پس انداز</h3>
            </div>
            <table class="table table-striped table2">
                <thead>
                <tr>
                    <th scope="col"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> ردیف</th>
                    <th scope="col"><i class="fa fa-user" aria-hidden="true"></i> نام</th>
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
                        <td>{{$saving['name']}}</td>
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
        <div class="aaa">
            <div class="section-header">
                <h3>آرشیو وام</h3>
            </div>
            <table class="table table-striped table2">
                <thead>
                <tr>
                    <th scope="col"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> ردیف</th>
                    <th scope="col"><i class="fa fa-user" aria-hidden="true"></i> نام</th>
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
                        <td>{{$loan['name']}}</td>
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
            <div class="section-header">
                <h3>آرشیو هزینه</h3>
            </div>
            <table class="table table-striped table2">
                <thead>
                <tr>
                    <th scope="col"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> ردیف</th>
                    <th scope="col"><i class="fa fa-calendar" aria-hidden="true"></i> تاریخ</th>
                    <th scope="col"><i class="fa fa-file-text-o" aria-hidden="true"></i> توضیحات</th>
                    <th scope="col"><i class="fa fa-circle" aria-hidden="true"></i> مبلغ</th>
                    <th scope="col"><i class="fa fa-exclamation" aria-hidden="true"></i> تشخیص</th>
                    <th scope="col"><i class="fa fa-database" aria-hidden="true"></i> مانده</th>
                    <th scope="col"><i class="fa fa-remove" aria-hidden="true"></i> حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['expencedata'] as $expence)
                    <tr id="e{{$loop->iteration}}" hidden>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $expence['date']}}</td>
                        <td>{{ $expence['description']}}</td>
                        <td>
                            <script>
                                document.write(addCommas({{$expence['value']}}));
                            </script>
                        </td>
                        <td>
                            @if( $expence['cat']==0)
                                سود
                            @elseif( $expence['cat']==1)
                                    کارمزد
                            @elseif( $expence['cat']==2)
                                    هزینه
                            @elseif( $expence['cat']==3)
                                    خیریه
                            @endif

                        </td>
                        <td>
                            <script>
                                document.write(addCommas({{$expence['balance']}}));
                            </script>
                        </td>
                        <td><img src={{asset('images/delete.png')}} class="delete" onclick="deleteexpence({{ $expence["expense_id"]}})"> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <center id="expencenum">
            </center>
        </div>

        <div id="newuser" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">کاربر جدید</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  method="POST" action="{{asset('newuser')}}">
                            @csrf
                            <div class="form-group">
                                <i class="fa fa-user"></i>
                                <input  id="name" name="name"  value="{{ old('name') }}" required autocomplete="name" autofocus type="text" class="form-control" placeholder="نام" required="required" maxlength="30">
                            </div>
                            <div class="form-group">
                                <i class="fa fa-mobile"></i>
                                <input  id="mobileinput" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus type="text" class="form-control" placeholder="موبایل" required="required" maxlength="11" minlength="11" onkeyup="checkmobile()">
                            </div>
                            <div class="form-group">
                                <i class="fa fa-tag"></i>
                                <input  id="account_id" name="account_id" autofocus type="text" class="form-control" placeholder="شماره حساب - 0000"  onkeyup="account_idfixer()" maxlength="4" minlength="4" required>
                            </div>
                            <div class="form-group">
                                <i class="fa fa-lock"></i>
                                <input  id="password" name="password"  required  autofocus type="password" class="form-control" placeholder="رمز عبور" required="required" minlength="8" maxlength="30" onkeyup="checkpassword()">
                            </div>
                            <div class="form-group">
                                <i class="fa fa-unlock-alt"></i>
                                <input  id="repassword" name="repassword"   required  autofocus type="password" class="form-control" placeholder="تکرار رمز عبور" required="required" onkeyup="checkpassword()">
                            </div>
                            <span id="repassworderror" style="color:red"></span>
                            <div class="form-group">
                                <input type="submit" id="submitnewuser" class="btn btn-primary btn-block btn-lg" value="ایجاد کاربر" disabled>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
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
                            <div>
                                <span class="rightmassage">{{$m['name']}} :&nbsp;</span>
                                <span class="rightmassage massageheader @if($m['read']==0) massagenotread @endif" >{{ $m['title'] }}</span>
                                <button type="button" class="btn btn-outline-success" style="height: 28px ; margin: 0px;padding: 0px 6px 0px 6px ;float: left; margin-left: 100px" onclick="sendmassagemodal({{$m['id']}})" >پاسخ دادن</button><br>
                                <span class="rightmassage" style="width: 100%;"> {{ $m['main'] }}</span><br>
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
                            <div>
                                <span class="rightmassage">{{$m['name']}} :&nbsp;</span>
                                <span class="rightmassage massageheader @if($m['read']==0) massagenotread @endif" >{{ $m['title'] }}</span>
                                <span class="rightmassage" style="width: 100%;"> {{ $m['main'] }}</span><br>
                            </div>
                        @endforeach
                    </div>
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
                    <form  method="get" href="#" ONSUBMIT="sendmassageaction()">
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input  id="massagereceiverid"  required autofocus type="text" class="form-control" value="id" required="required" hidden>
                            <input  id="massagereceivername"  required autofocus type="text" class="form-control" value="amir" required="required" disabled>
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
   <div id="dailymassagemodal" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">پیام عمومی</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  method="POST" action="{{asset('dailymassage')}}">
                            @csrf
                             <div class="form-group">
                                <i class="fa fa-pencil"></i>
                                <textarea name="dis"  value="{{ old('dis') }}" autofocus class="form-control" placeholder="پیام" maxlength="490"></textarea>
                            </div>
                                <input type="submit" id="submitsearch" class="btn btn-primary btn-block btn-lg" value="ثبت">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="expencemodal" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">هزینه و درآمد</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  method="POST" action="{{asset('newexpence')}}">
                            @csrf
                            <div class="form-group">
                                <i class="fa fa-usd"></i>
                                <input  id="modalexpencevalue" name="value"  value="{{ old('value') }}" required autofocus type="text" class="form-control" placeholder="مبلغ" required="required" onkeyup="expencevaluefixer()">
                            </div>
                            <div class="form-group">
                                <select  id="" name="cat"  value="{{ old('cal') }}" required  autofocus type="text" class="form-control" placeholder="دسته بندی" required="required">
                                    <option value="0">سود بانک</option>
                                    <option value="1">کارمزد</option>
                                    <option value="2">هزینه</option>
                                    <option value="3">خیریه</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <i class="fa fa-pencil"></i>
                                <textarea name="dis"  value="{{ old('dis') }}" autofocus class="form-control" placeholder="توضیحات"></textarea>
                            </div>
                                <input type="submit" id="submitsearch" class="btn btn-primary btn-block btn-lg" value="ثبت">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="termmodal" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">جست و جو</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  method="POST" action="{{asset('newterm')}}">
                            @csrf

                            <div class="form-group">
                                <i class="fa fa-user"></i>
                                <input  id="" name="name"  value="{{ old('name') }}" required autofocus type="text" class="form-control" placeholder="نام دوره" required="required">
                            </div>
                            <span style="color:red">با ایجاد دوره ی جدید دوره قبلی بسته خواهد شد و امکان ایجاد تغییر در پرداخت ها و دریافت های دوره قبلی ممکن نمی باشد.</span>
                            <div class="form-group">
                                <input type="submit" id="" class="btn btn-success btn-block btn-lg" value="تایید">
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
                            <input type="submit" class="btn btn-daner text-white" value="بله!" enable>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div id="deleteexpencemodal" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content bg-danger" style="background-color: blue ; padding: 0px;">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">حذف</div>
                        <div class="card-body">
                            <p class="card-text">آیا مطمعن به حذف تراکنش انتخابی هستید؟</p>
                        </div>
                        <form method="post" action={{asset("deleteexpence")}}>
                            @csrf
                            <input type="hidden" id="expence_id" name="expence_id">
                            <input type="hidden" name="page_id" value="0">
                            <input type="submit" class="btn btn-daner text-white" value="بله!" enable>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </center></body>
</html>
<script>
    if( {{$data['error']}}==1 ){
        $("#newuser").modal("show");
        document.getElementById('repassworderror').innerHTML ={!! json_encode($data['errortex']) !!}
    }
    var savingnum = {!! json_encode($data['savingdata']) !!}.length ;
    var loannum = {!! json_encode($data['loandata']) !!}.length ;
    var expencenum = {!! json_encode($data['expencedata']) !!}.length ;
    unreadcount();
    showsaving(1);
    showloan(1);
    showexpence(1);
    function checkpassword(){
        var a =document.getElementById('password').value;
        var b =document.getElementById('repassword').value;
        if(a != b){
            document.getElementById('repassworderror').innerHTML = "دو قسمت رمز عبور برابر نیست !"
            document.getElementById('submitnewuser').disabled=true;
        }
        else {
            document.getElementById('repassworderror').innerHTML = ""
            document.getElementById('submitnewuser').disabled=false;
        }
    }
    function getuserlistnum(){
        document.getElementById('submitsearch').disabled=true;
        if (document.getElementById('usersearchnumber').value.length<2 || document.getElementById('usersearchnumber').value.length>4) {
            document.getElementById("userlist").innerHTML = "";
            return;
        }
        else{
            $.post("checkidsearch",
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
            $.post("checkusername",
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
    function unreadcount(){
        var inbox = {!! json_encode($data['inbox']) !!}
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
    function sendmassagemodal(id){
        var name='';
        var i = 0;
        var inbox = {!! json_encode($data['inbox']) !!}
            while(1){
            if(inbox[i]['id'] == id){
                name=inbox[i]['name'];
                break;
            }
            i++;
        }
        $("#sendmassage").modal()
        document.getElementById('massagereceivername').value=name;
        document.getElementById('massagereceiveris').value=id;
    }
    function sendmassageaction(){
        $.post("insertmassage",
            {
                main: document.getElementById('massagemain').value,
                title: document.getElementById('massagetitle').value,
                user_id: document.getElementById('massagereceiverid').value
            },
            function (data, status) {
                alert('پیام با موفقیت فرستاده شد.');
                return 0;
            });
    }
    function expencevaluefixer(){
        var text = document.getElementById('modalexpencevalue').value;
        var text2='';
        var i;
        for(i=0;i<text.length;i++){
            if( text[i] >= '0' && text[i]<='9')
                text2+=text[i]
        }
        document.getElementById('modalexpencevalue').value=text2;
    }
    function checkmobile(){
        var text = document.getElementById('mobileinput').value;
        var text2='';
        var i;
        for(i=0;i<text.length;i++){
            if( text[i] >= '0' && text[i]<='9')
                text2+=text[i]
        }
        document.getElementById('mobileinput').value=text2;
    }
    function account_idfixer() {
        var text = document.getElementById('account_id').value;
        var text2 = '';
        var i;
        for (i = 0; i < text.length; i++) {
            if (text[i] >= '0' && text[i] <= '9')
                text2 += text[i]
        }
        document.getElementById('account_id').value = text2;
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
    function showexpence(i){
        var n;
        for(n=1;n<=expencenum;n++)
            document.getElementById('e'+n).hidden = true;
        for(n=0;n<6 && ((i*6+n)-5) <= expencenum ;n++) {
            document.getElementById('e' +((i*6+n)-5)).hidden = false;
        }
        makeexpencebuttton(i);
    }
    function makeexpencebuttton(input) {
        text='';
        for(i=0;i < (expencenum / 6) ; i++){
            text +='<input type="button" value="'+(i+1)+'" class="btn btn-light" id="expence'+(i+1)+'" onclick="showexpence(this.value)">';
        }
        document.getElementById('expencenum').innerHTML=text;
        document.getElementById('expence'+input).className +='btn btn-success';
    }
    function fullsearch(a){
        document.getElementById('usersearchnumber').value=a.substring(0,4);
        document.getElementById('usersearchname').value=a.substring(5);
        document.getElementById('submitsearch').disabled=false;
        document.getElementById('adminuserlink').href="{{asset('/adminuser/')}}/"+a.substring(0,4);
    }
    function deletepayment(a){
        $('#deletepaymentmodal').modal('show');
        document.getElementById('payment_id').value=a;
    }
    function deleteexpence(a){
        $('#deleteexpencemodal').modal('show');
        document.getElementById('expence_id').value=a;
    }

</script>