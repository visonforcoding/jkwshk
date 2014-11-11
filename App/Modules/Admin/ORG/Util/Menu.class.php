<?php
/*
*xml文档操作类
*作者：张雷刚
*时间：2013年12月3日15:12:26
*
*/
class Menu{
	private $doc;
	private static $_instance;
	private function __construct($file="") {
		$xml = new DOMDocument();
		$xml->load('App/Conf/menu.xml');
		$this->doc = $xml->getElementsByTagName( "root" )->item(0);
	}
	public static function getInstance($file=""){
		if(!(self::$_instance instanceof self)){
			self::$_instance=new self($file);
		}
		return self::$_instance;
	}
	private function getArttrib($doc,$name){
		if($doc&&$doc->hasAttributes()) {
			return $doc->getAttribute($name);
		}
		return "";
	}
	public function getMenu(){//主菜单
		$items=$this->doc->getElementsByTagName("menu");
		$menu=array();
		foreach($items as $k=>$item){
			$name=$this->getArttrib($item,'name');
			$menu[$name]['title']=$this->getArttrib($item,'title');
			$menu[$name]['name']=$name;
		}
		return $menu;
	}
	public function getSubMenu($p=0){//主菜单
		$items=$this->doc->getElementsByTagName("menu");
		$menu=array();
		foreach($items as $k=>$item){
			$name=$this->getArttrib($item,'name');
			if($name==$p){
				$subitems=$item->getElementsByTagName("item");
				foreach($subitems as $ik=>$subitem){
					$name=$this->getArttrib($subitem,'name');
					$menu[$name]=array('title'=>$subitem->nodeValue,'func'=>$this->getArttrib($subitem,'func'),'name'=>$name);
				}
				break;
			}
		}
		return $menu;
	}
}
?>