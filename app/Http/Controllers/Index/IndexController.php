<?php

namespace App\Http\Controllers\Index;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    //首页
    public function index()
    {
        $res=cookie::get('reg_name');
        // dd($res);
        $data=DB::table('goods')->get();
        return view('index/index',['data'=>$data]);
        // echo 34567;
    }

    public function proinfo()
    {
        $goods_id=request()->goods_id;
        $res=DB::table('goods')->where('goods_id',$goods_id)->first();
        //dd($res);

        return view('index/proinfo',['res'=>$res]);
    }



}
