<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-3-31 10:05:32 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   卫视节目
 */
class TvAction extends PublicAction {

    protected $Video;
    protected $Video_cat;
    protected $pid;

    public function __construct() {
        parent::__construct();
        $this->Video = D('Video');
        $this->Video_cat = D('VideoCat');
        $this->pid = $this->getJkspIds();
    }

    public function index() {

        //顶部轮播
        $FocusCat = D('focus_cat');
        $Focus = D('focus');
        $focusCat = $FocusCat->where("name = '卫视节目'")->find();
        $focusCatId = $focusCat['id'];
        $focus = $Focus->where("cid like '%$focusCatId%' and status = '1'")
                ->order('level desc')
                ->limit(5)
                ->select();
        $this->assign('focus', $focus);


        //取出健康风尚杂志所有视频
        $jkfszzPrName = $this->Video_cat->getColumn('健康风尚杂志');
        $jkfszzCatId = $jkfszzPrName['id'];
        $jkfszzCOneCatIds = $this->Video_cat->where("pid = '$jkfszzCatId' and isopen = '1'")
                ->select();
        $jkfszzVideo = $this->getTvVideos($jkfszzPrName, 5);
        /* 超级诊聊室 */
        $disgonsisPrName = $this->Video_cat->getColumn('超级诊聊室');
        $disgnosisVideo = $this->getTvVideos($disgonsisPrName, 5);
        /* 西医话保健*/
        $xyhbjPrName = $this->Video_cat->getColumn('西医话保健');
        $xyhbjVideo = $this->getTvVideos($xyhbjPrName, 5);
        /* 健康全纪录 */
        $jkqjlPrName = $this->Video_cat->getColumn('健康全纪录');
        $jkqjlVideo = $this->getTvVideos($jkqjlPrName, 5);
        /* 院士时间 */
        $ysTimePrName = $this->Video_cat->getColumn('院士时间');
        $ysTimeVideo = $this->getTvVideos($ysTimePrName, 5);
        /* 健康有道 */

        $jkydPrName = $this->Video_cat->getColumn('健康有道');
        $jkydVideo = $this->getTvVideos($jkydPrName, 5);
        /* 健康律动 */
        $jkldPrName = $this->Video_cat->getColumn('健康律动');
        $jkldVideo = $this->getTvVideos($jkldPrName, 5);
        /* 明星健康那些事 */
        $mxjknxsPrName = $this->Video_cat->getColumn('明星健康');
        $mxjknxsVideo = $this->getTvVideos($mxjknxsPrName, 5);
        /* 我的健康日记 */
        $myHDiaryPrName = $this->Video_cat->getColumn('我的健康日记');
        $myHDiaryVideo = $this->getTvVideos($myHDiaryPrName, 3);
        /* 生命冲动 */
        $lifeImpulsionPrName = $this->Video_cat->getColumn('生命冲动');
        $lifeImpulsionVideo = $this->getTvVideos($lifeImpulsionPrName, 3);
        /* 综艺采用二重循环查询 */
        $varietyPrName = $this->Video_cat->getColumn('综艺');
        $zyCatId = $varietyPrName['id'];
        $zyCOneCatIds = $this->Video_cat->where("pid = '$zyCatId' and isopen = '1'")
                ->select();
        $this->assign('zyCOneCatIds', $zyCOneCatIds);
        $varietyVideo = $this->getTvVideos($varietyPrName, 3);

        /* 健康小百科 */
        $encyclopediaPrName = $this->Video_cat->getColumn('健康小百科');
        $encyclopediaVideo = $this->getTvVideos($encyclopediaPrName, 3);
        /* 地球影像志 */
        $earthimagePrName = $this->Video_cat->getColumn('地球影像志');
        $earthimageVideo = $this->getTvVideos($earthimagePrName, 3);
        /* 音乐打印机 */
        $musicBoxPrName = $this->Video_cat->getColumn('音乐打印机');
        $musicBoxVideo = $this->getTvVideos($musicBoxPrName, 3);
        /* 健康新视界 */
        $newVisionPrName = $this->Video_cat->getColumn('健康新视界');
        $newVisionVideo = $this->getTvVideos($newVisionPrName, 3);
        /*  Top视频  */
        $topTv = $this->getJkspTopVideo();
        /* 热门图片 */
        $hotPicMob = D("Picture");
        $hotPic = $hotPicMob->getHotPicRank(4);
        /* 热门资讯 */
        $hotNewsMob = D("News");
        $hotNews = $hotNewsMob->newsRank(10);
        /* 热门专辑 */
        $hotCatVideo = $this->Video_cat->getHotAlbum(4);
        $this->getPrograma();
        $this->assign(array(
            'jkfszzCOneCatIds' => $jkfszzCOneCatIds,
            'topTv' => $topTv,
            'hotPic' => $hotPic,
            'hotNews' => $hotNews,
            'hotCatVideo' => $hotCatVideo,
            'jkfszzPrName' => $jkfszzPrName,
            'lifeImpulsionPrName' => $lifeImpulsionPrName,
            'varietyPrName' => $varietyPrName,
            'encyclopediaPrName' => $encyclopediaPrName,
            'earthimagePrName' => $earthimagePrName,
            'musicBoxPrName' => $musicBoxPrName,
            'newVisionPrName' => $newVisionPrName,
            'jkqjlPrName' => $jkqjlPrName,
            'ysTimePrName' => $ysTimePrName,
            'jkydPrName' => $jkydPrName,
            'jkldPrName' => $jkldPrName,
            'mxjknxsPrName' => $mxjknxsPrName,
            'myHDiaryPrName' => $myHDiaryPrName,
            'disgonsisPrName' => $disgonsisPrName,
            'disgnosisVideo' => $disgnosisVideo,
            'newVisionVideo' => $newVisionVideo,
            'lifeImpulsionVideo' => $lifeImpulsionVideo,
            'myHDiaryVideo' => $myHDiaryVideo,
            'mxjknxsVideo' => $mxjknxsVideo,
            'ysTimeVideo' => $ysTimeVideo,
            'jkldVideo' => $jkldVideo,
            'jkydVideo' => $jkydVideo,
            'varietyVideo' => $varietyVideo,
            'encyclopediaVideo' => $encyclopediaVideo,
            'earthimageVideo' => $earthimageVideo,
            'musicBoxVideo' => $musicBoxVideo,
            'jkqjlVideo' => $jkqjlVideo,
            'jkfszzVideo' => $jkfszzVideo,
            'xyhbjPrName'=>$xyhbjPrName,
            'xyhbjVideo'=>$xyhbjVideo
            
        ));
        $this->display();
    }

    /*
     * 
     * 类别页，根据不同的ID值进行查找
     * 
     */

    public function TvList() {
        $categoryId = I('cate');
        $title = $this->Video_cat
                ->where("id='$categoryId'")
                ->find();
        if (!$title) {
            $this->_empty();
            return;
        }
        if ($title['name'] == '健康风尚杂志') {
            $twoPid = $title['id'];
            $twoTitle = $this->Video_cat->field("id,name")
                    ->where("pid='$twoPid'")
                    ->select();
            foreach ($twoTitle as $key => $value) {
                $pid = $value['id'];
                $pids = $this->Video_cat->getChildrenIds($pid);
                array_push($pids, $pid);
                $videos = $this->Video->getVideos($pids, '', 4);
                $twoTitle[$key]['videos'] = $videos;
            }
            arsort($twoTitle);
            $AllId = $this->Video_cat->getChildrenIds($title['id']);
            /* 最新视频 */
            $newVideo = $this->Video->getVideos($AllId, '', 8);
            /* 该栏目主持人和频道 */
            $this->getPrograma($title['star']);
            //其他热门栏目
            $this->getHotchannel($twoPid);
            $this->assign(array(
                'newVideo' => $newVideo,
                'title' => $title,
                'twoTitle' => $twoTitle
            ));
            $this->display("Tv/jkfszz");
            exit;
        } elseif ($title['name'] == "综艺") {
            $twoPid = $title['id'];
            $twoTitle = $this->Video_cat->field("id,name")
                    ->where("pid='$twoPid'")
                    ->select();  //综艺下的栏目
            if (empty($twoTitle)) {
                $twoTitle = array();
            }
            //顶栏跳转和主持人信息
            $this->getPrograma($title['star']);
            $AllId = $this->Video_cat->getChildrenIds($title['id']);
            foreach ($twoTitle as $key => $value) {
                $pid = $value['id'];
                $pids = $this->Video_cat->getChildrenIds($pid);
                array_push($pids, $pid);
                $videos = $this->Video->getVideos($pids, '', 4);
                $twoTitle[$key]['videos'] = $videos;
            }
            arsort($twoTitle);
            //最新视频
            $newVideo = $this->Video->getVideos($AllId, '', 8);
            //其他热门视频
            $this->getHotchannel($twoPid);
            $this->assign(array(
                'newVideo' => $newVideo,
                'title' => $title,
                'twoTitle' => $twoTitle
            ));
            $this->display("Tv/zongyi");
            exit;
        }
        //其他的各级节目跳转的是单默认访问单集页当这个变量不为空时进入专辑
        $zhuanJi = I('zhuan');
        //条件变量当存在时列表排序是以点击量进行的
        $sort = I("hot");
        $AllId = $this->Video_cat->getChildrenIds($title['id']);
        if (empty($AllId)) {
            $AllId = array();
        }
        if (empty($zhuanJi)) {
            array_push($AllId, $title['id']);    //这里是不要这个
        }
        $AllId = implode(',', $AllId);
        if (!empty($zhuanJi)) {
            $M = "Video_cat";
            $field = array('id', 'name', 'coverimage' => 'img', 'description');
            $limit = 9;
            $order = "updatetime desc";
            $Map = "isopen=1 and zhuanjino = '1' and id in($AllId)";
            $display = "Tv/Tvlistzhuanji";
        } else {
            $M = "Video";
            $field = array('id', 'title' => 'name', 'photo' => 'img', 'description');
            $limit = 9;
            $order = "addtime desc";
            $Map = "isopen=1 and pid in($AllId)";
            $display = "Tv/Tvlistdanji";
        }
        $order = !empty($sort) ? "hits desc" : $order;
        //引入Page类
        import('ORG.Util.Page2');
        $Count = $this->$M->where("$Map")->count();
        $Page = new Page2($Count, $limit, 3); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $show = $Page->pageShow();
        $video = $this->$M
                ->field($field)
                ->where($Map)
                ->order($order)//按最新添加的进行排序
                ->limit($Page->limit)
                ->select();
        $subPic = substr(md5($title['name']), 0, 16); //副标题图片名
        $this->assign(array(
            'show' => $show,
            'video' => $video,
            'title' => $title,
            'subPic' => $subPic
        ));

        $this->getPrograma($title['star']);
        $this->getHotchannel($title['id']);
        $this->display($display);
    }

    /*
     * 专辑页
     * 页面元素 ：栏目名称、栏目介绍、主持人、各专辑封面
     */

    Public function ChannelList() {
        
    }

    //获取各个一级栏目的信息用于传值
    public function getPrograma($name = '') {
        /*  各个一级栏目的id  */
        $hostIdArr = explode(',', $name);
        $oneProgramaId = $this->Video_cat
                ->where("name not in('创意短片"
                        . "','其他视频','茶缘天下','环球健康资讯')and pid='1'")
                ->select();
        $starMob = D("Host");
        $map['id'] = array('in', $hostIdArr);
        $starInfo = $starMob->field("id,name,photo")
                ->where($map)
                ->select();
        $this->assign(array(
            'oneProgramaId' => $oneProgramaId,
            'starInfo' => $starInfo
        ));
    }

    /*
     * 获取其他热门栏目 
     */

    Public function getHotchannel($pid) {
        $oneProgramaId = $this->Video_cat->field("id,name")
                ->where("name not in('创意短片"
                        . "','其他视频','茶缘天下','环球健康资讯')and pid='1'")
                ->select();
        $columnPids = array();
        foreach ($oneProgramaId as $key => $value) {
            $columnPids[] = $value['id'];
        }
        $columnPidsF = implode(',', $columnPids);
        $hotList = $this->Video_cat
                ->field("id,name,star,coverimage,content")
                ->where("id in ($columnPidsF)")
                ->order("rand()")
                ->limit(3)
                ->select();
        $hotList = empty($hotList) ? array() : $hotList;
        $Host = D('host');
        foreach ($hotList as $key => $value) {
            $ids = $value['star'];
            $idsArr = explode(',', $ids);
            $starName = '';
            foreach ($idsArr as $v) {
                $starName .= $Host->where("id = '$v'")->getField('name') . ' ';
            }
            $hotList[$key]['stars'] = $starName;
        }
        $this->assign('hotList', $hotList);
    }

    /**
     * 
     * @param type $column
     * @param type $limit
     * @return type
     */
    protected function getTvVideos($column, $limit = 3) {
        $CatId = $column['id'];
        $Pids = $this->Video_cat->getChildrenIds($CatId);
        if (empty($Pids)) {
            $Pids = array();
        }
        array_push($Pids, $CatId);
        $Video = $this->Video->getVideos($Pids, '', $limit,'');
        return $Video;
    }

    protected function getJkspTopVideo($limit = 10) {
        $video = $this->Video
                ->where("pid not in ($this->pid) and isopen = '1'")
                ->order('hits desc')
                ->limit($limit)
                ->select();
        return $video;
    }

    protected function getJkspIds() {
        $hqjkzxVideoCat = $this->Video_cat->where("name = '环球健康资讯'")
                ->find();
        $hqjkzxVideoCatId = $hqjkzxVideoCat['id'];
        $hqjkzxPids = $this->Video_cat->getChildrenIds($hqjkzxVideoCatId);
        array_push($hqjkzxPids, $hqjkzxVideoCatId);
        //健康视频  除开环球健康资讯和创意短片 茶缘天下  其他视频
        $cxdpVideoCat = $this->Video_cat->where("name = '创意短片'")
                ->find();
        $cxdpVideoCatId = $cxdpVideoCat['id'];
        $cxdpPids = $this->Video_cat->getChildrenIds($cxdpVideoCatId);
        array_push($cxdpPids, $cxdpVideoCatId);

        $cytxVideoCat = $this->Video_cat->where("name = '茶缘天下'")
                ->find();
        $cytxVideoCatId = $cytxVideoCat['id'];
        $cytxPids = $this->Video_cat->getChildrenIds($cytxVideoCatId);
        array_push($cytxPids, $cytxVideoCatId);

        $qtspVideoCat = $this->Video_cat->where("name = '其他视频'")
                ->find();
        $qtspVideoCatId = $qtspVideoCat['id'];
        $qtspPids = $this->Video_cat->getChildrenIds($qtspVideoCatId);
        array_push($qtspPids, $qtspVideoCatId);

        $jkspPids = array_merge($cxdpPids, $hqjkzxPids, $cytxPids, $qtspPids);
        $jkspPidsF = implode(',', $jkspPids);
        return $jkspPidsF;
    }

}
