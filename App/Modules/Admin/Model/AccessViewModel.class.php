<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-8-18 10:07:58 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   权限视图
 */
class AccessViewModel extends PublicViewModel {

    public $viewFields = array(
        'GroupAccess' => array('id', 'groupid', 'accessid'),
        'AdminGroups' => array('id' => 'gid','name'=>'gname', '_on' => 'GroupAccess.groupid=AdminGroups.id'),
        'Access' => array('path','id' => 'aid','title'=>'aname', '_on' => 'Access.id=GroupAccess.accessid'),
    );

}
