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
use Elementor\Group_Control_Box_Shadow;
use Elementor\Controls_Stack;

class Cresta_Addons_Advanced_Heading extends Widget_Base {
	public function get_name() {
		return 'cafe-advanced-heading';
	}
	public function get_title() {
		return __( 'Advanced Heading', 'cresta-addons-for-elementor' );
	}
	public function get_icon() {
		return 'cafe-icon eicon-animated-headline';
	}
	public function get_categories() {
		return [ 'cresta-elements' ];
	}
	public function get_style_depends() {
		return [ 'cafe-advanced-heading' ];
	}
	
	protected function register_controls() {
		$this->start_controls_section(
			'section_advanced_heading',
			[
				'label' => __( 'Advanced Heading', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'advanced_heading_first',
			[
				'label' 		=> __( 'First part title', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Lorem', 'cresta-addons-for-elementor' ),
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'advanced_heading_second',
			[
				'label' 		=> __( 'Second part title', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Ipsum', 'cresta-addons-for-elementor' ),
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'advanced_heading_htmltag',
			[
				'label' => __( 'HTML Tag', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1' => __( 'H1', 'cresta-addons-for-elementor' ),
					'h2' => __( 'H2', 'cresta-addons-for-elementor' ),
					'h3' => __( 'H3', 'cresta-addons-for-elementor' ),
					'h4' => __( 'H4', 'cresta-addons-for-elementor' ),
					'h5' => __( 'H5', 'cresta-addons-for-elementor' ),
					'h6' => __( 'H6', 'cresta-addons-for-elementor' ),
					'div' => __( 'div', 'cresta-addons-for-elementor' ),
					'span' => __( 'span', 'cresta-addons-for-elementor' ),
					'p' => __( 'p', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_control(
			'advanced_heading_show_icon',
			[
				'label' => __( 'Show icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'advanced_heading_icon',
			[
				'label' => __( 'Icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-check-circle',
					'library' => 'regular',
				],
				'condition' => [
					'advanced_heading_show_icon' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'advanced_heading_subtitle',
			[
				'label' => __( 'Subtitle', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
			]
		);
		
		$this->end_controls_section();
		
		//Styles
		$this->start_controls_section(
			'advanced_heading_box_style',
			[
				'label' => __( 'Box style', 'cresta-addons-for-elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'advanced_heading_box_background',
			[
				'label' 		=> __( 'Box background', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#3C3C3C',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-advanced-heading-wrap' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'advanced_heading_box_padding',
			[
				'label' 		=> __( 'Box padding', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em' ],
				'desktop_default' => [	
					'top' => 15,
					'right' => 15,
					'bottom' => 15,
					'left' => 15,
					'unit' => 'px',
					'isLinked' => true,
				],
				'tablet_default' => [	
					'top' => 15,
					'right' => 15,
					'bottom' => 15,
					'left' => 15,
					'unit' => 'px',
					'isLinked' => true,
				],
				'mobile_default' => [	
					'top' => 15,
					'right' => 15,
					'bottom' => 15,
					'left' => 15,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-advanced-heading-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'advanced_heading_box_border_radius',
			[
				'label' => __( 'Border Radius', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],	
				'selectors' => [
					'{{WRAPPER}} .cafe-advanced-heading-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'advanced_heading_box_shadow',
				'selector' => '{{WRAPPER}} .cafe-advanced-heading-wrap',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'advanced_heading_title_style',
			[
				'label' => __( 'Title style', 'cresta-addons-for-elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'advanced_heading_title_align',
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
						'{{WRAPPER}} .cafe-advanced-heading-title' => 'text-align: {{VALUE}};',
					],
				]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> __( 'First part title typography', 'cresta-addons-for-elementor' ),
				'name' 		=> 'advanced_heading_title_typography_first',
				'selector' 	=> '{{WRAPPER}} .cafe-advanced-heading-title .cafe-advanced-heading-first-title' ,
				'scheme' 	=> Typography::TYPOGRAPHY_3,
			]
		);
		
		$this->add_control(
			'advanced_heading_title_color_first',
			[
				'label' 		=> __( 'First part title color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#f06292',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-advanced-heading-title .cafe-advanced-heading-first-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> __( 'Second part title typography', 'cresta-addons-for-elementor' ),
				'name' 		=> 'advanced_heading_title_typography_second',
				'selector' 	=> '{{WRAPPER}} .cafe-advanced-heading-title .cafe-advanced-heading-second-title' ,
				'scheme' 	=> Typography::TYPOGRAPHY_3,
			]
		);
		
		$this->add_control(
			'advanced_heading_title_color_second',
			[
				'label' 		=> __( 'Second part title color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#ffffff',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-advanced-heading-title .cafe-advanced-heading-second-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'advanced_heading_title_gap',
			[
				'label' => __( 'Gap', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cafe-advanced-heading-title' => 'padding: {{SIZE}}{{UNIT}} 0;',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'advanced_heading_icon_style',
			[
				'label' => __( 'Icon style', 'cresta-addons-for-elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'advanced_heading_show_icon' => 'yes',
				],
			]
		);
		
		$this->add_responsive_control(
			'advanced_heading_icon_align',
				[
					'label' => __( 'Alignment', 'cresta-addons-for-elementor' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'flex-start' => [
							'title' => __( 'Left', 'cresta-addons-for-elementor' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'cresta-addons-for-elementor' ),
							'icon' => 'fa fa-align-center',
						],
						'flex-end' => [
							'title' => __( 'Right', 'cresta-addons-for-elementor' ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'center',
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .cafe-advanced-heading-icon' => 'justify-content: {{VALUE}};',
					],
				]
		);
		
		$this->add_control(
			'advanced_heading_icon_size',
			[
				'label' 		=> __( 'Icon size', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'default' 		=> [
					'size' => 25,
				],
				'range' 		=> [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-advanced-heading-icon span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'advanced_heading_icon_padding',
			[
				'label' 		=> __( 'Icon padding', 'cresta-addons-for-elementor' ),
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
					'{{WRAPPER}} .cafe-advanced-heading-icon span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'advanced_heading_icon_position',
			[
				'label'			=> __( 'Icon position', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'middle',
				'options' 		=> [
					'top'  => __( 'Top', 'cresta-addons-for-elementor' ),
					'middle'  => __( 'Middle', 'cresta-addons-for-elementor' ),
					'bottom'  => __( 'Bottom', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_control(
			'advanced_heading_icon_color',
			[
				'label' 		=> __( 'Icon color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#686868',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-advanced-heading-icon span' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'advanced_heading_icon_background',
			[
				'label' 		=> __( 'Icon background', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#ffffff',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-advanced-heading-icon span' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'advanced_heading_icon_gap',
			[
				'label' => __( 'Gap', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cafe-advanced-heading-icon' => 'padding: {{SIZE}}{{UNIT}} 0;',
				],
			]
		);
		
		$this->add_responsive_control(
			'advanced_heading_icon_border_radius',
			[
				'label' => __( 'Border Radius', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cafe-advanced-heading-icon span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'advanced_heading_subtitle_style',
			[
				'label' => __( 'Subtitle style', 'cresta-addons-for-elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'advanced_heading_subtitle_align',
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
						'{{WRAPPER}} .cafe-advanced-heading-subtitle' => 'text-align: {{VALUE}};',
					],
				]
		);
		
		$this->add_responsive_control(
			'advanced_heading_subtitle_gap',
			[
				'label' => __( 'Gap', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cafe-advanced-heading-subtitle' => 'padding: {{SIZE}}{{UNIT}} 0;',
				],
			]
		);
		
		$this->add_control(
			'advanced_heading_subtitle_color',
			[
				'label' 		=> __( 'Subtitle color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#D8D8D8',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-advanced-heading-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'advanced_heading_subtitle_typography',
				'selector' 	=> '{{WRAPPER}} .cafe-advanced-heading-subtitle' ,
				'scheme' 	=> Typography::TYPOGRAPHY_3,
			]
		);
		
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$firstTitle = $settings['advanced_heading_first'];
		$secondTitle = $settings['advanced_heading_second'];
		$subTitle = $settings['advanced_heading_subtitle'];
		$htmlTag = $settings['advanced_heading_htmltag'];
		?>
			<div id="cafe-advanced-heading" class="cafe-advanced-heading-wrap">
			
				<?php if($settings['advanced_heading_show_icon'] == 'yes' && $settings['advanced_heading_icon_position'] == 'top'): ?>
					<div class="cafe-advanced-heading-icon">
						<span><?php Icons_Manager::render_icon( $settings['advanced_heading_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
					</div>
				<?php endif; ?>
				
				<<?php echo cresta_addons_elementor_allowed_tags_title($htmlTag); ?> class="cafe-advanced-heading-title">
					<span class="cafe-advanced-heading-first-title"><?php echo $firstTitle; ?></span>
					<span class="cafe-advanced-heading-second-title"><?php echo $secondTitle; ?></span>
				</<?php echo cresta_addons_elementor_allowed_tags_title($htmlTag); ?>>
				
				<?php if($settings['advanced_heading_show_icon'] == 'yes' && $settings['advanced_heading_icon_position'] == 'middle'): ?>
					<div class="cafe-advanced-heading-icon">
						<span><?php Icons_Manager::render_icon( $settings['advanced_heading_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
					</div>
				<?php endif; ?>
				
				<?php if($subTitle): ?>
					<div class="cafe-advanced-heading-subtitle"><?php echo $subTitle; ?></div>
				<?php endif; ?>
				
				<?php if($settings['advanced_heading_show_icon'] == 'yes' && $settings['advanced_heading_icon_position'] == 'bottom'): ?>
					<div class="cafe-advanced-heading-icon">
						<span><?php Icons_Manager::render_icon( $settings['advanced_heading_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
					</div>
				<?php endif; ?>
				
			</div>
		<?php
	}
	
	protected function content_template() {
	}
}