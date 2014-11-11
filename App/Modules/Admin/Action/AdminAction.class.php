<?php

/*
 * 功能：管理员管理
 * 作者：张雷刚
 * 时间：2013年12月5日12:01:24
 */

class AdminAction extends CommonAction {
    /*
     * 管理员类别
     *
     */

    public function groups() {
        //列表过滤器，生成查询Map对象
        $map = array();
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['account'] = array('like', "%" . $keyword . "%");
        }
        $Model = D('admin_groups');
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->where($map)->order('id DESC')->field(true)->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

    private function getArttrib($doc, $name) {
        if ($doc && $doc->hasAttributes()) {
            return $doc->getAttribute($name);
        }
        return "";
    }

    //修改数据
    public function groupsEdit() {
        $arr = I();
        $xml = new DOMDocument();
        $xml->load('App/Conf/menu.xml');
        $doc = $xml->getElementsByTagName("root")->item(0);
        $items = $doc->getElementsByTagName("menu");
        /*
          $menu='<div id="groups">';
          $i=0;
          $dbtype=array(1=>'查看',2=>'新增',3=>'修改',4=>'删除');
          foreach($items as $k=>$item){
          $mn=$this->getArttrib($item,'name');

          $menu.='<ul id="group['.$mn.']" class="mb50">';
          $type=$this->getArttrib($item,'type');
          if($type=='hidden')
          $menu.='<li><a href="#" style="color:#F20" title="隐藏的权限,不在菜单显示,如新增,修改,删除,弹框时的权限">'.$this->getArttrib($item,'title').'</a>';
          else
          $menu.='<li><span class="mr20 fwBold">'.$this->getArttrib($item,'title').'</span>';

          $menu.='<a href="javascript:void(0);" onclick="sltAll(\'group['.$mn.']\',0)" class="cBlue">完全/反选</a> <span class="ml5 mr5">|</span> ';
          $menu.='<a href="javascript:void(0);" onclick="sltAll(\'group['.$mn.']\',1)" class="cBlue">查看</a> <span class="ml5 mr5">|</span> ';
          $menu.='<a href="javascript:void(0);" onclick="sltAll(\'group['.$mn.']\',2)" class="cBlue">新增</a> <span class="ml5 mr5">|</span> ';
          $menu.='<a href="javascript:void(0);" onclick="sltAll(\'group['.$mn.']\',3)" class="cBlue">修改</a> <span class="ml5 mr5">|</span> ';
          $menu.='<a href="javascript:void(0);" onclick="sltAll(\'group['.$mn.']\',4)" class="cBlue">删除</a>';
          $menu.='</li>';
          $subitems=$item->getElementsByTagName("item");

          foreach($subitems as $ik=>$subitem){
          $sn=$this->getArttrib($subitem,'name');
          $type=$this->getArttrib($subitem,'type');
          if($type=='hidden')
          $menu.='<li class="ml50"><a href="#" style="color:#F20" title="隐藏的权限,不在菜单显示,如新增,修改,删除,弹框时的权限">'.$subitem->nodeValue.'</a>';
          else
          $menu.='<li class="mt10"><span class="mr20">'.$subitem->nodeValue.'</span>'.getCheckBox('group['.$mn.']['.$sn.'][]', $dbtype, NULL, NULL,NULL,NULL).'</li>';
          $i++;
          }
          $menu.='</ul>';
          $i++;
          }
          $menu.='</div>';
         */
        $Model = D('admin_groups');

        $id = I('id');
        $action = I('action');
        if ($action == 'edit') {
            $Rs = $Model->where('id=' . $id)->find();
            //$Rs1 = $Model->where('id='.$id)->getField('id,name,info',':');
        }
        $this->assign(array(
            'action' => $action,
            'classname' => 'admin_groups',
            'setreferer' => '/admin/groups',
            'Rs' => $Rs,
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));
        $this->display();
    }

    public function index() {
        //列表过滤器，生成查询Map对象
        $map = array();
        $keyword = I('keyword');
        if (!empty($keyword)) {
            $map['account'] = array('like', "%" . $keyword . "%");
        }
        $Model = D("AdminView");
        import("ORG.Util.Page"); // 导入分页类
        $count = $Model->where($map)->count();
        $page = new Page($count, 10);
        $show = $page->show();
        $list = $Model->field('id,gname,account,create_time,last_login_time,last_login_ip,isopen')->where($map)->order()->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }

    //新增、修改管理员
    public function indexEdit() {
        $Model = M("Admin");
        $action = I('action');
        if ($action == 'add') {
            
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->where('id=' . $id)->find();
        }

        $fname = M('admin_groups')->where('isopen = 1')->getField('id as gid,name');
        $this->assign(array(
            'Rs' => $Rs,
            'fname' => $fname,
            'action' => $action,
            'classname' => 'Admin',
            'setreferer' => '/admin/index',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));

        $this->display();
    }

    public function verify() {
        $type = isset($_GET['type']) ? $_GET['type'] : 'gif';
        import("@.ORG.Util.Image");
        Image::buildImageVerify(4, 1, $type);
    }

    // 修改资料
    public function submit() {
        $action = I('action'); //操作方法
        $classname = I('classname'); //模型类
        $setreferer = I('setreferer'); //操作完返回地址
        //print_r($_POST);
        //exit;
        if ($action == 'add' && !empty($classname)) {
            $Model = D($classname);
            // 根据表单提交的POST数据创建数据对象
            if (!$Model->create()) {
                $this->error($Model->getError());
            }
            $result = $Model->add(); // 根据条件保存修改的数据
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
            if (false !== $result) {
                $this->success('修改成功！', $setreferer);
            } else {
                $this->error('修改失败!');
            }
        } else {
            $this->error('非法操作!');
        }
    }

    public function logs() {//日志记录
        $Model = D('News');
        $list = $Model->field('tags')->select();
        foreach ($list as $k => $v) {
            if (!empty($v)) {
                $tagid = explode(',', $v);
                $ftagid = '';
                foreach ($tagid as $k => $v) {
                    $ftagid .= $v . '|' . getTagName($v) . ',';
                }
            }
            $ftagid = trim($ftagid, ',');
        }
        //dump($list);
        /*
          //列表过滤器，生成查询Map对象
          $map = array();
          $keyword = I('keyword');
          if(!empty( $keyword )) {
          $map['name'] = array('like',"%".$keyword."%");
          }
          $Model = D('AdminLog');
          import("ORG.Util.Page");// 导入分页类
          $count = $Model->where($map)->count();
          $page = new Page($count,10);
          $show = $page->show();
          $list = $Model->field('id,name,time,ip,mac,status')->where($map)->order('time DESC')->select();
          $this->assign(array(
          'list' => $list,
          'page' => $show,
          ));
          dump($_SESSION);
         */
        dump($_SESSION);
        $this->display();
    }

    public function adminList() {
        if (!PermissionAction::checkPermission()) {
            $this->error('您没有权限进行此操作！');
        }
        $this->display();
    }

    public function getAdmins() {
        $AdminView = D('AdminView');
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'create_time' : $sort;
        $order = I('order');
        $order = empty($order) ? 'desc' : $order;
        $name = I('name');
        if (!empty($name)) {
            $where['title'] = array('like', "%$name%");
        }
        echo $AdminView->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

    /**
     * 添加管理员
     */
    public function add() {
        $Model = M("Admin");
        $action = I('action');
        if ($action == 'add') {
            
        } elseif ($action == 'edit') {
            $id = I('id');
            $Rs = $Model->where('id=' . $id)->find();
            $Rs['favatar'] = '<img src="' . $Rs['avatar'] . '"/>';
        }
        $fname = M('AdminGroups')->where('isopen = 1')->select();
        $this->assign(array(
            'Rs' => $Rs,
            'fname' => $fname,
            'action' => $action,
            'classname' => 'Admin',
            'setreferer' => '/admin/adminList',
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));

        $this->display();
    }

    /**
     * 处理头像上传
     */
    public function upload() {
        $result = array();
        $result['success'] = false;
        $successNum = 0;
        //定义一个变量用以储存当前头像的序号
        $i = 0;
        $msg = '';
        //上传目录
        $dir = "Uploads/adminavatar";
        //遍历所有文件域
        while (list($key, $val) = each($_FILES)) {
            if ($_FILES[$key]['error'] > 0) {
                $msg .= $_FILES[$key]['error'];
            } else {
                $fileName = date("YmdHis") . '_' . floor(microtime() * 1000) . '_' . createRandomCode(8);
                //原始图片(file 域的名称：__source，如果客户端定义可以上传的话，可在此处理）。
                if ($key == '__source') {
                    //当前头像基于原图的初始化参数，用于修改头像时保证界面的视图跟保存头像时一致。帮助提升用户体验度。修改头像时设置默认加载的原图的url为此图片的url+该参数即可。
                    $initParams = $_POST["__initParams"];
                    $virtualPath = "$dir/php_source_$fileName.jpg";
                    $result['sourceUrl'] = '/' . $virtualPath . $initParams;
                    move_uploaded_file($_FILES[$key]["tmp_name"], $virtualPath);
                    $successNum++;
                }
                //头像图片(file 域的名称：__avatar1,2,3...)。
                else if (strpos($key, '__avatar') === 0) {
                    $virtualPath = "$dir/avatar" . $i . "_$fileName.jpg";
                    $result['avatarUrls'][$i] = '/' . $virtualPath;
                    move_uploaded_file($_FILES[$key]["tmp_name"], $virtualPath);
                    $successNum++;
                    $i++;
                }
                $data['sourceavatar'] = $result['sourceUrl'];
                $data['avatar'] = $result['avatarUrls'][3]; //把大尺寸的图存进数据库中了
                //$avatar = $result['avatarUrls'][3];
                //$Member->where("id = $userId")->save($data);
                /*
                  else
                  {
                  如下代码在上传接口upload.php中定义了一个user=xxx的参数：
                  var swf = new fullAvatarEditor("swf", {
                  id: "swf",
                  upload_url: "Upload.php?user=xxx"
                  });
                  在此即可用$_POST["user"]获取xxx。
                  }
                 */
            }
        }
        $result['msg'] = $msg;
        if ($successNum > 0) {
            $result['success'] = true;
        }
        //返回图片的保存结果（返回内容为json字符串）
        print json_encode($result);
    }

    /**
     * 权限配置列
     */
    public function accessList() {
        if (!PermissionAction::checkPermission()) {
            $this->error('您没有权限进行此操作！');
        }
        $this->display();
    }

    public function getAccess() {
        $Access = D('Access');
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'id' : $sort;
        $order = I('order');
        $order = empty($order) ? 'asc' : $order;
        $name = I('name');
        if (!empty($name)) {
            $where['title'] = array('like', "%$name%");
        }
        echo $Access->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

    public function groupList() {
        $this->display();
    }

    public function getGroups() {
        $AdminView = D('AdminGroups');
        $curPage = I('page');
        $pageSize = I('rows');
        $sort = I('sort');
        $sort = empty($sort) ? 'id' : $sort;
        $order = I('order');
        $order = empty($order) ? 'asc' : $order;
        $name = I('name');
        if (!empty($name)) {
            $where['name'] = array('like', "%$name%");
        }
        echo $AdminView->getAllJson($curPage, $pageSize, $sort, $order, $where);
    }

    public function addGroup() {
        $Model = D('AdminGroups');
        $id = I('id');
        $action = I('action');
        if ($action == 'edit') {
            $Rs = $Model->where('id=' . $id)->find();
            //$Rs1 = $Model->where('id='.$id)->getField('id,name,info',':');
        }
        $this->assign(array(
            'action' => $action,
            'classname' => 'admin_groups',
            'setreferer' => '/admin/groupList',
            'Rs' => $Rs,
            'fisopen' => getRadio('isopen', array(1 => '开启', 0 => '关闭'), $Rs['isopen'], 1),
        ));
        $this->display();
    }

    public function ajaxEditGroup() {
        $cat = $_REQUEST['data'];   //用TP的I方法老不行
        $id = $cat[0]['id'];
        $Model = new AdminGroupsModel();
        $level = $cat[0]['level'];
        $ck = $Model->where("level = '$level' and id !='$id'")->find();
        if (!$ck) {
            $data['level'] = $level;
            $data['info'] = trim($cat[0]['info']);
            $data['name'] = $cat[0]['name'];
            $data['isopen'] = $cat[0]['isopen'];
            $rs = $Model->where("id = '$id'")->save($data);
            if ($rs) {
                $this->ajaxReturn($rs, '修改成功!', 1);
            } else {
                $this->ajaxReturn(0, '修改不成功！', 0);
            }
        } else {
            $this->ajaxReturn(0, '等级值设置不对！', 0);
        }
    }

    public function permissionList() {
        if (!PermissionAction::checkPermission()) {
            $this->error('您没有权限进行此操作！');
        }
        $this->display();
    }

    /**
     * 获取管理员群组信息用于easy-ui combobox
     */
    public function getGroupForCombobox() {
        $Group = D('AdminGroups');
        $Rs = $Group->field('id,name')
                ->select();
        echo json_encode($Rs);
    }

    /**
     * 获取权限信息用于easy-ui combobox
     */
    public function getAccessForCombobox() {
        $Access = D('Access');
        $Rs = $Access->field('id,title')
                ->select();
        echo json_encode($Rs);
    }

}
