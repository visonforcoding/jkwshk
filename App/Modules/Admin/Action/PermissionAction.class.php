<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-8-13 16:25:53 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   权限模块
 */
class PermissionAction extends PublicAction {

    static function checkPermission() {
        $access = __ACTION__;  //访问地址
        $accessid = D('Access')->where("lower(path) = '$access'")->getField('id');
        $userid = session(C('USER_AUTH_KEY'));
        $groupid = D('Admin')->where("id = '$userid'")->getField('gid');//所属角色
        //等级低于此角色的权限全都拥有
        $groupLevel = D('AdminGroups')->where("id = '$groupid'")->getField('level');
        $groupidArr[] = $groupid;
        $ltGroups = D('AdminGroups')->where("level > '$groupLevel'")->select();
         if(!empty($ltGroups)&&  is_array($ltGroups)){
             foreach($ltGroups as $value){
                 $groupidArr[] = $value['id'];
             }
         }
        $groupids = implode($groupidArr,',');
        $ckPermission = D('GroupAccess')->where("groupid in ($groupids) and accessid = '$accessid'")->find();
        if ($ckPermission) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 权限编辑
     */
    public function editAccess() {
        $update = $_REQUEST['data'];   //用TP的I方法老不行
        $id = $update['id'];
        $Model = new AccessModel();
        $path = $update['path'];
        $title = $update['title'];
        $action = $update['action'];
        if ($action == 'edit') {
            if (!$Model->hasOther($id, array('path', $path))) {
                $this->ajaxReturn(0, '有相同的值存在！', 0);
            }
            if (!$Model->hasOther($id, array('title', $title))) {
                $this->ajaxReturn(0, '有相同的值存在！', 0);
            }
            $data['path'] = $path;
            $data['title'] = $title;
            $ck = $Model->where("id = '$id'")->save($data);
            if ($ck) {
                $this->ajaxReturn($ck, '更改成功！', 1);
            } else {
                $this->ajaxReturn($ck, '更改失败！', 0);
            }
        } else {
            if (!$Model->onlyOne(array('path', $path))) {
                $this->ajaxReturn(0, '有相同的值存在！', 0);
            }
            if (!$Model->onlyOne(array('title', $title))) {
                $this->ajaxReturn(0, '有相同的值存在！', 0);
            }
            $data['path'] = $path;
            $data['title'] = $title;
            $ck = $Model->add($data);
            if ($ck) {
                $this->ajaxReturn($ck, '添加成功！', 1);
            } else {
                $this->ajaxReturn($ck, '添加失败！', 0);
            }
        }
    }

    /**
     * 权限分配添加\修改
     */
    public function editGroupAccess() {
        $update = $_REQUEST['data'];   //用TP的I方法老不行
        $id = $update['id'];
        $Model = D('GroupAccess');
        $groupid = $update['groupid'];
        $accessid = $update['accessid'];
        $action = $update['action'];
        $data['groupid'] = $groupid;
        $data['accessid'] = $accessid;
        if ($action == 'edit') {
            $ck = $Model->where("groupid = '$groupid' and accessid = '$accessid'")->find();
            if ($ck) {
                $this->ajaxReturn(0, '已存在该条权限分配！', 0);
            }
            $rs = $Model->where("id = '$id'")->save($data);
            if ($rs) {
                $this->ajaxReturn($rs, '更改成功！', 1);
            } else {
                $this->ajaxReturn($rs, '更改失败！', 0);
            }
        } else {

            $ck = $Model->where("groupid = '$groupid' and accessid = '$accessid'")->find();
            if ($ck) {
                $this->ajaxReturn(0, '已存在该条权限分配！', 0);
            }
            $rs = $Model->add($data);
            if ($rs) {
                $this->ajaxReturn($rs, '添加成功！', 1);
            } else {
                $this->ajaxReturn($rs, '添加失败！', 0);
            }
        }
    }

    /**
     * 获取权限分配数据
     */
    public function getGroupAccess() {
        $GroupAccess = D('AccessView');
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'id' : $sort;
        $order = I('order');
        $order = empty($order) ? 'asc' : $order;
        $name = I('name');
        if (!empty($name)) {
            $where['aname'] = array('like', "%$name%");
        }
        echo $GroupAccess->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

}
