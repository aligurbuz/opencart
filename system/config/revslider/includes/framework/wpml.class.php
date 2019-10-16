<?php
// defined('_PS_VERSION_') OR die('No Direct Script Access Allowed');
	class RevSliderWpml{

		

		public static function isWpmlExists(){

			return true;

			if(class_exists("SitePress"))

				return(true);

			else

				return(false);

		}

		



		private static function validateWpmlExists(){

			if(!self::isWpmlExists())

				UniteFunctionsRev::throwError("The wpml plugin don't exists");

		}

		


		public static function getArrLanguages($getAllCode = true){

			$arrLangs = sdsconfig::getlanguages();

			$response = array();

			if($getAllCode == true)

				$response["all"] = __("All Languages",REVSLIDER_TEXTDOMAIN);

			foreach($arrLangs as $code=>$arrLang){

                $ind = $arrLang['code'];      
				$response[$ind] = $arrLang['name'];

			}

			

			return($response);

		}



		public static function getArrLangCodes($getAllCode = true){

			

			$arrCodes = array();

			

			if($getAllCode == true)

				$arrCodes["all"] = "all";

			$arrLangs = sdsconfig::getlanguages();

			foreach($arrLangs as $code=>$arr){
                                
                                $ind = $arr['code'];
                            
				$arrCodes[$ind] = $ind;

			}
                        
			return($arrCodes);

		}

		


		public static function isAllLangsInArray($arrCodes){

			$arrAllCodes = self::getArrLangCodes();

			$diff = array_diff($arrAllCodes, $arrCodes);

			return(empty($diff));

		}

		


		public static function getLangsWithFlagsHtmlList($props = "",$htmlBefore = ""){

			//$arrLangs = self::getArrLanguages();
			$arrLangs = sdsconfig::getlanguages();

			if(!empty($props))

				$props = " ".$props;

			

			$html = "<ul".$props.">"."\n";

			$html .= $htmlBefore;

		


			foreach($arrLangs as $code=>$title){
                $site_url = get_mainsite_url();
                $name = $title['name']; 
				$urlIcon = $site_url.'catalog/language/'.$title['code'].'/'.$title['code'].'.png';
                                
				$html .= "<li data-lang='".$title['code']."' class='item_lang'><a data-lang='".$title['code']."' href='javascript:void(0)'>"."\n";

				$html .= "<img src='".$urlIcon."'/> $name"."\n";				

				$html .= "</a></li>"."\n";

			}



			$html .= "</ul>";

			

			

			return($html);

		}

	

		


		public static function getFlagUrl($code){
                    
			$site_url = get_mainsite_url();
			$arrLangs = sdsconfig::getlanguages();
                        $language = sdsconfig::getlanguages();                    
                        if($code == 'all'){
                            $url = rev_module_url().'/images/icon16.png';                            
                        }
                        else{
                            $url = '';
                            foreach($arrLangs as $lang){ 
                                if($lang['code'] == $code)
                                	$url = $site_url.'catalog/language/'.$lang['code'].'/'.$lang['code'].'.png';
                            }
                        }
                      //  var_dump($url);die();
			return($url);
		}

		private function getLangDetails($code){
			$details = array();
	       	$site_url = get_mainsite_url();
			$arrLangs = sdsconfig::getlanguages();
                        $language = sdsconfig::getlanguages();                    
                        if($code == 'all'){
                            $url = rev_module_url().'/images/icon16.png';   
                            $details = $language;                         
                        }
                        else{
                            foreach($arrLangs as $lang){
                                if($lang['code'] == $code){ 
                                $ext = pathinfo($lang['image'], PATHINFO_EXTENSION); 
                                	 $details['image'] = $site_url.'catalog/language/'.$lang['code'].'/'.$lang['code'].'.png';
                                	 $details['language_id'] = $lang['language_id'];
					                 $details['name'] = $lang['name'];
					                 $details['code'] = $lang['code'];
					                 $details['locale'] = $lang['locale'];
					                 $details['directory'] = $lang['directory'];
					                 $details['filename'] = $lang['filename'];
					                 $details['sort_order'] = $lang['sort_order'];
					                 $details['status'] = $lang['status'];
                                }
                            }
                        }
			return $details;

		}

		

		

	
		public static function getLangTitle($code){

			

			$langs = self::getArrLanguages();

			

			if($code == "all")

				return(__("All Languages", REVSLIDER_TEXTDOMAIN));

			

			if(array_key_exists($code, $langs))

				return($langs[$code]);

				

			$details = self::getLangDetails($code);

			if(!empty($details))			

	        	return($details["name"]);

	       	

			return("");

		} 
		public static function getCurrentLang(){ 
		//	$language = sds_get_current_lang();
                        $language = sdsconfig::get_current_lang();
			// $lang = $language->iso_code;
			return($language);
		}
	}
        
        class UniteWpmlRev extends RevSliderWpml{
            
        }