<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-10-22 17:57:48 
 * Author       :   曹文鹏
 * Email        :   caowenpeng1990@126.com
 * For          :  视点模块
 */
class ViewpointAction extends CommonAction {

    public function index() {
        $this->display();
    }

    /**
     * 获取视频json
     */
    public function getViewpoints() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'issue' : $sort;
        $order = I('order');
        $order = empty($order) ? 'desc' : $order;
        $name = I('name');
        if (!empty($name)) {
            $where['title'] = array('like', "%$name%");
        }
        $Video = new ViewpointViewModel();
        echo $Video->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

    public function add() {
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
       //读取编辑照片图片
        $writerPicPath = C('TMPL_PARSE_STRING.__UPLOAD__') . '/writerpic/';
        $writerPic = $this->getPic($writerPicPath);
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
            'pic'=>$writerPic
        ));
        $this->display();
    }

    public function showWriterPic() {
        //读取编辑照片图片
        $writerPicPath = C('TMPL_PARSE_STRING.__UPLOAD__') . '/writerpic/';
        $writerPic = $this->getPic($writerPicPath);
        $this->assign(array(
            'pic' => $writerPic
        ));
        $this->display();
    }

}
