<?php

if (!defined('ABSPATH')) {
		exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Icon_Box_Group extends GVAElement_Base{
	const NAME = 'gva_icon_box_group';
	const TEMPLATE = 'booking/booking';
	const CATEGORY = 'orgarium_general';

	public function get_categories() {
		return array(self::CATEGORY);
	}
		
	public function get_name() {
		return self::NAME;
	}

	public function get_title() {
		return esc_html__('Icon Box Carousel/Grid', 'orgarium-themer');
	}

	public function get_keywords() {
		return [ 'icon', 'box', 'content', 'carousel', 'grid' ];
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
				'label' 		=> esc_html__('Style', 'orgarium-themer'),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'style-1' => esc_html__('Style I', 'orgarium-themer'),
					'style-2' => esc_html__('Style II', 'orgarium-themer'),
					'style-3' => esc_html__('Style III', 'orgarium-themer'),
					'style-4' => esc_html__('Style IV', 'orgarium-themer'),
					'style-5' => esc_html__('Style V', 'orgarium-themer'),
					'style-6' => esc_html__('Style VI', 'orgarium-themer')
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
				'label'       => esc_html__('Description (Style III, VI)', 'orgarium-themer'),
				'type'        => Controls_Manager::TEXTAREA
			]
		);
		$repeater->add_control(
			'selected_icon',
			[
				'label'      	=> esc_html__('Choose Icon', 'orgarium-themer'),
				'type'       	=> Controls_Manager::ICONS,
				'default' 		=> [
					'value' 		=> 'icon-orgarium-strategy',
					'library' 	=> 'orgarium-icons-theme'
				]
			]
		);
		$repeater->add_control(
			'selected_icon_image',
			[
				'label'      	=> esc_html__('Or Choose Icon Image', 'orgarium-themer'),
				'type'       	=> Controls_Manager::MEDIA,
				'desc'			=> esc_html__('Hidden Icon Font & SVG if choose icon image', 'orgarium-themer')
			]
		);
		$repeater->add_control(
			'link',
			[
				'label'     	=> esc_html__('Link', 'orgarium-themer'),
				'type'      	=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__('https://your-link.com', 'orgarium-themer'),
				'label_block' 	=> true
			]
		);
		
		$repeater->add_control(
			'active',
			[
				'label' 			=> esc_html__('Active', 'orgarium-themer'),
				'type' 			=> Controls_Manager::SWITCHER,
				'placeholder' 	=> esc_html__('Active', 'orgarium-themer'),
				'default' 		=> 'no'
			]
		);

		$this->add_control(
			'icon_boxs',
			[
				'label'       => esc_html__('Brand Content Item', 'orgarium-themer'),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array(
						'title'  					=> esc_html__('Fresh Wheat Sack Food', 'orgarium-themer'),
						'selected_icon' 			=> array('value' => 'flaticon2-wheat-sack')
					),
					array(
						'title'  					=> esc_html__('Organic Fresh Fruits', 'orgarium-themer'),
						'selected_icon' 			=> array('value' => 'flaticon2-grape')
					),
					array(
						'title'  					=> esc_html__('Cows Meat and Milk', 'orgarium-themer'),
						'selected_icon' 			=> array('value' => 'flaticon2-cow')
					),
					array(
						'title'  					=> esc_html__('Fresh Pond & Sea Fish', 'orgarium-themer'),
						'selected_icon' 			=> array('value' => 'flaticon2-fish')
					),
					array(
						'title'  					=> esc_html__('Fresh Organic Vegetable', 'orgarium-themer'),
						'selected_icon' 			=> array('value' => 'flaticon2-healthy-food')
					),
					array(
						'title'  					=> esc_html__('Planet Earth Safety', 'orgarium-themer'),
						'selected_icon' 			=> array('value' => 'flaticon2-planet-earth')
					)
				)
			]
		);
		
		$this->add_control(
			'active_bg',
			[
				'label' => esc_html__('Color', 'orgarium-themer'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-group.style-1 .icon-box-item:after' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['style-1'],
				],
			]
		);

		$this->end_controls_section();

		$this->add_control_carousel(false, array('layout' => 'carousel'));

		$this->add_control_grid(array('layout' => 'grid'));

		// Icon Styling
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Style', 'orgarium-themer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_box',
			[
				'label'	=> esc_html__('Box', 'orgarium-themer'),
				'type'	=> Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'primary_color',
			[
				'label' 		=> esc_html__('Primary Color', 'orgarium-themer'),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-group .icon-box-item' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'heading_icon',
			[
				'label'	=> esc_html__('Icon', 'orgarium-themer'),
				'type'	=> Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' 		=> esc_html__('Icon Color', 'orgarium-themer'),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-group .icon-box-content .box-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box-group .icon-box-content svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' 		=> esc_html__('Size', 'orgarium-themer'),
				'type' 		=> Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-group .icon-box-content .box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .gsc-icon-box-group .icon-box-content .box-icon svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .gsc-icon-box-group.style-2 .icon-box-item .icon-box-content .box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .gsc-icon-box-group.style-2 .icon-box-item .icon-box-content .box-icon i' => 'width: {{SIZE}}{{UNIT}};',
					
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'label' 		=> esc_html__('Spacing', 'orgarium-themer'),
				'type' 		=> Controls_Manager::SLIDER,
				'default' 	=> [
					'size' 	=> 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-group .icon-box-content .icon-inner' => 'padding-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .gsc-icon-box-group .icon-box-content .icon-inner .box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
				'default' => [
					'size'  => 5
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-group .icon-box-content .title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .gsc-icon-box-group .icon-box-content .title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box-group .icon-box-content .title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .gsc-icon-box-group .icon-box-content .title, {{WRAPPER}} .gsc-icon-box-group .icon-box-content .title a',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		printf('<div class="gva-element-%s gva-element">', $this->get_name() );
			if( !empty($settings['layout']) ){
				include $this->get_template('general/icon-box-group/' . $settings['layout'] . '.php');
			}
		print '</div>';
	}

}

$widgets_manager->register(new GVAElement_Icon_Box_Group());
