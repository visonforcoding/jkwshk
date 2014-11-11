<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-3-20 23:57:00 by 曹轩铭 
 * Modify       :   曹文鹏
 * For          :   视频模型
 */
class VideoCatModel extends Model {

    protected $videoCat;

    public function __construct($name = '') {
        parent::__construct($name);
        $this->videoCat = $this->where("isopen = 1")
                ->select();
    }

    /**
     * 取出热门专辑视频
     * @param int $limit 取出多少条
     * @return array 热门视频数据集BUG不可用
     */
    function getHotCatVideo($limit, $pid, $num) {
        if (!empty($pid) && empty($num)) {
            $where = "id not in('$pid') and";
        } elseif (!empty($num) && $num != "play") {
            $where = "id IN ('$pid') and";
        } elseif ($num === "play") {
            $where = "type like '%$pid,%' and";
        } else {
            $where = "";
        }
        $hotCatVideo = $this->field("id,name,keywords,description,coverimage,showtime")
                ->where("$where  rec='1' and isopen = '1' ")
                ->limit($limit)
                ->order("updatetime desc")
                ->select();

        return $hotCatVideo;
    }

    /**
     * 根据TypeID取出专辑
     * @param int $limit 取出多少条
     * @param pid  cat种类
     * @param id   type种类
     * @return array 专辑结果集
     * 请改造该类，根据$tid和$pid以及$ID几种条件对数据进行读取
     */
    function getCatVideo($limit, $tid, $pid = '', $model = '') {
        if (!empty($pid) && !empty($tid)) {
            $where = "and type like'%$tid,%' and pid NOT IN ('$pid')";
        } elseif (!empty($tid)) {
            $where = "and type like '%$tid%'";
        } elseif (!empty($pid)) {
            $where = "and pid IN('$pid')";
        } else {
            $where = "";
        }
        /* 按照ID来取cat */
        if ($model == "jianwen") {
            $where = "and id IN('$pid')";
        }
        /* 如果有play在时前面的条件都作废调用的是查询相似视频 */
        if ($model == "play") {
            $where = "and type like ('%$tid%')";
        }
        if ($model == "video") {
            $where = "and type like'%$tid,%' and id IN ('$pid')";
        }

        $catVideo = $this->field("id,name,description,keywords,coverimage,type")
                ->where("isopen='1'   $where")
                ->order("updatetime desc")
                ->limit($limit)
                ->select();
        return $catVideo;
    }

    /**
     * 获取视频类别ID 通过类别名
     * @param type $name
     * @return type
     */
    public function getCatIdByCatname($name){
        $cat = $this->where("name = '$name'")
                ->find();
        $catId = $cat['id'];
        return $catId;
    }
    
    /**
     *  根据所给数据类型返回类别ID 或 父级类别ID即本类别pid
     * @param type $param  类别名
     * @return int 类别ID
     */
    public function getVideoCatId($param) {
        if (is_string($param)) {
            $where = "isopen = '1' and name = '$param'";
        } else {
            $where = "isopen = '1' and id = '$param' ";
        }
        $videoCat = $this->field('id,pid')
                ->where($where)
                ->find();
        if (is_string($param)) {
            return $videoCat['id'];
        } else {
            return $videoCat['pid'];
        }
    }

    /**
     * 根据ID返回视频专辑数据
     * @param type $id
     * @return type 视频类别数据集
     */
    public function getCategory($id) {
        $videoCat = $this->field('id,name,coverimage')
                ->where("isopen = 1 and id = '$id'")
                ->find();

        return $videoCat;
    }

    /**
     * 返回视频频道  逻辑是非专辑的类别才可能是频道
     * @param type $pid 视频类别ID
     * @return string 频道
     */
    public function getChannel($pid) {
        $category = $this->field('id,pid,name,zhuanjino')
                ->where("id = $pid")
                ->find();
        $album = $category['zhuanjino'];
        $pid = $category['pid'];
        if ($album) {
            $parentCategory = $this->getCategory($pid);
            $channel = $parentCategory['name'];
        } else {
            $channel = $category['name'];
        }
        return $channel;
    }

    /*
     * 栏目查询
     * 根据栏目名称返回id,name,time
     * $name string
     * return  array
     */
    public function getColumn($name) {
        $info = $this->field("id,name,programtime")
                ->where("isopen='1' and name = '$name'")
                ->find();
        return $info;
    }

    /*
     * 根据type类型查询出栏目（节目）
     */
    Public function getChannelVideo($limit, $tid) {
        $video = $this->field("id,name,coverimage")
                ->where("isopen='1' and type like '%$tid%'")
                ->order("updatetime desc")
                ->limit($limit)
                ->select();
        return $video;
    }

   
    /**
     * 获取所有级别子元素
     * @param type $pid
     * @return type
     */ 
    public function getChildrenIds($pid) {
        $data = $this->videoCat;
        $ids = array();
        foreach ($data as $key => $value) {
            if ($value['pid'] == $pid) {
                $id = $data[$key]['id'];
                $idsO = $this->getChildrenIds($id);
                $ids = array_merge($ids, $idsO);
                $ids[] = $id;
            }
        }
        return $ids;
    }

    /**
     * 检测是否有子元素
     * @param type $id
     * @return boolean
     */
    public function hasChild($id) {
        $child = $this->where("pid = '$id'")->select();
        if ($child) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取最热专辑
     * @param type $limit
     */
    public function getHotAlbum($limit=4) {
        $videos = $this->where("zhuanjino ='1' and isopen = '1'")
                ->order('hits desc')
                ->limit($limit)
                ->select();
        return $videos;
    }

    /**
     * 
     * @param type $id
     * @param type $limit
     * @return type
     */
    public function getCatAlbumIds($id) {
        $Pids = $this->getChildrenIds($id);
        if (empty($Pids)) {
            $Pids = array();
        }
        array_push($Pids, $id);
        return $Pids;
    }

}
