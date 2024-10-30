<?php
class Cresta_Addons_For_Elementor_Options_Page
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;
	
	/**
	 * Editable fields.
	 *
	 * @type array
	 */
	protected $fields = array();
	
	/**
	 * Option name
	 *
	 * @type string
	 */
	protected $option_name = 'cresta_addons_for_elementor';
	
	/**
	 * Default options.
	 *
	 * @type array
	 */
	protected $default_options = array();

    /**
     * Start up
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
		add_filter( 'plugin_action_links_' . CAFE_PLUGIN_BASENAME, array( $this, 'settings_link' ) );
		add_filter( 'plugin_row_meta', array ($this, 'pro_link' ), 10 , 2 );
    }
	
	/**
	 * Enqueue styles.
	 */
	public function enqueue_admin_scripts($hook) {
		if ( 'toplevel_page_cresta-addons-for-elementor' != $hook ) {
			return;
		}
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		wp_enqueue_style( 'cresta-addons-for-elementor-panel', plugins_url('panel/assets/css/style'.$min.'.css',dirname(__FILE__)), array(), CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION);
		wp_enqueue_script( 'cresta-addons-for-elementor-panel', plugins_url('panel/assets/js/script'.$min.'.js',dirname(__FILE__)), array('jquery'), CRESTA_ADDONDS_FOR_ELEMENTOR_PLUGIN_VERSION, true );
	}

    /**
     * Add options page
     */
    public function add_plugin_page() {
		add_menu_page(
			esc_html__( 'Cresta Addons for Elementor', 'cresta-addons-for-elementor'), 
            esc_html__( 'Cresta Addons', 'cresta-addons-for-elementor'), 
			'manage_options',
			'cresta-addons-for-elementor', 
			array( $this, 'create_admin_page' ),
			esc_url(plugins_url( 'panel/assets/img/cafe-icon.png', dirname(__FILE__))),
			58
		);
		
    }
	
	/**
     * Add PRO version link if Cresta Addons PRO for Elementor is not active
     */
	public function pro_link( $links, $file ) {
		if ( strpos( $file, 'cresta-addons-for-elementor' ) !== false && !class_exists( 'Cresta_Addons_Pro_For_Elementor' ) ) {
			$new_links = array(
				'<a style="color:#39b54a;font-weight:bold;" href="https://crestaproject.com/downloads/cresta-addons/" target="_blank" rel="external" ><span class="dashicons dashicons-megaphone"></span> ' . esc_html__( 'Upgrade to PRO', 'cresta-addons-for-elementor' ) . '</a>', 
			);
			$links = array_merge( $links, $new_links );
		}
		return $links;
	}
	
	 /**
     * Add settings link
     */
	public function settings_link($links) { 
		$setting_link = array(
			'<a href="' . admin_url('admin.php?page=cresta-addons-for-elementor') . '">' . esc_html__( 'Settings','cresta-addons-for-elementor') . '</a>',
		);
		return array_merge( $links, $setting_link );
	}

    /**
     * Options page callback
     */
    public function create_admin_page() {
        // Set class property
        $this->options = get_option( $this->option_name );
		if ( !class_exists( 'Cresta_Addons_Pro_For_Elementor' ) ) {
			$cafe_version = esc_html__( 'Free Version', 'cresta-addons-for-elementor');
		} else {
			$cafe_version = esc_html__( 'PRO Version', 'cresta-addons-for-elementor');
		}
        ?>
        <div class="wrap">
			<h1><?php esc_html_e('Cresta Addons for Elementor', 'cresta-addons-for-elementor'); ?></h1>
			<div class="cresta-addons-for-elementor-panel">
				<div class="update-to-pro-version-box"></div>
				<form method="post" action="options.php">
				<div class="cresta-addons-for-elementor-block header">
					<div class="cafe-header-block">
						<div class="cafe-header-block-left">
							<div class="cafe-header-logo">
								<img src="<?php echo esc_url(plugins_url( '/assets/img/cafe-logo.png' , __FILE__ )); ?>">
							</div>
							<h2><?php esc_html_e('Cresta Addons settings', 'cresta-addons-for-elementor'); ?><span class="cafe-version"><?php echo esc_html($cafe_version); ?></span></h2>
						</div>
						<div class="cafe-header-block-right">
							<?php
								submit_button( esc_html__( 'Save Settings', 'cresta-addons-for-elementor' ), 'cafe-save-button' );
							?>
						</div>
					</div>
				</div>
				<div class="cresta-addons-for-elementor-block-content">
					<?php
						settings_fields( 'cresta_addons_for_elementor_group' );
						do_settings_sections( 'cresta-addons-for-elementor-setting-admin' );
					?>
				</div>
				<div class="cresta-addons-for-elementor-block footer">
					<?php
						submit_button( esc_html__( 'Save Settings', 'cresta-addons-for-elementor' ), 'cafe-save-button' );
					?>
					<p class="rate-us-wordpress">
						<a href="https://wordpress.org/support/plugin/cresta-addons-for-elementor/reviews/" target="_blank" rel="noopener noreferrer" class="button cafe-save-button rate">
							<?php esc_html_e('Rate us on WordPress!', 'cresta-addons-for-elementor'); ?>
						</a>
					</p>
					<?php 
						if ( !class_exists( 'Cresta_Addons_Pro_For_Elementor' ) ) {
							?>
								<p class="upgrade-to-pro">
									<a href="https://crestaproject.com/downloads/cresta-addons/" target="_blank" rel="noopener noreferrer" class="button cafe-save-button upgrade">
										<?php esc_html_e('Upgrade to PRO', 'cresta-addons-for-elementor'); ?>
									</a>
								</p>
							<?php
						}
					?>
				</div>
				</form>
			</div>
			<?php if ( !class_exists( 'Cresta_Addons_Pro_For_Elementor' ) ) : ?>
				<div class="update-to-pro-version">
					<div class="update-to-pro-version-container">
						<span class="dashicons dashicons-info-outline"></span>
						<h3><?php esc_html_e('Upgrade to PRO version', 'cresta-addons-for-elementor'); ?></h3>
						<p><?php esc_html_e('Get Cresta Addons PRO to unlock all Elementor Widgets.', 'cresta-addons-for-elementor'); ?></p>
						<a href="https://crestaproject.com/downloads/cresta-addons/" target="_blank" rel="noopener noreferrer" class="button cafe-save-button upgrade"><?php esc_html_e('Upgrade to PRO', 'cresta-addons-for-elementor'); ?></a>
					</div>
				</div>
			<?php endif; ?>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init() {  
		
		$this->fields = cresta_addons_element_list();
		
        add_settings_section(
            'cresta_main_section',
            esc_html__( 'Welcome to Cresta Addons options page', 'cresta-addons-for-elementor'), 
            array( $this, 'print_section_info' ),
            'cresta-addons-for-elementor-setting-admin'
        );  
		
		
		foreach ( $this->fields as $type => $obj ) {
			$handle   = $this->option_name . "_$type";
			$args     = array (
				'label_for' => $type,
				'type'      => $type,
				'description' => $obj['description'],
				'default' => $obj['default'],
				'islist' => $obj['islist'],
				'icon' => $obj['icon'],
			);

			switch ($obj['type']) {
				case 'text':
					$callback = array ( $this, 'print_input_field_text' );
					break;
				case 'checkbox':
					$callback = array ( $this, 'print_input_field_checkbox' );
					break;
				default:
					$callback = array ( $this, 'print_input_field_text' );
			}
			
			register_setting(
				'cresta_addons_for_elementor_group',
				$this->option_name,
				array(
					'default' 			=> $obj['default'],
					'sanitize_callback' => array ( $this, 'sanitize' ),
				)
			);

			add_settings_field(
				$type,
				$obj['title'],
				$callback,
				'cresta-addons-for-elementor-setting-admin',
				$obj['section'],
				$args
			);
			
		}
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input ) {
		$new_input = array();
		foreach ( $this->fields as $type => $obj ) {
			
			switch ($obj['type']) {
				case 'text':
					$new_input[$type] = sanitize_text_field( $input[$type] );
					break;
				case 'checkbox':
					if ($obj['islist'] === false) {
						$new_input[$type] = 1;
					} else {
						$new_input[$type] = ( isset( $input[$type] ) ? 1 : 0 );
					}
					break;
				default:
					$new_input[$type] = sanitize_text_field( $input[$type] );
			}

		}
        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info() {
        print '<div class="cafe_desc_section">'.esc_html__( 'Activate only the Elementor widgets you want to use, they will be visible in the Elementor widget list.', 'cresta-addons-for-elementor').'</div>';
    }

    /** 
     * Callback for input type text
     */
    public function print_input_field_text(array $args) {
		$default= $args['default'];
		$type   = $args['type'];
		$id     = esc_attr( $args['label_for'] );
		$desc	= esc_html( $args['description'] );
		$name   = $this->option_name . '[' . $type . ']';
		$data   = get_option( $this->option_name, array() );
		if ( !isset($data[$type]) ) {
			$data[$type] = $default;
		}
		$value  = isset ( $data[ $type ] ) ? $data[ $type ] : '';
		$value  = esc_attr( $value );
		print "<input type='text' value='$value' name='$name' id='$id' class='regular-text' /><span class='description'>$desc</span>";
    }
	
	/** 
     * Callback for input type checkbox
     */
	public function print_input_field_checkbox(array $args) {
		$default= $args['default'];
		$type   = $args['type'];
		$id     = esc_attr( $args['label_for'] );
		$desc	= esc_html( $args['description'] );
		$demo	= 'https://crestaproject.com/demo/cresta-addons/'.$id.'/';
		$dis	= ($args['islist'] == true) ? '' : 'disabled';
		$name   = $this->option_name . '[' . $type . ']';
		$data   = get_option( $this->option_name, array() );
		$icon 	= $args['icon'] ? esc_attr( $args['icon'] ) : '';
		if ( !isset($data[$type]) ) {
			$data[$type] = $default;
		}
		if ($args['islist'] === false) {
			$value	= 'checked=\'checked\'';
		} else {
			$value	= checked( $data[ $type ], '1', false );
		}
		$value  = esc_attr( $value );
		print "<div class='cafe-icon-checkbox'><i class='$icon'></i></div><label class='switch $dis'><input $dis type='checkbox' value=1 name='$name' id='$id' $value /><span class='slider'></span></label><span class='description'><a href='$demo' target='_blank' rel='noopener noreferrer'>$desc</a></span>";
	}
}

if( is_admin() ) {
    $cresta_addons_for_elementor_options_page = new Cresta_Addons_For_Elementor_Options_Page();
}