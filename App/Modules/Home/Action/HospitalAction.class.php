<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-3-25 14:17:26 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   医院版块
 */
class HospitalAction extends PublicAction {

    protected $Hospiatal;
    protected $Photo;
    protected $News;

    public function __construct() {
        parent::__construct();
        $this->Hospital = D('Hospital');
        $this->Photo = D('Picture');
        $this->News = D('News');
    }

    public function index() {
        $Areas = D('Areas');
        $provinceId = I('city');
        if (empty($provinceId)) {
            $provinceId = '2';
        }
        $hotNews = $this->News->newsRank();
        $hotPhoto = $this->Photo->getHotPicRank();
        $curProvince = $Areas->getAreaName($provinceId);

        //取出type为1的地区
        $province = $Areas->field('area_id,area_name')
                ->where("parent_id = '1' and area_type = '1' ")
                ->select();

        //取出省份内的医院
        $hospitals = $this->Hospital->field('id,name,feature')
                ->where("isopen = '1' and province = '$provinceId'")
                ->order('addtime desc')
                ->select();
        //医院排行榜
        $topHospital = $this->Hospital->where("isopen = '1'")
                ->order('hits desc')
                ->limit(5)
                ->select();
        foreach ($topHospital as $key => $value) {
            $info = $value['info'];
            $infoF = preg_replace('/&nbsp;/', '', $info);
            $topHospital[$key]['info'] = $infoF;
        }
        //热门专辑
        $hotAlbum = D('VideoCat')->getHotAlbum(4);

        $this->assign(
                array(
                    'province' => $province,
                    'hospitals' => $hospitals,
                    'curProvince' => $curProvince,
                    'topHospital' => $topHospital,
                    'hotAlbum' => $hotAlbum
                )
        );

        $this->assign('hotNews', $hotNews);
        $this->assign('hotPhoto', $hotPhoto);
        $this->display();
    }

    public function view() {
        $curHospId = I('hospId');

        $curHosp = $this->Hospital->field('*')
                ->where("id = '$curHospId'")
                ->find();
        $curHosp['info'] = strip_tags(ltrim(preg_replace('/&nbsp;/', '', $curHosp['info'])));
        if (!$curHosp) {
            $this->_empty();
            return;
        }
        //点击量加1
        $this->Hospital->where("id = '$curHospId'")
                ->setInc('hits');
        $picList = $curHosp['pics'];
        $picList = strip_tags($picList, '<img>');
        $picListArr = explode('|', $picList);
        $newPicList = array();
        foreach ($picListArr as $key => $value) {
            $singlePic = explode('[info]', $value);
            $singlePicImg = $singlePic[0];
            $img = trim($singlePicImg); //去除前后空格并赋值
            $imgArr = explode('"', $img);
            $newPicList[$key]['img'] = trim($imgArr[1]);
        }

        $hotPhoto = $this->Photo->getHotPicRank();
        $hotNews = $this->News->newsRank();
        //评论区域
        $this->showComment($curHospId, 'hospital');

        //医院排行榜
        $topHospital = $this->Hospital->where("isopen = '1'")
                ->order('hits desc')
                ->limit(5)
                ->select();
        foreach ($topHospital as $key => $value) {
            $info = $value['info'];
            $infoF = preg_replace('/&nbsp;/', '', $info);
            $topHospital[$key]['info'] = $infoF;
        }
        //热门专辑
        $hotAlbum = D('VideoCat')->getHotAlbum(4);

        //相关视频
        $Video = D('Video');
        $VideoType = new VideoTypeModel();
        $hospType = $VideoType->getTypeId('医院');
        $hospVideo = $Video->where("type like '%$hospType%'")
                ->order('rand()')
                ->limit(4)
                ->select();
                //热门专辑
        $this->assign(array(
            'curHosp' => $curHosp,
            'newPicList' => $newPicList,
            'hotPhoto' => $hotPhoto,
            'hotNews' => $hotNews,
            'topHospital' => $topHospital,
            'hotAlbum' => $hotAlbum,
            'hospVideo' => $hospVideo
        ));
        $this->display();
    }

    public function test() {
        $this->display();
    }

}
