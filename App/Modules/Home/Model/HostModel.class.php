<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Description of 主持人表
 *
 * @author Administrator
 */
class HostModel extends Model {
   //查出主播
   Public function getAnchor(){
      $people = $this->field("id,name,photo,microblog")
                     ->where("isopen='1'")
                     ->order('ascno asc')
                     ->select();
      return $people;
   }
   /*
    * @Parm 根据主持人名查出信息
    * return $arr
    */
    Public function getHostInfo($name){
        $info = $this->field('id,name,photo,microblog')
                     ->where("iseopen=1 name='$name'")
                     ->find();
             return $info;
    }               
    
}
