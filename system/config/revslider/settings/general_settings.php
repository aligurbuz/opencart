<?php
	$generalSettings = new UniteSettingsRev();

	$generalSettings->addRadio("show_dev_export", 
							   array("on"=>ControllerExtensionModulerevslideropencart::$lang_var['On'],"off"=>ControllerExtensionModulerevslideropencart::$lang_var['Off']),
							   ControllerExtensionModulerevslideropencart::$lang_var['Export_option'],
							   "off",
							   array("description"=>ControllerExtensionModulerevslideropencart::$lang_var['export_Slider']));
		
	$generalSettings->addRadio("enable_logs", 
							   array("on"=>ControllerExtensionModulerevslideropencart::$lang_var['On'],"off"=>ControllerExtensionModulerevslideropencart::$lang_var['Off']),
							   ControllerExtensionModulerevslideropencart::$lang_var['Enable_Logs'],
							   "off",
							   array("description"=>ControllerExtensionModulerevslideropencart::$lang_var['Enable_console']));

	$operations = new RevOperations();
	$arrValues = $operations->getGeneralSettingsValues();
	$generalSettings->setStoredValues($arrValues);
	self::storeSettings("general", $generalSettings);
?>