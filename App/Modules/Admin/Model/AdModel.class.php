<?php
// 广告模型
class AdModel extends CommonModel {
    public $_validate	=	array(
		array('name','require','名称不允许为空！',1),//0存在就验证1必须验证2值不为空时验证
		array('name','','名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯证
        );

    public $_auto		=	array(
        array('addtime','time',self::MODEL_INSERT,'function'),
        array('updatetime','time',self::MODEL_UPDATE,'function'),
		array('starttime','functime',self::MODEL_BOTH,'callback'),
		array('endtime','functime',self::MODEL_BOTH,'callback'),
        );
	protected function functime($time) {
        if(isset($time)) {
            return strtotime($time);
        }else{
            return NULL;
        }
    }
}