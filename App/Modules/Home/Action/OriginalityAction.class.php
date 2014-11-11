<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-4-14 16:16:32 by 曹轩铭 , 280046197@qq.com
 *For          :   创意短片
*/
class OriginalityAction extends PublicAction{
    /*
     * 创意短片
     */
    protected $Video;
    protected $VideoCat;
    public  function __construct() {
        parent::__construct();
        $this->Video = D("Video");
        $this->VideoCat = D("VideoCat");
        
    }
    public function index(){
        
        //焦点图
        $cydpCatId = $this->VideoCat->getVideoCatId("创意短片");
        $focus = $this->Video->getCatAllVideos($cydpCatId,5);
        $this->assign('focus',$focus);
        //节目宣传片
        $programCatId = $this->VideoCat->getVideoCatId("节目宣传片");
        $programVIdeo = $this->Video->getCatAllVideos($programCatId,8);
        
        //公益短片
        $commonWealCatId = $this->VideoCat->getVideoCatId("创意公益短片");
        $commonWealVIdeo = $this->Video->getCatAllVideos($commonWealCatId,8);
        //广告短片
        $advertiseMentCatId = $this->VideoCat->getVideoCatId("创意广告短片");
        $advertiseMentVIdeo = $this->Video->getCatAllVideos($advertiseMentCatId,8);
        //搞笑短片
        $funnyCatId = $this->VideoCat->getVideoCatId("创意搞笑短片");
        $funnyVIdeo = $this->Video->getCatAllVideos($funnyCatId,8);
        //创意小短片
        $cyxdpCatId = $this->VideoCat->getVideoCatId("创意小短片");
        $cyxdpVIdeo = $this->Video->getCatAllVideos($cyxdpCatId,8);
        //卫视宣传片
        $TvCatId = $this->VideoCat->getVideoCatId("健康卫视宣传片");
        $TvVideo = $this->Video->getCatAllVideos($TvCatId,8);
        //热门排行
        $hotVideo = $this->Video->getCatAllVideos($cydpCatId,5,'hits');
        //视点推荐
        $picMob  = D("Picture");
        $hotPic  = $picMob->getHotPicRank();
        
        //热门资讯
        $newsMob = D("News");
        $hotNews = $newsMob->newsRank();
        
        $this->assign(array(
            'hotNews'=>$hotNews,
            'hotPic'=>$hotPic,
            'hotVideo'=>$hotVideo,
            'TvVideo'=>$TvVideo,
            'funnyVIdeo'=>$funnyVIdeo,
            'cyxdpVIdeo'=>$cyxdpVIdeo,
            'advertiseMentVIdeo'=>$advertiseMentVIdeo,
            'programVIdeo'=>$programVIdeo,
            'TvCatId'=>$TvCatId,
            'funnyCatId'=>$funnyCatId,
            'advertiseMentCatId'=>$advertiseMentCatId,
            'commonWealVIdeo'=>$commonWealVIdeo,
            'programVIdeo'=>$programVIdeo,
            'cyxdpCatId'=>$cyxdpCatId,
        ));
        $this->display();
    }
    /*
     * 列表页
     */
    Public function cateList(){
        $cateCid = I('cid');

        import('ORG.Util.Page2');
        $programCatId = $this->VideoCat->getVideoCatId("节目宣传片");
        $commonWealCatId = $this->VideoCat->getVideoCatId("创意公益短片");
        $advertiseMentCatId = $this->VideoCat->getVideoCatId("创意广告短片");
        $funnyCatId = $this->VideoCat->getVideoCatId("创意搞笑短片");
        $TvCatId = $this->VideoCat->geTvideoCatId("健康卫视宣传片");
        $cyxdpCatId = $this->VideoCat->geTvideoCatId("创意小短片");
        //所属类别
        $catName = $this->VideoCat->getChannel($cateCid);
        $conti   = I('criteria');
        $order = "addtime desc";
        if(!empty($conti)){
            $this->assign('hotflag',$conti);
            $order = "hits desc";
        }
        $Map = "isopen='1' and pid IN('$cateCid')";
        $Count      =  $this->Video->where("$Map")->count();
        $Page = new Page2($Count,24,3); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $show = $Page->pageShow();
        $videoList  = $this->Video
                    ->field("id,title,keywords,description,photo,hits,addtime")
                    ->where("$Map")
                    ->order($order)//按最新添加的新闻进行排序
                    ->limit($Page->limit)
                    ->select();
        $this->assign(array(
            'show'=>$show,
            'videoList'=>$videoList,
            'cid'=>$cateCid,
            'catName'=>$catName,
            'TvCatId'=>$TvCatId,
            'funnyCatId'=>$funnyCatId,
            'cyxdpCatId'=>$cyxdpCatId,
            'advertiseMentCatId'=>$advertiseMentCatId,
            'commonWealCatId'=>$commonWealCatId,
            'programCatId'=>$programCatId,
        ));
        $this->display();
    }
}