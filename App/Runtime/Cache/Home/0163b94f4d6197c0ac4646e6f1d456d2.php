<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        
<title>男性健康新闻频道_健康卫视</title>

        
<meta name="Keywords" content="男性健康，男性保健，男性疾病" />
<meta name="Description" content="健康卫视网男性健康新闻频道提供男性健康，男性保健，男性疾病，男性医院，男性疾病等新闻。" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
<link href="__PUBLIC__/css/home/html/global.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/home/html/content/style.css" rel="stylesheet" type="text/css" />

        <link href="__PUBLIC__/Css/home/common.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="__PUBLIC__/js/jquery1.10.2.js" ></script>
        <script type="text/javascript" src="__PUBLIC__/js/home/logined.js" ></script>
        
<!--[if IE 6]> <script src="__PUBLIC__/Js/home/html/DD_belatedPNG.js"></script> <script>DD_belatedPNG.fix('.png_bg'); </script> <![endif]-->

        
    </head>
    <body>
    
<!--头部代码-->
<div id="header"> 
  <!--头部顶部代码-->
    <link href="__PUBLIC__/css/home/html/content/logined.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/home/html/logined1.js" ></script>
<div id="top">
    <div class="top_content">
      <ul class="head_top_div_left">
        <li class="jkname"><a target="_blank" href="/" title="健康卫视网首页">健康卫视网首页</a></li>
        <li class="jkapp"><a target="_blank" href="/about/app.html" title="手机APP下载">手机APP下载 </a></li>
      </ul>
     <?php if(empty($user)): ?><ul class="head_top_div_right">

        <li><a target="_blank" href="/member/register.html" title="注册">注册</a></li>
        <li><a target="_blank" href="/member/login.html" title="登录">登录</a></li>
        <li><a target="_blank" href="http://e.t.qq.com/jkwshk" class="tent" title="腾讯微博"></a></li>
        <li><a target="_blank" href="http://weibo.com/u/2232993991" class="sina" title="新浪微博"></a></li>
        <li><a target="_blank" href="/live/" class="live" title="卫视直播"></a></li>
      </ul>
      <?php else: ?>
           <!--登录后开始 -->
               <ul class="head_top_div_right">
                <li class="topBar-user">
                <!--登录后状态开始 -->
                <div id="showmydiv">
                <a href="#" onmouseover="showDiv()" onmouseout="closeDiv1()"><?php echo ($user["username"]); ?>
              <img src="__PUBLIC__/Images/user_login-02.jpg" width="14" height="14" style=" position:absolute;  left:77px; top:12px; "/></a>
                </div>
                <!--登录后状态结束 -->
                <!-- 下拉用户信息开始 -->
                   <div class="userlogin-info" id="forumlist_menudiv" onmouseover="showDiv()" onmouseout="hideDiv()" style="display:none">
                   <div class="clear1"></div>
                   <div class="userlogin-info1">
                    <div class="topBar">
                      <div class="topBar-head_photo"> <img src=<?php if(($user["avatar"] == '0')): ?>__PUBLIC__/Default.jpg<?php else: echo ($user["avatar"]); endif; ?> width="38" height="38" /></div>
                      <div class="topBar-username"><?php echo (($user["nickname"])?($user["nickname"]):"还没昵称"); ?>... <img src="__PUBLIC__/Images/user_login-02.jpg" width="14" height="14"  /></div>
                      <div class="topBar-integral">积分：<?php echo ($user["credit"]); ?> </div>
                    </div>
                    <div class="bottomBar">
                       <ul>
                        <li><a href="/member/user.html">个人中心</a></li>
                        <li><a href="/member/index.html">播放记录</a></li>
                        <li><a href="#">我的收藏</a></li>
                        <li><a href="/member/doLogout.html">退出登录</a></li>
                       </ul>
                    </div>
                   </div>  
                   </div>  
                    <!-- 下拉用户信息结束 -->  
                        </li>
                        <li><a target="_blank" href="http://e.t.qq.com/jkwshk" class="tent" title="腾讯微博"></a></li>
                        <li><a target="_blank" href="http://weibo.com/u/2232993991" class="sina" title="新浪微博"></a></li>
                        <li><a target="_blank" href="/live/" class="live" title="卫视直播"></a></li>
                    </ul>
                    <!--登录后结束--><?php endif; ?>
    </div>
  </div>
  <!--头部顶部代码end--> 
  <!--栏目代码-->
  	<div id="nav">
  <div class="nav_content">
    <ul class="cf">
      <li class="threeli" style=" margin-left:0px;">生 命</li>
      <li>
        <p><a title="男性" href="/man/" target="_blank">男性</a><a title="女性" href="/woman/" target="_blank">女性</a><a  title="儿童" href="/Child/" target="_blank">儿童</a><a title="老人" href="/Old/" target="_blank">老人</a></p>
        <p><a title="疾病" href="/error/getHelp" target="_blank">疾病</a> <a title="慢病" href="/Chronicdis/" target="_blank">慢病</a><a title="心理" href="/error/getHelp" target="_blank">心理</a> <a title="医院"href="/Hospital/" target="_blank">医院</a></p>
      </li>
      <li class="threeli">生 态</li>
      <li class="ventm">
        <p><a title="本草纲目" href="/ben/index.html" target="_blank">本草纲目</a> <a title="健康全记录" target="_blank" href="/tv/TvList/cate/7.html">健康全记录</a><a title="茶缘天下" href="http://tea.jkwshk.tv/" target="_blank">茶缘天下</a></p>
        <p><a title="创意短片" href="/originality/" target="_blank">创意短片</a><a title="旅游"  target="_blank" href="/Travel/">旅游</a><a title="公益" href="/Commonweal/" target="_blank">公益</a><a title="环保科技" href="/Environment/" target="_blank">环保科技</a></p>
      </li>
      <li class="threeli">生 活</li>
      <li class="live">
        <p><a title="瑜伽" href="/tv/tvlist/cate/38.html" target="_blank">瑜伽</a><a title="美容" href="/Beautiful/" target="_blank">美容</a><a title="院士时间" href="/tv/TvList/cate/35.html" target="_blank">院士时间</a><a title="时尚" href="/Fashion/" target="_blank">时尚</a><a title="问诊" href="/ask/index.html" target="_blank">问诊</a></p>
        <p><a title="养生" href="/healthcare/" target="_blank">养生</a><a title="美食" href="/Delicacy/" target="_blank">美食</a><a title="营养师" href="/Dietitians/" target="_blank">营 养 师</a><a title="PK台"  href="/error/getHelp" target="_blank">PK 台</a><a title="综艺" alt="综艺" href="/tv/tvlist/cate/250.html" target="_blank">综艺</a></p>
      </li>
      <li class="threeli fourli">生生不息</li >
      <li class="noborder">
        <p><a title="健康要闻" href="/News/" target="_blank">健康要闻</a><a title="健康视点" href="/error/getHelp" target="_blank">健康视点</a><a title="健康的图" href="/Photo/" target="_blank">健康的图</a><a title="健康大事件" href="http://www.jkwshk.tv/event.html"  target="_blank">健康大事件</a></p>
        <p><a title="健康视频" href="/Video/" target="_blank">健康视频</a> <a title="健闻视频" href="/Newsvideo/" target="_blank">健闻视频</a><a title="卫视节目" href="/Tv/" target="_blank">卫视节目</a><a title="健康三色光" href="/ssg/" target="_blank">健康三色光</a></p>
      </li>
      <li class="threeli fiveli"><a href="/error/getHelp">卫视 主播</a></li >
    </ul>
  </div>
</div>

  <!--栏目代码end--> 
  <!---广告位1000X90--> 
    <!--<div class="adv1000X90"><a href="#" target="_blank"><img src="__PUBLIC__/Images/home/html/data/index_banner1.jpg" width="970" height="90" /></a></div> -->
  <!--大栏目代码-->
  <div id="subnav">
    <div class="subnavcontent">
      <div class="subnavlogo"><a href="#"><img src="__PUBLIC__/images/home/html/content/man_logo.png" width="152" height="58" /></a></div>
      <div class="subnavcate">
        <ul>
          <li><a href="__APP__/Man">首页</a></li>
          <li><a href="__APP__/Man/manlist/category/new.html"  class="clecka" target="_blank">资讯</a></li>
          <li><a href="__APP__/Man/manlist/category/pic" target="_blank">图片</a></li>
          <li><a href="__APP__/Man/manlist/category/video" target="_blank">视频</a></li>
          <li><a href="#" target="_blank">文字专题</a></li>
          <li><a href="__APP__/Man/manlist/category/videocat" target="_blank">视频专题</a></li>
        </ul>
      </div>
      <div class="search">
        <form name="sofrm" class="sofrm" method="get" action="/Seek/index" onSubmit="return rewrite_search()">
    <!--          <input name="mod" type="hidden" id="mod" value="search" />
              <input name="type" type="hidden" id="type" value="name" />-->
    <!--          <div id="selopt">
                <div id="cursel">全站</div>
                <ul id="options">
                  <li><a href="javascript: void(0);" name="name">全站</a></li>
                  <li><a href="javascript: void(0);" name="url">本栏</a></li>
                </ul>
              </div>-->
    <input name="keywords" class="seartext" type="text" onfocus="if (this.value == '搜吗？搜吧！')
                this.value = ''" onblur="if (this.value == '')
                            this.value = '搜吗？搜吧！';"  value="搜吗？搜吧！"/>
    <input name="submit" class="submit" type="submit"  value="搜健" />
</form>
      </div>
    </div>
    <div class="subnavline"></div>
  </div>
  <!--大栏目代码end--> 
</div>
<!--头部代码end--> 
<!---中间内容-->
<div id="main">
  <div class="leftsize">
  <h2 class="catesh2"><b><?php echo ($title); ?></b></h2>
  <ul class="cateslist">
  <?php if(is_array($manList)): $i = 0; $__LIST__ = $manList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><!--判断是什么种类1资讯，2、图片视频3、文字专辑和图片专辑-->
    <li class="clearfix">
    <div class="articleTitle">
    <h2>
    <a target="_blank" href="/news/view/id/<?php echo ($ml["id"]); ?>" style="font-size: 1.5em;"><?php echo ($ml["name"]); ?></a>
    </h2>
    </div>
    <p style="color: #888;">来源：<?php echo ($ml["source"]); ?>  | 发布时间：<?php echo (date('Y-m-d H:i:s',$ml["time"])); ?></p>
    <p style=" line-height:25px;"><a target="_blank" href="/news/view/id/<?php echo ($ml["id"]); ?>.html"  style="color: #666;"><?php echo ($ml["description"]); ?> </a></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
  <!--主内容结束-->
  </ul>
  <div id="page" class="page">
      <ul>
      <?php echo ($show); ?>
      </ul>
    </div>
  </div>
  <div class="rightsize">
    <div class="adv300X175"></div>
    <div class="order">
      <div class="ordertitle">
        <h2><span><a href="#"  class="clecksp">日点击</a><a href="#">周点击</a></span>热门资讯</h2>
      </div>
     <ul class="ordershow">
      <?php if(is_array($dayNews)): $i = 0; $__LIST__ = $dayNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dn): $mod = ($i % 2 );++$i;?><li><i><?php echo ($i); ?></i><a href="/news/view/id/<?php echo ($dn["newsid"]); ?>.html" target="_blank" title="<?php echo ($dn["title"]); ?>"><?php echo ($dn["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <ul  class="ordershow ordershowi" style=" display:none">
      <?php if(is_array($weekNews)): $i = 0; $__LIST__ = $weekNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wn): $mod = ($i % 2 );++$i;?><li><i><?php echo ($i); ?></i><a href="/news/view/id/<?php echo ($wn["newsid"]); ?>.html" target="_blank" title="<?php echo ($wn["title"]); ?>"><?php echo ($wn["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="adv300X250" ><a href="#" target="_blank"><img src="__PUBLIC__/Images/home/html/content/adv.jpg" width="300" height="250" longdesc="http://www.jkwshk.tv" /></a></div>

  </div>
  <div class="clear"></div>

</div>
<div class="clear"></div>
<!---广告位1000X90-->
<div class="adv1000X90" style="margin-top:20px;"><a href="#" target="_blank"><img src="__PUBLIC__/Images/home/html/data/index_banner1.jpg" width="970" height="90" /></a></div>
<!--底部代码开始-->
<!------底部------>
<div id="footer">
  <div id="footer_end">
    <div id="footer_econtent">
      <p style=" margin-bottom:20px;" ><a href="/"><img src="__PUBLIC__/Images/home/Dietitians/small_logo.png"  alt="健康卫视视频网站" style=" vertical-align:middle"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="#">关于我们</a> | <a target="_blank" href="#">联系我们</a> | <a href="/class.php?id=76" target="_blank" >广告服务</a> | <a href="/class.php?id=5" target="_blank">诚聘英才</a> | <a href="/view.php?id=104" target="_blank">保护隐私权</a> | <a href="/view.php?id=102" target="_blank" >免责条款</a> | <a href="/view.php?id=100" target="_blank">版权声明</a> | <a href="http://www.jkwshk.tv/view.php?id=1239" target="_blank">健康卫视开播大典</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/"><img src="__PUBLIC__/Images/home/Dietitians/small_logo_t.png" alt="健康卫视视频网站" style=" vertical-align:middle"  /></a></p>
      <br />
      <p>粤ICP备11075253号-1 <a href="permit.html" target="_blank">广播电视节目制作经营许可证：（粤）字第1001号</a></p>
      <br />
      <p>健康卫视  健康新媒体 版权所有</p>
      <br />
      <p>Copyright &copy; 2011-2014 Jkwshk.tv All Rights Reserved</p>
    </div>
  </div>
</div>
<!--底部代码结束--> 

<script src="__PUBLIC__/Js/home/html/jquery-1.9.1.min.js" type="text/javascript"></script> 
<script src="__PUBLIC__/Js/home/html/jquery.lazyload.js"></script> 
<script type="text/javascript" charset="utf-8">
      $(function() {
          $("img").lazyload();
      });
</script> 
<script type='text/javascript' src='__PUBLIC__/Js/home/html/Slideshow.js' charset='utf-8'></script> 
<script type="text/javascript"  src="__PUBLIC__/Js/home/html/health.js" ></script>

    </body>
</html>