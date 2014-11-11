<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-5-22 15:28:03 by 曹文鹏 , caowenpeng1990@126.com
* For          :   
*/
class TestAction extends Action{
    public function index(){
        $Video = D('Video');
        import("ORG.Util.Page2");
        $total = $Video->where("isopen = '1'")->count();
        $page = new Page2($total);
        $page->pageShow = array('first'=>'首页','ending'=>'尾页','up'=>'上一页','down'=>'下一页','GoTo'=>'确定');
        $page->pageType = '<span class="pageher">第%page%页/共%pageToatl%页'
                . '</span>%first%%up%%F%%omitFA%%numberF%%omitEA%%E%%down%%ending%到第%input%页%GoTo%';
        $show = $page->pageShow();
        $list = $Video->where("isopen = '1'")->limit($page->limit)->select();
        $this->assign(array(
            'show'=>$show,
            'list'=>$list
        ));
        $this->display();
    }
    public function test(){
        $keyword = file_get_contents("http://doido.sinaapp.com/segment/?word=微信公众平台开发(104) 自定义菜单扫一扫、发图片、发地理位置");
        //$keyword = json_encode($keyword);
         var_dump($keyword);
        $this->display();
    }
    public function check(){
        dump(check_verify(I('code')));
        dump(I('code'));
        exit();
    }
}
