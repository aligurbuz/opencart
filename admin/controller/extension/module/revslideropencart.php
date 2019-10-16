<?php
require_once DIR_CONFIG . 'revslider/revslider-loader.class.php'; 
class ControllerExtensionModulerevslideropencart extends Controller {
	private $error = array(); 
    public static $wpdb, $revSession;
    public static $lang_var;
    public static $product_categories;
     
    public  $vrabl;
    public function __construct($registry){
        parent::__construct($registry);
        self::$revSession = $this->session;
    }
	public function index() {

		define('rs_plugin_url', REV_DIR_CONFIG.'revslider/');
		define('rs_admin_css', rs_plugin_url.'admin/assets/css/');
		define('rs_admin_js', rs_plugin_url.'admin/assets/js/');
		define('rs_admin_img', rs_plugin_url.'admin/assets/images/');
		define('rs_rs_plugin', rs_plugin_url.'rs-plugin/');
		
	$this->language->load('extension/module/revslideropencart');
	$this->document->setTitle($this->language->get('heading_title'));
// start load external file
	$this->config->load('revslider/revslider-admin.class');
// end load external file
// start add font 
	$font = new ThemePunch_Fonts();
	$fonts = $font->get_all_fonts();
	if(!empty($fonts)){
		$http = get_http();
		foreach($fonts as $font){
			if($font !== ''){
				$url = $http."fonts.googleapis.com/css?family=".strip_tags($font['url']);
				$this->document->addStyle($url);
			}
		}
	}
// end add font 
// start css file
	$this->document->addStyle(rs_admin_css.'admin.css');
	$this->document->addStyle(rs_admin_css.'tipsy.css');
	// $this->document->addStyle(rs_admin_js.'autocomplete/jquery.autocomplete.css');
	$this->document->addStyle(rs_admin_js.'codemirror/codemirror.css');
	$this->document->addStyle(rs_admin_css.'colors.min.css');
	
        $this->document->addStyle(rs_admin_css.'edit_layers.css');
        $this->document->addStyle(rs_admin_css.'global.css');
	$this->document->addStyle(rs_plugin_url.'public/assets/css/settings.css');
	//$this->document->addStyle(rs_rs_plugin.'css/captions.css');
	//$this->document->addStyle(rs_rs_plugin.'css/static-captions.css');
// end load media file
//start revsslider custom code
	self::$wpdb = rev_db_class::rev_db_instance();
//end revsslider custom code
        $version = VERSION;
        
        if($version >= "3.0.0.0"){
                   $token_style = "user_token";
                   $token =  $this->session->data['user_token']; 
                }elseif($version == "2.3.0.2"){
                   $token =  $this->session->data['token'];
                   $token_style = "token";
                }
        
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['dimension'])) {
			$data['error_dimension'] = $this->error['dimension'];
		} else {
			$data['error_dimension'] = array();
		}

		$data['breadcrumbs'] = array();
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', $token_style.'=' . $token, true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', $token_style.'=' . $token . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('extension/module/revslideropencart', $token_style.'=' . $token, true),
			'separator' => ' :: '
		);
// start language
self::$lang_var['help'] = $this->language->get('help');
self::$lang_var['Revolution_Sliders'] = $this->language->get('Revolution_Sliders');
self::$lang_var['general_settings'] = $this->language->get('general_settings');
self::$lang_var['update'] = $this->language->get('update');
self::$lang_var['Update_Slider_Plugin'] = $this->language->get('Update_Slider_Plugin');
self::$lang_var['Update_Slider'] = $this->language->get('Update_Slider');
self::$lang_var['Update_rev_Slider_Plugin'] = $this->language->get('Update_rev_Slider_Plugin');
self::$lang_var['Update_rev_Slider_Plugin_desc'] =  $this->language->get('Update_rev_Slider_Plugin_desc');
self::$lang_var['File_example'] =  $this->language->get('File_example');
self::$lang_var['Choose_update_file'] = $this->language->get('Choose_update_file');
self::$lang_var['No_Sliders_Found'] =  $this->language->get('No_Sliders_Found');
self::$lang_var['Revolution_Slider_Temp'] =  $this->language->get('Revolution_Slider_Temp');
self::$lang_var['No_Template_Found'] =  $this->language->get('No_Template_Found');
self::$lang_var['Import_Slider'] =  $this->language->get('Import_Slider');
self::$lang_var['Choose_import_file'] =  $this->language->get('Choose_import_file');
self::$lang_var['CUSTOM_STYLES'] = $this->language->get('CUSTOM_STYLES');
self::$lang_var['Custom_Animations'] =  $this->language->get('Custom_Animations');
self::$lang_var['overwrite'] = $this->language->get('overwrite');
self::$lang_var['ID'] =  $this->language->get('ID');
self::$lang_var['Name'] =  $this->language->get('Name');
self::$lang_var['Source'] =  $this->language->get('Source');
self::$lang_var['Display_Hook'] = $this->language->get('Display_Hook');
self::$lang_var['N_Slides'] = $this->language->get('N_Slides');
self::$lang_var['Actions'] =  $this->language->get('Actions');
self::$lang_var['Settings'] =  $this->language->get('Settings');
self::$lang_var['HTML'] =  $this->language->get('HTML');
self::$lang_var['Delete'] =  $this->language->get('Delete');
self::$lang_var['Deleting_Slide'] =  $this->language->get('Deleting_Slide');
self::$lang_var['Duplicate'] =  $this->language->get('Duplicate');
self::$lang_var['Preview'] =  $this->language->get('Preview');
self::$lang_var['New_Template_Slider'] =  $this->language->get('New_Template_Slider');
self::$lang_var['New_Slider'] =  $this->language->get('New_Slider');
self::$lang_var['Hook_Name'] =  $this->language->get('Hook_Name');
self::$lang_var['Remove'] =  $this->language->get('Remove');
self::$lang_var['custom_hook_desc'] =  $this->language->get('custom_hook_desc');
self::$lang_var['Add_New_Hook'] =  $this->language->get('Add_New_Hook');
self::$lang_var['Add_Hook'] =  $this->language->get('Add_Hook');
self::$lang_var['CSS_JavaScript'] =  $this->language->get('CSS_JavaScript');
self::$lang_var['Custom_CSS'] =  $this->language->get('Custom_CSS');
self::$lang_var['Custom_JS'] =  $this->language->get('Custom_JS');
self::$lang_var['New_Slider_Temp'] =  $this->language->get('New_Slider_Temp');
self::$lang_var['New_Sldr'] =  $this->language->get('New_Sldr');
self::$lang_var['Main_Slider_Settings'] =  $this->language->get('Main_Slider_Settings');
self::$lang_var['theme_style'] =  $this->language->get('theme_style');
self::$lang_var['BROWSER'] =  $this->language->get('BROWSER');
self::$lang_var['PAGE'] =  $this->language->get('PAGE');
self::$lang_var['SLIDER'] =  $this->language->get('SLIDER');
self::$lang_var['LAYERS_GRID'] = $this->language->get('LAYERS_GRID');
self::$lang_var['Create_Slider'] =  $this->language->get('Create_Slider');
self::$lang_var['Close'] =  $this->language->get('Close');
self::$lang_var['Slides_List'] =  $this->language->get('Slides_List');
self::$lang_var['Saving_Order'] = $this->language->get('Saving_Order');
self::$lang_var['No_Slides_Found'] =  $this->language->get('No_Slides_Found');
self::$lang_var['Unpublish_Product'] =  $this->language->get('Unpublish_Product');
self::$lang_var['Publish_Product'] =  $this->language->get('Publish_Product');
self::$lang_var['Edit_Post'] =  $this->language->get('Edit_Post');
self::$lang_var['multiple_sources'] =  $this->language->get('multiple_sources');
self::$lang_var['Sort_by'] =  $this->language->get('Sort_by');
self::$lang_var['Updating_Sorting'] =  $this->language->get('Updating_Sorting');
self::$lang_var['Slider_Settings'] =  $this->language->get('Slider_Settings');
self::$lang_var['Warning_Removing'] =  $this->language->get('Warning_Removing');
self::$lang_var['Select_Slide_Image'] =  $this->language->get('Select_Slide_Image');
self::$lang_var['Punch_Fonts'] =  $this->language->get('Punch_Fonts');
self::$lang_var['Font_Family'] =  $this->language->get('Font_Family');
self::$lang_var['Handle'] =  $this->language->get('Handle');
self::$lang_var['Parameter'] =  $this->language->get('Parameter');
self::$lang_var['Google_Font_desc'] =  $this->language->get('Google_Font_desc');
self::$lang_var['Edit'] = $this->language->get('Edit');
self::$lang_var['Add_New_Font'] =  $this->language->get('Add_New_Font');
self::$lang_var['Add_Font'] =  $this->language->get('Add_Font');
self::$lang_var['Unique_handle'] =  $this->language->get('Unique_handle');
self::$lang_var['Parameter'] =  $this->language->get('Parameter');
self::$lang_var['Unpublish_Slide'] =  $this->language->get('Unpublish_Slide');
self::$lang_var['Publish_Slide'] =  $this->language->get('Publish_Slide');
self::$lang_var['Preview_Slide'] =  $this->language->get('Preview_Slide');
self::$lang_var['copy_move_dialog'] =  $this->language->get('copy_move_dialog');
self::$lang_var['copy_move_found'] =  $this->language->get('copy_move_found');
self::$lang_var['copy_move'] =  $this->language->get('copy_move');
self::$lang_var['Working'] =  $this->language->get('Working');
self::$lang_var['Edit_Slider_Template'] =  $this->language->get('Edit_Slider_Template');
self::$lang_var['Edit_Slider'] = $this->language->get('Edit_Slider');
self::$lang_var['Save_Settings'] =  $this->language->get('Save_Settings');
self::$lang_var['Delete_Slider'] =  $this->language->get('Delete_Slider');
self::$lang_var['Preview_Slider'] =  $this->language->get('Preview_Slider');
self::$lang_var['Preview'] =  $this->language->get('Preview');
self::$lang_var['API_Functions'] =  $this->language->get('API_Functions');
self::$lang_var['API_Methods'] = $this->language->get('API_Methods');
self::$lang_var['copy_paste_js'] =  $this->language->get('copy_paste_js');
self::$lang_var['Pause_Slider'] =  $this->language->get('Pause_Slider');
self::$lang_var['Resume_Slider'] =  $this->language->get('Resume_Slider');
self::$lang_var['Previous_Slide'] =  $this->language->get('Previous_Slide');
self::$lang_var['Next_Slide'] =  $this->language->get('Next_Slide');
self::$lang_var['Go_To_Slide'] =  $this->language->get('Go_To_Slide');
self::$lang_var['Num_Slides'] =  $this->language->get('Num_Slides');
self::$lang_var['Slide_Number'] =  $this->language->get('Slide_Number');
self::$lang_var['Playing_Slide'] =  $this->language->get('Playing_Slide');
self::$lang_var['External_Scroll'] =  $this->language->get('External_Scroll');
self::$lang_var['Redraw_Slider'] =  $this->language->get('Redraw_Slider');
self::$lang_var['API_Events'] =  $this->language->get('API_Events');
self::$lang_var['jQuery_Functions'] =  $this->language->get('jQuery_Functions');
self::$lang_var['Slider_l'] = $this->language->get('Slider_l');
self::$lang_var['Edit_Template_Slide'] = $this->language->get('Edit_Template_Slide');
self::$lang_var['Edit_Slide'] = $this->language->get('Edit_Slide');
self::$lang_var['Title'] =  $this->language->get('Title');
self::$lang_var['Static_Layers'] =  $this->language->get('Static_Layers');
self::$lang_var['Static_Layers_lbl'] =  $this->language->get('Static_Layers_lbl');
self::$lang_var['Add_Slide'] =  $this->language->get('Add_Slide');
self::$lang_var['slide_language'] =  $this->language->get('slide_language');
self::$lang_var['language_related'] =  $this->language->get('language_related');
self::$lang_var['slides_view'] =  $this->language->get('slides_view');
self::$lang_var['General_Slide_Settings'] = $this->language->get('General_Slide_Settings');
self::$lang_var['Warning_jq_ui'] =  $this->language->get('Warning_jq_ui');
self::$lang_var['Update_Slide'] =  $this->language->get('Update_Slide');
self::$lang_var['Update_Static_Layers'] =  $this->language->get('Update_Static_Layers');
self::$lang_var['updating'] =  $this->language->get('updating');
self::$lang_var['To_List'] =  $this->language->get('To_List');
self::$lang_var['Delete_Slide'] =  $this->language->get('Delete_Slide');
self::$lang_var['Delete_this_Slide'] =  $this->language->get('Delete_this_Slide');
self::$lang_var['Import_Export'] =  $this->language->get('Import_Export');
self::$lang_var['Import_Slider'] =  $this->language->get('Import_Slider');
self::$lang_var['note_styles'] = $this->language->get('note_styles');
self::$lang_var['Custom_Animations'] = $this->language->get('Custom_Animations');
self::$lang_var['overwrite'] = $this->language->get('overwrite');
self::$lang_var['append'] = $this->language->get('append');
self::$lang_var['Static_Styles'] = $this->language->get('Static_Styles');
self::$lang_var['api-desc'] = $this->language->get('api-desc');
self::$lang_var['Export_Slider'] = $this->language->get('Export_Slider');
self::$lang_var['Export_Slider_Dummy'] =$this->language->get('Export_Slider_Dummy');
self::$lang_var['Replace_Image_Url'] = $this->language->get('Replace_Image_Url');
self::$lang_var['Replace_api_desc'] = $this->language->get('Replace_api_desc');
self::$lang_var['Replace_From'] = $this->language->get('Replace_From');
self::$lang_var['Replace_to'] = $this->language->get('Replace_to');
self::$lang_var['Replace'] = $this->language->get('Replace');
self::$lang_var['Replacing'] = $this->language->get('Replacing');
self::$lang_var['Edit_Slides'] = $this->language->get('Edit_Slides');;
self::$lang_var['New_Slide'] = $this->language->get('New_Slide');
self::$lang_var['New_Transparent'] = $this->language->get('New_Transparent');
self::$lang_var['Adding_Slide'] = $this->language->get('Adding_Slide');
self::$lang_var['Select_image'] = $this->language->get('Select_image');
self::$lang_var['Static_Global'] = $this->language->get('Static_Global');
self::$lang_var['To_Settings'] = $this->language->get('To_Settings');
self::$lang_var['Do_It'] = $this->language->get('Do_It');
self::$lang_var['Copy_move_slide'] = $this->language->get('Copy_move_slide');
self::$lang_var['Choose_Slider'] = $this->language->get('Choose_Slider');
self::$lang_var['Choose_Operation'] = $this->language->get('Choose_Operation');
self::$lang_var['Copy'] = $this->language->get('Copy');
self::$lang_var['Move'] = $this->language->get('Move');
self::$lang_var['Add_Video_Layout'] = $this->language->get('Add_Video_Layout');
self::$lang_var['Choose_video_type'] = $this->language->get('Choose_video_type');
self::$lang_var['Youtube'] = $this->language->get('Youtube');
self::$lang_var['Vimeo'] = $this->language->get('Vimeo');
self::$lang_var['HTML5'] = $this->language->get('HTML5');
self::$lang_var['Vimeo_ID_URL'] = $this->language->get('Vimeo_ID_URL');
self::$lang_var['example_30300114'] = $this->language->get('example_30300114');
self::$lang_var['Youtube_ID_URL'] = $this->language->get('Youtube_ID_URL');
self::$lang_var['example'] = $this->language->get('example');
self::$lang_var['Poster_Image_Url'] = $this->language->get('Poster_Image_Url');
self::$lang_var['Video_MP4_Url'] = $this->language->get('Video_MP4_Url');
self::$lang_var['Video_WEBM_Url'] = $this->language->get('Video_WEBM_Url');
self::$lang_var['Video_OGV_Url'] = $this->language->get('Video_OGV_Url');
self::$lang_var['Video_Size'] = $this->language->get('Video_Size');
self::$lang_var['Full_Width'] = $this->language->get('Full_Width');
self::$lang_var['Width'] = $this->language->get('Width');
self::$lang_var['Height'] = $this->language->get('Height');
self::$lang_var['Cover'] = $this->language->get('Cover');
self::$lang_var['Dotted_Overlay'] = $this->language->get('Dotted_Overlay');
self::$lang_var['none'] = $this->language->get('none');
self::$lang_var['2_2_Black'] = $this->language->get('2_2_Black');
self::$lang_var['2_2_White'] = $this->language->get('2_2_White');
self::$lang_var['3_3_Black'] = $this->language->get('3_3_Black');
self::$lang_var['3_3_White'] = $this->language->get('3_3_White');
self::$lang_var['Aspect_Ratio'] = $this->language->get('Aspect_Ratio');
self::$lang_var['16_9'] = $this->language->get('16_9');
self::$lang_var['4_3'] = $this->language->get('4_3');
self::$lang_var['Video_Settings'] = $this->language->get('Video_Settings');
self::$lang_var['Loop_Video'] = $this->language->get('Loop_Video');
self::$lang_var['Autoplay'] = $this->language->get('Autoplay');
self::$lang_var['Only_1st_Time'] = $this->language->get('Only_1st_Time');
self::$lang_var['Next_Slide_End'] = $this->language->get('Next_Slide_End');
self::$lang_var['Force_Rewind'] = $this->language->get('Force_Rewind');
self::$lang_var['Hide_Controls'] = $this->language->get('Hide_Controls');
self::$lang_var['Mute'] = $this->language->get('Mute');
self::$lang_var['Preview_Image'] = $this->language->get('Preview_Image');
self::$lang_var['Set'] = $this->language->get('Set');
self::$lang_var['Arguments'] = $this->language->get('Arguments');
self::$lang_var['Add_This_Video'] = $this->language->get('Add_This_Video');
self::$lang_var['Update_Video'] = $this->language->get('Update_Video');
self::$lang_var['Slider_Main_Image_bg'] = $this->language->get('Slider_Main_Image_bg');
self::$lang_var['Background_Source'] = $this->language->get('Background_Source');
self::$lang_var['Image_BG'] = $this->language->get('Image_BG');
self::$lang_var['Change_Image'] = $this->language->get('Change_Image');
self::$lang_var['External_URL'] = $this->language->get('External_URL');
self::$lang_var['Get_External'] = $this->language->get('Get_External');
self::$lang_var['Transparent'] = $this->language->get('Transparent');
self::$lang_var['Solid_Colored'] = $this->language->get('Solid_Colored');
self::$lang_var['Background_Settings'] = $this->language->get('Background_Settings');
self::$lang_var['Background_Fit'] = $this->language->get('Background_Fit');
self::$lang_var['contain'] = $this->language->get('contain');
self::$lang_var['normal'] = $this->language->get('normal');
self::$lang_var['Background_Repeat'] =$this->language->get('Background_Repeat');
self::$lang_var['Background_Position'] = $this->language->get('Background_Position');
self::$lang_var['center_top'] = $this->language->get('center_top');
self::$lang_var['center_right'] = $this->language->get('center_right');
self::$lang_var['center_bottom'] = $this->language->get('center_bottom');
self::$lang_var['center_center'] = $this->language->get('center_center');
self::$lang_var['left_top'] = $this->language->get('left_top');
self::$lang_var['left_center'] = $this->language->get('left_center');
self::$lang_var['left_bottom'] = $this->language->get('left_bottom');
self::$lang_var['right_top'] = $this->language->get('right_top');
self::$lang_var['right_center'] = $this->language->get('right_center');
self::$lang_var['right_bottom'] = $this->language->get('right_bottom');
self::$lang_var['Pan_Zoom_Settings'] = $this->language->get('Pan_Zoom_Settings');
self::$lang_var['On'] = $this->language->get('On');
self::$lang_var['Background'] = $this->language->get('Background');
self::$lang_var['Start_Position'] = $this->language->get('Start_Position');
self::$lang_var['Start_Fit'] = $this->language->get('Start_Fit');
self::$lang_var['End_Position'] = $this->language->get('End_Position');
self::$lang_var['End_Fit'] = $this->language->get('End_Fit');
self::$lang_var['Duration'] = $this->language->get('Duration');
self::$lang_var['Slide'] = $this->language->get('Slide');
self::$lang_var['Helper_Grid'] = $this->language->get('Helper_Grid');
self::$lang_var['Disabled'] = $this->language->get('Disabled');
self::$lang_var['Snap_to'] = $this->language->get('Snap_to');
self::$lang_var['Help_Lines'] = $this->language->get('Help_Lines');
self::$lang_var['Layers'] = $this->language->get('Layers');
self::$lang_var['Show_Layers_from_Slide'] = $this->language->get('Show_Layers_from_Slide');
self::$lang_var['Add_Layer'] = $this->language->get('Add_Layer');
self::$lang_var['Add_Layer_Image'] = $this->language->get('Add_Layer_Image');
self::$lang_var['Add_Layer_Video'] = $this->language->get('Add_Layer_Video');
self::$lang_var['Duplicate_Layer'] = $this->language->get('Duplicate_Layer');
self::$lang_var['Delete_Layer'] = $this->language->get('Delete_Layer');
self::$lang_var['Delete_All_Layers'] = $this->language->get('Delete_All_Layers');
self::$lang_var['Layers_Timing_Sorting'] = $this->language->get('Layers_Timing_Sorting');
self::$lang_var['z_Index'] = $this->language->get('z_Index');
self::$lang_var['Hide_All_Layers'] = $this->language->get('Hide_All_Layers');
self::$lang_var['Lock_All_Layers'] = $this->language->get('Lock_All_Layers');
self::$lang_var['Snap_to_Slide'] = $this->language->get('Snap_to_Slide');
self::$lang_var['Timing'] = $this->language->get('Timing');
self::$lang_var['sh_Timer_Settings'] = $this->language->get('sh_Timer_Settings');
self::$lang_var['Start'] = $this->language->get('Start');
self::$lang_var['End'] = $this->language->get('End');
self::$lang_var['Static_Options'] = $this->language->get('Static_Options');
self::$lang_var['Static_Options_desc'] = $this->language->get('Static_Options_desc');
self::$lang_var['Start_on_Slide'] = $this->language->get('Start_on_Slide');
self::$lang_var['End_on_Slide'] = $this->language->get('End_on_Slide');
self::$lang_var['Layer_General_Parameters'] = $this->language->get('Layer_General_Parameters');
self::$lang_var['Layer_Content'] = $this->language->get('Layer_Content');
self::$lang_var['Position_Styling'] = $this->language->get('Position_Styling');
self::$lang_var['Image_Scale'] = $this->language->get('Image_Scale');
self::$lang_var['Reset_Size'] = $this->language->get('Reset_Size');
self::$lang_var['Final_Rotation'] = $this->language->get('Final_Rotation');
self::$lang_var['Parallax_Setting'] = $this->language->get('Parallax_Setting');
self::$lang_var['Layer_Animation'] = $this->language->get('Layer_Animation');
self::$lang_var['Preview_Transition'] = $this->language->get('Preview_Transition');
self::$lang_var['LAYER_EXAMPLE'] = $this->language->get('LAYER_EXAMPLE');
self::$lang_var['Start_Transition'] = $this->language->get('Start_Transition');
self::$lang_var['Custom_Animation'] = $this->language->get('Custom_Animation');
self::$lang_var['End_Transition_opt'] = $this->language->get('End_Transition_opt');
self::$lang_var['Loop_Animation'] = $this->language->get('Loop_Animation');
self::$lang_var['Anim_Settings_Panel'] = $this->language->get('Anim_Settings_Panel');
self::$lang_var['Randomize'] = $this->language->get('Randomize');
self::$lang_var['Transition'] = $this->language->get('Transition');
self::$lang_var['Rotation'] = $this->language->get('Rotation');
self::$lang_var['Scale'] = $this->language->get('Scale');
self::$lang_var['Skew'] = $this->language->get('Skew');
self::$lang_var['Opacity'] = $this->language->get('Opacity');
self::$lang_var['Perspective'] = $this->language->get('Perspective');
self::$lang_var['Origin'] = $this->language->get('Origin');
self::$lang_var['Test_Parameters'] = $this->language->get('Test_Parameters');
self::$lang_var['Test_Parameters_desc'] = $this->language->get('Test_Parameters_desc');
self::$lang_var['Speed'] = $this->language->get('Speed');
self::$lang_var['Transition_Direction'] = $this->language->get('Transition_Direction');
self::$lang_var['Overwrite_Animation'] = $this->language->get('Overwrite_Animation');
self::$lang_var['new_Animation'] = $this->language->get('new_Animation');
self::$lang_var['Save_Animation'] = $this->language->get('Save_Animation');
self::$lang_var['Advanced_Params'] = $this->language->get('Advanced_Params');
self::$lang_var['Links_optional'] = $this->language->get('Links_optional');
self::$lang_var['Caption_Sharp'] = $this->language->get('Caption_Sharp');
self::$lang_var['Responsive_Settings'] = $this->language->get('Responsive_Settings');
self::$lang_var['Attributes_opt'] = $this->language->get('Attributes_opt');
self::$lang_var['Template_Insertions'] = $this->language->get('Template_Insertions');
self::$lang_var['Post_Placeholders'] = $this->language->get('Post_Placeholders');
self::$lang_var['Any_custom_Tag'] = $this->language->get('Any_custom_Tag');
self::$lang_var['Product_Name'] = $this->language->get('Product_Name');
self::$lang_var['Product_Price'] = $this->language->get('Product_Price');
self::$lang_var['Product_Srt_Desc'] = $this->language->get('Product_Srt_Desc');
self::$lang_var['Product_Description'] = $this->language->get('Product_Description');
self::$lang_var['link_Product'] = $this->language->get('link_Product');
self::$lang_var['link_Product_Cart'] = $this->language->get('link_Product_Cart');
self::$lang_var['Product_Cat_Default'] = $this->language->get('Product_Cat_Default');
self::$lang_var['Date_created'] = $this->language->get('Date_created');
self::$lang_var['Date_modified'] = $this->language->get('Date_modified');
self::$lang_var['Specials_CountDown'] = $this->language->get('Specials_CountDown');
self::$lang_var['Custom_Placeholders'] = $this->language->get('Custom_Placeholders');
self::$lang_var['Example'] = $this->language->get('Example');
self::$lang_var['cover'] = $this->language->get('cover');
self::$lang_var['None'] = $this->language->get('None');
self::$lang_var['Position'] = $this->language->get('Position');
self::$lang_var['Appearance'] = $this->language->get('Appearance');
self::$lang_var['Navigation'] = $this->language->get('Navigation');
self::$lang_var['Thumbnails'] = $this->language->get('Thumbnails');
self::$lang_var['Mobile_Visibility'] = $this->language->get('Mobile_Visibility');
self::$lang_var['Alternative_First'] = $this->language->get('Alternative_First');
self::$lang_var['Troubleshooting'] = $this->language->get('Troubleshooting');
self::$lang_var['Delay'] = $this->language->get('Delay');
self::$lang_var['slide_stays'] = $this->language->get('slide_stays');
self::$lang_var['Shuffle_Mode'] = $this->language->get('Shuffle_Mode');
self::$lang_var['Turn_Shuffle'] = $this->language->get('Turn_Shuffle');
self::$lang_var['Lazy_Load'] = $this->language->get('Lazy_Load');
self::$lang_var['lazy_load_desc'] = $this->language->get('lazy_load_desc');
self::$lang_var['Load_Google_Font'] = $this->language->get('Load_Google_Font');
self::$lang_var['yes_Google_Font'] = $this->language->get('yes_Google_Font');
self::$lang_var['Google_Font'] = $this->language->get('Google_Font');
self::$lang_var['google_font_family'] = $this->language->get('google_font_family');
self::$lang_var['more_google'] = $this->language->get('more_google');
self::$lang_var['Stop_Slider'] = $this->language->get('Stop_Slider');
self::$lang_var['On_Off_loops'] = $this->language->get('On_Off_loops');
self::$lang_var['Stop_After_Loops'] = $this->language->get('Stop_After_Loops');
self::$lang_var['certain_amount_loops'] = $this->language->get('certain_amount_loops');
self::$lang_var['Stop_At_Slide'] = $this->language->get('Stop_At_Slide');
self::$lang_var['given_slide'] = $this->language->get('given_slide');
self::$lang_var['Position_page'] = $this->language->get('Position_page');
self::$lang_var['Position_slider'] = $this->language->get('Position_slider');
self::$lang_var['Left'] = $this->language->get('Left');
self::$lang_var['Center'] = $this->language->get('Center');
self::$lang_var['Right'] = $this->language->get('Right');
self::$lang_var['Margin_Top'] = $this->language->get('Margin_Top');
self::$lang_var['top_wrapper'] = $this->language->get('top_wrapper');
self::$lang_var['px'] = $this->language->get('px');
self::$lang_var['Margin_Bottom'] = $this->language->get('Margin_Bottom');
self::$lang_var['bottom_wrapper'] = $this->language->get('bottom_wrapper');
self::$lang_var['Margin_left'] =$this->language->get('Margin_left');
self::$lang_var['left_margin_wrapper'] = $this->language->get('left_margin_wrapper');
self::$lang_var['Margin_wrapper_div'] = $this->language->get('Margin_wrapper_div');
self::$lang_var['right_wrapper'] = $this->language->get('right_wrapper');
self::$lang_var['Shadow_Type'] = $this->language->get('Shadow_Type');
self::$lang_var['slider_shadow'] = $this->language->get('slider_shadow');
self::$lang_var['No_Shadow'] =$this->language->get('No_Shadow');
self::$lang_var['1'] = $this->language->get('1');
self::$lang_var['2'] =	$this->language->get('2');
self::$lang_var['3'] = $this->language->get('3');
self::$lang_var['Show_Timer_Show'] = $this->language->get('Show_Timer_Show');
self::$lang_var['running_timer_line'] = $this->language->get('running_timer_line');
self::$lang_var['Top'] = $this->language->get('Top');
self::$lang_var['Bottom'] = $this->language->get('Bottom');
self::$lang_var['Hide'] = $this->language->get('Hide');
self::$lang_var['Background_color'] = $this->language->get('Background_color');
self::$lang_var['transparent_slider'] = $this->language->get('transparent_slider');
self::$lang_var['Padding_border'] = $this->language->get('Padding_border');
self::$lang_var['border_around_slider'] = $this->language->get('border_around_slider');
self::$lang_var['Show_Background_Image'] = $this->language->get('Show_Background_Image');
self::$lang_var['main_slider_wrapper'] = $this->language->get('main_slider_wrapper');
self::$lang_var['Background_Image_Url'] = $this->language->get('Background_Image_Url');
self::$lang_var['slider_preloading'] = $this->language->get('slider_preloading');
self::$lang_var['Touch_Enabled'] = $this->language->get('Touch_Enabled');
self::$lang_var['Function_touch_devices'] = $this->language->get('Function_touch_devices');
self::$lang_var['Stop_On_Hover'] = $this->language->get('Stop_On_Hover');
self::$lang_var['hovering_Navigation'] = $this->language->get('hovering_Navigation');
self::$lang_var['Navigation_Type'] = $this->language->get('Navigation_Type');
self::$lang_var['navigation_bar'] = $this->language->get('navigation_bar');
self::$lang_var['None'] = $this->language->get('None');
self::$lang_var['Bullet'] = $this->language->get('Bullet');
self::$lang_var['Thumb'] = $this->language->get('Thumb');
self::$lang_var['Both'] = $this->language->get('Both');
self::$lang_var['Navigation_Arrows'] = $this->language->get('Navigation_Arrows');
self::$lang_var['navigation_Thumb_arrows'] = $this->language->get('navigation_Thumb_arrows');
self::$lang_var['With_Bullets'] = $this->language->get('With_Bullets');
self::$lang_var['Solo'] = $this->language->get('Solo');
self::$lang_var['Navigation_Style'] = $this->language->get('Navigation_Style');
self::$lang_var['Navigation_nexttobullets'] = $this->language->get('Navigation_nexttobullets');
self::$lang_var['Round'] =$this->language->get('Round');
self::$lang_var['Navbar'] = $this->language->get('Navbar');
self::$lang_var['Old_Round'] = $this->language->get('Old_Round');
self::$lang_var['Old_Square'] = $this->language->get('Old_Square');
self::$lang_var['Old_Navbar'] = $this->language->get('Old_Navbar');
self::$lang_var['Always_Show_Navigation'] = $this->language->get('Always_Show_Navigation');
self::$lang_var['show_navigation_thumbnails'] = $this->language->get('show_navigation_thumbnails');
self::$lang_var['Hide_Navitagion_After'] = $this->language->get('Hide_Navitagion_After');
self::$lang_var['Time_Navigatio_hidden'] = $this->language->get('Time_Navigatio_hidden');
self::$lang_var['ms'] = $this->language->get('ms');
self::$lang_var['Navigation_Horizontal_Align'] = $this->language->get('Navigation_Horizontal_Align');
self::$lang_var['Horizontal_Align_Bullets'] = $this->language->get('Horizontal_Align_Bullets');
self::$lang_var['Navigation_Vertical_Align'] = $this->language->get('Navigation_Vertical_Align');
self::$lang_var['Vertical_Align_Bullets'] = $this->language->get('Vertical_Align_Bullets');
self::$lang_var['Navigation_Horizontal_Offset'] = $this->language->get('Navigation_Horizontal_Offset');
self::$lang_var['Horizontal_position_Bullets'] = $this->language->get('Horizontal_position_Bullets');
self::$lang_var['Navigation_Vertical_Offset'] = $this->language->get('Navigation_Vertical_Offset');
self::$lang_var['current_Vertical_position'] = $this->language->get('current_Vertical_position');
self::$lang_var['Left_Arrow_Horizontal'] = $this->language->get('Left_Arrow_Horizontal');
self::$lang_var['Horizontal_Align_left'] = $this->language->get('Horizontal_Align_left');
self::$lang_var['Left_Arrow_Vertical'] = $this->language->get('Left_Arrow_Vertical');
self::$lang_var['Vertical_Align_left'] = $this->language->get('Vertical_Align_left');
self::$lang_var['Left_Arrow_Offset'] = $this->language->get('Left_Arrow_Offset');
self::$lang_var['Offset_Horizontal_position'] = $this->language->get('Offset_Horizontal_position');
self::$lang_var['Vertical_Offset'] = $this->language->get('Vertical_Offset');
self::$lang_var['Offset_Vertical_position'] = $this->language->get('Offset_Vertical_position');
self::$lang_var['Right_Arrow_Horizontal'] = $this->language->get('Right_Arrow_Horizontal');
self::$lang_var['Horizontal_Align'] = $this->language->get('Horizontal_Align');
self::$lang_var['Right_Arrow_Align'] = $this->language->get('Right_Arrow_Align');
self::$lang_var['Vertical_right_Arrow'] = $this->language->get('Vertical_right_Arrow');
self::$lang_var['Right_Horizontal'] = $this->language->get('Right_Horizontal');
self::$lang_var['current_Horizontal_position'] = $this->language->get('current_Horizontal_position');
self::$lang_var['Right_Offset'] = $this->language->get('Right_Offset');
self::$lang_var['position_negative_direction'] = $this->language->get('position_negative_direction');
self::$lang_var['Thumb_Width'] = $this->language->get('Thumb_Width');
self::$lang_var['thumb_selected'] = $this->language->get('thumb_selected');
self::$lang_var['Thumb_Height'] = $this->language->get('Thumb_Height');
self::$lang_var['Thumbnail_selected'] = $this->language->get('Thumbnail_selected');
self::$lang_var['Thumb_Amount'] = $this->language->get('Thumb_Amount');
self::$lang_var['Thumbs_visible_selected'] = $this->language->get('Thumbs_visible_selected');
self::$lang_var['Hide_Under_Width'] = $this->language->get('Hide_Under_Width');
self::$lang_var['Hide_slider_width'] = $this->language->get('Hide_slider_width');
self::$lang_var['Hide_Layers_Under'] = $this->language->get('Hide_Layers_Under');
self::$lang_var['Hide_layer_properties'] = $this->language->get('Hide_layer_properties');
self::$lang_var['Hide_Layers_Under'] = $this->language->get('Hide_Layers_Under');
self::$lang_var['layers_some_width'] = $this->language->get('layers_some_width');
self::$lang_var['Start_With_Slide'] = $this->language->get('Start_With_Slide');
self::$lang_var['Change_want_start'] = $this->language->get('Change_want_start');
self::$lang_var['First_Transition_Active'] = $this->language->get('First_Transition_Active');
self::$lang_var['overwrite_first_slide'] = $this->language->get('overwrite_first_slide');
self::$lang_var['First_Transition_Type'] = $this->language->get('First_Transition_Type');
self::$lang_var['First_slide_transition'] = $this->language->get('First_slide_transition');
self::$lang_var['Replace_me'] = $this->language->get('Replace_me');
self::$lang_var['First_Transition_Duration'] = $this->language->get('First_Transition_Duration');
self::$lang_var['First_slide_duration'] = $this->language->get('First_slide_duration');
self::$lang_var['First_Transition_Slot'] = $this->language->get('First_Transition_Slot');
self::$lang_var['slide_divided'] = $this->language->get('slide_divided');
self::$lang_var['JQuery_No_Conflict'] = $this->language->get('JQuery_No_Conflict');
self::$lang_var['jquery_mode'] = $this->language->get('jquery_mode');
self::$lang_var['JS_Includes_Body'] = $this->language->get('JS_Includes_Body');
self::$lang_var['Putting_javascript_conflicts'] = $this->language->get('Putting_javascript_conflicts');
self::$lang_var['True'] = $this->language->get('True');
self::$lang_var['False'] = $this->language->get('False');
self::$lang_var['Output_Filters_Protection'] = $this->language->get('Output_Filters_Protection');
self::$lang_var['protection_against_wordpress'] = $this->language->get('protection_against_wordpress');
self::$lang_var['Compressing_Output'] = $this->language->get('Compressing_Output');
self::$lang_var['Echo_Output'] = $this->language->get('Echo_Output');
self::$lang_var['Gallery'] = $this->language->get('Gallery');
self::$lang_var['Posts'] = $this->language->get('Posts');
self::$lang_var['Delete_Slide'] = $this->language->get('Delete_Slide');
self::$lang_var['Edit_Slide'] = $this->language->get('Edit_Slide');
self::$lang_var['Preview_Slide'] = $this->language->get('Preview_Slide');
self::$lang_var['New_Post'] = $this->language->get('New_Post');
self::$lang_var['To_Admin'] = $this->language->get('To_Admin');
self::$lang_var['Editor_Admin'] = $this->language->get('Editor_Admin');
self::$lang_var['Author_Editor_Admin'] = $this->language->get('Author_Editor_Admin');
self::$lang_var['edit_plugin'] = $this->language->get('edit_plugin');
self::$lang_var['off'] = $this->language->get('off');
self::$lang_var['RevSlider_libraries'] = $this->language->get('RevSlider_libraries');
self::$lang_var['shortcode_exists'] = $this->language->get('shortcode_exists');
self::$lang_var['Pages_RevSlider'] = $this->language->get('Pages_RevSlider');
self::$lang_var['Specify_homepage'] = $this->language->get('Specify_homepage');
self::$lang_var['JS_Includes'] = $this->language->get('JS_Includes');
self::$lang_var['fixing_javascript'] = $this->language->get('fixing_javascript');
self::$lang_var['Export_option'] = $this->language->get('Export_option');
self::$lang_var['export_Slider'] = $this->language->get('export_Slider');
self::$lang_var['Enable_Logs'] = $this->language->get('Enable_Logs');
self::$lang_var['Enable_console '] = $this->language->get('Enable_console');
self::$lang_var['Slider_Title'] = $this->language->get('Slider_Title');
self::$lang_var['title_slider'] = $this->language->get('title_slider');
self::$lang_var['Slider_Alias'] = $this->language->get('Slider_Alias');
self::$lang_var['alias_slider'] = $this->language->get('alias_slider');
self::$lang_var['Display_Hook'] = $this->language->get('Title');
self::$lang_var['Products'] = $this->language->get('Products');
self::$lang_var['Specific_Products'] = $this->language->get('Specific_Products');
self::$lang_var['Source_Type'] = $this->language->get('Source_Type');
self::$lang_var['Types'] = $this->language->get('Types');
self::$lang_var['Product_Categories'] = $this->language->get('Product_Categories');
self::$lang_var['Sort_Posts'] = $this->language->get('Sort_Posts');
self::$lang_var['Product_Image_Width'] = $this->language->get('Product_Image_Width');
self::$lang_var['Product_Image_Height'] = $this->language->get('Product_Image_Height');
self::$lang_var['Sort_Direction'] = $this->language->get('Sort_Direction');
self::$lang_var['Max_Posts'] = $this->language->get('Max_Posts');
self::$lang_var['Limit_Excerpt'] = $this->language->get('Limit_Excerpt');
self::$lang_var['Template_Slider'] = $this->language->get('Template_Slider');
self::$lang_var['Type_post'] = $this->language->get('Type_post');
self::$lang_var['Specific_Posts'] = $this->language->get('Specific_Posts');
self::$lang_var['Fixed'] = $this->language->get('Fixed');
self::$lang_var['Custom'] = $this->language->get('Custom');
self::$lang_var['Auto_Responsive'] = $this->language->get('Auto_Responsive');
self::$lang_var['Full_Screen'] = $this->language->get('Full_Screen');
self::$lang_var['Slider_Layout'] = $this->language->get('Slider_Layout');
self::$lang_var['height_screen'] = $this->language->get('height_screen');
self::$lang_var['Offset_Containers'] = $this->language->get('Offset_Containers');
self::$lang_var['Defines_Offset'] = $this->language->get('Defines_Offset');
self::$lang_var['Offset_Size'] = $this->language->get('Offset_Size');
self::$lang_var['Fullscreen_Height'] = $this->language->get('Fullscreen_Height');
self::$lang_var['FullScreen_Align'] = $this->language->get('FullScreen_Align');
self::$lang_var['Unlimited_Height'] = $this->language->get('Unlimited_Height');
self::$lang_var['Force_Full_Width'] = $this->language->get('Force_Full_Width');
self::$lang_var['Min_Height'] = $this->language->get('Min_Height');
self::$lang_var['Layers_Grid'] = $this->language->get('Layers_Grid');
self::$lang_var['Responsive_Sizes'] = $this->language->get('Responsive_Sizes');
self::$lang_var['shown_slides_list'] = $this->language->get('shown_slides_list');
self::$lang_var['Slide_Title'] = $this->language->get('Slide_Title');
self::$lang_var['excluded_slider'] = $this->language->get('excluded_slider');
self::$lang_var['Published'] = $this->language->get('Published');
self::$lang_var['Unpublished'] = $this->language->get('Unpublished');
self::$lang_var['State'] = $this->language->get('State');
self::$lang_var['language_slide'] = $this->language->get('language_slide');
self::$lang_var['Language'] = $this->language->get('Language');
self::$lang_var['slide_visible'] = $this->language->get('slide_visible');
self::$lang_var['Visible_from'] = $this->language->get('Visible_from');
self::$lang_var['slide_visible_reached'] = $this->language->get('slide_visible_reached');
self::$lang_var['Visible_until'] = $this->language->get('Visible_until');
self::$lang_var['appearance_transitions_slide'] = $this->language->get('appearance_transitions_slide');
self::$lang_var['Transitions'] = $this->language->get('Transitions');
self::$lang_var['slide_divided'] = $this->language->get('slide_dividedz');
self::$lang_var['Slot_Amount'] = $this->language->get('Slot_Amount');
self::$lang_var['Simple_Transitions'] = $this->language->get('Simple_Transitions');
self::$lang_var['duration_transition'] =$this->language->get('duration_transition');
self::$lang_var['Transition_Duration'] = $this->language->get('Transition_Duration');
self::$lang_var['start_delay_value'] = $this->language->get('start_delay_value');
self::$lang_var['end_delay_value'] = $this->language->get('end_delay_value');
self::$lang_var['Delay'] = $this->language->get('Delay');
self::$lang_var['Save_Performance'] = $this->language->get('Save_Performance');
self::$lang_var['Enable_Link'] = $this->language->get('Enable_Link');
self::$lang_var['Enable'] = $this->language->get('Enable');
self::$lang_var['Disable'] = $this->language->get('Disable');
self::$lang_var['Regular'] =$this->language->get('Regular');
self::$lang_var['Link_Type'] = $this->language->get('Link_Type');
self::$lang_var['To_Slide'] = $this->language->get('To_Slide');
self::$lang_var['template_sliders_link'] =$this->language->get('template_sliders_link');
self::$lang_var['Slide_Link'] = $this->language->get('Slide_Link');
self::$lang_var['Target_slide_link'] =$this->language->get('Target_slide_link');
self::$lang_var['Same_Window'] = $this->language->get('Same_Window');
self::$lang_var['New_Window'] = $this->language->get('New_Window');
self::$lang_var['Link_Open'] = $this->language->get('Link_Open');
self::$lang_var['Not_Chosen'] = $this->language->get('Not_Chosen');
self::$lang_var['Next_Slide'] = $this->language->get('Next_Slide');
self::$lang_var['Previous_Slide'] = $this->language->get('Previous_Slide');
self::$lang_var['Scroll_Below_Slider'] = $this->language->get('Scroll_Below_Slider');
self::$lang_var['Slide_Thumbnail_Image'] = $this->language->get('Slide_Thumbnail_Image');
self::$lang_var['Thumbnail'] = $this->language->get('Thumbnail');
self::$lang_var['Background_Type'] = $this->language->get('Background_Type');
self::$lang_var['rev_special_class'] = $this->language->get('rev_special_class');
self::$lang_var['Class'] = $this->language->get('Class');
self::$lang_var['rev_special_id'] = $this->language->get('rev_special_id');
self::$lang_var['rev_special_attr'] = $this->language->get('rev_special_attr');
self::$lang_var['Attribute'] = $this->language->get('Attribute');
self::$lang_var['Attributes_data_custom'] = $this->language->get('Attributes_data_custom');
self::$lang_var['Custom_Fields'] = $this->language->get('Custom_Fields');
self::$lang_var['Layer_Params'] = $this->language->get('Layer_Params');
self::$lang_var['layer_params'] = $this->language->get('layer_params');
self::$lang_var['caption_green'] = $this->language->get('caption_green');
self::$lang_var['Style'] = $this->language->get('Style');
self::$lang_var['Text_Html'] = $this->language->get('Text_Html');
self::$lang_var['Image_Link'] = $this->language->get('Image_Link');
self::$lang_var['Same_Window'] = $this->language->get('Same_Window');
self::$lang_var['New_Window'] = $this->language->get('New_Window');
self::$lang_var['Link_Open_In'] = $this->language->get('Link_Open_In');
self::$lang_var['Start_Animation'] = $this->language->get('Start_Animation');
self::$lang_var['Start_Easing'] = $this->language->get('Start_Easing');
self::$lang_var['ms_keep_low'] = $this->language->get('ms_keep_low');
self::$lang_var['Split_Text_per'] =$this->language->get('Split_Text_per');
self::$lang_var['Hide_Under_Width'] = $this->language->get('Hide_Under_Width');
self::$lang_var['Link_ID'] = $this->language->get('Link_ID');
self::$lang_var['Link_Classes'] = $this->language->get('Link_Classes');
self::$lang_var['Link_Title'] = $this->language->get('Link_Title');
self::$lang_var['Link_Rel'] = $this->language->get('Link_Rel');
self::$lang_var['Width_Height'] = $this->language->get('Width_Height');
self::$lang_var['Scale_Proportional'] = $this->language->get('Scale_Proportional');
self::$lang_var['No_Movement'] =$this->language->get('No_Movement');
self::$lang_var['4'] = $this->language->get('4');
self::$lang_var['5'] = $this->language->get('5');
self::$lang_var['6'] = $this->language->get('6');
self::$lang_var['7'] = $this->language->get('7');
self::$lang_var['8'] = $this->language->get('8');
self::$lang_var['9'] = $this->language->get('9');
self::$lang_var['10'] =$this->language->get('10');
self::$lang_var['Level'] = $this->language->get('Level');
self::$lang_var['OffsetX'] =$this->language->get('OffsetX');
self::$lang_var['X'] = $this->language->get('X');
self::$lang_var['OffsetY'] =$this->language->get('OffsetY');
self::$lang_var['Y'] =$this->language->get('Y');
self::$lang_var['Hor_Align'] = $this->language->get('Hor_Align');
self::$lang_var['Vert_Align'] =$this->language->get('Vert_Align');
self::$lang_var['nbsp_auto'] = $this->language->get('nbsp_auto');
self::$lang_var['Max_Width'] = $this->language->get('Max_Width');
self::$lang_var['Max_Height'] = $this->language->get('Max_Height');
self::$lang_var['2D_Rotation'] = $this->language->get('2D_Rotation');
self::$lang_var['Rotation_Origin_X'] =$this->language->get('Rotation_Origin_X');
self::$lang_var['Rotation_Origin_Y'] = $this->language->get('Rotation_Origin_Y');
self::$lang_var['Normal'] = $this->language->get('Normal');
self::$lang_var['Pre'] =$this->language->get('Pre');
self::$lang_var['No_Wrap'] = $this->language->get('No_Wrap');
self::$lang_var['Pre_Wrap'] = $this->language->get('Pre_Wrap');
self::$lang_var['Pre_Line'] = $this->language->get('Pre_Line');
self::$lang_var['White_Space'] = $this->language->get('White_Space');
self::$lang_var['Link_To_Slide'] =$this->language->get('Link_To_Slide');
self::$lang_var['Scroll_Under_Slider'] = $this->language->get('Scroll_Under_Slider');
self::$lang_var['Change_Image_Source'] = $this->language->get('Change_Image_Source');
self::$lang_var['Edit_Video'] = $this->language->get('Edit_Video');
self::$lang_var['End_Time'] = $this->language->get('End_Time');
self::$lang_var['End_Duration'] = $this->language->get('End_Duration');
self::$lang_var['End_Animation'] = $this->language->get('End_Animation');
self::$lang_var['End_Easing'] = $this->language->get('End_Easing');
self::$lang_var['No_Corner'] = $this->language->get('No_Corner');
self::$lang_var['Sharp'] = $this->language->get('Sharp');
self::$lang_var['Sharp_Reversed'] =$this->language->get('Sharp_Reversed');
self::$lang_var['Left_Corner'] = $this->language->get('Left_Corner');
self::$lang_var['Right_Corner'] = $this->language->get('Right_Corner');
self::$lang_var['Responsive_Levels'] =$this->language->get('Responsive_Levels');
self::$lang_var['Classes'] = $this->language->get('Classes');
self::$lang_var['Rel'] = $this->language->get('Rel');
self::$lang_var['Pendulum'] = $this->language->get('Pendulum');
self::$lang_var['Slideloop'] = $this->language->get('Slideloop');
self::$lang_var['Pulse'] =$this->language->get('Pulse');
self::$lang_var['Wave'] = $this->language->get('Wave');
self::$lang_var['Animation'] = $this->language->get('Animation');
self::$lang_var['Speed'] = $this->language->get('Speed');
self::$lang_var['nbsp'] = $this->language->get('nbsp');
self::$lang_var['Start_Degree'] = $this->language->get('Start_Degree');
self::$lang_var['End_Degree'] = $this->language->get('End_Degree');
self::$lang_var['&nbsp'] = $this->language->get('&nbsp');
self::$lang_var['x_Origin'] = $this->language->get('x_Origin');
self::$lang_var['%'] = $this->language->get('%');
self::$lang_var['y_Origin'] = $this->language->get('y_Origin');
self::$lang_var['%_250'] = $this->language->get('%_250');
self::$lang_var['x_Start_Pos'] =$this->language->get('x_Start_Pos');
self::$lang_var['x_End_Pos'] = $this->language->get('x_End_Pos');
self::$lang_var['2000px_2000px)'] =$this->language->get('2000px_2000px');
self::$lang_var['y_Start_Pos'] =$this->language->get('y_Start_Pos');
self::$lang_var['y_End_Pos'] = $this->language->get('y_End_Pos');
self::$lang_var['px_2000px'] = $this->language->get('px_2000px');
self::$lang_var['Start_Zoom'] =$this->language->get('Start_Zoom');
self::$lang_var['End_Zoom'] =$this->language->get('End_Zoom');
self::$lang_var['nbsp_20'] =$this->language->get('nbsp_20');
self::$lang_var['Angle'] = $this->language->get('Angle');
self::$lang_var['0°_360°'] = $this->language->get('0°_360°');
self::$lang_var['Radius'] = $this->language->get('Radius');
self::$lang_var['0px_2000px'] =$this->language->get('0px_2000px');
self::$lang_var['Easing'] = $this->language->get('Easing');
self::$lang_var['LAYERS_GRID_desc'] = $this->language->get('LAYERS_GRID_desc');
self::$lang_var['Add_Static_Image'] = $this->language->get('Add_Static_Image');
self::$lang_var['Add_Static_Video'] = $this->language->get('Add_Static_Video');
self::$lang_var['Setup_Slider_Position'] = $this->language->get('Setup_Slider_Position');
self::$lang_var['sds_Layout'] = $this->language->get('sds_Layout');
self::$lang_var['sds_Status'] = $this->language->get('sds_Status');
self::$lang_var['sds_Short_Order'] = $this->language->get('sds_Short_Order');
self::$lang_var['sds_Enabled'] = $this->language->get('sds_Enabled');
self::$lang_var['sds_Save_Position'] = $this->language->get('sds_Save_Position');
self::$lang_var['sds_Add_New'] = $this->language->get('sds_Add_New');
self::$lang_var['sds_Content_Top'] = $this->language->get('sds_Content_Top');
self::$lang_var['sds_Content_Bottom'] = $this->language->get('sds_Content_Bottom');
self::$lang_var['sds_Content_Left'] = $this->language->get('sds_Content_Left');
self::$lang_var['sds_Content_Right'] = $this->language->get('sds_Content_Right');
self::$lang_var['li_container'] = $this->language->get('li_container');
self::$lang_var['jQuery_object'] = $this->language->get('jQuery_object');
self::$lang_var['Position_Setting'] = $this->language->get('Position_Setting');
self::$lang_var['Fonts_Setting'] = $this->language->get('Fonts_Setting');
self::$lang_var['Off'] = $this->language->get('Off');
self::$lang_var['Enable_console'] = $this->language->get('Enable_console');
self::$lang_var['Specific_Post'] = $this->language->get('Specific_Post');
self::$lang_var['settings'] = $this->language->get('settings');
self::$lang_var['2000px_2000px'] = $this->language->get('2000px_2000px');
self::$lang_var['Use_Multi_Language'] =  $this->language->get('Use_Multi_Language');
self::$lang_var['Use_Multi_Language_desc'] =  $this->language->get('Use_Multi_Language_desc');
self::$lang_var['Enable_Static_Layers'] =  $this->language->get('Enable_Static_Layers');
self::$lang_var['Enable_Static_Layers_desc'] =  $this->language->get('Enable_Static_Layers_desc');
self::$lang_var['Next_Slide_on_Focus'] =  $this->language->get('Next_Slide_on_Focus');
self::$lang_var['Simplify_IOS4_IE8'] =  $this->language->get('Simplify_IOS4_IE8');
self::$lang_var['Simplyfies'] =  $this->language->get('Simplyfies');
self::$lang_var['Loop_Progress'] =  $this->language->get('Loop_Progress');
self::$lang_var['Stop_Slider'] =  $this->language->get('Stop_Slider');
self::$lang_var['Show_Progressbar'] =  $this->language->get('Show_Progressbar');
self::$lang_var['Show_running_progressbar'] =  $this->language->get('Show_running_progressbar');
self::$lang_var['Loop_Single_Slide'] =  $this->language->get('Loop_Single_Slide');
self::$lang_var['ILoop_Single_Slidef'] =  $this->language->get('ILoop_Single_Slidef');
self::$lang_var['underneath_banner'] =  $this->language->get('underneath_banner');
self::$lang_var['Background_transparent_slides'] =  $this->language->get('Background_transparent_slides'); 
self::$lang_var['Dotted_Overlay_Size'] =  $this->language->get('Dotted_Overlay_Size');
self::$lang_var['dotted_overlay'] =  $this->language->get('dotted_overlay');
self::$lang_var['background_fitted'] =  $this->language->get('background_fitted');
self::$lang_var['background_repeated_into'] =  $this->language->get('background_repeated_into');
self::$lang_var['background_positioned_Slider'] =  $this->language->get('background_positioned_Slider');
self::$lang_var['Keyboard_Navigation'] =  $this->language->get('Keyboard_Navigation');
self::$lang_var['navigate_keyboard'] =  $this->language->get('navigate_keyboard');
self::$lang_var['Bullet_Type'] =  $this->language->get('Bullet_Type');
self::$lang_var['Bullets_Thumbnail_Position'] =  $this->language->get('Bullets_Thumbnail_Position');
self::$lang_var['Select_Spinner_Slider'] =  $this->language->get('Select_Spinner_Slider');
self::$lang_var['Color_Spinner_shown'] =  $this->language->get('Color_Spinner_shown');
self::$lang_var['Spinner_Color'] =  $this->language->get('Spinner_Color');
self::$lang_var['Spinner'] =  $this->language->get('Spinner');
self::$lang_var['Parallax'] =  $this->language->get('Parallax');
self::$lang_var['Enable_Parallax'] =  $this->language->get('Enable_Parallax');
self::$lang_var['parallax_effect'] =  $this->language->get('parallax_effect');
self::$lang_var['Disable_on_Mobile'] =  $this->language->get('Disable_on_Mobile');
self::$lang_var['parallax_effect_desc'] =  $this->language->get('parallax_effect_desc');
self::$lang_var['parallax_effect_react'] =  $this->language->get('parallax_effect_react');
self::$lang_var['Mouse_Position'] =  $this->language->get('Mouse_Position');
self::$lang_var['Scroll_Position'] =  $this->language->get('Scroll_Position');
self::$lang_var['Mouse_and_Scroll'] =  $this->language->get('Mouse_and_Scroll');
self::$lang_var['BG_Freeze'] =  $this->language->get('BG_Freeze');
self::$lang_var['freeze_background'] =  $this->language->get('freeze_background');
self::$lang_var['Level_Depth_1'] =  $this->language->get('Level_Depth_1');
self::$lang_var['Level_Depth_desc'] =  $this->language->get('Level_Depth_desc');
self::$lang_var['Level_Depth_2'] =  $this->language->get('Level_Depth_2');
self::$lang_var['Level_Depth_3'] =  $this->language->get('Level_Depth_3');
self::$lang_var['Level_Depth_4'] =  $this->language->get('Level_Depth_4');
self::$lang_var['Level_Depth_5'] =  $this->language->get('Level_Depth_5');
self::$lang_var['Level_Depth_6'] =  $this->language->get('Level_Depth_6');
self::$lang_var['Level_Depth_7'] =  $this->language->get('Level_Depth_7');
self::$lang_var['Level_Depth_8'] =  $this->language->get('Level_Depth_8');
self::$lang_var['Level_Depth_9'] =  $this->language->get('Level_Depth_9');
self::$lang_var['Level_Depth_10'] =  $this->language->get('Level_Depth_10');
self::$lang_var['Mobile_Touch'] =  $this->language->get('Mobile_Touch');
self::$lang_var['Swipe_Treshhold'] =  $this->language->get('Swipe_Treshhold');
self::$lang_var['sensibility_gestures'] =  $this->language->get('sensibility_gestures');
self::$lang_var['Swipe_Min_Finger'] =  $this->language->get('Swipe_Min_Finger');
self::$lang_var['Swipe_Min_Finger_desc'] =  $this->language->get('Swipe_Min_Finger_desc');
self::$lang_var['Drag_Block_Vertical'] =  $this->language->get('Drag_Block_Vertical');
self::$lang_var['Drag_Block_Vertical_desc'] =  $this->language->get('Drag_Block_Vertical_desc');
self::$lang_var['Disable_Slider_Mobile'] =  $this->language->get('Disable_Slider_Mobile');
self::$lang_var['Disable_Slider_Mobile_desc'] =  $this->language->get('Disable_Slider_Mobile_desc');
self::$lang_var['Disable_KenBurn_Mobile'] =  $this->language->get('Disable_KenBurn_Mobile');
self::$lang_var['Disable_KenBurn_Mobile_desc'] =  $this->language->get('Disable_KenBurn_Mobile_desc');
self::$lang_var['Hide_Arrows_Mobile'] =  $this->language->get('Hide_Arrows_Mobile');
self::$lang_var['Bullet_Type_desc'] =  $this->language->get('Bullet_Type_desc');
self::$lang_var['Hide_Bullets_Mobile'] =  $this->language->get('Hide_Bullets_Mobile');
self::$lang_var['ShowHideNavigationBullets'] =  $this->language->get('ShowHideNavigationBullets');
self::$lang_var['Hide_Thumbnails_Mobile'] =  $this->language->get('Hide_Thumbnails_Mobile');
self::$lang_var['ShowHideThumbnailsBullets'] =  $this->language->get('ShowHideThumbnailsBullets');
self::$lang_var['Hide_Thumbs_Under_Width'] =  $this->language->get('Hide_Thumbs_Under_Width');
self::$lang_var['Thumbnails_Mobile_Devices'] =  $this->language->get('Thumbnails_Mobile_Devices');
self::$lang_var['Hide_Mobile_After'] =  $this->language->get('Hide_Mobile_After');
self::$lang_var['Hide_Mobile_After_desc'] =  $this->language->get('Hide_Mobile_After_desc'); 
self::$lang_var['Alternative_First_Slide'] =  $this->language->get('Alternative_First_Slide');
self::$lang_var['Global_Overwrites'] =  $this->language->get('Global_Overwrites');
self::$lang_var['Reset_Transitions'] =  $this->language->get('Reset_Transitions');
self::$lang_var['Reset_Transitions_desc'] =  $this->language->get('Reset_Transitions_desc');
self::$lang_var['Choose_operate'] =  $this->language->get('Choose_operate');
self::$lang_var['Random_Flat'] =  $this->language->get('Random_Flat');
self::$lang_var['Random_Premium'] =  $this->language->get('Random_Premium');
self::$lang_var['Random_Flat_Premium'] =  $this->language->get('Random_Flat_Premium');
self::$lang_var['Slide_To_Top'] =  $this->language->get('Slide_To_Top');
self::$lang_var['Slide_To_Bottom'] =  $this->language->get('Slide_To_Bottom');
self::$lang_var['Slide_To_Right'] =  $this->language->get('Slide_To_Right');
self::$lang_var['Slide_To_Left'] =  $this->language->get('Slide_To_Left');
self::$lang_var['Slide_Horizontal'] =  $this->language->get('Slide_Horizontal');
self::$lang_var['Slide_Vertical'] =  $this->language->get('Slide_Vertical');
self::$lang_var['Slide_Boxes'] =  $this->language->get('Slide_Boxes');
self::$lang_var['Slide_Slots_Horizontal'] =  $this->language->get('Slide_Slots_Horizontal');
self::$lang_var['Slide_Slots_Verticall'] =  $this->language->get('Slide_Slots_Verticall');
self::$lang_var['No_Transition'] =  $this->language->get('No_Transition');
self::$lang_var['Fade'] =  $this->language->get('Fade');
self::$lang_var['Fade_Boxes'] =  $this->language->get('Fade_Boxes');
self::$lang_var['Fade_Slots_Horizontal'] =  $this->language->get('Fade_Slots_Horizontal');
self::$lang_var['Fade_Slots_Vertical'] =  $this->language->get('Fade_Slots_Vertical');
self::$lang_var['Fade_Slide_Right'] =  $this->language->get('Fade_Slide_Right');
self::$lang_var['Fade_Slide_Left'] =  $this->language->get('Fade_Slide_Left');
self::$lang_var['Fade_Slide_Top'] =  $this->language->get('Fade_Slide_Top');
self::$lang_var['Fade_Slide_Bottom'] =  $this->language->get('Fade_Slide_Bottom');
self::$lang_var['Fade_To_Left'] =  $this->language->get('Fade_To_Left');
self::$lang_var['Fade_To_Right'] =  $this->language->get('Fade_To_Right');
self::$lang_var['Fade_To_Top'] =  $this->language->get('Fade_To_Top');
self::$lang_var['Fade_To_Bottom'] =  $this->language->get('Fade_To_Bottom');
self::$lang_var['Parallax_Right'] =  $this->language->get('Parallax_Right');
self::$lang_var['Parallax_Left'] =  $this->language->get('Parallax_Left');
self::$lang_var['Parallax_Top'] =  $this->language->get('Parallax_Top');
self::$lang_var['Parallax_Bottom'] =  $this->language->get('Parallax_Bottom');
self::$lang_var['Zoom_Out'] =  $this->language->get('Zoom_Out');
self::$lang_var['Zoom_OutLeft'] =  $this->language->get('Zoom_OutLeft');
self::$lang_var['Zoom_OutTop'] =  $this->language->get('Zoom_OutTop');
self::$lang_var['Zoom_OutBottom'] =  $this->language->get('Zoom_OutBottom');
self::$lang_var['Zoom_Slots_Vertical'] =  $this->language->get('Zoom_Slots_Vertical');
self::$lang_var['Curtain_Left'] =  $this->language->get('Curtain_Left');
self::$lang_var['Curtain_Middle'] =  $this->language->get('Curtain_Middle');
self::$lang_var['Curtain_Right'] =  $this->language->get('Curtain_Right');
self::$lang_var['Curtain_Horizontal'] =  $this->language->get('Curtain_Horizontal');
self::$lang_var['Curtain_Vertical'] =  $this->language->get('Curtain_Vertical');
self::$lang_var['Cube_Vertical'] =  $this->language->get('Cube_Vertical');
self::$lang_var['Cube_Horizontal'] =  $this->language->get('Cube_Horizontal');
self::$lang_var['In_Cube_Vertical'] =  $this->language->get('In_Cube_Vertical');
self::$lang_var['In_Cube_Horizontal'] =  $this->language->get('In_Cube_Horizontal');
self::$lang_var['TurnOff_Horizontal'] =  $this->language->get('TurnOff_Horizontal');
self::$lang_var['TurnOff_Vertical'] =  $this->language->get('TurnOff_Vertical');
self::$lang_var['Paper_Cut'] =  $this->language->get('Paper_Cut');
self::$lang_var['Fly_In'] =  $this->language->get('Fly_In');
self::$lang_var['Reset_Transition_Duration'] =  $this->language->get('Reset_Transition_Duration');
self::$lang_var['Troubleshooting'] =  $this->language->get('Troubleshooting');
self::$lang_var['Reset_all_Duration'] =  $this->language->get('Reset_all_Duration');
self::$lang_var['Troubleshooting'] =  $this->language->get('Troubleshooting');
self::$lang_var['JQuery_Conflict_Mode'] =  $this->language->get('JQuery_Conflict_Mode');
self::$lang_var['JQuery_Conflict_desc'] =  $this->language->get('JQuery_Conflict_desc');
self::$lang_var['Put_JS_Body'] =  $this->language->get('Put_JS_Body');
self::$lang_var['Put_JS_Body_desc'] =  $this->language->get('Put_JS_Body_desc');
self::$lang_var['Output_Filters_Protection'] =  $this->language->get('Output_Filters_Protection');
self::$lang_var['Output_Filters_desc'] =  $this->language->get('Output_Filters_desc');
self::$lang_var['By_Compressing_Output'] =  $this->language->get('By_Compressing_Output');
self::$lang_var['By_Echo_Output'] =  $this->language->get('By_Echo_Output');
self::$lang_var['Google_Font_Settings'] =  $this->language->get('Google_Font_Settings');
self::$lang_var['Google_Font_Settings_desc'] =  $this->language->get('Google_Font_Settings_desc');
self::$lang_var['Load_Google_Font'] =  $this->language->get('Load_Google_Font');
self::$lang_var['Load_Google_desc'] =  $this->language->get('Load_Google_desc');
self::$lang_var['google_families_load'] =  $this->language->get('google_families_load');
self::$lang_var['Choose_Spinner'] =  $this->language->get('Choose_Spinner');
self::$lang_var['Type'] =  $this->language->get('Type');
self::$lang_var['Next_Slide_Focus'] =  $this->language->get('Next_Slide_Focus');

// end language
		$data['heading_title'] = $this->language->get('heading_title');

		$data['button_save'] = $this->language->get('button_save');

		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['action'] = $this->url->link('extension/module/revslideropencart', $token_style.'=' . $token, true);
		
		$data['cancel'] = $this->url->link('extension/extension', $token_style.'=' . $token . '&type=module', true);
		
		$data['modules'] = array();

		if (isset($this->request->post['revslideropencart_module'])) {
			$data['modules'] = $this->request->post['revslideropencart_module'];
		} elseif ($this->config->get('revslideropencart_module')) { 
			$data['modules'] = $this->config->get('revslideropencart_module');
		}	

		$this->load->model('design/layout');

		$data['layouts'] = $this->model_design_layout->getLayouts();

		$this->load->model('design/banner');

		$data['banners'] = $this->model_design_banner->getBanners();
                 
                 
		$this->template = 'extension/module/revslideropencart';
                
                
		$this->children = array(
			'common/header',
			'common/footer'
		);

//start revsslider custom code
                $base_url = $this->url->link('extension/module/revslideropencart', $token_style.'=' . $token, true);
		$this->load->model('catalog/category'); 
		$categories = $this->model_catalog_category->getCategories(0);
                self::$product_categories = $categories;
                ob_start();
                        new RevsliderAdminHelper($base_url,$token); 
                        $RevSliderAdminforTable = new RevSliderAdmin(null,true);
                        $RevSliderAdminforTable->tableOperations();
                        $productAdmin = new RevSliderAdmin();
                        $data['rev_content'] = ob_get_contents();
                ob_end_clean();
//end revsslider custom code
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

                $version = VERSION;
                     
                   $this->response->setOutput($this->load->view('extension/module/revslideropencart', $data));
		
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/revslideropencart')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (isset($this->request->post['revslideropencart_module'])) {
			foreach ($this->request->post['revslideropencart_module'] as $key => $value) {
				if (!$value['width'] || !$value['height']) {
					$this->error['dimension'][$key] = $this->language->get('error_dimension');
				}				
			}
		}	

		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
	public function install(){
		$this->load->model('extension/module/revslideropencart');
		$this->model_extension_module_revslideropencart->setup();
		$ABSPATH = get_url();
		$admin = new RevSliderAdmin($ABSPATH,false); 
		RevSliderAdmin::sds_caption_css_init(true);
	}
	public function uninstall(){
		$this->load->model('extension/module/revslideropencart');
		$this->model_extension_module_revslideropencart->remove();
	}
	public function ajaxexecute(){
		$this->config->load('revslider/revslider-admin.class');
		//$productAdmin = new RevSliderAdmin(DIR_CONFIG.'revslider'); 
                $RevSliderAdmin = new RevSliderAdmin(null,true);
                RevSliderAdmin::onAjaxAction();
	}
        
	public function getcaptionscss(){
    	header("Content-Type: text/css; charset=utf-8");
    	$styles = sdsconfig::getgeneratecss();
		echo $styles;
    }
    public function price_format($price = ''){
        $price = $this->currency->format($price);
        return $price;
    }
}
?>