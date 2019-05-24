    @include('layouts.shop')
    <div class="head-top">
      <dl>
       <dt><a href="user.html"><img src="index/images/touxiang.jpg" /></a></dt>
       <dd>
        <h1 class="username">三级分销终身荣誉会员</h1>
        <ul>
         <li><a href="prolist.html"><strong>34</strong><p>全部商品</p></a></li>
         <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
      
       <img src="/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="#" method="get" class="search">
      <input type="text" class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
      <li><a href="/login/login">登录</a></li>
      <li><a href="/reg/add" class="rlbg">注册</a></li>
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
     <div id="sliderA" class="slider">
     @foreach($data as $v)
      <img src="{{config('app.img_url')}}{{$v->goods_file}}" />
      @endforeach
     </div><!--sliderA/-->
     <ul class="pronav">
      <li><a href="prolist.html">晋恩干红</a></li>
      <li><a href="prolist.html">万能手链</a></li>
      <li><a href="prolist.html">高级手镯</a></li>
      <li><a href="prolist.html">特异戒指</a></li>
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     @foreach($data as $v)
     <div class="index-pro1"  height="500">
      <div class="index-pro1-list">
       <dl goods_id="{{$v->goods_id}}">
        <dt><a href="/proinfo?goods_id={{$v->goods_id}}"><img src="{{config('app.img_url')}}{{$v->goods_file}}" width="200" /></a></dt>
        <dd class="ip-text"><a href="proinfo.html">{{$v->goods_name}}</a><span>已售：488</span></dd>
        <dd class="ip-price"><strong>¥{{$v->goods_price}}</strong> <span>¥{{$v->goods_price}}</span></dd>
       </dl>
      </div>
      @endforeach
      
     <div class="joins"><a href="fenxiao.html"><img src="index/images/jrwm.jpg" /></a></div>
     <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>
     
     <div class="height1"></div>
    @include('layouts.foot')