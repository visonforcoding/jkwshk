<?php

// 属性模型
class videoTypeModel extends CommonModel {

    public $_validate = array(
        //0存在就验证1必须验证2值不为空时验证
        array('name', 'require', '标签不能为空'), //默认情况下用正则进行验证
        array('name', '', '标签已经存在', 1, 'unique', 1), //1新增时验证2编辑时验证3全部情况都证
    );
    protected $_auto  = array(//同样这里必须定义为$_auto
        array('ascno', '50', 'ADD'),
            //array('create_time','time','ADD','function'),//这里指明填充使用函数time()
    );

    /**
     * 根据Id返回类别名
     * @param type $id
     * @return null
     */
    public function getTypeNameById($id) {
        $res = $this->where("id = '$id'")->find();
        if ($res) {
            return $res['name'];
        } else {
            return null;
        }
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
