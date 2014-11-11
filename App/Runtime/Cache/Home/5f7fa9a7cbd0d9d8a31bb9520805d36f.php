<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>本草纲目界面错误页面</title>
        <link rel="stylesheet" type="text/css" href="css/error.css"/>
        <style>
            .lishizhen {
                width:700px;
                margin:0 auto;
                margin-top:50px;
            }
            .lishizhenz {
                width:700px;
                position:absolute;
                top:300px;
            }
            .lishizhenw {
                margin-top:100px;
                float:right;
                color:#656565;
            }
            .lishizhenw a {
                color:#656565;
                text-decoration:none;
            }
            .lishizhenw a:hover {
                color:#2d9a39;
            }
        </style>
        <script language='javascript' type='text/javascript'>
            var secs = 5; //倒计时的秒数 
            var URL;
            function Load(url) {
                URL = url;
                for (var i = secs; i >= 0; i--)
                {
                    window.setTimeout('doUpdate(' + i + ')', (secs - i) * 1000);
                }
            }
            function doUpdate(num)
            {
                document.getElementById('ShowDiv').innerHTML = '将在' + num + '秒后自动跳转到 首页';
                if (num == 0) {
                    window.location = URL;
                }
            }
        </script>
    </head>
    <body>
        <div class="lishizhen">
            <p><img src="/Public/Images/home/html/feiji.png" width="476" height="326" /></p>
            <div class="lishizhenz"> <img src="/Public/Images/home/html/lishizhen.png" width="701" height="324"/>
                <p  class="lishizhenw"><a href="#">返回上一页</a> | <a href="http://www.jkwshk.tv" id="ShowDiv"></a></p>
                <script language="javascript">
                    Load("http://www.jkwshk.tv");
                </script> 
            </div>
        </div>
    </body>
</html>