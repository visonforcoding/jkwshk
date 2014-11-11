<?php
/*
* 功能： 旅游通栏管理
* 作者：张雷刚
* 时间：2013年12月5日12:01:24
*/
class TravelAction extends CommonAction {
	public function index() {
		//列表过滤器，生成查询Map对象
		$map = array();
		$keyword = I('keyword');
		if(!empty( $keyword )) {
        	$map['name'] = array('like',"%".$keyword."%");
        }
		
		$Model = D("Travel");
        import("ORG.Util.Page");// 导入分页类
		$count = $Model->where($map)->count();
		$page = new Page($count,10);
		$show = $page->show();		
		$list = $Model->field('id,name,hits,addtime,userid,updatetime,isopen')->where($map)->order('updatetime DESC')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign(array(
			'list'    => $list,
			'page'    => $show,
			'keyword' => $keyword,
		));
        $this->display();
    }
	//新增、修改
    public function indexEdit() {
        $Model	 =	 D("Travel");
		$action = I('action');
		if($action == 'add'){
			$Rs['photo'] = '';
		}elseif($action == 'edit'){
			$id = I('id');
			$Rs = $Model->find($id);
			if($Rs['photo']){
				$Rs['fphoto'] = '<img src="'.$Rs['photo'].'" width="120" height="120" />';
			}
			if(!empty($Rs['tagid'])){
				$tagid = explode(',',$Rs['tagid']);
				foreach($tagid as $k=>$v){
					$t1 = explode('|',$v);
					$Rs['ftags'] .= '<input type="checkbox" name="tagid[]" id="flagsp" value="'.$v.'" checked="checked"> <label for="flagsp" class="ml5 mr20"> '.$t1[1].'</label>';
				}
			}
		}
		$this->assign(array(
			'Rs'         => $Rs,
			'action'     => $action,
			'classname'  => 'Travel',
			'setreferer' => '/Travel/index',
			'fisopen'    => getRadio('isopen',array(1=>'开启',0=>'关闭'),$Rs['isopen'],1),
			'fflags'     => getCheckBox('flags',$fattr,explode(',',$Rs['flags']) ),
			));
			
        $this->display();
    }

}