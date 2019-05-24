<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GoodsController extends Controller
{
    
    public function index(){
        
        $n=request()->n;
        $where=[];
        if($n){
            $where[]=['goods_name','like',"%$n%"];
        }
        
        $data=DB::table('goods')->where($where)->paginate(2);
        
        return view('/goods.list',['data'=>$data,'n'=>$n]);
    }

    public function add()
    {
       return view('/goods.add');
    }
    public function doadd()
    {
        $data=request()->except(['_token']);

         //第一种验证
        $validatedData = request()->validate([
            'goods_name' => 'required|unique:goods|max:10',
            'goods_price' => 'required',
            //'goods_file' => 'required',
            //'is_salf' => 'required',
        ],[
            'goods_name.required'=>'商品名不能为空',
            'goods_name.unique'=>'商品名已经拥有',
            'goods_name.max'=>'商品名最大长度为10',
            'goods_file.required'=>'商品图片不能为空',
            'goods_price.required'=>'商品价格不能为空',
            
        ]);
       if(request()->hasFile('goods_file')){
            $res=$this->upload('goods_file');
           if($res['code']){
            $data['goods_file']=$res['imgurl'];
           }
       }
       
       // dd($data);
       
        $res=DB::table('goods')->insert($data);
         if($res){
             return redirect('/goods/list');
         }
    }
    
    public function upload($file)
    {
        if( request()->file($file)->isValid() ){
            $photo=request()->file($file);
            $data=$photo->store(date('Ymd'));
            return ['code'=>1,'imgurl'=>$data];
        }else{
            return ['code'=>2,'message'=>'失败'];
        }
    }
    
    public function del()
    {
        echo "删除";
    }
}