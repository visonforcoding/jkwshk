<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        
<title>健康要闻_全球领先中文健康资讯网站_健康卫视</title>
<block name='seo'>
<meta name="keywords" content="健康新闻，食品安全，医疗卫生曝光，健康养生新知，健康热点，国际健康资讯，大健康资讯" />
<meta name="description" content="健康卫视网健康要闻频道网罗全球健康资讯，包含：食品安全、权威发布、国际健康资讯、健康新知、健康产业动态、医疗事故、健康百态、慈善公益新闻，以及微博、论坛里网友的健康知识分享等健康资讯和讯息。" />

        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
<link href="__PUBLIC__/Css/home/global.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Css/home/style.css" rel="stylesheet" type="text/css" />

        <link href="__PUBLIC__/Css/home/common.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="__PUBLIC__/js/jquery1.10.2.js" ></script>
        <script type="text/javascript" src="__PUBLIC__/js/home/logined.js" ></script>
        
        
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
  <!---广告位980X90--> 
  <!--<div class="adv980X90"><a href="#" target="_blank"><img src="__PUBLIC__/Images/home/data/index_banner1.jpg" width="970" height="90" /></a></div>--> 
  
  <!--大栏目代码-->
  <div class="subnav">
    <div class="subnavcontent">
      <div class="subnavlogo"><a href="#"><img src="__PUBLIC__/Images/home/logo_v2.png" width="276" height="46" /></a></div>
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
  </div>
  
  <!--大栏目代码end--> 
  
</div>
<!--头部代码end--> 

<!--中间代码开始-->
<div class="main">
  <ul class="navlist">
    <li><a class="select" href="/news.html">首页</a></li>
    <li><a href="/news/category/cid/<?php echo ($authorCatId); ?>.html">权威发布</a></li>
    <li><a href="/news/category/cid/<?php echo ($exposeCatId); ?>.html">曝光</a></li>
    <li><a href="/news/category/cid/<?php echo ($lovCatId); ?>.html">外媒</a></li>
    <li><a href="/news/category/cid/<?php echo ($xinzhiCatId); ?>.html">健康新知</a></li>
    <li><a href="/news/category/cid/<?php echo ($baitaiCatId); ?>.html">健康百态</a></li>
    <li><a href="/news/category/cid/<?php echo ($weiboCatId); ?>.html">微博健闻</a></li>
    <li><a href="/news/category/cid/<?php echo ($wangyouCatId); ?>.html">网友健闻</a></li>
    <li><a href="/news/category/cid/<?php echo ($gongyiCatId); ?>.html">公益</a></li>
    <li><a href="/news/category/cid/<?php echo ($chanyeCatId); ?>.html">产业动态</a></li>
    <li><a href="/news/category/cid/<?php echo ($hospitalCatId); ?>.html">医院新闻</a></li>
  </ul>
  <div class="banner">
    <div class="focus" id="focus1">
      <ul>
        <?php if(is_array($picNews)): $i = 0; $__LIST__ = $picNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
            <h2><a target="_blank"  href="/news/view/id/<?php echo ($v["id"]); ?>.html" ><img src="<?php echo ($v["litpic"]); ?>"  alt="<?php echo ($v["title"]); ?> " height="370" width="620" /></a></h2>
            <div class="slideother">
              <div class="h12"><a target="_blank"  href="/news/view/id/<?php echo ($v["id"]); ?>.html" >"<?php echo ($v["title"]); ?></a></div>
            </div>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="r_topnews">
      <?php if(is_array($timeNews)): $i = 0; $__LIST__ = array_slice($timeNews,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if(($mod) == "0"): ?><h2><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank"><?php echo ($v["title"]); ?></a></h2><?php endif; ?>
        <?php if(($mod) == "1"): ?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank">· <?php echo ($v["title"]); ?></a></p><?php endif; endforeach; endif; else: echo "" ;endif; ?>
      <dl>
        <?php if(is_array($timeNews)): $i = 0; $__LIST__ = array_slice($timeNews,6,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dt><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank"><?php echo ($v["title"]); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($timeNews)): $i = 0; $__LIST__ = array_slice($timeNews,7,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank">· <?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
      </dl>
    </div>
  </div>
  <div class="v_content">
    <div class="gnewslist">
      <h2><a href="/news/category/cid/40.html" target="_blank" class="fr">更多></a><span class="gntitle gn1">权威发布</span></h2>
      <p class="twopic">
        <?php if(is_array($authorPicNews)): $i = 0; $__LIST__ = $authorPicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><img src="<?php echo ($v["litpic"]); ?>" alt="<?php echo ($v["title"]); ?>" width="180" height="107"/><span class="sbg"></span><span title="<?php echo ($v["title"]); ?>"><?php echo (mb_substr($v["title"],0,13,"utf-8")); ?>...</span></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </p>
      <div class="list">
        <?php if(is_array($authoriNews)): $i = 0; $__LIST__ = array_slice($authoriNews,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
        <ul>
          <?php if(is_array($authoriNews)): $i = 0; $__LIST__ = array_slice($authoriNews,3,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div class="gnewslist">
      <h2><a href="/news/category/cid/41.html" target="_blank" class="fr">更多></a><span class="gntitle gn2">曝光</span></h2>
      <p class="twopic">
        <?php if(is_array($exposePicNews)): $i = 0; $__LIST__ = $exposePicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><img src="<?php echo ($v["litpic"]); ?>" alt="<?php echo ($v["title"]); ?>" width="180" height="107"/><span class="sbg"></span><span title="<?php echo ($v["title"]); ?>"><?php echo (mb_substr($v["title"],0,13,"utf-8")); ?>...</span></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </p>
      <div class="list">
        <?php if(is_array($exposeNews)): $i = 0; $__LIST__ = array_slice($exposeNews,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
        <ul>
          <?php if(is_array($exposeNews)): $i = 0; $__LIST__ = array_slice($exposeNews,3,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div class="gnewslist">
      <h2><a href="/news/category/cid/43.html" target="_blank" class="fr">更多></a><span class="gntitle gn3">外媒</span></h2>
      <p class="twopic">
        <?php if(is_array($lovPicNews)): $i = 0; $__LIST__ = $lovPicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><img src="<?php echo ($v["litpic"]); ?>" alt="<?php echo ($v["title"]); ?>" width="180" height="107"/><span class="sbg"></span><span title="<?php echo ($v["title"]); ?>"><?php echo (mb_substr($v["title"],0,13,"utf-8")); ?>...</span></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </p>
      <div class="list">
        <?php if(is_array($lovNews)): $i = 0; $__LIST__ = array_slice($lovNews,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
        <ul>
          <?php if(is_array($lovNews)): $i = 0; $__LIST__ = array_slice($lovNews,3,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div class="gnewslist">
      <h2><a href="/news/category/cid/42.html" target="_blank" class="fr">更多></a><span class="gntitle gn4">健康新知</span></h2>
      <p class="twopic">
        <?php if(is_array($xinzhiPicNews)): $i = 0; $__LIST__ = $xinzhiPicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><img src="<?php echo ($v["litpic"]); ?>" alt="<?php echo ($v["title"]); ?>" width="180" height="107"/><span class="sbg"></span><span title="<?php echo ($v["title"]); ?>"><?php echo (mb_substr($v["title"],0,13,"utf-8")); ?>...</span></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </p>
      <div class="list">
        <?php if(is_array($xinzhiNews)): $i = 0; $__LIST__ = array_slice($xinzhiNews,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html"  title="<?php echo ($v["title"]); ?>"target="_blank"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
        <ul>
          <?php if(is_array($xinzhiNews)): $i = 0; $__LIST__ = array_slice($xinzhiNews,3,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="v_right">
    <div class="hotword">
      <h2>新闻热搜词</h2>
      <p><a href="#" class="a1">东莞查封涉黄娱乐场所</a><a href="#">扶不扶真人版</a><a href="#"  class="a2">土豪自挖酒窖</a><a href="#"  class="a1">来自星星的你秀智</a><a href="#" class="a2">世界社会主义</a><a href="#">北影招生报考</a><a href="#"   class="a1">李思思私照</a><a href="#">面包鞋底成分</a><a href="#">土豪春晚</a> </p>
    </div>
    <div class="hotnews">
      <h2><b>热度排行</b></h2>
      <ul>
        <?php if(is_array($hotNews)): $k = 0; $__LIST__ = $hotNews;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li><i><?php echo ($k); ?></i><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
      </ul>
    </div>
    <div class="adv335X180"></div>
    <div class="pic">
      <h2><b>热门图片</b></h2>
      <ul>
        <?php if(is_array($hotPic)): $i = 0; $__LIST__ = array_slice($hotPic,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/photo/view/id/<?php echo ($v["id"]); ?>.html"><img src="<?php echo ($v["topimg"]); ?>" title="<?php echo ($v["name"]); ?>" width="146" height="100" /></a><span class="span_title"><a title="<?php echo ($v["name"]); ?>" href="/photo/view/id/<?php echo ($v["id"]); ?>.html"><?php echo ($v["name"]); ?></a></span> </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
  <div class="adv980X90"></div>
  <div class="v_content">
    <div class="gnewslist">
      <h2><a href="/news/category/cid/49.html" target="_blank" class="fr">更多></a><span class="gntitle gn5">健康百态</span></h2>
      <p class="twopic">
        <?php if(is_array($baitaiPicNews)): $i = 0; $__LIST__ = $baitaiPicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><img src="<?php echo ($v["litpic"]); ?>" alt="<?php echo ($v["title"]); ?>" width="180" height="107"/><span class="sbg"></span><span title="<?php echo ($v["title"]); ?>"><?php echo (mb_substr($v["title"],0,13,"utf-8")); ?>...</span></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </p>
      <div class="list">
        <?php if(is_array($baitaiNews)): $i = 0; $__LIST__ = array_slice($baitaiNews,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
        <ul>
          <?php if(is_array($baitaiNews)): $i = 0; $__LIST__ = array_slice($baitaiNews,3,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div class="gnewslist">
      <h2><a href="/news/category/cid/44.html" target="_blank" class="fr">更多></a><span class="gntitle gn6">微博健闻</span></h2>
      <p class="twopic">
        <?php if(is_array($weiboPicNews)): $i = 0; $__LIST__ = $weiboPicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><img src="<?php echo ($v["litpic"]); ?>" alt="<?php echo ($v["title"]); ?>" width="180" height="107"/><span class="sbg"></span><span title="<?php echo ($v["title"]); ?>"><?php echo (mb_substr($v["title"],0,13,"utf-8")); ?>...</span></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </p>
      <div class="list">
        <?php if(is_array($weiboNews)): $i = 0; $__LIST__ = array_slice($weiboNews,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
        <ul>
          <?php if(is_array($weiboNews)): $i = 0; $__LIST__ = array_slice($weiboNews,3,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div class="gnewslist">
      <h2><a href="/news/category/cid/45.html" target="_blank" class="fr">更多></a><span class="gntitle gn7">网友健闻</span></h2>
      <p class="twopic">
        <?php if(is_array($wangyouPicNews)): $i = 0; $__LIST__ = $wangyouPicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><img src="<?php echo ($v["litpic"]); ?>" alt="<?php echo ($v["title"]); ?>" width="180" height="107"/><span class="sbg"></span><span title="<?php echo ($v["title"]); ?>"><?php echo (mb_substr($v["title"],0,13,"utf-8")); ?>...</span></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </p>
      <div class="list">
        <?php if(is_array($wangyouNews)): $i = 0; $__LIST__ = array_slice($wangyouNews,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
        <ul>
          <?php if(is_array($wangyouNews)): $i = 0; $__LIST__ = array_slice($wangyouNews,3,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div class="adv620X90"></div>
    <div class="gnewslist">
      <h2><a href="/news/category/cid/46.html" target="_blank" class="fr">更多></a><span class="gntitle gn8">公益</span></h2>
      <p class="twopic">
        <?php if(is_array($gongyiPicNews)): $i = 0; $__LIST__ = $gongyiPicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><img src="<?php echo ($v["litpic"]); ?>" alt="<?php echo ($v["title"]); ?>" width="180" height="107"/><span class="sbg"></span><span title="<?php echo ($v["title"]); ?>"><?php echo (mb_substr($v["title"],0,13,"utf-8")); ?>...</span></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </p>
      <div class="list">
        <?php if(is_array($gongyiNews)): $k = 0; $__LIST__ = array_slice($gongyiNews,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
        <ul>
          <?php if(is_array($gongyiNews)): $i = 0; $__LIST__ = array_slice($gongyiNews,3,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div class="gnewslist">
      <h2><a href="/news/category/cid/47.html" target="_blank" class="fr">更多></a><span class="gntitle gn9">产业动态</span></h2>
      <p class="twopic">
        <?php if(is_array($chanyePicNews)): $i = 0; $__LIST__ = $chanyePicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><img src="<?php echo ($v["litpic"]); ?>" alt="<?php echo ($v["title"]); ?>" width="180" height="107"/><span class="sbg"></span><span title="<?php echo ($v["title"]); ?>"><?php echo (mb_substr($v["title"],0,13,"utf-8")); ?>...</span></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </p>
      <div class="list">
        <?php if(is_array($chanyeNews)): $k = 0; $__LIST__ = array_slice($chanyeNews,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
        <ul>
          <?php if(is_array($chanyeNews)): $i = 0; $__LIST__ = array_slice($chanyeNews,3,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="v_right">
    <div class="video">
      <h2><b>热门视频</b></h2>
      <ul>
      <?php if(is_array($hotVideo)): $i = 0; $__LIST__ = $hotVideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Video): $mod = ($i % 2 );++$i;?><li><a href="/play/index/pid/<?php echo ($Video["id"]); ?>.html" title="<?php echo ($Video["title"]); ?>"><img src="<?php echo ($Video["coverimage"]); ?>" width="133" height="156" /></a><span> <a class="bofang" href="/play/index/pid/<?php echo ($Video["id"]); ?>.html"></a> </span></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="video" style=" padding-bottom:20px;">
      <h2><b>健康视点</b></h2>
      <p class="point"><a href="#" target="_blank" title="健康视点"><img src="__PUBLIC__/Images/home/data/sd-1.jpg" width="262" height="252" alt="健康视点" /></a></p>
    </div>
    <div class="adv335X217"></div>
    <div class="hostpital">
      <h2><a href="/news/category/cid/48.html"><b>医院新闻</b></a></h2>
     
        <?php if(is_array($hospitalNews)): $i = 0; $__LIST__ = array_slice($hospitalNews,0,1,true);if( count($__LIST__)==0 ) : echo "还没有任何数据" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p class="hostp"> <a href="#" target="_blank" title="健康视点"><img src="__PUBLIC__/Images/home/data/gn-1.jpg" width="140" height="84" /></a> <a href="#"  target="_blank" class="hostptitle" title="<?php echo ($v["title"]); ?>" ><?php echo ($v["title"]); ?></a> <span class="hostpdesc"><?php echo (mb_substr($v["description"],0,22,"utf-8")); ?>.....</span> </p><?php endforeach; endif; else: echo "还没有任何数据" ;endif; ?> 
        
        <div class="hospital1">
       <?php if(is_array($hospitalNews)): $i = 0; $__LIST__ = array_slice($hospitalNews,1,9,true);if( count($__LIST__)==0 ) : echo "还没有任何数据" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p class="hostp1"><a href="#"  target="_blank" class="hostptitle1" ><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "还没有任何数据" ;endif; ?>
       </div>
       
    </div>
    <div class="adv335X217"></div>
  </div>
</div>
<!--中间代码结束--> 

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

<script src="__PUBLIC__/Js/jquery1.10.2.js" type="text/javascript"></script> 
<script src="__PUBLIC__/Js/home/slides.js" type="text/javascript"></script> 
<script type="text/javascript">
                                            $(function() {
                                                $(".hotnews ul li i:lt(3)").addClass("bg");
                                                $(".newslist_ul li:eq(6),.newslist_ul li:eq(12),.newslist_ul li:eq(18),.newslist_ul li:eq(24)").addClass("limargin");
                                            });
        </script> 
<script type="text/javascript"  src="__PUBLIC__/Js/home/health.js" ></script>

    </body>
</html>