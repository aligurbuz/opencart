<?php

	$operations = new RevOperations();

	//set Layer settings
	$contentCSS = $operations->getCaptionsContent();
	$arrAnimations = $operations->getArrAnimations();
	$arrEndAnimations = $operations->getArrEndAnimations();

	$htmlButtonDown = '<div id="layer_captions_down" style="width:30px; text-align:center;padding:0px;" class="revgray button-primary"><i class="eg-icon-down-dir"></i></div>';
	$buttonEditStyles = UniteFunctionsRev::getHtmlLink("javascript:void(0)", "<i class=\"revicon-magic\"></i>Edit Style","button_edit_css","button-primary revblue");
	$buttonEditStylesGlobal = UniteFunctionsRev::getHtmlLink("javascript:void(0)", "<i class=\"revicon-palette\"></i>Edit Global Style","button_edit_css_global","button-primary revblue");

	$arrSplit = $operations->getArrSplit();
	$arrEasing = $operations->getArrEasing();
	$arrEndEasing = $operations->getArrEndEasing();

	$captionsAddonHtml = $htmlButtonDown.$buttonEditStyles.$buttonEditStylesGlobal;

	//set Layer settings
	$layerSettings = new UniteSettingsAdvancedRev();
	$layerSettings->addSection(ControllerExtensionModulerevslideropencart::$lang_var['Layer_Params'],ControllerExtensionModulerevslideropencart::$lang_var['layer_params']);
	$layerSettings->addSap(ControllerExtensionModulerevslideropencart::$lang_var['Layer_Params'],ControllerExtensionModulerevslideropencart::$lang_var['layer_params']);
	$layerSettings->addTextBox("layer_caption", ControllerExtensionModulerevslideropencart::$lang_var['caption_green'], ControllerExtensionModulerevslideropencart::$lang_var['Style'],array(UniteSettingsRev::PARAM_ADDTEXT=>$captionsAddonHtml,"class"=>"textbox-caption"));

	$addHtmlTextarea = '';
	if($sliderTemplate == "true"){
		$addHtmlTextarea .= UniteFunctionsRev::getHtmlLink("javascript:void(0)", "Insert Meta","linkInsertTemplate","disabled revblue button-primary");
	}
	$addHtmlTextarea .= UniteFunctionsRev::getHtmlLink("javascript:void(0)", "Insert Button","linkInsertButton","disabled revblue button-primary");

	$layerSettings->addTextArea("layer_text", "",ControllerExtensionModulerevslideropencart::$lang_var['Text_Html'],array("class"=>"area-layer-params",UniteSettingsRev::PARAM_ADDTEXT_BEFORE_ELEMENT=>$addHtmlTextarea));
	$layerSettings->addTextBox("layer_image_link", "",ControllerExtensionModulerevslideropencart::$lang_var['Image_Link'],array("class"=>"text-sidebar-link","hidden"=>true));
	$layerSettings->addSelect("layer_link_open_in",array("same"=>ControllerExtensionModulerevslideropencart::$lang_var['Same_Window'],"new"=>ControllerExtensionModulerevslideropencart::$lang_var['New_Window']),ControllerExtensionModulerevslideropencart::$lang_var['Link_Open'],"same",array("hidden"=>true));

	$layerSettings->addSelect("layer_animation",$arrAnimations,ControllerExtensionModulerevslideropencart::$lang_var['Start_Animation'],"fade");
	$layerSettings->addSelect("layer_easing", $arrEasing, ControllerExtensionModulerevslideropencart::$lang_var['Start_Easing'],"Power3.easeInOut");
	$params = array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['ms']);
	$paramssplit = array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['ms_keep_low']);
	$layerSettings->addTextBox("layer_speed", "","Start Duration",$params);
	$layerSettings->addTextBox("layer_splitdelay", "10","Split Delay",$paramssplit);
	$layerSettings->addSelect("layer_split", $arrSplit, ControllerExtensionModulerevslideropencart::$lang_var['Split_Text_per'],"none");
	$layerSettings->addCheckbox("layer_hidden", false,ControllerExtensionModulerevslideropencart::$lang_var['Hide_Under_Width']);

	$params = array("hidden"=>true);
	$layerSettings->addTextBox("layer_link_id", "",ControllerExtensionModulerevslideropencart::$lang_var['Link_ID'],$params);
	$layerSettings->addTextBox("layer_link_class", "",ControllerExtensionModulerevslideropencart::$lang_var['Link_Classes'],$params);
	$layerSettings->addTextBox("layer_link_title", "",ControllerExtensionModulerevslideropencart::$lang_var['Link_Title'],$params);
	$layerSettings->addTextBox("layer_link_rel", "",ControllerExtensionModulerevslideropencart::$lang_var['Link_Rel'],$params);

	//scale for img
	$textScaleX = ControllerExtensionModulerevslideropencart::$lang_var['Width'];
	$textScaleProportionalX = ControllerExtensionModulerevslideropencart::$lang_var['Width_Height'];
	$params = array("attrib_text"=>"data-textproportional='".$textScaleProportionalX."' data-textnormal='".$textScaleX."'", "hidden"=>false);
	$layerSettings->addTextBox("layer_scaleX", "",ControllerExtensionModulerevslideropencart::$lang_var['Width'],$params);
	$layerSettings->addTextBox("layer_scaleY", "",ControllerExtensionModulerevslideropencart::$lang_var['Height'],array("hidden"=>false));
	$layerSettings->addCheckbox("layer_proportional_scale", false,ControllerExtensionModulerevslideropencart::$lang_var['Scale_Proportional'],array("hidden"=>false));

	$arrParallaxLevel = array(
							'-' => ControllerExtensionModulerevslideropencart::$lang_var['No_Movement'],
							'1' => ControllerExtensionModulerevslideropencart::$lang_var['1'],
							'2' => ControllerExtensionModulerevslideropencart::$lang_var['2'],
							'3' => ControllerExtensionModulerevslideropencart::$lang_var['3'],
							'4' => ControllerExtensionModulerevslideropencart::$lang_var['4'],
							'5' => ControllerExtensionModulerevslideropencart::$lang_var['5'],
							'6' => ControllerExtensionModulerevslideropencart::$lang_var['6'],
							'7' => ControllerExtensionModulerevslideropencart::$lang_var['7'],
							'8' => ControllerExtensionModulerevslideropencart::$lang_var['8'],
							'9' => ControllerExtensionModulerevslideropencart::$lang_var['9'],
							'10' => ControllerExtensionModulerevslideropencart::$lang_var['10'],
							);
	$layerSettings->addSelect("parallax_level", $arrParallaxLevel, ControllerExtensionModulerevslideropencart::$lang_var['Level'],"nowrap", array("hidden"=>false));


	//put left top
	$textOffsetX = ControllerExtensionModulerevslideropencart::$lang_var['OffsetX'];
	$textX = ControllerExtensionModulerevslideropencart::$lang_var['X'];
	$params = array("attrib_text"=>"data-textoffset='".$textOffsetX."' data-textnormal='".$textX."'");
	$layerSettings->addTextBox("layer_left", "",ControllerExtensionModulerevslideropencart::$lang_var['X'],$params);

	$textOffsetY = ControllerExtensionModulerevslideropencart::$lang_var['OffsetY'];
	$textY = ControllerExtensionModulerevslideropencart::$lang_var['Y'];
	$params = array("attrib_text"=>"data-textoffset='".$textOffsetY."' data-textnormal='".$textY."'");
	$layerSettings->addTextBox("layer_top", "",ControllerExtensionModulerevslideropencart::$lang_var['Y'],$params);

	$layerSettings->addTextBox("layer_align_hor", "left",ControllerExtensionModulerevslideropencart::$lang_var['Hor_Align'],array("hidden"=>true));
	$layerSettings->addTextBox("layer_align_vert", "top",ControllerExtensionModulerevslideropencart::$lang_var['Vert_Align'],array("hidden"=>true));

	$para = array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['nbsp_auto'], 'hidden'=>true);
	$layerSettings->addTextBox("layer_max_width", "auto",ControllerExtensionModulerevslideropencart::$lang_var['Max_Width'],$para);
	$layerSettings->addTextBox("layer_max_height", "auto",ControllerExtensionModulerevslideropencart::$lang_var['Max_Height'],$para);
	
	$layerSettings->addTextBox("layer_2d_rotation", "0",ControllerExtensionModulerevslideropencart::$lang_var['2D_Rotation'],array("hidden"=>false, 'unit'=>'&nbsp;(-360 - 360)'));
	$layerSettings->addTextBox("layer_2d_origin_x", "50",ControllerExtensionModulerevslideropencart::$lang_var['Rotation_Origin_X'],array("hidden"=>false, 'unit'=>'%&nbsp;(-100 - 200)'));
	$layerSettings->addTextBox("layer_2d_origin_y", "50",ControllerExtensionModulerevslideropencart::$lang_var['Rotation_Origin_Y'],array("hidden"=>false, 'unit'=>'%&nbsp;(-100 - 200)'));

	//advanced params
	$arrWhiteSpace = array("normal"=>ControllerExtensionModulerevslideropencart::$lang_var['Normal'],
						"pre"=>ControllerExtensionModulerevslideropencart::$lang_var['Pre'],
						"nowrap"=>ControllerExtensionModulerevslideropencart::$lang_var['No_Wrap'],
						"pre-wrap"=>ControllerExtensionModulerevslideropencart::$lang_var['Pre_Wrap'],
						"pre-line"=>ControllerExtensionModulerevslideropencart::$lang_var['Pre_Line']);


	$layerSettings->addSelect("layer_whitespace", $arrWhiteSpace, ControllerExtensionModulerevslideropencart::$lang_var['White_Space'],"nowrap", array("hidden"=>true));


	$layerSettings->addSelect("layer_slide_link", $arrSlideLinkLayers, ControllerExtensionModulerevslideropencart::$lang_var['Link_To_Slide'],"nothing");

	$params = array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['px'],"hidden"=>true);
	$layerSettings->addTextBox("layer_scrolloffset", "0",ControllerExtensionModulerevslideropencart::$lang_var['Scroll_Under_Slider'],$params);

	$layerSettings->addButton("button_change_image_source", ControllerExtensionModulerevslideropencart::$lang_var['Change_Image_Source'],array("hidden"=>true,"class"=>"button-primary revblue"));
	$layerSettings->addTextBox("layer_alt", "","Alt Text",array("hidden"=>true, "class"=>"area-alt-params"));
	$layerSettings->addButton("button_edit_video", ControllerExtensionModulerevslideropencart::$lang_var['Edit_Video'],array("hidden"=>true,"class"=>"button-primary revblue"));



	$params = array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['ms']);
	$paramssplit = array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['ms_keep_low']);
	$params_1 = array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['ms'], 'hidden'=>true);
	$layerSettings->addTextBox("layer_endtime", "",ControllerExtensionModulerevslideropencart::$lang_var['End_Time'],$params_1);
	$layerSettings->addTextBox("layer_endspeed", "",ControllerExtensionModulerevslideropencart::$lang_var['End_Duration'],$params);
	$layerSettings->addTextBox("layer_endsplitdelay", "10","End Split Delay",$paramssplit);
	$layerSettings->addSelect("layer_endsplit", $arrSplit,ControllerExtensionModulerevslideropencart::$lang_var['Split_Text_per'],"none");
	$layerSettings->addSelect("layer_endanimation",$arrEndAnimations,ControllerExtensionModulerevslideropencart::$lang_var['End_Animation'],"auto");
	$layerSettings->addSelect("layer_endeasing", $arrEndEasing, ControllerExtensionModulerevslideropencart::$lang_var['End_Easing'],"nothing");
	$params = array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['ms']);

	//advanced params
	$arrCorners = array("nothing"=>ControllerExtensionModulerevslideropencart::$lang_var['No_Corner'],
						"curved"=>ControllerExtensionModulerevslideropencart::$lang_var['Sharp'],
						"reverced"=>ControllerExtensionModulerevslideropencart::$lang_var['Sharp_Reversed']);
	$params = array();
	$layerSettings->addSelect("layer_cornerleft", $arrCorners, ControllerExtensionModulerevslideropencart::$lang_var['Left_Corner'],"nothing",$params);
	$layerSettings->addSelect("layer_cornerright", $arrCorners, ControllerExtensionModulerevslideropencart::$lang_var['Right_Corner'],"nothing",$params);
	$layerSettings->addCheckbox("layer_resizeme", true,ControllerExtensionModulerevslideropencart::$lang_var['Responsive_Levels'],$params);

	$params = array();
	$layerSettings->addTextBox("layer_id", "",ControllerExtensionModulerevslideropencart::$lang_var['ID'],$params);
	$layerSettings->addTextBox("layer_classes", "",ControllerExtensionModulerevslideropencart::$lang_var['Classes'],$params);
	$layerSettings->addTextBox("layer_title", "",ControllerExtensionModulerevslideropencart::$lang_var['Title'],$params);
	$layerSettings->addTextBox("layer_rel", "",ControllerExtensionModulerevslideropencart::$lang_var['Rel'],$params);

	//Loop Animation
	$arrAnims = array("none"=>ControllerExtensionModulerevslideropencart::$lang_var['Disabled'],
						"rs-pendulum"=>ControllerExtensionModulerevslideropencart::$lang_var['Pendulum'],
						"rs-slideloop"=>ControllerExtensionModulerevslideropencart::$lang_var['Slideloop'],
						"rs-pulse"=>ControllerExtensionModulerevslideropencart::$lang_var['Pulse'],
						"rs-wave"=>ControllerExtensionModulerevslideropencart::$lang_var['Wave']
						);

	$params = array();
	$layerSettings->addSelect("layer_loop_animation", $arrAnims, ControllerExtensionModulerevslideropencart::$lang_var['Animation'],"none",$params);
	$layerSettings->addTextBox("layer_loop_speed", "2",ControllerExtensionModulerevslideropencart::$lang_var['Speed'],array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['nbsp']));
	$layerSettings->addTextBox("layer_loop_startdeg", "-20",ControllerExtensionModulerevslideropencart::$lang_var['Start_Degree']);
	$layerSettings->addTextBox("layer_loop_enddeg", "20",ControllerExtensionModulerevslideropencart::$lang_var['End_Degree'],array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['nbsp']));
	$layerSettings->addTextBox("layer_loop_xorigin", "50",ControllerExtensionModulerevslideropencart::$lang_var['x_Origin'],array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['%']));
	$layerSettings->addTextBox("layer_loop_yorigin", "50",ControllerExtensionModulerevslideropencart::$lang_var['y_Origin'],array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['%_250']));
	$layerSettings->addTextBox("layer_loop_xstart", "0",ControllerExtensionModulerevslideropencart::$lang_var['x_Start_Pos'],array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['px']));
	$layerSettings->addTextBox("layer_loop_xend", "0",ControllerExtensionModulerevslideropencart::$lang_var['x_End_Pos'],array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['2000px_2000px']));
	$layerSettings->addTextBox("layer_loop_ystart", "0",ControllerExtensionModulerevslideropencart::$lang_var['y_Start_Pos'],array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['px']));
	$layerSettings->addTextBox("layer_loop_yend", "0",ControllerExtensionModulerevslideropencart::$lang_var['y_End_Pos'],array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['px_2000px']));
	$layerSettings->addTextBox("layer_loop_zoomstart", "1",ControllerExtensionModulerevslideropencart::$lang_var['Start_Zoom']);
	$layerSettings->addTextBox("layer_loop_zoomend", "1",ControllerExtensionModulerevslideropencart::$lang_var['End_Zoom'],array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['nbsp_20']));
	$layerSettings->addTextBox("layer_loop_angle", "0",ControllerExtensionModulerevslideropencart::$lang_var['Angle'],array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['0°_360°']));
	$layerSettings->addTextBox("layer_loop_radius", "10",ControllerExtensionModulerevslideropencart::$lang_var['Radius'],array("unit"=>ControllerExtensionModulerevslideropencart::$lang_var['0px_2000px']));
	$layerSettings->addSelect("layer_loop_easing", $arrEasing, ControllerExtensionModulerevslideropencart::$lang_var['Easing'],"Power3.easeInOut");

	self::storeSettings("layer_settings",$layerSettings);

	//store settings of content css for editing on the client.
	self::storeSettings("css_captions_content",$contentCSS);

?>