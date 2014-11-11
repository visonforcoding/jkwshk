<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>正在跳转...</title>
</head>

<body>
<div style="margin:0 auto; margin-top:200px; width:801px; height:292px; position:relative;">
<?php if(isset($message)): ?><div style=" height:66px; line-height:66px; width:550px; position:absolute; top:60px; right:0px; font-size:36px; color:#F39801;">
<img src="/Public/public/RIGHT_icon.JPG" width="85" height="66" style=" float:left; margin-right:5px;"  />
<?php echo($message); ?>
</div>
<?php else: ?>
<div style=" height:66px; line-height:66px; width:550px; position:absolute; top:60px; right:0px; font-size:36px; color:#F39801;">
<img src="/Public/public/WARNING_icon.JPG" width="85" height="66" style=" float:left; margin-right:5px;" />
<?php echo($error); ?>
</div><?php endif; ?>
<div style=" height:66px; line-height:66px; width:355px; position:absolute; top:100px; right:0px; font-size:16px; color:#333;">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>" style="color:#333;">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</div>
<script type="text/javascript">

(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
        location.href = href;
        clearInterval(interval);
	};
}, 1000);
})();

</script>
<img src="/Public/public/turn.jpg" width="801" height="292"/>
</div>
</body>
</html>