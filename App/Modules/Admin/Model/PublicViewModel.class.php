<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-7-14 10:46:02 by 曹文鹏 , caowenpeng1990@126.com
* For          :   通用视图模型
*/
class PublicViewModel extends ViewModel{
     /**
     * 查找所有记录，返回jquery easy ui datagrid json 数据，用于jquery easy ui 分页显示
     * @param type $curPage
     * @param type $pageSize
     * @param type $order
     * @return type
     */
    public function getAllJson($curPage, $pageSize,$sort='',$order = '',$where='')
    {
        
        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        if (!empty($order)) {
            $sortArr = explode(',', $sort);
            $orderArr = explode(',',$order);
            $orderby = array_combine($sortArr, $orderArr);
            $nums = $this->where($where)->count(); //总条数
           
            $res = $this->where($where)->limit($offset, $pageSize)->order($orderby)->select();
        } else {
            $nums = $this->where($where)->count(); //总条数
            $res = $this->where($where)->limit($offset, $pageSize)->select();
        }
        if(empty($res)){
            $res = array();
        }
        $arr_json = array('total' => $nums, 'rows' => $res);
        $res_json = json_encode($arr_json);
        return $res_json;
    }
}
