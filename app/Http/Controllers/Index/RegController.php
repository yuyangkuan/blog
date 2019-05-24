<?php

namespace App\Http\Controllers\Index;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reg;
use Mail;
class RegController extends Controller
{
    
    //注册试图
    public function add()
    {
        return view('index/add');
    }

    //个人中心
    public function user()
    {
        return view('index/user');
    }
    
    //执行注册
    public function doadd()
    {
        $data=request()->input();
        $value = session('code');
        //dd($value);
        if($data['code']!=$value){
            echo json_encode(['font'=>'验证码错误','code'=>2]);die;
        }
        $data=request()->except('code');
        $res=Reg::create($data);
        if($res){
            request()->session()->forget('code');
            echo json_encode(['font'=>'恭喜你注册成功','code'=>1]);
        }
    }

    //手机号和短信
    public function code()
    {
        
        $code=rand(1000,9999);
        $reg_name=request()->reg_name;
        $res=Reg::where('reg_name',$reg_name)->count();
        //dd($res);
        if($res==1){
            echo json_encode(['font'=>'用户名已经拥有','code'=>2]);die;
        }else{
            if(strpos($reg_name,'@')==false){
                $res=$this->messing($reg_name,$code);
                echo json_encode(['font'=>'发送成功','code'=>1]);
            }else{
                $res=$this->send($reg_name,$code);
                echo json_encode(['font'=>'发送成功','code'=>1]);
            }
            session(['code'=>$code]);
        }
  
    }
    
    //手机号短信
    public function messing($reg_name,$code)
    {
        //dd($code);
        $host = "http://dingxin.market.alicloudapi.com";
        $path = "/dx/sendSms";
        $method = "POST";
        $appcode = "1b9504c48e4a4a248957af30c194df2a";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "mobile=$reg_name&param=code%3A$code&tpl_id=TP1711063";
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        dump(curl_exec($curl));
        
    }
    
    //邮箱
    public function send($email,$code){
        \Mail::raw("你的验证码为$code" ,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册于洋宽有限公司");
        //设置接收方
            $message->to($email);
           
        });
       
    }
}