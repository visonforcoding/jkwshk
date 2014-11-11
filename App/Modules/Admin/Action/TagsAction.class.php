<?php

/*
 * 功能： 标签管理
 * 作者：张雷刚
 * 时间：2013年12月5日12:01:24
 * modify : 曹文鹏
 * time : 2014年7月16日
 */

class TagsAction extends CommonAction {

    public function index() {
        //列表过滤器，生成查询Map对象
        $map = array();
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['name'] = array('like', "%" . $keyword . "%");
        }
        $Model = D('Tags');
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 50);
        $show = $page->show();
        $list = $Model->where($map)->order('id DESC')->field(true)->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

    //修改数据
    public function indexEdit() {
        $id = I('id');
        $action = I('action');
        $Model = D('Tags');
        if ($action == 'edit') {
            $Rs = $Model->find($id);
        }
        $this->assign(array(
            'action' => $action,
            'classname' => 'tags',
            'setreferer' => '/tags/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'Rs' => $Rs,
        ));
        $this->display();
    }

    /*
     * 获得标签盒子box
     */

    public function tagsBox() {
        $Model = D('Tags');
        //列表过滤器，生成查询Map对象
        $map = array();
        $map['isopen'] = 1;
        $keyword = I('keyword');
        import("ORG.Util.Page"); // 导入分页类
        $infos = '';
        if (!empty($keyword)) {
            $tag = $Model->where("name = '{$keyword}'")->select();

            if (!empty($tag)) {
                $infos = '你添加的标签已存在！';
            } else {
                $data['name'] = $keyword;
                $result = $Model->add($data);
                if (false !== $result) {
                    $infos = '添加成功！';
                } else {
                    $infos = '添加失败，请刷新后再添加！';
                }
            }

            $map['name'] = array('like', "%" . $keyword . "%");
            $count = $Model->where($map)->count();
            $page = new Page($count, 100);
            $show = $page->show();
            $list = $Model->where($map)->order('id DESC')->field('id,name')->limit($page->firstRow . ',' . $page->listRows)->select();
        } else {
            $count = $Model->where($map)->count();
            $page = new Page($count, 100);
            $show = $page->show();
            $list = $Model->where($map)->order('id DESC')->field('id,name')->limit($page->firstRow . ',' . $page->listRows)->select();
        }

        $this->assign(array(
            'list' => $list,
            'page' => $show,
            'infos' => $infos,
            'keyword' => $keyword,
        ));
        $this->display();
    }

    /*
     * 属性
     */

    public function attribute() {
        $Model = D('Attribute');
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

    //修改属性数据
    public function attributeEdit() {
        $id = I('id');
        $action = I('action');
        $Model = D('Attribute');
        if ($action == 'edit') {
            $Rs = $Model->find($id);
        }
        $this->assign(array(
            'action' => $action,
            'classname' => 'attribute',
            'setreferer' => '/tags/attribute',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'Rs' => $Rs,
        ));
        $this->display();
    }

    /*
     * 
     */

    public function showTags() {
        $Tags = D('Tags');
        $total = $Tags->where("isopen = '1'")
                ->count();
        $this->assign('total', $total);
        $this->display();
    }

    public function getTags() {
        $page = I('page');
        if (empty($page)) {
            $page = '1';
        }
        $where = "isopen = '1'";
        $Tags = D('Tags');
        $tag = I('tag');
        if(!empty($tag)){
            $ckTag = $Tags->where("name = '$tag'")->find();
            if($ckTag){
                $where = "name = '$tag'";
            }else{
                $data['name'] = $tag;
                $Tags->add($data);
                $this->assign('response','新标签已添加！');
            }
        }
        $pageSize = '200';
        $tags = $Tags->where($where)
                ->page("$page,$pageSize")
                ->select();
        $this->assign('tags', $tags);
        $this->display();
    }

}
