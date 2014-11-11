<?php

// +----------------------------------------------------------------------
// | ThinkPHP
// +----------------------------------------------------------------------
// | Copyright (c) 2007 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id: common.php 2601 2012-01-15 04:59:14Z liu21st $
//获取友情链接类型
function getLinksType($type) {
    $types = array(1 => '合作媒体', 2 => '生命', 3 => '生态', 4 => '生活', 5 => '健康联盟');
    if (!empty($type)) {
        $ftype = $types[$type];
    } else {
        $ftype = NULL;
    }
    return $ftype;
}

//获取管理员名称,也可以查询别的数据
function getName($dname, $name, $id) {
    if (!empty($dname) || !empty($id)) {
        $Model = D($dname);
        $nickname = $Model->where('id=' . $id)->getField($name);
    } else {
        $nickname = NULL;
    }
    return $nickname;
}

//获取标签名称
function getTagName($id) {
    if (!empty($id)) {
        $Model = D('Tags');
        $nickname = $Model->where('id=' . $id)->getField('name');
    } else {
        $nickname = NULL;
    }
    return $nickname;
}

//公共函数
function toDate($time, $format = 'Y-m-d H:i:s') {
    if (empty($time)) {
        return '';
    }
    $format = str_replace('#', ':', $format);
    return date($format, $time);
}

function getStatus($status, $imageShow = true) {
    switch ($status) {
        case 0 :
            $showText = '禁用';
            $showImg = '<IMG SRC="__PUBLIC__/Images/locked.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="禁用">';
            break;
        case 2 :
            $showText = '待审';
            $showImg = '<IMG SRC="__PUBLIC__/Images/prected.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="待审">';
            break;
        case - 1 :
            $showText = '删除';
            $showImg = '<IMG SRC="__PUBLIC__/Images/del.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="删除">';
            break;
        case 1 :
        default :
            $showText = '正常';
            $showImg = '<IMG SRC="__PUBLIC__/Images/ok.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="正常">';
    }
    return ($imageShow === true) ? $showImg : $showText;
}

function showStatus($status, $id) {
    switch ($status) {
        case 0 :
            $info = '<a href="javascript:resume(' . $id . ')">恢复</a>';
            break;
        case 2 :
            $info = '<a href="javascript:pass(' . $id . ')">批准</a>';
            break;
        case 1 :
            $info = '<a href="javascript:forbid(' . $id . ')">禁用</a>';
            break;
        case - 1 :
            $info = '<a href="javascript:recycle(' . $id . ')">还原</a>';
            break;
    }
    return $info;
}

//窗体CheckBox产生器
function getCheckBox($coulmnName, $AryData, $selected = "", $default = "", $func = "", $fname = '[]', $group = false) {
    $inpStr = "";
    if ($group === false) {
        $i = 1;
        if (!is_array($default))
            $default = array($default);
        foreach ($AryData as $key => $value) {
            if ($selected == "" && $default == "" && $i == 1)
                $inpStr .= " <input type=\"checkbox\" name=\"{$coulmnName}{$fname}\" id=\"" . $coulmnName . $key . "\" value=\"" . $key . "\" " . $func . " checked/> <label for=\"" . $coulmnName . $key . "\" class=\"ml5 checkspan mr20\"> $value</label>";
            elseif ($selected != "" && @in_array($key, $selected))
                $inpStr .= " <input type=\"checkbox\" name=\"{$coulmnName}{$fname}\" id=\"" . $coulmnName . $key . "\" value=\"" . $key . "\" " . $func . " checked/> <label for=\"" . $coulmnName . $key . "\" class=\"ml5 checkspan mr20\"> $value</label>";
            elseif ($selected == "" && @in_array($key, $default))
                $inpStr .= " <input type=\"checkbox\" name=\"{$coulmnName}{$fname}\" id=\"" . $coulmnName . $key . "\" value=\"" . $key . "\" " . $func . " checked/> <label for=\"" . $coulmnName . $key . "\" class=\"ml5 checkspan mr20\"> $value</label>";
            else
                $inpStr .= " <input type=\"checkbox\" name=\"{$coulmnName}{$fname}\" id=\"" . $coulmnName . $key . "\" value=\"" . $key . "\" " . $func . "> <label for=\"" . $coulmnName . $key . "\" class=\"ml5 mr20\"> $value</label>";
            $i++;
        }
    }else {
        $inpStr = "<input name=\"{$coulmnName}\" type=\"hidden\" value=\"{$selected}\" />" . $AryData[$selected];
    }
    return $inpStr;
}

//窗体RADIO产生器
function getRadio($coulmnName, $AryData, $selected = "", $default = "", $func = "", $group = false) {
    $optionStr = "";
    if ($group === false) {
        $i = 1;
        foreach ($AryData as $key => $value) {
            if ($selected == "" && $default == "" && $i == 1)
                $optionStr .= "<input type=\"radio\" name=\"{$coulmnName}\" id=\"" . $coulmnName . $i . "\" value=\"" . $key . "\" " . $func . " checked/> <label for=\"" . $coulmnName . $i . "\" class=\"mr20\"> $value</label>";
            elseif ($selected != "" && $selected == $key)
                $optionStr .= "<input type=\"radio\" name=\"{$coulmnName}\" id=\"" . $coulmnName . $i . "\" value=\"" . $key . "\" " . $func . " checked/> <label for=\"" . $coulmnName . $i . "\" class=\"mr20\"> $value</label>";
            elseif ($selected == "" && $default == $key)
                $optionStr .= "<input type=\"radio\" name=\"{$coulmnName}\" id=\"" . $coulmnName . $i . "\" value=\"" . $key . "\" " . $func . " checked/> <label for=\"" . $coulmnName . $i . "\" class=\"mr20\"> $value</label>";
            else
                $optionStr .= "<input type=\"radio\" name=\"{$coulmnName}\" id=\"" . $coulmnName . $i . "\" value=\"" . $key . "\" " . $func . "> <label for=\"" . $coulmnName . $i . "\" class=\"mr20\"> $value</label>";
            $i++;
        }
    }else {
        $optionStr = "<input name=\"{$coulmnName}\" type=\"hidden\" value=\"{$selected}\" />" . $AryData[$selected];
    }
    return $optionStr;
}

//窗体一般选择字段产生器
function getOption($coulmnName, $AryData, $selected = "", $default = "", $func = "", $info = "", $infovalue = "", $group = false) {
    $optionStr = "";
    if ($group === false) {
        if (!empty($info))
            $optionStr.="<option value=\"$infovalue\">$info</option>";
        if (is_array($AryData)) {
            $i = 1;
            foreach ($AryData as $key => $value) {
                if (is_array($value)) {
                    if ($selected != "" && $selected == $key)
                        $optionStr.="<option value=\"" . $value['flevel'] . "\" selected>" . $value['fname'] . "</option>";
                    elseif ($selected == "" && $default == $key)
                        $optionStr.="<option value=\"" . $value['flevel'] . "\" selected>" . $value['fname'] . "</option>";
                    else
                        $optionStr .= "<option value=\"" . $value['flevel'] . "\">" . $value['fname'] . "</option>";
                }else {
                    if ($selected != "" && $selected == $key)
                        $optionStr.="<option value=\"" . $key . "\" selected>" . $value . "</option>";
                    elseif ($selected == "" && $default == $key)
                        $optionStr.="<option value=\"" . $key . "\" selected>" . $value . "</option>";
                    else
                        $optionStr .= "<option value=\"" . $key . "\">" . $value . "</option>";
                }
                $i++;
            }
        }
        if (!empty($func))
            $optionStr = "<select class='selectStyle' name=\"{$coulmnName}\" id=\"{$coulmnName}\" onchange=\"" . $func . "\">" . $optionStr . "</select>";
        else
            $optionStr = "<select class='selectStyle' name=\"{$coulmnName}\" id=\"{$coulmnName}\">" . $optionStr . "</select>";
    }else {
        $optionStr = "<input name=\"{$coulmnName}\" type=\"hidden\" value=\"{$selected}\" />" . $AryData[$selected];
    }
    return $optionStr;
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
 * 循环检测并创建文件夹
 */
function createDir($path) {
    if (!file_exists($path)) {
        createDir(dirname($path));
        mkdir(iconv('utf-8', 'gbk', "$path"));
    }
}

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

function getCwpHello() {
    $url = "http://www.phpone.cn/cwp/hello.php";
    $data = json_decode(file_get_contents($url));
    $msg = $data->content.'by《'.$data->source.'》';
    return $msg;
}
