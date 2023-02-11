<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;

class GVAElement_Icon_Box_Styles extends GVAElement_Base {  
	const NAME = 'gva-icon-box-styles';
	const TEMPLATE = 'general/icon-box-styles';
	const CATEGORY = 'orgarium_general';

   public function get_categories() {
      return array(self::CATEGORY);
   }
    
	public function get_name() {
		return self::NAME;
	}

	public function get_title() {
		return __( 'Icon Box Styles', 'orgarium-themer' );
	}

	public function get_keywords() {
		return [ 'icon box', 'icon' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Icon Box Style', 'orgarium-themer' ),
			]
		);
		
		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'orgarium-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1' 		=> __( 'Style I', 'orgarium-themer' ),
					'style-2' 		=> __( 'Style II', 'orgarium-themer' ),
					'style-3' 		=> __( 'Style III', 'orgarium-themer' )
				],
				'default' => 'style-1',
			]
		);

		$this->add_control(
			'use_icon_image',
			[
				'label' => __( 'Use Icon Image', 'orgarium-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'condition' => [
					'style' => ['style-2', 'style-3']
				]
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'orgarium-themer' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-home',
					'library' => 'fa-solid',
				],
				'condition' => [
					'use_icon_image!' => 'yes'
				]
			]
		);

		$this->add_control(
			'image_icon',
			[
				'label' => __( 'Choose Image', 'orgarium-themer' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
				'default' => [
					'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/icon-avocado.png',
				],
				'condition' => [
					'style' => ['style-2', 'style-3'],
					'use_icon_image'	=> 'yes'
				]
			]
		);

		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title & Description', 'orgarium-themer' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'This is the heading', 'orgarium-themer' ),
				'placeholder' => __( 'Enter your title', 'orgarium-themer' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'description_text',
			[
				'label' => '',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'There are many new variations of pasages of available text.', 'orgarium-themer' ),
				'placeholder' => __( 'Enter your description', 'orgarium-themer' ),
				'show_label' => false,
				'condition' => [
					'style' => ['style-1', 'style-2', 'style-3']
				]
			]
		);

		$this->add_control(
			'header_tag',
			[
				'label' => __( 'Title HTML Tag', 'orgarium-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h3',
			]
		);

		$this->add_control(
			'active',
			[
				'label' => __( 'Active', 'orgarium-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section( //** Section Button
			'section_button',
			[
				'label' => __( 'Button & Link', 'orgarium-themer' ),
			]
		);
		$this->add_control(
			'button_url',
			[
				'label' => __( 'Link', 'orgarium-themer' ),
				'type' => Controls_Manager::URL,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_box_style',
			[
				'label' => __( 'Box Style', 'orgarium-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'box_primary_color',
			[
				'label' => __( 'Primary Color', 'orgarium-themer' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles.style-1' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'box_second_color',
			[
				'label' => __( 'Second Color', 'orgarium-themer' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles.style-1' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'orgarium-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'top' 		=> 0,
					'right' 		=> 0,
					'left'		=> 0,
					'bottom'		=> 0,
					'unit'		=> 'px'
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles.style-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'orgarium-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'selected_icon[value]!' => ''
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'orgarium-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon svg' => 'fill: {{VALUE}};'
				],
			]
		);

		
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'orgarium-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 40
				],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .gsc-icon-box-styles .box-icon svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .gsc-icon-box-styles .box-icon img' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_box_size',
			[
				'label' => __( 'Icon Box Size', 'orgarium-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 64
				],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .box-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => __( 'Border Radius', 'orgarium-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);



		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => __( 'Icon Padding', 'orgarium-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .icon-inner .box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'orgarium-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'orgarium-themer' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => __( 'Spacing', 'orgarium-themer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles.style-1 .title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .gsc-icon-box-styles.style-2 .title' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				],
			]
		); 

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'orgarium-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gsc-icon-box-styles .title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .gsc-icon-box-styles .title, {{WRAPPER}} .gsc-icon-box-styles .title a',
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => __( 'Description', 'orgarium-themer' ),
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
				'label' => __( 'Color', 'orgarium-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-icon-box-styles .desc' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .gsc-icon-box-styles .desc',
				'condition' => [
					'style' => ['style-1'],
				],

			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render icon box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
         include $this->get_template( self::TEMPLATE . '.php');
      print '</div>';
	}
}

$widgets_manager->register(new GVAElement_Icon_Box_Styles());
