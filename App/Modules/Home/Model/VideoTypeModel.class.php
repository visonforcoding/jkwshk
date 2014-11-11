<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-4-3 17:44:35 by 曹文鹏 , caowenpeng1990@126.com
* Modify       :   曹轩铭
* For          :   db_video_type 模型
*/
class VideoTypeModel extends Model{
    
    /**
     * 
     * @param type $id
     * @return string 类型名
     */
    public function getTypeName($id){
       $type= $this->field('name')
                ->where("id like '%$id%'")
                ->find();
       $name = $type['name'];
       return $name;
    }
    /*
     * 获取Id
     * @param typeName
     * @return INT
     */
    public function  getTypeId($name){
        $id = $this->field('id')
                       ->where("name='$name'")
                       ->find();
       $typeId = $id['id'];
       return $typeId;
    }
}

