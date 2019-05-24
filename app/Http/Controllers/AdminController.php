<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use DB;
class AdminController extends Controller
{
    public function list()
    {
        $data=Admin::get();
        return view('admin/list',['data'=>$data]);
    }
    public function add()
    {
        request()->session()->put('uid','66');
        return view('admin/add');
    }

    public function doadd()
    {
        $data=request()->all();
     
        $validate=request()->validate([
            'admin_name'=>'required',
            'admin_pwd'=>'required',
            'admin_pwd1'=>'required',
        ]);
       
        
    
        $res=Admin::create($data);
        if($res){
            echo json_encode(['font'=>'添加成功','code'=>1]);
        }
    }
}
