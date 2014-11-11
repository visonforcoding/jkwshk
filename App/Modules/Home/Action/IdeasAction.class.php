<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-9 13:20:38 by 曹轩铭 , 280046197@qq.com
 * For          :   创意栏目
 */
class IdeasAction extends Action {

    protected $videoMob;
    protected $videocatMob;

    /* 实例化查询视频的对象以及cat表的对象 */

    function __construct() {
        parent::__construct();
        $this->videoMob = D("Video");
        $this->videocatMob = D("VideoCat"); //VIdeoCat必须和MODEL的名一致保持大写
    }

    /* 创意首页的控制 */

    function index() {
        /*         查出该栏目所属的ID      */
        $condition = array("健康卫视宣传片", "节目宣传片", "创意短片"); /* 所有的节目 */
        $advertisingId = $this->videocatMob->getCatId("节目宣传片", 1); /* 宣传片 */
        $tvAdvertisingId = $this->videocatMob->getCatId("健康卫视宣传片"); /* 卫视宣传片 */
        $funnyId = $this->videoMob->getTypeId("搞笑"); /* 搞笑 */
        $advertisementId = $this->videoMob->getTypeId("广告"); /* 广告 */
        $CommonwealId = $this->videoMob->getTypeId("公益"); /* 公益 */
        $video_pid = $this->videocatMob->getCatId($condition, 1); /* 作为查询广告和搞笑片条件存在 */


        /*           开始取出所需           */
        /* 宣传片 */
        $advertising = $this->videoMob->getVideo(8, $advertisingId, "", 1);
        /* 创意公益短片 */
        $Commonweal = $this->videoMob->getVideo(8, $video_pid, $CommonwealId, 1);
        /* 创意搞笑 */
        $funny = $this->videoMob->getVideo(8, $video_pid, $funnyId, 1);
        /* 创意广告 */
        $advertisement = $this->videoMob->getVideo(8, $video_pid, $advertisementId, 1);
        /* 卫视宣传片 */
        $tvAdvertising = $this->videoMob->getVideo(8, $tvAdvertisingId, "", 1);


        /*         热门数据     */

        /* 创意短片的热门排行 */
        $hotList = $this->videoMob->field("id,title,photo,keywords")
                ->where("isopen='1' and hot='1' "
                        . "and pid In('$video_pid')")
                ->order("hits desc")
                ->select();

        $NewsMob = D("News");
        $NewsCatMob = D("NewsCat");
        /* 热门资讯 */
        $hotNews = $NewsMob->newsRank();
        /* 热门视点      因为后台逻辑暂时不确定先在找到CAT里面存在的那个段位 */
        $hotCatId = $NewsCatMob->getNewsCatId("推荐视点");
        $hotNewsCat = $NewsMob->getCatPicNews($hotCatId, 4);


        $this->assign(array(
            'hotNewsCat' => $hotNewsCat,
            'hotNews' => $hotNews,
            'hotList' => $hotList,
            'tvAdvertising' => $tvAdvertising,
            'advertisement' => $advertisement,
            'funny' => $funny,
            'Commonweal' => $Commonweal,
            'advertising' => $advertising
        ));
        $this->display();
    }

    /*
     * 根据传出的值取出各类型视频分页列表
     *
     *       
     */

    function IdeasList() {
        $cate = I("cate");
        $condition = array("健康卫视宣传片", "节目宣传片", "创意短片"); /* 所有的节目 */
        $advertisingId = $this->videocatMob->getCatId("节目宣传片", 1); /* 宣传片 */
        $tvAdvertisingId = $this->videocatMob->getCatId("健康卫视宣传片"); /* 卫视宣传片 */
        $funnyId = $this->videoMob->getTypeId("搞笑"); /* 搞笑 */
        $advertisementId = $this->videoMob->getTypeId("广告"); /* 广告 */
        $CommonwealId = $this->videoMob->getTypeId("公益"); /* 公益 */
        $video_pid = $this->videocatMob->getCatId($condition, 1); /* 作为查询广告和搞笑片条件存在 */
        /* 根据传值查询 */
        switch ($cate) {
            case 'jiemu':
                $where = "isopen ='1' and pid ='$advertisingId'";
                break;
            case 'gongyi':
                $where = "isopen='1' and type like '%$CommonwealId%' and pid IN('$video_pid') ";
                break;
            case 'add':
                $where = "isopen='1' and type like '%$advertisementId%' and pid IN('$video_pid') ";
                break;
            case 'funny':
                $where = "isopen='1' and type like '%$funnyId%' and pid IN('$video_pid') ";
                break;
            case 'tv':
                $where = "isopen ='1' and pid ='$tvAdvertisingId'";
                break;
        }
        /*         * 分页* */
        import('ORG.Util.Page2');

        $Count = $this->videoMob
                ->where("$where")
                ->count();

        $Page = new Page($Count, 24); //每页显示条数

        $videoList = $this->videoMob
                ->field("id,title,photo,keywords,hits,addtime")
                ->where($where)
                ->order("addtime")
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->select();
//        echo $this->videoMob->getLastSql();

        $Page->setConfig('header', '页');
        $Page->setConfig('theme', '<li>%upPage%</li>'
                . '<li>%linkPage%</li><li>%downPage%</li><li>共%totalPage%%header%</li>'
                . "<li>到第<input type='text'style='height:26px; line-height:26px; "
                . "width:40px; border:1px solid #ccc;' name='p'/>页</li>"
                . "<li><a href='#'>确定</a></li>");
        $show = $Page->show();
        $this->assign(array(
            'show' => $show,
            'videoList' => $videoList
        ));
        $this->display();
    }

}
