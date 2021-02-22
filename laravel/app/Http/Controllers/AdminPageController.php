<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminPageController extends Controller
{
    public function searchusernum($id){
        if(auth::check()){
            if(User::find(Auth::id())->admin==0) {
                $ret = DB::table('users')->where('id','like',"$id%")->select('name')->get();
                $i =1;
                $out[0]=0;
                foreach ($ret as $r) {
                    $out[0] = $i;
                    $out[$i] = $r->name;
                    $i++;
                }
                return $out;
            }
        }
    }

    public function searchusername($name){
        if(auth::check()){
            if(User::find(Auth::id())->admin==0) {
                $ret = DB::table('users')->where('name','like',"%$name%")->select('name')->get();
                $i =1;
                $out[0]=0;
                foreach ($ret as $r) {
                    $out[0] = $i;
                    $out[$i] = $r->name;
                    $i++;
                }
                return $out;
            }
        }
    }
}
