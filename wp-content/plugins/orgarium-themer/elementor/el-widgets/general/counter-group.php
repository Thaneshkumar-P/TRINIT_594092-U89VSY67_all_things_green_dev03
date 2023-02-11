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

class GVAElement_Counter_Group extends GVAElement_Base{
	const NAME = 'gva_counter_group';
	const TEMPLATE = 'general/counter-group';
	const CATEGORY = 'orgarium_general';

	public function get_categories() {
		return array(self::CATEGORY);
	}
		
	public function get_name() {
		return self::NAME;
	}

	public function get_title() {
		return esc_html__('Counter Carousel/Grid', 'orgarium-themer');
	}

	public function get_keywords() {
		return [ 'counter', 'carousel', 'grid' ];
	}

	public function get_script_depends() {
		return [
			'jquery.count_to',
         'jquery.appear',
			'swiper',
			'gavias.elements'
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
					'style-1' => esc_html__('Style I', 'orgarium-themer')
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
			'number',
			[
				'label'     	=> esc_html__('Number', 'orgarium-themer'),
				'type'      	=> Controls_Manager::NUMBER,
				'placeholder' 	=> esc_html__('number', 'orgarium-themer'),
				'default'		=> 3656
			]
		);
		$repeater->add_control(
			'prefix',
			[
				'label'     	=> esc_html__('Prefix', 'orgarium-themer'),
				'type'      	=> Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__('Prefix', 'orgarium-themer'),
				'default'		=> ''
			]
		);
		$repeater->add_control(
			'suffix',
			[
				'label'     	=> esc_html__('Suffix', 'orgarium-themer'),
				'type'      	=> Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__('Suffix', 'orgarium-themer'),
				'default'		=> ''
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
			'counters',
			[
				'label'       => esc_html__('Brand Content Item', 'orgarium-themer'),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array(
						'title'  					=> esc_html__('Tons of Harvesta', 'orgarium-themer'),
						'selected_icon' 			=> array('value' => 'flaticon2-wheat-sack')
					),
					array(
						'title'  					=> esc_html__('Units of Cattle', 'orgarium-themer'),
						'selected_icon' 			=> array('value' => 'flaticon2-grape')
					),
					array(
						'title'  					=> esc_html__('Hectares of Farm', 'orgarium-themer'),
						'selected_icon' 			=> array('value' => 'flaticon2-cow')
					),
					array(
						'title'  					=> esc_html__('Units of Technic', 'orgarium-themer'),
						'selected_icon' 			=> array('value' => 'flaticon2-fish')
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
					'{{WRAPPER}} .gsc-counter-group.style-1 .counter-item:after' => 'background-color: {{VALUE}};',
				]
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
					'{{WRAPPER}} .gsc-counter-group .counter-item' => 'background-color: {{VALUE}};'
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
					'{{WRAPPER}} .gsc-counter-group .counter-content .box-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gsc-counter-group .counter-content svg' => 'fill: {{VALUE}};'
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
					'{{WRAPPER}} .gsc-counter-group .counter-content .box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .gsc-counter-group .counter-content .box-icon svg' => 'width: {{SIZE}}{{UNIT}};'
					
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
					'{{WRAPPER}} .gsc-counter-group .counter-content .icon-inner' => 'padding-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .gsc-counter-group .counter-content .icon-inner .box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .gsc-counter-group .counter-content .title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .gsc-counter-group .counter-content .title' => 'color: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .gsc-counter-group .counter-content .title, {{WRAPPER}} .gsc-counter-group .counter-content .title a',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		printf('<div class="gva-element-%s gva-element">', $this->get_name() );
			if( !empty($settings['layout']) ){
				include $this->get_template('general/counter-group/' . $settings['layout'] . '.php');
			}
		print '</div>';
	}

}

$widgets_manager->register(new GVAElement_Counter_Group());
