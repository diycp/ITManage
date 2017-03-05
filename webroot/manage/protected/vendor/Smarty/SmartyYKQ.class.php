<?php
/**
 * Project:     Smarty: the PHP compiling template engine
 * File:        SmartyBC.class.php
 * SVN:         $Id: $
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * For questions, help, comments, discussion, etc., please join the
 * Smarty mailing list. Send a blank e-mail to
 * smarty-discussion-subscribe@googlegroups.com
 *
 * @link http://www.smarty.net/
 * @copyright 2008 New Digital Group, Inc.
 * @author Monte Ohrt <monte at ohrt dot com>
 * @author Uwe Tews
 * @author Rodney Rehm
 * @package Smarty
 */
/**
 * @ignore
 */
require(dirname(__FILE__) . '/SmartyBC.class.php');
//require(dirname(__FILE__) . '/Emergency.class.php');

/**
 * Smarty Backward Compatability Wrapper Class
 *
 * @package Smarty
 */
class SmartyYKQ extends SmartyBC {
    /**
     * Smarty 2 BC
     * @var string
     */
    public $_version = self::SMARTY_VERSION;

    /**
     * Initialize new SmartyBC object
     *
     * @param array $options options to set during initialization, e.g. array( 'forceCompile' => false )
     */
    public function __construct(array $options=array())
    {
        parent::__construct($options);
		$this->assignSiteModel();
    }
	
	public function assginUserModel($userModel){
		if(isset($userModel['user_name'])){
			$this->assign("user_name",$userModel['user_name']);
		}
		if(isset($userModel['email'])){
			$this->assign("email", $userModel['email']);
			
			$secure_email = $userModel['email'];
			for($j=3;$j<7;$j++){
				$secure_email[$j] = '*';
			}
			$this->assign("secure_email", $secure_email);
		}
		if(isset($userModel['user_phone'])){
			$this->assign("user_phone",$userModel['user_phone']);
			
			$secure_phone = $userModel['user_phone'];
			for($j=3;$j<7;$j++){
				$secure_phone[$j] = '*';
			}
			$this->assign("secure_phone", $secure_phone);
		}
		if(isset($userModel['user_short_name'])){
			$this->assign("user_short_name",$userModel['user_short_name']);
		}
		if(isset($userModel['user_real_name'])){
			$this->assign("user_real_name",$userModel['user_real_name']);
		}
		if(isset($userModel['user_vip_name'])){
			$this->assign("user_vip_name",$userModel['user_vip_name']);
		}
		if(isset($userModel['user_vip_num'])){
			$this->assign("user_vip_num",$userModel['user_vip_num']);
		}
		if(isset($userModel['user_portrait'])){
			$this->assign("user_portrait",$userModel['user_portrait']);
		}
		if(isset($userModel['gender'])){
			$this->assign("gender",$userModel['gender']);
		}
		
		if(isset($userModel['user_type_id'])){
			if($userModel['user_type_id'] == 2){
				$this->assign("user_type","高级会员");
			}else{
				$this->assign("user_type","普通会员");
			}
			$this->assign("user_type_id",$userModel['user_type_id']);
		}
		
		if(isset($userModel['weibo'])){
			$this->assign("weibo",$userModel['weibo']);
		}
		
	}
    
	public function assignSiteModel(){
		$this->assign("url_extension",defined("URL_EXTENSION") ? URL_EXTENSION : ".php");
			
		$this->assign("baseURL",defined("BASE_URL") ? BASE_URL : "");
		
		$this->assign("mediaBaseURL",defined("BASE_MEDIA_URL") ? BASE_MEDIA_URL : "");
		
		$this->assign("main_title","-一块去旅行网");
	}
	
	function getCacheData($id, $method,$module_name='wap', $type='zone', $ext='html'){
		$module_name = '';
		$dir = (($id >> 16) & 0xff)."/".(($id >> 8) & 0xff)."/$id/";
		$dir  = $type . '/'.$dir.$method.'_'.$type.'_'. $id.'.'.$ext;
		$dir = STATIC_PATH .$dir;
		$data = $this->check_remote_file_exists($dir);
		if($ext == 'json')$data = json_decode($data, true);	
		if(isset($_GET['show_d'])){echo $dir;print_r($data);}
		return $data;
	}
	
	function check_remote_file_exists($url) {
	    $ch = curl_init(); //初始化curl
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 0);
	    $result = curl_exec($ch);
	    $found = false;
	    if ($result !== false) {
	        //检查http响应码是否为200
	        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	        if ($statusCode == 200) {
	            $found = true;   
	        }
	    }
	    curl_close($ch);
	    return $found?$result:'';
	}

}

?>