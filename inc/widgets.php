<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Cresta_Addons_For_Elementor_Extensions {
	private static $_instance;
	
	/**
	 * Plugin instance
	 * 
	 * @since 1.0.0
	 * @return Plugin
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}
	
	public function __clone() {
		// Cloning instances of the class is forbidden
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'cresta-addons-for-elementor' ), '1.0.0' );
	}
	
	public function __wakeup() {
		// Unserializing instances of the class is forbidden
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'cresta-addons-for-elementor' ), '1.0.0' );
	}
	
	/**
	 * Widget constructor.
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		add_action( 'elementor/widgets/register', array( $this, 'register_elementor_widgets' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'register_elementor_widget_categories' ) );
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'widget_scripts' ) );
		add_action( 'elementor/frontend/after_register_styles', array( $this, 'widget_styles' ) );
		add_action( 'elementor/preview/enqueue_scripts', array( $this, 'widget_scripts_preview' ) );
		add_action( 'elementor/preview/enqueue_styles', array( $this, 'widget_styles_preview' ) );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_style' ) );
		add_action( 'elementor/frontend/after_enqueue_scripts', array( $this, 'enqueue_editor_scripts_promotional' ) );
		add_filter( 'elementor/editor/localize_settings', array( $this, 'promote_pro_addons' ) );
	}
	
	/**
	 * Generate dependency (CSS and JS)
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_dependency($type) {
		if (empty(cresta_addons_element_list())) {
            return;
        }
		
		foreach (cresta_addons_element_list() as $single => $obj) {
			if (cresta_addons_for_elementor_options($single) == 1 && $obj['islist'] && array_key_exists($type, $obj['dependency'])) {
				foreach ($obj['dependency'][$type] as $file) {
					if ($type == 'css') {
						wp_register_style(
							$file['name'],
							$file['file'],
							array(),
							$file['version']
						);
					} else {
						wp_register_script(
							$file['name'],
							$file['file'],
							array('jquery'),
							$file['version'],
							true
						);
					}
				}
			}
		}
	}
	
	/**
	 * Enqueue dependency (CSS and JS)
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function enqueue_dependency($type) {
		if (empty(cresta_addons_element_list())) {
            return;
        }
		
		foreach (cresta_addons_element_list() as $single => $obj) {
			if (cresta_addons_for_elementor_options($single) == 1 && $obj['islist'] && array_key_exists($type, $obj['dependency'])) {
				foreach ($obj['dependency'][$type] as $file) {
					if ($type == 'css') {
						wp_enqueue_style( $file['name'] );
					} else {
						wp_enqueue_script( $file['name'] );
					}
				}
			}
		}
	}
	
	/**
	 * Registers widgets in Elementor
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_elementor_widgets($widgets_manager) {
		
		if (empty(cresta_addons_element_list())) {
            return;
        }
		
		foreach (cresta_addons_element_list() as $single => $obj) {
			if (cresta_addons_for_elementor_options($single) == 1 && $obj['islist']) {
				if ($obj['ispro'] === false) {
					require_once CAFE_PATH . 'inc/widgets/'.$single.'.php';
				} else {
					require_once CAPFE_PATH . 'inc/widgets/'.$single.'.php';
				}
				$widgets_manager->register( new $obj['class'] );
			}
		}
		
	}
	
	/**
	 * Register Cresta Elements category for Elementor
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_elementor_widget_categories($elements_manager) {
		$elements_manager->add_category(
			'cresta-elements',
			[
				'title' => __( 'Cresta Addons', 'cresta-addons-for-elementor' ),
				'icon'  => 'fa fa-plug',
			],
			1
		);
	}
	
	public function widget_scripts() {
		
		$this->register_dependency('js');
		
	}
	
	public function widget_scripts_preview() {
		
		$this->enqueue_dependency('js');

	}
	
	public function widget_styles() {
		
		$this->register_dependency('css');

	}
	
	public function widget_styles_preview() {
		
		$this->enqueue_dependency('css');

	}
	
	public function editor_style() {
		wp_enqueue_style( 'cafe-elementor-editor', plugins_url( 'inc/assets/css/editor.min.css',dirname(__FILE__)), array(), CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION );
	}
	
	public function enqueue_editor_scripts_promotional() {
		if ( \Elementor\Plugin::$instance->preview->is_preview_mode() && !class_exists( 'Cresta_Addons_Pro_For_Elementor' ) ) {
			$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
			wp_enqueue_script( 'cafe-promotion', plugins_url('inc/assets/js/promotion'.$min.'.js',dirname(__FILE__)), array('jquery'), CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION, true );
			$cresta_addons_array_promotion = array(
				'conversionString' => esc_html__( 'Upgrade to Cresta Addons PRO', 'cresta-addons-for-elementor' ),
			);
			wp_localize_script( 'cafe-promotion', 'CrestaAddonsElementorPromotion', $cresta_addons_array_promotion );
		}
	}
	
	public function promote_pro_addons($config) {
		if ( !class_exists( 'Cresta_Addons_Pro_For_Elementor' ) ) {
			$promotion_widgets = [];

			if (isset($config['promotionWidgets'])) {
				$promotion_widgets = $config['promotionWidgets'];
			}

			$combine_array = array_merge($promotion_widgets, [
				[
					'name' => 'cafe-scroll-to-next-section',
					'title' => __('Scroll to next section', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-arrow-down',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-tilt-effect',
					'title' => __('Tilt Effect', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-clone',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-posts-carousel',
					'title' => __('Posts Carousel', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-post-slider',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-pricing-table',
					'title' => __('Pricing Table', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-price-table',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-image-hotspots',
					'title' => __('Image Hotspots', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-image-hotspot',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-onepage-navigation',
					'title' => __('Onepage Navigation', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-navigation-vertical',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-stylize-every-word',
					'title' => __('Stylize every word', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-text-area',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-price-list',
					'title' => __('Price List', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-price-list',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-filterable-gallery',
					'title' => __('Filterable Gallery', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-gallery-masonry',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-page-scroll-progress',
					'title' => __('Page Scroll Progress', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-scroll',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-image-compare',
					'title' => __('Image Compare', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-image-before-after',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-offcanvas',
					'title' => __('Offcanvas', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-column',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-step-by-step',
					'title' => __('Step by step', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-h-align-right',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-ajax-search',
					'title' => __('Ajax Search', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-site-search',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-content-timeline',
					'title' => __('Content Timeline', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-time-line',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-content-behind-background',
					'title' => __('Content behind background', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-navigator',
					'categories' => '["cresta-elements"]',
				],
				[
					'name' => 'cafe-switch',
					'title' => __('Switch', 'cresta-addons-for-elementor'),
					'icon' => 'cafe-pro-addons cafe-icon eicon-dual-button',
					'categories' => '["cresta-elements"]',
				]
			]);

			$config['promotionWidgets'] = $combine_array;
		}
		return $config;
    }

}
function cresta_addons_elementor_widgets() {
	return Cresta_Addons_For_Elementor_Extensions::instance();
}

cresta_addons_elementor_widgets();

function cresta_addons_elementor_allowed_tags_title($tag) {
	switch ($tag) {
		case 'h1':
			return 'h1';
			break;
		case 'h2':
			return 'h2';
			break;
		case 'h3':
			return 'h3';
			break;
		case 'h4':
			return 'h4';
			break;
		case 'h5':
			return 'h5';
			break;
		case 'h6':
			return 'h6';
			break;
		case 'div':
			return 'div';
			break;
		case 'span':
			return 'span';
			break;
		case 'p':
			return 'p';
			break;
		default:
			return 'h1';
	}
}