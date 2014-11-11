<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-10 17:52:58 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   引入UCcenter库
 */
class UcService {

    public function __construct() {
        include_once APP_PATH . 'Conf/config_ucenter.php';
        include_once ROOT_PATH . 'uc_client/client.php';
    }

    /**
     *  UC注册用户
     * @param type $username
     * @param type $password
     * @param type $email
     * @param type $regip
     * @param type $questionid
     * @param type $answer
     * @return 注册成功则返回 注册ID ，失败则返回错误信息
     */
    public function register($username, $password, $email, $regip = null, $questionid = null, $answer = null) {
        $uid = uc_user_register($username, $password, $email, $questionid, $answer, $regip);
        if ($uid <= 0) {
            if ($uid == -1) {
                return '用户名不合法';
            } elseif ($uid == -2) {
                return '包含要允许注册的词语';
            } elseif ($uid == -3) {
                return '用户名已经存在';
            } elseif ($uid == -4) {
                return 'Email 格式有误';
            } elseif ($uid == -5) {
                return 'Email 不允许注册';
            } elseif ($uid == -6) {
                return '该 Email 已经被注册';
            } else {
                return '未定义';
            }
        } else {
            return $uid;
        }
    }

    /**
     * ucenter 登录
     * @param type $username  用户名/用户ID/用户邮箱
     * @param type $password  密码
     * @return string  登录成功则返回数组 包含用户ID 用户名 密码 邮箱，错误则返回错误信息
     */
    public function ucLogin($username, $password) {
        list($uid, $username, $password, $email) = uc_user_login($username, $password);
        if ($uid > 0) {
            return array(
                'uid' => $uid, //用户ID
                'username' => $username, //用户名
                'password' => $password, //密码
                'email' => $email  //邮箱
            );
        } elseif ($uid == -1) {
            return '用户不存在!';
        } elseif ($uid == -2) {
            return '密码错误！';
        } else {
            return '未定义!';
        }
    }

    /**
     * 
     * @param type $uid 用户ID
     * @return type 返回UC同步登录成功的html 代码
     */
    public function ucSynLogin($uid) {
        return uc_user_synlogin($uid);
    }

    /**
     * 
     * @return type 返回UC同步退出代码
     */
    public function ucSynLogout() {
        return uc_user_synlogout();
    }

    
    /**
     * 获取ucenter 用户信息
     * @param type $username
     * @return string
     */
    public function getUser($username) {
        $data = uc_get_user($username);
        if ($data) {
            list($uid, $username, $email) = $data;
            return array(
              'uid'=>$uid,
              'username'=>$username,
              'email'=>$email
            );
        } else {
            return  '用户不存在';
        }
    }

}
