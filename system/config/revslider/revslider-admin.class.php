<?php
class RevsliderAdminHelper{
    public static $base_url,$rev_lang,$token;
    public function __construct($param=null,$token_param) {
      //  RevSliderGlobals::$table_sliders = self::$table_prefix . RevSliderGlobals::TABLE_SLIDERS_NAME;
        self::$base_url = $param;
        self::$token = $token_param;
    }
}
                
class RevSliderAdmin extends UniteBaseAdminClassRev {

    const VIEW_SLIDER = "slider";
    const VIEW_SLIDER_TEMPLATE = "slider_template"; //obsolete
    const VIEW_SLIDERS = "sliders";
    const VIEW_SLIDES = "slides";
    const VIEW_SLIDE = "slide"; 
    public function __construct($param=null,$init=false) {

        parent::__construct($this); 
        //set table names
        
        RevSliderGlobals::$table_sliders = self::$table_prefix . RevSliderGlobals::TABLE_SLIDERS_NAME;
        RevSliderGlobals::$table_slides = self::$table_prefix . RevSliderGlobals::TABLE_SLIDES_NAME;
        RevSliderGlobals::$table_static_slides = self::$table_prefix . RevSliderGlobals::TABLE_STATIC_SLIDES_NAME;
        RevSliderGlobals::$table_settings = self::$table_prefix . RevSliderGlobals::TABLE_SETTINGS_NAME;
        RevSliderGlobals::$table_css = self::$table_prefix . RevSliderGlobals::TABLE_CSS_NAME;
        RevSliderGlobals::$table_layer_anims = self::$table_prefix . RevSliderGlobals::TABLE_LAYER_ANIMS_NAME;
        RevSliderGlobals::$table_navigation = self::$table_prefix . RevSliderGlobals::TABLE_NAVIGATION_NAME;
        RevSliderGlobals::$table_revslider_options_name =self::$table_prefix .RevSliderGlobals::TABLE_REVSLIDER_OPTIONS_NAME;
        RevSliderGlobals::$table_attachment_images = self::$table_prefix . RevSliderGlobals::TABLE_ATTACHMENT_IMAGES;
        RevSliderGlobals::$table_attachment_images_lang =self::$table_prefix .RevSliderGlobals::TABLE_ATTACHMENT_IMAGES_LANG;
              
        RevSliderGlobals::$filepath_backup = RS_PLUGIN_PATH . 'backup/';
        RevSliderGlobals::$filepath_captions = RS_PLUGIN_PATH . 'public/assets/css/captions.css';
        RevSliderGlobals::$urlCaptionsCSS = RS_PLUGIN_URL . 'public/assets/css/captions.php';
        RevSliderGlobals::$filepath_dynamic_captions = RS_PLUGIN_PATH . 'public/assets/css/dynamic-captions.css';
        RevSliderGlobals::$filepath_captions_original = RS_PLUGIN_PATH . 'public/assets/css/captions-original.css';
        
        
        
        RevSliderGlobals::$uploadsUrlExportZip = RS_PLUGIN_PATH . 'export.zip';
        
        if( $init == false){
            $this->init();
        }     
    }
    public static function modifyTables(){ 
         $wpdb = rev_db_class::rev_db_instance(); 
         self::createTable(GlobalsRevSlider::TABLE_NAVIGATION_NAME); 
         self::createTable(GlobalsRevSlider::TABLE_REVSLIDER_OPTIONS_NAME);
         
        $table_name = $wpdb->prefix.'revslider_attachment_images'; 
        $wpdb->query("ALTER TABLE `".$table_name."` ADD `subdir` varchar(100) NOT NULL");
        
        $table_name = $wpdb->prefix.'revslider_static_slides'; 
        $wpdb->query("ALTER TABLE `".$table_name."` ADD `settings` text NOT NULL");
        $wpdb->query("ALTER TABLE `".$table_name."` MODIFY COLUMN `params` longtext NOT NULL");
        $wpdb->query("ALTER TABLE `".$table_name."` MODIFY COLUMN `layers` longtext NOT NULL"); 
        
        $table_name = $wpdb->prefix.'revslider_layer_animations'; 
        $wpdb->query("ALTER TABLE `".$table_name."` MODIFY COLUMN `params` longtext NOT NULL");
        
        $table_name = $wpdb->prefix.'revslider_sliders'; 
        $wpdb->query("ALTER TABLE `".$table_name."` MODIFY COLUMN `params` longtext NOT NULL");
        $wpdb->query("ALTER TABLE `".$table_name."` ADD `settings` text NOT NULL");
        $wpdb->query("ALTER TABLE `".$table_name."` ADD `type` varchar(100) NOT NULL");
        
        $table_name = $wpdb->prefix.'revslider_slides';  
        $wpdb->query("ALTER TABLE `".$table_name."` ADD `settings` text NOT NULL");
        $wpdb->query("ALTER TABLE `".$table_name."` MODIFY COLUMN `params` longtext NOT NULL");
        $wpdb->query("ALTER TABLE `".$table_name."` MODIFY COLUMN `layers` longtext NOT NULL"); 
        
        $table_name = $wpdb->prefix.'revslider_css'; 
        $wpdb->query("ALTER TABLE `".$table_name."` ADD `advanced` longtext NOT NULL");
        $wpdb->query("ALTER TABLE `".$table_name."` MODIFY COLUMN `settings` longtext NOT NULL"); 
        $wpdb->query("ALTER TABLE `".$table_name."` MODIFY COLUMN `hover` longtext NOT NULL"); 
        $wpdb->query("ALTER TABLE `".$table_name."` MODIFY COLUMN `params` longtext NOT NULL"); 
        
        self::sds_caption_css_init(true);
    }

    private static function isTablesCreated() {
        $wpdb = rev_db_class::rev_db_instance(); 
            $table_name = $wpdb->prefix.'revslider_sliders'; 
            $result = $wpdb->get_results("SHOW TABLES LIKE '".$table_name."'");
            if(empty($result)){
                return false;
            }else{
                return true;
            }  
    }
    private static function isOptionsTableCreated() {
        $wpdb = rev_db_class::rev_db_instance(); 
            $table_name = $wpdb->prefix.'revslider_options'; 
            $result = $wpdb->get_results("SHOW TABLES LIKE '".$table_name."'");
            if(empty($result)){
                return false;
            }else{
                return true;
            }  
    }
    public function tableOperations(){
        $isTablesCreated = self::isTablesCreated();
        $isOptionsTableCreated = self::isOptionsTableCreated();
        
        if($isTablesCreated == false){
            self::createDBTables();
        }
                
        if($isOptionsTableCreated == false){
            
            self::modifyTables();
        }          
    }
    private function init() {  
        if(is_admin()){
            sdsconfig::loadActiveAddons();
        } 
        $isWpmlExists = RevSliderWpml::getCurrentLang();
                
        global $revSliderAsTheme;
        //global $pagenow;

        $template = new RevSliderTemplate();
        $operations = new RevSliderOperations();
        $obj_library = new RevSliderObjectLibrary();
        $general_settings = $operations->getGeneralSettingsValues();

        $role = RevSliderBase::getVar($general_settings, 'role', 'admin');
        $force_activation_box = RevSliderBase::getVar($general_settings, 'force_activation_box', 'off');

        if ($force_activation_box == 'on') { //force the notifications and more
            $revSliderAsTheme = false;
        }
        
        self::setMenuRole($role);
        
        self::addMenuPage('Slider Revolution', "adminPages");
                
       
        self::addSubMenuPage('Navigation Editor', 'display_plugin_submenu_page_navigation', 'revslider_navigation');


        $this->addSliderMetaBox();

        //ajax response to save slider options.
        self::addActionAjax("ajax_action", "onAjaxAction");

		$upgrade = new RevSliderUpdate( GlobalsRevSlider::SLIDER_REVISION );
		
		$temp_active = get_option('revslider-temp-active', 'false');
		
		if($temp_active == 'true'){ //check once an hour
			$temp_force = (isset($_GET['checktempactivate'])) ? true : false;
			$upgrade->add_temp_active_check($temp_force);
		}
        //add common scripts there
        $validated = get_option('revslider-valid', 'false');
        $notice = get_option('revslider-valid-notice', 'true');
        $latestv = RevSliderGlobals::SLIDER_REVISION;
        $stablev = get_option('revslider-stable-version', '0');

        if (!$revSliderAsTheme || version_compare($latestv, $stablev, '<')) {
            if ($validated === 'false' && $notice === 'true') {
                add_action('admin_notices', array($this, 'addActivateNotification'));
            }
            if (isset($_GET['checkforupdates']) && $_GET['checkforupdates'] == 'true')
                $upgrade->_retrieve_version_info(true);

            if ($validated === 'true' || version_compare($latestv, $stablev, '<')) {
                $upgrade->add_update_checks();
            }
        }

        if (isset($_GET['checkforupdates']) && $_GET['checkforupdates'] == 'true')
                $upgrade->_retrieve_version_info(true);

        if (isset($_REQUEST['update_shop'])) {
                
            $template->_get_template_list(true);
        } else {
            $template->_get_template_list();
        }

        if (isset($_REQUEST['update_object_library'])) {
                
            $obj_library->_get_list(true);
        } else {
            $obj_library->_get_list();
        }

        $upgrade->_retrieve_version_info();

       // add_action('admin_notices', array($this, 'add_notices'));

        self::enqueue_styles();
        

        self::enqueue_all_admin_scripts();
       // add_action('wp_ajax_revslider_ajax_call_front', array('RevSliderAdmin', 'onFrontAjaxAction'));
       // $this->onFrontAjaxAction();
       // add_action('wp_ajax_nopriv_revslider_ajax_call_front', array('RevSliderAdmin', 'onFrontAjaxAction')); //for not logged in users

        self::include_custom_css();

       
        self::addCommonScripts();
        self::onAddScripts();
        //will have to uncomment it
        
        $addon_admin = new Rev_addon_Admin('rev_addon', RevSliderGlobals::SLIDER_REVISION);
      
        $addon_admin->enqueue_styles();  
        $addon_admin->enqueue_scripts();
        
        
     //   var_dump(sdsconfig::$hook_values);die();
        do_action('admin_enqueue_scripts','toplevel_page_revslider');
        
        
        // Add-on Admin Button Ajax Actions
//        add_action('wp_ajax_activate_plugin', array($addon_admin, 'activate_plugin'));
//        add_action('wp_ajax_deactivate_plugin', array($addon_admin, 'deactivate_plugin'));
//        add_action('wp_ajax_install_plugin', array($addon_admin, 'install_plugin'));
       self::adminPages();
    }
public static function toggle_favorite_by_id($id){
		$id = intval($id);
		if($id === 0) return false;
		
		 $wpdb= rev_db_class::rev_db_instance();   ;
		
		$table_name = $wpdb->prefix . RevSliderGlobals::TABLE_SLIDERS_NAME;
		
		//check if ID exists
		$slider = $wpdb->get_row($wpdb->prepare("SELECT settings FROM $table_name WHERE id = %s", $id), ARRAY_A);
		
		if(empty($slider))
			return __('Slider not found', 'revslider');
			
		$settings = json_decode($slider['settings'], true);
		
		if(!isset($settings['favorite']) || $settings['favorite'] == 'false' || $settings['favorite'] == false){
			$settings['favorite'] = 'true';
		}else{
			$settings['favorite'] = 'false';
		}
		
		$response = $wpdb->update($table_name, array('settings' => json_encode($settings)), array('id' => $id));
		
		if($response === false) return __('Slider setting could not be changed', 'revslider');
		
		return true;
	}

    public static function enqueue_styles() {
        wp_enqueue_style('rs-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,700,600,800');
        wp_enqueue_style('revslider-global-styles', RS_PLUGIN_URL . 'admin/assets/css/global.css', array(), GlobalsRevSlider::SLIDER_REVISION);
        wp_enqueue_style('thickbox_css', RS_PLUGIN_URL .'admin/assets/css/thickbox.css', array(), RevSliderGlobals::SLIDER_REVISION);
	
        }

    public static function enqueue_all_admin_scripts() {
     //   wp_localize_script('unite_admin', 'rev_lang', self::get_javascript_multilanguage()); //Load multilanguage for JavaScript

        wp_enqueue_style(array('wp-color-picker'));
        wp_enqueue_script(array('wp-color-picker'));


        //enqueue in all pages / posts in backend
        $screen = get_current_screen();

//        $post_types = get_post_types('', 'names');
//        foreach ($post_types as $post_type) {
//            if ($post_type == $screen->id) {
//                wp_enqueue_script('revslider-tinymce-shortcode-script', RS_PLUGIN_URL . 'admin/assets/js/tinymce-shortcode-script.js', array('jquery'), RevSliderGlobals::SLIDER_REVISION);
//            }
//        }
    }

    public static function onFrontAjaxAction() {
        $db = new RevSliderDB();
        $slider = new RevSlider();
        $slide = new RevSlide();
        $operations = new RevSliderOperations();

        $token = self::getPostVar("token", false);

        //verify the token
        $isVerified = wp_verify_nonce($token, 'RevSlider_Front');

        $error = false;
        if ($isVerified) {
            $data = self::getPostVar('data', false);
            switch (self::getPostVar('client_action', false)) {
                case 'get_slider_html':
                    $id = intval(self::getPostVar('id', 0));
                    if ($id > 0) {
                        $html = '';
                        ob_start();
                        $slider_class = RevSliderOutput::putSlider($id);
                        $html = ob_get_contents();

                        //add styling
                        $custom_css = RevSliderOperations::getStaticCss();
                        $custom_css = RevSliderCssParser::compress_css($custom_css);
                        $styles = $db->fetch(RevSliderGlobals::$table_css);
                        $styles = RevSliderCssParser::parseDbArrayToCss($styles, "\n");
                        $styles = RevSliderCssParser::compress_css($styles);

                        $html .= '<style type="text/css">' . $custom_css . '</style>';
                        $html .= '<style type="text/css">' . $styles . '</style>';

                        ob_clean();
                        ob_end_clean();

                        $result = (!empty($slider_class) && $html !== '') ? true : false;

                        if (!$result) {
                            $error = 'Slider not found';
                        } else {

                            if ($html !== false) {
                                self::ajaxResponseData($html);
                            } else {
                                $error = 'Slider not found';
                            }
                        }
                    } else {
                        $error = 'No Data Received';
                    }
                    break;
            }
        } else {
            $error = true;
        }

        if ($error !== false) {
            $showError = 'Loading Error';
            if ($error !== true)
                $showError = 'Loading Error: ' . $error;

            self::ajaxResponseError($showError, false);
        }
        exit();
    }

    public static function include_custom_css() {

        $type = (isset($_GET['view'])) ? $_GET['view'] : '';
        $page = (isset($_GET['page'])) ? $_GET['page'] : '';

        if ($page !== 'slider' && $page !== 'revslider_navigation')
            return false; //showbiz fix

        $sliderID = '';

        switch ($type) {
            case 'slider':

                $sliderID = (isset($_GET['id'])) ? $_GET['id'] : '';
                break;
            case 'slide':
                $slideID = (isset($_GET['id'])) ? $_GET['id'] : '';
                if ($slideID == 'new')
                    break;

                $slide = new RevSlide();
                $slide->initByID($slideID);
                $sliderID = $slide->getSliderID();
                break;
            default:
                if (isset($_GET['slider'])) {
                    $sliderID = $_GET['slider'];
                }
                break;
        }

        $arrFieldsParams = array();

        if (!empty($sliderID)) {
            $slider = new RevSlider();
            $slider->initByID($sliderID);
            $settingsFields = $slider->getSettingsFields();
            $arrFieldsMain = $settingsFields['main'];
            $arrFieldsParams = $settingsFields['params'];
            $custom_css = @stripslashes($arrFieldsParams['custom_css']);
            $custom_css = RevSliderCssParser::compress_css($custom_css);
            echo '<style>' . $custom_css . '</style>';
        }
    }

    private function addSliderMetaBox($postTypes = null) { //null = all, post = only posts
        try {
            self::addMetaBox("Revolution Slider Options", '', array("RevSliderAdmin", "customPostFieldsOutput"), $postTypes);
        } catch (Exception $e) {
            
        }
    }

    public static function customPostFieldsOutput(UniteSettingsProductSidebarRev $output) {

        //$settings = $output->getArrSettingNames();
        ?>

        <ul class="revslider_settings">

        <?php
        $output->drawSettingsByNames("slide_template");
        ?>

        </ul>

            <?php
        }

        public static function onActivate() {

            return self::createDBTables();
        }

        public static function createDBTables() {

            $res = self::createTable(GlobalsRevSlider::TABLE_SLIDERS_NAME);

            $res &= self::createTable(GlobalsRevSlider::TABLE_SLIDES_NAME); 
            $res &= self::createTable(GlobalsRevSlider::TABLE_STATIC_SLIDES_NAME);

            $res &= self::createTable(GlobalsRevSlider::TABLE_CSS_NAME);
            $res &= self::createTable(GlobalsRevSlider::TABLE_NAVIGATION_NAME);
            $res &= self::createTable(GlobalsRevSlider::TABLE_LAYER_ANIMS_NAME);

            $res &= self::createTable(GlobalsRevSlider::TABLE_ATTACHMENT_IMAGES);
            
            $res &= self::createTable(GlobalsRevSlider::TABLE_REVSLIDER_OPTIONS_NAME);
         
       //     self::insertValues();
            return $res;
        }

        public static function insertValues(){
            
        }
        public static function deleteDBTables() {

            $res = self::deleteDBTable(GlobalsRevSlider::TABLE_SLIDERS_NAME);

            $res &= self::deleteDBTable(GlobalsRevSlider::TABLE_SLIDES_NAME);

            $res &= self::deleteDBTable(GlobalsRevSlider::TABLE_STATIC_SLIDES_NAME);
            
            $res &= self::deleteDBTable(GlobalsRevSlider::TABLE_NAVIGATION_NAME);
            $res &= self::deleteDBTable(GlobalsRevSlider::TABLE_CSS_NAME);

            $res &= self::deleteDBTable(GlobalsRevSlider::TABLE_LAYER_ANIMS_NAME);

            $res &= self::deleteDBTable(GlobalsRevSlider::TABLE_ATTACHMENT_IMAGES);
            $res &= self::deleteDBTable(GlobalsRevSlider::TABLE_REVSLIDER_OPTIONS_NAME);
            return $res;
        }

        public static function checkCopyCaptionsCSS() {



            if (file_exists(GlobalsRevSlider::$filepath_captions) == false)
                copy(GlobalsRevSlider::$filepath_captions_original, GlobalsRevSlider::$filepath_captions);



            if (!file_exists(GlobalsRevSlider::$filepath_captions) == true) {

                self::setStartupError("Can't copy <b>captions-original.css </b> to <b>captions.css</b> in <b> plugins/revslider/rs-plugin/css </b> folder. Please try to copy the file by hand or turn to support.");
            }
        }

        /*

         * File uploader css and js

         */

        public static function enqueue_file_uploader_scripts() {



            self::addStyle("jquery-ui-1.10.3.custom", "jquery-ui-css", "css/jui/new");



            wp_enqueue_style('jquery-uploadify-css', self::$url_plugin . "/rs-plugin/fileuploader/uploadify.css");

            wp_enqueue_style('bootstrap-css', self::$url_plugin . "/css/bootstrap.min.css");

            	

            wp_enqueue_script('bootstrap-min-js', self::$url_plugin . 'js/bootstrap.min.js', array('jquery'));

            wp_enqueue_script('jquery-uploadify', self::$url_plugin . 'rs-plugin/fileuploader/jquery.uploadify.min.js');

            //wp_enqueue_script('jquery-ui-custom-js',self::$url_plugin .'js/jquery-ui/jquery-ui-1.10.3.custom.js');

            wp_enqueue_script('admin-js', self::$url_plugin . 'js/admin.js');
        }

            
        public static function addCommonScripts(){
                $version = VERSION;

                if($version >= "3.0.0.0"){
                   $token_style = "user_token";

                }elseif($version == "2.3.0.2"){
                   $token_style = "token";
                }
                $nonce_toekn = wp_create_nonce("revslider_actions");                        
		if(function_exists("wp_enqueue_media"))
			wp_enqueue_media();
		
		$rev_lang =  self::get_javascript_multilanguage();
                $rev_lang_param = array();
                foreach($rev_lang as $lang_index => $lang){
                    $rev_lang_param[$lang_index] = $lang;
                }
            
                $g_revNonce = $nonce_toekn;
                $g_uniteDirPlugin = "revslider";
                $g_urlContent = str_replace(array("\n", "\r", chr(10), chr(13)), array(''), content_url())."/";
                $g_urlAjaxShowImage = RevSliderBase::$url_ajax_showimage;
                $g_urlAjaxActions = RevSliderBase::$url_ajax_actions;
                $g_revslider_url = RS_PLUGIN_URL;
                $g_settingsObj = array();
                $operations = new RevSliderOperations();
                $glob_vals = $operations->getGeneralSettingsValues();
                $glval = $operations->getGeneralSettingsValues();
                $pack_page_creation = RevSliderFunctions::getVal($glob_vals, "pack_page_creation", "on");
                $single_page_creation = RevSliderFunctions::getVal($glob_vals, "single_page_creation", "off");
                $rs_pack_page_creation = ($pack_page_creation == 'on') ? 'true' : 'false';
                $rs_single_page_creation = ($single_page_creation == 'on') ? 'true' : 'false';
               // $tp_color_picker_presets = $tp_color_picker_presets;
                $global_grid_sizes["desktop"] = RevSliderBase::getVar($glval, 'width', 1230);
                $global_grid_sizes["notebook"] = RevSliderBase::getVar($glval, 'width_notebook', 1230);
                $global_grid_sizes["tablet"] = RevSliderBase::getVar($glval, 'width_tablet', 992);
                $global_grid_sizes["mobile"] = RevSliderBase::getVar($glval, 'width_mobile', 480);
                $ajaxurl = rev_site_admin_url()."?route=extension/module/revslideropencart/ajaxexecute&".$token_style."=".sds_get_oc_token()."&returnurl=".admin_url();
               
                wp_localize_script('g_revNonce', 'g_revNonce', $g_revNonce);
                wp_localize_script('g_uniteDirPlugin', 'g_uniteDirPlugin', $g_uniteDirPlugin);
                wp_localize_script('g_urlContent', 'g_urlContent', $g_urlContent);
                wp_localize_script('g_urlAjaxShowImage', 'g_urlAjaxShowImage', $g_urlAjaxShowImage);
                wp_localize_script('g_urlAjaxActions', 'g_urlAjaxActions', $g_urlAjaxActions);
                wp_localize_script('g_revslider_url', 'g_revslider_url', $g_revslider_url);
                wp_localize_script('g_settingsObj', 'g_settingsObj', $g_settingsObj);
                wp_localize_script('rs_pack_page_creation', 'rs_pack_page_creation', $rs_pack_page_creation);
                wp_localize_script('rs_single_page_creation', 'rs_single_page_creation', $rs_single_page_creation);
               // wp_localize_script('tp_color_picker_presets', 'tp_color_picker_presets', $tp_color_picker_presets);
                wp_localize_script('global_grid_sizes', 'global_grid_sizes', $global_grid_sizes);
                wp_localize_script('ajaxurl', 'ajaxurl', $ajaxurl); 
                wp_localize_script('RS_DEMO', 'RS_DEMO', false); //Load multilanguage for JavaScript
                wp_localize_script('rev_lang', 'rev_lang', $rev_lang_param); //Load multilanguage for JavaScript
                $wpColorPickerL10n = array(
                    "clear"=>"Clear",
                    "defaultString"=>"Default",
                    "pick"=>"Select Color",
                    "current"=>"Current Color"
                );
                wp_localize_script('wpColorPickerL10n', 'wpColorPickerL10n', $wpColorPickerL10n); //Load multilanguage for JavaScript
                

                $version = VERSION;
                     
                    if($version >= "3.0.0.0"){
                       $token_style = "user_token";

                    }elseif($version == "2.3.0.2"){
                       $token_style = "token";
                    }
            
                 $filemanager_url = rev_site_admin_url()."?route=extension/module/fmanager&".$token_style."=".sds_get_oc_token();
                 wp_localize_script('uploadurl', 'uploadurl', $filemanager_url); //Load multilanguage for JavaScript

                wp_enqueue_script('core_js', RS_PLUGIN_URL .'admin/assets/js/jquery/core.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
                   wp_enqueue_script('underscore_min', RS_PLUGIN_URL .'admin/assets/js/underscore.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
                 wp_enqueue_script('widget_js', RS_PLUGIN_URL .'admin/assets/js/jquery/widget.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
              
            
                 wp_enqueue_script('mouse_js', RS_PLUGIN_URL .'admin/assets/js/jquery/mouse.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
                 wp_enqueue_script('accordion_js', RS_PLUGIN_URL .'admin/assets/js/jquery/accordion.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
                
                wp_enqueue_script('datepicker_js', RS_PLUGIN_URL .'admin/assets/js/jquery/datepicker.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
               
                wp_enqueue_script('dialog_js', RS_PLUGIN_URL .'admin/assets/js/jquery/dialog.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
                wp_enqueue_script('slider_js', RS_PLUGIN_URL .'admin/assets/js/jquery/slider.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
                wp_enqueue_script('menu_js', RS_PLUGIN_URL .'admin/assets/js/jquery/menu.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
               
                wp_enqueue_script('autocomplete_js', RS_PLUGIN_URL .'admin/assets/js/jquery/autocomplete.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
                wp_enqueue_script('sortable_js', RS_PLUGIN_URL .'admin/assets/js/jquery/sortable.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
              wp_enqueue_script('droppable_js', RS_PLUGIN_URL .'admin/assets/js/jquery/droppable.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
                wp_enqueue_script('tabs_js', RS_PLUGIN_URL .'admin/assets/js/jquery/tabs.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
                
               wp_enqueue_script('color_picker_js', RS_PLUGIN_URL .'admin/assets/js/color-picker.js', array(), RevSliderGlobals::SLIDER_REVISION );
               
             //  wp_enqueue_script('alphacolorpicker_js', RS_PLUGIN_URL .'admin/assets/js/alpha-color-picker.js', array(), RevSliderGlobals::SLIDER_REVISION );
               wp_enqueue_script('resizable_js', RS_PLUGIN_URL .'admin/assets/js/jquery/resizable.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
               wp_enqueue_script('draggable_js', RS_PLUGIN_URL .'admin/assets/js/jquery/draggable.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
              
 //		
               
                wp_enqueue_script('unite_settings', RS_PLUGIN_URL .'admin/assets/js/settings.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('unite_admin', RS_PLUGIN_URL .'admin/assets/js/admin.js', array(), RevSliderGlobals::SLIDER_REVISION );
		
		wp_enqueue_style('unite_admin', RS_PLUGIN_URL .'admin/assets/css/admin.css', array(), RevSliderGlobals::SLIDER_REVISION);
		wp_enqueue_style('jquery_ui_dialog', RS_PLUGIN_URL .'admin/assets/css/ui/jquery-ui-dialog.css', array(), RevSliderGlobals::SLIDER_REVISION);
		wp_enqueue_script('thickbox', RS_PLUGIN_URL .'admin/assets/js/thickbox.js', array(), RevSliderGlobals::SLIDER_REVISION );
		
                
		//add tipsy
		wp_enqueue_script('tipsy', RS_PLUGIN_URL .'admin/assets/js/jquery.tipsy.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_style('tipsy_css', RS_PLUGIN_URL .'admin/assets/css/tipsy.css', array(), RevSliderGlobals::SLIDER_REVISION);
		
		//include codemirror
		wp_enqueue_script('codemirror_js', RS_PLUGIN_URL .'admin/assets/js/codemirror/codemirror.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('codemirror_js_highlight', RS_PLUGIN_URL .'admin/assets/js/codemirror/util/match-highlighter.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('codemirror_js_searchcursor', RS_PLUGIN_URL .'admin/assets/js/codemirror/util/searchcursor.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('codemirror_js_css', RS_PLUGIN_URL .'admin/assets/js/codemirror/css.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('codemirror_js_html', RS_PLUGIN_URL .'admin/assets/js/codemirror/xml.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_style('codemirror_css', RS_PLUGIN_URL .'admin/assets/js/codemirror/codemirror.css', array(), RevSliderGlobals::SLIDER_REVISION);
		
	}
	protected static function get_javascript_multilanguage(){
		$lang = array(
			'wrong_alias' => __('-- wrong alias -- ', 'revslider'),
			'nav_bullet_arrows_to_none' => __('Navigation Bullets and Arrows are now set to none.', 'revslider'),
			'create_template' => __('Create Template', 'revslider'),
			'really_want_to_delete' => __('Do you really want to delete', 'revslider'),
			'sure_to_replace_urls' => __('Are you sure to replace the urls?', 'revslider'),
			'set_settings_on_all_slider' => __('Set selected settings on all Slides of this Slider? (This will be saved immediately)', 'revslider'),
			'select_slide_img' => __('Select Slide Image', 'revslider'),
			'select_layer_img' => __('Select Layer Image', 'revslider'),
			'select_slide_video' => __('Select Slide Video', 'revslider'),
			'show_slide_opt' => __('Show Slide Options', 'revslider'),
			'hide_slide_opt' => __('Hide Slide Options', 'revslider'),
			'close' => __('Close', 'revslider'),
			'really_update_global_styles' => __('Really update global styles?', 'revslider'),
			'really_clear_global_styles' => __('This will remove all Global Styles, continue?', 'revslider'),
			'global_styles_editor' => __('Global Styles Editor', 'revslider'),
			'select_image' => __('Select Image', 'revslider'),
			'video_not_found' => __('No Thumbnail Image Set on Video / Video Not Found / No Valid Video ID', 'revslider'),
			'handle_at_least_three_chars' => __('Handle has to be at least three character long', 'revslider'),
			'really_change_font_sett' => __('Really change font settings?', 'revslider'),
			'really_delete_font' => __('Really delete font?', 'revslider'),
			'class_exist_overwrite' => __('Class already exists, overwrite?', 'revslider'),
			'class_must_be_valid' => __('Class must be a valid CSS class name', 'revslider'),
			'really_overwrite_class' => __('Really overwrite Class?', 'revslider'),
			'relly_delete_class' => __('Really delete Class', 'revslider'),
			'class_this_cant_be_undone' => __('? This can\'t be undone!', 'revslider'),
			'this_class_does_not_exist' => __('This class does not exist.', 'revslider'),
			'making_changes_will_probably_overwrite_advanced' => __('Making changes to these settings will probably overwrite advanced settings. Continue?', 'revslider'),
			'select_static_layer_image' => __('Select Static Layer Image', 'revslider'),
			'select_layer_image' => __('Select Layer Image', 'revslider'),
			'really_want_to_delete_all_layer' => __('Do you really want to delete all the layers?', 'revslider'),
			'layer_animation_editor' => __('Layer Animation Editor', 'revslider'),
			'animation_exists_overwrite' => __('Animation already exists, overwrite?', 'revslider'),
			'really_overwrite_animation' => __('Really overwrite animation?', 'revslider'),
			'default_animations_cant_delete' => __('Default animations can\'t be deleted', 'revslider'),
			'must_be_greater_than_start_time' => __('Must be greater than start time', 'revslider'),
			'sel_layer_not_set' => __('Selected layer not set', 'revslider'),
			'edit_layer_start' => __('Edit Layer Start', 'revslider'),
			'edit_layer_end' => __('Edit Layer End', 'revslider'),
			'default_animations_cant_rename' => __('Default Animations can\'t be renamed', 'revslider'),
			'anim_name_already_exists' => __('Animationname already existing', 'revslider'),
			'css_name_already_exists' => __('CSS classname already existing', 'revslider'),
			'css_orig_name_does_not_exists' => __('Original CSS classname not found', 'revslider'),
			'enter_correct_class_name' => __('Enter a correct class name', 'revslider'),
			'class_not_found' => __('Class not found in database', 'revslider'),
			'css_name_does_not_exists' => __('CSS classname not found', 'revslider'),
			'delete_this_caption' => __('Delete this caption? This may affect other Slider', 'revslider'),
			'this_will_change_the_class' => __('This will update the Class with the current set Style settings, this may affect other Sliders. Proceed?', 'revslider'),
			'unsaved_changes_will_not_be_added' => __('Template will have the state of the last save, proceed?', 'revslider'),
			'please_enter_a_slide_title' => __('Please enter a Slide title', 'revslider'),
			'please_wait_a_moment' => __('Please Wait a Moment', 'revslider'),
			'copy_move' => __('Copy / Move', 'revslider'),
			'preset_loaded' => __('Preset Loaded', 'revslider'),
			'add_bulk_slides' => __('Add Bulk Slides', 'revslider'),
			'select_image' => __('Select Image', 'revslider'),
			'arrows' => __('Arrows', 'revslider'),
			'bullets' => __('Bullets', 'revslider'),
			'thumbnails' => __('Thumbnails', 'revslider'),
			'tabs' => __('Tabs', 'revslider'),
			'delete_navigation' => __('Delete this Navigation?', 'revslider'),
			'could_not_update_nav_name' => __('Navigation name could not be updated', 'revslider'),
			'name_too_short_sanitize_3' => __('Name too short, at least 3 letters between a-zA-z needed', 'revslider'),
			'nav_name_already_exists' => __('Navigation name already exists, please choose a different name', 'revslider'),
			'remove_nav_element' => __('Remove current element from Navigation?', 'revslider'),
			'create_this_nav_element' => __('This navigation element does not exist, create one?', 'revslider'),
			'overwrite_animation' => __('Overwrite current animation?', 'revslider'),
			'cant_modify_default_anims' => __('Default animations can\'t be changed', 'revslider'),
			'anim_with_handle_exists' => __('Animation already existing with given handle, please choose a different name.', 'revslider'),
			'really_delete_anim' => __('Really delete animation:', 'revslider'),
			'this_will_reset_navigation' => __('This will reset the navigation, continue?', 'revslider'),
			'preset_name_already_exists' => __('Preset name already exists, please choose a different name', 'revslider'),
			'delete_preset' => __('Really delete this preset?', 'revslider'),
			'update_preset' => __('This will update the preset with the current settings. Proceed?', 'revslider'),
			'maybe_wrong_yt_id' => __('No Thumbnail Image Set on Video / Video Not Found / No Valid Video ID', 'revslider'),
			'preset_not_found' => __('Preset not found', 'revslider'),
			'cover_image_needs_to_be_set' => __('Cover Image need to be set for videos', 'revslider'),
			'remove_this_action' => __('Really remove this action?', 'revslider'),
			'layer_action_by' => __('Layer is triggered by ', 'revslider'),
			'due_to_action' => __(' due to action: ', 'revslider'),
			'layer' => __('layer:', 'revslider'),
			'start_layer_in' => __('Start Layer "in" animation', 'revslider'),
			'start_layer_out' => __('Start Layer "out" animation', 'revslider'),
			'start_video' => __('Start Media', 'revslider'),
			'stop_video' => __('Stop Media', 'revslider'),
			'mute_video' => __('Mute Media', 'revslider'),
			'unmute_video' => __('Unmute Media', 'revslider'),
			'toggle_layer_anim' => __('Toggle Layer Animation', 'revslider'),
			'toggle_video' => __('Toggle Media', 'revslider'),
			'toggle_mute_video' => __('Toggle Mute Media', 'revslider'),
			'toggle_global_mute_video' => __('Toggle Mute All Media', 'revslider'),
			'last_slide' => __('Last Slide', 'revslider'),
			'simulate_click' => __('Simulate Click', 'revslider'),
			'togglefullscreen' => __('Toggle FullScreen', 'revslider'),
			'gofullscreen' => __('Go FullScreen', 'revslider'),
			'exitfullscreen' => __('Exit FullScreen', 'revslider'),
			'toggle_class' => __('Toogle Class', 'revslider'),
			'copy_styles_to_hover_from_idle' => __('Copy hover styles to idle?', 'revslider'),
			'copy_styles_to_idle_from_hover' => __('Copy idle styles to hover?', 'revslider'),
			'select_at_least_one_device_type' => __('Please select at least one device type', 'revslider'),
			'please_select_first_an_existing_style' => __('Please select an existing Style Template', 'revslider'),
			'cant_remove_last_transition' => __('Can not remove last transition!', 'revslider'),
			'name_is_default_animations_cant_be_changed' => __('Given animation name is a default animation. These can not be changed.', 'revslider'),
			'override_animation' => __('Animation exists, override existing animation?', 'revslider'),
			'this_feature_only_if_activated' => __('This feature is only available if you activate Slider Revolution for this installation', 'revslider'),
			'unsaved_data_will_be_lost_proceed' => __('Unsaved data will be lost, proceed?', 'revslider'),
			'delete_user_slide' => __('This will delete this Slide Template, proceed?', 'revslider'),
			'is_loading' => __('is Loading...', 'revslider'),
			'google_fonts_loaded' => __('Google Fonts Loaded', 'revslider'),
			'delete_layer' => __('Delete Layer?', 'revslider'),
			'this_template_requires_version' => __('This template requires at least version', 'revslider'),
			'of_slider_revolution' => __('of Slider Revolution to work.', 'revslider'),
			'slider_revolution_shortcode_creator' => __('Slider Revolution Shortcode Creator', 'revslider'),
			'slider_informations_are_missing' => __('Slider informations are missing!', 'revslider'),
			'shortcode_generator' => __('Shortcode Generator', 'revslider'),
			'please_add_at_least_one_layer' => __('Please add at least one Layer.', 'revslider'),
			'choose_image' => __('Choose Image', 'revslider'),
			'shortcode_parsing_successfull' => __('Shortcode parsing successfull. Items can be found in step 3', 'revslider'),
			'shortcode_could_not_be_correctly_parsed' => __('Shortcode could not be parsed.', 'revslider'),
			'background_video' => __('Background Video', 'revslider'),
			'active_video' => __('Video in Active Slide', 'revslider'),
			'empty_data_retrieved_for_slider' => __('Data could not be fetched for selected Slider', 'revslider'),
			'import_selected_layer' => __('Import Selected Layer?', 'revslider'),
			'import_all_layer_from_actions' => __('Layer Imported! The Layer has actions which include other Layers. Import all connected layers?', 'revslider'),
            'not_available_in_demo' => __('Not available in Demo Mode', 'revslider'),
            'leave_not_saved' => __('By leaving now, all changes since the last saving will be lost. Really leave now?', 'revslider'),
            'static_layers' => __('--- Static Layers ---', 'revslider'),
            'objects_only_available_if_activated' => __('Only available if plugin is activated', 'revslider'),
            'download_install_takes_longer' => __('Download/Install takes longer than usual, please wait', 'revslider'),
            'download_failed_check_server' => __('<div class="import_failure">Download/Install seems to have failed.</div><br>Please check your server <span class="import_failure">download speed</span> and  if the server can programatically connect to <span class="import_failure">http://templates.themepunch.com</span><br><br>', 'revslider'),
            'aborting_import' => __('<b>Aborting Import...</b>', 'revslider'),
            'create_draft' => __('Creating Draft Page...', 'revslider'),
            'draft_created' => __('Draft Page created. Popup will open', 'revslider'),
            'draft_not_created' => __('Draft Page could not be created.', 'revslider'),
            'slider_import_success_reload' => __('Slider import successful', 'revslider'),
            'save_changes' => __('Save Changes?', 'revslider')
		);

		return $lang;
	}

public static function onAddScripts(){
		//global $wp_version;
		
		//$style_pre = '';
		//$style_post = '';
		//if($wp_version < 3.7){
			$style_pre = '<style type="text/css">';
			$style_post = '</style>';
		//}
		//var_dump('sdfsdfsdf');die();
                wp_enqueue_style('color_picker', RS_PLUGIN_URL .'admin/assets/css/color-picker.css', array(), RevSliderGlobals::SLIDER_REVISION);
	        wp_enqueue_style('tp_color_picker', RS_PLUGIN_URL .'public/assets/css/tp-color-picker.css', array(), RevSliderGlobals::SLIDER_REVISION);

             //   wp_enqueue_style('alpha_color_picker', RS_PLUGIN_URL .'admin/assets/css/alpha-color-picker.css', array(), RevSliderGlobals::SLIDER_REVISION);
		
		wp_enqueue_style('edit_layers', RS_PLUGIN_URL .'admin/assets/css/edit_layers.css', array(), RevSliderGlobals::SLIDER_REVISION);
		
		wp_enqueue_script('unite_layers_timeline', RS_PLUGIN_URL .'admin/assets/js/edit_layers_timeline.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('unite_context_menu', RS_PLUGIN_URL .'admin/assets/js/context_menu.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('unite_layers', RS_PLUGIN_URL .'admin/assets/js/edit_layers.js', array('jquery-ui-mouse'), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('unite_css_editor', RS_PLUGIN_URL .'admin/assets/js/css_editor.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('rev_admin', RS_PLUGIN_URL .'admin/assets/js/rev_admin.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('position', RS_PLUGIN_URL .'admin/assets/js/jquery/position.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
		
		wp_enqueue_script('tp-tools', RS_PLUGIN_URL .'public/assets/js/jquery.themepunch.tools.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
                wp_enqueue_script('tp_color_picker_js', RS_PLUGIN_URL .'public/assets/js/tp-color-picker.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
               wp_enqueue_script('tp_iris_picker_js', RS_PLUGIN_URL .'admin/assets/js/iris.min.js', array(), RevSliderGlobals::SLIDER_REVISION );
               
               
               
		//include all media upload scripts
		self::addMediaUploadIncludes();

		//add rs css:
		wp_enqueue_style('rs-plugin-settings', RS_PLUGIN_URL .'public/assets/css/settings.css', array(), RevSliderGlobals::SLIDER_REVISION);
		
		//add icon sets
		wp_enqueue_style('rs-icon-set-fa-icon-', RS_PLUGIN_URL .'public/assets/fonts/font-awesome/css/font-awesome.css', array(), RevSliderGlobals::SLIDER_REVISION);
		wp_enqueue_style('rs-icon-set-pe-7s-', RS_PLUGIN_URL .'public/assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css', array(), RevSliderGlobals::SLIDER_REVISION);
		
//		add_filter('revslider_mod_icon_sets', array('RevSliderBase', 'set_icon_sets'));
		
		$db = new RevSliderDB();

		$styles = $db->fetch(RevSliderGlobals::$table_css);
		$styles = RevSliderCssParser::parseDbArrayToCss($styles, "\n");
		$styles = RevSliderCssParser::compress_css($styles);
		//wp_add_inline_style( 'rs-plugin-settings', $style_pre.$styles.$style_post );

		$custom_css = RevSliderOperations::getStaticCss();
		$custom_css = RevSliderCssParser::compress_css($custom_css);
		//wp_add_inline_style( 'rs-plugin-settings', $style_pre.$custom_css.$style_post );
		
	}
            
        public static function adminPages(){
            
		parent::adminPages();
                
                rev_head(); 
		self::setMasterView('master-view');
		self::requireView(self::$view);
              //  var_dump(self::$admin_scripts);die();
		rev_footer();
	}
        /*

         * Remove Tables

         * 

         * 

         */

        public static function deleteDBTable($tableName) {

            if (!isset(self::$wpdb))
                $wpdb = rev_db_class::rev_db_instance();
            else
                $wpdb = self::$wpdb;
            
            $tableName = $wpdb->prefix . $tableName;

            $sql = "DROP TABLE IF EXISTS {$tableName}";

            $q = $wpdb->query($sql);

            if ($q)
                return true;
        }

        public static function createTable($tableName) {



            $parseCssToDb = false;


            if (!isset(self::$wpdb))
                $wpdb = rev_db_class::rev_db_instance();
            else
                $wpdb = self::$wpdb;



            $tableRealName = $wpdb->prefix . $tableName;

            switch ($tableName) {

                case GlobalsRevSlider::TABLE_ATTACHMENT_IMAGES: 
                    $sql = "CREATE TABLE IF NOT EXISTS {$tableRealName}(

                                                ID INT(10) NOT NULL AUTO_INCREMENT,

                                                file_name VARCHAR(100) NOT NULL, 
                                                subdir VARCHAR(100) NOT NULL,                                                

                                                PRIMARY KEY (ID)

                                            )DEFAULT CHARSET=utf8;"; 
                    break;
                case GlobalsRevSlider::TABLE_REVSLIDER_OPTIONS_NAME: 
                    $sql = "CREATE TABLE IF NOT EXISTS {$tableRealName}(

                                                id INT(10) NOT NULL AUTO_INCREMENT,

                                                name VARCHAR(100) NOT NULL,                                                

                                                value longtext NOT NULL,
                                                
                                                PRIMARY KEY (id)

                                            )DEFAULT CHARSET=utf8;"; 
                    break;


                case GlobalsRevSlider::TABLE_SLIDERS_NAME: 
                    $sql = "CREATE TABLE IF NOT EXISTS {$tableRealName}( 
							  `id` int(11) NOT NULL AUTO_INCREMENT, 
                                                            `title` tinytext NOT NULL,
                                                            `alias` tinytext,
                                                            `params` longtext NOT NULL,
                                                            `settings` text,
                                                            `type` varchar(191) NOT NULL DEFAULT '',
                                                            PRIMARY KEY (`id`)

							)DEFAULT CHARSET=utf8;";

                    break;
                case GlobalsRevSlider::TABLE_STATIC_SLIDES_NAME:
                    $sql = "CREATE TABLE IF NOT EXISTS {$tableRealName}(
								  `id` int(11) NOT NULL AUTO_INCREMENT,
                                                                    `slider_id` int(9) NOT NULL,
                                                                    `params` longtext NOT NULL,
                                                                    `layers` longtext NOT NULL,
                                                                    `settings` text NOT NULL,
                                                                    PRIMARY KEY (`id`)
								)DEFAULT CHARSET=utf8;";
                    break;
                case GlobalsRevSlider::TABLE_SLIDES_NAME:

                    $sql = "CREATE TABLE IF NOT EXISTS {$tableRealName}(

								   `id` int(11) NOT NULL AUTO_INCREMENT,
                                                                    `slider_id` int(9) NOT NULL,
                                                                    `slide_order` int(11) NOT NULL,
                                                                    `params` longtext NOT NULL,
                                                                    `layers` longtext NOT NULL,
                                                                    `settings` text NOT NULL,
                                                                    PRIMARY KEY (`id`)

								)DEFAULT CHARSET=utf8;";

                    break; 
                case GlobalsRevSlider::TABLE_NAVIGATION_NAME:

                    $sql = "CREATE TABLE IF NOT EXISTS {$tableRealName}(

								  `id` int(11) NOT NULL AUTO_INCREMENT,
                                                                    `name` varchar(191) NOT NULL,
                                                                    `handle` varchar(191) NOT NULL,
                                                                    `css` longtext NOT NULL,
                                                                    `markup` longtext NOT NULL,
                                                                    `settings` longtext NOT NULL,
                                                                    PRIMARY KEY (`id`)
								)DEFAULT CHARSET=utf8;";

                    break; 
                case GlobalsRevSlider::TABLE_CSS_NAME:

                    $sql = "CREATE TABLE IF NOT EXISTS {$tableRealName}(
                                        `id` int(11) NOT NULL AUTO_INCREMENT,
                                          `handle` text NOT NULL,
                                          `settings` longtext,
                                          `hover` longtext,
                                          `params` longtext NOT NULL,
                                          `advanced` longtext,
                                          PRIMARY KEY (`id`)

								)DEFAULT CHARSET=utf8;";

                    $parseCssToDb = true;
                  
                    break;

                case GlobalsRevSlider::TABLE_LAYER_ANIMS_NAME:

                    $sql = "CREATE TABLE IF NOT EXISTS " . $tableRealName . " (

								  id int(9) NOT NULL AUTO_INCREMENT,

								  handle TEXT NOT NULL,

								  params longtext NOT NULL,

								  PRIMARY KEY (id)

								)DEFAULT CHARSET=utf8;";

                    break;

                

                default:

                    UniteFunctionsRev::throwError("table: $tableName not found");

                    break;
            }

            $q = $wpdb->query($sql);
            self::sds_caption_css_init($parseCssToDb);
            return $q;
        }

        public static function sds_caption_css_init($parseCssToDb) {

            if ((bool) $parseCssToDb === true) {

                $revOperations = new RevOperations();

                $revOperations->importCaptionsCssContentArray();

                $revOperations->moveOldCaptionsCss();



                $revOperations->updateDynamicCaptions(true);
                return TRUE;
            }
        }

        /**
         * 
         * import slideer handle (not ajax response)
         */
                private static function importSliderHandle($viewBack = null, $updateAnim = true, $updateStatic = true, $updateNavigation = true){

		$slider = new RevSlider();
		$response = $slider->importSliderFromPost($updateAnim, $updateStatic, false, false, false, $updateNavigation);
		
		$sliderID = intval($response["sliderID"]);

		if(empty($viewBack)){
			$viewBack = self::getViewUrl(self::VIEW_SLIDER,"id=".$sliderID);
			if(empty($sliderID))
				$viewBack = self::getViewUrl(self::VIEW_SLIDERS);
		}
		
		//handle error this
		if($response["success"] == false){
			$message = $response["error"];
			RevSliderOperations::import_failed_message($message, $viewBack);
			
		}else{	//handle success, js redirect.
			//check here to create a page or not
			if(!empty($sliderID)){
				$page_id = 0;
				$page_creation = RevSliderFunctions::getPostVariable('page-creation');
				if($page_creation === 'true'){
					$operations = new RevSliderOperations();
					$page_id = $operations->create_slider_page((array)$sliderID);
				}
				if($page_id > 0){
					echo '<script>window.open("'.get_permalink($page_id).'", "_blank");</script>';
				}
			}
			
			echo "<script>
			location.href='".$viewBack."';
			</script>";
		}
		exit();
	}
	
       public static function onAjaxAction(){
		
		$role = self::getMenuRole(); //add additional security check and allow for example import only for admin
		
		$slider = new RevSlider();
		$slide = new RevSlide();
		$operations = new RevSliderOperations();

		$action = self::getPostGetVar("client_action");
                if($action == ""){
                     $action = self::getPostGetVar("action");
                }
                                 $action = cleanString($action);

		$data = self::getPostGetVar("data");
                
                if(!is_array($data) && !is_numeric($data)){
                     $data = json_decode($data,true);
                     $data['session_id'] = sds_get_oc_token();
                     $data = json_encode($data);
                }elseif(!is_numeric($data) && is_array($data)){
                    $data['session_id'] = sds_get_oc_token();
                }
                
		$nonce = self::getPostGetVar("nonce");
                
                
                
		if(empty($nonce))
			$nonce = self::getPostGetVar("rs-nonce");
		
		try{
                
//			
			if(!RevSliderFunctionsWP::isAdminUser() && apply_filters('revslider_restrict_role', true)){
				switch($action){
					case 'change_specific_navigation':
					case 'change_navigations':
					case 'update_static_css':
					case 'add_new_preset':
					case 'update_preset':
					case 'import_slider':
					case 'import_slider_slidersview':
					case 'import_slider_template_slidersview':
					case 'import_slide_template_slidersview':
					case 'import_slider_online_template_slidersview_new':
					case 'fix_database_issues':
						RevSliderFunctions::throwError(__('Function Only Available for Adminstrators', 'revslider'));
						exit;
					break;
					default:
						$return = apply_filters('revslider_admin_onAjaxAction_user_restriction', true, $action, $data, $slider, $slide, $operations);
						if($return !== true){
							RevSliderFunctions::throwError(__('Function Only Available for Adminstrators', 'revslider'));
							exit;
						}
					break;
				}
			}
			
			//verify the nonce
			$isVerified = rev_token_valid($nonce);
                       // $isVerified = true;
			if($isVerified == false){
				RevSliderFunctions::throwError("Wrong request");
				exit;
			}
                                        
			switch($action){
                            case 'install_plugin':
                                $addon_admin = new Rev_addon_Admin('rev_addon', RevSliderGlobals::SLIDER_REVISION);
                                $addon_admin->install_plugin();
                                break;
                             case 'deactivate_plugin':
                                $addon_admin = new Rev_addon_Admin('rev_addon', RevSliderGlobals::SLIDER_REVISION);
                                $addon_admin->deactivate_plugin();
                                break;
                            case 'activate_plugin':
                                $addon_admin = new Rev_addon_Admin('rev_addon', RevSliderGlobals::SLIDER_REVISION);
                                $addon_admin->activate_plugin();
                                break;
				case 'add_new_preset':
					
					if(!isset($data['settings']) || !isset($data['values'])) self::ajaxResponseError(__('Missing values to add preset', 'revslider'), false);
					
					$result = $operations->add_preset_setting($data);
					
					if($result === true){
						
						$presets = $operations->get_preset_settings();
						
						self::ajaxResponseSuccess(__('Preset created', 'revslider'), array('data' => $presets));
					}else{
						self::ajaxResponseError($result, false);
					}
					
					exit;
				break;
				case 'update_preset':
					if(!isset($data['name']) || !isset($data['values'])) self::ajaxResponseError(__('Missing values to update preset', 'revslider'), false);
					
					$result = $operations->update_preset_setting($data);
					
					if($result === true){
						
						$presets = $operations->get_preset_settings();
						
						self::ajaxResponseSuccess(__('Preset created', 'revslider'), array('data' => $presets));
					}else{
						self::ajaxResponseError($result, false);
					}
					
					exit;
				break;
				case 'remove_preset':
					if(!isset($data['name'])) self::ajaxResponseError(__('Missing values to remove preset', 'revslider'), false);
					
					$result = $operations->remove_preset_setting($data);
					
					if($result === true){
						
						$presets = $operations->get_preset_settings();
						
						self::ajaxResponseSuccess(__('Preset deleted', 'revslider'), array('data' => $presets));
					}else{
						self::ajaxResponseError($result, false);
					}
					
					exit;
				break;
				case "export_slider":
                                    
					$sliderID = self::getGetVar("sliderid");
					$dummy = self::getGetVar("dummy");
					$slider->initByID($sliderID);
                                        
					$slider->exportSlider($dummy);
                                        
				break;
				case "import_slider":
                                    
					$updateAnim = self::getPostGetVar("update_animations");
					$updateNav = self::getPostGetVar("update_navigations");
					//$updateStatic = self::getPostGetVar("update_static_captions");
					$updateStatic = 'none';
					self::importSliderHandle(null, $updateAnim, $updateStatic, $updateNav);
				break;
				case "import_slider_slidersview":
                                $version = VERSION;
                     
                                if($version >= "3.0.0.0"){
                                   $token_style = "user_token";

                                }elseif($version == "2.3.0.2"){
                                   $token_style = "token";
                                }
				//	$viewBack = self::getViewUrl(self::VIEW_SLIDERS);
                                        $viewBack = rev_site_admin_url().'?route=extension/module/revslideropencart&'.$token_style.'='.sds_get_oc_token();
					$updateAnim = self::getPostGetVar("update_animations");
					$updateNav = self::getPostGetVar("update_navigations");
					//$updateStatic = self::getPostGetVar("update_static_captions");
					$updateStatic = 'none';
					self::importSliderHandle($viewBack, $updateAnim, $updateStatic, $updateNav);
				break;
				case "import_slider_online_template_slidersview":
					$viewBack = self::getViewUrl(self::VIEW_SLIDERS);
					//ob_start();
					$data['uid'] = RevSliderFunctions::getPostVariable('uid');
					$data['page-creation'] = RevSliderFunctions::getPostVariable('page-creation');
					$data['package'] = RevSliderFunctions::getPostVariable('package');
					
					self::importSliderOnlineTemplateHandle($data, $viewBack, 'true', 'none');
					/*$html = ob_get_contents();
					ob_clean();
					ob_end_clean();
					
					self::ajaxResponseData($html);*/
				break;
				case "import_slider_template_slidersview":
					$viewBack = self::getViewUrl(self::VIEW_SLIDERS);
					$updateAnim = self::getPostGetVar("update_animations");
					//$updateStatic = self::getPostGetVar("update_static_captions");
					$updateStatic = 'none';
					self::importSliderTemplateHandle($viewBack, $updateAnim, $updateStatic);
				break;
				case "import_slider_online_template_slidersview_new":
					$viewBack = self::getViewUrl(self::VIEW_SLIDERS);
					$response = self::importSliderOnlineTemplateHandleNew($data, $viewBack, 'true', 'none');
					self::ajaxResponseData($response);
				break;
				case 'create_draft_page':
					$response = array('open' => false);
					
					$page_id = $operations->create_slider_page($data['slider_ids']);
					if($page_id > 0){
						$response['open'] = get_permalink($page_id);
					}
					self::ajaxResponseData($response);
				break;
				case "import_slide_online_template_slidersview":
					$redirect_id = self::getPostGetVar("redirect_id");
					$viewBack = self::getViewUrl(self::VIEW_SLIDE,"id=$redirect_id");
					$slidenum = intval(self::getPostGetVar("slidenum"));
					$sliderid = intval(self::getPostGetVar("slider_id"));
					if(!is_array($data)){
                                            $data = json_decode($data,true);
                                        }
					$data['uid'] = RevSliderFunctions::getPostVariable('uid');
					$data['page-creation'] = RevSliderFunctions::getPostVariable('page-creation');
					$data['package'] = RevSliderFunctions::getPostVariable('package');
					
					self::importSliderOnlineTemplateHandle($data, $viewBack, 'true', 'none', array('slider_id' => $sliderid, 'slide_id' => $slidenum));
				break;
				case "import_slide_template_slidersview":
					$redirect_id = self::getPostGetVar("redirect_id");
					$viewBack = self::getViewUrl(self::VIEW_SLIDE,"id=$redirect_id");
					$updateAnim = self::getPostGetVar("update_animations");
					//$updateStatic = self::getPostGetVar("update_static_captions");
					$updateStatic = 'none';
					$slidenum = intval(self::getPostGetVar("slidenum"));
					$sliderid = intval(self::getPostGetVar("slider_id"));
					
					self::importSliderTemplateHandle($viewBack, $updateAnim, $updateStatic, array('slider_id' => $sliderid, 'slide_id' => $slidenum));
				break;
				case "create_slider":
					$data = $operations->modifyCustomSliderParams($data);
					$newSliderID = $slider->createSliderFromOptions($data);
					self::ajaxResponseSuccessRedirect(__("Slider created",'revslider'), self::getViewUrl(self::VIEW_SLIDE, 'id=new&slider='.$newSliderID)); //redirect to slide now

				break;
				case "update_slider":
					$data = $operations->modifyCustomSliderParams($data);
					$slider->updateSliderFromOptions($data);
					self::ajaxResponseSuccess(__("Slider updated",'revslider'));
				break;
				case "delete_slider":
				case "delete_slider_stay":

					$isDeleted = $slider->deleteSliderFromData($data);

					if(is_array($isDeleted)){
						$isDeleted = implode(', ', $isDeleted);
						self::ajaxResponseError(__("Template can't be deleted, it is still being used by the following Sliders: ", 'revslider').$isDeleted);
					}else{
						if($action == 'delete_slider_stay'){
							self::ajaxResponseSuccess(__("Slider deleted",'revslider'));
						}else{
							self::ajaxResponseSuccessRedirect(__("Slider deleted",'revslider'), self::getViewUrl(self::VIEW_SLIDERS));
						}
					}
				break;
				case "duplicate_slider":

					$slider->duplicateSliderFromData($data);

					self::ajaxResponseSuccessRedirect(__("Success! Refreshing page...",'revslider'), self::getViewUrl(self::VIEW_SLIDERS));
				break;
				case "duplicate_slider_package":

					$ret = $slider->duplicateSliderPackageFromData($data);
					
					if($ret !== true){
						RevSliderFunctions::throwError($ret);
					}else{
						self::ajaxResponseSuccessRedirect(__("Success! Refreshing page...",'revslider'), self::getViewUrl(self::VIEW_SLIDERS));
					}
				break;
				case "add_slide":
				case "add_bulk_slide":
					$numSlides = $slider->createSlideFromData($data);
					$sliderID = $data["sliderid"];

					if($numSlides == 1){
						$responseText = __("Slide Created",'revslider');
					}else{
						$responseText = $numSlides . " ".__("Slides Created",'revslider');
					}

					$urlRedirect = self::getViewUrl(self::VIEW_SLIDE,"id=new&slider=$sliderID");
					self::ajaxResponseSuccessRedirect($responseText,$urlRedirect);

				break;
				case "add_slide_fromslideview":
					$slideID = $slider->createSlideFromData($data,true);
					$urlRedirect = self::getViewUrl(self::VIEW_SLIDE,"id=$slideID");
					$responseText = __("Slide Created, redirecting...",'revslider');
					self::ajaxResponseSuccessRedirect($responseText,$urlRedirect);
				break;
				case 'copy_slide_to_slider':
					$slideID = (isset($data['redirect_id'])) ? $data['redirect_id'] : -1;
					
					if($slideID === -1) RevSliderFunctions::throwError(__('Missing redirect ID!', 'revslider'));
					
					$return = $slider->copySlideToSlider($data);
					
					if($return !== true) RevSliderFunctions::throwError($return);
					
					$urlRedirect = self::getViewUrl(self::VIEW_SLIDE,"id=$slideID");
					$responseText = __("Slide copied to current Slider, redirecting...",'revslider');
					self::ajaxResponseSuccessRedirect($responseText,$urlRedirect);
				break;
				case 'update_slide':
                               //     var_dump($data);die('goman');
                                   // unset($data['params']['lang']);
					if(isset($data['obj_favorites'])){
						$obj_favorites = $data['obj_favorites'];
						unset($data['obj_favorites']);
						//save object favourites
						$objlib = new RevSliderObjectLibrary();
						$objlib->save_favorites($obj_favorites);
					}
					$slide->updateSlideFromData($data);
					self::ajaxResponseSuccess(__("Slide updated",'revslider'));
				break;
				case "update_static_slide":
					if(isset($data['obj_favorites'])){
						$obj_favorites = $data['obj_favorites'];
						unset($data['obj_favorites']);
						//save object favourites
						$objlib = new RevSliderObjectLibrary();
						$objlib->save_favorites($obj_favorites);
					}
					$slide->updateStaticSlideFromData($data);
					self::ajaxResponseSuccess(__("Static Global Layers updated",'revslider'));
				break;
				case "delete_slide":
				case "delete_slide_stay":
					$isPost = $slide->deleteSlideFromData($data);
					if($isPost)
						$message = __("Post deleted",'revslider');
					else
						$message = __("Slide deleted",'revslider');

					$sliderID = RevSliderFunctions::getVal($data, "sliderID");
					if($action == 'delete_slide_stay'){
						self::ajaxResponseSuccess($message);
					}else{
						self::ajaxResponseSuccessRedirect($message, self::getViewUrl(self::VIEW_SLIDE,"id=new&slider=$sliderID"));
					}
				break;
				case "duplicate_slide":
				case "duplicate_slide_stay":
					$return = $slider->duplicateSlideFromData($data);
					if($action == 'duplicate_slide_stay'){
						self::ajaxResponseSuccess(__("Slide duplicated",'revslider'), array('id' => $return[1]));
					}else{
						self::ajaxResponseSuccessRedirect(__("Slide duplicated",'revslider'), self::getViewUrl(self::VIEW_SLIDE,"id=new&slider=".$return[0]));
					}
				break;
				case "copy_move_slide":
				case "copy_move_slide_stay":
					$sliderID = $slider->copyMoveSlideFromData($data);
					if($action == 'copy_move_slide_stay'){
						self::ajaxResponseSuccess(__("Success!",'revslider'));
					}else{
						self::ajaxResponseSuccessRedirect(__("Success! Refreshing page...",'revslider'), self::getViewUrl(self::VIEW_SLIDE,"id=new&slider=$sliderID"));
					}
				break;
				case "add_slide_to_template":
					$template = new RevSliderTemplate();
					if(!isset($data['slideID']) || intval($data['slideID']) == 0){
						RevSliderFunctions::throwError(__('No valid Slide ID given', 'revslider'));
						exit;
					}
					if(!isset($data['title']) || strlen(trim($data['title'])) < 3){
						RevSliderFunctions::throwError(__('No valid title given', 'revslider'));
						exit;
					}
					if(!isset($data['settings']) || !isset($data['settings']['width']) || !isset($data['settings']['height'])){
						RevSliderFunctions::throwError(__('No valid title given', 'revslider'));
						exit;
					}
					
					$return = $template->copySlideToTemplates($data['slideID'], $data['title'], $data['settings']);
					
					if($return == false){
						RevSliderFunctions::throwError(__('Could not save Slide as Template', 'revslider'));
						exit;
					}
					
					//get HTML for template section
					ob_start();
					
					$rs_disable_template_script = true; //disable the script output of template selector file
					
					include(RS_PLUGIN_PATH.'admin/views/templates/template-selector.php');
					
					$html = ob_get_contents();
					
					ob_clean();
					ob_end_clean();
					
					self::ajaxResponseSuccess(__('Slide added to Templates', 'revslider'),array('HTML' => $html));
					exit;
				break;
				case "get_slider_custom_css_js":
					$slider_css = '';
					$slider_js = '';
					if(isset($data['slider_id']) && intval($data['slider_id']) > 0){
						$slider->initByID(intval($data['slider_id']));
						$slider_css = stripslashes($slider->getParam('custom_css', ''));
						$slider_js = stripslashes($slider->getParam('custom_javascript', ''));
					}
					self::ajaxResponseData(array('css' => $slider_css, 'js' => $slider_js));
				break;
				case "update_slider_custom_css_js":
					if(isset($data['slider_id']) && intval($data['slider_id']) > 0){
						$slider->initByID(intval($data['slider_id']));
						$slider->updateParam(array('custom_css' => $data['css']));
						$slider->updateParam(array('custom_javascript' => $data['js']));
					}
					self::ajaxResponseSuccess(__('Slider CSS saved', 'revslider'));
					exit;
				break;
				case "get_static_css":
					$contentCSS = $operations->getStaticCss();
					self::ajaxResponseData($contentCSS);
				break;
				case "get_dynamic_css":
					$contentCSS = $operations->getDynamicCss();
					self::ajaxResponseData($contentCSS);
				break;
				case "insert_captions_css":
					
					$arrCaptions = $operations->insertCaptionsContentData($data);
					
					if($arrCaptions !== false){
						$db = new RevSliderDB();
						$styles = $db->fetch(RevSliderGlobals::$table_css);
						$styles = RevSliderCssParser::parseDbArrayToCss($styles, "\n");
						$styles = RevSliderCssParser::compress_css($styles);
						$custom_css = RevSliderOperations::getStaticCss();
						$custom_css = RevSliderCssParser::compress_css($custom_css);
						
						$arrCSS = $operations->getCaptionsContentArray();
						$arrCssStyles = RevSliderFunctions::jsonEncodeForClientSide($arrCSS);
						$arrCssStyles = $arrCSS;
						
						self::ajaxResponseSuccess(__("CSS saved",'revslider'),array("arrCaptions"=>$arrCaptions,'compressed_css'=>$styles.$custom_css,'initstyles'=>$arrCssStyles));
					}
					
					RevSliderFunctions::throwError(__('CSS could not be saved', 'revslider'));
					exit();
				break;
				case "update_captions_css":
					
					$arrCaptions = $operations->updateCaptionsContentData($data);
					
					if($arrCaptions !== false){
						$db = new RevSliderDB();
						$styles = $db->fetch(RevSliderGlobals::$table_css);
						$styles = RevSliderCssParser::parseDbArrayToCss($styles, "\n");
						$styles = RevSliderCssParser::compress_css($styles);
						$custom_css = RevSliderOperations::getStaticCss();
						$custom_css = RevSliderCssParser::compress_css($custom_css);
						
						$arrCSS = $operations->getCaptionsContentArray();
						$arrCssStyles = RevSliderFunctions::jsonEncodeForClientSide($arrCSS);
						$arrCssStyles = $arrCSS;
						
						self::ajaxResponseSuccess(__("CSS saved",'revslider'),array("arrCaptions"=>$arrCaptions,'compressed_css'=>$styles.$custom_css,'initstyles'=>$arrCssStyles));
					}
					
					RevSliderFunctions::throwError(__('CSS could not be saved', 'revslider'));
					exit();
				break;
				case "update_captions_advanced_css":
					
					$arrCaptions = $operations->updateAdvancedCssData($data);
					if($arrCaptions !== false){
						$db = new RevSliderDB();
						$styles = $db->fetch(RevSliderGlobals::$table_css);
						$styles = RevSliderCssParser::parseDbArrayToCss($styles, "\n");
						$styles = RevSliderCssParser::compress_css($styles);
						$custom_css = RevSliderOperations::getStaticCss();
						$custom_css = RevSliderCssParser::compress_css($custom_css);
						
						$arrCSS = $operations->getCaptionsContentArray();
						$arrCssStyles = RevSliderFunctions::jsonEncodeForClientSide($arrCSS);
						$arrCssStyles = $arrCSS;
						
						self::ajaxResponseSuccess(__("CSS saved",'revslider'),array("arrCaptions"=>$arrCaptions,'compressed_css'=>$styles.$custom_css,'initstyles'=>$arrCssStyles));
					}
					
					RevSliderFunctions::throwError(__('CSS could not be saved', 'revslider'));
					exit();
				break;
				case "rename_captions_css":
					//rename all captions in all sliders with new handle if success
					$arrCaptions = $operations->renameCaption($data);
					
					$db = new RevSliderDB();
					$styles = $db->fetch(RevSliderGlobals::$table_css);
					$styles = RevSliderCssParser::parseDbArrayToCss($styles, "\n");
					$styles = RevSliderCssParser::compress_css($styles);
					$custom_css = RevSliderOperations::getStaticCss();
					$custom_css = RevSliderCssParser::compress_css($custom_css);
					
					$arrCSS = $operations->getCaptionsContentArray();
					$arrCssStyles = RevSliderFunctions::jsonEncodeForClientSide($arrCSS);
					$arrCssStyles = $arrCSS;
					
					self::ajaxResponseSuccess(__("Class name renamed",'revslider'),array("arrCaptions"=>$arrCaptions,'compressed_css'=>$styles.$custom_css,'initstyles'=>$arrCssStyles));
				break;
				case "delete_captions_css":
					$arrCaptions = $operations->deleteCaptionsContentData($data);
					
					$db = new RevSliderDB();
					$styles = $db->fetch(RevSliderGlobals::$table_css);
					$styles = RevSliderCssParser::parseDbArrayToCss($styles, "\n");
					$styles = RevSliderCssParser::compress_css($styles);
					$custom_css = RevSliderOperations::getStaticCss();
					$custom_css = RevSliderCssParser::compress_css($custom_css);
					
					$arrCSS = $operations->getCaptionsContentArray();
					$arrCssStyles = RevSliderFunctions::jsonEncodeForClientSide($arrCSS);
					$arrCssStyles = $arrCSS;
					
					self::ajaxResponseSuccess(__("Style deleted!",'revslider'),array("arrCaptions"=>$arrCaptions,'compressed_css'=>$styles.$custom_css,'initstyles'=>$arrCssStyles));
				break;
				case "update_static_css":
					$data = ''; //do not allow to add new global CSS anymore, instead, remove all!
					$staticCss = $operations->updateStaticCss($data);
					
					$db = new RevSliderDB();
					$styles = $db->fetch(RevSliderGlobals::$table_css);
					$styles = RevSliderCssParser::parseDbArrayToCss($styles, "\n");
					$styles = RevSliderCssParser::compress_css($styles);
					$custom_css = RevSliderOperations::getStaticCss();
					$custom_css = RevSliderCssParser::compress_css($custom_css);
					
					self::ajaxResponseSuccess(__("CSS saved",'revslider'),array("css"=>$staticCss,'compressed_css'=>$styles.$custom_css));
				break;
				case "insert_custom_anim":
					$arrAnims = $operations->insertCustomAnim($data); //$arrCaptions =
					self::ajaxResponseSuccess(__("Animation saved",'revslider'), $arrAnims); //,array("arrCaptions"=>$arrCaptions)
				break;
				case "update_custom_anim":
					$arrAnims = $operations->updateCustomAnim($data);
					self::ajaxResponseSuccess(__("Animation saved",'revslider'), $arrAnims); //,array("arrCaptions"=>$arrCaptions)
				break;
				case "update_custom_anim_name":
					$arrAnims = $operations->updateCustomAnimName($data);
					self::ajaxResponseSuccess(__("Animation saved",'revslider'), $arrAnims); //,array("arrCaptions"=>$arrCaptions)
				break;
				case "delete_custom_anim":
					$arrAnims = $operations->deleteCustomAnim($data);
					self::ajaxResponseSuccess(__("Animation deleted",'revslider'), $arrAnims); //,array("arrCaptions"=>$arrCaptions)
				break;
				case "update_slides_order":
					$slider->updateSlidesOrderFromData($data);
					self::ajaxResponseSuccess(__("Order updated",'revslider'));
				break;
				case "change_slide_title":
					$slide->updateTitleByID($data);
					self::ajaxResponseSuccess(__('Title updated','revslider'));
				break;
				case "change_slide_image":
					$slide->updateSlideImageFromData($data);
					$sliderID = RevSliderFunctions::getVal($data, "slider_id");
					self::ajaxResponseSuccessRedirect(__("Slide changed",'revslider'), self::getViewUrl(self::VIEW_SLIDE,"id=new&slider=$sliderID"));
				break;
				case "preview_slide":
                                 
					$operations->putSlidePreviewByData($data);
					exit;
				break;
				case "preview_slider":
					$sliderID = RevSliderFunctions::getPostGetVariable("sliderid");
					$do_markup = RevSliderFunctions::getPostGetVariable("only_markup");

					if($do_markup == 'true')
						$operations->previewOutputMarkup($sliderID);
					else
						$operations->previewOutput($sliderID);
					
					exit;
				break;
				case "get_import_slides_data":
					$slides = array();
					if(!is_array($data)){
						$slider->initByID(intval($data));
						
						$full_slides = $slider->getSlides(); //static slide is missing
						
						if(!empty($full_slides)){
							foreach($full_slides as $slide_id => $mslide){
								$slides[$slide_id]['layers'] = $mslide->getLayers();
								foreach($slides[$slide_id]['layers'] as $k => $l){ //remove columns as they can not be imported
									if(isset($l['type']) && ($l['type'] == 'column' || $l['type'] == 'row' || $l['type'] == 'group')) unset($slides[$slide_id]['layers'][$k]);
								}
								$slides[$slide_id]['params'] = $mslide->getParams();
							}
						}
						
						$staticID = $slide->getStaticSlideID($slider->getID());
						if($staticID !== false){
							$msl = new RevSliderSlide();
							if(strpos($staticID, 'static_') === false){
								$staticID = 'static_'.$slider->getID();
							}
							$msl->initByID($staticID);
							if($msl->getID() !== ''){
								$slides[$msl->getID()]['layers'] = $msl->getLayers();
								foreach($slides[$msl->getID()]['layers'] as $k => $l){ //remove columns as they can not be imported
									if(isset($l['type']) && ($l['type'] == 'column' || $l['type'] == 'row' || $l['type'] == 'group')) unset($slides[$msl->getID()]['layers'][$k]);
								}
								$slides[$msl->getID()]['params'] = $msl->getParams();
								$slides[$msl->getID()]['params']['title'] = __('Static Slide', 'revslider');
							}
						}
					}
					if(!empty($slides)){
						self::ajaxResponseData(array('slides' => $slides));
					}else{
						self::ajaxResponseData('');
					}
				break;
				case "create_navigation_preset":
					$nav = new RevSliderNavigation();
					
					$return = $nav->add_preset($data);
					
					if($return === true){
						self::ajaxResponseSuccess(__('Navigation preset saved/updated', 'revslider'), array('navs' => $nav->get_all_navigations()));
					}else{
						if($return === false) $return = __('Preset could not be saved/values are the same', 'revslider');
						self::ajaxResponseError($return);
					}
				break;
				case "delete_navigation_preset":
					$nav = new RevSliderNavigation();
					
					$return = $nav->delete_preset($data);
					
					if($return){
						self::ajaxResponseSuccess(__('Navigation preset deleted', 'revslider'), array('navs' => $nav->get_all_navigations()));
					}else{
						if($return === false) $return = __('Preset not found', 'revslider');
						self::ajaxResponseError($return);
					}
				break;
				case "toggle_slide_state":
					$currentState = $slide->toggleSlideStatFromData($data);
					self::ajaxResponseData(array("state"=>$currentState));
				break;
				case "toggle_hero_slide":
					$currentHero = $slider->setHeroSlide($data);
					self::ajaxResponseSuccess(__('Slide is now the new active Hero Slide', 'revslider'));
				break;
				case "slide_lang_operation":
					$responseData = $slide->doSlideLangOperation($data);
					self::ajaxResponseData($responseData);
				break;
				case "update_general_settings":
					$operations->updateGeneralSettings($data);
					self::ajaxResponseSuccess(__("General settings updated",'revslider'));
				break;
				case "fix_database_issues":
					update_option('revslider_change_database', true);
					RevSliderFront::createDBTables();
					
					self::ajaxResponseSuccess(__('Database structure creation/update done','revslider'));
				break;
				case "update_posts_sortby":
					$slider->updatePostsSortbyFromData($data);
					self::ajaxResponseSuccess(__("Sortby updated",'revslider'));
				break;
				case "replace_image_urls":
					$slider->replaceImageUrlsFromData($data);
					self::ajaxResponseSuccess(__("All Urls replaced",'revslider'));
				break;
				case "reset_slide_settings":
					$slider->resetSlideSettings($data);
					self::ajaxResponseSuccess(__("Settings in all Slides changed",'revslider'));
				break;
				case "delete_template_slide":
				
					$slideID = (isset($data['slide_id'])) ? $data['slide_id'] : -1;
					
					if($slideID === -1) RevSliderFunctions::throwError(__('Missing Slide ID!', 'revslider'));
					
					$slide->initByID($slideID);
					$slide->deleteSlide();
					
					$responseText = __("Slide deleted",'revslider');
					self::ajaxResponseSuccess($responseText);
				break;
				case "activate_purchase_code":
					$result = false;
					if(!empty($data['code'])){ // && !empty($data['email'])
						$result = $operations->checkPurchaseVerification($data);
					}else{
						RevSliderFunctions::throwError(__('The Purchase Code and the E-Mail address need to be set!', 'revslider'));
						exit();
					}

					if($result === true){
						self::ajaxResponseSuccessRedirect(__("Purchase Code Successfully Activated",'revslider'), self::getViewUrl(self::VIEW_SLIDERS));
					}elseif($result === false){
						RevSliderFunctions::throwError(__('Purchase Code is invalid', 'revslider'));
					}else{
						if($result == 'temp'){
							self::ajaxResponseSuccessRedirect(__("Purchase Code Temporary Activated",'revslider'), self::getViewUrl(self::VIEW_SLIDERS));
						}
						if($result == 'exist'){
							self::ajaxResponseData(array('error'=>$result,'msg'=> __('Purchase Code already registered!', 'revslider')));
						}
						/*elseif($result == 'bad_email'){
							RevSliderFunctions::throwError(__('Please add an valid E-Mail Address', 'revslider'));
						}elseif($result == 'email_used'){
							RevSliderFunctions::throwError(__('E-Mail already in use, please choose a different E-Mail', 'revslider'));
						}*/
						RevSliderFunctions::throwError(__('Purchase Code could not be validated', 'revslider'));
					}
				break;
				case "deactivate_purchase_code":
					$result = $operations->doPurchaseDeactivation($data);

					if($result){
						self::ajaxResponseSuccessRedirect(__("Successfully removed validation",'revslider'), self::getViewUrl(self::VIEW_SLIDERS));
					}else{
						RevSliderFunctions::throwError(__('Could not remove Validation!', 'revslider'));
					}
				break;
				case 'dismiss_notice':
					update_option('revslider-valid-notice', 'false');
					self::ajaxResponseSuccess(__(".",'revslider'));
				break;
				case 'dismiss_dynamic_notice':
					if(trim($data['id']) == 'DISCARD'){
						update_option('revslider-deact-notice', false);
					}elseif(trim($data['id']) == 'DISCARDTEMPACT'){
						update_option('revslider-temp-active-notice', 'false');
					}else{
						$notices_discarded = get_option('revslider-notices-dc', array());
						$notices_discarded[] = trim($data['id']);
						update_option('revslider-notices-dc', $notices_discarded);
					}
					
					self::ajaxResponseSuccess(__(".",'revslider'));
				break;
				case 'toggle_favorite':
					if(isset($data['id']) && intval($data['id']) > 0){
						$return = self::toggle_favorite_by_id($data['id']);
						if($return === true){
							self::ajaxResponseSuccess(__('Setting Changed!', 'revslider'));
						}else{
							$error = $return;
						}	
					}else{
						$error = __('No ID given', 'revslider');
					}
					self::ajaxResponseError($error);
				break;
				case "subscribe_to_newsletter":
					if(isset($data['email']) && !empty($data['email'])){
						$return = ThemePunch_Newsletter::subscribe($data['email']);
						
						if($return !== false){
							if(!isset($return['status']) || $return['status'] === 'error'){
								$error = (isset($return['message']) && !empty($return['message'])) ? $return['message'] : __('Invalid Email', 'revslider');
								self::ajaxResponseError($error);
							}else{
								self::ajaxResponseSuccess(__("Success! Please check your Emails to finish the subscription", 'revslider'), $return);
							}
						}else{
							self::ajaxResponseError(__('Invalid Email/Could not connect to the Newsletter server', 'revslider'));
						}	
					}else{
						self::ajaxResponseError(__('No Email given', 'revslider'));
					}
				break;
				case "unsubscribe_to_newsletter":
					if(isset($data['email']) && !empty($data['email'])){
						$return = ThemePunch_Newsletter::unsubscribe($data['email']);
						
						if($return !== false){
							if(!isset($return['status']) || $return['status'] === 'error'){
								$error = (isset($return['message']) && !empty($return['message'])) ? $return['message'] : __('Invalid Email', 'revslider');
								self::ajaxResponseError($error);
							}else{
								self::ajaxResponseSuccess(__("Success! Please check your Emails to finish the process", 'revslider'), $return);
							}
						}else{
							self::ajaxResponseError(__('Invalid Email/Could not connect to the Newsletter server', 'revslider'));
						}	
					}else{
						self::ajaxResponseError(__('No Email given', 'revslider'));
					}
				break;
				case 'change_specific_navigation':
					$nav = new RevSliderNavigation();
					
					$found = false;
					$navigations = $nav->get_all_navigations();
					foreach($navigations as $navig){
						if($data['id'] == $navig['id']){
							$found = true;
							break;
						}
					}
					if($found){
						$nav->create_update_navigation($data, $data['id']);
					}else{
						$nav->create_update_navigation($data);
					}
					
					self::ajaxResponseSuccess(__('Navigation saved/updated', 'revslider'), array('navs' => $nav->get_all_navigations()));
					
				break;
				case 'change_navigations':
					$nav = new RevSliderNavigation();
					
					$nav->create_update_full_navigation($data);
					
					self::ajaxResponseSuccess(__('Navigations updated', 'revslider'), array('navs' => $nav->get_all_navigations()));
				break;
				case 'delete_navigation':
					$nav = new RevSliderNavigation();
					
					if(isset($data) && intval($data) > 0){
						$return = $nav->delete_navigation($data);
						
						if($return !== true){
							self::ajaxResponseError($return);
						}else{
							self::ajaxResponseSuccess(__('Navigation deleted', 'revslider'), array('navs' => $nav->get_all_navigations()));
						}
					}
					
					self::ajaxResponseError(__('Wrong ID given', 'revslider'));
				break;
				case "get_facebook_photosets":
					if(!empty($data['url'])){
						$facebook = new RevSliderFacebook();
						$return = $facebook->get_photo_set_photos_options($data['url'],$data['album'],$data['app_id'],$data['app_secret']);
						if(!empty($return)){
							self::ajaxResponseSuccess(__('Successfully fetched Facebook albums', 'revslider'), array('html'=>implode(' ', $return)));
						}
						else{
							$error = __('Could not fetch Facebook albums', 'revslider');
							self::ajaxResponseError($error);	
						}
					}
					else {
						self::ajaxResponseSuccess(__('Cleared Albums', 'revslider'), array('html'=>implode(' ', $return)));
					}
				break;
				case "get_flickr_photosets":
					if(!empty($data['url']) && !empty($data['key'])){
						$flickr = new RevSliderFlickr($data['key']);
						$user_id = $flickr->get_user_from_url($data['url']);
						$return = $flickr->get_photo_sets($user_id,$data['count'],$data['set']);
						if(!empty($return)){
							self::ajaxResponseSuccess(__('Successfully fetched flickr photosets', 'revslider'), array("data"=>array('html'=>implode(' ', $return))));
						}
						else{
							$error = __('Could not fetch flickr photosets', 'revslider');
							self::ajaxResponseError($error);
						}
					}
					else {
						if(empty($data['url']) && empty($data['key'])){
							self::ajaxResponseSuccess(__('Cleared Photosets', 'revslider'), array('html'=>implode(' ', $return)));
						}
						elseif(empty($data['url'])){
							$error = __('No User URL - Could not fetch flickr photosets', 'revslider');
							self::ajaxResponseError($error);
						}
						else{
							$error = __('No API KEY - Could not fetch flickr photosets', 'revslider');
							self::ajaxResponseError($error);
						}
					}
				break;
				case "get_youtube_playlists":
					if(!empty($data['id'])){
						$youtube = new RevSliderYoutube(trim($data['api']),trim($data['id']));
						$return = $youtube->get_playlist_options($data['playlist']);
						self::ajaxResponseSuccess(__('Successfully fetched YouTube playlists', 'revslider'), array("data"=>array('html'=>implode(' ', $return))));
					}
					else {
						$error = __('Could not fetch YouTube playlists', 'revslider');
						self::ajaxResponseError($error);
					}
				break;
				case 'rs_get_store_information': 
					global $wp_version;
					
					$code = get_option('revslider-code', '');
					$shop_version = RevSliderTemplate::SHOP_VERSION;
					
					$validated = get_option('revslider-valid', 'false');
					if($validated == 'false'){
						$api_key = '';
						$username = '';
						$code = '';
					}
					
					$rattr = array(
						'code' => urlencode($code),
						'product' => urlencode('revslider-opencart'),
						'shop_version' => urlencode($shop_version),
						'version' => urlencode(RevSliderGlobals::SLIDER_REVISION)
					);
					
					$request = wp_remote_post('http://templates.themepunch.tools/revslider/store.php', array(
						'user-agent' => 'Opencart/'.$wp_version.'; '.get_bloginfo('url'),
						'body' => $rattr
					));
					
					$response = '';
					
					if(!is_wp_error($request)) {
						$response = json_decode(@$request['body'], true);
					}
					
					self::ajaxResponseData(array("data"=>$response));
				break;
				case 'load_library_object': 
					$obj_library = new RevSliderObjectLibrary();
					
					$thumbhandle = $data['handle'];
					$type = $data['type'];
					if($type == 'thumb'){
						$thumb = $obj_library->_get_object_thumb($thumbhandle, 'thumb');
					}elseif($type == 'orig'){
						$thumb = $obj_library->_get_object_thumb($thumbhandle, 'original');
					}
                            
					if($thumb['error']){
						self::ajaxResponseError(__('Object could not be loaded', 'revslider'));
					}else{
						self::ajaxResponseData(array('url'=> $thumb['url'], 'width' => $thumb['width'], 'height' => $thumb['height']));
					}
				break;
				case 'load_template_store_sliders': 
					$tmpl = new RevSliderTemplate();

					$tp_template_slider = $tmpl->getThemePunchTemplateSliders();
					//var_dump($tp_template_slider);die('no way no way');
					ob_start();
					$tmpl->create_html_sliders($tp_template_slider);
                                        
					$html = ob_get_contents();
					ob_clean();
					ob_end_clean();
					
					self::ajaxResponseData(array('html'=> $html));
					
				break;
				case 'load_template_store_slides': 
					$tmpl = new RevSliderTemplate();

					$templates = $tmpl->getTemplateSlides();
                                      //  die();
					$tp_template_slider = $tmpl->getThemePunchTemplateSliders();

					$tmp_slider = new RevSlider();
					$all_slider = apply_filters('revslider_slide_templates', $tmp_slider->getArrSliders());
					
					ob_start();
					$tmpl->create_html_slides($tp_template_slider, $all_slider, $templates);
					$html = ob_get_contents();
					ob_clean();
					ob_end_clean();
					
					self::ajaxResponseData(array('html'=> $html));
					
				break;
				case 'load_object_library': 
					$html = '';
					$obj = new RevSliderObjectLibrary();
					$mdata = $obj->retrieve_all_object_data();
                            
					self::ajaxResponseData(array('data'=> $mdata));
				break;
				case 'slide_editor_sticky_menu':
					if(isset($data['set_sticky']) && $data['set_sticky'] == 'true'){
						update_option('revslider_slide_editor_sticky', 'true');
					}else{
						update_option('revslider_slide_editor_sticky', 'false');
					}
					self::ajaxResponseData(array());
				break;
                                case 'save_color_preset':
                                        if(!isset($data['presets'])){
                                            $presets = "";
                                        }else{ 
					$presets = TPColorpicker::save_color_presets($data['presets']);
                                        }
					self::ajaxResponseData(array('presets' => $presets));
					
				break;
				default:
                                    
					$return = apply_filters('revslider_admin_onAjaxAction_switch', false, $action, $data, $slider, $slide, $operations);
					if($return === false)
						self::ajaxResponseError("wrong ajax action: ".$action);
					
					exit;
				break;
			}
			
			
			$role = self::getMenuRole(); //add additional security check and allow for example import only for admin
		}
		catch(Exception $e){

			$message = $e->getMessage();
			if($action == "preview_slide" || $action == "preview_slider"){
				echo $message;
				exit();
			}

			self::ajaxResponseError($message);
		}

		//it's an ajax action, so exit
		self::ajaxResponseError("No response output on $action action. please check with the developer.");
		exit();
	}
	private static function importSliderOnlineTemplateHandleNew($data, $viewBack = null, $updateAnim = true, $updateStatic = true, $single_slide = false){
		
		$return = array('error' => array(), 'success' => array(), 'open' => false, 'view' => $viewBack);
		
		$uid = $data['uid'];
		
		$added = array();
		
		if($uid == ''){
			$return['error'][] = __("ID missing, something went wrong. Please try again!", 'revslider');
		}else{
			$tmp = new RevSliderTemplate();
			
			$package=false;
                        if(isset($data['package'])){
                            $package = $data['package'];
                        }
			$package = ($package == 'true') ? true : false;
			
			//get all in the same package as the uid
			if($package === true){
				$uids = $tmp->get_package_uids($uid);
			}else{
				$uids = (array)$uid;
			}
                            
			if(!empty($uids)){
				foreach($uids as $uid){
					set_time_limit(60); //reset the time limit
			
					$filepath = $tmp->_download_template($uid); //can be single or multiple, depending on $package beeing false or true
					
					//send request to TP server and download file
					if(is_array($filepath) && isset($filepath['error'])){
						$return['error'][] = $filepath['error'];
						break;
					}
					
					if($filepath !== false){
						//check if Slider Template was already imported. If yes, remove the old Slider Template as we now do an "update" (in reality we delete and insert again)
						//get all template sliders
						$tmp_slider = $tmp->getThemePunchTemplateSliders();
						
						foreach($tmp_slider as $tslider){
							if(isset($tslider['uid']) && $uid == $tslider['uid']){
								if(!isset($tslider['installed'])){ //slider is installed
									//delete template Slider!
									$mSlider = new RevSlider();
									$mSlider->initByID($tslider['id']);
									
									$mSlider->deleteSlider();
									//remove the update flag from the slider
									
									$tmp->remove_is_new($uid);
								}
								break;
							}
						}
						
						
						$slider = new RevSlider();
						$response = $slider->importSliderFromPost($updateAnim, $updateStatic, $filepath, $uid, $single_slide);
						
						$tmp->_delete_template($uid);
						
						if($single_slide === false){
							if(empty($viewBack)){
								$sliderID = $response["sliderID"];
								$viewBack = self::getViewUrl(self::VIEW_SLIDER,"id=".$sliderID);
								$return['view'] = $viewBack;
								if(empty($sliderID)){
									$viewBack = self::getViewUrl(self::VIEW_SLIDERS);
									$return['view'] = $viewBack;
								}
							}
						}
						
						if(isset($response["sliderID"])){
							$return['slider_id'] = $response["sliderID"];
							$added[] = $response["sliderID"];
						}
						//handle error
						if($response["success"] == false){
							$return['error'][] = $response["error"];
							break;
						}else{	//handle success, js redirect.
							$return['success'][] = __("Slider Import Success", 'revslider');
						}
						
					}else{
						if(is_array($filepath)){
							$return['error'][] = $filepath['error'];
						}else{
							$return['error'][] = __("Could not download from server. Please try again later!", 'revslider');
						}
						break;
					}
				}
				
				//check here to create a page or not
//				if(!empty($added)){
//                                
//					$page_creation = $data['page-creation'];
//					if($page_creation === 'true'){
//						$operations = new RevSliderOperations();
//						$page_id = $operations->create_slider_page($added);
//					}
//					if($page_id > 0){
//						$return['open'] = get_permalink($page_id);
//					}
//				}
			}else{
				$return['error'][] = __("Could not download package. Please try again later!", 'revslider');
			}
		}
		
		return $return;
	}
	
	
	/**
	 * import slider from TP servers
	 * @since: 5.0.5
	 */
	private static function importSliderOnlineTemplateHandle($data, $viewBack = null, $updateAnim = true, $updateStatic = true, $single_slide = false){
		
		$uid = $data['uid'];
		
		$added = array();
		
		if($uid == ''){
			$message = __("ID missing, something went wrong. Please try again!", 'revslider');
			RevSliderOperations::import_failed_message($message, $viewBack);
			exit;
		}else{
			$tmp = new RevSliderTemplate();
			
			$package=false;
                        if(isset($data['package'])){
                            $package = $data['package'];
                        }
			$package = ($package == 'true') ? true : false;
			
			//get all in the same package as the uid
			if($package === true){
				$uids = $tmp->get_package_uids($uid);
			}else{
				$uids = (array)$uid;
			}
			
			if(!empty($uids)){
				foreach($uids as $uid){
					set_time_limit(60); //reset the time limit
			
					$filepath = $tmp->_download_template($uid); //can be single or multiple, depending on $package beeing false or true
					
					//send request to TP server and download file
					if(is_array($filepath) && isset($filepath['error'])){
						$message = $filepath['error'];
						RevSliderOperations::import_failed_message($message, $viewBack);
						exit;
					}
					
					if($filepath !== false){
						//check if Slider Template was already imported. If yes, remove the old Slider Template as we now do an "update" (in reality we delete and insert again)
						//get all template sliders
						$tmp_slider = $tmp->getThemePunchTemplateSliders();
						
						foreach($tmp_slider as $tslider){
							if(isset($tslider['uid']) && $uid == $tslider['uid']){
								if(!isset($tslider['installed'])){ //slider is installed
									//delete template Slider!
									$mSlider = new RevSlider();
									$mSlider->initByID($tslider['id']);
									
									$mSlider->deleteSlider();
									//remove the update flag from the slider
									
									$tmp->remove_is_new($uid);
								}
								break;
							}
						}
						
						
						$slider = new RevSlider();
						$response = $slider->importSliderFromPost($updateAnim, $updateStatic, $filepath, $uid, $single_slide);
						
						$tmp->_delete_template($uid);
						
						if($single_slide === false){
							if(empty($viewBack)){
								$sliderID = $response["sliderID"];
								$viewBack = self::getViewUrl(self::VIEW_SLIDER,"id=".$sliderID);
								if(empty($sliderID))
									$viewBack = self::getViewUrl(self::VIEW_SLIDERS);
							}
						}
						
						if(isset($response["sliderID"])){
							$added[] = $response["sliderID"];
						}
						//handle error
						if($response["success"] == false){
							$message = $response["error"];
							RevSliderOperations::import_failed_message($message, $viewBack);
						}else{	//handle success, js redirect.
						
						}
						
					}else{
						if(is_array($filepath)){
							$message = $filepath['error'];
						}else{
							$message = __("Could not download from server. Please try again later!", 'revslider');
						}
						RevSliderOperations::import_failed_message($message, $viewBack);
						exit;
					}
				}
				
				//check here to create a page or not
//				if(!empty($added)){
//					$page_creation = $data['page-creation'];
//					if($page_creation === 'true'){
//						$operations = new RevSliderOperations();
//						$page_id = $operations->create_slider_page($added);
//					}
//					if($page_id > 0){
//						echo '<script>window.open("'.get_permalink($page_id).'", "_blank");</script>';
//					}
//				}
				
				echo "<script>location.href='".$viewBack."';</script>";
			}else{
				$message = __("Could not download package. Please try again later!", 'revslider');
				RevSliderOperations::import_failed_message($message, $viewBack);
				exit;
			}
		}
		
		exit;
	}
	
	
	/**
	 *
	 * import slider handle (not ajax response)
	 */
	private static function importSliderTemplateHandle($viewBack = null, $updateAnim = true, $updateStatic = true, $single_slide = false){
		
		$uid = RevSliderFunctions::getPostVariable('uid');
		if($uid == ''){
			$message = __("ID missing, something went wrong. Please try again!", 'revslider');
			RevSliderOperations::import_failed_message($message, $viewBack);
			exit;
		}
		
		//check if the filename is correct
		//import to templates, then duplicate Slider
		
		$slider = new RevSlider();
		$response = $slider->importSliderFromPost($updateAnim, $updateStatic, false, $uid, $single_slide);
                                
		if($single_slide === false){
			$sliderID = $response["sliderID"];
			if(empty($viewBack)){
				$viewBack = self::getViewUrl(self::VIEW_SLIDER,"id=".$sliderID);
				if(empty($sliderID))
					$viewBack = self::getViewUrl(self::VIEW_SLIDERS);
			}
		}

		//handle error
		if($response["success"] == false){
			$message = $response["error"];
			RevSliderOperations::import_failed_message($message, $viewBack);
		}else{	//handle success, js redirect.
			//check here to create a page or not
			if(isset($sliderID) && !empty($sliderID)){
				$page_creation = RevSliderFunctions::getPostVariable('page-creation');
				if($page_creation === 'true'){
					$operations = new RevSliderOperations();
					$page_id = $operations->create_slider_page((array)$sliderID);
				}
				if($page_id > 0){
					echo '<script>window.open("'.get_permalink($page_id).'", "_blank");</script>';
				}
			}
			
			echo "<script>location.href='".$viewBack."';</script>";
		}
		
		exit();
	}

    }
    ?>