<html>
<head>
    <meta charset="utf-8">
    <title>صف وام</title>
    <link rel="stylesheet" href="{{asset("css_js/bootstrap.min.css")}}">
    <script src="{{asset("css_js/jquery.min.js")}}"></script>
    <script src="{{asset("css_js/bootstrap.bundle.min.js")}}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset("css_js/admin.css")}}">
    <style>
        .loanlistdiv{
            width : 60vw;
        }
        .trhover:hover{
            background-color:#aaa;
        }
        .background{
            background-color: #eeeeee;
            width: 65vw;
            padding: 2vw;
            margin-top: 1vh;
            border-radius: 1vw;
        }
        .title{
            font-family: arial;
        }
        .title1{
            font-size: 5vw;
        }
        .title2{
            font-size: 3vw;
        }
    </style>
</head>
<body dir="rtl"><center>
    <div class="background">
        <span class="title title1">صندوق قرض الحسنه امام حسین (ع)</span>
        <h1 class="title title2"><i class="fa fa-check-square-o" aria-hidden="true"></i> اولویت دریافت وام</h1>
            <h5 class="btn btn-outline-secondary">1399/5/2</h5>
        <br><br>

    <div class="loanlistdiv">
        <table class="table" style="text-align: center">
            <thead>
            <tr>
                <th scope="col"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> اولویت</th>
                <th scope="col"><i class="fa fa-user" aria-hidden="true"></i> نام</th>
                <th scope="col"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> تاریخ ورود</th>
                <th scope="col"><i class="fa fa-address-book" aria-hidden="true"></i> شمار حساب</th>
            </tr>
            </thead>
            <tbody id="list">
            </tbody>
        </table>
        <button class="btn btn-success" onclick="window.print();return false;">چاپ</button>
    </div>
    </div>
</center></body>
<script>
    var loanlistdata = {!! json_encode($data) !!} ;
    loanlistnum=loanlistdata.length;
    var i=0;
    var text='';
    while (i<loanlistnum){
        text += '<tr class="trhover">'+
            '<th scope="row">'+(i+1)+'</th>'+
        '<td>'+loanlistdata[i]["name"]+'</td>'+
        '<td>'+loanlistdata[i]["date"]+'</td>'+
        '<td>'+loanlistdata[i]["account_id"]+'</td>'+
        '</tr>';
        i++;
        }
    document.getElementById('list').innerHTML=text;

</script>
<html>