<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员注册-有点</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}" />
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body>

	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="{{asset('img/coin02.png')}}" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;会员注册
			</div>
		</div>
		<div class="page ">
        <meta name="csrf-token" content="{{ csrf_token() }}">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>管理员注册</span>
				</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
                @endif
				<div class="baBody">
					<div class="bbD">
						用户名：<input type="text" name="admin_name" id="admin_name" class="input3" />
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;密码：<input type="password" id="admin_pwd" name="admin_pwd" class="input3" />
                    </div>
                    
                    <div class="bbD">
					    确认密码：<input type="password" id="admin_pwd1" name="admin_pwd1" class="input3" />
					</div>
					<div class="bbD">
						<p class="bbDP">
                            <a class="btn_ok btn_yes" id="btn" href="#">提交</a> 
                            <a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
                
                </div>
			</div>

			<!-- 会员注册页面样式end -->
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
           var admin_name=$('#admin_name').val();
           var admin_pwd=$('#admin_pwd').val();
           var admin_pwd1=$('#admin_pwd1').val();
            // console.log(admin_name)
            // console.log(admin_pwd)
            // console.log(admin_pwd1)
        //进行判断
        // if(admin_name==""){
        //     alert('用户名不能为空');
        //     return false;
        // }
        // if(admin_pwd==""){
        //     alert('密码不能为空');
        //     return false;
        // }
        // if(admin_pwd!=admin_pwd1){
        //     alert('密码与确认密码不一致');
        //     return false;
        // }

        $.post(
            "{{url('/admin/doadd')}}",
            {admin_name:admin_name,admin_pwd:admin_pwd,admin_pwd1:admin_pwd1},
            function(msg){
                if(!msg==""){
                    alert('添加成功，即将跳转到展示');
                    location.href="{{url('/admin/list')}}";
                }
            }
        );
        return false;
        
        })
    })

    </script>