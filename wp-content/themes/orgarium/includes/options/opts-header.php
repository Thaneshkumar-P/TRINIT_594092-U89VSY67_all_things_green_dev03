<?php
	 function orgarium_get_all_menus(){
     $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
     $results = array();
     foreach ($menus as $key => $menu) {
      $results[$menu->slug] = $menu->name;
     }
     return $results;
  }
  	Redux::setSection( $opt_name, array(
	 	'title' 	=> esc_html__('Header Options', 'orgarium'),
	 	'icon' 	=> 'el-icon-compass',
	 	'fields' => array(
			array(
			  'id' 		=> 'header_logo', 
			  'type' 	=> 'media',
			  'url' 		=> true,
			  'title' 	=> esc_html__('Logo in header default', 'orgarium'), 
			  'default' => ''
			),  
			array(
			  'id'  		=> 'header_mobile_settings',
			  'type'  	=> 'info',
			  'raw' 		=> '<h3 class="margin-bottom-0">' . esc_html__('Header Mobile settings', 'orgarium') . '</h3>'
			),
			array(
			  'id' 		=> 'hm_logo',
			  'type' 	=> 'media',
			  'url' 		=> true,
			  'title' 	=> esc_html__('Header Mobile | Logo', 'orgarium'),
			  'default' => ''
			),
			array(
			  'id' 		=> 'hm_show_topbar',
			  'type' 	=> 'button_set',
			  'title' 	=> esc_html__('Show Topbar', 'orgarium'),
			  'options' => array('yes' => 'Enable', 'no' => 'Disable'),
			  'default' => 'yes'
			),
			array(
	        'id' 		=> 'hm_topbar_information',
	        'type' 	=> 'editor',
	        'title' 	=> esc_html__('Topbar Information', 'orgarium'),
	        'default' => '<ul class="inline"><li><i class="fa fa-envelope"></i>contact@example.com</li><li><i class="fa fa-phone"></i>666 888 0000</li></ul>'
	      ),
			
			//-- Socials --
			array(
			  'id'  		=> 'header_mobile_socials_settings',
			  'type'  	=> 'info',
			  'raw' 		=> '<h3 class="margin-bottom-0">' . esc_html__('Social Header Mobile Settings', 'orgarium') . '</h3>'
			),
			array(
				'id'			=> 'hm_social_facebook',
				'type' 		=> 'text',
				'title' 		=> esc_html__('Facebook', 'orgarium'),
				'desc'		=> esc_html__('Enter your Facebook profile URL.', 'orgarium'),
				'default'	=> ''
			),
			array(
				'id'			=> 'hm_social_instagram',
				'type'		=> 'text',
				'title'		=> esc_html__('Instagram', 'orgarium'),
				'desc'		=> esc_html__('Enter your Instagram profile URL.', 'orgarium'),
				'default'	=> ''
			),
			array(
				'id'			=> 'hm_social_twitter',
				'type'		=> 'text',
				'title'		=> esc_html__('Twitter', 'orgarium'),
				'desc'		=> esc_html__('Enter your Twitter profile URL.', 'orgarium'),
				'default'	=> ''
			),
			array(
				'id'			=> 'hm_social_linkedin',
				'type'		=> 'text',
				'title'		=> esc_html__('LinedIn', 'orgarium'),
				'desc'		=> esc_html__('Enter your LinkedIn profile URL.', 'orgarium'),
				'default'	=> ''
			),
			array(
				'id'			=> 'hm_social_pinterest',
				'type'		=> 'text',
				'title'		=> esc_html__('Pinterest', 'orgarium'),
				'desc'		=> esc_html__('Enter your Pinterest profile URL.', 'orgarium'),
				'default'	=> ''
			),
			array(
				'id'			=> 'hm_social_tumblr',
				'type'		=> 'text',
				'title'		=> esc_html__('Tumblr', 'orgarium'),
				'desc'		=> esc_html__('Enter your Tumblr profile URL.', 'orgarium'),
				'default'	=> ''
			),
			array(
				'id'			=> 'hm_social_vimeo',
				'type'		=> 'text',
				'title'		=> esc_html__('Vimeo', 'orgarium'),
				'desc'		=> esc_html__('Enter your Vimeo profile URL.', 'orgarium'),
				'default'	=> ''
			),
			array(
				'id'			=> 'hm_social_youtube',
				'type'		=> 'text',
				'title'		=> esc_html__('YouTube', 'orgarium'),
				'desc'		=> esc_html__('Enter your YouTube profile URL.', 'orgarium'),
				'default'	=> ''
			)
	 	)
  	));