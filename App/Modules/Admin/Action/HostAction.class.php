<?php

/*
 * 功能：主持人管理
 * 作者：张雷刚
 * 时间：2013年12月5日12:01:24
 */

class HostAction extends CommonAction {

    public function index() {
        //列表过滤器，生成查询Map对象
        $map = array();
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['account'] = array('like', "%" . $keyword . "%");
        }
        $Model = D("Host");
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->field('id,name,addtime,updatetime,isopen')->where($map)->order()->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

    //新增、修改管理员
    public function indexEdit() {
        $Model = M("Host");
        $action = I('action');
        if ($action == 'add') {
            
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->where('id=' . $id)->find();
        }
        $videoCatModel = D('videoCat');
        $videoCatArr = $videoCatModel->where("pid = '1'")->getField('id,name');
        $this->assign(array(
            'Rs' => $Rs,
            'action' => $action,
            'classname' => 'Host',
            'setreferer' => '/host/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'fprogram' => getCheckBox('program', $videoCatArr, explode(',', $Rs['program'])),
            'ftype' => getCheckBox('type', array(1 => '推荐主持人', 2 => '热门主持人'), explode(',', $Rs['type'])),
        ));

        $this->display();
    }

    /**
     * 主持人管理
     */
    public function manageHost() {
        $this->display();
    }

    /**
     * 获取主持人json
     */
    public function getHost() {
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
        $Video = new HostModel();
        echo $Video->getDataJson($curPage, $pageSize, $where, $sort, $order);
    }

    /**
     * 添加
     */
    public function addHost() {
        $Model = M("Host");
        $action = I('action');
        if ($action == 'add') {
            
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->where('id=' . $id)->find();
            $Rs['fphoto'] = '<img src="' . $Rs['photo'] . '" width="120" height="120" />';
            $Rs['ftvsmpic'] = '<img src="' . $Rs['tvsmpic'] . '" width="120" height="120" />';
            $Rs['ftvbgpic'] = '<img src="' . $Rs['tvbgpic'] . '" width="120" height="120" />';
        }
        $videoCatModel = D('videoCat');
        $videoCatArr = $videoCatModel->where("pid = '1'")->getField('id,name');
        $this->assign(array(
            'Rs' => $Rs,
            'action' => $action,
            'classname' => 'Host',
            'setreferer' => '/host/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'fprogram' => getCheckBox('program', $videoCatArr, explode(',', $Rs['program'])),
            'ftype' => getCheckBox('type', array(1 => '推荐主持人', 2 => '热门主持人'), explode(',', $Rs['type'])),
        ));

        $this->display();
    }

    public function doAddHost() {
        $classname = I('classname');
        $news = D($classname);
        $action = I('action');
        $id = I('id');
        $program = I('program');
        $type = I('type');
        $data['name'] = I('name');
        $data['program'] = $news->funcf($program);
        $data['type'] = $news->funcf($type);
        $data['info'] = $_REQUEST['info'];
        $data['message'] = $_REQUEST['message'];
        $data['photo'] = I('photo');
        $data['tvsmpic'] = I('tvsmpic');
        $data['tvbgpic'] = I('tvbgpic');
        $data['color'] = I('color');
        $data['blood'] = I('blood');
        $data['xingge'] = I('xingge');
        $data['style'] = I('style');
        $data['hobby'] = I('hobby');
        $data['microblog'] = I('microblog');
        $data['birthday'] = I('birthday');
        $data['constellation'] = I('constellation');
        $data['isopen'] = I('isopen');
        if (!empty($action) && $action == 'edit') {
            $data['updatetime'] = date('Y-m-d H:i:s');
            $result = $news->where("id = '$id'")->save($data);
            if ($result) {
                $output['success'] = true;
                $output['message'] = '修改成功！';
                $output['edit'] = true;
            } else {
                $output['success'] = false;
                $output['message'] = $news->getError();
            }
        } else {
            $data['addtime'] = date('Y-m-d H:i:s');
            $result = $news->add($data); // 根据条件保存修改的数据
            if ($result) {
                $output['success'] = true;
                $output['message'] = '添加成功！';
            } else {
                $output['success'] = false;
                $output['message'] = $news->getError();
            }
        }
        echo json_encode($output);
    }

}
