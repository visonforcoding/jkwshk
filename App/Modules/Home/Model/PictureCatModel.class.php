<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-3-13 17:26:23 by 曹文鹏 , caowenpeng1990@126.com
* For          :   
*/
class PictureCatModel extends Model{
    
    /**
     * 根据类别名获取类别ID
     * @param string $category 类别名
     * @return array 该类别ID
     */
    public function getPicCatId($category){
        $picCat = $this->field('id')
            ->where("name = '$category'")
            ->find();
        return $picCat['id'];
    }
}
