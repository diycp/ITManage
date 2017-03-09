<?php

/**
 * usage: WapLogger::info('log'); or Yii::app()->logger->info('log');
 * or WapLogger::getLogger('loggerName')->error('log');
 * 本日志组件支持对象的写入,写入到日志为json格式
 */
class WapLogger extends CApplicationComponent
{

    private static $_logger;

    CONST LEVEL_INFO = 'info';
    CONST LEVEL_WARN = 'warn';
    CONST LEVEL_ERROR = 'error';
    CONST LEVEL_TRACE = 'trace';
    CONST LEVEL_DEBUG = 'debug';

    public static function getLoggerName(){
        return lcfirst(Yii::app()->getController()->id);
    }

    public static function getLogger($loggerName = null){
        if(empty($loggerName))
            $loggerName = self::getLoggerName();

        if(!isset(self::$_logger[$loggerName])) {
            self::$_logger[$loggerName] = Logger::getLogger($loggerName);
        }

        return self::$_logger[$loggerName];
    }

    private static function _write($log, $level = self::LEVEL_INFO){
        if(is_array($log) || is_object($log)){
            $log = json_encode($log);
        }

        $logger = self::getLogger();
        if(method_exists($logger, $level)){
            $logger->$level($log);
        }else{
            throw new LoggerException("call to undefined method '{$level}'.");
        }
    }

    public static function info($log){
        return self::_write($log);
    }

    public static function warn($log){
        return self::_write($log, self::LEVEL_WARN);
    }

    public static function trace($log){
        return self::_write($log, self::LEVEL_TRACE);
    }

    public static function error($log){
        return self::_write($log, self::LEVEL_ERROR);
    }

    public static function debug($log){
        return self::_write($log, self::LEVEL_DEBUG);
    }
}