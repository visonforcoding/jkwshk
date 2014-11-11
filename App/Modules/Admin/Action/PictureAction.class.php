<?php

/*
 * 功能：图片管理
 * 作者：张雷刚
 * 修改： 曹文鹏
 * 时间：2013年12月24日12:01:24
 */

class PictureAction extends CommonAction {
    /*
     * 图片组类别
     *
     */

    public function category() {
        //列表过滤器，生成查询Map对象
        $map = array();
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['name'] = array('like', "%" . $keyword . "%");
        }
        $Model = D('PictureCat');
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->where($map)->order('id DESC')->field(true)->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

    //修改数据
    public function categoryEdit() {
        $Model = D('PictureCat');

        $id = I('id');
        $action = I('action');
        if ($action == 'edit') {
            $Rs = $Model->find($id);
        }
        $this->assign(array(
            'action' => $action,
            'classname' => 'PictureCat',
            'setreferer' => '/picture/category',
            'Rs' => $Rs,
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));
        $this->display();
    }

    public function index() {
        //列表过滤器，生成查询Map对象
        $map = array();
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['name'] = array('like', "%" . $keyword . "%");
        }
        $Model = D("PictureView");
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->field('id,gname,name,uname,time,updatetime,isopen')
                ->where($map)
                ->order('id DESC')
                ->limit($page->firstRow . ',' . $page->listRows)
                ->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

    //新增、修改
    public function indexEdit() {
        $Model = D("Picture");
        $action = I('action');
        if ($action == 'add') {
            $Rs['ftopimg'] = '';
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->find($id);
            if ($Rs['topimg']) {
                $Rs['ftopimg'] = '<img src="' . $Rs['topimg'] . '" width="120" height="120" />';
            }
            if (!empty($Rs['tagid'])) {
                $tagid = explode(',', $Rs['tagid']);
                foreach ($tagid as $k => $v) {
                    $t1 = explode('|', $v);
                    $Rs['ftags'] .= '<input type="checkbox" name="tagid[]" id="flagsp" value="' . $v . '" checked="checked"> <label for="flagsp" class="ml5 mr20"> ' . $t1[1] . '</label>';
                    //$Rs['ftags'] .= $t1[1];
                }
            }
        }
        $fname = D('PictureCat')->where('isopen = 1')->getField('id as gid,name'); //所属分类
        $fattr = D('Attribute')->where('isopen = 1')->getField('attr,name'); //属性
        $typeRs = D('VideoType')->where('isopen = 1')->getField('id,name'); //栏目类别
        //$fattr = array('p'=>'图片频道首页','c'=>'推荐','h'=>'热门');
        $this->assign(array(
            'Rs' => $Rs,
            'fname' => getOption('pid', $fname, $Rs['pid']),
            'action' => $action,
            'fattr' => $fattr,
            'classname' => 'Picture',
            'setreferer' => '/picture/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'fflags' => getCheckBox('property', $fattr, explode(',', $Rs['property'])),
            'types' => getCheckBox('type', $typeRs, explode(',', $Rs['type'])),
            'uname' => $_SESSION['loginName'], //登录管理员用户名
        ));

        $this->display();
    }

    public function addPic() {
        $Model = D("Picture");
        $action = I('action');
        if ($action == 'add') {
            $Rs['ftopimg'] = '';
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->find($id);
            if ($Rs['topimg']) {
                $Rs['ftopimg'] = '<img src="' . $Rs['topimg'] . '" width="120" height="120" />';
            }
            if (!empty($Rs['tagid'])) {
                $tagid = explode(',', $Rs['tagid']);
                foreach ($tagid as $k => $v) {
                    $t1 = explode('|', $v);
                    $Rs['ftags'] .= '<input type="checkbox" name="tagid[]" id="flagsp" value="' . $v . '" checked="checked"> <label for="flagsp" class="ml5 mr20"> ' . $t1[1] . '</label>';
                    //$Rs['ftags'] .= $t1[1];
                }
            }
        }
        $fname = D('PictureCat')->where('isopen = 1')->getField('id as gid,name'); //所属分类
        $fattr = D('Attribute')->where('isopen = 1')->getField('attr,name'); //属性
        $typeRs = D('VideoType')->where('isopen = 1')->getField('id,name'); //栏目类别
        //$fattr = array('p'=>'图片频道首页','c'=>'推荐','h'=>'热门');
        $this->assign(array(
            'Rs' => $Rs,
            'fname' => getOption('pid', $fname, $Rs['pid']),
            'action' => $action,
            'fattr' => $fattr,
            'classname' => 'Picture',
            'setreferer' => '/picture/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'fflags' => getCheckBox('property', $fattr, explode(',', $Rs['property'])),
            'types' => getCheckBox('type', $typeRs, explode(',', $Rs['type'])),
            'uname' => $_SESSION['loginName'], //登录管理员用户名
        ));
        $this->display();
    }

    //图片列表
    public function piclist() {
        //列表过滤器，生成查询Map对象
        $map = array();
        $pid = I('pid');
        $Model = D("PiclistView");
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where('l.pid=' . $pid)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->field('id,pid,pname,name,uname,ascno,time,updatetime,isopen')
                        ->where('l.pid=' . $pid)
                        ->order('ascno ASC')->limit($page->firstRow . ',' . $page->listRows)->select();
        //echo $Model->getLastSql();//输出sql语句
        $this->assign(array(
            'pid' => $pid,
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

    //新增、修改
    public function piclistEdit() {
        $Model = D("Piclist");
        $action = I('action');
        if ($action == 'add') {
            $Rs['fimgurl'] = '';
            $pid = I('pid');
            $Rs['ascno'] = 50;
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->find($id);
            if ($Rs['imgurl']) {
                $Rs['fimgurl'] = '<img src="' . $Rs['imgurl'] . '" width="120" height="120" />';
            }
            $pid = $Rs['pid'];
        }
        $fRs = M('Picture')->where('id = ' . $pid)->getField('id as pid,name,code');
        dump($fRs);
        $this->assign(array(
            'Rs' => $Rs,
            'fRs' => $fRs[$pid],
            'action' => $action,
            'classname' => 'Piclist',
            'setreferer' => '/picture/piclist?pid=' . $pid,
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'uname' => $_SESSION['loginName'], //登录管理员用户名
        ));

        $this->display();
    }

    public function doAddPic() {
        $classname = 'Picture';
        $model = D($classname);
        $action = I('action');
        $id = I('id');
        $name = I('name');
        $tagid = I('tagid');
        $type = I('type');
        $data['pid'] = I('pid');
        $data['tagid'] = $model->funcflags($tagid);
        $data['type'] = $model->funcflags($type);
        $data['topimg'] = I('topimg');
        $data['property'] = I('property');
        $data['keywords'] = I('keywords');
        $data['description'] = I('description');
        $data['uname'] = I('uname');
        $data['reporter'] = I('reporter');
        $data['isopen'] = I('isopen');
        $data['toppai'] = I('toppai');
        $data['info'] = $_REQUEST['info'];
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
            $data['time'] = $model->dateFormat();
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
     * 添加图集的实例展示页
     */
    public function showDemo() {
        $this->display();
    }

    /**
     * 图集类别管理
     */
    public function manageCat() {
        $this->display();
    }

    public function getCat() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'name' : $sort;
        $order = I('order');
        $order = empty($order) ? 'desc' : $order;
        $Pic = new PictureCatModel();
        echo $Pic->getDataJson($curPage, $pageSize, '', $sort, $order);
    }

     /**
     * 添加图集分类
     */
    public function addPicCat() {
        $name = trim(I('name'));
        $info = I('info');
        $data['name'] = $name;
        $data['info'] = $info;
        $model = new CommonModel('Picture_cat');
        $ckName = $model->where("name = '$name'")->find();
        if($ckName){
           $output['success'] = false;
           $output['message'] = '已经存在！';
           echo json_encode($output);
           return;
        }
        $rs = $model->add($data);
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
     * 编辑栏目
     */
    public function editPicCat() {
        $cat = $_REQUEST['data'];   //用TP的I方法老不行
        $id = $cat[0]['id'];
        $data['name'] = $cat[0]['name'];
        $data['info'] = $cat[0]['info'];
        $data['isopen'] = $cat[0]['isopen'];
        $FocusCat = new CommonModel('PictureCat');
        $rs = $FocusCat->where("id = '$id'")->save($data);
        $sql = $FocusCat->getLastSql();
        $FocusCat->getLastSql();
        if ($rs) {
            $this->ajaxReturn($rs, '修改成功!', 1);
        } else {
            $this->ajaxReturn($sql, '修改失败！', 0);
        }
    }
    
    
    /**
     * 获取图集json
     */
    public function getPics() {
        $curPage = I('page');
        $pageSize = I('rows');
        $typeId = I('typeid');
        $pid = I('pid');  //用于按类查找或者专辑的管理
        $sort = I('sort');
        $sort = empty($sort) ? 'time' : $sort;
        $order = I('order');
        $order = empty($order) ? 'desc' : $order;
        $name = I('name');
        if (!empty($pid)) {
            $where['pid'] = array('eq', "$pid");
        }
        if (!empty($typeId)) {
            $where['type'] = array('like', "%$typeId%");
        }
        if (!empty($name)) {
            $where['name'] = array('like', "%$name%");
        }
        $Pic = new PictureModel();
        echo $Pic->getDataJson($curPage, $pageSize, $where, $sort, $order);
    }
    
     /**
     * 获取json for combotree
     */
    public function getPicCatForCombo() {
        $id = I('id');
        if (empty($id) || $id == 0) {
            $id = 0;
        }
        $VideoCat = new PictureCatModel();
        $result = array();
        $Rs = $VideoCat->where("pid = '$id'")->select();
        foreach ($Rs as $value) {
            $node = array();
            $node['id'] = $value['id'];
            $node['text'] = $value['name'];
            //$node['state'] = $VideoCat->hasChild($value['id']) ? 'closed' : 'open';
            array_push($result, $node);
        }
        echo json_encode($result);
    }

}
