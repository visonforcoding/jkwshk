<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-8-22 17:25:07 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   
 */
class LogViewModel extends PublicViewModel {

    public $viewFields = array(
        'log' => array('*','action', '_as' => 'l'),
        'admin' => array('account', '_as' => 'a',  '_on' => 'a.id=l.userid'),
    );

}
