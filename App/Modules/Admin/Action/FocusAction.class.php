<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-21 10:49:46 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   焦点图
 */
class FocusAction extends CommonAction {

    /**
     * 焦点图管理
     */
    public function index() {
        $Focus_cat = new CommonModel('Focus_cat');
        $column = $Focus_cat->field('id,name')
                ->select();
        $this->assign(array(
            'column' => $column
        ));
        $this->display();
    }

    /**
     * 添加焦点图
     */
    public function addFocus() {
        $action = I('action');
        $Focus = new CommonModel('Focus');
        $id = I('id');
        if ($action == 'add') {
            $Rs['photo'] = '';
            $res = $Focus->order('level desc')->find();
            $Rs['level'] = $res['level']+1;
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Focus->find($id);
            if ($Rs['photo']) {
                $Rs['pic'] = '<img src="' . $Rs['photo'] . '" width="120" height="120" />';
            }
        }
        $Focus_cat = new CommonModel('Focus_cat');
        $fcid = $Focus_cat->getField('id,name'); //属性
        
        $FocusType = new CommonModel('Focus_type');
        $focusType = $FocusType->select();
        $this->assign(array(
            'ffcat' => getCheckBox('cid', $fcid, explode(',', $Rs['cid'])),
            'focusType'=>$focusType,
            'action' => $action,
            'Rs' => $Rs,
            'status' => $Rs['status'],
            'classname' => 'Focus',
            'setreferer' => '/focus/index',
            'uname' => $_SESSION['loginName'], //登录管理员用户名
        ));
        $this->display();
    }

    public function category() {
        $this->display();
    }

    /**
     * 获取焦点图
     */
    public function getFocus() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $order = I('order');
        $cid = I('cid');
        if (!empty($cid)) {
            $map['cid'] = array('eq', "$cid");
        }
        $Focus = new FocusModel();
        echo $Focus->getDataJson($curPage, $pageSize, $sort, $order, $map);
    }

    /**
     * 获取焦点图详细信息
     */
    public function getFocusDetail() {
        $id = $_REQUEST['id'];
        $Focus = new CommonModel('Focus');
        $FocusItem = $Focus->table('db_focus f')
                        ->field('f.title,f.photo,f.ctime,f.info,f.link,fc.name,f.status')
                        ->join('db_focus_cat fc ON fc.id = f.cid')
                        ->where("f.id='$id'")->find();
        $this->assign('focus', $FocusItem);
        $this->display();
    }

    /**
     * 删除焦点图
     */
    public function delFocus() {
        $ids = I('data');
        $FocusCat = new CommonModel('Focus');
        $map['id'] = array('in', $ids);
        $rs = $FocusCat->where($map)->delete();
        if ($rs) {
            $this->ajaxReturn($rs, '删除成功', 1);
        } else {
            $this->ajaxReturn(0, '删除失败', 0);
        }
    }

    /**
     * 编辑焦点图
     */
    public function editFocus() {
        $cat = $_REQUEST['data'];   //用TP的I方法老不行
        $id = $cat[0]['id'];
        $Focus = new FocusModel();
        $level = $cat[0]['level'];
        if ($Focus->moreOrEq($level)) {
            $data['level'] = $level;
            $data['info'] = trim($cat[0]['info']);
            $data['link'] = $cat[0]['link'];
            $data['photo'] = $cat[0]['photo'];
            $data['cid'] = $cat[0]['cid'];
            $data['link'] = $cat[0]['link'];
            $data['status'] = $cat[0]['status'];
            $rs = $Focus->where("id = '$id'")->save($data);
            if ($rs) {
                $this->ajaxReturn($rs, '修改成功!', 1);
            } else {
                $this->ajaxReturn(0, '修改不成功！', 0);
            }
        } else {
            $this->ajaxReturn(0, '排序值不科学！', 0);
        }
    }

    public function getFocusCat() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $order = I('order');
        $FocusCat = new CommonModel('Focus_cat');
        echo $FocusCat->getAllJson($curPage, $pageSize, $sort, $order);
    }

    /**
     * 添加分类
     */
    public function addCat() {
        $name = trim(I('name'));
        $describe = I('describe');
        $data['name'] = $name;
        $data['describe'] = $describe;
        $FocusCat = new CommonModel('Focus_cat');
        $rs = $FocusCat->add($data);
        if ($rs) {
            $output['success'] = true;
            $output['message'] = '添加成功!';
        } else {
            $output['success'] = false;
            $output['message'] = '添加失败！';
        }
        echo json_encode($output);
    }

    /**
     * 删除栏目
     */
    public function delCat() {
        $ids = I('data');
        $FocusCat = new CommonModel('Focus_cat');
        $map['id'] = array('in', $ids);
        $rs = $FocusCat->where($map)->delete();
        if ($rs) {
            $this->ajaxReturn($rs, '删除成功', 1);
        } else {
            $this->ajaxReturn(0, '删除失败', 0);
        }
    }

    /**
     * 编辑栏目
     */
    public function editCat() {
        $cat = $_REQUEST['data'];   //用TP的I方法老不行
        $id = $cat[0]['id'];
        $data['name'] = $cat[0]['name'];
        $data['describe'] = $cat[0]['describe'];
        $FocusCat = new CommonModel('Focus_cat');
        $rs = $FocusCat->where("id = '$id'")->save($data);
        $sql = $FocusCat->getLastSql();
        $FocusCat->getLastSql();
        if ($rs) {
            $this->ajaxReturn($rs, '修改成功!', 1);
        } else {
            $this->ajaxReturn($sql, '删除失败！', 0);
        }
    }

}
