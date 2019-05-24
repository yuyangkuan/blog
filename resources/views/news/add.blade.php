<form action="{{url('/news/doadd')}}" method="post" enctype="multipart/form-data">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

@if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif
@csrf
<p>文章标题：<input type="text" name="news_name" id="name"></p>
<p>文章分类：<select name="cate_id" >
            @foreach($data as $v)
            <option class="cate" value="{{$v->cate_id}}">{{$v->cate_name}}</option>
            @endforeach
            </select></p>
<p>文章重要性：<input type="radio" name="news_zhongyao" class="zhongyao" value="普通">普通<input type="radio" class="zhongyao" value="置顶" name="news_zhongyao">置顶</p>
<p>是否显示：<input type="radio" name="news_salf" value="√" class="salf">显示<input type="radio" name="news_salf" class="salf" value="×">不显示</p>
<p>文章作者：<input type="text" name="news_man"></p>
<p>作者email：<input type="text" name="news_email"></p>
<p>关键字：<input type="text" name="news_guanjian"></p>
<p>网页描述：<textarea name="news_desc">
            </textarea></p>
<p>文件：<input type="file" name="news_file"></p>
<input type="submit" id="btn" value="提交">


</form>

<script>
$.ajaxSetup({
 headers: {
 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 }
});

    $('#btn').click(function(){
        var news_name=$('#name').val();
        var news_salf=$('.salf:checked').val();
        var news_zhongyao=$('.zhongyao:checked').val();
        var cate_id=$('.cate:selected').val();
        console.log(cate_id);
        
        if(news_name==""){
            alert('标题不能为空');
            return false;
        }
        
        var reg=/^\u4e00-\u9fa5\w$/;
        if(reg.test(news_name)){
            alert('标题不能为数字，字母，下划线');
            return false;
        }
        
        if(cate_id==""){
            alert('分类不能为空');
            return false;
        }
        
        if(news_zhongyao!="普通"&& news_zhongyao!="置顶"){
            alert('请选择重要性');
            return false;
        }
        
        if(news_salf!="√"&& news_salf!="×"){
            alert('请选择是否显示');
            return false;
        }
        var flag=true;
        $.ajax({
            type:'post',
            url:"/news/unique",
            data:{news_name:news_name},
            dataType:'json',
            async:false,
            success:function(msg){
                if(msg.code==1){
                    alert(msg.font);
                    flag=false;
                }
            }
           
        }); 
        if(flag==false){
            return false;
        }
        //
    });

</script>