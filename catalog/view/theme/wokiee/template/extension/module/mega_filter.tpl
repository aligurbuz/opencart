<?php

	$mfp_options = array(
		'display_list_of_items' => array(
			'type' => empty( $settings['display_list_of_items']['type'] ) ? 'scroll' : $settings['display_list_of_items']['type'],
			'limit_of_items' => empty( $settings['display_list_of_items']['limit_of_items'] ) ? 4 : (int) $settings['display_list_of_items']['limit_of_items'],
			'max_height' => empty( $settings['display_list_of_items']['max_height'] ) ? 155 : (int) $settings['display_list_of_items']['max_height'],
			'standard_scroll' => empty( $settings['display_list_of_items']['standard_scroll'] ) ? false : $settings['display_list_of_items']['standard_scroll'],
		)
	);

?>

<?php

	$button_template = '<div class="mfilter-button mfilter-button-%s">%s</div>';
	$button_temp = '<a href="#" class="%s">%s</a>';
	$buttons = array( 'top' => array(), 'bottom' => array() );
	
	if( ! empty( $settings['show_reset_button'] ) ) {
		$buttons['bottom'][] = sprintf( $button_temp, 'mfilter-button-reset', '<i class="mfilter-reset-icon"></i>' . $text_reset_all );
	}
	
	if( ! empty( $settings['show_top_reset_button'] ) ) {
		$buttons['top'][] = sprintf( $button_temp, 'mfilter-button-reset', '<i class="mfilter-reset-icon"></i>' . $text_reset_all );
	}

	if( ! empty( $settings['refresh_results'] ) && $settings['refresh_results'] == 'using_button' && ! empty( $settings['place_button'] ) ) {
		$place_button = explode( '_', $settings['place_button'] );
	
		if( in_array( 'top', $place_button ) ) {
			$buttons['top'][] = sprintf( $button_temp, 'btn btn-primary btn-xs', $text_button_apply );
		}
		
		if( in_array( 'bottom', $place_button ) ) {
			$buttons['bottom'][] = sprintf( $button_temp, 'btn btn-primary btn-xs', $text_button_apply );
		}
	}
	
	foreach( $buttons as $bKey => $bVal ) {	
		$buttons[$bKey] = $bVal ? sprintf( $button_template, $bKey, implode( '', $bVal ) ) : '';
	}

	
?>

<?php if( ! empty( $hide_container ) ) { ?>
	<div style="display: none;">
<?php } ?>

<div class="box mfilter-box mfilter-box-<?php echo $_idx; ?><?php echo $theme ? ' ' . $theme : '' ?> mfilter-<?php echo $_position; ?><?php echo ! empty( $hide_container ) ? ' mfilter-hide-container' : '' ?><?php echo ! empty( $_displayOptionsAs ) && $_displayOptionsAs == 'modern_horizontal' ? ' mfilter-hide' : ''; ?> mfilter-direction-<?php echo $direction; ?>" id="mfilter-box-<?php echo $_idx; ?>">
	<?php if( $heading_title ) { ?>
		<h3 class="box-heading"><?php echo $heading_title; ?></h3>
	<?php } ?>
	<div class="box-content mfilter-content<?php echo empty( $settings['calculate_number_of_products'] ) || empty( $settings['show_number_of_products'] ) ? ' mfilter-hide-counter' : ''; ?>">
		<?php echo $buttons['top']; ?>
		<ul>
			<?php 
				foreach( $filters as $key_group => $gfilter ) {
					$gfilters = array();
					$gkey = '';
					
					if( $gfilter['type'] == 'attribute_group' ) {
						$gkey = $gfilter['group_key'];
						$gfilters = & $gfilter['attributes'];
					} else {
						$gfilters = array( & $gfilter );
					}
			?>
			<?php if( $gfilter['type'] == 'attribute_group' && $gfilter['name'] !== null ) { ?>
				<li class="mfilter-gheader" data-group-key="<?php echo $gkey; ?>"><?php echo $gfilter['name']; ?></li>
			<?php } ?>
				<?php foreach( $gfilters as $filter ) { ?>
					<?php

						$base_type = empty( $filter['base_type'] ) ? $filter['type'] : $filter['base_type'];
						$base_id = empty( $filter['id'] ) ? '' : $filter['id'];
						$display_list_of_items = empty( $filter['display_list_of_items'] ) ? $mfp_options['display_list_of_items']['type'] : $filter['display_list_of_items'];

						if( in_array( $filter['type'], array( 'vehicles', 'levels', 'price', 'slider', 'select', 'search', 'search_oc', 'text', 'related' ) ) ) {
							$display_list_of_items = '-1';
						}

					?>
					<li
						data-type="<?php echo $filter['type']; ?>"
						data-base-type="<?php echo $base_type; ?>"
						data-id="<?php echo $base_id; ?>"
						data-group-key="<?php echo $gkey; ?>"
						data-seo-name="<?php echo $filter['seo_name']; ?>"
						data-inline-horizontal="<?php echo $_horizontalInline ? '1' : '0'; ?>"
						<?php if( isset( $filter['auto_levels'] ) ) { ?>
							data-auto-levels="<?php echo $filter['auto_levels']; ?>"
						<?php } ?>
						data-display-live-filter="<?php 
							$display_live_filter = ! empty( $settings['display_live_filter']['enabled'] ) ? '1' : '-1';

							if( ! empty( $filter['display_live_filter'] ) ) {
								$display_live_filter = $filter['display_live_filter'];
							} 

							if( $display_live_filter == '1' && ! empty( $settings['display_live_filter']['items'] ) ) {
								echo $settings['display_live_filter']['items'];
							} else {
								echo 0;
							}
						?>"
						<?php if( $filter['type'] == 'levels' ) { ?>
							data-labels="<?php echo implode( '||', $filter['labels'] ); ?>"
						<?php } ?>
						data-display-list-of-items="<?php echo $display_list_of_items; ?>"
						class="mfilter-filter-item mfilter-<?php echo $filter['type']; ?> mfilter-<?php echo $base_type; ?><?php echo $base_type == 'attribute' ? ' mfilter-attributes' : ( $base_type == 'option' ? ' mfilter-options' : ( $base_type == 'filter' ? ' mfilter-filters' : '' ) ); ?>"
						>

						<?php if( $filter['collapsed'] != 'hide_header' && ! empty( $filter['name'] ) && empty( $filter['hide_header'] ) ) { ?>
							<div class="mfilter-heading<?php 

								if( $filter['collapsed'] ) {
									if( $filter['collapsed'] == '1' || ( $is_mobile && $filter['collapsed'] == 'mobile' ) || ( ! $is_mobile && $filter['collapsed'] == 'pc' ) ) {
										if( empty( $params[$filter['seo_name']] ) ) {
											echo ' mfilter-collapsed';
										}
									}
								}

							?>">
								<div class="mfilter-heading-content">
									<div class="mfilter-heading-text">
										<span><?php echo $filter['name']; ?></span>

										<?php if( ! empty( $filter['tooltip'] ) ) { ?>
											<i class="fa fa-question pull-right" data-mf-toggle="tooltip" data-html="1" title="<?php echo $filter['tooltip']; ?>"></i>
										<?php } ?>
									</div>
									<i class="mfilter-head-icon"></i>
								</div>
							</div>
						<?php } ?>

						<div class="mfilter-content-opts"<?php 

								if( ( $filter['collapsed'] == '1' || ( $is_mobile && $filter['collapsed'] == 'mobile' ) || ( ! $is_mobile && $filter['collapsed'] == 'pc' ) ) && $filter['collapsed'] != 'hide_header' && $_position != 'content_top' ) {
									if( empty( $params[$filter['seo_name']] ) ) {
										echo ' style="display:none"';
									}
								}

							?>>
							<div class="mfilter-opts-container">
								<div class="mfilter-content-wrapper<?php echo $display_list_of_items == 'scroll' ? ' mfilter-iscroll scroll-content scroll-wrapper' : ''; ?>"<?php echo $display_list_of_items == 'scroll' && $filter['type'] != 'tree' ? ' data-max-height="' . $mfp_options['display_list_of_items']['max_height'] . '" style="max-height:' . $mfp_options['display_list_of_items']['max_height'] . 'px"' : ''; ?>>
									<div class="mfilter-options">
										<?php if( $base_type == 'categories' ) { ?>
											<div class="mfilter-category mfilter-category-<?php echo $filter['type']; ?>">
												<?php if( $filter['type'] == 'related' ) { ?>
													<ul data-labels="<?php echo str_replace( '"', '&quot;', implode( '#|#', $filter['labels'] ) ); ?>">
														<?php $values = empty( $params[$filter['seo_name']] ) ? array() : $params[$filter['seo_name']]; ?>
														<?php foreach( $filter['levels'] as $level_id => $level ) { ?>
															<?php $value = empty( $values[$level_id] ) ? '' : $values[$level_id]; ?>
															<li>
																<select data-type="category-<?php echo $filter['type']; ?>">
																	<option value=""><?php echo $level['name']; ?></option>
																	<?php foreach( $level['options'] as $optKey => $optVal ) { ?>
																		<option value="<?php echo $optKey; ?>"<?php echo $value == $optKey ? ' selected="selected"' : ''; ?>><?php echo $optVal; ?></option>
																	<?php } ?>
																</select>
															</li>
														<?php } ?>
													</ul>
												<?php } else if( $filter['type'] == 'tree' ) { ?>
													<input type="hidden" name="path" value="" />
													<ul class="mfilter-tb" data-top-url="<?php echo $filter['top_url']; ?>" data-top-path="<?php echo $filter['top_path']; ?>">
														<?php foreach( $filter['categories'] as $category ) { ?>
															<?php if( ! empty( $settings['hide_inactive_values'] ) && empty( $category['cnt'] ) ) continue; ?>
															<li class="mfilter-tb-as-tr">
																<div class="mfilter-tb-as-td">
																	<a href="#" data-id="<?php echo $category['id']; ?>" data-parent-id="<?php echo $category['pid']; ?>"><?php echo $category['name']; ?></a>
																</div>
																<div class="mfilter-tb-as-td mfilter-col-count"><span class="mfilter-counter"><?php echo $category['cnt']; ?></span></div>
															</li>
														<?php } ?>
													</ul>
												<?php } else if( $filter['type'] == 'cat_checkbox' ) { ?>
													<div class="mfilter-tb">
														<?php

															$tmpCatShown = 0;
															$tmpCatIdx = 0;

														?>
														<?php foreach( $filter['categories'] as $category ) { ?>
															<?php

																if( $category['cnt'] ) {
																	$tmpCatShown++;
																}

																$tmpCatIdx++;

															?>
															<div class="mfilter-option mfilter-tb-as-tr<?php echo $category['cnt'] ? '' : ' mfilter-hide'; ?><?php echo $tmpCatShown == 1 && $tmpCatIdx > $tmpCatShown ? ' mfilter-first-child' : ''; ?>">
																<div class="mfilter-tb-as-td mfilter-col-input">
																	<input
																		id="mfilter-cat_checkbox-<?php echo $_idx; ?>-<?php echo $category['id']; ?>"
																		type="checkbox"
																		<?php echo ! empty( $params['path'] ) && in_array( $category['id'], $params['path'] ) ? ' checked="checked"' : ''; ?>
																		value="<?php echo $category['id']; ?>" />
																</div>
																<label class="mfilter-tb-as-td" for="mfilter-cat_checkbox-<?php echo $_idx; ?>-<?php echo $category['id']; ?>">
																	<?php echo $category['name']; ?>
																</label>
																<div class="mfilter-tb-as-td mfilter-col-count"><span class="mfilter-counter<?php echo ! empty( $params['path'] ) && in_array( $category['id'], $params['path'] ) ? ' mfilter-close' : ''; ?>"><?php echo $category['cnt']; ?></span></div>
															</div>
														<?php } ?>
													</div>
												<?php } ?>

												<?php if( ! empty( $filter['show_button'] ) ) { ?>
													<div class="mfilter-button">
														<a href="#" class="button"><?php echo $text_button_apply; ?></a>
													</div>
												<?php } ?>
											</div>
										<?php } else if( $filter['type'] == 'search' || $filter['type'] == 'search_oc' ) { ?>
											<div class="mfilter-option mfilter-search<?php echo ! empty( $filter['button'] ) ? ' mfilter-search-button' : ''; ?>">
												<input
													id="mfilter-opts-search"
													type="text"
													class="form-control"
													data-refresh-delay="<?php echo isset( $filter['refresh_delay'] ) ? $filter['refresh_delay'] : '-1'; ?>"
													value="<?php echo isset( $params['search'][0] ) ? $params['search'][0] : ( isset( $params['search_oc'][0] ) ? $params['search_oc'][0] : '' ); ?>"
													/>

												<?php if( ! empty( $filter['button'] ) ) { ?>
													<i
														id="mfilter-opts-search_button"
														type="submit"
														></i>
												<?php } ?>
											</div>
										<?php } else if( $filter['type'] == 'price' ) { ?>
											<div class="mfilter-option mfilter-price">
												<div class="mfilter-price-inputs">
													<?php echo $getSymbolLeft; ?>
													<input
														id="mfilter-opts-price-min"
														type="text"
														class="form-control"
														value="<?php echo isset( $params['price'][0] ) ? $params['price'][0] : ''; ?>"
														/>
														<?php echo $getSymbolRight; ?>
														-
													<?php echo $getSymbolLeft; ?>
													<input
														id="mfilter-opts-price-max"
														type="text"
														class="form-control"
														value="<?php echo isset( $params['price'][1] ) ? $params['price'][1] : ''; ?>"
														/>
														<?php echo $getSymbolRight; ?>
												</div>
												<div class="mfilter-price-slider">
													<div id="mfilter-price-slider"></div>
												</div>
											</div>
										<?php } else if( $filter['type'] == 'slider' ) { ?>
											<div class="mfilter-option mfilter-slider">
												<div class="mfilter-slider-inputs">
													<input
														class="mfilter-opts-slider-min form-control"
														type="text"
														value=""
														readonly="readonly"
														/>
														-
													<input
														class="mfilter-opts-slider-max form-control"
														type="text"
														value=""
														readonly="readonly"
														/>
												</div>
												<div class="mfilter-slider-container">
													<div class="mfilter-slider-slider"></div>
												</div>
												<div class="mfilter-slider-data" style="display: none;"><?php 
													$mfilter_slider_data = array();

													$sort_order = 0;
													foreach( $filter['options'] as $key => $tmp ) {
														$tmp['sort_order'] = $sort_order++;
														$mfilter_slider_data[$key] = $tmp;
													}

													echo base64_encode(json_encode( $mfilter_slider_data )); 
												?></div>
											</div>
										<?php } else if( $filter['type'] == 'text' ) { ?>
											<div class="mfilter-option mfilter-text">
												<div class="mfilter-slider-inputs">
													<input
														class="form-control"
														id="mfilter-opts-text-<?php echo $_idx; ?>-<?php echo $base_id; ?>"
														type="text"
														value="<?php echo ! empty( $params[$filter['seo_name']][0] ) ? str_replace( '"', '&quot;', $params[$filter['seo_name']][0] ) : ''; ?>"
														name="<?php echo $filter['seo_name']; ?>"
														/>
												</div>
											</div>
										<?php } else if( $filter['type'] == 'rating' ) { ?>
											<div class="mfilter-tb">
												<?php for( $i = 5; $i >= 1; $i-- ) { ?>
													<div class="mfilter-option mfilter-tb-as-tr">
														<div class="mfilter-tb-as-td mfilter-col-input">
															<input
																id="mfilter-opts-rating-<?php echo $_idx; ?>-<?php echo $i; ?>"
																type="checkbox"
																<?php echo ! empty( $params['rating'] ) && in_array( $i, $params['rating'] ) ? ' checked="checked"' : ''; ?>
																value="<?php echo $i; ?>" />
														</div>
														<label class="mfilter-tb-as-td" for="mfilter-opts-rating-<?php echo $_idx; ?>-<?php echo $i; ?>">
															<?php echo $i; ?> <img src="catalog/view/theme/default/stylesheet/mf/images/stars-<?php echo $i; ?>.png" alt="" />
														</label>
														<div class="mfilter-tb-as-td mfilter-col-count"><span class="mfilter-counter">0</span></div>
													</div>
												<?php } ?>
											</div>
										<?php } else if( in_array( $filter['type'], array( 'stock_status', 'manufacturers', 'checkbox', 'radio', 'image_list_radio', 'image_list_checkbox' ) ) ) { ?>
											<?php

												$_tmp_type = $filter['type'];

												if( in_array( $filter['type'], array( 'stock_status', 'manufacturers' ) ) ) {
													$_tmp_type = 'checkbox';
												}

											?>
											<div class="mfilter-options-container">
												<div class="mfilter-tb">
												<?php $options_tmp = array(); ?>
												<?php foreach( $filter['options'] as $option_id => $option ) { if( $option['name'] === '' || isset( $options_tmp[$option['key']] ) ) continue; $options_tmp[$option['key']] = true; ?>
													<?php echo $_position == 'content_top' ? '<div class="mfilter-tb">' : ''; ?>
													<div class="mfilter-option mfilter-tb-as-tr">
														<div class="mfilter-tb-as-td mfilter-col-input">
															<input 
																id="mfilter-opts-attribs-<?php echo $_idx; ?>-<?php echo $base_id; ?>-<?php echo $option['key']; ?>" 
																name="<?php echo $filter['seo_name']; ?>"
																type="<?php echo $_tmp_type == 'image_list_checkbox' ? 'checkbox' : ( $_tmp_type == 'image_list_radio' ? 'radio' : $_tmp_type ); ?>"
																<?php echo ! empty( $params[$filter['seo_name']] ) && ( in_array( $option['value'], $params[$filter['seo_name']] ) || in_array( $option['key'], $params[$filter['seo_name']] ) ) ? ' checked="checked"' : ''; ?>
																value="<?php echo str_replace( '"', '&quot;', $option['value'] ); ?>" />
														</div>
														<label class="mfilter-tb-as-td" for="mfilter-opts-attribs-<?php echo $_idx; ?>-<?php echo $base_id; ?>-<?php echo $option['key']; ?>">
															<?php if( in_array( $_tmp_type, array( 'image_list_radio', 'image_list_checkbox' ) ) ) { ?>
																<?php

																	$w = empty( $settings['image_size_width'] ) ? 20 : (int) $settings['image_size_width'];
																	$h = empty( $settings['image_size_height'] ) ? 20 : (int) $settings['image_size_height'];

																?>
																<?php echo Mfilter_Helper::renderValue( $option, '<img src=":image" width=":w" height=":h" /> :name', array(
																	'w' => $w, 'h' => $h
																)); ?>
															<?php } else { ?>
																<?php echo Mfilter_Helper::renderValue( $option ); ?>
															<?php } ?>
														</label>
														<div class="mfilter-tb-as-td mfilter-col-count"><span class="mfilter-counter">0</span></div>
													</div>
													<?php echo $_position == 'content_top' ? '</div>' : ''; ?>
												<?php } ?>
												</div>
											</div>
										<?php } else if( $filter['type'] == 'vehicles' ) { ?>
											<div class="mfilter-tb">
												<div class="mfilter-option mfilter-select mfilter-vehicles">
													<?php $kk = 0; foreach( $filter['options'] as $k => $v ) { ?>
														<select class="form-control mf_selectpicker" data-type="vehicle-<?php echo $k; ?>">
															<?php if( ! empty( $filter['labels'][$k] ) ) { ?>
																<option value=""><?php echo $filter['labels'][$k]; ?></option>
															<?php } else { ?>
																<option value=""><?php echo $text_select; ?></option>
															<?php } ?>
															<?php foreach( $v as $option_id => $option ) { ?>
																<option 
																	id="mfilter-opts-select-<?php echo $_idx; ?>-<?php echo $base_id; ?>-<?php echo $option['key']; ?>"
																	value="<?php echo str_replace( '"', '&quot;', $option['value'] ); ?>"
																	data-name="<?php echo $option['name']; ?>"
																	data-total="<?php echo isset( $option['total'] ) ? $option['total'] : ''; ?>"
																	<?php echo ! empty( $params[$filter['seo_name']] ) && isset( $params[$filter['seo_name']][$kk] ) && $option['value'] == $params[$filter['seo_name']][$kk] ? ' selected="selected"' : ''; ?>
																	<?php if( ! empty( $option['image'] ) ) { ?>
																		data-image="<?php echo $option['image']; ?>"
																	<?php } ?>
																	><?php echo $option['name']; ?></option>
															<?php } ?>
														</select>
													<?php $kk++; } ?>
												</div>
											</div>
										<?php } else if( $filter['type'] == 'levels' ) { ?>
											<div class="mfilter-tb">
												<div class="mfilter-option mfilter-select mfilter-levels">
													<?php $kk = 0; foreach( $filter['options'] as $k => $v ) { ?>
														<select class="form-control mf_selectpicker" data-type="level-<?php echo $k; ?>">
															<?php if( ! empty( $filter['labels'][$k] ) ) { ?>
																<option value=""><?php echo $filter['labels'][$k]; ?></option>
															<?php } else { ?>
																<option value=""><?php echo $text_select; ?></option>
															<?php } ?>
															<?php foreach( $v as $option_id => $option ) { ?>
																<option 
																	id="mfilter-opts-select-<?php echo $_idx; ?>-<?php echo $base_id; ?>-<?php echo $option['key']; ?>"
																	value="<?php echo str_replace( '"', '&quot;', $option['value'] ); ?>"
																	data-name="<?php echo $option['name']; ?>"
																	data-total="<?php echo isset( $option['total'] ) ? $option['total'] : ''; ?>"
																	<?php echo ! empty( $params[$filter['seo_name']] ) && isset( $params[$filter['seo_name']][$kk] ) && $option['value'] == $params[$filter['seo_name']][$kk] ? ' selected="selected"' : ''; ?>
																	<?php if( ! empty( $option['image'] ) ) { ?>
																		data-image="<?php echo $option['image']; ?>"
																	<?php } ?>
																	><?php echo $option['name']; ?></option>
															<?php } ?>
														</select>
													<?php $kk++; } ?>
												</div>
											</div>
										<?php } else if( $filter['type'] == 'select' ) { ?>
											<div class="mfilter-tb">
												<div class="mfilter-option mfilter-select">
													<select class="form-control">
														<option value=""><?php echo $text_select; ?></option>
														<?php foreach( $filter['options'] as $option_id => $option ) { ?>
															<option 
																id="mfilter-opts-select-<?php echo $_idx; ?>-<?php echo $base_id; ?>-<?php echo $option['key']; ?>"
																value="<?php echo str_replace( '"', '&quot;', $option['value'] ); ?>"
																data-name="<?php echo $option['name']; ?>"
																<?php echo ! empty( $params[$filter['seo_name']] ) && in_array( $option['value'], $params[$filter['seo_name']] ) ? ' selected="selected"' : ''; ?>
																><?php echo $option['name']; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										<?php } else if( in_array( $filter['type'], array( 'image', 'image_radio' ) ) ) { ?>
											<div class="mfilter-tb">
												<ul>
													<?php foreach( $filter['options'] as $option_id => $option ) { ?>
														<li class="mfilter-option mfilter-image">
															<input
																id="mfilter-opts-attribs-<?php echo $_idx; ?>-<?php echo $base_id; ?>-<?php echo $option['key']; ?>" 
																name="<?php echo $filter['seo_name']; ?>"
																type="<?php echo $filter['type'] == 'image' ? 'checkbox' : 'radio'; ?>" 
																style="display:none"
																<?php echo ! empty( $params[$filter['seo_name']] ) && ( in_array( $option['value'], $params[$filter['seo_name']] ) || in_array( $option['key'], $params[$filter['seo_name']] ) ) ? ' checked="checked"' : ''; ?>
																value="<?php echo str_replace( '"', '&quot;', $option['value'] ); ?>" />
															<label for="mfilter-opts-attribs-<?php echo $_idx; ?>-<?php echo $base_id; ?>-<?php echo $option['key']; ?>" title="<?php echo $option['name']; ?>">
																<?php echo Mfilter_Helper::renderValue( $option, '<img src=":image" />' ); ?>
															</label>
														</li>
													<?php } ?>
												</ul>
											</div>
										<?php } ?>
									</div>
								</div>

								<div class="mfilter-clearfix"></div>
							</div>

							<div class="mfilter-clearfix"></div>
						</div>
					</li>
				<?php } ?>
			<?php } ?>
		</ul>
		<?php echo $buttons['bottom']; ?>
	</div>
</div>

<?php if( ! empty( $hide_container ) ) { ?>
	</div>
<?php } ?>

<script type="text/javascript">
	MegaFilterLang.text_display = '<?php echo $text_display; ?>';
	MegaFilterLang.text_list	= '<?php echo $text_list; ?>';
	MegaFilterLang.text_grid	= '<?php echo $text_grid; ?>';
	MegaFilterLang.text_select	= '<?php echo $text_select; ?>';
	
	if( typeof MegaFilterOverrideFn == 'undefined' ) {
		var MegaFilterOverrideFn = {};
	}
	
	if( typeof MegaFilterCommonData == 'undefined' ) {
		var MegaFilterCommonData = {};
	}
	
	MegaFilterCommonData.seo = {
		'currentUrl' : '<?php echo addslashes( $current_url ); ?>',
		'aliases' : <?php echo json_encode( $aliases ); ?>
	};
	
	if( typeof MegaFilterOverrideFn['<?php echo $_idx; ?>'] == 'undefined' ) {
		MegaFilterOverrideFn['<?php echo $_idx; ?>'] = {};
	}
	
	<?php if( ! empty( $settings['javascript'] ) ) { ?>
		<?php echo htmlspecialchars_decode( $settings['javascript'] ); ?>
	<?php } ?>
	
	jQuery().ready(function(){			
		jQuery('#mfilter-box-<?php echo $_idx; ?>').each(function(){
			var _t = jQuery(this).addClass('init'),
				_p = { };
			
			for( var i = 0; i < MegaFilterINSTANCES.length; i++ ) {
				if( _t.attr('id') == MegaFilterINSTANCES[i]._box.attr('id') ) {
					return;
				}
			}
			
			<?php foreach( $requestGet as $k => $v ) { ?>
				_p['<?php echo $k; ?>'] = '<?php echo addslashes( $v ); ?>';
			<?php } ?>
			
			var mfpModule = new MegaFilter();
			
			if( typeof MegaFilterOverrideFn['<?php echo $_idx; ?>'] != 'undefined' ) {
				for( var i in MegaFilterOverrideFn['<?php echo $_idx; ?>'] ) {
					mfpModule[i] = MegaFilterOverrideFn['<?php echo $_idx; ?>'][i];
				}
			}
			
			MegaFilterINSTANCES.push(mfpModule.init( _t, {
				'idx'					: '<?php echo $_idx; ?>',
				'route'					: '<?php echo $_route; ?>',
				'routeProduct'			: '<?php echo $_routeProduct; ?>',
				'routeHome'				: '<?php echo $_routeHome; ?>',
				'routeCategory'			: '<?php echo $_routeCategory; ?>',
				'routeInformation'		: '<?php echo $_routeInformation; ?>',
				'contentSelector'		: '<?php echo empty( $settings['content_selector'] ) ? '#mfilter-content-container' : addslashes( htmlspecialchars_decode( $settings['content_selector'] ) ); ?>',
				'contentSelectorH1'		: '<?php echo empty( $settings['content_selector_h1'] ) ? '#content h1,#content h2' : addslashes( htmlspecialchars_decode( $settings['content_selector_h1'] ) ); ?>',
				'refreshResults'		: '<?php echo empty( $settings["refresh_results"] ) ? "immediately" : $settings["refresh_results"]; ?>',
				'refreshDelay'			: <?php echo empty( $settings["refresh_delay"] ) ? 1000 : (int) $settings["refresh_delay"]; ?>,
				'usingButtonWithCountInfo' : <?php echo empty( $settings['using_button_with_count_info'] ) ? 'false' : 'true'; ?>,
				'autoScroll'			: <?php echo empty( $settings["auto_scroll_to_results"] ) ? 'false' : 'true'; ?>,
				'ajaxGetInfoUrl'		: '<?php echo $ajaxGetInfoUrl; ?>',
				'ajaxResultsUrl'		: '<?php echo $ajaxResultsUrl; ?>',
				'ajaxGetCategoryUrl'	: '<?php echo $ajaxGetCategoryUrl; ?>',
				'priceMin'				: <?php echo (string) $price['min']; ?>,
				'priceMax'				: <?php echo (string) $price['max']; ?>,
				'mijoshop'				: <?php echo $mijo_shop ? 'true' : 'false'; ?>,
				'joo_cart'				: <?php echo $joo_cart ? json_encode( $joo_cart ) : 'false'; ?>,
				'showNumberOfProducts'	: <?php echo empty( $settings['show_number_of_products'] ) ? 'false' : 'true'; ?>,
				'calculateNumberOfProducts' : <?php echo empty( $settings['calculate_number_of_products'] ) ? 'false' : 'true'; ?>,
				'addPixelsFromTop'		: <?php echo empty( $settings['add_pixels_from_top'] ) ? 0 : (int) $settings['add_pixels_from_top']; ?>,
				'displayListOfItems'	: {
					'type'				: '<?php echo $mfp_options['display_list_of_items']['type']; ?>',
					'limit_of_items'	: <?php echo $mfp_options['display_list_of_items']['limit_of_items']; ?>,
					'maxHeight'			: <?php echo $mfp_options['display_list_of_items']['max_height']; ?>,
					'textMore'			: '<?php echo $text_show_more; ?>',
					'textLess'			: '<?php echo $text_show_less; ?>',
					'standardScroll'	: <?php echo $mfp_options['display_list_of_items']['standard_scroll'] ? 'true' : 'false'; ?>
				},
				'smp'					: {
					'isInstalled'			: <?php echo empty( $smp['isInstalled'] ) ? 'false' : 'true'; ?>,
					'disableConvertUrls'	: <?php echo empty( $smp['disableConvertUrls'] ) ? 'false' : 'true'; ?>
				},
				'params'					: _p,
				'inStockDefaultSelected'	: <?php echo empty( $settings['in_stock_default_selected'] ) ? 'false' : 'true'; ?>,
				'inStockStatus'				: '<?php echo empty( $settings['in_stock_status'] ) ? 7 : $settings['in_stock_status']; ?>',
				'showLoaderOverResults'		: <?php echo empty( $settings['show_loader_over_results'] ) ? 'false' : 'true'; ?>,
				'showLoaderOverFilter'		: <?php echo empty( $settings['show_loader_over_filter'] ) ? 'false' : 'true'; ?>,
				'hideInactiveValues'		: <?php echo empty( $settings['hide_inactive_values'] ) ? 'false' : 'true'; ?>,
				'manualInit'				: <?php echo empty( $settings['manual_init'] ) ? 'false' : 'true'; ?>,
				'homePageAJAX'				: <?php echo empty( $settings['home_page_ajax'] ) ? 'false' : 'true'; ?>,
				'homePageContentSelector'	: '<?php echo empty( $settings['home_page_content_selector'] ) ? '#content' : addslashes( htmlspecialchars_decode( $settings['home_page_content_selector'] ) ); ?>',
				'ajaxPagination'			: <?php echo empty( $settings['ajax_pagination'] ) ? 'false' : 'true'; ?>,
				'text'						: {
					'loading'		: '<?php echo $text_loading; ?>',
					'go_to_top'		: '<?php echo $text_go_to_top; ?>',
					'init_filter'	: '<?php echo $text_init_filter; ?>',
					'initializing'	: '<?php echo $text_initializing; ?>'
				},
				'color' : {
					'loader_over_results' : '<?php echo empty( $settings['color_of_loader_over_results'] ) ? '#ffffff' : $settings['color_of_loader_over_results']; ?>',
					'loader_over_filter' : '<?php echo empty( $settings['color_of_loader_over_filter'] ) ? '#ffffff' : $settings['color_of_loader_over_filter']; ?>'
				},
				'direction'				: '<?php echo $direction; ?>',
				'seo' : {
					'enabled'	: <?php echo empty( $seo['enabled'] ) ? 'false' : 'true'; ?>,
					'aliasesEnabled' : <?php echo empty( $seo['aliases_enabled'] ) ? 'false' : 'true'; ?>,
					'alias'		: '<?php echo addslashes( $seo_alias ); ?>',
					'parameter'	: '<?php echo empty( $seo['url_parameter'] ) ? 'mfp' : $seo['url_parameter']; ?>',
					'separator'	: '<?php echo empty( $seo['separator'] ) ? 'mfp' : $seo['separator']; ?>',
					'valuesAreLinks' : <?php echo empty( $seo['values_are_links'] ) ? 'false' : 'true'; ?>,
					'valuesLinksAreClickable' : <?php echo empty( $seo['values_links_are_clickable'] ) ? 'false' : 'true'; ?>,
					'usePostAjaxRequests' : <?php echo empty( $seo['use_post_ajax_requests'] ) ? 'false' : 'true'; ?>,
					'addSlashAtTheEnd' : <?php echo empty( $seo['add_slash_at_the_end'] ) ? 'false' : 'true'; ?>
				},
				'displayAlwaysAsWidget'		: <?php echo empty( $displayAlwaysAsWidget ) ? 'false' : 'true'; ?>,
				'displaySelectedFilters'	: <?php echo empty( $displaySelectedFilters ) ? 'false' : "'" . $displaySelectedFilters . "'"; ?>,
				'isMobile' : <?php echo empty( $is_mobile ) ? 'false' : 'true'; ?>,
				'widgetWithSwipe' : <?php echo empty( $widgetWithSwipe ) ? 'false' : 'true'; ?>,
				'widgetPosition' : '<?php echo empty( $widgetPosition ) ? '' : $widgetPosition; ?>',
				'theme' : '<?php echo addslashes( $theme ); ?>',
				'data' : {
					'category_id' : <?php echo empty( $_data['filter_category_id'] ) ? 'null' : (int) $_data['filter_category_id']; ?>
				}
			}));
		});
	});
</script>