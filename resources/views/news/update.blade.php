<form action="{{url('/news/doupdate')}}" method="post" enctype="multipart/form-data">
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
<p>文章标题：<input type="text" name="news_name" value="{{$res->news_name}}"></p>
<p>文章分类：<select name="cate_id">
            @foreach($data as $v)
            <option value="{{$v->cate_id}}" @if($res->cate_id==$v->cate_id) selected @endif>{{$v->cate_name}}</option>
            @endforeach
            </select></p>
<p>文章重要性：
            @if($res->news_zhongyao=="普通")
            <input type="radio"  name="news_zhongyao" value="普通" checked>普通
              <input type="radio"  value="置顶" name="news_zhongyao">置顶</p>
            @else
            <input type="radio"  name="news_zhongyao" value="普通" >普通
              <input type="radio"  value="置顶" name="news_zhongyao" checked>置顶</p>
            @endif

<p>是否显示：
            @if($res->news_salf=="√")
            <input type="radio" name="news_salf" value="√" checked>显示
            <input type="radio" name="news_salf" value="×">不显示</p>
            @else
            <input type="radio" name="news_salf" value="√">显示
            <input type="radio" name="news_salf" value="×" checked>不显示</p>
            @endif
<p>文章作者：<input type="text" name="news_man" value="{{$res->news_man}}"></p>
<p>作者email：<input type="text" name="news_email" value="{{$res->news_email}}"></p>
<p>关键字：<input type="text" name="news_guanjian" value="{{$res->news_guanjian}}"></p>
<p>网页描述：<textarea name="news_desc">{{$res->news_desc}}
            </textarea></p>
<p>文件：<input type="file" name="news_file">
    源文件：<img src="{{config('app.img_url')}}{{$res->news_file}}" width="100">
</p>
<input type="hidden" name="news_id" value="{{$res->news_id}}">
<button>修改</button>

</form>