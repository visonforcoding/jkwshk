<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-3-20 23:57:00 by 曹轩铭 
 * For          :   视频模型
 */
class VideoModel extends AdvModel {

   

    /*
     * 按CATID查出视频健闻
     * return array
     * 可以通过改造上面的方法把该方法节省掉
     */
    function getNewsVideo($pid, $limit = 5) {
        $NewsVideo = $this->field("id,pid,title,subtitle,keywords,description,hits,photo")
                ->where("pid='$pid' and isopen='1'")
                ->order("hits desc")
                ->limit($limit)
                ->select();
        return $NewsVideo;
    }

    /**
     *  按pid取出热门视频数据
     * @param $limit int 显示条数
     * @param $num 控制条件的查询  $where控制查询的是TOP还是HOT的条件
     * @return array 类别视频
     * 该方法可升级请再抽空改装一下与newsVideo查取视频方法合并
     */
    public function getHotVideo($pid, $where, $limit, $num='') { 
        if (!empty($where)) {
            $where = "and  " . $where;
        } else {
            $where = "";
        }
        if (empty($pid)) {
            $IN = "";
        }
        if (!empty($num)) {
            $IN = "pid IN ('$pid') ";
        } else {
            $IN = "pid NOT IN ('$pid') ";
        }
        if ($num == "zhuanlan") {
            $IN = "";
            $where = "type ='$pid'$where";
        }
        if ($num == 'sort') {
            $order = "addtime desc";
        } else {
            $order = "hits desc";
        }

        $hotVideo = $this->field("id,title,description,keywords,photo,hits")
                ->where("$IN " . "$where and isopen='1'")
                ->order($order)
                ->limit($limit)
                ->select();
        return $hotVideo;
    }

    /**
     * 取出视频Type的ID
     * @param String 类型的名称
     * @return int(string) ID号 应该封装在typeModel中
     */
    public function getTypeId($name) {
        $Type = new model("Video_type");
        $id = $Type->field("id")
                ->where("name='$name'")
                ->find();

        return $id['id'];
    }

    /**
     *  按类型取出视频
     * @param type $typeId 类型Id
     * @param int $limit 取出条数 默认为0 全部取出
     * @return array 数据结果集
     */
    public function getTypeVideo($typeId, $limit = 0) {
        $videos = $this->where("isopen = 1 and type like '%$typeId%'")
                ->order("addtime desc")
                ->limit($limit)
                ->select();
        return $videos;
    }
    
    
   

    /**
     * 有些热门视频其实是读的热门专辑
     * @param type $limit
     * @return array
     */
    public function getHotVideos($limit = 5) {
        $videos = $this
                ->where("isopen = '1'")
                ->order('hits desc')
                ->limit($limit)
                ->select();
        return $videos;
    }

    /*
     * 周点播排行
     */
    Public function getWeekVodRanks() {
        $today = date('Y-m-d');
        $today = strtotime($today);
        $Video_hits = D('video_hits');  //实例化picture_hits
        $weekNews = $Video_hits
                ->field('videoid,title,addtime,sum(db_video_hits.hits)')
                ->join("db_video ON db_video.id = db_video_hits.videoid")
                ->where("week(from_unixtime(db_video_hits.time))=week(now())")
                ->group('db_video_hits.videoid')
                ->order('sum(db_video_hits.hits) desc')
                ->limit(10)
                ->select();
        if(empty($weekNews)){
            $weekNews = array();
        }
        $weekNewsIds = array();
        foreach ($weekNews as $value) {
            $weekNewsIds[] = $value['videoid'];
        }
        $weekNum = count($weekNews);
        $weekRestNews = $this->getRestNews($weekNum, $weekNewsIds);
        if (empty($weekNews)) {
            $weekNews = array();
        }
        $WeekList = array_merge($weekNews, $weekRestNews);
        return $WeekList;
    }

    /*
     * 日点播排行
     */
    Public function getDayVodRanks() {
        /* 日热门点击文章 */
        $today = date('Y-m-d');
        $today = strtotime($today);
        $Video_hits = D('video_hits');  //实例化picture_hits
        $dayNews = $Video_hits->table('db_video_hits vh')
                ->join("db_video v ON v.id = vh.videoid")
                ->where("vh.time = '$today'")
                ->order('vh.hits desc')
                ->limit(10)
                ->select();
        if(empty($dayNews)){
            $dayNews = array();
        }
        $dayNewsIds = array();
        foreach ($dayNews as $value) {
            $dayNewsIds[] = $value['videoid'];
        }
        $dayNum = count($dayNews);
        $dayRestNews = $this->getRestNews($dayNum, $dayNewsIds);
        if (empty($dayNews)) {
            $dayNews = array();
        }
        $dayList = array_merge($dayNews, $dayRestNews);
        return $dayList;
    }

    /**
     * 根据日、周、月排行数量取出剩下行数数据
     * @param int $num 需要的总数量
     * @param int $total
     * @return array 
     */
    public function getRestNews($num, $ids, $total = 10) {
        $limit = (int) ($total - $num);
        $Video = D('Video');
        if (!empty($ids)) {
            $map['id'] = array('not in', $ids);
        }else{
            $map = '';
        }
        $restVideo = $Video->field('id as videoid,title,addtime')
                ->where($map)
                ->order('addtime desc')
                ->limit(0, $limit)
                ->select();
        if (empty($restVideo)) {
            $restVideo = array();
        }
        return $restVideo;
    }
    
    /**
     * 取出相应视频
     * @param type $pids
     * @param type $property
     * @param type $limit
     * @return type
     */
    public function getVideos($pids,$property='',$limit = 1,$order='addtime'){
        $map['pid'] = array('in',$pids);
        $map['isopen'] = array('eq','1');
        if(!empty($property)){
        $map['property'] = array('eq',"$property");
        }
        $map['_logic'] = 'and';
        $video = $this->where($map)
                ->order("$order desc")
                ->limit($limit)
                ->select();
        return $video;
    }
    
    
    /**
     * 取出一个类别下的所有级别的视频
     * @param type $catId
     * @param type $limit
     * @return type
     */
    public function getCatAllVideos($catId,$limit,$order='addtime'){
        $Video_cat = new VideoCatModel();
        $Pids = $Video_cat->getChildrenIds($catId);
        if (empty($Pids)) {
            $Pids = array();
        }
        array_push($Pids, $catId);
        $Video = $this->getVideos($Pids, '', $limit,$order);
        return $Video;
    }
    

}
