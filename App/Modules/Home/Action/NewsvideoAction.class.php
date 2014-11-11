<?php

//健闻视频
class NewsvideoAction extends Action {

    private $Video;
    private $VideoCat;
    protected $pid;
    protected $newsCatVideo;

    function __construct() {
        parent::__construct();
        //实例化健康视频的查询对象
        $this->Video = D("Video");
        //实例化健康专辑MAP 
        $this->VideoCat = D("VideoCat");
        $this->pid = $this->getJwspIds();
    }

    function index() {
        //TOP视频查询  
        //顶部轮播
        $FocusCat = D('focus_cat');
        $Focus = D('focus');
        $focusCat = $FocusCat->where("name = '健闻视频'")->find();
        $focusCatId = $focusCat['id'];
        $focus = $Focus->where("cid like '%$focusCatId%' and status = '1'")
                ->order('level desc')
                ->limit(5)
                ->select();
        $this->assign('focus', $focus);

        $topVideo = $this->getJwspTopVideo(5);
        $hotCatVideo = $this->VideoCat->getHotAlbum(4);
        //热门图片调用hotPicture
        $hotPicture = D("Picture");
        $hotPic = $hotPicture->getHotPicRank(4);
        //热门资讯
        $hotNewsMob = D("News");
        $hotNews = $hotNewsMob->newsRank(10);
        //环球
        $allnewId = $this->VideoCat->getCatIdByCatname('环球健闻');
        $allnew = $this->getJwspVideosByCatId($allnewId, 7);
        //权威发布
        $authId = $this->VideoCat->getCatIdByCatname("权威发布");
        $auth = $this->getJwspVideosByCatId($authId, 7);
        //健康点击
        $heaCliId = $this->VideoCat->getCatIdByCatname("健康点击");
        $heaCli = $this->getJwspVideosByCatId($heaCliId, 7);
        //今日视点
        $foucsId = $this->VideoCat->getCatIdByCatname("今日视点");
        $foucs = $this->getJwspVideosByCatId($foucsId, 7);
        //天下万象
        $wordId = $this->VideoCat->getCatIdByCatname("天下万象");
        $word = $this->getJwspVideosByCatId($wordId, 7);
        //健康30分
        $heaTPId = $this->VideoCat->getCatIdByCatname("健康30分");
        $heaTP = $this->getJwspVideosByCatId($heaTPId, 7);
        $this->assign(array(
            'heaTP' => $heaTP,
            'heaTPId' => $heaTPId,
            "allnew" => $allnew,
            "allnewId" => $allnewId,
            "auth" => $auth,
            "authId" => $authId,
            "heaCli" => $heaCli,
            "heaCliId" => $heaCliId,
            "foucs" => $foucs,
            "foucsId" => $foucsId,
            "word" => $word,
            "wordId" => $wordId,
            "topVideo" => $topVideo,
            "hotPic" => $hotPic,
            "hotNews" => $hotNews,
            "hotCatVideo" => $hotCatVideo,
        ));

        $this->display();
    }

    function Videolist() {
        //查询对象
        $mob = M("video");
        //导入分页类
        import('ORG.Util.Page2');
        $pid = $this->pid;
        /* 获取栏目类型等数据 */
        $this->getVideoChannel();

        $map = '';
        $url = "/newsvideo/videolist/?";
        $crumbs = '全部';
        $order = 'addtime';
        if(!empty($_GET['hot'])){
            $order = 'hits';
            $this->assign('order',true);
        }
        if (!empty($_GET['keywords'])) {
            $keywords = I('keywords');
            $map .= "and keywords like '%$keywords%'";
            $crumbs = $keywords;
            $url .="&keywords = $keywords";
        }
        if (!empty($_GET['cid'])) {
            $cid = I('cid');
            $pids = $this->VideoCat->getChildrenIds($cid);
            if (empty($pids)) {
                $pids = array();
            }
            array_push($pids, $cid);
            $pidsF = implode(',', $pids);
            $map .= "and pid in ($pidsF)";
            $videoCat = $this->VideoCat
                    ->field("name,id")
                    ->where("id='$cid'")
                    ->find();
            $crumbs = $videoCat['name'];
            $url .= "&cid=$cid";
            $this->assign('videoCat', $videoCat);
            $this->assign('cid', $cid);
        }else{
              $map .= "and pid in ($pid)";
        }
        if (!empty($_GET['tid'])) {
            $tid = I('tid');
            if(empty($_GET['cid'])){
            $map .= "and pid in ($pid)";
            $tyMob = D("VideoType");
            $videoType = $tyMob
                    ->field("name,id")
                    ->where("id = '$tid'")
                    ->find();
            $crumbs = $videoType['name'];
            }
            $map .= "and type like '%$tid%'";
            $url .="&tid=$tid";
            $this->assign('videoType', $videoType);
            $this->assign('tid', $tid);
        }
        $this->assign('url',$url);
        $this->assign('crumbs',$crumbs);
        $Count = $mob->where("isopen = '1' $map")->count();
        $Page = new Page2($Count, 16, 3); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $show = $Page->pageShow();
        $videoList = $mob
                ->where("isopen = '1' $map")
                ->order("$order desc")//按最新添加的新闻进行排序
                ->limit($Page->limit)
                ->select();
        $this->assign('showPage', $show);
        $this->assign("videoList", $videoList);
        $this->assign(array(
            'cid' => $cid,
            'keywords' => $keywords
        ));
        $this->display();
    }

    function getVideoChannel() {

        $hqjkzxCatId = $this->VideoCat->getCatIdByCatname('环球健康资讯');
        $tyMob = D("VideoType");
        $catName = $this->VideoCat
                ->field("name,id")
                ->where("isopen='1' and pid = '$hqjkzxCatId'")
                ->select();

        //侧边栏选择传值Type
        $typeName = $tyMob
                ->field("name,id")
                ->where("isopen='1'")
                ->select();
        $this->assign(array(
            'typeName' => $typeName,
            'catName' => $catName,
        ));
    }

    protected function getJwspTopVideo($limit = 10) {
        $video = $this->Video
                ->where("pid  in ($this->pid) and isopen = '1'")
                ->order('hits desc')
                ->limit($limit)
                ->select();
        return $video;
    }

    protected function getJwspIds() {
        $hqjkzxVideoCat = $this->VideoCat->where("name = '环球健康资讯'")
                ->find();
        $hqjkzxVideoCatId = $hqjkzxVideoCat['id'];
        $hqjkzxPids = $this->VideoCat->getChildrenIds($hqjkzxVideoCatId);
        array_push($hqjkzxPids, $hqjkzxVideoCatId);  //所有健闻视频的类别ID
        $jwspPidsF = implode(',', $hqjkzxPids);
        return $jwspPidsF;
    }

    protected function getJwspVideosByCatId($catId, $limit) {
        $pids = $this->VideoCat->getChildrenIds($catId);
        if (empty($pids)) {
            $pids = array();
        }
        array_push($pids, $catId);
        $pidsF = implode(',', $pids);
        $videos = $this->Video->where("pid in ($pidsF) and isopen = '1'")
                ->order('addtime desc')
                ->limit($limit)
                ->select();
        $firstPid = $videos[0]['pid'];
        $videos[0]['channel'] = $this->VideoCat->getChannel($firstPid);
        return $videos;
    }

    /*
     * 检测下级目录
     * @parm 上一级id int
     *       
     */

    function getTwoCat($id) {
        $twoId = $this->VideoCat->field("id")
                ->where("isopen='1' and pid='$id'")
                ->select();

        foreach ($twoId as $val) {
            if (is_array($val)) {
                $id.= "','" . $val['id'];
            }
        }
        return $id;
    }

}
