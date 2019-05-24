<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>心愿管理-有点</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}" />
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="{{asset('img/coin02.png')}}" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">商品管理</a>&nbsp;-</span>&nbsp;商品管理
			</div>
		</div>

		<div class="page">
			<!-- wish页面样式 -->
			<div class="wish">
				<div class="conform">
					<form>
						<div class="cfD">
							时间：<input class="vinput" type="text" />&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
							<input class="vinput" type="text" /> <input class="addUser"
								type="text" name="n" placeholder="请输入关键字" />
							<button class="button">搜索</button>
						</div>
					</form>
				</div>
				<!-- wish 表格 显示 -->
				<link rel="stylesheet" href="{{asset('css/page.css')}}">
				<div class="wishShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">id</td>
							<td width="175px" class="tdColor">商品名称</td>
                           <td width="180px" class="tdColor">商品图片</td>
                            <td width="185px" class="tdColor">商品价格</td>
							<td width="175px" class="tdColor">是否上架</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
                        @foreach($data as $v)
                        <tr>
							<td>{{$v->goods_id}}</td>
                            <td>{{$v->goods_name}}</td>
                            <td><div class="onsImg wishImgv">
									<img src="{{config('app.img_url')}}{{$v->goods_file}}" width="50">
								</div></td>
							
							<td>{{$v->goods_price}}</td>
							<td>{{$v->is_salf}}</td>
							<td><img class="operation delban" src="{{asset('img/delete.png')}}"></td>
                        </tr>
                        @endforeach
												<tr>
												<td colspan="6">{{ $data->appends(['n'=>$n])->links()}}</td>
												</tr>
					</table>
					<div class="paging">此处是分页</div>
				</div>
				<!-- wish 表格 显示 end-->
			</div>
			<!-- wish页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="{{asset('img/shanchu.png')}}" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end
</script>
</html>