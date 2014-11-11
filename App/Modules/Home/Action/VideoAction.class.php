<?php

/*
 * 功能：健康视频
 * 作者：曹轩铭	
 * 时间：2014年3月18日
 * 
 */

class VideoAction extends PublicAction {

    private $Video;
    private $VideoCat;
    protected $pid;

    function __construct() {
        parent::__construct();
        //实例化健康视频的查询对象
        $this->Video = D("Video");
        //实例化健康专辑MAP
        $this->VideoCat = D("VideoCat");
        $this->pid = $this->getJkspIds();
    }

    //默认显示健康视频首页
    function index() {
        /* 所有频道栏目 */
        $this->getVideoChannel();
        //焦点图区域
        //顶部轮播
        $FocusCat = D('focus_cat');
        $Focus = D('focus');
        $focusCat = $FocusCat->where("name = '健康视频'")->find();
        $focusCatId = $focusCat['id'];
        $focus = $Focus->where("cid like '%$focusCatId%' and status = '1'")
                ->order('level desc')
                ->limit(5)
                ->select();
        $this->assign('focus', $focus);

        //热门视频
        $topVideo = $this->getJkspTopVideo(5);
        //热门专辑
        $hotCatVideo = $this->VideoCat->getHotAlbum(4);
        //热门资讯
        $hotNewsMob = D("News");
        $hotNews = $hotNewsMob->newsRank(10);
        //查询热门图片
        $hotPicMob = D("Picture");
        $hotPic = $hotPicMob->getHotPicRank(4);
        //男性
        $manId = $this->Video->getTypeId("男性");
        $manList = $this->getJkspTypeVideo($manId, 3);       //返回查询视频的数组
        $manSList = $this->getTypeAblum($manId, 4);  //返回查询专辑的数组
        //女性
        $womanId = $this->Video->getTypeId("女性");
        $womanList = $this->getJkspTypeVideo($womanId, 3);      //返回查询视频的数组
        $womanSList = $this->getTypeAblum($womanId, 4);  //返回查询专辑的数组
        //儿童
        $childId = $this->Video->getTypeId("儿童");
        $childList = $this->getJkspTypeVideo($childId, 3);
        $childSList = $this->getTypeAblum($childId, 4);
        //老人
        $oldId = $this->Video->getTypeId("老人");
        $oldList = $this->getJkspTypeVideo($oldId, 3);
        $oldSList = $this->getTypeAblum($oldId, 4);
        //慢病
        $chronicId = $this->Video->getTypeId("慢病");
        $chronicList = $this->getJkspTypeVideo($chronicId, 3);
        $chronicSList = $this->getTypeAblum($chronicId, 4);

        //查询美食
        $foodId = $chronicId = $this->Video->getTypeId("美食");
        $foodLIst = $this->getJkspTypeVideo($foodId, 3);
        $foodSList = $this->getTypeAblum($foodId, 4);

        //查询时尚健康
        $fashionId = $this->Video->getTypeId("时尚健康");
        $fashionList = $this->getJkspTypeVideo($fashionId, 3);
        $fashionSList = $this->getTypeAblum($fashionId, 4);

        //查询自然探秘
        $natureId = $this->Video->getTypeId("自然探秘");
        $natureList = $this->getJkspTypeVideo($natureId, 3);
        $natureSList = $this->getTypeAblum($natureId, 4);


        $this->assign("topVideo", $topVideo);
        $this->assign("hotPic", $hotPic);
        $this->assign("hotNews", $hotNews);
        $this->assign("hotCatVideo", $hotCatVideo);
        $this->assign("manList", $manList);
        $this->assign("manSList", $manSList);
        $this->assign("womanList", $womanList);
        $this->assign("womanSList", $womanSList);
        $this->assign("childList", $childList);
        $this->assign("childSList", $childSList);
        $this->assign("oldlist", $oldList);
        $this->assign("oldSList", $oldSList);
        $this->assign("chronicList", $chronicList);
        $this->assign("chronicSList", $chronicSList);
        $this->assign("foodList", $foodLIst);
        $this->assign("foodSList", $foodSList);
        $this->assign("fashionList", $fashionList);
        $this->assign("fashionSList", $fashionSList);
        $this->assign("natureList", $natureList);
        $this->assign("natureSList", $natureSList);
        $this->assign(array(
            'manId' => $manId,
            'womanId' => $womanId,
            'childId' => $childId,
            'oldId' => $oldId,
            'chronicId' => $chronicId,
            'foodId' => $foodId,
            'fashionId' => $fashionId,
            'natureId' => $natureId
        ));
        $this->display();
    }

    //类别页
    function videoList() {
        //导入分页类
        import('ORG.Util.Page2');
        $pid = $this->pid;
        $this->getVideoChannel();
        $url = "/video/videocatlist?";
        /* 当没有传值的时候并不进行赋值 */
        if (!empty($_GET['keywords'])) {
            $keywords = I('keywords');
            $url .="&keyword=$keywords";
        }
        if (!empty($_GET['cid'])) {
            $cid = I('cid');
            $url .="&cid=$cid";
        }
        if (!empty($_GET['tid'])) {
            $tid = I('tid');
            $url .="&tid=$tid";
        }

        //查询标签
        $mob = D("VideoType");

        if (!empty($tid)) {
        $video_type = $mob->field("name")->where("id=$tid")->select();
            $this->assign(array(
                'tid' => $tid,
                'video_type' => $video_type,
            ));
        }
        //查询栏目
        $type = $this->VideoCat
                ->field("name,id")
                ->where("id=$cid")
                ->select();
        if (!empty($cid)) {
            $this->assign(array(
                'cid' => $cid,
                'type' => $type,
            ));
        }

        /*  四种查询条件组成不同的情况生成不同的查询条件
         *  sreach控制部分  未做Th表，补充时徐增加多个elseif可能出现的情况
         *   */
        $Map = '';
        if (!empty($tid)) {
            $Map.=" and type like ('%$tid%')";
        }
        if (!empty($cid)) {
            $cTwoId = $this->VideoCat->getCatAlbumIds($cid);
            $cTwoId = implode(',', $cTwoId);
            $Map.=" and pid in ($cTwoId)";
        }
        if (!empty($keywords)) {
            $Map.=" and description like ('%$keywords%')";
        }
        $Map.=" and isopen='1' and pid not in ($pid)";
        $Map = substr($Map, 4);
        /* 内容情况返回 */
        
        //查询标签条件
        $mob = M("video_type");
        if (!empty($tid)) {
        $video_type = $mob->field("id,name")->where("id=$tid")->find();
            $this->assign(array(
                'tid' => $tid,
                'video_type' => $video_type,
            ));
        }
        if (!empty($cid)) {
        $videocat = $this->VideoCat
                ->field("name,id")
                ->where("id='$cid'")
                ->find();
            $this->assign(array(
                'cid' => $cid,
                'videocat' => $videocat,
            ));
        }
        //分页及视频列表
        $Count = $this->Video->where("$Map")->count();
        $Page = new Page2($Count,16,3); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $page = $Page->pageShow();
        $videoList = $this->Video
                ->field("id,title,keywords,description,photo")
                ->where("$Map")
                ->order("addtime desc")//按最新添加的新闻进行排序
                ->limit($Page->limit)
                ->select();
        $this->assign(array(
            'url' =>$url,
            'showPage' => $page,
            'page' => $page,
            'videoList' => $videoList
        ));
        $this->display();
    }

    /* 专辑页 */

    public function videoCatList() {
        //导入分页类
        import('ORG.Util.Page2');
        $this->getVideoChannel();
        $pid = $this->pid;
        $url = "/video/videolist?";
        if (!empty($_GET['keywords'])) {
            $keywords = I('keywords');
            $url .="&keyword=$keywords";
        }
        if (!empty($_GET['cid'])) {
            $cid = I('cid');
            $url .= "&cid=$cid";
        }
        if (!empty($_GET['tid'])) {
            $tid = I('tid');
            $url .="&tid=$tid";
        }
        //查询标签条件及栏目值
        $mob = M("video_type");
        if (!empty($tid)) {
        $video_type = $mob->field("id,name")->where("id='$tid'")->find();
            $this->assign(array(
                'tid' => $tid,
                'video_type' => $video_type,
            ));
        }
        if (!empty($cid)) {
        $type = $this->VideoCat
                ->field("name,id")
                ->where("id=$cid")
                ->find();
            $this->assign(array(
                'cid' => $cid,
                'type' => $type,
            ));
        }
        //健康视频专辑
        //实现多条件搜索
        //下级所有的专辑Catid
        $where = "";
        if (!empty($tid)) {
            $where.=" and type like ('%$tid%')";
        }
        if (!empty($cid)) {
            $cTwoId = $this->VideoCat->getCatAlbumIds($cid);
            $cTwoId = implode(',', $cTwoId);
            $where.=" and pid in($cTwoId)";
        }
        if (!empty($keywords)) {
            $where.=" and description like ('%$keywords%')";
        }
        $where.=" and isopen='1' and zhuanjino='1'and pid NOT IN ($pid)";
        $where = substr($where, 4);
        $Count = $this->VideoCat->where("$where")->count();
        $Page = new Page2($Count,16,3); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $page = $Page->pageShow();
        $videoCatList = $this->VideoCat
                ->field("id,name,coverimage")
                ->where("$where")
                ->order("updatetime desc")//按最新添加的新闻进行排序
                ->limit($Page->limit)
                ->select();
        $this->assign(array(
            'url'=>$url,
            'showPage' => $page,
            'page' => $page,
            'videoCatList' => $videoCatList,
        ));
        $this->display();
    }

//    /* 向页面传输频道、类型、栏目、人群等分类情况 */
    function getVideoChannel() {

        $oneProgramaId = $this->VideoCat->field("id,name")
                ->where("name not in('创意短片"
                        . "','其他视频','茶缘天下','环球健康资讯') and pid='1'")
                ->select();
        $tyMob = D("VideoType");
        //侧边栏选择传值Type
        $typeName = $tyMob
                ->field("name,id")
                ->where("isopen='1'")
                ->select();
        $this->assign(array(
            'oneProgramaId' => $oneProgramaId,
            'typeName' => $typeName,
        ));
    }

    protected function getJkspIds() {
        $hqjkzxVideoCat = $this->VideoCat->where("name = '环球健康资讯'")
                ->find();
        $hqjkzxVideoCatId = $hqjkzxVideoCat['id'];
        $hqjkzxPids = $this->VideoCat->getChildrenIds($hqjkzxVideoCatId);
        array_push($hqjkzxPids, $hqjkzxVideoCatId);  //所有健闻视频的类别ID
        //健康视频  除开环球健康资讯和创意短片
        $cxdpVideoCat = $this->VideoCat->where("name = '创意短片'")
                ->find();
        $cxdpVideoCatId = $cxdpVideoCat['id'];
        $cxdpPids = $this->VideoCat->getChildrenIds($cxdpVideoCatId);
        array_push($cxdpPids, $cxdpVideoCatId);  //所有健闻视频的类别ID
        $jkspPids = array_merge($cxdpPids, $hqjkzxPids);
        $jkspPidsF = implode(',', $jkspPids);

        return $jkspPidsF;
    }

    /**
     * 
     * @param type $limit
     */
    public function getJkspVideo($limit = 5) {
        $video = $this->Video
                ->where("pid not in ($this->pid) and isopen = '1'")
                ->order('addtime desc')
                ->limit($limit)
                ->select();
        return $video;
    }

    protected function getJkspTopVideo($limit = 10) {
        $video = $this->Video
                ->where("pid not in ($this->pid) and isopen = '1'")
                ->order('hits desc')
                ->limit($limit)
                ->select();
        return $video;
    }

    public function getJkspTypeVideo($typeId, $limit) {
        $video = $this->Video
                ->where("pid not in ($this->pid)and type like '%$typeId%' and isopen = '1'")
                ->order('addtime desc')
                ->limit($limit)
                ->select();
        return $video;
    }

    protected function getTypeAblum($type, $limit = 4) {
        $list = $this->VideoCat->where("pid not in ($this->pid) and zhuanjino = '1' and type like '%$type%'")
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
