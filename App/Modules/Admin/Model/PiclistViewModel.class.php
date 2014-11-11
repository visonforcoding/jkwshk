<?php
/*
* 图片的的视图模型
*/
class PiclistViewModel extends ViewModel {
   public $viewFields = array(
     'picture'=>array('id'=>'pid','name'=>'pname','_as'=>'p'),
     'piclist'=>array('id','pid','name','imgurl','info','url','isopen','ascno','uname','time','updatetime','_as'=>'l', '_on'=>'l.pid=p.id'),
   );
}

