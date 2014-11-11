<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-5-13 17:41:44 by 曹文鹏 , caowenpeng1990@126.com
* For          :   活动表
*/
class ActivityModel extends CommonModel {

    public $_validate = array(
        array('flag', 'onlyOne', '该标识符已经存在！', 1, 'callback', Model::MODEL_BOTH), // 在新增的时候验证name字段是否唯一
    );

    protected function dateFormat() {
        return date('Y-m-d H:i:s');
    }

    protected function onlyOne($title) {
        if ($this->where("title = '$title'")->find()) {
            return false;
        } else {
            return true;
        }
    }

   
    


}

