<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-7-31 18:14:49 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   数据库备份  
 */
class DumpdbAction extends CommonAction {

    public function index() {
        $this->display();
    }

    public function dump() {
        set_time_limit(0);
        // 设置SQL文件保存文件名 
        $filename = date("Y-m-d_H-i-s") . "-" . C('DB_NAME') . ".sql";
        // 所保存的文件名 
        header("Content-disposition:filename=" . $filename);
        header("Content-type:application/octetstream");
        header("Pragma:no-cache");
        header("Expires:0");
        //获取当前页面文件路径，SQL文件就导出到此文件夹内 
        $tmpPath = $_SERVER['DOCUMENT_ROOT'] . '/backup/' . date('Y-m-d');
        createDir($tmpPath);
        $tmpFile = $tmpPath . '/' . $filename;
        // 用MySQLDump命令导出数据库 
        $shell = "mysqldump -u" . C('DB_USER') . " -p" . C('DB_PWD') . " --default-character-set=utf8 " . C('DB_NAME') . " > $tmpFile";
        exec($shell);
        $file = fopen($tmpFile, "r"); // 打开文件 
        echo fread($file, filesize($tmpFile));
        fclose($file);
        exit;
    }
    

}
