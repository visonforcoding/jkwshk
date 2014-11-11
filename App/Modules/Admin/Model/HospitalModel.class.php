<?php

// 医院模型
class HospitalModel extends CommonModel {

    public $_validate = array(
        array('name', 'require', '名称不允许为空！', 1), //0存在就验证1必须验证2值不为空时验证
        array('name', '', '名称已经存在！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
    );
    public $_auto = array(
        array('addtime', 'time', self::MODEL_INSERT, 'function'),
        array('updatetime', 'time', self::MODEL_UPDATE, 'function'),
    );

    protected function funcf($inVal) {
        if (isset($inVal)) {
            return implode(',', $inVal);
        } else {
            return NULL;
        }
    }
    
    
    public function dateFormat() {
        return date('Y-m-d H:i:s');
    }
    
     public function onlyOne($title) {
        if ($this->where("name = '$title'")->find()) {
            return false;
        } else {
            return true;
        }
    }

}
