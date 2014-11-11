<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-10-17 16:58:17 
 * Author       :   曹文鹏
 * Email        :   caowenpeng1990@126.com
 * For          :
 */
function dateToCh($date) {
    $arr = explode('-', $date);
    return $arr[0] . '年' . $arr['1'] . '月' . $arr[2] . '日';
}
