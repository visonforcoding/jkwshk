<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>健康卫视后台管理系统</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin/base.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin/style.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/Base.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/Think/ThinkAjax.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
     <script language="JavaScript">
    <!--
    var PUBLIC	 =	 '__PUBLIC__';
    function keydown(e){
        var e = e || event;
        if (e.keyCode==13)
        {
        ThinkAjax.sendForm('form1','__URL__/checkLogin/',loginHandle,'result');
        }
    }
    
    //-->
    </script>
	<style>html,body{overflow:hidden;}</style>
</head>

<body onLoad="document.login.account.focus()" >
	<div class="loginPage">
		<div class="loginBox">
			<div class="loginLogo"><img src="__PUBLIC__/Images/logo_login.png" ></div>
			<div class="loginForm">
<form method='post' name="login" id="form1" ACTION="__URL__/checkLogin">
                	
					<table width="310">
						<tr height="20">
							<td colspan="2" class="cRed textac"><?php echo ($msg); ?></td>
						</tr>
						<tr height="45">
							<td align="right" class="fs14" width="70">用户名：</td>
							<td><input type="text" name="account" id="account" class="inputText w180"></td>
						</tr>
						<tr height="45">
							<td align="right" class="fs14">密&nbsp;&nbsp;&nbsp;码：</td>
							<td><input type="password" name="password" id="password" class="inputText w180"></td>
						</tr>
						<tr height="38">
							<td align="right" class="fs14">&nbsp;</td>
							<td><input type="submit" value="登&nbsp;录" class="btnlogin"></td>
						</tr>
					</table>
                    
				</form>
			</div>
		</div>
		<!-- footer start -->
<div id="footer"> 技术支持：深圳市健康传媒有限公司 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 电话：（深圳）86-755-33000835 （香港）852-36203556  </div>
		<!-- footer end -->
	</div>
</body>
</html>