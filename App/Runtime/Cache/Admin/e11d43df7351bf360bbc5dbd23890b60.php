<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>健康卫视后台管理系统</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/easyui/themes/bootstrap/easyui.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/easyui/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/icomoon/style.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/toastmsg/css/jquery.toastmessage.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/admin/cwp.css">
        <script src="__PUBLIC__/ueditor/ueditor.config.js" ></script>
        <script src="__PUBLIC__/ueditor/ueditor.all.js" ></script>
        <script href="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js" ></script>
        <script type="text/javascript" src="__PUBLIC__/js/jquery1.10.2.js"></script>
        <script type="text/javascript" src="__PUBLIC__/easyui/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="__PUBLIC__/easyui/datagrid-detailview.js"></script>
        <script src="__PUBLIC__/easyui/locale/easyui-lang-zh_CN.js"></script>
        <script src="__PUBLIC__/toastmsg/jquery.toastmessage.js"></script>
        <script src="__PUBLIC__/js/cwp.js"></script>
        <script>
            $(function() {
                document.domain = 'test.com';
                $('.add_tab').click(function() {
                    //由于暂时未弄清多个tab 出现时grid 读取bug 问题 故暂时只允许存在一个tab
                    //关闭打开的
                    var tab = $('#main-tab').tabs('getSelected');
                    var index = $('#main-tab').tabs('getTabIndex', tab);
                    $('#main-tab').tabs('close', index);
                    //打开新的
                    var controller = $(this).attr('con');
                    var action = $(this).attr('act');
                    var href = '/' + controller + '/' + action;
                    var title = $(this).children('span.title').html();
                    $('#main-tab').tabs('add', {
                        title: title,
                        href: href,
                        closable: true,
                        tools: [{
                            }]
                    });
                });
                //iframe 方式打开tab
                $('.add_tab_iframe').click(function() {
                    //由于暂时未弄清多个tab 出现时grid 读取bug 问题 故暂时只允许存在一个tab
                    //关闭打开的
                    var tab = $('#main-tab').tabs('getSelected');
                    var index = $('#main-tab').tabs('getTabIndex', tab);
                    $('#main-tab').tabs('close', index);
                    //打开新的
                    var controller = $(this).attr('con');
                    var action = $(this).attr('act');
                    var href = '/' + controller + '/' + action;
                    var title = $(this).children('span.title').html();
                    var content = '<iframe scrolling="no" frameborder="0"  src="' + href + '" style="width:100%;height:100%;"></iframe>';
                    $('#main-tab').tabs('add', {
                        title: title,
                        content: content,
                        closable: true,
                        tools: [{
                            }]
                    });
                });

            });
        </script>
    
    <script>
        $(function() {
            $('#aa').accordion('select', '机构管理');
            $('#reset').click(function() {
                $('#ff').form('clear');
            });
            $('#submit').click(function() {
                var param = $('#ff').serializeObject();
                param.classname = '<?php echo ($classname); ?>';
                var isValid = $('#ff').form('validate');
                var action = "<?php echo ($action); ?>";
                if (action === 'edit') {
                    param.action = 'edit';
                    param.id = "<?php echo ($Rs['id']); ?>";
                }

                if (isValid) {
                    $.ajax({
                        type: 'post',
                        url: '/host/doAddHost.html',
                        data: param,
                        dataType: 'json',
                        success: function(data) {
                            if (data.success) {
                                if (data.edit) {
                                    $.messager.alert('信息提示', data.message, 'info');
                                } else {
                                    $.messager.alert('信息提示', data.message, 'info', clearForm);
                                }
                            } else {
                                $.messager.alert('错误', data.message, 'error');
                            }
                        }
                    });
                } else {
                    return isValid;
                }
                ;
            });
        });
        function clearForm() {
            $('#ff').form('clear');
        }
    </script>

    
</head>
<body>
    <div class="easyui-layout" data-options="fit:true">
        <div data-options="region:'north',doSize:false" style="height:50px;line-height: 60px;">
            <div class="navbar" style="height: 48px;line-height: 48px;overflow-y: hidden;">
                <a  class="brand" href="/index.html" target="_blank" title="返回前台首页" >
                    <img src="__PUBLIC__/Images/home/sevenbaby/logo_top.png" border="0" height="35" width="134"/>
                </a>
                <ul class="navbar-menu pull-right">
                    <li><a><i class="icon-mail5" style="font-size:24px;color: #818A8A"></i>
                            <span class="badge">6</span>
                        </a></li>
                    <li><a><i class="icon-newspaper3" style="font-size:24px;color: #818A8A"></i>
                            <span class="badge">3</span>
                        </a></li>
                    <li><a><i class="icon-calendar4" style="font-size:24px;color: #818A8A"></i>
                            <span class="badge">2</span>
                        </a></li>
                    <li class="dropdown"><a class="dropdown-toggle">
                            <?php if($_SESSION['AVATAR']== ''): ?><img  src="/Public/metronic/image/avatar1_small.jpg" title="你没设置头像哦，所以是猥琐大叔！">
                                <?php else: ?>
                                <img  src="<?php echo (session('AVATAR')); ?>"><?php endif; ?>
                            <span class="username"><?php echo (session('NICKNAME')); ?></span>
                            <i class="icon-arrow-down8" style="color: #ffffff"></i>
                        </a>
                        <ul class="dropdown-menu" >
                            <li><a href="/admin/add/action/edit/id/<?php echo ($adminId); ?>.html"><i class="icon-user"></i> 个人信息</a></li>
                            <li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
                            <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>
                            <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
                            <li class="divider"></li>
                            <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>
                            <li><a href="/public/logout.html"><i class="icon-key"></i> 退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div  data-options="region:'south',split:true" style="height:50px;">
            早安，公主：<?php echo ($cwp_hello); ?>
        </div>
        <div data-options="region:'west',split:true" title="管理菜单" style="width:200px;">
            <div id="aa" class="easyui-accordion" data-options="fit:true,border:false">
                <div title="系统管理" data-options="iconCls:'icon-windows3'">
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a href="index.html">
                                <i class="icon-home"></i> 
                                <span class="title">系统信息</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a href="index.html">
                                <i class="icon-home"></i> 
                                <span class="title">参数设置</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="管理员管理" data-options="iconCls:'icon-admin'">
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/admin/adminList.html" class="add_tab" con="video" act="manageCat">
                                <i class="icon-list4"></i> 
                                <span class="title">管理员管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/admin/groupList.html" class="add_tab" con="video" act="manageVideo">
                                <i class="icon-list4"></i> 
                                <span class="title">管理员群组管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/admin/permissionList.html" class="add_tab" con="video" act="manageVideo">
                                <i class="icon-list4"></i> 
                                <span class="title">权限管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/admin/accessList.html" class="add_tab" con="video" act="manageVideo">
                                <i class="icon-list4"></i> 
                                <span class="title">权限配置</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="图片管理" data-options="iconCls:'icon-picture3'">
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/picture/manageCat.html" class="add_tab" con="video" act="manageCat">
                                <i class="icon-list4"></i> 
                                <span class="title">图集类别管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/picture/index.html" class="add_tab" con="video" act="manageVideo">
                                <i class="icon-list4"></i> 
                                <span class="title">图集管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/picture/addPic.html" class="add_tab_iframe" con="video" act="addVideo">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">添加图集</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/focus/addFocus.html" class="add_tab_iframe" con="video" act="addVideo">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">添加焦点图</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/focus/index.html" class="add_tab_iframe">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">焦点图管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/focus/category.html" class="add_tab_iframe">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">焦点图类别管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="视频管理" data-options="iconCls:'icon-video2'" >
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/video/manageCat.html" class="add_tab" con="video" act="manageCat">
                                <i class="icon-list4"></i> 
                                <span class="title">视频类别（专辑管理）</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/video/manageVideo.html" class="add_tab" con="video" act="manageVideo">
                                <i class="icon-list4"></i> 
                                <span class="title">视频管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/video/addVideo.html" class="add_tab_iframe" con="video" act="addVideo">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">添加视频</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="会员管理" data-options="iconCls:'icon-user7'" >
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/member/index.html" class="add_tab" con="member" act="index">
                                <i class="icon-list4"></i> 
                                <span class="title">会员管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/member/sendMsg" class="add_tab" con="member" act="sendMsg">
                                <i class="icon-mail2"></i> 
                                <span class="title">发站内信</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="活动管理" data-options="iconCls:'icon-cool3'" >
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/activity/category.html" class="add_tab" con="Activity" act="category">
                                <i class="icon-list4"></i> 
                                <span class="title">活动类别管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/activity/sevenbaby.html" class="add_tab" con="Activity" act="sevenbaby">
                                <i class="icon-list4"></i> 
                                <span class="title">Seven Baby管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/activity/code.html" class="add_tab" con="Activity" act="code">
                                <i class="icon-mail2"></i> 
                                <span class="title">折扣码管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="文章管理" data-options="iconCls:'icon-book5'" >
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/News/index.html" class="add_tab" con="News" act="index">
                                <i class="icon-list4"></i> 
                                <span class="title">新闻管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/News/add.html" class="add_tab" con="News" act="add">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">添加新闻</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="频道管理" data-options="iconCls:'icon-droplets2'" >
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/video/manageCat.html" class="add_tab" con="News" act="index">
                                <i class="icon-list4"></i> 
                                <span class="title">栏目管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/News/add.html" class="add_tab" con="News" act="add">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">添加新闻</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="直播管理" data-options="iconCls:'icon-tv6'" >
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/Live/index.html" class="add_tab" con="Live" act="index">
                                <i class="icon-list4"></i> 
                                <span class="title">节目表管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/Live/upload.html" class="add_tab" con="Live" act="upload">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">上传节目单</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="数据库管理" data-options="iconCls:'icon-db'" >
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/Dumpdb/dump.html" class="add_tab" con="Live" act="index">
                                <i class="icon-list4"></i> 
                                <span class="title">数据库备份</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="机构管理" data-options="iconCls:'icon-tree2'" >
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/Host/manageHost.html" class="add_tab" con="Live" act="index">
                                <i class="icon-microphone"></i> 
                                <span class="title">主持人管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/Hospital/hospList.html" class="add_tab" con="Live" act="upload">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">医院管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/Dietitians/dietiList.html" class="add_tab" con="Live" act="upload">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">营养师管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/Dietitians/dietiPostList.html" class="add_tab" con="Live" act="upload">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">营养师文章管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                         <li>  
                            <a  href="/Corp/corpnewslist.html" class="add_tab" con="Live" act="upload">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">公司大事记录</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="评论管理" data-options="iconCls:'icon-bubbles5'" >
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/Comment/index.html" class="add_tab" con="Live" act="index">
                                <i class="icon-list4"></i> 
                                <span class="title">评论管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="日志管理" data-options="iconCls:'icon-calendar5'" >
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/Log/logList.html" class="add_tab" con="Live" act="index">
                                <i class="icon-list4"></i> 
                                <span class="title">日志管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div title="工作记录" data-options="iconCls:'icon-clipboard5'" >
                    <ul class="page-sidebar-menu">
                        <li>  
                            <a  href="/work/workList.html" class="add_tab" con="Live" act="index">
                                <i class="icon-list4"></i> 
                                <span class="title">工作记录</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" data-options="region:'center',title:'Buongiorno, principessa',iconCls:'icon-ok'">
            
    <div class="easyui-panel" title="添加主持人"  data-options="fit:true,border:false">
        <div style="padding:10px 60px 20px 60px">
            <form id="ff" method="post" class="admin-form">
                <div class="input-group">
                    <label>主持人姓名:</label>
                    <input class="easyui-validatebox" style="width:400px" id="title" value="<?php echo ($Rs['name']); ?>" type="text" name="name" data-options="required:true" ></input>
                </div>
                <div class="hasEditor hasPic" style="margin-top:20px;">
                    <label >主持人照片(首页)：</label>
                    <div id="tdimgcover" style="display: inline-block">
                        <div class="showImg" style="height:163px;">
                            <div id="disimgcover" class="showImgC">
                                <?php echo ($Rs['fphoto']); ?>
                            </div>
                            <div id="btnimgcover">
                                <input type="button" style="width: 133px;" class="btn btn-primary" id="image" value="上传图片" />
                            </div>
                            <input type="hidden" name="photo" id="photo" value="<?php echo ($Rs['photo']); ?>"  />
                        </div>
                        <script id="myeditor"></script> 
                    </div>
                </div>
                <div class="hasEditor hasPic" style="margin-top:20px;">
                    <label >主持人照片(电视台小)：</label>
                    <div id="tdimgcover" style="display: inline-block">
                        <div class="showImg" style="height:163px;">
                            <div id="distvsmpic" class="showImgC">
                                <?php echo ($Rs['ftvsmpic']); ?>
                            </div>
                            <div id="btnimgcover">
                                <input type="button" style="width: 133px;" class="btn btn-primary" id="tvsmpicBtn" value="上传图片" />
                            </div>
                            <input type="hidden" name="tvsmpic" id="tvsmpic" value="<?php echo ($Rs['photo']); ?>"  />
                        </div>
                        <script id="tvsmpicEditor"></script> 
                    </div>
                </div>
                         <div class="hasEditor hasPic" style="margin-top:20px;">
                    <label >主持人照片(电视台大)：</label>
                    <div id="tdimgcover" style="display: inline-block">
                        <div class="showImg" style="height:163px;">
                            <div id="distvbgpic" class="showImgC">
                                <?php echo ($Rs['ftvbgpic']); ?>
                            </div>
                            <div id="btnimgcover">
                                <input type="button" style="width: 133px;" class="btn btn-primary" id="tvbgpicBtn" value="上传图片" />
                            </div>
                            <input type="hidden" name="tvbgpic" id="tvbgpic" value="<?php echo ($Rs['photo']); ?>"  />
                        </div>
                        <script id="tvbgpicEditor"></script> 
                    </div>
                </div>
                <div class="input-group">
                    <label>主持风格:</label>
                    <input class="easyui-validatebox mid-text" value="<?php echo ($Rs['style']); ?>" type="text" name="style" ></input>
                </div>
                <div class="input-group">
                    <label>微博地址:</label>
                    <input name="microblog" id="microblog" type="text" size="20" value="<?php echo ($Rs['microblog']); ?>" >
                </div>
                <div class="input-group">
                    <label>生日:</label>
                    <input name="birthday" class="easyui-datebox" id="birthday" type="text" size="20" value="<?php echo ($Rs['birthday']); ?>" >
                </div>
                <div class="input-group">
                    <label>星座:</label>
                    <input name="constellation"  id="constellation" type="text" size="20" value="<?php echo ($Rs['constellation']); ?>" >
                </div>
                <div class="input-group">
                    <label>喜欢的颜色:</label>
                    <input name="color"  id="color" type="text" size="20" value="<?php echo ($Rs['color']); ?>" >
                </div>
                <div class="input-group">
                    <label>血型:</label>
                    <input name="blood"  id="blood" type="text" size="20" value="<?php echo ($Rs['blood']); ?>" >
                </div>
                <div class="input-group">
                    <label>性格:</label>
                    <input name="xingge"  id="xingge" type="text" size="20" value="<?php echo ($Rs['xingge']); ?>" >
                </div>
                <div class="input-group">
                    <label>爱好:</label>
                    <input name="hobby"  id="hobby" type="text" size="20" value="<?php echo ($Rs['hobby']); ?>" >
                </div>
                <div class="input-group">
                    <label style="float: left">主持节目:</label>
                    <div class="checkbox-inline" style="width:90%;float: left">
                        <?php echo ($fprogram); ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="input-group">
                    <label>属性:</label>
                    <?php echo ($ftype); ?>
                </div>
                <div class="input-group hasEditor" >
                    <label>主持人寄语:</label>
                    <textarea name="message" style="width: 600px;height: 100px;" ><?php echo ($Rs['message']); ?></textarea>
                </div>
                <div  class="input-group hasEditor">
                    <label>内容：</label>
                    <script id="info" class="editor" name="info" type="text/plain">
                        <?php echo ($Rs['info']); ?>
                    </script>
                    <script type="text/javascript">
                        var editor = UE.getEditor('info');
                    </script>
                    <div class="clear"></div>
                </div>
                <div class="input-group">
                    <label>是否启用:</label>
                    <?php echo ($fisopen); ?>
                </div>
                <div class="input-group">
                    <label></label>
                    <button class="btn btn-primary" id="submit" type="button">提交</button>
                    <button class="btn btn-primary" id="reset" type="button" >重置</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        /**
         /*图片上传*/
        $(function() {
            initImageUpload('myeditor', 'photo', 'disimgcover', 'image');
            initImageUpload('tvsmpicEditor', 'tvsmpic', 'distvsmpic', 'tvsmpicBtn');
            initImageUpload('tvbgpicEditor', 'tvbgpic', 'distvbgpic', 'tvbgpicBtn');
        });
        /**
         * 
         * 
         * @param {type} editorid
         * @param {type} inputId
         * @param {type} disId
         * @param {type} showId
         * @returns {undefined}
         */
        function initImageUpload(editorid, inputId, disId, showId) {
            var image = {
                editor: null,
                init: function(editorid, keyid, disId) {
                    var _editor = this.getEditor(editorid);
                    _editor.ready(function() {
                        _editor.setDisabled();
                        _editor.hide();
                        _editor.addListener('beforeInsertImage', function(t, args) {
                            var imgsrc = args[0].src;
                            $("#" + keyid).val(imgsrc);
                            $("#" + disId).html('<img src="' + imgsrc + '" width="120" height="120" />');
                        });
                    });
                },
                getEditor: function(editorid) {
                    this.editor = UE.getEditor(editorid);
                    return this.editor;
                },
                show: function(id) {
                    var _editor = this.editor;
                    //注意这里只需要获取编辑器，无需渲染，如果强行渲染，在IE下可能会不兼容（切记）  
                    //和网上一些朋友的代码不同之处就在这里  
                    $("#" + id).click(function() {
                        var image = _editor.getDialog("insertimage");
                        image.render();
                        image.open();
                    });
                },
                render: function(editorid) {
                    var _editor = this.getEditor(editorid);
                    _editor.render();
                }
            };
            image.init(editorid, inputId, disId);
            image.show(showId);
        }

    </script>

        </div>
    </div>
</body>
</html>