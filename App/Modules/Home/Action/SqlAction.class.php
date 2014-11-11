<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-24 20:41:57 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   数据导入
 */
class SqlAction extends Action {

    public function picture() {
        //set_time_limit(0);
        $conn = new mysqli('127.0.0.1', 'root', '123456', 'test');
        $conn->query('SET NAMES utf8');
        $selPic = "select id,urlfd,urlname,remark from db_picture";
        $rs = $conn->query($selPic);
        $info = array();
        $i = 0;
        while ($row = $rs->fetch_assoc()) {
            $id = $row['id'];
            $urlfd = $row['urlfd'];
            $urlfdF = explode(',', $urlfd);
            $imgF = $urlfdF[0];
            $urlnameF = explode(',', $row['urlname']);
            $remarkF = unserialize($row['remark']);
            $info[$i]['id'] = $id;
            foreach ($urlnameF as $key => $value) {
                foreach ($remarkF as $k => $v) {
                    if ($key == $k) {
                        $img .= "<img src='/Public/admin/vimg/$imgF/_viewb/$value'/>[info]$v|";
                    }
                }
            }
            $info[$i]['img'] = $img;
            $i++;
            $img = '';
        }
        foreach ($info as $key => $value) {
            $updatePic2 = "update db_picture2 set `info` = '{$value['img']}' where `id` = '{$value['id']}' ";
             $conn->query($updatePic2);
            echo "<pre>".$key."</pre>";
        }
    }

}
