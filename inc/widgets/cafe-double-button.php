<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Icons_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use Elementor\Controls_Stack;

class Cresta_Addons_Dual_Button extends Widget_Base {
	public function get_name() {
		return 'cafe-double-button';
	}
	public function get_title() {
		return __( 'Double Button', 'cresta-addons-for-elementor' );
	}
	public function get_icon() {
		return 'cafe-icon eicon-button';
	}
	public function get_categories() {
		return [ 'cresta-elements' ];
	}
	public function get_style_depends() {
		return [ 'cafe-double-button' ];
	}
	protected function register_controls() {
		
		$this->start_controls_section(
			'section_double_first_button',
			[
				'label' => __( 'First Button', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_double_first_button_text',
			[
				'label' => __( 'Button Text', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'First', 'cresta-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		
		$this->add_control(
			'section_double_first_button_link',
			[
				'label' 		=> __( 'Link', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::URL,
				'default' 		=> [
					'url' => '#',
				],
			]
		);
		
		$this->add_control(
			'section_double_first_button_icon',
			[
				'label' => __( 'Icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::ICONS,
			]
		);
		
		$this->add_control(
			'section_double_first_button_icon_position',
			[
				'label' 		=> __( 'Icon Position', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'before',
				'options' 		=> [
					'before' 			=> __( 'Before', 'cresta-addons-for-elementor' ),
					'after' 		=> __( 'After', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_responsive_control(
			'section_double_first_button_icon_spacing',
			[
				'label' 		=> __( 'Icon Spacing', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'default' 		=> [
					'size' => 0,
				],
				'range' 		=> [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-first-button-icon.cafe-position-before' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cafe-first-button-icon.cafe-position-after' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->start_controls_tabs( 'section_double_first_button_tabs' );
		
		$this->start_controls_tab(
			'section_double_first_button_tab_normal',
			[
				'label' 		=> __( 'Normal', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_double_first_button_color',
			[
				'label' 		=> __( 'Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#404040',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-first-button-link' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_double_first_button_background',
			[
				'label' 		=> __( 'Background', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#f06292',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-first-button-link' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->start_controls_tab(
			'section_double_first_button_tab_hover',
			[
				'label' 		=> __( 'Hover', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_double_first_button_color_hover',
			[
				'label' 		=> __( 'Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#404040',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-first-button-link:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_double_first_button_background_hover',
			[
				'label' 		=> __( 'Background', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#f06292',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-first-button-link:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_double_second_button',
			[
				'label' => __( 'Second Button', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_double_second_button_text',
			[
				'label' => __( 'Button Text', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'Second', 'cresta-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		
		$this->add_control(
			'section_double_second_button_link',
			[
				'label' 		=> __( 'Link', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::URL,
				'default' 		=> [
					'url' => '#',
				],
			]
		);
		
		$this->add_control(
			'section_double_second_button_icon',
			[
				'label' => __( 'Icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::ICONS,
			]
		);
		
		$this->add_control(
			'section_double_second_button_icon_position',
			[
				'label' 		=> __( 'Icon Position', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'before',
				'options' 		=> [
					'before' 			=> __( 'Before', 'cresta-addons-for-elementor' ),
					'after' 		=> __( 'After', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_responsive_control(
			'section_double_second_button_icon_spacing',
			[
				'label' 		=> __( 'Icon Spacing', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'default' 		=> [
					'size' => 0,
				],
				'range' 		=> [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-second-button-icon.cafe-position-before' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cafe-second-button-icon.cafe-position-after' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->start_controls_tabs( 'section_double_second_button_tabs' );
		
		$this->start_controls_tab(
			'section_double_second_button_tab_normal',
			[
				'label' 		=> __( 'Normal', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_double_second_button_color',
			[
				'label' 		=> __( 'Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#f06292',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-second-button-link' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_double_second_button_background',
			[
				'label' 		=> __( 'Background', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#404040',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-second-button-link' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->start_controls_tab(
			'section_double_second_button_tab_hover',
			[
				'label' 		=> __( 'Hover', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_double_second_button_color_hover',
			[
				'label' 		=> __( 'Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#f06292',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-second-button-link:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_double_second_button_background_hover',
			[
				'label' 		=> __( 'Background', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#404040',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-second-button-link:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tabs();
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_double_divider',
			[
				'label' => __( 'Divider', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_double_divider_show',
			[
				'label'   		=> __( 'Show divider', 'cresta-addons-for-elementor' ),
				'type'    		=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
			]
		);
		
		$this->add_control(
			'section_double_divider_choose',
			[
				'label' 		=> __( 'Show', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'icon',
				'options' 		=> [
					'icon' 			=> __( 'Icon', 'cresta-addons-for-elementor' ),
					'text' 		=> __( 'Text', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_control(
			'section_double_divider_icon',
			[
				'label' => __( 'Icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-lemon',
					'library' => 'regular',
				],
				'condition' => [
					'section_double_divider_choose' => 'icon',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_double_divider_icon_size',
			[
				'label' 		=> __( 'Icon size', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'default' 		=> [
					'size' => 20,
				],
				'range' 		=> [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-divider-button-content' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'section_double_divider_choose' => 'icon',
				],
			]
		);
		
		$this->add_control(
			'section_double_divider_text',
			[
				'label' => __( 'Text', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'section_double_divider_choose' => 'text',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_double_divider_text_typo',
				'selector' 		=> '{{WRAPPER}} .cafe-divider-button-text', 
				'scheme' 		=> Typography::TYPOGRAPHY_1,
				'condition' => [
					'section_double_divider_choose' => 'text',
				],
			]
		);
		
		$this->add_control(
			'section_double_divider_color',
			[
				'label' 		=> __( 'Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#ffffff',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-divider-button-content' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_double_divider_background',
			[
				'label' 		=> __( 'Background', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#bebebe',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-divider-button-content' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_double_button_style',
			[
				'label' => __( 'Box Style', 'cresta-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			]
		);
		
		$this->add_responsive_control(
			'section_double_button_align',
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
				'default' => 'flex-start',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .cafe-double-button-wrap' => 'justify-content: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_double_button_padding',
			[
				'label' 		=> __( 'Padding', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em' ],
				'desktop_default' => [	
					'top' => 15,
					'right' => 35,
					'bottom' => 15,
					'left' => 35,
					'unit' => 'px',
					'isLinked' => true,
				],
				'tablet_default' => [	
					'top' => 15,
					'right' => 35,
					'bottom' => 15,
					'left' => 35,
					'unit' => 'px',
					'isLinked' => true,
				],
				'mobile_default' => [	
					'top' => 15,
					'right' => 35,
					'bottom' => 15,
					'left' => 35,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-first-button-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cafe-second-button-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_double_button_border_radius',
			[
				'label' => __( 'Buttons Border Radius', 'cresta-addons-for-elementor' ),
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
				'selectors' => [
					'{{WRAPPER}} .cafe-first-button-link' => 'border-top-left-radius: {{TOP}}{{UNIT}}; border-bottom-left-radius: {{BOTTOM}}{{UNIT}} ;',
					'{{WRAPPER}} .cafe-second-button-link' => 'border-top-right-radius: {{LEFT}}{{UNIT}}; border-bottom-right-radius: {{RIGHT}}{{UNIT}} ;',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_double_button_typo',
				'selector' 		=> '{{WRAPPER}} .cafe-first-button-link, {{WRAPPER}} .cafe-second-button-link', 
				'scheme' 		=> Typography::TYPOGRAPHY_1,
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'section_double_button_box_shadow',
				'selector' => '{{WRAPPER}} .cafe-first-button-link, {{WRAPPER}} .cafe-second-button-link',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_double_button_divider_style',
			[
				'label' => __( 'Divider Style', 'cresta-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'show_label' => false,
				'condition' => [
					'section_double_divider_show' => 'yes',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_double_button_divider_padding',
			[
				'label' 		=> __( 'Padding', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em' ],
				'desktop_default' => [	
					'top' => 10,
					'right' => 10,
					'bottom' => 10,
					'left' => 10,
					'unit' => 'px',
					'isLinked' => true,
				],
				'tablet_default' => [	
					'top' => 10,
					'right' => 10,
					'bottom' => 10,
					'left' => 10,
					'unit' => 'px',
					'isLinked' => true,
				],
				'mobile_default' => [	
					'top' => 10,
					'right' => 10,
					'bottom' => 10,
					'left' => 10,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-divider-button-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_double_button_divider_border_radius',
			[
				'label' => __( 'Divider Border Radius', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'desktop_default' => [	
					'top' => 50,
					'right' => 50,
					'bottom' => 50,
					'left' => 50,
					'unit' => '%',
					'isLinked' => true,
				],
				'tablet_default' => [	
					'top' => 50,
					'right' => 50,
					'bottom' => 50,
					'left' => 50,
					'unit' => '%',
					'isLinked' => true,
				],
				'mobile_default' => [	
					'top' => 50,
					'right' => 50,
					'bottom' => 50,
					'left' => 50,
					'unit' => '%',
					'isLinked' => true,
				],	
				'selectors' => [
					'{{WRAPPER}} .cafe-divider-button-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'section_double_button_divider_box_shadow',
				'selector' => '{{WRAPPER}} .cafe-divider-button-content',
			]
		);
		
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$first_text = $settings['section_double_first_button_text'];
		$first_link = $settings['section_double_first_button_link'];
		$second_text = $settings['section_double_second_button_text'];
		$second_link = $settings['section_double_second_button_link'];
		$show_divider = $settings['section_double_divider_show'];
		?>
		<div id="cafe-double-button" class="cafe-double-button-wrap">
			<div class="cafe-double-main-button-container">
				<div class="cafe-first-button-content">
					<?php if ($first_link['url']): ?>
						<?php
							$target = $first_link['is_external'] ? ' target="_blank"' : '';
							$nofollow = $first_link['nofollow'] ? ' rel="nofollow"' : '';
						?>
						<a class="cafe-first-button-link" <?php echo $target . $nofollow ; ?> href="<?php echo esc_url($first_link['url']); ?>">
							<span class="cafe-double-button-container">
								<?php if($settings['section_double_first_button_icon'] && $settings['section_double_first_button_icon_position'] == 'before'): ?>
									<span class="cafe-first-button-icon cafe-position-before">
									<?php Icons_Manager::render_icon( $settings['section_double_first_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
									</span>
								<?php endif; ?>
								<span class="cafe-double-button-text"><?php echo esc_html($first_text); ?></span>
								<?php if($settings['section_double_first_button_icon'] && $settings['section_double_first_button_icon_position'] == 'after'): ?>
									<span class="cafe-first-button-icon cafe-position-after">
									<?php Icons_Manager::render_icon( $settings['section_double_first_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
									</span>
								<?php endif; ?>
							</span>
						</a>
						<?php if ($show_divider == 'yes') : ?>
							<div class="cafe-divider-button-content">
								<?php if($settings['section_double_divider_choose'] == 'text'): ?>
									<span class="cafe-divider-button-text"><?php echo esc_html($settings['section_double_divider_text']); ?></span>
								<?php else: ?>
									<span class="cafe-divider-button-icon"><?php Icons_Manager::render_icon( $settings['section_double_divider_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<div class="cafe-second-button-content">
					<?php if ($second_link['url']): ?>
						<?php
							$target = $second_link['is_external'] ? ' target="_blank"' : '';
							$nofollow = $second_link['nofollow'] ? ' rel="nofollow"' : '';
						?>
						<a class="cafe-second-button-link" <?php echo $target . $nofollow ; ?> href="<?php echo esc_url($second_link['url']); ?>">
							<span class="cafe-double-button-container">
								<?php if($settings['section_double_second_button_icon'] && $settings['section_double_second_button_icon_position'] == 'before'): ?>
									<span class="cafe-second-button-icon cafe-position-before">
									<?php Icons_Manager::render_icon( $settings['section_double_second_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
									</span>
								<?php endif; ?>
								<span class="cafe-double-button-text"><?php echo esc_html($second_text); ?></span>
								<?php if($settings['section_double_second_button_icon'] && $settings['section_double_second_button_icon_position'] == 'after'): ?>
									<span class="cafe-second-button-icon cafe-position-after">
									<?php Icons_Manager::render_icon( $settings['section_double_second_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
									</span>
								<?php endif; ?>
							</span>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
	
	protected function content_template() {
	}
}