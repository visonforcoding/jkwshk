<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-3-20 10:33:44 by 曹文鹏 , caowenpeng1990@126.com
* For          :   新闻类别模型
*/

class NewsCatModel extends Model{
    
    /**
     * 根据类别名返回类别Id
     * @param string $category
     * @return int
     */
    public function getNewsCatId($category){
        $cat = $this->field('id')
                ->where("name = '$category'")
                ->find();
        $catId = $cat['id'];
        return $catId;
    }
    
    
 
    public function getChildNewsCatId($id){
        $cat = $this->where("pid = '$id' and isopen = '1'")
                ->getField('id',true);
        return $cat;
    }
}

