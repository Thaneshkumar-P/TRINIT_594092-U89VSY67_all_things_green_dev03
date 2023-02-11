<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;

class GVAElement_Image_Content extends GVAElement_Base {
	const NAME = 'gva-image-content';
	const TEMPLATE = 'general/image-content';
	const CATEGORY = 'orgarium_general';

   public function get_categories() {
		return array(self::CATEGORY);
	}

	public function get_name() {
		return self::NAME;
	}

	public function get_title() {
		return __( 'Image Content', 'orgarium-themer' );
	}
	
	public function get_keywords() {
		return [ 'image', 'content' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'orgarium-themer' ),
			]
		);
		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'orgarium-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'skin-v1' => esc_html__('Style I', 'orgarium-themer'),
					'skin-v2' => esc_html__('Style II', 'orgarium-themer'),
					'skin-v3' => esc_html__('Style III', 'orgarium-themer'),
					'skin-v4' => esc_html__('Style IV', 'orgarium-themer'),
					'skin-v5' => esc_html__('Style V', 'orgarium-themer'),
					'skin-v6' => esc_html__('Style VI', 'orgarium-themer'),
					'skin-v7' => esc_html__('Style VII', 'orgarium-themer')
				],
				'default' => 'skin-v1',
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'orgarium-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'orgarium-themer' ),
				'default' => __( 'Quality Standards', 'orgarium-themer' ),
				'label_block' => true,
				'condition' => [
					'style!' => ['skin-v2']
				],
			]
		);
		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'orgarium-themer' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
				'default' => [
					'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/image-1.jpg',
				],
			]
		);

		$this->add_control(
			'image_second',
			[
				'label' => __( 'Choose Image Second', 'tolips-themer' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
				'default' => [
					'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/image-2.jpg',
				],
				'condition' => [
					'style' => ['skin-v2']
				],
			]
		);

		$this->add_control(
			'box_height',
			[
				'label' => __( 'Box Height', 'orgarium-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 600,
				],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-image-content.skin-v1 .box-content' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'style' => ['skin-v1']
				],
			]
		);

		$this->add_group_control(
         Elementor\Group_Control_Image_Size::get_type(),
         [
            'name'      => 'image',
            'default'   => 'full',
            'separator' => 'none',
	         'condition' => [
					'style!' => ['skin-v5'],
				]
         ]
      );
      
		$this->add_control(
			'description_text',
			[
				'label' => __( 'Description', 'orgarium-themer' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Your Description', 'orgarium-themer' ),
				'condition' => [
					'style!' => ['skin-v2', 'skin-v3'],
				],
			]
		);
		
		$this->add_control(
			'header_tag',
			[
				'label' => __( 'HTML Tag', 'orgarium-themer' ),
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
				'default' => 'h2',
				'condition' => [
					'style!' => ['skin-v2']
				],
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'orgarium-themer' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'orgarium-themer' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'link_text',
			[
				'label' => __( 'Text Link', 'orgarium-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Read More', 'orgarium-themer' ),
				'default' => __( 'Read More', 'orgarium-themer' ),
				'condition' => [
					'style!' => ['skin-v1', 'skin-v2'],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_box_style',
			[
				'label' => __( 'Box', 'orgarium-themer' ),
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
					'{{WRAPPER}} .gsc-image-content.skin-v1 .line-color:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .gsc-image-content.skin-v3 .box-background::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .gsc-image-content.skin-v3 .image::after' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .gsc-image-content.skin-v1 .line-color:before' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['skin-v1'],
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'orgarium-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'orgarium-themer' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-image-content .box-content .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .gsc-image-content .box-content .title',
			]
		);

		$this->add_control(
			'title_space_bottom',
			[
				'label' => __( 'Space Bottom', 'orgarium-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-image-content .box-content .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'orgarium-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => ['style-v1', 'skin-v2', 'skin-v4'],
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Text Color', 'orgarium-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-image-content .box-content .desc' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_desc',
				'selector' => '{{WRAPPER}} .gsc-image-content .box-content .desc',
			]
		);

		$this->add_control(
			'content_space_bottom',
			[
				'label' => __( 'Space Bottom', 'orgarium-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-image-content .box-content .desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
      printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
         include $this->get_template(self::TEMPLATE . '.php');
      print '</div>';
	}

}

 $widgets_manager->register(new GVAElement_Image_Content());
