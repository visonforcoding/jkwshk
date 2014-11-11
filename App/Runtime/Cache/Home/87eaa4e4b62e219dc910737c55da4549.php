<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        
    <title><?php echo ($curNews["title"]); ?>_健康要闻_健康卫视</title>

        
    <meta name="keywords" content="<?php echo ($curNews["keywords"]); ?>" />
    <meta name="description" content="<?php echo ($curNews["description"]); ?>" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <link href="__PUBLIC__/Css/home/global.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/Css/home/view.css" rel="stylesheet" type="text/css" />

        <link href="__PUBLIC__/Css/home/common.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="__PUBLIC__/js/jquery1.10.2.js" ></script>
        <script type="text/javascript" src="__PUBLIC__/js/home/logined.js" ></script>
        
    <script type="text/javascript" src="__PUBLIC__/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
    <link href="__PUBLIC__/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css" rel="stylesheet" type="text/css" />
    <script>
        $(function() {
            SyntaxHighlighter.all();
        });
    </script>

        
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
        <div class="adv980X90"><a href="#" target="_blank"><img src="__PUBLIC__/Images/home/data/index_banner1.jpg" width="970" height="90" /></a></div>

        <!--大栏目代码-->
        <div class="subnav">
            <div class="subnavcontent">
                <div class="subnavlogo"><a href="#"><img src="__PUBLIC__/Images/home/logo_v.png" width="272" height="31" /></a></div>
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
        <div class="titlegps"><a href="/">首页</a>><a href="/news">健康要闻</a>>正文</div>
        <div class="v_content">
            <h1> <a><?php echo ($curNews["title"]); ?></a> <!--<i class="chose_1" title="独家报道"></i> --><!--(chose_1:独家报道、chose_2:独家专访、chose_3:国际资讯、chose_4:国际专访、chose_5:国际报道、chose_6:专题报道、)--> 
            </h1>
            <p class="dtitme"> 来源：<?php echo ($curNews["source"]); ?> &nbsp;作者：<?php echo ($curNews["writer"]); ?> &nbsp;<?php echo (date('Y-m-d H:i:s',$curNews["time"])); ?></p>
            <p class="p_tag"><i></i>标签：

            <?php if(is_array($newTagList)): $i = 0; $__LIST__ = $newTagList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="#" target="_blank"><?php echo ($v["tagname"]); ?></a>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
            <a class="fr" href="#"><img width="50" height="20" src="__PUBLIC__/Images/home/add.png"></a></p>
            <div class="daodu"><i>导读</i><?php echo ($curNews["description"]); ?> </div>

            <div class="ctext">
                <?php echo ($curNews["info"]); ?>
            </div>
            <!--<p class="peocommon">已有<a href="#"> 2 </a>条评论，共<a href="#"> 2 </a>人参与</p>-->
            <div class="news_share"> <i></i> 
                <!-- 分享 -->
                <div class="jiathis_style_24x24"> <a class="jiathis_button_qzone"></a> <a class="jiathis_button_tsina"></a> <a class="jiathis_button_tqq"></a> <a class="jiathis_button_renren"></a> <a class="jiathis_button_kaixin001"></a> <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a> <a class="jiathis_counter_style"></a> </div>
                <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script> 
                <!-- 分享 -->
            </div>
            <div class="disclaimer"> 【免责声明】本文仅代表作者个人观点，与健康卫视网站无关。其原创性以及文中陈述文
                字和内容未经本站证实，转载此文出于传递更多信息之目的，并不意味着赞同其观点或证
                实其描述。文章内容仅供参考，具体治疗及选购请咨询医生或相关专业人士。 </div>
            <div class="othernews">
                <h2> <a class="fr" href="#">更多>></a> 相关新闻 </h2>
                <ul>
                    <?php if(is_array($loveNewsList)): $i = 0; $__LIST__ = $loveNewsList;if( count($__LIST__)==0 ) : echo "暂时没有任何数据~" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li> <span><?php echo (date("y-m-d H:i:s",$v["time"])); ?></span> <a title="<?php echo ($v["title"]); ?>" href="/news/view/id/<?php echo ($v["id"]); ?>.html">·<?php echo ($v["title"]); ?></a> </li><?php endforeach; endif; else: echo "暂时没有任何数据~" ;endif; ?>
                </ul>
            </div>
            <!-- 评论开始 -->
            <div class="comment">

                <p class="commentnum">已有<a href="#"><?php echo ($totalComCount); ?> </a>条评论，共<a href="#"> <?php echo ($comUserCount); ?> </a>人参与</p>
<form action="#" method="">
    <div id="show"></div>
    <textarea name="msg" class="msgarea" cols="" rows=""s style="width:579px;"></textarea>
    <p class="commentlogin">
        <!--<span class="emotion">表情</span>-->
    <?php if(empty($user)): ?><!--   <input name="username" type="text" class="winput" />
                                <input name="password" class="winput" type="password" />
                                <input name="remember" type="checkbox"  class="checkboxinput"value="" checked />下次自动登录 -->
        <input  value="发布" class="upinput" onclick="javascript:showLogin();
                showForbid();
                void(0);" type="button" />
        </p>
        <?php else: ?>

        <a href="/member/index.html">
            <?php if(empty($user["nickname"])): echo ($user["username"]); else: echo ($user["nickname"]); endif; ?>
        </a> 
        <input  value="发布" class="upinput postComment" type="button" /></p><?php endif; ?>
</form>
<h2 class="newscomment">最新评论 <a href="#" class="reread">刷新</a></h2>
<ul class="commentlist">
    <?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
            <dl>
                <dt><img src="<?php echo ($v["avatar"]); ?>" width="50" height="50" /></dt>
                <dd class="namedate">
                    <span><?php if(empty($v["nickname"])): echo ($v["username"]); else: echo ($v["nickname"]); endif; ?> 
                        <?php if(empty($v["city"])): ?>[<?php echo ($v["country"]); ?>]<?php else: ?>[<?php echo ($v["province"]); echo ($v["city"]); ?>]<?php endif; ?>
                    </span>
                </dd>
                <dd><?php echo ($v["msg"]); ?></dd>
                <dd class="replay">
                    <span class="spandate">发表日期：<?php echo (date('Y-m-d H:i:s',$v["ctime"])); ?></span>
                    <!--                                <span class="renum1"><a href="#" onclick="support(<?php echo ($v["cid"]); ?>)" class="renum">支持(<?php echo ($v["support"]); ?>)</a></span>
                                                        <a href="#" class="repbt">回复</a> 
                                                    <span class="reshare1"><a href="javascript:void(0);" class="reshare">分享></a>
                                                      <span class="span1 bdsharebuttonbox"><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a></span>
                                                    </span> -->
                    <!--                                 <script>
                                            window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"我正在看健康卫视网《<?php echo ($video["title"]); ?>》，很不错噢！","bdMini":"1","bdMiniList":["mshare","qzone","renren"],"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","tqq","renren","weixin","qzone"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                                                    </script>-->
                </dd>
            </dl>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<div class="pagebg">
    <div id="page" class="page">
        <ul>
            <?php echo ($show); ?>
        </ul>
    </div>
</div>
<script>
   function postComment(ctype){
        $('.postComment').click(function() {
            var oid = '<?php echo ($video["id"]); ?>';
            var $obj = $(this).parents('p').prevAll('textarea.msgarea');
            var msg = $(this).parents('p').prevAll('textarea.msgarea').val();
            var ctype = ctype;
            if (msg == '') {
                $().toastmessage('showToast', {
                    text: '您未输入任何信息！',
                    sticky: false,
                    position: 'top-center',
                    type: 'error',
                    stayTime: 2000,
                });
                $obj.focus();
                return;
            }
            $.ajax({
                type: "POST",
                url: "/Comment/addComment.html",
                data: {'oid': oid, 'msg': msg, 'ctype': ctype},
                success: function(msg) {
                    if (msg.status) {
                        $('.commentlist').prepend('<li><dl><dt><img src="<?php echo ($user["avatar"]); ?>" width="50" height="50" />' +
                                '</dt><dd class="namedate"><span><?php if(empty($user["nickname"])): echo ($user["username"]); ?>' +
                                '<?php else: echo ($user["nickname"]); endif; ?>' +
                                '</span></dd><dd>' + msg.data.msg + '</dd><dd class="replay">' +
                                '<span class="spandate">发表日期：' + msg.data.time + '</span>'
//                                    <a href="#" onclick="support('+msg.data.support+')" class="renum">支持('+msg.data.support+')</a>' +
//                                    ' <span class="span1 bdsharebuttonbox"><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a></span>'+
//                                    '<a href="#" class="reshare">分享></a></dd></dl></li> '
                                );
                        $obj.val('');
                        $('.newscomment').after("<div class='commentpop' id='commentpop'></span>评论已提交。</div>");
                        setTimeout("$('.commentpop').remove()", 2500);
                    }
                    ;
                }
            });
        });
       }
</script>
                <script>
            $(function() {
                $('.postComment').click(function() {
                    var oid = '<?php echo ($curNews["id"]); ?>';
                    var $obj = $(this).parents('p').prevAll('textarea.msgarea');
                    var msg = $(this).parents('p').prevAll('textarea.msgarea').val();
                    var ctype = '新闻';
                    if (msg == '') {
                        $().toastmessage('showToast', {
                            text: '您未输入任何信息！',
                            sticky: false,
                            position: 'top-center',
                            type: 'error',
                            stayTime: 2000,
                        });
                        $obj.focus();
                        return;
                    }
                    $.ajax({
                        type: "POST",
                        url: "/Comment/addComment.html",
                        data: {'oid': oid, 'msg': msg, 'ctype': ctype},
                        success: function(msg) {
                            if (msg.status) {
                                $('.commentlist').prepend('<li><dl><dt><img src="<?php echo ($user["avatar"]); ?>" width="50" height="50" />' +
                                        '</dt><dd class="namedate"><span><?php if(empty($user["nickname"])): echo ($user["username"]); ?>' +
                                        '<?php else: echo ($user["nickname"]); endif; ?>' +
                                        '</span></dd><dd>' + msg.data.msg + '</dd><dd class="replay">' +
                                        '<span class="spandate">发表日期：' + msg.data.time + '</span>'
                                        //                                    <a href="#" onclick="support('+msg.data.support+')" class="renum">支持('+msg.data.support+')</a>' +
                                        //                                    ' <span class="span1 bdsharebuttonbox"><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a></span>'+
                                        //                                    '<a href="#" class="reshare">分享></a></dd></dl></li> '
                                        );
                                $obj.val('');
                                $('.newscomment').after("<div class='commentpop' id='commentpop'></span>评论已提交。</div>");
                                setTimeout("$('.commentpop').remove()", 2500);
                            }
                            ;
                        }
                    });
                });
            });
                </script>

            </div>
            <!-- 评论结束 -->

            <script type="text/javascript" charset="utf-8">
                $(function() {
                    $(".navctr").click(function() {
                        $(this).next(".navlist").slideToggle(0);
                    });
                    function show(svalue, hvalue, showvalue) {
                        $(svalue).mouseover(function() {
                            $(hvalue).removeClass("cleck");
                            $(this).children("a").addClass("cleck");
                            $num = $(this).index();
                            $(showvalue).hide();
                            $(showvalue).eq($num).show();
                        });
                    }
                    show('.playinfoul li', '.playinfoul li a', '.ishow');
                    $('.postComment').click(function() {
                        var oid = '<?php echo ($video["id"]); ?>';
                        var $obj = $(this).parents('p').prevAll('textarea.msgarea');
                        var msg = $(this).parents('p').prevAll('textarea.msgarea').val();
                        var ctype = '视频';
                        if (msg == '') {
                            $().toastmessage('showToast', {
                                text: '您未输入任何信息！',
                                sticky: false,
                                position: 'top-center',
                                type: 'error',
                                stayTime: 2000,
                            });
                            $obj.focus();
                            return;
                        }
                        $.ajax({
                            type: "POST",
                            url: "/Comment/addComment.html",
                            data: {'oid': oid, 'msg': msg, 'ctype': ctype},
                            success: function(msg) {
                                if (msg.status) {
                                    $('.commentlist').prepend('<li><dl><dt><img src="<?php echo ($user["avatar"]); ?>" width="50" height="50" />' +
                                            '</dt><dd class="namedate"><span><?php if(empty($user["nickname"])): echo ($user["username"]); ?>' +
                                            '<?php else: echo ($user["nickname"]); endif; ?>' +
                                            '</span></dd><dd>' + msg.data.msg + '</dd><dd class="replay">' +
                                            '<span class="spandate">发表日期：' + msg.data.time + '</span>'
//                                    <a href="#" onclick="support('+msg.data.support+')" class="renum">支持('+msg.data.support+')</a>' +
//                                    ' <span class="span1 bdsharebuttonbox"><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a></span>'+
//                                    '<a href="#" class="reshare">分享></a></dd></dl></li> '
                                            );
                                    $obj.val('');
                                    $('.newscomment').after("<div class='commentpop' id='commentpop'></span>评论已提交。</div>");
                                    setTimeout("$('.commentpop').remove()", 2500);
                                }
                                ;
                            }
                        });
                    });

                });
            </script>

        </div>

        <div class="v_right">

            <div class="hotnews">
                <h2><b>热度排行</b></h2>
                <ul>
                    <?php if(is_array($hotNews)): $k = 0; $__LIST__ = $hotNews;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li><i><?php echo ($k); ?></i><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                </ul>
            </div>

            <div class="adv335X300"></div>

            <div class="video">
                <h2><b>热门视频</b></h2>
                <ul>
                    <?php if(is_array($hotVideo)): $i = 0; $__LIST__ = $hotVideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><li><a href="/play/index/id/<?php echo ($vi["id"]); ?>.html"><img src="<?php echo ($vi["coverimage"]); ?>" width="133" height="156" /></a><span> <a class="bofang" href="/play/index/id/<?php echo ($vi["id"]); ?>.html"></a> </span></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>

            <div class="pic">
                <h2><b>热门图片</b></h2>
                <ul>
                    <?php if(is_array($hotPic)): $i = 0; $__LIST__ = $hotPic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a title="<?php echo ($v["name"]); ?>" href="/photo/view/id/<?php echo ($v["id"]); ?>.html"><img src="<?php echo ($v["topimg"]); ?>" title="<?php echo ($v["name"]); ?>" width="146" height="100" /></a><span class="span_title"><a href="/photo/view/id/<?php echo ($v["id"]); ?>.html" title="<?php echo ($v["name"]); ?>"><?php echo ($v["name"]); ?></a></span> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="adv335X180"></div>
        </div>

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