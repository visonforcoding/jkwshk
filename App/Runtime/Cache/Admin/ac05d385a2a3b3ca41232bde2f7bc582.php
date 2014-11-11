<?php if (!defined('THINK_PATH')) exit();?><div id="content" class="easyui-panel" style="height:460px" data-options="href:'/tags/getTags/page/1.html'">
</div>
<div id="pp" class="easyui-pagination" style="background:#efefef;border:1px solid #ccc;width:98%;position: absolute;bottom:5px"
     data-options="
     pageList:[200],
     total:<?php echo ($total); ?>,
     pageSize:200,
     onSelectPage: function(pageNumber, pageSize){
     $('#content').panel('refresh', '/tags/getTags?page='+pageNumber);
     }">
</div>