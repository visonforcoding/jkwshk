<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        
<title><?php echo ($curViewPoint["title"]); ?>_健康卫视</title>

        
<meta name="keywords" content="健康新闻，食品安全，医疗卫生曝光，健康养生新知，健康热点，国际健康资讯，大健康资讯" />
<meta name="description" content="健康卫视网健康要闻频道网罗全球健康资讯，包含：食品安全、权威发布、国际健康资讯、健康新知、健康产业动态、医疗事故、健康百态、慈善公益新闻，以及微博、论坛里网友的健康知识分享等健康资讯和讯息。" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
<link href="__PUBLIC__/Css/home/viewpoint/global.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Css/home/viewpoint/style.css" rel="stylesheet" type="text/css" />

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
      <div class="subnavlogo"><a href="/Viewpoint"><img src="__PUBLIC__/Images/home/viewpoint/index_03.png" width="251" height="50" /></a></div>
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
<div id="main">
<!--banner start--> 
  <div id="banner_all">
    <div id="local">位置：健康卫视首页>健康视点>正文</div>
    <div id="banner">
      <div class="pic"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_03.png" width="640" height="290" /></a></div>
      <div class="con">
        <div class="title">第<font class="size28"><?php echo ($curViewPoint["issue"]); ?></font>期 /<?php echo ($curViewPoint["title"]); ?></div>
        <div class="line">&nbsp;</div>
        <div class="cons">导语:<?php echo ($curViewPoint["daoducontent"]); ?></div>
      </div>
    </div>
  </div>
  <!--banner end--> 
  
  <!--viewCon start-->
  <div id="viewCon_all">
    <div id="viewCon">
     <!--左边内容开始 -->
      <div class="left">
        <div class="con">
          <div class="reports"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_14.png" width="94" height="23" /></a></div>
          <div class="reports_list">
             <dl>
              <dt><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_18.png" width="150" height="90" /></a></dt>
              <dd>专家：口服胶原蛋白<br />抗衰老不靠普</dd>
             </dl>
                          <dl>
              <dt><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_18.png" width="150" height="90" /></a></dt>
              <dd>专家：口服胶原蛋白<br />抗衰老不靠普</dd>
             </dl>
                          <dl>
              <dt><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_18.png" width="150" height="90" /></a></dt>
              <dd>专家：口服胶原蛋白<br />抗衰老不靠普</dd>
             </dl>
                          <dl>
              <dt><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_18.png" width="150" height="90" /></a></dt>
              <dd>专家：口服胶原蛋白<br />抗衰老不靠普</dd>
             </dl>
          </div>
          <div class="news_list">
           <dl>
              <dt><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_34.png" width="229" height="22" /></a></dt>
              <dd><img src="__PUBLIC__/Images/home/viewpoint/view_33.png" width="200" height="150" /><p class="text-indent2">在高峰论坛上，来自中医和西医方面的专家就介绍了各自领域内的抗衰老经验和心得体会：</p>
              <p class="text-indent2">日月神集团董事主席、深圳市老年病学会会长殷广全教授在论坛上谈到：平时要吃六成饱，特别是晚饭吃多了，代谢不了，就成垃圾了。最好中午休息一会，一天的工作量要有计划，上午办完主要的工作。早晨不要跑步，容易中风，晚上走6000步，最好不穿鞋，接地气，改善酸性体质。</p>
              <p class="text-indent2">中国影像微创治疗专家，干细胞治疗专家任生任博士在论坛上还为大家介绍了一种名为细胞介入疗法的对抗衰老的先进技术。而对于流传甚广的口服胶原蛋白能延缓皮肤衰老的说法，任博士表示并不靠谱：“细胞再生，细胞增多他自然胶原蛋白就增多了，那么我们外来的胶原蛋白，它只是外面来的，而且胶原蛋白，通过吃这种形式来的话，到我们体内就分解了，我认为没有那么神奇。”任博士认为：如果心血管病人不做支架会死的。西医从细胞上阐述衰老，但中医的天人合一，道法自然，中西医结合对减轻糖尿病损伤血管、让皮肤年轻化是能做到的。良好的睡眠促进自体细胞器官修复起到抗衰老作用。<font class="color1">视频>></font></p>
</dd>
            </dl>
                        <dl>
              <dt><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_36.png" width="179" height="22" /></a></dt>
              <dd><img src="__PUBLIC__/Images/home/viewpoint/view_33.png" width="200" height="150" /><p class="text-indent2">在高峰论坛上，来自中医和西医方面的专家就介绍了各自领域内的抗衰老经验和心得体会：</p>
              <p class="text-indent2">日月神集团董事主席、深圳市老年病学会会长殷广全教授在论坛上谈到：平时要吃六成饱，特别是晚饭吃多了，代谢不了，就成垃圾了。最好中午休息一会，一天的工作量要有计划，上午办完主要的工作。早晨不要跑步，容易中风，晚上走6000步，最好不穿鞋，接地气，改善酸性体质。</p>
              <p class="text-indent2">中国影像微创治疗专家，干细胞治疗专家任生任博士在论坛上还为大家介绍了一种名为细胞介入疗法的对抗衰老的先进技术。而对于流传甚广的口服胶原蛋白能延缓皮肤衰老的说法，任博士表示并不靠谱：“细胞再生，细胞增多他自然胶原蛋白就增多了，那么我们外来的胶原蛋白，它只是外面来的，而且胶原蛋白，通过吃这种形式来的话，到我们体内就分解了，我认为没有那么神奇。”任博士认为：如果心血管病人不做支架会死的。西医从细胞上阐述衰老，但中医的天人合一，道法自然，中西医结合对减轻糖尿病损伤血管、让皮肤年轻化是能做到的。良好的睡眠促进自体细胞器官修复起到抗衰老作用。<font class="color1">视频>></font></p>
</dd>
             </dl>
          </div>
          <div class="weibo">
            <div class="title"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_33-39.png" width="141" height="21" /></a></div>
            <div class="prefecture">
              <div class="xinlang">此处显示  id "xinlang" 的内容</div>
              <div class="tencent">此处显示  id "xinlang" 的内容</div>
            </div>
          </div>
          <div class="new_viewpoint">
            <div class="view">
             <div class="title"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_42.png" width="70" height="21" /></a></div>
             <div class="news">
                <div class="count">167期</div>
                <div class="title1">“鬼压身”真相-睡眠瘫痪症</div>
                <div class="change"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_left.png" width="12" height="12" /></a><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_right.png" width="12" height="12" style="margin-left:4px;"/></a></div>
             </div>
             <div class="cons text-indent2">科学家们一直在用各种方法寻找外星人，但收获甚微，可是就有不少人说见过外星人。美国一个权威研究机构曾经特意调查过他们，在他们述说这段经历时使用测谎仪，并从中淘汰了70%的造...</div>
             <div class="scan"><a href="#">立即查看</a></div>
            </div>
            <div class="hot">
             <div class="title"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_45.png" width="46" height="21" /></a></div>
             <div class="list">
               <ul>
                 <li><a href="#">妇科体检检些啥？</a></li>
                 <li><a href="#">“雨人”的世界</a></li>
                 <li><a href="#">港医黄志浩：手足口病不用治</a></li>
                 <li><a href="#">朱莉切乳腺防癌 乳癌防治勿轻忽</a></li>
                 <li><a href="#">乡村医生后继无人的现实背后</a></li>
                 <li><a href="#">妇科体检检些啥？妇科体检检些啥？妇科体检检些啥？</a></li>
               </ul>
             </div>
            </div>
          </div>
          <div class="comment">
            <div class="title"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_52.png" width="46" height="21" /></a></div>
          </div>
<div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <!--左边内容结束 -->
      <!--右边内容开始 -->
      <div class="right">
        <div class="edit">
          <div class="current_edit">本期编辑</div>
          <div class="list">
             <dl>
               <dt><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_21.png" width="100" height="100" /></a></dt>
               <dd>
               <p class="name">文慧</p>
               <p class="con">共主创 <font class="color2">168</font> 期</p>
               </dd>
             </dl>
                  <dl>
               <dt><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/view_21.png" width="100" height="100" /></a></dt>
               <dd>
               <p class="name">文慧</p>
               <p class="con">共主创 <font class="color2">168</font> 期</p>
               </dd>
             </dl>
          </div>
        </div>
        <div class="shadow"></div>
        <div class="review">
          <div class="title">
            <div class="name">往期回顾</div>
            <div class="more">更多</div>
          </div>
          <div class="list">
            <ul>
              <li><a href="#">第159期：KTV上演夺命惊魂 麦克风是</a></li>
              <li><a href="#">第159期：KTV上演夺命惊魂 麦克风是</a></li>
              <li><a href="#">第159期：KTV上演夺命惊魂 麦克风是</a></li>
              <li><a href="#">第159期：KTV上演夺命惊魂 麦克风是</a></li>
              <li><a href="#">第159期：KTV上演夺命惊魂 麦克风是</a></li>
            </ul>
          </div>
        </div>
        <div class="shadow"></div>
        <div class="keyword">
            <ul>
              <li class="name1"><img src="__PUBLIC__/Images/home/viewpoint/view_point.png" width="4" height="4" /><span class="name"><a href="#">导语</a></span></li>
              <li class="name2"><img src="__PUBLIC__/Images/home/viewpoint/view_point.png" width="4" height="4" /><span class="name"><a href="#">中西医抗衰老高峰论坛</a></span></li>
              <li class="name3"><img src="__PUBLIC__/Images/home/viewpoint/view_point.png" width="4" height="4" /><span class="name"><a href="#">人为什么会衰老</a></span></li>
              <li class="name4"><img src="__PUBLIC__/Images/home/viewpoint/view_point.png" width="4" height="4" /><span class="name"><a href="#">微博话题墙</a></span></li>
              <li class="name5"><img src="__PUBLIC__/Images/home/viewpoint/view_point.png" width="4" height="4" /><span class="name"><a href="#">评论</a></span></li>
            </ul>
        </div>
      </div>
      <!--右边内容结束 -->
    </div>
  </div>
  <!--viewCon end--> 
  <div class="clear"></div>
  <div class="ma1"></div>
</div>
<!--中间代码结束--> 
 <div class="clear"></div>
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


    </body>
</html>