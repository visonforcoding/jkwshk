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

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
//CKEDITOR.replace( 'info');//加载编辑器
//完善SEO
    function showseo() {
        var sbtitle = Dom("seoall");
        if (sbtitle) {
            if (sbtitle.style.display == 'block') {
                Dom('span_').innerHTML = '+';
                sbtitle.style.display = 'none';
            } else {
                Dom('span_').innerHTML = '- ';
                sbtitle.style.display = 'block';
            }
        }
    }
</script>
<div class="edit">
    <div class="editContent">
        <form method="post" id="fm1" action="/ajax/submit/" >
            <input type="hidden" name="action" value="<?php echo ($action); ?>"  />
            <input type="hidden" name="id" value="<?php echo ($Rs['id']); ?>"  />
            <input type="hidden" name="classname" value="<?php echo ($classname); ?>"  />
            <input type="hidden" name="setreferer" value="<?php echo ($setreferer); ?>"  />
            <div class="hit">
                <p id="idspan" onclick="showseo()"  style="font-weight:bold; cursor:pointer; font-size:14px;" class="cRed" />
                <span id="span_">+</span>完善SEO资料
                </p>
                <div id="seoall" style="display: none">
                    <table width="100%">
                        <tr>
                            <td width="15%">关键字:(keywords)</td>
                            <td width="85%">
                                <p><b class="cRed">说明</b>:此项为专业SEO人士使用。请保持在<span style="color:red">100</span>个汉字以内哦</p>
                                <input name="keywords" id="keywords"
                                       class="inputText w310" type="text" value="<?php echo ($Rs['keywords']); ?>" />  
                            </td>
                        </tr>
                        <tr>
                            <td>简单描述:(description)</td>
                            <td>
                                <p><b class="cRed">说明</b>:此项为专业SEO人士使用。请保持在<span style="color:red">200</span>个汉字以内哦</p> 
                                <textarea id="description" name="description"
                                          style="width: 99%"><?php echo ($Rs['description']); ?></textarea>     
                            </td>
                        </tr>   
                    </table>
                </div>
            </div>
            <table width="1024">
                <tr height="70">
                    <td width="80" align="right"><span class="cRed">*</span>所属分类：</td>
                    <td width="310">
                        <?php echo ($fpid); ?>
                    </td>
                </tr>
                <tr height="70">
                    <td width="80" align="right"><span class="cRed">*</span>分类名称：</td>
                    <td width="310"><input type="text"  class="inputText w310" id="name" name="name" value="<?php echo ($Rs['name']); ?>" /></td>
                </tr>
             <tr height="50">
                    <td width="80" align="right"><span class="cRed">*</span>是否是专辑:</td>
                    <td width="310">
                <input type="radio" name="zhuanjino" value="1" <?php if($Rs['zhuanjino'] == '1'): ?>checked<?php endif; ?>  id="RadioGroup1_1" />
                    是
                <input type="radio" name="zhuanjino" value="0"  <?php if($Rs['zhuanjino'] == '0'): ?>checked<?php endif; ?>   id="RadioGroup1_1" />
                    否
                </td>
                </tr>
                <tr>
                    <td width="80" align="right"><span class="cRed">*</span>分类（专辑）封面：</td>
                    <td id="tdimgcover">
                        <div class="showImg" style="height:163px;">
                            <div id="disimgcover" class="showImgC">
                                <?php if(empty($Rs)): else: ?>
                            <img src="<?php echo ($Rs['coverimage']); ?>" width="120" height="120" /><?php endif; ?>
                            </div>
                            <div id="btnimgcover">
                                <input type="button" class="btnBlue" id="image" value="上传图片" />
                            </div>
                            <input type="hidden" name="coverimage" id="topimg" value="<?php echo ($Rs['coverimage']); ?>"  />
                        </div>
                        <script id="myeditor"></script>  
                        <script type="text/javascript">
                            /*图片上传*/
                            (function($) {
                                var image = {
                                    editor: null,
                                    init: function(editorid, keyid) {
                                        var _editor = this.getEditor(editorid);
                                        _editor.ready(function() {
                                            _editor.setDisabled();
                                            _editor.hide();
                                            _editor.addListener('beforeInsertImage', function(t, args) {
                                                var imgsrc = args[0].src;
                                                $("#" + keyid).val(imgsrc);
                                                $("#disimgcover").html('<img src="' + imgsrc + '" width="120" height="120" />');

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
                                $(function() {
                                    image.init("myeditor", "topimg");
                                    image.show("image");
                                });
                            })(jQuery);
                        </script>
                    </td>
                </tr>
                <tr height="50">
                    <td width="85" align="right"><span class="cRed">*</span>专辑类型：</td>
                    <td width="310">
                        <?php echo ($fflags); ?>
                    </td>
                </tr>
                <tr height="50">
                    <td width="85" align="right"><span class="cRed">*</span>栏目时长：</td>
                 <td width="310"><input type="text"  class="inputText w310" id="programtime" name="programtime" value="<?php echo ($Rs['programtime']); ?>" /></td>
                </tr>
                <tr height="50">
                    <td width="85" align="right"><span class="cRed">*</span>主播：</td>
                    <td width="310">
                        <?php echo ($fhost); ?>
                    </td>
                </tr>
<!--                <tr height="50">
                    <td align="right" class="valignTop"><span class="cRed">*</span>描述说明：</td>
                    <td class="valignTop"><textarea id="info" name="description" class="textareaStyle w310"><?php echo ($Rs['description']); ?></textarea></td>
                </tr>-->
                 <tr>
                    <td width="80" align="right"><span class="cRed">*</span>logo图：</td>
                    <td id="tdlogo">
                        <div class="showImg" style="height:163px;">
                            <div id="dislogo" class="showImgC">
                                <?php if(empty($Rs["logo"])): else: ?>
                            <img src="<?php echo ($Rs['logo']); ?>" width="120" height="120" /><?php endif; ?>
                            </div>
                            <div id="btnimgcover">
                                <input type="button" class="btnBlue" id="logoimage" value="上传图片" />
                            </div>
                            <input type="hidden" name="logo" id="logo" value="<?php echo ($Rs['logo']); ?>"  />
                        </div>
                        <script id="myeditor2"></script>  
                        <script type="text/javascript">
                            /*图片上传*/
                            (function($) {
                                var image = {
                                    editor: null,
                                    init: function(editorid, keyid) {
                                        var _editor = this.getEditor(editorid);
                                        _editor.ready(function() {
                                            _editor.setDisabled();
                                            _editor.hide();
                                            _editor.addListener('beforeInsertImage', function(t, args) {
                                                var imgsrc = args[0].src;
                                                $("#" + keyid).val(imgsrc);
                                                $("#dislogo").html('<img src="' + imgsrc + '" width="120" height="120" />');

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
                                $(function() {
                                    image.init("myeditor", "logo");
                                    image.show("logoimage");
                                });
                            })(jQuery);
                        </script>
                    </td>
                </tr>
                  <tr>
                    <td width="80" align="right"><span class="cRed">*</span>健康卫视台节目封面图：</td>
                    <td id="tdlogo">
                        <div class="showImg" style="height:163px;">
                            <div id="distvlogo" class="showImgC">
                                <?php if(empty($Rs["tvlogo"])): else: ?>
                            <img src="<?php echo ($Rs['tvlogo']); ?>" width="120" height="120" /><?php endif; ?>
                            </div>
                            <div id="btnimgcover">
                                <input type="button" class="btnBlue" id="tvlogoimage" value="上传图片" />
                            </div>
                            <input type="hidden" name="tvlogo" id="tvlogo" value="<?php echo ($Rs['tvlogo']); ?>"  />
                        </div>
                        <script id="myeditor3"></script>  
                        <script type="text/javascript">
                            /*图片上传*/
                            (function($) {
                                var image = {
                                    editor: null,
                                    init: function(editorid, keyid) {
                                        var _editor = this.getEditor(editorid);
                                        _editor.ready(function() {
                                            _editor.setDisabled();
                                            _editor.hide();
                                            _editor.addListener('beforeInsertImage', function(t, args) {
                                                var imgsrc = args[0].src;
                                                $("#" + keyid).val(imgsrc);
                                                $("#distvlogo").html('<img src="' + imgsrc + '" width="120" height="120" />');

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
                                $(function() {
                                    image.init("myeditor3", "tvlogo");
                                    image.show("tvlogoimage");
                                });
                            })(jQuery);
                        </script>
                    </td>
                </tr>
                <tr height="50">
                    <td align="right"><span class="cRed">*</span>状态：</td>
                    <td>
                        <?php echo ($fisopen); ?>
                    </td>
                </tr>
                <tr height="60">
                    <td>&nbsp;</td>
                    <td><input type="submit" value="提&nbsp;交" class="btnBlue"><input type="reset" value="重&nbsp;置" class="btnGray ml20"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('info'/* ,{
     filebrowserImageUploadUrl  :  '/index/ckUpload.html'
     } */);
</script>
</body>
</html>