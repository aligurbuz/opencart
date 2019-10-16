			<?php
				
				//set "slider_main" settings
				$sliderMainSettings = new UniteSettingsAdvancedRev();
				
				$sliderMainSettings->addTextBox("title", "",ControllerExtensionModulerevslideropencart::$lang_var['Slider_Title'],array("description"=>ControllerExtensionModulerevslideropencart::$lang_var['title_slider'],"required"=>"true"));	
				$sliderMainSettings->addTextBox("alias", "",ControllerExtensionModulerevslideropencart::$lang_var['Slider_Alias'],array("description"=>ControllerExtensionModulerevslideropencart::$lang_var['alias_slider'],"required"=>"true"));
				
				$sliderMainSettings->addHr();
				

				
				//source type
				$arrSourceTypes = array("posts"=>ControllerExtensionModulerevslideropencart::$lang_var['Posts'],
										"specific_posts"=>ControllerExtensionModulerevslideropencart::$lang_var['Specific_Post'],
										"gallery"=>ControllerExtensionModulerevslideropencart::$lang_var['Gallery']);
				
				$sliderMainSettings->addRadio("source_type",$arrSourceTypes,ControllerExtensionModulerevslideropencart::$lang_var['Source_Type'], "gallery"); 
				
				$sliderMainSettings->startBulkControl("source_type", UniteSettingsRev::CONTROL_TYPE_SHOW, "posts");
										
					//post types
					$arrPostTypes = UniteFunctionsWPRev::getPostTypesAssoc(array("product"));
					
					$arrParams = array("args"=>"multiple size='5'");
					$sliderMainSettings->addSelect("post_types", $arrPostTypes, ControllerExtensionModulerevslideropencart::$lang_var['Products'],"product",$arrParams);
	
					//post categories
					$arrParams = array("args"=>"multiple size='7'");
					$sliderMainSettings->addSelect("post_category", array(), ControllerExtensionModulerevslideropencart::$lang_var['Product_Categories'],"",$arrParams);
					
					//sort by
					$arrSortBy = UniteFunctionsWPRev::getArrSortBy();

					$sliderMainSettings->addSelect("post_sortby", $arrSortBy, ControllerExtensionModulerevslideropencart::$lang_var['Sort_Posts'],RevSlider::DEFAULT_POST_SORTBY);

					//start set IMages Size
					$arrParams = array("class"=>"small","unit"=>"posts");
					$sliderMainSettings->addTextBox("prd_img_width", "880", ControllerExtensionModulerevslideropencart::$lang_var['Product_Image_Width'], $arrParams);
					$sliderMainSettings->addTextBox("prd_img_height", "345",ControllerExtensionModulerevslideropencart::$lang_var['Product_Image_Height'], $arrParams);
					//End set IMages Size

					//sort direction
					$arrSortDir = UniteFunctionsWPRev::getArrSortDirection();
					$sliderMainSettings->addRadio("posts_sort_direction", $arrSortDir, ControllerExtensionModulerevslideropencart::$lang_var['Sort_Direction'], RevSlider::DEFAULT_POST_SORTDIR);
					
					//max posts for slider
					$arrParams = array("class"=>"small","unit"=>"posts");
					$sliderMainSettings->addTextBox("max_slider_posts", "30",ControllerExtensionModulerevslideropencart::$lang_var['Max_Posts'], $arrParams);
					
					//exerpt limit
					$arrParams = array("class"=>"small","unit"=>"words");		
					$sliderMainSettings->addTextBox("excerpt_limit", "55", ControllerExtensionModulerevslideropencart::$lang_var['Limit_Excerpt'], $arrParams);
										
					//slider template
					$sliderMainSettings->addhr();
					
					$slider1 = new RevSlider();
					$arrSlidersTemplates = $slider1->getArrSlidersShort(null,RevSlider::SLIDER_TYPE_TEMPLATE);				
					$sliderMainSettings->addSelect("slider_template_id", $arrSlidersTemplates, ControllerExtensionModulerevslideropencart::$lang_var['Template_Slider'],"",array());
					
				$sliderMainSettings->endBulkControl();
				
				$arrParams = array("description"=>ControllerExtensionModulerevslideropencart::$lang_var['Type_post']);
				$sliderMainSettings->addTextBox("posts_list","",ControllerExtensionModulerevslideropencart::$lang_var['Specific_Posts'],$arrParams);
				$sliderMainSettings->addControl("source_type", "posts_list", UniteSettingsRev::CONTROL_TYPE_SHOW, "specific_posts");
				
				$sliderMainSettings->addHr();
				
				//set slider type / texts
				$sliderMainSettings->addRadio("slider_type", array("fixed"=>ControllerExtensionModulerevslideropencart::$lang_var['Fixed'],
					"responsitive"=>ControllerExtensionModulerevslideropencart::$lang_var['Custom'],
					"fullwidth"=>ControllerExtensionModulerevslideropencart::$lang_var['Auto_Responsive'],
					"fullscreen"=>ControllerExtensionModulerevslideropencart::$lang_var['Full_Screen']
					),ControllerExtensionModulerevslideropencart::$lang_var['Slider_Layout'],		
					"fullwidth");
			
				$arrParams = array("class"=>"medium","description"=>ControllerExtensionModulerevslideropencart::$lang_var['height_screen']);
				$sliderMainSettings->addTextBox("fullscreen_offset_container", "",ControllerExtensionModulerevslideropencart::$lang_var['Offset_Containers'], $arrParams);
				
				$sliderMainSettings->addControl("slider_type", "fullscreen_offset_container", UniteSettingsRev::CONTROL_TYPE_SHOW, "fullscreen");
				
				$arrParams = array("class"=>"medium","description"=>ControllerExtensionModulerevslideropencart::$lang_var['Defines_Offset']);
				$sliderMainSettings->addTextBox("fullscreen_offset_size", "",ControllerExtensionModulerevslideropencart::$lang_var['Offset_Size'], $arrParams);
				
				$sliderMainSettings->addControl("slider_type", "fullscreen_offset_size", UniteSettingsRev::CONTROL_TYPE_SHOW, "fullscreen");
				
				$arrParams = array("description"=>"");
				$sliderMainSettings->addTextBox("fullscreen_min_height", "",ControllerExtensionModulerevslideropencart::$lang_var['Fullscreen_Height'], $arrParams);
				
				$sliderMainSettings->addControl("slider_type", "fullscreen_min_height", UniteSettingsRev::CONTROL_TYPE_SHOW, "fullscreen");
					
				$sliderMainSettings->addRadio("full_screen_align_force", array("on"=>ControllerExtensionModulerevslideropencart::$lang_var['On'], "off"=>ControllerExtensionModulerevslideropencart::$lang_var['Off']),ControllerExtensionModulerevslideropencart::$lang_var['FullScreen_Align'],"off");
				
				
				$sliderMainSettings->addRadio("auto_height", array("on"=>ControllerExtensionModulerevslideropencart::$lang_var['On'], "off"=>ControllerExtensionModulerevslideropencart::$lang_var['Off']),ControllerExtensionModulerevslideropencart::$lang_var['Unlimited_Height'],"off");
				$sliderMainSettings->addRadio("force_full_width", array("on"=>ControllerExtensionModulerevslideropencart::$lang_var['On'], "off"=>ControllerExtensionModulerevslideropencart::$lang_var['Off']),ControllerExtensionModulerevslideropencart::$lang_var['Force_Full_Width'],"off");
				
				$arrParams = array("description"=>"");
				$sliderMainSettings->addTextBox("min_height", "0",ControllerExtensionModulerevslideropencart::$lang_var['Min_Height'], $arrParams);
				
				$paramsSize = array("width"=>960,"height"=>350,"datatype"=>UniteSettingsRev::DATATYPE_NUMBER,"description"=>ControllerExtensionModulerevslideropencart::$lang_var['LAYERS_GRID_desc']);
				$sliderMainSettings->addCustom("slider_size", "slider_size","",ControllerExtensionModulerevslideropencart::$lang_var['Layers_Grid'],$paramsSize);
				
				
				$paramsResponsitive = array("w1"=>940,"sw1"=>770,"w2"=>780,"sw2"=>500,"w3"=>510,"sw3"=>310,"datatype"=>UniteSettingsRev::DATATYPE_NUMBER);
				$sliderMainSettings->addCustom("responsitive_settings", "responsitive","",ControllerExtensionModulerevslideropencart::$lang_var['Responsive_Sizes'],$paramsResponsitive);

				$sliderMainSettings->addHr();
				
				self::storeSettings("slider_main",$sliderMainSettings);
				
				//set "slider_params" settings. 
				$sliderParamsSettings = new UniteSettingsAdvancedRev();	
				$sliderParamsSettings->loadXMLFile(self::$path_settings."/slider_settings.xml");
				
				//update transition type setting.
				$settingFirstType = $sliderParamsSettings->getSettingByName("first_transition_type");
				$operations = new RevOperations();
				$arrTransitions = $operations->getArrTransition();
				if(count($arrTransitions) == 0) $arrTransitions = $operations->getArrTransition(true);
				$settingFirstType["items"] = $arrTransitions;
				$sliderParamsSettings->updateArrSettingByName("first_transition_type", $settingFirstType);
				
				//store params
				self::storeSettings("slider_params",$sliderParamsSettings);
				 
				?>
				