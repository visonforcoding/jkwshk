<?php
/*
* 管理员的视图模型
*/
class AdminViewModel extends PublicViewModel{
   public $viewFields = array(
     'admin_groups'=>array('id'=>'gid','name'=>'gname','_as'=>'g'),
     'admin'=>array('id','account','nickname','password','email','isopen','create_time','last_login_time','login_count','last_login_ip','_as'=>'a', '_on'=>'a.gid=g.id'),
   );
}

