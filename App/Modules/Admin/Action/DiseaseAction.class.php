<?php

/*
 * 功能：疾病管理
 * 作者：张雷刚
 * 时间：2014年3月8日12:01:24
 */

class DiseaseAction extends CommonAction {

    public function index() {
        import('@.ORG.Util.Category'); //Thinkphp导入无限分类方法  
        import("ORG.Util.Page"); // 导入分页类
        $Model = D('Disease');

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

    //新增、修改疾病
    public function indexEdit() {
        $pid = I('pid');
        $pid = $pid == 0 ? 0 : $pid;
        $id = I('id');
        $Model = D('Disease');
       
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
            'classname' => 'Disease',
            'setreferer' => '/Disease/index',
            'Rs' => $Rs,
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));
        $this->display();
    }

}
