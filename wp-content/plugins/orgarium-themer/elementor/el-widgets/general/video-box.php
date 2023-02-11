<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;

class GVAElement_Video_Box extends GVAElement_Base {  
	const NAME = 'gva-video-box';
   const TEMPLATE = 'general/video-box';
   const CATEGORY = 'orgarium_general';

   public function get_categories(){
      return array(self::CATEGORY);
   }
    
   public function get_name(){
      return self::NAME;
   }

	public function get_title() {
		return __( 'Video Box', 'orgarium-themer' );
	}

	public function get_keywords() {
		return [ 'video', 'box' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Content', 'orgarium-themer' ),
			]
		);

		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'orgarium-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Your Title', 'orgarium-themer' ),
				'label_block' => true
			]
		);
		$this->add_control(
			'style',
			[
				'label' => __( 'style', 'orgarium-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1' 		=> __( 'Style I', 'orgarium-themer' ),
					'style-2' 		=> __( 'Style II', 'orgarium-themer' ),
				],
				'default' => 'style-1',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'orgarium-themer' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
               'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/video.jpg',
				],
				'condition' => [
					'style' => ['style-1']
				]
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link Video (Youtube/Vimeo)', 'orgarium-themer' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'orgarium-themer' ),
				'separator' => 'before',
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
					'{{WRAPPER}} .gsc-video-box.style-1 .icon-inner::before, {{WRAPPER}} .gsc-video-box.style-1 .icon-inner::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .gsc-video-box.style-2 .video-inner .video-content .video-action .popup-video::before, .gsc-video-box.style-2 .video-inner .video-content .video-action .popup-video::after' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .gsc-video-box.style-2 .video-inner .video-content .video-action .popup-video' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .gsc-video-box.style-2 .video-inner .video-content .video-action .popup-video' => 'color: {{VALUE}};',
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

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'orgarium-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gsc-video-box .video-inner .video-content .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .gsc-video-box .title',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
         include $this->get_template(self::TEMPLATE . '.php');
      print '</div>';
	}
}

$widgets_manager->register(new GVAElement_Video_Box());
