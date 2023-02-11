<?php
if (!defined('ABSPATH')) {
	 exit; // Exit if accessed directly.
}

require 'includes/overrides.php';
require 'includes/icons.php';

class Orgarium_Elementor_Addons {

 	public function __construct() {
		add_action('elementor/elements/categories_registered', array($this, 'categories_registered'));
		add_action('elementor/widgets/register', array($this, 'widgets_registered'));
 		add_action('elementor/editor/before_enqueue_scripts', [$this, 'editor_scripts']);
 		
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'enqueue_frontend_scripts' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_frontend_styles' ] );
		add_action( 'elementor/preview/enqueue_styles', function(){
	  		wp_enqueue_style( 'swiper' );
		});

 	}

 	public function include_addons(){
	
 	}

 	public function widgets_registered($widgets_manager){
		
      require_once 'el-widgets/base.php';

		$files = glob( GAVIAS_ORGARIUM_PLUGIN_DIR . '/elementor/el-widgets/general/*.php');
   	foreach ($files as $file) {
      	if(file_exists($file)) {
         	require_once $file;
      	}
   	}

      $files = glob( GAVIAS_ORGARIUM_PLUGIN_DIR . '/elementor/el-widgets/post/*.php');
      foreach ($files as $file) {
         if(file_exists($file)) {
            require_once $file;
         }
      }

   	$files = glob( GAVIAS_ORGARIUM_PLUGIN_DIR . '/elementor/el-widgets/dynamic-tags/*.php'); 
   	foreach ($files as $file) {
      	if(file_exists($file)) {
         	require_once $file;
      	}
   	}

      if(class_exists('WooCommerce')){
      	$files = glob( GAVIAS_ORGARIUM_PLUGIN_DIR . '/elementor/el-widgets/product/*.php'); 
      	foreach ($files as $file) {
         	if(file_exists($file)) {
            	require_once $file;
         	}
      	}
       }  

      require_once 'el-widgets/layout/template-content.php';

		if(class_exists('Tribe__Events__Main')){
	  		require_once 'el-widgets/plugins/events.php';
		}

		if(class_exists('RevSlider')){
	  		require_once 'el-widgets/plugins/rev-slider.php';
		} 

		if(class_exists('WooCommerce')){
	  		require_once 'el-widgets/plugins/cart.php';
		}

 	}

 	public function categories_registered(){
		Elementor\Plugin::instance()->elements_manager->add_category(
			'orgarium_general',
			array(
		  		'title' => __('Orgarium Gereral', 'orgarium-themer'),
		  		'icon'  => 'fa fa-plug',
			),
		1);

		Elementor\Plugin::instance()->elements_manager->add_category(
			'orgarium_layout',
			array(
		  		'title' => __('Orgarium Layout', 'orgarium-themer'),
		  		'icon'  => 'fa fa-plug',
			),
		1);
		Elementor\Plugin::instance()->elements_manager->add_category(
			'orgarium_woocommerce',
			array(
		  		'title' => __('Orgarium WooCommerce', 'orgarium-themer'),
		  		'icon'  => 'fa fa-plug',
			),
		1);
		Elementor\Plugin::instance()->elements_manager->add_category(
			'orgarium_post',
			array(
		  		'title' => __('Orgarium Post', 'orgarium-themer'),
		  		'icon'  => 'fa fa-plug',
			),
		1);
 	}

 	public function editor_scripts(){
      wp_enqueue_style('orgarium-elementor-editor', GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/elementor.css', false, '1.0.0');
      wp_enqueue_style('orgarium-awesome-icons', ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/all.min.css' );
      wp_enqueue_script('orgarium-elementor-editor', GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/editor.js' , array(), '1.0.0', true);

 	}
 	public function enqueue_frontend_scripts(){
      wp_register_script('swiper', GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/libs/swiper/swiper.min.js' , array(), '1.0.0', true);
		
      wp_register_script('jquery.appear', GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/libs/jquery.appear.js' , array(), '1.0.0', true);
		wp_register_script('jquery.count_to', GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/libs/count-to.js' , array(), '1.0.0', true);
		wp_register_script('isotope', GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/libs/isotope.pkgd.min.js' , array(), '1.0.0', true);
		wp_register_script('countdown', GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/libs/countdown.js' , array(), '1.0.0', true);
		wp_register_script('gavias.elements', GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/main.js' , array(), '1.0.0', true);
		
		wp_register_script('typed', GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/libs/typed.min.js' , array(), '1.0.0', true);
      wp_register_script('circle-progress', GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/libs/circle-progress.min.js' , array(), '1.0.0', true);
 	
      wp_register_script('map-ui', GAVIAS_ORGARIUM_PLUGIN_URL . '/elementor/assets/libs/jquery.ui.map.min.js');
      $google_api_key = apply_filters('gavias-elements/map-api', '');
      wp_register_script(
        'google-maps-api',
        add_query_arg( array( 'key' => $google_api_key ), 'https://maps.googleapis.com/maps/api/js' ), false, false, true
      );
      wp_register_script('gmap3', GAVIAS_ORGARIUM_PLUGIN_URL . '/elementor/assets/libs/gmap3.min.js'); 

   }


 	public function enqueue_frontend_styles() {
		wp_register_style('swiper', GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/libs/swiper/swiper.min.css', false, '1.0.0');
 	}
 	
	}

$addons = new Orgarium_Elementor_Addons();

