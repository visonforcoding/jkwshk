<?php

// 管理员模型
class AdminModel extends CommonModel {

    public $_validate = array(
        //0存在就验证1必须验证2值不为空时验证
        array('account', '/^[a-z]\w{3,}$/i', '帐号格式错误'),
        array('password', 'require', '密码必须填写', 2),
        array('repassword', 'require', '确认密码必须填写', 2),
        array('repassword', 'password', '确认密码不一致', 2, 'confirm'),
        array('account', '', '帐号已经存在', 1, 'unique', 1), //1新增时验证2编辑时验证3全部情况都验证
    );
    public $_auto = array(
        array('password', 'pwdHash', self::MODEL_BOTH, 'callback'),
        array('create_time', 'time', self::MODEL_INSERT, 'function'),
        array('update_time', 'time', self::MODEL_UPDATE, 'function'),
    );

    protected function pwdHash() {
        $password = $_POST['password'];
        if (isset($password)&&!empty($password)) {
            return md5($_POST['password']);
        } else {
            return false;
        }
    }

}
