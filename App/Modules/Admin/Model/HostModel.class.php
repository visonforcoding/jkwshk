<?php

// 主持人模型
class HostModel extends CommonModel {

    public $_validate = array(
        //0存在就验证1必须验证2值不为空时验证
        array('name', '', '名称已经存在！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
    );
    public $_auto = array(
        array('addtime', 'time', self::MODEL_INSERT, 'function'),
        array('updatetime', 'time', self::MODEL_UPDATE, 'function'),
        array('program', 'funcf', self::MODEL_BOTH, 'callback'),
        array('type', 'funcf', self::MODEL_BOTH, 'callback'),
    );

    public function funcf($inVal) {
        if (isset($inVal)) {
            return implode(',', $inVal);
        } else {
            return NULL;
        }
    }

}
