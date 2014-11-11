<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        
    <title>健康卫视_全球第一家用汉语普通话播出的医学科普卫星电视台</title>

        
    <meta name="Keywords" content="健康，健康电视节目，健康视频，健康资讯，健康图片" />
    <meta name="Description" content="健康卫视网由健康卫视主办，是全球最大中文健康视频、健康节目门户网站。健康卫视网秉承健康卫视“生命、生态、生活，生生不息”的“大健康”频道理念，希望通过权威的、系统的、细致的健康视频库，减少国民健康自查时间：所有健康知识，上健康卫视网，看健康视频就够了！同时，健康卫视网还通过图片和文字形式，提供健康图片、健康资讯、健康专题等内容，全方位满足国民对健康信息的需求。" />
	<meta property="qc:admins" content="21541727666237303646" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <link href="__PUBLIC__/css/home/index/global.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/css/home/index/style.css" rel="stylesheet" type="text/css" />

        <link href="__PUBLIC__/Css/home/common.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="__PUBLIC__/js/jquery1.10.2.js" ></script>
        <script type="text/javascript" src="__PUBLIC__/js/home/logined.js" ></script>
        
    <!--[if IE 6]> <script src="js/DD_belatedPNG.js"></script> <script>DD_belatedPNG.fix('.png_bg'); </script> <![endif]-->
    <script type="text/javascript" src="__PUBLIC__/js/jquery1.10.2.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/home/logined.js" ></script>
    <script type="text/javascript" src="__PUBLIC__/js/home/slides.js" ></script>
    <script type="text/javascript"  src="__PUBLIC__/js/home/health.js" ></script>
    <script>
        $(function() {
            $('#query').val('');
            $('.close').click(function() {
                $('.pcode').slideUp(200);
            });
        });

    </script>

<script>
$(function(){ 
var url = window.location.toString(); 
var id = url.split("#")[1]; 
if(id){ 
var t = $("#"+id).offset().top; 
$(window).scrollTop(t); 
} 
}); 
          function rewrite_search() {
            var query = $.trim($("#query").val());
            if (query == "") {
                $("#query").focus();
                $("#query").css('background','#B3B5C5');
                setTimeout("$('#query').css('background','#ffffff')",500);
                return false;
            }
        }
</script>


        
    </head>
    <body>
    
<!--[if lte IE 6]>
<div id="ie6-warning">您正在使用 Internet Explorer 6 低版本的IE浏览器。为更好的浏览本页，建议您将浏览器升级到 <a href="http://www.microsoft.com/china/windows/internet-explorer/" target="_blank">Internet Explorer 8</a> 或其他浏览器： <a href="Firefox</a'>http://www.mozillaonline.com/">Firefox</a> / <a href="Chrome</a'>http://www.google.com/chrome/?hl=zh-CN">Chrome</a> / <a href="Safari</a'>http://www.apple.com.cn/safari/">Safari</a> / <a href="Opera</a'>http://www.operachina.com/">Opera</a>
</div>
<script type="text/javascript">
function position_fixed(el, eltop, elleft){
// check if this is IE6 php
if(!window.XMLHttpRequest)
window.onscroll = function(){
el.style.top = (document.documentElement.scrollTop + eltop)+"px";
el.style.left = (document.documentElement.scrollLeft + elleft)+"px";
}
else el.style.position = "fixed"; phperz.com
} 
position_fixed(document.getElementById("ie6-warning"),0, 0);
</script>
<![endif]-->
    <!--头部代码开始-->
    <div id="header"> 
        <!--头部顶部代码-->
        <div id="top">
            <div class="top_content">
                <ul class="head_top_div_left">
                    <li class="jkname"><a target="_blank" href="/" title="健康卫视台"><img src="__PUBLIC__/Images/home/index/common/t_logo.png" alt="健康卫视台" width="95" height="23" /></a></li>
                    <li class="jkapp"><a target="_blank" href="/about/app.html" title="移动客户端App">移动客户端APP</a></li>
                </ul>
                <?php if(empty($user)): ?><ul class="head_top_div_right">
                        <li><a target="_blank" href="/member/register.html">注册</a>|</li>
                        <li><a href="/member/login.html">登录</a>|</li>
                        <li><a target="_blank" href="/bbs/">论坛</a></li>
                    </ul> 
                    <?php else: ?>
                    <!--登录后开始 -->
                    <ul class="head_top_div_right">
                        <li class="topBar-user" >
                            <!--登录后状态开始 -->
                               <div id="showmydiv">
                               <a href="#" onmouseover="showDiv()" onmouseout="closeDiv1()"><span class="name"><?php echo ($user["username"]); ?></span></a>
                                <span class="newsimg"><a href="/member/news.html" target="_blank"><img src="__PUBLIC__/Images/news.png" width="25" height="20" class="news-icon"/></a></span>
                                </div>
                            <!--登录后状态结束 -->
                            <!-- 下拉用户信息开始 -->
                            <div class="userlogin-info" id="forumlist_menudiv" onmouseover="showDiv()" onmouseout="hideDiv()" style="display:none;">
                                <div class="clear1"></div>
                                <div class="userlogin-info1">
                                    <div class="topBar">
                                        <div class="topBar-head_photo"> <img src=<?php if(($user["avatar"] == '0')): ?>__PUBLIC__/Default.jpg<?php else: echo ($user["avatar"]); endif; ?> width="38" height="38" /></div>
                                        <div class="topBar-username"><?php echo (($user["nickname"])?($user["nickname"]):"还没昵称"); ?>... <img src="__PUBLIC__/Images/user_login-02.jpg" width="14" height="14"  /></div>
                                        <div class="topBar-integral">积分：<?php echo ($user["credit"]); ?> </div>
                                    </div>
                                    <div class="bottomBar">
                                        <ul>
                                            <li style="position:relative;">
                                                <a href="/member/user.html">个人中心</a>
                                                <div id="newscount">
                                                <span id="newscount-left" ><img src="__PUBLIC__/Images/count-left.jpg" width="5" height="13"  /></span><span id="newscount-center"><span class="point">90</span></span><span id="newscount-right"><img src="__PUBLIC__/Images/count-right.jpg" width="5" height="13"  /></span>
                                                </div>
                                            </li>
                                            <li><a href="/member/index.html">播放记录</a></li>
                                            <li><a href="#">我的收藏</a></li>
                                            <li><a href="/member/doLogout.html">退出登录</a></li>
                                        </ul>
                                    </div>
                                </div>  
                            </div>  
                            <!-- 下拉用户信息结束 -->  
                        </li>
                        <li><a target="_blank" href="/bbs/">论坛</a></li>
                    </ul><?php endif; ?>
            <!--登录后结束--></div>
        </div>
        <!--头部内容代码-->
        <div class="h_content">
            <div class="logo fl" ><a href="/" title="健康卫视"><img src="__PUBLIC__/Images/home/index/common/logo.png" width="188" height="52" alt="健康卫视" /></a></div>
            <div class="search fl">
                <form action="/Seek/index.html" method="post" target="_blank" onSubmit="return rewrite_search()">
                    <input id="query" name="keywords" class="seartext" type="text" placeholder="搜吗？搜吧！"  value=""/>
                    <input name="submit" class="submit" type="submit" value="" />
                </form>
            </div>
            <div class="liveweibo fl">
                <ul>
                    <li><a href="/live/" target="_blank" title="卫视直播"></a>
                        <p>卫视直播</p>
                    </li>
                    <li><a href="http://e.t.qq.com/jkwshk" target="_blank" title="腾讯微博" class="tqq"></a>
                        <p>腾讯微博</p>
                    </li>
                    <li><a href="http://weibo.com/u/2232993991?wvr=3.6&lf=reg" target="_blank" title="新浪微博" class="tsina"></a>
                        <p>新浪微博</p>
                    </li>
                </ul>
            </div>
        </div>

        <!--栏目代码-->
        <div id="nav">
            <div class="nav_content">
      <ul class="cf">
        <li>
          <p> <a title="男性" target="_blank" href="/man/index.html">男性</a> <a title="女性" target="_blank" href="/woman/index.html">女性</a> <a  title="儿童" target="_blank" href="/child/index.html">儿童</a> </p>
          <p> <a title="老人" target="_blank" href="/old/index.html">老人</a> <a title="疾病" target="_blank" href="/error/getHelp">疾病</a> <a title="慢病" target="_blank" href="/chronicdis/index.html">慢病</a> </p>
          <p> <a title="心理" target="_blank" href="/heart">心理</a> <a title="医院" target="_blank" href="/hospital/index.html">医院</a> <a title="问诊" target="_blank" href="/ask/index.html">问诊</a> </p>
        </li>
        <li class="ventm">
          <p> <a title="本草纲目" target="_blank" href="/ben/index.html">本草纲目</a> <a title="健康全记录" target="_blank" href="/tv/TvList/cate/7.html">健康全记录</a> </p>
          <p> <a title="创意短片" target="_blank" href="/originality/index.html">创意短片</a> <a title="旅游" target="_blank" href="/travel/index.html">旅游</a> <a title="公益" target="_blank" href="/commonweal/index.html">公益</a> </p>
          <p> <a title="茶缘天下" target="_blank" href="http://tea.jkwshk.tv/">茶缘天下</a> <a title="环保科技" target="_blank" href="/environment/index.html">环保科技</a> </p>
        </li>
        <li class="live">
          <p> <a title="瑜伽" target="_blank" href="/tv/TvList/cate/38.html">瑜伽</a> <a title="美容" target="_blank" href="/beautiful/index">美容</a> <a title="院士时间" target="_blank" href="/tv/TvList/cate/35.html">院士时间</a> </p>
          <p> <a title="养生" target="_blank" href="/healthcare/index.html">养生</a> <a title="美食" target="_blank" href="/delicacy/index">美食</a> <a title="营养师" target="_blank" href="/dietitians/index.html">营 养 师</a> </p>
          <p> <a title="时尚" target="_blank" href="/fashion/index.html">时尚</a> <a title="综艺" target="_blank" href="/tv/tvlist/cate/250.html">综艺</a> <a title="PK台" target="_blank" href="/error/getHelp">PK 台</a> </p>
        </li>
        <li class="noborder">
          <p> <a title="健康要闻" target="_blank" href="/news/index.html">健康要闻</a> <a title="健康视点"target="_blank" href="http://old.jkwshk.tv/view/home.html">健康视点</a> <a title="健康大事件" target="_blank" href="http://old.jkwshk.tv/event.html">健康大事件</a> </p>
          <p> <a title="健康视频" target="_blank" href="/video/index.html">健康视频</a> <a title="健闻视频" target="_blank" href="/Newsvideo/index.html">健闻视频</a> <a title="健康三色光" target="_blank" href="/ssg/">健康三色光</a> </p>
          <p> <a title="健康的图" target="_blank"  href="/photo/index.html">健康的图</a> <a title="卫视节目" target="_blank" href="/tv/index.html">卫视节目</a> <a title="卫视主播" target="_blank" href="/error/getHelp">卫视主播</a> </p>
        </li>
      </ul>
    </div>
        </div>
    </div>
    <!--头部代码结束-->
    <div id="main"> 
        <!--banner代码开始-->
        <div class="banner">
            <div class="container">
            <script type='text/javascript' src='__PUBLIC__/js/home/html/jquery.js'></script> 
            <script type='text/javascript' src='__PUBLIC__/js/home/html/jquery.cycle.all.js?ver=3.2.1'></script> 
            <script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('#slideshow').cycle({
					fx: 'uncover', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
					/*EG:uncover,cover,wipe,toss,curtainY,curtainX,growY,growX,blindX,blindZ,blindY,fadeZoom,turnRight,turnDown,
					 turnLeft,turnUp,shuffle,slideX,slideY,scrollVert,scrollHorz,scrollRight,scrollLeft,scrollDown,scrollUp,none*/
					pause:1,//鼠标经过时，停止滚动
					pager: '#slide-pager',
					pagerAnchorBuilder: function(idx, slide) {
						return '#slide-pager li:eq(' + idx + ') a';
					}
				});
			});
            </script>
                <div id="featured">
                    <div id="slideshow"> 
                        <?php if(is_array($focus)): $i = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v["link"]); ?>" title="<?php echo ($v["title"]); ?>" onmousemove=""><img src="<?php echo ($v["photo"]); ?>" alt="<?php echo ($v["title"]); ?>" width="700" height="347"/></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <ul id="highlight"><img src="__PUBLIC__/Images/home/index/banner/highlight.jpg" alt=""  width="38" height="54" /></ul>
                <ul id="slide-pager">
                 <?php if(is_array($focus)): $i = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="#"><img src="__PUBLIC__/Images/focus/<?php echo ($v["cover"]); ?>" alt=""  width="52" height="50" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>        
            <div class="project">
                <div class="show">
                    <h2 class="show_h2">SEVEN BABY为你导视</h2>
                    <ul>
                        <li style="border-top:none;">
                            <p><span><a href="/live/index.html" title="正在直播" style=" display:block; width:81px; height:25px;"></a></span><em><?php echo ($liveProgram["plantime"]); ?></em><a target="_blank" href="/live/index.html" title="健康风尚杂志"><?php echo ($liveProgram["column"]); ?></a></p>
                            <p class="margp"><?php echo ($liveProgram["name"]); ?></p>
                        </li>
                        <?php if(is_array($nextLiveProgram)): $i = 0; $__LIST__ = $nextLiveProgram;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li style="border-top:none;">
                                <p><span></span><em><?php echo ($v["plantime"]); ?></em><a target="_blank" href="/live/index.html" title="多多益膳"><?php echo ($v["column"]); ?></a></p>
                                <p class="margp"><?php echo ($v["name"]); ?></p>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div class="seven_baby"> <a title='sevenbaby' target="_blank" href="javascript:void(0);"><img src="__PUBLIC__/Images/7baby/<?php echo ($curWeekDay); ?>.png" width="177px" height="115px" style=" float:right;" /></a>
                        <p><!--<a target="_blank" href="#">Seven baby : 赵伊姜</a>--></p>
                    </div>
                </div>
            </div>
        </div>
        <!--banner代码结束-->
        <div class="main_content"> 
            <!--健康要闻代码开始-->
            <div class="m_content">
                <h2 class="m_content_h2"><a href="/news/index.html" target="_blank">健康要闻</a></h2>
                <div class="news_c">
                    <div class="focus"  id="focus1">
                        <ul>
                            <?php if(is_array($authoriPicNews)): $i = 0; $__LIST__ = $authoriPicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                    <h2><a target="_blank"  href="/news/view/id/<?php echo ($v["id"]); ?>.html" > <img src="<?php echo ($v["litpic"]); ?>"  alt="<?php echo ($v["title"]); ?> "  height="180" width="300" /></a></h2>
                                    <div class="slideother">
                                        <div class="h12"><a target="_blank"  href="/news/view/id/<?php echo ($v["id"]); ?>.html" ><?php echo ($v["title"]); ?></a></div>
                                    </div>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="news_c_1">
                        <h3><span><a href="/news/category/cid/<?php echo ($exposeCatId); ?>.html" target="_blank" >更多</a></span>曝光</h3>
                        <?php if(is_array($exposePicNews)): $i = 0; $__LIST__ = $exposePicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank" title="<?php echo ($v["title"]); ?>">
                                    <img src="<?php echo ($v["litpic"]); ?>" width="128" height="78" alt="<?php echo ($v["title"]); ?>" /></a></dt>
                                <dd><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank"  title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                    <div class="news_c_1">
                        <h3><span><a href="/news/category/cid/<?php echo ($xinzhiCatId); ?>.html" target="_blank" >更多</a></span>健康新知</h3>
                        <?php if(is_array($xinzhiPicNews)): $i = 0; $__LIST__ = $xinzhiPicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank" title="<?php echo ($v["title"]); ?>">
                                    <img src="<?php echo ($v["litpic"]); ?>" width="128" height="78" alt="<?php echo ($v["title"]); ?>" /></a></dt>
                                <dd><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank"  title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                </div>
                <div class="news_c2">
                    <div class="news_c2_1">
                        <h3><span><a href="/news/category/cid/<?php echo ($authorCatId); ?>.html" target="_blank" >更多</a></span>权威发布 </h3>
                        <?php if(is_array($authoriNews)): $i = 0; $__LIST__ = array_slice($authoriNews,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p class="font14hei"><i>News</i><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                        <hr />
                        <?php if(is_array($authoriNews)): $i = 0; $__LIST__ = array_slice($authoriNews,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank" title="<?php echo ($v["title"]); ?>">· <?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="news_c2_1 mar30">
                        <h3><span><a href="/news/category/cid/<?php echo ($lovCatId); ?>.html" target="_blank" >更多</a></span>外媒</h3>
                        <?php if(is_array($lovNews)): $i = 0; $__LIST__ = array_slice($lovNews,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p class="font14hei"><i>News</i><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank"  title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                        <hr />
                        <?php if(is_array($lovNews)): $i = 0; $__LIST__ = array_slice($lovNews,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank" title="<?php echo ($v["title"]); ?>" >· <?php echo ($v["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="play" style="margin-top:20px;"><i>【<a href="#">正在直播</a>】</i>
                        <marquee behavior="alternate" scrollamount="2" style="width:200px;height:33px;line-height:33px;">
                            <a href="/live/index.html"><?php echo ($liveProgram["column"]); ?></a>
                        </marquee>
                    </div>
                </div>
                <div class="news_c3">
                    <div class="news_c3_1" style="margin-bottom:15px;">
                        <h3><span><a href="/news/category/cid/<?php echo ($weiboCatId); ?>.html" target="_blank" >更多</a></span>微博健闻</h3>
                        <?php if(is_array($weiboPicNews)): $i = 0; $__LIST__ = $weiboPicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank" title="<?php echo ($v["title"]); ?>">
                                    <img src="<?php echo ($v["litpic"]); ?>" width="128" height="78" alt="<?php echo ($v["title"]); ?>" /></a></dt>
                                <dd><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank"  title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                    <div class="news_c3_1">
                        <h3><span><a href="/news/category/cid/<?php echo ($wangyouCatId); ?>.html" target="_blank" >更多</a></span>网友健闻</h3>
                        <?php if(is_array($wangyouPicNews)): $i = 0; $__LIST__ = $wangyouPicNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank" title="<?php echo ($v["title"]); ?>">
                                    <img src="<?php echo ($v["litpic"]); ?>" width="128" height="78" alt="<?php echo ($v["title"]); ?>" /></a></dt>
                                <dd><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank"  title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                    <div class="tool">
                    <a href="http://www.jkwshk.tv/tv/tvlist/cate/240.html" target="_blank" title="女主播怀孕记"><img src="__PUBLIC__/Images/home/index/nvzhubohuaiyunji.jpg" alt=""  width="304" height="151" /></a>
                    <!--    <ul>
                            <li style=" width:150px;"><a href="#"  target="_blank" class="tool_1" >健康自测</a></li>
                            <li><a href="#"  target="_blank" class="tool_2">心理测试工具</a></li>
                            <li style=" margin-right:0px;"><a href="#" target="_blank" class="tool_3">心理小测试</a></li>
                            <li><a href="#" target="_blank" class="tool_4">放空</a></li>
                            <li><a href="#" target="_blank" class="tool_5">心理新闻</a></li>
                            <li  style=" width:150px;  margin-right:0px;"><a href="#"  target="_blank"  class="tool_6">心理情感故事</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <!--健康要闻代码结束--> 
            <!--健闻视频代码开始-->
            <div class="m_content zixun">
                <h2 class="m_content_h2"><a href="/newsvideo/index.html" target="_blank">健闻视频</a></h2>
                <div class="news_c">
                    <div class="focus" id="focus2">
                        <ul>
                            <li>
                                <h2><a target="_blank"  href="/play/index/id/<?php echo ($topNewsVideo["id"]); ?>.html" > <img src="<?php echo ($topNewsVideo["photo"]); ?>"  alt="<?php echo ($topNewsVideo["keywords"]); ?>"  height="180" width="300" /></a></h2>
                                <div class="slideother">
                                    <div class="h12"><a target="_blank"  href="/play/index/id/<?php echo ($topNewsVideo["id"]); ?>.html" ><?php echo ($topNewsVideo["title"]); ?></a></div>
                                </div>
                            </li>
                            <li>
                                <h2><a target="_blank"  href="/play/index/id/<?php echo ($hotNewsVideo["id"]); ?>.html" > <img src="<?php echo ($hotNewsVideo["photo"]); ?>"  alt="<?php echo ($hotNewsVideo["keywords"]); ?>" height="180" width="300"  /></a></h2>
                                <div class="slideother">
                                    <div class="h12"><a target="_blank"  href="/play/index/id/<?php echo ($hotNewsVideo["id"]); ?>.html" ><?php echo ($hotNewsVideo["title"]); ?></a></div>
                                </div>
                            </li>
                            <li>
                                <h2><a target="_blank"  href="/play/index/id/<?php echo ($recNewsVideo["id"]); ?>.html" > <img src="<?php echo ($recNewsVideo["photo"]); ?>"  alt="<?php echo ($recNewsVideo["keywords"]); ?>" height="180" width="300" /></a></h2>
                                <div class="slideother">
                                    <div class="h12"><a target="_blank"  href="/play/index/id/<?php echo ($recNewsVideo["id"]); ?>.html" ><?php echo ($recNewsVideo["title"]); ?></a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="news_c2_1 mar10">
                        <!-- 上面的轮播图使用本栏的图片 -->
                        <p class="font14hei"><i>头条</i><a href="/play/index/id/<?php echo ($topNewsVideo["id"]); ?>.html" target="_blank" title="<?php echo ($topNewsVideo["title"]); ?>"><?php echo (mb_substr($topNewsVideo["title"],0,15,'utf-8')); ?></a></p>      

                        <p class="font14hei"><i>热点</i><a href="/play/index/id/<?php echo ($hotNewsVideo["id"]); ?>.html" target="_blank" title="<?php echo ($hotNewsVideo["title"]); ?>"><?php echo (mb_substr($hotNewsVideo["title"],0,15,'utf-8')); ?></a></p>      

                        <p class="font14hei"><i>推荐</i><a href="/play/index/id/<?php echo ($recNewsVideo["id"]); ?>.html" target="_blank" title="<?php echo ($recNewsVideo["title"]); ?>"><?php echo (mb_substr($recNewsVideo["title"],0,15,'utf-8')); ?></a></p>		
                        <hr style="margin-bottom:10px; margin-top:10px;"/>
                        <?php if(is_array($newsVideo)): $i = 0; $__LIST__ = array_slice($newsVideo,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nv): $mod = ($i % 2 );++$i;?><p style='line-height:25px;height:25px;overflow:hidden'>
                                <a href="/play/index/id/<?php echo ($nv["id"]); ?>.html" target="_blank" title="<?php echo ($nv["title"]); ?>">· <?php echo ($nv["title"]); ?></a>
                            </p><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="news_c2">
                    <div class="news_c2_1">
                        <?php if(is_array($newsVideo)): $i = 0; $__LIST__ = array_slice($newsVideo,3,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nv): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/play/index/id/<?php echo ($nv["id"]); ?>.html" target="_blank" title="<?php echo ($nv["title"]); ?>"><img src="<?php echo ($nv["photo"]); ?>" width="152" height="91" alt="<?php echo ($nv["keywords"]); ?>" /></a></dt>
                                <dd><a href="/play/index/id/<?php echo ($nv["id"]); ?>.html" target="_blank"  title="<?php echo ($nv["title"]); ?>"><font style="font-size:12px;"><?php echo ($nv["title"]); ?></font></a></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="news_c3">
                    <div class="news_c3_1 border3">
                        <h3><img src="__PUBLIC__/Images/home/index/common/xiaodiaocha.png" width="149" height="33" /></h3>
                        <div class="survey">
                            <p><a href="#" target="_blank" class="surveytitle">网友呼吁出游自带垃 圾袋你怎么看</a> </p>
                            <p style="text-align:left;">1.你出游时有习惯自带垃圾袋吗?</p>
                            <p style="text-align:left; margin-bottom:10px;">2.你认为这样有呼吁意义吗？...</p>
                            <p><a href="#" target="_blank"  class="surveyveiw">详情请点击</a></p>
                        </div>
                    </div>
                          <div class="adv307X171">
                    <a href="http://www.jkwshk.tv/tv/TvList/cate/280.html" title="健康悦世界" target="_blank"><img src="__PUBLIC__/Images/home/index/content/ad004.jpg" width="307" height="171" /></a>
                    </div>
                </div>
            </div>
            <!--健闻视频代码结束-->
            <div class="adv1000X90">
              <a href="http://item.taobao.com/item.htm?id=39847891582&qq-pf-to=pcqq.c2c" target="_blank" title="Seven Baby故事机"><img src="__PUBLIC__/Images/home/index/content/banner-01.gif" width="1000" height="90" /></a>
            </div>
            <!--健康的图代码开始-->
            <div class="m_content">
                <h2 class="m_content_h2"><a href="/photo/index.html" target="_blank">健康的图</a></h2>
                <div class="pic_content">
                    <ul>
                        <?php if(is_array($healthPics)): $i = 0; $__LIST__ = array_slice($healthPics,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="fristpic"><a href="/photo/view/id/<?php echo ($v["id"]); ?>.html"  target="_blank" title="<?php echo ($v["name"]); ?>"><img src="<?php echo ($v["topimg"]); ?>" width="332" height="252" alt="<?php echo ($v["name"]); ?>" /></a>
                                <p><a href="/photo/view/id/<?php echo ($v["id"]); ?>.html" target="_blank" title="<?php echo ($v["name"]); ?>"><?php echo ($v["name"]); ?></a></p>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($healthPics)): $i = 0; $__LIST__ = array_slice($healthPics,1,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/photo/view/id/<?php echo ($v["id"]); ?>.html"  target="_blank" title="<?php echo ($v["name"]); ?>"><img src="<?php echo ($v["topimg"]); ?>" width="142" height="108" alt="<?php echo ($v["name"]); ?>" /></a>
                                <p><a href="/photo/view/id/<?php echo ($v["id"]); ?>.html" target="_blank" title="<?php echo ($v["name"]); ?>"><?php echo ($v["name"]); ?></a></p>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="viewpoint">
                    <div class="viewfocus" id="focus3">
                        <ul>
                            <li>
                                <h2><a target="_blank"  href="http://old.jkwshk.tv/news/jkws/shid/2013/0724/1265.html" > <img src="__PUBLIC__/Images/home/index/data/sd156.jpg"  alt=""  height="252" width="262" /></a></h2>
                            </li>
                            <li>
                                <h2><a target="_blank"  href="http://old.jkwshk.tv/news/jkws/shid/2013/0314/610.html" > <img src="__PUBLIC__/Images/home/index/data/sd100.jpg"  alt=""  height="252" width="262" /></a></h2>
                            </li>                     
                        </ul>
                    </div>
                </div>
            </div>
            <!--健康的图代码结束--> 
            <!--健康视频代码开始-->
            <div class="m_content overf">
                <h2 class="m_content_h2"><a href="/video/index.html" target="_blank">健康视频</a></h2>
                <div class="allproductlist">
                    <div class="productlist">
                        <div class="productlisttitle ctrlshow1"><span><a href="/woman" target="_blank" class="clecksp">女性</a><a href="man" target="_blank">男性</a></span></div>
                        <ul class="tab_show1">
                            <?php if(is_array($womanList)): $i = 0; $__LIST__ = $womanList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wl): $mod = ($i % 2 );++$i;?><li> <a class="pictext"  href="/play/index/pid/<?php echo ($wl["id"]); ?>.html" title="<?php echo ($wl["name"]); ?>" target="_blank"> 
                                        <img src="<?php echo ($wl["coverimage"]); ?>" width="144" height="170"  title="<?php echo ($wl["name"]); ?>" alt="<?php echo ($wl["description"]); ?>"/> 
                                        <span class="masktxt">片长:<?php echo ($wl["programtime"]); ?></span> <span class="play"></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <ul class="tab_show1" style="display:none;">
                            <?php if(is_array($manList)): $i = 0; $__LIST__ = $manList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li> <a class="pictext"  href="/play/index/pid/<?php echo ($ml["id"]); ?>.html" title="<?php echo ($ml["name"]); ?>" target="_blank"> 
                                        <img src="<?php echo ($ml["coverimage"]); ?>" width="144" height="170"  title="<?php echo ($ml["name"]); ?>" alt="<?php echo ($ml["description"]); ?>"/>
                                        <span class="masktxt">片长:<?php echo ($ml["programtime"]); ?></span> <span class="play"></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="productlist">
                        <div class="productlisttitle ctrlshow2"><span><a href="/child" target="_blank" class="clecksp">儿童</a><a href="old" target="_blank">老人</a></span></div>
                        <ul class="tab_show2">
                            <?php if(is_array($childList)): $i = 0; $__LIST__ = $childList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$chl): $mod = ($i % 2 );++$i;?><li> <a class="pictext"  href="/play/index/pid/<?php echo ($chl["id"]); ?>.html" title="<?php echo ($chl["name"]); ?>" target="_blank"> 
								<img src="<?php echo ($chl["coverimage"]); ?>" width="144" height="170"  title="<?php echo ($chl["name"]); ?>" alt="<?php echo ($chl["description"]); ?>"/>
                                        <span class="masktxt">片长:<?php echo ($chl["programtime"]); ?></span> <span class="play"></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <ul class="tab_show2" style="display:none;">
                            <?php if(is_array($oldList)): $i = 0; $__LIST__ = $oldList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$old): $mod = ($i % 2 );++$i;?><li> <a class="pictext"  href="/play/index/pid/<?php echo ($old["id"]); ?>.html" title="<?php echo ($old["name"]); ?>" target="_blank"> 
								<img src="<?php echo ($old["coverimage"]); ?>" width="144" height="170"  title="<?php echo ($old["name"]); ?>" alt="<?php echo ($old["description"]); ?>"/> 
                                        <span class="masktxt">片长:<?php echo ($old["programtime"]); ?></span> <span class="play"></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="productlist">
                        <div class="productlisttitle ctrlshow3"><span><a href="/Delicacy" target="_blank" class="clecksp">美食</a><a href="/Chronicdisl" target="_blank">慢病</a></span></div>
                        <ul class="tab_show3">
                            <?php if(is_array($foodList)): $i = 0; $__LIST__ = $foodList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fl): $mod = ($i % 2 );++$i;?><li> <a class="pictext"  href="/play/index/pid/<?php echo ($fl["id"]); ?>.html" title="<?php echo ($fl["name"]); ?>" target="_blank"> 
								<img src="<?php echo ($fl["coverimage"]); ?>" width="144" height="170"  title="<?php echo ($fl["name"]); ?>" alt="<?php echo ($fl["description"]); ?>"/> 
                                        <span class="masktxt">片长:<?php echo ($fl["programtime"]); ?></span> <span class="play"></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <ul class="tab_show3" style="display:none;">
                            <?php if(is_array($chronicList)): $i = 0; $__LIST__ = $chronicList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$chl): $mod = ($i % 2 );++$i;?><li> <a class="pictext"  href="/play/index/pid/<?php echo ($chl["id"]); ?>.html" title="<?php echo ($chl["name"]); ?>" target="_blank"> 
								<img src="<?php echo ($chl["coverimage"]); ?>" width="144" height="170"  title="<?php echo ($chl["name"]); ?>" alt="<?php echo ($chl["description"]); ?>"/> 
                                        <span class="masktxt">片长:<?php echo ($chl["programtime"]); ?></span> <span class="play"></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="order">
                    <div class="ordertitle">
                        <h2><span><a href="javascript:void(0);" class="clecksp">日点播</a><a href="javascript:void(0);">周点播</a></span></h2>
                    </div>
                    <ul class="ordershow">
                        <?php if(is_array($day)): $i = 0; $__LIST__ = $day;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$day): $mod = ($i % 2 );++$i;?><li><span><?php echo ($day["addtime"]); ?></span><i><?php echo ($i); ?></i><a href="/play/index/id/<?php echo ($day["videoid"]); ?>.html" target="_blank" title="<?php echo ($day["title"]); ?>"><?php echo (mb_substr($day["title"],0,9,'utf-8')); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <ul  class="ordershow ordershowi" style=" display:none">
                        <?php if(is_array($week)): $i = 0; $__LIST__ = $week;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$week): $mod = ($i % 2 );++$i;?><li><span><?php echo ($week["addtime"]); ?></span><i><?php echo ($i); ?></i><a href="/play/index/id/<?php echo ($week["videoid"]); ?>.html" target="_blank" title="<?php echo ($week["title"]); ?>"><?php echo (mb_substr($week["title"],0,9,'utf-8')); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div class="pk">
                    <h2  class="pkh2"><a href="#" target="_blank"><img src="__PUBLIC__/Images/home/index/common/pktitle.png" width="110" height="33" /></a></h2>
                    <div class="pkcontent">
                        <p><b><a href="#" target="_blank">内裤是应该正面晒还是反面晒？</a></b></p>
                        <p class="pkview"><img src="__PUBLIC__/Images/home/index/data/pic-1.jpg" width="132" height="100" /><span>内容简介内内容简介内容简介内容简介内容简介容简介内容简介内容...<a href="#" target="_blank">【详细】</a></span></p>
                        <p><img src="__PUBLIC__/Images/home/index/common/pkpoint.png" width="246" height="24" border="0" usemap="#Map" />
                            <map name="Map" id="Map">
                                <area shape="rect" coords="-7,2,39,24" href="#" />
                                <area shape="rect" coords="206,3,255,26" href="#" />
                            </map>
                        </p>
                        <p style=" text-align:left;"><b><a href="#" target="_blank">支持正面</a></b><b style=" float:right;"><a href="#" target="_blank">支持反面</a></b></p>
                        <p style=" clear:both; margin-top:5px; float:right;"><b><a href="#" target="_blank" >查看结果>></a></b></p>
                    </div>
                            <div class="adv307X171">
                    <a href="http://www.jkwshk.tv/tv/TvList/cate/35.html" title="院士时间" target="_blank"><img src="__PUBLIC__/Images/home/index/content/ad002.jpg" width="307" height="171" /></a>
                    </div>
                </div>
                <div> </div>
            </div>
            <div class="clear"></div>
            <!--健康视频代码结束--> 
            <!--卫视节目代码开始-->
            <div class="m_content">
                <h2 class="m_content_h2"><a href="/tv/index.html" target="_blank">卫视节目</a></h2>
                <div class="allprogram">
                    <ul class="lm_List">
                        <li> <span class="lmList_Col1"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($xyhbjCid["id"]); ?>.html" ><?php echo ($xyhbjCid["name"]); ?></a></h3>
							   <p class="lm_Time"></p>
                            <!--<p class="lm_Time"><?php echo ($xyhbjCid["programtime"]); ?></p>-->
                        <?php if(is_array($xyhbjVideo)): $i = 0; $__LIST__ = array_slice($xyhbjVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xyhbj): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($xyhbj["id"]); ?>.html" title="<?php echo ($xyhbj["title"]); ?>"   class="lm_Imgcon"> <img src="<?php echo ($xyhbj["photo"]); ?>"  width="125"alt="<?php echo ($xyhbj["title"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($xyhbjVideo)): $i = 0; $__LIST__ = array_slice($xyhbjVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xyhbj): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank" href="/play/index/id/<?php echo ($xyhbj["id"]); ?>.html"   title="<?php echo ($xyhbj["title"]); ?>"><?php echo ($xyhbj["title"]); ?></a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($xyhbjVideo)): $i = 0; $__LIST__ = array_slice($xyhbjVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xyhbj): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"> <a target="_blank" href="/play/index/id/<?php echo ($xyhbj["id"]); ?>.html"   title="<?php echo ($xyhbj["title"]); ?>">
                                    <?php if(mb_strlen($xyhbj['title'],'utf-8')>9){ echo mb_substr($xyhbj['title'],0,8,'utf-8')."..."; }else{ echo $xyhbj['title']; } ?>
                                </a> </h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li> <span class="lmList_Col2"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($cjzlsCid["id"]); ?>.html"  ><?php echo ($cjzlsCid["name"]); ?></a></h3>
                            <p class="lm_Time"><?php echo ($cjzlsCid["programtime"]); ?></p>
                        <?php if(is_array($cjzlsVideo)): $i = 0; $__LIST__ = array_slice($cjzlsVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cjzls): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($cjzls["id"]); ?>.html" title="<?php echo ($cjzls["title"]); ?>"    class="lm_Imgcon"> <img src="<?php echo ($cjzls["photo"]); ?>" alt="<?php echo ($cjzls["keywords"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($cjzlsVideo)): $i = 0; $__LIST__ = array_slice($cjzlsVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cjzls): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank" href="/play/index/id/<?php echo ($cjzls["id"]); ?>.html"    title="<?php echo ($cjzls["title"]); ?>"><?php echo ($cjzls["title"]); ?>&nbsp;&nbsp;</a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($cjzlsVideo)): $i = 0; $__LIST__ = array_slice($cjzlsVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cjzls): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"><a target="_blank" href="/play/index/id/<?php echo ($cjzls["id"]); ?>.html"   title="<?php echo ($cjzls["title"]); ?>">
                                    <?php if(mb_strlen($cjzls['title'],'utf-8')>9){ echo mb_substr($cjzls['title'],0,8,'utf-8')."..."; }else{ echo $cjzls['title']; } ?>
                                </a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li> <span class="lmList_Col3"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($jkfszzCid["id"]); ?>.html"  ><?php echo ($jkfszzCid["name"]); ?></a></h3>
                            <p class="lm_Time"><?php echo ($jkfszzCid["programtime"]); ?></p>
                        <?php if(is_array($jkfszzVideo)): $i = 0; $__LIST__ = array_slice($jkfszzVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkfszz): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($jkfszz["id"]); ?>.html"   title="<?php echo ($jkfszz["title"]); ?>" class="lm_Imgcon"> <img src="<?php echo ($jkfszz["photo"]); ?>" alt="<?php echo ($jkfszz["keywords"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jkfszzVideo)): $i = 0; $__LIST__ = array_slice($jkfszzVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkfszz): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank" href="/play/index/id/<?php echo ($jkfszz["id"]); ?>.html"   title="<?php echo ($jkfszz["title"]); ?>"><?php echo ($jkfszz["title"]); ?></a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jkfszzVideo)): $i = 0; $__LIST__ = array_slice($jkfszzVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkfszz): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"><a target="_blank" href="/play/index/id/<?php echo ($jkfszz["id"]); ?>.html"   title="<?php echo ($jkfszz["title"]); ?>">
                                    <?php if(mb_strlen($jkfszz['title'],'utf-8')>9){ echo mb_substr($jkfszz['title'],0,8,'utf-8')."..."; }else{ echo $jkfszz['title']; } ?>
                                </a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li> <span class="lmList_Col4"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($jkqjlCid["id"]); ?>.html"   ><?php echo ($jkqjlCid["name"]); ?></a></h3>
                            <p class="lm_Time"><?php echo ($jkqjlCid["programtime"]); ?></p>
                        <?php if(is_array($jkqjlVideo)): $i = 0; $__LIST__ = array_slice($jkqjlVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkqjl): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($jkqjl["id"]); ?>.html"   title="<?php echo ($jkqjl["title"]); ?>" class="lm_Imgcon"> <img src="<?php echo ($jkqjl["photo"]); ?>" alt="<?php echo ($jkqjl["photo"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jkqjlVideo)): $i = 0; $__LIST__ = array_slice($jkqjlVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkqjl): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank" href="/play/index/id/<?php echo ($jkqjl["id"]); ?>.html"   title="<?php echo ($jkqjl["title"]); ?>"><?php echo ($jkqjl["title"]); ?></a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jkqjlVideo)): $i = 0; $__LIST__ = array_slice($jkqjlVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkqjl): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"><a target="_blank" href="/play/index/id/<?php echo ($jkqjl["id"]); ?>.html"   title="<?php echo ($jkqjl["title"]); ?>">
                                    <?php if(mb_strlen($jkqjl['title'],'utf-8')>9){ echo mb_substr($jkqjl['title'],0,8,'utf-8')."..."; }else{ echo $jkqjl['title']; } ?>
                                </a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li> <span class="lmList_Col4"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($jkxbkCid["id"]); ?>.html"  ><?php echo ($jkxbkCid["name"]); ?></a></h3>
                            <p class="lm_Time"><?php echo ($jkxbkCid["programtime"]); ?>&nbsp;</p>
                        <?php if(is_array($jkxbkVideo)): $i = 0; $__LIST__ = array_slice($jkxbkVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkxbk): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($jkxbk["id"]); ?>.html"   title="<?php echo ($jkxbk["title"]); ?>" class="lm_Imgcon"> <img src="<?php echo ($jkxbk["photo"]); ?>" alt="<?php echo ($jkxbk["keywords"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jkxbkVideo)): $i = 0; $__LIST__ = array_slice($jkxbkVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkxbk): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank" href="/play/index/id/<?php echo ($jkxbk["id"]); ?>.html"   title="<?php echo ($jkxbk["title"]); ?>"><?php echo ($jkxbk["title"]); ?>&nbsp;&nbsp;</a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jkxbkVideo)): $i = 0; $__LIST__ = array_slice($jkxbkVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkxbk): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"><a target="_blank" href="/play/index/id/<?php echo ($jkxbk["id"]); ?>.html"   title="<?php echo ($jkxbk["title"]); ?>">
                                    <?php if(mb_strlen($jkxbk['title'],'utf-8')>9){ echo mb_substr($jkxbk['title'],0,8,'utf-8')."..."; }else{ echo $jkxbk['title']; } ?>
                                </a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li> <span class="lmList_Col3"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($ystimeCid["id"]); ?>.html"  ><?php echo ($ystimeCid["name"]); ?></a></h3>
                            <p class="lm_Time"><?php echo ($ystimeCid["programtime"]); ?></p>
                        <?php if(is_array($ystimeVideo)): $i = 0; $__LIST__ = array_slice($ystimeVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ystime): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($ystime["id"]); ?>.html" title="<?php echo ($ystime["title"]); ?>"   class="lm_Imgcon"> <img src="<?php echo ($ystime["photo"]); ?>" alt="<?php echo ($ystime["title"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($ystimeVideo)): $i = 0; $__LIST__ = array_slice($ystimeVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ystime): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank" href="/play/index/id/<?php echo ($ystime["id"]); ?>.html"   title="<?php echo ($ystime["title"]); ?>"><?php echo ($ystime["title"]); ?>&nbsp;&nbsp;</a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($ystimeVideo)): $i = 0; $__LIST__ = array_slice($ystimeVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ystime): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"><a target="_blank" href="/play/index/id/<?php echo ($ystime["id"]); ?>.html"    title="<?php echo ($ystime["title"]); ?>">
                                    <?php if(mb_strlen($ystime['title'],'utf-8')>9){ echo mb_substr($ystime['title'],0,8,'utf-8')."..."; }else{ echo $ystime['title']; } ?>
                                </a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li> <span class="lmList_Col2"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($earthVideoCid["id"]); ?>.html"  ><?php echo ($earthVideoCid["name"]); ?></a></h3>
                            <p class="lm_Time"><?php echo ($earthVideoCid["programtime"]); ?></p>
                        <?php if(is_array($earthVideo)): $i = 0; $__LIST__ = array_slice($earthVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$earth): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($earth["id"]); ?>.html" title="<?php echo ($earth["title"]); ?>"   class="lm_Imgcon"> <img src="<?php echo ($earth["photo"]); ?>" alt="<?php echo ($earth["keywords"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($earthVideo)): $i = 0; $__LIST__ = array_slice($earthVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$earth): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank" href="/play/index/id/<?php echo ($earth["id"]); ?>.html"   title="<?php echo ($earth["title"]); ?>"><?php echo ($earth["title"]); ?></a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($earthVideo)): $i = 0; $__LIST__ = array_slice($earthVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$earth): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"><a target="_blank" href="/play/index/id/<?php echo ($earth["id"]); ?>.html"    title="<?php echo ($earth["title"]); ?>">
                                    <?php if(mb_strlen($earth['title'],'utf-8')>9){ echo mb_substr($earth['title'],0,8,'utf-8')."..."; }else{ echo $earth['title']; } ?>
                                </a></h4><?php endforeach; endif; else: echo "" ;endif; ?>

                        </li>
                        <li> <span class="lmList_Col1"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($meDiaryCid["id"]); ?>.html"  ><?php echo ($meDiaryCid["name"]); ?></a></h3>
                            <p class="lm_Time"><?php echo ($meDiaryCid["programtime"]); ?></p>
                        <?php if(is_array($meDiaryVideo)): $i = 0; $__LIST__ = array_slice($meDiaryVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$meDiary): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($meDiary["id"]); ?>.html"   title="<?php echo ($meDiary["title"]); ?>" class="lm_Imgcon"> <img src="<?php echo ($meDiary["photo"]); ?>" alt="<?php echo ($meDiary["keywords"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($meDiaryVideo)): $i = 0; $__LIST__ = array_slice($meDiaryVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$meDiary): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank"  href="/play/index/id/<?php echo ($meDiary["id"]); ?>.html" title="<?php echo ($meDiary["title"]); ?>"><?php echo ($meDiary["title"]); ?></a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($meDiaryVideo)): $i = 0; $__LIST__ = array_slice($meDiaryVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$meDiary): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"><a target="_blank" href="/play/index/id/<?php echo ($meDiary["id"]); ?>.html"    title="<?php echo ($meDiary["title"]); ?>">
                                    <?php if(mb_strlen($meDiary['title'],'utf-8')>9){ echo mb_substr($meDiary['title'],0,8,'utf-8')."..."; }else{ echo $meDiary['title']; } ?>
                                </a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li> <span class="lmList_Col1"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($jkThreePointsCid["id"]); ?>.html"><?php echo ($jkThreePointsCid["name"]); ?></a></h3>
                            <p class="lm_Time"><?php echo ($jkThreePointsCid["programtime"]); ?>&nbsp;</p>
                        <?php if(is_array($jkThreePointsVideo)): $i = 0; $__LIST__ = array_slice($jkThreePointsVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkThreePoints): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($jkThreePoints["id"]); ?>.html"    title="<?php echo ($jkThreePoints["title"]); ?>" class="lm_Imgcon"> <img src="<?php echo ($jkThreePoints["photo"]); ?>" alt="<?php echo ($jkThreePoints["keywords"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jkThreePointsVideo)): $i = 0; $__LIST__ = array_slice($jkThreePointsVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkThreePoints): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank" href="/play/index/id/<?php echo ($jkThreePoints["id"]); ?>.html"   title="<?php echo ($jkThreePoints["title"]); ?>"><?php echo ($jkThreePoints["title"]); ?></a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jkThreePointsVideo)): $i = 0; $__LIST__ = array_slice($jkThreePointsVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkThreePoints): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"><a target="_blank" href="/play/index/id/<?php echo ($jkThreePoints["id"]); ?>.html"   title="<?php echo ($jkThreePoints["title"]); ?>">
                                    <?php if(mb_strlen($jkThreePoints['title'],'utf-8')>9){ echo mb_substr($jkThreePoints['title'],0,8,'utf-8')."..."; }else{ echo $jkThreePoints['title']; } ?>
                                </a></h4><?php endforeach; endif; else: echo "" ;endif; ?>

                        </li>
                        <li> <span class="lmList_Col2"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($mxnxsCid["id"]); ?>.html"  ><?php echo ($mxnxsCid["name"]); ?></a></h3>
                            <p class="lm_Time"><?php echo ($mxnxsCid["programtime"]); ?></p>
                        <?php if(is_array($mxnxsVideo)): $i = 0; $__LIST__ = array_slice($mxnxsVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mxnxs): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($mxnxs["id"]); ?>.html" title="<?php echo ($mxnxs["title"]); ?>"   class="lm_Imgcon"> <img src="<?php echo ($mxnxs["photo"]); ?>" alt="<?php echo ($mxnxs["keywords"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($mxnxsVideo)): $i = 0; $__LIST__ = array_slice($mxnxsVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mxnxs): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank" href="/play/index/id/<?php echo ($mxnxs["id"]); ?>.html" title="<?php echo ($mxnxs["title"]); ?>"  ><?php echo ($mxnxs["title"]); ?></a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($mxnxsVideo)): $i = 0; $__LIST__ = array_slice($mxnxsVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mxnxs): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"><a target="_blank" href="/play/index/id/<?php echo ($mxnxs["id"]); ?>.html" title="<?php echo ($mxnxs["title"]); ?>"  >
                                    <?php if(mb_strlen($mxnxs['title'],'utf-8')>9){ echo mb_substr($mxnxs['title'],0,8,'utf-8')."..."; }else{ echo $mxnxs['title']; } ?>
                                </a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li> <span class="lmList_Col1"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($jkydCid["id"]); ?>.html"><?php echo ($jkydCid["name"]); ?></a></h3>
                            <p class="lm_Time"><?php echo ($jkydCid["programtime"]); ?></p>
                        <?php if(is_array($jkydVideo)): $i = 0; $__LIST__ = array_slice($jkydVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkyd): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($jkyd["id"]); ?>.html"    title="<?php echo ($jkyd["title"]); ?>" class="lm_Imgcon"> <img src="<?php echo ($jkyd["photo"]); ?>" alt="<?php echo ($jkyd["keywords"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jkydVideo)): $i = 0; $__LIST__ = array_slice($jkydVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkyd): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank" href="/play/index/id/<?php echo ($jkyd["id"]); ?>.html"   title="<?php echo ($jkyd["title"]); ?>"><?php echo ($jkyd["title"]); ?></a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jkydVideo)): $i = 0; $__LIST__ = array_slice($jkydVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkyd): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"><a target="_blank" href="/play/index/id/<?php echo ($jkyd["id"]); ?>.html"   title="<?php echo ($jkyd["title"]); ?>">
                                    <?php if(mb_strlen($jkyd['title'],'utf-8')>9){ echo mb_substr($jkyd['title'],0,8,'utf-8')."..."; }else{ echo $jkyd['title']; } ?>
                                </a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li>
                            <span class="lmList_Col2"></span>
                            <h3><a target="_blank" href="/tv/tvlist/cate/<?php echo ($vitaImpulsionCid["id"]); ?>.html"><?php echo ($vitaImpulsionCid["name"]); ?></a></h3>
                            <p class="lm_Time"><?php echo ($vitaImpulsionCid["programtime"]); ?></p>
                        <?php if(is_array($vitaImpulsionVideo)): $i = 0; $__LIST__ = array_slice($vitaImpulsionVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vitaImpulsion): $mod = ($i % 2 );++$i;?><a target="_blank" href="/play/index/id/<?php echo ($vitaImpulsion["id"]); ?>.html" title="<?php echo ($vitaImpulsion["title"]); ?>"   class="lm_Imgcon"> <img src="<?php echo ($vitaImpulsion["photo"]); ?>" alt="<?php echo ($vitaImpulsion["keywords"]); ?>" /> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($vitaImpulsionVideo)): $i = 0; $__LIST__ = array_slice($vitaImpulsionVideo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vitaImpulsion): $mod = ($i % 2 );++$i;?><h4 class="lm_ImgBt"><a target="_blank" href="/play/index/id/<?php echo ($vitaImpulsion["id"]); ?>.html" title="<?php echo ($vitaImpulsion["title"]); ?>"  ><?php echo ($vitaImpulsion["title"]); ?>&nbsp;&nbsp;</a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($vitaImpulsionVideo)): $i = 0; $__LIST__ = array_slice($vitaImpulsionVideo,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vitaImpulsion): $mod = ($i % 2 );++$i;?><h4 class="lm_VideoBt" style="margin-top:5px"><a target="_blank" href="/view/7922.html" title="<?php echo ($vitaImpulsion["title"]); ?>"  >
                                    <?php if(mb_strlen($vitaImpulsion['title'],'utf-8')>9){ echo mb_substr($vitaImpulsion['title'],0,8,'utf-8')."..."; }else{ echo $vitaImpulsion['title']; } ?>
                                </a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="right_content">
                    <div class="adv306X255">
                    <a href='http://p.yiqifa.com/s?sid=9848604e42991f18&pid=519177&wid=742573&vid=304620&cid=6887&lid=243584&euid=&vwid=' target='_blank'><img border='0'  width='306'  height='255'  src='http://p.yiqifa.com/image?sid=9848604e42991f18&pid=519177&wid=742573&vid=304620&cid=6887&lid=243584&euid=&vwid=' ></a>
                    </div>
                    <div class="heaththing">
                        <h2 class="heaththingh2"><a href="#" target="_blank"><img src="__PUBLIC__/Images/home/index/common/dashijianh2.png" width="129" height="34" /></a></h2>
                        <div class="thingcontent" id="focus4">
                            <ul>
                                <li>
                                    <dl>
                                        <dt><a target="_blank" href="http://old.jkwshk.tv/news/jkws/dsj/lset/201307111158.html"><img src="__PUBLIC__/Images/home/index/content/health-event-01.jpg" width="307" height="238" title="关注西部留守儿童健康公益行"/></a></dt>
                                        <dd><a target="_blank" href="http://old.jkwshk.tv/news/jkws/dsj/lset/201307111158.html" style=" font-weight:bold;">关注西部留守儿童健康公益行</a></dd>
                                    </dl>
                                    <p class="dashijianjianjie">留守儿童是我国城乡二元体制的一个衍生物，是一个酸楚的名称。留守的背后，还有什么？或者说，还剩什么？</p>
                                </li>
                                <li>
                                    <dl>
                                        <dt><a target="_blank" href="http://old.jkwshk.tv/news/jkws/zj/dz/2013/0801/1317.html"><img src="__PUBLIC__/Images/home/index/content/health-event-02.jpg" width="307" height="238" title="探访定西地震现场"/></a></dt>
                                        <dd><a target="_blank" href="http://old.jkwshk.tv/news/jkws/zj/dz/2013/0801/1317.html" style=" font-weight:bold;">探访定西地震现场</a></dd>
                                    </dl>
                                    <p class="dashijianjianjie">健康卫视记者深入地震的重灾区岷县，第一时间将灾区最新动态传递给您。</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="adv306X143"><a href="http://www.jkwshk.tv/tv/tvlist/cate/39.html" target="_blank"><img src="__PUBLIC__/Images/home/index/data/j-1.jpg" width="306" w height="143" /></a><!--//广告位图片--></div>
                </div>
            </div>
            <!--卫视节目代码结束-->
            <div class="adv1000X90">
            <a href='http://p.yiqifa.com/s?sid=624a221ca10e1d30&pid=519177&wid=742573&vid=38389&cid=4501&lid=342977&euid=&vwid=' target='_blank'><img border='0'  width='1000'  height='90'  src='http://p.yiqifa.com/image?sid=624a221ca10e1d30&pid=519177&wid=742573&vid=38389&cid=4501&lid=342977&euid=&vwid=' ></a>         
             </div>
            <!--创意短片代码开始-->
            <div class="m_content">
                <h2 class="m_content_h2"><a href="/originality/index.html" target="_blank">创意短片</a></h2>
                <div class="shortmovie">
                    <ul>
                        <li>
                            <h2><span><a href="/originality/cateList/cid/<?php echo ($programVideoCatId["id"]); ?>.html" target="_blank">更多</a></span>· 节目宣传片 </h2>
                        <?php if(is_array($programVideo)): $i = 0; $__LIST__ = $programVideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$program): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/play/index/id/<?php echo ($program["id"]); ?>.html" target="_blank" title="<?php echo ($program["title"]); ?>"><img src="<?php echo ($program["photo"]); ?>" width="145" height="88" /></a></dt>
                                <dd><a href="/play/index/id/<?php echo ($program["id"]); ?>.html" target="_blank" title="<?php echo ($program["title"]); ?>"><?php echo ($program["title"]); ?></a></dd>
                                <dd><?php echo ($program["description"]); ?></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li>
                            <h2><span><a href="/originality/cateList/cid/<?php echo ($commonWealCatId["id"]); ?>.html" target="_blank">更多</a></span>· 创意公益短片 </h2>
                        <?php if(is_array($commonWealVIdeo)): $i = 0; $__LIST__ = $commonWealVIdeo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$commonWeal): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/play/index/id/<?php echo ($commonWeal["id"]); ?>.html" target="_blank" title="<?php echo ($commonWeal["title"]); ?>"><img src="<?php echo ($commonWeal["photo"]); ?>" alt="<?php echo ($commonWeal["keywords"]); ?>" title="<?php echo ($commonWeal["title"]); ?>" width="145" height="88" /></a></dt>
                                <dd><a href="#" target="_blank" title="<?php echo ($commonWeal["title"]); ?>"><?php echo ($commonWeal["title"]); ?></a></dd>
                                <dd><?php echo ($commonWeal["description"]); ?></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li>
                            <h2><span><a href="/originality/cateList/cid/<?php echo ($advertiseMentCatId["id"]); ?>.html" target="_blank">更多</a></span>创意广告短片 </h2>
                        <?php if(is_array($advertiseMentVIdeo)): $i = 0; $__LIST__ = $advertiseMentVIdeo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$advertiseMent): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/play/index/id/<?php echo ($advertiseMent["id"]); ?>.html" target="_blank" title="<?php echo ($advertiseMent["title"]); ?>"><img src="<?php echo ($advertiseMent["photo"]); ?>" alt="<?php echo ($advertiseMent["keywords"]); ?>" title="<?php echo ($advertiseMent["title"]); ?>" width="145" height="88" /></a></dt>
                                <dd><a href="<?php echo ($advertiseMent["title"]); ?>" target="_blank" title="<?php echo ($advertiseMent["title"]); ?>"><?php echo ($advertiseMent["title"]); ?></a></dd>
                                <dd><?php echo ($advertiseMent["description"]); ?></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>

                        </li>
                        <li>
                            <h2><span><a href="/originality/catelist/cid/<?php echo ($funnyCatId["id"]); ?>.html" target="_blank">更多</a></span>· 创意搞笑短片 </h2>
                        <?php if(is_array($funnyVIdeo)): $i = 0; $__LIST__ = $funnyVIdeo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$funny): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/play/index/id/<?php echo ($funny["id"]); ?>.html" target="_blank" title="<?php echo ($funny["title"]); ?>"><img src="<?php echo ($funny["photo"]); ?>" width="145" height="88" /></a></dt>
                                <dd><a href="/play/index/id/<?php echo ($funny["id"]); ?>.html" target="_blank" title="<?php echo ($funny["title"]); ?>"><?php echo ($funny["title"]); ?></a></dd>
                                <dd><?php echo ($funny["description"]); ?></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="right_content">
                    <div class="sevenbady">
                        <h2 class="sevenbadyh2"><a href="/sevenbaby/index.html" target="_blank"><img src="__PUBLIC__/Images/home/index/common/sevenbady.png" width="149" height="33" /></a></h2>
                                    <ul>
                            <li class="fristbli">
                                <p style=" float:left; "><a href=" http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1236.html" target="_blank">
                                        <img src="__PUBLIC__/Images/7baby/01.jpg" width="80" height="80" /></a></p>
                                <p style=" float:left;margin-left:10px; text-align:left;"> <span><b><a href=" http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1236.html" target="_blank">张嘉莉 张嘉琪</a></b></span><br />
                                    <span>性别：女</span><br />
                                    <span>城市：惠州</span><br />
                                    <span>出生日期：2011.09.13</span></p>
                            </li>
                            <li><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1244.html" target="_blank"><img src="__PUBLIC__/Images/7baby/02.jpg" width="80" height="80" /></a><span><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1244.html" target="_blank">鄂萌希</a></span></li>
                            <li><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1252.html" target="_blank"><img src="__PUBLIC__/Images/7baby/03.jpg" width="80" height="80" /></a><span><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1252.html" target="_blank">施彭瑜菲</a></span></li>
                            <li><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1193.html" target="_blank"><img src="__PUBLIC__/Images/7baby/04.jpg" width="80" height="80" /></a><span><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1193.html" target="_blank">雷旃琦</a></span></li>
                            <li><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1242.html" target="_blank"><img src="__PUBLIC__/Images/7baby/05.jpg" width="80" height="80" /></a><span><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1242.html" target="_blank">徐梓恒</a></span></li>
                            <li><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1204.html" target="_blank"><img src="__PUBLIC__/Images/7baby/06.jpg" width="80" height="80" /></a><span><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1204.html" target="_blank">白奕萱</a></span></li>
                            <li><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1246.html" target="_blank"><img src="__PUBLIC__/Images/7baby/07.jpg" width="80" height="80" /></a><span><a href="http://www.jkwshk.tv/sevenbaby/babyshow/mod/mod/type/idnum/keyword/1246.html" target="_blank">鲍梓豪 鲍梓萱</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--创意短片代码结束--> 
            <!--生活代码开始-->
            <div class="m_content">
                <h2 class="m_content_h2">生 &nbsp; &nbsp;&nbsp;活</h2>
                <div class="lifecontent">
                    <ul>
                        <li>
                            <h2>· 美容 </h2>
                        <?php if(is_array($hairdrVideo)): $i = 0; $__LIST__ = $hairdrVideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hairdr): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/play/index/id/<?php echo ($hairdr["id"]); ?>.html" target="_blank"><img src="<?php echo ($hairdr["photo"]); ?>" alt="<?php echo ($hairdr["keywords"]); ?>" title="<?php echo ($hairdr["title"]); ?>"  width="145" height="88" /></a></dt>
                                <dd><a href="/play/index/id/<?php echo ($hairdr["id"]); ?>.html" target="_blank"  title="<?php echo ($hairdr["title"]); ?>"><?php echo ($hairdr["title"]); ?></a></dd>
                                <dd><?php echo ($hairdr["description"]); ?></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li>
                            <h2><span><a href="/beautiful/index.html" target="_blank">更多</a></span></h2>
                            <div class="lifeseclidiv">
                                <?php if(is_array($hairdrNews)): $i = 0; $__LIST__ = array_slice($hairdrNews,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hairdrN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($hairdrN["id"]); ?>.html" target="_blank" class="f16" title="<?php echo ($hairdrN["title"]); ?>">[<?php echo ($hairdrN["title"]); ?>]</a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php if(is_array($hairdrNews)): $i = 0; $__LIST__ = array_slice($hairdrNews,1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hairdrN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($hairdrN["id"]); ?>.html" target="_blank" title="<?php echo ($hairdrN["title"]); ?>"><?php echo ($hairdrN["title"]); ?></a> </p><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php if(is_array($hairdrNews)): $i = 0; $__LIST__ = array_slice($hairdrNews,2,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hairdrN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($hairdrN["id"]); ?>.html" target="_blank" class="f16" title="<?php echo ($hairdrN["title"]); ?>">[<?php echo ($hairdrN["title"]); ?>] </a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php if(is_array($hairdrNews)): $i = 0; $__LIST__ = array_slice($hairdrNews,3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hairdrN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($hairdrN["id"]); ?>.html" target="_blank" title="<?php echo ($hairdrN["title"]); ?>"><?php echo ($hairdrN["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>  
                            </div>
                        </li>
                        <li>
                            <h2>·  养生 </h2>
                        <?php if(is_array($healthCareVideo)): $i = 0; $__LIST__ = $healthCareVideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$healthCare): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/play/index/id/<?php echo ($healthCare["id"]); ?>.html" target="_blank">
                                    <img src="<?php echo ($healthCare["photo"]); ?>" alt="<?php echo ($healthCare["keywords"]); ?>" title="<?php echo ($healthCare["title"]); ?>"  width="145"  height="88" /></a></dt>
                                <dd><a href="/play/index/id/<?php echo ($healthCare["id"]); ?>.html" target="_blank"  title="<?php echo ($healthCare["title"]); ?>"><?php echo ($healthCare["title"]); ?></a></dd>
                                <dd><?php echo ($healthCare["description"]); ?></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li>
                            <h2><span><a href="/healthcare.html" target="_blank">更多</a></span></h2>
                            <div class="lifeseclidiv">
                                <?php if(is_array($healthCareNews)): $i = 0; $__LIST__ = array_slice($healthCareNews,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$healthCareN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($healthCareN["id"]); ?>.html" target="_blank" class="f16" title="<?php echo ($healthCareN["title"]); ?>">[<?php echo ($healthCareN["title"]); ?>]</a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php if(is_array($healthCareNews)): $i = 0; $__LIST__ = array_slice($healthCareNews,1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$healthCareN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($healthCareN["id"]); ?>.html" target="_blank" title="<?php echo ($healthCareN["title"]); ?>"><?php echo ($healthCareN["title"]); ?></a> </p><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php if(is_array($healthCareNews)): $i = 0; $__LIST__ = array_slice($healthCareNews,2,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$healthCareN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($healthCareN["id"]); ?>.html" target="_blank" class="f16" title="<?php echo ($healthCareN["title"]); ?>">[<?php echo ($healthCareN["title"]); ?>] </a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php if(is_array($healthCareNews)): $i = 0; $__LIST__ = array_slice($healthCareNews,3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$healthCareN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($healthCareN["id"]); ?>.html" target="_blank" title="<?php echo ($healthCareN["title"]); ?>"><?php echo ($healthCareN["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?> 
                            </div>
                        </li>
                        <li>
                            <h2>· 时尚 </h2>
                        <?php if(is_array($fashionVideo)): $i = 0; $__LIST__ = array_slice($fashionVideo,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fashion): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/play/index/id/<?php echo ($fashion["id"]); ?>.html" target="_blank">
                                    <img src="<?php echo ($fashion["photo"]); ?>" alt="<?php echo ($fashion["keywords"]); ?>" title="<?php echo ($fashion["title"]); ?>"  width="145"  height="88" /></a></dt>
                                <dd><a href="/play/index/id/<?php echo ($fashion["id"]); ?>.html" target="_blank" title="<?php echo ($fashion["title"]); ?>" ><?php echo ($fashion["title"]); ?></a></dd>
                                <dd><?php echo ($fashion["description"]); ?></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li>
                            <h2><span><a href="/fashion/index.html" target="_blank">更多</a></span></h2>
                            <div class="lifeseclidiv">
                                <?php if(is_array($fashionNews)): $i = 0; $__LIST__ = array_slice($fashionNews,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fashionN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($fashionN["id"]); ?>.html" target="_blank" class="f16" title="<?php echo ($fashionN["title"]); ?>">[<?php echo ($fashionN["title"]); ?>]</a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php if(is_array($fashionNews)): $i = 0; $__LIST__ = array_slice($fashionNews,1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fashionN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($fashionN["id"]); ?>.html" target="_blank" title="<?php echo ($fashionN["title"]); ?>"><?php echo ($fashionN["title"]); ?></a> </p><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php if(is_array($fashionNews)): $i = 0; $__LIST__ = array_slice($fashionNews,2,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fashionN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($fashionN["id"]); ?>.html" target="_blank" class="f16" title="<?php echo ($fashionN["title"]); ?>">[<?php echo ($fashionN["title"]); ?>] </a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php if(is_array($fashionNews)): $i = 0; $__LIST__ = array_slice($fashionNews,3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fashionN): $mod = ($i % 2 );++$i;?><p><a href="/news/view/id/<?php echo ($fashionN["id"]); ?>.html" target="_blank" title="<?php echo ($fashionN["title"]); ?>"><?php echo ($fashionN["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?> 
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right_content">
                    <div class="food">
                        <h2 class="foodh2"><a href="#" target="_blank"><img src="__PUBLIC__/Images/home/index/common/meishititle.png" width="93" height="35" /></a></h2>
                        <div class="foodcontent" id="focus5">
                            <ul>
                                <?php if(is_array($foodList2)): $i = 0; $__LIST__ = $foodList2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$food): $mod = ($i % 2 );++$i;?><li>
                                        <dl>
                                            <dt><a target="_blank" href="/photo/view/id/<?php echo ($food["id"]); ?>.html"><img src="<?php echo ($food["topimg"]); ?>" width="306" height="238" alt="<?php echo ($food["keywords"]); ?>" /></a></dt>
                                            <dd><a target="_blank" href="/photo/view/id/<?php echo ($food["id"]); ?>.html" style="font-weight:bold;"><?php echo ($food["name"]); ?></a></dd>
                                        </dl>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="adv306X255"><a href='http://p.yiqifa.com/s?sid=60925b87a3a5d8b8&pid=519177&wid=742573&vid=125697&cid=6530&lid=344678&euid=&vwid=' target='_blank'><img border='0'  width='306'  height='255'  src='http://p.yiqifa.com/image?sid=60925b87a3a5d8b8&pid=519177&wid=742573&vid=125697&cid=6530&lid=344678&euid=&vwid=' ></a></div>
                </div>
            </div>
            <!--生活代码结束-->
            <div class="adv1000X90_01">
<a href='http://p.yiqifa.com/s?sid=58c138a020577632&pid=519177&wid=742573&vid=45429&cid=4712&lid=295417&euid=&vwid=' target='_blank'><img border='0'  width='950'  height='90'  src='http://p.yiqifa.com/image?sid=58c138a020577632&pid=519177&wid=742573&vid=45429&cid=4712&lid=295417&euid=&vwid=' ></a>
            </div>
            <!--瑜伽综艺代码开始-->
            <div class="m_content">
                <div class="yujiazongyi">
                    <ul>
                        <li>
                            <h2><span><a href="/tv/tvlist/cate/38.html" target="_blank">更多</a></span>· 瑜伽 </h2>
                        <?php if(is_array($yogaVideo)): $i = 0; $__LIST__ = $yogaVideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yoga): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/play/index/id/<?php echo ($yoga["id"]); ?>.html" target="_blank"><img src="<?php echo ($yoga["photo"]); ?>" width="145" height="88" /></a></dt>
                                <dd><a href="/play/index/id/<?php echo ($yoga["id"]); ?>.html" target="_blank"><?php echo ($yoga["title"]); ?></a></dd>
                                <dd><?php echo ($yoga["description"]); ?></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li>
                            <h2><span><a href="/tv/tvlist/cate/250.html" target="_blank">更多</a></span>·  综艺 </h2>
                        <?php if(is_array($varietyVideo)): $i = 0; $__LIST__ = $varietyVideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$variety): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/play/index/id/<?php echo ($variety["id"]); ?>.html" title="<?php echo ($variety["title"]); ?>" target="_blank"><img src="<?php echo ($variety["photo"]); ?>" width="145" height="88" /></a></dt>
                                <dd><a href="/play/index/id/<?php echo ($variety["id"]); ?>.html" title="<?php echo ($variety["title"]); ?>" target="_blank"><?php echo ($variety["title"]); ?></a></dd>
                                <dd><?php echo ($variety["description"]); ?></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="right_content">
                    <div class="adv306X143"><a href="#" target="_blank"><img src="__PUBLIC__/Images/home/index/data/baby-1.jpg" width="306" height="144" /></a></div>
                     <div class="adv306X200">
                    <a href="http://www.jkwshk.tv/tv/tvlist/cate/7.html" title="健康全纪录" target="_blank"><img src="__PUBLIC__/Images/home/index/content/ad003.jpg" width="306" height="200" /></a>
                    </div>
                </div>
            </div>
            <!--瑜伽综艺代码结束--> 
            <!--营养师代码开始-->
            <div class="m_content">
                <h2 class="m_content_h2"><a href="/dietitians/index.html" target="_blank">营养师</a></h2>
                <div class="yingyangshi"> 
                    <!--营养师代码-->  
                    <iframe width="654" height="360" style="margin-top:5px;" frameborder="0" scrolling="no" src="http://widget.weibo.com/list/list.php?language=zh_cn&width=654&height=360&listid=3647019870108623&appkey=2833402820&uname=%E5%81%A5%E5%BA%B7%E5%8D%AB%E8%A7%86&uid=2232993991&listname=%E8%90%A5%E5%85%BB%E5%B8%88&color=&showcreate=0&isborder=0&info=0&sidebar=0&footbar=1&skin=3&dpc=1"></iframe>
                <div class="yingyangshi1"> </div>
                </div>
                <div class="right_content">
                    <div class="adv306X259"><a href="http://www.jkwshk.tv/tv/TvList/cate/214.htm" target="_blank"><img src="__PUBLIC__/Images/home/index/data/bk-1.jpg" width="306" height="259" /></a></div>
                    <div class="adv306X81"><a href="http://dobodo.taobao.com/?spm=a1z10.5.w5001-3683638168.2.cD4yDL&scene=taobao_shop" target="_blank"><img src="__PUBLIC__/Images/home/index/data/X8.jpg" width="306" height="81" /></a></div>
                </div>
            </div>
            <!--营养师代码结束--> 
            <!--主播留言大家代码开始-->
            <div class="m_content" style="clear:both;">
                <div class="zhubo">
                    <h2><a href="javascript:void(0); " target="_blank" title="当家主播">
                            <img src="__PUBLIC__/Images/home/index/common/zhubotitle.png" width="113" height="35" alt="主播风采" />
                        </a>
                    </h2> 
                    <div id="scroll3_area">
                        <ul id="scroll3">
                         <?php if(is_array($anchor)): $i = 0; $__LIST__ = $anchor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$anc): $mod = ($i % 2 );++$i;?><li><a href="www.jkwshk.tv/view/<?php echo ($anc["id"]); ?>.html" target="_blank"><img src="<?php echo ($anc["photo"]); ?>" width="76" height="76" /> </a>
                  <p class="zhuboinfo" ><a href="www.jkwshk.tv/view/<?php echo ($anc["id"]); ?>.html" target="_blank"><?php echo ($anc["name"]); ?></a><a href="old.jkwshk.tv/view/<?php echo ($anc["id"]); ?>.html" target="_blank" class="zhubohome"></a><a rel="nofollow" href="<?php echo ($anc["microblog"]); ?>" target="_blank" class="zhuboweibo"></a></p>
                          </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>                         
					<script type='text/javascript' src='__PUBLIC__/js/home/index/fscroll.js'>/*主播展示*/</script> 
                    <script>
                    window.onload = scroll3;
                    var scroll3 =new fScroll({containerId:"scroll3",direction:"up"});
                    scroll3.Start();
                    </script>                   
                </div>
                
                <div class="messages">
                    <h2><img src="__PUBLIC__/Images/home/index/common/liuyan.png" width="113" height="35" alt="留言动态"  /></h2>
                    <ul class="mulitline">
                        <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                <p><span class="onespan">来自<?php if(empty($v["city"])): ?>[<?php echo ($v["country"]); ?>]<?php else: ?>[<?php echo ($v["province"]); echo ($v["city"]); ?>]<?php endif; ?>的网友 在</span>
                                    <a target="_blank" href="<?php echo ($v["link"]); ?>" ><?php echo ($v["title"]); ?></a><span class="twospan">中发表评论于<?php echo (date('Y-m-d',$v["ctime"])); ?></span></p>
                                <p><span class="content"> <a target="_blank" href="#" title="<?php echo ($v["msg"]); ?>" ><?php echo ($v["msg"]); ?></a></span></p>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div class="everyonesee">
                    <h2> <img src="__PUBLIC__/Images/home/index/common/seetitle.png" width="113" height="35" alt="大家都在看" /></h2>
                    <ul class="everyoneseepic">
                        <?php if(is_array($nowVideo)): $i = 0; $__LIST__ = array_slice($nowVideo,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$now): $mod = ($i % 2 );++$i;?><li><a  href="/play/index/id/<?php echo ($now["id"]); ?>.html"  target="_blank"·><img src="<?php echo ($now["photo"]); ?>" width="136" height="83" /></a>
                                <!--<p><a href="/play/index/id/<?php echo ($now["id"]); ?>.html" target="_blank"><?php echo (mb_substr($now["title"],0,10,'utf8')); ?></a></p>-->
                                <div class="title"><a href="/play/index/id/<?php echo ($now["id"]); ?>.html" target="_blank" title="<?php echo ($now["title"]); ?>"><?php echo ($now["title"]); ?></a></div>
                                <!--<p style=" color:#828282;"><?php echo ($now["description"]); ?>...</p>-->
                                <p class="title01">《<?php echo ($now["channel"]); ?>》</p>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    
                    <ul class="everyoneseelist">
                        <?php if(is_array($nowVideo)): $i = 0; $__LIST__ = array_slice($nowVideo,2,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a  href="/play/index/id/<?php echo ($v["id"]); ?>.html"  target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo (mb_substr($v["title"],0,10,'utf8')); ?> </a>
                                <span class="title01">《<?php echo ($v["channel"]); ?>》</span>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
              
                    </ul>
                </div>
            </div>
            <!--主播留言大家代码结束-->
           <!-- <div class="adv1000X90" style="margin:30px 0px;"></div> -->
        </div>
          
     <!--活动入口开始 -->
   <div id="box">
    <a href="http://weibo.com/p/100808ecca0f56661359d5595f36c1dab8b674?k=完美肌肤测出来&from=501&_from_=huati_topic" target="_blank" title="健康卫视喜迎国庆,德国C+K皮肤检测免费送"><img src="__PUBLIC__/Images/home/index/active/active.jpg" width="210" height="320" alt="活动入口" style="border:none;"/></a>
	<span class="box_title"><img src="__PUBLIC__/Images/home/index/active/active-left.png" width="10" height="11" /></span>
    </div>
    <script type="text/javascript"  src="__PUBLIC__/js/home/active.js" ></script>
    <!--活动入口结束 -->
    <!-- top代码开始 -->
    <div id="code"></div>
    <div id="code_img"></div>
    <a id="gotop" href="javascript:void(0)" title="返回顶部"></a>
    <!-- top代码结束 -->
    
    </div>
    <!--底部代码开始-->
    <div class="clear"></div>
    <!--底部代码开始-->
<div id="footer">
  <div class="f_content">
    <div class="footer_index">
      <div class="f_i_r">
        <div class="f_i_r1">
        <h2> <span>健康联盟</span> </h2>
        <ul>
        <li><a target="_blank" href="http://www.cnma.org.cn/" title="中国非处方药物协会" > <img src="__PUBLIC__/Images/home/index/upfile/20120315162525.jpg" width="130" height="50"  alt="中国非处方药物协会" /></a></li>
        <li><a target="_blank" href="http://cjmst.org/" title="中日医学科技交流协会" > <img src="__PUBLIC__/Images/home/index/upfile/20120315161533.jpg" width="130" height="50"  alt="中日医学科技交流协会" /></a></li>
        <li><a target="_blank" href="http://www.chmdf.cn/" title="中国医药公共事业发展基金会" > <img src="__PUBLIC__/Images/home/index/upfile/20120315152314.gif" width="130" height="50"  alt="中国医药公共事业发展基金会" /></a></li>
        <li><a target="_blank" href="http://www.cmda.gov.cn/" title="中国医师协会" > <img src="__PUBLIC__/Images/home/index/upfile/20120315161424.jpg" width="130" height="50"  alt="中国医师协会" /></a></li>
        <li><a target="_blank" href="http://www.who.int/topics/zh/" title="世界卫生组织" > <img src="__PUBLIC__/Images/home/index/upfile/20131021113105.png" width="130" height="50"  alt="世界卫生组织" /></a></li>
        </ul>
        </div>
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

    <!--二维码开始-->
    <div class="pcode">
        <div class="twoimg"> <a href="/bbs/" target="_blank"><img src="__PUBLIC__/Images/ad.png" width="130" height="400"  border="0"/></a>
         <a href="javascript:void(0)" class="close" title="关闭" ><img src="__PUBLIC__/Images/ad_close.png" width="16" height="16" class="close1"></a>
        </div>
    </div>

    
    <!--底部代码结束-->
    <div class="data" style="display:none"><a href="http://tp01.videocc.net/jkwshk/jkwshk/playlist.m3u8"></a></div>


    <script type="text/javascript">
        $(function() {
            window.onscroll = function() {
                var scooltop = document.documentElement.scrollTop + document.body.scrollTop;
                if (scooltop > 170) {
                    //do something
                    $(".displaysearch").css({display: "inherit", position: "fixed", bottom: "0px", width: "100%"});
                }
                else {
                    $(".displaysearch").css({position: "inherit"});
                }
            };
        });

        //单行应用	
        $(function() {
            var _wrap = $('ul.line');//定义滚动区域
            var _interval = 2000;//定义滚动间隙时间
            var _moving;//需要清除的动画
            _wrap.hover(function() {
                clearInterval(_moving);//当鼠标在滚动区域中时，停止滚动
            }, function() {
                _moving = setInterval(function() {
                    var _field = _wrap.find('li:first');//此变量不可放置于函数起始处，li:first取值是变化的
                    var _h = _field.height();//取得每次滚动高度
                    _field.animate({marginTop: -_h + 'px'}, 600, function() )
                }, _interval)//滚动间隔时间取决于_interval
            }).trigger('mouseleave');//函数载入时，模拟执行mouseleave，即自动滚动
        });

//多行应用
        $(function() {
            var _wrap = $('ul.mulitline');//定义滚动区域
            var _interval = 3000;//定义滚动间隙时间
            var _moving;//需要清除的动画
            _wrap.hover(function() {
                clearInterval(_moving);//当鼠标在滚动区域中时,停止滚动
            }, function() {
                _moving = setInterval(function() {
                    var _field = _wrap.find('li:first');//此变量不可放置于函数起始处，li:first取值是变化的
                    var _h = _field.height();//取得每次滚动高度
                    _field.animate({marginTop: -_h + 'px'}, 600, function() )
                }, _interval)//滚动间隔时间取决于_interval
            }).trigger('mouseleave');//函数载入时，模拟执行mouseleave，即自动滚动
        });
        
    </script>
    
    <!--返回顶部开始 -->
    <script>
    function b(){
	h = $(window).height();
	t = $(document).scrollTop();
	if(t > h){
		$('#gotop').show();
	}else{
		$('#gotop').hide();
	}
}
$(document).ready(function(e) {
	b();
	$('#gotop').click(function(){
		$(document).scrollTop(0);	
	})
	$('#code').hover(function(){
			$(this).attr('id','code_hover');
			$('#code_img').show();
		},function(){
			$(this).attr('id','code');
			$('#code_img').hide();
	})
	
});

$(window).scroll(function(e){
	b();		
})
    </script>

    </body>
</html>