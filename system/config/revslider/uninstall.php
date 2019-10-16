<?php 
if( !defined( 'ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') )
	exit();

$currentFile = __FILE__;
$currentFolder = dirname($currentFile);
require_once $currentFolder . '/includes/revslider_globals.class.php';

$wpdb = rev_db_class::rev_db_instance();
$tableSliders = $wpdb->prefix . GlobalsRevSlider::TABLE_SLIDERS_NAME;
$tableSlides = $wpdb->prefix . GlobalsRevSlider::TABLE_SLIDES_NAME;
$tableSettings = $wpdb->prefix . GlobalsRevSlider::TABLE_SETTINGS_NAME;
$tableCss = $wpdb->prefix . GlobalsRevSlider::TABLE_CSS_NAME;
$tableAnims = $wpdb->prefix . GlobalsRevSlider::TABLE_LAYER_ANIMS_NAME;

$wpdb->query( "DROP TABLE $tableSliders" );
$wpdb->query( "DROP TABLE $tableSlides" );
$wpdb->query( "DROP TABLE $tableSettings" );
$wpdb->query( "DROP TABLE $tableCss" );
$wpdb->query( "DROP TABLE $tableAnims" );

delete_option('revslider-latest-version');
delete_option('revslider-update-check-short');
delete_option('revslider-update-check');
delete_option('revslider_update_info');
delete_option('revslider-api-key');
delete_option('revslider-username');
delete_option('revslider-code');
delete_option('revslider-valid');
delete_option('revslider-valid-notice');

?>