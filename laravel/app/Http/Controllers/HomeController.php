<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Support\Facades\Hash;
use App\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Useraccount;
use App\User;
use App\Loan;
use App\Expense;
use App\Loanlist;
use App\Dailymassage;
use App\Massage;

class HomeController extends Controller
{
    
    public function index()
    {
        if(auth::check()){
            if(User::find(Auth::id())->admin == 1) {
                $data = $this->admin_data();
                $data['error']=0;
                $data['errortex']='';
                return view("admin")->with('data', $data);
            }
            else {
                $data = $this->user_data();
                return view("private")->with('data', $data);
            }
        }
        else {
            $data = $this->public_data();
            return view("public")->with('data',$data);
        }
    }

    public function public_data(){
        $output['loan'] =  Term::orderby('start')->select('majmoevam')->first()->majmoevam/1000000;
        $output['charity'] =  Term::orderby('start')->sum('kheirie')/1000000;
        $output['count'] = User::count('id');
        $output['text'] = Dailymassage::orderbydesc('time')->select('text')->first()->text;
        return $output;
    }

    private function user_data(){
        $account_id = Auth::id();
        $output ['name'] = User::find($account_id)->name;
        $user= Useraccount::where('user_id',$account_id)->select('account_id', 'value','loansum','loanleft','instalment')->first();
        $output['user_id']=$account_id;
        $output['account_id']=$user->account_id;
        $output['value']=$user->value;
        $output['loansum']=$user->loansum;
        $output['loanleft']=$user->loanleft;

        $output['instalmentsum']=$user->instalment;
        $output['loandata'] = Payment::where('account_id' , $user->account_id)->where('loan_id',"!=" , '0')->orderby('created_at')->limit(30)->get();
        for($i=0;$i < sizeof($output['loandata']);$i++ ) {
            $output['loandata'][$i]['date']=$this->gregorian_to_jalali(intval(substr($output['loandata'][$i]['created_at'], 0, 4)),
                intval(substr($output['loandata'][$i]['created_at'], 5, 2)),
                intval(substr($output['loandata'][$i]['created_at'], 8, 2)), '.');
        }
        $output['savingdata']=Payment::where('account_id' , $user->account_id)->where('loan_id' , '0')->orderby('created_at')->limit(30)->get();
        for($i=0;$i < sizeof($output['savingdata']);$i++ ) {
            $output['savingdata'][$i]['date']=$this->gregorian_to_jalali(intval(substr($output['savingdata'][$i]['created_at'], 0, 4)),
                intval(substr($output['savingdata'][$i]['created_at'], 5, 2)),
                intval(substr($output['savingdata'][$i]['created_at'], 8, 2)), '.');
        }
        $output['outbox']=Massage::where('user_id',$user->user_id)->where('to_admin',1)->orderby('created_at')->limit(10)->get();
        $output['inbox']=Massage::where('user_id',$user->user_id)->where('to_admin',0)->orderby('created_at')->limit(10)->get();
        return $output;
    }

    private function admin_data(){
        $output['outbox']=User::join('massages','users.id' ,'=' , 'massages.user_id')->where('to_admin',0)->orderbydesc('massages.created_at')->select('users.name','users.id','massages.title','massages.main','massages.read')->limit(10)->get();
        $output['inbox']=User::join('massages','users.id' ,'=' , 'massages.user_id')->where('to_admin',1)->orderbydesc('massages.created_at')->select('users.name','users.id','massages.title','massages.main','massages.read')->limit(10)->get();
        $output['term']=Term::orderbydesc('start')->limit(6)->get();
        $output['loandata']=Payment::join('useraccounts' , 'payments.account_id' ,'=' , 'useraccounts.account_id')
            ->join('users','users.id','=','useraccounts.user_id')
            ->select('payments.peyment_id','users.name','payments.created_at','payments.value','payments.pos','payments.balance')->
        where('term_id',$output['term'][0]['term_id'])->where('loan_id',"!=" , '0')->orderbydesc('created_at')->get();
        for($i=0;$i < sizeof($output['loandata']);$i++ ) {
            $output['loandata'][$i]['date']=$this->gregorian_to_jalali(intval(substr($output['loandata'][$i]['created_at'], 0, 4)),
                intval(substr($output['loandata'][$i]['created_at'], 5, 2)),
                intval(substr($output['loandata'][$i]['created_at'], 8, 2)), '.');
        }
        $output['savingdata']=Payment::join('useraccounts' , 'payments.account_id' ,'=' , 'useraccounts.account_id')
            ->join('users','users.id','=','useraccounts.user_id')
            ->select('payments.peyment_id','users.name','payments.created_at','payments.value','payments.pos','payments.balance')->
            where('term_id',$output['term'][0]['term_id'])->where('loan_id' , '0')->orderbydesc('created_at')->get();
        for($i=0;$i < sizeof($output['savingdata']);$i++ ) {
            $output['savingdata'][$i]['date']=$this->gregorian_to_jalali(intval(substr($output['savingdata'][$i]['created_at'], 0, 4)),
                intval(substr($output['savingdata'][$i]['created_at'], 5, 2)),
                intval(substr($output['savingdata'][$i]['created_at'], 8, 2)), '.');
        }
        $output['expencedata']=Expense::where('term_id',$output['term'][0]['term_id'])->orderbydesc('created_at')->get();
        for($i=0;$i < sizeof($output['expencedata']);$i++ ) {
            $output['expencedata'][$i]['date']=$this->gregorian_to_jalali(intval(substr($output['expencedata'][$i]['created_at'], 0, 4)),
                intval(substr($output['expencedata'][$i]['created_at'], 5, 2)),
                intval(substr($output['expencedata'][$i]['created_at'], 8, 2)), '.');
        }
        $output['cash']=$output['term'][0]['pasmande']-$output['term'][0]['mandevam']+$output['term'][0]['mandehazine'];
        return $output;
    }

    public function loanlist(){
        $data=$this->loanlistdata();

        return view('loanlist')->with('data',$data);
    }

    private function loanlistdata(){
        $a = \DB::table('loanlists')->join('useraccounts', function ($join)
            {
                $join->on('loanlists.account_id', '=', 'useraccounts.account_id');
            })->join('users', function ($join)
        {
            $join->on('useraccounts.user_id', '=', 'users.id');
        })->orderby('date')->limit(20)->select('name', 'date' , 'useraccounts.account_id')
            ->get();
        $a=json_decode($a, true);
        for($i=0;$i < sizeof($a);$i++ ) {
            $b = $a[$i]['date'];
            $a[$i]['date'] = $this->gregorian_to_jalali(intval(substr($b, 0, 4)),
                intval(substr($b, 5, 2)),
                intval(substr($b, 8, 2)), '.');
        }
        return $a;
    }

    public function insertmassage(Request $request){
        if(auth::check()) {
            $new = new Massage;
            $new->title = $request->input('title');
            $new->main = $request->input('main');
            $new->read=0;
            $user_id = Auth::id();
            $user = User::find($user_id);
            if($user['admin']) {
                $new->to_admin = 0;
                $new->user_id = $request->input('user_id');
            }
            else{
                $new->to_admin = 1;
                $new->user_id = $user_id;
            }
            $new->save();
            return redirect('home');
        }
    }

    public function readmassages(){
        if(auth::check()) {
            $user_id = Auth::id();
            $user = User::find($user_id);
            if($user['admin']) {
                Massage::where('to_admin','1')->where('read',0)->update(['read' => true]);
            }
            else{
                Massage::where('user_id',$user_id)->where('to_admin',0)->where('read','0')->update(['read' => true]);
                return 'aaa';
            }
        }
    }

    private function gregorian_to_jalali($gy, $gm, $gd, $mod='') {
        $g_d_m = array(0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
        $gy2 = ($gm > 2)? ($gy + 1) : $gy;
        $days = 355666 + (365 * $gy) + ((int)(($gy2 + 3) / 4)) - ((int)(($gy2 + 99) / 100)) + ((int)(($gy2 + 399) / 400)) + $gd + $g_d_m[$gm - 1];
        $jy = -1595 + (33 * ((int)($days / 12053)));
        $days %= 12053;
        $jy += 4 * ((int)($days / 1461));
        $days %= 1461;
        if ($days > 365) {
            $jy += (int)(($days - 1) / 365);
            $days = ($days - 1) % 365;
        }
        if ($days < 186) {
            $jm = 1 + (int)($days / 31);
            $jd = 1 + ($days % 31);
        } else{
            $jm = 7 + (int)(($days - 186) / 30);
            $jd = 1 + (($days - 186) % 30);
        }
        return ($mod == '')? array($jy, $jm, $jd) : $jy.$mod.$jm.$mod.$jd;
    }

    public function newterm(Request $request){
        if(auth::check()) {
            $user_id = Auth::id();
            $user = User::find($user_id);
            if($user['admin']) {
                Term::orderbydesc('start')->limit(1)->update(['finish' => now()]);
                $old = Term::orderbydesc('start')->limit(1)->first();
                $new=new Term;
                $new->name=$request->input('name');
                $new->mandehazine=$old['mandehazine'];
                $new->mandevam=$old['mandevam'];
                $new->majmoevam=$old['majmoevam'];
                $new->pasmande=$old['pasmande'];
                $new->start = now();
                $new->save();
            }
        }
        return redirect('home')->with("success","دوره ی جدید ایجاد شد.");
    }

    public function newuser(Request $request){
        if(auth::check()){
            if(User::find(Auth::id())->admin==1) {
                    $error=0;
                    $errortex='';
                if(User::where('email',$request->input('email'))->exists()){
                    $error=1;
                    $errortex.='شماره تلفن وارد شده در سیستم وجود دارد.'.'<br>';
                }
                if(Useraccount::where('account_id',$request->input('account_id'))->exists()){
                    $error=1;
                    $errortex.='شماره حساب وارد شده در سیستم وجود دارد.'.'<br>';
                }
                if($error==1){
                    $data = $this->admin_data();
                    $data['error']=1;
                    $data['errortex']=$errortex;
                    $data['success']=0;
                    $data['successtex']='';
                    return view("admin")->with('data', $data);
                }
                $nu = new user;
                $nu->admin=0;
                $nu->name=$request->input('name');
                $nu->password=Hash::make($request->input('password'));
                $nu->email=$request->input('email');
                $nu->save();
                $nu=User::where('email',$request->input('email'))->first();
                $na = new Useraccount;
                $na->user_id = $nu['id'];
                if($request->input('account_id') != '0000'){
                    $na->account_id=$request->input('account_id');
                }
                $na->save();
                $data = $this->admin_data();
                $data['error']=0;
                $data['errortex']='';
                $data['success']=1;
                $data['successtex']='کاربر جدید با موفقیت اضافه شد.';
                return view("admin")->with('data', $data);
            }
        }
        return redirect('home')->with("success","کاربر جدید ایجاد شد.");
    }

    public function searchusername(Request $request){
        if(auth::check()){
            if(User::find(Auth::id())->admin==1) {
                $name=$request->input('name');
                $ret = User::join('useraccounts','useraccounts.user_id','=','users.id')
                    ->where('users.name','like',"%$name%")
                    ->select('users.name' , 'useraccounts.account_id')->limit(10)->get();
                return $ret;
            }
        }
    }

    public function searchusernum(Request $request){
        if(auth::check()){
            if(User::find(Auth::id())->admin==1) {
                $num=$request->input('name');
                if($num <= 999) {
                    $ret = User::join('useraccounts', 'useraccounts.user_id', '=', 'users.id')
                        ->whereBetween('useraccounts.account_id', [$num*10, $num*10+9])
                        ->select('users.name', 'useraccounts.account_id')->get();
                }
                elseif($num < 9999) {
                    $ret = User::join('useraccounts', 'useraccounts.user_id', '=', 'users.id')
                        ->where('useraccounts.account_id', $num)
                        ->select('users.name', 'useraccounts.account_id')->get();
                }
                else{
                    $ret='';
                }
                return $ret;
            }
        }
    }

    public function adminuser($id){
        if(auth::check()) {
            if (User::find(Auth::id())->admin == 1) {
                $data = $this->adminuser_data($id);
                return view("adminuser")->with('data', $data);
            }
        }
    }

    private function adminuser_data($account_id){
        $user=User::join('useraccounts','useraccounts.user_id','=','users.id')
            ->where('account_id',$account_id)->first();
        $output['name']=$user['name'];
        $output['user_id']=$user['id'];
        $output['account_id']=$account_id;
        $output['value']=$user['value'];
        $output['loansum']=$user['loansum'];
        $output['loanleft']=$user['loanleft'];
        $output['instalmentsum']=$user['instalment'];
        $output['loandata']=Payment::where('account_id' , $account_id)->where('loan_id' , '1')->orderbydesc('created_at')->limit(30)->get();
        for($i=0;$i < sizeof($output['loandata']);$i++ ) {
            $output['loandata'][$i]['date']=$this->gregorian_to_jalali(intval(substr($output['loandata'][$i]['created_at'], 0, 4)),
                intval(substr($output['loandata'][$i]['created_at'], 5, 2)),
                intval(substr($output['loandata'][$i]['created_at'], 8, 2)), '.');
        }
        $output['savingdata']=Payment::where('account_id' , $account_id)->where('loan_id' , '0')->orderbydesc('created_at')->limit(30)->get();
        for($i=0;$i < sizeof($output['savingdata']);$i++ ) {
            $output['savingdata'][$i]['date']=$this->gregorian_to_jalali(intval(substr($output['savingdata'][$i]['created_at'], 0, 4)),
                intval(substr($output['savingdata'][$i]['created_at'], 5, 2)),
                intval(substr($output['savingdata'][$i]['created_at'], 8, 2)), '.');
        }
        return $output;
    }

    public function initialdata1(){
        return view("initialdata");
    }

    public function initialdata(Request $request){
        $nu=new User;
        $nu->admin=0;
        $nu->name=$request->input('name');
        $nu->password=Hash::make($request->input('password'));
        $nu->email=$request->input('phone');
        $nu->save();

        $nu=User::where('email',$request->input('phone'))->first();
        $na = new Useraccount;
        $na->user_id = $nu['id'];
        $na->account_id =$request->input('account_id');
        $na->value =$request->input('value');
        $na->loansum =$request->input('loansum');
        $na->loanleft =$request->input('loanleft');
        $na->instalment =$request->input('instalment');
        $na->created_at = now();
        $na->save();

        $np=new Payment;
        $np->account_id=$request->input('account_id');
        $np->loan_id=0;
        $np->term_id=1;
        $np->value=$request->input('value');
        $np->pos=1;
        $np->balance=$request->input('value');
        $np->created_at = now();
        $np->save();

        if($request->input('loanleft') >0) {
            $np = new Payment;
            $np->account_id = $request->input('account_id');
            $np->loan_id = 1;
            $np->term_id = 1;
            $np->value = $request->input('loanleft');
            $np->pos = 0;
            $np->balance = $request->input('loanleft');
            $np->created_at = now();
            $np->save();
        }

        $term=Term::where('term_id' , 1 )->first();
        Term::where('term_id' , 1 )->update(
            ['vam' => $term['vam']+$request->input('loanleft'),
            'mandevam' => $term['mandevam']+$request->input('loanleft'),
            'majmoevam' => $term['majmoevam']+$request->input('loansum'),
            'pasdaryafti' => $term['pasdaryafti']+$request->input('value'),
            'pasmande' => $term['pasmande']+$request->input('value')]
        );

        return view("success");
    }

    public function newpayment(Request $request){
        if(auth::check()) {
            if (User::find(Auth::id())->admin == 1) {
                $term = Term::orderbydesc('start')->first()->term_id;
                if ($request->input('pasandaz') != 0) {
                    if(is_null($request->input('pasandazneg'))) {
                        $queryResult = \DB::select('call newpasandazpos(?,?,?,?)', [
                            $request->input('pasandaz'),
                            $request->input('account_id'),
                            $term,
                            now()]);
                    }
                    else{
                        $queryResult = \DB::select('call newpasandazneg(?,?,?,?)', [
                            $request->input('pasandaz'),
                            $request->input('account_id'),
                            $term,
                            now()]);
                    }
                }
                if ($request->input('qest') != 0) {
                    $queryResult = \DB::select('call newqest(?,?,?,?)', [
                        $request->input('qest'),
                        $request->input('account_id'),
                        $term,
                        now()]);
                }
                return redirect('adminuser/'.$request->input('account_id'))->with("success","تراکنش با موفقیت ثبت شد.");
            }
        }
    }

    public function newloan(Request $request){
        if(auth::check()) {
            if (User::find(Auth::id())->admin == 1) {
                $term = Term::orderbydesc('start')->first()->term_id;
                        $queryResult = \DB::select('call newvam(?,?,?,?)', [
                            $request->input('vam'),
                            $request->input('account_id'),
                            $term,
                            now()]);
                return redirect('adminuser/'.$request->input('account_id'))->with("success","تراکنش با موفقیت ثبت شد.");
            }
        }
    }

    public function deletepayment(Request $request){
        if(auth::check()) {
            if (User::find(Auth::id())->admin == 1) {
                $queryResult = \DB::select('call deletepayment(?)', [$request->input('payment_id')]);
                if($request->input('page_id')==0){
                    return redirect('home')->with("success", "حذف پرداختی با موفقیت انجام شد.");
                }
                else{
                    return redirect('adminuser/'.$request->input('page_id'))->with("success", "حذف پرداختی با موفقیت انجام شد.");
                }
            }
        }
    }

    public function deleteexpence(Request $request){
        if(auth::check()) {
            if (User::find(Auth::id())->admin == 1) {
                $queryResult = \DB::select('call deleteexpence(?)', [$request->input('expence_id')]);
                return redirect('home')->with("success","حذف پرداختی با موفقیت انجام شد.");
            }
        }
    }
    
    public function newexpence(Request $request){
        if(auth::check()) {
            if (User::find(Auth::id())->admin == 1) {
                $term = Term::orderbydesc('start')->first()->term_id;
                $queryResult = \DB::select('call newexpence(?,?,?,?,?)', [
                    $request->input('value'),
                    $term,
                    now(),
                    $request->input('cat'),
                    $request->input('dis')]);
                return redirect('home')->with("success","تراکنش با موفقیت ثبت شد.");
            }
        }
    }
    
    public function dailymassage(Request $request){
        if(auth::check()) {
            if (User::find(Auth::id())->admin == 1) {
               $dm=new Dailymassage;
               $dm->text=$request->input('dis');
               $dm->save();
               return redirect('home')->with("success","پیام با موفقیت ثبت شد.");
            }
        }
    }
    
    public function changepassword(Request $request){
        if(auth::check()) {
            $user=User::find(Auth::id());
            if ($user->admin == 1) {
                User::find($request->input('user_id'))->update(['password' => Hash::make($request->input('password'))]);
                return redirect('adminuser/'.$request->input('account_id'))->with("success","رمزعبور با موفقیت تغییر کرد.");
            }
            else{
                if(Hash::check($request->input('oldpassword'), $user->password)){
                User::find($user->id)->update(['password' => Hash::make($request->input('password'))]);
                return redirect('/home')->with("success","رمزعبور با موفقیت تغییر کرد.");
                }
                else{
                    return redirect('/home')->with("error","رمز عبور وارد شده نادرست است");
                }
            }
        }
    }




}
