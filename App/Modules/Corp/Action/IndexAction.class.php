<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-9-4 10:18:26 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   
 */
class IndexAction extends Action {

    public function index() {

        $CorpNews = D('CorpNews');
        $topCorpNews = $CorpNews->order('time desc')->find();
        $Host = D('Home://Host');
        //主持风采
        $host = $Host->where("isopen = '1'")
                ->order('ascno')
                ->limit(5)
                ->select();
        $oneProgramaId = D('Home://VideoCat')
                ->where("name not in('创意短片"
                        . "','其他视频','茶缘天下','环球健康资讯')and pid='1'")
                ->select();
        $this->assign(array(
            'topCorpNews' => $topCorpNews,
            'oneProgramaId' => $oneProgramaId,
            'host' => $host
        ));
        $this->display();
    }

    public function tvhost() {
        $Host = D('Home://Host');
        $host = $Host->where("isopen = '1'")
                ->order('ascno')
                ->limit(5)
                ->select();
        $oneProgramaId = D('Home://VideoCat')
                ->where("name not in('创意短片"
                        . "','其他视频','茶缘天下','环球健康资讯')and pid='1'")
                ->select();
        $this->assign(array(
            'oneProgramaId' => $oneProgramaId,
            'host' => $host
        ));
        $this->display();
    }

    public function about() {

        $this->display();
    }

    public function news() {
        $CorpNews = D('CorpNews');
        $corpNews = $CorpNews->where("isopen = '1'")
                ->order('time desc')
                ->limit(3)
                ->select();
        $this->assign(array(
            'corpNews'=>$corpNews
        ));
        $this->display();
    }

    public function newsView() {
        $id = I('id');
        $CorpNews = D('CorpNews');
        $curNews = $CorpNews->where("id='$id'")->find();
        $this->assign(array(
            'curNews'=>$curNews
        ));
        $this->display();
    }

    public function anchors() {
        $Host = D('Home://Host');
        $host = $Host->where("isopen = '1'")
                ->order('ascno')
                ->limit(5)
                ->select();
        $this->assign(array(
            'host' => $host
        ));
        $this->display();
    }

    public function anchorsview() {
        $id = I('id');
        $Host = D('Home://Host');
        $host = $Host->where("id = '$id'")->find();
        $Video = D('Home://Video');
        $program = $Video->where("isopen = '1' and star like '%$id%'")
                ->order('addtime desc,updatetime desc')
                ->limit(10)
                ->select();
        $this->assign(array(
            'host' => $host,
            'program' => $program
        ));
        $this->display();
    }

    //获取各个一级栏目的信息用于传值
    protected function getPrograma($name = '') {
        /*  各个一级栏目的id  */
        $hostIdArr = explode(',', $name);
        $oneProgramaId = $this->Video_cat
                ->where("name not in('创意短片"
                        . "','其他视频','茶缘天下','环球健康资讯')and pid='1'")
                ->select();
        $starMob = D("Host");
        $map['id'] = array('in', $hostIdArr);
        $starInfo = $starMob->field("id,name,photo")
                ->where($map)
                ->select();
        $this->assign(array(
            'oneProgramaId' => $oneProgramaId,
            'starInfo' => $starInfo
        ));
    }

    /**
     * 公司动态页
     */
    public function event() {
        $year = I('year');
        $CorpNews = D('CorpNews');
        $corpNewsDateSql = "select year(`time`) as year from db_corp_news group by year(`time`) order by year(`time`) desc";
        $corpNewsDate = $CorpNews->query($corpNewsDateSql);
        if (!isset($year) || empty($year)) {
            $year = $corpNewsDate[0]['year'];
        }
        $yearNums = count($corpNewsDate);
        $corpNewsSql = "select *,year(`time`) as year from db_corp_news where year(`time`) = '$year'";
        $corpNews = $CorpNews->query($corpNewsSql);
        $this->assign(array(
            'corpNewsDate' => $corpNewsDate,
            'yearNums' => $yearNums,
            'corpNews' => $corpNews,
            'year' => $year
        ));
        $this->display();
    }

}
