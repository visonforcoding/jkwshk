<?php

/*
 * 功能：广告管理
 * 作者：张雷刚
 * 时间：2013年12月5日12:01:24
 */

class adAction extends CommonAction {

    public function index() {
        //列表过滤器，生成查询Map对象
        $map = array();
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['account'] = array('like', "%" . $keyword . "%");
        }
        $Model = D("Ad");
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->field('id,name,starttime,endtime,addtime,updatetime,isopen')->where($map)->order()->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

    //新增、修改营养师
    public function indexEdit() {
        $Model = M("Ad");
        $action = I('action');
        if ($action == 'add') {
            
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->where('id=' . $id)->find();
            $Rs['fstarttime'] = date('Y-m-d H:i:s', $Rs['starttime']);
            $Rs['fendtime'] = date('Y-m-d H:i:s', $Rs['endtime']);
            if ($Rs['photo']) {
                $Rs['fphoto'] = '<img src="' . $Rs['photo'] . '" width="120" height="120" />';
            }
        }
        $this->assign(array(
            'Rs' => $Rs,
            'action' => $action,
            'classname' => 'Ad',
            'setreferer' => '/Ad/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));

        $this->display();
    }

}
