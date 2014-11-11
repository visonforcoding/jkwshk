<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-8-19 11:02:09 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   评论视图
 */
class CommentViewModel extends PublicViewModel {

    public $viewFields = array(
        'Comment' => array('id','category','msg','ctime','ip','country','province','city','ctime'),
        'Member' => array('username', '_on' => 'Comment.uid=Member.id'),
    );

}
