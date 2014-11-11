<?php if (!defined('THINK_PATH')) exit();?><table class="dv-table" border="0" style="width:100%;">
    <tr>
        <td rowspan="3" style="width:60px">
            <img src="<?php echo ($focus["photo"]); ?>" style="width:60px;margin-right: 20px;"/>
        </td>
        <td class="dv-label">标题: </td>
        <td><?php echo ($focus["title"]); ?></td>
        <td class="dv-label">添加时间:</td>
        <td><?php echo ($focus["ctime"]); ?></td>
    </tr>
    <tr>
        <td class="dv-label">链接: </td>
        <td><a href="<?php echo ($focus["link"]); ?>"><?php echo ($focus["link"]); ?></a></td>
        <td class="dv-label">所属栏目:</td>
        <td><?php echo ($focus["name"]); ?></td>
    </tr>
    <tr>
        <td class="dv-label">焦点图信息: </td>
        <td colspan="3"><?php echo ($focus["info"]); ?></td>
    </tr>
</table>