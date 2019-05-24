@include('layouts.shop')
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员登陆</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="user.html" method="get" class="reg-login">
      <h3>还没有三级分销账号？点此<a class="orange" href="reg.html">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" class="reg_name" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList"><input type="text" class="reg_pwd" placeholder="输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="button" value="立即登录" id="btn" />
      </div>
     </form><!--reg-login/-->
     <div class="height1"></div>
     @include('layouts.foot')
     <script>
      $('#btn').click(function(){
        var reg_name=$('.reg_name').val();
        var reg_pwd=$('.reg_pwd').val();
        // console.log(reg_name);
        // console.log(reg_pwd);
        $.post(
          "{{url('dologin')}}",
          {reg_name:reg_name,reg_pwd:reg_pwd},
         
          function(msg){
            
           if(msg.code==1){
             alert(msg.font);
             location.href="{{url('/')}}";
           }else{
            alert(msg.font);
           }
          },'json'
        );
      });

     </script>