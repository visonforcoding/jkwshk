<?php
class CommonModel extends Model {

	// 获取当前用户的ID
    public function getMemberId() {
        return isset($_SESSION[C('USER_AUTH_KEY')])?$_SESSION[C('USER_AUTH_KEY')]:0;
    }

   /**
     +----------------------------------------------------------
     * 根据条件禁用表数据
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param array $options 条件
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    public function forbid($options,$field='status'){

        if(FALSE === $this->where($options)->setField($field,0)){
            $this->error =  L('_OPERATION_WRONG_');
            return false;
        }else {
            return True;
        }
    }

	 /**
     +----------------------------------------------------------
     * 根据条件批准表数据
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param array $options 条件
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */

    public function checkPass($options,$field='status'){
        if(FALSE === $this->where($options)->setField($field,1)){
            $this->error =  L('_OPERATION_WRONG_');
            return false;
        }else {
            return True;
        }
    }


    /**
     +----------------------------------------------------------
     * 根据条件恢复表数据
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param array $options 条件
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    public function resume($options,$field='status'){
        if(FALSE === $this->where($options)->setField($field,1)){
            $this->error =  L('_OPERATION_WRONG_');
            return false;
        }else {
            return True;
        }
    }

    /**
     +----------------------------------------------------------
     * 根据条件恢复表数据
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param array $options 条件
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    public function recycle($options,$field='status'){
        if(FALSE === $this->where($options)->setField($field,0)){
            $this->error =  L('_OPERATION_WRONG_');
            return false;
        }else {
            return True;
        }
    }
    
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
    
    /**
     * 
     * @param type $curPage
     * @param type $pageSize
     * @param type $where
     * @param type $sort
     * @param type $order
     * @return json
     */
    public function getDataJson($curPage, $pageSize, $where = '', $sort = '', $order = '') {
        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        $VideoType = D('VideoType');
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
            $typeArr = explode(',', $value['type']);
            if (is_array($typeArr)) {
                foreach ($typeArr as $v) {
                    $res[$key]['ftype'] .= $VideoType->getTypeNameById($v) . '&nbsp';
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
    

}
