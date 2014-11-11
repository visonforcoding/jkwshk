<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-9-2 12:22:25 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   微博相关
 */
class WeiboAction extends PublicAction {

    public function callback() {
        Vendor('Sdk.weibo.weibo');
        $wb_akey = C('WB_AKEY');
        $wb_skey = C('WB_SKEY');
        $wb_callback_url = C('WB_CALLBACK_URL');
        $o = new SaeTOAuthV2($wb_akey, $wb_skey);
        if (isset($_REQUEST['code'])) {
            $keys = array();
            $keys['code'] = $_REQUEST['code'];
            $keys['redirect_uri'] = $wb_callback_url;
            try {
                $token = $o->getAccessToken('code', $keys);
            } catch (OAuthException $e) {
                
            }
        }
        if ($token) {
            $_SESSION['token'] = $token;
            setcookie('weibojs_' . $o->client_id, http_build_query($token));
            $c = new SaeTClientV2($wb_akey, $wb_skey, $_SESSION['token']['access_token']);
            $uid_get = $c->get_uid();
            $uid = $uid_get['uid'];
            $userinfo = $c->show_user_by_id($uid); //根据ID获取用户等基本信息
            $username = 'w' . $userinfo['idstr'];
            $Member = D('Member');
            $ckLogin = $Member->where("username='$username'")->find(); //如果之前有用微博登录过，则无需创建本地账号信息，直接登录
            if ($ckLogin) {
                $userid = $ckLogin['id'];
                session(C('USER_AUTH_KEY'), $userid);
                session('LOGIN_NAME', $username);
                $this->success('登录成功！', '/Member/index');
            }
            Vendor('Ucenter.lib.UcService');  //引入Ucenter类
            $Uc = new UcService();
            $pwd = '123456';
            $regip = get_client_ip();
            $email = $userinfo['idstr'] . '@weibo.com';
            $uid = $Uc->register($username, $pwd, $email, $regip);
            if (is_int($uid)) {
                //如果上面注册成功将返回一个int类型的数字 
                $data['username'] = $username;
                $data['email'] = $email;
                $data['regtime'] = time();
                $data['regip'] = $regip;
                $data['password'] = setPlainPassword($pwd);
                $data['nickname'] = $userinfo['name'];
                $data['sex'] = $userinfo['gender'] = 'm' ? '男' : '女';
                $data['address'] = $userinfo['location'];
                $data['signer'] = $userinfo['description'];
                $data['avatar'] = $userinfo['avatar_large'];
                $ck = $Member->add($data);
                if ($ck) {
                    session(C('USER_AUTH_KEY'), $ck);
                    session('LOGIN_NAME', $username);
                    $this->success('登录成功！', '/Member/index');
                } else {
                    $this->error($Member->getError());
                }
            } else {
                $this->error($uid);
            }
        } else {
            $this->error('登录失败！');
        }
    }

    public function info() {
        Vendor('Sdk.weibo.weibo');
        $wb_akey = C('WB_AKEY');
        $wb_skey = C('WB_SKEY');
        $c = new SaeTClientV2($wb_akey, $wb_skey, $_SESSION['token']['access_token']);
//        $ms = $c->home_timeline(); // done
        $uid_get = $c->get_uid();
        $uid = $uid_get['uid'];
        $user_message = $c->show_user_by_id($uid); //根据ID获取用户等基本信息
        print_r($user_message);
    }

}
