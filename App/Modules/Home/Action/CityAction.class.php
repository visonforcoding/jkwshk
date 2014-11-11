<?php
// +----------------------------------------------------------------------
// | TOPThink [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://topthink.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$

class CityAction extends Action{
	public function index(){
		redirect('/view', 50, '页面跳转中...');
	}
    public function city(){
        //读取城市名
         $cityName = $_GET['name'];
        echo '当前城市' . $cityName;
    }
}