<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-10 20:47:49 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   公共函数库
 */

/**
 * 生成指定的随机数 用于头像上传
 * @param type $length
 * @return string
 */
function createRandomCode($length) {
    $randomCode = "";
    $randomChars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $randomChars { mt_rand(0, 35) };
    }
    return $randomCode;
}

/**
 * 不告诉你这是干嘛的
 */
function setPlainPassword($pwd) {
    $passwd = sha1(md5($pwd) . 'JKWSCWP');
    return substr($passwd, 4, 30);
}

/**
 * 淘宝IP库 根据ip 返回所在地信息
 * @param type $ip  ip地址
 * @return json|boolean json :{"code":0,"data":{"ip":"210.75.225.254","country":"\u4e2d\u56fd","area":"\u534e\u5317",
  "region":"\u5317\u4eac\u5e02","city":"\u5317\u4eac\u5e02","county":"","isp":"\u7535\u4fe1",
  "country_id":"86","area_id":"100000","region_id":"110000","city_id":"110000",
  "county_id":"-1","isp_id":"100017"}}
 */
function getRealAddress($ip) {
    if (checkIp($ip)) {
        $ip = '58.250.61.64';
    }
    $url = "http://ip.taobao.com/service/getIpInfo.php?ip=" . $ip;
    $ipinfo = json_decode(file_get_contents($url));
    if ($ipinfo->code == '1') {
        return false;
    }
    return $ipinfo;
}

/**
 * 检测IP是否是非公网
 * @param type $ip
 * @return 0|1 1是非公网 0公网
 */
function checkIp($ip) {
    $pattern = '/(127\.0\.0\.1)|(localhost)|(10(\.\d{1,3}){3})|(172\.((1[6-9])'
            . '|(2\d)|(3[01]))\.\d{1,3}\.\d{1,3})|(192\.168\.\d{1,3}\.\d{1,3})/';
    return preg_match($pattern, $ip);
}

/**
 * 删除字符中所有的空格
 * @param type $str
 * @return type
 */
function trimall($str) {
    return preg_replace("/\s/", "", $str);
}

/**
 * 创造随机字符串
 * @param type $length
 * @return type
 */
function createToken($length = 42) {
    $randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $randomChars{mt_rand(0, 35)};
    }
    return $randomCode;
}

/**
 * 返回文件后缀名
 * @param string $fileName
 * @return string
 */
function getFileType($fileName) {
    $nameArr = explode('.', $fileName);
    $length = count($nameArr) - 1;
    return $nameArr[$length];
}

/**
 * 
 * @param type $uid
 * @return string
 */
function randuid($uid) {
    $time = time();
    $randstr = substr(md5(microtime()), 0, 9);
    $loc = rand(1, 8);
    $str = '';
    $str = $loc . $time . substr($randstr, 0, $loc) . $uid . substr($randstr, -(9 - $loc));
    $str = str_replace('=', '', base64_encode($str));
    $str = strtoupper(substr(md5($str), 0, 6)) . $str;
    return $str;
}

/**
 * 
 * @param type $mid
 * @return type
 */
function retuid($mid) {
    $nowtime = time();
    $hash = strtolower(substr($mid, 0, 6));
    $decode = substr($mid, 6);
    if (substr(md5($decode), 0, 6) != $hash)
        return -1;
    $str = base64_decode($decode);
    $validtime = intval(substr($str, 1, 10));
    if (($nowtime - $validtime) > 900)
        return -1;
    else {
        $loc = substr($str, 0, 1);
        $len = strlen($str);
        return substr($str, (11 + $loc), ($len - 20));
    }
}

/**
 * 
 * @global type $authkey
 * @param type $string
 * @return type
 */
function xorop($string) {
    global $authkey;
    $encode = '';
    for ($i = 0, $j = strlen($string); $i < $j; $i++) {
        $encode.=$string[$i] ^ $authkey;
    }
    return $encode;
}

function create_uuid() {
    $str = md5(uniqid(mt_rand(), true));
    $uuid .= substr($str, 0, 8) . '-';
    $uuid .= substr($str, 8, 4) . '-';
    $uuid .= substr($str, 12, 4) . '-';
    $uuid .= substr($str, 16, 4) . '-';
    $uuid .= substr($str, 20, 12);
    return $uuid;
}

function removeArrayNull($val) {
    if (empty($val)) {
        return false;
    }
}

/**
 * 检测输入的验证码是否正确，$code为用户输入的验证码字符串
 * @param type $code
 * @param type $id
 * @return type
 */
function check_verify($code, $id = '') {
    import("ORG.Util.Verify");
    $Verify = new Verify();
    return $Verify->check($code, $id);
}

/**
 * 根据出生日期 计算年龄
 * @param type $dob
 * @return type
 */
function age_from_dob($dob) {
    $dob = strtotime($dob);
    $y = date('Y', $dob);
    if (($m = (date('m') - date('m', $dob))) < 0) {
        $y++;
    } elseif ($m == 0 && date('d') - date('d', $dob) < 0) {
        $y++;
    }
    $age = (int) (date('Y') - $y);
    if ($age == 0) {
        $age = 1;
    }
    return $age;
}

/**
 * 生成折扣码
 * @return type
 */
function createDiscountCode() {
    return date('m') . date('d') . '-' . date('H') . date('i') . '-' . date('s') . createToken(2);
}
