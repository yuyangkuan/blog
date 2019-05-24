
<form action="{{url('brand/doupd')}}" method="post">

@csrf
<p>品牌名称：<input type="text" name="brand_name" value="{{$v->brand_name}}"></p>
<p>品牌logo：<input type="file" name="brand_logo" value="{{$v->brand_logo}}"></p>
<p>品牌描述：<textarea name="brand_desc">{{$v->brand_desc}}
            </textarea></p>
<p>品牌网址：<input type="text" name="brand_url" value="{{$v->brand_url}}"></p>
    <input type="hidden" name="brand_id" value="{{$v->brand_id}}">
<button>修改</button>
</form>