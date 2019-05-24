<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品分类-有点</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}" />
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;商品分类
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>商品分类</span>
				</div>
				<form action="{{url('cate/doadd')}}" method="post">
				@csrf
				<div class="baBody">
                   
                    <div class="bbD">
					    所属分类：<select name="p_id">
                        @foreach($res as $k=>$v)
                                <option value="{{$v->cate_id}}">{{str_repeat('|-',$v->level)}}{{$v->cate_name}}</option>
                         @endforeach
                                </select>
					</div>
                
                
                
                <div class="bbD">
					    分类名称：<input type="text" name="cate_name"  class="input3" />
					</div>
					<div class="bbD">
						分类等级：<input type="text" name="level" class="input3" />
                    </div>
                    
                    <div class="bbD">
                        是否显示：<input type="radio" value="是" name="cate_show"  />是
                                    <input type="radio" value="否" name="cate_show" />否
                    </div>
                   
                    <div class="bbD">
						是否在导航栏显示：<input type="radio" value="是" name="nav_show" />是
                                    <input type="radio" value="否" name="nav_show" />否
					</div>
				
					
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
				</form>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>