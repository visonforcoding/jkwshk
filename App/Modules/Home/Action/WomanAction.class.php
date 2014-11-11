<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-2 12:20:38 by 曹轩铭 , 280046197@qq.com
 * For          :   女性专栏
 */
class WomanAction extends PublicAction {
    /* 每个栏目ID */


    function index() {
        $typename = "女性"; //完全可以修改成传参加载不同的CSS
        $VideoMob = D("Video");
        $VideoTypeMob = M("video_type");
        $typeid = $VideoTypeMob->field("id")
                ->where("name='$typename' AND isopen='1'")
                ->find();
        $typeid = $typeid['id'];
        /*
         * 专栏的getVideo使用方法
         * getVideo(取出个数(int)，随便填入一个值，该专栏属于的Type(int)，"zhuanlan")
         * 
         */
        //顶部轮播
        $FocusCat = D('focus_cat');
        $Focus = D('focus');
        $focusCat = $FocusCat->where("name = '女性'")->find();
        $focusCatId = $focusCat['id'];
        $focus = $Focus->where("cid like '%$focusCatId%' and status = '1'")
                ->order('level desc')
                ->limit(5)
                ->select();
        $this->assign('focus',$focus);

        /* 推荐视频 */
        $recommendVideo = $VideoMob->getTypeVideo($typeid,4);  
        /* 资讯 */
        $nMob = D("News");
        $picNews = $nMob->where("type like '%$typeid%' and litpic != '' and isopen = '1'")
                ->order('time desc')
                ->find();
        $this->assign('picNews',$picNews);
        $picNewsId = $picNews['id'];
        $newsList = $nMob->where("type like '%$typeid%'and isopen = '1' and id != '$picNewsId'")
                ->limit(8)
                ->select();

        /* 图片 */
        $pMob = D("Picture");
        $picList = $pMob->getTypePic($typeid, 7);
        /* 视频 */
        $videoList = $VideoMob->getTypeVideo($typeid,6);
        /* 文字专题  未做 */

        /* 专辑 */
        $VideoCatMob = D("VideoCat");
        $videoCatList = $VideoCatMob->getCatVideo(8, $typeid);
        /* 热门数据 */
        $this->getHotRank($typeid);

        $this->assign(array(
            'recommendVideo' => $recommendVideo,
            'newsList' => $newsList,
            'picList' => $picList,
            'videoList' => $videoList,
            'videoCatList' => $videoCatList
        ));

        $this->display();
    }

    /*
     * 根据传过来的类型取值：如：VIDEO、NEWS等等
     */
    function Womanlist() {
        $table = I("category");
        //缺失捕获你未使用的表名字，返回客户一个404页面
        $order = "time desc";
        switch ($table) {
            case "new":
                $M = "News";
                $limit = 20;
                $title = "资讯";
                $field = array('id', 'title' => 'name', 'keywords', 'description', 'time', 'source', 'writer');
                break;
            case "pic":
                $M = "Picture";
                $limit = 12;
                $title = "图片";
                $field = array('id', 'name', 'keywords', 'description', 'topimg' => 'img');
                break;
            case "video":
                $M = "Video";
                $limit = 12;
                $title = "视频";
                $order = "addtime desc";
                $field = array('id', 'title' => 'name', 'keywords', 'description', 'photo' => 'img');
                break;
            case "newcat":
                $M = "";
                echo "还没制作";
                exit; //文字专辑
                $limit = 16;
                break;
            case "videocat":
                $M = "VideoCat";
                $limit = 16;
                $title = "专辑";
                $order = "updatetime desc";
                $field = array('id', 'name', 'keywords', 'description', 'coverimage' => 'img');
                break;
            default:
                echo "未找到您想浏览的页面";
                echo "<script type='text/javascript'>window.location:www.baidu.com</script>";
                exit;
                break;
        }
        $typename = "女性";
        $VideoTypeMob = M("video_type");
        $typeid = $VideoTypeMob->field("id")
                ->where("name='$typename' AND isopen='1'")
                ->find();
        $typeid = $typeid['id'];
        $where = "type like'%$typeid%' AND isopen='1'";
        import('ORG.Util.Page2');
        $nMob = D("$M");
        $Count = $nMob->where("$where")
                ->count();
        $Page = new Page2($Count, $limit,3);
        $manList = $nMob->field($field)
                ->where("$where")
                ->order("$order")//按最新添加的新闻进行排序
                ->limit($Page->limit)
                ->select();
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $show = $Page->pageShow();
        $this->getHotRank($typeid);


        $this->assign(array(
            'show' => $show,
            'manList' => $manList,
            'title' => $title,
        ));
        switch ($M) {
            case 'News':
                $this->display("Woman/News");
                break;
            case 'Picture':
                $this->display("Woman/Picture");
                break;
            case 'Video':
                $this->display("Woman/Video");
                break;
            case 'Newscat':
                $this->display("Woman/Newscat");
                break;
            case 'VideoCat':
                $this->display("Woman/Videocat");
                break;
        }
    }
    /*
     * 公共方法查询几个热门的列表 
     *  
     */
    public function getHotRank() {
        /* 热门图片 */
        $hotPicMob = D("Picture");
        $hotPic = $hotPicMob->getHotPicRank(4);
        /* 热门资讯 */
        $hotNewsMob = D("News");
        $hotNews = $hotNewsMob->newsRank(10);
        /* 热门视频 */
        $hotVideoMob = D("Video");
        $hotVideo = $hotVideoMob->getHotVideos(8);

        /* 日热门点击文章 */
        $today = date('Y-m-d');
        $today = strtotime($today);
        $News_hits = D('news_hits');  //实例化picture_hits
        $dayNews = $News_hits->field('newsid,title')
                ->join("db_news ON db_news.id = db_news_hits.newsid")
                ->where("db_news_hits.time = '$today'")
                ->order('db_news_hits.hits desc')
                ->limit(10)
                ->select();
        $dayNewsIds = array();
        if(empty($dayNews)){
            $dayNews = array();
        }
        foreach ($dayNews as $value) {
            $dayNewsIds[] = $value['newsid'];
        }
        $dayNum = count($dayNews);
        $dayRestNews = $this->getRestNews($dayNum, $dayNewsIds);
        if (empty($dayNews)) {
            $dayNews = array();
        }
        $dayNewsList = array_merge($dayNews, $dayRestNews);
        
        //取出周排行数据
        $weekNews = $News_hits->field('newsid,title,sum(db_news_hits.hits)')
                ->join("db_news ON db_news.id = db_news_hits.newsid")
                ->where("week(from_unixtime(db_news_hits.time))=week(now())")
                ->group('db_news_hits.newsid')
                ->order('sum(db_news_hits.hits) desc')
                ->limit(10)
                ->select();
        $weekNewsIds = array();
        if(empty($weekNews)){
            $weekNews = array();
        }
        foreach ($weekNews as $value) {
            $weekNewsIds[] = $value['newsid'];
        }
        $weekNum = count($weekNews);
        $weekRestNews = $this->getRestNews($weekNum, $weekNewsIds);
        if (empty($weekNews)) {
            $weekNews = array();
        }
        $weekNewsList = array_merge($weekNews, $weekRestNews);
        
        $this->assign(array(
            'hotPic' => $hotPic,
            'hotNews' => $hotNews,
            'hotVideo' => $hotVideo,
            'dayNews' => $dayNewsList,
            'weekNews' => $weekNewsList
        ));
    }

    /**
     * 根据日、周、月排行数量取出剩下行数新闻数据
     * @param int $num 需要的总数量
     * @param int $total
     * @return array 
     */
    public function getRestNews($num, $ids, $total = 10) {
        $limit = (int) ($total - $num);
        $News = D('News');
        if(!empty($ids)){
        $map['id'] = array('not in', $ids);
        }else{
            $map = '';
        }
        $restNews = $News->field('id as newsid,title')
                ->where($map)
                ->order('time desc')
                ->limit(0, $limit)
                ->select();
        if (empty($restNews)) {
            $restNews = array();
        }
        return $restNews;
    }

}
