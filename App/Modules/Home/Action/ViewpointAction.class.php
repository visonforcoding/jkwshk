<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-10-17 14:49:38 
 * Author       :   曹文鹏
 * Email        :   caowenpeng1990@126.com
 * For          :   视点模块
 */
class ViewpointAction extends PublicAction {

    public function index() {
        //最新一期的视点
        $topViewpoint = D('Viewpoint')->table('db_viewpoint vp')
                ->join('db_viewpoint_sub vps on vps.aid = vp.id')
                ->order('vps.issue desc')
                ->find();
        $count = D('Viewpoint')->table('db_viewpoint vp')
                ->join('db_viewpoint_sub vps on vps.aid = vp.id')
                ->count();
        //导入分页类
        import('ORG.Util.Page2');
        $Page = new Page2($count, 18, 3); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $page = $Page->pageShow();
        $viewpointList = D('Viewpoint')->table('db_viewpoint vp')
                ->join('db_viewpoint_sub vps on vps.aid = vp.id')
                ->order('vps.issue desc')
                ->limit($Page->limit)
                ->select();

        //推荐视点
        $randViewpointList = D('Viewpoint')->table('db_viewpoint vp')
                ->join('db_viewpoint_sub vps on vps.aid = vp.id')
                ->order('rand() desc')
                ->limit(5)
                ->select();

        //热门数据
        /* 热门图片 */
        $hotPicMob = D("Picture");
        $hotPic = $hotPicMob->getHotPicRank(4);
        /* 热门资讯 */
        $hotNewsMob = D("News");
        $hotNews = $hotNewsMob->newsRank(10);
        /* 热门专辑 */
        $VideoCat = D('VideoCat');
        $hotCatVideo = $VideoCat->getHotAlbum(4);
        $this->assign(array(
            'topViewpoint' => $topViewpoint,
            'page' => $page,
            'viewpointList' => $viewpointList,
            'randViewpointList' => $randViewpointList,
            'hotPic' => $hotPic,
            'hotNews' => $hotNews,
            'hotCatVideo' => $hotCatVideo
        ));
        $this->display();
    }

    public function view() {
        $id = I('id');
        $curViewPoint = D('Viewpoint')->table('db_viewpoint vp')
                ->join('db_viewpoint_sub vps on vps.aid = vp.id')
                ->where("vp.id = $id")
                ->find();
        if (!$curViewPoint) {
            $this->_empty();
            return;
        }
        dump($curViewPoint);
        $this->assign(array(
            'curViewPoint' => $curViewPoint
        ));
        $this->display();
    }

}
