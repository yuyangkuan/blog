
<form>
<input type="text" name="news_name">
<input type="text" name="cate_name">
<button>搜索</button>
</form>
<link rel="stylesheet" href="{{asset('css/page2.css')}}">
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<table border="1" width="600" height="50">
<tr>
    <td>编号</td>
    <td>文章标题</td>
    <td>文章分类</td>
    <td>文章重要性</td>
    <td>是否显示</td>
    <td>添加日期</td>
    <td>操作</td>
</tr>
@foreach($data as $v)
<tr news_id="{{$v->news_id}}">
    <td>{{$v->news_id}}</td>
    <td>{{$v->news_name}}</td>
    <td>{{$v->cate_name}}</td>
    <td>{{$v->news_zhongyao}}</td>
    <td>{{$v->news_salf}}</td>
    <td>{{$v->created_at}}</td>
    <td><a href="update?news_id={{$v->news_id}}">修改</a>
        <a href="javascript:;" class="del">删除</a>
    </td>
</tr>
@endforeach
<tr>
<td colspan="7" align="center">{{$data->appends(['data'=>$data])->links()}}</td>
</tr>
</table>
<script>
$.ajaxSetup({
 headers: {
 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 }
});
    $('.del').click(function(){
        var _this=$(this);
        var news_id=_this.parents('tr').attr('news_id');
        $.post(
            "{{url('/news/del')}}",
            {news_id:news_id},
            function(msg){
                if(msg.code==1){
                    alert('删除成功');
                    location.href="{{url('/news/list')}}";
                }
            },'json'
        );
    
    });


</script>