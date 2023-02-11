<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Testimonial extends GVAElement_Base{
    const NAME = 'gva-testimonials';
    const TEMPLATE = 'general/testimonials/';
    const CATEGORY = 'orgarium_general';

    public function get_name() {
        return self::NAME;
    }

    public function get_categories() {
        return array(self::CATEGORY);
    }

    public function get_title() {
        return __('Testimonials', 'orgarium-themer');
    }

    public function get_keywords() {
        return [ 'testimonial', 'content', 'carousel' ];
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
            'section_testimonial',
            [
                'label' => __('Testimonials', 'orgarium-themer'),
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => esc_html__('Layout Display', 'orgarium-themer'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid'      => esc_html__('Grid', 'orgarium-themer'),
                    'carousel'  => esc_html__('Carousel', 'orgarium-themer')
                ]
            ]
        );

        $this->add_control(
            'style',
            array(
                'label'   => esc_html__( 'Style', 'orgarium-themer' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style-1',
                'options' => [
                  'style-1' => esc_html__('Item Style I', 'orgarium-themer'),
                  'style-2' => esc_html__('Item Style II', 'orgarium-themer'),
                  'style-3' => esc_html__('Item Style III', 'orgarium-themer'),
                  'style-4' => esc_html__('Item Style IV', 'orgarium-themer')
                ]
            )
        );
        
        $repeater = new Repeater();
        
        $repeater->add_control(
            'testimonial_content',
            [
                'label'       => __('Content', 'orgarium-themer'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'Duis rhoncus orci utedn metus rhoncus, non is dictum purus bibendum. Suspendisse id orci sit amet justo interdum hendrerit sagittis.',
                'label_block' => true,
                'rows'        => '10',
            ]
        );
        $repeater->add_control(
            'testimonial_image',
            [
                'label'      => __('Choose Image', 'orgarium-themer'),
                'default'    => [
                    'url' => GAVIAS_ORGARIUM_PLUGIN_URL . 'elementor/assets/images/testimonial.jpg',
                ],
                'type'       => Controls_Manager::MEDIA,
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'testimonial_name',
            [
                'label'   => __('Name', 'orgarium-themer'),
                'default' => 'John Doe',
                'type'    => Controls_Manager::TEXT,
            ]
        );
        
        $repeater->add_control(
            'testimonial_job',
            [
                'label'   => __('Job', 'orgarium-themer'),
                'default' => 'Designer',
                'type'    => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'testimonial_rating',
            [
                'label'   => __('Rating', 'orgarium-themer'),
                'default' => '5',
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 5
            ]
        );
 
        $this->add_control(
            'testimonials',
            [
                'label'       => __('Testimonials Content Item', 'orgarium-themer'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ testimonial_name }}}',
                'default'     => array(
                    array(
                        'testimonial_name'     => esc_html__( 'Christine Eve', 'orgarium-themer' ),
                        'testimonial_job'      => esc_html__( 'Founder & CEO', 'orgarium-themer' ),
                    ),
                    array(
                        'testimonial_name'     => esc_html__( 'Kevin Smith', 'orgarium-themer' ),
                        'testimonial_job'      => esc_html__( 'Customer', 'orgarium-themer' ),
                    ),
                    array(
                        'testimonial_name'     => esc_html__( 'Jessica Brown', 'orgarium-themer' ),
                        'testimonial_job'      => esc_html__( 'Founder & CEO', 'orgarium-themer' ),
                    ),
                    array(
                        'testimonial_name'     => esc_html__( 'David Anderson', 'orgarium-themer' ),
                        'testimonial_job'      => esc_html__( 'Customer', 'orgarium-themer' ),
                    ),
                    array(
                        'testimonial_name'     => esc_html__( 'Susan Neill', 'orgarium-themer' ),
                        'testimonial_job'      => esc_html__( 'Founder & CEO', 'orgarium-themer' ),
                    ),
                ),
            ]
        );

        $this->add_group_control(
            Elementor\Group_Control_Image_Size::get_type(),
            [
                'name'      => 'testimonial_image', 
                'default'   => 'full',
                'separator' => 'none',
                'condition' => [
                    'style' => array('style-1', 'style-2')
                ]
            ]
        );

        $this->add_control(
            'view',
            [
                'label'   => __('View', 'orgarium-themer'),
                'type'    => Controls_Manager::HIDDEN,
                'default' => 'traditional',
            ]
        );
        $this->end_controls_section();

        $this->add_control_carousel(false, array('layout' => 'carousel'));

        $this->add_control_grid(array('layout' => 'grid'));

        // Style.
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => __('Content', 'orgarium-themer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'content_content_color',
            [
                'label'     => __('Text Color', 'orgarium-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gsc-testimonial .testimonial-content' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .gsc-testimonial .icon-quote' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'content_typography',
                'selector' => '{{WRAPPER}} .gsc-testimonial .testimonial-item .testimonial-content',
            ]
        );

        $this->end_controls_section();

        // Image Styling
        $this->start_controls_section(
            'section_style_image',
            [
                'label'     => __('Image', 'orgarium-themer'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'image_size',
            [
                'label'      => __('Image Size', 'orgarium-themer'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .gsc-testimonial .testimonial-image img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'      => 'image_border',
                'selector'  => '{{WRAPPER}} .gsc-testimonial .testimonial-image img',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label'      => __('Border Radius', 'orgarium-themer'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .gsc-testimonial .testimonial-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Name Styling
        $this->start_controls_section(
            'section_style_name',
            [
                'label' => __('Name', 'orgarium-themer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'name_text_color',
            [
                'label'     => __('Text Color', 'orgarium-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gsc-testimonial .testimonial-name' => 'color: {{VALUE}}!important;',
                    '{{WRAPPER}} .dot' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'name_typography',
                'selector' => '{{WRAPPER}} .gsc-testimonial .testimonial-name',
            ]
        );

        $this->end_controls_section();

        // Job Styling
        $this->start_controls_section(
            'section_style_job',
            [
                'label' => __('Job', 'orgarium-themer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'job_text_color',
            [
                'label'     => __('Text Color', 'orgarium-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gsc-testimonial .testimonial-job' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'job_typography',
                'selector' => '{{WRAPPER}} .elementor-testimonial-job',
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {
      $settings = $this->get_settings_for_display();
      printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
      if($settings['layout']){
         include $this->get_template(self::TEMPLATE . $settings['layout'] . '.php');
      }
      print '</div>';
    }
}

$widgets_manager->register(new GVAElement_Testimonial());
