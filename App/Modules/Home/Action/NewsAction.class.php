<?php

// +----------------------------------------------------------------------
// | TOPThink [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://topthink.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 曹文鹏 <caowenpeng1990@126.com>
// +----------------------------------------------------------------------
// 

class NewsAction extends PublicAction {

    protected $news;  //实例化news 新闻模型

    function __construct() {
        parent::__construct();
        $this->news = D('News');
    }

    public function index() {

        $NewsCat = D('NewsCat');
        //健康要闻 首页
        $hotNews = $this->news->newsRank();
        $this->assign('hotNews', $hotNews);

        $picNews = $this->news->field('id,title,litpic')
                ->where("litpic != ''and isopen = '1'")
                ->order('time desc')
                ->limit(5)
                ->select();

        //有图片的权威发布新闻
        $authorCatId = $NewsCat->getNewsCatId('权威发布');
        $authoriPicNews = $this->news->getCatPicNews($authorCatId);
        $authorPicIds = $this->getPicsIds($authoriPicNews);
        //取出未被取出的新闻
        $authoriNews = $this->news->getCatRestNews($authorCatId, $authorPicIds); //权威发布新闻
        //
        //曝光新闻
        $exposeCatId = $NewsCat->getNewsCatId('曝光');
        $exposePicNews = $this->news->getCatPicNews($exposeCatId);
        $exposePicIds = $this->getPicsIds($exposePicNews);
        $exposeNews = $this->news->getCatRestNews($exposeCatId, $exposePicIds);

        //外媒新闻
        $lovCatId = $NewsCat->getNewsCatId('外媒');
        $lovPicNews = $this->news->getCatPicNews($lovCatId);
        $lovPicIds = $this->getPicsIds($lovPicNews);
        $lovNews = $this->news->getCatRestNews($lovCatId, $lovPicIds);

        //健康新知
        $xinzhiCatId = $NewsCat->getNewsCatId('健康新知');
        $xinzhiPicNews = $this->news->getCatPicNews($xinzhiCatId);
        $xinzhiPicIds = $this->getPicsIds($xinzhiPicNews);
        $xinzhiNews = $this->news->getCatRestNews($xinzhiCatId, $xinzhiPicIds);

        //健康百态
        $baitaiCatId = $NewsCat->getNewsCatId('健康百态');
        $baitaiPicNews = $this->news->getCatPicNews($baitaiCatId);
        $baitaiPicIds = $this->getPicsIds($baitaiPicNews);
        $baitaiNews = $this->news->getCatRestNews($baitaiCatId, $baitaiPicIds);

        //微博健闻
        $weiboCatId = $NewsCat->getNewsCatId('微博健闻');
        $weiboPicNews = $this->news->getCatPicNews($weiboCatId);
        $weiboPicIds = $this->getPicsIds($weiboPicNews);
        $weiboNews = $this->news->getCatRestNews($weiboCatId, $weiboPicIds);

        //网友健闻
        $wangyouCatId = $NewsCat->getNewsCatId('网友健闻');
        $wangyouPicNews = $this->news->getCatPicNews($wangyouCatId);
        $wangyouPicIds = $this->getPicsIds($wangyouPicNews);
        $wangyouNews = $this->news->getCatRestNews($wangyouCatId, $wangyouPicIds);

        //公益健闻
        $gongyiCatId = $NewsCat->getNewsCatId('公益');
        $gongyiPicNews = $this->news->getCatPicNews($gongyiCatId);
        $gongyiPicIds = $this->getPicsIds($gongyiPicNews);
        $gongyiNews = $this->news->getCatRestNews($gongyiCatId, $gongyiPicIds);

        //产业动态
        $chanyeCatId = $NewsCat->getNewsCatId('产业动态');
        $chanyePicNews = $this->news->getCatPicNews($chanyeCatId);
        $chanyePicIds = $this->getPicsIds($chanyePicNews);
        $chanyeNews = $this->news->getCatRestNews($chanyeCatId, $chanyePicIds);

        //医院新闻
        $hospitalCatId = $NewsCat->getNewsCatId('医院新闻');
        $hospitalPicNews = $this->news->getCatPicNews($hospitalCatId, 1);
        $hospitalPicIds = $this->getPicsIds($hospitalPicNews);
        $hospitalNews = $this->news->getCatRestNews($hospitalCatId, $hospitalPicIds);
        if (empty($hospitalNews)) {
            $hospitalNews = array();
        }
        //截短字符串
        foreach ($hospitalNews as $key => $value) {
            $hospNewsDesc = $value['description'];
            $hospNewsDesc = mb_substr($hospNewsDesc, 0, 20, 'utf-8'); //加上编码防止乱码等错误
            $hospitalNews[$key]['description'] = $hospNewsDesc;
        }
        //热门数据
        $this->getHotdate();
        //最新新闻
        $timeNews = $this->news->getTimeRank();

        $this->assign('picNews', $picNews);
        $this->assign('exposePicNews', $exposePicNews);
        $this->assign('lovPicNews', $lovPicNews);  //外媒
        $this->assign('baitaiPicNews', $baitaiPicNews);  //外媒
        $this->assign('authorPicNews', $authoriPicNews);
        $this->assign('xinzhiPicNews', $xinzhiPicNews);
        $this->assign('baitaiPicNews', $baitaiPicNews);
        $this->assign('weiboPicNews', $weiboPicNews);
        $this->assign('wangyouPicNews', $wangyouPicNews);
        $this->assign('gongyiPicNews', $gongyiPicNews);
        $this->assign('chanyePicNews', $chanyePicNews);
        $this->assign(array(
            'authorCatId' => $authorCatId,
            'exposeCatId' => $exposeCatId,
            'lovCatId' => $lovCatId,
            'xinzhiCatId' => $xinzhiCatId,
            'baitaiCatId' => $baitaiCatId,
            'weiboCatId' => $wangyouCatId,
            'wangyouCatId' => $wangyouCatId,
            'gongyiCatId' => $gongyiCatId,
            'chanyeCatId' => $chanyeCatId,
            'hospitalCatId' => $hospitalCatId,
        ));
        $this->assign('timeNews', $timeNews);

        $this->assign('lovNews', $lovNews);
        $this->assign('xinzhiNews', $xinzhiNews);
        $this->assign('baitaiNews', $baitaiNews);
        $this->assign('weiboNews', $weiboNews);
        $this->assign('wangyouNews', $wangyouNews);
        $this->assign('gongyiNews', $gongyiNews);
        $this->assign('chanyeNews', $chanyeNews);
        $this->assign('hospitalNews', $hospitalNews);
        $this->assign('exposeNews', $exposeNews);
        $this->assign('authoriNews', $authoriNews);
        $this->display();
    }

    public function category() {
        $catId = I('cid'); //健康新闻类别ID
        import("ORG.Util.Page2");
        //热门数据
        $this->getHotdate();
        //导航条数据传入
        $this->getNewsCat();
        $News_cat = M('news_cat');
        $category = $News_cat->field('name')
                ->where("id='$catId'")
                ->find(); //类别名
        if (!$category) {
            $this->_empty();
            return;
        }
        $catNewsCount = $this->news
                ->where("pid = '$catId' and isopen = '1'")
                ->count(); //所属类别新闻

        $Page = new Page2($catNewsCount, 25, 3); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $show = $Page->pageShow();
        $catNews = $this->news->field('id,title,time')
                ->where("pid = '$catId' and isopen = '1'")
                ->order('time desc')
                ->limit($Page->limit)
                ->select();
        $this->assign('catNews', $catNews);
        $this->assign('pagination', $show);
        $this->assign('category', $category);
        $this->display();
    }

    public function view() {
        //健康要闻详细页
        $newsId = I('id');
        $curNews = $this->news->field('id,title,info,writer,source,time,description,tagid')
                        ->where("id='$newsId'")->find();  //当前单个新闻
        if (!$curNews) {
            $this->_empty();
            return;
        }
        //更新浏览量
        $this->news->where("id = '$newsId'")->setInc('click');

        //更新单日点击量
        $today = date("Y-m-d", time());
        $today = strtotime($today);
        $News_hits = D('news_hits');
        $ckHits = $News_hits
                ->where("newsid = '$newsId'and time='$today'")
                ->find();
        if (!$ckHits) {
            $newHitsData['newsid'] = $newsId;
            $newHitsData['time'] = $today;
            $newHitsData['hits'] = 1;
            $News_hits->add($newHitsData);
        } else {
            //判断如果已经存在点击就是更新
            $News_hits->where("newsid = '$newsId'")
                    ->setInc('hits'); //字段加1
        }
        //热门图片
        $Photo = D('Picture');
        $hotPic = $Photo->getHotPicRank(4);

        //分割图片tag 获取标签信息
        $tagList = $curNews['tagid'];
        $tagListArr = explode(',', $tagList);
        $newTagList = array();
        $tagnameArr = array();
        foreach ($tagListArr as $key => $value) {
            $newTagListArr = explode('|', $value);
            $newTagList[$key]['tagid'] = trim($newTagListArr[0]);
            $newTagList[$key]['tagname'] = trim($newTagListArr[1]);
            $tagnameArr[] = '%' . trim($newTagListArr[1]) . '%';  //获取tagname数组 用户取出猜你喜欢sql拼接
        }

        //猜你喜欢栏目 根据tag获取数据
        $loveNewsList = array();
        $where['isopen'] = array('eq', 1);
        $where['id'] = array('neq', $newsId);
        $where['tagid'] = array('like', $tagnameArr, 'OR');
        $where['_logic'] = 'AND';
        $map['_complex'] = $where;
        $loveNewsList = $this->news->field('id,title,time')
                ->where($map)
                ->order('time desc')
                ->limit(5)
                ->select();  //取出除开本条的最新发布的5条有相同tagname的图集数据
        //热门数据
        $this->getHotdate();

        $hotNews = $this->news->newsRank(10);  //热度新闻
        $this->assign('hotNews', $hotNews);
        //评论开始
        $this->showComment($newsId, '新闻');
        $this->assign('newTagList', $newTagList);
        $this->assign('loveNewsList', $loveNewsList);
        $this->assign('hotPic', $hotPic);
        $this->assign('curNews', $curNews);
        $this->display();
    }

    /**
     * 取出被选出的图片新闻集的id
     * @param array $picNews
     * @return array 含图片的id数组
     */
    public function getPicsIds($picNews) {
        $picIds = array();
        foreach ($picNews as $value) {
            $picIds[] = $value['id'];
        }
        return $picIds;
    }

    /*
     * 获取健康要闻种类
     * return array
     */

    public function getNewsCat() {
        $nMob = D("NewsCat");
        $jkywOneCId = $nMob->getNewsCatId("健康要闻");
        $AllId = $nMob->field("id,name")
                ->where("isopen='1' and pid='$jkywOneCId'")
                ->select();
        $this->assign('AllId', $AllId);
    }

    /*
     * 热门的图热门视频数据
     */

    public function getHotdate() {
        $Photo = D('Picture');
        $hotPics = $Photo->getHotPicRank(6);

        $VideoCat = D("VideoCat");
        $hotVideo = $VideoCat->getHotAlbum(4);
        $this->assign('hotVideo', $hotVideo);
        $this->assign('hotPic', $hotPics);
    }

    /**
     * 取得
     * @param type $rs
     * @param type $total
     * @return array
     */
    public function getRest($rs, $total = 10) {
        $ids = array();
        foreach ($rs as $value) {
            $ids[] = $value['id'];
        }
        $num = count($rs);
        $limit = (int) ($total - $num);
        if (!empty($ids)) {
            $map['id'] = array('not in', $ids);
        } else {
            $map = '';
        }
        $restPic = $this->field('id,name')
                ->where($map)
                ->order('time desc')
                ->limit(0, $limit)
                ->select();
        if (empty($restPic)) {
            $restPic = array();
        }
        return $restPic;
    }

}
