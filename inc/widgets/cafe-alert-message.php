<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Icons_Manager;
use Elementor\Controls_Stack;

class Cresta_Addons_Alert_Message extends Widget_Base {
	public function get_name() {
		return 'cafe-alert-message';
	}
	public function get_title() {
		return __( 'Alert Message', 'cresta-addons-for-elementor' );
	}
	public function get_icon() {
		return 'cafe-icon eicon-alert';
	}
	public function get_categories() {
		return [ 'cresta-elements' ];
	}
	
	public function get_script_depends() {
		return [ 'cafe-alert' ];
	}
	
	public function get_style_depends() {
		return [ 'cafe-alert' ];
	}
	
	protected function register_controls() {
		$this->start_controls_section(
			'section_alert_query',
			[
				'label' => __( 'Alert Message', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'alert_icon',
			[
				'label' => __( 'Icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-bolt',
					'library' => 'solid',
				],
			]
		);
		
		$this->add_control(
			'alert_title',
			[
				'label' 		=> __( 'Title', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'This is Alert Message', 'cresta-addons-for-elementor' ),
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'alert_content',
			[
				'label' 		=> __( 'Content', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel.', 'cresta-addons-for-elementor' ),
				'separator' 	=> 'after',
			]
		);
		
		$this->add_control(
			'alert_show_dismiss',
			[
				'label' 		=> __( 'Dismiss Button', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'cresta-addons-for-elementor' ),
				'label_off' => __( 'Hide', 'cresta-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'view',
			[
				'label' 		=> __( 'View', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::HIDDEN,
				'default' 		=> 'traditional',
			]
		);
		
		$this->end_controls_section();
		//End post titles styles
		
		//Post titles styles
		$this->start_controls_section(
			'section_alert_style',
			[
				'label' => __( 'Alert style', 'cresta-addons-for-elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'alert_background_color',
			[
				'label' 	=> __( 'Background Color', 'cresta-addons-for-elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '#dff0d8',
				'selectors' => [
					'{{WRAPPER}} .cafe-alert .cresta-alert-wrap' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'alert_text_color',
			[
				'label' 	=> __( 'Text Color', 'cresta-addons-for-elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '#3cb37d',
				'selectors' => [
					'{{WRAPPER}} .cafe-alert .cresta-alert-wrap' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'alert_padding',
			[
				'label' => __( 'Padding', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'desktop_default' => [	
					'top' => 1,
					'right' => 1,
					'bottom' => 1,
					'left' => 1,
					'unit' => 'em',
					'isLinked' => true,
				],
				'tablet_default' => [	
					'top' => 1,
					'right' => 1,
					'bottom' => 1,
					'left' => 1,
					'unit' => 'em',
					'isLinked' => true,
				],
				'mobile_default' => [	
					'top' => 1,
					'right' => 1,
					'bottom' => 1,
					'left' => 1,
					'unit' => 'em',
					'isLinked' => true,
				],	
				'separator' 	=> 'before',
				'selectors' => [
					'{{WRAPPER}} .cafe-alert .cresta-alert-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'alert_border_radius',
			[
				'label' => __( 'Border Radius', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'desktop_default' => [	
					'top' => 5,
					'right' => 5,
					'bottom' => 5,
					'left' => 5,
					'unit' => 'px',
					'isLinked' => true,
				],
				'tablet_default' => [	
					'top' => 5,
					'right' => 5,
					'bottom' => 5,
					'left' => 5,
					'unit' => 'px',
					'isLinked' => true,
				],
				'mobile_default' => [	
					'top' => 5,
					'right' => 5,
					'bottom' => 5,
					'left' => 5,
					'unit' => 'px',
					'isLinked' => true,
				],	
				'separator' 	=> 'before',
				'selectors' => [
					'{{WRAPPER}} .cafe-alert .cresta-alert-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'alert_border_style',
			[
				'label' => __( 'Border Style', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'none' => __( 'None', 'cresta-addons-for-elementor' ),
					'solid' => __( 'Solid', 'cresta-addons-for-elementor' ),
					'double' => __( 'Double', 'cresta-addons-for-elementor' ),
					'dotted' => __( 'Dotted', 'cresta-addons-for-elementor' ),
					'dashed' => __( 'Dashed', 'cresta-addons-for-elementor' ),
				],
				'selectors' => [
					'{{WRAPPER}} .cafe-alert .cresta-alert-wrap' => 'border-style: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'alert_border_width',
			[
				'label' => __( 'Border Width', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 2,
				],
				'range' => [
					'ms' => [
						'min' => 0,
						'max' => 10,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cafe-alert .cresta-alert-wrap' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'alert_border_style!' => 'none',
				],
			]
		);
		
		$this->add_control(
			'alert_border_color',
			[
				'label' 	=> __( 'Border Color', 'cresta-addons-for-elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '#3cb37d',
				'selectors' => [
					'{{WRAPPER}} .cafe-alert .cresta-alert-wrap' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'alert_border_style!' => 'none',
				],
			]
		);
		
		$this->end_controls_section();
		//End post titles styles
		
		//Post titles styles
		$this->start_controls_section(
			'section_alert_style_title',
			[
				'label' => __( 'Title Typography', 'cresta-addons-for-elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_alert_style_title_typo',
				'selector' 	=> '{{WRAPPER}} .cafe-alert .cresta-alert-wrap .cresta-alert-title',
				'scheme' 	=> Typography::TYPOGRAPHY_3,
			]
		);
		
		$this->end_controls_section();
		//End post titles styles
		
		//Post titles styles
		$this->start_controls_section(
			'section_alert_style_content',
			[
				'label' => __( 'Content Typography', 'cresta-addons-for-elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_alert_style_title_content',
				'selector' 	=> '{{WRAPPER}} .cafe-alert .cresta-alert-wrap .cresta-alert-content',
				'scheme' 	=> Typography::TYPOGRAPHY_3,
			]
		);
		
		$this->end_controls_section();
		//End post titles styles
		
		//Post titles styles
		$this->start_controls_section(
			'section_alert_style_icon',
			[
				'label' => __( 'Icon Style', 'cresta-addons-for-elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'section_alert_style_icon_size',
			[
				'label' => __( 'Icon size', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 50,
					'unit' => 'px',
				],
				'range' => [
					'ms' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cafe-alert .cresta-alert-wrap .cresta-alert-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		//End post titles styles
	}
	
	protected function render() {
		$settings = $this->get_settings();
		$icon = $settings['alert_icon'];
		$title = $settings['alert_title'];
		$content = $settings['alert_content'];
		$show_dismiss = $settings['alert_show_dismiss'];
		if($icon) {
			$iconExist = 'withIcon';
		} else {
			$iconExist = 'noIcon';
		}
		?>
		<div class="cafe-alert" role="alert">
			<div class="cresta-alert-wrap cafe-alert-message">
				<div class="cresta-alert-container <?php echo esc_attr($iconExist); ?>">
					<?php if($icon): ?>
						<div class="cresta-alert-icon"><?php Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] ); ?></div>
					<?php endif; ?>
					<?php if($title): ?>
						<div class="cresta-alert-title"><?php echo esc_html($title); ?></div>
					<?php endif; ?>
					<?php if($content): ?>
						<div class="cresta-alert-content"><?php echo wp_kses_post($content); ?></div>
					<?php endif; ?>
					<?php if($show_dismiss == 'yes'): ?>
						<div class="cresta-alert-dismiss cafe-alert-close-button"><i class="fa fa-times"></i></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
	
	protected function content_template() {
	}
}