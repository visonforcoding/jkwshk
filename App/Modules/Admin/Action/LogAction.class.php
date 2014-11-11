<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-8-22 15:51:42 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   日志模块
 */
class LogAction extends CommonAction {

    public function logList() {
        $this->display();
    }

    /**
     * get logs json for jquery easy ui 
     */
    public function getLogs() {
        $model = D('LogView');
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'ctime' : $sort;
        $order = I('order');
        $order = empty($order) ? 'desc' : $order;
        $name = I('name');
        if (!empty($name)) {
            $where['title'] = array('like', "%$name%");
        }
        echo $model->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

}
