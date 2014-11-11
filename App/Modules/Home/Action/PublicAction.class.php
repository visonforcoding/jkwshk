<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-10 20:47:49 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   公共类
 */
class PublicAction extends Action {

    public function __construct() {
        parent::__construct();
        $this->setSessionInfo();
    }

    public function _empty() {
        header("HTTP/1.0 404 Not Found"); //使HTTP返回404状态码 
        $this->display("Public:404");
    }

    /**
     * 验证码
     */
    Public function verify() {
        ob_clean(); //ob_clean函数 清空先前输出
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }

    /**
     * 中文验证码
     */
    public function gbVerify() {
        ob_clean();
        import("ORG.Util.Image");
        Image::GBVerify(4, 'png', 180, 50, 'msyhbd.ttf', 'gbverify');
    }

    public function newverify() {
        ob_clean();
        import("ORG.Util.Verify");
        $Verify = new Verify();
        $Verify->useZh = true;
        // 设置验证码字符
        $Verify->zhSet = '们以我慧到他会作时要动国产的一是工就燕年阶义发成汤部民可出能桓方进在了青不和有昊大这穗楚汉愈绿拖牛份染既秋遍锻玉夏疗尖殖井费州访吹荣铜沿替滚客召旱悟刺脑措贯藏敢令隙炉壳硫煤迎铸粘探临薄旬善福纵择礼愿伏残雷延烟句纯';
        $Verify->entry();
    }

    /**
     * 检测用户登录
     * @return boolean
     */
    public function ckUserLogin() {
        $AUTH_KEY = C('USER_AUTH_KEY');
        $authKey = session($AUTH_KEY);
        $COOKIE_USER_NAME = cookie('USER_NAME');
        $COOKIE_USER_PWD = cookie('USER_PWD');
        if (empty($authKey)) {
            if (empty($COOKIE_USER_NAME) || empty($COOKIE_USER_PWD)) {
                return false;
            } else {
                $ckUser = $this->ckUser($COOKIE_USER_NAME, $COOKIE_USER_PWD);
                if (!is_array($ckUser)) {
                    return false;
                } else {
                    session($AUTH_KEY, $ckUser['id']);
                    return TRUE;
                }
            }
            return false;
        } else {
            return TRUE;
        }
    }

    /**
     * 检测cookie 是否合法
     * @param type $username
     * @param type $password
     * @return boolean
     */
    public function ckUser($username, $password) {
        $Member = D('Member');
        $pwd = setPlainPassword($password);

        $ckUser = $Member->where("username = '$username' or email = '$username' and  password = '$pwd'")
                ->find();

        if (is_array($ckUser)) {
            return $ckUser;
        } else {
            return FALSE;
        }
    }

    public function setSessionInfo() {
        $ck = $this->ckUserLogin();
        if ($ck) {
            $userId = session(C('USER_AUTH_KEY'));
            $Member = D('Member');
            $user = $Member->where("id = $userId")
                    ->find();
            $this->assign('user', $user);
            return true;
        } else {
            return false;
        }
    }

    /**
     * 输出评论表
     * @param type $oid
     * @param type $ctype
     */
    public function showComment($oid, $ctype) {
        //评论区域开始
        $Comment = D('Comment');
        $this->setSessionInfo(); //设置session
        $totalComCount = $Comment->table('db_comment dbc')
                ->join('db_member dbm ON dbm.id = dbc.uid')
                ->where("dbc.oid =$oid and dbc.category = '$ctype'")
                ->count();  //总记录数

        $comUserRs = $Comment->table('db_comment dbc')
                ->join('db_member dbm ON dbm.id = dbc.uid')
                ->where("dbc.oid =$oid and dbc.category = '$ctype'")
                ->group('dbc.uid')
                ->select();
        $comUserCount = count($comUserRs);
        import('ORG.Util.Page2'); // 导入分页类
        $Page = new Page2($totalComCount, 10, 3); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $show = $Page->pageShow();
        $comRs = $Comment->table('db_comment dbc')
                ->field('dbc.id as cid,dbc.pid as cpid,dbm.id as uid,dbm.nickname,dbm.username,dbm.avatar'
                        . ',dbc.msg,dbc.country,dbc.province,dbc.city,dbc.ctime')
                ->join('db_member dbm ON dbm.id = dbc.uid')
                ->where("dbc.oid =$oid and dbc.category = '$ctype'")
                ->order('ctime desc')
                ->limit($Page->limit)
                ->select();  //当前视频评论数据

        $this->assign(array(
            'comUserCount' => $comUserCount,
            'totalComCount' => $totalComCount,
            'comments' => $comRs,
            'show' => $show
        ));
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
     * ajax 验证验证码
     */
    public function ckVerify() {
        $code = I('code');
        if (session('verify') != md5($code)) {
            $this->ajaxReturn(0, '验证码错误', 0);
        }
    }

}
