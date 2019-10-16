<?php
global $wp_version;
$wp_version = '4.7.4';
if (!defined('__DIR__'))
    define('__DIR__', dirname(__FILE__));
define( 'KB_IN_BYTES', 1024 );
define( 'MB_IN_BYTES', 1024 * KB_IN_BYTES ); 
define( 'GB_IN_BYTES', 1024 * MB_IN_BYTES );
define( 'TB_IN_BYTES', 1024 * GB_IN_BYTES );  
if (!defined('RS_PLUGIN_ADDONS_PATH'))
    define('RS_PLUGIN_ADDONS_PATH', DIR_SYSTEM.'config/revslider/addons/');
//place for addons

define( 'WPINC', '' ); 


                


//
function get_mainsite_url() {
    $HTTP_SERVER = get_http_server();
    $url = str_replace('admin/', '', $HTTP_SERVER);
    return $url;
}

function get_mainsite_dir() {
    $DIR_IMAGE = rev_image_url();
    $url = str_replace('image/', '', $DIR_IMAGE);
    return $url;
}
function wp_is_mobile() {
    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        $is_mobile = false;
    } elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
            $is_mobile = true;
    } else {
        $is_mobile = false;
    }
 
    return $is_mobile;
}
function getProductByCategoryID(){
    $data = array(
        'filter_category_id' => $selected_category 
    ); 
if (!is_admin()) {
    
}
}
function get_rev_url() {
    $url = new Url();
    return $url;
}
                
function get_http() {
    if (is_ssl())
        return 'https://';
    else
        return 'http://';
}

function get_http_server() {
    if (is_ssl())
        return HTTPS_SERVER;
    else
        return HTTP_SERVER;
}
function esc_attr($value,$ext=''){
    return $value;
}
function get_http_catalog() {
    if (is_ssl())
        return HTTPS_CATALOG;
    else
        return HTTP_CATALOG;
}
//function apply_filters($tag, $value) {
//        global $wp_filter, $merged_filters, $wp_current_filter;
//
//        $args = array();
//
//        // Do 'all' actions first.
//        if (isset($wp_filter['all'])) {
//            $wp_current_filter[] = $tag;
//            $args = func_get_args();
//            _wp_call_all_hook($args);
//        }
//
//        if (!isset($wp_filter[$tag])) {
//            if (isset($wp_filter['all']))
//                array_pop($wp_current_filter);
//            return $value;
//        }
//
//        if (!isset($wp_filter['all']))
//            $wp_current_filter[] = $tag;
//
//        // Sort.
//        if (!isset($merged_filters[$tag])) {
//            ksort($wp_filter[$tag]);
//            $merged_filters[$tag] = true;
//        }
//
//        reset($wp_filter[$tag]);
//
//        if (empty($args))
//            $args = func_get_args();
//
//        do {
//            foreach ((array) current($wp_filter[$tag]) as $the_)
//                if (!is_null($the_['function'])) {
//                    $args[1] = $value;
//                    $value = call_user_func_array($the_['function'], array_slice($args, 1, (int) $the_['accepted_args']));
//                }
//        } while (next($wp_filter[$tag]) !== false);
//
//        array_pop($wp_current_filter);
//
//        return $value;
//    }
  

                
    function wp_remote_get($url, $args = array())
{  
    $tools_class = new Tools();
    return $tools_class->getHttpCurl($url, $args);
}

    function update_option($key, $value)
{ 
    $wpdb = rev_db_class::rev_db_instance();
    $is_exist = $wpdb->get_var("SELECT id FROM `{$wpdb->prefix}" . RevSliderGlobals::TABLE_REVSLIDER_OPTIONS_NAME . "` WHERE `name`='{$key}'");
   
    if (is_array($value) || is_object($value)) {
       
        $value = json_encode($value);
        $value = addslashes($value);
    }
    // var_dump($value);
    if (!empty($is_exist)) {
        $wpdb->query("UPDATE `" . $wpdb->prefix . RevSliderGlobals::TABLE_REVSLIDER_OPTIONS_NAME . "` SET `value`='{$value}' WHERE `id`={$is_exist} AND `name`='{$key}';");
    } else {
        $wpdb->query("INSERT INTO `" . $wpdb->prefix . RevSliderGlobals::TABLE_REVSLIDER_OPTIONS_NAME . "` (`name`, `value`) VALUES ('{$key}', '{$value}');");
    }

    return true;
}

function get_option($key, $default = false)
{ 
    $wpdb = rev_db_class::rev_db_instance();

    $value = $wpdb->get_var("SELECT value FROM `{$wpdb->prefix}" . RevSliderGlobals::TABLE_REVSLIDER_OPTIONS_NAME . "` WHERE `name`='{$key}'");
                
//    $check_json = json_decode(stripslashes($value));
//    
//    if(is_object($check_json) && !empty($check_json)){
//                
//        $value = (array)json_decode($value); 
//    } 
    
    return $value !== false ? $value : $default;
}            

function get_transient($option_name)
{ 
    $main_opt_name = "_trns_{$option_name}";

    $return = false;

    $wpdb = rev_db_class::rev_db_instance();



    $result = $wpdb->get_row("SELECT * FROM `" . $wpdb->prefix . RevSliderGlobals::TABLE_REVSLIDER_OPTIONS_NAME . "` WHERE `name`='{$main_opt_name}'");
   // $data = preg_replace_callback('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $result['value']);
                
    $return_temp = (array)json_decode(stripslashes($result['value']));
    
   // var_dump($return_temp);die();
    if ($result && is_array($result) && $return_temp !=null) {
        if ($return_temp['reset_time'] >= time()) {
            $return = $return_temp['data'];
        }
    }
    return $return;
} 

function set_transient($option_name, $option_value, $reset_time = 1200)
{ 
    $main_opt_name = "_trns_{$option_name}";
    $wpdb = rev_db_class::rev_db_instance();

    $serialized_data = array();

    $serialized_data['reset_time'] = time() + $reset_time;

    $serialized_data['data'] = $option_value;

  //  $serialized_data = addslashes(serialize($serialized_data));
    $serialized_data =  addslashes(json_encode($serialized_data));

    $is_exist = $wpdb->get_row("SELECT * FROM `" . $wpdb->prefix . RevSliderGlobals::TABLE_REVSLIDER_OPTIONS_NAME . "` WHERE `name`='{$main_opt_name}'");

    $result_temp =(array) json_decode($is_exist['value']);
                
    //if ((!$is_exist || $result_temp['reset_time'] < time())) {
        if ($is_exist && isset($result_temp['reset_time']) && $result_temp['reset_time'] < time()) { 
            $wpdb->query("UPDATE `" . $wpdb->prefix . RevSliderGlobals::TABLE_REVSLIDER_OPTIONS_NAME . "` SET `value`='" . $serialized_data . "' WHERE `name`='{$main_opt_name}';");
           } else {
            $wpdb->query("INSERT INTO `" . $wpdb->prefix . RevSliderGlobals::TABLE_REVSLIDER_OPTIONS_NAME . "` (`id`, `name`, `value`) VALUES (NULL, '" . $main_opt_name . "', '" . $serialized_data . "');");
        }
   // }
    
}
function esc_html($value){
    return $value;
}
function wp_remote_fopen($Url)
{ 
    $UserAgentList = array();
    $UserAgentList[] = "Mozilla/4.0 (compatible; MSIE 6.0; X11; Linux i686; en) Opera 8.01";
    $UserAgentList[] = "Mozilla/5.0 (compatible; Konqueror/3.3; Linux) (KHTML, like Gecko)";
    $UserAgentList[] = "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.121 Safari/535.2";
    $UserAgentList[] = "Mozilla/5.0 (Windows; U; Windows NT 5.1; pl; rv:1.9.2.25) Gecko/20111212 Firefox/3.6.25";
    $UserAgentList[] = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7";
    $UserAgentList[] = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; Win64; x64; SV1; .NET CLR 2.0.50727)";
    $UserAgentList[] = "Mozilla/5.0 (Windows NT 6.1; rv:8.0.1) Gecko/20100101 Firefox/8.0.1";
    $UserAgentList[] = "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.63 Safari/535.7";

    $hcurl = curl_init();

    curl_setopt($hcurl, CURLOPT_URL, $Url);
    curl_setopt($hcurl, CURLOPT_USERAGENT, $UserAgentList[array_rand($UserAgentList)]);
    curl_setopt($hcurl, CURLOPT_TIMEOUT, 120);
    curl_setopt($hcurl, CURLOPT_CONNECTTIMEOUT, 1);
    curl_setopt($hcurl, CURLOPT_RETURNTRANSFER, 1);
   // curl_setopt($hcurl, CURLOPT_SSL_VERIFYPEER, false);

    $result = curl_exec($hcurl);
    curl_close($hcurl);

    return $result;
}
function wp_is_stream( $path ) {
    $wrappers = stream_get_wrappers();
    $wrappers_re = '(' . join('|', $wrappers) . ')';
 
    return preg_match( "!^$wrappers_re://!", $path ) === 1;
}

function wp_get_attachment_image_src_by_url($file_url, $size = 'thumbnail', $args = array()) {
    $wpdb = rev_db_class::rev_db_instance();
   // $tablename = $wpdb->prefix . GlobalsRevSlider::TABLE_ATTACHMENT_IMAGES;
    $filename = basename($file_url);
    
    $filepath = RevSliderFunctionsWP::getImageDirFromUrl($file_url);
    // var_dump($filepath);die();
   if (file_exists($filepath)) {
        $filerealname = substr($filename, 0, strrpos($filename, '.'));
        $fileext = substr($filename, strrpos($filename, '.'), strlen($filename) - strlen($filerealname));
        $newfilename = $filerealname;
                $no_ext = false;
        if (gettype($size) == 'string') {
            switch ($size) {
                case "thumbnail":
                    $px = GlobalsRevSlider::IMAGE_SIZE_THUMBNAIL;
                    $newfilename .= "-{$px}x{$px}";
                    break;
                case "medium":
                    $px = GlobalsRevSlider::IMAGE_SIZE_MEDIUM;
                    $px_H = GlobalsRevSlider::IMAGE_SIZE_MEDIUM_H;
                    $newfilename .= "-{$px}x{$px_H}";
                    break;
                case "thumb":
                    $px = GlobalsRevSlider::IMAGE_SIZE_THUMBNAIL;
                    $newfilename .= "-{$px}x{$px}";
                    break;
                case "large":
                    $px = GlobalsRevSlider::IMAGE_SIZE_LARGE;
                    $newfilename .= "-{$px}x{$px}";
                    break;
                default: 
                    $newfilename = $file_url;
                    $no_ext = true;
                    break;
            }
            
            if($no_ext == false){
                $newfilename .= $fileext;
                
                $newfilename = uploads_real_url($newfilename);
            }
            
            $imagesize = get_image_real_size($newfilename);
            
            return $newfilename ;
        }
     }
    return false;
}
function wp_mkdir_p( $target ) {
    $wrapper = null;
 
    // Strip the protocol.
    if ( wp_is_stream( $target ) ) {
        list( $wrapper, $target ) = explode( '://', $target, 2 );
    }
 
    // From php.net/mkdir user contributed notes.
    $target = str_replace( '//', '/', $target );
 
    // Put the wrapper back on the target.
    if ( $wrapper !== null ) {
        $target = $wrapper . '://' . $target;
    }
 
    /*
     * Safe mode fails with a trailing slash under certain PHP versions.
     * Use rtrim() instead of untrailingslashit to avoid formatting.php dependency.
     */
    $target = rtrim($target, '/');
    if ( empty($target) )
        $target = '/';
 
    if ( file_exists( $target ) )
        return @is_dir( $target );
 
    // We need to find the permissions of the parent folder that exists and inherit that.
    $target_parent = dirname( $target );
    while ( '.' != $target_parent && ! is_dir( $target_parent ) ) {
        $target_parent = dirname( $target_parent );
    }
 
    // Get the permission bits.
    if ( $stat = @stat( $target_parent ) ) {
        $dir_perms = $stat['mode'] & 0007777;
    } else {
        $dir_perms = 0777;
    }
 
    if ( @mkdir( $target, $dir_perms, true ) ) {
 
        /*
         * If a umask is set that modifies $dir_perms, we'll have to re-set
         * the $dir_perms correctly with chmod()
         */
        if ( $dir_perms != ( $dir_perms & ~umask() ) ) {
            $folder_parts = explode( '/', substr( $target, strlen( $target_parent ) + 1 ) );
            for ( $i = 1, $c = count( $folder_parts ); $i <= $c; $i++ ) {
                @chmod( $target_parent . '/' . implode( '/', array_slice( $folder_parts, 0, $i ) ), $dir_perms );
            }
        }
 
        return true;
    }
 
    return false;
}
function size_format( $bytes, $decimals = 0 ) {
    $quant = array(
        'TB' => TB_IN_BYTES,
        'GB' => GB_IN_BYTES,
        'MB' => MB_IN_BYTES,
        'KB' => KB_IN_BYTES,
        'B'  => 1,
    );
 
    if ( 0 === $bytes ) {
        return number_format_i18n( 0, $decimals ) . ' B';
    }
 
    foreach ( $quant as $unit => $mag ) {
        if ( doubleval( $bytes ) >= $mag ) {
            return number_format_i18n( $bytes / $mag, $decimals ) . ' ' . $unit;
        }
    }
 
    return false;
}
function absint( $maybeint ) {
    return abs( intval( $maybeint ) );
}
function number_format_i18n( $number, $decimals = 0 ) {
    global $wp_locale;
 
    if ( isset( $wp_locale ) ) {
        $formatted = number_format( $number, absint( $decimals ), $wp_locale->number_format['decimal_point'], $wp_locale->number_format['thousands_sep'] );
    } else {
        $formatted = number_format( $number, absint( $decimals ) );
    }
 
    /**
     * Filters the number formatted based on the locale.
     *
     * @since  2.8.0
     *
     * @param string $formatted Converted number in string format.
     */
    return apply_filters( 'number_format_i18n', $formatted );
}
function wp_convert_hr_to_bytes( $size ) {
	$size  = strtolower( $size );
	$bytes = (int) $size;
	if ( strpos( $size, 'k' ) !== false )
		$bytes = intval( $size ) * 1024;
	elseif ( strpos( $size, 'm' ) !== false )
		$bytes = intval($size) * 1024 * 1024;
	elseif ( strpos( $size, 'g' ) !== false )
		$bytes = intval( $size ) * 1024 * 1024 * 1024;
	return $bytes;
}
function wp_is_writable( $path ) {
    if ( 'WIN' === strtoupper( substr( PHP_OS, 0, 3 ) ) )
        return win_is_writable( $path );
    else
        return @is_writable( $path );
}
function win_is_writable( $path ) {
 
    if ( $path[strlen( $path ) - 1] == '/' ) { // if it looks like a directory, check a random file within the directory
        return win_is_writable( $path . uniqid( mt_rand() ) . '.tmp');
    } elseif ( is_dir( $path ) ) { // If it's a directory (and not a file) check a random file within the directory
        return win_is_writable( $path . '/' . uniqid( mt_rand() ) . '.tmp' );
    }
    // check tmp file for read/write capabilities
    $should_delete_tmp_file = !file_exists( $path );
    $f = @fopen( $path, 'a' );
    if ( $f === false )
        return false;
    fclose( $f );
    if ( $should_delete_tmp_file )
        unlink( $path );
    return true;
}
function selected($selected, $current = true, $echo = true)
{ 
    return __checked_selected_helper($selected, $current, $echo, 'selected');
}
function __checked_selected_helper($helper, $current, $echo, $type)
{ 
    if ((string) $helper === (string) $current) {
        $result = " $type='$type'";
    } else {
        $result = '';
    }

    if ($echo) {
        echo $result;
    } else {
        return $result;
    }
}
function checked($checked, $current = true, $echo = true)
{ 
    return __checked_selected_helper($checked, $current, $echo, 'checked');
}
function get_intermediate_image_sizes() { 
    $image_sizes = array('thumbnail', 'medium', 'medium_large', 'large','custom-size'); // Standard sizes
                
    /**
     * Filters the list of intermediate image sizes.
     *
     * @since 2.5.0
     *
     * @param array $image_sizes An array of intermediate image sizes. Defaults
     *                           are 'thumbnail', 'medium', 'medium_large', 'large'.
     */
    return  $image_sizes  ;
}

function plugin_dir_path($filepath){
    $filename = basename($filepath);
    
    $file_dir = str_replace($filename, '', $filepath);
    return $file_dir;
}
function plugin_dir_url($fileurl){
    $filename = basename($fileurl);
    
    $file_url = str_replace($filename, '', $fileurl);
    
    
    $get_mainsite_dir = str_replace("/", '\\', get_mainsite_dir());
    
    $file_url = str_replace($get_mainsite_dir, get_mainsite_url(), $file_url);
    $file_url = str_replace( '\\',"/", $file_url);
    
    return $file_url;
}
$get_mainsite_url = get_mainsite_url();
if (!defined('__PS_BASE_URI__'))
    define('__PS_BASE_URI__', $get_mainsite_url);

if (!defined('__OC_BASE_URI__'))
    define('__OC_BASE_URI__', $get_mainsite_url);

if (!defined('REV_DIR_CONFIG'))
    define('REV_DIR_CONFIG', __OC_BASE_URI__ . 'system/config/');

if (!defined('SDS_REV_DIR_IMAGE'))
    define('SDS_REV_DIR_IMAGE', $get_mainsite_url);

if (!defined('ARRAY_A'))
    define('ARRAY_A', true);

if (!defined('OBJECT'))
    define('OBJECT', false);

if (!defined('ABSPATH'))
    define('ABSPATH', __DIR__);

if (!defined('RS_PLUGIN_PATH'))
    define('RS_PLUGIN_PATH', DIR_SYSTEM . 'config/revslider/');

if (!defined('RS_PLUGIN_URL'))
    define('RS_PLUGIN_URL', rev_slider_url() . '/');

if (!defined('REVSLIDER_TEXTDOMAIN'))
    define('REVSLIDER_TEXTDOMAIN', "revslider");



$WP_CONTENT_DIR = uploads_url();
if (!defined('WP_CONTENT_DIR'))
    define('WP_CONTENT_DIR', $WP_CONTENT_DIR);

$currentFolder = ABSPATH;

$folderIncludes = "{$currentFolder}/includes/framework/";

$revSliderAsTheme = false;

require_once $currentFolder . '/rev-db.php';

require_once $folderIncludes . 'include_framework.php';

require_once $currentFolder . '/includes/revslider_db.class.php';

require_once $currentFolder . '/includes/object-library.class.php';

require_once $currentFolder . '/includes/base.class.php';

require_once $currentFolder . '/includes/template.class.php';

require_once $currentFolder . '/includes/framework/addon-admin.class.php';

//require_once $folderIncludes . 'base.class.php';

require_once $folderIncludes . 'elements-base.class.php';
                
//require_once $folderIncludes . 'base_admin.class.php';
require_once $folderIncludes . 'base-admin.class.php';

//require_once $folderIncludes . 'base_front.class.php';
require_once $folderIncludes . 'base-front.class.php';

require_once $currentFolder . '/includes/revslider_settings_product.class.php';

//require_once $currentFolder . '/includes/revslider_globals.class.php';
require_once $currentFolder . '/includes/navigation.class.php';

require_once $currentFolder . '/includes/globals.class.php';

//require_once $currentFolder . '/includes/revslider_operations.class.php';
require_once $currentFolder . '/includes/operations.class.php';

//require_once $currentFolder . '/includes/revslider_slider.class.php';
require_once $currentFolder . '/includes/slider.class.php';

//require_once $currentFolder . '/includes/revslider_output.class.php';
require_once $currentFolder . '/includes/output.class.php';

require_once $currentFolder . '/revslider-front.class.php';

//require_once $currentFolder . '/includes/revslider_slide.class.php';
require_once $currentFolder . '/includes/slide.class.php';
require_once $currentFolder . '/includes/revslider_params.class.php';

require_once $currentFolder . '/includes/revslider_tinybox.class.php';

require_once $currentFolder . '/includes/fonts.class.php'; //punchfonts
require_once $currentFolder . '/includes/external-sources.class.php';
require_once $currentFolder . '/includes/framework/update.class.php';
require_once $currentFolder . '/includes/framework/plugin-update.class.php';
require_once $currentFolder . '/includes/extension.class.php';
require_once $currentFolder . '/includes/framework/colorpicker.class.php';
require_once $currentFolder . '/includes/framework/newsletter.class.php';
require_once($currentFolder . '/includes/pclzip.class.php');

global $wpdb;
$wpdb = rev_db_class::rev_db_instance();
function esc_url($url){
    return $url;
}
function wp_upload_dir(){
    return DIR_IMAGE.'catalog/revslider_media_folder/';
}
function wp_upload_url(){
    //return HTTP_SERVER.'image/catalog/revslider_media_folder/';
    return get_mainsite_url().'image/catalog/revslider_media_folder/';
                
}

//to check if addon inactive
function is_plugin_active($addon_folder){
    //true means that the plugin is active
    if(get_option($addon_folder)=='active'){
        return true;
    }
    return false;
}        
function get_version_from_file($file_path){
    $fp = fopen( $file_path, 'r' );

	// Pull only the first 8kiB of the file in.
	$file_data = fread( $fp, 8192 );

	// PHP will close file handle, but we are good citizens.
	fclose( $fp );

	// Make sure we catch CR-only line endings.
	$file_data = str_replace( "\r", "\n", $file_data );
        if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( 'Version', '/' ) . ':(.*)$/mi', $file_data, $match ) && $match[1] ){
            return $match[1];
        }
}
function rev_site_admin_url() {
    $get_mainsite_url = get_mainsite_url();
    $url = $get_mainsite_url . 'admin/index.php';
    return $url;
}

function rev_module_url() {
    $dir_app = REV_DIR_CONFIG . 'revslider';
    return $dir_app;
}

function rev_module_ajaxurl() {
    $url = REV_DIR_CONFIG . 'revslider/ajax.php';
    return $url;
}

function get_catalog_path($sub_url = '') {
    $dir_app = str_replace('/admin/', '/catalog/', DIR_APPLICATION);
    return $dir_app . $sub_url;
}

function get_admin_path($sub_url = '') {
    $dir_app = str_replace('/catalog/', '/admin/', DIR_APPLICATION);
    return $dir_app . $sub_url;
}

function main_shop_url($sub_url = '') {
    if (!defined('__OC_BASE_URI__'))
        return false;
    else
        return __OC_BASE_URI__ . $sub_url;
}
function wp_remote_retrieve_response_code( $response ) {
    
	if (! isset($response['info']['http_code']) || ! is_array($response['info']))
		return '';

	return $response['info']['http_code'];
}
function wp_remote_retrieve_body( $response ) {
	if ( ! isset($response['body']) )
		return '';

	return $response['body'];
}

function sds_get_oc_token() {
    if (is_admin()) {
        $ssn = ControllerExtensionModulerevslideropencart::$revSession;
        $version = VERSION;
                     
        if($version >= "3.0.0.0"){
           $token_style = "user_token";

        }elseif($version == "2.3.0.2"){
           $token_style = "token";
        }
        $token = isset($ssn->data[$token_style]) ? $ssn->data[$token_style] : '';
        return $token;
    } else
        return false;
}
function getProductCategories(){
    if (is_admin()) {
        return ControllerExtensionModulerevslideropencart::$product_categories; 
    } else
        return array();
}
function getProductById($category_id ){
                
    $language_id = (int)sdsconfig::get_current_lang_id(); 
    $db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE); 
    $query = $db->query("SELECT DISTINCT *, (SELECT GROUP_CONCAT(cd1.name ORDER BY level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;') FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "category_description cd1 ON (cp.path_id = cd1.category_id AND cp.category_id != cp.path_id) WHERE cp.category_id = c.category_id AND cd1.language_id = '" . $language_id. "' GROUP BY cp.category_id) AS path FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd2 ON (c.category_id = cd2.category_id) WHERE c.category_id = '" . (int)$category_id . "' AND cd2.language_id = '" . $language_id . "'");
		
		return $query->row;
                
}
function sds_get_current_lang() {
    $ssn = ControllerExtensionModulerevslideropencart::$revSession;
    $language = $ssn->data['language'];
    if (isset($language))
        return $language;
    else
        return false;
}

function rev_slider_admin_url() {
    $ssn = ControllerExtensionModulerevslideropencart::$revSession;
    $version = VERSION;
                     
    if($version >= "3.0.0.0"){
       $token_style = "user_token";

    }elseif($version == "2.3.0.2"){
       $token_style = "token";
    }
    $lnk = 'index.php?route=extension/module/revslideropencart&'.$token_style.'=' . $ssn->data['token'];
    if (isset($lnk))
        return $lnk;
    else
        return false;
}

function is_ssl() {
// Config

    if (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1')))
        return true;
    return false;
}

function get_url($link = '') {
    $url = DIR_CONFIG . "revslider";
    return $url;
}

function rev_image_url($src = '') {
    return DIR_IMAGE . $src;
}

function uploads_url($src = '') {
    return rev_image_url() . 'catalog/revslider_media_folder/' . $src;
}

function uploads_real_url($src = '') {
     return get_mainsite_url().'image/catalog/revslider_media_folder/'. $src;
}

function get_uploads_url($src = '') {
    return main_shop_url('image/catalog/revslider_media_folder/') . $src;
}

function script_url() {
    return get_url() . '/';
}

function admin_url($link = '') {
    $url = $_SERVER['PHP_SELF'];
    preg_match('/\?(.*)$/', $link, $found);
    // $arr = $_GET;
    $arr = array();
    if (isset($found[1]) && !empty($found[1])) {
        if (!preg_match('/\&route\=/', $found[1])) {
            unset($arr['route']);
        }
        if (isset($arr['token']))
            unset($arr['token']);

        $level1 = explode('&', $found[1]);
        foreach ($level1 as $level2) {
            $lv2 = explode('=', $level2);
            $arr[$lv2[0]] = $lv2[1];
        }
    }
    $url .= '?' . http_build_query($arr);
    return $url;
}

//function plugins_url($file = '') {
//    if (!empty($file)) {
//        return get_url(dirname($file));
//    }
//    return __DIR__;
//}
function plugins_url($file,$filepath) { 
    $filename = basename($filepath);
    
    $file_dir = str_replace($filename, '', $filepath);
    
    $get_mainsite_dir = str_replace("/", '\\', get_mainsite_dir());
    
    $file_url = str_replace($get_mainsite_dir, get_mainsite_url(), $file_dir);
    $file_url = str_replace( '\\',"/", $file_url);
                
    return $file_url;
}
function rev_slider_url() {
    $url = rev_module_url();
    return $url;
}

function content_url($link = '') {
    $url = __OC_BASE_URI__ . "system/config/revslider";
    return $url;
}

function main_site_url($link = '') {
    $url = __OC_BASE_URI__ . $link;
    return $url;
}

function get_template_directory_uri() {

    return get_url();
}

function modify_layer_image($img_src = '') {
    return $img_src;
}

function get_image_id_by_url($image) {

    $wpdb = rev_db_class::rev_db_instance();

    $tablename = $wpdb->prefix . GlobalsRevSlider::TABLE_ATTACHMENT_IMAGES;

    $image = basename($image);

    $id = $wpdb->get_var("SELECT ID FROM {$tablename} WHERE file_name='{$image}'");

    return $id;
}

function wp_get_attachment_image_src($attach_id, $size = 'thumbnail', $args = array()) {
    $wpdb = rev_db_class::rev_db_instance();
    $tablename = $wpdb->prefix . GlobalsRevSlider::TABLE_ATTACHMENT_IMAGES;
    $filename = $wpdb->get_var("SELECT file_name FROM {$tablename} WHERE ID={$attach_id}");
    if (!empty($filename)) {
        $filerealname = substr($filename, 0, strrpos($filename, '.'));
        $fileext = substr($filename, strrpos($filename, '.'), strlen($filename) - strlen($filerealname));
        $newfilename = $filerealname;
                
        if (gettype($size) == 'string') {
            switch ($size) {
                case "thumbnail":
                    $px = GlobalsRevSlider::IMAGE_SIZE_THUMBNAIL;
                    $newfilename .= "-{$px}x{$px}";
                    break;
                case "thumb":
                    $px = GlobalsRevSlider::IMAGE_SIZE_THUMBNAIL;
                    $newfilename .= "-{$px}x{$px}";
                    break;
                case "medium":
                    $px = GlobalsRevSlider::IMAGE_SIZE_MEDIUM;
                    $px_H = GlobalsRevSlider::IMAGE_SIZE_MEDIUM_H;
                    $newfilename .= "-{$px}x{$px_H}";
                    break;
                case "large":
                    $px = GlobalsRevSlider::IMAGE_SIZE_LARGE;
                    $newfilename .= "-{$px}x{$px}";
                    break;
                default: break;
            }
            $newfilename .= $fileext;
        //    var_dump($newfilename);die();
            $imagesize = get_image_real_size($newfilename);
            return array(uploads_url($newfilename), $imagesize[0], $imagesize[1]);
        }
    }
    return false;
}

//end all url 
function get_post_types() {
    return true;
}

function get_post_type_object($post_type) {
    return null;
}

function get_object_taxonomies($object, $output = 'names') {
    return null;
}

function wp_create_nonce() {
    return get_rev_token();
}

function is_multisite() {
    return false;
}

function load_plugin_textdomain() {
    return true;
}

function get_bloginfo($parms) {
    if ($parms == 'version') {
        return 2.3;
    }elseif($parms =='url'){
        return get_http_catalog(); 
    } else {
        return true;
    }
}

                

function register_activation_hook($file_dir,$activation_name) {
    $filename = basename($file_dir);
    $filename_arr = explode('.php',$filename);
    //var_dump($filename_arr);die();
    $file_location = $filename_arr[0].'/'.$filename;
    sdsconfig::$hook_register[$file_location]=$activation_name;
    return true;
}
function register_deactivation_hook($file_dir,$deactivation_name) {
    $filename = basename($file_dir);
    $filename_arr = explode('.php',$filename);
    //var_dump($filename_arr);die();
    $file_location = $filename_arr[0].'/'.$filename;
    sdsconfig::$hook_deregister[$file_location]=$deactivation_name;
    return true;
}
//function get_option() {
//    return true;
//}

function bloginfo($prop) {
    switch ($prop):
        case 'charset':
            echo "UTF-8";
            break;
        default : break;
    endswitch;
}

function is_admin() {
    return defined('HTTP_CATALOG') && defined('HTTP_SERVER');
}

function rev_title() {
    if (is_admin()) {
        echo "Revolution Slider";
        return;
    }
    echo "Homepage";
}

function get_image_real_size($image) {
    $filepath = uploads_url() . $image;
    if (file_exists($filepath))
        return list($width, $height) = getimagesize($filepath);
    return false;
}

function load_additional_scripts($deps = array(), $parent) {
    if (empty($deps) || !is_array($deps))
        return false;
    $load = array();
    foreach ($deps as $dep) {
        switch ($dep) {
            case 'jquery':
               // $load[$dep] = 'js/jquery-1.9.1.min.js';
                break;
            case 'thickbox':
                //$load[$dep] = __OC_BASE_URI__'system/config/revslider/js/thickbox.js';
                break;
            default:
                break;
        }
    }
    return $load;
}
function delete_files($target) {
    if(is_dir($target)){
        $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
        
        foreach( $files as $file )
        {
            delete_files( $file );      
        }
      
        rmdir( $target );
    } elseif(is_file($target)) {
        unlink( $target );  
    }
}
function get_current_screen() {
    global $current_screen;
 
    if ( ! isset( $current_screen ) )
        return null;
 
    return $current_screen;
}
function wp_enqueue_script($scriptName, $src = '', $deps = array(), $ver = '1.0', $in_footer = false) {

    UniteBaseClassRev::wp_enqueue_script($scriptName, $src, $deps, $ver, $in_footer);
}

function wp_enqueue_style($handle, $src = '', $deps = array(), $ver = '', $media = 'all', $noscript = false) {

    UniteBaseClassRev::wp_enqueue_style($handle, $src, $deps, $ver, $media, $noscript);
}

function rev_head() { 
    UniteBaseClassRev::rev_head();
}

function wp_localize_script($handle,$varName,$value){
    RevSliderBase::$local_scripts[$varName] = $value;
}
function rev_footer() {

    UniteBaseClassRev::rev_footer();
}

function __($text, $textdomain = '') {
    return $text;
}

function _e($text, $textdomain = '') {
    echo $text;
}

function wp_strip_all_tags($string, $remove_breaks = false)
{ 
    $string = preg_replace('@<(script|style)[^>]*?>.*?</\\1>@si', '', $string);
    $string = strip_tags($string);

    if ($remove_breaks) {
        $string = preg_replace('/[\r\n\t ]+/', ' ', $string);
    }

    return trim($string);
}

function wp_pre_kses_less_than($text)
{
    return preg_replace_callback('%<[^>]*?((?=<)|>|$)%', 'wp_pre_kses_less_than_callback', $text);
}

function sanitize_text_field($str)
{
    $filtered = $str;

    if (strpos($filtered, '<') !== false) {
        $filtered = wp_pre_kses_less_than($filtered);
        // This will strip extra whitespace for us.
        $filtered = wp_strip_all_tags($filtered, true);
    } else {
        $filtered = trim(preg_replace('/[\r\n\t ]+/', ' ', $filtered));
    }

    $found = false;
    while (preg_match('/%[a-f0-9]{2}/i', $filtered, $match)) {
        $filtered = str_replace($match[0], '', $filtered);
        $found = true;
    }

    if ($found) {
        // Strip out the whitespace that may now exist after removing the octets.
        $filtered = trim(preg_replace('/ +/', ' ', $filtered));
    }

    return $filtered;
}

function file_put_contents_local($filename, $filedata) 
  {
    if ($fp = fopen($filename, "wb")) 
    {
      fwrite($fp, $filedata);
      fclose($fp);
      return(true);
    }
    return(false);
  }
function sanitize_title($title)
{ 
    $raw_title = $title;

    $title = strtolower($title);

    $title = str_replace(' ', '-', $title);

    $title = preg_replace('/[^A-Za-z0-9\-]/', '', $title);

    return $title;
}
function esc_sql($data) {

    $wpdb = rev_db_class::rev_db_instance();

    return $wpdb->_escape($data);
}

function add_shortcode($tag, $func) {
    UniteBaseClassRev::add_shortcode($tag, $func);
}

function do_shortcode($str) {
   
    return UniteBaseClassRev::parse($str);
}

function get_instance($class = '') {
    $registry = new Registry();
    $loader = new Loader($registry);
    $registry->set('load', $loader);
    $config = new Config();
    $registry->set('config', $config);
    $db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $registry->set('db', $db);
    $request = new Request();
    $registry->set('request', $request);
    $response = new Response();
    $response->addHeader('Content-Type: text/html; charset=utf-8');
    $response->setCompression($config->get('config_compression'));
    $registry->set('response', $response);
    $cache = new Cache('file');
    $registry->set('cache', $cache);
    //$session = new Session();
    $session = ControllerExtensionModulerevslideropencart::$revSession;
    $registry->set('session', $session);
    $languages = array();
    $query = $db->query("SELECT * FROM `" . DB_PREFIX . "language` WHERE status = '1'");
    foreach ($query->rows as $result) {
        $languages[$result['code']] = $result;
    }
    $detect = '';
    if (isset($request->server['HTTP_ACCEPT_LANGUAGE']) && $request->server['HTTP_ACCEPT_LANGUAGE']) {
        $browser_languages = explode(',', $request->server['HTTP_ACCEPT_LANGUAGE']);
        foreach ($browser_languages as $browser_language) {
            foreach ($languages as $key => $value) {
                if ($value['status']) {
                    $locale = explode(',', $value['locale']);

                    if (in_array($browser_language, $locale)) {
                        $detect = $key;
                    }
                }
            }
        }
    }
    if (isset($session->data['language']) && array_key_exists($session->data['language'], $languages) && $languages[$session->data['language']]['status']) {
        $code = $session->data['language'];
    } elseif (isset($request->cookie['language']) && array_key_exists($request->cookie['language'], $languages) && $languages[$request->cookie['language']]['status']) {
        $code = $request->cookie['language'];
    } elseif ($detect) {
        $code = $detect;
    } else {
        $code = $config->get('config_language');
    }
    if (!isset($session->data['language']) || $session->data['language'] != $code) {
        $session->data['language'] = $code;
    }
    if (!isset($request->cookie['language']) || $request->cookie['language'] != $code) {
        setcookie('language', $code, time() + 60 * 60 * 24 * 30, '/', $request->server['HTTP_HOST']);
    }
    $config->set('config_language_id', $languages[$code]['language_id']);
    $config->set('config_language', $languages[$code]['code']);
    $language = new Language($languages[$code]['directory']);
    $registry->set('language', $language);
    $language->load('extension/module/revslideropencart');
    $currency = new Currency($registry);
    $registry->set('currency', $currency);
    $instance = new $class($registry);
    return $instance;
}

function maybe_unserialize($original) {
    if (is_serialized($original)) // don't attempt to unserialize data that wasn't serialized going in
        return @unserialize($original);
    return $original;
}
 function serializedataCallback($matches){
            
            return "'s:'.strlen('$2').':\"$2\";'";
        }
function is_serialized($data, $strict = true) {
    // if it isn't a string, it isn't serialized.
    if (!is_string($data)) {
        return false;
    }
    $data = trim($data);
    if ('N;' == $data) {
        return true;
    }
    if (strlen($data) < 4) {
        return false;
    }
    if (':' !== $data[1]) {
        return false;
    }
    if ($strict) {
        $lastc = substr($data, -1);
        if (';' !== $lastc && '}' !== $lastc) {
            return false;
        }
    } else {
        $semicolon = strpos($data, ';');
        $brace = strpos($data, '}');
        // Either ; or } must exist.
        if (false === $semicolon && false === $brace)
            return false;
        // But neither must be in the first X characters.
        if (false !== $semicolon && $semicolon < 3)
            return false;
        if (false !== $brace && $brace < 4)
            return false;
    }
    $token = $data[0];
    switch ($token) {
        case 's' :
            if ($strict) {
                if ('"' !== substr($data, -2, 1)) {
                    return false;
                }
            } elseif (false === strpos($data, '"')) {
                return false;
            }
        // or else fall through
        case 'a' :
        case 'O' :
            return (bool) preg_match("/^{$token}:[0-9]+:/s", $data);
        case 'b' :
        case 'i' :
        case 'd' :
            $end = $strict ? '$' : '';
            return (bool) preg_match("/^{$token}:[0-9.E-]+;$end/", $data);
    }
    return false;
}

function putRevSlider($data, $putIn = "") {

    $operations = new RevOperations();

    $arrValues = $operations->getGeneralSettingsValues();

    $includesGlobally = UniteFunctionsRev::getVal($arrValues, "includes_globally", "on");

    $strPutIn = UniteFunctionsRev::getVal($arrValues, "pages_for_includes");

    $isPutIn = RevSliderOutput::isPutIn($strPutIn, true);



    if ($isPutIn == false && $includesGlobally == "off") {

        $output = new RevSliderOutput();

        $option1Name = "Include RevSlider libraries globally (all pages/posts)";

        $option2Name = "Pages to include RevSlider libraries";

        $output->putErrorMessage(__("If you want to use the PHP function \"putRevSlider\" in your code please make sure to check \" ", REVSLIDER_TEXTDOMAIN) . $option1Name . __(" \" in the backend's \"General Settings\" (top right panel). <br> <br> Or add the current page to the \"", REVSLIDER_TEXTDOMAIN) . $option2Name . __("\" option box."));

        return(false);
    }



    RevSliderOutput::putSlider($data, $putIn);
}

//function update_option($parm1 = '', $parm2 = '') {
//    return true;
//}

function rev_slider_shortcode($args) {



    $sliderAlias = UniteFunctionsRev::getVal($args, 0);

    ob_start();

    $slider = RevSliderOutput::putSlider($sliderAlias);

    $content = ob_get_contents();

    ob_clean();

    ob_end_clean();



    //handle slider output types

    if (!empty($slider)) {

        $outputType = $slider->getParam("output_type", "");

        switch ($outputType) {

            case "compress":

                $content = str_replace("\n", "", $content);

                $content = str_replace("\r", "", $content);

                return($content);

                break;

            case "echo":

                echo $content;  //bypass the filters

                break;

            default:

                return($content);

                break;
        }
    } else
        return($content);  //normal output
}

class Shop {

    public static function getShops() {

        return false;
    }

    public static function isFeatureActive() {

        return true;
    }

}

class Configuration {

    public static function get($key) {

        return false;
    }

}
function wp_register_script($name,$src){
    sdsconfig::$registered_script[$name] = $src;
}
function wp_register_style($name,$src){
    sdsconfig::$registered_style[$name] = $src;
}
class sdsconfig {

            
    public $ocdb;
    public static $registered_style,$registered_script;
    public static $hook_args;
    public static $hook_values,$filter_values,$hook_register,$hook_deregister;
    public static function getval($key, $store_id = 0, $group = 'config') {

        $wpdb = rev_db_class::rev_db_instance();
        $sql = "SELECT `value` FROM " . DB_PREFIX . "setting WHERE store_id = '" . (int) $store_id . "' AND `code` = '" . $group . "' AND `key` = '" . $key . "'";
        $value = $wpdb->get_var($sql);
        if (isset($value))
            return $value;
        else
            return false;
    }

    
    public static function loadActiveAddons(){
                                                                                
            $allowed_addons_default=array();
                        $addons = get_option('revslider-addons',$allowed_addons_default); 
                        if(!is_array($addons)){
                            $addons = json_decode($addons,true);
                        }
                                                                                
            foreach($addons as $addon => $addon_value){
                $addon_folder_name =  $addon.'/'.$addon.'.php';
                                                                                
                if(get_option($addon_folder_name)=='active'){
                    
                    $addon_file_path = RS_PLUGIN_ADDONS_PATH.$addon.'/'.$addon.'.php';
                    if(file_exists($addon_file_path)){
                        require_once $addon_file_path;
                    }
                     
                }                                        
            }
         }
         public static function loadAllAddons(){ 
            
            $allowed_addons_default=array();
                        $addons = get_option('revslider-addons',$allowed_addons_default); 
                        if(!is_array($addons)){
                            $addons = json_decode($addons,true);
                        }
                                                                                
            foreach($addons as $addon => $addon_value){
                $addon_folder_name =  $addon.'/'.$addon.'.php';
                                                                                
              //  if(get_option($addon_folder_name)=='active'){
                    
                    $addon_file_path = RS_PLUGIN_ADDONS_PATH.$addon.'/'.$addon.'.php';
                    if(file_exists($addon_file_path)){
                        require_once $addon_file_path;
                    }
              //  }                                        
            }
         }
    public static function setval($key, $value = '', $group = 'config', $store_id = 0, $serialized = 0) {
        $sql = '';
        $wpdb = rev_db_class::rev_db_instance();
        $getvalue = self::getval($key, $store_id, $group);
        if (isset($getvalue) && !empty($getvalue)) {
            $sql = "UPDATE `" . DB_PREFIX . "setting` SET `store_id` = " . (int) $store_id . ",`code` = '" . $group . "',`value` ='" . serialize($value) . "',`serialized` = " . $serialized . " WHERE `key` = '" . $key . "'";
        } else {
            $sql = "INSERT INTO `" . DB_PREFIX . "setting` SET `store_id` = '" . (int) $store_id . "',`code` = '" . $group . "',`value` ='" . serialize($value) . "',`serialized` = '" . $serialized . "',`key` ='" . $key . "'";
        }
        $rslt = $wpdb->query($sql);
        if (isset($rslt))
            return true;
        else
            return false;
    }

    public static function getallinformations() {
        $store_id = self::getval('config_store_id');
        $language_id = (int) self::getval('config_language_id');
        if (!isset($store_id)) {
            $store_id = 0;
        }
        if (!isset($language_id) || $language_id == 0) {
            $language_id = 1;
        }
        $wpdb = rev_db_class::rev_db_instance();
        $sql = "SELECT * FROM " . DB_PREFIX . "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) LEFT JOIN " . DB_PREFIX . "information_to_store i2s ON (i.information_id = i2s.information_id) WHERE id.language_id = '" . (int) $language_id . "' AND i2s.store_id = '" . (int) $store_id . "' AND i.status = '1' ORDER BY i.sort_order, LCASE(id.title) ASC";

        $value = $wpdb->get_results($sql);
        if (isset($value))
            return $value;
        else
            return false;
    }

    public static function get_current_lang() {
//       $ssn = ControllerExtensionModulerevslideropencart::$revSession; 
//        if (!isset($ssn->data['language']) && empty($ssn->data['language'])) {
            $language = sdsconfig::getval('config_language');
//        } else {
//            $language = $ssn->data['language'];
//        }
        return $language;
    }

    public static function get_current_lang_id() {
        $language_id = 1;
//        $ssn = ControllerExtensionModulerevslideropencart::$revSession;
//        if (!isset($ssn->data['language']) && empty($ssn->data['language'])) {
            $language = sdsconfig::getval('config_language');
//        } else {
//            $language = $ssn->data['language'];
//        }
        $sql = "SELECT * FROM " . DB_PREFIX . "language WHERE `code` = '" . $language . "'";
        $wpdb = rev_db_class::rev_db_instance();
        $value = $wpdb->get_results($sql);
        if (isset($value[0]['language_id']) && !empty($value[0]['language_id'])) {
            $language_id = $value[0]['language_id'];
        }
        return $language_id;
    }

    public static function isLogged() {
        $ssn = ControllerExtensionModulerevslideropencart::$revSession;
        if (isset($ssn->data['customer_id']) && !empty($ssn->data['customer_id'])) {
            $customer_id = $ssn->data['customer_id'];
        } else {
            $customer_id = false;
        }
        return $customer_id;
    }

    public static function getCustomerGroupId() {
        $ssn = ControllerExtensionModulerevslideropencart::$revSession;
    }

    public static function get_current_store() {
        $store_id = self::getval('config_store_id');
        if (isset($store_id) && !empty($store_id)) {
            $store_id = $store_id;
        } else {
            $store_id = 0;
        }
        return (int) $store_id;
    }

    public static function getCategories($parent_id = 0) {
        $store_id = self::getval('config_store_id');
        $language_id = (int) self::getval('config_language_id');
        if (!isset($store_id)) {
            $store_id = 0;
        }
        if (!isset($language_id) || $language_id == 0) {
            $language_id = 1;
        }
        $wpdb = rev_db_class::rev_db_instance();
        $sql = "SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int) $parent_id . "' AND cd.language_id = '" . (int) $language_id . "' AND c2s.store_id = '" . (int) $store_id . "'  AND c.status = '1' ORDER BY c.sort_order, LCASE(cd.name)";
        $value = $wpdb->get_results($sql);
        if (isset($value))
            return $value;
        else
            return false;
    }

    public static function getcaptioncss($tabl) {
        $wpdb = rev_db_class::rev_db_instance();
        $sql = "SELECT * FROM " . DB_PREFIX . $tabl;
        $value = $wpdb->get_results($sql);
        if (isset($value))
            return $value;
        else
            return false;
    }

    public static function getgeneratecss() {
        $getcss = self::getcaptioncss(GlobalsRevSlider::TABLE_CSS_NAME);
            
        $value = UniteCssParserRev::parseDbArrayToCss($getcss, "\n");
        if (isset($value))
            return $value;
        else
            return false;
    } 
 
    public static function getgeneratecssfile() {
        $csscontent = sdsconfig::getgeneratecss();
        $cache_filename = RevSliderAdmin::$path_plugin . 'rs-plugin/css/captions.css';
        @file_put_contents($cache_filename, $csscontent);
        @chmod($cache_filename, 0755);
    }

    public static function getlanguages() {
        $wpdb = rev_db_class::rev_db_instance();
        $sql = "SELECT * FROM " . DB_PREFIX . "language WHERE status = 1 ORDER BY sort_order, name";
        $query = $wpdb->get_results($sql);
        $language_data = array();
        $i = 0;
        foreach ($query as $result) {
            $language_data[$i]['language_id'] = $result['language_id'];
            $language_data[$i]['name'] = $result['name'];
            $language_data[$i]['code'] = $result['code'];
            $language_data[$i]['locale'] = $result['locale'];
            $language_data[$i]['image'] = $result['image'];
            $language_data[$i]['directory'] = $result['directory'];
            // $language_data[$i]['filename'] = $result['filename'];
            $language_data[$i]['sort_order'] = $result['sort_order'];
            $language_data[$i]['status'] = $result['status'];
            $i++;
        }
        return $language_data;
    }

    public static function getLayouts($data = array()) {

        $wpdb = rev_db_class::rev_db_instance();

        $sql = "SELECT * FROM " . DB_PREFIX . "layout";

        $sort_data = array('name');

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY name";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
        }

        $query = $wpdb->get_results($sql);

        return $query;
    }

    public static function editSetting($group, $data) {
        $wpdb = rev_db_class::rev_db_instance();
        $store_id = self::getval('config_store_id');
        if (!isset($store_id)) {
            $store_id = 0;
        }
        $wpdb->query("DELETE FROM " . DB_PREFIX . "setting WHERE store_id = '" . (int) $store_id . "' AND `code` = '" . $wpdb->_escape($group) . "'");
        if (!empty($data))
            foreach ($data as $key => $value) {
                if (!is_array($value)) {
                    $wpdb->query("INSERT INTO " . DB_PREFIX . "setting SET store_id = '" . (int) $store_id . "', `code` = '" . $wpdb->_escape($group) . "', `key` = '" . $wpdb->_escape($key) . "', `value` = '" . $wpdb->_escape($value) . "'");
                } else {
                    $wpdb->query("INSERT INTO " . DB_PREFIX . "setting SET store_id = '" . (int) $store_id . "', `code` = '" . $wpdb->_escape($group) . "', `key` = '" . $wpdb->_escape($key) . "', `value` = '" . $wpdb->_escape(serialize($value)) . "', serialized = '1'");
                }
            }
    }

    public static function getrevslide() {
        $result = array();
        $wpdb = rev_db_class::rev_db_instance();
        $sql = "SELECT * FROM " . $wpdb->prefix . GlobalsRevSlider::TABLE_SLIDERS_NAME;
        $data = $wpdb->get_results($sql);
        if (!empty($data)) {
            $i = 0;
            foreach ($data as $val) {
                $params = json_decode($val['params']);
                if (!isset($params->template)) {
                    $params->template = 'false';
                }
                if ($params->template == 'false') {
                    $result[$i]['id'] = $val['id'];
                    $result[$i]['title'] = $val['title'];
                    $i = $i + 1;
                }
            }
        }
        if (!empty($result))
            return $result;
        else
            return false;
    }

    public static function sdsgetlayoutid($name = '') {
        $wpdb = rev_db_class::rev_db_instance();
        $sql = "SELECT `layout_id` FROM " . $wpdb->prefix . 'layout WHERE `name` = "' . $name . '"';
        $data = $wpdb->get_row($sql);
        if (!empty($data['layout_id']))
            return $data['layout_id'];
        else
            return false;
    }

    // start get products
    public static function getProducts($data = array()) {

        $wpdb = rev_db_class::rev_db_instance();

        $sql = "SELECT p.product_id, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special ";

        if (!empty($data['filter_category_id'])) {
            if (!empty($data['filter_sub_category'])) {
                $sql .= " FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (cp.category_id = p2c.category_id)";
            } else {
                $sql .= " FROM " . DB_PREFIX . "product_to_category p2c";
            }

            if (!empty($data['filter_filter'])) {
                $sql .= " LEFT JOIN " . DB_PREFIX . "product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN " . DB_PREFIX . "product p ON (pf.product_id = p.product_id)";
            } else {
                $sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";
            }
        } else {
            $sql .= " FROM " . DB_PREFIX . "product p";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pd.language_id = '" . (int) sdsconfig::get_current_lang_id() . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int) sdsconfig::get_current_store() . "'";


        if (!empty($data['filter_category_id'])) {
            if (!empty($data['filter_sub_category'])) {
                $sql .= " AND cp.path_id = '" . (int) $data['filter_category_id'] . "'";
            } else {
                $sql .= " AND p2c.category_id = '" . (int) $data['filter_category_id'] . "'";
            }

            if (!empty($data['filter_filter'])) {
                $implode = array();

                $filters = explode(',', $data['filter_filter']);

                foreach ($filters as $filter_id) {
                    $implode[] = (int) $filter_id;
                }

                $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
            }
        }

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.name LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }

            if (!empty($data['filter_name']) && !empty($data['filter_tag'])) {
                $sql .= " OR ";
            }

            if (!empty($data['filter_tag'])) {
                $sql .= "pd.tag LIKE '%" . $this->db->escape($data['filter_tag']) . "%'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.model) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.sku) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.upc) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.ean) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.jan) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.isbn) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.mpn) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            $sql .= ")";
        }

        if (!empty($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = '" . (int) $data['filter_manufacturer_id'] . "'";
        }

        $sql .= " GROUP BY p.product_id";

        $sort_data = array(
            'pd.name',
            'p.model',
            'p.quantity',
            'p.price',
            'rating',
            'p.sort_order',
            'p.date_added'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
                $sql .= " ORDER BY LCASE(" . $data['sort'] . ")";
            } elseif ($data['sort'] == 'p.price') {
                $sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special WHEN discount IS NOT NULL THEN discount ELSE p.price END)";
            } else {
                $sql .= " ORDER BY " . $data['sort'];
            }
        } else {
            $sql .= " ORDER BY p.sort_order";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC, LCASE(pd.name) DESC";
        } else {
            $sql .= " ASC, LCASE(pd.name) ASC";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
        }

        $product_data = array();

        $query = $wpdb->get_results($sql);

        if (!empty($query) && isset($query)) {
            foreach ($query as $result) {
                $product_data[$result['product_id']] = self::getProduct($result['product_id']);
            }
        }

        return $product_data;
    }

    public static function getProduct($product_id) {
        $wpdb = rev_db_class::rev_db_instance();
        $sql = "SELECT DISTINCT *, pd.name AS name, p.image, m.name AS manufacturer, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id  AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT points FROM " . DB_PREFIX . "product_reward pr WHERE pr.product_id = p.product_id) AS reward, (SELECT ss.name FROM " . DB_PREFIX . "stock_status ss WHERE ss.stock_status_id = p.stock_status_id AND ss.language_id = '" . (int) sdsconfig::get_current_lang_id() . "') AS stock_status, (SELECT wcd.unit FROM " . DB_PREFIX . "weight_class_description wcd WHERE p.weight_class_id = wcd.weight_class_id AND wcd.language_id = '" . (int) sdsconfig::get_current_lang_id() . "') AS weight_class, (SELECT lcd.unit FROM " . DB_PREFIX . "length_class_description lcd WHERE p.length_class_id = lcd.length_class_id AND lcd.language_id = '" . (int) sdsconfig::get_current_lang_id() . "') AS length_class, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM " . DB_PREFIX . "review r2 WHERE r2.product_id = p.product_id AND r2.status = '1' GROUP BY r2.product_id) AS reviews, p.sort_order FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id) WHERE p.product_id = '" . (int) $product_id . "' AND pd.language_id = '" . (int) sdsconfig::get_current_lang_id() . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int) sdsconfig::get_current_store() . "'";


        $query = $wpdb->get_results($sql);

        if (isset($query) && !empty($query)) {
            $query = $query[0];
        }
        if (isset($query) && !empty($query)) {
            $get_mainsite_url = get_mainsite_url();
            $img_path = $get_mainsite_url . 'image/';
            $lnk = new Url($get_mainsite_url);
            return array(
                'product_id' => $query['product_id'],
                'link' => $lnk->link('product/product', 'product_id=' . $query['product_id']),
                'id_product' => $query['product_id'],
                'name' => $query['name'],
                'description' => $query['description'],
                'meta_description' => $query['meta_description'],
                'meta_keyword' => $query['meta_keyword'],
                'tag' => $query['tag'],
                'model' => $query['model'],
                'sku' => $query['sku'],
                'upc' => $query['upc'],
                'ean' => $query['ean'],
                'jan' => $query['jan'],
                'isbn' => $query['isbn'],
                'mpn' => $query['mpn'],
                'location' => $query['location'],
                'quantity' => $query['quantity'],
                'stock_status' => $query['stock_status'],
                'image' => $img_path . $query['image'],
                'manufacturer_id' => $query['manufacturer_id'],
                'manufacturer' => $query['manufacturer'],
                'price' => ($query['discount'] ? $query['discount'] : $query['price']),
                'special' => $query['special'],
                'reward' => $query['reward'],
                'points' => $query['points'],
                'tax_class_id' => $query['tax_class_id'],
                'date_available' => $query['date_available'],
                'weight' => $query['weight'],
                'weight_class_id' => $query['weight_class_id'],
                'length' => $query['length'],
                'width' => $query['width'],
                'height' => $query['height'],
                'length_class_id' => $query['length_class_id'],
                'subtract' => $query['subtract'],
                'rating' => round($query['rating']),
                'reviews' => $query['reviews'] ? $query['reviews'] : 0,
                'minimum' => $query['minimum'],
                'sort_order' => $query['sort_order'],
                'status' => $query['status'],
                'date_added' => $query['date_added'],
                'date_modified' => $query['date_modified'],
                'viewed' => $query['viewed']
            );
        } else {
            return false;
        }
    }

    public static function getProductimg($product_id, $img_arr = array()) {
        $wpdb = rev_db_class::rev_db_instance();
        $sql = "SELECT `image` FROM `" . DB_PREFIX . "product_image` WHERE `product_id` = " . $product_id;
        $query = $wpdb->get_results($sql);
        if (isset($query) && !empty($query)) {
            $query = $query[0];
        }
        if (isset($query) && !empty($query)) {
            $get_mainsite_url = get_mainsite_url();
            $img_path = $get_mainsite_url . 'image/';
            if (isset($img_arr) && !empty($img_arr)) {
                $old_img = rev_image_url() . $query['image'];

                $pathinfo = pathinfo($old_img);
                $dirname = $pathinfo['dirname'];
                $basename = $pathinfo['basename'];
                $extension = $pathinfo['extension'];
                $basenameWE = $pathinfo['filename'];
                $height = $img_arr['height'];
                $width = $img_arr['width'];
                $newimagename = $basenameWE . '_' . $width . '_' . $height . '.' . $extension;
                $new_img = $dirname . '/' . $newimagename;
                $dnypath = str_replace($basename, '', $query['image']);
                $newimage = $img_path . $dnypath . $newimagename;
                $img = new Image($old_img);
                $img->resize($width, $height);
                $img->save($new_img);
            } else {
                $newimage = $img_path . $query['image'];
            }
            return $newimage;
        } else {
            return false;
        }
    }

    public static function loadAddons(){
        $addons = get_option('addon_names');
        $addons= json_decode($addons,true);
        if($addons == null ){
            $addons = array();
        }
            foreach($addons as $addon){
                $addon_folder_name =  $addon.'/'.$addon.'.php';
              //  var_dump($addon_folder_name);die(); 
                if(get_option($addon_folder_name)=='active'){
                    
                    $addon_file_path = RS_PLUGIN_PATH.'addons/'.$addon.'/'.$addon.'.php';
                 //   die($addon_file_path);
                    require_once $addon_file_path; 
                }                                        
            }
		  }
    }
    // end get products
            
 function smart_merge_attrs($pairs, $atts) {
        $atts = (array) $atts;
        $out = array();
        foreach ($pairs as $name => $default) {
            if (array_key_exists($name, $atts)) {
                $out[$name] = $atts[$name];
            } else {
                $out[$name] = $default;
            }
        }
        return $out;
    }
class Tools {

    protected static $file_exists_cache = array();
    protected static $_forceCompile;
    protected static $_caching;
    protected static $_user_plateform;
    protected static $_user_browser;
    public $headers, $body;
    public function __construct()
    {
        $this->headers = '';
        $this->body = '';
    }
    public static function getRemoteAddr() {
        // This condition is necessary when using CDN, don't remove it.
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && (!isset($_SERVER['REMOTE_ADDR']) || preg_match('/^127\..*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^172\.16.*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^192\.168\.*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^10\..*/i', trim($_SERVER['REMOTE_ADDR'])))) {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')) {
                $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                return $ips[0];
            } else
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $_SERVER['REMOTE_ADDR'];
    }
    public static function strlen($str, $encoding = 'UTF-8')
    {
        if (is_array($str)) {
            return false;
        }
        $str = html_entity_decode($str, ENT_COMPAT, 'UTF-8');
        if (function_exists('mb_strlen')) {
            return mb_strlen($str, $encoding);
        }
        return strlen($str);
    }
    private function streamHeaders($handle, $headers) {
        $this->headers .= $headers;
        return self::strlen($headers);
    }

    private function streamBody($handle, $data) {
            
        $data_length = strlen($data);
        $this->body .= $data;
        // Upon event of this function returning less than strlen( $data ) curl will error with CURLE_WRITE_ERROR.
        return $data_length;
    }

    public static function shouldDecode($headers)
    {
        if (is_array($headers)) {
            if (array_key_exists('content-encoding', $headers) && !empty($headers['content-encoding']))
                return true;
        } elseif (is_string($headers)) {
            return ( stripos($headers, 'content-encoding:') !== false );
        }

        return false;
    }
     public static function compatibleGzinflate($gzData)
    {

        // Compressed data might contain a full header, if so strip it for gzinflate().
        if (substr($gzData, 0, 3) == "\x1f\x8b\x08") {
            $i = 10;
            $flg = ord(substr($gzData, 3, 1));
            if ($flg > 0) {
                if ($flg & 4) {
                    list($xlen) = unpack('v', substr($gzData, $i, 2));
                    $i = $i + 2 + $xlen;
                }
                if ($flg & 8)
                    $i = strpos($gzData, "\0", $i) + 1;
                if ($flg & 16)
                    $i = strpos($gzData, "\0", $i) + 1;
                if ($flg & 2)
                    $i = $i + 2;
            }
            $decompressed = @gzinflate(substr($gzData, $i, -8));
            if (false !== $decompressed)
                return $decompressed;
        }

        // Compressed data from java.util.zip.Deflater amongst others.
        $decompressed = @gzinflate(substr($gzData, 2));
        if (false !== $decompressed)
            return $decompressed;

        return false;
    }
public static function decompress($compressed, $length = null)
    {

        if (empty($compressed))
            return $compressed;

        if (false !== ( $decompressed = @gzinflate($compressed) ))
            return $decompressed;

        if (false !== ( $decompressed = self::compatibleGzinflate($compressed) ))
            return $decompressed;

        if (false !== ( $decompressed = @gzuncompress($compressed) ))
            return $decompressed;

        if (function_exists('gzdecode')) {
            $decompressed = @gzdecode($compressed);

            if (false !== $decompressed)
                return $decompressed;
        }

        return $compressed;
    }
    public function getHttpCurl($url, $args) {
        global $wp_version;
        if (function_exists('curl_init')) {
            $defaults = array(
                'method' => 'GET',
                'timeout' => 30,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(
                    'Authorization' => 'Basic ',
                    'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8',
                    'Accept-Encoding' => 'x-gzip,gzip,deflate'
                ),
                'body' => array(),
                'cookies' => array(),
                'user-agent' => 'Opencart/' . $wp_version,
                'header' => false,
                'sslverify' => true,
            );
            
            $args = smart_merge_attrs($defaults, $args); 
            $curl_timeout = ceil($args['timeout']);
            $curl = curl_init();

            if ($args['httpversion'] == '1.0') {
                curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            } else {
                curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            }
            curl_setopt($curl, CURLOPT_USERAGENT, $args['user-agent']);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $curl_timeout);
            curl_setopt($curl, CURLOPT_TIMEOUT, $curl_timeout);

            $ssl_verify = $args['sslverify'];
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $ssl_verify);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, ( $ssl_verify === true ) ? 2 : false );
            if ($ssl_verify) {
                curl_setopt($curl, CURLOPT_CAINFO, ABSPATH . '/admin/views/ssl/ca-bundle.crt');
            }

            curl_setopt($curl, CURLOPT_HEADER, $args['header']);
            /*
             * The option doesn't work with safe mode or when open_basedir is set, and there's
             * a bug #17490 with redirected POST requests, so handle redirections outside Curl.
             */
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
            if (defined('CURLOPT_PROTOCOLS')) { // PHP 5.2.10 / cURL 7.19.4
                curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
            }
            

            $http_headers = array();
            foreach ($args['headers'] as $key => $value) {
                $http_headers[] = "{$key}: {$value}";
            }
           
            if (is_array($args['body']) || is_object($args['body'])) {
                $args['body'] = http_build_query($args['body']);
            }
            $http_headers[] = 'Content-Length: ' . strlen($args['body']);
             
            curl_setopt($curl, CURLOPT_HTTPHEADER, $http_headers);
            switch ($args['method']) {
                case 'HEAD':
                    curl_setopt($curl, CURLOPT_NOBODY, true);
                    break;
                case 'POST':
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $args['body']);
                    break;
                case 'PUT':
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $args['body']);
                    break;
                default:
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $args['method']);
                    if (!is_null($args['body'])) {
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $args['body']);
                    }
                    break;
            }
            
            curl_setopt($curl, CURLOPT_HEADERFUNCTION, array($this, 'streamHeaders'));
            curl_setopt($curl, CURLOPT_WRITEFUNCTION, array($this, 'streamBody'));
         //   curl_setopt($curl, CURLOPT_ENCODING, '');
            
                
            curl_exec($curl);

            $responseBody = $this->body;
            $responseHeader = $this->headers;
          
            if (self::shouldDecode($responseHeader) === true) {
                $responseBody = self::decompress($responseBody);
            }
            $this->body = '';
            $this->headers = '';
           
            $error = curl_error($curl);
            $errorcode = curl_errno($curl);
            $info = curl_getinfo($curl);
            curl_close($curl);
            $info_as_response = $info;
            $info_as_response['code'] = $info['http_code'];
            $info_as_response['message'] = 'OK';
            $response = array('body' => $responseBody, 'headers' => $responseHeader, 'info' => $info,'response' => $info_as_response, 'error' => $error, 'errno' => $errorcode);
                
            return $response;
        }
        return false;
    }

}

function wp_remote_post($url, $args) {
    $args['method'] = 'POST';
    $tools_class = new Tools();
    return $tools_class->getHttpCurl($url, $args);
}

class SdsRevToolImage {

    public function resizez($filename, $width, $height, $newfilename = '') {
        $info = pathinfo($filename);
        $extension = $info['extension'];
        $old_image = $filename;
        $new_image = $newfilename;
        $new_info = pathinfo($newfilename);
        $only_new_filename = $new_info['basename'];
        $get_http_catalog = get_http_catalog();
        $only_new_fileurl = $get_http_catalog . 'image/catalog/revslider_media_folder/' . $only_new_filename;

        if (!file_exists($new_image) || (filemtime($old_image) > filemtime($new_image))) {
            $path = '';
            $directories = explode('/', dirname(str_replace('../', '', $new_image)));
            foreach ($directories as $directory) {
                $path = $path . '/' . $directory;
            }
            $image = new Image($old_image);
            $image->resize($width, $height);
            $image->save($new_image);
        }
        return $only_new_fileurl;
    }

    public function resize($filename, $width, $height, $newfilename) {
        $pathinfo = pathinfo($filename);
        $dirname = $pathinfo['dirname'];
        $basename = $pathinfo['basename'];
        $extension = $pathinfo['extension'];
        $basenameWE = $pathinfo['filename'];
        $newpathinfo = pathinfo($newfilename);
        $newdirname = $newpathinfo['dirname'];
        $newbasename = $newpathinfo['basename'];
        $newextension = $newpathinfo['extension'];
        $newbasenameWE = $newpathinfo['filename'];
        $img = new Image($filename);
        $img->resize($width, $height);
        $img->save($newfilename);
        // print get_uploads_url($newbasename);
        // die();
        return get_uploads_url($newbasename);
    }

}

//function add_action($hook_name, $function,$priority = 10,$accepted_args = 1 ){ 
//    return true;
//} 

function add_filter($tag, $function,$priority = 10,$accepted_args = 1 ){    
                
    if(is_array($function)){
      $function_info['class'] = $function[0];
      $function_info['type'] = 'class';
      $function_info['function_name'] = $function[1];   
    }else{  
      $function_info['type'] = 'noclass';
      $function_info['function_name'] = $function; 
    }  
    sdsconfig::$filter_values[$tag][] = $function_info;
    return true;
}
function add_action($tag, $function,$priority = 10,$accepted_args = 1 ){    
    if($tag=='plugins_loaded'){
        $params = array();
        call_user_func_array($function,$params);
    }else{
    if(is_array($function)){
      $function_info['class'] = $function[0];
      $function_info['type'] = 'class';
      $function_info['function_name'] = $function[1];   
    }else{
      $function_info['type'] = 'noclass';
      $function_info['function_name'] = $function; 
    }
    sdsconfig::$hook_values[$tag][] = $function_info;
    }
    
    return true;
}


function apply_filters($tag, $value,$arg1='',$arg2='',$arg3='',$arg4='',$arg5='') {
                
    if(isset(sdsconfig::$filter_values[$tag])){
            $filtered_value=null;
            $params = array($value,$arg1,$arg2,$arg3,$arg4,$arg5);
            
            $filter_tag_values = sdsconfig::$filter_values[$tag]; 
             foreach($filter_tag_values as $filter){ 
                if($filter['type']=='class'){ 
                 $return_data = call_user_func_array(array($filter['class'],$filter['function_name']),$params); 
                }else{ 
                 $return_data = call_user_func_array($filter['function_name'],$params);
                }  
                //get the filtered value weather string or array. sometimes returns only string
                $filtered_value = $return_data;   
                //if array then reassign the value 
                    if(is_array($return_data)){  
                        if(count($return_data) == 1 || empty($return_data)){
                            if(!empty($return_data)){
                                $array_value[key($return_data)] = $return_data[key($return_data)];
                            }  else{
                                $array_value = array();
                            }
                        }else{ 
                            $array_value= $return_data;
                        }
                        $filtered_value = $array_value;
                    } 
                
            } 
            
                        
        return $filtered_value;
    }else{
        return $value;
    } 
}
function is_wp_error(){
    return false;
}
function do_action($tag,$arg1='',$arg2='',$arg3='',$arg4='',$arg5='') {
    if(isset(sdsconfig::$hook_values[$tag])){
        $params = array($arg1,$arg2,$arg3,$arg4,$arg5);
       // var_dump(sdsconfig::$hook_values[$tag]);
                foreach(sdsconfig::$hook_values[$tag] as $hook){ 
                        if($hook['type']=='class'){  
                            call_user_func_array(array($hook['class'],$hook['function_name']),$params);
                        }else{
                            call_user_func_array($hook['function_name'],$params);   
                        } 
                }
                
        
    }else{
        return true;
    } 
}
function check_addon_hooks($hook_name,$function){ 
      switch ($hook_name) {
         case 'pre_set_site_transient_update_plugins': 
             return false;
             break;
         case 'plugins_api':
             return false;
             break;
         case 'admin_enqueue_scripts':  
             return array('toplevel_page_revslider');
             break;
         case 'revslider_slide_addons':
             if(isset($_GET['view']) && isset($_GET['id'])){
                $wpdb = rev_db_class::rev_db_instance();  
		$tableSlides = $wpdb->prefix . RevSliderGlobals::TABLE_SLIDES_NAME; 
                if($_GET['view']=='slide'){
         
                    $slide_id =$_GET['id']; 
                    $_slide = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tableSlides WHERE id = %s", $slide_id), ARRAY_A); 
                    $slider_id =$_slide['slider_id'];; 
                 
                    $_slider = new RevSlider(); 
                    $_slider->initByID($slider_id); 
                    
                    $slide = new RevSlide();
                    $slide->initByID($slide_id);
                    
                    $params =  array(
                        json_decode($_slide['settings'],true),
                        $slide,
                        $_slider,
                        );
                    
                    return $params;
                 }else{
                     return false;
                 }
             }
             break;
         case 'revslider_slider_addons':   
             if(isset($_GET['view']) && isset($_GET['id'])){
                $wpdb = rev_db_class::rev_db_instance(); 
		$tableSliders = $wpdb->prefix . RevSliderGlobals::TABLE_SLIDERS_NAME; 
              //  var_dump($_GET);die();
                 if($_GET['view']=='slider'){
                     $slider_id =$_GET['id'];  
                     $_slider = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tableSliders WHERE id = %s", $slider_id), ARRAY_A);
                     return array(json_decode($_slider['settings'],true),json_decode($_slider['params'],true));
                    
                 }else{
                     return false;
                 }
             } 
             break;
         case 'revslider_fe_javascript_output':  
         return false;
             break;
         case 'revslider_add_li_data':  
         return false;
             break;
         case 'revslider_add_layer_attributes':  
         return false;
             break;
         case 'revslider_putCreativeLayer':  
         return false;
             break;
         default:
             break;
      }
      return true;
}
//place for addons-------------

function cleanString($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9_\-]/', '', $string); // Removes special chars.
}

function rev_token_valid($token){
    if($token == sds_get_oc_token()){
        return true;
    }else{
        return false;
    }
}
function get_rev_token(){
    return sds_get_oc_token();
}

function wp_verify_nonce($token){
    return rev_token_valid($token);
}