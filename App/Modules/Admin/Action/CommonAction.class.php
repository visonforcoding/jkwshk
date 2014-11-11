<?php

class CommonAction extends Action {

    function _initialize() {
        //检查认证识别号
        if ('public' != strtolower(MODULE_NAME)) {
            if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
                redirect(__GROUP__ . '/Public/login');
            }
            $cwp_hello = getCwpHello();
            $this->assign('cwp_hello', $cwp_hello);
            if (!$this->isAjax()) {
                $this->recordLog();
            }
        }
        $this->setUserSession();
    }

    public function index() {
        //列表过滤器，生成查询Map对象
        $map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $name = $this->getActionName();
        $Model = D($name);
        if (!empty($Model)) {
            $this->_list($Model, $map);
        }
        $this->display();
        return;
    }

    /**
      +----------------------------------------------------------
     * 取得操作成功后要返回的URL地址
     * 默认返回当前模块的默认操作
     * 可以在action控制器中重载
      +----------------------------------------------------------
     * @access public
      +----------------------------------------------------------
     * @return string
      +----------------------------------------------------------
     * @throws ThinkExecption
      +----------------------------------------------------------
     */
    function getReturnUrl() {
        return __URL__ . '?' . C('VAR_MODULE') . '=' . MODULE_NAME . '&' . C('VAR_ACTION') . '=' . C('DEFAULT_ACTION');
    }

    /**
      +----------------------------------------------------------
     * 根据表单生成查询条件
     * 进行列表过滤
      +----------------------------------------------------------
     * @access protected
      +----------------------------------------------------------
     * @param string $name 数据对象名称
      +----------------------------------------------------------
     * @return HashMap
      +----------------------------------------------------------
     * @throws ThinkExecption
      +----------------------------------------------------------
     */
    protected function _search($name = '') {
        //生成查询条件
        if (empty($name)) {
            $name = $this->getActionName();
        }
        // $name = $this->getActionName();
        $Model = D($name);
        $map = array();
        foreach ($Model->getDbFields() as $key => $val) {
            if (isset($_REQUEST [$val]) && $_REQUEST [$val] != '') {
                $map [$val] = $_REQUEST [$val];
            }
        }
        return $map;
    }

    /**
      +----------------------------------------------------------
     * 根据表单生成查询条件
     * 进行列表过滤
      +----------------------------------------------------------
     * @access protected
      +----------------------------------------------------------
     * @param Model $Model 数据对象
     * @param HashMap $map 过滤条件
     * @param string $sortBy 排序
     * @param boolean $asc 是否正序
      +----------------------------------------------------------
     * @return void
      +----------------------------------------------------------
     * @throws ThinkExecption
      +----------------------------------------------------------
     */
    protected function _list($Model, $map, $sortBy = '', $asc = false) {
        //排序字段 默认为主键名
        if (isset($_REQUEST ['_order'])) {
            $order = $_REQUEST ['_order'];
        } else {
            $order = !empty($sortBy) ? $sortBy : $Model->getPk();
        }
        //排序方式默认按照倒序排列
        //接受 sost参数 0 表示倒序 非0都 表示正序
        if (isset($_REQUEST ['_sort'])) {
            $sort = $_REQUEST ['_sort'] ? 'asc' : 'desc';
        } else {
            $sort = $asc ? 'asc' : 'desc';
        }
        //取得满足条件的记录数
        $count = $Model->where($map)->count('id');
        if ($count > 0) {
            import("@.ORG.Util.Page");
            //创建分页对象
            if (!empty($_REQUEST ['listRows'])) {
                $listRows = $_REQUEST ['listRows'];
            } else {
                $listRows = '';
            }
            $p = new Page($count, $listRows);
            //分页查询数据

            $voList = $Model->where($map)->order("`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->select();
            //echo $Model->getlastsql();
            //分页跳转的时候保证查询条件
            foreach ($map as $key => $val) {
                if (!is_array($val)) {
                    $p->parameter .= "$key=" . urlencode($val) . "&";
                }
            }
            //分页显示
            $page = $p->show();
            //列表排序显示
            $sortImg = $sort; //排序图标
            $sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列'; //排序提示
            $sort = $sort == 'desc' ? 1 : 0; //排序方式
            //模板赋值显示
            $this->assign('list', $voList);
            $this->assign('sort', $sort);
            $this->assign('order', $order);
            $this->assign('sortImg', $sortImg);
            $this->assign('sortType', $sortAlt);
            $this->assign("page", $page);
        }
        cookie('_currentUrl_', __SELF__);
        return;
    }

    function insert() {
        $name = $this->getActionName();
        $Model = D($name);
        if (false === $Model->create()) {
            $this->error($Model->getError());
        }
        //保存当前数据对象
        $list = $Model->add();
        if ($list !== false) { //保存成功
            $this->success('新增成功!', cookie('_currentUrl_'));
        } else {
            //失败提示
            $this->error('新增失败!');
        }
    }

    function read() {
        $this->edit();
    }

    function edit() {
        $name = $this->getActionName();
        $Model = M($name);
        $id = $_REQUEST [$Model->getPk()];
        $vo = $Model->getById($id);
        $this->assign('vo', $vo);
        $this->display();
    }

    function update() {
        $name = $this->getActionName();
        $Model = D($name);
        if (false === $Model->create()) {
            $this->error($Model->getError());
        }
        // 更新数据
        $list = $Model->save();
        if (false !== $list) {
            //成功提示
            $this->success('编辑成功!', cookie('_currentUrl_'));
        } else {
            //错误提示
            $this->error('编辑失败!');
        }
    }

    /**
      +----------------------------------------------------------
     * 默认删除操作
      +----------------------------------------------------------
     * @access public
      +----------------------------------------------------------
     * @return string
      +----------------------------------------------------------
     * @throws ThinkExecption
      +----------------------------------------------------------
     */
    public function delete() {
        //删除指定记录
        $name = $this->getActionName();
        $Model = M($name);
        if (!empty($Model)) {
            $pk = $Model->getPk();
            $id = $_REQUEST [$pk];
            if (isset($id)) {
                $condition = array($pk => array('in', explode(',', $id)));
                $list = $Model->where($condition)->setField('status', - 1);
                if ($list !== false) {
                    $this->success('删除成功！');
                } else {
                    $this->error('删除失败！');
                }
            } else {
                $this->error('非法操作');
            }
        }
    }

    public function foreverdelete() {
        //删除指定记录
        $name = $this->getActionName();
        $Model = D($name);
        if (!empty($Model)) {
            $pk = $Model->getPk();
            $id = $_REQUEST [$pk];
            if (isset($id)) {
                $condition = array($pk => array('in', explode(',', $id)));
                if (false !== $Model->where($condition)->delete()) {
                    $this->success('删除成功！');
                } else {
                    $this->error('删除失败！');
                }
            } else {
                $this->error('非法操作');
            }
        }
        $this->forward();
    }

    public function clear() {
        //删除指定记录
        $name = $this->getActionName();
        $Model = D($name);
        if (!empty($Model)) {
            if (false !== $Model->where('status=1')->delete()) {
                $this->success(L('_DELETE_SUCCESS_'), $this->getReturnUrl());
            } else {
                $this->error(L('_DELETE_FAIL_'));
            }
        }
        $this->forward();
    }

    /**
      +----------------------------------------------------------
     * 默认禁用操作
     *
      +----------------------------------------------------------
     * @access public
      +----------------------------------------------------------
     * @return string
      +----------------------------------------------------------
     * @throws FcsException
      +----------------------------------------------------------
     */
    public function forbid() {
        $name = $this->getActionName();
        $Model = D($name);
        $pk = $Model->getPk();
        $id = $_REQUEST [$pk];
        $condition = array($pk => array('in', $id));
        $list = $Model->forbid($condition);
        if ($list !== false) {
            $this->success('状态禁用成功', $this->getReturnUrl());
        } else {
            $this->error('状态禁用失败！');
        }
    }

    public function checkPass() {
        $name = $this->getActionName();
        $Model = D($name);
        $pk = $Model->getPk();
        $id = $_GET [$pk];
        $condition = array($pk => array('in', $id));
        if (false !== $Model->checkPass($condition)) {
            $this->success('状态批准成功！', $this->getReturnUrl());
        } else {
            $this->error('状态批准失败！');
        }
    }

    public function recycle() {
        $name = $this->getActionName();
        $Model = D($name);
        $pk = $Model->getPk();
        $id = $_GET [$pk];
        $condition = array($pk => array('in', $id));
        if (false !== $Model->recycle($condition)) {
            $this->success('状态还原成功！', $this->getReturnUrl());
        } else {
            $this->error('状态还原失败！');
        }
    }

    public function recycleBin() {
        $map = $this->_search();
        $map ['status'] = - 1;
        $name = $this->getActionName();
        $Model = D($name);
        if (!empty($Model)) {
            $this->_list($Model, $map);
        }
        $this->display();
    }

    /**
      +----------------------------------------------------------
     * 默认恢复操作
     *
      +----------------------------------------------------------
     * @access public
      +----------------------------------------------------------
     * @return string
      +----------------------------------------------------------
     * @throws FcsException
      +----------------------------------------------------------
     */
    function resume() {
        //恢复指定记录
        $name = $this->getActionName();
        $Model = D($name);
        $pk = $Model->getPk();
        $id = $_GET [$pk];
        $condition = array($pk => array('in', $id));
        if (false !== $Model->resume($condition)) {
            $this->success('状态恢复成功！', $this->getReturnUrl());
        } else {
            $this->error('状态恢复失败！');
        }
    }

    function saveSort() {
        $seqNoList = $_POST ['seqNoList'];
        if (!empty($seqNoList)) {
            //更新数据对象
            $name = $this->getActionName();
            $Model = D($name);
            $col = explode(',', $seqNoList);
            //启动事务
            $Model->startTrans();
            foreach ($col as $val) {
                $val = explode(':', $val);
                $Model->id = $val [0];
                $Model->sort = $val [1];
                $result = $Model->save();
                if (!$result) {
                    break;
                }
            }
            //提交事务
            $Model->commit();
            if ($result !== false) {
                //采用普通方式跳转刷新页面
                $this->success('更新成功');
            } else {
                $this->error($Model->getError());
            }
        }
    }

    public function recordLog() {
        $Log = D('Log');
        $data['userid'] = session(C('USER_AUTH_KEY'));
        $data['action'] = __ACTION__;
        $data['ip'] = get_client_ip();
        $data['ctime'] = date('Y-m-d H:i:s');
        $Log->add($data);
    }

    /**
     * 设置session
     */
    public function setUserSession() {
        if (isset($_SESSION[C('USER_AUTH_KEY')])) {
            $adminId = $_SESSION[C('USER_AUTH_KEY')];
            $this->assign('adminId', $adminId);
            $Admin = D('Admin');
            $ADMIN = $Admin->find($adminId);
            $NICKNAME = $ADMIN['nickname'];
            $avatar = $ADMIN['avatar'];
            session('ADMIN', $ADMIN);
            session('NICKNAME', $NICKNAME);
            session('AVATAR', $avatar);
        }
    }

    /**
     *  发送邮件函数   支持群发
     * @param array $address  
     * array(array(
     *      'address'=>$address,
     *      'name' => $name
     *        )
     *        )
     * @param type $subject  邮件主题
     * @param type $content   邮件内容
     * @param type $attachment  附件
     */
    function sendEmail(array $address, $subject, $content, $attachment = null) {
        Vendor('My.phpmailer.PHPMailerAutoload');
        $mail = new PHPMailer(); //new一个PHPMailer对象出来
        $mail->isSMTP();     // 使用SMTP协议
        $mail->Charset = "UTF-8";  //编码
        $mail->Host = 'mail.jkwshk.com';  // Specify main and backup server
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'jkws_acct_ww';                            // SMTP username
        $mail->Password = 'jkws@126';                           // SMTP password
        // $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
        $mail->From = 'jkws_acct_ww@jkwshk.com';
        $mail->FromName = '健康卫视';
        foreach ($address as $value) {
            $add = $value['address'];
            $name = $address['name'];
            $mail->addAddress($add, $name);
        }
        //$mail->addReplyTo('info@example.com', 'Information');
        if (!empty($attachment)) {
            $mail->addAttachment($attachment);         // Add attachments
        }
        $mail->isHTML(true); // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body = "$content";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            Log::write('邮件发送错误：' . $mail->ErrorInfo, Log::ERR);
        }
    }

    /**
     * 根据路径获取目录图片
     * @param string $path
     * @return string
     */
    function getPic($path) {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $truePath = $root . $path;
        $fileHandle = scandir($truePath);
        $imgType = array('jpg', 'png', 'gif', 'JPG');
        foreach ($fileHandle as $value) {
            if ($value != '.' && $value != '..') {
                if (!is_dir($value)) {
                    $fileType = getFileType($value);
                    if (in_array($fileType, $imgType)) {
                        $pic = $path . $value;
                        $output[] = $pic;
                    }
                }
            }
        }
        return $output;
    }

}
