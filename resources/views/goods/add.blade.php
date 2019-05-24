<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}" />
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="{{asset('img/coin02.png')}}" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加商品</span>
				</div>
				<div class="baBody">
                    <form action="{{url('goods/doadd')}}" method="post" enctype="multipart/form-data">
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
					<div class="bbD">
						商品名称：<input type="text" name="goods_name" class="input1" />
					</div>
					<div class="bbD">
						商品价格：<input type="text" name="goods_price" class="input1" />
					</div>
					<div class="bbD">
						商品图片：
						<div class="bbDd">
							<div class="bbDImg">+</div>
							<input type="file" class="file" name="goods_file"/> <a class="bbDDel" href="#">删除</a>
						</div>
					</div>
					<div class="bbD">
                        是否上架：  <label><input type="radio" value="1" name="is_salf" checked="checked" />是</label> 
                                   <label><input type="radio" value="2" name="is_salf" />否</label>
					</div>
					
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
                    </div>
                    </form>
				</div>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>