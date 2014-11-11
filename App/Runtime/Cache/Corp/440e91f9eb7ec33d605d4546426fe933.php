<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <title>健康卫视台</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="__PUBLIC__/css/corp/global.css" rel="stylesheet" type="text/css">
        <link href="__PUBLIC__/css/corp/index.css" rel="stylesheet" type="text/css">
        <script src="__PUBLIC__/js/corp/jquery1.10.2.js"></script>
        <script src="__PUBLIC__/js/corp/about.js"></script>
    </head>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <!-- 顶部开始 -->
        <div id="head"> 
            <div id="top">
                <div id="TV_logo"><a href="/index.html" title="健康卫视台" ><img src="__PUBLIC__/images/corp/TV_logo.png" width="190" height="51" alt=""></a></div>
                <div class="menu">
                    <ul>
                        <li><a href="/index/index.html" onClick="change_select(this)">首页</a></li>
                        <li><a href="/index/about.html" class="select1" onClick="change_select(this)">关于</a></li>
                        <li><a href="http://www.jkwshk.tv/tv/index.html" onClick="change_select(this)">节目</a></li>
                        <li><a href="/index/anchors.html" onClick="change_select(this)">主播</a></li>
                        <li><a href="http://www.jkwshk.tv/about/job.html" onClick="change_select(this)">招贤</a></li>
                        <li><a href="http://www.jkwshk.tv/about/advs.html" onClick="change_select(this)">广告</a></li>
                        <li><a href="http://www.jkwshk.tv/about/contact.html" onClick="change_select(this)">联系</a></li>
                    </ul>
                </div>
                <div id="health_net"><a href="http://www.jkwshk.tv/" title="健康卫视网" target="_blank"><img src="__PUBLIC__/images/corp/health_logo.png" width="97" height="25" alt=""></a></div>
                <div id="live"><a href="http://www.jkwshk.tv/live/" title="直播" target="_blank"><img src="__PUBLIC__/images/corp/index_09.png" width="32" height="17" alt=""></a></div>
            </div>
        </div>
        <!-- 顶部结束 -->

        <!--主要内容开始 -->
        <div id="main">
            <!--banner start-->
            <div id="about_banner"><a href="#" target="_blank"><img src="__PUBLIC__/images/corp/about_01.png"></a></div>
            <!--banner stop-->
            <div id="about_part_line">&nbsp;</div>
            <!--aboutUs start-->
            <div id="aboutUs">
                <div id="about_menu">
                    <ul>                                                                              
                        <li><a href="president.html">总裁致辞</a></li>
                        <li><a href="about.html">关于Health TV</a></li>
                        <li><a href="cultural.html">文化理念 </a></li>
                        <li><a href="news.html" class="current">公司动态</a><span class="select"></span></li>
                        <li><a href="event.html">大事记录</a><span class="last_part"></span></li>
                    </ul>
                </div>
                <div id="about_part_line2">&nbsp;</div>
                <div class="about_content">
                    <div id="news">
                        <ul>
                            <?php if(is_array($corpNews)): $i = 0; $__LIST__ = $corpNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><span class="time"><?php echo (datetoch($v["time"])); ?></span><span class="title"><a href="newsView.html" target="_blank"><?php echo ($v["summary"]); ?></a></span><a href="/index/newsView/id/<?php echo ($v["id"]); ?>.html" target="_blank"><span class="more"></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!--aboutUs end--> 
            <!-- 链接部分开始 --> 
            <div id="part_line">&nbsp;&nbsp;</div>
            <!--健康卫视网链接部分start -->
            <div id="healthNets">  
                <div id="healthNet">
                    <div class="logo"><a href="http://www.jkwshk.tv" title="健康卫视网" target="_blank"><img src="__PUBLIC__/images/corp/index_59.png" width="162" height="30" alt=""></a></div>
                    <div class="column">
                        <ul>
                            <li><a href="http://www.jkwshk.tv" target="_blank"><img src="__PUBLIC__/images/corp/healthNet_01.png" width="130" height="130" alt="健康卫视网首页" class="logo"></a><a href="http://www.jkwshk.tv"  title="健康卫视网首页"  target="_blank"><span class="go"></span></a></li>
                            <li><a href="http://www.jkwshk.tv/news/index.html" target="_blank"><img src="__PUBLIC__/images/corp/healthNet_02.png" width="130" height="130" alt="健康要闻" class="logo"></a><a href="http://www.jkwshk.tv/news/index.html"  title="健康要闻" target="_blank"><span class="go"></span></a></li>
                            <li><a href="http://www.jkwshk.tv/video/index.html" target="_blank"><img src="__PUBLIC__/images/corp/healthNet_03.png" width="130" height="130" alt="健康视频" class="logo"></a><a href="http://www.jkwshk.tv/video/index.html"  title="健康视频" target="_blank"><span class="go"></span></a></li>
                            <li><a href="http://www.jkwshk.tv/Newsvideo/index.html" target="_blank"><img src="__PUBLIC__/images/corp/healthNet_04.png" width="130" height="130"  alt="健闻视频" class="logo"></a><a href="http://www.jkwshk.tv/Newsvideo/index.html" title="健闻视频" target="_blank"><span class="go"></span></a></li>
                            <li><a href="http://old.jkwshk.tv/view/home.html" target="_blank"><img src="__PUBLIC__/images/corp/healthNet_05.png" width="130" height="130"  alt="健康视点"class="logo"></a><a href="http://old.jkwshk.tv/view/home.html" title="健康视点" target="_blank"><span class="go"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--健康卫视网链接部分end --> 
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
                        <a href="/index.html" target="_blank"><img src="__PUBLIC__/images/corp/health_tv_logo.png" width="98" height="26" alt="健康卫视台网站" style=" vertical-align:middle"  /></a>
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