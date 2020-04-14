<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('partial_uri'))
{
    function partial_uri($start = 0) {
        return join('/',array_slice(get_instance()->uri->segment_array(), $start));
    }
}
if (!function_exists('admin_with_base_url'))
{
    function admin_with_base_url() {
        return base_url()."adminportal/";
    }
}
if (!function_exists('admin_except_base_url'))
{
    function admin_except_base_url() {
        return "adminportal/";
    }
}

if (!function_exists('admindirecory'))
{
    function admindirecory() {
       return 'adminportal';
    }
}

if (!function_exists('pre'))
{
    function pre($arr=[]) {
       echo "<pre>";
       print_r($arr);
       echo "</pre>";
    }
}

if (!function_exists('redirect_dashboard'))
{
    function redirect_dashboard() {
        redirect(admin_except_base_url().'dashboard/');
    }
}

if (!function_exists('redirect_login'))
{
    function redirect_login() {
        redirect(admin_except_base_url().'login/');
    }
}

if (!function_exists('limitTextChars'))
{
    function limitTextChars($content = false, $limit = false, $stripTags = false, $ellipsis = false) 
    {
     
            // $content  = ($stripTags ? strip_tags($content) : $content);
            // $ellipsis = ($ellipsis ? "" : $ellipsis);
            // $content  = mb_strimwidth($content, 0, $limit, $ellipsis);
            $content  = substr($content, 0, $limit);
   
        return $content;
    }
}

if (!function_exists('csrftokenValue'))
{
    function csrftokenValue() 
    {
        $CI =& get_instance();
       return $CI->security->get_csrf_hash();
    }
}

if (!function_exists('csrftokenName'))
{
    function csrftokenName() 
    {
        $CI =& get_instance();
       return $CI->security->get_csrf_token_name();
    }
}

if(!function_exists('getUserIPAddress'))
{
	
	function getUserIPAddress(){
		$CI =& get_instance();
		$ip_add="";
		$ip_add = $CI->input->ip_address();
		return $ip_add ;
	}
}

if(!function_exists('getUserBrowserName'))
{
	function getUserBrowserName(){
		
		$CI =& get_instance();
		$CI->load->library('user_agent');
		$agent = "";
		if ($CI->agent->is_browser())
		{
				$agent = $CI->agent->browser();
		}
		elseif ($CI->agent->is_robot())
		{
				$agent = $CI->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
				$agent = $CI->agent->mobile();
		}
		else
		{
				$agent = 'Unidentified';
		}
		return $agent ;
	}
}
if(!function_exists('getUserPlatform'))
{
	function getUserPlatform()
	{
		$CI =& get_instance();
		$user_platform = "";
		$user_platform = $CI->agent->platform();
		return $user_platform ;
	}
}
if(!function_exists('getCurrentUrl'))
{
    function getCurrentUrl() {
        $ci =& get_instance();
        $host = $ci->config->item('host_url');
        $actual_link = $host.$_SERVER['REQUEST_URI'];
        return $actual_link;
    }
}

if(!function_exists('getLoggedInuserID'))
{
    function getLoggedInuserID() {
        $logged_in_userd_id = 0;
        $ci =& get_instance();
        $logged_in_userd_id = $ci->_authModel->logged_user_info()['userid'];
       return $logged_in_userd_id;
    }
}

   
    if(!function_exists('resizeImage'))
    {
        function resizeImage($filename,$width,$height)
        {
            $ci =& get_instance();
            $source_path = MEDIA_UPLOAD_PATH. $filename;
            $target_path = MEDIA_UPLOAD_THUMBNAIL_PATH ;
            $config_manip = array(
                'image_library' => 'gd2',
                'source_image' => $source_path,
                'new_image' => $target_path,
                'quality' => "100%",
                'maintain_ratio' => TRUE,
                'create_thumb' => TRUE,
                'thumb_marker' => MEDIA_UPLOAD_THUMBNAIL_SUFFIX,
                'width' => $width,
                'height' => $height
                
            );
            $ci->load->library('image_lib', $config_manip);
            if (!$ci->image_lib->resize()) {
                return $ci->image_lib->display_errors();
            }
            
            $ci->image_lib->clear();
        }
    }


    /**
     * @params
     * $file = FILE Name (<input type="file" name="myfilename" /> here myfilename need to be pass)
     * $uploadLocation = File upload location
     * $thumbnail = is thumbnail required -- thumbnail required = true , thumbnail not required = false
     */

    if(!function_exists('commonFileUpload')){
        function commonFileUpload($file,$dir,$thumbnail=true,$fileTitle=null,$fileAltText = null,$moduleName=null){
            $responseArry = [];
            $inserted_id = 0;
            $ci =& get_instance();
            $config = array(
                'upload_path' => $dir,
                'allowed_types' => 'gif|jpg|png|jpeg|pdf',
                'max_size' => '0',
                'max_filename' => '255',
                'encrypt_name' => TRUE
            );
            $ci->load->library('upload', $config);
            if($ci->upload->do_upload($file)) {
                $file_detail = $ci->upload->data();
                $random_file_name = $file_detail['file_name'];
                $file_url = base_url()."assets/webdoc/mediaupload/".$random_file_name;
                $is_image = false;
                if(isImage($file_detail['file_ext'])) {
                    $is_image = true;
                }
                $thumbnailname = null;
                if(isImage($file_detail['file_ext']) && $thumbnail == true){ 
                  resizeImage($file_detail['file_name'],350,350);
                  $thumbnailname = $file_detail['raw_name'].MEDIA_UPLOAD_THUMBNAIL_SUFFIX.$file_detail['file_ext'];
                }

                $insert_arr = [
                    "random_file_name" => $random_file_name,
                    "file_original_name" => $file_detail['orig_name'],
                    "file_thumbnail_name" => $thumbnailname,
                    "file_title" => $fileTitle,
                    "file_extension" => $file_detail['file_ext'],
                    "is_image" => $is_image,
                    "file_url" => $file_url,
                    "alt_txt" => $fileAltText,
                    "uploaded_by" => getLoggedInuserID()
                ];
                $inserted_id = $ci->_commonQueryModel->insertSingleTableData('media_upload',$insert_arr);
                $ci->_commonQueryModel->insertUserActivityData($moduleName, $fileTitle. " file name uploaded successfully","INSERT");
                $responseArry = [
                    "media_uploaded_id" => $inserted_id,
                    "random_file_name" =>  $random_file_name,
                    "file_original_name" =>  $file_detail['orig_name'],
                    "file_thumbnail_name" =>  $thumbnailname,
                    "file_extension" =>  $file_detail['file_ext'],
                    "file_url" =>  $file_url,
                    "error" => null
                ];
            }
            else {
                $responseArry = [
                    "media_uploaded_id" => $inserted_id,
                    "random_file_name" =>  $random_file_name,
                    "file_original_name" =>  $file_detail['orig_name'],
                    "file_thumbnail_name" =>  $thumbnailname,
                    "file_extension" =>  $file_detail['file_ext'],
                    "file_url" =>  $file_url,
                    "error" => $ci->upload->display_errors()
                ];
            }
            return $responseArry;
        }
    }


    if(!function_exists('filesize_formatted'))
    {
        function filesize_formatted($file)
        {
            $bytes = filesize($file);
        
            if ($bytes >= 1073741824) {
                return number_format($bytes / 1073741824, 2) . ' GB';
            } elseif ($bytes >= 1048576) {
                return number_format($bytes / 1048576, 2) . ' MB';
            } elseif ($bytes >= 1024) {
                return number_format($bytes / 1024, 2) . ' KB';
            } elseif ($bytes > 1) {
                return $bytes . ' bytes';
            } elseif ($bytes == 1) {
                return '1 byte';
            } else {
                return '0 bytes';
            }
        }
    }


    if(!function_exists('_encrypt'))
    {
    function _encrypt($pure_string) {
        $dirty = array("+", "/", "=");
        //$clean = array("_PLUS_", "_SLASH_", "_EQUALS_");
        $clean = array("", "", "");
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $_SESSION['iv'] = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, "zkmgXIhfrQILidN5nJ8P3VJk9Khe2EOK", utf8_encode($pure_string), MCRYPT_MODE_ECB, $_SESSION['iv']);
        $encrypted_string = base64_encode($encrypted_string);
        return str_replace($dirty, $clean, $encrypted_string);
        //return $encrypted_string;
    }
    }


    if(!function_exists('_decrypt'))
    {
    function _decrypt($encrypted_string) { 
        $dirty = array("+", "/", "=");
        //$clean = array("_PLUS_", "_SLASH_", "_EQUALS_");
        $clean = array("", "", "");
    
        $string = base64_decode(str_replace($clean, $dirty, $encrypted_string));
       // $string = base64_decode($encrypted_string);
    
        //$decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, "zkmgXIhfrQILidN5nJ8P3VJk9Khe2EOK",$string, MCRYPT_MODE_ECB, $_SESSION['iv']);            
        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, "zkmgXIhfrQILidN5nJ8P3VJk9Khe2EOK",$string, MCRYPT_MODE_ECB, $_SESSION['iv']);            
        return $decrypted_string;
    }
    }

    if(!function_exists('urlofWebMenusByType'))
    {
        function urlofWebMenusByType($url,$type,$menu_for,$block=NULL) {
            $url_string = "";
            switch ($menu_for) {
                case 'DIST':
                        if($type=="PAGE") {
                        return $url_string =   base_url().$url->url_slug;
                      }
                      else if($type=="LINK") {
                          return $url_string =   $url->menu_title;
                      }
                    break;
                case 'BLOCK':
                    if($type=="PAGE") {
                        return $url_string =   base_url()."block/".$block."/".$url->url_slug;
                    }
                    else if($type=="LINK") {
                        return $url_string =   $url->menu_title;
                    }
                    break;
                default:
                    $url_string = "";
                    break;
            }
        }
    }

    if(!function_exists('isImage'))
    {
        function isImage($ext) { 
            $imageExtArray = ['.gif','.jpg','.png','.jpeg'];
            if(in_array($ext,$imageExtArray)) 
            {
                return true;
            }
            else {
                return false;
            }
        }
    }
    if(!function_exists('arrayToStringWithDlm'))
    {
        function arrayToStringWithDlm($arr,$delimiter=",") { 
            $str = "";
            for($i=0;$i<count($arr);$i++) {
                $str.=$arr[$i].$delimiter;
            }
            rtrim($str,$delimiter);
            return $str;
        }
    }
    if(!function_exists('arrayObjectToStringWithDlm'))
    {
        function arrayObjectToStringWithDlm($arr,$column,$delimiter=",") { 
            $str = "";
            if(count($arr)>0) {
                foreach($arr as $data_arr) {
                $str.= $data_arr->$column.$delimiter;
                }
            }
            $str = rtrim($str,$delimiter);
            return $str;
        }
    }

    if(!function_exists('breadcrumb'))
	{
		
		function breadcrumb($menu_link) {
               // echo $menu_link = partial_uri(0);

			    // $currentURL = current_url();
                // $baseurl = base_url();
                // $baseurllen=strlen($baseurl);
                // $mainurl=substr($currentURL, $baseurllen); 

				$breadcrumb=[];
				$CI =& get_instance();
				$CI->load->model('adminportal/Menu_model','_menuModel',TRUE);
				$where = array('url_slug' => $menu_link );
                $breadcrumb = $CI->_menuModel->breadcrumbinfo($menu_link);
                //pre($breadcrumb);
			    return $breadcrumb;
		}
	}




