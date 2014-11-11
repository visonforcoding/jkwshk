<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-22 15:30:43 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   焦点图模型
 */
class FocusModel extends CommonModel {

    public $_validate = array(
        array('level', 'notLess', '优先级数错误！', 1, 'callback', Model::MODEL_INSERT), // 在新增的时候验证name字段是否唯一
    );
    public $_auto = array(
        array('ctime', 'dateFormat', self::MODEL_INSERT, 'callback'), //自动完成
        array('cid', 'funcflags', self::MODEL_BOTH, 'callback'),
    );

    protected function dateFormat() {
        return date('Y-m-d H:i:s');
    }

    protected function onlyOne($title) {
        if ($this->where("title = '$title'")->find()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 添加的时候要大于
     * @param type $level
     * @return boolean
     */
    public function notLess($level) {
        $focus = $this->order('level desc')->find();
        if ($focus) {
            $lev = $focus['level'];
            if ($level <= $lev) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    protected function funcflags($inVal) {
        if (isset($inVal)) {
            return implode(',', $inVal);
        } else {
            return NULL;
        }
    }

    /**
     * 编辑的时候要大于或等于
     * @param type $level
     * @return boolean
     */
    public function moreOrEq($level) {
        $focus = $this->order('level desc')->find();
        if ($focus) {
            $lev = $focus['level'];
            if ($level < $lev) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    public function getDataJson($curPage, $pageSize, $sort = '', $order = '', $where = '') {

        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        if (!empty($order)) {
            $sortArr = explode(',', $sort);
            $orderArr = explode(',', $order);
            $orderby = array_combine($sortArr, $orderArr);
            $nums = $this->where($where)->count(); //总条数

            $res = $this->where($where)->limit($offset, $pageSize)->order($orderby)->select();
        } else {
            $nums = $this->where($where)->count(); //总条数
            $res = $this->where($where)->limit($offset, $pageSize)->select();
        }
        foreach ($res as $key => $value) {
            $typeArr = explode(',', $value['cid']);
            if (is_array($typeArr)) {
                foreach ($typeArr as $v) {
                    $res[$key]['fcid'] .= $this->getCatNameById($v) . '&nbsp';
                }
            }
        }
        if (empty($res)) {
            $res = array();
        }
        $arr_json = array('total' => $nums, 'rows' => $res);
        $res_json = json_encode($arr_json);
        return $res_json;
    }
    
    public function getCatNameById($id){
        $Focus_cat = new Model('focus_cat');
        $focus = $Focus_cat->where("id = $id")->find();
        if($focus){
            return $focus['name'];
        }else{
            return NULL;
        }
    }

}
