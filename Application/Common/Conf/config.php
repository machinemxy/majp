<?php
return array(
	//'配置项'=>'配置值'

    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  SAE_MYSQL_HOST_M, // 服务器地址
    'DB_NAME'               =>  SAE_MYSQL_DB,          // 数据库名
    'DB_USER'               =>  SAE_MYSQL_USER,      // 用户名
    'DB_PWD'                =>  SAE_MYSQL_PASS,          // 密码
    'DB_PORT'               =>  SAE_MYSQL_PORT,        // 端口
    'DB_PREFIX'             =>  'majp_',    // 数据库表前缀

    /* 模板引擎设置 */
    'TMPL_ACTION_ERROR'     =>  'Public/dispatch_jump', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  'Public/dispatch_jump', // 默认成功跳转对应的模板文件
    'LAYOUT_ON'             =>  true, // 是否启用布局
);