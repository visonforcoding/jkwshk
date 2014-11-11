<?php if (!defined('THINK_PATH')) exit();?><div class="top-bar" style="padding:10px;">
    <input type="text" style="height:25px;" id="newtag" placeholder="输入新标签" /> <button id="addTag" class="btn btn-primary">添加新标签</button>
    <p style="display: inline-block;float: right;">
        <img src="__PUBLIC__/Images/admin/recycle.png" title="拖到此处删除" alt="回收站"/>
    </p>
</div>
<div class="tag-box">
    <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><span   class="tag" tagid="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script>
    $(function() {
        $('#addTag').click(function() {
            var tag = $('#newtag').val();
            $.ajax({
                url: '/tags/getTags.html',
                data: {tag: tag},
                success: function(msg) {
                    $('#content').panel('refresh', '/tags/getTags?tag=' + tag);
                }
            });
        });
        $('.tag').click(function() {
            var tagid = $(this).attr('tagid');
            var tag = $(this).html();
            var v = tagid + '|' + tag;
            $('#tagcheckbox').append('<input class="checkinput" checked name="tagid[]" type="checkbox" value="' + v + '"/> <span class="checkspan">' + tag + '</span>');
            $('#tag-window').window('close');
        });
    });
</script>