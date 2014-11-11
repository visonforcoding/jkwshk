<?php
define('DOMAIN','.test.com');
//以下两行是为了子域名共享SESSION 注意 DOMAIN 需要改为实际的域名
ini_set('session.cookie_path', '/');
ini_set('session.cookie_domain', DOMAIN);
//定义项目名称和路径
define('APP_NAME', 'App');
define('APP_PATH', './App/');
define('APP_DEBUG',true);//已开启调试模式，若想开启部署模式，请删除，或者改为false
define('ROOT_PATH', rtrim(dirname(__FILE__), '/\\') .DIRECTORY_SEPARATOR);  //物理根目录
// 加载框架入口文件
require( "./ThinkPHP/ThinkPHP.php");
