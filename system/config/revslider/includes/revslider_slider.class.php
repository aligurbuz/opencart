<?php

	class RevSlider extends UniteElementsBaseRev{

		const DEFAULT_POST_SORTBY = "ID";
		const DEFAULT_POST_SORTDIR = "DESC";
		
		const VALIDATE_NUMERIC = "numeric";
		const VALIDATE_EMPTY = "empty";
		const FORCE_NUMERIC = "force_numeric";
		
		const SLIDER_TYPE_GALLERY = "gallery";
		const SLIDER_TYPE_POSTS = "posts";
		const SLIDER_TYPE_TEMPLATE = "template";
		const SLIDER_TYPE_ALL = "all";
		
		private $id;
		private $title;
		private $alias;
		private $arrParams;
		private $arrSlides = null;
		
		public function __construct(){
			parent::__construct();

		}
		
		
		/**
		 * 
		 * return if the slider is inited or not
		 */
		public function isInited(){
			if(!empty($this->id))
				return(true);
				
			return(false);
		}
		
		
		/**
		 * 
		 * validate that the slider is inited. if not - throw error
		 */
		private function validateInited(){
			if(empty($this->id))
				UniteFunctionsRev::throwError("The slider is not inited!");
		}
		
		/**
		 * 
		 * init slider by db data
		 * 
		 */
		public function initByDBData($arrData){
			$this->id = $arrData["id"];
			$this->title = $arrData["title"];
			$this->alias = $arrData["alias"];
			
			$params = $arrData["params"];
			$params_org = htmlspecialchars_decode(trim($params));
			$params = (array)json_decode($params_org);
			
			$this->arrParams = $params;
		}
		
		
		/**
		 * 
		 * init the slider object by database id
		 */
		public function initByID($sliderID){
			UniteFunctionsRev::validateNumeric($sliderID,"Slider ID");
			$sliderID = $this->db->escape($sliderID);
			try{
				$sliderData = $this->db->fetchSingle(GlobalsRevSlider::$table_sliders,"id=$sliderID");								
			}catch(Exception $e){
				UniteFunctionsRev::throwError("Slider with ID: $sliderID Not Found");
			}
			$this->initByDBData($sliderData);
		}

		/**
		 * 
		 * init slider by alias
		 */
		public function initByAlias($alias){
			$alias = $this->db->escape($alias);

			try{
				$where = "alias='$alias'";
				
				$sliderData = $this->db->fetchSingle(GlobalsRevSlider::$table_sliders,$where);
				
			}catch(Exception $e){
				$arrAliases = $this->getAllSliderAliases();
				$strAliases = "";
				if(!empty($arrAliases))
					$strAliases = "'".implode("' or '", $arrAliases)."'";
					
				$errorMessage = "Slider with alias <strong>$alias</strong> not found.";
				if(!empty($strAliases))
					$errorMessage .= " <br><br>Maybe you mean: ".$strAliases;
					
				UniteFunctionsRev::throwError($errorMessage);
			}
			
			$this->initByDBData($sliderData);
		}
		
		
		/**
		 * 
		 * init by id or alias
		 */
		public function initByMixed($mixed){
			if(is_numeric($mixed))
				$this->initByID($mixed);
			else
				$this->initByAlias($mixed);
		}
		
		
		/**
		 * 
		 * get data functions
		 */
		public function getTitle(){
			return($this->title);
		}
		
		public function getID(){
			return($this->id);
		}
		
		public function getParams(){
			return($this->arrParams);
		}
		
		/**
		 * 
		 * set slider params
		 */
		public function setParams($arrParams){
			$this->arrParams = $arrParams;
		}
		
		
		/**
		 * 
		 * get parameter from params array. if no default, then the param is a must!
		 */
		function getParam($name,$default=null,$validateType = null,$title=""){


			if($default === null){
				if(!array_key_exists($name, $this->arrParams))
					UniteFunctionsRev::throwError("The param <b>$name</b> not found in slider params.");
				
				$default = "";
			}
			
			$value = UniteFunctionsRev::getVal($this->arrParams, $name,$default);
						
			//validation:
			switch($validateType){
				case self::VALIDATE_NUMERIC:
				case self::VALIDATE_EMPTY:
					$paramTitle = !empty($title)?$title:$name;
					if($value !== "0" && $value !== 0 && empty($value))
						UniteFunctionsRev::throwError("The param <strong>$paramTitle</strong> should not be empty.");
				break;
				case self::VALIDATE_NUMERIC:
					$paramTitle = !empty($title)?$title:$name;
					if(!is_numeric($value))
						UniteFunctionsRev::throwError("The param <strong>$paramTitle</strong> should be numeric. Now it's: $value");
				break;
				case self::FORCE_NUMERIC:
					if(!is_numeric($value)){
						$value = 0;
						if(!empty($default))
							$value = $default;
					}
				break; 
			}
			
			return $value;
		}
		
		public function getAlias(){
			return($this->alias);
		}
		
		/**
		 * get combination of title (alias)
		 */
		public function getShowTitle(){
			$showTitle = $this->title." ($this->alias)";
			return($showTitle);
		}
		
		/**
		 * 
		 * get slider shortcode
		 */
		public function getShortcode(){
			$shortCode = "[rev_slider ".$this->alias."]";
			return($shortCode);
		}
		
		
		/**
		 * 
		 * check if alias exists in DB
		 */
		public function isAliasExistsInDB($alias){
			$alias = $this->db->escape($alias);
			
			$where = "alias='$alias'";
			if(!empty($this->id))
				$where .= " and id != '".$this->id."'";
				
			$response = $this->db->fetch(GlobalsRevSlider::$table_sliders,$where);
			return(!empty($response));
			
		}
		
        
		/**
		 * 
		 * check if alias exists in DB
		 */
		public static function isAliasExists($alias){
         //   global $wpdb;
            $wpdb = rev_db_class::rev_db_instance();
            $response = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".GlobalsRevSlider::$table_sliders." WHERE alias = %s", $alias));
                                     
			return(!empty($response));
		}
        
		
		/**
		 * 
		 * validate settings for add
		 */
		private function validateInputSettings($title,$alias,$params){
			UniteFunctionsRev::validateNotEmpty($title,"title");
			UniteFunctionsRev::validateNotEmpty($alias,"alias");
			
			if($this->isAliasExistsInDB($alias))
				UniteFunctionsRev::throwError("Some other slider with alias '$alias' already exists");
			
			$sourceType = UniteFunctionsRev::getVal($params, "source_type");
			$tempaletID =  UniteFunctionsRev::getVal($params, "slider_template_id");
			
			if($sourceType == "posts" && empty($tempaletID))
				UniteFunctionsRev::throwError("The slider should have a template, please create a slider through 'Create New Slider Template' that will be a template to this slider.");
			
		}
		
		
		
		/**
		 * 
		 * create / update slider from options
		 */
		private function createUpdateSliderFromOptions($options,$sliderID = null, $settingsMain, $settingsParams){
			
			$arrMain = UniteFunctionsRev::getVal($options, "main");
			$params = UniteFunctionsRev::getVal($options, "params");
			$isTemplate = UniteFunctionsRev::getVal($options, "template");
			
			if($isTemplate == "true")
				$params['template'] = "true";
			else
				$params['template'] = "false";
				
			//trim all input data
			$arrMain = UniteFunctionsRev::trimArrayItems($arrMain);
			
			//modify the data
			$arrMain = $settingsMain->setStoredValues($arrMain);
			
			$params = UniteFunctionsRev::trimArrayItems($params);
			$params = $settingsParams->setStoredValues($params);
			
			$params = array_merge($arrMain,$params);
			
			$title = UniteFunctionsRev::getVal($arrMain, "title");
			$alias = UniteFunctionsRev::getVal($arrMain, "alias");
			
			if(!empty($sliderID))
				$this->initByID($sliderID);
				
			$this->validateInputSettings($title, $alias, $params);
			
			$jsonParams = json_encode($params);
			
			//insert slider to database
			$arrData = array();
			$arrData["title"] = $title;
			$arrData["alias"] = $alias;
			$arrData["params"] = $jsonParams;
			
			if(empty($sliderID)){	//create slider	
				$sliderID = $this->db->insert(GlobalsRevSlider::$table_sliders,$arrData);
				return($sliderID);
				
			}else{	//update slider
				$this->initByID($sliderID);
				
				$sliderID = $this->db->update(GlobalsRevSlider::$table_sliders,$arrData,array("id"=>$sliderID));				
			}
		}
		
		
		
		/**
		 * 
		 * delete slider from datatase
		 */
		private function deleteSlider(){			
			
			$this->validateInited();
			
			//delete slider
			$this->db->delete(GlobalsRevSlider::$table_sliders,"id=".$this->id);
			
			//delete slides
			$this->deleteAllSlides();
			$this->deleteStaticSlide();
		}

		/**
		 * 
		 * delete all slides
		 */
		private function deleteAllSlides(){
			$this->validateInited();
			
			$this->db->delete(GlobalsRevSlider::$table_slides,"slider_id=".$this->id);			
		}
		

		/**
		 * 
		 * delete all slides
		 */
		private function deleteStaticSlide(){
			$this->validateInited();
			
			$this->db->delete(GlobalsRevSlider::$table_static_slides,"slider_id=".$this->id);			
		}
		
		
		/**
		 * 
		 * get all slide children
		 */
		public function getArrSlideChildren($slideID){
		
			$this->validateInited();
			$arrSlides = $this->getSlidesFromGallery();
			if(!isset($arrSlides[$slideID]))
				UniteFunctionsRev::throwError("Slide with id: $slideID not found in the main slides of the slider. Maybe it's child slide.");
			
			$slide = $arrSlides[$slideID];
			$arrChildren = $slide->getArrChildren();
			
			return($arrChildren);
		}
		
		
		
		/**
		 * 
		 * duplicate slider in datatase
		 */
		private function duplicateSlider(){			
			
			$this->validateInited();
			
			//get slider number:
			$response = $this->db->fetch(GlobalsRevSlider::$table_sliders);
			$numSliders = count($response);
			$newSliderSerial = $numSliders+1;
			
			$newSliderTitle = "Slider".$newSliderSerial;
			$newSliderAlias = "slider".$newSliderSerial;
			
			//insert a new slider
			$sqlSelect = "select ".GlobalsRevSlider::FIELDS_SLIDER." from ".GlobalsRevSlider::$table_sliders." where id=".$this->id."";
			$sqlInsert = "insert into ".GlobalsRevSlider::$table_sliders." (".GlobalsRevSlider::FIELDS_SLIDER.") ($sqlSelect)";

			$this->db->runSql($sqlInsert);
			$lastID = $this->db->getLastInsertID();
			UniteFunctionsRev::validateNotEmpty($lastID);
			
			//update the new slider with the title and the alias values
			$arrUpdate = array();
			$arrUpdate["title"] = $newSliderTitle;
			$arrUpdate["alias"] = $newSliderAlias;
			
			//update params
			$params = $this->arrParams;
			$params["title"] = $newSliderTitle;
			$params["alias"] = $newSliderAlias;
			$jsonParams = json_encode($params);
			$arrUpdate["params"] = $jsonParams;
			
			$this->db->update(GlobalsRevSlider::$table_sliders, $arrUpdate, array("id"=>$lastID));
			
			
			//duplicate slides
			$fields_slide = GlobalsRevSlider::FIELDS_SLIDE;
			$fields_slide = str_replace("slider_id", $lastID, $fields_slide);
			
			$sqlSelect = "select ".$fields_slide." from ".GlobalsRevSlider::$table_slides." where slider_id=".$this->id;
			$sqlInsert = "insert into ".GlobalsRevSlider::$table_slides." (".GlobalsRevSlider::FIELDS_SLIDE.") ($sqlSelect)";
			
			$this->db->runSql($sqlInsert);
			
			//duplicate static slide if exists
			$slide = new RevSlide();
			$staticID = $slide->getStaticSlideID($this->id);
			if($staticID !== false){
				$record = $this->db->fetchSingle(GlobalsRevSlider::$table_static_slides,"id=$staticID");
				unset($record['id']);
				$record['slider_id'] = $lastID;
				
				$this->db->insert(GlobalsRevSlider::$table_static_slides, $record);
			}
		}
		
		
		/**
		 * 
		 * duplicate slide
		 */
		public function duplicateSlide($slideID){
			$slide = new RevSlide();
			$slide->initByID($slideID);
			$order = $slide->getOrder();
			$slides = $this->getSlidesFromGallery();
			$newOrder = $order+1;
			$this->shiftOrder($newOrder);
			
			//do duplication
			$sqlSelect = "select ".GlobalsRevSlider::FIELDS_SLIDE." from ".GlobalsRevSlider::$table_slides." where id=".$slideID;
			$sqlInsert = "insert into ".GlobalsRevSlider::$table_slides." (".GlobalsRevSlider::FIELDS_SLIDE.") ($sqlSelect)";
			
			$this->db->runSql($sqlInsert);
			$lastID = $this->db->getLastInsertID();
			UniteFunctionsRev::validateNotEmpty($lastID);
			
			//update order
			$arrUpdate = array("slide_order"=>$newOrder);
			
			$this->db->update(GlobalsRevSlider::$table_slides,$arrUpdate, array("id"=>$lastID));
			
			return($lastID);
		}
		
		
		/**
		 * 
		 * copy / move slide
		 */		
		private function copyMoveSlide($slideID,$targetSliderID,$operation){
			
			if($operation == "move"){
				
				$targetSlider = new RevSlider();
				$targetSlider->initByID($targetSliderID);
				$maxOrder = $targetSlider->getMaxOrder();
				$newOrder = $maxOrder+1;
				$arrUpdate = array("slider_id"=>$targetSliderID,"slide_order"=>$newOrder);	
								
				//update children
				$arrChildren = $this->getArrSlideChildren($slideID);
				foreach($arrChildren as $child){
					$childID = $child->getID();
					$this->db->update(GlobalsRevSlider::$table_slides,$arrUpdate,array("id"=>$childID));
				}
				
				$this->db->update(GlobalsRevSlider::$table_slides,$arrUpdate,array("id"=>$slideID));
				
			}else{	//in place of copy
				$newSlideID = $this->duplicateSlide($slideID);
				$this->duplicateChildren($slideID, $newSlideID);
				
				$this->copyMoveSlide($newSlideID,$targetSliderID,"move");
			}
		}
		
		
		/**
		 * 
		 * shift order of the slides from specific order
		 */
		private function shiftOrder($fromOrder){
			
			$where = " slider_id=".$this->id." and slide_order >= $fromOrder";
			$sql = "update ".GlobalsRevSlider::$table_slides." set slide_order=(slide_order+1) where $where";
			$this->db->runSql($sql);
			
		}
		
		
		/**
		 * 
		 * create slider in database from options
		 */
		public function createSliderFromOptions($options,$settingsMain,$settingsParams){
			$sliderID = $this->createUpdateSliderFromOptions($options,null,$settingsMain,$settingsParams);
			return($sliderID);			
		}
		public function exportSlider($useDummy = false){
			$export_zip = true;
			if(function_exists("unzip_file") == false){		
				if(UniteZipRev::isZipExists() == false)
					$export_zip = false;
			}
			if(!class_exists('ZipArchive'))
			 $export_zip = false;
			if($export_zip){
				$zip = new ZipArchive;
				// $success = $zip->open(GlobalsRevSlider::$urlExportZip, ZIPARCHIVE::CREATE | ZipArchive::OVERWRITE);
				$success = $zip->open(GlobalsRevSlider::$urlExportZip,ZipArchive::OVERWRITE);
				if($success !== true)
					throwError("Can't create zip file: ".GlobalsRevSlider::$urlExportZip);
				$this->validateInited();
				$sliderParams = $this->getParamsForExport();
				$arrSlides = $this->getSlidesForExport($useDummy);
				$arrStaticSlide = $this->getStaticSlideForExport($useDummy);
				$arrSliderExport = array("params"=>$sliderParams,"slides"=>$arrSlides);
				if(!empty($arrStaticSlide))
					$arrSliderExport['static_slides'] = $arrStaticSlide;
				$strExport = serialize($arrSliderExport);
				$exportname =(!empty($this->alias)) ? $this->alias.'.zip' : "slider_export.zip";
				$usedCaptions = array();
				$usedAnimations = array();
				$usedImages = array();
				if(!empty($arrSlides) && count($arrSlides) > 0){
					foreach($arrSlides as $key => $slide){
						if(isset($slide['params']['image']) && $slide['params']['image'] != '')
						 $usedImages[$slide['params']['image']] = true;
						if(isset($slide['layers']) && !empty($slide['layers']) && count($slide['layers']) > 0){
							foreach($slide['layers'] as $lKey => $layer){
								if(isset($layer['style']) && $layer['style'] != '') $usedCaptions[$layer['style']] = true;
								if(isset($layer['animation']) && $layer['animation'] != '' && strpos($layer['animation'], 'customin') !== false) $usedAnimations[str_replace('customin-', '', $layer['animation'])] = true;
								if(isset($layer['endanimation']) && $layer['endanimation'] != '' && strpos($layer['endanimation'], 'customout') !== false) $usedAnimations[str_replace('customout-', '', $layer['endanimation'])] = true;
								if(isset($layer['image_url']) && $layer['image_url'] != '')
								$usedImages[$layer['image_url']] = true;
							}
						}
					}
				}
				if(!empty($arrStaticSlide) && count($arrStaticSlide) > 0){
					foreach($arrStaticSlide as $key => $slide){
						if(isset($slide['params']['image']) && $slide['params']['image'] != '') $usedImages[$slide['params']['image']] = true;
						if(isset($slide['layers']) && !empty($slide['layers']) && count($slide['layers']) > 0){
							foreach($slide['layers'] as $lKey => $layer){
								if(isset($layer['style']) && $layer['style'] != '') $usedCaptions[$layer['style']] = true;
								if(isset($layer['animation']) && $layer['animation'] != '' && strpos($layer['animation'], 'customin') !== false) $usedAnimations[str_replace('customin-', '', $layer['animation'])] = true;
								if(isset($layer['endanimation']) && $layer['endanimation'] != '' && strpos($layer['endanimation'], 'customout') !== false) $usedAnimations[str_replace('customout-', '', $layer['endanimation'])] = true;
								if(isset($layer['image_url']) && $layer['image_url'] != '') $usedImages[$layer['image_url']] = true;
							}
						}
					}
				}
				$styles = '';
				if(!empty($usedCaptions)){
					$captions = array();
					foreach($usedCaptions as $class => $val){
						$cap = RevOperations::getCaptionsContentArray($class);
						if(!empty($cap))
							$captions[] = $cap;
					}
					$styles = UniteCssParserRev::parseArrayToCss($captions, "\n");
				}
				$animations = '';
				if(!empty($usedAnimations)){
					$animation = array();
					foreach($usedAnimations as $anim => $val){
						$anima = RevOperations::getFullCustomAnimationByID($anim);
						if($anima !== false) $animation[] = RevOperations::getFullCustomAnimationByID($anim);
					}
					if(!empty($animation)) $animations = serialize($animation);
				}
				if(!empty($usedImages)){
					// $upload_dir = UniteFunctionsWPRev::getPathUploads();
					$upload_dir = get_mainsite_dir();
					foreach($usedImages as $file => $val){
						if($useDummy == "true"){ 
						}else{
							if(strpos($file, 'http') !== false){
							}else{
								if(is_file($upload_dir.$file))
									$zip->addFile(realpath($upload_dir.$file), 'images/'.$file);
							}
						}
					}
				}
				$zip->addFromString("slider_export.txt", $strExport); 
				if(strlen(trim($animations)) > 0) $zip->addFromString("custom_animations.txt", $animations);
				if(strlen(trim($styles)) > 0) $zip->addFromString("dynamic-captions.css", $styles);
				$static_css = RevOperations::getStaticCss();
				$zip->addFromString("static-captions.css", $static_css);
				$zip->close();
				header("Content-type: application/zip");
				header("Content-Disposition: attachment; filename=".$exportname);
				header("Pragma: no-cache");
				header("Expires: 0");
				readfile(GlobalsRevSlider::$urlExportZip);
				@unlink(GlobalsRevSlider::$urlExportZip);
			}else{

				$this->validateInited();
			
				$sliderParams = $this->getParamsForExport();
				$arrSlides = $this->getSlidesForExport();
				
				$arrSliderExport = array("params"=>$sliderParams,"slides"=>$arrSlides);
				
				$strExport = serialize($arrSliderExport);
				
				if(!empty($this->alias))
					$filename = $this->alias.".txt";
				else
					$filename = "slider_export.txt";
				
				UniteFunctionsRev::downloadFile($strExport,$filename);
			}
		}
		
		public function importSliderFromPost($updateAnim = true, $updateStatic = true){
			try{
				$sliderID = UniteFunctionsRev::getPostVariable("sliderid");
				$sliderExists = !empty($sliderID);
				if($sliderExists)
					$this->initByID($sliderID);
				$filepath = $_FILES["import_file"]["tmp_name"];
				if(file_exists($filepath) == false)
					UniteFunctionsRev::throwError("Import file not found!!!");
				if(!class_exists("ZipArchive")){
					$importZip = false;
				}else{
					$zip = new ZipArchive;
					$importZip = $zip->open($filepath, ZIPARCHIVE::CREATE);
				}
				if($importZip === true){
					$slider_export = $zip->getStream('slider_export.txt');
					$custom_animations = $zip->getStream('custom_animations.txt');
					$dynamic_captions = $zip->getStream('dynamic-captions.css');
					$static_captions = $zip->getStream('static-captions.css');
					if(!$slider_export)  UniteFunctionsRev::throwError("slider_export.txt does not exist!");
					$content = '';
					$animations = '';
					$dynamic = '';
					$static = '';
					while (!feof($slider_export)) $content .= fread($slider_export, 1024);
					if($custom_animations){ while (!feof($custom_animations)) $animations .= fread($custom_animations, 1024); }
					if($dynamic_captions){ while (!feof($dynamic_captions)) $dynamic .= fread($dynamic_captions, 1024); }
					if($static_captions){ while (!feof($static_captions)) $static .= fread($static_captions, 1024); }

					fclose($slider_export);
					if($custom_animations){ fclose($custom_animations); }
					if($dynamic_captions){ fclose($dynamic_captions); }
					if($static_captions){ fclose($static_captions); }
				}else{
					$content = @file_get_contents($filepath);
				}
				if($importZip === true){
					$db = new UniteDBRev();
					$animations = @unserialize($animations);
					if(!empty($animations)){
						foreach($animations as $key => $animation){
							$exist = $db->fetch(GlobalsRevSlider::$table_layer_anims, "handle = '".$animation['handle']."'");
							if(!empty($exist)){
								if($updateAnim == "true"){
									$arrUpdate = array();
									$arrUpdate['params'] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));
									$db->update(GlobalsRevSlider::$table_layer_anims, $arrUpdate, array('handle' => $animation['handle']));
									
									$id = $exist['0']['id'];
								}else{ 
									$arrInsert = array();
									$arrInsert["handle"] = 'copy_'.$animation['handle'];
									$arrInsert["params"] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));
									
									$id = $db->insert(GlobalsRevSlider::$table_layer_anims, $arrInsert);
								}
							}else{
								$arrInsert = array();
								$arrInsert["handle"] = $animation['handle'];
								$arrInsert["params"] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));
								$id = $db->insert(GlobalsRevSlider::$table_layer_anims, $arrInsert);
							}
							$content = str_replace(array('customin-'.$animation['id'], 'customout-'.$animation['id']), array('customin-'.$id, 'customout-'.$id), $content);	
						}
						dmp(__("animations imported!",REVSLIDER_TEXTDOMAIN));
					}else{
						dmp(__("no custom animations found, if slider uses custom animations, the provided export may be broken...",REVSLIDER_TEXTDOMAIN));
					}
					if(!empty($static)){
						if($updateStatic == "true"){
							RevOperations::updateStaticCss($static);
						}else{
							$static_cur = RevOperations::getStaticCss();
							$static = $static_cur."\n".$static;
							RevOperations::updateStaticCss($static);
						}
					}
					$dynamicCss = UniteCssParserRev::parseCssToArray($dynamic);
					if(is_array($dynamicCss) && $dynamicCss !== false && count($dynamicCss) > 0){
						foreach($dynamicCss as $class => $styles){
							$class = trim($class);
							if((strpos($class, ':hover') === false && strpos($class, ':') !== false) || 
								strpos($class," ") !== false || 
								strpos($class,".tp-caption") === false ||
								(strpos($class,".") === false || strpos($class,"#") !== false) || 
								strpos($class,">") !== false){
								continue;
							}
							if(strpos($class, ':hover') !== false){
								$class = trim(str_replace(':hover', '', $class));
								$arrInsert = array();
								$arrInsert["hover"] = json_encode($styles);
								$arrInsert["settings"] = json_encode(array('hover' => 'true'));
							}else{
								$arrInsert = array();
								$arrInsert["params"] = json_encode($styles);
							}
							$result = $db->fetch(GlobalsRevSlider::$table_css, "handle = '".$class."'");
							if(!empty($result)){
								$db->update(GlobalsRevSlider::$table_css, $arrInsert, array('handle' => $class));
							}else{
								$arrInsert["handle"] = $class;
								$db->insert(GlobalsRevSlider::$table_css, $arrInsert);
							}
						}
						dmp(__("dynamic styles imported!",REVSLIDER_TEXTDOMAIN));
					}else{
						dmp(__("no dynamic styles found, if slider uses dynamic styles, the provided export may be broken...",REVSLIDER_TEXTDOMAIN));
					}
				}
				$content = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $content);
				$arrSlider = @unserialize($content);
					if(empty($arrSlider))
						 UniteFunctionsRev::throwError("Wrong export slider file format! This could be caused because the ZipArchive extension is not enabled.");
				$sliderParams = $arrSlider["params"];
				if($sliderExists){
					$sliderParams["title"] = $this->arrParams["title"];
					$sliderParams["alias"] = $this->arrParams["alias"];
				}
				if(isset($sliderParams["background_image"]))
					$sliderParams["background_image"] = UniteFunctionsWPRev::getImageUrlFromPath($sliderParams["background_image"]);
				$json_params = json_encode($sliderParams);
				if($sliderExists){
					$arrUpdate = array("params"=>$json_params);	
					$this->db->update(GlobalsRevSlider::$table_sliders,$arrUpdate,array("id"=>$sliderID));
				}else{
					$arrInsert = array();
					$arrInsert["params"] = $json_params;
					$arrInsert["title"] = UniteFunctionsRev::getVal($sliderParams, "title","Slider1");
					$arrInsert["alias"] = UniteFunctionsRev::getVal($sliderParams, "alias","slider1");	
					$sliderID = $this->db->insert(GlobalsRevSlider::$table_sliders,$arrInsert);
				}
				if($sliderExists)
					$this->deleteAllSlides();
				$arrSlides = $arrSlider["slides"];
				$alreadyImported = array();
				foreach($arrSlides as $slide){
					$params = $slide["params"];
					$layers = $slide["layers"];
					if(isset($params["image"])){
						if(strpos($params["image"], 'http') !== false){
						}else{
							if(trim($params["image"]) !== ''){
								if($importZip === true){
									$image = $zip->getStream('images/'.$params["image"]);
									if(!$image){
										echo $params["image"].__(' not found!<br>');
									}else{
										if(!isset($alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]])){
											$importImage = UniteFunctionsWPRev::import_media('zip://'.$filepath."#".'images/'.$params["image"], $sliderParams["alias"].'/');
											if($importImage !== false){
												$alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]] = $importImage['path'];
												$params["image"] = $importImage['path'];
											}
										}else{
											$params["image"] = $alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]];
										}
									}
								}
							}
							$params["image"] = UniteFunctionsWPRev::getImageUrlFromPath($params["image"]);
						}
					}

					foreach($layers as $key=>$layer){					
						if(isset($layer["image_url"])){
							if(trim($layer["image_url"]) !== ''){
								if(strpos($layer["image_url"], 'http') !== false){
								}else{
									if($importZip === true){
										$image_url = $zip->getStream('images/'.$layer["image_url"]);
										if(!$image_url){
											echo $layer["image_url"].__(' not found!<br>');
										}else{
											if(!isset($alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]])){
												$importImage = UniteFunctionsWPRev::import_media('zip://'.$filepath."#".'images/'.$layer["image_url"], $sliderParams["alias"].'/');
												if($importImage !== false){
													$alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]] = $importImage['path'];
													$layer["image_url"] = $importImage['path'];
												}
											}else{
												$layer["image_url"] = $alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]];
											}
										}
									}
								}
							}
							$layer["image_url"] = UniteFunctionsWPRev::getImageUrlFromPath($layer["image_url"]);
							$layers[$key] = $layer;
						}
					}
					$arrCreate = array();
					$arrCreate["slider_id"] = $sliderID;
					$arrCreate["slide_order"] = $slide["slide_order"];
					
					$my_layers = json_encode($layers);
					if(empty($my_layers))
						$my_layers = stripslashes(json_encode($layers));
					$my_params = json_encode($params);
					if(empty($my_params))
						$my_params = stripslashes(json_encode($params));
					$arrCreate["layers"] = $my_layers;
					$arrCreate["params"] = $my_params;
					$this->db->insert(GlobalsRevSlider::$table_slides,$arrCreate);
				}
				if(isset($arrSlider['static_slides']) && !empty($arrSlider['static_slides'])){
					$static_slide = $arrSlider['static_slides'];
					foreach($static_slide as $slide){
						$params = $slide["params"];
						$layers = $slide["layers"];
						if(isset($params["image"])){
							if(strpos($params["image"], 'http') !== false){
							}else{
								if(trim($params["image"]) !== ''){
									if($importZip === true){
										$image = $zip->getStream('images/'.$params["image"]);
										if(!$image){
											echo $params["image"].__(' not found!<br>');
										}else{
											if(!isset($alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]])){
												$importImage = UniteFunctionsWPRev::import_media('zip://'.$filepath."#".'images/'.$params["image"], $sliderParams["alias"].'/');
												if($importImage !== false){
													$alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]] = $importImage['path'];
													$params["image"] = $importImage['path'];
												}
											}else{
												$params["image"] = $alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]];
											}
										}
									}
								}
								$params["image"] = UniteFunctionsWPRev::getImageUrlFromPath($params["image"]);
							}
						}
						
						foreach($layers as $key=>$layer){					
							if(isset($layer["image_url"])){
								if(trim($layer["image_url"]) !== ''){
									if(strpos($layer["image_url"], 'http') !== false){
									}else{
										if($importZip === true){
											$image_url = $zip->getStream('images/'.$layer["image_url"]);
											if(!$image_url){
												echo $layer["image_url"].__(' not found!<br>');
											}else{
												if(!isset($alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]])){
													$importImage = UniteFunctionsWPRev::import_media('zip://'.$filepath."#".'images/'.$layer["image_url"], $sliderParams["alias"].'/');
													if($importImage !== false){
														$alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]] = $importImage['path'];
														
														$layer["image_url"] = $importImage['path'];
													}
												}else{
													$layer["image_url"] = $alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]];
												}
											}
										}
									}
								}
								$layer["image_url"] = UniteFunctionsWPRev::getImageUrlFromPath($layer["image_url"]);
								$layers[$key] = $layer;
							}
						}
						$arrCreate = array();
						$arrCreate["slider_id"] = $sliderID;
						$my_layers = json_encode($layers);
						if(empty($my_layers))
							$my_layers = stripslashes(json_encode($layers));
						$my_params = json_encode($params);
						if(empty($my_params))
							$my_params = stripslashes(json_encode($params));
						$arrCreate["layers"] = $my_layers;
						$arrCreate["params"] = $my_params;
						if($sliderExists){
							unset($arrCreate["slider_id"]);
							$this->db->update(GlobalsRevSlider::$table_static_slides,$arrCreate,array("slider_id"=>$sliderID));
						}else{
							$this->db->insert(GlobalsRevSlider::$table_static_slides,$arrCreate);									
						}
					}
				}
			}catch(Exception $e){
				$errorMessage = $e->getMessage();
				return(array("success"=>false,"error"=>$errorMessage,"sliderID"=>$sliderID));
			}
			return(array("success"=>true,"sliderID"=>$sliderID));
		}
		public function updateSliderFromOptions($options,$settingsMain,$settingsParams){
			$sliderID = UniteFunctionsRev::getVal($options, "sliderid");
			UniteFunctionsRev::validateNotEmpty($sliderID,"Slider ID");
			$this->createUpdateSliderFromOptions($options,$sliderID,$settingsMain,$settingsParams);
		}
		private function updateParam($arrUpdate){
			$this->validateInited();
			$this->arrParams = array_merge($this->arrParams,$arrUpdate);
			$jsonParams = json_encode($this->arrParams);
			$arrUpdateDB = array();
			$arrUpdateDB["params"] = $jsonParams;
			$this->db->update(GlobalsRevSlider::$table_sliders,$arrUpdateDB,array("id"=>$this->id));
		}
		public function deleteSliderFromData($data){
			$sliderID = UniteFunctionsRev::getVal($data, "sliderid");
			UniteFunctionsRev::validateNotEmpty($sliderID,"Slider ID");
			$this->initByID($sliderID);
			$isTemplate = $this->getParam("template", "false");
			if($isTemplate == "true"){
				$stillUsing = array();
				$arrSliders = $this->getArrSliders();
				if(!empty($arrSliders)){
					foreach($arrSliders as $slider){
						if($slider->isSlidesFromPosts() && $slider->getParam("slider_template_id",false) !== false){
							$stillUsing[] = $slider->getParam("title");
						}
					}
				}
				if(!empty($stillUsing)) return $stillUsing;
			}
			$this->deleteSlider();
			return true;
		}
		public function duplicateSliderFromData($data){
			$sliderID = UniteFunctionsRev::getVal($data, "sliderid");
			UniteFunctionsRev::validateNotEmpty($sliderID,"Slider ID");
			$this->initByID($sliderID);
			$this->duplicateSlider();
		}
		public function duplicateSlideFromData($data){
			$sliderID = UniteFunctionsRev::getVal($data, "sliderID");
			UniteFunctionsRev::validateNotEmpty($sliderID,"Slider ID");
			$this->initByID($sliderID);
			$slideID = UniteFunctionsRev::getVal($data, "slideID");
			UniteFunctionsRev::validateNotEmpty($slideID,"Slide ID");
			$newSlideID = $this->duplicateSlide($slideID);
			$this->duplicateChildren($slideID, $newSlideID);
			return($sliderID);
		}
		private function duplicateChildren($slideID,$newSlideID){
			$arrChildren = $this->getArrSlideChildren($slideID);
			foreach($arrChildren as $childSlide){
				$childSlideID = $childSlide->getID();
				$duplicatedSlideID = $this->duplicateSlide($childSlideID);
				$duplicatedSlide = new RevSlide();
				$duplicatedSlide->initByID($duplicatedSlideID);
				$duplicatedSlide->updateParentSlideID($newSlideID);
			}
		}
		public function copyMoveSlideFromData($data){
			$sliderID = UniteFunctionsRev::getVal($data, "sliderID");
			UniteFunctionsRev::validateNotEmpty($sliderID,"Slider ID");
			$this->initByID($sliderID);
			$targetSliderID = UniteFunctionsRev::getVal($data, "targetSliderID");
			UniteFunctionsRev::validateNotEmpty($sliderID,"Target Slider ID");
			$this->initByID($sliderID);
			if($targetSliderID == $sliderID)
				UniteFunctionsRev::throwError("The target slider can't be equal to the source slider");
			$slideID = UniteFunctionsRev::getVal($data, "slideID");
			UniteFunctionsRev::validateNotEmpty($slideID,"Slide ID");
			$operation = UniteFunctionsRev::getVal($data, "operation");
			$this->copyMoveSlide($slideID,$targetSliderID,$operation);
			return($sliderID);
		}
		public function createSlideFromData($data,$returnSlideID = false){
			$sliderID = UniteFunctionsRev::getVal($data, "sliderid");
			$obj = UniteFunctionsRev::getVal($data, "obj");
			UniteFunctionsRev::validateNotEmpty($sliderID,"Slider ID");
			$this->initByID($sliderID);
			if(is_array($obj)){	//multiple
				foreach($obj as $item){
					$slide = new RevSlide();
					$slideID = $slide->createSlide($sliderID, $item);
				}
				return(count($obj));
			}else{
				$urlImage = $obj;
				$slide = new RevSlide();
				$slideID = $slide->createSlide($sliderID, $urlImage);
				if($returnSlideID == true)
					return($slideID);
				else 
					return(1);	//num slides -1 slide created
			}
		}
		public function updateSlidesOrderFromData($data){
			$sliderID = UniteFunctionsRev::getVal($data, "sliderID");
			$arrIDs = UniteFunctionsRev::getVal($data, "arrIDs");
			UniteFunctionsRev::validateNotEmpty($arrIDs,"slides");
			$this->initByID($sliderID);
			$isFromPosts = $this->isSlidesFromPosts();
			foreach($arrIDs as $index=>$slideID){
				$order = $index+1;
				if($isFromPosts){
					UniteFunctionsWPRev::updatePostOrder($slideID, $order);
				}else{
					$arrUpdate = array("slide_order"=>$order);
					$where = array("id"=>$slideID);
					$this->db->update(GlobalsRevSlider::$table_slides,$arrUpdate,$where);
				}							
			}
			if($isFromPosts){
				$arrUpdate = array();
				$arrUpdate["post_sortby"] = UniteFunctionsWPRev::SORTBY_MENU_ORDER;
				$this->updateParam($arrUpdate);
			}
		}
		public function getSettingsFields(){
			$this->validateInited();
			$arrMain = array();
			$arrMain["title"] = $this->title;
			$arrMain["alias"] = $this->alias;
			$arrRespose = array("main"=>$arrMain,
								"params"=>$this->arrParams);
			return($arrRespose);
		}
		public function getSlides($publishedOnly = false){
			if($this->isSlidesFromPosts() == true){
				$arrSlides = $this->getSlidesFromPosts($publishedOnly);
			}else{
				$arrSlides = $this->getSlidesFromGallery($publishedOnly);
			}
			return($arrSlides);
		}
		private function getSlidesFromPosts($publishedOnly = false){
			$slideTemplates = $this->getSlideTemplates();
			$slideTemplates = UniteFunctionsRev::assocToArray($slideTemplates);
			if(count($slideTemplates) == 0) return array();
			$sourceType = $this->getParam("source_type","gallery");
			switch($sourceType){
				case "posts":
					$arrPosts = $this->getPostsFromCategoies($publishedOnly);
				break;
				case "specific_posts":
					$arrPosts = $this->getPostsFromSpecificList();
				break;
				default:
					UniteFunctionsRev::throwError("getSlidesFromPosts error: This source type must be from posts.");
				break;
			}
			$arrSlides = array();
			$templateKey = 0;
			$numTemplates = count($slideTemplates);
			$slideTemplate = $slideTemplates[$templateKey];
			foreach($arrPosts as $postData){
				$templateKey++;
				if($templateKey == $numTemplates)
					$templateKey = 0;
				$slide = new RevSlide();
				$slide->initByPostData($postData, $slideTemplate, $this->id);
				$arrSlides[] = $slide;
			}
			$this->arrSlides = $arrSlides;
			return($arrSlides);
		}
		private function getSlideTemplates(){
			$sliderTemplateID = $this->getParam("slider_template_id");
			if(empty($sliderTemplateID))
				UniteFunctionsRev::throwError("You must provide a template for the slider show.");
			$sliderTemplate = new RevSlider();
			$sliderTemplate->initByID($sliderTemplateID);
			if($sliderTemplate->isSlidesFromPosts())
				UniteFunctionsRev::throwError("The slider that is template must be from gallery");
			$arrSlides = $sliderTemplate->getSlides(true);
			return($arrSlides);
		}
		public function getSlidesFromGallery($publishedOnly = false){
		
			$this->validateInited();
			
			$arrSlides = array();
			$arrSlideRecords = $this->db->fetch(GlobalsRevSlider::$table_slides,"slider_id=".$this->id,"slide_order");
			$arrChildren = array();
			if(!empty($arrSlideRecords))
			foreach ($arrSlideRecords as $record){
// print_r($record);
				$slide = new RevSlide();
				$slide->initByData($record);

				$slideID = $slide->getID();
				$arrIdsAssoc[$slideID] = true;

				if($publishedOnly == true){
					$state = $slide->getParam("state","published");
					if($state == "unpublished")
						continue;
				}
				
				$parentID = $slide->getParam("parentid","");
				if(!empty($parentID)){
					$lang = $slide->getParam("lang","");
					if(!isset($arrChildren[$parentID]))
						$arrChildren[$parentID] = array();
					$arrChildren[$parentID][] = $slide;
					continue;	//skip adding to main list
				}
				
				//init the children array
				$slide->setArrChildren(array());
				
				$arrSlides[$slideID] = $slide;
			}
			//add children array to the parent slides
			foreach($arrChildren as $parentID=>$arr){
				if(!isset($arrSlides[$parentID]))
					continue;
				$arrSlides[$parentID]->setArrChildren($arr);
			}
			
			$this->arrSlides = $arrSlides;
			
			return($arrSlides);
		}
		
		/**
		 * 
		 * get slide id and slide title from gallery
		 */
		public function getArrSlidesFromGalleryShort(){
			$arrSlides = $this->getSlidesFromGallery();
			
			$arrOutput = array();
			$coutner = 0;
			foreach($arrSlides as $slide){
				$slideID = $slide->getID();
				$outputName = "Slide $coutner";
				$title = $slide->getParam("title","");
				$coutner++;
				
				if(!empty($title))
					$outputName .= " - ($title)";
					
				$arrOutput[$slideID] = $outputName;
			}
			
			return($arrOutput);
		}
		
		
		/**
		 * 
		 * get slides for output
		 * one level only without children
		 */
		public function getSlidesForOutput($publishedOnly = false, $lang = "all"){
			
			$isSlidesFromPosts = $this->isSlidesFromPosts();
			
			$arrParentSlides = $this->getSlides($publishedOnly);
			
			if($lang == "all" || $isSlidesFromPosts)
				return($arrParentSlides);
			
			$arrSlides = array();
			foreach($arrParentSlides as $parentSlide){
				$parentLang = $parentSlide->getLang();
				if($parentLang == $lang)
					$arrSlides[] = $parentSlide;
					
				$childAdded = false;
				$arrChildren = $parentSlide->getArrChildren();
				foreach($arrChildren as $child){
					$childLang = $child->getLang();
					if($childLang == $lang){
						$arrSlides[] = $child;
						$childAdded = true;
						break;
					}
				}
				
				if($childAdded == false && $parentLang == "all")
					$arrSlides[] = $parentSlide;
			}
			
			return($arrSlides);
		}
		
		
		/**
		 * 
		 * get array of slide names
		 */
		public function getArrSlideNames(){
			if(empty($this->arrSlides))
				$this->getSlidesFromGallery();
			
			$arrSlideNames = array();

			foreach($this->arrSlides as $number=>$slide){
				$slideID = $slide->getID();
				$filename = $slide->getImageFilename();	
				$slideTitle = $slide->getParam("title","Slide");
				$slideName = $slideTitle;
				if(!empty($filename))
					$slideName .= " ($filename)";
				
				$arrChildrenIDs = $slide->getArrChildrenIDs();
				 
				$arrSlideNames[$slideID] = array("name"=>$slideName,"arrChildrenIDs"=>$arrChildrenIDs,"title"=>$slideTitle);
			}
			return($arrSlideNames);
		}
		
		
		/**
		 * 
		 * get array of slides numbers by id's
		 */
		public function getSlidesNumbersByIDs($publishedOnly = false){
			
			if(empty($this->arrSlides))
				$this->getSlides($publishedOnly);
			
			$arrSlideNumbers = array();
			
			$counter = 0;
			
			if(empty($this->arrSlides)) return $arrSlideNumbers;
			
			foreach($this->arrSlides as $slide){
				$counter++;
				$slideID = $slide->getID();
				$arrSlideNumbers[$slideID] = $counter;				
			}
			return($arrSlideNumbers);
		}
		private function getParamsForExport(){
			$exportParams = $this->arrParams;
			$urlImage = UniteFunctionsRev::getVal($exportParams, "background_image");
			if(!empty($urlImage))
				$exportParams["background_image"] = main_shop_url();
			return($exportParams);
		}
		private function getSlidesForExport($useDummy = false){
			$arrSlides = $this->getSlidesFromGallery();
			$arrSlidesExport = array();
			foreach($arrSlides as $slide){
				$slideNew = array();
				$slideNew["params"] = $slide->getParamsForExport();
				$slideNew["slide_order"] = $slide->getOrder();
				$slideNew["layers"] = $slide->getLayersForExport($useDummy);
				$arrSlidesExport[] = $slideNew;
			}
			return($arrSlidesExport);
		}
		private function getStaticSlideForExport($useDummy = false){
			$arrSlidesExport = array();
			$slide = new RevSlide();
			$staticID = $slide->getStaticSlideID($this->id);
			if($staticID !== false){
				$slideNew = array();
				$slide->initByStaticID($staticID);
				$slideNew["params"] = $slide->getParamsForExport();
				$slideNew["slide_order"] = $slide->getOrder();
				$slideNew["layers"] = $slide->getLayersForExport($useDummy);
				$arrSlidesExport[] = $slideNew;
			}
			
			return($arrSlidesExport);
		}
		public function getNumSlides($publishedOnly = false){
			if($this->arrSlides == null)
				$this->getSlides($publishedOnly);
			$numSlides = count($this->arrSlides);
			return($numSlides);
		}
		public function getArrSliders($templates = false, $orders = false){
			if($orders !== false){
				$order_direction = reset($orders);
				$do_order = key($orders);
			}else{
				$do_order = 'id';
				$order_direction = 'ASC';
			}
			$where = "";
			$response = $this->db->fetch(GlobalsRevSlider::$table_sliders,$where,$do_order,'',$order_direction);
			$arrSliders = array();
			if(!empty($response))
			foreach($response as $arrData){
				$slider = new RevSlider();
				$slider->initByDBData($arrData);
				if($templates){
					if($slider->getParam("template","false") == "false") continue;
				}else{
					if($slider->getParam("template","false") == "true") continue;
				}
				$arrSliders[] = $slider;
			}
			return($arrSliders);
		}

		
		/**
		 * 
		 * get aliasees array
		 */
		public function getAllSliderAliases(){
			$where = "";
			
			$response = $this->db->fetch(GlobalsRevSlider::$table_sliders,$where,"id");
			
			$arrAliases = array();
			foreach($response as $arrSlider){
				$arrAliases[] = $arrSlider["alias"];
			}
			
			return($arrAliases);
		}		
		
		
		/**
		 * 
		 * get array of slider id -> title
		 */		
		public function getArrSlidersShort($exceptID = null,$filterType = self::SLIDER_TYPE_ALL){
			$arrSliders = ($filterType == self::SLIDER_TYPE_TEMPLATE) ? $this->getArrSliders(true) : $this->getArrSliders();
			$arrShort = array();
			foreach($arrSliders as $slider){
				$id = $slider->getID();
				$isFromPosts = $slider->isSlidesFromPosts();
				$isTemplate = $slider->getParam("template","false");

				//filter by gallery only
				if($filterType == self::SLIDER_TYPE_POSTS && $isFromPosts == false)
					continue;
					
				if($filterType == self::SLIDER_TYPE_GALLERY && $isFromPosts == true)
					continue;
				
				//filter by template type
				if($filterType == self::SLIDER_TYPE_TEMPLATE && $isTemplate == "false")
					continue;
				
				//filter by except
				if(!empty($exceptID) && $exceptID == $id)
					continue;
					
				$title = $slider->getTitle();
				$arrShort[$id] = $title;
			}
			return($arrShort);
		}
		
		/**
		 * 
		 * get array of sliders with slides, short, assoc.
		 */
		public function getArrSlidersWithSlidesShort($filterType = self::SLIDER_TYPE_ALL){
			$arrSliders = self::getArrSlidersShort(null, $filterType);
			
			$output = array();
			foreach($arrSliders as $sliderID=>$sliderName){
				$slider = new RevSlider();
				$slider->initByID($sliderID);
				
				$isFromPosts = $slider->isSlidesFromPosts();
				$isTemplate = $slider->getParam("template","false");
				
				//filter by gallery only
				if($filterType == self::SLIDER_TYPE_POSTS && $isFromPosts == false)
					continue;
					
				if($filterType == self::SLIDER_TYPE_GALLERY && $isFromPosts == true)
					continue;
				
				//filter by template type
				if($filterType == self::SLIDER_TYPE_TEMPLATE && $isTemplate == "false")
					continue;
					
				$sliderTitle = $slider->getTitle();
				$arrSlides = $slider->getArrSlidesFromGalleryShort();
								
				foreach($arrSlides as $slideID=>$slideName){
					$output[$slideID] = $sliderName.", ".$slideName;
				}
			}
			
			return($output);
		}
		
		
		/**
		 * 
		 * get max order
		 */
		public function getMaxOrder(){
			$this->validateInited();
			$maxOrder = 0;
			$arrSlideRecords = $this->db->fetch(GlobalsRevSlider::$table_slides,"slider_id=".$this->id,"slide_order desc","","limit 1");
			if(empty($arrSlideRecords))
				return($maxOrder);
			$maxOrder = $arrSlideRecords[0]["slide_order"];
			
			return($maxOrder);
		}
		
		/**
		 * 
		 * get setting - start with slide
		 */
		public function getStartWithSlideSetting(){
			
			$numSlides = $this->getNumSlides();
			
			$startWithSlide = $this->getParam("start_with_slide","1");
			if(is_numeric($startWithSlide)){
				$startWithSlide = (int)$startWithSlide - 1;
				if($startWithSlide < 0)
					$startWithSlide = 0;
					
				if($startWithSlide >= $numSlides)
					$startWithSlide = 0;
				
			}else
				$startWithSlide = 0;
			
			return($startWithSlide);
		}
		
		
		/**
		 * 
		 * return if the slides source is from posts
		 */
		public function isSlidesFromPosts(){
			$this->validateInited();
			$sourceType = $this->getParam("source_type","gallery");
			if($sourceType == "posts" || $sourceType == "specific_posts")
				return(true);
			
			return(false);
		}
		
		
		/**
		 * 
		 * get posts from categories (by the slider params).
		 */
		private function getPostsFromCategoies($publishedOnly = false){
			$this->validateInited();
			$catIDs = $this->getParam("post_category");
			
			// $data = UniteFunctionsWPRev::getCatAndTaxData($catIDs);
			
			$taxonomies = '';

			// $taxonomies = $data["tax"];
			// $catIDs = $data["cats"];

			$sortBy = $this->getParam("post_sortby",self::DEFAULT_POST_SORTBY);

			$sortDir = $this->getParam("posts_sort_direction",self::DEFAULT_POST_SORTDIR);

			$maxPosts = $this->getParam("max_slider_posts","30");

			if(empty($maxPosts) || !is_numeric($maxPosts))
				$maxPosts = -1;
			
			$postTypes = $this->getParam("post_types","any");
			
			//set direction for custom order
			if($sortBy == UniteFunctionsWPRev::SORTBY_MENU_ORDER)
				$sortDir = UniteFunctionsWPRev::ORDER_DIRECTION_ASC;
			
			//Events integration
			$arrAddition = array();
			if($publishedOnly == true)			
				$arrAddition["post_status"] = UniteFunctionsWPRev::STATE_PUBLISHED;

			// $product = new Product(1,true,Context::getcontext()->language->id,Context::getcontext()->shop->id);
		
			

		$arrPosts = UniteFunctionsWPRev::GetRevPostDataArray($catIDs,$sortBy,$sortDir,$maxPosts,$postTypes,$taxonomies,$arrAddition);
// print '<pre>';
// print_r($arrPosts);
// print '<pre>';
			// $arrPosts = UniteFunctionsWPRev::getPostsByCategory($catIDs,$sortBy,$sortDir,$maxPosts,$postTypes,$taxonomies,$arrAddition);

			return($arrPosts);
		}  
		
		
		/**
		 * 
		 * get posts from specific posts list
		 */
		private function getPostsFromSpecificList(){
			
			$strPosts = $this->getParam("posts_list","");
			$arrPosts = UniteFunctionsWPRev::getPostsByIDs($strPosts);
			
			return($arrPosts);
		}
		
		/**
		 * update sortby option
		 */
		public function updatePostsSortbyFromData($data){
			
			$sliderID = UniteFunctionsRev::getVal($data, "sliderID");
			$sortBy = UniteFunctionsRev::getVal($data, "sortby");
			UniteFunctionsRev::validateNotEmpty($sortBy,"sortby");
			
			$this->initByID($sliderID);
			$arrUpdate = array();
			$arrUpdate["post_sortby"] = $sortBy;
			
			$this->updateParam($arrUpdate); 
		}

		/**
		 * 
		 * replace image urls
		 */
		public function replaceImageUrlsFromData($data){
			
			$sliderID = UniteFunctionsRev::getVal($data, "sliderid");
			$urlFrom = UniteFunctionsRev::getVal($data, "url_from");
			UniteFunctionsRev::validateNotEmpty($urlFrom,"url from");
			$urlTo = UniteFunctionsRev::getVal($data, "url_to");
			
			$this->initByID($sliderID);
			
			$arrSildes = $this->getSlides();
			foreach($arrSildes as $slide){
				//$slide1 = new RevSlide();
				$slide->replaceImageUrls($urlFrom, $urlTo);
			}
		}
		
		public function resetSlideSettings($data){
			$sliderID = UniteFunctionsRev::getVal($data, "sliderid");
			
			$this->initByID($sliderID);
			
			$arrSildes = $this->getSlides();
			foreach($arrSildes as $slide){
				
				if(trim($data['reset_transitions']) != '') $slide->changeTransition($data['reset_transitions']);
				if(intval($data['reset_transition_duration']) > 0) $slide->changeTransitionDuration($data['reset_transition_duration']);
				
			}
		}
		public function GetSliderImgSettings($sliderID)
		{
			$img_arr = array();
			UniteFunctionsRev::validateNumeric($sliderID,"Slider ID");
			$sliderID = $this->db->escape($sliderID);
			try{
				$sliderData = $this->db->fetchSingle(GlobalsRevSlider::$table_sliders,"id=$sliderID");								
			}catch(Exception $e){
				UniteFunctionsRev::throwError("Slider with ID: $sliderID Not Found");
			}
			$sliderData = json_decode($sliderData['params']);
			$img_arr['width'] = isset($sliderData->prd_img_width)?$sliderData->prd_img_width:'880';
			$img_arr['height'] = isset($sliderData->prd_img_height)?$sliderData->prd_img_height:'350';
			return $img_arr;
		}
	}

?>