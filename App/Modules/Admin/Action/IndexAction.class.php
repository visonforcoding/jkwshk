<?php

class IndexAction extends CommonAction {

    // 框架首页
    public function index() {
        C('SHOW_RUN_TIME', false); // 运行时间显示
        C('SHOW_PAGE_TRACE', false);

        import("@.ORG.Util.Menu");
        $mu = MENU::getInstance();

        $menu = $mu->getMenu();
        $a = array_keys($menu);
        $id = $a[0];
        $submenu = $mu->getSubMenu($id);
        $a = array_keys($submenu);
        $subid = $a[0];

        $this->assign('menu', $menu); //主菜单
        $this->assign('submenu', $submenu); //次级菜单
        $this->assign('id', $id); //默认要显示的主菜单
        $this->assign('subid', $subid); //默认要显示的次级菜单
        $this->assign('menuno', count($menu)); //主菜单的数目
        $this->assign('IURL', C('IURL')); //当前域名
        $this->display();
    }

    // 框架欢迎页
    public function welcome() {
        C('SHOW_RUN_TIME', false); // 运行时间显示
        C('SHOW_PAGE_TRACE', false);
        $this->assign('IURL', C('IURL')); //域名

        $lasttime = $_SESSION['lastLoginTime'];
        $logintime = $_SESSION['loginTime'];
        $tmp = $logintime - $lasttime;

        //一些信息显示
        $adHitsNum = D('AdHits')->where("flag = 'sevenbaby海报'")->getField('hits');
        $this->assign('adHitsNum',$adHitsNum);
        
        $d = floor($tmp / 86400);
        $h = floor($tmp % 86400 / 3600);
        $m = floor($tmp % 86400 % 3600 / 60);
        $s = floor($tmp % 86400 % 3600 % 60);
        $subtime = $d . '天' . $h . '小时' . $m . '分钟' . $s . '秒';
        $this->assign('lastLoginTime', date('Y-m-d H:i:s', $lasttime)); //上次登录时间
        $this->assign('loginTime', date('Y-m-d H:i:s', $logintime)); //本次登录时间
        $this->assign('subtime', $subtime); //距离上一次的登录时间

        $this->display();
    }

}
