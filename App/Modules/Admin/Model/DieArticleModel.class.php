<?php

// 营养师文章模型
class DieArticleModel extends CommonModel {

    public $_validate = array(
        //0存在就验证1必须验证2值不为空时验证
        array('title', 'require', '名称必须填写', 1),
        array('title', '', '分类名称已经存在', 1, 'unique', 1), //1新增时验证2编辑时验证3全部情况都验证
    );
    public $_auto = array(
        array('addtime', 'time', self::MODEL_INSERT, 'function'),
        array('updatetime', 'time', self::MODEL_UPDATE, 'function'),
        array('tagid', 'funcflags', self::MODEL_BOTH, 'callback'),
        array('userid', 'getAdminId', self::MODEL_BOTH, 'callback'),
    );

    public function funcflags($inVal) {
        if (isset($inVal)) {
            return implode(',', $inVal);
        } else {
            return NULL;
        }
    }

    public function getAdminId() {
        return $_SESSION[C('USER_AUTH_KEY')] ? $_SESSION[C('USER_AUTH_KEY')] : 0;
    }

}
