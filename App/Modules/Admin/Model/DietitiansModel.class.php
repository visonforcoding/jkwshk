<?php

// 营养师模型
class DietitiansModel extends CommonModel {

    public $_validate = array(
        array('name', 'require', '名称不允许为空！', 1), //0存在就验证1必须验证2值不为空时验证
        array('name', 'onlyOne', '名称已经存在！', 0, 'callback', 1), // 在新增的时候验证name字段是否唯证
    );
    public $_auto = array(
        array('addtime', 'time', self::MODEL_INSERT, 'function'),
        array('updatetime', 'time', self::MODEL_UPDATE, 'function'),
    );

    protected function onlyOne($title) {
        if ($this->where("title = '$title'")->find()) {
            return false;
        } else {
            return true;
        }
    }

}
