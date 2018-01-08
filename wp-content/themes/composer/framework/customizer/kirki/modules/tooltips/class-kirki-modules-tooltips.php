<?php
/**
 * Injects tooltips to controls when the 'tooltip' argument is used.
 *
 * @package     Kirki
 * @category    Modules
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       2.4.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds script for tooltips.
 */
class Kirki_Modules_Tooltips {

	/**
	 * An array containing field identifieds and their tooltips.
	 *
	 * @access private
	 * @since 2.4.0
	 * @var array
	 */
	private $tooltips_content = array();

	/**
	 * The class constructor
	 *
	 * @access public
	 * @since 2.4.0
	 */
	public function __construct() {

		add_action( 'customize_controls_print_footer_scripts', array( $this, 'customize_controls_print_footer_scripts' ) );

	}

	/**
	 * Parses fields and if any tooltips are found, they are added to the
	 * object's $tooltips_content property.
	 *
	 * @access private
	 * @since 2.4.0
	 */
	private function parse_fields() {

		$fields = Kirki::$fields;
		foreach ( $fields as $field ) {
			if ( isset( $field['tooltip'] ) && ! empty( $field['tooltip'] ) ) {
				$id = str_replace( '[', '-', str_replace( ']', '', $field['settings'] ) );
				$this->tooltips_content[ $id ] = array(
					'id'      => $id,
					'content' => wp_kses_post( $field['tooltip'] ),
				);
			}
		}
	}

	/**
	 * Allows us to add a tooltip to any control.
	 *
	 * @access public
	 * @since 4.2.0
	 * @param string $field_id The field-ID.
	 * @param string $tooltip  The tooltip content.
	 */
	public function add_tooltip( $field_id, $tooltip ) {

		$this->tooltips_content[ $field_id ] = array(
			'id'      => sanitize_key( $field_id ),
			'content' => wp_kses_post( $tooltip ),
		);

	}

	/**
	 * Enqueue scripts.
	 *
	 * @access public
	 * @since 2.4.0
	 */
	public function customize_controls_print_footer_scripts() {

		$this->parse_fields();

		wp_enqueue_script( 'kirki-tooltip', trailingslashit( Kirki::$url ) . 'modules/tooltips/tooltip.js', array( 'jquery' ) );
		wp_localize_script( 'kirki-tooltip', 'kirkiTooltips', $this->tooltips_content );
		wp_enqueue_style( 'kirki-tooltip', trailingslashit( Kirki::$url ) . 'modules/tooltips/tooltip.css', null );

	}
}
