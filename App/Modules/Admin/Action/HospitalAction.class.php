<?php

/*
 * 功能： 医院管理
 * 作者：张雷刚
 * 时间：2013年12月5日12:01:24
 */

class HospitalAction extends CommonAction {

    public function index() {
        //列表过滤器，生成查询Map对象
        $map = array();
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['account'] = array('like', "%" . $keyword . "%");
        }
        $Model = D("Hospital");
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->field('id,name,address,addtime,updatetime,isopen')
                ->where($map)
                ->order()
                ->limit($page->firstRow . ',' . $page->listRows)
                ->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

    //新增、修改医院
    public function indexEdit() {
        $Model = M("Hospital");
        $action = I('action');
        $Areas = D('Areas');
        $area = $Areas->getArea('1');
        $this->assign('area', $area);
        if ($action == 'add') {
            
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->where('id=' . $id)->find();
            $provinceId = $Rs['province'];
            $Rs['province'] = $Areas->getAreaName($provinceId);
            $cityId = $Rs['city'];
            $Rs['city'] = $Areas->getAreaName($cityId);
            $districtId = $Rs['district'];
            $Rs['district'] = $Areas->getAreaName($districtId);
            if ($Rs['photo']) {
                $Rs['fphoto'] = '<img src="' . $Rs['photo'] . '" width="120" height="120" />';
            }
        }
        $this->assign(array(
            'Rs' => $Rs,
            'action' => $action,
            'classname' => 'Hospital',
            'setreferer' => '/hospital/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));

        $this->display();
    }

    /**
     * 添加/修改
     */
    public function add() {
        $Model = M("Hospital");
        $action = I('action');
        $Areas = D('Areas');
        $area = $Areas->getArea('1');
        $this->assign('area', $area);
        if ($action == 'add') {
            
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->where('id=' . $id)->find();
            $provinceId = $Rs['province'];
            $Rs['province'] = $Areas->getAreaName($provinceId);
            $cityId = $Rs['city'];
            $Rs['city'] = $Areas->getAreaName($cityId);
            $districtId = $Rs['district'];
            $Rs['district'] = $Areas->getAreaName($districtId);
            if ($Rs['photo']) {
                $Rs['fphoto'] = '<img src="' . $Rs['photo'] . '" width="120" height="120" />';
            }
        }
        $this->assign(array(
            'Rs' => $Rs,
            'action' => $action,
            'classname' => 'Hospital',
            'setreferer' => '/hospital/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));
        $this->display();
    }

    public function doAddHospi() {
        $classname = 'Hospital';
        $model = D($classname);
        $action = I('action');
        $id = I('id');
        $name = I('name');
        $data['province'] = I('province');
        $data['city'] = I('city');
        $data['district'] = I('district');
        $data['website'] = I('website');
        $data['telphone'] = I('telphone');
        $data['photo'] = I('photo');
        $data['address'] = I('address');
        $data['keywords'] = I('keywords');
        $data['feature'] = I('feature');
        $data['coordinate'] = I('coordinate');
        $data['googlecoor'] = I('googlecoor');
        $data['description'] = I('description');
        $data['isopen'] = I('isopen');
        $data['info'] = $_REQUEST['info'];
        $data['pics'] = $_REQUEST['pics'];
        if (!empty($action) && $action == 'edit') {
            $data['name'] = $name;
            $data['updatetime'] = time();
            $result = $model->where("id = '$id'")->save($data);
            if ($result) {
                $output['success'] = true;
                $output['message'] = '修改成功！';
                $output['edit'] = true;
            } else {
                $sql = $model->getLastSql();
                $output['success'] = false;
                $output['message'] = $sql;
            }
        } else {
            if (!$model->onlyOne($name)) {
                $output['success'] = false;
                $output['message'] = '该标题已经存在！';
                echo json_encode($output);
                return;
            } else {
                $data['name'] = $name;
            }
            $data['addtime'] = $model->dateFormat();
            $result = $model->add($data); // 根据条件保存修改的数据
            if ($result) {
                $output['success'] = true;
                $output['message'] = '添加成功！';
            } else {
                $sql = $model->getLastSql();
                $output['success'] = false;
                $output['message'] = $sql;
            }
        }
        echo json_encode($output);
    }

    /**
     * 医院管理
     */
    public function hospList() {
        $this->display();
    }
    
    

    /**
     * 获得医院信息json
     */
    public function getHosp() {
        $AdminView = D('Hospital');
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'addtime' : $sort;
        $order = I('order');
        $order = empty($order) ? 'desc' : $order;
        $name = I('name');
        if (!empty($name)) {
            $where['name'] = array('like', "%$name%");
        }
        echo $AdminView->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

}
