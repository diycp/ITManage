<?php
/**
 * FileLogRoute class file.
 *
 * @author OB <yeyq.yfr@yikuaiqu.com>
 * @link http://www.paasion.top/
 */
class FileLogRoute extends CFileLogRoute
{
	/**
	 * 重写setLogPath方法，主要是创建目录
	 * 
	 * @param $value 目录地址
	 */
	public function setLogPath($value)
	{
		if(!is_dir($value)){
			mkdir($value,0775);
		}
		parent::setLogPath($value);
	}
	
	/**
	 * 重写写日志方法，主要的作用是增加文件夹，
	 * 当你的categories在当前目录找不到对应的文件夹时，自动创建
	 * 
	 * @param array $logs 日志类
	 */
	protected function processLogs($logs)
	{
		foreach ($logs as $log){
			if($log[2] != 'application'){
				$logFileArr = explode('.',$log[2]);
				if(count($logFileArr)>1){
					array_shift($logFileArr);
					$value = dirname(__FILE__) . '/../runtime';
					foreach ($logFileArr as $logPath){
						$value .= '/' . $logPath;
						$this->setLogPath($value);
					}
				}
			}
			parent::processLogs(array($log));
		}
	}
	
	 /**
     * 重写日志格式的文件
     * 
     * @param string $message
     * @param int $level
     * @param string $category
     * @param string $time
     */
    protected function formatLogMessage($message,$level,$category,$time)
    {
        //信息是否为数组
        if(is_array($message)){
            $logMsg = json_encode($message,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES); 
        }elseif($parseResult = $this->xmlParser($message)){
            $logMsg = $parseResult;
        }else{
            $logMsg .= $message ."\n";
        }
        $logMsg = str_replace("\r\n",  PHP_EOL,$logMsg);
        return PHP_EOL.@date('Y/m/d H:i:s',$time)." $logMsg".PHP_EOL;
    }
    
    /**
    * 解析XML格式的字符串
    * @param string $str
    * @return 解析正确就返回解析结果,否则返回false,说明字符串不是XML格式
    */
    function xmlParser($str){
        $xml_parser = xml_parser_create();
        if(!xml_parse($xml_parser,$str,true)){
            xml_parser_free($xml_parser);
            return false;
        }else {
            return json_encode(simplexml_load_string($str, 'SimpleXMLElement', LIBXML_NOCDATA),JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        }
    }
}
