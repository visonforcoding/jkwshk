<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        
<title>男性_男性健康第一中文视频网站_健康卫视</title>

        
<meta name="Keywords" content="男性健康，男性问题，男性保健，男性不育，男性疾病，男性生殖健康，男性健康视频" />
<meta name="Description" content="男性频道以男性健康视频为特色，为您提供男性健康视频、文字专题、图片专题等，
 让您全面了解男性保健，男性疾病，男性不育，男性问题等男性健康方面的知识，做最健康的男性。" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
<link href="__PUBLIC__/css/home/html/global.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/home/html/content/style.css" rel="stylesheet" type="text/css" />

        <link href="__PUBLIC__/Css/home/common.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="__PUBLIC__/js/jquery1.10.2.js" ></script>
        <script type="text/javascript" src="__PUBLIC__/js/home/logined.js" ></script>
        
<!--[if IE 6]> <script src="__PUBLIC__/js/home/html/DD_belatedPNG.js"></script> <script>DD_belatedPNG.fix('.png_bg'); </script> <![endif]-->

        
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
  <!--  <div class="adv1000X90"><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/data/index_banner1.jpg" width="970" height="90" /></a></div>--> 
  
  <!--大栏目代码-->
  <div id="subnav">
    <div class="subnavcontent">
      <div class="subnavlogo"><a href="#"><img src="__PUBLIC__/images/home/html/content/man_logo.png" width="152" height="58" /></a></div>
      <div class="subnavcate">
        <ul>
          <li><a href="__APP__/Man" class="clecka">首页</a></li>
          <li><a href="__APP__/Man/manlist/category/new.html" target="_blank">资讯</a></li>
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
<!--幻灯片代码-->
<div class="banner">
  <div id='tmpSlideshow'>
    <?php if(is_array($focus)): $k = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div id='tmpSlide-<?php echo ($k); ?>' class='tmpSlide'><a href="<?php echo ($v["link"]); ?>" target="_blank">
     <img src="<?php echo ($v["photo"]); ?>" width="700" height="340" alt="男士眼部护理常识" /></a>
      <div class='tmpSlideCopy'>
        <h4><a href="<?php echo ($v["link"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></h4>
        <p><?php echo ($v["info"]); ?>......</p>
      </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div id='tmpSlideshowControls'> 
      <!--<h4>控制器</h4>-->
      <?php if(is_array($focus)): $k = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class='tmpSlideshowControl' id='tmpSlideshowControl-<?php echo ($k); ?>'><span><?php echo ($k); ?></span></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
</div>
<!--幻灯片代码 end--> 

<!---中间内容-->
<div id="main">
  <div class="leftsize">
    <div class="recommend">
      <div class="retitle"></div>
      <ul>
      	<?php if(is_array($recommendVideo)): $i = 0; $__LIST__ = $recommendVideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rv): $mod = ($i % 2 );++$i;?><li> <a class='pictext'  href='__APP__/play/index/id/<?php echo ($rv["id"]); ?>.html' target='_blank'> <img src='__PUBLIC__/Images/home/html/grey.gif' data-original='<?php echo ($rv["photo"]); ?>' width='152' height='91'  title='<?php echo ($rv["title"]); ?>' alt='<?php echo ($rv["description"]); ?>'/> <span class='masktxt'>视频</span> <span class='play'></span> </a> <a  class='titletext'  href='#'><span><?php echo ($rv["title"]); ?></span></a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="leftnews">
      <h2 class="newstitle">
        <p><a href="__APP__/Man/news">男性健康<b>资讯</b></a></p>
      </h2>
      <div class="newscon">
        <div class="newsconimg">
          <p><img src='__PUBLIC__/Images/home/html/grey.gif' data-original='<?php echo ($picNews["litpic"]); ?>' width='322' height='197' /></p>
          <p><a href='__APP__/news/view/id/<?php echo ($picNews["id"]); ?>.html'><?php echo ($picNews["title"]); ?></a></p>
        </div>
        <dl>
        <?php if(is_array($newsList)): $i = 0; $__LIST__ = array_slice($newsList,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nl): $mod = ($i % 2 );++$i;?><dt><a href='__APP__/news/view/id/<?php echo ($nl["id"]); ?>.html' target='_blank'>[<?php echo ($nl["title"]); ?>]</a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($newsList)): $i = 0; $__LIST__ = array_slice($newsList,1,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nl): $mod = ($i % 2 );++$i;?><dd><a href='__APP__/news/view/id/<?php echo ($nl["id"]); ?>.html' target='_blank'>· <?php echo ($nl["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
        <dl>
        <?php if(is_array($newsList)): $i = 0; $__LIST__ = array_slice($newsList,4,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nl): $mod = ($i % 2 );++$i;?><dt><a href='__APP__/news/view/id/<?php echo ($nl["id"]); ?>.html' target='_blank'>[<?php echo ($nl["title"]); ?>]</a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($newsList)): $i = 0; $__LIST__ = array_slice($newsList,5,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nl): $mod = ($i % 2 );++$i;?><dd><a href='__APP__/news/view/id/<?php echo ($nl["id"]); ?>.html' target='_blank'>· <?php echo ($nl["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
    </div>
    <div class="leftpic">
      <h2 class="pictitle">
        <p><a href="#">男性健康<b>图片</b></a></p>
      </h2>
      <div class="piccon">
        <ul class="piclist">
        <?php if(is_array($picList)): $i = 0; $__LIST__ = array_slice($picList,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pl): $mod = ($i % 2 );++$i;?><li><a href='__APP__/photo/view/id/<?php echo ($pl["id"]); ?>.html' target='_blank'><img  src='__PUBLIC__/Images/home/html/grey.gif' data-original='<?php echo ($pl["topimg"]); ?>' width='204' height='140' class='lazy' /></a>
            <p><?php echo ($pl["name"]); ?></p>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($picList)): $i = 0; $__LIST__ = array_slice($picList,3,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pl): $mod = ($i % 2 );++$i;?><li><a href='__APP__/photo/view/id/<?php echo ($pl["id"]); ?>.html' target='_blank'><img src='__PUBLIC__/Images/home/html/grey.gif' data-original='<?php echo ($pl["topimg"]); ?>' width='150' height='102' class='lazy'  /></a>
            <p><?php echo ($pl["name"]); ?></p>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div class="leftvideo">
      <h2 class="videotitle">
        <p><a href="#">男性健康<b>视频</b></a></p>
      </h2>
      <div class="videocon">
        <ul class="videolist">
        <?php if(is_array($videoList)): $i = 0; $__LIST__ = $videoList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?><li><a href='/play/index/id/<?php echo ($vl["id"]); ?>.html' target='_blank' class='onetop'><img  src='__PUBLIC__/images/home/html/grey.gif' data-original='<?php echo ($vl["photo"]); ?>' width='204' height='123' />
           <span class='masktxt'>片长:<?php echo ($vl["videotime"]); ?></span><span class='play'></span></a>
            <p class='vtitle'><a href='/play/index/id/<?php echo ($vl["id"]); ?>.html' title="<?php echo ($vl["title"]); ?>"><?php echo ($vl["title"]); ?></a></p>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="rightsize">
    <div class="adv300X175"></div>
    <div class="order">
      <div class="ordertitle">
        <h2><span><a href="#"  class="clecksp">日点击</a><a href="#">周点击</a></span>热门资讯</h2>
      </div>
      <ul class="ordershow">
      <?php if(is_array($dayNews)): $i = 0; $__LIST__ = $dayNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dn): $mod = ($i % 2 );++$i;?><li><i><?php echo ($i); ?></i><a href='__APP__/news/view/id/<?php echo ($dn["newsid"]); ?>.html' target='_blank' title='<?php echo ($dn["title"]); ?>'><?php echo ($dn["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <ul  class='ordershow ordershowi' style=' display:none'>
      <?php if(is_array($weekNews)): $i = 0; $__LIST__ = $weekNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wn): $mod = ($i % 2 );++$i;?><li><i><?php echo ($i); ?></i><a href='__APP__/news/view/id<?php echo ($wn["newsid"]); ?>.html' target='_blank' title='<?php echo ($wn["title"]); ?>'><?php echo ($wn["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="adv300X250" ><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/content/adv.jpg" width="300" height="250" longdesc="http://www.jkwshk.tv" /></a></div>
    <div class="hotvideo">
      <div class="hotvideotitle">
        <h2>热门视频</h2>
      </div>
      <!--体育摄影幻影极限运动<em>点击:50</em>-->
      <ul class="hotvideolist">
      <?php if(is_array($hotVideo)): $i = 0; $__LIST__ = array_slice($hotVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hv): $mod = ($i % 2 );++$i;?><!--<li class='hotcleck' ><i><?php echo ($i); ?></i><a href='play/index/id/<?php echo ($hv["id"]); ?>' target='_blank' title='<?php echo ($hv["title"]); ?>'><img src='__PUBLIC__/images/home/html/<?php echo ($hv["photo"]); ?>' width='102' height='61' class='imgdis' /><?php echo ($hv["title"]); ?><em>点击:<?php echo ($hv["hits"]); ?></em></a></li>-->
      <li><i><?php echo ($i); ?></i><a href='/play/index/id/<?php echo ($hv["id"]); ?>.html' target='_blank' title='<?php echo ($hv["title"]); ?>'><?php echo (mb_substr($hv["title"],0,11,'utf-8')); ?>..<em>点击:<?php echo ($hv["hits"]); ?></em></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      <?php if(is_array($hotVideo)): $i = 0; $__LIST__ = array_slice($hotVideo,1,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hv): $mod = ($i % 2 );++$i;?><li><i><?php echo ($i+1); ?></i><a href='/play/index/id/<?php echo ($hv["id"]); ?>.html' target='_blank' title='<?php echo ($hv["title"]); ?>'><?php echo (mb_substr($hv["title"],0,11,'utf-8')); ?>..<em>点击:<?php echo ($hv["hits"]); ?></em></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="adv300X250" ><a href="#" target="_blank"></a></div>
  </div>
  <div class="clear"></div>
  <!---广告位1000X90-->
  <div class="adv1000X90" style=" margin-top:20px;"><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/data/index_banner1.jpg" width="970" height="90" /></a></div>
  <!---广告位1000X90-->
  <div class="leftsize">
<!--    <div class="leftwords">
      <h2 class="wordstitle">
        <p><a href="#">男性健康<b>文字专题</b></a></p>
      </h2>
      <div class="wordscon">
        <ul class="wordslist">
          <li><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/grey.gif" data-original="__PUBLIC__/images/home/html/content/w-1.jpg" width="151" height="146" /></a></li>
          <li><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/grey.gif" data-original="__PUBLIC__/images/home/html/content/w-1.jpg" width="151" height="146" /></a></li>
          <li><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/grey.gif" data-original="__PUBLIC__/images/home/html/content/w-1.jpg" width="151" height="146" /></a></li>
          <li><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/grey.gif" data-original="__PUBLIC__/images/home/html/content/w-1.jpg" width="151" height="146" /></a></li>
          <li><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/grey.gif" data-original="__PUBLIC__/images/home/html/content/w-1.jpg" width="151" height="146" /></a></li>
          <li><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/grey.gif" data-original="__PUBLIC__/images/home/html/content/w-1.jpg" width="151" height="146" /></a></li>
          <li><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/grey.gif" data-original="__PUBLIC__/images/home/html/content/w-1.jpg" width="151" height="146" /></a></li>
          <li><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/grey.gif" data-original="__PUBLIC__/images/home/html/content/w-1.jpg" width="151" height="146" /></a></li>
        </ul>
      </div>
    </div>-->
    <div class="leftvideo">
      <h2 class="videotitle">
        <p><a href="#">男性健康<b>视频专题</b></a></p>
      </h2>
      <div class="videocon videocons">
        <ul class="videolist videolists">
        <?php if(is_array($videoCatList)): $i = 0; $__LIST__ = array_slice($videoCatList,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href='/play/index/pid/<?php echo ($v["id"]); ?>.html' target='_blank' class='othertop'  title="<?php echo ($v["name"]); ?>"><img src='__PUBLIC__/images/home/html/grey.gif' alt='<?php echo ($v["name"]); ?>' data-original='<?php echo ($v["coverimage"]); ?>' width='144' height='170' /><span class='masktxt'><?php echo ($v["name"]); ?></span></a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
      <?php if(is_array($videoCatList)): $i = 0; $__LIST__ = array_slice($videoCatList,4,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href='/play/index/pid/<?php echo ($v["id"]); ?>.html' target='_blank' class='othertop'  title="<?php echo ($v["name"]); ?>"><img src='__PUBLIC__/images/home/html/grey.gif' alt='<?php echo ($v["name"]); ?>' data-original='<?php echo ($v["coverimage"]); ?>' width='144' height='170' /><span class="titeltxt"><?php echo ($v["name"]); ?></span></a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="rightsize">
    <div class="hotvideo" style="margin-bottom:17px;">
      <div class="hotvideotitle">
        <h2>热门图片<a href="__APP__/photo" class="more">更多</a></h2>
      </div>
      <!--体育摄影幻影极限运动<em>点击:50</em>-->
      <?php if(is_array($hotPic)): $i = 0; $__LIST__ = $hotPic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hp): $mod = ($i % 2 );++$i;?><dl class='righotpic'>
        <dt><a href='__APP__/photo/view/id/<?php echo ($hp["id"]); ?>.html' target='_blank' title='<?php echo ($hp["name"]); ?>'><img src='<?php echo ($hp["topimg"]); ?>' width='142'/></a></dt>
        <dd><a href='__APP__/photo/view/id/<?php echo ($hp["id"]); ?>.html' target='_blank' title='<?php echo ($hp["name"]); ?>'><?php echo ($hp["name"]); ?></a></dd>
      </dl><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="adv300X150"><a href="#" target="_blank"></a></div>
  </div>
</div>
<div class="clear"></div>
<!---广告位1000X90-->
<div class="adv1000X90" style="margin-top:20px;"><a href="#" target="_blank"><img src="__PUBLIC__/images/home/html/data/index_banner1.jpg" width="970" height="90" /></a></div>
<!--底部代码开始-->
<!--底部代码开始-->
<div id="footer">
  <div class="f_content">
    <div class="footer_index">
      <div class="f_i_r">
        <div class="f_i_r1">
        <h2><span>合作媒体</span></h2>
        <ul>
        <li> <a target="_blank"  href="http://v.163.com" title="网易视频" > <img src="__PUBLIC__/Images/home/index//upfile/20131021112825.png" width="130" height="50"  alt="网易视频" /> </a> </li>
        <li> <a target="_blank"  href="http://www.39.net/" title="39健康网" > <img src="__PUBLIC__/Images/home/index//upfile/20131101163523.png" width="130" height="50"  alt="39健康网" /> </a> </li>
        <li> <a target="_blank"  href="http://www.iqiyi.com" title="爱奇艺" > <img src="__PUBLIC__/Images/home/index//upfile/20131101180736.png" width="130" height="50"  alt="爱奇艺" /> </a> </li>
        <li> <a target="_blank"  href="http://v.qq.com/" title="腾讯视频" > <img src="__PUBLIC__/Images/home/index//upfile/20131226143537.png" width="130" height="50"  alt="腾讯视频" /> </a> </li>
        <li> <a target="_blank"  href="http://health.sina.com.cn/ " title="新浪健康 " > <img src="__PUBLIC__/Images/home/index//upfile/20131101163958.png" width="130" height="50"  alt="新浪健康 " /> </a> </li>
        <li> <a target="_blank"  href="http://health.qq.com/" title="腾讯健康" > <img src="__PUBLIC__/Images/home/index//upfile/20131101162913.png" width="130" height="50"  alt="腾讯健康" /> </a> </li>
        <li> <a target="_blank"  href="http://www.familydoctor.com.cn/" title="家庭医生在线" > <img src="__PUBLIC__/Images/home/index//upfile/20131101163127.png" width="130" height="50"  alt="家庭医生在线" /> </a> </li>
        <li> <a target="_blank" rel="nofollow" href="http://www.fengyunzhibo.com/" title="风云直播" > <img src="__PUBLIC__/Images/home/index//upfile/20131101161141.png" width="130" height="50"  alt="风云直播" /> </a> </li>
        <li> <a target="_blank"  href="http://www.wasu.cn/" title="华数TV" > <img src="__PUBLIC__/Images/home/index//upfile/20131101164404.png" width="130" height="50"  alt="华数TV" /> </a> </li>
        <li> <a target="_blank"  href="http://www.hntv9.cn/" title="河南9套" > <img src="__PUBLIC__/Images/home/index//upfile/20131101180659.png" width="130" height="50"  alt="河南9套" /> </a> </li>
        <li> <a target="_blank"  href="http://www.cntv.cn/" title="央视网" > <img src="__PUBLIC__/Images/home/index//upfile/20131101175451.png" width="130" height="50"  alt="央视网" /> </a> </li>
        </ul>
        </div>
        <div class="f_i_r2">
          <h2><span>友情链接</span></h2>
          <dl class="link_three">
            <dd><a href="javascript:void(0);" class="showsin">· 生命</a></dd>
            <dd><a href="javascript:void(0);">· 生态</a></dd>
            <dd><a href="javascript:void(0);">· 生活</a></dd>
          </dl>
          <ul class="showlink">
            <li><a target="_blank"  href="http://zl.39.net/" title="39诊疗频道"  >39诊疗频道</a></li>
            <li><a target="_blank"  href="http://zhishi.seedit.com" title="怀孕知识"  >怀孕知识</a></li>
            <li><a target="_blank"  href="http://v.pclady.com.cn/" title="PClady视频频道"  >PClady视频频道</a></li>
            <li><a target="_blank"  href="http://lohas.pclady.com.cn/" title="乐活"  >乐活</a></li>
            <li><a target="_blank"  href="http://health.pclady.com.cn/" title="女性健康"  >女性健康</a></li>
          </ul>
          <ul class="showlink" style=" display:none;">
            <li><a target="_blank"  href="http://www.12369.org/" title="中国环保大众网"  >中国环保大众网</a></li>
            <li><a target="_blank"  href="http://www.hjysh.cn/" title="环境与生活网"  >环境与生活网</a></li>
          </ul>
          <ul class="showlink" style=" display:none;">
            <li><a target="_blank"  href="http://fjportal.vcomlive.com/" title="数字家庭"  >数字家庭</a></li>
            <li><a target="_blank" rel="nofollow" href="http://www.kmtv.com.cn/" title="昆明广播电视"  >昆明广播电视</a></li>
            <li><a target="_blank"  href="http://www.sageamber.com/" title="琥珀"  >琥珀</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="footer_end">
    <div id="footer_econtent">
      <p style=" margin-bottom:20px;" ><a href="/">
              <img src="__PUBLIC__/Images/home/html/small_logo.png"  alt="健康卫视视频网站" style=" vertical-align:middle"  />
          </a>&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="/about/index.html">关于我们</a> | 
          <a target="_blank" href="/about/contact.html">联系我们</a> | 
          <a href="/about/advs.html" target="_blank" >广告服务</a> | 
          <a href="/about/job.html" target="_blank">诚聘英才</a> | 
          <a href="/view.php?id=104" target="_blank">保护隐私权</a> | 
          <a href="/view.php?id=102" target="_blank" >免责条款</a> | 
          <a href="/view.php?id=100" target="_blank">版权声明</a> | 
          <a href="http://www.jkwshk.tv/view.php?id=1239" target="_blank">健康卫视开播大典</a>&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="/"><img src="__PUBLIC__/Images/home/html/small_logo_t.png" alt="健康卫视视频网站" style=" vertical-align:middle"  /></a>
      </p>
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

<!--底部代码结束--> 

<script src="__PUBLIC__/js/jquery1.10.2.js" type="text/javascript"></script> 
<script src="__PUBLIC__/js/home/html/jquery.lazyload.js"></script> 
<script type="text/javascript" charset="utf-8">
      $(function() {
          $("img").lazyload();
      });
</script> 
<script type='text/javascript' src='__PUBLIC__/js/home/html/Slideshow.js' charset='utf-8'></script> 
<script type="text/javascript"  src="__PUBLIC__/js/home/html/health.js" ></script>

    </body>
</html>