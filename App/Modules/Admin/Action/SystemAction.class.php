<?php
/*
* 功能: 系统管理
* 作者：张雷刚
* 时间：2013年12月24日12:01:24
*/
class systemAction extends CommonAction {
	/*
	*城市
	*
	*/
	public function areas() {
		import("ORG.Util.Page");// 导入分页类
		$Model = D('Areas');
		
		$map = array();
		$parent_id = I('parent_id');
		$parent_id = $parent_id==0 ? 0 : $parent_id;
		$map['parent_id'] = array('eq',$parent_id);
		$keyword = I('keyword');
		if(!empty( $keyword )) {
        	$map['area_name'] = array('like',"%".$keyword."%");
        }
		
		$count = $Model->where($map)->count();
		$page = new Page($count,10);
		$show = $page->show();
		$list = $Model->where($map)->field('area_id,parent_id,area_name,area_type')->limit($page->firstRow.','.$page->listRows)->select(); 
		$this->assign(array(
			'list' => $list,
			'page' => $show,
		));
        $this->display();
    }
	//修改数据
	public function areasEdit(){
		$parent_id = I('parent_id');
		$parent_id = $parent_id==0 ? 0 : $parent_id;
		$area_id = I('area_id');
		$Model = D('Areas');
		import('@.ORG.Util.Category'); //Thinkphp导入无限分类方法  
		$catlist = $Model->field('area_id,parent_id,area_name,area_type')->select();
		$category = new Category(array('area_id','parent_id','area_name','cname'));
		$catarr = $category->getTree($catlist);//获取分类数据树结构
		//$s=$category->getTree($data,1);获取pid=1所有子类数据树结构
		
		foreach($catarr as $k=>$v){
			$cates[$v['area_id']] = $v['cname'];
		}
		$fparent_id = getOption('parent_id',$cates,$parent_id,'','','顶级分类',0);

		$action = I('action');
		if($action == 'edit'){
			$Rs = $Model->where('area_id='.$area_id)->find();
		}
		$this->assign(array(
			'fparent_id' => $fparent_id,
			'action'     => $action,
			'classname'  => 'Areas',
			'setreferer' => '/system/areas',
			'Rs'         => $Rs,
		));
		$this->display();
	}

    public function index() {
	
        $this->display();
    }
	
	// 增加、修改资料
    public function submit() {
		$action     = I('action');//操作方法
		$classname  = I('classname');//模型类
		$setreferer = I('setreferer');//操作完返回地址
		//$loginname  = $_SESSION['loginName'];//登录管理员用户名
		//print_r($_POST);
		//exit;
		if( $action=='add' && !empty($classname) ){
			$Model = D($classname);
			// 根据表单提交的POST数据创建数据对象
			if(!$Model->create()) {
				$this->error($Model->getError());
			}
			$result = $Model->add(); // 根据条件保存修改的数据
			if(false !== $result) {
				$this->success('新增成功！',$setreferer);
			}else{
				$this->error('新增失败!');
			}
		}elseif( $action=='edit' && !empty($classname) ){
			$Model = D($classname);
			// 根据表单提交的POST数据创建数据对象
			if(!$Model->create()) {
				$this->error($Model->getError());
			}
			$result = $Model->save(); // 根据条件保存修改的数
			//echo $Model->getLastSql();//输出sql语句
			if(false !== $result) {
				$this->success('修改成功！',$setreferer);
			}else{
				$this->error('修改失败!');
			}
		}else{
			$this->error('非法操作!');
		}
    }

}