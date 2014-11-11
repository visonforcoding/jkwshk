<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-5-15 13:44:50 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   视频模型
 */
class VideoModel extends CommonModel {

    public $_auto = array(
        array('addtime', 'dateFormat', self::MODEL_INSERT, 'callback'),
        array('updatetime', 'dateFormat', self::MODEL_UPDATE, 'callback'),
        array('type', 'funcflags', self::MODEL_BOTH, 'callback'),
        array('tags', 'funcflags', self::MODEL_BOTH, 'callback'),
    );

    public function onlyOne($title) {
        if ($this->where("title = '$title'")->find()) {
            return false;
        } else {
            return true;
        }
    }

    public function dateFormat() {
        return date('Y-m-d H:i:s');
    }

    public function funcflags($inVal) {
        if (isset($inVal)) {
            return implode(',', $inVal);
        } else {
            return NULL;
        }
    }

    public function isChose($pid) {
        if ($pid == 0) {
            return false;
        } else {
            return true;
        }
    }

    

}
