<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Cresta_Addons_For_Elementor_WPML {

	/**
	 * @since 1.0.0
	 * @var Object
	 */
	public static $instance = null;

	/**
	 * Returns the class instance
	 * 
	 * @since 1.0.0
	 *
	 * @return Object
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor for the class
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		if ( defined( 'WPML_ST_VERSION' ) ) {
			if ( class_exists( 'WPML_Elementor_Module_With_Items' ) ) {
				$this->load_wpml_modules();
			}
			add_filter( 'wpml_elementor_widgets_to_translate', array( $this, 'add_elementor_translatable_nodes' ) );

		}
	}
	
	/**
     * load_wpml_modules
     *
     * Integrations class for complex widgets.
     *
     * @since 1.0.0
	 * @access public
	 */
	public function load_wpml_modules() {
		require_once CAFE_PATH . '/inc/compatibility/widgets/cafe-heading-typewriter.php';
		require_once CAFE_PATH . '/inc/compatibility/widgets/cafe-business-hours.php';
	}

	/**
	 * Adds additional translatable nodes to WPML
	 *
	 * @since 1.0.0
	 *
	 * @param  array   $widgets WPML nodes to translate
	 * @return array   $widgets Updated nodes
	 */
	public function add_elementor_translatable_nodes( $widgets ) {

		$widgets[ 'cafe-alert-message' ] = array(
			'conditions' => array( 'widgetType' => 'cafe-alert-message' ),
			'fields'     => array(
				array(
					'field'       => 'alert_title',
					'type'        => __( 'Alert Title', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
				array(
					'field'       => 'alert_content',
					'type'        => __( 'Alert Content', 'cresta-addons-for-elementor' ),
					'editor_type' => 'AREA'
				),
			),
		);
		
		$widgets[ 'cafe-heading-typewriter' ] = array(
			'conditions' => array( 'widgetType' => 'cafe-heading-typewriter' ),
			'fields'     => array(
				array(
					'field'       => 'before_text',
					'type'        => __( 'Heading typewriter before text', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
				array(
					'field'       => 'after_text',
					'type'        => __( 'Heading typewriter after text', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
			),
			'integration-class' => array( 'Cresta_Addons_For_Elementor_WPML_Heading_Typewriter', )
		);
		
		$widgets[ 'cafe-double-button' ] = array(
			'conditions' => array( 'widgetType' => 'cafe-double-button' ),
			'fields'     => array(
				array(
					'field'       => 'section_double_first_button_text',
					'type'        => __( 'Double button first text', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
				'section_double_first_button_link' => array(
					'field'       => 'url',
					'type'        => __( 'Double button first link', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
				array(
					'field'       => 'section_double_second_button_text',
					'type'        => __( 'Double button second text', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
				'section_double_second_button_link' => array(
					'field'       => 'url',
					'type'        => __( 'Double button second link', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
			),
		);
		
		$widgets[ 'cafe-advanced-heading' ] = array(
			'conditions' => array( 'widgetType' => 'cafe-advanced-heading' ),
			'fields'     => array(
				array(
					'field'       => 'advanced_heading_first',
					'type'        => __( 'Advanced heading first title', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
				array(
					'field'       => 'advanced_heading_second',
					'type'        => __( 'Advanced heading second title', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
				array(
					'field'       => 'advanced_heading_subtitle',
					'type'        => __( 'Advanced heading subtitle', 'cresta-addons-for-elementor' ),
					'editor_type' => 'VISUAL'
				),
			),
		);
		
		$widgets[ 'cafe-quote' ] = array(
			'conditions' => array( 'widgetType' => 'cafe-quote' ),
			'fields'     => array(
				array(
					'field'       => 'section_quote_message',
					'type'        => __( 'Quote message', 'cresta-addons-for-elementor' ),
					'editor_type' => 'VISUAL'
				),
				array(
					'field'       => 'section_quote_author',
					'type'        => __( 'Quote author', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
				array(
					'field'       => 'section_quote_twitter_share_text',
					'type'        => __( 'Quote share text', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
				array(
					'field'       => 'section_quote_twitter_share_username',
					'type'        => __( 'Quote Twitter username', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
			),
		);
		
		$widgets[ 'cafe-news-ticker' ] = array(
			'conditions' => array( 'widgetType' => 'cafe-news-ticker' ),
			'fields'     => array(
				array(
					'field'       => 'section_news_ticker_custom_text',
					'type'        => __( 'News ticker custom text', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
			),
		);
		
		$widgets[ 'cafe-flip-box' ] = array(
			'conditions' => array( 'widgetType' => 'cafe-flip-box' ),
			'fields'     => array(
				array(
					'field'       => 'section_flip_box_front_title',
					'type'        => __( 'Flip box front side title', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
				array(
					'field'       => 'section_flip_box_front_content',
					'type'        => __( 'Flip box front side content', 'cresta-addons-for-elementor' ),
					'editor_type' => 'VISUAL'
				),
				array(
					'field'       => 'section_flip_box_back_title',
					'type'        => __( 'Flip box back side title', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
				array(
					'field'       => 'section_flip_box_back_content',
					'type'        => __( 'Flip box back side content', 'cresta-addons-for-elementor' ),
					'editor_type' => 'VISUAL'
				),
			),
		);
		
		$widgets[ 'cafe-business-hours' ] = array(
			'conditions' => array( 'widgetType' => 'cafe-business-hours' ),
			'fields'     => array(
				array(
					'field'       => 'section_business_hours_title',
					'type'        => __( 'Business hours title', 'cresta-addons-for-elementor' ),
					'editor_type' => 'LINE'
				),
			),
			'integration-class' => array( 'Cresta_Addons_For_Elementor_WPML_Business_Hours', )
		);

		return $widgets;
	}
}
Cresta_Addons_For_Elementor_WPML::instance();