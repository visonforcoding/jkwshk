<?php
/*
* 文章的视图模型
*/
class NewsViewModel extends PublicViewModel {
   public $viewFields = array(
     'news_cat'=>array('id'=>'pid','name'=>'gname','_as'=>'c'),
     'news'=>array('*','_as'=>'n','id'=>'id', '_on'=>'n.pid=c.id'),
   );
}

