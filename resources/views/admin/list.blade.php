<table border=1>
<tr>
    <td>id</td>
    <td>用户名</td>
    <td>操作</td>
</tr>
@foreach($data as $v)
<tr>
    <td>{{$v->admin_id}}</td>
    <td>{{$v->admin_name}}</td>
    <td><a href="javascript:;" id="del">删除</a></td>
</tr>
@endforeach

</table>