<?php
/*
* 图片的的视图模型
*/
class PictureViewModel extends PublicViewModel {
   public $viewFields = array(
     'picture_cat'=>array('id'=>'pid','name'=>'gname','_as'=>'c'),
     'picture'=>array('id','name','tagid','code','toptype','topfd','topname','info','isopen','ascno','uname','top','hot','time','updatetime','_as'=>'p', '_on'=>'p.pid=c.id'),
   );
}

