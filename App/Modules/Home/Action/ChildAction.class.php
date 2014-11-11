<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-2 12:20:38 by 曹轩铭 , 280046197@qq.com
 * For          :   儿童专栏
 */
class ChildAction extends Action {

    function index() {
        $typename = "儿童"; //完全可以修改成传参加载不同的CSS
        $VideoMob = D("Video");
        $VideoTypeMob = M("video_type");
        $typeid = $VideoTypeMob->field("id")
                ->where("name='$typename' AND isopen='1'")
                ->find();
        $typeid = $typeid['id'];

        //顶部轮播
        $FocusCat = D('focus_cat');
        $Focus = D('focus');
        $focusCat = $FocusCat->where("name = '儿童'")->find();
        $focusCatId = $focusCat['id'];
        $focus = $Focus->where("cid like '%$focusCatId%' and status = '1'")
                ->order('level desc')
                ->limit(5)
                ->select();
        $this->assign('focus', $focus);
        /* 推荐视频 */
        $recommendVideo = $VideoMob->getTypeVideo($typeid, 4);
        /* 资讯 */
        $nMob = D("News");
        $picNews = $nMob->where("type like '%$typeid%' and litpic != '' and isopen = '1'")
                ->order('time desc')
                ->find();
        $this->assign('picNews', $picNews);
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
        $Woman = new WomanAction();
        $Woman->getHotRank();

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

    function Childlist() {
        
        $table = I("category");
        //缺失捕获你未使用的表名字，返回客户一个404页面
        $order = "time desc";
        switch ($table) {
            case "new":
                $M = "News";
                $limit = 20;
                $title = "资讯";
                $field = array('id', 'title' => 'name', 'keywords', 'description', 'time','source');
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
        $typename = "儿童";
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
        //热门数据
        $Woman = new WomanAction();
        $Woman->getHotRank();


        $this->assign(array(
            'show' => $show,
            'manList' => $manList,
            'title' => $title,
        ));
        switch ($M) {
            case 'News':
                $this->display("Child/News");
                break;
            case 'Picture':
                $this->display("Child/Picture");
                break;
            case 'Video':
                $this->display("Child/Video");
                break;
            case 'Newscat':
                $this->display("Child/Newscat");
                break;
            case 'VideoCat':
                $this->display("Child/Videocat");
                break;
        }
    }

}
