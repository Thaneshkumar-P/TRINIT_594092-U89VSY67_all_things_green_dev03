<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Services_Group extends GVAElement_Base{
  	const NAME = 'gva-services-group';
  	const TEMPLATE = 'general/services-group/';
  	const CATEGORY = 'orgarium_general';

  	public function get_name() {
	 	return self::NAME;
  	}

  	public function get_categories() {
	 	return array(self::CATEGORY);
  	}


	public function get_title() {
		return esc_html__('Services Group', 'orgarium-themer');
	}

	public function get_keywords() {
		return [ 'services', 'content', 'carousel', 'grid' ];
	}

	public function get_script_depends() {
		return [
			'swiper',
			'gavias.elements',
		];
	}

	public function get_style_depends() {
		return array('swiper');
	}

	 protected function register_controls() {
		  $this->start_controls_section(
				'section_content',
				[
					 'label' => esc_html__('Content', 'orgarium-themer'),
				]
		  );
		  $this->add_control( // xx Layout
				'layout_heading',
				[
					 'label'   => esc_html__('Layout', 'orgarium-themer'),
					 'type'    => Controls_Manager::HEADING,
				]
		  );
			$this->add_control(
				'layout',
				[
					 'label'   => esc_html__('Layout Display', 'orgarium-themer'),
					 'type'    => Controls_Manager::SELECT,
					 'default' => 'carousel',
					 'options' => [
						  'grid'      => esc_html__('Grid', 'orgarium-themer'),
						  'carousel'  => esc_html__('Carousel', 'orgarium-themer')
					 ]
				]
		  );
		  $this->add_control(
				'style',
				[
					 'label' => esc_html__('Style', 'orgarium-themer'),
					 'type' => Controls_Manager::SELECT,
					 'options' => [
						  'style-1' => esc_html__('Style I', 'orgarium-themer'),
						  'style-2' => esc_html__('Style II', 'orgarium-themer'),
						  'style-3' => esc_html__('Style III', 'orgarium-themer'),
						  'style-4' => esc_html__('Style IV', 'orgarium-themer')
					 ],
					 'default' => 'style-1',
				]
		  );
		  $repeater = new Repeater();
		  $repeater->add_control(
			 'title',
			 [
				'label'       => esc_html__('Title', 'orgarium-themer'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Add your Title',
				'label_block' => true,
			 ]
		  );
		  $repeater->add_control(
			 'desc',
			 [
				'label'       => esc_html__('Description', 'orgarium-themer'),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => 'Lorem ipsum dolor sit am adipi sicing elit, sed do consulting firms Orgarium leggings.',
				'label_block' => true,
			 ]
		  );
		  $repeater->add_control(
				'image',
				[
					 'label'      => esc_html__('Choose Image', 'orgarium-themer'),
					 'default'    => [
						  'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/image-1.jpg',
					 ],
					 'type'       => Controls_Manager::MEDIA,
					 'show_label' => false,
				]
		  );
		  $repeater->add_control(
			 'link',
			 [
				'label'     => esc_html__('Link', 'orgarium-themer'),
				'type'      => Controls_Manager::URL,
				'placeholder' => esc_html__('https://your-link.com', 'orgarium-themer'),
				'label_block' => true
			 ]
		  );
		  
		  $this->add_control(
			 'services_content',
			 [
				'label'       => esc_html__('Service Content Item', 'orgarium-themer'),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
				  	array(
					 	'title'  => esc_html__('Organic Juice', 'orgarium-themer'),
					 	'image'  => [
                     'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/service-1.jpg'
                  ]
				  	),
				  	array(
					 	'title'  => esc_html__('Sunflowers', 'orgarium-themer'),
					 	'image'  => [
                     'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/service-2.jpg'
                  ]
				  	),
				  	array(
					 	'title'  => esc_html__('Cow Milk & Meat', 'orgarium-themer'),
					 	'image'  => [
                     'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/service-3.jpg'
                  ]
				  	)
				)
			 ]
		  );
		  $this->add_control(
            'image_size',
            [
               'label'     => esc_html__('Image Style', 'orgarium-themer'),
               'type'      => \Elementor\Controls_Manager::SELECT,
               'options'   => $this->get_thumbnail_size(),
               'default'   => 'orgarium_medium'
            ]
        );
		  $this->end_controls_section();

		  $this->add_control_carousel(false, array('layout' => 'carousel'));

		  $this->add_control_grid(array('layout' => 'grid'));

		  // Icon Styling
		  $this->start_controls_section(
			 'section_style_icon',
			 [
				'label' => esc_html__('Icon', 'orgarium-themer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			 ]
		  );

		  $this->add_control(
			 'icon_color',
			 [
				'label' => esc_html__('Icon Color', 'orgarium-themer'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .box-icon i' => 'color: {{VALUE}};',
				  '{{WRAPPER}} .gsc-services-group .service-item-content svg' => 'fill: {{VALUE}};'
				],
			 ]
		  );

		  $this->add_responsive_control(
			 'icon_size',
			 [
				'label' => esc_html__('Size', 'orgarium-themer'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
				  'size' => 60
				],
				'range' => [
				  'px' => [
					 'min' => 20,
					 'max' => 80, 
				  ],
				],
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				  '{{WRAPPER}} .gsc-services-group .service-item-content .box-icon svg' => 'width: {{SIZE}}{{UNIT}};'
				],
			 ]
		  );

		  $this->add_responsive_control(
			 'icon_space',
			 [
				'label' => esc_html__('Spacing', 'orgarium-themer'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
				  'size' => 30,
				],
				'range' => [
				  'px' => [
					 'min' => 0,
					 'max' => 100,
				  ],
				],
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			 ]
		  );

		  $this->add_responsive_control(
			 'icon_padding',
			 [
				'label' => esc_html__('Padding', 'orgarium-themer'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .box-icon .box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			 ]
		  );

		  $this->end_controls_section();

		  $this->start_controls_section(
			 'section_style_content',
			 [
				'label' => esc_html__('Content', 'orgarium-themer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			 ]
		  );

		  $this->add_control(
			 'heading_title',
			 [
				'label' => esc_html__('Title', 'orgarium-themer'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			 ]
		  );

		  $this->add_responsive_control(
			 'title_bottom_space',
			 [
				'label' => esc_html__('Spacing', 'orgarium-themer'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
				  'px' => [
					 'min' => 0,
					 'max' => 100,
				  ],
				],
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			 ]
		  ); 

		  $this->add_control(
			 'title_color',
			 [
				'label' => esc_html__('Color', 'orgarium-themer'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .title' => 'color: {{VALUE}};',
				  '{{WRAPPER}} .gsc-services-group .service-item-content .title a' => 'color: {{VALUE}};',
				],
			 ]
		  );

		  $this->add_group_control(
			 Group_Control_Typography::get_type(),
			 [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .gsc-services-group .service-item-content .title, {{WRAPPER}} .gsc-services-group .service-item-content .title a',
			 ]
		  );

		  $this->add_control(
			 'heading_description',
			 [
				'label' => esc_html__('Description', 'orgarium-themer'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
				  'style' => ['style-1'],
				],
			 ]
		  );

		  $this->add_control(
			 'description_color',
			 [ 
				'label' => esc_html__('Color', 'orgarium-themer'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .desc' => 'color: {{VALUE}};',
				],
				'condition' => [
				  'style' => ['style-1'],
				],
			 ]
		  );

		  	$this->add_group_control(
			 	Group_Control_Typography::get_type(),
			 	[
					'name' => 'description_typography',
					'selector' => '{{WRAPPER}} .gsc-services-group .service-item-content',
					'condition' => [
					  	'style' => ['style-1'],
					]
				]
		  	);

		  $this->end_controls_section();
	 }

	 protected function render() {
		$settings = $this->get_settings_for_display();
		printf('<div class="gva-element-%s gva-element">', $this->get_name() );
		if( !empty($settings['layout']) ){
			include $this->get_template(self::TEMPLATE . $settings['layout'] . '.php');
		}
		print '</div>';
	 }

}

$widgets_manager->register(new GVAElement_Services_Group());
