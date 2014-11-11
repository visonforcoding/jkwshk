<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>健康卫视台</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="__PUBLIC__/css/corp/global.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/css/corp/index.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/js/corp/jquery1.10.2.js"></script>
<script src="__PUBLIC__/js/corp/about.js"></script>
<script src="__PUBLIC__/js/corp/indexTV.js"></script>
   <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <!-- 顶部start -->
     <div id="head"> 
      <div id="top">
        <div id="TV_logo"><a href="/index.html" title="健康卫视台" ><img src="__PUBLIC__/images/corp/TV_logo.png" width="190" height="51" alt=""></a></div>
        <div class="menu">
          <ul>
            <li><a href="/index.html" class="select1" onClick="change_select(this)">首页</a></li>
            <li><a href="/index/about.html" onClick="change_select(this)">关于</a></li>
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
      <!-- 顶部end -->
      <!--主要内容start -->
      <div id="main">
        <div id="banner"><a href="/index/about.html" target="_blank"><img src="__PUBLIC__/images/corp/banner01.png"></a>
          <div id="banners"><img src="__PUBLIC__/images/corp/icon01.png" width="37" height="20" class="icon"></div>
          </div>
        <!--关于TV start -->
        <div id="aboutTVs">
          <div id="aboutTV">
            <div class="logo"><a href="/index/about.html" title="关于Health TV" target="_blank"><img src="__PUBLIC__/images/corp/aboutTV_logo.png" width="200" height="30" alt=""></a></div>
            <div class="content">健康卫视是全球第一家通过卫星全频道、用汉语普通话播出的医学科普卫星电视台；<br>
              面向世界和大中华区医药卫生、医学科普、生态环保、公益慈善等领域，面向华人专业群体的专业人士及其广大受众，<br>
              采用各类节目形态传播权威的、专业的健康信息，普及健康知识，弘扬科学健康理念。</div>
            <div class="more"><a href="/index/about.html" target="_blank"><img src="__PUBLIC__/images/corp/index_28.png" width="245" height="50" alt=""></a></div>
          </div>
        </div>
        <!--关于TV end -->
        <div id="company_dynamic">
          <div id="dynamic">
            <div class="news">
              <div class="title"><a href="/index/news.html" title="公司动态" target="_blank"><img src="__PUBLIC__/images/corp/gongsidongtai.png" width="131" height="30"></a></div>
              <div class="content">
                  <?php echo (mb_substr($topCorpNews["content"],0,150,'utf-8')); ?>....
                </div>
              <div class="more"><a href="/index/news.html" target="_blank"><img src="__PUBLIC__/images/corp/index_28.png" width="245" height="50" alt=""></a></div>
            </div>
            <div class="images"><a href="#" target="_blank"><img src="__PUBLIC__/images/corp/news01.png" width="500" height="375" alt=""></a></div>
          </div>
        </div>
        <!--卫视主播start -->
        <div id="TVhost">
          <iframe src="/index/tvhost.html" width="1200px" height="285px" frameborder="0"  scrolling="no" allowTransparency="true" ></iframe>
        </div>
        <!--卫视主播end -->
        <div id="part_line">&nbsp;&nbsp;</div>
        
        <div id="TVprogram">
          <div id="TVprogram_min">
            <div class="logo"><a href="http://www.jkwshk.tv/tv/index.html" title="卫视节目" target="_blank"><img src="__PUBLIC__/images/corp/TVprogram_logo.png" width="131" height="30"></a></div>
            <div class="about">&nbsp;健康卫视各栏目海报及简介</div>
          </div>
          
          <!--卫视节目轮播start -->
          <div class="section" id="member">
            <div class="member_slider_wrapper">
              <div class="bx-wrapper">
                <div class="bx-viewport"> 
                  <ul class="member_slider">
                    <?php if(is_array($oneProgramaId)): $i = 0; $__LIST__ = array_slice($oneProgramaId,0,100,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="member_slide">
                        <span class="images"><a href="http://www.jkwshk.tv/tv/tvlist/cate/<?php echo ($v["id"]); ?>.html" target="_blank"><img src="<?php echo ($v["tvlogo"]); ?>"  class="pict" width="350px" height="182px"></a></span>
                        <a href="http://www.jkwshk.tv/tv/tvlist/cate/<?php echo ($v["id"]); ?>.html" target="_blank">
                        <span class="text"><?php echo ($v["description"]); ?></span>
                        <p class="link">More</p>
                        </a>
                      </li><?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!--卫视节目轮播end -->
          
        </div>
        <!-- 链接部分start --> 
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
        <!-- 链接部分end -->
   </div>
      <!--主要内容end -->
      
      <!--脚部start -->
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
      <!--脚部end -->
    </body>
</html>