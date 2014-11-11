<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-12 11:13:18 by 颜学慧 , 2335867854@qq.com   
 * For          :   营养师专栏 
 */
class DietitiansAction extends PublicAction {

    public function __construct() {
        parent::__construct();
        $this->commondata();
    }

    //营养师列表页
    public function index() {
        //实例化 dietitians表
        $mob = new Model("dietitians");
        //取出总数,进行分页
        $area = I('area');
        if(!empty($area)){
            $num = $mob->where("city = '$area'")->count();
        }else{
            $num = $mob->count();
        }

        import("ORG.Util.Page2");
        $pageOb = new Page2($num, 20, 3);

        $pageOb->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $pageOb->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $pageStr = $pageOb->pageShow();
        $pageOb->pageType = '%down%';
        $pageStr1 = $pageOb->pageShow();
        if(!empty($area)){
        $arr = $mob->where("city = '$area'")->order("addtime asc")->limit($pageOb->limit)->select();
        }else{
        $arr = $mob->order("addtime asc")->limit($pageOb->limit)->select();
        }
        $areas = $mob->table('db_dietitians d')
                ->field('d.city,a.area_name ')
                ->join('db_areas a on a.area_id = d.city')
                ->where("d.city != '0'")
                ->group('d.city')
                ->select();
        $this->assign('areas',$areas);
        $this->assign("num", $num);
        $this->assign("arr", $arr);
        $this->assign("page", $pageStr);
        $this->assign("page1", $pageStr1);
        $this->display();
    }

    //营养师内容页
    public function dietitian() {
        //接收对应的ID值
        $id = (int) $_GET['id'];
        //实例化 dietitians表,读取营养师表
        $Dietitians = new Model("dietitians");
        $arr = $Dietitians->where("id=$id")->find();
        if (!$arr) {
            $this->_empty();
            return;
        }
        // 更改营养师的host点击值
        $Dietitians->where("id=$id")->setInc('hits', 1);
        //实例化 die_article表,读取营养师文章表
        //相关文章
        $mob = new Model("die_article");
        $re = $mob->where("pid=$id")->limit(4)->select();

        $this->assign("arr", $arr);
        $this->assign("re", $re);
        $this->assign("pid", $id);
        //热门资讯
        $hotNewsMob = D("News");
        $hotNews = $hotNewsMob->newsRank(10);
        //热门图片
        $hotPicMob = D("Picture");
        $hotPic = $hotPicMob->getHotPicRank(4);
        //公共数据
        $this->commondata();
            //评论区域开始
        $this->showComment($id,'营养师');
        $this->assign(array(
            'hotNews' => $hotNews,
            'hotPic' => $hotPic
        ));
        $this->display();
    }

    //营养师文章列表页
    public function newsList() {

        //接收对应的pid值
        $id = (int) $_GET['id'];
        //实例化 dietitians表,读取营养师表
        //实例化 die_article表,读取营养师文章表
        $Article = new Model("die_article");

        //取出总数,进行分页
        $num = $Article->where("pid=$id")->count();
        import("ORG.Util.Page2");
        $pageOb = new Page2($num, 20, 3);

        $pageOb->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $pageOb->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $pageStr = $pageOb->pageShow();

        $arr = $Article->where("pid=$id")
                ->table('db_die_article a')
                ->join('db_dietitians b on a.pid=b.id')
                ->limit($pageOb->limit)
                ->order("a.id desc")
                ->select();
        $name = $arr[0]['name'];

        //营养师视频
        $Video = D('Video');
        $VideoType = new VideoTypeModel();
        $dietitianType = $VideoType->getTypeId('营养师');
        $dietitianVideo = $Video->where("type like '%$dietitianType%'")
                ->order('rand()')
                ->limit(4)
                ->select();
        $this->assign('dietitianVideo', $dietitianVideo);
        $this->assign("arr", $arr);
        $this->assign("page", $pageStr);

        $this->assign("name", $name);

        //热门资讯
        $hotNewsMob = D("News");
        $hotNews = $hotNewsMob->newsRank(10);
        //热门图片
        $hotPicMob = D("Picture");
        $hotPic = $hotPicMob->getHotPicRank(4);
    

        $this->commondata();
        $this->assign(array(
            'hotNews' => $hotNews,
            'hotPic' => $hotPic
        ));
        $this->display();
    }

    //营养师文章内容页
    public function news() {

        //接收对应的pid值
        $id = (int) $_GET['id'];
        //实例化 dietitians表,读取营养师表
        //实例化 die_article表,读取营养师文章表
        $mob = new Model("die_article");
        $article = $mob->table('db_die_article a')
                ->field("a.id,a.addtime,a.info,a.tagid,a.description,a.title,b.name,a.pid")
                ->join('db_dietitians b on a.pid=b.id')
                ->where("a.id=$id")
                ->find();
        $tagid = $article['tagid'];
        $tagArr = explode(',', $tagid);
        $tagArr = empty($tagArr) ? array() : $tagArr;
        $tags = array();
        foreach ($tagArr as $v) {
            $tagArray = explode('|', $v);
            if (count($tagArray) > 1) {
                $tags[] = $tagArray[1];
            }
        }
        $article['tagidF'] = $tags;
        if (!$article) {
            $this->_empty();
            return;
        }
        $this->assign("article", $article);
        // 更改营养师的host点击值
        $mob->where("pid=$id")->setInc('hits', 1);

       //相关文章
        $pid = $article['pid'];
        $this->assign('pid',$pid);
        $relateArticle = $mob->where("pid=$pid and id != $id")->limit(4)->select();
        $relateArticle = empty($relateArticle)?array():$relateArticle;
        foreach($tags as $value){
            $relateArticleByTag = $mob->where("tagid like '%$value%' and id !=$id")->limit(5)->select();
        }
        $relateArticle = array_merge($relateArticle,$relateArticleByTag);
        $this->assign('re',$relateArticle);
        //热门资讯
        $hotNewsMob = D("News");
        $hotNews = $hotNewsMob->newsRank(10);
        //热门图片
        $hotPicMob = D("Picture");
        $hotPic = $hotPicMob->getHotPicRank(4);
        $this->assign(array(
            'hotNews' => $hotNews,
            'hotPic' => $hotPic
        ));
        $this->display();
    }

    /**
     * 公用数据
     */
    protected function commondata() {
        $Dietitians = new Model('dietitians');
        $topDietitians = $Dietitians->order("hits desc")->limit(10)->select();
        foreach ($topDietitians as $key => $value) {
            $info = strip_tags($value['info']);
            $pos = strripos($info, ';');
            $infoF = mb_substr($info, 0, $pos, 'utf8');
            $topDietitians[$key]['infoF'] = $infoF;
        }
        //热门专辑
        $VideoCatMob = D("VideoCat");
        $videoCatList = $VideoCatMob->getHotAlbum(4);

        //营养师视频
        $Video = D('Video');
        $VideoType = new VideoTypeModel();
        $dietitianType = $VideoType->getTypeId('营养师');
        $dietitianVideo = $Video->where("type like '%$dietitianType%'")
                ->order('rand()')
                ->limit(4)
                ->select();
        $this->assign("re1", $topDietitians);
        $this->assign(array(
            'videoCatList' => $videoCatList,
            'dietitianVideo' => $dietitianVideo
        ));
    }

}
