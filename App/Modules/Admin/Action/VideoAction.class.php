<?php

/*
 * 功能：视频管理
 * 作者：张雷刚
 * 修改： 曹文鹏
 * 时间：2013年12月24日12:01:24
 */

class videoAction extends CommonAction {

    public function daoru() {//数据更改导入方法
        $Model = D('Video');
        $list = $Model->field('addtime,updatetime')->select();
        foreach ($list as $k => $v) {
            if (!empty($v)) {
                $tagid = explode(',', $v);
                $ftagid = '';
                foreach ($tagid as $k => $v) {
                    $ftagid .= $v . '|' . getTagName($v) . ',';
                }
            }
        }
//dump($list);
        /*
          //列表过滤器，生成查询Map对象
          $map = array();
          $keyword = I('keyword');
          if(!empty( $keyword )) {
          $map['name'] = array('like',"%".$keyword."%");
          }
          $Model = D('AdminLog');
          import("ORG.Util.Page");// 导入分页类
          $count = $Model->where($map)->count();
          $page = new Page($count,10);
          $show = $page->show();
          $list = $Model->field('id,name,time,ip,mac,status')->where($map)->order('time DESC')->select();
          $this->assign(array(
          'list' => $list,
          'page' => $show,
          ));
          dump($_SESSION);
         */
        $this->display();
    }

    /*
     * 栏目类型
     */

    public function videoType() {
        $Model = D('videoType');
//列表过滤器，生成查询Map对象
        $map = array();
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['name'] = array('like', "%" . $keyword . "%");
        }
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 50);
        $show = $page->show();
        $list = $Model->where($map)->order('ascno ASC')->field(true)->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

//修改栏目类型数据
    public function videoTypeEdit() {
        $id = I('id');
        $action = I('action');
        $Model = D('videoType');
        if ($action == 'edit') {
            $Rs = $Model->find($id);
        }
        $this->assign(array(
            'action' => $action,
            'classname' => 'videoType',
            'setreferer' => '/video/videotype',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'Rs' => $Rs,
        ));
        $this->display();
    }

    /*
     * 视频类别
     *
     */

    public function category() {
        import('@.ORG.Util.Category'); //Thinkphp导入无限分类方法  
        import("ORG.Util.Page"); // 导入分页类
        $Model = D('videoCat');

        $map = array();
        $pid = I('pid');
        $pid = $pid == 0 ? 0 : $pid;
        $map['pid'] = array('eq', $pid);
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['name'] = array('like', "%" . $keyword . "%");
        }
        $catlist = $Model->order('id ASC')->field(true)->select();
        $category = new Category(array('id', 'pid', 'name', 'cname'));
        $catarr = $category->getTree($catlist); //获取分类数据树结构
//$s=$category->getTree($data,1);获取pid=1所有子类数据树结构

        foreach ($catarr as $k => $v) {
            $cates[$v['id']] = $v['cname'];
        }
        $fpid = getOption('pid', $cates, $pid, '', 'jumpPid(\'parent\',this)', '顶级分类', 0);


        $count = $Model->where($map)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->where($map)->order('id DESC')->field(true)->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign(array(
            'fpid' => $fpid,
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

//修改数据
    public function categoryEdit() {
        $id = I('id');
        $Model = D('videoCat');
        import('@.ORG.Util.Category'); //Thinkphp导入无限分类方法  
        $catlist = $Model->order('id ASC')->field(true)->select();
        $category = new Category(array('id', 'pid', 'name', 'cname'));
        $catarr = $category->getTree($catlist); //获取分类数据树结构
//$s=$category->getTree($data,1);获取pid=1所有子类数据树结构

        foreach ($catarr as $k => $v) {
            $cates[$v['id']] = $v['cname'];
        }
        $action = I('action');
        if ($action == 'edit') {
            $Rs = $Model->find($id);
        }
        $fpid = getOption('pid', $cates, $Rs['pid'], '', '', '顶级分类', 0); //分类

        $fattr = D('VideoType')->where('isopen = 1')->getField('id,name'); //属性
        $host = D('host')->order('ascno')->getField('id,name'); //属性
        $this->assign(array(
            'fpid' => $fpid,
            'action' => $action,
            'classname' => 'VideoCat', //一定要大写！！！！！
            'setreferer' => '/video/manageCat',
            'Rs' => $Rs,
            'fflags' => getCheckBox('type', $fattr, explode(',', $Rs['type'])),
            'fhost' => getCheckBox('star', $host, explode(',', $Rs['star'])),
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));
        $this->display();
    }

    public function index() {
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
        $Model = D('videoCat');
        import('@.ORG.Util.Category'); //Thinkphp导入无限分类方法  
        $catlist = $Model->order('id ASC')->field(true)->select();
        $category = new Category(array('id', 'pid', 'name', 'cname'));
        $catarr = $category->getTree($catlist); //获取分类数据树结构
//$s=$category->getTree($data,1);获取pid=1所有子类数据树结构

        foreach ($catarr as $k => $v) {
            $cates[$v['id']] = $v['cname'];
        }
        $fpid = getOption('pid', $cates, $pid, '', 'jumpPid(\'parent\',this)', '顶级分类', 0);

        $Model = D("VideoView");
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->field('id,gname,title,upuname,updatetime,hits,isopen')->where($map)->order('updatetime DESC')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
            'fpid' => $fpid,
            'pid' => $pid,
            'keyword' => $keyword,
        ));
        $this->display();
    }

//新增、修改
    public function indexEdit() {
        $Model = D("Video");
        $action = I('action');
        if ($action == 'add') {
            $Rs['photo'] = '';
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->find($id);
            if ($Rs['photo']) {
                $Rs['fphoto'] = '<img src="' . $Rs['photo'] . '" width="120" height="120" />';
            }
            if (!empty($Rs['tags'])) {
                $tagid = explode(',', $Rs['tags']);
                foreach ($tagid as $k => $v) {
                    $t1 = explode('|', $v);
                    $Rs['ftags'] .= '<input type="checkbox" name="tags[]" id="flagsp" value="' . $v . '" checked="checked"> <label for="flagsp" class="ml5 mr20"> ' . $t1[1] . '</label>';
                }
            }
        }
        $videoCat = D('videoCat');
        import('@.ORG.Util.Category'); //Thinkphp导入无限分类方法  
        $catlist = $videoCat->order('id ASC')->field(true)->select();
        $category = new Category(array('id', 'pid', 'name', 'cname'));
        $catarr = $category->getTree($catlist); //获取分类数据树结构
//$s=$category->getTree($data,1);获取pid=1所有子类数据树结构

        foreach ($catarr as $k => $v) {
            $cates[$v['id']] = $v['cname'];
        }
        $fpid = getOption('pid', $cates, $Rs['pid'], '', '', '顶级分类', 0);

        $fattr = D('VideoType')->where('isopen = 1')->getField('id,name'); //属性
        $this->assign(array(
            'Rs' => $Rs,
            'fpid' => $fpid,
            'action' => $action,
            'classname' => 'Video',
            'setreferer' => '/video/manageVideo',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'fflags' => getCheckBox('type', $fattr, explode(',', $Rs['type'])),
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
        $list = $Model->field('id,pid,pname,name,uname,ascno,time,updatetime,isopen')->where('l.pid=' . $pid)->order('ascno ASC')->limit($page->firstRow . ',' . $page->listRows)->select();
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
        $fRs = M('Video')->where('id = ' . $pid)->getField('id as pid,name,code');
        dump($fRs);
        $this->assign(array(
            'Rs' => $Rs,
            'fRs' => $fRs[$pid],
            'action' => $action,
            'classname' => 'Piclist',
            'setreferer' => '/video/piclist?pid=' . $pid,
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'uname' => $_SESSION['loginName'], //登录管理员用户名
        ));

        $this->display();
    }

    /**
     * 视频类别管理
     */
    public function manageCat() {
        $this->display();
    }

    /**
     * 视频管理
     */
    public function manageVideo() {
        $pid = I('pid');
        $this->assign(array(
            'pid' => $pid
        ));
        $this->display();
    }

    public function addVideo() {
        $Model = D("Video");
        $action = I('action');
        if ($action == 'add') {
            $Rs['photo'] = '';
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->find($id);
            if ($Rs['photo']) {
                $Rs['fphoto'] = '<img src="' . $Rs['photo'] . '" width="120" height="120" />';
            }
            if (!empty($Rs['tags'])) {
                $tagid = explode(',', $Rs['tags']);
                foreach ($tagid as $k => $v) {
                    $t1 = explode('|', $v);
                    $Rs['ftags'] .= '<input type="checkbox" name="tags[]" id="flagsp" value="' . $v . '" checked="checked"> <label for="flagsp" class="ml5 mr20"> ' . $t1[1] . '</label>';
                }
            }
        }
        $videoCat = D('videoCat');
        import('@.ORG.Util.Category'); //Thinkphp导入无限分类方法  
        $catlist = $videoCat->order('id ASC')->field(true)->select();
        $category = new Category(array('id', 'pid', 'name', 'cname'));
        $catarr = $category->getTree($catlist); //获取分类数据树结构
        $host = D('host')->order('ascno')->getField('id,name'); //属性
        foreach ($catarr as $k => $v) {
            $cates[$v['id']] = $v['cname'];
        }
        $fpid = getOption('pid', $cates, $Rs['pid'], '', '', '顶级分类', 0);

        $fattr = D('VideoType')->where('isopen = 1')->getField('id,name'); //属性
        $this->assign(array(
            'Rs' => $Rs,
            'fpid' => $fpid,
            'action' => $action,
            'classname' => 'Video',
            'setreferer' => '/video/manageVideo',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'fflags' => getCheckBox('type', $fattr, explode(',', $Rs['type'])),
            'fhost' => getCheckBox('star', $host, explode(',', $Rs['star'])),
            'uname' => $_SESSION['loginName'], //登录管理员用户名
        ));
        $this->display();
    }

    /**
     * 处理添加编辑
     */
    public function doAddVideo() {
        $classname = 'Video';
        $model = D($classname);
        $action = I('action');
        $id = I('id');
        $title = I('title');
        $pid = I('pid');
        $tags = I('tags');
        $type = I('type');
        $data['subtitle'] = I('subtitle');
        $data['pid'] = I('pid');
        $data['tagid'] = $model->funcflags($tags);
        $data['type'] = $model->funcflags($type);
        $data['photo'] = I('photo');
        $data['video'] = I('video');
        $data['property'] = I('property');
        $data['keywords'] = I('keywords');
        $data['description'] = I('description');
        $data['videotime'] = I('videotime');
        $star = I('star');
        $data['star'] = $model->funcflags($star);
        $data['reporter'] = I('reporter');
        $data['isopen'] = I('isopen');
        $data['content'] = $_REQUEST['content'];
        if (!$model->isChose($pid)) {
            $output['success'] = false;
            $output['message'] = '还未选择任何所属类别！';
            echo json_encode($output);
            return;
        }
        if (!empty($action) && $action == 'edit') {
            $data['title'] = $title;
            $data['updatetime'] = $model->dateFormat();
            $result = $model->where("id = '$id'")->save($data);
            if ($result) {
                $output['success'] = true;
                $output['message'] = '修改成功！';
                $output['edit'] = true;
            } else {
                $output['success'] = false;
                $output['message'] = $model->getError();
            }
        } else {
            if (!$model->onlyOne($title)) {
                $output['success'] = false;
                $output['message'] = '该标题已经存在！';
                echo json_encode($output);
                return;
            } else {
                $data['title'] = $title;
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
     * 删除视频
     */
    public function delCat() {
        $ids = I('data');
        $FocusCat = D('VideoCat');
        $map['id'] = array('in', $ids);
        $rs = $FocusCat->where($map)->delete();
        if ($rs) {
            $this->ajaxReturn($rs, '删除成功', 1);
        } else {
            $this->ajaxReturn(0, '删除失败', 0);
        }
    }

    /**
     * 获取视频json
     */
    public function getVideos() {
        $curPage = I('page');
        $pageSize = I('rows');
        $typeId = I('typeid');
        $pid = I('pid');  //用于按类查找或者专辑的管理
        $sort = I('sort');
        $sort = empty($sort) ? 'addtime' : $sort;
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
            $where['title'] = array('like', "%$name%");
        }
        $Video = new VideoModel();
        echo $Video->getDataJson($curPage, $pageSize, $where, $sort, $order);
    }

    /**
     * 删除视频
     */
    public function delVideo() {
        $ids = I('data');
        $Video = new CommonModel('Video');
        $map['id'] = array('in', $ids);
        $rs = $Video->where($map)->delete();
        if ($rs) {
            $this->ajaxReturn($rs, '删除成功', 1);
        } else {
            $this->ajaxReturn(0, '删除失败', 0);
        }
    }

    /**
     * 获取视频类别json 
     */
    public function getCat() {
        $curPage = I('page');
        $pageSize = I('rows');
        $name = I('name');
        $album = I('album');
        $id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
        $VideoCat = new VideoCatModel();
        echo $VideoCat->getDataJson($curPage, $pageSize, $id, $name, $album);
    }

    /**
     * 视频类别管理
     */
    public function manageType() {
        $this->display();
    }

    public function getTypesForGrid() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $order = I('order');
        $VideoType = new VideoTypeModel();
        echo $VideoType->getDataJson($curPage, $pageSize, $where = '', $sort, $order);
    }

    /**
     * 删除类型
     */
    public function delType() {
        $ids = I('data');
        $Video = new CommonModel('VideoType');
        $map['id'] = array('in', $ids);
        $rs = $Video->where($map)->delete();
        if ($rs) {
            $this->ajaxReturn($rs, '删除成功', 1);
        } else {
            $this->ajaxReturn(0, '删除失败', 0);
        }
    }

    /**
     * 添加类型
     */
    public function addType() {
        $name = I('name');
        $isopen = I('isopen');
        $data['name'] = $name;
        $data['isopen'] = $isopen;
        $VideoType = D('VideoType');
        $ckName = $VideoType->where("name = '$name'")->find();
        if ($ckName) {
            $this->ajaxReturn('0', '该类别已存在！', 0);
        }
        $Rs = $VideoType->add($data);
        if ($Rs) {
            $this->ajaxReturn($Rs, '添加成功！', 1);
        } else {
            $this->ajaxReturn($VideoType->getError(), '添加失败!', 0);
        }
    }

    /**
     * 编辑类型
     */
    public function editType() {
        $cat = $_REQUEST['data'];   //用TP的I方法老不行
        $id = $cat[0]['id'];
        $data['name'] = $cat[0]['name'];
        $VideoType = D('VideoType');
        $rs = $VideoType->where("id = '$id'")->save($data);
        $sql = $VideoType->getLastSql();
        if ($rs) {
            $this->ajaxReturn($rs, '修改成功!', 1);
        } else {
            $this->ajaxReturn($sql, '删除失败！', 0);
        }
    }

    /**
     * 获取json for combobox
     */
    public function getVideoTypesForCombo() {
        $VideoType = D('VideoType');
        $types = $VideoType->field('id, name as text')
                ->select();
        $output = json_encode($types);
        echo $output;
    }

    /**
     * 获取json for combotree
     */
    public function getVideoCatForCombo() {
        $id = I('id');
        if (empty($id) || $id == 0) {
            $id = 1;
        }
        $VideoCat = new VideoCatModel();
        $result = array();
        $Rs = $VideoCat->where("pid = '$id'")->select();
        foreach ($Rs as $value) {
            $node = array();
            $node['id'] = $value['id'];
            $node['text'] = $value['name'];
            if ($value['zhuanjino'] == '1') {
                $node['iconCls'] = 'icon-bookmark';
            }
            $node['state'] = $VideoCat->hasChild($value['id']) ? 'closed' : 'open';
            array_push($result, $node);
        }
        echo json_encode($result);
    }

}
