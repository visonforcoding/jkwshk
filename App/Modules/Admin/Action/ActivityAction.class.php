<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-5-13 17:13:15 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   活动管理
 */
class ActivityAction extends CommonAction {

    /**
     * 活动类别管理
     */
    public function category() {
        $this->display();
    }

    /**
     * 添加或修改活动
     */
    public function addActivity() {
        $action = I('action');
        $id = I('id');
        if (!empty($action) && $action = 'edit') {
            $Activity = D('Activity');
            $Rs = $Activity->where("id = '$id'")->find();
        }
        $this->assign(array(
            'action' => $action,
            'classname' => 'Activity',
            'setreferer' => '/activity/category',
            'Rs' => $Rs
        ));
        $this->display();
    }

    /**
     * sevenbaby 管理
     */
    public function sevenbaby() {
        $this->display();
    }

    /**
     * 获取活动
     */
    public function getActivity() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $order = I('order');
        $Activity = new ActivityModel();
        echo $Activity->getAllJson($curPage, $pageSize, $sort, $order);
    }

    public function getBaby() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $order = I('order');
        $cid = I('cid');
        if (!empty($cid)) {
            $map['cid'] = array('eq', "$cid");
        }
        $Baby = new CommonModel('Baby');
        echo $Baby->getAllJson($curPage, $pageSize, $sort, $order, $map);
    }

    /**
     * 获取选手详细信息
     */
    public function getBabyDetail() {
        $id = $_REQUEST['id'];
        $Baby = new CommonModel('Baby');
        $BabyItem = $Baby->where("id = '$id'")->find();
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/sevenbaby/babyshow/mod/mod/type/idnum/keyword/' . $BabyItem['idnum'] . '.html';
        $BabyItem['link'] = $url;
        $this->assign('baby', $BabyItem);
        $this->display();
    }

    /**
     * 折扣码管理
     */
    public function code() {
        $this->display();
    }

    public function getCodes() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'id' : $sort;
        $order = I('order');
        $order = empty($order) ? 'desc' : $order;
        $name = I('username');
        if (!empty($name)) {
            $where['username'] = array('like', "%$name%");
        }
        $Code = new CodeModel();
        echo $Code->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

    /**
     * 删除折扣码
     */
    public function delFocus() {
        $ids = I('data');
        $FocusCat = new CommonModel('Code');
        $map['id'] = array('in', $ids);
        $rs = $FocusCat->where($map)->delete();
        if ($rs) {
            $this->ajaxReturn($rs, '删除成功', 1);
        } else {
            $this->ajaxReturn(0, '删除失败', 0);
        }
    }

    public function editBaby() {
        $AdminView = D('AdminView');
        $adminId = $_SESSION[C('USER_AUTH_KEY')];
        $where['gname'] = array('eq','超级管理员');
        $where['id'] = array('eq',$adminId);
        $where['_logic'] = 'and';
        $ckSuper = $AdminView->where($where)->find();
        if(!$ckSuper){
            $this->ajaxReturn(0,'您所在的用户组没有权限进行该操作>_<！',0);
        }
        $request = $_REQUEST['data'];
        $id = $request[0]['id'];
        $model = new Model('Baby');
        $data = $request[0];
        $rs = $model->where("id = '$id'")->save($data);
        if ($rs) {
            $this->ajaxReturn($rs, '更改成功！', 1);
        } else {
            $this->ajaxReturn($rs, '更改失败！', 0);
        }
    }

    /**
     * 编辑折扣码
     */
    public function editCode() {
        $cat = $_REQUEST['data'];   //用TP的I方法老不行
        $id = $cat[0]['id'];
        $Code = new CodeModel();
        $status = $cat[0]['status'];
        $data['status'] = $status;
        $rs = $Code->where("id = '$id'")->save($data);
        if ($rs) {
            $this->ajaxReturn($rs, '更改成功！', 1);
        } else {
            $this->ajaxReturn($rs, '更改成功！', 1);
        }
    }

}
