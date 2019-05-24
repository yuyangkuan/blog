<form action="{{url('brand/doadd')}}" method="post" enctype="multipart/form-data">
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
<p>品牌名称：<input type="text" name="brand_name"></p>
<p>品牌logo：<input type="file" name="brand_logo"></p>
<p>品牌描述：<textarea name="brand_desc">
            </textarea></p>
<p>品牌网址：<input type="text" name="brand_url"></p>
<button>添加</button>
</form>