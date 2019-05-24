<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>三级分销</title>
    <link rel="shortcut icon" href="/index/images/favicon.ico" />
    
    <!-- Bootstrap -->
    <link href="/index/css/bootstrap.min.css" rel="stylesheet">
    <link href="/index/css/style.css" rel="stylesheet">
    <link href="/index/css/response.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond./index/js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
      <img src="{{config('app.img_url')}}{{$res->goods_file}}" />
      <img src="{{config('app.img_url')}}{{$res->goods_file}}" />
      <img src="{{config('app.img_url')}}{{$res->goods_file}}" />
      <img src="{{config('app.img_url')}}{{$res->goods_file}}" />
      <img src="{{config('app.img_url')}}{{$res->goods_file}}" />
     </div><!--sliderA/-->
     <table class="jia-len">
      <tr>
       <th><strong class="orange">价格：{{$res->goods_price}}</strong></th>
       <td>
        <input type="text" class="spinnerExample" id="btn" />
       </td>
      </tr>
      <tr>
       <td>
        <strong>{{$res->goods_name}}</strong>
        <p class="hui">{{$res->goods_name}}</p>
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
     </table>
     <div class="height2"></div>
     <h3 class="proTitle">商品规格</h3>
     <ul class="guige">
      <li class="guigeCur"><a href="javascript:;">50ML</a></li>
      <li><a href="javascript:;">100ML</a></li>
      <li><a href="javascript:;">150ML</a></li>
      <li><a href="javascript:;">200ML</a></li>
      <li><a href="javascript:;">300ML</a></li>
      <div class="clearfix"></div>
     </ul><!--guige/-->
     <div class="height2"></div>
     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>
      <a href="javascript:;" style="background:none;">商品评论</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      <img src="{{config('app.img_url')}}{{$res->goods_file}}" width="500" height="522" />
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息....
     </div><!--proinfoList/-->
     <div class="proinfoList">
      <hr>这件商品真棒  下次还来你家买           2019/5/20    15:39</hr>
      <hr>好棒                                   2019/5/20    15:42</hr>
      <hr>蚂蚁牙一贝卡贝阿里阿拉蕾               2019/5/20    15:50</hr>
      <hr>是谁是谁不想睡阿里阿拉蕾               2019/5/20    15:55</hr>
      <hr>你是我的小宝贝                         2019/5/20    15:57</hr>
      <hr></hr>
     </div><!--proinfoList/-->
     <table class="jrgwc">
      <tr>
       <th>
        <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><a href="car.html">加入购物车</a></td>
      </tr>
     </table>
    <form action="" method="post">
     <p>用户名：匿名用户</p>
     <p>邮箱：<input type="text" name='email'></p>
     <p>评价等级：<input type="radio" name="grade" value="grade" value="1">1级&nbsp;&nbsp;
                  <input type="radio" name="grade" value="grade" value="2">2级&nbsp;&nbsp;
                  <input type="radio" name="grade" value="grade" value="3">3级&nbsp;&nbsp;
                  <input type="radio" name="grade" value="grade" value="4">4级&nbsp;&nbsp;
                  <input type="radio" name="grade" value="grade" value="5">5级
     </p>
     <p>评论内容：<textarea name="content" class="content"></textarea></p>
     <button>提交评论</button>
    </form>

    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/index/js/bootstrap.min.js"></script>
    <script src="/index/js/style.js"></script>
    <!--焦点轮换-->
    <script src="/index/js/jquery.excoloSlider.js"></script>
    <script>
		$(function () {
		 $("#sliderA").excoloSlider();
		});
	</script>
    $('#btn').click(function(){
        alert(123);
    });
    <script src="/index/js/jquery.spinner.js"></script>
   <script>
	$('.spinnerExample').spinner({});
	</script>
  </body>
</html>