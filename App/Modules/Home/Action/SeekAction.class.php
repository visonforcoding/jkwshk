<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-17 14:21:07 by 曹轩铭 , 280046197@qq.com
 * For          :   搜索控制器
 */
class SeekAction extends Action {
    /*
     * 主搜索页面
     */

    protected $key;
    protected $Video;
    protected $VideoCat;
    protected $Photo;
    protected $News;

    function __construct() {
        parent::__construct();
        $this->key = I('keywords');
        $this->Video = D("Video");
        $this->VideoCat = D("VideoCat");
        $this->Photo = D("Picture");
        $this->News = D("News");
    }

    /*
     * 公共搜索页
     * 所有数据从其他搜索页面调用过来
     * 应广大群众要求，该控制器这样写，建议一个月到两个月之后进行重新！分权重进行查询coreseek
     */

    Public function Index() {
        //图片搜索结果已直接传入模板没有返回值
        $type = I('type');
        if ($type != 'all' && !empty($type)) {
            $this->redirect('Seek/' . $type . 'seek', array('keywords' =>$this->key));
            return;
        }
        $pic = $this->PictureSeek(6);
        //新闻资讯搜索结果
        $news = $this->NewsSeek(10);
        //视频
        $video = $this->VideoSeek(6);
        //视频专辑
        $videocat = $this->VideoCatSeek(8);
        if(empty($pic)&&empty($news)&&empty($video)&&empty($videocat)){
            $this->assign('empty',true);
        }
        //热门数据
        $this->getHotDate();
        $this->display();
    }

    /*
     * 图片搜索页
     */

    Public function PictureSeek($limitIn = null) {
        $this->getHotDate();
        if (!empty($limitIn)) {
            $PicResult = $this->Photo->field("id,name,keywords,topimg")
                    ->where("isopen='1' and (name like '%$this->key"
                            . "%' or description like '%$this->key%') ")
                    ->limit($limitIn)
                    ->order("time desc")
                    ->select();
            $this->assign('PicResult', $PicResult);
            return $PicResult;
        } else {
            //导入分页类
            import('ORG.Util.Page2');
            $limit = 30;
            //计算总数
            $Count = $this->Photo->where("isopen='1' and (name like '%$this->key%"
                            . "%' or description like '%$this->key%') ")
                    ->count();
            $Page = new Page2($Count, $limit, 3);
            //查询列表
            $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
            $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
            $show = $Page->pageShow();
            $PicResult = $this->Photo->field("id,name,keywords,topimg")
                    ->where("isopen='1' and (name like '%$this->key%"
                            . "%' or description like '%$this->key%') ")
                    ->limit($Page->limit)
                    ->order("time desc")
                    ->select();
            if ($PicResult === NULL) {
                $msg = "您所搜的结果不存在请更换关键词再进行搜索";
            }
            $this->assign(array(
                'show' => $show,
                'PicResult' => $PicResult,
                'msg' => $msg
            ));

            $this->display();
        }
    }

    /*
     * 文字搜索
     */
    Public function NewsSeek($limitIn = NULL) {
        $this->getHotDate();
        if (!empty($limitIn)) {
            $newsResult = $this->News->table("db_news dn")
                    ->field("id,title,keywords,time")
                    ->join("db_news_info ni on ni.aid =dn.id")
                    ->where("(dn.title like '%$this->key%' or description "
                            . "like '%$this->key%'  or ni.xinwen like'%$this->key%') "
                            . "and isopen='1'")
                    ->limit($limitIn)
                    ->order("time desc")
                    ->select();

            $this->assign('newsResult', $newsResult);
            return $newsResult;
        } else {
            //导入分页类

            import('ORG.Util.Page2');
            $limit = 60;
            //计算总数
            $Count = $this->News->table("db_news dn")->join("db_news_info ni on ni.aid =dn.id")
                    ->where("(dn.title like '%$this->key%' or description "
                            . "like '%$this->key%'  or ni.xinwen like'%$this->key%') "
                            . "and isopen='1'")
                    ->count();
            $Page = new Page2($Count, $limit, 3);
            //查询列表
            $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
            $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
            $show = $Page->pageShow();
            $NewsResult = $this->News->table("db_news dn")->field("id,title,keywords,time")
                    ->join("db_news_info ni on ni.aid =dn.id")
                    ->where("(dn.title like '%$this->key%' or description "
                            . "like '%$this->key%'  or ni.xinwen like'%$this->key%') "
                            . "and isopen='1'")
                    ->limit($Page->limit)
                    ->order("time desc")
                    ->select();
            if ($NewsResult === NULL) {
                $msg = "您所搜的结果不存在请更换关键词再进行搜索";
            }
            $this->assign(array(
                'show' => $show,
                'NewsResult' => $NewsResult,
                'msg' => $msg
            ));
            $this->display();
        }
    }

    /*
     * 文字专辑搜索
     */

    Public function NewsCatSeek() {
        
    }

    /*
     * 视频搜索
     */

    Public function VideoSeek($limitIn = NULL) {
        $this->getHotDate();
        if (!empty($limitIn)) {
            $videoResult = $this->Video->field("id,title,description,photo")
                    ->where("(title like'%$this->key%' or description like"
                            . "'%$this->key%' or content like '%$this->key%')"
                            . "and isopen='1'  ")
                    ->limit($limitIn)
                    ->order("addtime")
                    ->select();
            $this->assign('videoResult', $videoResult);
            return $videoResult;
        } else {
            //导入分页类
            import('ORG.Util.Page2');
            $limit = 21;
            //计算总数
            $Count = $this->Video->where("(title like'%$this->key%' or description like"
                            . "'%$this->key%' or content like '%$this->key%')"
                            . "and isopen='1'  ")
                    ->count();
            $Page = new Page2($Count, $limit, 3);
            //查询列表

            $videoResult = $this->Video->field("id,title,description,photo")
                    ->where("(title like'%$this->key%' or description like"
                            . "'%$this->key%' or content like '%$this->key%')"
                            . "and isopen='1'  ")
                    ->limit($Page->limit)
                    ->order("addtime desc")
                    ->select();
            $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
            $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
            $show = $Page->pageShow();
            if ($videoResult === NULL) {
                $msg = "您所搜的结果不存在请更换关键词再进行搜索";
            }
            $this->assign(array(
                'show' => $show,
                'videoResult' => $videoResult,
                'msg' => $msg
            ));
            $this->display();
        }
    }

    /*
     * 视频专辑搜索
     */

    Public function VideoCatSeek($limitIn = NULL) {
        $this->getHotDate();
        if (!empty($limitIn)) {
            $videoCatResult = $this->VideoCat->field('id,name,keywords,coverimage')
                    ->where(" (name like'%$this->key%'"
                            . " or description like '%$this->key%') and "
                            . "zhuanjino='1'")
                    ->limit($limitIn)
                    ->select();
            $this->assign('videoCatResult', $videoCatResult);
            return $videoCatResult;
        } else {
            //导入分页类
            import('ORG.Util.Page2');
            $limit = 30;
            //计算总数
            $Count = $this->VideoCat->where(" (name like'%$this->key%'"
                            . " or description like '%$this->key%') and "
                            . "zhuanjino='1'")
                    ->count();
            $Page = new Page2($Count, $limit, 3);
            //查询列表
            $videoCatResult = $this->VideoCat->field('id,name,keywords,coverimage')
                    ->where(" (name like'%$this->key%'"
                            . " or description like '%$this->key%') and "
                            . "zhuanjino='1'")
                    ->limit($Page->firstRow . ',' . $Page->listRows)
                    ->order("updatetime desc")
                    ->select();
            $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
            $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
            $show = $Page->pageShow();
            if ($videoCatResult === NULL) {
                $msg = "您所搜的结果不存在请更换关键词再进行搜索";
            }
            $this->assign(array(
                'show' => $show,
                'VideoCatResult' => $videoCatResult,
                'msg' => $msg
            ));
            $this->display();
        }
    }

    /*
     * 获取公共热门数据
     */

    Public function getHotDate() {
        //热门资讯
        /* 热门图片 */
        $hotPicMob = D("Picture");
        $hotPic = $hotPicMob->getHotPicRank(4);
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
            'day' => $dayNewsList,
            'week' => $weekNewsList,
            'hotVideo' => $hotVideo,
            'hotPic' => $hotPic,
            'keyword' => $this->key,
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
        if (!empty($ids)) {
            $map['id'] = array('not in', $ids);
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
