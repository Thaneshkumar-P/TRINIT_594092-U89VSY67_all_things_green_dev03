<?php
Redux::setSection( $opt_name, array(
  	'title' => esc_html__('Footer Options', 'orgarium'),
  	'icon' => 'el-icon-compass',
  	'fields' => array(
	 	array(
			'id' 			=> 'copyright_default',
			'type' 		=> 'button_set',
			'title' 		=> esc_html__('Enable/Disable Copyright Text', 'orgarium'),
			'options' 	=> array(
				'yes' 	=> esc_html__('Enable', 'orgarium'),
				'no' 		=> esc_html__('Disable', 'orgarium')
			),
			'default' 	=> 'yes'
	 	),
	 	array(
			'id' 			=> 'copyright_text',
			'type' 		=> 'editor',
			'title' 		=> esc_html__('Footer Copyright Text', 'orgarium'),
			'default' 	=> esc_html__('Copyright - 2022 - Company - All rights reserved. Powered by WordPress.', 'orgarium')
	 	),
  	)
));