<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-6-19 18:44:02 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   评论管理
 */
class CommentAction extends CommonAction {

    public function index() {
        $this->display();
    }

    public function getComment() {
        $CommentView = D('CommentView');
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'id' : $sort;
        $order = I('order');
        $order = empty($order) ? 'asc' : $order;
        $name = I('name');
        if (!empty($name)) {
            $where['msg'] = array('like', "%$name%");
        }
        echo $CommentView->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

}
