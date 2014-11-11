<?php
//类别页的栏目选择和类别选择的AJAX查询控制器
class AjaxAction extends Action{
    function search(){
        if( !empty($_GET['cid'])){
            $pid  =  I('cid');//cat 的ID
            $Map  ="isopen='1' and pid='$pid'";
        }
        if(!empty($_GET['typeid'])){
            $typeid = I('typeid');
            $Map  = "isopen='1' and type='$typeid'";
        }
//        echo "你好";
        import('ORG.Util.Page2');
        $mob  = M("video");
        $Count=  $mob->where("$Map")->count();

        $Page = new page($Count,20);
        
        $videoList = $mob
                    ->field("id,title,keywords,description,photo")
                    ->where("$Map")
                    ->order("id desc")//按最新添加的新闻进行排序
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->select();

        $Page->setConfig('header', '总共页');
        $Page->setConfig('theme', '<li>%upPage%</li>'
                . '<li>%linkPage%</li><li>%downPage%</li><li>共%totalPage%%header%</li>'
                . "<li>到第<input type='text'style='height:26px; line-height:26px; "
                . "width:40px; border:1px solid #ccc;' name='p'/>页</li>"
                . "<li><a href='#'>确定</a></li>");
        $show = $Page->show();
        $this->assign(
                array(
                  'videoList'=>$videoList,
                  'show'=>$show 
                ));
        $this->display();
    }
}

