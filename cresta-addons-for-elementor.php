<?php
/**
 * Plugin Name: Cresta Addons for Elementor
 * Plugin URI: https://crestaproject.com/downloads/cresta-addons/
 * Description: Dozens of additional widgets for Elementor!
 * Version: 1.1.0
 * Author: CrestaProject - Rizzo Andrea
 * Author URI: https://crestaproject.com
 * Domain Path: /languages
 * Text Domain: cresta-addons-for-elementor
 * License: GPL2
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the main instance of Cresta_Addons_For_Elementor to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Cresta_Addons_For_Elementor
 */
function Cresta_Addons_For_Elementor() {
	return Cresta_Addons_For_Elementor::instance();
}

Cresta_Addons_For_Elementor();

final class Cresta_Addons_For_Elementor {
	
	/**
	 * Cresta_Addons_For_Elementor The single instance of Cresta_Addons_For_Elementor.
	 * @var 	object
	 * @access  private
	 * @since 	1.0.0
	 */
	private static $_instance = null;

	private $plugin_path;
	
	/**
	 * Constructor function.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function __construct() {
		$this->plugin_path = plugin_dir_path( __FILE__ );
		define( 'CAFE_PATH', $this->plugin_path );
		define( 'CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION', '1.1.0' );
		define( 'CAFE_PLUGIN_BASENAME', plugin_basename(__FILE__));
		require_once( CAFE_PATH .'/inc/config.php' );
		/* Start only if Elementor Page Builder is installed and active */
		if ($this->elementor_check_load()) {
			require_once( CAFE_PATH .'/inc/widgets.php' );
			require_once( CAFE_PATH .'/inc/helper.php' );
			require_once( CAFE_PATH .'/panel/plugin-options-page.php' );
			require_once( CAFE_PATH .'/inc/compatibility/wpml_compatibility.php' );
		}
		add_action( 'plugins_loaded', array($this, 'load_textdomain') );
		register_activation_hook( __FILE__, array($this, 'set_default_options') );
	}
	
	/**
	 * Load the localisation file.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'cresta-addons-for-elementor', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		if (!$this->elementor_check_load()) {
			add_action( 'admin_notices', array($this, 'elementor_fail_load' ));
		}
	}
	
	/**
	 * Check if Elementor plugin is active
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function elementor_check_load() {
		if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			return true;
		}
		return false;
	}
	
	/**
	 * Admin notices if Elementor plugin is not installed or active
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function elementor_fail_load() {
		$screen = get_current_screen();
		if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
			return;
		}
		$plugin = 'elementor/elementor.php';
		if ( $this->is_elementor_installed() ) {
			if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}
			$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
			$message = '<p>' . esc_html__( 'Cresta Addons for Elementor plugin is not working because you need to activate Elementor plugin.', 'cresta-addons-for-elementor' ) . '</p>';
			$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', esc_url($activation_url), esc_html__( 'Activate Elementor Page Builder', 'cresta-addons-for-elementor' ) ) . '</p>';
		} else {
			if ( ! current_user_can( 'install_plugins' ) ) {
				return;
			}
			$install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );

			$message = '<p>' . esc_html__( 'Cresta Addons for Elementor plugin is not working because you need to install the Elementor plugin.', 'cresta-addons-for-elementor' ) . '</p>';
			$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', esc_url($install_url), esc_html__( 'Install Elementor Now', 'cresta-addons-for-elementor' ) ) . '</p>';
		}
		echo '<div class="notice notice-warning cresta-addons-for-elementor"><p>' . $message . '</p></div>';//$message is escaped
	}
	
	/**
	 * Check if Elementor is installed and inactive or not
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function is_elementor_installed() {
		$file_path = 'elementor/elementor.php';
		$installed_plugins = get_plugins();

		return isset( $installed_plugins[ $file_path ] );
	}
	
	/**
	 * Generate the default options for the plugin
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function set_default_options() {
		$default_values = array_fill_keys(array_keys(cresta_addons_element_list()), 1);
		$values = get_option('cresta_addons_for_elementor');
		update_option('cresta_addons_for_elementor', wp_parse_args($values, $default_values));
	}
	
	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'cresta-addons-for-elementor' ), '1.0.0' );
	}
	
	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'cresta-addons-for-elementor' ), '1.0.0' );
	}
	
	/**
	 * Main Cresta_Addons_For_Elementor Instance
	 *
	 * Ensures only one instance of Cresta_Addons_For_Elementor is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see Cresta_Addons_For_Elementor()
	 * @return Main Cresta_Addons_For_Elementor instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) )
			self::$_instance = new self();
		return self::$_instance;
	}
}
