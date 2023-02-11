<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Repeater;

class GVAElement_Gallery extends GVAElement_Base{

   const NAME = 'gva-gallery';
   const TEMPLATE = 'general/gallery/';
   const CATEGORY = 'orgarium_general';

   public function get_name() {
      return self::NAME;
   }

   public function get_categories() {
      return array(self::CATEGORY);
   }

	public function get_title() {
		return __('Gallery', 'orgarium-themer');
	}
	public function get_keywords() {
		return [ 'gallery', 'images', 'carousel', 'grid' ];
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
			'section_query',
			[
				'label' => __('Query & Layout', 'orgarium-themer'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();
      $repeater->add_control(
         'image',
         [
            'label'       => __('Image', 'orgarium-themer'),
            'type'        => Controls_Manager::MEDIA,
            'show_label' => false,
            'default'    => [
               'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/image-2.jpg',
            ]
         ]
      );
     	$repeater->add_control(
         'title',
         [
            'label'   => __('Title', 'orgarium-themer'),
            'default' => esc_html__('Luxury Interior', 'orgarium-themer'),
            'type'    => Controls_Manager::TEXT,
         ]
     	);
		$repeater->add_control(
         'sub_title',
         [
            'label'   => __('Sub-Title', 'orgarium-themer'),
            'default' => esc_html__('Charity', 'orgarium-themer'),
            'type'    => Controls_Manager::TEXT,
         ]
     	);

		$this->add_control(
         'images',
         [
            'label'       => __('Testimonials Content Item', 'orgarium-themer'),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
            'default'     => array(
              	array(
                  'image'    => [
                     'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/gallery-1.jpg',
                  ],
                  'title' => esc_html__('Fresh Wheat Sack Food', 'orgarium-themer'),
                  'sub_title' => esc_html__('Organic', 'orgarium-themer')
              	),
               array(
                  'image'    => [
                     'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/gallery-2.jpg',
                  ],
                  'title' => esc_html__('Organic Fresh Fruits', 'orgarium-themer'),
                  'sub_title' => esc_html__('Organic', 'orgarium-themer')
              	),
               array(
                  'image'    => [
                     'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/gallery-3.jpg',
                  ],
                  'title' => esc_html__('Cows Meat and Milk', 'orgarium-themer'),
                  'sub_title' => esc_html__('Organic', 'orgarium-themer')
              	),
               array(
                  'image'    => [
                     'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/gallery-4.jpg',
                  ],
                  'title' => esc_html__('Planet Earth Safety', 'orgarium-themer'),
                  'sub_title' => esc_html__('Organic', 'orgarium-themer')
              	),
               array(
                  'image'    => [
                     'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/gallery-5.jpg',
                  ],
                  'title' => esc_html__('Fresh Organic Vegetable', 'orgarium-themer'),
                  'sub_title' => esc_html__('Organic', 'orgarium-themer')
              	),
            )
         ]
      );

		$this->add_control( // xx Layout
			'layout_heading',
			[
				'label'   => __( 'Layout', 'orgarium-themer' ),
				'type'    => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'layout',
			[
				'label'   => __( 'Layout Display', 'orgarium-themer' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [
					'grid'      => __( 'Grid', 'orgarium-themer' ),
					'carousel'  => __( 'Carousel', 'orgarium-themer' ),
				]
			]
	  	);
		$this->add_control(
			'style',
			[
				'label'     => __('Style', 'orgarium-themer'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1'           => __( 'Gallery Style I', 'orgarium-themer' ),
				],
				'default' => 'style-1',
			]
		);
		$this->add_control(
			'image_size',
			[
				'label'     => __('Style', 'orgarium-themer'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => $this->get_thumbnail_size(),
				'default'   => 'orgarium_medium'
			]
		);
	  	$this->add_control(
			'pagination',
			[
				'label'     => __('Pagination', 'orgarium-themer'),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'condition' => [
					'layout' => 'grid'
				],
			]
	  	);

		$this->end_controls_section();

		$this->add_control_carousel(false, array('layout' => 'carousel'));

		$this->add_control_grid(array('layout' => 'grid'));

	}

	 protected function render() {
		  $settings = $this->get_settings_for_display();
		  printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
		  if( !empty($settings['layout']) ){
				include $this->get_template('general/gallery/' . $settings['layout'] . '.php');
		  }
		  print '</div>'; 

	 }
}

$widgets_manager->register(new GVAElement_Gallery());
