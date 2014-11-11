<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-8-14 14:17:31 by 曹文鹏 , caowenpeng1990@126.com
* For          :   
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
