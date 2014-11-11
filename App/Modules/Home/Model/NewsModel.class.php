<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-3-12 13:37:06 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   健康要闻model
 */
class NewsModel extends AdvModel {

    /**
     * 热门资讯
     * @param type $nums
     * @return type
     */
    public function newsRank($nums = 10) {
        $newsCat = D('NewsCat');
        $jkywId = $newsCat->getNewsCatId('健康要闻');
        $childCatIds = $newsCat->getChildNewsCatId($jkywId);
        $where['pid'] = array('in', $childCatIds);
        $where['_logic'] = 'and';
        $map['_complex'] = $where;
        $map['isopen'] = array('eq', 1);

        $hotNews = $this->field('id,title')
                ->where($map)
                ->order('click desc')
                ->limit($nums)
                ->select();   //热度排行新闻
        return $hotNews;
    }

    /*
     *  返回最新新闻数据集 默认12条
     * @param int $nums 新闻条数
     * @return array
     */

    public function getTimeRank($nums = 12) {
        $newsCat = D('NewsCat');
        $jkywId = $newsCat->getNewsCatId('健康要闻');
        $childCatIds = $newsCat->getChildNewsCatId($jkywId);


        $where['pid'] = array('in', $childCatIds);
        $where['_logic'] = 'and';
        $map['_complex'] = $where;
        $map['isopen'] = array('eq', 1);

        $timeNews = $this->field('id,title')
                ->where($map)
                ->order('time desc')
                ->limit($nums)
                ->select();
        if (empty($timeNews)) {
            $timeNews = array();
        }
        return $timeNews;
    }

    /**
     * 按新闻类别取出含图片的新闻数据集
     * @param string $catId
     * @param int $limit
     * @return array  带图片的新闻数据集
     */
    public function getCatPicNews($catId, $limit = 2) {
        $picNews = $this->field('id,title,litpic')
                ->where("isopen = '1' and pid = '$catId'"
                        . " and litpic != ''")
                ->order('time desc')
                ->limit($limit)
                ->select();
        if (empty($picNews)) {
            $picNews = array();
        }
        return $picNews;
    }

    /**
     * 按类别ID取出未被取出的新闻数据集
     * @param int $catId
     * @param array $picIds
     * @param int $limit
     * @return array 未被取出的类别新闻
     */
    public function getCatRestNews($catId, $picIds, $limit = 8) {
        $where['isopen'] = array('eq', '1');
        $where['pid'] = array('eq', $catId);
        if (!empty($picIds)) {
            $where['id'] = array('not in', $picIds);
        }
        $where['_logic'] = 'and';
        $where['_complex'] = $where;

        $news = $this->field('id,title')
                ->where($where)
                ->order('time desc')
                ->limit($limit)
                ->select();
        return $news;
    }

    /**
     * 按typeid取出新闻数据集
     * @param int $typeid
     * @param int $limit
     * @return array 未被取出的类别新闻
     */
    function getTypeNews($typeid, $limit = 4) {
        $News = $this->field('id,title,litpic')
                ->where("type like '%$typeid%' and isopen='1'")
                ->order("time")
                ->limit($limit)
                ->select();
        return $News;
    }

}
