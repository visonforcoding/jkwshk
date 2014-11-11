<?php

// 文章模型
class NewsModel extends CommonModel {

    public $_validate = array(
            //0存在就验证1必须验证2值不为空时验证
        array('title', 'require', '标题必须填写！'), //默认情况下用正则进行验证
        array('pid', 'isChose', '您还未选择所属分类', 1, 'callback', 3), //默认情况下用正则进行验证
        array('title', 'onlyOne', '标题已经存在!', 1, 'callback',1), //1新增时验证2编辑时验证3全部情况都验证
            //官方unique 验证似乎逻辑不正确 用like 的方式去验证的！！！！！
    );
    public $_auto = array(
        array('time', 'time', self::MODEL_INSERT, 'function'),
        array('pubdate', 'time', self::MODEL_UPDATE, 'function'),
        array('flags', 'funcflags', self::MODEL_BOTH, 'callback'),
        array('tagid', 'funcflags', self::MODEL_BOTH, 'callback'),
        array('pid2', 'funcflags', self::MODEL_BOTH, 'callback'),
        array('type', 'funcflags', self::MODEL_BOTH, 'callback'),
    );

    public function onlyOne($title) {
        if ($this->where("title = '$title'")->find()) {
            return false;
        } else {
            return true;
        }
    }

    public function funcflags($inVal) {
        if (isset($inVal)) {
            return implode(',', $inVal);
        } else {
            return NULL;
        }
    }

    public function isChose($pid) {
        if ($pid == 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 返回按点击量排名的新闻数据
     * @param type $nums
     * @return type
     */
    public function newsRank($nums) {
        $hotNews = $this->field('id,title')
                ->where("isopen = '1'")
                ->order('click desc')
                ->limit($nums)
                ->select();   //热度排行新闻
        return $hotNews;
    }

}
