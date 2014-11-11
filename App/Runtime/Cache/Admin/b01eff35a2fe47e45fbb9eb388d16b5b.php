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
    
    <script type="text/javascript">
        $(function() {
            $('#aa').accordion('select', '管理员管理');
            $('#dg').datagrid({
                url: "/admin/getAdmins.html",
                pagination: true,
                rownumbers: true, //显示行号
                multiSort: true, //是否能按多个字段排序
                fitColumns: true, //可以自动拓展
                height: 450,
                toolbar: '#tb',
                pageList: [5, 10, 20, 30, 40, 50, 60],
                autoRowHeight: false,
                columns: [[
                        {field: 'ck', checkbox: true},
                        {field: 'account', title: '用户名'},
                        {field: 'nickname', title: '昵称'},
                        {field: 'gname', title: '角色'},
                        {field: 'create_time', title: '创建时间', sortable: true,
                            formatter: function(value, row, index) {
                                return date('Y-m-d H:i:s', row.create_time);
                            }},
                        {field: 'last_login_time', title: '上次登录时间', sortable: true,
                            formatter: function(value, row, index) {
                                return date('Y-m-d H:i:s', row.last_login_time);
                            }},
                        {field: 'last_login_ip', title: '上次登录ip'  },
                        {field: 'isopen', title: '状态',  editor: {
                                type: 'combobox',
                                options: {
                                    valueField: 'value',
                                    textField: 'text',
                                    data: [{
                                            value: 1,
                                            text: '启用'
                                        }, {
                                            value: 0,
                                            text: '关闭'
                                        }]
                                }
                            },
                            formatter: function(value, row, index) {
                                if (row.isopen == '1') {
                                    return "启用";
                                } else {
                                    return "关闭";
                                }
                            }
                        },
                        {field: 'action', title: "操作", width: 20, formatter: function(value, row, index) {
                                return "<a class='cwp-btn' title='编辑' href='/admin/add/action/edit/id/" + row.id + "'><span style='color:#E66A3C' class='icon-pencil2'></span> 编辑</a>" +
                                        "<a class='cwp-btn' title='删除' href='javascript:void(0)' onclick='delIt();' style='margin-left:10px;'><span style='color:#E66A3C' class='icon-close'></span> 删除</a>";

                            }}
                    ]],
            });

            $('#addCat_form').form({
                onSubmit: function() {
                    var isValid = $(this).form('validate');
                    if (!isValid) {
                        showMessage('类别名不能为空！');
                    }
                    return isValid;
                },
                success: function(data) {
                    showMessage(data);
                }
            });
            $('#name').validatebox({
                required: true
            });
            $('#pid-combotree').combotree({
                onChange: function(newValue, oldValue) {
                    $('#dg').datagrid({
                        queryParams: {
                            pid: newValue
                        }
                    });
                }
            });
            $('#column-combo').combobox({
                url: '/video/getVideoTypesForCombo.html',
                valueField: 'id',
                textField: 'text',
                onSelect: function(record) {
                    $('#dg').datagrid({
                        queryParams: {
                            typeid: record.id
                        }
                    });
                }
            });
            //搜素按钮
            $('#search_button').click(function() {
                var name = $('#name').val();
                $('#dg').datagrid({
                    queryParams: {
                        name: name
                    }
                });
            });
            //清除按钮
            $('#clear_button').click(function() {
                $('#dg').datagrid({
                    queryParams: {
                    }
                });
            });
        });
        function delIt() {
            var ss = [];
            var rows = $('#dg').datagrid('getSelections');
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                ss.push(row.id); //这行记录的ID值 
            }
            ;
            $.messager.confirm('Confirm', '确定要删除记录?', function(r) {
                if (r) {
                    $.ajax({
                        type: "POST",
                        url: "/ajax/ajaxDel.html",
                        data: {"data[]": ss,'classname':'Admin'},
                        success: function(msg) {
                            showMessage(msg.info);
                            $('#dg').datagrid('load', {
                            });
                        }
                    });
                }
            });
        }
        ;
        function editIt() {
            $('#dg').datagrid('beginEdit', getIndex());
        }
        function getIndex() {
            // 获取行索引
            var row = $('#dg').datagrid('getSelected');
            var index = $('#dg').datagrid('getRowIndex', row);
            return index;
        }
        function saveEdit() {
            $('#dg').datagrid('endEdit', getIndex());
            var updated = $('#dg').datagrid('getChanges', 'updated');
            if (updated.length) {
                $.ajax({
                    type: "POST",
                    url: "",
                    data: {"data": updated},
                    success: function(msg) {
                        showMessage(msg.info);
                        $('#dg').datagrid('reload');
                    }
                });
            } else {
                showMessage("您未更新任何数据！");
            }

        }
        function cancelEdit() {
            //取消编辑
            $('#dg').datagrid('cancelEdit', getIndex());
        }

        function showMessage(msg) {
            $.messager.show({
                title: "提示信息",
                msg: msg,
                timeout: 2000,
                showType: 'show',
                style: {
                    right: 0,
                    left: '',
                    top: parent.document.body.scrollTop + parent.document.documentElement.scrollTop,
                    bottom: ''
                }
            });
        }
    </script>

    
    <style type="text/css">
        #dg tr{
            height:30px!important;
        }
        .datagrid-row {
            height: 40px;
        }
        .datagrid-cell {
            height:30px;
        }
        a.cwp-btn{
            text-decoration: none;
        }
    </style>

</head>
<body>
    <div class="easyui-layout" data-options="fit:true">
        <div data-options="region:'north',doSize:false" style="height:50px;line-height: 60px;">
            <div class="navbar" style="height: 48px;line-height: 48px;overflow-y: hidden;">
                <a  class="brand" href="/index.html" target="_blank" title="返回前台首页" >
                    <img src="__PUBLIC__/Images/home/sevenbaby/logo_top.png" border="0" height="35" width="134"/>
                </a>
                <div class="top-message" style="color: #ffffff;font-size:14px;display:inline-block">
                    请务必使用高大上的firefox或chrome 浏览器Y(^o^)Y~
                </div>
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
<!--        <div  data-options="region:'south',split:true" style="height:50px;">
            Powerd by <a href="mailto:caowenpeng1990@126.com">jkws.曹麦穗</a>
        </div>-->
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
                         <li>  
                            <a  href="/Viewpoint/index.html" class="add_tab" con="News" act="add">
                                <i class="icon-list4"></i> 
                                <span class="title">视点管理</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>  
                            <a  href="/Viewpoint/add.html" class="add_tab" con="News" act="add">
                                <i class="icon-add-to-list"></i> 
                                <span class="title">添加视点</span>
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
            
    <div class="easyui-panel" title="管理员管理" data-options="iconCls:'icon-user2',collapsible:true,fit:true,border:false" >
        <div id="tb" style="padding:5px;height:auto">  
            <div style="margin-bottom:5px">
                <a href="/admin/add/action/add" class="easyui-linkbutton" iconCls="icon-add" plain="true">添加</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="delIt();">删除</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editIt();">编辑</a>  
                <a href="#" class="easyui-linkbutton" iconCls="icon-redo" plain="true" onclick="cancelEdit()">取消</a> 
                <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="saveEdit();">保存</a>  
            </div>
            <div>
                栏目: 
                <input class="easyui-combotree" id="pid-combotree" data-options="url:'/video/getVideoCatForCombo.html',method:'get'" style="width:200px;">
                频道: 
                <input id="column-combo" class="easyui-combobox" >
                标题:
                <input id="name" type="text" value="" >
                <a href="javascript:void(0)" id="search_button" class="easyui-linkbutton" iconCls="icon-search">搜索</a>
                <a href="javascript:void(0)" id="clear_button" class="easyui-linkbutton" iconCls="icon-trash-alt">清除</a>
            </div>
        </div>
        <table id="dg">
        </table>
    </div>

        </div>
    </div>
</body>
</html>