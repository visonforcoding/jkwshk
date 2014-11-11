<?php if (!defined('THINK_PATH')) exit();?>


<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>健康卫视后台管理系统V2.0版</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin/base.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin/style.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/lan/cn.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/dom.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/admin/objs.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/date.js"></script>
    <script type="text/javascript" src="__PUBLIC__/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/jquery1.10.2.js"></script>  
    <script type="text/javascript">
    document.domain="__IURL__";
    Dom.addEvent(window,'load',function(){
        <?php echo ($event); ?>
		var str=[];
		str.push('当前位置：<a href="javascript:void(0);" onclick="parent.goHome()" class="cBlue">首页</a> 》');
		if(!empty(parent.bread.name))str.push('<a href="javascript:void(0);" class="cBlue">'+parent.bread.name+'</a> 》');
		str.push('<a href="javascript:void(0);" class="cBlue">'+parent.bread.title+'</a>');
		Dom('bread').innerHTML=str.join("");
		parent.wait(false);
    });
	<!--
//指定当前组模块URL地址 
var URL = '__URL__';
var TMPL__ = '__TMPL__';
var ROOT__ = '__ROOT__';
var GROUP__ = '__GROUP__';
var ACTION__ = '__ACTION__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';
var SELF__ = '__SELF__';
//-->
    </script>

</head>
<body>
	<div id="wrap" class="videoList">
		<div class="crumbs mb20" id="bread"></div>


<!-- 菜单区域  -->

<!-- 主页面开始 -->
<script type="text/javascript">
function searcht(){
	var s=document.getElementById("sword").value;
	window.location.href="/admin/index/?s="+encodeURIComponent(s);
}
</script>
<style type="text/css">
.searchBar div{ float:left; margin-left:7px; display:inline;}
.searchBar div select{ height:24px;}
</style>
        <div class="videoListTable">
         	<div class="search">
            <form method='post' action="__ACTION__" class="forms" id="fm1">
                <div class="searchBar fl">
                  <div style="line-height:24px;">输入关键字:</div>
                  
                  <div><input type="text" name="keyword" id="keyword" value="" class="keyword" /></div>
                  <div><input type="submit" value="搜&nbsp;索" class="btnSearch" /></div>
                 
          	   </div>
                </form>
             </div>
		  <div class="clearb">
				<div class="editBar fr">	
				  <a href="javascript:void(0);" onclick="dels('admin');" class="iDel">删除</a>
				  <a href="/admin/indexedit/?action=add" class="iAdd">新增</a>
				  <a href="javascript:void(0);" onclick="Refresh();" class="iRefresh">刷新</a>
				</div>
			</div>
			<table width="100%" id="J-rowColor">
				<thead>
					<tr height="32">
						<td width="40" align="center"><input type="checkbox" title="全选/取消" onclick="slt()" /></td>
						<td  align="center">ID</td>
						<td  align="center">用户名</td>
                        <td  align="center">权限</td>
                        <td  align="center">注册时间</td>
         				<td  align="center">登入时间</td>
         				<td  align="center">登入IP</td>
         				<td  align="center">状态</td>
                        <td width="65" align="center">操作</td>
				  </tr>
				</thead>
				<tbody id="box_list">
                	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="row<?php echo ($vo["id"]); ?>">
						<td align="center"><input type="checkbox" name="__chk__" value="<?php echo ($vo["id"]); ?>" /></td>
						<td align="center"><?php echo ($vo["id"]); ?></td>
						<td align="center"><?php echo ($vo["account"]); ?></td>
                        <td align="center"><?php echo ($vo["gname"]); ?></td>
						<td align="center"><?php echo (todate($vo["create_time"],'Y-m-d H:i:s')); ?></td>
						<td align="center"><?php echo (todate($vo["last_login_time"],'Y-m-d H:i:s')); ?></td>
						<td align="center"><?php echo ($vo["last_login_ip"]); ?></td>
                        <td align="center">
                        <?php if($vo['isopen'] == 1): ?><p onclick="change(this,'admin','id=<?php echo ($vo["id"]); ?>&isopen=0')" title="开启|关闭" val='1'><span class="enable"></span>开启</p>
                        <?php else: ?>
                      <p onclick="change(this,'admin','id=<?php echo ($vo["id"]); ?>&isopen=1')" title="开启|关闭" val='0'><span class="disable"></span>关闭</p><?php endif; ?>
                        </td>
						<td align="center">
							<a href="/admin/indexedit/?action=edit&id=<?php echo ($vo["id"]); ?>" class="iconedit" title="编辑"><img src="/Public/Images/iconedit.png" width="26" height="26"></a>
							<a href="javascript:void(0);"
							onClick="del(<?php echo ($vo["id"]); ?>,'admin');" class="icondel" 
                            title="删除"><img src="/Public/Images/icondel.png" alt="" width="26" height="26"></a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<!-- 分页 start -->
            <div class="page">
            <?php echo ($page); ?>
            </div>
            <!-- 分页 end -->
		</div>
<!-- 主页面结束 -->