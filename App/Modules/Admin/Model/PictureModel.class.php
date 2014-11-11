<?php

// 图片组模型
class PictureModel extends CommonModel {

    public $_validate = array(
        //0存在就验证1必须验证2值不为空时验证
        array('name', 'onlyOne', '名称已经存在', 1, 'callback', 1), //1新增时验证2编辑时验证3全部情况都验证
            //array('code','/^[a-zA-Z0-9]+$/i','识别码已存在，请重新填写',1,'unique',1),//1新增时验证2编辑时验证3全部情况都验证
            //array('code','3,30','识别码超过30字符或不足，请重新填写',1,'length',3),//1新增时验证2编辑时验证3全部情况都
    );
    public $_auto = array(
        array('time', 'dateFormat', self::MODEL_INSERT, 'callback'),
        array('updatetime', 'time', self::MODEL_UPDATE, 'function'),
        array('flags', 'funcflags', self::MODEL_BOTH, 'callback'),
        array('tagid', 'funcflags', self::MODEL_BOTH, 'callback'),
        array('type', 'funcflags', self::MODEL_BOTH, 'callback'),
        array('property', 'funcflags', self::MODEL_BOTH, 'callback'),
    );

    public function dateFormat() {
        return date('Y-m-d H:i:s');
    }

    public function onlyOne($title) {
        if ($this->where("title = '$title'")->find()) {
            return false;
        } else {
            return true;
        }
    }

    public function funcflags($inVal) {
        if (isset($inVal)) {
            return implode(',', $inVal);
        } else {
            return NULL;
        }
    }

}
