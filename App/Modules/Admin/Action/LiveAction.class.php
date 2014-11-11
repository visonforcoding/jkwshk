<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-4-16 14:44:02 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   直播页面
 */
class LiveAction extends CommonAction {

    public function index() {
        $copy = I('action');
        if (!empty($copy)) {
            $Live = D('Live');
//            $clearTableSql = 'truncate table db_live';
//            $Live->execute($clearTableSql); //清空原表
            $copySql = "insert into db_live ( `column`,name,plandate,plantime,`week`)"
                    . "select `column`,name,plandate,plantime,`week`from db_live_temp";
            $Live->query($copySql);
        }
        $this->display();
    }

    /**
     * 节目表上传
     */
    public function upload() {
        set_time_limit(0);
        $weeks = array(1 => '周一', 2 => '周二', 3 => '周三', 4 => '周四', 5 => '周五', 6 => '周六', 7 => '周日');
        $savePath = ROOT_PATH . "Uploads/program/";
        if (file_exists($savePath . 'use/program.xls')) {
            $usePath = $savePath . 'use/program.xls';
        } else {
            $usePath = $savePath . 'use/program.xlsx';
        }
        if ($_FILES["file"]["error"] > 0) {
            $msg = $_FILES["file"]["error"];
        } else {
            $oldFileName = $_FILES['file']['name'];
            $fileType = getFileType($oldFileName);
            $newFileName = date('Y-m-d') . ".$fileType";
            if ($fileType != 'xls' && $fileType != 'xlsx') {
                $msg = '文件格式不正确';
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], $savePath . $newFileName);
                $msg = '上传成功！';
                $filePath = $savePath . $newFileName;
                copy($filePath, $usePath);
                $Live = D('LiveTemp');
                $clearTableSql = 'truncate table db_live_temp';
                $Live->execute($clearTableSql); //清空原表
                $excel = $this->excelRead($usePath);
                $k = 0;
                $data = array();
                for ($i = 2; $i <= $excel->sheets[0]['numCols']; $i++) {//列
                    for ($j = 3; $j <= $excel->sheets[0]['numRows']; $j++) {//行
                        $date = $excel->sheets[0]['cells'][2][$i]; //取得第一行的数据日期+星期
                        $dateArr = explode('|', $date);
                        $plan_date = $dateArr[1]; //日期
                        $remarks = $dateArr[0]; //星期
                        $plan_time = $excel->sheets[0]['cells'][$j][1]; //取得开始播放时间
                        $programS = $excel->sheets[0]['cells'][$j][$i]; //取得节目名称|栏目名称
                        $substrs = substr($plan_time, 0, 1);
                        if ($substrs != 'a') {//带a的为第一天的，其余的为第二天的
                            $afterDay = $excel->sheets[0]['cells'][2][$i + 1]; //取得第一行的数据日期+星期
                            if (in_array($remarks, $weeks)) {
                                $str = explode('|', $afterDay);
                                $plan_date = $str[1]; //日期
                                $remarks = $str[0]; //星期						
                            }
                        } else {
                            $plan_time = substr($plan_time, 1);
                        }
                        $programArr = explode('#', $programS, 2);
                        $column = $programArr[0];
                        $name = $programArr[1];
                        //  $data['name'] = empty($name)? $column:$name;

                        if (!empty($column) && !empty($plan_time) && in_array($remarks, $weeks)) {
                            $data[$k]['column'] = $column;
                            $data[$k]['name'] = $name;
                            $data[$k]['plandate'] = $plan_date;
                            $data[$k]['plantime'] = $plan_time;
                            $data[$k]['week'] = $remarks;
                            $k++;
                        }
                    }
                }
                $Live->addAll($data); //
            }
        }
        //开始读取节目单
        // 取得最大的列号

        $this->display();
    }

    public function getLive() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $order = I('order');
        $Live = new CommonModel('Live_temp');
        echo $Live->getAllJson($curPage, $pageSize, $sort, $order);
    }

    public function getTrueLive() {
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $order = I('order');
        $Live = new CommonModel('Live');
        echo $Live->getAllJson($curPage, $pageSize, $sort, $order);
    }

    /**
     * 编辑节目
     */
    public function editLive() {
        $request = $_REQUEST['data'];   //用TP的I方法老不行
        $id = $request[0]['id'];
        $model = new Model('Live');
        $data = $request[0];
        $rs = $model->where("id = '$id'")->save($data);
        if ($rs) {
            $this->ajaxReturn($rs, '更改成功！', 1);
        } else {
            $this->ajaxReturn($rs, '更改失败！', 1);
        }
    }

}
