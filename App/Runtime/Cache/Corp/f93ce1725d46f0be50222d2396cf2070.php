<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <title>健康卫视台</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="__PUBLIC__/css/corp/global.css" rel="stylesheet" type="text/css">
        <link href="__PUBLIC__/css/corp/index.css" rel="stylesheet" type="text/css">
    </head>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

        <!-- 顶部开始 -->
        <div id="top">
            <div id="TV_logo"><a href="index.html" title="健康卫视台" ><img src="__PUBLIC__/images/corp/TV_logo.png" width="190" height="51" alt=""></a></div>
            <div id="menu">
                <ul>
                    <li><a href="/index/index.html">首页</a></li>
                    <li><a href="/index/about.html">关于</a></li>
                    <li><a href="http://www.jkwshk.tv/tv/index.html" target="_blank">节目</a></li>
                    <li><a href="/index/anchors.html">主播</a></li>
                    <li><a href="http://www.jkwshk.tv/about/job.html" target="_blank">招贤</a></li>
                    <li><a href="http://www.jkwshk.tv/about/advs.html" target="_blank">广告</a></li>
                    <li><a href="http://www.jkwshk.tv/about/contact.html" target="_blank">联系</a></li>
                </ul>
            </div>
            <div id="health_net"><a href="http://www.jkwshk.tv/" title="健康卫视网" target="_blank"><img src="__PUBLIC__/images/corp/health_logo.png" width="97" height="25" alt=""></a></div>
            <div id="live"><a href="http://www.jkwshk.tv/live/" title="直播" target="_blank"><img src="__PUBLIC__/images/corp/index_09.png" width="32" height="17" alt=""></a></div>
        </div>
        <!-- 顶部结束 -->
        <!--主要内容开始 -->
        <div id="main">
            <div id="anchorsView_banner">
                <img src="<?php echo ($host["tvbgpic"]); ?>" width="1920" height="300"></div>
            <div id="rhesis"><span class="content"><?php echo ($host["message"]); ?></span><span class="select"></span></div>
            <div id="about_part_line2">&nbsp;</div>
            <!--主播资料开始 -->
            <div id="anchors_content">
                <div class="about">
                    <div class="images"><img src="<?php echo ($host["tvsmpic"]); ?>" width="220" height="114"></div>
                    <div class="content">
                        <p class="material">生日:<?php echo ($host["birthday"]); ?><br>星座:<?php echo ($host["constellation"]); ?>&nbsp;&nbsp;血型:<?php echo ($host["blood"]); ?><br>性格:<?php echo ($host["xingge"]); ?><br>爱好:<?php echo ($host["hobby"]); ?><br>喜欢的颜色:<?php echo ($host["color"]); ?></p>
                        <p class="intro"><b>简介:</b>
                            <?php echo ($host["info"]); ?>
                        </p>
                    </div>
                </div>
                <div class="showHost">
                    <div class="zhuchijiemu"><img src="__PUBLIC__/images/corp/zhuchijiemu.png" width="84" height="20"></div>
                    <div class="list">
                        <?php if(is_array($program)): $i = 0; $__LIST__ = $program;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl>
                                <dt><a href="/play/index/id/<?php echo ($v["id"]); ?>.html" target="_blank"><img src="<?php echo ($v["photo"]); ?>" width="152" height="110"></a></dt>
                                <dd><a href="#" target="_blank" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?><br>
                                        <!--<font class="text4">不要任性</font>-->
                                    </a></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <!--主播资料结束 -->
            <div id="anchors_part">
                <div class="list">
                    <ul>
                        <li><a href="#"><span class="name">卫视主播<br>苏丹</span></a></li>
                        <li><a href="#"><span class="name">卫视主播<br>彭宁</span></a></li>
                        <li><a href="#"><span class="name">卫视主播<br>王乐天</span></a></li>
                        <li><a href="#"><span class="name">卫视主播<br>申珊珊</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- 链接部分开始 --> 
            <div id="part_line">&nbsp;&nbsp;</div>

            <div id="healthNet">
                <div class="logo"><a href="http://www.jkwshk.tv" title="健康卫视网" target="_blank"><img src="__PUBLIC__/images/corp/index_59.png" width="162" height="30" alt=""></a></div>
                <div class="column">
                    <ul>
                        <li><a href="http://www.jkwshk.tv" target="_blank"><img src="__PUBLIC__/images/corp/healthNet_01.png" width="130" height="130" alt="健康卫视网首页" class="logo"></a><a href="http://www.jkwshk.tv"  title="健康卫视网首页"  target="_blank"><span class="go"></span></a></li>
                        <li><a href="http://www.jkwshk.tv/Newsvideo/index.html" target="_blank"><img src="__PUBLIC__/images/corp/healthNet_02.png" width="130" height="130" alt="健闻视频" class="logo"></a><a href="http://www.jkwshk.tv/Newsvideo/index.html"  title="健闻视频" target="_blank"><span class="go"></span></a></li>
                        <li><a href="http://www.jkwshk.tv/video/index.html" target="_blank"><img src="__PUBLIC__/images/corp/healthNet_03.png" width="130" height="130" alt="健康视频" class="logo"></a><a href="http://www.jkwshk.tv/video/index.html"  title="健康视频" target="_blank"><span class="go"></span></a></li>
                        <li><a href="http://www.jkwshk.tv/tv/index.html" target="_blank"><img src="__PUBLIC__/images/corp/healthNet_04.png" width="130" height="130" class="logo"></a><a href="http://www.jkwshk.tv/tv/index.html" title="卫视节目" target="_blank"><span class="go"></span></a></li>
                        <li><a href="http://old.jkwshk.tv/view/home.html" target="_blank"><img src="__PUBLIC__/images/corp/healthNet_05.png" width="130" height="130" class="logo"></a><a href="http://old.jkwshk.tv/view/home.html" title="健康视点" target="_blank"><span class="go"></span></a></li>
                    </ul>
                </div>
            </div>

            <div id="TVlive">
                <div id="TVlive_min">
                    <div class="logo"><a href="http://www.jkwshk.tv/live/"  title="Live 直播" target="_blank"><img src="__PUBLIC__/images/corp/TVlive_min_logo.png" width="140" height="30"></a></div>
                    <div class="back"><a href="http://www.jkwshk.tv/live/" target="_blank"><img src="__PUBLIC__/images/corp/TVlive_min_back.png" width="47" height="47"></a></div>
                </div>
            </div>
            <!-- 链接部分结束 -->
        </div>
        <!--主要内容结束 -->
        <!--脚部开始 -->
        <div id="foot">
            <div id="footer_end">
                <div id="footer_econtent">
                    <div class="links">
                        <a href="http://www.jkwshk.tv" target="_blank">
                            <img src="__PUBLIC__/images/corp/health_net_logo.png" width="97" height="26" alt="健康卫视视频网站" style=" vertical-align:middle"  />
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="http://www.jkwshk.tv/about/index.html" target="_blank">关于我们</a> 
                        <a href="http://www.jkwshk.tv/about/advs.html" target="_blank" >广告服务</a> 
                        <a href="http://www.jkwshk.tv/about/job.html" target="_blank">诚聘英才</a> 
                        <a href="http://www.jkwshk.tv/about/privacy.html" target="_blank">保护隐私权</a> 
                        <a href="http://www.jkwshk.tv/about/nct.html" target="_blank">免责条款</a> 
                        <a href="http://www.jkwshk.tv/about/copyright.html" target="_blank">版权声明</a> 
                        <a href="http://www.jkwshk.tv/about/contact.html" target="_blank">联系我们</a> 
                        <a href="http://old.jkwshk.tv/view.php?id=1239" target="_blank">健康卫视开播大典</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" target="_blank"><img src="__PUBLIC__/images/corp/health_tv_logo.png" width="68" height="26" alt="健康卫视台网站" style=" vertical-align:middle"  /></a>
                    </div>
                    <div class="copyright">
                        粤ICP备11075253号-1 广播电视节目制作经营许可证：（粤）字第1001号<br />健康卫视  健康新媒体 版权所有<br />Copyright &copy; 2011-2014 Jkwshk.tv All Rights Reserved
                    </div>
                </div>
            </div>
        </div>
        <!--脚部开始 -->
    </body>
</html>