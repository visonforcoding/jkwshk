<?php

/*
 * 功能： 营养师管理
 * 作者：张雷刚
 * 时间：2013年12月5日12:01:24
 */

class DietitiansAction extends CommonAction {

    public function index() {
        //列表过滤器，生成查询Map对象
        $map = array();
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['account'] = array('like', "%" . $keyword . "%");
        }
        $Model = D("Dietitians");
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->field('id,name,tel,addtime,updatetime,isopen')->where($map)->order()->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

    //新增、修改营养师
    public function indexEdit() {
        $Model = M("Dietitians");
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
            'classname' => 'Dietitians',
            'setreferer' => '/Dietitians/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));

        $this->display();
    }

    //营养师文章管理
    public function article() {
        //列表过滤器，生成查询Map对象
        $map = array();
        $pid = I('pid');
        if (!empty($pid)) {
            $map['pid'] = array('eq', $pid);
        }
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['title'] = array('like', "%" . $keyword . "%");
        }
        //获取营养师数据
        $dietitiansModel = D("Dietitians");
        $dietitians = $dietitiansModel->where('isopen = 1')->getField('id,name');

        $fpid = getOption('pid', $dietitians, $pid, '', 'jumpPid(\'parent\',this)', '全部', 0);

        $Model = D("dieArticle");
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->field('id,title,hits,pid,userid,addtime,updatetime,isopen')->where($map)->order('updatetime DESC')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
            'fpid' => $fpid,
            'pid' => $pid,
            'keyword' => $keyword,
        ));
        $this->display();
    }

    //营养师文章新增、修改
    public function articleEdit() {
        $Model = D("dieArticle");
        $action = I('action');
        if ($action == 'add') {
            $Rs['photo'] = '';
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->find($id);
            if ($Rs['photo']) {
                $Rs['fphoto'] = '<img src="' . $Rs['photo'] . '" width="120" height="120" />';
            }
            if (!empty($Rs['tagid'])) {
                $tagid = explode(',', $Rs['tagid']);
                foreach ($tagid as $k => $v) {
                    $t1 = explode('|', $v);
                    $Rs['ftags'] .= '<input type="checkbox" name="tagid[]" id="flagsp" value="' . $v . '" checked="checked"> <label for="flagsp" class="ml5 mr20"> ' . $t1[1] . '</label>';
                }
            }
        }
        //获取营养师数据
        $dietitiansModel = D("Dietitians");
        $dietitians = $dietitiansModel->where('isopen = 1')->getField('id,name');

        $fpid = getOption('pid', $dietitians, $Rs['pid']);
        $this->assign(array(
            'Rs' => $Rs,
            'action' => $action,
            'classname' => 'dieArticle',
            'setreferer' => '/dietitians/article',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'fflags' => getCheckBox('flags', $fattr, explode(',', $Rs['flags'])),
            'fpid' => $fpid, //营养师
        ));

        $this->display();
    }

    /**
     * 营养师管理
     */
    public function dietiList() {
        $this->display();
    }

    /**
     * 获取营养师json
     */
    public function getDieti() {
        $Model = D('Dietitians');
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
        echo $Model->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

    /*     * *
     * *  添加营养师
     * */

    public function addDieti() {
        $Model = M("Dietitians");
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
            'classname' => 'Dietitians',
            'setreferer' => '/Dietitians/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));

        $this->display();
    }

    /**
     * 处理添加营养师
     */
    public function doAddDieti() {
        $classname = 'Dietitians';
        $model = D($classname);
        $action = I('action');
        $id = I('id');
        $name = I('name');
        $data['name'] = $name;
        $data['province'] = I('province');
        $data['city'] = I('city');
        $data['district'] = I('district');
        $data['website'] = I('website');
        $data['tel'] = I('tel');
        $data['photo'] = I('photo');
        $data['weibo'] = I('weibo');
        $data['tqq'] = I('tqq');
        $data['keywords'] = I('keywords');
        $data['description'] = I('description');
        $data['isopen'] = I('isopen');
        $data['info'] = $_REQUEST['info'];
        if (!empty($action) && $action == 'edit') {
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
            $data['addtime'] = time();
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
     * 营养师文章管理
     */
    public function dietiPostList() {
        $this->display();
    }

    public function getDietiPost() {
        $Model = D('DieArticle');
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'addtime' : $sort;
        $order = I('order');
        $order = empty($order) ? 'desc' : $order;
        $name = I('name');
        if (!empty($name)) {
            $where['title'] = array('like', "%$name%");
        }
        echo $Model->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

    /**
     * 添加修改营养师文章
     */
    public function addPost() {
        $Model = D("dieArticle");
        $action = I('action');
        if ($action == 'add') {
            $Rs['photo'] = '';
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->find($id);
            if ($Rs['photo']) {
                $Rs['fphoto'] = '<img src="' . $Rs['photo'] . '" width="120" height="120" />';
            }
            if (!empty($Rs['tagid'])) {
                $tagid = explode(',', $Rs['tagid']);
                foreach ($tagid as $k => $v) {
                    $t1 = explode('|', $v);
                    $Rs['ftags'] .= '<input type="checkbox" name="tagid[]" id="flagsp" value="' . $v . '" checked="checked"> <label for="flagsp" class="ml5 mr20"> ' . $t1[1] . '</label>';
                }
            }
        }
        //获取营养师数据
        $dietitiansModel = D("Dietitians");
        $dietitians = $dietitiansModel->where('isopen = 1')->getField('id,name');

        $fpid = getOption('pid', $dietitians, $Rs['pid']);
        $this->assign(array(
            'Rs' => $Rs,
            'action' => $action,
            'classname' => 'dieArticle',
            'setreferer' => '/dietitians/article',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'fflags' => getCheckBox('flags', $fattr, explode(',', $Rs['flags'])),
            'fpid' => $fpid, //营养师
        ));

        $this->display();
    }

    public function doAddPost() {
        $classname = 'DieArticle';
        $model = D($classname);
        $action = I('action');
        $id = I('id');
        $name = I('title');
        $data['shorttitle'] = I('shorttitle');
        $data['pid'] = I('pid');
        $tagid = I('tagid');
        $data['title'] = $name;
        $data['tagid'] = $model->funcflags($tagid);
        $data['photo'] = I('photo');
        $data['keywords'] = I('keywords');
        $data['description'] = I('description');
        $data['isopen'] = I('isopen');
        $data['info'] = $_REQUEST['info'];
        $data['userid'] = $model->getAdminId();
        if (!empty($action) && $action == 'edit') {
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
            $data['addtime'] = time();
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

}
