<?php
/*
* 功能：友情链接管理
* 作者：张雷刚
* 时间：2013年12月5日12:01:24
*/
class linksAction extends CommonAction {
	public function index() {
		$types = array(5=>'健康联盟',1=>'合作媒体',2=>'生命',3=>'生态',4=>'生活');
		//列表过滤器，生成查询Map对象
		$map = array();
		$keyword = I('keyword');
		if(!empty( $keyword )) {
        	$map['account'] = array('like',"%".$keyword."%");
        }
		$Model = D("Links");
        import("ORG.Util.Page");// 导入分页类
		$count = $Model->where($map)->count();
		$page = new Page($count,10);
		$show = $page->show();		
		$list = $Model->field('id,name,type,weburl,photo,isopen')->where($map)->order()->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign(array(
			'list' => $list,
			'page' => $show,
			'types'=> $types,
		));
        $this->display();
    }
	//新增、修改营养师
    public function indexEdit() {
        $Model	 =	 M("Links");
		$action = I('action');
		if($action == 'add'){
			
		}elseif($action == 'edit'){
			$id = I('id');
			$Rs = $Model->where('id='.$id)->find();
			if($Rs['photo']){
				$Rs['fphoto'] = '<img src="'.$Rs['photo'].'" width="120" height="120" />';
			}
		}
		$types = array(5=>'健康联盟',1=>'合作媒体',2=>'生命',3=>'生态',4=>'生活');
		$this->assign(array(
			'Rs'         => $Rs,
			'action'     => $action,
			'classname'  => 'Links',
			'setreferer' => '/Links/index',
			'fisopen'    => getRadio('isopen',array(1=>'开启',0=>'关闭'),$Rs['isopen'],1),
			'ftype'      => getOption('type',$types,$Rs['type']),
			));
			
        $this->display();
    }
	

}