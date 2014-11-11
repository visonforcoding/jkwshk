<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-7-15 11:19:03 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   属性管理
 */
class AttributeAction extends Action {

    public function getAttrForCheckBox() {
        $Attribute = D('Attribute');
        $attribute = $Attribute->select();
        echo json_encode($attribute);
    }

}
