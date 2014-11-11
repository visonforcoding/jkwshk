<?php
//   城市模型
class AreasModel extends CommonModel {
    public $_validate	=	array(
		//0存在就验证1必须验证2值不为空时验证
        array('area_name','require','名称必须填写',1),
        array('area_name','','分类名称已经存在',1,'unique',1),//1新增时验证2编辑时验证3全部情况都验证
        );
    
    
         /**
          * 根据父类ID 返回地域
          * @param type $parent_id
          * @return type
          */
        public function getArea($parent_id){
            $province = $this->field('area_id,area_name')
                    ->where("parent_id = '$parent_id'")
                    ->select();
            return $province;
        }
        
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