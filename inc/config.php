<?php
/* List of all Cresta Addons for Elementor */
function cresta_addons_element_list() {
	$list = [
		'cafe-alert-message' => [
			'title' => esc_html__( 'Alert Message', 'cresta-addons-for-elementor' ),
			'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
			'default' => true,
			'islist' => true,
			'ispro'	=> false,
			'icon' => 'eicon-alert',
			'type' => 'checkbox',
			'section' => 'cresta_main_section',
			'class' => 'Cresta_Addons_Alert_Message',
			'dependency' => [
                'css' => [
                    [
						'file' => plugins_url('inc/assets/css/alert.min.css',dirname(__FILE__)),
						'name' => 'cafe-alert',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
                'js' => [
                    [
						'file' => plugins_url('inc/assets/js/alert.min.js',dirname(__FILE__)),
						'name' => 'cafe-alert',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
            ],
		],
		'cafe-double-button' => [
			'title' => esc_html__( 'Double Button', 'cresta-addons-for-elementor' ),
			'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
			'default' => true,
			'islist' => true,
			'ispro'	=> false,
			'icon' => 'eicon-button',
			'type' => 'checkbox',
			'section' => 'cresta_main_section',
			'class' => 'Cresta_Addons_Dual_Button',
			'dependency' => [
                'css' => [
                    [
						'file' => plugins_url('inc/assets/css/double-button.min.css',dirname(__FILE__)),
						'name' => 'cafe-double-button',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
            ],
		],
		'cafe-heading-typewriter' => [
			'title' => esc_html__( 'Heading Typewriter', 'cresta-addons-for-elementor' ),
			'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
			'default' => true,
			'islist' => true,
			'ispro'	=> false,
			'icon' => 'eicon-heading',
			'type' => 'checkbox',
			'section' => 'cresta_main_section',
			'class' => 'Cresta_Addons_Heading_Typewriter',
			'dependency' => [
                'css' => [
                    [
						'file' => plugins_url('inc/assets/css/heading-typewriter.min.css',dirname(__FILE__)),
						'name' => 'cafe-heading-typewriter',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
				'js' => [
					[
						'file' => plugins_url('inc/assets/js/heading-typewriter.min.js',dirname(__FILE__)),
						'name' => 'cafe-heading-typewriter',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                    [
						'file' => plugins_url('inc/assets/js/typed.min.js',dirname(__FILE__)),
						'name' => 'typed',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
            ],
		],
		'cafe-posts-box' => [
			'title' => esc_html__( 'Posts Box', 'cresta-addons-for-elementor' ),
			'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
			'default' => true,
			'islist' => true,
			'ispro'	=> false,
			'icon' => 'eicon-posts-grid',
			'type' => 'checkbox',
			'section' => 'cresta_main_section',
			'class' => 'Cresta_Addons_Posts_Box',
			'dependency' => [
                'css' => [
                    [
						'file' => plugins_url('inc/assets/css/posts-box.min.css',dirname(__FILE__)),
						'name' => 'cafe-posts-box',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
            ],
		],
		'cafe-advanced-heading' => [
			'title' => esc_html__( 'Advanced Heading', 'cresta-addons-for-elementor' ),
			'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
			'default' => true,
			'islist' => true,
			'ispro'	=> false,
			'icon' => 'eicon-animated-headline',
			'type' => 'checkbox',
			'section' => 'cresta_main_section',
			'class' => 'Cresta_Addons_Advanced_Heading',
			'dependency' => [
                'css' => [
                    [
						'file' => plugins_url('inc/assets/css/advanced-heading.min.css',dirname(__FILE__)),
						'name' => 'cafe-advanced-heading',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
            ],
		],
		'cafe-image-scroll' => [
			'title' => esc_html__( 'Image Scroll', 'cresta-addons-for-elementor' ),
			'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
			'default' => true,
			'islist' => true,
			'ispro'	=> false,
			'icon' => 'eicon-image-rollover',
			'type' => 'checkbox',
			'section' => 'cresta_main_section',
			'class' => 'Cresta_Addons_Image_Scroll',
			'dependency' => [
                'css' => [
                    [
						'file' => plugins_url('inc/assets/css/image-scroll.min.css',dirname(__FILE__)),
						'name' => 'cafe-image-scroll',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
				'js' => [
                    [
						'file' => plugins_url('inc/assets/js/image-scroll.min.js',dirname(__FILE__)),
						'name' => 'cafe-image-scroll',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
            ],
		],
		'cafe-news-ticker' => [
			'title' => esc_html__( 'News Ticker', 'cresta-addons-for-elementor' ),
			'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
			'default' => true,
			'islist' => true,
			'ispro'	=> false,
			'icon' => 'eicon-post-navigation',
			'type' => 'checkbox',
			'section' => 'cresta_main_section',
			'class' => 'Cresta_Addons_News_Ticker',
			'dependency' => [
                'css' => [
                    [
						'file' => plugins_url('inc/assets/css/news-ticker.min.css',dirname(__FILE__)),
						'name' => 'cafe-news-ticker',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
					[
						'file' => plugins_url('inc/assets/css/owl-carousel.min.css',dirname(__FILE__)),
						'name' => 'owl-carousel',
						'version' => '2.3.4',
                    ],
                ],
				'js' => [
                    [
						'file' => plugins_url('inc/assets/js/news-ticker.min.js',dirname(__FILE__)),
						'name' => 'cafe-news-ticker',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
					[
						'file' => plugins_url('inc/assets/js/owl.carousel.min.js',dirname(__FILE__)),
						'name' => 'owl-carousel',
						'version' => '2.3.4',
                    ],
                ],
            ],
		],
		'cafe-quote' => [
			'title' => esc_html__( 'Quote', 'cresta-addons-for-elementor' ),
			'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
			'default' => true,
			'islist' => true,
			'ispro'	=> false,
			'icon' => 'eicon-blockquote',
			'type' => 'checkbox',
			'section' => 'cresta_main_section',
			'class' => 'Cresta_Addons_Quote',
			'dependency' => [
                'css' => [
                    [
						'file' => plugins_url('inc/assets/css/quote.min.css',dirname(__FILE__)),
						'name' => 'cafe-quote',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
            ],
		],
		'cafe-business-hours' => [
			'title' => esc_html__( 'Business Hours', 'cresta-addons-for-elementor' ),
			'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
			'default' => true,
			'islist' => true,
			'ispro'	=> false,
			'icon' => 'eicon-countdown',
			'type' => 'checkbox',
			'section' => 'cresta_main_section',
			'class' => 'Cresta_Addons_Business_Hours',
			'dependency' => [
                'css' => [
                    [
						'file' => plugins_url('inc/assets/css/business-hours.min.css',dirname(__FILE__)),
						'name' => 'cafe-business-hours',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
            ],
		],
		'cafe-flip-box' => [
			'title' => esc_html__( 'Flip Box', 'cresta-addons-for-elementor' ),
			'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
			'default' => true,
			'islist' => true,
			'ispro'	=> false,
			'icon' => 'eicon-flip-box',
			'type' => 'checkbox',
			'section' => 'cresta_main_section',
			'class' => 'Cresta_Addons_Flip_Box',
			'dependency' => [
                'css' => [
                    [
						'file' => plugins_url('inc/assets/css/flip-box.min.css',dirname(__FILE__)),
						'name' => 'cafe-flip-box',
						'version' => CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION,
                    ],
                ],
            ],
		],
	];
	$complete_list = apply_filters( 'cresta_addons_additional_fields', $list );
	ksort($complete_list);
	return $complete_list;
}
/* List of all PRO widgets (promo) */
function cresta_addons_element_list_pro($widgets) {
	
	$widgets['cafe-scroll-to-next-section'] = array(
		'title'        => esc_html__( 'Scroll to next section', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-arrow-down',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-tilt-effect'] = array(
		'title'        => esc_html__( 'Tilt Effect', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-clone',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-pricing-table'] = array(
		'title'        => esc_html__( 'Pricing Table', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-price-table',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-onepage-navigation'] = array(
		'title'        => esc_html__( 'Onepage Navigation', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-navigation-vertical',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-filterable-gallery'] = array(
		'title'        => esc_html__( 'Filterable Gallery', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-gallery-masonry',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-ajax-search'] = array(
		'title'        => esc_html__( 'Ajax Search', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-site-search',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-switch'] = array(
		'title'        => esc_html__( 'Switch', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-dual-button',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-content-behind-background'] = array(
		'title'        => esc_html__( 'Content behind background', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-navigator',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-content-timeline'] = array(
		'title'        => esc_html__( 'Content Timeline', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-time-line',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-step-by-step'] = array(
		'title'        => esc_html__( 'Step by step', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-h-align-right',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-image-compare'] = array(
		'title'        => esc_html__( 'Image Compare', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-image-before-after',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-price-list'] = array(
		'title'        => esc_html__( 'Price List', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-price-list',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-stylize-every-word'] = array(
		'title'        => esc_html__( 'Stylize every word', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-text-area',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-page-scroll-progress'] = array(
		'title'        => esc_html__( 'Page scroll Progress', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-scroll',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-switch'] = array(
		'title'        => esc_html__( 'Switch', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-dual-button',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-posts-carousel'] = array(
		'title'        => esc_html__( 'Posts Carousel', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-post-slider',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-offcanvas'] = array(
		'title'        => esc_html__( 'Offcanvas', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-column',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	$widgets['cafe-image-hotspots'] = array(
		'title'        => esc_html__( 'Image Hotspots', 'cresta-addons-for-elementor' ),
		'description' => esc_html__( 'Watch the demo', 'cresta-addons-for-elementor' ),
		'default' => true,
		'islist' => false,
		'icon' => 'eicon-image-hotspot',
		'type' => 'checkbox',
		'section' => 'cresta_main_section',
	);
	
	return $widgets;
	
}
add_filter('cresta_addons_additional_fields', 'cresta_addons_element_list_pro');
/* Manage the options of Cresta Addons for Elementor with cresta_addons_for_elementor_options() */
if( ! function_exists('cresta_addons_for_elementor_options')){
	function cresta_addons_for_elementor_options($name, $default = false) {
		$options = ( get_option( 'cresta_addons_for_elementor' ) ) ? get_option( 'cresta_addons_for_elementor' ) : null;
		if ( isset( $options[ $name ] ) ) {
			return apply_filters( "cresta_addons_for_elementor_{$name}", $options[ $name ] );
		}
		return apply_filters( "cresta_addons_for_elementor_{$name}", $default );
	}
}