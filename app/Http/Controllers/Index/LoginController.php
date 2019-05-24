<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reg;
class LoginController extends Controller
{
    public function login()
    {
        return view('index/login');
    }


     //执行登陆
     public function dologin()
     {
        $reg_name=request()->reg_name;
       // dd($reg_name);
         $reg_pwd=request()->reg_pwd;
         $res=Reg::where('reg_name',$reg_name)->first();

         //dd($res);
         if($res['reg_name']==$reg_name){
            if($res['reg_pass']==$reg_pwd){
             //cookie::queue('reg_name',"$reg_name");
             echo json_encode(['font'=>'登陆成功','code'=>1]);die;
            }else{
             echo json_encode(['font'=>'密码错误','code'=>2]);die;
            }
         }else{
             echo json_encode(['font'=>'账号错误','code'=>2]);die;
         }
     }    
}
