<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-8-28 10:56:56 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   
 */
class WorkAction extends CommonAction {

    public function workList() {
        $this->display();
    }

    public function getList() {
        $model = new Model();
        //$curPage = I('page');
        //$pageSize = I('rows');
        $author = $model->query('select * from select_admin_work');
        $nums = count($author);
        $rows = $author;
        echo json_encode(array('total' => $nums, 'rows' => $rows));
    }

    public function workDetail() {
        $id = I('id');
        $admin = D('Admin')->where("id = '$id'")->find();
        $today = date('Y-m-d');
        $this->assign(array(
            'admin' => $admin,
            'today' => $today,
            'id' => $id
        ));
        $this->display();
    }

    public function getRecord() {
        $start = I('start');
        $end = I('end');
        $id = I('id');
        $model = new Model();
        $event = array();
        $video = $model->query("select DATE_FORMAT(`addtime`, '%Y-%m-%d') as date,title,id from db_video where adminid = '$id' and  DATE_FORMAT(`addtime`, '%Y-%m-%d') >= '$start'"
                . "and DATE_FORMAT(`addtime`,'%Y-%m-%d') <= '$end'");
        $videoArr = array();
        if (is_array($video)) {
            $i = 0;
            foreach ($video as $value) {
                $videoArr[$i]['title'] = '视频:'.$value['title'];
                $videoArr[$i]['url'] = "http://www.jkwshk.tv/play/index/id/{$value['id']}.html";
                $videoArr[$i]['start'] = $value['date'];
                $i++;
            }
        }
        $news = $model->query("select FROM_UNIXTIME(`time`, '%Y-%m-%d') as date ,title,id from db_news where adminid = '$id' and  FROM_UNIXTIME(`time`, '%Y-%m-%d') >= '$start'"
                . "and FROM_UNIXTIME(`time`,'%Y-%m-%d') <= '$end'");
        $newsArr = array();
        if (is_array($news)) {
            $i = 0;
            foreach ($news as $value) {
                $newsArr[$i]['title'] = '新闻:'.$value['title'];
                $newsArr[$i]['url'] = "http://www.jkwshk.tv/news/view/id/{$value['id']}.html";
                $newsArr[$i]['start'] = $value['date'];
                $i++;
            }
        }
        $pic = $model->query("select DATE_FORMAT(`time`, '%Y-%m-%d') as date, name as title,id from db_picture where adminid = '$id' and  DATE_FORMAT(`time`, '%Y-%m-%d') >= '$start'"
                . "and DATE_FORMAT(`time`,'%Y-%m-%d') <= '$end'");
        $picArr = array();
        if (is_array($pic)) {
            $i = 0;
            foreach ($pic as $value) {
                $picArr[$i]['title'] = '图集:'.$value['title'];
                $picArr[$i]['url'] = "http://www.jkwshk.tv/photo/view/id/{$value['id']}.html";
                $picArr[$i]['start'] = $value['date'];
                $i++;
            }
        }
        $event = array_merge($videoArr, $newsArr, $picArr);
        echo json_encode($event);
    }

}
