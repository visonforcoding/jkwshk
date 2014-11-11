<?php
// 标签模型
class TagsModel extends CommonModel {
    public $_validate	=	array(
		//0存在就验证1必须验证2值不为空时验证
        array('name','require','标签不能为空'), //默认情况下用正则进行验证
        array('name','','标签已经存在',1,'unique',1),//1新增时验证2编辑时验证3全部情况都验证
        );

}