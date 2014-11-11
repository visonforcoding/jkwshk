<?php if (!defined('THINK_PATH')) exit(); if(is_array($pic)): foreach($pic as $key=>$vo): ?><img src="<?php echo ($vo); ?>" class="pic" alt="pic"/><?php endforeach; endif; ?>
<div  class="toolbar" style="text-align:right">
    <a href="#" class="easyui-linkbutton" iconCls="icon-save" onclick="javascript:$('#picBox').window('close')">确定</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#picBox').window('close')">取消</a>
</div>