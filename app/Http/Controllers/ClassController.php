<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classa;
class ClassController extends Controller
{
    public function list()
    {
       $f=request()->f;
       $where=[];
       if($f){
           $where[]=['class_name','like',"%$f%"];
       }
        $res=Classa::where($where)->paginate(3);
        return view('/class/list',['res'=>$res,'f'=>$f]);
    }
    
    public function add()
    {
       return view('/class/add');
    }

    
    public function doadd()
    {
        $data=request()->all();
       
        if(request()->hasFile('class_file')){
            dd($request->hasFile('class_file'));
            $res= $this->upload('class_file');
            if($res['code']){
                $data['class_file']=$res['imgurl'];
            }else{
                return $res['message'];
            }
        }
        $res=Classa::create($data);
        if($res){
            echo json_encode(['font'=>"添加成功",'code'=>1]);
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

}
