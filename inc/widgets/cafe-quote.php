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

class Cresta_Addons_Quote extends Widget_Base {
	
	public function get_name() {
		return 'cafe-quote';
	}

	public function get_title() {
		return __( 'Quote', 'cresta-addons-for-elementor' );
	}

	public function get_icon() {
		return 'cafe-icon eicon-blockquote';
	}

	public function get_categories() {
		return [ 'cresta-elements' ];
	}
	
	public function get_style_depends() {
		return [ 'cafe-quote' ];
	}
	
	protected function register_controls() {
		$this->start_controls_section(
			'section_quote',
			[
				'label' => __( 'Quote', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_quote_message',
			[
				'label' => __( 'Message', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Sed scelerisque fermentum erat, vitae malesuada enim ultrices non. Donec enim quam, fermentum vitae euismod id, lacinia nec tortor. In felis leo, vulputate ac orci nec, iaculis fermentum eros.', 'cresta-addons-for-elementor' ),
				'rows' => 8,
			]
		);
		
		$this->add_control(
			'section_quote_author',
			[
				'label' => __( 'Message author', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'John Doe', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_quote_use_icon',
			[
				'label' => __( 'Use icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'section_quote_custom_icon',
			[
				'label' => __( 'Icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-quote-left',
					'library' => 'solid',
				],
				'condition' => [
					'section_quote_use_icon' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_quote_use_twitter_share',
			[
				'label' => __( 'Twitter share button', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'section_quote_twitter_share_text',
			[
				'label' => __( 'Share text', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' 		=> __( 'Share on Twitter', 'cresta-addons-for-elementor' ),
				'condition' => [
					'section_quote_use_twitter_share' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_quote_twitter_share_icon',
			[
				'label' => __( 'Twitter Icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'brands',
				],
				'condition' => [
					'section_quote_use_twitter_share' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_quote_twitter_share_username',
			[
				'label' => __( 'Your Twitter username', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'section_quote_use_twitter_share' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_quote_twitter_share_link',
			[
				'label' => __( 'Link this page in share button', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'section_quote_use_twitter_share' => 'yes',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_quote_quote_style',
			[
				'label' 		=> __( 'Quote box style', 'cresta-addons-for-elementor' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'section_quote_quote_background',
			[
				'label' 		=> __( 'Background', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#fefefe',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-quote-container' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_quote_quote_padding',
			[
				'label' 		=> __( 'Box padding', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em' ],
				'desktop_default' => [	
					'top' => 35,
					'right' => 35,
					'bottom' => 35,
					'left' => 35,
					'unit' => 'px',
					'isLinked' => true,
				],
				'tablet_default' => [	
					'top' => 35,
					'right' => 35,
					'bottom' => 35,
					'left' => 35,
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
					'{{WRAPPER}} .cafe-quote-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_quote_quote_border',
			[
				'label' => __( 'Border Radius', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],	
				'selectors' => [
					'{{WRAPPER}} .cafe-quote-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_quote_message_style',
			[
				'label' 		=> __( 'Message style', 'cresta-addons-for-elementor' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'section_quote_message_color',
			[
				'label' 		=> __( 'Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#000000',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-quote-container .cafe-quote-message' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_quote_message_align',
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
						'{{WRAPPER}} .cafe-quote-container .cafe-quote-message' => 'text-align: {{VALUE}};',
					],
				]
		);
		
		$this->add_responsive_control(
			'section_quote_message_margin',
			[
				'label' 		=> __( 'Margin', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em' ],
				'desktop_default' => [	
					'top' => 0,
					'right' => 0,
					'bottom' => 15,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'tablet_default' => [	
					'top' => 0,
					'right' => 0,
					'bottom' => 15,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'mobile_default' => [	
					'top' => 0,
					'right' => 0,
					'bottom' => 15,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-quote-container .cafe-quote-message' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_quote_message_typo',
				'selector' 		=> '{{WRAPPER}} .cafe-quote-container .cafe-quote-message',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_quote_author_style',
			[
				'label' 		=> __( 'Author style', 'cresta-addons-for-elementor' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'section_quote_author_color',
			[
				'label' 		=> __( 'Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#000000',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-quote-container .cafe-quote-author' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_quote_author_align',
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
					'default' => 'right',
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .cafe-quote-container .cafe-quote-author' => 'text-align: {{VALUE}};',
					],
				]
		);
		
		$this->add_control(
			'section_quote_author_position',
			[
				'label' 		=> __( 'Position', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'bottom',
				'options' 		=> [
					'top' 		=> __( 'Top', 'cresta-addons-for-elementor' ),
					'bottom' 		=> __( 'Bottom', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_quote_author_typo',
				'selector' 		=> '{{WRAPPER}} .cafe-quote-container .cafe-quote-author',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_quote_icon_style',
			[
				'label' 		=> __( 'Icon style', 'cresta-addons-for-elementor' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'section_quote_use_icon' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_quote_icon_color',
			[
				'label' 		=> __( 'Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#000000',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-quote-container .cafe-quote-icon' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_quote_icon_align',
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
						'{{WRAPPER}} .cafe-quote-container .cafe-quote-icon' => 'text-align: {{VALUE}};',
					],
				]
		);
		
		$this->add_control(
			'section_quote_icon_size',
			[
				'label' 		=> __( 'Size', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-quote-container .cafe-quote-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'section_quote_icon_position',
			[
				'label' 		=> __( 'Position', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'top',
				'options' 		=> [
					'top' 		=> __( 'Top', 'cresta-addons-for-elementor' ),
					'bottom' 		=> __( 'Bottom', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_quote_twitter_style',
			[
				'label' 		=> __( 'Twitter style', 'cresta-addons-for-elementor' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'section_quote_use_twitter_share' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_quote_twitter_color',
			[
				'label' 		=> __( 'Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#ffffff',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-quote-container .cafe-quote-twitter a, {{WRAPPER}} .cafe-quote-container .cafe-quote-twitter' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_quote_twitter_background',
			[
				'label' 		=> __( 'Background', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#1DA1F2',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-quote-container .cafe-quote-twitter' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_quote_twitter_padding',
			[
				'label' 		=> __( 'Box padding', 'cresta-addons-for-elementor' ),
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
					'{{WRAPPER}} .cafe-quote-container .cafe-quote-twitter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_quote_twitter_border',
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
				'selectors' => [
					'{{WRAPPER}} .cafe-quote-container .cafe-quote-twitter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_quote_twitter_align',
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
					'default' => 'right',
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .cafe-quote-container .cafe-quote-twitter-container' => 'text-align: {{VALUE}};',
					],
				]
		);
		
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings();
		if ( $settings['section_quote_use_twitter_share'] == 'yes' ) {
			$share_link = 'https://twitter.com/intent/tweet';
			$text = urlencode( strip_tags( $settings['section_quote_message'] ) );
			if ( ! empty( $settings['section_quote_author'] ) ) {
				$text .= ' — ' . urlencode( $settings['section_quote_author'] );
			}
			if ( ! empty ( $settings['section_quote_twitter_share_username'] ) ) {
				$user_name = $settings['section_quote_twitter_share_username'];
				if ( '@' === substr( $user_name, 0, 1 ) ) {
					$user_name = substr( $user_name, 1 );
				}
				$share_link = add_query_arg( 'via', urlencode( $user_name ), $share_link );
			}
			if ( $settings['section_quote_twitter_share_link'] == 'yes' ) {
				$share_link = add_query_arg( 'url', rawurlencode( home_url() . add_query_arg( false, false ) ), $share_link );
			}
			$share_link = add_query_arg( 'text', $text, $share_link );
		}
		?>
		<div class="cafe-quote-container">
			<?php if ($settings['section_quote_use_icon'] == 'yes' && $settings['section_quote_icon_position'] == 'top' ): ?>
				<div class="cafe-quote-icon"><?php Icons_Manager::render_icon( $settings['section_quote_custom_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
			<?php endif; ?>
			
			<?php if ($settings['section_quote_author'] && $settings['section_quote_author_position'] == 'top' ): ?>
				<div class="cafe-quote-author">
					<?php echo $settings['section_quote_author']; ?>
				</div>
			<?php endif; ?>
			
			<div class="cafe-quote-message">
				<?php echo $settings['section_quote_message']; ?>
			</div>
			
			<?php if ($settings['section_quote_author'] && $settings['section_quote_author_position'] == 'bottom' ): ?>
				<div class="cafe-quote-author">
					<?php echo $settings['section_quote_author']; ?>
				</div>
			<?php endif; ?>
			
			<?php if($settings['section_quote_use_twitter_share'] == 'yes' ): ?>
				<div class="cafe-quote-twitter-container"><span class="cafe-quote-twitter"><?php Icons_Manager::render_icon( $settings['section_quote_twitter_share_icon'], [ 'aria-hidden' => 'true' ] ); ?><a rel="nofollow" href="<?php echo esc_attr( $share_link ); ?>" onclick="window.open(this.href,'targetWindow','toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200');return false;"><?php echo $settings['section_quote_twitter_share_text']; ?></a></span></div>
			<?php endif; ?>
			
			<?php if ($settings['section_quote_use_icon'] == 'yes' && $settings['section_quote_icon_position'] == 'bottom' ): ?>
				<div class="cafe-quote-icon"><?php Icons_Manager::render_icon( $settings['section_quote_custom_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
			<?php endif; ?>
		</div>
		<?php
	}
	
	protected function content_template() {
	}
}