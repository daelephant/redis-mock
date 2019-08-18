<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2019/8/18
 * Time: 08:55
 */

require_once "connect.php";

$redis = connect();

//判断redis缓存,true->从redis获取，否则查询sql
if ($data = $redis->get("users_cache")){
    echo "get data from redis<br>";
    $data = json_decode($data,true);//true代表当该参数为 TRUE 时，将返回数组，FALSE 时返回对象
}else{
    echo "get data from mysql <br>";
    //mock get data from mysql
    //TODO select from mysql
    $data = [
        ['id' => 1,'username'=>'zhangsan','gender'=>'mail'],
        ['id' => 2,'username'=>'lisi','gender'=>'femail'],
        ['id' => 3,'username'=>'wangwu','gender'=>'mail']
    ];

    $redis->set("users_cache",json_encode($data));

    $redis->expire("users_cache",5);
}

var_dump($data);
