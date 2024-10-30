<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Core\Schemes\Typography;
use Elementor\Icons_Manager;
use Elementor\Controls_Stack;

class Cresta_Addons_Flip_Box extends Widget_Base {
	
	public function get_name() {
		return 'cafe-flip-box';
	}

	public function get_title() {
		return __( 'Flip Box', 'cresta-addons-for-elementor' );
	}

	public function get_icon() {
		return 'cafe-icon eicon-flip-box';
	}

	public function get_categories() {
		return [ 'cresta-elements' ];
	}
	
	public function get_style_depends() {
		return [ 'cafe-flip-box' ];
	}
	
	protected function register_controls() {
		
		$this->start_controls_section(
			'section_flip_box_general',
			[
				'label' => __( 'Flip Box', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_width',
			[
				'label' 		=> __( 'Width', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_height',
			[
				'label' 		=> __( 'Height', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'unit' => 'px',
					'size' => 400,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_content_position',
			[
				'label' 		=> __( 'Content Position', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'center',
				'options' 		=> [
					'flex-start' 		=> __( 'Top', 'cresta-addons-for-elementor' ),
					'center' 			=> __( 'Center', 'cresta-addons-for-elementor' ),
					'flex-end' 		=> __( 'Bottom', 'cresta-addons-for-elementor' ),
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-filp-box-front' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .cafe-flip-box-container .cafe-filp-box-back' => 'justify-content: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_content_flip',
			[
				'label' => __( 'Flip', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'horizontal',
				'options' => [
					'horizontal' 	=> __( 'Horizontal', 'cresta-addons-for-elementor' ),
					'vertical' 	=> __( 'Vertical', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_flip_box_front',
			[
				'label' => __( 'Front side', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_flip_box_front_use_icon',
			[
				'label' => __( 'Use icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'section_flip_box_front_custom_icon',
			[
				'label' => __( 'Icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-grin-squint-tears',
					'library' => 'regular',
				],
				'condition' => [
					'section_flip_box_front_use_icon' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_front_title',
			[
				'label' => __( 'Title', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'Title', 'cresta-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_front_content',
			[
				'label' => __( 'Content', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non leo pretium, tempus tellus et, pellentesque ligula. Suspendisse potenti.', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_flip_box_back',
			[
				'label' => __( 'Back side', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_flip_box_back_use_icon',
			[
				'label' => __( 'Use icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'section_flip_box_back_custom_icon',
			[
				'label' => __( 'Icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-grimace',
					'library' => 'regular',
				],
				'condition' => [
					'section_flip_box_back_use_icon' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_back_title',
			[
				'label' => __( 'Title', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'Title', 'cresta-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_back_content',
			[
				'label' => __( 'Content', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non leo pretium, tempus tellus et, pellentesque ligula. Suspendisse potenti.', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_flip_box_general_style',
			[
				'label' => __( 'Flip Box', 'cresta-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_general_padding',
			[
				'label' 		=> __( 'Padding', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em' ],
				'desktop_default' => [	
					'top' => 20,
					'right' => 20,
					'bottom' => 20,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
				'tablet_default' => [	
					'top' => 20,
					'right' => 20,
					'bottom' => 20,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
				'mobile_default' => [	
					'top' => 20,
					'right' => 20,
					'bottom' => 20,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-filp-box-front' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cafe-flip-box-container .cafe-filp-box-back' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_general_border_radius',
			[
				'label' => __( 'Border Radius', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-filp-box-front' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cafe-flip-box-container .cafe-filp-box-back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_flip_box_front_style',
			[
				'label' => __( 'Front side', 'cresta-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);
		
		$this->add_control(
			'section_flip_box_front_style_iconcolor',
			[
				'label' 		=> __( 'Icon Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#000000',
				'condition' => [
					'section_flip_box_front_use_icon' => 'yes',
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-front-icon' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_front_style_iconsize',
			[
				'label' 		=> __( 'Icon size', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'separator' 	=> 'after',
				'condition' => [
					'section_flip_box_front_use_icon' => 'yes',
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-front-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_front_style_titlemargin',
			[
				'label' 		=> __( 'Title margin', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_front_title',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-front-title' => 'padding: {{SIZE}}{{UNIT}} 0;',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> __( 'Title Typography', 'cresta-addons-for-elementor' ),
				'name' 			=> 'section_flip_box_front_style_titletypo',
				'selector' 		=> '{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-front-title',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_front_title',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_front_style_titlecolor',
			[
				'label' 		=> __( 'Title Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#E18C25',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-front-title' => 'color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_front_title',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_front_style_titletag',
			[
				'label' => __( 'Title Tag', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h3',
				'options' => [
					'h1' => __( 'H1', 'cresta-addons-for-elementor' ),
					'h2' => __( 'H2', 'cresta-addons-for-elementor' ),
					'h3' => __( 'H3', 'cresta-addons-for-elementor' ),
					'h4' => __( 'H4', 'cresta-addons-for-elementor' ),
					'h5' => __( 'H5', 'cresta-addons-for-elementor' ),
					'h6' => __( 'H6', 'cresta-addons-for-elementor' ),
					'div' => __( 'div', 'cresta-addons-for-elementor' ),
					'span' => __( 'span', 'cresta-addons-for-elementor' ),
				],
				'separator' 	=> 'after',
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_front_title',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> __( 'Content Typography', 'cresta-addons-for-elementor' ),
				'name' 			=> 'section_flip_box_front_style_contenttypo',
				'selector' 		=> '{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-front-content',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_front_content',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_front_style_contentmargin',
			[
				'label' 		=> __( 'Content margin', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_front_content',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-front-content' => 'padding: {{SIZE}}{{UNIT}} 0;',
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_front_style_contentcolor',
			[
				'label' 		=> __( 'Content Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#959595',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-front-content' => 'color: {{VALUE}};',
				],
				'separator' 	=> 'after',
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_front_content',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_front_style_align',
				[
					'label' => __( 'Alignment', 'cresta-addons-for-elementor' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'cresta-addons-for-elementor' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'cresta-addons-for-elementor' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'cresta-addons-for-elementor' ),
							'icon' => 'fa fa-align-right',
						],
						'justify' => [
							'title' => __( 'Justify', 'cresta-addons-for-elementor' ),
							'icon' => 'fa fa-align-justify',
						],
					],
					'default' => 'center',
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .cafe-flip-box-container .cafe-filp-box-front' => 'text-align: {{VALUE}};',
					],
				]
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'section_flip_box_front_style_background',
				'label' => __( 'Background', 'cresta-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cafe-flip-box-container .cafe-filp-box-front',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_flip_box_back_style',
			[
				'label' => __( 'Back side', 'cresta-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);
		
		$this->add_control(
			'section_flip_box_back_style_iconcolor',
			[
				'label' 		=> __( 'Icon Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#000000',
				'condition' => [
					'section_flip_box_back_use_icon' => 'yes',
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-back-icon' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_back_style_iconsize',
			[
				'label' 		=> __( 'Icon size', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'separator' 	=> 'after',
				'condition' => [
					'section_flip_box_back_use_icon' => 'yes',
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-back-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_back_style_titlemargin',
			[
				'label' 		=> __( 'Title margin', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_back_title',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-back-title' => 'padding: {{SIZE}}{{UNIT}} 0;',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> __( 'Title Typography', 'cresta-addons-for-elementor' ),
				'name' 			=> 'section_flip_box_back_style_titletypo',
				'selector' 		=> '{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-back-title',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_back_title',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_back_style_titlecolor',
			[
				'label' 		=> __( 'Title Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#E18C25',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-back-title' => 'color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_back_title',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_back_style_titletag',
			[
				'label' => __( 'Title Tag', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h3',
				'options' => [
					'h1' => __( 'H1', 'cresta-addons-for-elementor' ),
					'h2' => __( 'H2', 'cresta-addons-for-elementor' ),
					'h3' => __( 'H3', 'cresta-addons-for-elementor' ),
					'h4' => __( 'H4', 'cresta-addons-for-elementor' ),
					'h5' => __( 'H5', 'cresta-addons-for-elementor' ),
					'h6' => __( 'H6', 'cresta-addons-for-elementor' ),
					'div' => __( 'div', 'cresta-addons-for-elementor' ),
					'span' => __( 'span', 'cresta-addons-for-elementor' ),
				],
				'separator' 	=> 'after',
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_back_title',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> __( 'Content Typography', 'cresta-addons-for-elementor' ),
				'name' 			=> 'section_flip_box_back_style_contenttypo',
				'selector' 		=> '{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-back-content',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_back_content',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_back_style_contentmargin',
			[
				'label' 		=> __( 'Content margin', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_back_content',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-back-content' => 'padding: {{SIZE}}{{UNIT}} 0;',
				],
			]
		);
		
		$this->add_control(
			'section_flip_box_back_style_contentcolor',
			[
				'label' 		=> __( 'Content Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#959595',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-flip-box-container .cafe-flip-box-back-content' => 'color: {{VALUE}};',
				],
				'separator' 	=> 'after',
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_flip_box_back_content',
							'operator' => '!=',
							'value' => '',
						]
					]
				],
			]
		);
		
		$this->add_responsive_control(
			'section_flip_box_back_style_align',
				[
					'label' => __( 'Alignment', 'cresta-addons-for-elementor' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'cresta-addons-for-elementor' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'cresta-addons-for-elementor' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'cresta-addons-for-elementor' ),
							'icon' => 'fa fa-align-right',
						],
						'justify' => [
							'title' => __( 'Justify', 'cresta-addons-for-elementor' ),
							'icon' => 'fa fa-align-justify',
						],
					],
					'default' => 'center',
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .cafe-flip-box-container .cafe-filp-box-back' => 'text-align: {{VALUE}};',
					],
				]
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'section_flip_box_back_style_background',
				'label' => __( 'Background', 'cresta-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cafe-flip-box-container .cafe-filp-box-back',
			]
		);
		
		$this->end_controls_section();
		
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$titleFront = $settings['section_flip_box_front_title'];
		$contentFront = $settings['section_flip_box_front_content'];
		$titleBack = $settings['section_flip_box_back_title'];
		$contentBack = $settings['section_flip_box_back_content'];
		$flipStyle = $settings['section_flip_box_content_flip'];
		?>
		<div class="cafe-flip-box-container flip_<?php echo $flipStyle; ?>">
			<div class="cafe-flip-box-inner">
				<div class="cafe-filp-box-front">
					<div class="cafe-flip-box-internal">
						<?php if ($settings['section_flip_box_front_use_icon'] == 'yes' ): ?>
							<div class="cafe-flip-box-front-icon"><?php Icons_Manager::render_icon( $settings['section_flip_box_front_custom_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
						<?php endif; ?>
						<?php if($titleFront): ?>
							<<?php echo cresta_addons_elementor_allowed_tags_title($settings['section_flip_box_front_style_titletag']); ?> class="cafe-flip-box-front-title"><?php echo $titleFront; ?></<?php echo cresta_addons_elementor_allowed_tags_title($settings['section_flip_box_front_style_titletag']); ?>>
						<?php endif; ?>
						<?php if($contentFront): ?>
							<div class="cafe-flip-box-front-content"><?php echo $contentFront; ?></div>
						<?php endif; ?>
					</div>
				</div>
				<div class="cafe-filp-box-back">
					<div class="cafe-flip-box-internal">
						<?php if ($settings['section_flip_box_back_use_icon'] == 'yes' ): ?>
							<div class="cafe-flip-box-back-icon"><?php Icons_Manager::render_icon( $settings['section_flip_box_back_custom_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
						<?php endif; ?>
						<?php if($titleBack): ?>
							<<?php echo cresta_addons_elementor_allowed_tags_title($settings['section_flip_box_back_style_titletag']); ?> class="cafe-flip-box-back-title"><?php echo $titleBack; ?></<?php echo cresta_addons_elementor_allowed_tags_title($settings['section_flip_box_back_style_titletag']); ?>>
						<?php endif; ?>
						<?php if($contentBack): ?>
							<div class="cafe-flip-box-back-content"><?php echo $contentBack; ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	
	protected function content_template() {
	}
}