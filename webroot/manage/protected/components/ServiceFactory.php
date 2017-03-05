<?php

/**
 * ServiceFactory 工厂类,用来获取指定的service对象
 *
 *  eg: 
 *  调用ServiceFactory::getService("tag") 会先判断$_services数组里面有没有TagService这个对象
 *  如果没有就实例化一个并放入$_services,
 *  如果有则直接从$_services里面读取
 *
 * @property array $_services service类的注册表，
 * @author linyl <linyl@yikuaiqu.com>
 * @since 1.0
 */
class ServiceFactory 
{
    public static $_services = array();
    public static function getService($className){
        $className = ucfirst($className) . "Service";
        if(!isset(self::$_services[$className])){
            return self::$_services[$className]= new $className();
        }
        else
        {
            return self::$_services[$className];
        }
    
    }        
}
