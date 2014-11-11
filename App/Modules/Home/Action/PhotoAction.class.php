<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-3-11 12:07:28 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   健康要图
 */
class PhotoAction extends PublicAction {

    protected $Photo;

    function __construct() {
        parent::__construct();
        $this->Photo = D('Picture');
        //picture 一定要大写才能实例化到自定义模型类，否则估计实例化到了基类了
    }

    /**
     * 健康要图首页
     */
    public function index() {

        //焦点图
        $focus = $this->Photo->where("property like '%p%' and isopen = '1'")
                ->order('time desc')
                ->limit(5)
                ->select();
        //取出日排行数据
        $today = date('Y-m-d');
        $today = strtotime($today);
        $Photo_hits = D('picture_hits');  //实例化picture_hits
        $dayPic = $Photo_hits->field('picid,name')
                ->join("db_picture ON db_picture.id = db_picture_hits.picid")
                ->where("db_picture_hits.time = '$today'")
                ->order('db_picture_hits.hits desc')
                ->limit(10)
                ->select();
        if (empty($dayPic)) {
            $dayPic = array();
        }
        $dayRestPic = $this->getRestPic($dayPic);
        $dayPicList = array_merge($dayPic, $dayRestPic);
        //取出周排行数据
        $weekPic = $Photo_hits->field('picid,name,sum(db_picture_hits.hits)')
                ->join("db_picture ON db_picture.id = db_picture_hits.picid")
                ->where("week(from_unixtime(db_picture_hits.time))=week(now())")
                ->group('db_picture_hits.picid')
                ->order('sum(db_picture_hits.hits) desc')
                ->limit(10)
                ->select();
        if (empty($weekPic)) {
            $weekPic = array();
        }
        $weekRestPic = $this->getRestPic($weekPic);
        $weekPicList = array_merge($weekPic, $weekRestPic);

        //取出月排行数据
        $monthPic = $Photo_hits->field('picid,name,sum(db_picture_hits.hits)')
                ->join("db_picture ON db_picture.id = db_picture_hits.picid")
                ->where("month(from_unixtime(db_picture_hits.time))=month(now())")
                ->group('db_picture_hits.picid')
                ->order('sum(db_picture_hits.hits) desc')
                ->limit(10)
                ->select();
        if (empty($monthPic)) {
            $monthPic = array();
        }
        $monthRestPic = $this->getRestPic($monthPic);
        $monthPicList = array_merge($monthPic, $monthRestPic);

        $posterPicList = $this->Photo->getCatNews('海报', 5);
        //取出新闻类图集
        $newsPicList = $this->Photo->getCatNews('新闻', 5);
        //取出时尚类图集
        $fashionPicList = $this->Photo->getCatNews('时尚', 5);
        //取出创意类图集
        $ideaPicList = $this->Photo->getCatNews('创意', 5);
        //取出风景类图集
        $sceneryPicList = $this->Photo->getCatNews('风景', 5);
        //取出美食类图集
        $foodPicList = $this->Photo->getCatNews('美食', 5);
        //取出趣图类图集
        $funnyPicList = $this->Photo->getCatNews('趣图', 5);
        //取出宠物类图集
        $petPicList = $this->Photo->getCatNews('宠物', 5);
        //取出明星类图集
        $starPicList = $this->Photo->getCatNews('明星', 5);
        //取出体育类图集
        $pePicList = $this->Photo->getCatNews('体育', 5);

        $this->assign('posterPicList', $posterPicList);
        $this->assign('fashionPicList', $fashionPicList);
        $this->assign('ideaPicList', $ideaPicList);
        $this->assign('sceneryPicList', $sceneryPicList);
        $this->assign('foodPicList', $foodPicList);
        $this->assign('funnyPicList', $funnyPicList);
        $this->assign('petPicList', $petPicList);
        $this->assign('newsPicList', $newsPicList);
        $this->assign('pePicList', $pePicList);
        $this->assign('starPicList', $starPicList);
        $this->assign('dayPicList', $dayPicList);
        $this->assign('monthPicList', $monthPicList);
        $this->assign('weekPicList', $weekPicList);
        $this->assign('focus', $focus);
        $this->getPublicData();
        $this->display();
    }

    /**
     * 取出剩余
     * @param type $rs
     * @param type $total
     * @return array
     */
    public function getRestPic($rs, $total = 10) {
        $ids = array();
        foreach ($rs as $value) {
            $ids[] = $value['picid'];
        }
        $num = count($rs);
        $limit = (int) ($total - $num);
        if (!empty($ids)) {
            $map['id'] = array('not in', $ids);
        } else {
            $map = '';
        }
        $restPic = $this->Photo->field('id as picid,name')
                ->where($map)
                ->order('time desc')
                ->limit(0, $limit)
                ->select();
        if (empty($restPic)) {
            $restPic = array();
        }
        return $restPic;
    }

    /**
     * 健康要图详细页
     */
    public function view() {
        $picId = I('id');
        $curPic = $this->Photo->field('id,name,info,time,hits,tagid')
                ->where("isopen='1'and id='$picId'")
                ->find();
        if (!$curPic) {
            $this->_empty();
            return;
        }

        $hits = $curPic['hits'];
        $hits++;
        //更新总点击量
        $updateData['hits'] = $hits;
        $this->Photo->where("id='$picId'")->save($updateData);

        //更新单日点击量
        $today = date("Y-m-d", time());
        $today = strtotime($today);
        $Photo_hits = D('picture_hits');
        $ckHits = $Photo_hits
                ->where("picid = '$picId'and time='$today'")
                ->find();
        if (!$ckHits) {
            $newHitsData['picid'] = $picId;
            $newHitsData['time'] = $today;
            $newHitsData['hits'] = 1;
            $Photo_hits->add($newHitsData);
        } else {
            //判断如果已经存在点击就是更新
            $Photo_hits->where("picid = '$picId'")
                    ->setInc('hits'); //字段加1
        }

        //分割图片tag 获取标签信息
        $tagList = $curPic['tagid'];
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
        $lovePicList = array();
        $where['isopen'] = array('eq', 1);
        $where['id'] = array('neq', $picId);
        $where['tagid'] = array('like', $tagnameArr, 'OR');
        $where['_logic'] = 'AND';
        $map['_complex'] = $where;
        $lovePicList = $this->Photo->field('id,name,topimg')
                ->where($map)
                ->order('time desc')
                ->limit(4)
                ->select();  //取出除开本条的最新发布的4条有相同tagname的图集数据
        //分割图片info 信息获取图片集
        $picList = $curPic['info'];
        $picList = strip_tags($picList, '<img>');
        $picListArr = explode('|', $picList);
        $newPicList = array();
        foreach ($picListArr as $key => $value) {
            $singlePic = explode('[info]', $value);
            $singlePicImg = $singlePic[0];
            $singlePicInfo = $singlePic[1];
            $img = trim($singlePicImg); //去除前后空格并赋值
            $imgArr = explode('"', $img);
            $newPicList[$key]['img'] = trim($imgArr[1]);
            $newPicList[$key]['info'] = trimall($singlePicInfo); //去掉所有空格 包括字符中间的
        }
        //分割标签信息
        $picListNum = count($newPicList);  //图片总数量
        //获取热点新闻排行数据
        $News = D('News'); //D方法快速跨项目实例化模型
        $hotNews = $News->newsRank(10);
        //热门健康视频
        $videoMob = D("VideoCat");
        $hotVideo = $videoMob->getHotAlbum();
        //取出上一条 下一条数据
        $prevMap['id'] = array('lt', $picId);
        $prevPic = $this->Photo->field('id,name,topimg')
                ->where($prevMap)
                ->order('id desc')
                ->find();
        if (empty($prevPic)) {
            $prevPic = $this->Photo->order('id desc')
                    ->find();
        }
        $nextMap['id'] = array('gt', $picId);
        $nextPic = $this->Photo->field('id,name,topimg')
                ->where($nextMap)
                ->order('id')
                ->find();
        if (empty($nextPic)) {
            $nextPic = $this->Photo
                    ->order('id')
                    ->find();
        }
//        评论区域
        $this->showComment($picId, 'photo');

        $this->assign('prevPic', $prevPic);
        $this->assign('nextPic', $nextPic);
        $this->assign('lovePicList', $lovePicList);
        $this->assign('newTagList', $newTagList);
        $this->assign('hotNews', $hotNews);
        $this->assign('newPicList', $newPicList);
        $this->assign('picListNum', $picListNum);
        $this->assign('curPic', $curPic);
        $this->assign('hotVideo', $hotVideo);
        $this->display();
    }

    /**
     * 健康要图类别页
     */
    public function category() {
        $catId = I('cid'); //健康的图ID
        import('ORG.Util.Page2'); // 导入分页类

        $Pic_cat = D('Picture_cat');
        $category = $Pic_cat->field('name')
                ->where("id='$catId'")
                ->find(); //类别名
        $cat_picArr = array(
            '海报', '新闻', '时尚', '创意', '风景', '美食', '趣图', '宠物', '明星', '体育'
        );
        $cat_picNums = array_keys($cat_picArr, $category['name']);
        $cat_picNum = (int) ($cat_picNums[0] + 1);
        $catPicCount = $this->Photo
                ->where("pid = '$catId' and isopen = '1'")
                ->count(); //所属类别图片数
        $Page = new Page2($catPicCount, 20, 3); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $show = $Page->pageShow();
        $catPic = $this->Photo->field('id,name,time,topImg')
                ->where("pid = '$catId' and isopen = '1'")
                ->order('time desc')
                ->limit($Page->limit)
                ->select();

        $this->getPublicData();
        $this->assign('cat_picNum', $cat_picNum);
        $this->assign('catPic', $catPic);
        $this->assign('pagination', $show);
        $this->assign('category', $category);
        if ($category['name'] == '海报') {
            $this->display('Photo:category_1');
        } else {
            $this->display();
        }
    }

    /**
     * 获取公共部分数据
     */
    function getPublicData() {
        $PicCat = D('PictureCat');  //D方法 实例化写模型类名而不是表名 这里不是写picture_cat
        //获取各类别ID
        $posterCatId = $PicCat->getPicCatId('海报');
        //取出新闻类图集
        $newsCatId = $PicCat->getPicCatId('新闻');
        //取出时尚类图集
        $fashionCatId = $PicCat->getPicCatId('时尚');
        //取出创意类图集
        $ideaCatId = $PicCat->getPicCatId('创意');
        //取出风景类图集
        $sceneryCatId = $PicCat->getPicCatId('风景');
        //取出美食类图集
        $foodCatId = $PicCat->getPicCatId('美食');
        //取出趣图类图集
        $funnyCatId = $PicCat->getPicCatId('趣图');
        //取出宠物类图集
        $petCatId = $PicCat->getPicCatId('宠物');
        //取出明星类图集
        $starCatId = $PicCat->getPicCatId('明星');
        //取出体育类图集
        $peCatId = $PicCat->getPicCatId('体育');

        $this->assign('posterCatId',$posterCatId);
        $this->assign('newsCatId', $newsCatId);
        $this->assign('fashionCatId', $fashionCatId);
        $this->assign('ideaCatId', $ideaCatId);
        $this->assign('sceneryCatId', $sceneryCatId);
        $this->assign('foodCatId', $foodCatId);
        $this->assign('funnyCatId', $funnyCatId);
        $this->assign('petCatId', $petCatId);
        $this->assign('starCatId', $starCatId);
        $this->assign('peCatId', $peCatId);
    }

}
