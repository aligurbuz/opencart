<?php 

$operations = new RevSliderOperations();
 
$arrValues = $operations->getGeneralSettingsValues();

$role = RevSliderBase::getVar($arrValues, 'role', 'admin');
$includes_globally = RevSliderBase::getVar($arrValues, 'includes_globally', 'on');
$pages_for_includes = RevSliderBase::getVar($arrValues, 'pages_for_includes', '');
$js_to_footer = RevSliderBase::getVar($arrValues, 'js_to_footer', 'off');
$js_defer = RevSliderBase::getVar($arrValues, 'js_defer', 'off');
$show_dev_export = RevSliderBase::getVar($arrValues, 'show_dev_export', 'off');
$change_font_loading = RevSliderBase::getVar($arrValues, 'change_font_loading', '');
$enable_logs = RevSliderBase::getVar($arrValues, 'enable_logs', 'off');
$load_all_javascript = RevSliderBase::getVar($arrValues, 'load_all_javascript', 'off');

$pack_page_creation = RevSliderBase::getVar($arrValues, 'pack_page_creation', 'on');
$single_page_creation = RevSliderBase::getVar($arrValues, 'single_page_creation', 'off');

$stage_collapse = RevSliderBase::getVar($arrValues, "stage_collapse",'off');

$enable_newschannel =  'on';
$enable_newschannel = RevSliderBase::getVar($arrValues, "enable_newschannel",$enable_newschannel);

$width = RevSliderBase::getVar($arrValues, 'width', 1240);
$width_notebook = RevSliderBase::getVar($arrValues, 'width_notebook', 1024);
$width_tablet = RevSliderBase::getVar($arrValues, 'width_tablet', 778);
$width_mobile = RevSliderBase::getVar($arrValues, 'width_mobile', 480);

$force_activation_box = RevSliderBase::getVar($arrValues, 'force_activation_box', 'off');

?>

<div id="dialog_general_settings" title="<?php echo "General Settings"; ?>" style="display:none;">

	<div class="settings_wrapper unite_settings_wide">
		<form name="form_general_settings" id="form_general_settings">
                    <input type="hidden" name="nonce" value="<?php echo get_rev_token() ?>"/>
			<script type="text/javascript">
				g_settingsObj['form_general_settings'] = {};
			</script>
			<table class="form-table">				
				<tbody>
					<tr id="role_row" valign="top">
						<th scope="row">
							<?php echo "View Plugin Permission:"; 
                                                        
                                                        ?>
						</th>
						<td>
							<select id="role" name="role">
								<option <?php selected($role, 'admin'); ?> value="admin"><?php echo "To Admin"; ?></option>
								<option <?php selected($role, 'editor'); ?> value="editor"><?php echo "To Editor, Admin"; ?></option>
								<option <?php selected($role, 'author'); ?> value="author"><?php echo "Author, Editor, Admin"; ?></option>
							</select>
						
							<div class="description_container">
								<span class="description"><?php echo "The role of user that can view and edit the plugin"; ?></span>
							</div>
						</td>
					</tr>								
					<tr id="includes_globally_row" valign="top">
						<th scope="row">
							<?php echo "Include RevSlider libraries globally:"; ?>
						</th>
						<td>
							<span id="includes_globally_wrapper" class="radio_settings_wrapper">
							<div class="radio_inner_wrapper">
								<input type="radio" id="includes_globally_1" value="on" name="includes_globally" <?php checked($includes_globally, 'on'); ?>>
								<label for="includes_globally_1" style="cursor:pointer;"><?php echo "On"; ?></label>
							</div>
				
							<div class="radio_inner_wrapper">
								<input type="radio" id="includes_globally_2" value="off" name="includes_globally" <?php checked($includes_globally, 'off'); ?>>
								<label for="includes_globally_2" style="cursor:pointer;"><?php echo "Off"; ?></label>
							</div>					
							</span>
				
							<div class="description_container">
								<span class="description"><?php echo "ON - Add CSS and JS Files to all pages. </br>Off - CSS and JS Files will be only loaded on Pages where any rev_slider shortcode exists."; ?></span>
							</div>
						</td>
					</tr>								
					<tr id="pages_for_includes_row" valign="top">
						<th scope="row">
							<?php echo "Pages to include RevSlider libraries:"; ?>
						</th>
						<td>
							<input type="text" class="regular-text" id="pages_for_includes" name="pages_for_includes" value="<?php echo $pages_for_includes; ?>">
							<div class="description_container">
								<span class="description"><?php echo "Specify the page id's that the front end includes will be included in. Example: 2,3,5 also: homepage,3,4"; ?></span>
			
							</div>
						</td>
					</tr>								
					<tr id="js_to_footer_row" valign="top">
						<th scope="row">
							<?php echo "Insert JavaScript Into Footer:"; ?>
						</th>
						<td>
							<span id="js_to_footer_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
									<input type="radio" id="js_to_footer_1" value="on" name="js_to_footer" <?php checked($js_to_footer, 'on'); ?>>
									<label for="js_to_footer_1" style="cursor:pointer;"><?php echo "On"; ?></label>
								</div>
				
								<div class="radio_inner_wrapper">
									<input type="radio" id="js_to_footer_2" value="off" name="js_to_footer" <?php checked($js_to_footer, 'off'); ?>>
									<label for="js_to_footer_2" style="cursor:pointer;"><?php echo "Off"; ?></label>
								</div>					
							</span>					
							<div class="description_container">
								<span class="description"><?php echo "Putting the js to footer (instead of the head) is good for fixing some javascript conflicts."; ?></span>
							</div>
						</td>
					</tr>
					<tr id="js_defer_row" valign="top">
						<th scope="row">
							<?php echo "Defer JavaScript Loading:"; ?>
						</th>
						<td>
							<span id="js_defer_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
									<input type="radio" id="js_defer_1" value="on" name="js_defer" <?php checked($js_defer, 'on'); ?>>
									<label for="js_defer_1" style="cursor:pointer;"><?php echo "On"; ?></label>
								</div>

								<div class="radio_inner_wrapper">
									<input type="radio" id="js_defer_2" value="off" name="js_defer" <?php checked($js_defer, 'off'); ?>>
									<label for="js_defer_2" style="cursor:pointer;"><?php echo "Off"; ?></label>
								</div>					
							</span>					
							<div class="description_container">
								<span class="description"><?php echo "Defer the loading of the JavaScript libraries to maximize page loading speed."; ?></span>
							</div>
						</td>
					</tr>
					<tr id="load_all_javascript" valign="top">
						<th scope="row">
							<?php echo "Load all JavaScript libraries:"; ?>
						</th>
						<td>
							<span id="load_all_javascript_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
									<input type="radio" id="load_all_javascript_1" value="on" name="load_all_javascript" <?php checked($load_all_javascript, 'on'); ?>>
									<label for="load_all_javascript_1" style="cursor:pointer;"><?php echo "On"; ?></label>
								</div>

								<div class="radio_inner_wrapper">
									<input type="radio" id="load_all_javascript_2" value="off" name="load_all_javascript" <?php checked($load_all_javascript, 'off'); ?>>
									<label for="load_all_javascript_2" style="cursor:pointer;"><?php echo "Off"; ?></label>
								</div>					
							</span>
							<div class="description_container">
								<span class="description"><?php echo "Enabling this will load all JavaScript libraries of Slider Revolution. Disabling this will let Slider Revolution load only the libraries needed for the current Sliders on page. Enabling this option can solve CDN issues."; ?></span>
							</div>
						</td>
					</tr>	
					<tr id="show_dev_export_row" valign="top">
						<th scope="row">
							<?php echo "Enable Markup Export option:"; ?>
						</th>
						<td>
							<span id="show_dev_export_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
									<input type="radio" id="show_dev_export_1" value="on" name="show_dev_export" <?php checked($show_dev_export, 'on'); ?>>
									<label for="show_dev_export_1" style="cursor:pointer;"><?php echo "On"; ?></label>
								</div>
				
								<div class="radio_inner_wrapper">
									<input type="radio" id="show_dev_export_2" value="off" name="show_dev_export" <?php checked($show_dev_export, 'off'); ?>>
									<label for="show_dev_export_2" style="cursor:pointer;"><?php echo "Off"; ?></label>
								</div>					
							</span>					
							<div class="description_container">
								<span class="description"><?php echo "This will enable the option to export the Slider Markups to copy/paste it directly into websites."; ?></span>
							</div>
						</td>
					</tr>							
					<tr id="show_dev_export_row" valign="top">
						<th scope="row">
							<?php echo "Font Loading URL:"; ?>
						</th>
						<td>
							<input id="change_font_loading" name="change_font_loading" type="text" class="regular-text" value="<?php echo $change_font_loading; ?>">
							<div class="description_container">
								<span class="description"><?php echo "Insert something in it and it will be used instead of http://fonts.googleapis.com/css?family= (For example: http://fonts.useso.com/css?family= which will also work for chinese visitors)"; ?></span>				
							</div>
						</td>
					</tr>
					
					<tr id="advanced_resonsive_sizes_row" valign="top">
						<th scope="row">
							<?php echo "Default Settings for Advanced Responsive Grid Sizes:"; ?>
						</th>
						<td>
							<div><?php echo 'Desktop Grid Width'; ?>
							<input id="width" name="width" type="text" class="textbox-small" value="<?php echo $width; ?>"></div>
							<div><?php echo 'Notebook Grid Width'; ?>
							<input id="width_notebook" name="width_notebook" type="text" class="textbox-small" value="<?php echo $width_notebook; ?>"></div>
							<div><?php echo 'Tablet Grid Width'; ?>
							<input name="width_tablet" type="text" class="textbox-small" value="<?php echo $width_tablet; ?>"></div>
							<div><?php echo 'Mobile Grid Width'; ?>
							<input name="width_mobile" type="text" class="textbox-small" value="<?php echo $width_mobile; ?>"></div>
							
							<div class="description_container">
								<span class="description"><?php echo "Define the default Grid Sizes for devices: Desktop, Tablet and Mobile"; ?></span>
							</div>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">
							<?php echo "Slide Stage Collapse:"; ?>
						</th>
						<td>
							<span id="stage_collapse_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
									<input type="radio" id="" value="on" name="stage_collapse" <?php checked($stage_collapse, 'on'); ?>>
									<label for="" style="cursor:pointer;"><?php echo "On"; ?></label>
								</div>
				
								<div class="radio_inner_wrapper">
									<input type="radio" id="" value="off" name="stage_collapse" <?php checked($stage_collapse, 'off'); ?>>
									<label for="" style="cursor:pointer;"><?php echo "Off"; ?></label>
								</div>
							</span>
							<div class="description_container">
								<span class="description"><?php echo "Collapse left WordPress Menu on Slide Stage automatically "; ?></span>
							</div>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">
							<?php echo "Enable Notifications:"; ?>
						</th>
						<td>
							<span id="enable_newschannel_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
									<input type="radio" id="" value="on" name="enable_newschannel" <?php checked($enable_newschannel, 'on'); ?>>
									<label for="" style="cursor:pointer;"><?php echo "On"; ?></label>
								</div>
				
								<div class="radio_inner_wrapper">
									<input type="radio" id="" value="off" name="enable_newschannel" <?php checked($enable_newschannel, 'off'); ?>>
									<label for="" style="cursor:pointer;"><?php echo "Off"; ?></label>
								</div>
							</span>
							<div class="description_container">
								<span class="description"><?php echo "Enable/Disable ThemePunch Notifications in the Admin Notice bar."; ?></span>
							</div>
						</td>
					</tr>
					
					<tr id="use_hammer_js_row" valign="top">
						<th scope="row">
							<?php echo "Enable Logs:"; ?>
						</th>
						<td>
							<span id="enable_logs_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
									<input type="radio" id="enable_logs_1" value="on" name="enable_logs" <?php checked($enable_logs, 'on'); ?>>
									<label for="enable_logs_1" style="cursor:pointer;"><?php echo "On"; ?></label>
								</div>
				
								<div class="radio_inner_wrapper">
									<input type="radio" id="use_hammer_js_2" value="off" name="enable_logs" <?php checked($enable_logs, 'off'); ?>>
									<label for="use_hammer_js_2" style="cursor:pointer;"><?php echo "Off"; ?></label>
								</div>
							</span>
							<div class="description_container">
								<span class="description"><?php echo "Enable console logs for debugging."; ?></span>
							</div>
						</td>
					</tr>	
					<tr valign="top">
						<th scope="row">
							<?php echo "Enable Missing Activation Area:"; ?>
						</th>
						<td>
							<span id="force_activation_box_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
									<input type="radio" id="" value="on" name="force_activation_box" <?php checked($force_activation_box, 'on'); ?>>
									<label for="" style="cursor:pointer;"><?php echo "On"; ?></label>
								</div>
				
								<div class="radio_inner_wrapper">
									<input type="radio" id="" value="off" name="force_activation_box" <?php checked($force_activation_box, 'off'); ?>>
									<label for="" style="cursor:pointer;"><?php echo "Off"; ?></label>
								</div>
							</span>
							<div class="description_container">
								<span class="description"><?php echo "Force the Activation Area to show up if the Theme disabled it."; ?></span>
							</div>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<?php echo "Enable Blank Page Creation for Slider Packages:"; ?>
						</th>
						<td>
							<span id="pack_page_creation_box_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
									<input type="radio" id="" value="on" name="pack_page_creation" <?php checked($pack_page_creation, 'on'); ?>>
									<label for="" style="cursor:pointer;"><?php echo "On"; ?></label>
								</div>
				
								<div class="radio_inner_wrapper">
									<input type="radio" id="" value="off" name="pack_page_creation" <?php checked($pack_page_creation, 'off'); ?>>
									<label for="" style="cursor:pointer;"><?php echo "Off"; ?></label>
								</div>
							</span>
							<div class="description_container">
								<span class="description"><?php echo "Enable option to automatically create a Blank Page if a Slider Pack is installed."; ?></span>
							</div>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<?php echo "Enable Blank Page Creation for Single Sliders:"; ?>
						</th>
						<td>
							<span id="single_page_creation_box_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
									<input type="radio" id="" value="on" name="single_page_creation" <?php checked($single_page_creation, 'on'); ?>>
									<label for="" style="cursor:pointer;"><?php echo "On"; ?></label>
								</div>
				
								<div class="radio_inner_wrapper">
									<input type="radio" id="" value="off" name="single_page_creation" <?php checked($single_page_creation, 'off'); ?>>
									<label for="" style="cursor:pointer;"><?php echo "Off"; ?></label>
								</div>
							</span>
							<div class="description_container">
								<span class="description"><?php echo "Enable option to automatically create a Blank Page if a Single Slider is installed."; ?></span>
							</div>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<?php echo "Run Slider Revolution database creation:"; ?>
						</th>
						<td>
							<span id="trigger_database_creation_wrapper" class="radio_settings_wrapper">
								<a id="trigger_database_creation" class="button-primary" original-title="" href="javascript:void(0);"><?php echo 'Go!'; ?></a>
							</span>
							<div class="description_container">
								<span class="description"><?php echo "Force creation of Slider Revolution database structure to fix table issues that may occur for example at the Slider creation process."; ?></span>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
<br>

<a id="button_save_general_settings" class="button-primary" original-title=""><?php echo "Update"; ?></a>
<span id="loader_general_settings" class="loader_round mleft_10" style="display: none;"></span>

</div> 