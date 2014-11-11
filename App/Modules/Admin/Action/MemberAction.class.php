<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-7-8 16:32:41 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   会员模块
 */
class MemberAction extends CommonAction {

    public function index() {
        $this->display();
    }

    /**
     * 获取会员数据 for easyui-grid
     */
    public function getMembers() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'regtime' : $sort;
        $order = I('order');
        $order = empty($order) ? 'desc' : $order;
        $name = I('name');
        if (!empty($name)) {
            $where['username'] = array('like', "%$name%");
        }
        $Member = new MemberModel();
        echo $Member->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

    /**
     * 发站内信
     */
    public function sendMsg() {
        $action = I('action');
        $model = D('Msg');
        if (!empty($action) && $action == 'edit') {
            $id = I('id');
            $Rs = $model->where("id = '$id'")->find();
        } else {
            $action = 'add';
        }
        $this->assign(array(
            'action' => $action,
            'classname' => 'Msg',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));
        $this->display();
    }

    /**
     * 处理发送站内信
     */
    public function doSendMsg() {
        $action = I('action');
        if (!empty($action) && $action == 'edit') {
            
        } else {
            $msg = array(
                I('oid'),
                I('title'),
                I('starttime'),
                I('endtime'),
                I('isemail'),
                I('isopen'),
                I('content'),
                I('author'),
                I('summary')
            );
            $msgAction = new MsgAction();
            $ck = $msgAction->sendMsg($msg);
            if ($ck) {
                $output['success'] = true;
                $output['message'] = '添加成功！';
            } else {
                $output['success'] = false;
                $output['message'] = '添加失败！';
            }
            echo json_encode($output);
        }
    }

    /**
     * 获取会员数据for easyui-combogrid
     */
    public function getMembersForCombogrid() {
        $q = isset($_POST['q']) ? $_POST['q'] : ''; // the request parameter
        // query database and return JSON result data
        $Member = D('Member');
        if (empty($q)) {
            $map = '';
        } else {
            $map['username'] = array('like', "%$q%");
        }
        $members = $Member->where($map)->select();
        echo json_encode($members);
    }

}
