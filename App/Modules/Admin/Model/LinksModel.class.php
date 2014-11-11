<?php
// 友情链接模型
class LinksModel extends CommonModel {
    public $_validate	=	array(
		array('name','require','名称不允许为空！',1),//0存在就验证1必须验证2值不为空时验证
		array('name','','名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯证
        );

}