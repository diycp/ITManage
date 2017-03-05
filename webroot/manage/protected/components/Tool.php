<?php

class Tool
{
    /**
     * 手机类型
     */
    const PHONE_TYPE = 1;
    /**
     * Email类型
     */
    const EMAIL_TYPE = 2;

    const REGEX_PHONE = 'phone';

    const REGEX_EMAIL = 'email';

    const REGEX_UTF8 = 'utf8';

    const REGEX_DATE = 'date';

    const REGEX_IDCARD = 'idcard';

    public static $patterns = array(
        'email'=>'/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/u',
        'phone'=>'/^[1][3-8]\d{9}$/u',
        'utf8'=>'%^(?:
				[\x09\x0A\x0D\x20-\x7E] # ASCII
				| [\xC2-\xDF][\x80-\xBF] # non-overlong 2-byte
				| \xE0[\xA0-\xBF][\x80-\xBF] # excluding overlongs
				| [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte
				| \xED[\x80-\x9F][\x80-\xBF] # excluding surrogates
				| \xF0[\x90-\xBF][\x80-\xBF]{2} # planes 1-3
				| [\xF1-\xF3][\x80-\xBF]{3} # planes 4-15
				| \xF4[\x80-\x8F][\x80-\xBF]{2} # plane 16
				)*$%xs',
        'date'=>'/^\d{4}-\d{1,2}-\d{1,2}$/u',
        'idcard'=>'/^\d{6}((1[89])|(2\d))\d{2}((0\d)|(1[0-2]))((3[01])|([0-2]\d))\d{3}(\d|X)$/i',
    );

    public static function trim($value){
        if(is_array($value)) {
            foreach ($value as $k => $v) {
                $value[$k] = self::trim($v);
            }
            return $value;
        } else {
            return trim($value);
        }
    }

    public static function escape($value){
        if(is_array($value)) {
            foreach ($value as $k => $v) {
                $value[$k] = self::escape($v);
            }
            return $value;
        } else {
            return addslashes($value);
        }
    }

    public static function purify($value) {
        $purifier=new CHtmlPurifier();
        $purifier->options = array(
            'URI.AllowedSchemes'=>array(
                'http' => true,
                'https' => true,
            ),
            'HTML.Allowed'=>'',
        );
        if(is_array($value)) {
            foreach ($value as $k => $v) {
                $value[$k] = self::purify($v);
            }
            return $value;
        } else {
            return $purifier->purify($value);
        }
    }

    public static function regex($value,$type='email',$pattern=''){
        if(empty($value))return false;
        $patterns = self::$patterns;
        $type = strtolower($type);
        $pattern=isset($patterns[$type])?$patterns[$type]:$pattern;
        if(empty($pattern) || $pattern<'')return false;
        return preg_match($pattern,$value);
    }

    //正则检查日期是否合法
    public static function checkDate($date, $match=''){
        if($match==''){
            if (preg_match("/^\d{4}-\d{1,2}-\d{1,2}$/u", $date)){
                return true;
            }
        }else{
            return preg_match($match, $date);
        }
        return false;
    }

    public static function formatDate($date, $pattern='Y-m-d', $showWeek = false){
        $tmpDate = date($pattern,strtotime($date));
        $week = '';
        if($showWeek){
            $week=date('w',strtotime($date));
            $weekArr=array(0=>'周日',1=>'周一',2=>'周二',3=>'周三',4=>'周四',5=>'周五',6=>'周六');
            $week = $weekArr[$week];
        }
        return $tmpDate . ' ' . $week;

    }

    public static function getDateCount($startDate, $endDate)
    {
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        return intval($start->diff($end)->format('%a'));
    }
    
    public static function createNoncestr( $length = 16 ) {  
        $chars = "0123456789";  
        $str ="";  
        for ( $i = 0; $i < $length; $i++ )  {  
            $str.= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }  
        return $str;  
    }
    public static function getClientIp() {
        $unknown = 'unknown';
        if (isset ( $_SERVER ['HTTP_X_FORWARDED_FOR'] ) && $_SERVER ['HTTP_X_FORWARDED_FOR'] && strcasecmp ( $_SERVER ['HTTP_X_FORWARDED_FOR'], $unknown )) {
            $ip = $_SERVER ['HTTP_X_FORWARDED_FOR'];
        } elseif (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], $unknown )) {
            $ip = $_SERVER ['REMOTE_ADDR'];
        }
        if (false !== strpos ( $ip, ',' )){
            $ipArray = explode ( ',', $ip );
            $ip = $ipArray[0];
        }
        return $ip;
    }
 
    /**
     * 把数组保存成序列化字符串
     * @param  array  $params        数组
     * @param  array   $filterKeys   需要过滤的键名
     * @param  boolean $urlencode    是否urlencode键值
     * @param  boolean $stripslashes 是否转义
     * @return string
     */
    public static function createKeyValueString($params, $filterKeys = [], $urlencode = false, $stripslashes = false) {
        if (!is_array($params) || empty($params)) return '';
        $paramArray = [];
        while (list ($key, $value) = each($params)) {
            if (in_array($key, $filterKeys) || $value == null) {
                continue;
            }
            if ($urlencode) {
               $value = urlencode($value);
            }
            $paramArray[] = $key . '=' . $value;
        }
        if (empty($paramArray)) return '';
        $paramStr = implode('&', $paramArray);
        if ($stripslashes) {
            if (get_magic_quotes_gpc()) {
                $paramStr = stripslashes($paramStr);
            }
        }
        return $paramStr;
    }

    public static function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
             if (is_numeric($val))
             {
                $xml.="<".$key.">".$val."</".$key.">"; 

             }
             else
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";  
        }
        $xml.="</xml>";
        return $xml; 
    }

    /**
     * 存放日志，主要目的是减少代码
     *
     * @param string $msg            
     * @param string $fileName            
     */
    public static function log($msg, $fileName) {
        Yii::log ( $msg, 'profile', 'general.' . $fileName );
    }

    public static function removeXSS($val) {
        // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
        // this prevents some character re-spacing such as <java\0script>
        // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
        $val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val);

        // straight replacements, the user should never need these since they're normal characters
        // this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&#X3A&#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29>
        $search = 'abcdefghijklmnopqrstuvwxyz';
        $search.= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $search.= '1234567890!@#$%^&*()';
        $search.= '~`";:?+/={}[]-_|\'\\';

        for ($i = 0; $i < strlen($search); $i++) {
            // ;? matches the ;, which is optional
            // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

            // &#x0040 @ search for the hex values
            $val = preg_replace('/(&#[x|X]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
            // &#00064 @ 0{0,7} matches '0' zero to seven times
            $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
        }

        // now the only remaining whitespace attacks are \t, \n, and \r
        $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
        $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
        $ra = array_merge($ra1, $ra2);

        $found = true; // keep replacing as long as the previous round replaced something
        while ($found == true) {
            $val_before = $val;
            for ($i = 0; $i < sizeof($ra); $i++) {
                $pattern = '/';
                for ($j = 0; $j < strlen($ra[$i]); $j++) {
                    if ($j > 0) {
                        $pattern .= '(';
                        $pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';
                        $pattern .= '|(&#0{0,8}([9][10][13]);?)?';
                        $pattern .= ')?';
                    }
                    $pattern .= $ra[$i][$j];
                }
                $pattern .= '/i';
                $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
                $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
                if ($val_before == $val) {
                    // no replacements were made, so exit the loop
                    $found = false;
                }
            }
        }

        return $val;
    }
    
	/**
    * 解析XML格式的字符串
    * @param string $str
    * @return 解析正确就返回解析结果,否则返回false,说明字符串不是XML格式
    */
    public static function xmlParser($str){
        $xml_parser = xml_parser_create();
        if(!xml_parse($xml_parser,$str,true)){
            xml_parser_free($xml_parser);
            return false;
        }else {
            return json_encode(simplexml_load_string($str, 'SimpleXMLElement', LIBXML_NOCDATA),JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        }
    }

    /**
     * 判断终端是否微信
     */
    public static function isWechatUA($fullVersion=false) {
        $agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        if (strpos ( $agent, 'MicroMessenger' )) {
            $version = explode ( 'MicroMessenger/', $agent );
            if($fullVersion){
                return $version[1];
            }else{
                return $version [1] [0];
            }
        } else {
            return false;
        }
    }

    public static function isMobileUA() {
        $agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $mbsys = "iPhone|ericsson|ericsson|mobile|240x320|acer|acoon|acs-|abacho|ahong|airness|alcatel|amoi|android|anywhereyougo.com|asus|audio|au-mic|avantogo|becker|benq|bilbo|bird|blackberry|blazer|bleu|cdm-|compal|coolpad|danger|dbtel|dopod|elaine|eric|etouch|fly|fly_|fly-|go.web|goodaccess|gradiente|grundig|haier|hedy|hitachi|htc|huawei|hutchison|inno|ipaq|ipod|jbrowser|kddi|kgt|kwc|lenovo|lg|lg2|lg3|lg4|lg5|lg7|lg8|lg9|lg-|lge-|lge9|longcos|maemo|mercator|meridian|micromax|midp|mini|mitsu|mmm|mmp|mobi|mot-|moto|nec-|netfront|newgen|nexian|nf-browser|nintendo|nitro|nokia|nook|novarra|obigo|palm|panasonic|pantech|philips|phone|pg-|playstation|pocket|pt-|qc-|qtek|rover|sagem|sama|samu|sanyo|samsung|sch-|scooter|sec-|sendo|sgh-|sharp|siemens|sie-|softbank|sony|spice|sprint|spv|symbian|talkabout|tcl-|teleca|telit|tianyu|tim-|toshiba|tsm|up.browser|utec|utstar|verykool|virgin|vk-|voda|voxtel|vx|wap|wellco|wig browser|wii|windows ce|wireless|xda|xde|zte";
        if(preg_match("/($mbsys)/i",$agent)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 生成随机字符串
     */
    public static function createRandomString( $length = 16 ) {  
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
        $str ="";  
        for ( $i = 0; $i < $length; $i++ )  {  
            $str.= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
        }  
        return $str;  
    }

    /**
     * 字符串截取方法(支持中英文，截取长度包含省略符)
     * @param  strign $string  字符串
     * @param  integer $length  截取长度
     * @param  string $dot      省略符
     * @param  string $charset  编码
     * @return strign
     */
    function strCut($string, $length, $dot = '...', $charset = 'UTF-8') {
        $charset = 'UTF-8';
        $strlen = strlen($string);
        if($strlen <= $length) return $string;
        $string = str_replace(
            array(' ','&nbsp;', '&', '"', '\'', '“', '”', '—', '<', '>', '·', '…'), 
            array(' ',' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'),
            $string
        );
        $strcut = '';
        if (strtolower($charset) == 'utf-8') {
            $length = intval($length-strlen($dot)-$length/3);
            $n = $tn = $noc = 0;
            while ($n < strlen($string)) {
                $t = ord($string[$n]);
                if ($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                    $tn = 1; $n++; $noc++;
                } elseif(194 <= $t && $t <= 223) {
                    $tn = 2; $n += 2; $noc += 2;
                } elseif(224 <= $t && $t <= 239) {
                    $tn = 3; $n += 3; $noc += 2;
                } elseif(240 <= $t && $t <= 247) {
                    $tn = 4; $n += 4; $noc += 2;
                } elseif(248 <= $t && $t <= 251) {
                    $tn = 5; $n += 5; $noc += 2;
                } elseif($t == 252 || $t == 253) {
                    $tn = 6; $n += 6; $noc += 2;
                } else {
                    $n++;
                }
                if ($noc >= $length) {
                    break;
                }
            }
            if ($noc > $length) {
                $n -= $tn;
            }
            $strcut = substr($string, 0, $n);
            $strcut = str_replace(
                array('∵', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), 
                array(' ', '&', '"', '\'', '“', '”', '—', '<', '>', '·', '…'),
                $strcut
            );
        } else {
            $dotlen = strlen($dot);
            $maxi = $length - $dotlen - 1;
            $current_str = '';
            $search_arr = array('&',' ', '"', "'", '“', '”', '—', '<', '>', '·', '…','∵');
            $replace_arr = array('&','&nbsp;', '"', '\'', '“', '”', '—', '<', '>', '·', '…',' ');
            $search_flip = array_flip($search_arr);
            for ($i = 0; $i < $maxi; $i++) {
                $current_str = ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
                if (in_array($current_str, $search_arr)) {
                    $key = $search_flip[$current_str];
                    $current_str = str_replace($search_arr[$key], $replace_arr[$key], $current_str);
                }
                $strcut .= $current_str;
            }
        }
        return $strcut.$dot;
    }

    public static function mixPhone($phone)
    {
        return substr($phone, 0, 3) . '****' . substr($phone, 7, 11);
    }
    

    /**
     * 解析图文
     */
    public static function analyzeSubject($subject){
        $regexh1="/<h1 ?>.*?<\/h1>/ism";
        $regeximg="/<img .*?>/ism";
        $regexp="/<p ?>.*?<\/p>/ism";
        //匹配标题
        $h1 = $img = $p = [];
        preg_match_all($regexh1, $subject, $h1,PREG_OFFSET_CAPTURE);
        preg_match_all($regeximg, $subject, $img,PREG_OFFSET_CAPTURE);
        preg_match_all($regexp, $subject, $p,PREG_OFFSET_CAPTURE);

        $res = [];
        $search = array('<p>','</p>','<h1>','</h1>');
        $replace = array('','','','');

        foreach ($h1[0] as $key => $value) {
            $res[$value[1]] = ['tag'=>'h1','value'=>str_replace($search, $replace, $value[0])];
        }
        foreach ($img[0] as $key => $value) {
            $res[$value[1]] = ['tag'=>'img','value'=>str_replace($search, $replace, $value[0])];
        }
        foreach ($p[0] as $key => $value) {
            $res[$value[1]] = ['tag'=>'p','value'=>str_replace($search, $replace, $value[0])];
        }
        ksort($res);
        return $res;
    }

    public static function rad($d)
    {
        return $d * 3.1415926535898 / 180.0;
    }

    /**
     * 计算距离
     */
    public static function GetDistance($lat1, $lng1, $lat2, $lng2)
    {
        $EARTH_RADIUS = 6378.137;
        $radLat1 = self::rad ( $lat1 );
        $radLat2 = self::rad ( $lat2 );
        $a = $radLat1 - $radLat2;
        $b = self::rad ( $lng1 ) - self::rad ( $lng2 );
        $distance = 2 * asin ( sqrt ( pow ( sin ( $a / 2 ), 2 ) + cos ( $radLat1 ) * cos ( $radLat2 ) * pow ( sin ( $b / 2 ), 2 ) ) );
        $distance = $distance * $EARTH_RADIUS;
        $distance = round ( $distance * 10000 ) / 10000;
        return $distance;
    }

    /**
     * 计算两个数组的相加
     * @param $a
     * @param $b
     * @return mixed
     */
    public static function array_add($a,$b){
        //根据键名获取两个数组的交集
        $arr=array_intersect_key($a, $b);
        //遍历第二个数组，如果键名不存在与第一个数组，将数组元素增加到第一个数组
        foreach($b as $key=>$value){
            if(!array_key_exists($key, $a)){
                $a[$key]=$value;
            }
        }
        //计算键名相同的数组元素的和，并且替换原数组中相同键名所对应的元素值
        foreach($arr as $key=>$value){
            $a[$key]=$a[$key]+$b[$key];
        }
        //返回相加后的数组
        return $a;
    }
}