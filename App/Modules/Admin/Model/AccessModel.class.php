<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-8-14 17:36:18 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   
 */
class AccessModel extends CommonModel {

    public function hasOther($id, $column) {
        $ck = $this->where(" id != '$id' and $column[0] = '$column[1]'")->find();
        if (!$ck) {
            return true;
        } else {
            return false;
        }
    }

    public function onlyOne($column) {
        $ck = $this->where("$column[0]= '$column[1]'")->find();
        if (!$ck) {
            return true;
        } else {
            return false;
        }
    }

}
