<?php

/*
 * 功能：AJAX功能
 * 作者：张雷刚
 * 时间：2013年12月5日12:01:24
 */

class AjaxAction extends CommonAction {

    // 增加、修改资料
    public function submit() {
        $action = I('action'); //操作方法
        $classname = I('classname'); //模型类
        $setreferer = I('setreferer'); //操作完返回地址
        if ($action == 'add' && !empty($classname)) {
            $Model = D($classname);
            // 根据表单提交的POST数据创建数据对象
            if (!$Model->create()) {
                $this->error($Model->getError());
            }
            $result = $Model->add(); // 根据条件保存修改的数据
//            $SQL = $Model->getLastSql(); //输出sql语句
//            Log::record('调试的SQL：' . $SQL, Log::SQL);
            if (false !== $result) {
                $this->success('新增成功！', $setreferer);
            } else {
                $this->error('新增失败!');
            }
        } elseif ($action == 'edit' && !empty($classname)) {
            $Model = D($classname);
            // 根据表单提交的POST数据创建数据对象
            if (!$Model->create()) {
                $this->error($Model->getError());
            }
            $result = $Model->save(); // 根据条件保存修改的数
            $SQL = $Model->getLastSql(); //输出sql语句
            Log::record('调试的SQL：' . $SQL, Log::SQL);
            if (false !== $result) {
                $this->success('修改成功！', $setreferer);
            } else {
                $this->error('修改失败!');
            }
        } else {
            $this->error('非法操作!');
        }
    }

    /**
     * ajax 方式的提交和修改数据
     */
    public function doAdd() {
        $classname = I('classname');
        $news = D($classname);
        $action = I('action');
        if (!$news->create()) {
            $output['success'] = false;
            $output['message'] = $news->getError();
        }
        if (!empty($action) && $action == 'edit') {
            $result = $news->save();
            $SQL = $news->getLastSql(); //输出sql语句
            Log::record('调试的SQL：' . $SQL, Log::SQL);
            if ($result) {
                $output['success'] = true;
                $output['message'] = '修改成功！';
                $output['edit'] = true;
            } else {
                $output['success'] = false;
                $output['message'] = $news->getError();
            }
        } else {
            $result = $news->add(); // 根据条件保存修改的数据
//            $SQL = $news->getLastSql(); //输出sql语句
//            Log::record('调试的SQL：' . $SQL, Log::SQL);
            if ($result) {
                $output['success'] = true;
                $output['message'] = '添加成功！';
            } else {
                $output['success'] = false;
                $output['message'] = $news->getError();
            }
        }
        echo json_encode($output);
    }

    //修改状态如 isopen
    public function index() {
        $id = I('id');
        $isopen = I('isopen');
        $classname = I('tablename');
        $Model = D($classname);
        $data['isopen'] = $isopen;
        $result = $Model->where('id=' . $id)->save($data); // 根据条件保存修改的数据
        //echo $Model->getLastSql();//输出sql语句
        if (false !== $result) {
            $this->ajaxReturn('Y', '', 1, 'HTML');
        } else {
            $this->ajaxReturn('N', '', 1, 'HTML');
        }
    }

    /**
     * jquery-easyui 删除数据
     */
    public function ajaxDel() {
        $ids = I('data');
        $classname = I('classname');
        $Model = new CommonModel($classname);
        $map['id'] = array('in', $ids);
        $rs = $Model->where($map)->delete();
        if ($rs) {
            $this->ajaxReturn($rs, '删除成功', 1);
        } else {
            $sql = $Model->getLastSql();
            $this->ajaxReturn($sql, '删除失败', 0);
        }
    }

    //删除数据
    public function del() {
        $id = I('arg');
        $classname = I('classname');
        $Model = D($classname);
        $result = $Model->delete($id); // 根据id删除
        //echo $Model->getLastSql();//输出sql语句
        if (false !== $result) {
            $this->ajaxReturn(Y);
        } else {
            $this->ajaxReturn(N);
        }
    }

    //获取后台导航菜单
    public function submenu() {
        import("@.ORG.Util.Menu");
        $mu = MENU::getInstance();
        $menu = $mu->getSubMenu($_POST['id']);
        $this->ajaxReturn($menu);
    }

    //获取三级联动城市
    public function getArea() {
        $where['parent_id'] = $_REQUEST['areaId'];
        $area = D('areas')->where($where)->select();
        $this->ajaxReturn($area);
    }

}
