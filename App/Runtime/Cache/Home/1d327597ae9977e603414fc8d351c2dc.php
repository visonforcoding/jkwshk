<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        
    <title>健康视点_健康卫视</title>

        
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
        <div id="main2">
            <!--left start-->
            <div id="fl">
                <!--new_view start-->
                <div id="new_view">
                    <div class="title"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/index_06.png" width="166" height="33" /></a></div>
                    <div class="bar">
                        <div class="pic"><a href="#"><img src="<?php echo ($v["poster"]); ?>" width="262" height="252" /></a></div>
                        <div class="content">
                            <p class="name"><?php echo ($topViewpoint["title"]); ?></p>
                            <p class="con"><?php echo (mb_substr(strip_tags($topViewpoint["daoducontent"]),0,120,'utf-8')); ?>......</p>
                            <p class="more"><a href="/viewpoint/view/id/<?php echo ($topViewpoint["id"]); ?>.html"/>[详细点击]</a></p>
                        </div>
                    </div>
                </div>
                <!--new_view end--> 
                <!--before_view start-->
                <div id="before_view">
                    <div class="title"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/index_19.png" width="166" height="33" /></a></div>
                    <div class="bar">
                        <div class="list">
                            <?php if(is_array($viewpointList)): $i = 0; $__LIST__ = $viewpointList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl>
                                    <dt><a href="/viewpoint/view/id/<?php echo ($v["id"]); ?>.html"><img src="<?php echo ($v["poster"]); ?>" width="198" height="190" /></a></dt>
                                    <dd><?php echo (mb_substr(strip_tags($v["daoducontent"]),0,60,'utf-8')); ?>......</dd>
                                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div id="page" class="page">
                            <ul>
                                <?php echo ($page); ?>
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <!--before_view end-->
            </div>
            <!--left end-->
            <!--right start-->
            <div id="fr">
                <!--hot_view start-->
                <div id="hot_view">
                    <div class="title">
                        <div class="name"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/index_001.png" width="80" height="20" /></a></div>
                        <div class="change"><a href="/viewpoint/index.html}">换一批</a></div>
                    </div>
                    <div class="list">
                        <?php if(is_array($randViewpointList)): $i = 0; $__LIST__ = $randViewpointList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/viewpoint/view/id/<?php echo ($v["id"]); ?>.html"><img src="<?php echo ($v["poster"]); ?>" width="134" height="129" /></a></dt>
                                <dd>
                                    <p class="name"><?php echo ($v["title"]); ?></p>
                                    <p class="con"><?php echo (mb_substr(strip_tags($v["daoducontent"]),0,50,'utf-8')); ?>......</p>
                                </dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <!--hot_view end-->
                <!--adv280X195 start-->
                <div class="adv280X195"></div>
                <!--adv280X195 end-->

                <!--hot_pic start-->
                <div id="hot_pic">
                    <div class="title">
                        <div class="name"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/index_002.png" width="80" height="20" /></a></div>
                        <div class="change"><a href="#">更多</a></div>
                    </div>
                    <div class="list">
                        <?php if(is_array($hotPic)): $i = 0; $__LIST__ = array_slice($hotPic,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hp): $mod = ($i % 2 );++$i;?><dl>
                             <dt><a href="/photo/view/id/<?php echo ($hp["id"]); ?>.html">
                                <img src="<?php echo ($hp["topimg"]); ?>" width="133" height="92" /></a>
                             </dt>
                           <dd><?php echo ($hp["name"]); ?></dd>
                        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                       <?php if(is_array($hotPic)): $i = 0; $__LIST__ = array_slice($hotPic,1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hp): $mod = ($i % 2 );++$i;?><dl class="mr0">
                             <dt><a href="/photo/view/id/<?php echo ($hp["id"]); ?>.html">
                                <img src="<?php echo ($hp["topimg"]); ?>" width="133" height="92" /></a>
                             </dt>
                           <dd><?php echo ($hp["name"]); ?></dd>
                        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                             <?php if(is_array($hotPic)): $i = 0; $__LIST__ = array_slice($hotPic,2,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hp): $mod = ($i % 2 );++$i;?><dl>
                             <dt><a href="/photo/view/id/<?php echo ($hp["id"]); ?>.html">
                                <img src="<?php echo ($hp["topimg"]); ?>" width="133" height="92" /></a>
                             </dt>
                           <dd><?php echo ($hp["name"]); ?></dd>
                        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                      <?php if(is_array($hotPic)): $i = 0; $__LIST__ = array_slice($hotPic,3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hp): $mod = ($i % 2 );++$i;?><dl class="mr0">
                             <dt><a href="/photo/view/id/<?php echo ($hp["id"]); ?>.html">
                                <img src="<?php echo ($hp["topimg"]); ?>" width="133" height="92" /></a>
                             </dt>
                           <dd><?php echo ($hp["name"]); ?></dd>
                        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <!--hot_vpic end-->

                <!--hot_view start-->
                <div id="hot_video">
                    <div class="title">
                        <div class="name"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/index_003.png" width="80" height="20" /></a></div>
                        <div class="change"><a href="#">更多</a></div>
                    </div>
                    <div class="list">
                        <ul>
                            <?php if(is_array($hotCatVideo)): $i = 0; $__LIST__ = $hotCatVideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hcv): $mod = ($i % 2 );++$i;?><li><a title='<?php echo ($hcv["name"]); ?>' href='/play/index/pid/<?php echo ($hcv["id"]); ?>.html'><img width='133' height='156' alt='<?php echo ($hcv["name"]); ?>' src='<?php echo ($hcv["coverimage"]); ?>'></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 
                        </ul>
                    </div>
                </div>
                <!--hot_view end-->

                <!--adv280X195 start-->
                <div class="adv280X195"></div>
                <!--adv280X195 end-->

                <!--hot_news start-->
                <div id="hot_news">
                    <div class="title">
                        <div class="name"><a href="#"><img src="__PUBLIC__/Images/home/viewpoint/index_004.png" width="80" height="20" /></a></div>
                        <div class="change"><a href="#">更多</a></div>
                    </div>
                    <div class="list">
                        <ul>
                            <?php if(is_array($hotNews)): $i = 0; $__LIST__ = $hotNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hn): $mod = ($i % 2 );++$i;?><li><i><?php echo ($i); ?></i><a href='/news/view/id/<?php echo ($hn["id"]); ?>.html' target='_blank'>.<?php echo ($hn["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <!--hot_news end-->

                <!--adv280X195 start-->
                <div class="adv280X195"></div>
                <!--adv280X195 end-->

            </div>
            <div class="clear"></div>
            <!--right end-->
        </div>
        <div class="clear"></div>
        <div class="adv980X90" style="margin-top:30px;">此处显示  class "adv980X90" 的内容</div>
        <div class="clear"></div>
        <div class="ma1"></div>
    </div>
    <!--中间代码结束--> 
    <div class="clear"></div>
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