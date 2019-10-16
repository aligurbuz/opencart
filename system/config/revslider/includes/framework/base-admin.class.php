<?php
/**
 * @author    ThemePunch <info@themepunch.com>
 * @link      http://www.themepunch.com/
 * @copyright 2015 ThemePunch
 */

if( !defined( 'ABSPATH') ) exit();
                                        
class RevSliderBaseAdmin extends RevSliderBase {
	
	protected static $master_view;
	protected static $view;
	
	private static $arrSettings = array();
	private static $arrMenuPages = array();
	private static $arrSubMenuPages = array();
	private static $tempVars = array();
	private static $startupError = '';
	private static $menuRole = 'admin';
	private static $arrMetaBoxes = array();		//option boxes that will be added to post
	
	private static $allowed_views = array('master-view', 'system/validation', 'system/dialog-video', 'system/dialog-update', 'system/dialog-global-settings', 'sliders', 'slider', 'slider_template', 'slides', 'slide', 'navigation-editor', 'slide-editor', 'slide-overview', 'slide-editor', 'slider-overview', 'themepunch-google-fonts');
	
	/**
	 * 
	 * main constructor		 
	 */
	public function __construct($t){
                                        
		parent::__construct($t);
		
		//set view
		self::$view = self::getGetVar("view");
                                        
		if(empty(self::$view))
			self::$view = 'sliders';
			
		//add internal hook for adding a menu in arrMenus
	//	self::addAction('admin_menu', array('RevSliderBaseAdmin', 'addAdminMenu'));
                $this->addAdminMenu();
//		add_action('add_meta_boxes', array('RevSliderBaseAdmin', 'onAddMetaboxes'));
//		add_action('save_post', array('RevSliderBaseAdmin', 'onSavePost'));
		
		//if not inside plugin don't continue
                //
//               $RevSliderAdmin = new RevSliderAdmin();
//		$this->addCommonScripts();
//                $RevSliderAdmin->onAddScripts();
//                
		//if($this->isInsidePlugin() == true){
		//	self::addAction('admin_enqueue_scripts', array('RevSliderBaseAdmin', 'addCommonScripts'));
		//	self::addAction('admin_enqueue_scripts', array('RevSliderAdmin', 'onAddScripts'));
//		}else{
//			self::addAction('admin_enqueue_scripts', array('RevSliderBaseAdmin', 'addGlobalScripts'));
//		}
               
                
                
                
                
                
                
                //will have to uncomment it
                
//               
                
                
                
                
       //        var_dump('sdfsdfsdfsdfd'); 
                
		//a must event for any admin. call onActivate function.
//		$this->addEvent_onActivate();
//		$this->addAction_onActivate();
//		
		self::addActionAjax('show_image', 'onShowImage');
                                        
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
			'start_layer_in' => __('Start Layer in animation', 'revslider'),
			'start_layer_out' => __('Start Layer out animation', 'revslider'),
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
            'download_failed_check_server' => __('<div class=\'import_failure\'>Download/Install seems to have failed.</div><br>Please check your server <span class=\'import_failure\'>download speed</span> and  if the server can programatically connect to <span class=\'import_failure\'>http://templates.themepunch.com</span><br><br>', 'revslider'),
            'aborting_import' => __('<b>Aborting Import...</b>', 'revslider'),
            'create_draft' => __('Creating Draft Page...', 'revslider'),
            'draft_created' => __('Draft Page created. Popup will open', 'revslider'),
            'draft_not_created' => __('Draft Page could not be created.', 'revslider'),
            'slider_import_success_reload' => __('Slider import successful', 'revslider'),
            'save_changes' => __('Save Changes?', 'revslider')
		);

		return $lang;
	}
                               
	/**
	 * 
	 * add some meta box
	 * return metabox handle
	 */
	public static function addMetaBox($title,$content = null, $customDrawFunction = null,$location="post"){
		
		$box = array();
		$box['title'] = $title;
		$box['location'] = $location;
		$box['content'] = $content;
		$box['draw_function'] = $customDrawFunction;
		
		self::$arrMetaBoxes[] = $box;			
	}
	
	
	/**
	 * 
	 * on add metaboxes
	 */
	public static function onAddMetaboxes(){
		
		foreach(self::$arrMetaBoxes as $index=>$box){
			
			$title = $box['title'];
			$location = $box['location'];
			
			$boxID = 'mymetabox_revslider_'.$index;
			$function = array(self::$t, "onAddMetaBoxContent");
			
			if(is_array($location)){
				foreach($location as $loc)
					add_meta_box($boxID,$title,$function,$loc,'normal','default');
			}else
				add_meta_box($boxID,$title,$function,$location,'normal','default');
		}
	}
	
	/**
	 * 
	 * on save post meta. Update metaboxes data from post, add it to the post meta 
	 */
	public static function onSavePost(){
		
		//protection against autosave
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
			$postID = RevSliderFunctions::getPostVariable("ID");
			return $postID;
		}
		
		$postID = RevSliderFunctions::getPostVariable("ID");
		if(empty($postID))
			return(false);
			
			
		foreach(self::$arrMetaBoxes as $box){
			
			$arrSettingNames = array('slide_template');
			foreach($arrSettingNames as $name){
				$value = RevSliderFunctions::getPostVariable($name);
				update_post_meta( $postID, $name, $value );
			}	//end foreach settings

		} //end foreach meta
		
	}
	
	/**
	 * 
	 * on add metabox content
	 */
	public static function onAddMetaBoxContent($post,$boxData){
		
		$postID = $post->ID;
		
		$boxID = RevSliderFunctions::getVal($boxData, "id");
		$index = str_replace('mymetabox_revslider_',"",$boxID);
		
		$arrMetabox = self::$arrMetaBoxes[$index];
		

		//draw element
		$drawFunction = RevSliderFunctions::getVal($arrMetabox, "draw_function");
		if(!empty($drawFunction))
			call_user_func($drawFunction);
		
	}
	
	
	/**
	 * 
	 * set the menu role - for viewing menus
	 */
	public static function setMenuRole($menuRole){
		self::$menuRole = $menuRole;
	}
	
	
	/**
	 * get the menu role - for viewing menus
	 */
	public static function getMenuRole(){
		return self::$menuRole;
	}
	
	/**
	 * 
	 * set startup error to be shown in master view
	 */
	public static function setStartupError($errorMessage){
		self::$startupError = $errorMessage;
	}
	
	
	/**
	 * 
	 * tells if the the current plugin opened is this plugin or not 
	 * in the admin side.
	 */
	private function isInsidePlugin(){
		$page = self::getGetVar("page");
		
		if($page == 'revslider' || $page == 'themepunch-google-fonts' || $page == 'revslider_navigation')
			return(true);
		return(false);
	} 
	
	
	/**
	 * add global used scripts
	 * @since: 5.1.1
	 */
	public static function addGlobalScripts(){
		wp_enqueue_script(array('jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'wpdialogs'));
		wp_enqueue_style(array('wp-jquery-ui', 'wp-jquery-ui-dialog', 'wp-jquery-ui-core'));
	}
	
	
	/**
	 * add common used scripts
	 */
	public static function addCommonScripts(){
                                        
		if(function_exists("wp_enqueue_media"))
			wp_enqueue_media();
		
		//wp_enqueue_script(array('jquery', 'jquery-ui-core', 'jquery-ui-mouse', 'jquery-ui-accordion', 'jquery-ui-datepicker', 'jquery-ui-dialog', 'jquery-ui-slider', 'jquery-ui-autocomplete', 'jquery-ui-sortable', 'jquery-ui-droppable', 'jquery-ui-tabs', 'jquery-ui-widget', 'wp-color-picker'));
		
		//wp_enqueue_style(array('wp-jquery-ui', 'wp-jquery-ui-core', 'wp-jquery-ui-dialog', 'wp-color-picker'));
		
		wp_enqueue_script('unite_settings', RS_PLUGIN_URL .'admin/assets/js/settings.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('unite_admin', RS_PLUGIN_URL .'admin/assets/js/admin.js', array(), RevSliderGlobals::SLIDER_REVISION );
		
		wp_enqueue_style('unite_admin', RS_PLUGIN_URL .'admin/assets/css/admin.css', array(), RevSliderGlobals::SLIDER_REVISION);
		
		//add tipsy
		wp_enqueue_script('tipsy', RS_PLUGIN_URL .'admin/assets/js/jquery.tipsy.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_style('tipsy', RS_PLUGIN_URL .'admin/assets/css/tipsy.css', array(), RevSliderGlobals::SLIDER_REVISION);
		
		//include codemirror
		wp_enqueue_script('codemirror_js', RS_PLUGIN_URL .'admin/assets/js/codemirror/codemirror.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('codemirror_js_highlight', RS_PLUGIN_URL .'admin/assets/js/codemirror/util/match-highlighter.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('codemirror_js_searchcursor', RS_PLUGIN_URL .'admin/assets/js/codemirror/util/searchcursor.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('codemirror_js_css', RS_PLUGIN_URL .'admin/assets/js/codemirror/css.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_script('codemirror_js_html', RS_PLUGIN_URL .'admin/assets/js/codemirror/xml.js', array(), RevSliderGlobals::SLIDER_REVISION );
		wp_enqueue_style('codemirror_css', RS_PLUGIN_URL .'admin/assets/js/codemirror/codemirror.css', array(), RevSliderGlobals::SLIDER_REVISION);
		
	}
	
	
	
	/**
	 * 
	 * admin pages parent, includes all the admin files by default
	 */
	public static function adminPages(){
		//self::validateAdminPermissions();
	}
	
	
	/**
	 * 
	 * validate permission that the user is admin, and can manage options.
	 */
	protected static function isAdminPermissions(){
		
		if( is_admin() && current_user_can("manage_options") )
			return(true);
			
		return(false);
	}
	
	/**
	 * 
	 * validate admin permissions, if no pemissions - exit
	 */
	protected static function validateAdminPermissions(){
		if(!self::isAdminPermissions()){
			echo "access denied";
			return(false);
		}			
	}
	
	/**
	 * 
	 * set view that will be the master
	 */
	protected static function setMasterView($masterView){
		self::$master_view = $masterView;
	}
	
	/**
	 * 
	 * inlcude some view file
	 */
	protected static function requireView($view){
                           
		try{
                    
			//require master view file, and 
			if(!empty(self::$master_view) && !isset(self::$tempVars["is_masterView"]) ){
                           
				$masterViewFilepath = self::$path_views.self::$master_view.".php";
				RevSliderFunctions::validateFilepath($masterViewFilepath,"Master View");
				
				self::$tempVars["is_masterView"] = true;
                            
                                        
				require $masterViewFilepath;
			}else{		//simple require the view file.
                            
				if(!in_array($view, self::$allowed_views)) UniteFunctionsRev::throwError(__('Wrong Request', 'revslider'));
				
				switch($view){ //switch URLs to corresponding php files
					case 'slide':
						$view = 'slide-editor';
					break;
					case 'slider':
						$view = 'slider-editor';
					break;
					case 'sliders':
						$view = 'slider-overview';
					break;
					case 'slides':
						$view = 'slide-overview';
					break;
				}
				 
				$viewFilepath = self::$path_views.$view.".php";
				 
				RevSliderFunctions::validateFilepath($viewFilepath,"View");
                              
				require $viewFilepath;
			}
			
		}catch (Exception $e){
			echo "<br><br>View (".$view.") Error: <b>".$e->getMessage()."</b>";
		}
	}
	
	/**
	 * require some template from "templates" folder
	 */
	protected static function getPathTemplate($templateName){
            
		$pathTemplate = self::$path_templates.$templateName.'.php';
                
		RevSliderFunctions::validateFilepath($pathTemplate,'Template');
		//die($pathTemplate);
		return($pathTemplate);
	}
	
	
	/**
	 * 
	 * add all js and css needed for media upload
	 */
	protected static function addMediaUploadIncludes(){
		
		wp_enqueue_script('thickbox');
		wp_enqueue_script('media-upload');
		wp_enqueue_style('thickbox');
		
	}
	
	
	/**
	 * add admin menus from the list.
	 */
	public static function addAdminMenu(){
                                        
            
		global $revslider_screens;
		
		$role = "manage_options";
		
		switch(self::$menuRole){
			case 'author':
				$role = "edit_published_posts";
			break;
			case 'editor':
				$role = "edit_pages";
			break;		
			default:		
			case 'admin':
				$role = "manage_options";
			break;
		}
		
		foreach(self::$arrMenuPages as $menu){
                    if($menu["title"] == 'Slider Revolution'){
                      //  die('working fine');
                        }
			$title = $menu["title"];
			$pageFunctionName = $menu["pageFunction"];
			$revslider_screens[] = add_menu_page( $title, $title, $role, 'revslider', array(self::$t, $pageFunctionName), 'dashicons-update' );
		}
		
		foreach(self::$arrSubMenuPages as $menu){
			$title = $menu["title"];
			$pageFunctionName = $menu["pageFunction"];
			$pageSlug = $menu["pageSlug"];
			$revslider_screens[] = add_submenu_page( 'revslider', $title, $title, $role, $pageSlug, array(self::$t, $pageFunctionName) );
		}
		
	}
	
	
	/**
	 * 
	 * add menu page
	 */
	protected static function addMenuPage($title,$pageFunctionName){
		//die($title);
		self::$arrMenuPages[] = array("title"=>$title,"pageFunction"=>$pageFunctionName);
		//var_dump(self::$arrMenuPages);die();
	}
	
	
	/**
	 * 
	 * add menu page
	 */
	protected static function addSubMenuPage($title,$pageFunctionName,$pageSlug){
		
		self::$arrSubMenuPages[] = array("title"=>$title,"pageFunction"=>$pageFunctionName,"pageSlug"=>$pageSlug);
		
	}

	/**
	 * 
	 * get url to some view.
	 */
	public static function getViewUrl($viewName,$urlParams=""){
         $version = VERSION;
                     
        if($version >= "3.0.0.0"){
            $token_style = "user_token";

         }elseif($version == "2.3.0.2"){
            $token_style = "token";
         }
		$params = "&view=".$viewName;
		if(!empty($urlParams))
			$params .= "&".$urlParams;
		$base_url = rev_site_admin_url().'?route=extension/module/revslideropencart&'.$token_style.'='.sds_get_oc_token(); 
		$link = $base_url.$params.'&page=revslider';
		return($link);
	}
	
	/**
	 * 
	 * register the "onActivate" event
	 */
	protected function addEvent_onActivate($eventFunc = "onActivate"){
		//register_activation_hook( RS_PLUGIN_FILE_PATH, array(self::$t, $eventFunc) );
	}
	
	
	protected function addAction_onActivate(){
		//register_activation_hook( RS_PLUGIN_FILE_PATH, array(self::$t, 'onActivateHook') );
	}
	
	
	public static function onActivateHook(){
		
		$options = array();
		
		$options = apply_filters('revslider_mod_activation_option', $options);
		
		
		$operations = new RevSliderOperations();
		$options_exist = $operations->getGeneralSettingsValues();
		if(!is_array($options_exist)) $options_exist = array();
		
		$options = array_merge($options_exist, $options);
		
		$operations->updateGeneralSettings($options);
		
	}
	
	
	/**
	 * 
	 * store settings in the object
	 */
	protected static function storeSettings($key,$settings){
		self::$arrSettings[$key] = $settings;
	}
	
	
	/**
	 * 
	 * get settings object
	 */
	protected static function getSettings($key){
		if(!isset(self::$arrSettings[$key]))
			RevSliderFunctions::throwError("Settings $key not found");
		$settings = self::$arrSettings[$key];
		return($settings);
	}
	
	
	/**
	 * 
	 * add ajax back end callback, on some action to some function.
	 */
	protected static function addActionAjax($ajaxAction,$eventFunction){
		//add_action('wp_ajax_revslider_'.$ajaxAction, array('RevSliderAdmin', $eventFunction));
	}
	
	
	/**
	 * 
	 * echo json ajax response
	 */
	private static function ajaxResponse($success,$message,$arrData = null){
		
		$response = array();			
		$response["success"] = $success;				
		$response["message"] = $message;
		
		if(!empty($arrData)){
			
			if(gettype($arrData) == "string")
				$arrData = array("data"=>$arrData);				
			
			$response = array_merge($response,$arrData);
		}
			
		$json = json_encode($response);
		
		echo $json;
		exit();
	}

	
	/**
	 * 
	 * echo json ajax response, without message, only data
	 */
	protected static function ajaxResponseData($arrData){
		if(gettype($arrData) == "string")
			$arrData = array("data"=>$arrData);
		
		self::ajaxResponse(true,"",$arrData);
	}
	
	
	/**
	 * 
	 * echo json ajax response
	 */
	protected static function ajaxResponseError($message,$arrData = null){
		
		self::ajaxResponse(false,$message,$arrData,true);
	}
	
	
	/**
	 * echo ajax success response
	 */
	protected static function ajaxResponseSuccess($message,$arrData = null){
		
		self::ajaxResponse(true,$message,$arrData,true);
		
	}
	
	
	/**
	 * echo ajax success response
	 */
	protected static function ajaxResponseSuccessRedirect($message,$url){
		$arrData = array("is_redirect"=>true,"redirect_url"=>$url);
		
		self::ajaxResponse(true,$message,$arrData,true);
	}
	

}

/**
 * old classname extends new one (old classnames will be obsolete soon)
 * @since: 5.0
 **/
class UniteBaseAdminClassRev extends RevSliderBaseAdmin {}
?>