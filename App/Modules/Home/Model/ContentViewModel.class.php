<?php
/*
* 视频的视图模型
*/
class ContentViewModel extends ViewModel {
   public $viewFields = array(
     'content'=>array('id','title','keywords','description','hits','photo','updatetime','_as'=>'c'),
     'video'=>array('videopath','videotime','_as'=>'v', '_on'=>'c.id=v.bid'),
   );
}

