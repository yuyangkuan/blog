<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ListController extends Controller
{
    
    //商品展示
    public function list()
    {
        $res=DB::table('goods')->get();
        // dd($res);
        return view('/list/list',['res'=>$res]);
    }
}