<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-10-23 10:02:25 
 * Author       :   曹文鹏
 * Email        :   caowenpeng1990@126.com
 * For          :
 */
class ViewpointViewModel extends PublicViewModel {

    public $viewFields = array(
        'viewpoint' => array('*', '_as' => 'vp'),
        'viewpoint_sub' => array('aid', 'issue', '_as' => 'vps', '_on' => 'vp.id=vps.aid'),
    );

}
