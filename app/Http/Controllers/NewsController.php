<?php

namespace App\Http\Controllers;
use App\Cate;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Validation\Rule;
class NewsController extends Controller
{
    public function list()
    {
        $data=request()->all();
       $where=[];

       if($data['news_name']??''){
           $where[]=['news_name','like',"%$data[news_name]%"];
       }
       if($data['cate_name']??''){
        $where['cate_name']=$data['cate_name'];
}
        $data=News::join('cate', 'cate.cate_id', '=', 'news.cate_id')->where($where)->paginate(2);
        return view('/news/list',['data'=>$data,'data'=>$data]);
    }


    public function add()
    {
        $data=Cate::get();
        return view('news/add',['data'=>$data]);
    }

    public function doadd()
    {
       $data=request()->input();
       if(request()->hasFile('news_file')){
        $res=$this->upload('news_file');
        //dd($res);
       if($res['code']){
        $data['news_file']=$res['imgurl'];
       }
   }
     
   request()->validate([
          'news_name'=>'required|unique:news',
          'news_zhongyao'=>'required',
          'news_salf'=>'required',
          'cate_id'=>'required',
                
   ],[
       'news_name.required'=>'名称不能为空',
       'news_name.unique'=>'名称已经拥有',
       'cate_id.required'=>'分类不能为空',
       'news_zhongyao'=>'重要选项不能为空',
       'news_salf'=>'是否上架必填',
   ]);
    
   $res=News::create($data);
      if($res){
          return redirect('/news/list');
      }
    }
    
    
    
    public function update()
    {
        $data=Cate::get();
        $news_id=request()->news_id;
        $res=News::where('news_id',$news_id)->first();
        return view('news/update',['data'=>$data,'res'=>$res]);
    }

    public function doupdate()
    {
        $data=request()->except(['_token']);
        if(request()->hasFile('news_file')){
            $res=$this->upload('news_file');
            $data['news_file']=$res['imgurl'];
        }
        // dd($data);
       
    request()->validate([
        'news_name' => [
            'required',
            Rule::unique('news')->ignore($data['news_id'],'news_id'),
            ],
            'news_zhongyao'=>'required',
            'news_salf'=>'required',
            'cate_id'=>'required',
                  
     ],[
         'news_name.required'=>'名称不能为空',
         'news_name.unique'=>'名称已经拥有',
         'cate_id.required'=>'分类不能为空',
         'news_zhongyao'=>'重要选项不能为空',
         'news_salf'=>'是否上架必填',
     ]);

        $res=News::where('news_id',$data['news_id'])->update($data);
        if($res){
            return redirect('/news/list');
        }
    }
    
    public function upload($file)
    {
        if(request()->file($file)->isValid()){
            $photo=request()->file($file);
            $data=$photo->store(date('Ymd'));
            return ['code'=>1,'imgurl'=>$data];
        } else{
            return ['code'=>2,'message'=>'失败'];
        }
    }
    public function del()
    {
        $news_id=request()->news_id;
        $res=News::where('news_id',$news_id)->delete();
        if($res){
            echo json_encode(['font'=>'删除成功','code'=>1]);
        }
    }
    public function unique()
    {
        $data=request()->news_name;
        $res=News::where('news_name',$data)->count();
        if($res){
            echo json_encode(['font'=>'用户名已经拥有','code'=>1]);
        }else{
            echo json_encode(['font'=>'可以使用','code'=>2]);
        }
    }


}
