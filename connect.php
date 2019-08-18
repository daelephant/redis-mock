<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2019/8/18
 * Time: 08:49
 */

function connect(){
    try{
        $redis = new Redis();
        if(!$redis->connect("127.0.0.1",6379,1)){
            throw new RedisException("Connect Failed");
        }
        $redis->auth("hello2019");
    }catch (RedisException $e){
        echo $e->getMessage();
    }
    return $redis;
}