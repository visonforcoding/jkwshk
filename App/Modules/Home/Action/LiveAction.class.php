<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-17 18:12:43 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   直播页
 */
class LiveAction extends PublicAction {

    public function index() {
        //直播表
        $Live = D('Live');
        $Video = D('Video');
        $VideoCat = D('VideoCat');
        $News = D('News');
        $todayDate = date('Y-m-d');   //当前日期
        $nowtime = date('H:i:s');
        $liveProgram = $Live->field('name,column,plantime')
                ->where("plantime <= '$nowtime' and plandate = '$todayDate'")
                ->order('plantime desc')
                ->find();   //正在直播

        $nextLiveProgram = $Live->field('name,column,plantime')
                ->where("plantime >= '$nowtime' and plandate = '$todayDate'")
                ->order('plantime asc')
                ->limit(4)
                ->select(); //待播放
        //热门视频
        $hotVideoList = $Video->getHotVideos();
        foreach ($hotVideoList as $key => $value) {
            $pid = $value['pid'];
            $channel = $VideoCat->getChannel($pid);
            $hotVideoList[$key]['channel'] = $channel;
        }

        //取出节目表按星期几
        $monLive = $this->getPorgram('周一');
        $tueLive = $this->getPorgram('周二');
        $wedday = $this->getPorgram('周三');
        $thuLive = $this->getPorgram('周四');
        $friLive = $this->getPorgram('周五');
        $satLive = $this->getPorgram('周六');
        $sunLive = $this->getPorgram('周日');
        //热门资讯
        $hotNews = $News->newsRank();

        //评论
        $this->showComment('0', '直播');
        //热门图片
        $Photo = D('Picture');
        $hotPics = $Photo->getHotPicRank();
        $this->assign(array(
            'liveProgram' => $liveProgram,
            'nextLiveProgram' => $nextLiveProgram,
            'todayDate' => $todayDate,
            'hotVideoList' => $hotVideoList,
            'hotNews' => $hotNews,
            'hotPics' => $hotPics,
            'monLive' => $monLive,
            'tueLive' => $tueLive,
            'wedLive' => $wedday,
            'thuLive' => $thuLive,
            'friLive' => $friLive,
            'satLive' => $satLive,
            'sunLive' => $sunLive
        ));
        $this->display();
    }

    protected function getPorgram($week) {
        $Live = D('Live');
        $porgram = $Live->field('name,column,plantime')
                ->where("week = '$week' and week(plandate,1) = week(now(),1)")
                ->order('plantime asc')
                ->select();
        return $porgram;
    }

}
