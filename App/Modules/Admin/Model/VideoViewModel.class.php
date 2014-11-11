<?php
/*
* 视频的视图模型
*/
class VideoViewModel extends ViewModel {
   public $viewFields = array(
     'video_cat'=>array('id'=>'pid','name'=>'gname','_as'=>'c'),
     'video'=>array('id','title','upuname','updatetime','hits','isopen','_as'=>'n', '_on'=>'n.pid=c.id'),
   );
}

