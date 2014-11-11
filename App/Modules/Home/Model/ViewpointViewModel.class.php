<?php
/**
 * Encoding     :   UTF-8
 * Created on   :   2014-10-22 10:51:26 
 * Author       :   曹文鹏
 * Email        :   caowenpeng1990@126.com
 * For          :
 */
class ViewpointViewModel extends ViewModel {

    public $viewFields = array(
        'Viewpoint' => array('id','*'),
        'Viewpoint_sub' => array('*', '_on' => 'Viewpoint.aid=Viewpoint_sub.aid'),
    );

}