<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-27 14:52:17 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   sevenbaby活动板块
 */
class SevenbabyAction extends PublicAction {

    protected $userId;

    public function __construct() {
        parent::__construct();
        $userId = session(C('USER_AUTH_KEY'));
        $this->userId = $userId;
        $this->assign('userId', $userId);
    }

    /**
     * 首页
     */
    public function index() {
        $username = I('username');
        $password = I('password');
        $loginflag = I('loginflag');
        if (!empty($loginflag)) {
            $this->doLogin($username, $password);
        }
        $Baby = D('Baby');
        $newBabys = $Baby->order('regtime desc')->limit(9)->select(); //最新注册
        foreach ($newBabys as $key => $value) {
            $newBabys[$key]['ebid'] = randuid($value['id']);
            $quarter = $value['quarter'];
            if ($quarter != '1') {
                $birthday = $value['birthday'];
                $newBabys[$key]['age'] = age_from_dob($birthday);
            }
        }

        //活动视频
        $VideoCat = D('VideoCat');
        $Video = D('Video');
        $hdCat = $VideoCat->where("name = '分期观看' and isopen = '1'")
                ->find();

        $hdCatId = $hdCat['id'];

        $hdVideo = $Video->where("pid = '$hdCatId'")
                ->order('addtime desc,updatetime desc')
                ->find();

        //论坛帖子
        $babyBbsTidRs = M("dz_forum_forum", "dz_", C('DB_BBS'))
                ->query("select fid from dz_forum_forum where name = '第二届Seven Baby'");
        $babyBbsfid = $babyBbsTidRs[0]['fid'];
        $bbs = M("forum_post", "dz_", C('DB_BBS'))
                ->query("select * from dz_forum_post where first = '1' and invisible >= 0 and fid = '$babyBbsfid' order by dateline desc limit 0,20");
        foreach ($bbs as $key => $value) {
            $bbs[$key]['url'] = 'http://' . C('BBS_HOST') . '/forum.php/?mod=viewthread&tid=' . $value['tid'] . '#lastpost';
        }


        $this->assign(array(
            'hdVideo' => $hdVideo,
            'bbs' => $bbs,
            'newBabys' => $newBabys,
      
        ));
        $this->display();
    }

    /**
     * 活动新闻
     */
    public function news() {
        $username = I('username');
        $password = I('password');
        $loginflag = I('loginflag');
        if (!empty($loginflag)) {
            $this->doLogin($username, $password);
        }
        $id = I('id');
        $News = D('news');
        $NewsCat = D('News_cat');
        $babynewsCat = $NewsCat->where("name = 'Seven baby'")->find();
        $babynewsCatId = $babynewsCat['id'];
        $babyNews = $News->where("pid = '$babynewsCatId'")
                ->order('time desc')
                ->select();
        if (empty($id)) {
            $curNews = $News->where("pid = '$babynewsCatId'")
                    ->order('time desc')
                    ->find();
        } else {
            $curNews = $News->where("id = '$id'")->find();
            if (!$curNews) {
                $this->_empty();
                return;
            }
        }
        //更新浏览量
        $News->where("id = '$id'")->setInc('click');

        //更新单日点击量
        $today = date("Y-m-d", time());
        $today = strtotime($today);
        $News_hits = D('news_hits');
        $ckHits = $News_hits
                ->where("newsid = '$id'and time='$today'")
                ->find();
        if (!$ckHits) {
            $newHitsData['newsid'] = $id;
            $newHitsData['time'] = $today;
            $newHitsData['hits'] = 1;
            $News_hits->add($newHitsData);
        } else {
            //判断如果已经存在点击就是更新
            $News_hits->where("newsid = '$id'")
                    ->setInc('hits'); //字段加1
        }
        //分割图片tag 获取标签信息
        $tagList = $curNews['tagid'];
        $tagListArr = explode(',', $tagList);
        $newTagList = array();
        foreach ($tagListArr as $key => $value) {
            $newTagListArr = explode('|', $value);
            $newTagList[$key]['tagid'] = trim($newTagListArr[0]);
            $newTagList[$key]['tagname'] = trim($newTagListArr[1]);
        }
        $this->assign('tagList', $newTagList);
        $this->assign('curNews', $curNews);
        $this->assign('babyNews', $babyNews);
        $this->display();
    }

    /**
     * 活动规则
     */
    public function rule() {
        $username = I('username');
        $password = I('password');
        $loginflag = I('loginflag');
        if (!empty($loginflag)) {
            $this->doLogin($username, $password);
        }
        $this->display();
    }

    /**
     * 奖励机制
     */
    public function incentives() {
        $username = I('username');
        $password = I('password');
        $loginflag = I('loginflag');
        if (!empty($loginflag)) {
            $this->doLogin($username, $password);
        }
        $this->display();
    }

    /**
     * 宝贝show
     */
    public function babyshow() {
        $username = I('username');
        $password = I('password');
        $loginflag = I('loginflag');
        if (!empty($loginflag)) {
            $this->doLogin($username, $password);
        }
        $Baby = D('Baby');
        $type = I('type');  //搜索类型
        $keyword = I('keyword');
        $mod = I('mod');
        import('ORG.Util.Page2'); // 导入分页类
        $_search = I('_search');
        $where = '';
        if (!empty($mod)) {
            if ($type == 'name') {
                $where = " nickname like '%$keyword%'";
            } else {
                $where = "$type = '$keyword'";
            }
            $count = $Baby->where($where)->count();
        } else {
            $count = $Baby->count(); // 查询满足要求的总记录数
        }
        $Page = new Page2($count, 25, 3); // 实例化分页类 传入总记录数和每页显示的记录数

        if (!empty($mod)) {
            $babys = $Baby->where($where)->order('regtime desc')->limit($Page->limit)->select();
        } else {
            if (empty($_search)) {
                $babys = $Baby->order('regtime desc')->limit($Page->limit)->select();
            }
            if ($_search == 'votes') {
                $babys = $Baby->order('votes desc')->limit($Page->limit)->select();
            }
            if ($_search == 'rand') {
                $babys = $Baby->order('rand()')->limit($Page->limit)->select();
            }
        }

        foreach ($babys as $key => $value) {
            $bid = $value['id'];
            $babys[$key]['euid'] = randuid($bid);
            $quarter = $value['quarter'];
            if ($quarter != '1') {
                $birthday = $value['birthday'];
                $babys[$key]['age'] = age_from_dob($birthday);
            }
        }
        $Page->pageShow = array('first' => '首页', 'ending' => '尾页', 'up' => '上一页', 'down' => '下一页', 'GoTo' => '确定');
        $Page->pageType = '%up%%numberF%%omitEA%%E%%down%<li>共%pageToatl%页 到第%input%页</li><li>%GoTo%</li>';
        $show = $Page->pageShow();
        $this->assign(array(
            'show' => $show,
            'babys' => $babys
        ));
        $this->display();
    }

    /**
     * 宝贝详细页
     */
    public function babyView() {
        //处理头部登录
        $username = I('username');
        $password = I('password');
        $loginflag = I('loginflag');
        if (!empty($loginflag)) {
            $this->doLogin($username, $password);
        }
        //获取小孩信息
        $ebid = I('id');
        if (retuid($ebid) > 0) {
            $bid = retuid($ebid);
            $this->assign('babyid', $bid);
        } else {
            die("<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script>alert('页面已经过期,请刷新以后重新打开！');
                 window.location='/sevenbaby/index.html';</script>");
        }
        $Baby = D('Baby');
        $baby = $Baby->where("id = '$bid'")->find();
        $birthday = $baby['birthday'];
        $baby['age'] = age_from_dob($birthday);
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/sevenbaby/babyshow/mod/mod/type/idnum/keyword/' . $baby['idnum'] . '.html';
        $truename = $baby['truename'];
        $titlename = $truename;
        if (empty($truename)) {
            $titlename = $baby['nickname'];
        }
        $photos = $baby['photos'];
        if (empty($photos)) {
            $photos = array();
        } else {
            $photosArr = explode(',', $photos);
        }
        $cover = $baby['cover'];
        $pic = 'http://' . $_SERVER['HTTP_HOST'] . '/Uploads/sevenbaby/' . $cover;
        $photosArr[] = $cover;
        $photosArr = array_reverse($photosArr);
        $Activity = D('Activity');
        $curActivity = $Activity->where("year(now()) = year(starttime) and flag= 'sevenbaby'")
                ->find();
        if ($curActivity) {
            $this->assign('activity', $curActivity);
        }
        //查询排名
        $votes = $baby['votes'];
        $rank = $Baby->distinct('votes')->where("votes > '$votes'")->count();
        $rank = (int) $rank + 1;
        //处理投票
        //列出评论
        $Comment = D('Comment');
        $curComments = $Comment->where("oid = '$bid' and category = 'baby'")
                ->select();

        $code = '';   //生成一个随机数字验证码
        for ($i = 0; $i <= 4; $i++) {
            $code.=mt_rand(0, 9);
        }
        foreach ($curComments as $key => $value) {
            $rand = mt_rand(1, 8);
            $rand2 = mt_rand(1, 15);
            $curComments[$key]['rand'] = $rand;
            $curComments[$key]['rand2'] = $rand2;
        }
        //论坛帖子
        $babyBbsTidRs = M("forum_forum", "dz_", C('DB_BBS'))
                ->query("select fid from dz_forum_forum where name = '第二届Seven Baby'");
        $babyBbsfid = $babyBbsTidRs[0]['fid'];
        $bbs = M("forum_post", "dz_", C('DB_BBS'))
                ->query("select * from dz_forum_post where first = '1' and invisible >= 0 and fid = '$babyBbsfid' order by dateline desc limit 0,3");
        foreach ($bbs as $key => $value) {
            $bbs[$key]['url'] = 'http://' . C('BBS_HOST') . '/forum.php/?mod=viewthread&tid=' . $value['tid'] . '#lastpost';
        }
        $year = date('Y', strtotime($curActivity['endtime']));
        $month = date('m', strtotime($curActivity['endtime']));
        $day = date('d', strtotime($curActivity['endtime']));
        $this->assign(array(
            'pic' => $pic,
            'bbs' => $bbs, //论坛帖子
            'euid' => $ebid,
            'comments' => $curComments,
            'code' => $code,
            'baby' => $baby,
            'rank' => $rank, //排名
            'endtime' => $curActivity['endtime'],
            'starttime' => $curActivity['starttime'],
            'nowtime' => date('Y-m-d H:i:s'),
            'year' => $year,
            'month' => $month,
            'day' => $day,
            'url' => $url,
            'photos' => $photosArr,
            'titlename' => $titlename
        ));
        $this->display();
    }

    /**
     * 我要参加
     */
    public function join() {
        if (!$this->ckUserLogin()) {
            $this->error('请先登录！', '/sevenbaby/index.html');
        }


        $this->display();
    }

    /**
     * 处理我要参加
     */
    public function doJoin() {
        if (!$this->ckUserLogin()) {
            $this->error('请先登录！', '/sevenbaby/index.html');
        }
        //if (session('verify') != md5($_POST['code'])) {
        //    $this->error('验证码错误！');
        //}
        $Baby = D('baby');  //sevenbaby 参赛表

        $selIdNum = $Baby->field('idnum')
                        ->order('idnum desc')->find();
        if ($selIdNum) {
            $idnum = (int) ($selIdNum['idnum'] + 1);
        } else {
            $idnum = 1;
        }
        $userId = session(C('USER_AUTH_KEY'));
        $data['mid'] = $userId;
        $data['nickname'] = I('nickname');
        $data['cover'] = I('cover');
        $data['age'] = I('age');
        $data['sex'] = I('sex');
        $data['phone'] = I('phone');
        $data['birthday'] = I('birthday');
        $data['wish'] = I('wish');
        $data['province'] = I('province');
        $data['city'] = I('city');
        $data['country'] = I('country');
        $data['regip'] = get_client_ip();
        $data['regtime'] = time();
        $data['quarter'] = '2';
        $data['idnum'] = $idnum;
        $ckMid = $Baby->where("mid = '$userId'")->find();
        if (!$ckMid) {
            $rs = $Baby->add($data);
            if ($rs) {
                $Msg = new MsgAction();
                $summary = "为感谢你对Seven Baby活动的支持，现赠与你Seven Baby我们自己出品的声光安抚玩具，Seven Baby故事机200元的优惠券";
                $param = array($this->userId, 'Seven Baby故事机200元优惠券来了', '2014-07-01 00:00:00', '2014-09-01 00:00:00', '1', '1', '', '健康卫视官方', $summary);
                $Msg->sendMsg($param, true);
                $msg = '参赛成功，快去会员中心上传更多宝宝萌图吧!';
                redirect('/member/hduif.html', 5, $msg);
            }
        } else {
            $msg = '您已经填写过参赛信息，快去会员中心查看吧！';
            redirect('/member/hduif.html', 5, $msg);
        }
    }

    public function sendCodeMsgs() {
        $Baby = D('Baby');
        $competitor = $Baby->table('db_baby b')
                ->field('m.id,m.username,m.email')
                ->join('db_member m on m.id = b.mid')
                ->where("b.quarter = '2' ")
                ->select();
        foreach ($competitor as $value) {
            $mid = $value['id'];
            $Msg = new MsgAction();
            $summary = "为感谢你对Seven Baby活动的支持，现赠与你Seven Baby我们自己出品的声光安抚玩具，Seven Baby故事机200元的优惠券";
            $param = array($mid, 'Seven Baby故事机200元优惠券来了', '2014-07-01 00:00:00', '2014-09-01 00:00:00', '1', '1', '', '健康卫视官方', $summary);
            $Msg->sendMsg($param, true);
        }
    }

    /**
     * 同名节目
     */
    public function program() {
        $VideoCat = D('VideoCat');
        $Video = D('Video');
        $Comment = D('Comment');
        $familyShowId = $VideoCat->getCatIdByCatname('家庭show');
        $familyShowVideos = $Video->getCatAllVideos($familyShowId, 0); //家庭show
        foreach ($familyShowVideos as $key => $value) {
            $oid = $value['id'];
            $commentNums = $Comment->where("oid = '$oid' and category = '视频'")
                    ->count();
        }

        //热门资讯
        $News = D('News');
        $hotNews = $News->newsRank();
        //热门图片
        $Photo = D('Picture');
        $hotPic = $Photo->getHotPicRank();
        $pro = I('pro');
        if ($pro == 'do') {
            $program = '分期观看';
        } else {
            $program = '首届Seven Baby庆典夜特辑';
        }
        $this->babyProgram($program);
        $this->assign(array(
            'pro' => $pro,
            'familyShowVideos' => $familyShowVideos,
            'hotNews' => $hotNews,
            'hotPic' => $hotPic
        ));
        $this->display();
    }

    /**
     * 宝宝相册
     */
    public function album() {
        $id = I('id');
        $Baby = D('Baby');
        $baby = $Baby->where("id = '$id'")->find();
        $birthday = $baby['birthday'];
        $baby['age'] = age_from_dob($birthday);
        if (!$baby) {
            $this->_empty();
            return;
        }

        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/sevenbaby/babyshow/mod/mod/type/idnum/keyword/' . $baby['idnum'] . '.html';

        $sex = $baby['sex'];
        if ($sex == '男') {
            $this->assign('photoInfo', 'Handsome Boy');
        } else {
            $this->assign('photoInfo', 'Butterfly Girl');
        }
        $truename = $baby['truename'];
        if (!empty($truename)) {
            $albumName = $truename;
        } else {
            $albumName = $baby['nickname'];
        }
        $photos = $baby['photos'];
        if (empty($photos)) {
            $photos = array();
        } else {
            $photosArr = explode(',', $photos);
        }
        $cover = $baby['cover'];
        $photosArr[] = $cover;
        $photosArr = array_reverse($photosArr);

        $this->assign(array(
            'baby' => $baby,
            'photosArr' => $photosArr,
            'albumName' => $albumName,
            'url' => $url
        ));
        $this->display();
    }

    /**
     * 处理图片上传
     */
    public function upload() {
        $targetFolder = 'Uploads/sevenbaby'; //设置上传目录
        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $oldName = $_FILES['Filedata']['name'];
            $filetype = getFileType($oldName);

            // Validate the file type
            $allowTypes = array('jpg', 'jpeg', 'gif', 'png'); //允许的文件后缀
            if (in_array($filetype, $allowTypes)) {
                $newName = 'sb_' . date('YmdHis') . '.' . $filetype;
                $targetFile = $targetFolder . DIRECTORY_SEPARATOR . $newName; //上传后的图片路径
                move_uploaded_file($tempFile, $targetFile);
                echo $newName; //上传成功后返回给前端的数据
                // file_put_contents($_POST['id'] . '.txt', '上传成功了！');
            } else {
                echo '不支持的文件类型';
            }
        }
    }

    /**
     * 处理留言 添加留言
     */
    public function addMsg() {
        if (!$this->ckUserLogin()) {
            $this->error('登录信息有错！', '/sevenbaby/index.html');
        }
        $Comment = D('comment');
        $ebid = I('ebid');
        $bid = retuid($ebid);
        if ($bid < 0) {
            $this->ajaxReturn('0', '该页面已经过期，请重新进入评论！', 0);
        }
        $data['msg'] = $_REQUEST['msg'];
        $data['uid'] = session(C('USER_AUTH_KEY'));
        $data['oid'] = $bid;
        $data['category'] = 'baby';
        $data['ctime'] = time();
        $data['ip'] = get_client_ip();
        $data['country'] = getRealAddress(get_client_ip())->data->country;
        $data['province'] = getRealAddress(get_client_ip())->data->region;
        $data['city'] = getRealAddress(get_client_ip())->data->city;
        if ($Comment->add($data)) {
            $data['time'] = date('Y-m-d H:i:s', $data['ctime']);
            $this->ajaxReturn($data, '评论成功', 1);
        } else {
            $this->ajaxReturn('0', '系统正忙！', 0);
        }
    }

    /**
     * 处理投票
     */
    public function doVote() {
        if (!$this->ckUserLogin()) {
            $this->ajaxReturn('0', '登录信息有误！', 0);
        }
        if (session('gbverify') != md5($_POST['code'])) {
            $this->ajaxReturn(I('code'), '验证码错误,换一个试试。', 0);
        }

        $BabyVote = D('BabyVotes'); //sevenbaby投票表
        $Baby = D('Baby');
        $ebid = I('ebid');
        $bid = retuid($ebid); //宝贝ID
        if ($bid < 0) {
            $this->ajaxReturn('duedate', '该页面已经过期，请刷新页面进入投票页！', 0);
        }
        $mid = session(C('USER_AUTH_KEY')); //会员ID
        $ip = get_client_ip(); //IP
        $time = date('Y-m-d H:i:s');
        $ckMid = $BabyVote->where("mid = '$mid' or ip = '$ip'")->find();

        if (!$ckMid) {
            //如果还没投过，则添加记录
            $data['bid'] = $bid;
            $data['mid'] = $mid;
            $data['ip'] = $ip;
            $data['vnum'] = '1';
            $data['vtime'] = $time;
            $BabyVote->add($data);
            $incVote = $Baby->where("id = '$bid'")->setInc('votes');
            if ($incVote) {
                $this->ajaxReturn($incVote, '投票成功！', 1);
            } else {
                $this->ajaxReturn('0', '系统繁忙！', 0);
            }
        } else {
            $ckVtime = $BabyVote->where("(ip = '$ip' or mid = '$mid') and UNIX_TIMESTAMP(now())-UNIX_TIMESTAMP(vtime) > 12*60*60")
                    ->find(); //检查是否已经过了12小时
            $sql = $BabyVote->getLastSql();
            Log::record('调试的SQL：'.$sql, Log::SQL);
            if ($ckVtime) {
                //如果过了12个小时，重置一下
                $vid = $ckVtime['id'];
                $data['vtime'] = date('Y-m-d H:i:s');
                $data['vnum'] = '1';
                $data['ip'] = $ip;
                $data['bid'] = $bid;
                $data['mid'] = $mid;
                $BabyVote->where("id ='$vid'")->save($data);
                $incVote = $Baby->where("id = '$bid'")->setInc('votes');
                if ($incVote) {
                    $this->ajaxReturn($incVote, '投票成功！', 1);
                } else {
                    $this->ajaxReturn('0', '系统繁忙！', 0);
                }
            } else {
                $ckMMid = $BabyVote->where("ip = '$ip' and mid = '$mid'")
                        ->find(); //检测IP是否被占用
                if ($ckMMid) {
                    $vnum = $ckMMid['vnum'];
                    if ($vnum < 7) {
                        $bidArr = explode(',', $ckMMid['bid']);
                        if (in_array($bid, $bidArr)) {
                            $this->ajaxReturn('0', '对不起，您12小时内已经对该宝宝投过票了!', 0);
                        } else {
                            $id = $ckMMid['id'];
                            $Fbid = ',' . $bid;
                            $data['vnum'] = "`vnum`+1";
                            $data['bid'] = "CONTACT(bid,$Fbid)";
                            $sql = "update db_baby_votes set `vnum` = `vnum` +1 , `bid` = CONCAT(`bid`,'$Fbid') where id = '$id'";
                            $BabyVote->query($sql);
                            $incVote = $Baby->where("id = '$bid'")->setInc('votes');
                            if ($incVote) {
                                $this->ajaxReturn($incVote, '投票成功！', 1);
                            } else {
                                $this->ajaxReturn('0', '系统繁忙！', 0);
                            }
                        }
                    } else {
                        $this->ajaxReturn('0', '您12小时内的票数已经使用完，12小时后再来吧`(*∩_∩*)′', 0);
                    }
                } else {
                    $this->ajaxReturn('0', '该IP或该账号12小时内已经投过票!', 0);
                }
            }
        }
    }

    /**
     * 处理登录
     * @param type $username
     * @param type $password
     */
    function doLogin($username, $password) {
        $Member = D('Member');
        Vendor('Ucenter.lib.UcService');  //引入Ucenter类
        $ucService = new UcService;
        $uidArr = $ucService->ucLogin($username, $password);
        if (!is_array($uidArr)) {
            $this->error($uidArr);
        }
        $uid = $uidArr['uid'];
        $synHtml = $ucService->ucSynLogin($uid);
        echo $synHtml;    //输出ucenter 同步登录代码
        $ckUsername = $Member->where("username = '$username' or email = '$username'")
                ->find();
        if (!is_array($ckUsername)) {
            $this->error('用户名不存在或不可用！');
        }
        $userId = $ckUsername['id'];
        $pwd = setPlainPassword($password);
        $ckPassword = $Member->where("password = '$pwd' and id = '$userId'")
                ->find();
        if (!is_array($ckPassword)) {
            $this->error('密码不正确！');
        }
        session(C('USER_AUTH_KEY'), $userId);
    }

    public function actionLogin() {
        $username = I('username');
        $password = I('password');
        $Member = D('Member');
        Vendor('Ucenter.lib.UcService');  //引入Ucenter类
        $ucService = new UcService;
        $uidArr = $ucService->ucLogin($username, $password);
        if (!is_array($uidArr)) {
            
        }
    }

    /**
     * 编辑小孩信息
     */
    public function editBaby() {
        $data['nickname'] = I('nickname');
        $data['age'] = I('age');
        $data['sex'] = I('sex');
        $data['phone'] = I('phone');
        $data['birthday'] = I('birthday');
        $data['wish'] = I('wish');
        $data['quarter'] = '2';
        $data['truename'] = I('truename');  //真是姓名
        $data['parent'] = I('parent');
        $data['email'] = I('email');
        $province = trim(I('province'));
        $city = trim(I('city'));
        $country = trim(I('country'));
        if (!empty($province) && $province != '省份') {
            $data['province'] = $province;
        }
        if (!empty($city) && $city != '地级市') {
            $data['city'] = $city;
        }
        if (!empty($country) && $country != '市、县级市、县') {
            $data['country'] = $country;
        }

        $id = I('id');
        $Baby = D('baby');
        $updateBaby = $Baby->where(" id = '$id'")->save($data);
        $sql = $Baby->getLastSql();
        if ($updateBaby) {
            $this->ajaxReturn($updateBaby, '更改成功!', 1);
        } else {
            $this->ajaxReturn($sql, '您未更改任何信息', 0);
        }
    }

    /**
     * 添加宝贝图片
     */
    public function addBabyPhotos() {
        $photo = I('photo');
        $id = I('id');
        $Baby = D('Baby');
        $Fphoto = ',' . $photo;
        $ckNullSql = "SELECT * FROM `db_baby` WHERE id = '$id' and (photos = '' or photos is NULL) LIMIT 1";
        $ckNull = $Baby->query($ckNullSql);
        $sql = $Baby->getLastSql();
        if ($ckNull) {
            $updatePhotoSql = "update db_baby set `photos` = '$photo' where id = '$id'";
        } else {
            $updatePhotoSql = "update db_baby set `photos` = CONCAT(`photos`,'$Fphoto') where id = '$id'";
        }
        $update = $Baby->execute($updatePhotoSql);
        if ($update) {
            $this->ajaxReturn($update, '添加成功！', 1);
        } else {
            $this->ajaxReturn($sql, '添加失败！', 0);
        }
    }

    /**
     * 删除图片
     */
    public function delBabyPhotos() {
        $photo = I('photo');
        $id = I('id');
        $Baby = D('Baby');
        $baby = $Baby->where("id = '$id'")->find();
        $photos = $baby['photos'];
        $photosArr = explode(',', $photos);
        $key = array_search($photo, $photosArr);
        unset($photosArr[$key]);
        $newPhotos = implode(',', $photosArr);
        $data['photos'] = $newPhotos;
        $file = $_SERVER['DOCUMENT_ROOT'] . '/Uploads/sevenbaby/' . $photo;
        $save = $Baby->where("id = '$id'")->save($data);
        $sql = $Baby->getLastSql();
        if (file_exists($file)) {
            $del = unlink($file);
        }
        if ($save) {
            $this->ajaxReturn($del, '删除成功!', 1);
        } else {
            $this->ajaxReturn($sql, '删除失败!', 0);
        }
    }

    /**
     * 设置封面
     */
    public function setCover() {
        $photo = I('photo');
        $id = I('id');
        $Baby = D('Baby');
        $baby = $Baby->where("id = '$id'")->find();
        $cover = $baby['cover'];  //封面图
        $photos = $baby['photos'];
        $photosArr = explode(',', $photos);
        $key = array_search($photo, $photosArr);
        unset($photosArr[$key]);
        $photosArr[] = $cover;
        $newPhotos = implode(',', $photosArr);
        $data['photos'] = $newPhotos;
        $savePhotos = $Baby->where("id = '$id'")->save($data);
        if ($savePhotos) {
            $data = array();
            $data['cover'] = $photo;
            $save = $Baby->where("id = '$id'")->save($data);
            $error = $Baby->getError();
            if ($save) {
                $output = array(
                    'cover' => $photo,
                    'photo' => $cover
                );
                $this->ajaxReturn($output, '设置成功！', 1);
            } else {
                $this->ajaxReturn($error, '发生错误！', 0);
            }
        } else {
            $this->ajaxReturn($error, '发生错误！', 0);
        }
    }

    /**
     * 家庭show
     */
    public function family() {
        $this->babyProgram('家庭show');
        $this->display();
    }

    /**
     * 头条
     */
    public function example() {
        $this->babyProgram('头条');
        $this->display();
    }

    /**
     * 育儿百科
     */
    public function kids() {
        $this->babyProgram('育儿百科');
        $this->display();
    }

    public function loginOut() {
        session(C('USER_AUTH_KEY'), null);
        cookie('USER_NAME', null);
        cookie('USER_PWD', null);
        header("Location:/sevenbaby/index.html");
    }

    protected function babyProgram($cat) {
        $id = I('id');
        $VideoCat = D('VideoCat');
        $Video = D('Video');
        $familyShowId = $VideoCat->getCatIdByCatname($cat);
        $familyShowVideos = $Video->getCatAllVideos($familyShowId, 0); //家庭show
        if (empty($id)) {
            $curVideo = $familyShowVideos[0];
        } else {
            $curVideo = $Video->where("id= $id")->find();
            if (!$curVideo) {
                $this->_empty();
                return;
            }
        }
        $tagList = $curVideo['tags'];
        $tagListArr = explode(',', $tagList);
        $newTagList = array();
        foreach ($tagListArr as $key => $value) {
            $newTagListArr = explode('|', $value);
            $newTagList[$key]['tagid'] = trim($newTagListArr[0]);
            $newTagList[$key]['tagname'] = trim($newTagListArr[1]);
        }

        //播放数+1
        $curVideoId = $curVideo['id'];
        $Video->where("id='$curVideoId'")->setInc('hits');
        //播放记录 流水账 用于大家正在看
        $VideoView = D('Video_view');
        $ckVideoView = $VideoView->where("vid = '$curVideoId'")->find();
        if ($ckVideoView) {
            $id = $ckVideoView['id'];
            $data['ctime'] = time();
            $VideoView->where("id = '$id'")->save($data);
        } else {
            $VideoView->add(array(
                'vid' => $curVideoId,
                'ctime' => time()
            ));
        }
        //添加播放记录
        if (!empty($this->userId)) {
            //如果有用户登录
            $UserSee = D('UserSee');   //用户观看记录表
            $today = date("Y-m-d", time());
            $today = strtotime($today);
            $ckSee = $UserSee->where("uid = $this->userId and vid = $curVideoId and seetime = '$today'")
                    ->find();
            if (!$ckSee) {
                $data['uid'] = $this->userId;
                $data['vid'] = $curVideoId;
                $data['seetime'] = $today;
                $UserSee->add($data);
            }
        }

        //开始播放记录 用于周 天 排行
        $today = date("Y-m-d", time());
        $today = strtotime($today);
        $Photo_hits = D('video_hits');
        $ckHits = $Photo_hits
                ->where("videoid = '$curVideoId'and time='$today'")
                ->find();
        if (!$ckHits) {
            $newHitsData['videoid'] = $curVideoId;
            $newHitsData['time'] = $today;
            $newHitsData['hits'] = 1;
            $Photo_hits->add($newHitsData);
        } else {
            //判断如果已经存在点击就是更新
            $Photo_hits->where("videoid = '$curVideoId'")
                    ->setInc('hits'); //字段加1
        }
        //评论
        $this->showComment($curVideoId, '视频');
        $this->assign('tagList', $newTagList);
        $this->assign(array(
            'curVideo' => $curVideo,
            'programVideos' => $familyShowVideos
        ));
    }

    public function test() {
        $Msg = new MsgAction();
        $content = '恭喜您：';
        $param = array($this->userId, 'Seven Baby故事机200元优惠券来了', '2014-07-01 00:00:00', '2014-09-01 00:00:00', '1', '1', $content, '健康卫视官方');
        $Msg->sendMsg($param, true);
    }
    
    public function addHits(){
        $flag = I('flag');
        $time = date('Y-m-d H:i:s');
        $ip = get_client_ip();
        if(!empty($flag)){
            $sql = "update db_ad_hits set `hits` = `hits`+1 ,`time` = '$time',ip = '$ip' where flag = '$flag' ";
            D('DbHits')->execute($sql);
            echo D('DbHits')->getLastSql();
        }
    }
    
    public function getAdHits(){
        
    }

}
