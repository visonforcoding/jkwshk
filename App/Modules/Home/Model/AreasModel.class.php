<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-3-27 9:41:13 by 曹文鹏 , caowenpeng1990@126.com
* For          :   城市模型
*/

class AreasModel extends Model{
       
        /**
         * 根据Id 返回 地名
         * @param type $area_id
         * @return string
         */
        public function getAreaName($area_id){
            $Rs = $this->field('area_name')
                    ->where("area_id = '$area_id'")
                    ->find();
            $area = $Rs['area_name'];
            return $area;
        }
    
}