<?php

return array(
    'IURL' => 'test.com', //网站域名
    'URL_MODEL' => 2, // 如果你的环境不支持PATHINFO 请设置为3
    'DB_TYPE' => 'mysql',
    'DB_HOST' => '192.168.0.105',
    'DB_NAME' => 'jkws_db2',
    'DB_USER' => 'root',
    'DB_PWD' => '123456',
    'DB_PORT' => '3306',
    'DB_PREFIX' => 'db_',
    'APP_AUTOLOAD_PATH' => '@.TagLib',
    'APP_GROUP_LIST' => 'Home,Admin',
    'DEFAULT_GROUP' => 'Home',
    'APP_GROUP_MODE' => 1,
    'SHOW_PAGE_TRACE' => 1, //显示调试信息
    'APP_SUB_DOMAIN_DEPLOY' => 1, // 开启子域名配置
    /* 子域名配置 
     * 格式如: '子域名'=>array('分组名/[模块名]','var1=a&var2=b'); 
     */
    'APP_SUB_DOMAIN_RULES' => array(
        'admin' => array('Admin/'), // admin域名指向Admin分组
        'www' => array('Home/'), //前台域名
    ),
    'URL_CASE_INSENSITIVE' => true, //设置地址为小写的，如www.test.com/user/add.html
    'URL_ROUTER_ON' => true, //开启路由
    'URL_ROUTE_RULES' => array(//定义路由规则
        'city/:name' => 'City/city',
        '/^view\/(\d+)$/' => 'view/index?id=:1',
        '/^show\/(\d+)$/' => 'view/index?id=:1',
    ),
    'TMPL_PARSE_STRING' => array(
        '--PUBLIC--' => '__PUBLIC__', // 采用新规则输出__PUBLIC__字符串
        //'__PUBLIC__' => '/Common', // 更改默认的__PUBLIC__ 替换规则
        '__JS__' => '/Public/Js', // 增加新的JS类库路径替换规则
        '__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则
        '__IURL__' => 'test.com', //域名
        '__IMAGES__' => '/Public/Images', //公共图片路径
    ),
    'ERROR_PAGE' => '/Public/error.html', //部署模式下有效，把所有异常和错误都指向一个统一页面，从而避免让用户看到异常信息
    /*
      'SHOW_RUN_TIME'    => true, // 运行时间显示
      'SHOW_ADV_TIME'    => true, // 显示详细的运行时间
      'SHOW_DB_TIMES'    => true, // 显示数据库查询和写入次数
      'SHOW_CACHE_TIMES' => true, // 显示缓存操作次数
      'SHOW_USE_MEM'     => true, // 显示内存开销
      'SHOW_LOAD_FILE'   => true, // 显示加载文件数
      'SHOW_FUN_TIMES'   => true, // 显示函数调用次数
     */
    'TOKEN_ON' => true, // 开启令牌验证
    'TOKEN_NAME' => '__hash__', // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE' => 'md5', // 令牌验证哈希规则
    'TOKEN_RESET' => true, // 令牌错误后是否重置
    'SESSION_OPTIONS' => array('domain' => '.test.com'), //session配置
    'COOKIE_DOMAIN' => '.test.com', //cookie域名
    'USER_AUTH_KEY'=>'authkey',    // 用户session ID
    //开启memcache缓存
    'DATA_CACHE_TYPE' => 'Memcache',
    'MEMCACHE_HOST' => 'tcp://127.0.0.1:11211',
    'CUT_IMG' => array(//上传图片的要切图的尺寸
        'ext' => array('_w' => 120, '_h' => 120),
    ),
);
