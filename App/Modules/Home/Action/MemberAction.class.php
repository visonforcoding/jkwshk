<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-9 17:07:07 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   会员模块
 */
class MemberAction extends PublicAction {

    //注册页
    public function __construct() {
        parent::__construct();
        $userId = session(C('USER_AUTH_KEY'));
        $msgCount = D('Msg')->where("oid = '$userId' and isopen = '1' and issee = '0'")->count();
        $this->assign('msgCount', $msgCount);
    }

    public function register() {

        $this->display();
    }

    /**
     *  注册处理页
     */
    public function doRegister() {
        Vendor('Ucenter.lib.UcService');  //引入Ucenter类
        $username = I('username');
        $email = I('email');
        $pwd = I('password');
        $regip = get_client_ip();
        $Uc = new UcService();
        if (session('verify') != md5($_POST['code'])) {
            $this->error('验证码错误！');
        }
        $uid = $Uc->register($username, $pwd, $email, $regip);
        //ucenter 注册一次
        if (is_int($uid)) {
            //如果上面注册成功将返回一个int类型的数字 
            $Member = D('Member');
            if ($Member->create()) {
                $Member->regtime = time();
                $Member->regip = $regip;
                $Member->password = setPlainPassword($pwd);
                if ($Member->add()) {
                    $this->success('创建成功！', '/member/login'); //本数据库注册一次
                } else {
                    $this->error($Member->getError());
                }
            } else {
                $this->error($Member->getError());
            }
        } else {
            $this->error($uid);
        }
    }

    //登录页
    public function login() {
        Vendor('Sdk.weibo.weibo');
         $wb_akey = C('WB_AKEY');
        $wb_skey = C('WB_SKEY');
        $wb_callback_url = C('WB_CALLBACK_URL');
        $o = new SaeTOAuthV2($wb_akey, $wb_skey);
        $code_url = $o->getAuthorizeURL($wb_callback_url);
        $this->assign(array(
            'code_url'=>$code_url
        ));
        $this->display();
    }

    /**
     * 如果是jquery 类库ajax提交 则ajax返回信息
     * 检测登录
     */
    public function doLogin() {
        Vendor('Ucenter.lib.UcService');  //引入Ucenter类
        $username = I('username');
        $password = I('password');
        $remember = I('remember');
        $ajax = false;
        if ($this->isAjax()) {
            $ajax = true;
        }

        $code = I('code');
        $Member = D('Member');
        if (session('verify') != md5($code)) {
            if ($ajax) {
                $this->ajaxReturn(0, '验证码错误！', 0);
            } else {
                $this->error('验证码错误！');
            }
        }
        $ucService = new UcService;
        $uidArr = $ucService->ucLogin($username, $password);
        if (!is_array($uidArr)) {
            if ($ajax) {
                $this->ajaxReturn(0, $uidArr, 0);
            } else {
                $this->error($uidArr);
            }
        }
        $uid = $uidArr['uid'];
        $synHtml = $ucService->ucSynLogin($uid);
        if (!$ajax) {
            echo $synHtml;    //输出ucenter 同步登录代码
        }

        $ckUsername = $Member->where("username = '$username' or email = '$username'")
                ->find();

        //在ucenter 中有记录但在本数据库中没有记录，说明先在论坛中注册的，需要激活
        if (!is_array($ckUsername)) {
            $pwd = setPlainPassword($password);
            $this->redirect('member/activation', array('user' => $username, 'pwd' => $pwd), 0);
            return;
        }
        $userId = $ckUsername['id'];
        $pwd = setPlainPassword($password);
        $ckPassword = $Member->where("password = '$pwd' and id = '$userId'")
                ->find();
        if (!is_array($ckPassword)) {
            if ($ajax) {
                $this->ajaxReturn(0, '密码不正确', 0);
            } else {
                $this->error('密码不正确！');
            }
        }
        if ($remember) {
            cookie('USER_NAME', $username, 3600 * 24 * 30);
            cookie('USER_PWD', $password, 3600 * 24 * 30);
        }

        session(C('USER_AUTH_KEY'), $userId);
        session('LOGIN_NAME', $username);
        if ($ajax) {
            $this->ajaxReturn(0, '登录成功！', 1);
        }
        $this->success('登录成功！', '/Member/index');
    }

    /**
     * 用户退出注销
     */
    public function doLogout() {
        session(C('USER_AUTH_KEY'), null);
        cookie('USER_NAME', null);
        cookie('USER_PWD', null);
        Vendor('Ucenter.lib.UcService');  //引入Ucenter类
        $ucService = new UcService;
        echo $ucService->ucSynLogout();
        redirect('/member/login.html', 2, '正在退出...');
    }

    /**
     * 
     */
    public function ajaxLoginOut() {
        session(C('USER_AUTH_KEY'), null);
        $this->ajaxReturn(0, '退出成功！', 1);
    }

    /**
     * 用户信息页
     */
    public function user() {
        if (!$this->ckUserLogin()) {
            $this->error('请先登录！', '/Member/login.html');
        }
        $userId = session(C('USER_AUTH_KEY'));
        $username = session('LOGIN_NAME');
        $Member = D('Member');
        $user = $Member->where("id = $userId")
                ->find();
        $this->assign(array(
            'username' => $username,
            'user' => $user
        ));
        $this->display();
    }

    /**
     * 修改用户基本信息
     */
    public function info() {
        if (!$this->ckUserLogin()) {
            $this->error('非法操作！', '/member/login.html');
        }
        $userId = session(C('USER_AUTH_KEY'));
        $Member = D('Member');
        if ($Member->create()) {
            if ($Member->where("id='$userId'")->save()) {
                $this->success('更改成功！');
            }else{
                $this->error($Member->getError());
            }
        }
    }

    /**
     * 修改头像
     */
    public function avatar() {
        
    }

    /**
     * 头像上传
     */
    public function upload() {
        if (!$this->ckUserLogin()) {
            $this->error('非法操作！', '/member/login.html');
        }
        $userId = session(C('USER_AUTH_KEY'));
        $result = array();
        $result['success'] = false;
        $successNum = 0;
        //定义一个变量用以储存当前头像的序号
        $Member = D('Member');
        $i = 0;
        $msg = '';
        //上传目录
        $dir = "Uploads/avatar";
        //遍历所有文件域
        while (list($key, $val) = each($_FILES)) {
            if ($_FILES[$key]['error'] > 0) {
                $msg .= $_FILES[$key]['error'];
            } else {
                $fileName = date("YmdHis") . '_' . floor(microtime() * 1000) . '_' . createRandomCode(8);
                //原始图片(file 域的名称：__source，如果客户端定义可以上传的话，可在此处理）。
                if ($key == '__source') {
                    //当前头像基于原图的初始化参数，用于修改头像时保证界面的视图跟保存头像时一致。帮助提升用户体验度。修改头像时设置默认加载的原图的url为此图片的url+该参数即可。
                    $initParams = $_POST["__initParams"];
                    $virtualPath = "$dir/php_source_$fileName.jpg";
                    $result['sourceUrl'] = '/' . $virtualPath . $initParams;
                    move_uploaded_file($_FILES[$key]["tmp_name"], $virtualPath);
                    $successNum++;
                }
                //头像图片(file 域的名称：__avatar1,2,3...)。
                else if (strpos($key, '__avatar') === 0) {
                    $virtualPath = "$dir/avatar" . $i . "_$fileName.jpg";
                    $result['avatarUrls'][$i] = '/' . $virtualPath;
                    move_uploaded_file($_FILES[$key]["tmp_name"], $virtualPath);
                    $successNum++;
                    $i++;
                }
                $data['sourceavatar'] = $result['sourceUrl'];
                $data['avatar'] = $result['avatarUrls'][0]; //把大尺寸的图存进数据库中了
                $Member->where("id = $userId")->save($data);
                /*
                  else
                  {
                  如下代码在上传接口upload.php中定义了一个user=xxx的参数：
                  var swf = new fullAvatarEditor("swf", {
                  id: "swf",
                  upload_url: "Upload.php?user=xxx"
                  });
                  在此即可用$_POST["user"]获取xxx。
                  }
                 */
            }
        }
        $result['msg'] = $msg;
        if ($successNum > 0) {
            $result['success'] = true;
        }
        //返回图片的保存结果（返回内容为json字符串）
        print json_encode($result);
    }

    /**
     * 修改教育信息
     */
    public function educate() {
        if (!$this->ckUserLogin()) {
            $this->error('非法操作！', '/member/login.html');
        }
        $userId = session(C('USER_AUTH_KEY'));
        $Member = D('Member');
        if ($Member->create()) {
            if ($Member->where("id='$userId'")->save()) {
                $this->success('更改成功！');
            }
        }
    }

    /**
     * 工作信息
     */
    public function work() {
        if (!$this->ckUserLogin()) {
            $this->error('非法操作！', '/member/login.html');
        }
        $userId = session(C('USER_AUTH_KEY'));
        $Member = D('Member');
        if ($Member->create()) {
            if ($Member->where("id='$userId'")->save()) {
                $this->success('更改成功！');
            }
        }
    }

    /**
     * 会员中心
     */
    public function index() {
        if (!$this->ckUserLogin()) {
            $this->error('请先登录！', '/member/login.html');
        }

        $userId = session(C('USER_AUTH_KEY'));
        $username = session('LOGIN_NAME');
        $UserSee = D('UserSee');
        $Member = D('Member');
        $user = $Member->where("id = $userId")
                ->find();
        //查询当天观看记录
        $today = date('Y-m-d');
        $today = strtotime($today);
        $todaySee = $UserSee->table('db_user_see dbus')
                ->field('dbus.vid,dbus.seetime,dbv.title,dbv.photo')
                ->join("db_video dbv ON dbv.id = dbus.vid ")
                ->where("dbus.uid = $userId and dbus.seetime = '$today'")
                ->select();

        //查找更早的观看记录 也就是今天之前
        $agoSee = $UserSee->table('db_user_see dbus')
                ->field('dbus.vid,dbus.seetime,dbv.title,dbv.photo')
                ->join("db_video dbv ON dbv.id = dbus.vid ")
                ->where("dbus.uid = $userId and dbus.seetime < '$today'")
                ->select();

        $this->assign(array(
            'username' => $username,
            'todaySee' => $todaySee,
            'agoSee' => $agoSee,
            'user' => $user
        ));
        $this->display();
    }

    /**
     * 重设密码
     */
    public function resetPwd() {
        $username = I('user');
        $token = I('token');
        $Repwd = D('Repwd');  //找回密码表
        $ckRecord = $Repwd->where("username='$username'and token = '$token' and datediff(now(),sendtime) = 0 ")
                ->find();  //链接是合法的并且未过期的，发送时期与请求日期差为0天，即24小时内
        if ($ckRecord) {
            $id = $ckRecord['id'];
            $Repwd->delete($id);   //为保障该链接只能使用一次，成功请求后必须删除记录
            $username = I('user');
            $Member = D('Member');
            $ckUser = $Member->where("username = '$username'")->find();
            if ($ckUser) {
                $this->assign('username', $username);
            }
            $this->display();
        } else {
            $this->error('该链接不合法或已过期');
        }
    }

    /**
     * 重设密码结果页
     */
    public function resetPwdRs() {
        $username = I('username');
        $password = I('pwd');
        $Member = D('Member');
        $data['password'] = setPlainPassword($password);
        $updatePwd = $Member->where("username = '$username'")->save($data);
        if ($updatePwd) {
            $this->assign('output', '修改成功！');
            $this->display();
        } else {
            $this->error('修改失败！');
        }
    }

    /**
     * 找回密码
     */
    public function findPwd() {
        $this->display();
    }

    /**
     * 找回密码结果页
     */
    public function findPwdRs() {
        $email = I('email');
        $User = D('Member');
        $ckUser = $User->where("email = '$email'")->find();
        if ($ckUser) {
            $Repwd = D('Repwd');
            $ckRecord = $Repwd->where("email='$email' and datediff(now(),sendtime) = 0")->find();  //当天之内是否发送邮件过
            if (!$ckRecord) {  //如果没有记录就发送邮件
                $address = array(
                    array(
                        'address' => $email,
                        'name' => $ckUser['nickname']
                    )
                );
                $username = $ckUser['username'];
                $token = createToken();
                $url = "http://www.test.com/member/resetPwd?user=$username&token=$token";
                //以下赋值可以在邮件模版赋值输出，很神奇！！！哈哈~~#^_^#
                $this->assign('username', $username);
                $this->assign('nickname', $ckUser['nickname']);
                $this->assign('url', $url);
                $subject = '找回密码';
                $content = $this->fetch('Mail:mail');
                $data['username'] = $username;
                $data['email'] = $email;
                $data['token'] = $token;
                $data['sendtime'] = date('Y-m-d H:i:s');
                $rs = $Repwd->add($data);  //添加记录
                dump($Repwd->getLastSql());
                exit();
                $this->sendEmail($address, $subject, $content);
            }
            $this->assign('email', $ckUser['email']);
            $this->display();
        } else {
            $this->error('该邮箱不存在！');
        }
    }

    /**
     * 会员活动首页
     */
    public function hd() {
        if (!$this->ckUserLogin()) {
            $this->error('请先登录！', '/Member/login.html');
        }
        $Baby = D('baby');
        $userId = session(C('USER_AUTH_KEY'));
        $ckBaby = $Baby->where("mid = '$userId'")->find();
        if ($ckBaby) {
            $this->assign('join', TRUE);
        }
        $this->display();
    }

    /**
     * 会员活动资料管理页
     */
    public function hduif() {
        if (!$this->ckUserLogin()) {
            $this->error('请先登录！', '/Member/login.html');
        }
        $mid = session(C('USER_AUTH_KEY'));  //会员ID
        $Member = D('member');
        $user = $Member->where("id = '$mid'")->find();
        $Baby = D('baby');
        $baby = $Baby->where("mid = '$mid'")->find();
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/sevenbaby/babyshow/mod/mod/type/idnum/keyword/' . $baby['idnum'] . '.html';
        $this->assign(array(
            'baby' => $baby,
            'user' => $user,
            'url' => $url
        ));
        $this->display();
    }

    /**
     * 会员活动图片管理页
     */
    public function hdpic() {
        if (!$this->ckUserLogin()) {
            $this->error('请先登录！', '/Member/login.html');
        }
        $mid = session(C('USER_AUTH_KEY'));  //会员ID
        $Baby = D('baby');
        $baby = $Baby->where("mid = '$mid'")->find();
        $photos = $baby['photos'];
        if (empty($photos)) {
            $photos = array();
        } else {
            $photoArr = explode(',', $photos);
        }
        $this->assign(array(
            'baby' => $baby,
            'photos' => $photoArr
        ));
        $this->display();
    }

    /**
     * 账号激活页
     */
    public function activation() {
        $username = I('user');
        $password = I('pwd');
        $this->assign('username', $username);
        $this->assign('password', $password);
        $this->display();
    }

    /**
     * 处理激活页
     */
    public function doActiva() {
        $username = I('username');
        $password = I('password');
        Vendor('Ucenter.lib.UcService');  //引入Ucenter类
        $code = $_POST['code'];
        if (session('verify') != md5($code)) {
            $this->ajaxReturn(0, '验证码错误！', 0);
        }
        $Uc = new UcService();
        $user = $Uc->getUser($username);
        $Member = D('Member');
        $ckUser = $Member->where("username= '$username'")
                ->find();
        if ($ckUser) {
            session(C('USER_AUTH_KEY'), $Member->add());
            session('LOGIN_NAME', $username);
            $this->ajaxReturn(0, '该用户已激活过！', 1);
        }
        $data['username'] = $username;
        $data['password'] = $password;
        $data['email'] = $user['email'];
        $rs = $Member->add($data);
        if ($rs) {
            session(C('USER_AUTH_KEY'), $rs);
            session('LOGIN_NAME', $username);
            $this->ajaxReturn(1, '激活成功！', 1);
        } else {
            $this->ajaxReturn($Member->getError(), '发生错误', 0);
        }
    }

    /**
     * 第一届sevenbaby 会员密码设置页
     */
    public function lastFindPwd() {
        $this->display();
    }

    /**
     * 第一届sevenbaby 找回密码验证页
     */
    public function lastFindPwdSet() {
        $lastMember = new Model('competitor', 'v_');
        $username = I('username');
        $contact = I('contact');
        $ckMember = $lastMember->where("(username= '$username' or name = '$username') and (tel = '$contact' or memo2 = '$contact')")
                ->find();
        if ($ckMember) {
            $member = $lastMember->where("tel = '$contact' or memo2 = '$contact'")->find();
            $accname = $member['username'];
            $this->assign('token', $accname);
            $this->display();
        } else {
            $this->error('信息错误！');
        }
    }

    public function doLastFindPwd() {
        $username = I('token');
        $pwd = I('pwd2');
        $email = I('email');
        Vendor('Ucenter.lib.UcService');  //引入Ucenter类
        $regip = get_client_ip();
        $Uc = new UcService();
        $uid = $Uc->register($username, $pwd, $email, $regip);
        //ucenter 注册一次
        if (is_int($uid)) {
            //如果上面注册成功将返回一个int类型的数字 
            $Member = D('Member');
            if ($Member->create()) {
                $Member->username = $username;
                $Member->regip = $regip;
                $Member->password = setPlainPassword($pwd);
                $mid = $Member->add();
                if ($mid) {
                    $LastMember = new Model('competitor', 'v_');
                    $lastMember = $LastMember->where("username = '$username'")
                            ->find();
                    $oldmid = $lastMember['id'];
                    $Baby = D('Baby');
                    $data['mid'] = $mid;
                    $Baby->where("mid = '$oldmid'")->save($data);
                    //发站内信
                    $Msg = new MsgAction();
                    $summary = "为感谢你对Seven Baby活动的支持，现赠与你Seven Baby我们自己出品的声光安抚玩具，Seven Baby故事机200元的优惠券";
                    $param = array($this->userId, 'Seven Baby故事机200元优惠券来了', '2014-07-01 00:00:00', '2014-09-01 00:00:00', '1', '1', '', '健康卫视官方', $summary);
                    $Msg->sendMsg($param, true);
                    $this->success('重置成功！', '/member/login'); //本数据库注册一次
                } else {
                    $this->error($Member->getError());
                }
            } else {
                $this->error($Member->getError());
            }
        } else {
            $this->error($uid);
        }
    }

    /**
     * 成功页
     */
    public function lastFindPwdTrue() {
        $this->display();
    }

    /**
     * 失败页
     */
    public function lastFindPwdFalse() {
        $this->display();
    }

    /**
     * 消息页
     */
    public function news() {
        if (!$this->ckUserLogin()) {
            $this->error('请先登录！', '/Member/login.html');
        }
        $userId = session(C('USER_AUTH_KEY'));
        import("ORG.Util.Page2");
        $Msg = D('Msg');
        $msgCount = $Msg->where("oid =  '$userId' or oid = '全体'")
                ->count();
        $Page = new Page2($msgCount, 5, 3); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $show = $Page->pageShow();
        $msgs = $Msg->where("oid =  '$userId' or oid = '全体'")
                ->order('ctime desc')
                ->limit($Page->limit)
                ->select();
        $this->assign('count', $msgCount);
        $this->assign('msgs', $msgs);
        $this->assign('show', $show);
        $this->display();
    }

    public function newsview() {
        if (!$this->ckUserLogin()) {
            $this->error('请先登录！', '/Member/login.html');
        }
        $id = I('id');
        $Msg = D('Msg');
        $msg = $Msg->where("id = '$id'")->find();
        $this->assign('msg', $msg);
        $this->display();
    }

    public function seeMsg() {
        $Msg = D('Msg');
        $data['issee'] = '1';
        $userId = session(C('USER_AUTH_KEY'));
        $Msg->where("oid = '$userId' and isopen = '1'and issee = '0'")
                ->save($data);
    }

}
