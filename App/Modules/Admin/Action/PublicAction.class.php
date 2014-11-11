<?php

class PublicAction extends Action {

    // 检查用户是否登录
    protected function checkUser() {
        if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
            $this->error('没有登录', __GROUP__ . '/Public/login');
        }
    }

    // 顶部页面
    public function top() {
        C('SHOW_RUN_TIME', false);   // 运行时间显示
        C('SHOW_PAGE_TRACE', false);
        $this->display();
    }

    public function drag() {
        C('SHOW_PAGE_TRACE', false);
        C('SHOW_RUN_TIME', false);   // 运行时间显示
        $this->display();
    }

    // 公共头部页面
    public function header() {
        C('SHOW_RUN_TIME', false);   // 运行时间显示
        C('SHOW_PAGE_TRACE', false);
        $this->display();
    }

    // 尾部页面
    public function footer() {
        C('SHOW_RUN_TIME', false);   // 运行时间显示
        C('SHOW_PAGE_TRACE', false);
        $this->display();
    }

    // 菜单页面
    public function menu() {
        $this->checkUser();
        C('SHOW_RUN_TIME', false);   // 运行时间显示
        C('SHOW_PAGE_TRACE', false);
        $this->display();
    }

    // 用户登录页面
    public function login() {
        if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function index() {
        //如果通过认证跳转到首页
        if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
            $this->redirect('Index/index');
        } else {
            $this->redirect('public/login');
        }
    }

    // 用户登出
    public function logout() {
        if (isset($_SESSION[C('USER_AUTH_KEY')])) {
            unset($_SESSION[C('USER_AUTH_KEY')]);
            unset($_SESSION);
            session_destroy();
            $this->success('登出成功！', __URL__ . '/login/');
        } else {
            $this->error('已经登出！');
        }
    }

    // 登录检测
    public function checkLogin() {
        if (empty($_POST['account'])) {
            $this->error('帐号不能为空！');
        } elseif (empty($_POST['password'])) {
            $this->error('密码不能为空！');
        }
        /* elseif (empty($_POST['verify'])){
          $this->error('验证码必须！');
          } */
        //生成认证条件
        $map = array();
        // 支持使用绑定帐号登录
        $map['account'] = $_POST['account'];
        $map["isopen"] = array('gt', 0);
        /*
          if(session('verify') != md5($_POST['verify'])) {
          $this->error('验证码错误！');
          }
         */
        $Admin = D("AdminView");
        $authInfo = $Admin->where($map)->find();
        //使用用户名、密码和状态的方式进行认证
        //status=> 1正确2密码错误3已被拉黑4用户不存在5验证码错误
        $ip = get_client_ip();
        $log = D('AdminLog');
        import("@.ORG.Util.GetMac");
        //获取mac地址
        $mac = new GetMac(PHP_OS);
        $arrmac = $mac->mac_addr;
        $arrlog['name'] = $_POST['account'];
        $arrlog['time'] = time();
        $arrlog['ip'] = $ip;
        $arrlog['mac'] = $arrmac;
        if (false === $authInfo) {
            $arrlog['status'] = 4;
            $log->add($arrlog);
            $this->error('帐号不存在！');
        } elseif ($authInfo['isopen'] == 0) {
            $arrlog['status'] = 3;
            $log->add($arrlog);
            $this->error('帐号已禁用！');
        } else {
            if ($authInfo['password'] != md5($_POST['password'])) {
                $arrlog['status'] = 2;
                $log->add($arrlog);
                $this->error('密码错误！');
            }
            //$_SESSION[C('USER_AUTH_KEY')] = $authInfo['id'];
            session(array('name' => C('USER_AUTH_KEY'), 'expire' => 3600 * 8)); //设置8小时，有待考究
            session(C('USER_AUTH_KEY'), $authInfo['id']);
            $_SESSION['email'] = $authInfo['email'];
            $_SESSION['loginUserName'] = $authInfo['gname'];
            $_SESSION['loginName'] = $authInfo['account'];
            $_SESSION['loginNickName'] = $authInfo['nickname'];

            $_SESSION['lastLoginTime'] = $authInfo['last_login_time'];
            $_SESSION['login_count'] = $authInfo['login_count'];
            $_SESSION['lastLoginIp'] = $authInfo['last_login_ip'];
            if ($authInfo['gid'] == '1') {//判断是否为超级管理员
                $_SESSION['administrator'] = true;
            }
            $_SESSION['admin'] = 1; //管理员的标志
            //保存登录信息
            $User = M('Admin');
            $time = time();
            $_SESSION['nowLoginIp'] = $ip;
            $_SESSION['loginTime'] = $time;
            $data = array();
            $data['id'] = $authInfo['id'];
            $data['last_login_time'] = $time;
            $data['login_count'] = array('exp', 'login_count+1');
            $data['last_login_ip'] = $ip;
            $User->save($data);
            //记录登录状态日志
            $arrlog['status'] = 1;
            $log->add($arrlog);
            //echo $log->getLastSql();//输出sql语句
            $this->success('登录成功！', __GROUP__ . '/Index/index');
        }
    }

    // 更换密码
    public function changePwd() {
        $this->checkUser();
        //对表单提交处理进行处理或者增加非表单数据
        if (md5($_POST['verify']) != $_SESSION['verify']) {
            $this->error('验证码错误！');
        }
        $map = array();
        $map['password'] = md5($_POST['oldpassword']);
        if (isset($_POST['account'])) {
            $map['account'] = $_POST['account'];
        } elseif (isset($_SESSION[C('USER_AUTH_KEY')])) {
            $map['id'] = $_SESSION[C('USER_AUTH_KEY')];
        }
        //检查用户
        $User = M("Admin");
        if (!$User->where($map)->field('id')->find()) {
            $this->error('旧密码不符或者用户名错误！');
        } else {
            $User->password = md5($_POST['password']);
            $User->save();
            $this->success('密码修改成功！');
        }
    }

    public function profile() {
        $this->checkUser();
        $User = M("Admin");
        $vo = $User->getById($_SESSION[C('USER_AUTH_KEY')]);
        $this->assign('vo', $vo);
        $this->display();
    }

    public function verify() {
        $type = isset($_GET['type']) ? $_GET['type'] : 'gif';
        import("@.ORG.Util.Image");
        Image::buildImageVerify(4, 1, $type);
    }

    // 修改资料
    public function change() {
        $this->checkUser();
        $User = D("Admin");
        if (!$User->create()) {
            $this->error($User->getError());
        }
        $result = $User->save();
        if (false !== $result) {
            $this->success('资料修改成功！');
        } else {
            $this->error('资料修改失败!');
        }
    }

    public function demo() {
        $id = I('id');

        $this->assign('id', $id);
        $this->display();
    }

    /**
     *  用phpexcel读取excel
     * @param type $filePath
     * @return boolean
     */
    public function readExcel($filePath) {
        Vendor('Phpexcel.lib.PHPExcel');  //引入Ucenter类
        $PHPReader = new PHPExcel_Reader_Excel2007();
        //建立reader对象
        if (!$PHPReader->canRead($filePath)) {
            $PHPReader = new PHPExcel_Reader_Excel5();
            if (!$PHPReader->canRead($filePath)) {
                $msg = '读取出错';
                return false;
            }
        }
        //建立excel对象，此时你即可以通过excel对象读取文件，也可以通过它写入文件
        $PHPExcel = $PHPReader->load($filePath);
        //读取excel文件中的第一个工作表 
        $currentSheet = $PHPExcel->getSheet(0);
        $allColumn = $currentSheet->getHighestColumn();
        $allRow = $currentSheet->getHighestRow();
        for ($rowIndex = 3; $rowIndex <= $allRow; $rowIndex++) {//行
            for ($colIndex = 'B'; $colIndex <= $allColumn; $colIndex++) {//列
                $addr = $colIndex . $rowIndex;
                $plan_timeS = $currentSheet->getCell('A' . $rowIndex)->getValue(); //取得开始播放时间被格式过的
                $parogramS = $currentSheet->getCell($addr)->getValue();  //节目名
                $flag = substr($plan_timeS, 0, 1);
                if ($flag == 'a') {      //带a的为第一天的，其余的为第二天的
                    $date = $currentSheet->getCell($colIndex . '2')->getValue(); //取得第一行的数据日期+星期
                    $dateArr = explode('|', $date);
                    $plan_date = $dateArr[1]; //播出日期
                    $remarks = $dateArr[0]; //星期
                    $plan_time = substr($plan_timeS, 1);   //今天的视频的播放时间
                } else {
                    $afterColNum = ord($colIndex) + 1;  //列字母对应的ASCII码
                    $afterCol = chr($afterColNum);    //对应ASCCII码对应的字符
                    $afterDay = $currentSheet->getCell($afterCol . '2')->getValue(); //时间就是第二天的播出时间了
                    $dateArr = explode('|', $afterDay);
                    $plan_date = $dateArr[1]; //播出日期
                    $remarks = $dateArr[0]; //星期
                    $plan_time = $plan_timeS;  //今天的视频的播放时间
                }
                $parogramArr = explode('#', $parogramS, 2);
                $column = $parogramArr[0];
                $name = $parogramArr[1];
                $data['column'] = $column;
                //  $data['name'] = empty($name)? $column:$name;
                $data['name'] = $name;
                $data['plandate'] = $plan_date;
                $data['plantime'] = $plan_time;
                $data['week'] = $remarks;
                if (!empty($column) && !empty($plan_time) && in_array($remarks, $weeks)) {
                    $Live->add($data);
                }
            }
        }
    }

    /**
     * 
     * @param type $filePath
     * @return \Spreadsheet_Excel_Reader
     */
    public function excelRead($filePath) {
        Vendor('ExcelReader.lib.excel_reader2');  //引入excel_reader
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('utf-8');
        $data->read($filePath);
        error_reporting(E_ALL ^ E_NOTICE);
        return $data;
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

}
