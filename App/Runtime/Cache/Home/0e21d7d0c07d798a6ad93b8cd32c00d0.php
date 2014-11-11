<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        
<title>卫视节目_健康卫视节目大全_健康卫视</title>

        
<meta name="keywords" content="健康节目，健康小常识节目，男性健康节目，女性健康节目，养生节目，育儿节目，瑜伽节目，明星健康节目">
<meta name="description" content="卫视节目包括：《超级诊聊室》一对一演播室现场诊聊；《健康有道》道道健康热点；《健康风尚杂志》健康生活风向标；《健康小百科》3分钟了解一个健康词条；《我的健康日记》揪出生活小错误；《明星健康那些事儿》八卦明星们健康；《健康律动》瑜伽视频；《女主播怀孕记》当家女主播怀孕真人秀节目。健康节目大全，涵盖您健康生活的方方面面。所有健康问题，都有相应电视节目，专业解答。">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="__PUBLIC__/Css/home/common.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="__PUBLIC__/js/jquery1.10.2.js" ></script>
        <script type="text/javascript" src="__PUBLIC__/js/home/logined.js" ></script>
        
<link href='__PUBLIC__/css/home/tv/global.css' rel='stylesheet' type='text/css' />
<link href='__PUBLIC__/css/home/tv/style.css' rel='stylesheet' type='text/css' />
    
<!--[if IE 6]>
<script type='text/javascript' src='js/DD_belatedPNG.js' ></script>
<script type='text/javascript'>
DD_belatedPNG.fix('img,i,li,a,div');
</script>
<![endif]-->

<!--IE6版本提示开始-->
<!--[if lte IE 6]>  
<div id='ie6-warning'>
<img src='__PUBLIC__/Images/home/Tv/close.jpg' width='14' height='14' onclick='closeme();' alt='关闭提示' />
您正在使用 Internet Explorer 6 低版本的IE浏览器。为更好的浏览本页，建议您将浏览器升级到
<a href='http://www.microsoft.com/china/windows/internet-explorer/ie8howto.aspx' target='_blank'>IE8</a>
 或以下浏览器：<a href='http://www.firefox.com.cn/download/'>Firefox</a> / <a href='http://www.google.cn/chrome'>
Chrome</a> / <a href='http://www.apple.com.cn/safari/'>Safari</a> / <a href='http://www.Opera.com/'>Opera</a>  
</div>  
<script type='text/javascript'>  
function closeme()
{
   var div = document.getElementById('ie6-warning');
   div.style.display ='none';
}
function position_fixed(el, eltop, elleft){  
// check if this is IE6  
if(!window.XMLHttpRequest)  
window.onscroll = function(){  
el.style.top = (document.documentElement.scrollTop + eltop)+'px';  
el.style.left = (document.documentElement.scrollLeft + elleft)+'px';  
}  
else el.style.position = 'fixed';  
}  
position_fixed(document.getElementById('ie6-warning'),0, 0);  
</script>  
<![endif]-->
<!--版本提示结束-->

<script type='text/javascript' src='__PUBLIC__/js/jquery1.10.2.js'></script>
<script type='text/javascript' >
	function show(svalue,hvalue,showvalue){
		$(function(){
			$(svalue).mouseover(function(){
				$(hvalue).removeClass('select');
				$(this).children('a').addClass('select');	
				$num=$(this).index(); //alert($num);
				$(showvalue).hide();
				$(showvalue).eq($num).show();			
			});
		});
	}
	show('.link_three dd','.link_three dd a','.showlink');
	
	$(function(){
		$('.chotdl dd i:lt(3)').addClass('bg');	
		$('.rnews ul li i:lt(3)').addClass('bg');
	});
	
	$(function(){
		$("#selopt").hover(
			function(){
				$("#options").slideDown();
				$("#options li a").click(function(){
					$("#cursel").text($(this).text());
					$("#type").attr("value", $(this).attr("name"));
					$("#options").hide();
				});
			},		
			function(){$("#options").hide();}
		)   
	});
</script>
<script type='text/javascript' src='__PUBLIC__/js/home/tv/jquery.pack.js'></script>
<script type='text/javascript' src='__PUBLIC__/js/home/tv/jquery.SuperSlide.js'></script>
<script type='text/javascript' src='__PUBLIC__/js/home/tv/Slideshow.js'></script>

        
    </head>
    <body>
    
<!------头部------>
<div class='header'>
    <link href="__PUBLIC__/css/home/html/content/logined.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/home/html/logined1.js" ></script>
<div class="top">
  <div class="container clearfix">
    <ul class="top-smarea fl">
      <li><a target="_blank" href="/" title="健康卫视网首页"><i class="icon-home"></i>健康卫视网首页</a></li>
      <li class="limg"></li>
      <li><a target="_blank" href="/about/app.html" title="手机APP下载"><i class="icon-phone"></i>手机APP下载</a></li>
    </ul>

  <?php if(empty($user)): ?><ul class="top-smarea fr">
      <li><a target="_blank" href="/member/register.html" title="注册">注册</a></li>
      <li><a target="_blank" href="/member/login.html" title="登录">登录</a></li>
      <li><a target="_blank" href="http://e.t.qq.com/jkwshk" title="腾讯微博"><i class="icon-tx"></i></a></li>
      <li><a target="_blank" href="http://weibo.com/u/2232993991" title="新浪微博"><i class="icon-sina"></i></a></li>
      <li  class="live-bg"><a target="_blank" href="/live/" title="卫视直播"><i class="icon-play"></i>卫视直播</a></li>
    </ul>
      <?php else: ?>
               <!--登录后开始 -->
               <ul class="top-smarea fr">
             <li class="topBar-user">
                <!--登录后状态开始 -->
                <div id="showmydiv" style="margin-top:3px;">
                <a href="#" onmouseover="showDiv()" onmouseout="closeDiv1()"><?php echo ($user["username"]); ?>
              <img src="__PUBLIC__/Images/user_login-02.jpg" width="14" height="14" style="position:absolute; left:77px; top:12px;"/></a>
                </div>
                <!--登录后状态结束 -->
                <!-- 下拉用户信息开始 -->
                   <div class="userlogin-info" id="forumlist_menudiv" onmouseover="showDiv()" onmouseout="hideDiv()" style="display:none">
                   <div class="clear1"></div>
                   <div class="userlogin-info1">
                    <div class="topBar">
                      <div class="topBar-head_photo"> <img src="<?php echo ($user["avatar"]); ?>" width="38" height="38" /></div>
                      <div class="topBar-username"><?php echo (($user["nickname"])?($user["nickname"]):"还没昵称"); ?> <img src="__PUBLIC__/Images/user_login-02.jpg" width="14" height="14"  /></div>
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
                        <li><a target="_blank" href="http://e.t.qq.com/jkwshk" class="tent" title="腾讯微博"><i class="icon-tx"></i></a></li>
                        <li><a target="_blank" href="http://weibo.com/u/2232993991" class="sina" title="新浪微博"><i class="icon-sina"></i></a></li>
                        <li class="live-bg"><a target="_blank" href="/live/" class="live" title="卫视直播"><i class="icon-play"></i>卫视直播</a></li>
                    </ul>
                    <!--登录后结束--><?php endif; ?>
  </div>
</div>
 
    <div class="nav">
  <div class="container">
    <ul class="navlist">
      <li class="threeli" style=" margin-left:0px;">生 命</li>
      <li>
        <p><a title="男性" href="/man/" target="_blank">男性</a><a title="女性" href="/woman/" target="_blank">女性</a><a  title="儿童" href="/Child/" target="_blank">儿童</a><a title="老人" href="/Old/" target="_blank">老人</a></p>
        <p><a title="疾病" href="/error/getHelp" target="_blank">疾病</a> <a title="慢病" href="/chronicdis/" target="_blank">慢病</a><a title="心理" href="/error/getHelp" target="_blank">心理</a> <a title="医院"href="/Hospital/" target="_blank">医院</a></p>
      </li>
      <li class="threeli">生 态</li>
      <li class="ventm">
        <p><a title="本草纲目" href="/ben/index.html" target="_blank">本草纲目</a> <a title="健康全记录" target="_blank" href="/tv/tvList/cate/7.html">健康全记录</a><a title="茶缘天下" href="http://tea.jkwshk.tv/" target="_blank">茶缘天下</a></p>
        <p><a title="创意短片" href="/originality/" target="_blank">创意短片</a><a title="旅游"  target="_blank" href="/Travel/">旅游</a><a title="公益" href="/Commonweal/" target="_blank">公益</a><a title="环保科技" href="/Environment/" target="_blank">环保科技</a></p>
      </li>
      <li class="threeli">生 活</li>
      <li class="live">
        <p><a title="瑜伽" href="/tv/tvList/cate/38.html" target="_blank">瑜伽</a><a title="美容" href="/beautiful/" target="_blank">美容</a><a title="院士时间" href="/tv/TvList/cate/35.html" target="_blank">院士时间</a><a title="时尚" href="/Fashion/" target="_blank">时尚</a><a title="问诊" href="/error/getHelp" target="_blank">问诊</a></p>
        <p><a title="养生" href="/healthcare/" target="_blank">养生</a><a title="美食" href="/Delicacy/" target="_blank">美食</a><a title="营养师" href="/Dietitians/" target="_blank">营 养 师</a><a title="PK台"  href="/error/getHelp" target="_blank">PK 台</a><a title="综艺" alt="综艺" href="/tv/tvlist/cate/250.html" target="_blank">综艺</a></p>
      </li>
      <li class="threeli fourli">生生不息</li >
      <li class="noborder">
        <p><a title="健康要闻" href="/news/" target="_blank">健康要闻</a><a title="健康视点" href="#" target="_blank">健康视点</a><a title="健康的图" href="/Photo/" target="_blank">健康的图</a><a title="健康大事件" href="http://www.jkwshk.tv/event.html"  target="_blank">健康大事件</a></p>
        <p><a title="健康视频" href="/video/" target="_blank">健康视频</a> <a title="健闻视频" href="/newsvideo/" target="_blank">健闻视频</a><a title="卫视节目" href="/Tv/" target="_blank">卫视节目</a><a title="健康三色光" href="/ssg/" target="_blank">健康三色光</a></p>
      </li>
    </ul>
  </div>
</div>

  </div>
  <!--<div class='adv980X90'><a href='javascript:viod(0);' target='_blank'><img src='__PUBLIC__/Images/home/Tv/data/index_banner1.jpg' width='970' height='90' /></a></div> -->
  <div class='subnav'>
    <div class='subnavcontent'>
      <div class='subnavlogo'><a href='javascript:viod(0);'><img src='__PUBLIC__/Images/home/Tv/v1_logo.png' width='277' height='55' /></a></div>
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
</div>
<div class='row'>
  <div class="banner">
  <div id='tmpSlideshow'>
    <?php if(is_array($focus)): $k = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div id='tmpSlide-<?php echo ($k); ?>' class='tmpSlide'><a href="<?php echo ($v["link"]); ?>" target="_blank">
     <img src="<?php echo ($v["photo"]); ?>" width="700" height="340" alt="<?php echo ($v["title"]); ?>" /></a>
      <div class='tmpSlideCopy'>
        <h4><a href="<?php echo ($v["link"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></h4>
        <p><?php echo ($v["info"]); ?>......</p>
      </div>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div id='tmpSlideshowControls'> 
      <!--<h4>控制器</h4>-->
      <?php if(is_array($focus)): $k = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class='tmpSlideshowControl' id='tmpSlideshowControl-<?php echo ($k); ?>'></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
  </div>
  <div class='container clearfix'>
    <div class='stable clearfix'>
      <div class='searchpr'>
        <h3>栏目分类</h3>
        <p> 
        <?php if(is_array($oneProgramaId)): $i = 0; $__LIST__ = $oneProgramaId;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$opi): $mod = ($i % 2 );++$i;?><a href='__APP__/tv/TvList/cate/<?php echo ($opi["id"]); ?>.html'><?php echo ($opi["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </p>
      </div>
    </div>
    <div class='larea fl'>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($jkfszzPrName["id"]); ?>.html' target='_blank' class='imgtitle fsjkzz' title='健康风尚杂志'><?php echo ($jkfszzPrName["name"]); ?></a><i><!--推荐白富美--></i></p>
          <!-- 节目滚动 S -->
          <div id='demoContent'>
            <div class='effect'>
              <div class='leftLoop' style='width:317px'>
                <div class='hd'> <a class='next'>更多</a> </div>
                <div class='bd'>
                  <ul class='infoList'>
                  <?php if(is_array($jkfszzCOneCatIds)): $i = 0; $__LIST__ = $jkfszzCOneCatIds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href='/Tv/Tvlist/cate/<?php echo ($v["id"]); ?>.html' target='_blank'><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>
                </div>
              </div>
              <script type='text/javascript'>jQuery('.leftLoop').slide({ mainCell:'.bd ul',effect:'leftLoop',autoPlay:false,vis:4,scroll:1,trigger:'click'});</script> 
            </div>
          </div>
          <!-- 节目滚动 E --> 
        </div>
        <dl class='dllist'>
         <?php if(is_array($jkfszzVideo)): $i = 0; $__LIST__ = array_slice($jkfszzVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dt> <a href='/play/index/id/<?php echo ($v["id"]); ?>.html'><img src='<?php echo ($v["photo"]); ?>' width='338' height='204' /> <b><i></i><?php echo ($jkfszzPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($v["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
         <?php if(is_array($jkfszzVideo)): $i = 0; $__LIST__ = array_slice($jkfszzVideo,1,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($v["id"]); ?>.html'><img src='<?php echo ($v["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($v["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($disgonsisPrName["id"]); ?>.html' class='imgtitle cjzls' title='超级诊聊室'><?php echo ($disgonsisPrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
        </div>
        <dl class='dllist'>
        <?php if(is_array($disgnosisVideo)): $i = 0; $__LIST__ = array_slice($disgnosisVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$disvideo): $mod = ($i % 2 );++$i;?><dt> 
            <a href='/play/index/id/<?php echo ($disvideo["id"]); ?>.html'><img src='<?php echo ($disvideo["photo"]); ?>' width='338' height='204' /> <b><i></i><?php echo ($disgonsisPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($disvideo["title"],0,10,'utf-8')); ?></span></b> 
            </a> 
          </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($disgnosisVideo)): $i = 0; $__LIST__ = array_slice($disgnosisVideo,1,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$disvideo): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($disvideo["id"]); ?>.html'><img src='<?php echo ($disvideo["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($disvideo["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='adv670X90' style=' margin-bottom:20px;'></div>
            <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($xyhbjPrName["id"]); ?>.html' class='imgtitle cjzls' title='西医话保健'><?php echo ($xyhbjPrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
        </div>
        <dl class='dllist'>
        <?php if(is_array($xyhbjVideo)): $i = 0; $__LIST__ = array_slice($xyhbjVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$disvideo): $mod = ($i % 2 );++$i;?><dt> 
            <a href='/play/index/id/<?php echo ($disvideo["id"]); ?>.html'><img src='<?php echo ($disvideo["photo"]); ?>' width='338' height='204' /> <b><i></i><?php echo ($xyhbjPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($disvideo["title"],0,10,'utf-8')); ?></span></b> 
            </a> 
          </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($xyhbjVideo)): $i = 0; $__LIST__ = array_slice($xyhbjVideo,1,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$disvideo): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($disvideo["id"]); ?>.html'><img src='<?php echo ($disvideo["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($disvideo["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='adv670X90' style=' margin-bottom:20px;'></div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($jkqjlPrName["id"]); ?>.html' class='imgtitle jkqjl' title='健康全纪录'><?php echo ($jkqjlPrName["name"]); ?></a><i><!--推荐白富美推荐白富美推荐--></i></p>
        </div>
        <dl class='dllist'>
        <?php if(is_array($jkqjlVideo)): $i = 0; $__LIST__ = array_slice($jkqjlVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkqjl): $mod = ($i % 2 );++$i;?><dt> <a href='/play/index/id/<?php echo ($jkqjl["id"]); ?>.html'><img src='<?php echo ($jkqjl["photo"]); ?>' width='338' height='204' /> <b><i></i><?php echo ($jkqjlPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($jkqjl["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($jkqjlVideo)): $i = 0; $__LIST__ = array_slice($jkqjlVideo,1,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkqjl): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($jkqjl["id"]); ?>.html'><img src='<?php echo ($jkqjl["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($jkqjl["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($ysTimePrName["id"]); ?>.html' class='imgtitle yssj' title='院士时间'><?php echo ($ysTimePrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
        </div>
        <dl class='dllist'>
        <?php if(is_array($ysTimeVideo)): $i = 0; $__LIST__ = array_slice($ysTimeVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ystime): $mod = ($i % 2 );++$i;?><dt> <a href="/play/index/id/<?php echo ($ystime["id"]); ?>.html"><img src="<?php echo ($ystime["photo"]); ?>" width="338" height="204" /> <b><i></i><?php echo ($ystime["keywords"]); ?><br />
            <span style=" font-size:12px; color:#6e6e6e;"><?php echo (mb_substr($ystime["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($ysTimeVideo)): $i = 0; $__LIST__ = array_slice($ysTimeVideo,1,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ystime): $mod = ($i % 2 );++$i;?><dd><a href="/play/index/id/<?php echo ($ystime["id"]); ?>.html"><img src="<?php echo ($ystime["photo"]); ?>" width="151" height="91" /><b><?php echo (mb_substr($ystime["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($jkydPrName["id"]); ?>.html' class='imgtitle jkyd' title='健康有道'><?php echo ($jkydPrName["name"]); ?></a><i></i><?php echo ($jkydPrName["name"]); ?></p>
        </div>
        <dl class='dllist'>
        <?php if(is_array($jkydVideo)): $i = 0; $__LIST__ = array_slice($jkydVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkyd): $mod = ($i % 2 );++$i;?><dt> <a href='/play/index/id/<?php echo ($jkyd["id"]); ?>.html'><img src='<?php echo ($jkyd["photo"]); ?>' width='338' height='204' /> <b><i></i><?php echo ($jkydPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($jkyd["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($jkydVideo)): $i = 0; $__LIST__ = array_slice($jkydVideo,1,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkyd): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($jkyd["id"]); ?>.html'><img src='<?php echo ($jkyd["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($jkyd["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($jkldPrName["id"]); ?>.html' class='imgtitle jkld' title='健康律动'><?php echo ($jkldPrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
        </div>
        <dl class='dllist'>
        <?php if(is_array($jkldVideo)): $i = 0; $__LIST__ = array_slice($jkldVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkld): $mod = ($i % 2 );++$i;?><dt> <a href='/play/index/id/<?php echo ($jkld["id"]); ?>.html'><img src='<?php echo ($jkld["photo"]); ?>' width='338' height='204' /> <b><i></i><?php echo ($jkldPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($jkld["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($jkldVideo)): $i = 0; $__LIST__ = array_slice($jkldVideo,1,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkld): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($jkld["id"]); ?>'><img src='<?php echo ($jkld["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($jkld["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='adv670X90' style=' margin-bottom:20px;'></div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($mxjknxsPrName["id"]); ?>.html' class='imgtitle mxjknxs' title='明星健康那些事儿'><?php echo ($mxjknxsPrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
        </div>
        <dl class='dllist dllist_ht'>
        <?php if(is_array($mxjknxsVideo)): $i = 0; $__LIST__ = array_slice($mxjknxsVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mxjknxs): $mod = ($i % 2 );++$i;?><dt class='dldtw'> <a href='/play/index/id/<?php echo ($mxjknxs["id"]); ?>.html'><img src='<?php echo ($mxjknxs["photo"]); ?>' width='220' height='133' /> <b><i></i><?php echo ($mxjknxsPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($mxjknxs["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($mxjknxsVideo)): $i = 0; $__LIST__ = array_slice($mxjknxsVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mxjknxs): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($mxjknxs["id"]); ?>.html'><img src='<?php echo ($mxjknxs["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($mxjknxs["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($myHDiaryPrName["id"]); ?>.html' class='imgtitle wdjkrj' title='我的健康日记'><?php echo ($myHDiaryPrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
        </div>
        <dl class='dllist dllist_ht'>
        <?php if(is_array($myHDiaryVideo)): $i = 0; $__LIST__ = array_slice($myHDiaryVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$myHDiary): $mod = ($i % 2 );++$i;?><dt class='dldtw'> <a href='/play/index/id/<?php echo ($myHDiary["id"]); ?>.html'><img src='<?php echo ($myHDiary["photo"]); ?>' width='220' height='133' /> <b><i></i><?php echo ($myHDiaryPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($myHDiary["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($myHDiaryVideo)): $i = 0; $__LIST__ = array_slice($myHDiaryVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$myHDiary): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($myHDiary["id"]); ?>.html'><img src='<?php echo ($myHDiary["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($myHDiary["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($lifeImpulsionPrName["id"]); ?>.html' class='imgtitle smcd' title='生命冲动'><?php echo ($lifeImpulsionPrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
        </div>
        <dl class='dllist dllist_ht'>
        <?php if(is_array($lifeImpulsionVideo)): $i = 0; $__LIST__ = array_slice($lifeImpulsionVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lifeImpulsion): $mod = ($i % 2 );++$i;?><dt class='dldtw'> <a href='/play/index/id/<?php echo ($lifeImpulsion["id"]); ?>.html'><img src='<?php echo ($lifeImpulsion["photo"]); ?>' width='220' height='133' /> <b><i></i><?php echo ($lifeImpulsionPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($lifeImpulsion["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($lifeImpulsionVideo)): $i = 0; $__LIST__ = array_slice($lifeImpulsionVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lifeImpulsion): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($lifeImpulsion["id"]); ?>.html'><img src='<?php echo ($lifeImpulsion["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($lifeImpulsion["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($varietyPrName["id"]); ?>.html' class='imgtitle zongyi' title='综艺'><?php echo ($varietyPrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
            <!-- 节目滚动 S -->
          <div id='demoContent'>
            <div class='effect'>
              <div class='leftLoop' style='width:317px'>
                <div class='hd'> <a class='next'>更多</a> </div>
                <div class='bd'>
                  <ul class='infoList'>
                  <?php if(is_array($zyCOneCatIds)): $i = 0; $__LIST__ = $zyCOneCatIds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href='/Tv/Tvlist/cate/<?php echo ($v["id"]); ?>.html' target='_blank'><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>
                </div>
              </div>
              <script type='text/javascript'>jQuery('.leftLoop').slide({ mainCell:'.bd ul',effect:'leftLoop',autoPlay:false,vis:4,scroll:1,trigger:'click'});</script> 
            </div>
          </div>
          <!-- 节目滚动 E --> 
        </div>
        <dl class='dllist dllist_ht'>
        <?php if(is_array($varietyVideo)): $i = 0; $__LIST__ = array_slice($varietyVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$variety): $mod = ($i % 2 );++$i;?><dt class='dldtw'> <a href='/play/index/id/<?php echo ($variety["id"]); ?>.html'><img src='<?php echo ($variety["photo"]); ?>' width='220' height='133' /> <b><i></i><?php echo ($varietyPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($lifeImpulsion["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($varietyVideo)): $i = 0; $__LIST__ = array_slice($varietyVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$variety): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($variety["id"]); ?>.html'><img src='<?php echo ($variety["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($variety["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='adv670X90' style=' margin-bottom:20px;'></div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($encyclopediaPrName["id"]); ?>.html' class='imgtitle jkxbk' title='健康小百科'><?php echo ($encyclopediaPrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
        </div>
        <dl class='dllist dllist_ht'>

        <?php if(is_array($encyclopediaVideo)): $i = 0; $__LIST__ = array_slice($encyclopediaVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$encyclopedia): $mod = ($i % 2 );++$i;?><dt class='dldtw'> <a href='/play/index/id/<?php echo ($encyclopedia["id"]); ?>.html'><img src='<?php echo ($encyclopedia["photo"]); ?>' width='220' height='133' /> <b><i></i><?php echo ($encyclopediaPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($encyclopedia["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($encyclopediaVideo)): $i = 0; $__LIST__ = array_slice($encyclopediaVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$encyclopedia): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($encyclopedia["id"]); ?>.html'><img src='<?php echo ($encyclopedia["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($encyclopedia["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($earthimagePrName["id"]); ?>.html' class='imgtitle dqyxz' title='地球影像志'><?php echo ($earthimagePrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
        </div>
        <dl class='dllist dllist_ht'>
        <?php if(is_array($earthimageVideo)): $i = 0; $__LIST__ = array_slice($earthimageVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$earthimage): $mod = ($i % 2 );++$i;?><dt class='dldtw'> <a href='/play/index/id/<?php echo ($earthimage["id"]); ?>.html'><img src='<?php echo ($earthimage["photo"]); ?>' width='220' height='133' /> <b><i></i><?php echo ($earthimagePrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($earthimage["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($earthimageVideo)): $i = 0; $__LIST__ = array_slice($earthimageVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$earthimage): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($earthimage["id"]); ?>.html'><img src='<?php echo ($earthimage["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($earthimage["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($musicBoxPrName["id"]); ?>.html' class='imgtitle yydyj' title='音乐打印机'><?php echo ($musicBoxPrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
        </div>
        <dl class='dllist dllist_ht'>
        <?php if(is_array($musicBoxVideo)): $i = 0; $__LIST__ = array_slice($musicBoxVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$musicBox): $mod = ($i % 2 );++$i;?><dt class='dldtw'> <a href='/play/index/id/<?php echo ($musicBox["id"]); ?>.html'><img src='<?php echo ($musicBox["photo"]); ?>' width='220' height='133' /> <b><i></i><?php echo ($musicBoxPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($musicBox["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($musicBoxVideo)): $i = 0; $__LIST__ = array_slice($musicBoxVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$musicBox): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($musicBox["id"]); ?>.html'><img src='<?php echo ($musicBox["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($musicBox["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='llist'>
        <div class='title'>
          <p class='titlew'><a href='/Tv/Tvlist/cate/<?php echo ($newVisionPrName["id"]); ?>.html' class='imgtitle jkxsj' title='健康新视界'><?php echo ($newVisionPrName["name"]); ?></a><i><!--你是屌丝你可以点--></i></p>
        </div>
        <dl class='dllist dllist_ht'>
        <?php if(is_array($newVisionVideo)): $i = 0; $__LIST__ = array_slice($newVisionVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newVision): $mod = ($i % 2 );++$i;?><dt class='dldtw'> <a href='/play/index/id/<?php echo ($newVision["id"]); ?>.html'><img src='<?php echo ($newVision["photo"]); ?>' width='220' height='133' /> <b><i></i><?php echo ($newVisionPrName["name"]); ?><br />
            <span style=' font-size:12px; color:#6e6e6e;'><?php echo (mb_substr($newVision["title"],0,10,'utf-8')); ?></span></b> </a> </dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($newVisionVideo)): $i = 0; $__LIST__ = array_slice($newVisionVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newVision): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($newVision["id"]); ?>.html'><img src='<?php echo ($newVision["photo"]); ?>' width='151' height='91' /><b><?php echo (mb_substr($newVision["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
    </div>
    <div class='rarea  fr'>
      <div class='rhot'>
        <h2><a class='imgtitle' title='排行榜'>排行榜</a></h2>
        <dl class='chotdl'>
        <?php if(is_array($topTv)): $i = 0; $__LIST__ = $topTv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topt): $mod = ($i % 2 );++$i;?><dd><a href='/play/index/id/<?php echo ($topt["id"]); ?>.html'><i><?php echo ($i); ?></i><img width='132' height='80'  src='<?php echo ($topt["photo"]); ?>' /><b><?php echo (mb_substr($topt["title"],0,10,'utf-8')); ?></b></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <div class='adv285X155'></div>
      <div class='rnews'>
        <h2><a href='/news/index.html' class='imgtitle' title='热门资讯'  target='_blank'>热门资讯</a></h2>
        <ul>
        <?php if(is_array($hotNews)): $i = 0; $__LIST__ = $hotNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hn): $mod = ($i % 2 );++$i;?><li><i><?php echo ($i); ?></i><a href='/news/view/id/<?php echo ($hn["id"]); ?>.html' target='_blank'><?php echo ($hn["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
      <div class='rpic clearfix'>
        <h2><a href='/photo/index.html' class='imgtitle' title='热门图片'  target='_blank'>热门图片</a></h2>
        <ul class='clearfix'>
        <?php if(is_array($hotPic)): $i = 0; $__LIST__ = $hotPic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hp): $mod = ($i % 2 );++$i;?><li><a title='{hp.name}' href='/photo/view/id/<?php echo ($hp["id"]); ?>.html'>
            <img width='132' height='80' src='<?php echo ($hp["topimg"]); ?>' style='display: inline;'> <b><?php echo ($hp["name"]); ?></b></a> 
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
      <div class='adv285X185'></div>
      <div class='rzhuanji clearfix'>
        <h2><a href='javascript:viod(0);' class='imgtitle' title='热门专辑'  target='_blank'>热门专辑</a></h2>
        <ul  class='clearfix' >
        <?php if(is_array($hotCatVideo)): $i = 0; $__LIST__ = $hotCatVideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hcv): $mod = ($i % 2 );++$i;?><li><a title='<?php echo ($hcv["name"]); ?>' href='/play/index/pid/<?php echo ($hcv["id"]); ?>.html'><img width='132' height='156' alt='<?php echo ($hcv["name"]); ?>' src='<?php echo ($hcv["coverimage"]); ?>'></a></li><?php endforeach; endif; else: echo "" ;endif; ?>  
        </ul>
      </div>

      <br />
      <div class='adv285X185'></div>
      <br />
      <div class='adv285X185'></div>
      <br />
      <div class='adv285X185'></div>
      <br />
      <div class='adv285X90'><a href='javascript:viod(0);' target='_blank'><img src='__PUBLIC__/Images/home/Tv/data/adv_ws_1.jpg' width='285' height='90' /></a></div>
      <br />
      <div class='adv285X335'><a href='javascript:viod(0);' target='_blank'><img src='__PUBLIC__/Images/home/Tv/data/adv_ws_2.jpg' width='285' height='335' /></a></div>
      <br />
      <div class='adv285X185'></div>
    </div>
    <div class='clear'></div>
    <div class='adv980X90'><a href='javascript:viod(0);' target='_blank'><img src='__PUBLIC__/Images/home/Tv/data/index_banner1.jpg' width='970' height='90' /></a></div>
  </div>
</div>
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


    </body>
</html>