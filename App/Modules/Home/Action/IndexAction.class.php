<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-3-27 15:44:46 by 曹文鹏 , caowenpeng1990@126.com
 * Modify       :   曹轩铭
 * For          :   首页
 */
class IndexAction extends PublicAction {

    protected $NewsCat;
    protected $News;
    protected $Picture;
    protected $Video;
    protected $VideoCat;
    protected $VideoType;

    public function __construct() {
        parent::__construct();
        $this->NewsCat = D('NewsCat');
        $this->News = D('News');
        $this->Picture = D('Picture');
        $this->Video = D("Video");
        $this->VideoCat = D("VideoCat");
        $this->VideoType = D("VideoType");
    }

    public function index() {

        //顶部轮播
        $FocusCat = D('focus_cat');
        $Focus = D('focus');
        $focusCat = $FocusCat->where("name = '首页'")->find();
        $focusCatId = $focusCat['id'];
        $focus = $Focus->table('db_focus f')
                ->join('db_focus_type ft ON ft.id = f.type')
                ->where("f.cid like '%$focusCatId%' and f.status = '1'")
                ->order('f.level desc')
                ->limit(6)
                ->select();
        $this->assign('focus', $focus);
        //7宝贝导视
        $curDate = date("Y-m-d");
        if ($curDate == '2014-08-01') {
            $curDate = '7b' . date("w");
        }
        $this->assign('curWeekDay', $curDate);


        //有图片的权威发布新闻 改成了总首页推荐
        $authorCatId = $this->NewsCat->getNewsCatId('权威发布');
        $authoriPicNews = $this->News->where("flags like '%w%' and isopen = '1' and litpic !=''")
                           ->order('time desc,pubdate desc')
                           ->limit(3)
                           ->select();
        $authorPicIds = $this->getPicsIds($authoriPicNews);
        //取出未被取出的新闻
        $authoriNews = $this->News->getCatRestNews($authorCatId, $authorPicIds, 6); //权威发布新闻
        //曝光新闻
        $exposeCatId = $this->NewsCat->getNewsCatId('曝光');
        $exposePicNews = $this->News->getCatPicNews($exposeCatId);
        $exposePicIds = $this->getPicsIds($exposePicNews);
        $exposeNews = $this->News->getCatRestNews($exposeCatId, $exposePicIds, 1);
        //外媒新闻
        $lovCatId = $this->NewsCat->getNewsCatId('外媒');
        $lovPicIds = array();
        $lovNews = $this->News->getCatRestNews($lovCatId, $lovPicIds, 6);

        //健康新知
        $xinzhiCatId = $this->NewsCat->getNewsCatId('健康新知');
        $xinzhiPicNews = $this->News->getCatPicNews($xinzhiCatId);
        $xinzhiPicIds = $this->getPicsIds($xinzhiPicNews);
        $xinzhiNews = $this->News->getCatRestNews($xinzhiCatId, $xinzhiPicIds, 1);

        //微博健闻
        $weiboCatId = $this->NewsCat->getNewsCatId('微博健闻');
        $weiboPicNews = $this->News->getCatPicNews($weiboCatId);
        $weiboPicIds = $this->getPicsIds($weiboPicNews);
        $weiboNews = $this->News->getCatRestNews($weiboCatId, $weiboPicIds, 1);
        //网友健闻
        $wangyouCatId = $this->NewsCat->getNewsCatId('网友健闻');
        $wangyouPicNews = $this->News->getCatPicNews($wangyouCatId);
        $wangyouPicIds = $this->getPicsIds($wangyouPicNews);
        $wangyouNews = $this->News->getCatRestNews($wangyouCatId, $wangyouPicIds, 1);

        //健康的图
        $hbPid = D('PictureCat')->where("name = '海报'")->getField('id');
   
       $healthPics = $this->Picture->where("pid != $hbPid and isopen = '1'")
               ->order('time desc ,updatetime desc')
               ->limit(5)
               ->select();


        /*
         * 周日点播排行
         */
        $week = $this->Video->getWeekVodRanks();
        $day = $this->Video->getDayVodRanks();
//      $nowVideo = $this->Video->getVideo(12);   //大家都在看
        //健闻视频 即环球健康资讯下的所有视频
        $hqjkzxVideoCat = $this->VideoCat->where("name = '环球健康资讯'")
                ->find();
        $hqjkzxVideoCatId = $hqjkzxVideoCat['id'];
        $hqjkzxPids = $this->VideoCat->getChildrenIds($hqjkzxVideoCatId);
        array_push($hqjkzxPids, $hqjkzxVideoCatId);  //所有健闻视频的类别ID

        $jwTopVideo = $this->Video->getVideos($hqjkzxPids, 'top');  //健闻头条视频
        $jwTopVideo = $jwTopVideo[0];  //健闻头条视频
        $jwRecVideo = $this->Video->getVideos($hqjkzxPids, 'rec');  //健闻推荐视频
        $jwRecVideo = $jwRecVideo[0];  //健闻推荐视频
        $jwHotVideo = $this->Video->getVideos($hqjkzxPids, 'hot');  //健闻热点视频
        $jwHotVideo = $jwHotVideo[0];  //健闻热点视频
        $jwrecIdArr[] = $jwTopVideo['id'];
        $jwrecIdArr[] = $jwRecVideo['id'];
        $jwrecIdArr[] = $jwHotVideo['id'];
        foreach ($jwrecIdArr as $key => $value) {
            //清除数组中空元素
            if (empty($value)) {
                unset($jwrecIdArr[$key]);
            }
        }
        $jwrecIds = implode(',', $jwrecIdArr);
        //剩下的健闻视频
        $hqjkzxPidsF = implode(',', $hqjkzxPids);
        $jwVideos = $this->Video->where("pid in ($hqjkzxPidsF) and id not in($jwrecIds) and isopen = '1'  ")
                ->order('addtime desc')
                ->limit(9)
                ->select();
        //健康视频  除开环球健康资讯和创意短片
        $cxdpVideoCat = $this->VideoCat->where("name = '创意短片'")
                ->find();
        $cxdpVideoCatId = $cxdpVideoCat['id'];
        $cxdpPids = $this->VideoCat->getChildrenIds($cxdpVideoCatId);
        array_push($cxdpPids, $cxdpVideoCatId);  //所有健闻视频的类别ID
        $jkspPids = array_merge($cxdpPids, $hqjkzxPids);
        $jkspPidsF = implode(',', $jkspPids);
        //1、女
        $womanId = $this->VideoType->getTypeId('女性');
        $womanList = $this->getTypeAblum($jkspPidsF, $womanId, 4);
        //2、男
        $manId = $this->VideoType->getTypeId('男性');
        $manList = $this->getTypeAblum($jkspPidsF, $manId, 4);
        //3、儿童
        $childId = $this->VideoType->getTypeId('儿童');
        $childList = $this->getTypeAblum($jkspPidsF, $childId, 4);
        //4、老人
        $OldId = $this->VideoType->getTypeId('老人');
        $OldList = $this->getTypeAblum($jkspPidsF, $OldId, 4);
        //5、美食
        $foodId = $this->VideoType->getTypeId('美食');
        $foodList = $this->getTypeAblum($jkspPidsF, $foodId, 4);
        //6、慢病 
        $chronicId = $this->VideoType->getTypeId('慢病');
        $chronicList = $this->getTypeAblum($jkspPidsF, $chronicId, 4);

        //卫视节目
        //1、健康点击
        $xyhbjCid = $this->VideoCat->getColumn("西医话保健");
        $xyhbjCatId = $xyhbjCid['id'];
        $xyhbjPids = $this->VideoCat->getChildrenIds($xyhbjCatId);
        if (empty($xyhbjPids)) {
            $xyhbjPids = array();
        }
        array_push($xyhbjPids, $xyhbjCatId);  //所有西医话保健
        $xyhbjVideo = $this->Video->getVideos($xyhbjPids, '', 3);
        //2、超级诊疗室
        $cjzlsCid = $this->VideoCat->getColumn("超级诊聊室");
        $cjzlsCatId = $cjzlsCid['id'];
        $cjzlsPids = $this->VideoCat->getChildrenIds($cjzlsCatId);
        if (empty($cjzlsPids)) {
            $cjzlsPids = array();
        }
        array_push($cjzlsPids, $cjzlsCatId);  //所有西医话保健
        $cjzlsVideo = $this->Video->getVideos($cjzlsPids, '', 3);
        //3、健康风尚杂志
        $jkfszzCid = $this->VideoCat->getColumn("健康风尚杂志");
        $jkfszzCatId = $jkfszzCid['id'];
        $jkfszzPids = $this->VideoCat->getChildrenIds($jkfszzCatId);
        if (empty($jkfszzPids)) {
            $jkfszzPids = array();
        }
        array_push($jkfszzPids, $jkfszzCatId);  //健康风尚杂志
        $jkfszzVideo = $this->Video->getVideos($jkfszzPids, '', 3);

        //4、健康全纪录
        $jkqjlCid = $this->VideoCat->getColumn("健康全纪录");
        $jkqjlVideo = $this->getTvVidos($jkqjlCid);
        //5、健康小百科
        $jkxbkCid = $this->VideoCat->getColumn("健康小百科");
        $jkxbkVideo = $this->getTvVidos($jkxbkCid);
        //6、院士时间
        $ystimeCid = $this->VideoCat->getColumn("院士时间");
        $ystimeVideo = $this->getTvVidos($ystimeCid);
        //7、地球影像志
        $earthVideoCid = $this->VideoCat->getColumn("地球影像志");
        $earthVideo = $this->getTvVidos($earthVideoCid);
        //8、我的健康日志
        $meDiaryCid = $this->VideoCat->getColumn("我的健康日记");
        $meDiaryVideo = $this->getTvVidos($meDiaryCid);
        //9、健康30分
        $jkThreePointsCid = $this->VideoCat->getColumn("健康30分");
        $jkThreePointsVideo = $this->getTvVidos($jkThreePointsCid);
        //10、明星健康那些事
        $mxnxsCid = $this->VideoCat->getColumn("明星健康");
        $mxnxsVideo = $this->getTvVidos($mxnxsCid);
        //11、健康有道
        $jkydCid = $this->VideoCat->getColumn("健康有道");
        $jkydVideo = $this->getTvVidos($jkydCid);
        //12、生命冲动
        $vitaImpulsionCid = $this->VideoCat->getColumn("生命冲动");
        $vitaImpulsionVideo = $this->getTvVidos($vitaImpulsionCid);

        //创意视频
        //1、节目宣传片
        $programVideoCatId = $this->VideoCat->getColumn("节目宣传片");
        $programVideo = $this->getTvVidos($programVideoCatId, 2);
        //2、创意公益短片
        $commonWealCatId = $this->VideoCat->getColumn("创意公益短片");
        $commonWealVIdeo = $this->getTvVidos($commonWealCatId, 2);
        //3、创意广告
        $advertiseMentCatId = $this->VideoCat->getColumn("创意广告短片");
        $advertiseMentVIdeo = $this->getTvVidos($advertiseMentCatId, 2);
        //4、搞笑短片
        $funnyCatId = $this->VideoCat->getColumn("创意搞笑短片");
        $funnyVideo = $this->getTvVidos($funnyCatId, 2);


        //美食的频道
        $foodList2 = $this->Picture->where("property like '%c%' and isopen = '1' and type like '%$foodId%'")
                ->order('time desc')
                ->limit(5)
                ->select();
        //美容
        $hairdrTid = $this->VideoType->getTypeId('美容');
        //1.视频2
        $hairdrVideo = $this->getTypeVideo($hairdrTid, 2);
        //2、文章4
        $hairdrNews = $this->News->getTypeNews($hairdrTid, 4);
        //养生
        $healthCareTid = $this->VideoType->getTypeId('养生');
        //1.视频2
        $healthCareVideo = $this->getTypeVideo($healthCareTid, 2);
        //2、文章4
        $healthCareNews = $this->News->getTypeNews($healthCareTid, 4);
        //时尚
        $fashionTid = $this->VideoType->getTypeId('时尚');
        //1.视频2
        $fashionVideo = $this->getTypeVideo($fashionTid, 2);
        //2、文章4
        $fashionNews = $this->News->getTypeNews($fashionTid, 4);
        //瑜伽
        $yoga = $this->VideoCat->getColumn("健康律动");
        //1、视频4
        $yogaVideo = $this->getTvVidos($yoga, 4);
        //综艺
        $variety = $this->VideoCat->getColumn("综艺");
        $varietyCid = $this->VideoCat->getVideoCatId('综艺');
        //1.视频4
        $varietyVideo = $this->getTvVidos($variety, 4);
        //主播风采
        $anchorMob = D("Host");
        $anchor = $anchorMob->getAnchor();

        //直播表
        $Live = D('Live');
        $todayDate = date('Y-m-d');
        $nowtime = date('H:i:s');
        $liveProgram = $Live->field('name,column,plantime')
                ->where("plantime <= '$nowtime' and plandate = '$todayDate'")
                ->order('plantime desc')
                ->find();   //正在直播
        $nextLiveProgram = $Live->field('name,column,plantime')
                ->where("plantime >= '$nowtime' and plandate = '$todayDate'")
                ->order('plantime asc')
                ->limit(3)
                ->select();   //待播放
        //留言动态
        $Comment = D('Comment');
        $comment = $Comment->where("category not in ('直播','baby','hospital','营养师')")
                ->order('ctime desc')
                ->limit(4)
                ->select();

        $table = array('视频' => 'video', '新闻' => 'news', 'photo' => 'photo', 'hospital' => 'hospital');
        $link = array('视频' => '/play/index/id/',
            '新闻' => '/news/view/id/',
            'photo' => '/photo/view/id/',
            'hospital' => '/hospital/view/id/'
        );
        foreach ($comment as $key => $value) {
            $category = $value['category'];
            $oid = $value['oid'];
            $modelName = $table[$category];
            $Model = D($modelName);
            $ors = $Model->where("id = '$oid'")->find();
            $comment[$key]['title'] = $ors['title'];
            $comment[$key]['link'] = $link[$category] . $oid . '.html';
        }


        //正在看。。
        $VideoView = D('video_view');
        $nowView = $VideoView->table('db_video_view vv')
                ->join('db_video v on vv.vid=v.id')
                ->order('vv.ctime desc')
                ->limit(8)
                ->select();
        foreach ($nowView as $key => $value) {
            $pid = $value['pid'];
            $description = $value['description'];
            $description = mb_substr($description, 0, 20, 'utf8');
            $nowView[$key]['description'] = $description;
            $channel = $this->VideoCat->getChannel($pid);
            $nowView[$key]['channel'] = $channel;
        }
        /*
         * tid都建有2级页面不需要传ID
         * CID都需要传
         */
        $this->assign(array(
            'foodList2' => $foodList2,
            'nowVideo' => $nowView,
            'week' => $week,
            'day' => $day,
            'anchor' => $anchor,
            'topNewsVideo' => $jwTopVideo,
            'hotNewsVideo' => $jwHotVideo,
            'recNewsVideo' => $jwRecVideo,
            'newsVideo' => $jwVideos,
            'womanList' => $womanList,
            'manList' => $manList,
            'childList' => $childList,
            'oldList' => $OldList,
            'foodList' => $foodList,
            'chronicList' => $chronicList,
            'xyhbjCid' => $xyhbjCid,
            'xyhbjVideo' => $xyhbjVideo,
            'cjzlsVideo' => $cjzlsVideo,
            'cjzlsCid' => $cjzlsCid,
            'jkfszzCid' => $jkfszzCid,
            'jkfszzVideo' => $jkfszzVideo,
            'jkqjlCid' => $jkqjlCid,
            'jkqjlVideo' => $jkqjlVideo,
            'jkxbkCid' => $jkxbkCid,
            'jkxbkVideo' => $jkxbkVideo,
            'ystimeCid' => $ystimeCid,
            'ystimeVideo' => $ystimeVideo,
            'earthVideoCid' => $earthVideoCid,
            'earthVideo' => $earthVideo,
            'meDiaryCid' => $meDiaryCid,
            'meDiaryVideo' => $meDiaryVideo,
            'jkThreePointsCid' => $jkThreePointsCid,
            'jkThreePointsVideo' => $jkThreePointsVideo,
            'mxnxsCid' => $mxnxsCid,
            'mxnxsVideo' => $mxnxsVideo,
            'jkydCid' => $jkydCid,
            'jkydVideo' => $jkydVideo,
            'vitaImpulsionCid' => $vitaImpulsionCid,
            'vitaImpulsionVideo' => $vitaImpulsionVideo,
            'programVideoCatId' => $programVideoCatId,
            'programVideo' => $programVideo,
            'commonWealCatId' => $commonWealCatId,
            'commonWealVIdeo' => $commonWealVIdeo,
            'advertiseMentCatId' => $advertiseMentCatId,
            'advertiseMentVIdeo' => $advertiseMentVIdeo,
            'funnyCatId' => $funnyCatId,
            'funnyVIdeo' => $funnyVideo,
            'hairdrNews' => $hairdrNews,
            'hairdrVideo' => $hairdrVideo,
            'varietyVideo' => $varietyVideo,
            'varietyCid' => $varietyCid,
            'yogaVideo' => $yogaVideo,
            'healthCareNews' => $healthCareNews,
            'healthCareVideo' => $healthCareVideo,
            'fashionVideo' => $fashionVideo,
            'fashionNews' => $fashionNews,
            'authorCatId' => $authorCatId,
            'authoriNews' => $authoriNews,
            'authoriPicNews' => $authoriPicNews,
            'exposeCatId' => $exposeCatId,
            'exposePicNews' => $exposePicNews,
            'exposeNews' => $exposeNews,
            'lovCatId' => $lovCatId,
            'lovNews' => $lovNews,
            'xinzhiCatId' => $xinzhiCatId,
            'xinzhiPicNews' => $xinzhiPicNews,
            'xinzhiNews' => $xinzhiNews,
            'weiboCatId' => $weiboCatId,
            'weiboPicNews' => $weiboPicNews,
            'weiboNews' => $weiboNews,
            'wangyouCatId' => $wangyouCatId,
            'wangyouPicNews' => $wangyouPicNews,
            'wangyouNews' => $wangyouNews,
            'healthPics' => $healthPics,
            'liveProgram' => $liveProgram,
            'nextLiveProgram' => $nextLiveProgram, //正播放节目
            'comment' => $comment
        ));
        $this->display();
    }

    /**
     * 取出被选出的图片新闻集的id
     * @param array $picNews
     * @return array 含图片的id数组
     */
    protected function getPicsIds($picNews) {
        $picIds = array();
        foreach ($picNews as $value) {
            $picIds[] = $value['id'];
        }
        return $picIds;
    }

    protected function getTvVidos($column, $limit = 3) {
        $CatId = $column['id'];
        $Pids = $this->VideoCat->getChildrenIds($CatId);
        if (empty($Pids)) {
            $Pids = array();
        }
        array_push($Pids, $CatId);  //健康风尚杂志
        $Video = $this->Video->getVideos($Pids, '', $limit);
        return $Video;
    }

    protected function getTypeVideo($typeId, $limit = 4) {
        $video = $this->Video->where("type like '%$typeId%' and isopen = '1'")
                ->order('addtime desc')
                ->limit($limit)
                ->select();
        return $video;
    }

    protected function getTypeAblum($pids, $type, $limit = 4) {
        $list = $this->VideoCat->where("pid not in ($pids) and zhuanjino = '1' and type like '%$type%'")
                ->order('updatetime desc')
                ->limit($limit)
                ->select();
        foreach ($list as $key => $value) {
            $pid = $value['id'];
            $video = $this->Video->where("pid = '$pid'")
                    ->find();
            $videotime = $video['videotime'];
            $list[$key]['videotime'] = $videotime;
        }
        return $list;
    }

}
