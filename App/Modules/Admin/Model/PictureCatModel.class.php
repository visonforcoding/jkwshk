<?php
// 图片管理类模型
class PictureCatModel extends CommonModel {
    public $_validate	=	array(
		//0存在就验证1必须验证2值不为空时验证
        array('name','require','名称必须填写',1),
        array('name','','分类名称已经存在',1,'unique',1),//1新增时验证2编辑时验证3全部情况都验证
        );
}