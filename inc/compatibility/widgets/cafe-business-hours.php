<?php

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


class Cresta_Addons_For_Elementor_WPML_Business_Hours extends WPML_Elementor_Module_With_Items {

	/**
	 * Get widget field name.
	 * 
	 * @return string
	 */
	public function get_items_field() {
		return 'section_business_hours_list';
	}

	/**
	 * Get the fields inside the repeater.
	 *
	 * @return array
	 */
	public function get_fields() {
		return array(
			'section_business_hours_day',
			'section_business_hours_hours',
		);
	}

  	/**
     * @param string $field
	 * 
	 * Get the field title string
     *
     * @return string
     */
	protected function get_title( $field ) {
		switch ($field) {
			case 'section_business_hours_day':
				return esc_html__( 'Business hours day', 'cresta-addons-for-elementor' );
			case 'section_business_hours_hours':
				return esc_html__( 'Business hours hours', 'cresta-addons-for-elementor' );
			default:
				return '';
		}
	}

	/**
	 * @param string $field
	 * 
	 * Get perspective field types.
	 *
	 * @return string
	 */
	protected function get_editor_type( $field ) {
		switch ($field) {
			case 'section_business_hours_day':
				return 'TEXT';
			case 'section_business_hours_hours':
				return 'TEXT';
			default:
				return '';
		}
	}

}