
<form align="center">
    <input type="text" name="n" placeholder="请输入关键名称">
    <input type="text" name="l" placeholder="请输入关键网址">
    <button>搜索</button>
</form>
<link rel="stylesheet" href="{{asset('css/page2.css')}}">
<table  align="center" cellspacing="0">
    <tr align="center" height="50" width="300">
        <td style="border:2px solid red">品牌id</td>
        <td style="border:2px solid red">品牌名称</td>
        <td style="border:2px solid red">品牌logo</td>
        <td style="border:2px solid red">品牌介绍</td>
        <td style="border:2px solid red">品牌网址</td>
        <td style="border:2px solid red">操作</td>
    </tr>
   
    @foreach($data as $v)
    <tr align="center" height="50" width="300" >
        <td style="border:1px solid red">{{$v->brand_id}}</td>
        <td style="border:1px solid red">{{$v->brand_name}}</td>
        <td style="border:1px solid red"><img src="{{config('app.img_url')}}{{$v->brand_logo}}" width="50"></td>
        <td style="border:1px solid red">{{$v->brand_desc}}</td>
        <td style="border:1px solid red">{{$v->brand_url}}</td>
        <td style="border:1px solid red">
        <a href="del?id={{$v->brand_id}}">删除</a>
        <a href="upd?brand_id={{$v->brand_id}}">修改</a>
        </td>
    </tr>
    @endforeach
    <tr>
<td colspan="6" align="center">{{$data->links()}}</td>
</tr>
</table>

