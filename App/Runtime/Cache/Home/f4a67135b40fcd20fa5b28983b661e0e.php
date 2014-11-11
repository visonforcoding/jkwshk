<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form action="/test/check.html" method="post">
                <img src="/public/newverify.html" id="verifyImg" onclick="change_code()"/>
                <input type="text" name="code" />
                <button type="submit">确定</button>
            </form>
        </div>
        <script type="text/javascript">
            
            function change_code() {
                var timed = new Date().getTime();
                document.getElementById('verifyImg').src = '/Public/newverify/' + timed;
            }
        </script>
    </body>
</html>