 <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     @include('layouts.shop')
     <img src="/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="" method="post" class="reg-login">
     @csrf
      <h3>已经有账号了？点此<a class="orange" href="login.html">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" class="name" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList2"><input type="text" class="code" placeholder="输入短信验证码" /></div>
       <p><input type="button" value="获取验证码" id="code"></p>
       <div class="lrList"><input type="text" class="pass" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text" class="pass1" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="button" id="btn" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     <div class="height1"></div>
     @include('layouts.foot')
     <script>
   
        $('#code').click(function(){
            var reg_name=$('.name').val();
            if(reg_name==""){
                alert('请填入邮箱号或手机号');
                return false;
            }
            
            var res=/^[1][3,4,5,7,8][0-9]{9}$/;
		    var res1=/^\w{5,11}@qq.com$/;
            var flag=true;
            if(res.test(reg_name) || res1.test(reg_name)){
                //alert(111);
                    $.ajax({
                        type:'post',
                        url:"{{url('reg/code')}}",
                        data:{reg_name:reg_name},
                        dataType:'json',
                        success:function(msg){
                           alert(msg.font);
                        }
                    });
                     return false;
            }else{
                alert('请填写正确的手机号或者邮箱格式');
                flag=false;
            }
                
            if(flag==false){
                return false;
            }
            var code=$('.code').val();
            $.post(
                "{{url('/reg/code')}}",
                {reg_name:reg_name},
                function(msg){
                   if(msg.code==1){
                       alert('发送成功');
                   }
                }
            );
            return false;
        });
   
   $('#btn').click(function(){
            var reg_name=$('.name').val();
            var code=$('.code').val();
            var reg_pass=$('.pass').val();
            var pass1=$('.pass1').val();
            if(reg_name==""){
                alert('请填入邮箱号或手机号');
                return;
            }
            
            if(code==""){
                alert('验证码不能为空');
                return;
            }
            if(reg_pass==""){
                alert('密码不能为空');
                return;
            }
            var reg=/^\w{6,18}$/;
            if(!reg.test(reg_pass)){
                alert('设置密码（6-18位数字或字母）');
                return ;
            }

            if(pass1!=reg_pass){
                alert('确认密码请与密码一致');
                return;
            }
            
            $.post(
                "{{url('/reg/doadd')}}",
                {reg_name:reg_name,code:code,reg_pass:reg_pass},
                function(msg){
                    alert(msg.font);
                },'json'
            );
    
        })
     
  //return false;
     </script>
    