<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Repeater;
use Elementor\Controls_Stack;

class Cresta_Addons_Business_Hours extends Widget_Base {
	
	public function get_name() {
		return 'cafe-business-hours';
	}

	public function get_title() {
		return __( 'Business Hours', 'cresta-addons-for-elementor' );
	}

	public function get_icon() {
		return 'cafe-icon eicon-countdown';
	}

	public function get_categories() {
		return [ 'cresta-elements' ];
	}
	
	public function get_style_depends() {
		return [ 'cafe-business-hours' ];
	}
	
	protected function register_controls() {
		$this->start_controls_section(
			'section_business_hours',
			[
				'label' => __( 'Business Hours', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_business_hours_title',
			[
				'label' => __( 'Title', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Business Hours', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_business_hours_title_tag',
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
			]
		);
		
		$repeater = new Repeater();
		
		$repeater->add_control(
			'section_business_hours_day',
			[
				'label' => __( 'Day', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'section_business_hours_hours',
			[
				'label' => __( 'Hours', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'section_business_hours_list',
			[
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'section_business_hours_day' => __( 'Monday', 'cresta-addons-for-elementor' ),
						'section_business_hours_hours' => __( '10AM - 5PM', 'cresta-addons-for-elementor' ),
					],
					[
						'section_business_hours_day' => __( 'Tuesday', 'cresta-addons-for-elementor' ),
						'section_business_hours_hours' => __( '10AM - 5PM', 'cresta-addons-for-elementor' ),
					],
					[
						'section_business_hours_day' => __( 'Wednesday', 'cresta-addons-for-elementor' ),
						'section_business_hours_hours' => __( '10AM - 5PM', 'cresta-addons-for-elementor' ),
					],
					[
						'section_business_hours_day' => __( 'Thursday', 'cresta-addons-for-elementor' ),
						'section_business_hours_hours' => __( '10AM - 5PM', 'cresta-addons-for-elementor' ),
					],
					[
						'section_business_hours_day' => __( 'Friday', 'cresta-addons-for-elementor' ),
						'section_business_hours_hours' => __( '10AM - 5PM', 'cresta-addons-for-elementor' ),
					],
					[
						'section_business_hours_day' => __( 'Saturday', 'cresta-addons-for-elementor' ),
						'section_business_hours_hours' => __( '10AM - 2PM', 'cresta-addons-for-elementor' ),
					],
					[
						'section_business_hours_day' => __( 'Sunday', 'cresta-addons-for-elementor' ),
						'section_business_hours_hours' => __( 'Close', 'cresta-addons-for-elementor' ),
					],
				],
				'title_field' => '{{{ section_business_hours_day }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_business_hours_box_style',
			[
				'label' => __( 'Box style', 'cresta-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);
		
		$this->add_responsive_control(
			'section_business_hours_padding',
			[
				'label' 		=> __( 'Box padding', 'cresta-addons-for-elementor' ),
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
					'{{WRAPPER}} .cafe-business-hour-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_business_hours_box_borderradius',
			[
				'label' => __( 'Border Radius', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],	
				'selectors' => [
					'{{WRAPPER}} .cafe-business-hour-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'section_business_hours_box_backgroundcolor',
			[
				'label' 		=> __( 'Background color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#fafafa',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-business-hour-container' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_business_hours_title_style',
			[
				'label' => __( 'Title', 'cresta-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);
		
		$this->add_control(
			'section_business_hours_title_color',
			[
				'label' 		=> __( 'Title color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#E18C25',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_business_hours_title_alignment',
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
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-title' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_business_hours_title_distance',
			[
				'label' 		=> __( 'Distance', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'default' 		=> [
					'size' => 10,
				],
				'range' 		=> [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_business_hours_title_typo',
				'selector' 		=> '{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-title',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_business_hours_style',
			[
				'label' => __( 'Business Hours', 'cresta-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);
		
		$this->add_responsive_control(
			'section_business_hours_alignment',
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
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-single' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_business_hours_distance',
			[
				'label' 		=> __( 'Distance', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'default' 		=> [
					'size' => 5,
				],
				'range' 		=> [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-single' => 'margin-bottom: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'section_business_hours_days_color',
			[
				'label' 		=> __( 'Color of days', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#000000',
				'separator' 	=> 'before',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-single .cafe-business-hour-day' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> __( 'Typography of days', 'cresta-addons-for-elementor' ),
				'name' 			=> 'section_business_hours_days_typo',
				'selector' 		=> '{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-single .cafe-business-hour-day',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
			]
		);
		
		$this->add_control(
			'section_business_hours_hours_color',
			[
				'label' 		=> __( 'Color of hours', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#a5a5a5',
				'separator' 	=> 'before',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-single .cafe-business-hour-hours' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> __( 'Typography of hours', 'cresta-addons-for-elementor' ),
				'name' 			=> 'section_business_hours_hours_typo',
				'selector' 		=> '{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-single .cafe-business-hour-hours',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
			]
		);
		
		$this->add_control(
			'section_business_hours_border_size',
			[
				'label' 		=> __( 'Border size', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'default' 		=> [
					'size' => 1,
				],
				'range' 		=> [
					'px' => [
						'max' => 10,
					],
				],
				'separator' 	=> 'before',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-single' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'section_business_hours_border_style',
			[
				'label' => __( 'Border style', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dashed',
				'options' => [
					'solid' => __( 'Solid', 'cresta-addons-for-elementor' ),
					'dashed' => __( 'Dashed', 'cresta-addons-for-elementor' ),
					'dotted' => __( 'Dotted', 'cresta-addons-for-elementor' ),
					'double' => __( 'Double', 'cresta-addons-for-elementor' ),
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-single' => 'border-bottom-style: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_business_hours_border_color',
			[
				'label' 		=> __( 'Border color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#d9d9d9',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-business-hour-container .cafe-business-hour-single' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
	}
	
	protected function render() {
		$settings = $this->get_settings();
		$title_tag = $settings['section_business_hours_title_tag'];
		?>
			<div class="cafe-business-hour-container">
				<?php if( $settings['section_business_hours_title'] ): ?>
					<?php echo '<' . cresta_addons_elementor_allowed_tags_title($title_tag) . ' class="cafe-business-hour-title">' . $settings['section_business_hours_title'] . '</' . cresta_addons_elementor_allowed_tags_title($title_tag) . '>'; ?>
				<?php endif; ?>
				<?php foreach ( $settings['section_business_hours_list'] as $index => $item ) : ?>
					<div class="cafe-business-hour-single">
						<div class="cafe-business-hour-day"><?php echo $item['section_business_hours_day']; ?></div>
						<div class="cafe-business-hour-hours"><?php echo $item['section_business_hours_hours']; ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php
	}
	
	protected function content_template() {
	}
	
}