<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        
    <title><?php echo ($video["title"]); ?></title>

        
    <meta content="<?php echo ($video["keywords"]); ?>" name='keywords'/>
    <meta content="<?php echo ($video["description"]); ?>" name="description"/>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <link href="__PUBLIC__/Css/home/html/global.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/Css/home/html/play.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/css/home/html/content/logined1.css" rel="stylesheet" type="text/css" />
    <link href="/Public/toastmsg/css/jquery.toastmessage.css" rel="stylesheet" type="text/css" />

        <link href="__PUBLIC__/Css/home/common.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="__PUBLIC__/js/jquery1.10.2.js" ></script>
        <script type="text/javascript" src="__PUBLIC__/js/home/logined.js" ></script>
        
    <!--[if IE 6]> <script src="__PUBLIC__/Js/home/play/DD_belatedPNG.js"></script> <script>DD_belatedPNG.fix('.png_bg'); </script> <![endif]-->
    <script src="__PUBLIC__/Js/jquery1.10.2.js" type="text/javascript"></script>
    <script src="__PUBLIC__/Js/home/play/jquery.lazyload.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/home/html/logined1.js" ></script>
    <!--<script type="text/javascript" src="__PUBLIC__/Js/home/jQueryf.js"></script>-->
    <!--<script type="text/javascript" src="__PUBLIC__/Js/home/jquery.qqFace.js"></script>-->
    <script type="text/javascript" src="/Public/toastmsg/jquery.toastmessage.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $("img").lazyload();
        });</script>
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
    <!--<script src="__PUBLIC__/Js/script.js"></script>-->
    <!--<script type="text/javascript"  src="__PUBLIC_s_/Js/home/play/grilhealth2.js" ></script>-->

        
    </head>
    <body>
    
    <div id="header">
        <div class="head">
            <div class="logo"><img src="__PUBLIC__/Images/home/play/common/logo.png"  /></div>
            <div class="nav"> <a href="javascript:void(0)" class="navctr"><i></i>导航</a>
                <div class="navlist" style=" display:none;">
                    <ul class="ful">
                        <li><a href="__APP__/index.html" class="frista">健康卫视网首页</a></li>
                        <li><a href="javascript:void(0)" class="fristb">生 &nbsp;&nbsp;&nbsp;&nbsp; 命</a>
                            <ul>
                                <li><a href="/man/index.html">男性</a></li>
                                <li><a href="/woman/index.html">女性</a></li>
                                <li><a href="/child/index.html">儿童</a></li>
                                <li><a href="/old/index.html">老人</a></li>
                                <li><a href="#">疾病</a></li>
                                <li><a href="/chronicdis/index,html">慢病</a></li>
                                <li><a href="#">心理</a></li>
                                <li><a href="/hospital/index.html">医院</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)"class="fristb">生 &nbsp;&nbsp;&nbsp;&nbsp; 态</a>
                            <ul>
                                <li><a href="#">本草纲目</a></li>
                                <li><a href="/tv/tvlist/cate/7.html">健康全记录</a></li>
                                <li><a href="http://tea.jkwshk.tv">茶缘天下</a></li>
                                <li><a href="/originality/index.html">创意短片</a></li>
                                <li><a href="/travel/index.html">旅游</a></li>
                                <li><a href="/commonweal/index.html">公益</a></li>
                                <li><a href="/environment/index.html">环保科技</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)" class="fristb">生 &nbsp;&nbsp;&nbsp;&nbsp; 活</a>
                            <ul>
                                <li><a href="/tv/tvlist/cate/38.html">瑜伽</a></li>
                                <li><a href="/beautiful/index.html">美容</a></li>
                                <li><a href="/tv/TvList/cate/35.html">院士时间</a></li>
                                <li><a href="#">PK 台</a></li>
                                <li><a href="#">问诊</a></li>
                                <li><a href="#">养生</a></li>
                                <li><a href="#">美食</a></li>
                                <li><a href="/dietitians/index.html">营 养 师</a></li>
                                <li><a href="/fashion/index.html">时尚</a></li>
                                <li><a href="/tv/tvlist/cate/250.html">综艺</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)" class="fristb">生生不息</a>
                            <ul>
                                <li><a href="/news/index.html">健康要闻</a></li>
                                <li><a href="#">健康视点</a></li>
                                <li><a href="/photo/index.html">健康的图</a></li>
                                <li><a href="#">健康大事件</a></li>
                                <li><a href="/video/index.html">健康视频</a></li>
                                <li><a href="/newsvideo/index.html">健闻视频</a></li>
                                <li><a href="/tv/index.html">卫视节目</a></li>
                                <li><a href="#">健康三色光</a></li>
                                <li><a href="#">卫视主播</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="search">
                <form name="sofrm" class="sofrm" method="get" action="Seek/index" onSubmit="return rewrite_search()">
                    <input name="keywords" class="seartext" type="text" onfocus="if (this.value == '搜吗？搜吧！')
                                this.value = ''" onblur="if (this.value == '')
                                            this.value = '搜吗？搜吧！';"  value="搜吗？搜吧！"/>
                    <input name="submit" class="submit" type="submit"  value="搜健" />
                </form>
            </div>

            <div class="user">
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
                            <div id="showmydiv"><a href="#" onmouseover="showDiv()" onmouseout="closeDiv1()" style="text-align:left; margin-left:0px;"><?php echo ($user["username"]); ?><img src="__PUBLIC__/Images/user_login-02.jpg" width="14" height="14"/></a>
                            </div>
                            <!--登录后状态结束 -->
                            <!-- 下拉用户信息开始 -->
                            <div class="userlogin-info" id="forumlist_menudiv" onmouseover="showDiv()" onmouseout="hideDiv()" style="display:none">
                                <div class="clear1"></div>
                                <div class="userlogin-info1">
                                    <div class="topBar">
                                        <div class="topBar-head_photo"> <img src=<?php if(($user["avatar"] == '0')): ?>__PUBLIC__/Default.jpg<?php else: echo ($user["avatar"]); endif; ?> width="38" height="38" /></div>
                                        <div class="topBar-username"><?php echo (($user["nickname"])?($user["nickname"]):"还没昵称"); ?>... <img src="__PUBLIC__/Images/user_login-02.jpg" width="14" height="14"  /></div>
                                        <div class="topBar-integral">积分：10<?php echo ($user["credit"]); ?> </div>
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
    </div>
    <div class="player">
        <div class="players">
            <h2 class="titles"><a href="#"><?php echo ($channel); ?></a>><a href="#"><?php echo ($video["title"]); ?></a></h2>
            <div class="players-box"> 
                <script type="text/javascript" src="http://www.jkwshk.tv/js/swfobject.js"></script>
                <script type="text/javascript" src="__PUBLIC__/Js/home/play/player.js"></script> 
                <script src='__PUBLIC__/Js/home/play/polyvplayer.min.js'></script> 
                <script language="javascript" type="text/javascript">
                                $(function() {
                                    player("<?php echo ($video["video"]); ?>");
                                });
                                function focusComment() {
                                    if (document.getElementById('message')) {
                                        document.getElementById('message').focus();
                                    }
                                }
                </script>
                <div id='CuPlayer2'></div>
                <div id='video_div'></div>
            </div>
            <div class="players-project">
                <h2 class="players-project-title">
                    <?php if(empty($album)): ?><i><?php echo ($typeName); ?></i>相关视频
                        <?php else: ?>
                        <i>专辑</i><?php echo ($album); endif; ?>
                </h2>
                <p class="players-project-num">总播放：<?php echo ($video["hits"]); ?></p>
                <ul>
                    <?php if(is_array($typeVideos)): $i = 0; $__LIST__ = $typeVideos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                            <dl>
                                <dt> <a href="/play/index/id/<?php echo ($v["id"]); ?>.html"> <img width="122" height="74" alt="<?php echo ($v["title"]); ?>" src="<?php echo ($v["photo"]); ?>" data-original="<?php echo ($v["photo"]); ?>"> </a> </dt>
                                <dd> <a href="/play/index/id/<?php echo ($v["id"]); ?>.html"><?php echo ($v["title"]); ?></a> <br>
                                    <span><?php echo ($v["videotime"]); ?></span> </dd>
                            </dl>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="mleft">
            <div class="playinfo">
                <div style=" background:#FFF; height:70px;">
                    <p class="zan"><a href="javascript:void(0)" class="num"><i></i>50</a></p>
                    <ul class="playinfoul">
                        <li><a href="javascript:void(0)" class="num_1 cleck">视频信息</a></li>
                        <li><a href="javascript:void(0)" class="num_2">手机客户端</a></li>
                    </ul>
                </div>
                <div class="infomation ishow">
                    <p style="margin-bottom:5px;"><b><?php echo ($video["title"]); ?></b></p>
                    <p><strong>所属</strong>： <a href="#"  class="mark"><?php echo ($programme); ?></a> &nbsp;&nbsp;<strong>主播</strong>：<a href="#"  class="mark"><?php echo ($video["actor"]); ?></a></p>
                    <p><strong>介绍</strong>：<?php echo ($video["description"]); ?></p>
                    <p><strong>标签</strong>：
                    <?php if(is_array($tagList)): $i = 0; $__LIST__ = $tagList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href='#' class="mark"><?php echo ($v["tagname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </p>
                </div>
                <div class="iphone ishow" style=" display:none;">
                    <p>用健康卫视APP扫描二维码，在手机/平板上继续观看视频</p>
                    <p class="code"><img src="__PUBLIC__/Images/home/play/common/code.png" width="97" height="97" /><b>扫码下载健康卫视APP</b><br />
                        <a href="#">iphone下载</a></p>
                </div> 
            </div>
            <div class="ovideo">
                <h2>相关专辑</h2>
                <ul>
                    <?php if(is_array($relateAlbum)): $i = 0; $__LIST__ = $relateAlbum;if( count($__LIST__)==0 ) : echo "没有数据了" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/play/index/pid/<?php echo ($v["id"]); ?>.html"><img src="<?php echo ($v["coverimage"]); ?>" data-original="<?php echo ($v["coverimage"]); ?>" width="145" height="170" /></a></li><?php endforeach; endif; else: echo "没有数据了" ;endif; ?>
                </ul>
            </div>
            <div class="adv640X90"></div>
            <div class="ovideo">
                <h2>热门图片</h2>
                <ul class="pic">
                    <?php if(is_array($hotPic)): $i = 0; $__LIST__ = $hotPic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/photo/view/id/<?php echo ($v["id"]); ?>.html"><img src="<?php echo ($v["topimg"]); ?>" data-original="<?php echo ($v["topimg"]); ?>" width="146" height="100" /><b><?php echo ($v["name"]); ?></b></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="mright">
            <div class="adv310X152" style=" margin-top:40px;"></div>
            <div class="chot">
                <h2 class="title"><b>热门排行</b></h2>
                <dl class="chotdl">
                    <?php if(is_array($hotVideoList)): $i = 0; $__LIST__ = $hotVideoList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="/play/index/id/<?php echo ($v["id"]); ?>.html">
                                <img src="<?php echo ($v["photo"]); ?>" data-original="<?php echo ($v["photo"]); ?>" width="132" height="80" />
                                <b><?php echo ($v["title"]); ?></b></a> <span>频道:<?php echo ($v["channel"]); ?></span> <span><?php echo ($v["hits"]); ?>次播放</span> </dd><?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
            </div>
        </div>
        <div class="clear"></div>
        <div class="adv980X90"></div>
        <div class="mleft">
            <!--评论开始 -->
            <div class="comment">
                <p class="commentnum">已有<a href="#"><?php echo ($totalComCount); ?> </a>条评论，共<a href="#"> <?php echo ($comUserCount); ?> </a>人参与</p>

                <form action="#" method="">
                    <div id="show"></div>
                    <textarea name="msg" class="msgarea" cols="" rows=""></textarea>
                    <p class="commentlogin">
                        <!--<span class="emotion">表情</span>-->
                    <?php if(empty($user)): ?><!--                        <input name="username" type="text" class="winput" />
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
                            <dl class="cons0">
                                <dt><img src="<?php echo ($v["avatar"]); ?>" width="50" height="50" /></dt>
                                <dd class="namedate">
                                    <span><?php if(empty($v["nickname"])): echo ($v["username"]); else: echo ($v["nickname"]); endif; ?> 
                                        <?php if(empty($v["city"])): ?>[<?php echo ($v["country"]); ?>]<?php else: ?>[<?php echo ($v["province"]); echo ($v["city"]); ?>]<?php endif; ?>
                                    </span>
                                </dd>
                                <dd class="cons1"><?php echo ($v["msg"]); ?></dd>
                               
                               
                                <dd class="replay">

                             <span class="spandate">发表日期：<?php echo (date('Y-m-d H:i:s',$v["ctime"])); ?></span>
                                    <!--                                <span class="renum1"><a href="#" onclick="support(<?php echo ($v["cid"]); ?>)" class="renum">支持(<?php echo ($v["support"]); ?>)</a></span>
                                                                        <a href="#" class="repbt">回复</a> =======
                                                                    <span class="renum1">
                                                                    <a href="#" onclick="support(<?php echo ($v["cid"]); ?>)" class="renum">
                                                                    <font class="color1">支持</font><font class="color2">(<?php echo ($v["support"]); ?>100)</font>
                                                                    </a>
                                                                    </span>
                                <span class="spandate">发表日期：<?php echo (date('Y-m-d H:i:s',$v["ctime"])); ?></span>
                                <span class="renum1">
                                <a href="#" onclick="support(<?php echo ($v["cid"]); ?>)" class="renum">支持<font class="color2">(<?php echo ($v["support"]); ?>)</font></a>
                                </span> -->

                                    <!--<a href="#" class="repbt">回复</a>--> 
                            <!--    <span class="reshare1"><a href="javascript:void(0);" class="reshare">分享></a>
                             
                                  <span class="span1 bdsharebuttonbox"><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a></span>

                                </span> -->
                                    <!--                                 <script>
                                                            window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"我正在看健康卫视网《<?php echo ($video["title"]); ?>》，很不错噢！","bdMini":"1","bdMiniList":["mshare","qzone","renren"],"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","tqq","renren","weixin","qzone"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                                                                    </script>-->
    
                               
                               <!-- <script>
									$(function(){
										$('.bdsharebuttonbox').click(function(){
											var $cont = $(this).closest('.cons0'), $cons1 = $cont.children('.cons1');
											var $cons2 = $cons1.text();
											document.write($cons2);
										});
								
									});
								</script>  -->  
                
								<script>
									$(function(){
										$('.bdsharebuttonbox').click(function(){
											var $cont = $(this).closest('.cons0'), $cons1 = $cont.children('.cons1');
											var cons2 =  $cons1.text().trim();
											//document.write(cons2);
										});
								
									});
									
									window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"#精彩评论#【<?php echo ($video["title"]); ?>】 @<?php echo ($v["username"]); ?>：<?php echo ($cons2); ?>","bdMini":"1","bdMiniList":["mshare","qzone","renren"],"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","tqq","renren","weixin","qzone"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                                </script>
                                

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
            </div>
            <!--评论结束 -->
            
            
        </div>
        <div class="mright">
            <div class="crnews" >
                <h2 class="title"><b>热门资讯</b></h2>
                <ul>
                    <?php if(is_array($hotNews)): $i = 0; $__LIST__ = $hotNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/news/view/id/<?php echo ($v["id"]); ?>.html" target="_blank">·<?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="adv310X152" style=" margin-top:40px;"></div>
            <div class="adv310X152" style=" margin-top:40px;"></div>
            <div class="adv310X152" style=" margin-top:40px;"></div>
        </div>
    </div>
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
    <!--弹出登录框开始 -->
    <link href="__PUBLIC__/css/home/index/pop-up-login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    function showLogin()
    {
        $('#loginbox').css('display','block');  //弹出登录框
    }
    function showForbid()
    {
        forbid.style.width = document.body.clientWidth;
        forbid.style.height = document.body.clientHeight;
        forbid.style.visibility = "visible";
    }
    function changeCode() {
        var time = new Date().getTime();
        document.getElementById('verifyImg').src = '/Public/verify/' + time;
    }
    function closeBox(){
         $('#loginbox').css('display','none');  //弹出登录框
         $('#forbid').css('visibility','hidden');
    }
</script>
<script>
    $(function() {
        $('.other-login-ways img').each(function() {
        }).hover(function() {
            $(this).animate({opacity: 0.6});
        }, function() {
            $(this).animate({opacity: 1});
        });/*图片变亮*/
        $('#pop-login').submit(function(){
            var username = $('#username').val();
            var password = $('#password').val();
            var code = $('#code').val();
            $.ajax({
                type: "POST",
                url: "/member/doLogin.html",
                data:{'username':username,'password':password,'code':code},
                success: function(msg) {
                   if(!msg.status){
                       $('.ajax_response').show();
                       $('.ajax_response').text(msg.info);
                       return false;
                   }else{
                       window.location.reload();
                   }
                }
            });
            return false;
        });
    });
</script>
<style>
    .ajax_response{
        color: #ff3333;
        margin:10px;
    }
</style>
<!--弹出登录框开始 -->
<div id="forbid"></div>
<div id="loginbox">
    <div id="close-bar"><a href="javascript: void(0);" onclick="closeBox()"><img src="__PUBLIC__/Images/home/pop-up-login/close-icon.jpg" width="13" height="13" class="icon"></a></div>
    <div id="login-bar">
        <div class="login-title"><img src="__PUBLIC__/Images/home/pop-up-login/login_07.jpg" width="120" height="36"></div>
        <div class="login-content">
            <!--左边登录开始 -->
            <div class="left-login">
                <form action="/member/doLogin.html" name="form" id="pop-login" method="post">
                    <div class="left-logins">
                        <ul>
                            <li><input   name="username" id="username" placeholder="账号" onblur="checkusername(this.value);"  type="text"  class="regtext_w" /><span id="usernameTip" class="onshow"></span></li>
                            <li><input name="password" id="password" type="password" placeholder="密码"  onblur="return checkpasswd(this);
                                    pwStrength(this.value)" onKeyUp="pwStrength(this.value)"  class="regtext_w" /><span id="passwordTip" class="onshow"></span></li>
                                <li><input name="code" id="code" type="text"  class="regtext_w2"  /> <span  class="codeico"><img  id="verifyImg" src="/public/verify/" width="60" height="28" /></span> <a href="javascript:void(0);" onclick="changeCode()" class="clickagian"> 看不清</a></td></li>
                            <div class="ajax_response" style="display: none"></div>
                            <li class="forget"><input name="remember" type="checkbox" value="1" />记住我<a href="/member/findPwd.html" class="regservice" target="_blank"><font class="font-color1 padding-left20">找回密码</font></a></li>
                            <li><input name=""   class="regbt" value="" type="submit" /></li>
                            <li class="register">没有帐号？ <a href="register.html"><font class="font-color1">马上注册</font></a></li>
                        </ul>
                    </div>
                </form>
            </div>
            <!--左边登录结束 -->
            <div class="depart-line"><img src="__PUBLIC__/Images/home/pop-up-login/depart-line.jpg" width="1" height="231"></div>
            <!--其他登录开始 -->
            <div class="other-login">
                <p>使用其它方式登录</p>
                <div class="other-login-ways">
                    <ul>
                        <li><a href="#"><img src="__PUBLIC__/Images/home/pop-up-login/qq.jpg" width="180" height="40"></a></li>
                        <li><a href="#"><img src="__PUBLIC__/Images/home/pop-up-login/weibo.jpg" width="180" height="40"></a></li>
                    </ul>
                </div>
            </div>
            <!--其他登录结束 -->
        </div>
    </div>
    <!--弹出登录框线束 
            <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script> 
            <script src="js/formValidator_min.js" type="text/javascript" charset="UTF-8"></script> 
            <script src="js/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script> -->

    <!--弹出登录框线束 -->

    </body>
</html>