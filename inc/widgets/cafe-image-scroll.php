<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Stack;

class Cresta_Addons_Image_Scroll extends Widget_Base {
	public function get_name() {
		return 'cafe-image-scroll';
	}
	public function get_title() {
		return __( 'Image Scroll', 'cresta-addons-for-elementor' );
	}
	public function get_icon() {
		return 'cafe-icon eicon-image-rollover';
	}
	public function get_categories() {
		return [ 'cresta-elements' ];
	}
	
	public function get_style_depends() {
		return [ 'cafe-image-scroll' ];
	}
	
	public function get_script_depends() {
		return [ 'cafe-image-scroll' ];
	}
	
	protected function register_controls() {
		$this->start_controls_section(
			'section_image_scroll',
			[
				'label' => __( 'Image scroll', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_image_scroll_image',
			[
				'label' => __( 'Choose Image', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_image_scroll_settings',
			[
				'label' => __( 'Scroll settings', 'cresta-addons-for-elementor' ),
			]
		);
		
		$this->add_control(
			'section_image_scroll_direction',
			[
				'label'			=> __( 'Scroll direction', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'vertical',
				'options' 		=> [
					'vertical'  => __( 'Vertical', 'cresta-addons-for-elementor' ),
					'horizontal'  => __( 'Horizontal', 'cresta-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_responsive_control(
			'section_image_scroll_height',
			[
				'label' 	=> __( 'Image height', 'cresta-addons-for-elementor' ),
				'type' 		=> Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' 	=> [
					'px' 	=> [
						'min' 	=> 0,
						'max' 	=> 1000,
						'step'	=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 400,
				],
				'selectors' => [
					'{{WRAPPER}} .cafe-image-scroll-image' => 'height: {{SIZE}}px;width: 100%;',
				],
				'condition' => [
					'section_image_scroll_direction' => 'vertical',
				],
			]
		);
		
		$this->add_responsive_control(
			'section_image_scroll_width',
			[
				'label' 	=> __( 'Image width', 'cresta-addons-for-elementor' ),
				'type' 		=> Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' 	=> [
					'px' 	=> [
						'min' 	=> 0,
						'max' 	=> 1000,
						'step'	=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 500,
				],
				'selectors' => [
					'{{WRAPPER}} .cafe-image-scroll-image' => 'width: {{SIZE}}px;height: 100%;',
				],
				'condition' => [
					'section_image_scroll_direction' => 'horizontal',
				],
			]
		);
		
		$this->add_control(
            'section_image_scroll_reverse',
            [
                'label' 		=> __( 'Reverse', 'cresta-addons-for-elementor' ),
                'type' 			=> Controls_Manager::SWITCHER,
                'default' 		=> 'no',
                'return_value' 	=> 'yes',
				'off' => __( 'Off', 'cresta-addons-for-elementor' ),
				'on' => __( 'On', 'cresta-addons-for-elementor' ),
            ]
        );
		
		$this->add_control(
			'section_image_scroll_speed',
			[
				'label' 		=> __( 'Scroll speed', 'cresta-addons-for-elementor' ),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '2',
			]
		);
		
		$this->add_responsive_control(
			'section_image_scroll_border_radius',
			[
				'label' => __( 'Border Radius', 'cresta-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cafe-image-scroll-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings();
		$state = $settings['section_image_scroll_reverse'];
		if ($state == 'yes') {
			$stateValue = 'reverse';
		} else {
			$stateValue = 'normal';
		}
		if ($settings['section_image_scroll_direction'] == 'vertical') {
			$size = $settings['section_image_scroll_height']['size'];
		} else {
			$size = $settings['section_image_scroll_width']['size'];
		}
		?>
			<div id="cafe-image-scroll" class="cafe-image-scroll-wrap">
				<div class="cafe-image-scroll-container" data-state="<?php echo esc_attr($stateValue); ?>" data-size="<?php echo esc_attr($size); ?>" data-speed="<?php echo intval($settings['section_image_scroll_speed']); ?>" data-direction="<?php echo esc_attr($settings['section_image_scroll_direction']); ?>">
				<?php
					if ( ! empty( $settings['section_image_scroll_image']['url'] ) ) {
						$this->add_render_attribute( 'section_image_scroll_image', 'src', $settings['section_image_scroll_image']['url'] );
						$this->add_render_attribute( 'section_image_scroll_image', 'alt', Control_Media::get_image_alt( $settings['section_image_scroll_image'] ) );
						$this->add_render_attribute( 'section_image_scroll_image', 'title', Control_Media::get_image_title( $settings['section_image_scroll_image'] ) );
						
						$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'section_image_scroll_image' );
						
						echo '<div class="cafe-image-scroll-image '.esc_attr($stateValue).' '.esc_attr($settings['section_image_scroll_direction']).'">'. $image_html .'</div>';
					}
				?>
				</div>
			</div>
		<?php
	}
	
	protected function content_template() {
	}
}