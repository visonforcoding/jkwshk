<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-14 20:12:48 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   评论模块
 */
class CommentAction extends PublicAction {

    public function addComment() {

        $username = I('username');
        $pwd = I('password');
        $remember = I('remember');
        if (!empty($username) && !empty($pwd)) {
            $Member = D('Member');
            $password = setPlainPassword($pwd);
            $ckUser = $Member->where("username = '$username' and password = '$password'")
                    ->find();
            if (!$ckUser) {
                $this->ajaxReturn(1, '用户名或密码不正确！', 0);
            } else {
                if ($remember) {
                    cookie('USER_NAME', $username, 3600 * 24 * 30);
                    cookie('USER_PWD', $password, 3600 * 24 * 30);
                }
                $userId = $ckUser['id'];
                session(C('USER_AUTH_KEY'), $userId);
                session('LOGIN_NAME', $username);
            }
        }
        $Comment = D('Comment');
        $data['uid'] = session(C('USER_AUTH_KEY'));
        $data['oid'] = I('oid');
        $data['pid'] = 0;
        $data['msg'] = $_REQUEST['msg'];
        $data['category'] = I('ctype');
        $data['ip'] = get_client_ip();
        $data['country'] = getRealAddress(get_client_ip())->data->country;
        $data['province'] = getRealAddress(get_client_ip())->data->region;
        $data['city'] = getRealAddress(get_client_ip())->data->city;
        $data['ctime'] = time();
        $add = $Comment->add($data);
        if ($add) {
            $data['time'] = date('Y-m-d H:i:s', $data['ctime']);
            $comment = $Comment->where("id = $add")->find();
            $data['id'] = $add;
            $data['support'] = $comment['support'];
            $this->ajaxReturn($data, '评论成功', 1);
        } else {
            echo $Comment->getLastSql();
        }
    }

}
