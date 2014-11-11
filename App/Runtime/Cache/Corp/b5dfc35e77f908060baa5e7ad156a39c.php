<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>健康卫视台_卫视主播列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/css/corp/global.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/css/corp/index.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/js/corp/jquery1.10.2.js"></script>
<SCRIPT src="__PUBLIC__/js/corp/jcarousellite_1.0.1.min.js"></SCRIPT>
<SCRIPT language="JavaScript">
	$(document).ready(function(){
	$(".hostress").jCarouselLite({
	btnNext: ".next3",
	btnPrev: ".prev3",
	speed: 1000,
	auto: null,	
	visible:4,
	});
	});
</SCRIPT>
</head>

<body>
<div id="TVhost">
   <div class="title"><a href="/index/anchors.html" title="卫视主播" target="_blank"><img src="__PUBLIC__/images/corp/TVhost.png" width="131" height="30" alt=""></a></div>
    <div class="hostress1">
     <span class="prev3 b_left3"><img src="__PUBLIC__/images/corp/btnleft.png" width="30" height="33" onMouseOver="this.src='__PUBLIC__/images/corp/btnleft01.png'" onMouseOut="this.src='__PUBLIC__/images/corp/btnleft.png'"  ></span>
     <div class="hostress">
        <ul>
            <?php if(is_array($host)): $i = 0; $__LIST__ = array_slice($host,0,20,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                    <div class="images"><a href="/index/anchorsView/id/<?php echo ($v["id"]); ?>.html" target="_blank"><img src="<?php echo ($v["tvsmpic"]); ?>" width="238" height="125" alt=""></a></div>
                    <div class="content"><a href="/index/anchorsView/id/<?php echo ($v["id"]); ?>.html" target="_blank"><font class="TVhost">卫视主播</font><br><font class="name"><?php echo ($v["name"]); ?></font></a></div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
        <span class="next3 b_right3"><img src="__PUBLIC__/images/corp/btnright.png" width="30" height="33" onMouseOver="this.src='__PUBLIC__/images/corp/btnright01.png'" onMouseOut="this.src='__PUBLIC__/images/corp/btnright.png'" ></span>
   </div>
  </div>
</body>
</html>