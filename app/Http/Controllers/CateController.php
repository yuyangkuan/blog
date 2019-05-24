<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use DB;
class CateController extends Controller
{
    public function list()
    {
        echo "展示";
    }
    
    public function add()
    {
       $res=DB::table('create')->get()->toArray();
    //    if($res){
    //        $info = $this->getcateid($res);
    //    }
        return view('/cate/add',['res'=>$res]);
    }

    
    public function doadd()
    {
        $data=request()->except(['_token']);
        $res=DB::table('create')->insert($data);
        if($res){
            return redirect('/cate/add');
        }
    }
    public function getcateid($res,$p_id=0,$level=0)
    {
        if(!$res || !is_array($res)){
            return;
        }
        static $arr = [];
            foreach($res as $v){
                if($v->p_id == $p_id){
                     $arr[] = $v;
                     $this->getcateid($res,$v->cate_id,$level+1);
                }
            }
            return $arr;
    }
    


}
