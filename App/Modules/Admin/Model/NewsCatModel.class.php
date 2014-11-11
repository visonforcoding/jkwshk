<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-7-14 15:48:22 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   新闻类别
 */
class NewsCatModel extends CommonModel {

    /**
     * 检测是否有子元素
     * @param type $id
     * @return boolean
     */
    public function hasChild($id) {
        $child = $this->where("pid = '$id'")->select();
        if ($child) {
            return true;
        } else {
            return false;
        }
    }

}
