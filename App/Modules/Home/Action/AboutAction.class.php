<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-5-27 11:17:44 by 曹文鹏 , caowenpeng1990@126.com
* For          :   关于我们一些部分
*/
class AboutAction extends Action{
    
    /**
     *  app页
     */
    public function app(){
        $this->display();
    }
    
    /**
     *  关于我们
     */
    public function index(){
        $this->display();
    }
    
    /**
     * 招贤纳士
     */
    public function job(){
        $this->display();
    }
    
    /**
     * 联系我们
     */
    public function contact(){
        $this->display();
    }
    
    
    /**
     * 招商简章
     */
    public function advs(){
        $this->display();
    }
    
    
}