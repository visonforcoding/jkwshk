<?php

/*
 * 功能：文章管理
 * 作者：张雷刚
 * 时间：2013年12月24日12:01:24
 */

class newsAction extends CommonAction {
    /*
     * 文章类别
     *
     */

    public function category() {
        import('@.ORG.Util.Category'); //Thinkphp导入无限分类方法  
        import("ORG.Util.Page"); // 导入分页类
        $Model = D('newsCat');

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
        $pid = I('pid');
        $pid = $pid == 0 ? 0 : $pid;
        $id = I('id');
        $Model = D('newsCat');
        import('@.ORG.Util.Category'); //Thinkphp导入无限分类方法  
        $catlist = $Model->order('id ASC')->field(true)->select();
        $category = new Category(array('id', 'pid', 'name', 'cname'));
        $catarr = $category->getTree($catlist); //获取分类数据树结构
        //$s=$category->getTree($data,1);获取pid=1所有子类数据树结构

        foreach ($catarr as $k => $v) {
            $cates[$v['id']] = $v['cname'];
        }
        $fpid = getOption('pid', $cates, $pid, '', '', '顶级分类', 0);

        $action = I('action');
        if ($action == 'edit') {
            $Rs = $Model->find($id);
        }
        $this->assign(array(
            'fpid' => $fpid,
            'action' => $action,
            'classname' => 'newsCat',
            'setreferer' => '/news/category',
            'Rs' => $Rs,
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));
        $this->display();
    }

    public function index() {
        $this->display();
    }

    //新增、修改
    public function indexEdit() {
        $Model = D("News");
        $action = I('action');
        if ($action == 'add') {
            $Rs['flitpic'] = '';
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->find($id);
            if ($Rs['litpic']) {
                $Rs['flitpic'] = '<img src="' . $Rs['litpic'] . '" width="120" height="120" />';
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
        //$fname = D('newsCat')->where('isopen = 1')->getField('id as gid,name');
        import('@.ORG.Util.Category'); //Thinkphp导入无限分类方法  
        $newsCat = D('newsCat');
        $catlist = $newsCat->where('isopen = 1')->order('id ASC')->field('id,pid,name')->select();
        $category = new Category(array('id', 'pid', 'name', 'cname'));
        $catarr = $category->getTree($catlist); //获取分类数据树结构
        //$s=$category->getTree($data,1);获取pid=1所有子类数据树结构
        foreach ($catarr as $k => $v) {
            $cates[$v['id']] = $v['cname'];
        }
        $fname = getOption('pid', $cates, $Rs['pid'], '', '', '顶级分类', 0); //分类
        $fattr = D('Attribute')->where('isopen = 1')->getField('attr,name'); //属性
        $fpid2 = $newsCat->where('isopen = 1')->getField('id,name'); //副分类
        $typeRs = D('VideoType')->where('isopen = 1')->getField('id,name'); //栏目类型
        $this->assign(array(
            'Rs' => $Rs,
            'fname' => $fname,
            'action' => $action,
            'classname' => 'News',
            'setreferer' => '/news/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'fflags' => getCheckBox('flags', $fattr, explode(',', $Rs['flags'])),
            'fpid2' => getCheckBox('pid2', $fpid2, explode(',', $Rs['pid2'])),
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
        $fRs = M('News')->where('id = ' . $pid)->getField('id as pid,name,code');
        dump($fRs);
        $this->assign(array(
            'Rs' => $Rs,
            'fRs' => $fRs[$pid],
            'action' => $action,
            'classname' => 'Piclist',
            'setreferer' => '/news/piclist?pid=' . $pid,
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'uname' => $_SESSION['loginName'], //登录管理员用户名
        ));

        $this->display();
    }

    /**
     * 添加或修改新闻
     */
    public function add() {
        $Model = D("News");
        $action = I('action');
        if (empty($action)) {
            $action = 'add';
        }
        if ($action == 'add') {
            $Rs['flitpic'] = '';
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->find($id);
            if ($Rs['litpic']) {
                $Rs['flitpic'] = '<img src="' . $Rs['litpic'] . '" width="120" height="120" />';
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
        import('@.ORG.Util.Category'); //Thinkphp导入无限分类方法  
        $newsCat = D('newsCat');
        $catlist = $newsCat->where('isopen = 1')->order('id ASC')->field('id,pid,name')->select();
        $category = new Category(array('id', 'pid', 'name', 'cname'));
        $catarr = $category->getTree($catlist); //获取分类数据树结构
        foreach ($catarr as $k => $v) {
            $cates[$v['id']] = $v['cname'];
        }
        $fname = getOption('pid', $cates, $Rs['pid'], '', '', '顶级分类', 0); //分类
        $fattr = D('Attribute')->where('isopen = 1')->getField('attr,name'); //属性
        $fpid2 = $newsCat->where('isopen = 1')->getField('id,name'); //副分类
        $typeRs = D('VideoType')->where('isopen = 1')->getField('id,name'); //栏目类型
        $this->assign(array(
            'id' => $id,
            'Rs' => $Rs,
            'fname' => $fname,
            'action' => $action,
            'classname' => 'News',
            'setreferer' => '/news/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'fflags' => getCheckBox('flags', $fattr, explode(',', $Rs['flags'])),
            'fpid2' => getCheckBox('pid2', $fpid2, explode(',', $Rs['pid2'])),
            'types' => getCheckBox('type', $typeRs, explode(',', $Rs['type'])),
            'uname' => $_SESSION['loginName'], //登录管理员用户名
        ));
        $this->display();
    }

    /**
     * 处理添加编辑
     */
    public function doAdd() {
        $classname = I('classname');
        $news = D($classname);
        $action = I('action');
        $id = I('id');
        $title = I('title');
        $pid = I('pid');
        $pid2 = I('pid2');
        $tagid = I('tagid');
        $flags = I('flags');
        $type = I('type');        
        $data['shorttitle'] = I('shorttitle');
        $data['pid'] = I('pid');
        $data['pid2'] = $news->funcflags($pid2);
        $data['tagid'] = $news->funcflags($tagid);
        $data['flags'] = $news->funcflags($flags);
        $data['type'] = $news->funcflags($type);
        $data['litpic'] = I('litpic');
        $data['info'] = $_REQUEST['info'];
        $data['keywords'] = I('keywords');
        $data['description'] = I('description');
        $data['source'] = I('source');
        $data['writer'] = I('writer');
        $data['isopen'] = I('isopen');
        if (!$news->isChose($pid)) {
            $output['success'] = false;
            $output['message'] = '还未选择任何所属类别！';
            echo json_encode($output);
            return;
        }
        if (!empty($action) && $action == 'edit') {
            $data['title'] = $title;
            $data['pubdate'] = time();
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
            if (!$news->onlyOne($title)) {
                $output['success'] = false;
                $output['message'] = '该标题已经存在！';
                echo json_encode($output);
                return;
            }else{
                $data['title'] = $title;
            }
            $data['time'] = time();
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

    /**
     * 获取新闻json 数据集
     */
    public function getNews() {
        $curPage = I('page');
        $pageSize = I('rows');
        $pid = I('pid');  //用于按类查找或者专辑的管理
        $sort = I('sort');
        $sort = empty($sort) ? 'time' : $sort;
        $order = I('order');
        $order = empty($order) ? 'desc' : $order;
        $name = I('name');
        if (!empty($pid)) {
            $where['pid'] = array('eq', "$pid");
        }
        if (!empty($name)) {
            $where['title'] = array('like', "%$name%");
        }
        $News = D('NewsView');
        echo $News->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

    public function getNewsById() {
        $id = I('id');
        $News = D('NewsView');
        $where['id'] = array('eq', "$id");
        $news = $News->where($where)->find();
        echo json_encode($news);
    }

    /**
     * 删除新闻
     */
    public function delNews() {
        $ids = I('data');
        $FocusCat = new CommonModel('News');
        $map['id'] = array('in', $ids);
        $rs = $FocusCat->where($map)->delete();
        if ($rs) {
            $this->ajaxReturn($rs, '删除成功', 1);
        } else {
            $this->ajaxReturn(0, '删除失败', 0);
        }
    }

    /**
     * 获取json for combotree
     */
    public function getNewsCatForCombo() {
        $id = I('id');
        if (empty($id) || $id == 0) {
            $id = 0;
        }
        $NewsCat = D('NewsCat');
        $result = array();
        $Rs = $NewsCat->where("pid = '$id'")->order('id asc')->select();
        foreach ($Rs as $value) {
            $node = array();
            $node['id'] = $value['id'];
            $node['text'] = $value['name'];
            $node['state'] = $NewsCat->hasChild($value['id']) ? 'closed' : 'open';
            array_push($result, $node);
        }
        echo json_encode($result);
    }

    public function test() {
        $news = D('News');
        $fileds = $news->getDbFields();
        foreach ($fileds as $value) {
            
        }
        dump($fileds);
        dump($news);
        $this->display();
    }

}
