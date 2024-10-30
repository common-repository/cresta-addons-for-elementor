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

class Cresta_Addons_News_Ticker extends Widget_Base {
	public function get_name() {
		return 'cafe-news-ticker';
	}
	public function get_title() {
		return __( 'News Ticker', 'cresta-addons-for-elementor' );
	}
	public function get_icon() {
		return 'cafe-icon eicon-post-navigation';
	}
	public function get_categories() {
		return [ 'cresta-elements' ];
	}
	public function get_style_depends() {
		return [ 'owl-carousel', 'cafe-news-ticker' ];
	}
	
	public function get_script_depends() {
		return [ 'owl-carousel', 'cafe-news-ticker' ];
	}
	
	protected function register_controls() {
		$this->start_controls_section(
			'section_news_ticker',
			[
				'label' 		=> __( 'News Ticker', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_news_ticker_post_type',
			[
				'label' 		=> __( 'Post Type', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'post',
				'options' 		=> cresta_addons_for_elementor_show_list(),
			]
		);
		
		$this->add_control(
			'section_news_ticker_number',
			[
				'label' 		=> __( 'Number of elements', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '6',
				'separator' 	=> 'before',
			]
		);
		
		$this->add_control(
			'section_news_ticker_order',
			[
				'label' 		=> __( 'Order', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 			=> __( 'Default', 'cresta-addons-for-elementor' ),
					'DESC' 		=> __( 'DESC', 'cresta-addons-for-elementor' ),
					'ASC' 		=> __( 'ASC', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_order_by',
			[
				'label' 		=> __( 'Order By', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 				=> __( 'Default', 'cresta-addons-for-elementor' ),
					'date' 			=> __( 'Date', 'cresta-addons-for-elementor' ),
					'title' 		=> __( 'Title', 'cresta-addons-for-elementor' ),
					'name' 			=> __( 'Name', 'cresta-addons-for-elementor' ),
					'modified' 		=> __( 'Modified', 'cresta-addons-for-elementor' ),
					'author' 		=> __( 'Author', 'cresta-addons-for-elementor' ),
					'rand' 			=> __( 'Random', 'cresta-addons-for-elementor' ),
					'ID' 			=> __( 'ID', 'cresta-addons-for-elementor' ),
					'comment_count' => __( 'Comment Count', 'cresta-addons-for-elementor' ),
					'menu_order' 	=> __( 'Menu Order', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_order_by_show_date',
			[
				'label' => __( 'Show date', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'section_news_ticker_order_by_show_author',
			[
				'label' => __( 'Show author', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'section_news_ticker_order_by_show_title',
			[
				'label' => __( 'Show title', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'section_news_ticker_include_cat',
			[
				'label' 		=> __( 'Include Categories', 'cresta-addons-for-elementor' ),
				'description' 	=> __( 'Enter the categories slugs seperated by a "comma"', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' => [
					'section_news_ticker_post_type' => 'post',
				],
			]
		);

		$this->add_control(
			'section_news_ticker_exclude_cat',
			[
				'label' 		=> __( 'Exclude Categories', 'cresta-addons-for-elementor' ),
				'description' 	=> __( 'Enter the categories slugs seperated by a "comma"', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition' => [
					'section_news_ticker_post_type' => 'post',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_news_ticker_options',
			[
				'label' 		=> __( 'General Settings', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_news_ticker_custom_text',
			[
				'label' 		=> __( 'Custom Text', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' => __( 'Latest News', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_news_ticker_text_position',
			[
				'label' 		=> __( 'Text position', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'left',
				'options' 		=> [
					'left' 		=> __( 'Left', 'cresta-addons-for-elementor' ),
					'right' 	=> __( 'Right', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_show_icon',
			[
				'label' => __( 'Show icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'section_news_ticker_custom_icon',
			[
				'label' => __( 'Icon', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check-circle',
					'library' => 'regular',
				],
				'condition' => [
					'section_news_ticker_show_icon' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_arrows',
			[
				'label' 		=> __( 'Show arrows', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'separator'		=> 'before',
				'default' 		=> 'yes',
			]
		);
		
		$this->add_control(
			'section_news_ticker_autoplay',
			[
				'label' 		=> __( 'Autoplay', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'separator'		=> 'before',
				'default' 		=> 'yes',
			]
		);
		
		$this->add_control(
			'section_news_ticker_pause',
			[
				'label' 		=> __( 'Pause on hover', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'condition' => [
					'section_news_ticker_autoplay' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_autoplayspeed',
			[
				'label' 		=> __( 'Autoplay Speed (ms)', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> 3000,
				'min'       	=> 500,
				'max'       	=> 10000,
				'step'      	=> 50,
				'condition' => [
					'section_news_ticker_autoplay' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_animation',
			[
				'label' 		=> __( 'Animation', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'slide',
				'options' 		=> [
					'slide' 		=> __( 'Slide', 'cresta-addons-for-elementor' ),
					'fade' 			=> __( 'Fade', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_slide_direction',
			[
				'label' 		=> __( 'Slide direction', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'horizontal',
				'options' 		=> [
					'horizontal' 		=> __( 'Horizontal', 'cresta-addons-for-elementor' ),
					'vertical' 			=> __( 'Vertical', 'cresta-addons-for-elementor' ),
				],
				'condition' => [
					'section_news_ticker_animation' => 'slide',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_news_ticker_style',
			[
				'label' 		=> __( 'Custom text style', 'cresta-addons-for-elementor' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'section_news_ticker_custom_text_color',
			[
				'label' 		=> __( 'Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#ffffff',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-news-ticker-label' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_custom_text_background',
			[
				'label' 		=> __( 'Background', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#000000',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-news-ticker-label' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_custom_icon_distance',
			[
				'label' 		=> __( 'Icon distance', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-news-ticker-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_news_ticker_custom_text_padding',
			[
				'label' 		=> __( 'Padding', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em', '%' ],
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
					'{{WRAPPER}} .cafe-news-ticker-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_news_ticker_custom_text_border',
			[
				'label' => __( 'Border Radius', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],	
				'selectors' => [
					'{{WRAPPER}} .cafe-news-ticker-label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_news_ticker_custom_text_typo',
				'selector' 		=> '{{WRAPPER}} .cafe-news-ticker-label .cafe-news-ticker-text',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_news_ticker_news',
			[
				'label' 		=> __( 'News style', 'cresta-addons-for-elementor' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'section_news_ticker_news_background',
			[
				'label' 		=> __( 'Background', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#ffffff',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-news-ticker-container' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_news_ticker_news_padding',
			[
				'label' 		=> __( 'Padding', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em', '%' ],
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
					'{{WRAPPER}} .cafe-news-ticker-posts-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_news_ticker_news_border',
			[
				'label' => __( 'Border Radius', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],	
				'selectors' => [
					'{{WRAPPER}} .cafe-news-ticker-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_arrow_color',
			[
				'label' 		=> __( 'Arrows color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#000000',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-news-ticker-arrows .owlArrow' => 'color: {{VALUE}};',
				],
				'condition' => [
					'section_news_ticker_arrows' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_news_date_color',
			[
				'label' 		=> __( 'Date Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#000000',
				'separator' => 'before',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-news-ticker-posts-container a .cafe-news-ticker-date' => 'color: {{VALUE}};',
				],
				'condition' => [
					'section_news_ticker_order_by_show_date' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> __( 'Date Typography', 'cresta-addons-for-elementor' ),
				'name' 			=> 'section_news_ticker_news_typo_date',
				'selector' 		=> '{{WRAPPER}} .cafe-news-ticker-posts-container a .cafe-news-ticker-date',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
				'condition' => [
					'section_news_ticker_order_by_show_date' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_news_author_color',
			[
				'label' 		=> __( 'Author Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#000000',
				'separator' => 'before',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-news-ticker-posts-container a .cafe-news-ticker-author' => 'color: {{VALUE}};',
				],
				'condition' => [
					'section_news_ticker_order_by_show_author' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> __( 'Author Typography', 'cresta-addons-for-elementor' ),
				'name' 			=> 'section_news_ticker_news_typo_author',
				'selector' 		=> '{{WRAPPER}} .cafe-news-ticker-posts-container a .cafe-news-ticker-author',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
				'condition' => [
					'section_news_ticker_order_by_show_author' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_news_title_color',
			[
				'label' 		=> __( 'Title Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#000000',
				'separator' => 'before',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-news-ticker-posts-container a .cafe-news-ticker-title' => 'color: {{VALUE}};',
				],
				'condition' => [
					'section_news_ticker_order_by_show_title' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> __( 'Title Typography', 'cresta-addons-for-elementor' ),
				'name' 			=> 'section_news_ticker_news_typo_title',
				'selector' 		=> '{{WRAPPER}} .cafe-news-ticker-posts-container a .cafe-news-ticker-title',
				'scheme' 		=> Typography::TYPOGRAPHY_1,
				'condition' => [
					'section_news_ticker_order_by_show_title' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'section_news_ticker_news_divider_color',
			[
				'label' 		=> __( 'Divider Color', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'default'		=> '#b3b1b1',
				'separator' => 'before',
				'selectors' 	=> [
					'{{WRAPPER}} .cafe-news-ticker-posts-container a .cafe-news-ticker-divider' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings();
		$id = $this->get_id();
		$showTitle = $settings['section_news_ticker_order_by_show_title'];
		$showAuthor = $settings['section_news_ticker_order_by_show_author'];
		$showDate = $settings['section_news_ticker_order_by_show_date'];
		
		// Post type
		$post_type = $settings['section_news_ticker_post_type'];
		$post_type = $post_type ? $post_type : 'post';
		
		$args = array(
	        'post_type'         => $post_type,
	        'posts_per_page'    => $settings['section_news_ticker_number'],
	        'order'             => $settings['section_news_ticker_order'],
	        'orderby'           => $settings['section_news_ticker_order_by'],
			'no_found_rows' 	=> true,
			'tax_query' 		=> array(
				'relation' 		=> 'AND',
			),
	    );
		
		// Include/Exclude categories
	    $include = $settings['section_news_ticker_include_cat'];
	    $exclude = $settings['section_news_ticker_exclude_cat'];
		
		// Include category
		if (  ! empty( $include ) && $post_type == 'post' ) {

			// Sanitize category and convert to array
			$include = str_replace( ', ', ',', $include );
			$include = explode( ',', $include );

			// Add to query arg
			$args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $include,
				'operator' => 'IN',
			);

		}
		
		// Exclude category
		if ( ! empty( $exclude ) && $post_type == 'post' ) {

			// Sanitize category and convert to array
			$exclude = str_replace( ', ', ',', $exclude );
			$exclude = explode( ',', $exclude );

			// Add to query arg
			$args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $exclude,
				'operator' => 'NOT IN',
			);

		}
		
		$cafe_query = new \WP_Query( $args );
		
		echo '<div class="cafe-news-ticker-container position_' . $settings['section_news_ticker_text_position'] . '">';
		
		if ($settings['section_news_ticker_custom_text']) {
			echo '<div class="cafe-news-ticker-label">';
				if ($settings['section_news_ticker_show_icon'] == 'yes') :
					?><span class="cafe-news-ticker-icon"><?php Icons_Manager::render_icon( $settings['section_news_ticker_custom_icon'], [ 'aria-hidden' => 'true' ] ); ?></span><?php
				endif;
				echo '<span class="cafe-news-ticker-text">'. esc_html($settings['section_news_ticker_custom_text']) .'</span>';
			echo '</div>';
		}
		
		if ($settings['section_news_ticker_animation'] == 'fade') {
			$animateIn = 'fadeIn';
			$animateOut = 'fadeOut';
		} elseif($settings['section_news_ticker_slide_direction'] == 'vertical' && $settings['section_news_ticker_animation'] == 'slide') {
			$animateIn = 'slideInDown';
			$animateOut = 'slideOutDown';
		} else {
			$animateIn = false;
			$animateOut = false;
		}
		
		if ( $cafe_query->have_posts() ) {
			
			// Data settings
			$ticker_settings = [
				'ticker_id'	=> $id,
	            'arrows' 	=> ( 'yes' === $settings['section_news_ticker_arrows'] ),
				'autoplay'	=> ( 'yes' === $settings['section_news_ticker_autoplay'] ),
				'pause'		=> ( 'yes' === $settings['section_news_ticker_pause'] ),
				'playspeed'	=> ( $settings['section_news_ticker_autoplayspeed'] ),
				'animateIn' => $animateIn,
				'animateOut'=> $animateOut,
	        ];
			
			$this->add_render_attribute( 'data', 'data-settings', wp_json_encode( $ticker_settings ) ); ?>
				<div class="cafe-news-ticker-posts-container">
					<div class="cafe-news-ticker-all-posts owl-carousel direction_<?php echo $settings['section_news_ticker_slide_direction']; ?>" <?php echo $this->get_render_attribute_string( 'data' ); ?>>
						<?php
							while ( $cafe_query->have_posts() ) : $cafe_query->the_post();
								echo '<div class="cafe-news-ticker-single">';
									echo '<a href="' . get_the_permalink() . '">' . ($showDate == 'yes' ? '<span class="cafe-news-ticker-date">' . get_the_date() . '</span> <span class="cafe-news-ticker-divider">&bullet;</span> ' : '') . ' ' . ($showAuthor == 'yes' ? '<span class="cafe-news-ticker-author">' . get_the_author() . '</span> <span class="cafe-news-ticker-divider">&bullet;</span> ' : '') . ' ' . ($showTitle == 'yes' ? '<span class="cafe-news-ticker-title">' . get_the_title() . '</span>' : '') . '</a>';
								echo '</div>';
							endwhile;
						?>
					</div>
					<div class="cafe-news-ticker-arrows id_<?php echo esc_attr($id); ?>"></div>
				</div>
				<?php wp_reset_postdata();
			
		}
		
		echo '</div>';
	}
	
	protected function content_template() {
	}
}