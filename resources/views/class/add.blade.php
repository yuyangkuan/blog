<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员编辑-有点</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}" />
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="{{asset('img/coin02.png')}}" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;会员编辑
			</div>
		</div>
		<div class="page ">
        <meta name="csrf-token" content="{{ csrf_token() }}">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>会员编辑</span>
				</div>
				<div class="baBody">
					<form action="" id="form" entype="multipart/form-data">
                    <div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;头像：
						<div class="vipHead">
							<img src="{{asset('img/userPICS.png')}}" />
							<p class="vipP">更换头像</p>
							<input class="file1" type="file" name="class_file"  id="file"/>
						</div>
					</div>
					<div class="bbD">
						会员名称：<input type="text" name="class_name" id="name" class="input3" />
					</div>
					<div class="bbD">
						手机号码：<input type="tel" name="class_tel" id="tel" class="input3" />
					</div>
					
					<div class="bbD">
						所在城市：<input class="input3" name="class_in" id="in" type="text" />
					</div>
					
					<div class="bbD">
						介绍：
						<div class="btext">
							<textarea class="text1" name="class_content" id="content"></textarea>
						</div>
					</div>

					<div class="bbD">
						<p class="bbDP">
							
                            <input type="button" class="btn_ok btn_yes" value="提交" id="btn">
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
<script>
    $.ajaxSetup({
 headers: {
 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 }
});
    $(function(){
        $('#btn').click(function(){
           var class_file=$('#file').val();
           var class_name=$('#name').val();
           var class_tel=$('#tel').val();
           var class_in=$('#in').val();
           var class_content=$('#content').val();
          
            // console.log(class_file);
            // console.log(class_name);
            // console.log(class_tel);
            // console.log(class_in);
            // console.log(class_content);
        if(class_file==""){
            alert('请选择头像');
            return false;
        }
        
        if(class_name==""){
            alert('请输入昵称');
            return false;
        }
        if(class_tel==""){
            alert('请输入手机号');
            return false;
        }
        if(class_in==""){
            alert('请输入地址');
            return false;
        }
        if(class_content==""){
            alert('请输入介绍');
            return false;
        }
        $.post(
            "{{url('/class/doadd')}}",
            {class_file:class_file,class_name:class_name,class_tel:class_tel,class_in:class_in,class_content:class_content},
            function(msg){
                if(msg.code==1){
                    alert('添加成功确认转到展示。。。');
                    location.href="{{url('/class/list')}}";
                }
            },'json'
            
        );
        return false;
        
        
        
        
        
        });

    });

    </script>