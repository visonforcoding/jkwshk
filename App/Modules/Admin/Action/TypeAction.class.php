<?php
/**
 * Encoding     :   UTF-8
 * Created on   :   2014-7-16 16:45:14 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   栏目类型
 */
class TypeAction extends Action {

    public function getTypeForCheckBox() {
        $Model = D('VideoType');
        $res = $Model->select();
        echo json_encode($res);
    }

}
