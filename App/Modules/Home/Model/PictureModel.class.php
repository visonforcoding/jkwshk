<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-3-13 11:37:00 by 曹文鹏 , caowenpeng1990@126.com
* For          :   图集模型
*/

class PictureModel extends Model{
    
    /**
     *  按类别条数取出图片数据
     * @param string 类别名
     * @param int 显示条数
     * @return array 类别新闻
     */
    public function getCatNews($category,$limit){
        $catNews = $this->field('db_picture.id,db_picture.name,db_picture.toppai,'
                . 'db_picture.description,db_picture.topimg,db_picture_cat.id as catid')
                ->join("db_picture_cat ON db_picture_cat.id = db_picture.pid")
                ->where("db_picture.isopen = '1' and db_picture_cat.name = '$category'")
                ->order('db_picture.time desc')
                ->limit($limit)
                ->select(); 
        return $catNews;
    }
    
    
    /**
     * 取出热门图片排行
     * @param int $limit 取出多少条
     * @return array 热门图片数据集
     */
    public function getHotPicRank($limit=4){
        $hotPic = $this->field('id,name,topimg')
                ->where('isopen = 1')
                ->order('hits desc')
                ->limit($limit)
                ->select();
        if(empty($hotPic)){
            $hotPic = array();
        }
        $restHotPic = $this->getRestPic($hotPic,$limit);
        $hotPics = array_merge($hotPic,$restHotPic);
        return $hotPics;
    }
    
    /**
     * 按时间排序
     * @param type $limit
     */
    public function getNewPics($limit){
        $newPics = $this->field('id,name,topimg')
                ->where('isopen = 1')
                ->order('time desc')
                ->limit($limit)
                ->select();
        return $newPics;
    }
    
    
    /**
     * 按时类别取出热门图片
     * @param typeid int $limit int
     */
    public  function getTypePic($typeid,$limit=4){
        $tyPic = $this->field("id,name,topimg")
                      ->where("type like '%$typeid%' and isopen='1'")
                      ->order("time desc")
                      ->limit($limit)
                      ->select();
       return $tyPic;
        
    }
    
    /**
     * 取得
     * @param type $rs
     * @param type $total
     * @return array
     */
     public function getRestPic($rs, $total = 10) {
        $ids = array();
        foreach ($rs as $value) {
            $ids[] = $value['id'];
        }
        $num = count($rs);
        $limit = (int) ($total - $num);
        if (!empty($ids)) {
            $map['id'] = array('not in', $ids);
        }else{
            $map = '';
        }
        $restPic = $this->field('id as picid,name')
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

