<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-10-8 12:27:53 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   公司部分
 */
class CorpAction extends CommonAction {

    public function corpnews() {
        $Model = M("CorpNews");
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
            'classname' => 'CorpNews',
            'setreferer' => '/host/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
            'fprogram' => getCheckBox('program', $videoCatArr, explode(',', $Rs['program'])),
            'ftype' => getCheckBox('type', array(1 => '推荐主持人', 2 => '热门主持人'), explode(',', $Rs['type'])),
        ));

        $this->display();
    }

    public function newsList() {
        $this->display();
    }

    public function getNewsList() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'ctime' : $sort;
        $order = I('order');
        $order = empty($order) ? 'desc' : $order;
        $name = I('title');
        if (!empty($name)) {
            $where['title'] = array('like', "%$name%");
        }
        $Video = new CorpNewsModel();
        echo $Video->getDataJson($curPage, $pageSize, $where, $sort, $order);
    }

    public function doAddCorpnews() {
        $classname = I('classname');
        $news = D($classname);
        $action = I('action');
        $id = I('id');
        $data['title'] = I('title');
        $data['summary'] = I('summary');
        $data['content'] = $_REQUEST['content'];
        $data['time'] = I('time');
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
            $data['ctime'] = date('Y-m-d H:i:s');
            $result = $news->add($data); // 根据条件保存修改的数据
            if ($result) {
                $output['success'] = true;
                $output['message'] = '添加成功！';
            } else {
                $output['success'] = false;
                $output['message'] = $news->getError();
            }
        }
       // $output['message'] = $news->getLastSql();
        echo json_encode($output);
    }

}
