

function forgetpassword() {
    $("#loginmodal").modal("hide");
    $("#myModalpassword").modal("show");
}
function  feature(){
    alert("برای دریافت اطلاعات ورود خود با مدریت صندوق ارتباط برقرار کنید.");
}

window.onscroll = function() {myFunction()};

function myFunction() {
    if (document.body.scrollTop > 300) {
        setdata(0);
        setInterval(setdata(30),1200);
    }
}

function setdata(n){
    document.getElementById('member').innerText = parseInt(count / 30 *n);
    //document.getElementById('balance').innerText = parseInt(sum / 30 *n);
    document.getElementById('loan').innerText = parseInt(loan/ 30 *n);
    document.getElementById('charity').innerText = parseInt(charity / 30 *n);

    if( n<30 ){
        setTimeout(setdata , 40 , n+1)
    }
}